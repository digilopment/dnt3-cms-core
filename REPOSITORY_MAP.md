# Mapa repozitáře DNT3-WinPrizes

## Přehled projektu

**Designdnt3 (DNT3)** je PHP CMS framework postavený na MVC architektuře. Projekt je multi-domain platforma s podporou multi-vendor systému.

**Verze:** 7.1.4 (January 2019)  
**Autor:** Digilopment  
**Architektura:** Model-View-Controller (MVC)

---

## Struktura adresářů

### 📁 Kořenové soubory

```
/
├── index.php                    # Hlavní vstupní bod aplikace (frontend)
├── robots.php                   # Robots.txt handler
├── config.dnt                   # Hlavní konfigurační soubor
├── README.md                     # Dokumentace projektu
├── bitbucket-pipelines.yml      # CI/CD konfigurace
└── dump/                        # SQL dumpy databáze
```

### 📁 dnt-admin/ - Administrační rozhraní

Administrační panel pro správu obsahu a nastavení.

```
dnt-admin/
├── index.php                    # Vstupní bod admin panelu
├── app/                         # Admin aplikace
│   ├── AdminController.php
│   ├── Helper.php
│   ├── NavigationAdmin.php
│   ├── RouterAdmin.php
│   └── UserAdmin.php
├── modules/                     # Admin moduly
│   ├── access/                  # Správa přístupů
│   ├── api/                     # API endpointy
│   ├── categories/              # Správa kategorií
│   ├── content/                 # Správa obsahu (CMS)
│   ├── default/                 # Výchozí modul
│   ├── error/                   # Chybové stránky
│   ├── files/                   # Správa souborů
│   ├── forgotten-password/      # Obnova hesla
│   ├── gallery/                 # Správa galerií
│   ├── home/                    # Domovská stránka adminu
│   ├── invoices/                # Správa faktur a objednávek
│   ├── login/                   # Přihlášení
│   ├── logout/                  # Odhlášení
│   ├── mailer/                  # Emailová kampaň
│   ├── menucreator/             # Tvorba menu
│   ├── microweb/                # Microweb stránky
│   ├── multylanguage/           # Vícejazyčnost
│   ├── pdfgen/                  # Generování PDF
│   ├── polls/                   # Ankety a kvízy
│   ├── services/                # Služby
│   ├── settings/                # Nastavení systému
│   ├── statistics/              # Statistiky
│   ├── temporary-online/        # Dočasné online stránky
│   ├── user/                    # Správa uživatelů
│   ├── vendor/                  # Správa vendorů (multi-vendor)
│   └── vouchers/                # Správa voucherů
├── css/                         # Admin styly
├── js/                          # Admin JavaScript
├── img/                         # Admin obrázky
├── fonts/                       # Fonty
└── plugins/                     # Admin pluginy
```

### 📁 dnt-api/ - API endpointy

REST API pro externí komunikaci.

```
dnt-api/
├── index.php                    # API vstupní bod
├── AnalyticsNewsletters.php     # Analytics pro newsletter
├── CovidWorld.php               # COVID data API
├── CovidWorldBeta.php           # COVID data API (beta)
├── Datacruit.php                # Datacruit integrace
├── MailerService.php            # Email služba
├── MessengerPlatform.php        # Messenger platforma
├── Multi.php                    # Multi API
├── SendMail.php                 # Odesílání emailů
├── Sitemap.php                  # Generování sitemapy
├── UsaVidget.php                # USA widget
└── WeatherForecast.php          # Předpověď počasí
```

### 📁 dnt-jobs/ - Background joby

Skripty pro naplánované úlohy a batch zpracování.

```
dnt-jobs/
├── index.php                    # Jobs vstupní bod
├── AddTranslate.php             # Přidání překladů
├── ArrayDiffCsv.php             # Porovnání CSV polí
├── CompetitorsExport.php        # Export konkurentů
├── CovidWorld.php               # COVID data job
├── CreateImageFormats.php       # Vytváření formátů obrázků
├── DataExport.php               # Export dat
├── DbExport.php                 # Export databáze
├── DelOldCache.php              # Mazání starého cache
├── DelWrongLog.php              # Mazání chybných logů
├── FormExport.php               # Export formulářů
├── ImportEmails.php            # Import emailů
├── ImportMarkizaEmails.php      # Import Markiza emailů
├── JsonVariantsToPostVariants.php
├── ObchodZakazniciExport.php    # Export zákazníků obchodu
├── PrepareCacheByUrl.php       # Příprava cache podle URL
├── Recaching.php                # Re-caching
├── RemoveDuplicates.php         # Odstranění duplikátů
└── WebExport.php                # Web export
```

### 📁 dnt-library/ - Framework knihovna

Jádro frameworku DNT3.

