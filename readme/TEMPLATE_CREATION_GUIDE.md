# Návod na vytvorenie nového templateu v DNT3

Tento návod ukazuje, ako vytvoriť nový template (layout) v DNT3 CMS na základe existujúceho layoutu `bicykle-hlohovec`.

---

## 📋 Obsah

1. [Prehľad](#prehľad)
2. [Štruktúra adresárov](#štruktúra-adresárov)
3. [Krok 1: Vytvorenie základnej štruktúry](#krok-1-vytvorenie-základnej-štruktúry)
4. [Krok 2: Configurator.php](#krok-2-configuratorphp)
5. [Krok 3: Vytvorenie modulu](#krok-3-vytvorenie-modulu)
6. [Krok 4: Vytvorenie pluginu](#krok-4-vytvorenie-pluginu)
7. [Krok 5: Konfigurácia Plugins.shell](#krok-5-konfigurácia-pluginsshell)
8. [Krok 6: Layout súbory](#krok-6-layout-súbory)
9. [Kompletný príklad](#kompletný-príklad)

---

## 🎯 Prehľad

**Template (Layout)** v DNT3 je kompletná sada súborov, ktorá definuje:
- Vizuálny vzhľad webu
- Moduly (kontrolery pre rôzne typy stránok)
- Pluginy (znovupoužiteľné komponenty)
- CSS a JavaScript súbory
- Layout šablóny

**Príklad:** Layout `bicykle-hlohovec` obsahuje moduly ako `homepage`, `product_list`, `contact` atď.

---

## 📁 Štruktúra adresárov

Základná štruktúra nového templateu:

```
dnt-view/layouts/moj-novy-template/
├── Configurator.php          # Konfigurácia modulov a nastavení
├── css/                      # CSS súbory
├── js/                       # JavaScript súbory
├── images/                   # Obrázky
├── fonts/                    # Fonty
├── modules/                  # Frontend moduly
│   └── homepage/
│       ├── HomepageController.php
│       ├── Plugins.shell
│       └── plugins/
│           └── slider/
│               ├── SliderPluginControll.php
│               └── tpl.php
├── plugins/                  # Globálne pluginy
│   ├── layout.php
│   ├── navigation/
│   └── footer/
└── top.php, bottom.php       # Layout súbory
```

---

## 🚀 Krok 1: Vytvorenie základnej štruktúry

### 1.1 Vytvorenie hlavného adresára

```bash
mkdir -p dnt-view/layouts/moj-novy-template
cd dnt-view/layouts/moj-novy-template
```

### 1.2 Vytvorenie základných adresárov

```bash
mkdir -p css js images fonts modules plugins
```

---

## ⚙️ Krok 2: Configurator.php

**Configurator.php** je hlavný konfiguračný súbor templateu. Registruje moduly a nastavenia.

### Príklad z bicykle-hlohovec:

```php
<?php

namespace DntView\Layout;

use DntLibrary\App\Modul;
use DntLibrary\Base\Vendor;

class Configurator extends Modul
{
    protected $vendor;

    public function __construct()
    {
        parent::__construct();
        $this->vendor = new Vendor();
    }
    
    /**
     * Registrácia modulov a ich URL patterns
     */
    public function modulesRegistrator()
    {
        $this->getSitemap();
        $modulesRegistrator = array(
            'homepage' => array_merge(
                array(), 
                $this->getSitemapModules('homepage')
            ),
            'contact' => array_merge(
                array(), 
                $this->getSitemapModules('contact')
            ),
            'product_list' => array_merge(
                array(), 
                $this->getSitemapModules('product_list')
            ),
            'product_detail' => array_merge(
                array(), 
                array('{alphabet}/product/{digit}/{eny}')
            ),
        );
        return $modulesRegistrator;
    }

    /**
     * Konfigurácia modulov
     */
    public function modulesConfigurator()
    {
        return array(
            'homepage' => array(
                'service_name' => 'Domovská stránka',
            ),
            'contact' => array(
                'service_name' => 'Kontakt',
            ),
            'product_list' => array(
                'service_name' => 'Zoznam produktov',
            ),
            'product_detail' => array(
                'service_name' => 'Detail produktu',
            ),
        );
    }

    /**
     * Meta nastavenia pre admin panel
     */
    public function metaSettings()
    {
        $insertedData[] = array(
            '`type`' => 'keys',
            '`key`' => 'title',
            '`value`' => 'Môj nový web',
            '`content_type`' => 'text',
            '`description`' => 'Názov webu',
            '`vendor_id`' => $this->vendor->getId(),
            '`show`' => '1',
            '`order`' => '1',
        );
        
        $insertedData[] = array(
            '`type`' => 'keys',
            '`key`' => 'description',
            '`value`' => 'Popis webu',
            '`content_type`' => 'text',
            '`description`' => 'Meta description',
            '`vendor_id`' => $this->vendor->getId(),
            '`show`' => '1',
            '`order`' => '2',
        );

        return $insertedData;
    }
}
```

**Vysvetlenie:**
- `modulesRegistrator()` - definuje URL patterns pre moduly
- `modulesConfigurator()` - konfigurácia modulov
- `metaSettings()` - nastavenia dostupné v admin paneli

---

## 🎮 Krok 3: Vytvorenie modulu

Modul je kontroler, ktorý spracováva konkrétny typ stránky (napr. homepage, kontakt, zoznam produktov).

### Príklad: HomepageController.php

```php
<?php

namespace DntView\Layout\Modul;

use DntLibrary\App\BaseController;
use DntLibrary\App\Data;
use DntLibrary\Base\Settings;

class HomepageController extends BaseController
{
    protected $settings;
    protected $frontendData;
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->settings = new Settings();
        $this->frontendData = new Data();
    }

    protected function setTitle()
    {
        return $this->modulPostData->name . ' | ' . $this->settings->get('title');
    }

    protected function data()
    {
        $config = [
            'sitemap_items' => true,    // Načítanie sitemap items
            'menu_items' => true,        // Načítanie menu items
            'translates' => true,         // Načítanie prekladov
            'meta_settings' => true,     // Načítanie meta nastavení
            'post_meta' => true,         // Načítanie post meta dát
        ];
        $this->frontendData->configure($config);
        $this->data = $this->frontendData->get();
    }

    public function run()
    {
        $this->data();
        $data = $this->data;
        $this->modulConfigurator($data);
    }
}
```

**Vysvetlenie:**
- `BaseController` - základná trieda pre všetky moduly
- `Data` - trieda na získanie dát (sitemap, menu, nastavenia)
- `modulConfigurator()` - spustí renderovanie podľa `Plugins.shell`

---

## 🔌 Krok 4: Vytvorenie pluginu

Plugin je znovupoužiteľná komponenta, ktorá sa používa v moduloch (napr. slider, galéria, navigácia).

### Príklad: SliderPluginControll.php

```php
<?php

namespace DntView\Layout\Modul\Plugin;

use DntLibrary\App\Plugin;
use DntLibrary\App\Post;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Image;
use DntLibrary\Base\Vendor;

class SliderPluginControll extends Plugin
{
    protected $loc = __FILE__;
    protected $data;
    protected $pluginId;

    protected $posts;
    protected $vendor;
    protected $db;
    protected $image;
    protected $dnt;
    protected $postsModel;
    protected $finalItems;

    public function __construct($data, $pluginId)
    {
        parent::__construct($data, $pluginId);
        $this->data = $data;
        $this->pluginId = $pluginId;
        $this->posts = new Post();
        $this->vendor = new Vendor();
        $this->db = new DB();
        $this->image = new Image();
        $this->dnt = new Dnt();
    }

    /**
     * Načítanie príspevkov z databázy
     */
    protected function postsModel()
    {
        // Získanie ID kategórie z konfigurácie pluginu
        $id = (int) $this->env('post_cat_id');
        
        $query = "SELECT * FROM dnt_posts 
                  WHERE type = 'post' 
                  AND cat_id = '" . $id . "' 
                  AND `show` > 0 
                  AND `vendor_id` = '" . $this->vendor->getId() . "' 
                  ORDER BY `order` ASC, id DESC";
        
        if ($this->db->num_rows($query) > 0) {
            $this->postsModel = $this->db->get_results($query);
        }
    }

    /**
     * Príprava dát pre zobrazenie
     */
    protected function prepareItems()
    {
        $final = [];
        foreach ($this->postsModel as $key => $item) {
            $final[$key] = $item;
            // Generovanie obrázka
            $final[$key]['image'] = $this->image->getPostImage(
                $item['id_entity'], 
                null, 
                Image::MEDIUM
            );
            // Kontrola externého URL
            $final[$key]['is_external_url'] = ($this->dnt->is_external_url($item['name_url'])) ? 1 : 0;
            // Odstránenie HTML tagov
            $final[$key]['perex_not_html'] = $this->dnt->not_html($item['perex']);
            $final[$key]['content_not_html'] = $this->dnt->not_html($item['content']);
        }
        $this->finalItems = $final;
    }

    /**
     * Inicializácia - volá sa pred run()
     */
    public function init()
    {
        $this->postsModel();
        $this->prepareItems();
    }

    /**
     * Hlavná metóda - renderuje plugin
     */
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

**Kľúčové metódy:**
- `env($key)` - získanie hodnoty z konfigurácie pluginu (`Plugins.shell`)
- `layout($loc, $template, $data)` - renderovanie šablóny
- `init()` - volá sa automaticky pred `run()`

### Šablóna pluginu: tpl.php

```php
<div class="slider-container">
    <?php
    foreach ($data['items'] as $item) {
        ?>
        <div class="slide">
            <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
            <div class="slide-content">
                <h2><?php echo $item['name']; ?></h2>
                <?php if ($item['perex_not_html']) { ?>
                    <p><?php echo $item['perex_not_html']; ?></p>
                <?php } ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>
```

---

## 📝 Krok 5: Konfigurácia Plugins.shell

**Plugins.shell** je XML súbor, ktorý definuje, ktoré pluginy sa použijú v module a v akom poradí.

### Príklad: modules/homepage/Plugins.shell

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
   
   <!-- Slider plugin - lokálny plugin pre homepage -->
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
   
   <!-- Footer plugin -->
   <PLUGIN name="footer">
      <VAR id="id" value="footer" />
      <VAR id="layout" value="FOOTER-CONTENT" />
      <VAR id="level" value="global" />
      <VAR id="cache" value="1Y" />
      <VAR id="compress" value="1" />
      <VAR id="type" value="mdl" />
      <VAR id="tpl" value="footer" />
   </PLUGIN>
</MODULE>
```

**Vysvetlenie parametrov:**
- `id` - unikátny identifikátor pluginu
- `layout` - kde sa plugin zobrazí (`LAYOUT`, `HEAD-CONTENT`, `TOP-CONTENT`, atď.)
- `level` - `global` (pre všetky moduly) alebo `local` (len pre tento modul)
- `cache` - doba cachovania (`1Y` = 1 rok, `1H` = 1 hodina)
- `cache_id` - identifikátor pre cache (`POST_ID` = podľa ID príspevku)
- `compress` - kompresia HTML (`1` = áno, `0` = nie)
- `type` - typ pluginu (`mdl` = modul plugin)
- `tpl` - názov šablóny
- `post_cat_id` - vlastný parameter (dostupný cez `$this->env('post_cat_id')`)

---

## 🎨 Krok 6: Layout súbory

Layout súbory definujú HTML štruktúru stránky.

### plugins/layout.php (hlavný layout)

```php
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <?php
    // Meta tagy
    foreach ($data['meta'] as $meta) {
        echo $meta . "\n";
    }
    ?>
    <link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/bundle.css">
</head>
<!HEAD-CONTENT!>
    <body>
        <!COLORS-CONTENT!>
        <!METRICS-CONTENT!>
        <div class="header">
            <!TOP-CONTENT!>
        </div>
        <div class="container">
            <div class="row">
                <!MAIN-CONTENT!>
            </div>
        </div>
        <!FOOTER-CONTENT!>
        <!BOTTOM-CONTENT!>
    </body>
</html>
```

**Placeholdery:**
- `<!HEAD-CONTENT!>` - obsah hlavičky
- `<!TOP-CONTENT!>` - horná časť stránky (navigácia)
- `<!MAIN-CONTENT!>` - hlavný obsah
- `<!FOOTER-CONTENT!>` - pätička
- `<!BOTTOM-CONTENT!>` - JavaScript na konci

### plugins/layout_homepage.php (špecifický layout pre homepage)

```php
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title><?php echo $data['title']; ?></title>
    <?php foreach ($data['meta'] as $meta) { echo $meta . "\n"; } ?>
</head>
<!HEAD-CONTENT!>
    <body class="homepage">
        <!TOP-CONTENT!>
        <main>
            <!SECTIONS!>
        </main>
        <!FOOTER-CONTENT!>
        <!BOTTOM-CONTENT!>
    </body>
</html>
```

---

## 📚 Kompletný príklad

Vytvoríme jednoduchý template `moj-web` s modulom `homepage` a pluginom `hero`.

### 1. Štruktúra adresárov

```
dnt-view/layouts/moj-web/
├── Configurator.php
├── modules/
│   └── homepage/
│       ├── HomepageController.php
│       ├── Plugins.shell
│       └── plugins/
│           └── hero/
│               ├── HeroPluginControll.php
│               └── tpl.php
└── plugins/
    ├── layout.php
    ├── top/
    │   ├── TopPluginControll.php
    │   └── tpl.php
    └── footer/
        ├── FooterPluginControll.php
        └── tpl.php
```

### 2. Configurator.php

```php
<?php

namespace DntView\Layout;

use DntLibrary\App\Modul;
use DntLibrary\Base\Vendor;

class Configurator extends Modul
{
    protected $vendor;

    public function __construct()
    {
        parent::__construct();
        $this->vendor = new Vendor();
    }
    
    public function modulesRegistrator()
    {
        $this->getSitemap();
        return array(
            'homepage' => array_merge(
                array(), 
                $this->getSitemapModules('homepage')
            ),
        );
    }

    public function modulesConfigurator()
    {
        return array(
            'homepage' => array(
                'service_name' => 'Domovská stránka',
            ),
        );
    }

    public function metaSettings()
    {
        return array(
            array(
                '`type`' => 'keys',
                '`key`' => 'title',
                '`value`' => 'Môj web',
                '`content_type`' => 'text',
                '`description`' => 'Názov webu',
                '`vendor_id`' => $this->vendor->getId(),
                '`show`' => '1',
                '`order`' => '1',
            ),
        );
    }
}
```

### 3. HomepageController.php

```php
<?php

namespace DntView\Layout\Modul;

use DntLibrary\App\BaseController;
use DntLibrary\App\Data;
use DntLibrary\Base\Settings;

class HomepageController extends BaseController
{
    protected $settings;
    protected $frontendData;
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->settings = new Settings();
        $this->frontendData = new Data();
    }

    protected function data()
    {
        $config = [
            'sitemap_items' => true,
            'menu_items' => true,
            'translates' => true,
            'meta_settings' => true,
        ];
        $this->frontendData->configure($config);
        $this->data = $this->frontendData->get();
    }

    public function run()
    {
        $this->data();
        $data = $this->data;
        $this->modulConfigurator($data);
    }
}
```

### 4. HeroPluginControll.php

```php
<?php

namespace DntView\Layout\Modul\Plugin;

use DntLibrary\App\Plugin;
use DntLibrary\Base\ArticleView;

class HeroPluginControll extends Plugin
{
    protected $loc = __FILE__;
    protected $data;
    protected $pluginId;
    protected $articleView;
    protected $heroPost;

    public function __construct($data, $pluginId)
    {
        parent::__construct($data, $pluginId);
        $this->data = $data;
        $this->pluginId = $pluginId;
        $this->articleView = new ArticleView();
    }

    public function init()
    {
        // Získanie ID príspevku z konfigurácie
        $postId = (int) $this->env('hero_post_id');
        if ($postId) {
            $this->heroPost = $this->articleView->getPostParam('name', $postId);
        }
    }

    public function run()
    {
        $data = $this->data;
        $data['hero_title'] = $this->heroPost ?: 'Vitajte na našom webe';
        $data['hero_subtitle'] = 'Toto je podnadpis';
        $this->layout($this->loc, 'tpl', $data);
    }
}
```

### 5. Hero tpl.php

```php
<section class="hero-section">
    <div class="container">
        <h1><?php echo $data['hero_title']; ?></h1>
        <p><?php echo $data['hero_subtitle']; ?></p>
    </div>
</section>
```

### 6. Plugins.shell

```xml
<?xml version="1.0" encoding="UTF-8"?>
<MODULE cache="1">
   <PLUGIN name="layout">
      <VAR id="id" value="layout" />
      <VAR id="layout" value="LAYOUT" />
      <VAR id="level" value="global" />
      <VAR id="cache" value="1Y" />
      <VAR id="tpl" value="layout" />
   </PLUGIN>
   
   <PLUGIN name="top">
      <VAR id="id" value="top" />
      <VAR id="layout" value="HEAD-CONTENT" />
      <VAR id="level" value="global" />
      <VAR id="cache" value="1Y" />
      <VAR id="type" value="mdl" />
      <VAR id="tpl" value="top" />
   </PLUGIN>
   
   <PLUGIN name="hero">
      <VAR id="id" value="hero" />
      <VAR id="layout" value="MAIN-CONTENT" />
      <VAR id="level" value="local" />
      <VAR id="cache" value="0Y" />
      <VAR id="type" value="mdl" />
      <VAR id="tpl" value="hero" />
      <VAR id="hero_post_id" value="123" />
   </PLUGIN>
   
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

## 🔍 Dôležité poznámky

### Namespace konvencie

- **Moduly:** `DntView\Layout\Modul`
- **Pluginy:** `DntView\Layout\Modul\Plugin`
- **Configurator:** `DntView\Layout`

### Cachovanie

- `cache="1Y"` - cache na 1 rok
- `cache="1H"` - cache na 1 hodinu
- `cache="0Y"` - bez cache
- `cache_id="POST_ID"` - cache podľa ID príspevku

### Úrovne pluginov

- **global** - plugin sa používa vo všetkých moduloch
- **local** - plugin sa používa len v konkrétnom module

### Prístup k dátam v pluginoch

```php
// Získanie dát z modulu
$data = $this->data;

// Prístup k nastaveniam
$settings = new Settings();
$title = $settings->get('title');

// Prístup k konfigurácii pluginu
$postCatId = $this->env('post_cat_id');

// Prístup k webhook parametrom
$rest = new Rest();
$id = $rest->webhook(3);
```

---

## ✅ Kontrolný zoznam

- [ ] Vytvorený adresár `dnt-view/layouts/moj-web/`
- [ ] Vytvorený `Configurator.php` s registráciou modulov
- [ ] Vytvorený modul kontroler (napr. `HomepageController.php`)
- [ ] Vytvorený `Plugins.shell` XML súbor
- [ ] Vytvorené pluginy s kontrolermi a šablónami
- [ ] Vytvorený hlavný layout súbor (`layout.php`)
- [ ] Nastavený vendor v admin paneli na použitie nového layoutu

---

## 🎓 Ďalšie zdroje

- Pozrite si existujúci layout `bicykle-hlohovec` ako referenciu
- Dokumentácia v `REPOSITORY_MAP.md`
- Príklady v `dnt-view/layouts/default/`

---

**Tip:** Začnite jednoduchým modulom a postupne pridávajte ďalšie funkcie. Vždy testujte po každej zmene!

