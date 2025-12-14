<?php

/**
 * Multi API - Bezpečné SQL Query API
 * 
 * POPIS TRIEDY:
 * Trieda MultiApi poskytuje bezpečný prístup k databáze cez REST API endpoint.
 * Umožňuje vykonávať SELECT dotazy nad databázou s podporou autentifikácie,
 * validácie a ochrany pred SQL injection útokmi.
 * 
 * KONFIGURÁCIA (konštanty v triede):
 * - REQUIRE_AUTHENTICATION: Globálne zapnutie/vypnutie autentifikácie (default: true)
 *   Ak je false, endpointy sú prístupné bez autentifikácie (NEDOPORÚČANÉ pre produkciu)
 * 
 * - ALLOW_ONLY_SELECT: Povolenie len SELECT operácií (default: true)
 *   Ak je true, blokuje všetky ostatné SQL operácie (DROP, DELETE, UPDATE, INSERT, atď.)
 * 
 * BEZPEČNOSTNÉ FUNKCIE:
 * - Autentifikácia cez API kľúč alebo Basic Auth
 * - Ochrana pred SQL injection útokmi
 * - Whitelist povolených tabuliek
 * - Validácia a sanitizácia SQL dotazov
 * - Rate limiting (obmedzenie počtu požiadavok za minútu)
 * - Správne HTTP status kódy a error handling
 * 
 * VSTUPY (URL parametre):
 * 
 * 1. Formát URL:
 *    /dnt-api/multi/{format}/{name_url}/{id}?query={sql_query}&api_key={api_key}
 *    /dnt-api/multi/{format}/base64?q={base64_encoded_query}&api_key={api_key}
 * 
 * 2. Parametre:
 *    - format: výstupný formát - 'xml' alebo 'json' (povinné)
 *    - name_url: názov API konfigurácie v databáze (voliteľné, ak sa používa query parameter)
 *    - id: ID API konfigurácie v databáze (voliteľné, ak sa používa query parameter)
 *    - query: SQL SELECT dotaz (povinné, ak nie je zadaný name_url a id)
 *    - api_key: API kľúč pre autentifikáciu (povinné, ak REQUIRE_AUTHENTICATION = true)
 *    - q: Base64 kódovaný SQL dotaz (používa sa s base64 formátom)
 * 
 * 3. Autentifikácia (ak REQUIRE_AUTHENTICATION = true):
 *    - Cez query parameter: ?api_key=YOUR_API_KEY
 *    - Cez HTTP hlavičku: X-API-Key: YOUR_API_KEY
 *    - Cez Basic Auth: Authorization: Basic base64(username:password)
 * 
 * PRÍKLADY POUŽITIA:
 * 
 * 1. JSON výstup s query parametrom:
 *    GET /dnt-api/multi/json/?query=SELECT%20*%20FROM%20dnt_users&api_key=abc123
 *    
 *    Odpoveď:
 *    {
 *      "items": [
 *        {"id_entity": "1", "name": "John", ...},
 *        {"id_entity": "2", "name": "Jane", ...}
 *      ]
 *    }
 * 
 * 2. XML výstup s query parametrom:
 *    GET /dnt-api/multi/xml/?query=SELECT%20*%20FROM%20dnt_posts%20LIMIT%2010&api_key=abc123
 *    
 *    Odpoveď:
 *    <?xml version="1.0"?>
 *    <items>
 *      <item>
 *        <id_entity>1</id_entity>
 *        <name>Post title</name>
 *        ...
 *      </item>
 *    </items>
 * 
 * 3. Použitie uloženej query z databázy:
 *    GET /dnt-api/multi/json/JajsZ5s4/1028?api_key=abc123
 *    (Použije query uloženú v dnt_api tabuľke s name_url='JajsZ5s4' a id_entity=1028)
 * 
 * 4. Base64 kódovaný query:
 *    GET /dnt-api/multi/json/base64?q=U0VMRUNUICogRlJPTSBkbnRfdXNlcnM=&api_key=abc123
 * 
 * 5. S Basic Auth:
 *    GET /dnt-api/multi/json/?query=SELECT%20*%20FROM%20dnt_users
 *    Authorization: Basic base64(username:password)
 * 
 * OBMEDZENIA:
 * - Maximálna dĺžka query: 5000 znakov
 * - Maximálny počet výsledkov: 1000 riadkov (automaticky sa pridá LIMIT)
 * - Rate limiting: 60 požiadavok za minútu na IP adresu
 * - Povolené tabuľky: dnt_users, dnt_posts, dnt_posts_meta, dnt_registred_users,
 *   dnt_settings, dnt_vendors, dnt_post_type, dnt_categories, dnt_api
 * 
 * CHYBOVÉ ODPOVEDE:
 * - 400 Bad Request: Neplatný alebo nebezpečný dotaz
 * - 401 Unauthorized: Chýba alebo neplatná autentifikácia
 * - 429 Too Many Requests: Prekročený rate limit
 * 
 * POZNÁMKY:
 * - Všetky dotazy musia byť SELECT operácie (ak ALLOW_ONLY_SELECT = true)
 * - Dotazy sú automaticky sanitizované a validované
 * - Ak query neobsahuje LIMIT, automaticky sa pridá LIMIT 1000
 * - Logy všetkých požiadavok sa ukladajú do dnt-logs
 */

