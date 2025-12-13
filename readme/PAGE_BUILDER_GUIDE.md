# Page Builder - Kompletná dokumentácia DNT3 CMS

Tento dokument popisuje, ako funguje **Page Builder** systém v DNT3 CMS. Page Builder umožňuje vytvárať stránky pomocou modulárneho systému pluginov a layoutov.

---

## 📋 Obsah

1. [Prehľad Page Builder systému](#prehľad-page-builder-systému)
2. [Ako funguje Page Builder](#ako-funguje-page-builder)
3. [Architektúra systému](#architektúra-systému)
4. [Plugins.shell - Konfigurácia stránky](#pluginsshell---konfigurácia-stránky)
5. [Layout systém](#layout-systém)
6. [Plugin systém](#plugin-systém)
7. [Cachovanie](#cachovanie)
8. [Príklady a use cases](#príklady-a-use-cases)
9. [Best Practices](#best-practices)

---

## 🎯 Prehľad Page Builder systému

**Page Builder** v DNT3 je modulárny systém na vytváranie stránok pomocou:

- **Modulov** - kontrolerov, ktoré spracovávajú konkrétny typ stránky
- **Pluginov** - znovupoužiteľných komponentov, ktoré renderujú konkrétne časti stránky
- **Layoutov** - HTML šablón s placeholdermi, kde sa pluginy zobrazujú
- **Plugins.shell** - XML konfigurácie, ktorá definuje, ktoré pluginy sa použijú a kde

### Základný princíp

```
URL Request → Modul (Controller) → Plugins.shell (XML) → Pluginy → Layout → HTML Output
```

---

## 🔄 Ako funguje Page Builder

### 1. Tok požiadavky

```
1. Používateľ navštívi URL: /homepage
2. Router identifikuje modul: homepage
3. Modul načíta Plugins.shell XML konfiguráciu
4. Pre každý plugin v XML:
   - Načíta sa plugin kontroler
   - Spustí sa init() metóda
   - Spustí sa run() metóda
   - Renderuje sa HTML
5. Všetky HTML výstupy sa zoskupia podľa layout pozícií
6. Layout placeholdery sa nahradia HTML obsahom
7. Výsledná HTML stránka sa zobrazí
```

### 2. Príklad toku

**URL:** `/homepage`

**Modul:** `HomepageController`

**Plugins.shell:**
```xml
<PLUGIN name="layout">
   <VAR id="layout" value="LAYOUT" />
   <VAR id="tpl" value="layout_homepage" />
</PLUGIN>
<PLUGIN name="slider">
   <VAR id="layout" value="TOP-CONTENT" />
   <VAR id="tpl" value="slider" />
</PLUGIN>
```

**Výsledok:**
- Plugin `slider` sa renderuje a jeho HTML sa vloží na pozíciu `TOP-CONTENT`
- Layout `layout_homepage` sa použije ako hlavná šablóna
- Placeholder `<!TOP-CONTENT!>` sa nahradí HTML z pluginu `slider`

---

## 🏗️ Architektúra systému

### Komponenty

```
┌─────────────────────────────────────────┐
│         BaseController                  │
│  - modulConfigurator()                 │
│  - bodyParser()                        │
│  - getTemplateToString()               │
└─────────────────────────────────────────┘
              │
              ├─── Modul (HomepageController)
              │    └─── run() → modulConfigurator()
              │
              └─── Plugin System
                   ├─── Global Plugins (plugins/)
                   └─── Local Plugins (modules/*/plugins/)
```

### Súbory a ich úlohy

| Súbor | Úloha |
|-------|-------|
| `BaseController.php` | Základná trieda s logikou page buildera |
| `Plugin.php` | Základná trieda pre všetky pluginy |
| `Plugins.shell` | XML konfigurácia pluginov pre modul |
| `layout.php` | Hlavná HTML šablóna s placeholdermi |
| `*PluginControll.php` | Kontroler pluginu |
| `tpl.php` | HTML šablóna pluginu |

---

## 📝 Plugins.shell - Konfigurácia stránky

**Plugins.shell** je XML súbor, ktorý definuje:
- Ktoré pluginy sa použijú
- V akom poradí
- Kde sa zobrazia (layout pozícia)
- Ako sa cachujú
- Vlastné parametre pre pluginy

### Štruktúra XML

```xml
<?xml version="1.0" encoding="UTF-8"?>
<MODULE cache="1">
   <PLUGIN name="nazov_pluginu">
      <VAR id="id" value="unikatny_id" />
      <VAR id="layout" value="POZICIA_V_LAYOUTE" />
      <VAR id="level" value="global|local" />
      <VAR id="cache" value="1Y" />
      <VAR id="tpl" value="nazov_sablony" />
      <VAR id="type" value="mdl" />
      <!-- Vlastné parametre -->
      <VAR id="post_cat_id" value="123" />
   </PLUGIN>
</MODULE>
```

### Parametre pluginov

#### Povinné parametre

| Parameter | Popis | Príklady |
|-----------|-------|----------|
| `id` | Unikátny identifikátor pluginu | `slider`, `navigation` |
| `layout` | Pozícia v layoute | `LAYOUT`, `TOP-CONTENT`, `MAIN-CONTENT` |
| `tpl` | Názov šablóny | `slider`, `layout_homepage` |

#### Voliteľné parametre

| Parameter | Popis | Hodnoty |
|-----------|-------|---------|
| `level` | Úroveň pluginu | `global` (pre všetky moduly), `local` (len tento modul) |
| `cache` | Doba cachovania | `1Y` (1 rok), `1H` (1 hodina), `0Y` (bez cache) |
| `cache_id` | Identifikátor cache | `POST_ID`, `WEBHOOK{1}`, `GET{id}` |
| `compress` | Kompresia HTML | `1` (áno), `0` (nie) |
| `type` | Typ pluginu | `mdl` (modul plugin) |

#### Vlastné parametre

Môžete pridať ľubovoľné vlastné parametre:

```xml
<VAR id="post_cat_id" value="303" />
<VAR id="items_per_page" value="10" />
<VAR id="show_title" value="1" />
```

Tieto parametre sú dostupné v plugine cez `$this->env('post_cat_id')`.

### Príklad kompletný Plugins.shell

```xml
<?xml version="1.0" encoding="UTF-8"?>
<MODULE cache="1">
   <!-- Layout plugin - hlavná šablóna -->
   <PLUGIN name="layout">
      <VAR id="id" value="layout" />
      <VAR id="layout" value="LAYOUT" />
      <VAR id="level" value="global" />
      <VAR id="cache" value="1Y" />
      <VAR id="cache_id" value="POST_ID" />
      <VAR id="compress" value="1" />
      <VAR id="tpl" value="layout_homepage" />
   </PLUGIN>
   
   <!-- Top plugin - hlavička -->
   <PLUGIN name="top">
      <VAR id="id" value="top" />
      <VAR id="layout" value="HEAD-CONTENT" />
      <VAR id="level" value="global" />
      <VAR id="cache" value="1Y" />
      <VAR id="compress" value="1" />
      <VAR id="type" value="mdl" />
      <VAR id="tpl" value="top" />
   </PLUGIN>
   
   <!-- Slider plugin - lokálny plugin -->
   <PLUGIN name="slider">
      <VAR id="id" value="slider" />
      <VAR id="name" value="slider" />
      <VAR id="layout" value="TOP-CONTENT" />
      <VAR id="level" value="local" />
      <VAR id="cache" value="1Y" />
      <VAR id="cache_id" value="POST_ID" />
      <VAR id="compress" value="1" />
      <VAR id="type" value="mdl" />
      <VAR id="tpl" value="slider" />
      <VAR id="template" value="tpl" />
      <VAR id="post_cat_id" value="303" />
   </PLUGIN>
   
   <!-- Posts plugin -->
   <PLUGIN name="posts">
      <VAR id="id" value="posts" />
      <VAR id="layout" value="SECTIONS" />
      <VAR id="level" value="local" />
      <VAR id="cache" value="0Y" />
      <VAR id="type" value="mdl" />
      <VAR id="tpl" value="posts" />
   </PLUGIN>
   
   <!-- Footer plugin -->
   <PLUGIN name="footer">
      <VAR id="id" value="footer" />
      <VAR id="layout" value="FOOTER-CONTENT" />
      <VAR id="level" value="global" />
      <VAR id="cache" value="1Y" />
      <VAR id="type" value="mdl" />
      <VAR id="tpl" value="footer" />
   </PLUGIN>
</MODULE>
```

---

## 🎨 Layout systém

Layout je HTML šablóna s **placeholdermi**, kde sa zobrazujú pluginy.

### Placeholdery

Placeholdery majú formát: `<!NAZOV-POZICIE!>`

**Štandardné placeholdery:**

| Placeholder | Popis | Príklad použitia |
|-------------|-------|------------------|
| `<!HEAD-CONTENT!>` | Obsah hlavičky (meta tagy, CSS) | `<head>...</head>` |
| `<!COLORS-CONTENT!>` | CSS premenné pre farby | `<style>...</style>` |
| `<!METRICS-CONTENT!>` | CSS premenné pre metriky | `<style>...</style>` |
| `<!TOP-CONTENT!>` | Horná časť stránky (navigácia) | `<header>...</header>` |
| `<!MAIN-CONTENT!>` | Hlavný obsah | `<main>...</main>` |
| `<!SECTIONS!>` | Sekcie stránky | `<section>...</section>` |
| `<!FOOTER-CONTENT!>` | Pätička | `<footer>...</footer>` |
| `<!BOTTOM-CONTENT!>` | JavaScript na konci | `<script>...</script>` |

### Príklad layoutu

**plugins/layout_homepage.php:**

```php
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <!HEAD-CONTENT!>
</head>
<body>
    <!COLORS-CONTENT!>
    <!METRICS-CONTENT!>
    
    <div class="header">
        <!TOP-CONTENT!>
    </div>
    
    <div class="container">
        <!SECTIONS!>
    </div>
    
    <div class="main-content">
        <!MAIN-CONTENT!>
    </div>
    
    <footer>
        <!FOOTER-CONTENT!>
    </footer>
    
    <!BOTTOM-CONTENT!>
</body>
</html>
```

### Ako sa placeholdery nahradzujú

1. **bodyParser()** načíta všetky pluginy z `Plugins.shell`
2. Pre každý plugin sa renderuje HTML
3. HTML sa zoskupí podľa `layout` hodnoty
4. Placeholdery sa nahradia pomocou `preg_replace()`:

```php
// V BaseController::bodyParser()
$html = preg_replace($layouts, $templates, $layout);
```

**Príklad:**

```php
// Layout obsahuje:
<!TOP-CONTENT!>

// Pluginy s layout="TOP-CONTENT" sa zoskupia:
$templates = [
    '<nav>...</nav>',      // z navigation pluginu
    '<div class="slider">...</div>'  // z slider pluginu
];

// Placeholder sa nahradí:
<!TOP-CONTENT!> → <nav>...</nav><div class="slider">...</div>
```

---

## 🔌 Plugin systém

Plugin je znovupoužiteľná komponenta, ktorá renderuje konkrétnu časť stránky.

### Typy pluginov

#### 1. Global Plugins

**Umiestnenie:** `plugins/`

**Použitie:** Vo všetkých moduloch

**Príklad:** `plugins/navigation/NavigationPluginControll.php`

```php
<?php

namespace DntView\Layout\Modul\Plugin;

use DntLibrary\App\Plugin;
use DntLibrary\Base\Settings;

class NavigationPluginControll extends Plugin
{
    protected $loc = __FILE__;
    protected $data;
    protected $pluginId;
    protected $settings;

    public function __construct($data, $pluginId)
    {
        parent::__construct($data, $pluginId);
        $this->data = $data;
        $this->pluginId = $pluginId;
        $this->settings = new Settings();
    }

    public function init()
    {
        // Inicializácia - volá sa pred run()
    }

    public function run()
    {
        $data = $this->data;
        $data['menu_items'] = $this->data['menu_items'];
        
        // Renderovanie šablóny
        $this->layout($this->loc, 'tpl', $data);
    }
}
```

#### 2. Local Plugins

**Umiestnenie:** `modules/{modul}/plugins/`

**Použitie:** Len v konkrétnom module

**Príklad:** `modules/homepage/plugins/slider/SliderPluginControll.php`

```php
<?php

namespace DntView\Layout\Modul\Plugin;

use DntLibrary\App\Plugin;
use DntLibrary\Base\DB;
use DntLibrary\Base\Image;
use DntLibrary\Base\Vendor;

class SliderPluginControll extends Plugin
{
    protected $loc = __FILE__;
    protected $data;
    protected $pluginId;
    
    protected $db;
    protected $image;
    protected $vendor;
    protected $postsModel;
    protected $finalItems;

    public function __construct($data, $pluginId)
    {
        parent::__construct($data, $pluginId);
        $this->data = $data;
        $this->pluginId = $pluginId;
        $this->db = new DB();
        $this->image = new Image();
        $this->vendor = new Vendor();
    }

    public function init()
    {
        // Získanie parametra z konfigurácie
        $postCatId = (int) $this->env('post_cat_id');
        
        // Načítanie dát z databázy
        $query = "SELECT * FROM dnt_posts 
                  WHERE cat_id = '{$postCatId}' 
                  AND `show` > 0 
                  ORDER BY `order` ASC";
        
        if ($this->db->num_rows($query) > 0) {
            $this->postsModel = $this->db->get_results($query);
        }
        
        // Príprava dát
        $this->prepareItems();
    }

    protected function prepareItems()
    {
        $final = [];
        foreach ($this->postsModel as $key => $item) {
            $final[$key] = $item;
            $final[$key]['image'] = $this->image->getPostImage(
                $item['id_entity'], 
                null, 
                Image::MEDIUM
            );
        }
        $this->finalItems = $final;
    }

    public function run()
    {
        $data = $this->data;
        $data['items'] = $this->finalItems;
        $data['plugin_id'] = $this->pluginId;
        
        // Renderovanie šablóny
        $this->layout($this->loc, 'tpl', $data);
    }
}
```

### Šablóna pluginu (tpl.php)

**Umiestnenie:** `plugins/{plugin}/tpl.php` alebo `modules/{modul}/plugins/{plugin}/tpl.php`

**Príklad:** `modules/homepage/plugins/slider/tpl.php`

```php
<div class="slider-container">
    <?php
    if (isset($data['plugin_data']['items']) && !empty($data['plugin_data']['items'])) {
        foreach ($data['plugin_data']['items'] as $item) {
            ?>
            <div class="slide">
                <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                <div class="slide-content">
                    <h2><?php echo $item['name']; ?></h2>
                    <?php if (!empty($item['perex'])) { ?>
                        <p><?php echo $item['perex']; ?></p>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
```

### Prístup k dátam v plugine

```php
// Získanie dát z modulu
$data = $this->data;

// Prístup k nastaveniam
$settings = new Settings();
$title = $settings->get('title');

// Prístup k konfigurácii pluginu (z Plugins.shell)
$postCatId = $this->env('post_cat_id');
$itemsPerPage = $this->env('items_per_page');

// Prístup k webhook parametrom
$rest = new Rest();
$id = $rest->webhook(3);  // 3. parameter z URL

// Prístup k GET parametrom
$page = $rest->get('page');

// Prístup k POST dátam
$post = new Post();
$postData = $post->get();
```

---

## 💾 Cachovanie

Page Builder podporuje pokročilé cachovanie pluginov.

### Typy cache

#### 1. Cache podľa času

| Formát | Popis | Príklad |
|--------|-------|---------|
| `1S` | 1 sekunda | `cache="1S"` |
| `1M` | 1 minúta | `cache="1M"` |
| `1H` | 1 hodina | `cache="1H"` |
| `1D` | 1 deň | `cache="1D"` |
| `1W` | 1 týždeň | `cache="1W"` |
| `1N` | 1 mesiac (30 dní) | `cache="1N"` |
| `1Y` | 1 rok | `cache="1Y"` |
| `0Y` | Bez cache | `cache="0Y"` |

#### 2. Cache podľa ID

**cache_id parametre:**

| Hodnota | Popis |
|---------|-------|
| `POST_ID` | Cache podľa ID príspevku |
| `WEBHOOK{1}` | Cache podľa webhook parametra (1. parameter) |
| `GET{id}` | Cache podľa GET parametra `id` |
| `POST_ID-WEBHOOK{1}` | Kombinácia viacerých ID |

**Príklad:**

```xml
<PLUGIN name="product_detail">
   <VAR id="cache" value="1Y" />
   <VAR id="cache_id" value="POST_ID" />
</PLUGIN>
```

Tento plugin sa cachuje na 1 rok, ale cache sa invaliduje pre každý iný produkt (POST_ID).

### Ako funguje cache

1. **Vytvorenie cache:**
   - Plugin sa renderuje
   - HTML sa uloží do `dnt-cache/plugins/{cache_name}.generated`
   - Ak je `compress="1"`, HTML sa minifikuje

2. **Čítanie cache:**
   - Kontrola, či existuje cache súbor
   - Kontrola, či cache nie je expirovaná
   - Ak je platná, načíta sa cache namiesto renderovania

3. **Invalidácia cache:**
   - Automaticky po expirácii času
   - Manuálne vymazaním súborov v `dnt-cache/plugins/`

### Príklad cachovania

```xml
<!-- Plugin bez cache -->
<PLUGIN name="dynamic_content">
   <VAR id="cache" value="0Y" />
</PLUGIN>

<!-- Plugin s cache na 1 hodinu -->
<PLUGIN name="static_menu">
   <VAR id="cache" value="1H" />
</PLUGIN>

<!-- Plugin s cache podľa POST_ID -->
<PLUGIN name="product_detail">
   <VAR id="cache" value="1Y" />
   <VAR id="cache_id" value="POST_ID" />
</PLUGIN>

<!-- Plugin s cache podľa webhook parametra -->
<PLUGIN name="category_list">
   <VAR id="cache" value="1D" />
   <VAR id="cache_id" value="WEBHOOK{1}" />
</PLUGIN>
```

---

## 📚 Príklady a use cases

### Príklad 1: Jednoduchá homepage

**Modul:** `HomepageController`

**Plugins.shell:**
```xml
<?xml version="1.0" encoding="UTF-8"?>
<MODULE cache="1">
   <PLUGIN name="layout">
      <VAR id="id" value="layout" />
      <VAR id="layout" value="LAYOUT" />
      <VAR id="tpl" value="layout_homepage" />
   </PLUGIN>
   
   <PLUGIN name="top">
      <VAR id="id" value="top" />
      <VAR id="layout" value="HEAD-CONTENT" />
      <VAR id="type" value="mdl" />
      <VAR id="tpl" value="top" />
   </PLUGIN>
   
   <PLUGIN name="hero">
      <VAR id="id" value="hero" />
      <VAR id="layout" value="TOP-CONTENT" />
      <VAR id="level" value="local" />
      <VAR id="type" value="mdl" />
      <VAR id="tpl" value="hero" />
      <VAR id="hero_post_id" value="123" />
   </PLUGIN>
   
   <PLUGIN name="footer">
      <VAR id="id" value="footer" />
      <VAR id="layout" value="FOOTER-CONTENT" />
      <VAR id="type" value="mdl" />
      <VAR id="tpl" value="footer" />
   </PLUGIN>
</MODULE>
```

**Výsledok:**
- Layout `layout_homepage` sa použije
- Plugin `top` sa zobrazí v `HEAD-CONTENT`
- Plugin `hero` sa zobrazí v `TOP-CONTENT`
- Plugin `footer` sa zobrazí v `FOOTER-CONTENT`

### Príklad 2: Stránka s viacerými sekciami

**Plugins.shell:**
```xml
<MODULE cache="1">
   <PLUGIN name="layout">
      <VAR id="layout" value="LAYOUT" />
      <VAR id="tpl" value="layout" />
   </PLUGIN>
   
   <!-- Sekcia 1: Slider -->
   <PLUGIN name="slider">
      <VAR id="layout" value="SECTIONS" />
      <VAR id="tpl" value="slider" />
      <VAR id="post_cat_id" value="303" />
   </PLUGIN>
   
   <!-- Sekcia 2: Featured Products -->
   <PLUGIN name="featured_products">
      <VAR id="layout" value="SECTIONS" />
      <VAR id="tpl" value="featured_products" />
      <VAR id="limit" value="6" />
   </PLUGIN>
   
   <!-- Sekcia 3: Blog Posts -->
   <PLUGIN name="blog_posts">
      <VAR id="layout" value="SECTIONS" />
      <VAR id="tpl" value="blog_posts" />
      <VAR id="limit" value="3" />
   </PLUGIN>
</MODULE>
```

**Výsledok:**
Všetky tri pluginy sa zobrazia v `<!SECTIONS!>` placeholderi v poradí, v akom sú definované v XML.

### Príklad 3: Dynamický obsah s cache

**Plugins.shell:**
```xml
<!-- Statický obsah - cache na 1 rok -->
<PLUGIN name="navigation">
   <VAR id="cache" value="1Y" />
   <VAR id="layout" value="TOP-CONTENT" />
</PLUGIN>

<!-- Dynamický obsah - bez cache -->
<PLUGIN name="user_cart">
   <VAR id="cache" value="0Y" />
   <VAR id="layout" value="TOP-CONTENT" />
</PLUGIN>

<!-- Obsah s cache podľa produktu -->
<PLUGIN name="product_detail">
   <VAR id="cache" value="1Y" />
   <VAR id="cache_id" value="POST_ID" />
   <VAR id="layout" value="MAIN-CONTENT" />
</PLUGIN>
```

---

## ✅ Best Practices

### 1. Organizácia pluginov

```
plugins/
├── navigation/          # Global plugin
│   ├── NavigationPluginControll.php
│   └── tpl.php
├── footer/             # Global plugin
│   ├── FooterPluginControll.php
│   └── tpl.php
└── layout.php         # Layout šablóna

modules/homepage/plugins/
├── slider/            # Local plugin
│   ├── SliderPluginControll.php
│   └── tpl.php
└── hero/
    ├── HeroPluginControll.php
    └── tpl.php
```

### 2. Cachovanie

- ✅ **Cache globálne pluginy** (navigácia, footer) na dlhú dobu (`1Y`)
- ✅ **Cache statický obsah** podľa POST_ID
- ❌ **Necachuj dynamický obsah** (košík, používateľské dáta)
- ✅ **Používaj cache_id** pre rôzne verzie obsahu

### 3. Názvoslovie

- ✅ **Konzistentné názvy:** `SliderPluginControll`, `NavigationPluginControll`
- ✅ **Popisné názvy:** `featured_products` namiesto `fp`
- ✅ **Namespace:** `DntView\Layout\Modul\Plugin`

### 4. Performance

- ✅ **Minimalizuj databázové dotazy** v pluginoch
- ✅ **Používaj cache** pre často sa meniace dáta
- ✅ **Komprimuj HTML** (`compress="1"`)
- ✅ **Optimalizuj obrázky** (používaj Image::MEDIUM, Image::SMALL)

### 5. Bezpečnosť

- ✅ **Escape output:** `htmlspecialchars()`, `$dnt->not_html()`
- ✅ **Validuj vstupy:** `(int) $this->env('id')`
- ✅ **SQL injection:** Používaj prepared statements alebo escape
- ✅ **XSS:** Nikdy nevypisuj nevalidovaný obsah

### 6. Debugging

```php
// V plugine môžete použiť:
var_dump($this->data);           // Všetky dáta
var_dump($this->env('param'));   // Konfigurácia pluginu
var_dump($GLOBALS['MODULE']);    // Aktuálny modul
```

### 7. Chybové hlásenia

```php
// V BaseController::modulConfigurator()
if (!file_exists($confFile)) {
    die('No config file found <b>' . $confFile . '</b>');
}

// V Plugin::layout()
if (!file_exists($file)) {
    die('layout ' . $layout . ' not exists');
}
```

---

## 🔍 Troubleshooting

### Plugin sa nezobrazuje

1. **Kontrola Plugins.shell:**
   - Je plugin správne definovaný v XML?
   - Má správny `layout` parameter?
   - Existuje súbor pluginu?

2. **Kontrola layoutu:**
   - Existuje placeholder v layoute?
   - Je placeholder správne napísaný? (`<!TOP-CONTENT!>`)

3. **Kontrola chýb:**
   - Skontroluj PHP error log
   - Skontroluj, či sa plugin správne inicializuje

### Cache sa neaktualizuje

1. **Vymazanie cache:**
   ```bash
   rm -rf dnt-cache/plugins/*
   ```

2. **Kontrola cache nastavení:**
   - Je `cache` parameter správne nastavený?
   - Je `cache_id` správne nastavený?

### Placeholder sa nenahradí

1. **Kontrola názvu:**
   - Placeholder musí presne zodpovedať `layout` parametru
   - `layout="TOP-CONTENT"` → `<!TOP-CONTENT!>`

2. **Kontrola poradia:**
   - Plugin musí byť definovaný pred použitím v layoute

---

## 📖 Zhrnutie

Page Builder v DNT3 je výkonný systém na vytváranie modulárnych stránok:

- ✅ **Modulárny:** Stránky sa skladajú z pluginov
- ✅ **Flexibilný:** Ľubovoľné usporiadanie pluginov
- ✅ **Výkonný:** Pokročilé cachovanie
- ✅ **Znovupoužiteľný:** Pluginy sa dajú použiť viackrát
- ✅ **Konfigurovateľný:** XML konfigurácia bez PHP kódu

**Kľúčové súbory:**
- `BaseController.php` - logika page buildera
- `Plugin.php` - základná trieda pluginov
- `Plugins.shell` - XML konfigurácia
- `layout.php` - HTML šablóna

**Kľúčové metódy:**
- `modulConfigurator()` - načítanie a spracovanie Plugins.shell
- `bodyParser()` - renderovanie pluginov a nahradenie placeholderov
- `init()` - inicializácia pluginu
- `run()` - hlavná logika pluginu

---

**Tip:** Začnite jednoduchým modulom s jedným pluginom a postupne pridávajte ďalšie komponenty!

