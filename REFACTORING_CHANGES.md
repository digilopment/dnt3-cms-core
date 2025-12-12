# Refaktoring a vylepšení pro PHP 8.4

## Přehled změn

Tento dokument popisuje refaktoring kódu pro kompatibilitu s PHP 8.4 a vytvoření generického řešení pro admin moduly a API.

---

## 1. PHP 8.4 Kompatibilita

### 1.1 Oprava `mysql_real_escape_string`

**Soubor:** `dnt-library/framework/_Class/Dnt.php`

**Problém:** Použití deprecated funkce `mysql_real_escape_string` (odstraněno v PHP 7.0)

**Řešení:** Nahrazeno `mysqli_real_escape_string` s kontrolou existence mysqli připojení

```php
// PŘED
return $str = mysql_real_escape_string($str);

// PO
if (isset($GLOBALS['DATABASE']) && $GLOBALS['DATABASE'] instanceof \mysqli) {
    return $GLOBALS['DATABASE']->real_escape_string($str);
}
```

### 1.2 Přidání Type Hints a Return Types

**Soubor:** `dnt-library/framework/_Class/Dnt.php`

Přidány type hints a return types pro lepší kompatibilitu s PHP 8.4:

- `getLastId(string $table, $vendor_id = false): int|false`
- `getMaxValueFromColumn(string $table, string $column, bool $vendor_id = true): mixed|false`
- `getLastIdVendor(): int|false`
- `safe($str): string|array`

---

## 2. Generické řešení pro Admin Moduly

### 2.1 BaseAdminController

**Soubor:** `dnt-admin/app/BaseAdminController.php`

**Účel:** Základní controller s dependency injection pro všechny admin moduly

**Vlastnosti:**
- Automatická inicializace společných závislostí (DB, Rest, Webhook, Image, atd.)
- Metoda `getCommonData()` pro sdílení dat mezi šablonami
- Dědí z `AdminController`

**Použití:**
```php
class MyController extends BaseAdminController
{
    public function __construct()
    {
        parent::__construct();
        // Vlastní inicializace
    }
}
```

### 2.2 CrudTrait

**Soubor:** `dnt-admin/app/Traits/CrudTrait.php`

**Účel:** Trait s generickými CRUD operacemi pro eliminaci duplicitního kódu

**Metody:**
- `genericAdd()` - Generické přidání záznamu
- `genericUpdate()` - Generická aktualizace záznamu
- `genericDelete()` - Generické smazání záznamu
- `genericShowHide()` - Přepínání viditelnosti
- `genericMoveUp()` - Posun nahoru
- `genericMoveDown()` - Posun dolů
- `genericTrash()` - Přesun do koše (soft delete)
- `getRedirectUrl()` - Generování redirect URL

**Použití:**
```php
class MyController extends BaseAdminController
{
    use CrudTrait;
    
    public function addAction(): void
    {
        $this->genericAdd('my_table', [
            'field1' => $this->rest->get('value1'),
            'field2' => $this->rest->get('value2'),
        ]);
    }
    
    public function delAction(): void
    {
        $id = $this->rest->get('id');
        $this->genericDelete('my_table', $id);
        $this->dnt->redirect();
    }
}
```

### 2.3 Refaktorované moduly

#### ContentController
- Refaktorován na použití `BaseAdminController` a `CrudTrait`
- Eliminováno ~150 řádků duplicitního kódu
- Přidány type hints a return types

#### CategoriesController
- Refaktorován na použití `BaseAdminController` a `CrudTrait`
- Zjednodušeny CRUD operace
- Přidány type hints a return types

---

## 3. Generické řešení pro API

### 3.1 BaseApiController

**Soubor:** `dnt-api/BaseApiController.php`

**Účel:** Základní controller pro všechny API endpointy

**Vlastnosti:**
- Automatická inicializace závislostí
- Metody pro JSON odpovědi (`jsonResponse()`, `successResponse()`, `errorResponse()`)
- Validace požadovaných parametrů (`validateRequired()`)
- Kontrola HTTP metod (`getMethod()`, `isMethod()`)