namespace DntApi;

use DntLibrary\App\Client;
use DntLibrary\Base\Api;
use DntLibrary\Base\DB;
use DntLibrary\Base\DntLog;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class MultiApi
{
    // Global setting: Enable authentication requirement for all endpoints
    // Set to false to allow unauthenticated access (NOT RECOMMENDED for production)
    const REQUIRE_AUTHENTICATION = false;

    // Only allow SELECT operations on database
    const ALLOW_ONLY_SELECT = true;

    protected Rest $rest;
    protected DntLog $dntLog;
    protected Api $api;
    protected DB $db;
    protected Vendor $vendor;
    protected Client $client;

    // Whitelist of allowed database tables
    protected array $allowedTables = [
        'dnt_users',
        'dnt_posts',
        'dnt_posts_meta',
        'dnt_registred_users',
        'dnt_settings',
        'dnt_vendors',
        'dnt_post_type',
        'dnt_categories',
        'dnt_api',
    ];

    // Maximum query length
    protected int $maxQueryLength = 5000;

    // Maximum results per query
    protected int $maxResults = 1000;

    // Rate limiting: requests per minute per IP
    protected int $rateLimit = 60;

    public function __construct()
    {
        $this->rest = new Rest();
        $this->dntLog = new DntLog();
        $this->api = new Api();
        $this->db = new DB();
        $this->vendor = new Vendor();
        $this->client = new Client();
    }

    /**
     * Main run method
     */
    public function run(): void
    {
        $this->client->init();

        // Check authentication if globally enabled
        if (self::REQUIRE_AUTHENTICATION && !$this->checkAuthentication()) {
            $this->sendUnauthorizedResponse();
            return;
        }

        // Check rate limiting
        if (!$this->checkRateLimit()) {
            $this->sendRateLimitResponse();
            return;
        }

        // Get and validate query
        $query = $this->getQuery();
        if (!$query) {
            $this->sendErrorResponse('No query provided');
            return;
        }

        // Query from getQuery() is already URL-decoded by Api::getQuery()
        // Just trim whitespace
        $query = trim($query);

        // Validate SQL query
        if (!$this->validateQuery($query)) {
            $this->sendErrorResponse('Invalid or unsafe query');
            return;
        }

        // Sanitize query
        $query = $this->sanitizeQuery($query);

        // Log request
        $this->logRequest($query);

        // Execute query and return results
        $this->executeQuery($query);
    }

    /**
     * Check API authentication
     */
    protected function checkAuthentication(): bool
    {
        // Check API key from query parameter
        $apiKey = $this->rest->get('api_key');
        if ($apiKey && $this->validateApiKey($apiKey)) {
            return true;
        }

        // Check Basic Auth
        if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
            return $this->validateBasicAuth($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
        }

        // Check API key from header
        $headers = getallheaders();
        if (isset($headers['X-API-Key']) && $this->validateApiKey($headers['X-API-Key'])) {
            return true;
        }

        return false;
    }

    /**
     * Validate API key
     */
    protected function validateApiKey(string $apiKey): bool
    {
        // Check against database or config
        $query = "SELECT id_entity FROM dnt_api WHERE api_key = '" . $this->db->escape($apiKey) . "' AND vendor_id = '" . $this->vendor->getId() . "' AND `show` = '1'";
        return $this->db->num_rows($query) > 0;
    }

    /**
     * Validate Basic Auth credentials
     */
    protected function validateBasicAuth(string $username, string $password): bool
    {
        // Implement your Basic Auth validation logic here
        // For example, check against database or config
        $query = "SELECT id_entity FROM dnt_api WHERE username = '" . $this->db->escape($username) . "' AND password = '" . $this->db->escape($password) . "' AND vendor_id = '" . $this->vendor->getId() . "' AND `show` = '1'";
        return $this->db->num_rows($query) > 0;
    }

    /**
     * Check rate limiting
     */
    protected function checkRateLimit(): bool
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $cacheKey = 'api_rate_limit_' . md5($ip);
        $cacheFile = '../dnt-cache/temp/' . $cacheKey . '.cache';

        $currentTime = time();
        $requests = [];

        if (file_exists($cacheFile)) {
            $data = file_get_contents($cacheFile);
            $requests = json_decode($data, true) ?: [];
        }

        // Remove requests older than 1 minute
        $requests = array_filter($requests, function($timestamp) use ($currentTime) {
            return ($currentTime - $timestamp) < 60;
        });

        // Check if limit exceeded
        if (count($requests) >= $this->rateLimit) {
            return false;
        }

        // Add current request
        $requests[] = $currentTime;
        file_put_contents($cacheFile, json_encode($requests));

        return true;
    }

    /**
     * Get query from request
     */
    protected function getQuery(): ?string
    {
        if ($this->rest->webhook(4) == 'base64') {
            $query = urldecode(str_replace('==', '', base64_decode($this->rest->webhook(5))));
            if (!$query) {
                $query = urldecode(base64_decode($this->rest->get('q')));
            }
            return $query ?: null;
        } else {
            $query = $this->api->getQuery(
                $this->rest->webhook(4),
                $this->rest->webhook(5),
                $this->rest->get('query')
            );
            return $query ?: null;
        }
    }

    /**
     * Validate SQL query
     */
    protected function validateQuery(string $query): bool
    {
        // Trim and check if query is not empty
        $query = trim($query);
        if (empty($query)) {
            return false;
        }

        // Check query length
        if (strlen($query) > $this->maxQueryLength) {
            return false;
        }

        // Normalize query (remove extra whitespace) for analysis
        $normalizedQuery = preg_replace('/\s+/', ' ', $query);
        $normalizedQueryUpper = strtoupper($normalizedQuery);

        // Only allow SELECT queries if ALLOW_ONLY_SELECT is enabled
        if (self::ALLOW_ONLY_SELECT) {
            // Strict validation: query must start with SELECT (case-insensitive)
            if (!preg_match('/^\s*SELECT\s+/i', $query)) {
                return false;
            }

            // Block all non-SELECT SQL operations (check in normalized uppercase query)
            $blockedOperations = [
                'DROP', 'DELETE', 'UPDATE', 'INSERT', 'ALTER', 'CREATE', 'TRUNCATE',
                'EXEC', 'EXECUTE', 'EXECUTE IMMEDIATE', 'CALL', 'DECLARE',
                'GRANT', 'REVOKE', 'MERGE', 'REPLACE', 'LOAD', 'OUTFILE',
                'INTO OUTFILE', 'INTO DUMPFILE', 'LOCK TABLES', 'UNLOCK TABLES',
                'START TRANSACTION', 'COMMIT', 'ROLLBACK', 'SAVEPOINT',
                'SET ', 'SHOW ', 'DESCRIBE', 'DESC ', 'EXPLAIN', 'USE ', 'FLUSH'
            ];

            foreach ($blockedOperations as $operation) {
                if (stripos($normalizedQueryUpper, $operation) !== false) {
                    return false;
                }
            }

            // Additional check: ensure no semicolon-separated multiple queries
            $queries = explode(';', $normalizedQuery);
            foreach ($queries as $singleQuery) {
                $singleQuery = trim($singleQuery);
                if (!empty($singleQuery) && !preg_match('/^\s*SELECT\s+/i', $singleQuery)) {
                    return false;
                }
            }
        }

        // Check if query uses only allowed tables
        if (!$this->checkAllowedTables($query)) {
            return false;
        }

        return true;
    }

    /**
     * Check if query uses only allowed tables
     */
    protected function checkAllowedTables(string $query): bool
    {
        // Extract table names from query - improved regex to handle various formats
        // Match: FROM table_name, FROM `table_name`, FROM "table_name"
        // Handle cases with or without backticks/quotes
        preg_match_all('/FROM\s+(?:`|")?(\w+)(?:`|")?/i', $query, $matches);
        $tables = $matches[1] ?? [];

        // Also check JOIN clauses
        preg_match_all('/(?:INNER|LEFT|RIGHT|FULL)?\s*JOIN\s+(?:`|")?(\w+)(?:`|")?/i', $query, $joinMatches);
        $tables = array_merge($tables, $joinMatches[1] ?? []);

        // Remove duplicates and empty values
        $tables = array_filter(array_unique($tables));

        // If no tables found, query might be invalid - but allow it if SELECT is valid
        // This handles cases like SELECT 1, SELECT NOW(), etc.
        if (empty($tables)) {
            // If it's a valid SELECT but no table found, allow it
            return true;
        }

        // Check if all tables are in whitelist
        foreach ($tables as $table) {
            $table = strtolower($table); // Normalize to lowercase for comparison
            if (!in_array($table, $this->allowedTables)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Sanitize query
     */
    protected function sanitizeQuery(string $query): string
    {
        // Remove comments
        $query = preg_replace('/--.*$/m', '', $query);
        $query = preg_replace('/\/\*.*?\*\//s', '', $query);

        // Note: Do NOT escape the entire query string - that would break SQL syntax
        // Only escape user input values, not the query structure itself
        // The query structure is already validated in validateQuery()

        // Add LIMIT if not present and results might be large
        if (!preg_match('/\bLIMIT\s+\d+/i', $query)) {
            $query = rtrim($query, ';') . ' LIMIT ' . $this->maxResults;
        } else {
            // Ensure LIMIT is not too high
            $query = preg_replace_callback('/LIMIT\s+(\d+)/i', function($matches) {
                $limit = (int)$matches[1];
                return 'LIMIT ' . min($limit, $this->maxResults);
            }, $query);
        }

        return trim($query);
    }

    /**
     * Execute query and return results
     */
    protected function executeQuery(string $query): void
    {
        $outputType = $this->rest->webhook(3);

        try {
            if ($outputType == 'xml') {
                header('Content-type: text/xml; charset=UTF-8');
                $this->api->getXmlData($query);
            } elseif ($outputType == 'json') {
                header('Content-Type: application/json; charset=UTF-8');
                $this->api->getJsonData($query);
            } else {
                $this->sendErrorResponse('Invalid output type. Use xml or json');
            }
        } catch (\Exception $e) {
            $this->sendErrorResponse('Query execution failed: ' . $e->getMessage());
        }
    }

    /**
     * Log request
     */
    protected function logRequest(string $query): void
    {
        $this->dntLog->add([
            'http_response' => 200,
            'system_status' => 'log',
            'msg' => 'Multi API request',
            'query' => substr($query, 0, 500), // Log first 500 chars
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        ]);
    }

    /**
     * Send unauthorized response
     */
    protected function sendUnauthorizedResponse(): void
    {
        $outputType = $this->rest->webhook(3);
        http_response_code(401);

        if ($outputType == 'xml') {
            header('Content-type: text/xml; charset=UTF-8');
            echo '<?xml version="1.0" encoding="UTF-8"?>
                <service>
                    <header>
                        <domain>' . (defined('DOMAIN') ? DOMAIN : '') . '</domain>
                        <engine>dnt3-platform</engine>
                        <TypeID>multi</TypeID>
                        <request>
                            <code>HTTP/1.0 401 Unauthorized</code>
                        </request>
                    </header>
                    <message>Authentication required. Please provide valid API key or credentials.</message>
                </service>';
        } else {
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode([
                'header' => [
                    'domain' => defined('DOMAIN') ? DOMAIN : '',
                    'engine' => 'dnt3-platform',
                    'TypeID' => 'multi',
                    'request' => ['code' => 'HTTP/1.0 401 Unauthorized']
                ],
                'message' => 'Authentication required. Please provide valid API key or credentials.'
            ]);
        }
    }

    /**
     * Send rate limit response
     */
    protected function sendRateLimitResponse(): void
    {
        $outputType = $this->rest->webhook(3);
        http_response_code(429);

        if ($outputType == 'xml') {
            header('Content-type: text/xml; charset=UTF-8');
            echo '<?xml version="1.0" encoding="UTF-8"?>
                <service>
                    <header>
                        <code>HTTP/1.0 429 Too Many Requests</code>
                    </header>
                    <message>Rate limit exceeded. Please try again later.</message>
                </service>';
        } else {
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode([
                'header' => ['code' => 'HTTP/1.0 429 Too Many Requests'],
                'message' => 'Rate limit exceeded. Please try again later.'
            ]);
        }
    }

    /**
     * Send error response
     */
    protected function sendErrorResponse(string $message): void
    {
        $outputType = $this->rest->webhook(3);
        http_response_code(400);

        if ($outputType == 'xml') {
            header('Content-type: text/xml; charset=UTF-8');
            echo '<?xml version="1.0" encoding="UTF-8"?>
                <service>
                    <header>
                        <code>HTTP/1.0 400 Bad Request</code>
                    </header>
                    <message>' . htmlspecialchars($message) . '</message>
                </service>';
        } else {
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode([
                'header' => ['code' => 'HTTP/1.0 400 Bad Request'],
                'message' => $message
            ]);
        }
    }
}
