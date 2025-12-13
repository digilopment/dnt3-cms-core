# DNT3 CMS Framework

**DNT3** je moderný PHP CMS framework postavený na MVC architektúre. Jedná sa o multi-domain a multi-vendor platformu určenú pre vývoj webových aplikácií a e-commerce riešení.

**Verzia:** 7.1.4 (January 2019)  
**Autor:** Digilopment  
**Architektúra:** Model-View-Controller (MVC)  
**PHP Verzia:** 8.2+ (kompatibilné s PHP 8.4)

---

## 📋 Obsah

- [Hlavné vlastnosti](#hlavné-vlastnosti)
- [Požiadavky](#požiadavky)
- [Inštalácia](#inštalácia)
- [Konfigurácia](#konfigurácia)
- [Štruktúra projektu](#štruktúra-projektu)
- [Použitie](#použitie)
- [Vývoj](#vývoj)
- [API](#api)
- [Príspevky](#príspevky)
- [Licencia](#licencia)

---

## ✨ Hlavné vlastnosti

### CMS Funkcie
- ✅ **Kompletný CMS systém** - správa obsahu, stránok a článkov
- ✅ **Multi-upload súborov** - hromadné nahrávanie obrázkov a dokumentov
- ✅ **Galerie** - správa obrázkových galérií
- ✅ **Sitemapa** - automatické generovanie Google Sitemap
- ✅ **SEO nástroje** - optimalizácia pre vyhľadávače

### Platforma
- 🌐 **Multi-Domain Platform** - podpora viacerých domén v jednom systéme
- 🏢 **Multi-Vendor Platform** - podpora viacerých vendorov (obchodníkov)
- 🌍 **Vícejazyčnosť** - plná podpora pre viacero jazykov
- 📱 **Responsive Design** - responzívne šablóny

### E-commerce
- 🛒 **E-shop modul** - kompletný e-commerce systém
- 📦 **Správa produktov** - kategórie, varianty, ceny
- 🛒 **Košík a objednávky** - správa objednávok a faktúr
- 💳 **Platobné metódy** - integrácia platobných brán

### Komunikácia
- 📧 **Email klient** - interný email systém
- 📨 **SendGrid integrácia** - odosielanie emailov cez SendGrid
- 📱 **Messenger Platform** - integrácia s Messenger API
- 📊 **Newsletter systém** - správa emailových kampaní

### Ďalšie funkcie
- 📊 **Ankety a kvízy** - vytváranie ankiet a kvízov
- 📄 **PDF generátor** - generovanie PDF dokumentov
- 📈 **Štatistiky** - analýza návštevnosti
- 🔐 **Správa používateľov** - používateľské účty a oprávnenia
- 🎨 **Skeleton aplikácia** - východiskový bod pre programátorov

---

## 🔧 Požiadavky

### Serverové požiadavky
- **PHP:** 8.2 alebo vyššia (testované na PHP 8.4)
- **MySQL/MariaDB:** 5.7 alebo vyššia
- **Apache:** 2.4+ s mod_rewrite
- **Rozšírenia PHP:**
  - mysqli
  - pdo_mysql
  - gd
  - mbstring
  - xml
  - json
  - curl

### Odporúčané
- **Memcached** - pre cachovanie session
- **Composer** - pre správu závislostí (voliteľné)

---

## 🚀 Inštalácia

### Inštalácia cez Git Clone

```bash
# Klonovanie repozitára
git clone https://github.com/designdnt/cms-designdnt3 dnt3

# Prechod do zložky projektu
cd dnt3

# Nastavenie oprávnení pre cache a logy
chmod -R 755 dnt-cache dnt-logs dnt-backup
```

### Inštalácia cez Docker (Odporúčané)

Projekt obsahuje Docker konfiguráciu v `docker/` priečinku:

```bash
cd docker
sudo sh up -d
```

Docker setup automaticky:
- Nastaví Apache server
- Nakonfiguruje MySQL/MariaDB
- Nastaví PHPMyAdmin na porte 8080
- Vytvorí potrebné siete a volumes

### Inštalácia na XAMPP (Windows)

1. Stiahnite projekt zo GitHubu
2. Rozbalte do `C:\xampp\htdocs\dnt3\`
3. Upravte `config.dnt` - nastavte databázové prihlasovacie údaje
4. Importujte databázu cez phpMyAdmin
5. Otvorte `http://localhost/dnt3/`

### Inštalácia databázy

```bash
cd docker/import
sudo sh import.sh dnt3 dnt3.sql
```

Alebo manuálne cez phpMyAdmin:
- Otvorte `http://localhost:8080`
- Prihláste sa (host: `mysql`, user: `root`, pass: `root`)
- Vytvorte databázu `dnt3`
- Importujte SQL súbor

---

## ⚙️ Konfigurácia

### Hlavný konfiguračný súbor: `config.dnt`

```php
// Databázové pripojenie
define('DB_HOST', 'mysql');      // Host databázy
define('DB_USER', 'root');       // Používateľ databázy
define('DB_PASS', 'root');       // Heslo databázy
define('DB_NAME', 'dnt3');       // Názov databázy

// Aplikačné nastavenia
define('WWW_FOLDERS', "/dnt3");  // Cesta k aplikácii (prázdne pre root)
define('DEAFULT_MODUL', 'default');           // Východiskový modul
define('DEFAULT_MODUL_ADMIN', 'settings');     // Východiskový admin modul
```

### Nastavenie virtualhostu

Pre lokálny vývoj upravte `/etc/hosts`:

```
127.0.0.1 xampp.loc
127.0.0.1 phpmyadmin.cloud.loc
```

### Nastavenie PHP

Konfigurácia PHP sa nachádza v `docker/images/apache2/php.ini`:
- MAX UPLOAD: 200M
- Session ukladanie do Memcached (pre multi-instance podporu)

---

## 📁 Štruktúra projektu

```
dnt3/
├── index.php                 # Hlavný vstupný bod (frontend)
├── config.dnt                # Hlavný konfiguračný súbor
├── dnt-admin/               # Administračný panel
│   ├── index.php            # Admin vstupný bod
│   ├── app/                 # Admin aplikácia
│   └── modules/             # Admin moduly
├── dnt-api/                 # API endpointy
├── dnt-library/             # Framework knižnica
│   └── framework/
│       ├── app/             # Aplikačná vrstva
│       └── _Class/          # Základné triedy
├── dnt-view/                # Šablóny a layouty
│   └── layouts/            # Layouty pre rôzne projekty
├── dnt-modules/             # Frontend moduly
├── dnt-jobs/                # Background joby
├── dnt-cache/               # Cache súbory
├── dnt-logs/                # Log súbory
└── dnt-backup/              # Zálohy
```

### Kľúčové adresáre

- **dnt-admin/** - Administračný panel pre správu obsahu
- **dnt-library/** - Core framework a triedy
- **dnt-view/layouts/** - Frontend šablóny a layouty
- **dnt-modules/** - Frontend moduly (kontrolery)
- **dnt-api/** - REST API endpointy
- **dnt-jobs/** - Naplánované úlohy a batch procesy

---

## 💻 Použitie

### Základné použitie

```php
// Vytvorenie nového modulu
class MyModuleController extends BaseController
{
    public function run()
    {
        $data = $this->frontendData->get();
        $this->modulConfigurator($data, 'my_module');
    }
}
```

### Práca s databázou

```php
use DntLibrary\Base\DB;

$db = new DB();
$query = "SELECT * FROM dnt_posts WHERE show > 0";
$results = $db->get_results($query);
```

### Práca s obsahom

```php
use DntLibrary\Base\ArticleView;

$articleView = new ArticleView();
$posts = $articleView->getPosts('product');
```

### Práca s nastaveniami

```php
use DntLibrary\Base\Settings;

$settings = new Settings();
$title = $settings->get('title');
```

---

## 🛠️ Vývoj

### Vytvorenie nového modulu

1. Vytvorte kontroler v `dnt-view/layouts/{layout}/modules/{module_name}/`
2. Vytvorte šablónu v `dnt-view/layouts/{layout}/modules/{module_name}/tpl.php`
3. Vytvorte konfiguračný súbor `Plugins.shell` (voliteľné)

### Vytvorenie nového pluginu

1. Vytvorte plugin kontroler v `dnt-view/layouts/{layout}/plugins/{plugin_name}/`
2. Rozšírte triedu `Plugin`
3. Implementujte metódy `init()` a `run()`

### Vytvorenie admin modulu

1. Vytvorte kontroler v `dnt-admin/modules/{module_name}/`
2. Rozšírte triedu `AdminController`
3. Implementujte action metódy (`indexAction()`, `editAction()`, atď.)

### PHP 8.4 Kompatibilita

Projekt je refaktorovaný pre PHP 8.4:
- ✅ Všetky dynamické vlastnosti sú deklarované
- ✅ Type hints a return types
- ✅ Opravené deprecated funkcie
- ✅ Lepšia error handling

---

## 🔌 API

### REST API Endpointy

API endpointy sa nachádzajú v `dnt-api/`:

- `/dnt-api/` - Hlavný API vstupný bod
- `/dnt-api/sitemap` - Generovanie sitemapy
- `/dnt-api/send-mail` - Odosielanie emailov
- `/dnt-api/analytics-newsletters` - Analytics pre newsletter

### Príklad API volania

```php
use DntLibrary\Base\Rest;

$rest = new Rest();
$action = $rest->get('action');
$data = $rest->post('data');
```

---

## 📚 Dokumentácia

- [REPOSITORY_MAP.md](REPOSITORY_MAP.md) - Detailná mapa repozitára
- [REFACTORING_CHANGES.md](REFACTORING_CHANGES.md) - Zmeny pre PHP 8.4
- [PHP84_REFACTORING_PROGRESS.md](PHP84_REFACTORING_PROGRESS.md) - Progress refaktoringu
- [MULTILINGUAL_SETUP_GUIDE.md](MULTILINGUAL_SETUP_GUIDE.md) - Nastavenie vícejazyčnosti

---

## 🤝 Príspevky

Príspevky sú vítané! Pre prispievanie:

1. Forknite repozitár
2. Vytvorte feature branch (`git checkout -b feature/AmazingFeature`)
3. Commitnite zmeny (`git commit -m 'Add some AmazingFeature'`)
4. Pushnite do branchu (`git push origin feature/AmazingFeature`)
5. Otvorte Pull Request

### Coding Standards

- Dodržiavajte PSR-12 coding standard
- Pridajte type hints kde je to možné
- Dokumentujte komplexnejšie funkcie
- Testujte zmeny pred commitom

---

## 📝 Licencia

Tento projekt je proprietárny softvér vyvinutý spoločnosťou Digilopment.

---

## 🆘 Podpora

Pre otázky a podporu:
- **GitHub Issues:** [Vytvorte issue na GitHub](https://github.com/designdnt/cms-designdnt3/issues)
- **Dokumentácia:** Pozrite si dokumentáciu v projekte
- **Email:** Kontaktujte Digilopment

---

## 🎯 Roadmap

- [ ] PHP 8.4 full compatibility
- [ ] Modernizácia admin rozhrania
- [ ] Pridanie unit testov
- [ ] Docker Compose vylepšenia
- [ ] API dokumentácia (OpenAPI/Swagger)

---

## 📊 Verzie

- **7.1.4** (January 2019) - Aktuálna verzia
- Kompatibilné s PHP 8.2+
- Refaktorované pre PHP 8.4

---

**Vytvorené s ❤️ tímom Digilopment**
