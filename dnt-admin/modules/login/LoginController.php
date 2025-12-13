<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\AdminController;
use DntAdmin\App\UserAdmin;
use DntLibrary\Base\AdminUser;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

class LoginController extends AdminController
{
    protected string $loc = __FILE__;
    protected AdminUser $adminUser;
    protected Dnt $dnt;
    protected Vendor $vendor;
    protected string $logFile;

    public function __construct()
    {
        parent::__construct();
        $this->adminUser = new AdminUser();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
        
        // Setup logging file
        $logDir = dirname(dirname(dirname(__DIR__))) . '/dnt-logs';
        $this->logFile = $logDir . '/exception.log';
        
        // Create log directory if it doesn't exist
        if (!is_dir($logDir)) {
            @mkdir($logDir, 0755, true);
        }
    }
    
    /**
     * Log message to exception.log
     */
    protected function log(string $level, string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[{$timestamp}] [{$level}] {$message}\n";
        @file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }
    
    /**
     * Log error message
     */
    protected function logError(string $message): void
    {
        $this->log('ERROR', $message);
    }
    
    /**
     * Log warning message
     */
    protected function logWarning(string $message): void
    {
        $this->log('WARNING', $message);
    }
    
    /**
     * Log info message
     */
    protected function logInfo(string $message): void
    {
        $this->log('INFO', $message);
    }

    protected function processLogin(): object
    {
        $rest = new Rest();
        $user = new UserAdmin();
        $session = new Sessions();
        
        // Ensure session is initialized
        $session->init();

        $response = [];

        $email = $rest->post('email');
        $pass = $rest->post('pass');
        
        // Debug logging to files
        $this->logInfo("=== LOGIN PROCESS STARTED ===");
        $this->logInfo("POST data received: " . json_encode($_POST, JSON_UNESCAPED_UNICODE));
        $this->logInfo("Email: " . ($email ?: 'empty'));
        $this->logInfo("Password: " . ($pass ? '***HIDDEN***' : 'empty'));
        $this->logInfo("Vendor ID: " . $this->vendor->getId());
        $this->logInfo("Session status: " . session_status());
        $this->logInfo("Session ID: " . session_id());
        
        if (empty($email) || empty($pass)) {
            $this->logError("Login failed: Empty email or password");
            $response = [
                'redirect' => WWW_PATH_ADMIN_2 . 'index.php?src=login',
                'message' => 'Email a heslo sú povinné',
                'status' => '0',
            ];
            return (object) $response;
        }
        
        // Test SQL query directly
        $db = new \DntLibrary\Base\DB();
        $vendorId = $this->vendor->getId();
        $testQuery = "SELECT id_entity, email, pass, type FROM dnt_users WHERE vendor_id = '" . $vendorId . "' LIMIT 5";
        $this->logInfo("Test query: " . $testQuery);
        if ($db->num_rows($testQuery) > 0) {
            $testResults = $db->get_results($testQuery);
            $this->logInfo("Users found in DB for vendor_id {$vendorId}: " . count($testResults));
            foreach ($testResults as $idx => $testUser) {
                $this->logInfo("User #{$idx}: email={$testUser['email']}, type={$testUser['type']}, pass_hash=" . substr($testUser['pass'] ?? 'NULL', 0, 10) . '...');
            }
        } else {
            $this->logWarning("No users found in database for vendor_id: " . $vendorId);
        }
        
        $this->logInfo("Calling validProcessLogin for email: {$email}");
        if ($user->validProcessLogin($email, $pass)) {
            $this->logInfo("Login validation PASSED");
            
            // Ensure session is initialized before setting values
            $session->init();
            
            // Set session values
            $session->set('admin_logged', '1');
            $session->set('admin_id', $email);
            
            // DO NOT close session - it must stay open for redirect
            // Session will be automatically saved when script ends
            
            $this->logInfo("Session set - admin_logged: " . $session->get('admin_logged'));
            $this->logInfo("Session set - admin_id: " . $session->get('admin_id'));
            $this->logInfo("Session ID after set: " . session_id());
            $this->logInfo("Session status after set: " . session_status());
            $this->logInfo("Session name: " . session_name());
            $this->logInfo("Session cookie params: " . json_encode(session_get_cookie_params(), JSON_UNESCAPED_UNICODE));
            $this->logInfo("Session data: " . json_encode($_SESSION ?? [], JSON_UNESCAPED_UNICODE));
            $this->logInfo("Cookies before redirect: " . json_encode($_COOKIE ?? [], JSON_UNESCAPED_UNICODE));
            
            // Force session save and regenerate ID for security
            // Regenerate ID only if headers haven't been sent yet
            if (session_status() === PHP_SESSION_ACTIVE && !headers_sent()) {
                session_regenerate_id(true); // Regenerate ID for security
                // Write session data immediately
                session_write_close();
                // Reopen for redirect
                $session->init();
            } elseif (session_status() === PHP_SESSION_ACTIVE) {
                // If headers already sent, just save session without regenerating ID
                session_write_close();
                $session->init();
            }
            
            $this->adminUser->updateDatetime($this->vendor->getId(), $email);
            $this->logInfo("Login SUCCESSFUL - Email: {$email}, Vendor ID: {$vendorId}");
            $response = [
                'redirect' => WWW_PATH_ADMIN_2 . 'index.php?src=' . DEFAULT_MODUL_ADMIN,
                'message' => 'Login correct',
                'status' => '1',
            ];
        } else {
            $this->logError("Login validation FAILED");
            $this->logError("Login failed - Email: {$email}, Vendor ID: {$vendorId}");
            $response = [
                'redirect' => WWW_PATH_ADMIN_2 . 'index.php?src=login',
                'message' => 'Nesprávne prihlasovacie údaje',
                'status' => '0',
            ];
        }
        $this->logInfo("=== LOGIN PROCESS ENDED ===\n");
        return (object) $response;
    }

    public function indexAction(): void
    {
        $this->loadTemplate($this->loc, 'default');
    }

    public function loginAction(): void
    {
        if ($this->hasPost('sent')) {
            $response = $this->processLogin();
            if ($response->status == 1) {
                $this->dnt->redirect($response->redirect);
            } else {
                $data['title'] = 'Problém s prihlásením';
                $data['content'] = $response->message . '<br/><br/> <a class="btn btn-primary" href="' . WWW_PATH_ADMIN_2 . 'index.php?src=login">Naspäť</a>';
                $this->loadTemplate($this->loc, 'error', $data);
            }
        } else {
            $this->loadTemplate($this->loc, 'default');
        }
    }

    public function autoLoginAction(): void
    {
        $rest = new Rest();
        $dnt = new Dnt();
        $session = new Sessions();
        $session->init();
        
        if (isset($_SERVER['HTTP_REFERER']) && $this->dnt->in_string(DOMAIN, $_SERVER['HTTP_REFERER'])) {
            $vendor_id = $rest->get('id_entity');
            $email = $rest->get('admin_id');
            if ($this->adminUser->emailExists($email, $vendor_id)) {
                $session->set('admin_logged', '1');
                $session->set('admin_id', $rest->get('admin_id'));
                $this->adminUser->updateDatetime($this->vendor->getId(), $rest->get('admin_id'));
                $dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . DEFAULT_MODUL_ADMIN);
            } else {
                $data['email'] = $email;
                $this->loadTemplate($this->loc, 'errorChangeDomain', $data);
            }
        } else {
            $dnt->redirect('index?src=' . DEFAULT_MODUL_ADMIN);
        }
    }
}
