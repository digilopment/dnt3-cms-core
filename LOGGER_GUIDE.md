# Logger System - Dokumentácia DNT3 CMS

Globálny systém logovania pre DNT3 CMS, ktorý automaticky zachytáva a loguje všetky PHP errors, exceptions, warnings, notices a deprecated warnings.

---

## 📋 Obsah

1. [Prehľad](#prehľad)
2. [Automatické logovanie](#automatické-logovanie)
3. [Manuálne logovanie](#manuálne-logovanie)
4. [API dokumentácia](#api-dokumentácia)
5. [Príklady použitia](#príklady-použitia)
6. [Konfigurácia](#konfigurácia)

---

## 🎯 Prehľad

Logger systém automaticky:

- ✅ **Zachytáva PHP errors** (E_ERROR, E_WARNING, E_NOTICE, E_DEPRECATED)
- ✅ **Zachytáva exceptions** (uncaught exceptions)
- ✅ **Zachytáva fatal errors** (shutdown errors)
- ✅ **Loguje do súborov:**
  - `dnt-logs/exception.log` - errors, warnings, notices, deprecated, exceptions
  - `dnt-logs/info.log` - info správy

### Súbory

- `dnt-library/framework/_Class/Logger.php` - hlavná Logger trieda
- `dnt-library/framework/_Class/LoggerFunctions.php` - globálne funkcie
- Integrácia v `dnt-library/framework/app/Bootstrap.php`

---

## 🔄 Automatické logovanie

Logger sa automaticky inicializuje pri štarte aplikácie a zachytáva:

### 1. PHP Errors

Všetky PHP errors sa automaticky logujú do `exception.log`:

```php
// Toto sa automaticky zaloguje:
$undefined = $nonExistentVariable; // Notice: Undefined variable
```

### 2. Exceptions

Všetky uncaught exceptions sa automaticky logujú:

```php
// Toto sa automaticky zaloguje:
throw new Exception("Something went wrong");
```

### 3. Deprecated Warnings

Všetky deprecated warnings sa automaticky logujú:

```php
// Toto sa automaticky zaloguje:
class OldClass {
    public $dynamicProperty; // Deprecated: Creation of dynamic property
}
```

### 4. Fatal Errors

Fatal errors sa zachytávajú cez shutdown handler:

```php
// Toto sa automaticky zaloguje:
callUndefinedFunction(); // Fatal error: Call to undefined function
```

---

## 📝 Manuálne logovanie

Môžete manuálne logovať správy pomocou globálnych funkcií:

### Info logy

```php
// Logovanie info správ do info.log
dnt_log_info('User logged in', ['user_id' => 123, 'ip' => '192.168.1.1']);
dnt_log_info('Cache cleared');
dnt_log_info('Product created', ['product_id' => 456, 'name' => 'Test Product']);
```

### Exception/Error logy

```php
// Logovanie errors do exception.log
dnt_log_error('Database connection failed', ['host' => 'localhost', 'db' => 'mydb']);
dnt_log_warning('Low disk space', ['free_space' => '100MB']);
dnt_log_notice('Configuration loaded', ['config_file' => 'config.php']);
dnt_log_deprecated('Using old API method', ['method' => 'oldMethod()']);
dnt_log_exception('Custom exception', ['code' => 500]);
```

---

## 📚 API dokumentácia

### Globálne funkcie

Všetky funkcie sú dostupné v celom kóde bez potreby importovať triedy.

#### `dnt_log_info(string $message, array $context = [])`

Loguje info správu do `info.log`.

**Parametre:**
- `$message` - Správa na logovanie
- `$context` - Dodatočný kontext (voliteľné)

**Príklad:**
```php
dnt_log_info('User action', ['action' => 'login', 'user_id' => 123]);
```

#### `dnt_log_error(string $message, array $context = [])`

Loguje error do `exception.log`.

**Príklad:**
```php
dnt_log_error('Payment failed', ['order_id' => 789, 'amount' => 100]);
```

#### `dnt_log_warning(string $message, array $context = [])`

Loguje warning do `exception.log`.

**Príklad:**
```php
dnt_log_warning('API rate limit approaching', ['requests' => 95, 'limit' => 100]);
```

#### `dnt_log_notice(string $message, array $context = [])`

Loguje notice do `exception.log`.

**Príklad:**
```php
dnt_log_notice('Feature flag enabled', ['feature' => 'new_checkout']);
```

#### `dnt_log_deprecated(string $message, array $context = [])`

Loguje deprecated warning do `exception.log`.

**Príklad:**
```php
dnt_log_deprecated('Old method called', ['method' => 'oldMethod()', 'file' => 'OldClass.php']);
```

#### `dnt_log_exception(string $message, array $context = [])`

Loguje exception do `exception.log`.

**Príklad:**
```php
dnt_log_exception('Custom exception occurred', ['exception_type' => 'ValidationException']);
```

### Logger trieda (pokročilé použitie)

Ak potrebujete viac kontroly, môžete použiť Logger triedu priamo:

```php
use DntLibrary\Base\Logger;

$logger = Logger::getInstance();

// Zapnutie/vypnutie logovania
$logger->setEnabled(false); // Vypne logovanie
$logger->setEnabled(true);  // Zapne logovanie

// Metódy
$logger->info('Message', ['context' => 'data']);
$logger->error('Message', ['context' => 'data']);
$logger->warning('Message', ['context' => 'data']);
$logger->notice('Message', ['context' => 'data']);
$logger->deprecated('Message', ['context' => 'data']);
$logger->exception('Message', ['context' => 'data']);

// Získanie veľkosti logov
$sizes = $logger->getLogSize('all');
// ['exception' => 1024, 'info' => 2048]

// Vymazanie logov
$logger->clearLogs('exception'); // Vymaže exception.log
$logger->clearLogs('info');     // Vymaže info.log
$logger->clearLogs('all');       // Vymaže oba súbory
```

---

## 💡 Príklady použitia

### Príklad 1: Logovanie v kontroleri

```php
<?php

namespace DntView\Layout\Modul;

use DntLibrary\App\BaseController;

class HomepageController extends BaseController
{
    public function run()
    {
        try {
            // Váš kód
            dnt_log_info('Homepage loaded', ['module' => 'homepage']);
            
            // Ak sa vyskytne chyba, automaticky sa zaloguje
            $data = $this->loadData();
            
        } catch (\Exception $e) {
            // Exception sa automaticky zaloguje
            dnt_log_error('Failed to load homepage', [
                'error' => $e->getMessage(),
                'module' => 'homepage'
            ]);
        }
    }
}
```

### Príklad 2: Logovanie v plugine

```php
<?php

namespace DntView\Layout\Modul\Plugin;

use DntLibrary\App\Plugin;

class SliderPluginControll extends Plugin
{
    public function init()
    {
        dnt_log_info('Slider plugin initialized', [
            'plugin_id' => $this->pluginId,
            'post_cat_id' => $this->env('post_cat_id')
        ]);
        
        try {
            $this->loadPosts();
        } catch (\Exception $e) {
            dnt_log_error('Failed to load slider posts', [
                'error' => $e->getMessage(),
                'plugin_id' => $this->pluginId
            ]);
        }
    }
}
```

### Príklad 3: Logovanie v API

```php
<?php

// API endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    dnt_log_info('API request received', [
        'endpoint' => '/api/users',
        'method' => 'POST',
        'ip' => $_SERVER['REMOTE_ADDR']
    ]);
    
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!$data) {
            dnt_log_warning('Invalid JSON in API request', [
                'endpoint' => '/api/users'
            ]);
            http_response_code(400);
            return;
        }
        
        // Process request
        dnt_log_info('API request processed successfully', [
            'endpoint' => '/api/users',
            'user_id' => $data['user_id'] ?? null
        ]);
        
    } catch (\Exception $e) {
        dnt_log_error('API request failed', [
            'endpoint' => '/api/users',
            'error' => $e->getMessage()
        ]);
    }
}
```

### Príklad 4: Logovanie v databázových operáciách

```php
<?php

use DntLibrary\Base\DB;

$db = new DB();

try {
    $query = "SELECT * FROM dnt_posts WHERE id = " . (int)$id;
    $result = $db->get_results($query);
    
    dnt_log_info('Database query executed', [
        'query' => $query,
        'rows' => count($result)
    ]);
    
} catch (\Exception $e) {
    dnt_log_error('Database query failed', [
        'query' => $query,
        'error' => $e->getMessage()
    ]);
}
```

---

## ⚙️ Konfigurácia

### Formát logov

Každý log záznam obsahuje:

```
[2024-01-15 14:30:45] [ERROR] Database connection failed
  File: dnt-library/framework/_Class/Db.php:123
  Function: connect
  URL: GET /homepage
  IP: 192.168.1.1
  Context: {
    "host": "localhost",
    "db": "mydb",
    "error": "Access denied"
  }
  User-Agent: Mozilla/5.0...
--------------------------------------------------------------------------------
```

### Vypnutie logovania

Ak potrebujete vypnúť logovanie (napr. v produkcii pre performance):

```php
use DntLibrary\Base\Logger;

Logger::getInstance()->setEnabled(false);
```

### Automatické rotovanie logov

Logger automaticky zapisuje do súborov. Pre rotáciu logov použite externé nástroje:

```bash
# Príklad: logrotate konfigurácia
/dnt-logs/*.log {
    daily
    rotate 30
    compress
    delaycompress
    missingok
    notifempty
}
```

### Veľkosť logov

Kontrola veľkosti logov:

```php
use DntLibrary\Base\Logger;

$sizes = Logger::getInstance()->getLogSize('all');
echo "Exception log: " . ($sizes['exception'] / 1024) . " KB\n";
echo "Info log: " . ($sizes['info'] / 1024) . " KB\n";
```

---

## 🔍 Troubleshooting

### Logy sa nevytvárajú

1. **Kontrola oprávnení:**
   ```bash
   chmod 755 dnt-logs/
   chmod 644 dnt-logs/*.log
   ```

2. **Kontrola, či sa Logger inicializuje:**
   Skontrolujte, či sa Logger inicializuje v `Bootstrap.php`

3. **Kontrola, či je logovanie zapnuté:**
   ```php
   $logger = Logger::getInstance();
   var_dump($logger->enabled); // Malo by byť true
   ```

### Príliš veľa logov

Ak sa vytvára príliš veľa logov:

1. **Vypnite logovanie pre development:**
   ```php
   Logger::getInstance()->setEnabled(false);
   ```

2. **Filtrujte logy podľa úrovne:**
   Použite len `dnt_log_error()` a `dnt_log_exception()` v produkcii

### Logy obsahujú citlivé dáta

Ak logujete citlivé dáta, použite kontext s maskovaním:

```php
dnt_log_info('User login', [
    'user_id' => 123,
    'email' => substr($email, 0, 3) . '***', // Maskovanie emailu
    'password' => '***' // Nikdy nelogujte heslo!
]);
```

---

## ✅ Best Practices

1. **Logujte dôležité udalosti:**
   - User actions (login, logout, purchase)
   - API requests
   - Database operations
   - File operations

2. **Neprelogovávajte:**
   - Každý request (iba dôležité)
   - Citlivé dáta (heslá, kreditné karty)
   - Veľké objekty (iba summary)

3. **Používajte správne úrovne:**
   - `info` - normálne operácie
   - `warning` - potenciálne problémy
   - `error` - chyby, ktoré nebránia fungovaniu
   - `exception` - kritické chyby

4. **Pridávajte kontext:**
   ```php
   // Zlé
   dnt_log_error('Failed');
   
   // Dobré
   dnt_log_error('Payment processing failed', [
       'order_id' => $orderId,
       'user_id' => $userId,
       'amount' => $amount,
       'payment_method' => $method
   ]);
   ```

---

## 📖 Zhrnutie

Logger systém v DNT3 poskytuje:

- ✅ **Automatické logovanie** - všetky PHP errors, exceptions, warnings
- ✅ **Jednoduché API** - globálne funkcie `dnt_log_*()`
- ✅ **Structured logging** - formátované záznamy s kontextom
- ✅ **Dva typy logov** - `exception.log` a `info.log`
- ✅ **Globálna dostupnosť** - funguje v celom kóde

**Kľúčové funkcie:**
- `dnt_log_info()` - info logy
- `dnt_log_error()` - error logy
- `dnt_log_warning()` - warning logy
- `dnt_log_exception()` - exception logy
- `dnt_log_deprecated()` - deprecated warnings

**Súbory:**
- `dnt-logs/exception.log` - errors, warnings, exceptions
- `dnt-logs/info.log` - info správy

---

**Tip:** Vždy pridávajte kontext k logom, aby bolo jednoduchšie debugovať problémy!