```
dnt-library/
├── framework/
│   ├── app/                     # Hlavní aplikace třídy
│   │   ├── App.php              # Hlavní aplikace
│   │   ├── Bootstrap.php        # Bootstrap inicializace
│   │   ├── Client.php           # Klientská třída (multi-domain)
│   │   ├── Modul.php            # Modul systém
│   │   ├── Post.php             # Správa příspěvků
│   │   ├── Navigation.php       # Navigace
│   │   ├── Categories.php       # Kategorie
│   │   ├── Db.php               # Databázová vrstva
│   │   ├── Files.php            # Správa souborů
│   │   ├── Render.php           # Renderování
│   │   ├── Plugin.php           # Plugin systém
│   │   ├── Cart.php             # Košík
│   │   ├── Subscriber.php       # Odběratelé
│   │   ├── SendGrid.php        # SendGrid integrace
│   │   ├── Curl.php             # HTTP klient
│   │   ├── Data.php             # Data helper
│   │   ├── PostVariants.php     # Varianty příspěvků
│   │   ├── Stream.php           # Stream handler
│   │   ├── BaseController.php  # Základní controller
│   │   ├── AbstractUser.php     # Abstraktní uživatel
│   │   ├── AggrBuilder.php      # Agregace builder
│   │   ├── Autoload.php         # Autoloader
│   │   ├── Dnt3Oauth.php        # OAuth autentizace
│   │   ├── EasyCrypt.php       # Šifrování
│   │   ├── OpenSslCrypt.php    # OpenSSL šifrování
│   │   └── phpmailer/           # PHPMailer knihovna
│   │
│   ├── _Class/                  # Framework třídy
│   │   ├── Dnt.php              # Hlavní DNT třída
│   │   ├── DntLog.php           # Logování
│   │   ├── DntMailer.php        # Email klient
│   │   ├── Cache.php            # Cache systém
│   │   ├── Vendor.php           # Vendor systém
│   │   ├── Rest.php             # REST API
│   │   ├── Sessions.php         # Session management
│   │   ├── Install.php          # Instalační systém
│   │   ├── Autoload.php         # Autoloader
│   │   ├── Database.php         # Databázová třída
│   │   ├── xlsx/                # Excel čtení/zápis
│   │   ├── dompdf/              # PDF generování
│   │   ├── qr/                  # QR kód generování
│   │   └── [další utility třídy]
│   │
│   └── _keys/                   # API klíče a certifikáty
│       └── public.php
│
└── ckeditor/                    # CKEditor WYSIWYG editor
    ├── ckeditor.js
    ├── config.js
    ├── plugins/                 # CKEditor pluginy
    ├── lang/                    # Jazykové soubory
    └── skins/                   # Vzhledy editoru
```

### 📁 dnt-modules/ - Frontend moduly

Moduly pro frontend aplikaci.

```
dnt-modules/
├── auto_redirect/               # Automatické přesměrování
│   └── AutoRedirectModuleController.php
├── default/                     # Výchozí modul
│   └── DefaultModuleController.php
├── rpc/                         # RPC modul
│   └── RpcModuleController.php
├── static_redirect/             # Statické přesměrování
│   └── StaticRedirectModuleController.php
└── subscriber/                  # Odběratelský modul
    ├── SubscriberModuleController.php
    └── templates/
        └── default.php
```

### 📁 dnt-view/ - View vrstva

Šablony a layouty pro frontend.

```
dnt-view/
└── layouts/
    └── default/                 # Výchozí layout
        ├── Configurator.php     # Konfigurátor layoutu
        ├── css/                 # CSS soubory
        ├── js/                  # JavaScript soubory
        ├── modules/             # Moduly layoutu
        │   ├── default/         # Výchozí modul
        │   │   ├── DefaultController.php
        │   │   └── plugins/     # Pluginy modulu
        │   └── skeleton/        # Skeleton modul
        │       ├── SkeletonController.php
        │       └── plugins/
        └── plugins/              # Globální pluginy
            ├── layout.php
            └── bottom.php
```

### 📁 dnt-install/ - Instalační systém

Instalační skripty a SQL soubory.

```
dnt-install/
├── index.php                    # Instalační rozhraní
├── Aplication.php
├── Dnt3InstallScript.php       # Instalační skript
└── install.sql                  # SQL instalační skript
```

### 📁 dnt-system/ - Systémové soubory

```
dnt-system/
├── index.php                    # Systémový vstupní bod
└── Log.php                      # Systémové logování
```

### 📁 dnt-test/ - Testovací soubory

Testovací a vývojářské skripty.

```
dnt-test/
├── index.php
├── Call.php
├── Clienter.php
├── Curl.php
├── HtmlToPdf.php
├── ImageCreator.php
├── LogSeenFaker.php
├── Mailer.php
├── NewsletterCampaign.php
├── Oauth.php
├── OauthCurl.php
├── OpenSslCrypt.php
├── Pdf.php
├── Performance.php
├── Phpinfo.php
├── Pointer.php
├── SendGrid.php
├── SendGridV3.php
├── StreamContent.php
├── WeekNumber.php
└── templates/                   # Testovací šablony
```

### 📁 dnt-backup/ - Zálohy

```
dnt-backup/
└── readme.txt
```

