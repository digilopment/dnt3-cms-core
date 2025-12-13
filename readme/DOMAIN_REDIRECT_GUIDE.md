# Príručka: Nastavenie presmerovania domén (Domain Redirect)

## Prehľad

Metóda `setDomain()` v triede `Client` zabezpečuje automatické presmerovanie používateľov na správnu doménu podľa nastavení v administrácii. Táto funkcionalita je užitočná pre:

- **Multi-domain setup**: Rôzne weby na rôznych doménach
- **SEO optimalizácia**: Presmerovanie na kanonickú doménu
- **Multi-language**: Správne presmerovanie podľa jazyka
- **Ochrana pred nekonečnými redirectmi**: Automatická detekcia a prevencia

---

## Nastavenie v administrácii

### Krok 1: Prístup do administrácie

1. Otvorte administráciu: `http://vasa-domena.localhost/dnt-admin/`
2. Prihláste sa pomocou administrátorských prístupových údajov

### Krok 2: Navigácia na nastavenie klientov

1. V hlavnom menu kliknite na **Moduly** → **Vendor** (alebo **Klienti**)
2. Zobrazí sa zoznam všetkých klientov/webov v systéme

### Krok 3: Úprava nastavení klienta

1. Nájdite klienta, ktorého chcete upraviť
2. Kliknite na ikonu **editácie** (modrá ceruzka) v stĺpci "Akcie"
3. Otvorí sa modálne okno s nastaveniami

### Krok 4: Konfigurácia presmerovania

V modálnom okne nájdite tieto polia:

#### **"Zobraziť na vlastnej adrese"** (show_real_url)

- **Zapnúť**: Aktivuje presmerovanie na externú doménu
- **Vypnúť**: Deaktivuje presmerovanie (používa sa interná doména)

**Kedy zapnúť:**
- Ak máte vlastnú doménu pre konkrétny web
- Ak chcete presmerovať používateľov na kanonickú URL
- Ak používate multi-domain setup

#### **"Vlastná URL adresa"** (real_url)

Zadajte kompletnú URL adresu externej domény, napríklad:

```
http://kilpi.localhost/dnt3-winprizes
```

alebo

```
https://www.example.com
```

**Dôležité:**
- Zadajte kompletnú URL vrátane protokolu (`http://` alebo `https://`)
- Ak je doména bez cesty, zadajte základnú URL (napr. `http://example.com`)
- Ak je doména s cestou, zadajte aj cestu (napr. `http://example.com/subfolder`)

### Krok 5: Uloženie zmien

1. Kliknite na tlačidlo **Uložiť** alebo **Update**
2. Zmeny sa uložia do databázy
3. Presmerovanie začne fungovať okamžite

---

## Príklady použitia

### Príklad 1: Základné presmerovanie na externú doménu

**Scenár:** Chcete presmerovať všetkých používateľov z `http://localhost/dnt3-winprizes` na `http://kilpi.localhost/dnt3-winprizes`

**Nastavenie v admin:**
- **"Zobraziť na vlastnej adrese"**: ✅ ZAPNUTÉ
- **"Vlastná URL adresa"**: `http://kilpi.localhost/dnt3-winprizes`

**Výsledok:**
```
Vstupná URL: http://localhost/dnt3-winprizes/sk/intro
↓
Presmeruje na: http://kilpi.localhost/dnt3-winprizes/
```

**Poznámka:** Ak je `real_url` základná URL bez cesty, presmeruje na root (`/`), nie na pôvodnú cestu.

---

### Príklad 2: Presmerovanie s jazykom

**Scenár:** Multi-language web, chcete zachovať jazyk v URL pri presmerovaní

**Nastavenie v admin:**
- **"Zobraziť na vlastnej adrese"**: ✅ ZAPNUTÉ
- **"Vlastná URL adresa"**: `http://kilpi.localhost/dnt3-winprizes`
- **Multi-language**: ✅ ZAPNUTÉ
- **Default jazyk**: `sk`

**Výsledok:**
```
Vstupná URL: http://localhost/dnt3-winprizes/sk/intro
↓
Presmeruje na: http://kilpi.localhost/dnt3-winprizes/intro
```

**Poznámka:** Jazyk sa odstráni z URL, ak je to default jazyk a `real_url` neobsahuje jazyk.

---

### Príklad 3: Odstránenie default jazyka z URL

**Scenár:** Chcete odstrániť default jazyk (`sk`) z URL

**Nastavenie v admin:**
- **Multi-language**: ✅ ZAPNUTÉ
- **Default jazyk**: `sk`
- **"Vlastná URL adresa"**: `http://kilpi.localhost/dnt3-winprizes` (bez jazyka)

**Výsledok:**
```
Vstupná URL: http://kilpi.localhost/dnt3-winprizes/sk/intro
↓
Presmeruje na: http://kilpi.localhost/dnt3-winprizes/intro
```

---

### Príklad 4: Vypnutie presmerovania

**Scenár:** Chcete vypnúť presmerovanie a používať internú doménu

**Nastavenie v admin:**
- **"Zobraziť na vlastnej adrese"**: ❌ VYPNUTÉ

**Výsledok:**
```
Vstupná URL: http://kilpi.localhost/dnt3-winprizes/sk/intro
↓
Žiadne presmerovanie - zostane na pôvodnej URL
```

---

## Možné stavy presmerovania

Metóda `setDomain()` môže vrátiť rôzne stavy v debug informáciách:

| Stav | Popis |
|------|-------|
| `no_redirect` | Žiadny redirect sa nevykoná |
| `default_lang_to_no_lang` | Presmerovanie z default jazyka na verziu bez jazyka |
| `already_on_correct_domain` | Už sme na správnej doméne, neredirectujeme |
| `showRealUrl_with_language` | Presmerovanie na externú doménu s jazykom |
| `showRealUrl_without_language_redirect_to_base` | Presmerovanie na základnú URL bez jazyka |
| `showRealUrl_without_language_redirect_to_dbDomain` | Presmerovanie na dbDomain tak ako je |
| `showRealUrl_already_on_target_url` | Už sme na cieľovej URL, neredirectujeme |
| `lang_removal` | Odstránenie jazyka z URL |
| `default_redirect` | Default redirect |

---

## Debugovanie

### Metóda 1: Odkomentovanie debug výstupu v kóde

V súbore `dnt-library/framework/app/Client.php` v metóde `setDomain()` nájdite riadky:

```php
// Debug output - odkomentovať pre debugovanie
// var_dump($debugInfo);
// exit;
```

Odkomentujte ich:

```php
// Debug output - odkomentovať pre debugovanie
var_dump($debugInfo);
exit;
```

Teraz pri každom volaní metódy uvidíte všetky debug informácie.

### Metóda 2: Zachytenie návratovej hodnoty

Metóda `setDomain()` vracia pole s debug informáciami (ak sa nevykoná redirect):

```php
$debugInfo = $client->setDomain($dbDomain, $wwwPath, $toDbDomain, $language);
var_dump($debugInfo);
```

**Poznámka:** Ak sa vykoná redirect (`header('Location: ...')`), metóda ukončí vykonávanie (`exit`), takže návratová hodnota nebude dostupná.

### Debug informácie obsahujú:

- `branch`: Ktorá vetva sa vykonala (`toDbDomain_true` alebo `toDbDomain_false`)
- `status`: Aktuálny stav presmerovania
- `final_status`: Finálny stav
- `final_redirect_url`: URL na ktorú sa presmeruje (alebo `null`)
- `current_url`: Aktuálna URL
- `target_url`: Cieľová URL
- `dbDomain`: Externá doména z databázy
- `showRealUrl`: Či je zapnuté presmerovanie na externú doménu
- `parsed_data`: Parsované údaje z domény (protocol, domain, www, lang)
- A ďalšie relevantné hodnoty

---

## Riešenie problémov

### Problém: Nekonečné presmerovanie (redirect loop)

**Príčina:** 
- Cieľová URL sa zhoduje s aktuálnou URL
- Nesprávne nastavená `real_url` v databáze

**Riešenie:**
1. Skontrolujte nastavenie `real_url` v administrácii
2. Uistite sa, že `real_url` je iná ako aktuálna URL
3. Ak je `real_url` základná URL (napr. `http://kilpi.localhost/dnt3-winprizes`), presmeruje na root (`/`)

**Ochrana:** Metóda automaticky detekuje, či už sme na cieľovej URL a neredirectuje.

---

### Problém: Presmerovanie nefunguje

**Možné príčiny:**
1. **"Zobraziť na vlastnej adrese" je vypnuté**
   - Riešenie: Zapnite ho v administrácii

2. **"Vlastná URL adresa" je prázdna**
   - Riešenie: Zadajte kompletnú URL v administrácii

3. **Nesprávny formát URL**
   - Riešenie: Uistite sa, že URL obsahuje protokol (`http://` alebo `https://`)

4. **Už sme na správnej doméne**
   - Riešenie: To je správne správanie - metóda neredirectuje, ak už sme na cieľovej doméne

---

### Problém: Presmerovanie na nesprávnu URL

**Príčina:**
- Nesprávne nastavená `real_url` v databáze
- Konflikt medzi multi-language nastaveniami

**Riešenie:**
1. Skontrolujte nastavenie `real_url` v administrácii
2. Skontrolujte multi-language nastavenia
3. Použite debug výstup na zistenie, aká URL sa používa

---

## Technické detaily

### Kde sa metóda volá

Metóda `setDomain()` sa automaticky volá v `App::run()`:

```php
$this->client->setDomain(
    $this->client->realUrl,
    $this->client->wwwPath,
    $this->client->getSetting('still_redirect_to_domain'),
    $this->client->getSetting('language')
);
```

### Databázové tabuľky

Nastavenia sa ukladajú do tabuľky `dnt_vendors`:

- `real_url`: Externá doména (VARCHAR)
- `show_real_url`: Či je zapnuté presmerovanie (INT, 0 alebo 1)

### Ochrana pred nekonečnými redirectmi

Metóda obsahuje automatickú ochranu:

1. Porovnáva aktuálnu URL s cieľovou URL
2. Ak sa zhodujú, neredirectuje
3. Normalizuje URL (odstráni trailing slashes) pred porovnaním

---

## Súvisiace dokumenty

- `README.md` - Všeobecná dokumentácia projektu
- `TEMPLATE_CREATION_GUIDE.md` - Príručka pre vytváranie templates
- `PAGE_BUILDER_GUIDE.md` - Dokumentácia Page Builder systému

---

## Podpora

Ak máte problémy s nastavením presmerovania:

1. Skontrolujte debug výstup (pozri sekciu "Debugovanie")
2. Overte nastavenia v administrácii
3. Skontrolujte databázové hodnoty v tabuľke `dnt_vendors`
4. Kontaktujte administrátora systému

---

**Posledná aktualizácia:** 2024