**Použití:**
```php
class MyApi extends BaseApiController
{
    public function run(): void
    {
        if (!$this->validateRequired(['param1', 'param2'], $_GET)) {
            return; // Error response already sent
        }
        
        $this->successResponse(['data' => 'result']);
    }
}
```

### 3.2 Refaktorované API moduly

#### SendMailApi
- Refaktorován na použití `BaseApiController`
- Přidána validace vstupních parametrů
- Zlepšena struktura kódu
- Přidány type hints

---

## 4. Výhody refaktoringu

### 4.1 Eliminace duplicitního kódu
- **Před:** Každý controller měl vlastní implementaci CRUD operací (~50-100 řádků na operaci)
- **Po:** Jedna generická implementace v `CrudTrait` (~10 řádků na operaci)

### 4.2 Konzistence
- Všechny moduly používají stejný pattern
- Jednodušší údržba a debugging
- Snadnější onboarding nových vývojářů

### 4.3 Type Safety
- PHP 8.4 kompatibilní type hints
- Lepší IDE podpora
- Méně runtime chyb

### 4.4 Testovatelnost
- Generické metody jsou snadněji testovatelné
- Dependency injection usnadňuje mockování

---

## 5. Migrační průvodce

### 5.1 Migrace existujícího Admin Controlleru

**Krok 1:** Změnit dědičnost
```php
// PŘED
class MyController extends AdminController

// PO
class MyController extends BaseAdminController
```

**Krok 2:** Přidat CrudTrait
```php
use DntAdmin\App\Traits\CrudTrait;

class MyController extends BaseAdminController
{
    use CrudTrait;
}
```

**Krok 3:** Zjednodušit konstruktor
```php
// PŘED
public function __construct()
{
    $this->db = new DB();
    $this->rest = new Rest();
    // ... další inicializace
}

// PO
public function __construct()
{
    parent::__construct();
    // Pouze vlastní inicializace
}
```

**Krok 4:** Refaktorovat CRUD metody
```php
// PŘED
public function addAction()
{
    $insertedData = array(
        'vendor_id' => $this->vendor->getId(),
        'field1' => $this->rest->get('value1'),
        // ...
    );
    $this->db->dbTransaction();
    $this->db->insert('table', $insertedData);
    $this->db->dbCommit();
    // ...
}

// PO
public function addAction(): void
{
    $this->genericAdd('table', [
        'field1' => $this->rest->get('value1'),
    ]);
}
```

### 5.2 Migrace existujícího API Controlleru

**Krok 1:** Změnit dědičnost
```php
// PŘED
class MyApi
{
    public function __construct()
    {
        $this->rest = new Rest();
    }
}

// PO
class MyApi extends BaseApiController
{
    // Závislosti jsou automaticky inicializovány
}
```

**Krok 2:** Použít generické metody pro odpovědi
```php
// PŘED
echo json_encode(['success' => true, 'data' => $data]);

// PO
$this->successResponse($data);
```

---

## 6. Kompatibilita

### 6.1 Zpětná kompatibilita
- Všechny změny jsou zpětně kompatibilní
- Existující kód bude fungovat bez změn
- Nové moduly mohou postupně migrovat

### 6.2 PHP verze
- **Minimální:** PHP 7.4
- **Doporučená:** PHP 8.0+
- **Cílová:** PHP 8.4

---

## 7. Další kroky

### 7.1 Doporučené vylepšení
1. Migrovat všechny admin moduly na `BaseAdminController`
2. Migrovat všechny API moduly na `BaseApiController`
3. Přidat unit testy pro generické metody
4. Vytvořit dokumentaci pro každý modul

### 7.2 Optimalizace
1. Přidat caching pro často používané dotazy
2. Implementovat prepared statements místo escape string
3. Přidat logging pro debugování

---

## 8. Kontakt a podpora

Pro dotazy nebo problémy kontaktujte vývojový tým.

---

*Dokument vytvořen: 2024*
*Verze: 1.0*