### 📁 dnt-cache/ - Cache

```
dnt-cache/
├── readme.txt
└── temp/                        # Dočasné cache soubory
    └── readme.txt
```

### 📁 dnt-logs/ - Logy

```
dnt-logs/
└── readme.txt
```

### 📁 dnt-bin/ - Binární soubory

```
dnt-bin/
├── update.php                   # Update skript
└── update.sh                    # Update shell skript
```

---

## Architektura aplikace

### MVC Pattern

1. **Model** (`dnt-library/framework/app/`, `dnt-library/framework/_Class/`)
   - Databázová vrstva (`Db.php`, `Database.php`)
   - Business logika (`Post.php`, `Categories.php`, `Cart.php`)

2. **View** (`dnt-view/layouts/`, `dnt-admin/modules/*/templates/`)
   - Šablony a layouty
   - Frontend moduly

3. **Controller** (`dnt-modules/`, `dnt-admin/modules/*/`)
   - Modul controllery
   - Admin controllery

### Multi-Domain & Multi-Vendor

- **Multi-Domain:** Každá doména může mít vlastní konfiguraci
- **Multi-Vendor:** Podpora více vendorů v jednom systému
- **Client třída:** Spravuje multi-domain logiku (`Client.php`)

### Routing

- **Frontend:** Modul systém (`Modul.php`)
- **Admin:** Router admin (`RouterAdmin.php`)
- **API:** REST API (`Rest.php`)

### Cache systém

- Cache vrstva (`Cache.php`)
- Konfigurovatelné přes `config.dnt` (`IS_CACHING`)

### Plugin systém

- Plugin architektura (`Plugin.php`)
- Modulární pluginy v `dnt-view/layouts/*/plugins/`

---

## Konfigurace

### config.dnt - Hlavní konfigurační soubor

```php
// Databáze
DB_HOST, DB_USER, DB_PASS, DB_NAME

// Aplikace
WWW_FOLDERS                    # Složka aplikace
DEAFULT_MODUL                  # Výchozí modul
DEFAULT_MODUL_ADMIN            # Výchozí admin modul

// Cache
IS_CACHING                     # Zapnout/vypnout cache
CACHE_TIME_SEC                # Čas cache v sekundách

// Vývoj
MULTY_LANGUAGE                 # Vícejazyčnost
DEAFULT_LANG                   # Výchozí jazyk
DISPLAY_DEBUG                  # Zobrazit debug

// Email
SEND_EMAIL_VIA                 # internal / send_grid
SEND_GRID_API_KEY              # SendGrid API klíč

// Messenger
HUB_VERIFY_TOKEN               # Messenger verify token
ACCESS_TOKEN                   # Messenger access token
```

---

## Hlavní funkce

✅ **CMS** - Content Management System  
✅ **Multi-upload** - Více souborů najednou  
✅ **SendGrid** - Email klient  
✅ **Internal Mail** - Interní email klient  
✅ **Sitemap** - Automatické generování Google Sitemap  
✅ **Multi-Vendor** - Multi-vendor platforma  
✅ **Multi-Domain** - Multi-domain platforma  
✅ **Ankety a kvízy** - Polls systém  
✅ **Messenger Platform** - Facebook Messenger integrace  
✅ **Skeleton Application** - Základní aplikace pro vývoj  
✅ **Auto Install** - Jednokliková instalace  

---

## Databázová struktura

Hlavní tabulky (odvozeno z kódu):
- `dnt_posts` - Příspěvky/obsah
- `dnt_categories` - Kategorie
- `dnt_users` - Uživatelé
- `dnt_vendors` - Vendory
- `dnt_orders` - Objednávky
- `dnt_basket` - Košík
- `dnt_polls` - Ankety
- `dnt_vouchers` - Vouchery
- `dnt_logs` - Logy

---

## API endpointy

- `/dnt-api/` - Hlavní API endpoint
- `/dnt-api/SendMail.php` - Odesílání emailů
- `/dnt-api/Sitemap.php` - Generování sitemapy
- `/dnt-api/MessengerPlatform.php` - Messenger webhooky

---

## Spuštění aplikace

### Frontend
```
http://localhost/dnt3/
```

### Admin panel
```
http://localhost/dnt3/dnt-admin/
```

### API
```
http://localhost/dnt3/dnt-api/
```

### Jobs
```
http://localhost/dnt3/dnt-jobs/
```

---

## Vývojářské poznámky

- Framework používá vlastní autoloader
- Session management přes `Sessions.php`
- Multi-domain řešení přes `Client.php`
- Cache systém přes `Cache.php`
- Logování přes `DntLog.php`
- REST API přes `Rest.php`

---

## Bezpečnost

- OAuth autentizace (`Dnt3Oauth.php`)
- Šifrování (`EasyCrypt.php`, `OpenSslCrypt.php`)
- XSS ochrana (`DntXSSLoader`)
- Session management

---

*Mapa vytvořena: 2024*
*Verze frameworku: 7.1.4*

