# Návod na nastavenie dvojjazyčnej verzie súťaže

## Problém
Pri nastavení vlastnej adresy pre SK verziu modulu `intro` (napr. `https://skisport-rockpoint.com/sk`) sa stránka nenačíta správne.

## Riešenie

### 1. Kontrola nastavenia v Admin rozhraní

Pre modul `intro` musíte mať nastavené:

#### Pre hlavnú (default) verziu:
- **Typ**: `sitemap`
- **Service**: `intro`
- **Vlastná adresa**: `intro` (bez `/sk/` prefixu)
- **Zobraziť**: Áno

#### Pre SK verziu:
- **Typ**: `sitemap`
- **Service**: `intro`
- **Vlastná adresa**: `sk/intro` alebo `intro` (závisí od nastavenia)
- **Jazyk**: SK
- **Translate ID**: Musí byť rovnaký ako hlavná verzia (prepojenie cez `dnt_translates`)
- **Zobraziť**: Áno

### 2. Dôležité poznámky

1. **Vlastná adresa NESMIE obsahovať celú URL** (`https://skisport-rockpoint.com/sk`)
   - Správne: `sk/intro` alebo len `intro`
   - Nesprávne: `https://skisport-rockpoint.com/sk`

2. **Translate ID musí byť rovnaký** pre obe verzie (SK a default)
   - Toto zabezpečuje, že systém vie, že ide o rovnaký obsah v rôznych jazykoch

3. **Service musí byť rovnaký** (`intro`) pre obe verzie

### 3. Kontrola v databáze

Skontrolujte v databáze:

```sql
-- Kontrola modulu intro
SELECT id_entity, name_url, type, service, show, vendor_id 
FROM dnt_posts 
WHERE service = 'intro' AND type = 'sitemap';

-- Kontrola prekladov
SELECT p.id_entity, p.name_url, p.service, t.translate_id, t.type, t.value
FROM dnt_posts p
LEFT JOIN dnt_translates t ON p.id_entity = t.translate_id
WHERE p.service = 'intro' AND p.type = 'sitemap';
```

### 4. Postup nastavenia v Admin

1. **Vytvorte/zmeňte modul `intro`**:
   - Choďte do Admin → Content → Sitemap
   - Nájdite alebo vytvorte modul s `service = intro`
   - Nastavte vlastnú adresu: `intro` (pre default jazyk)

2. **Vytvorte SK verziu**:
   - V tom istom module alebo vytvorte nový záznam
   - Nastavte jazyk na SK
   - Nastavte rovnaký `translate_id` ako hlavná verzia
   - Vlastná adresa môže byť:
     - `intro` (ak je SK default jazyk)
     - `sk/intro` (ak chcete explicitný prefix)

3. **Kontrola funkčnosti**:
   - `https://skisport-rockpoint.com/intro` - default jazyk
   - `https://skisport-rockpoint.com/sk/intro` - SK verzia

### 5. Časté chyby

❌ **Nesprávne**: Vlastná adresa = `https://skisport-rockpoint.com/sk`
✅ **Správne**: Vlastná adresa = `sk/intro` alebo `intro`

❌ **Nesprávne**: Rôzne `translate_id` pre SK a default verziu
✅ **Správne**: Rovnaký `translate_id` pre obe verzie

❌ **Nesprávne**: Rôzny `service` pre SK a default verziu
✅ **Správne**: Rovnaký `service = intro` pre obe verzie

### 6. Testovanie

Po nastavení skontrolujte:

1. Otvorte `https://skisport-rockpoint.com/intro` - mala by sa načítať default verzia
2. Otvorte `https://skisport-rockpoint.com/sk/intro` - mala by sa načítať SK verzia
3. Skontrolujte, či sa správne prepínajú jazyky cez language switcher

### 7. Debug

Ak to stále nefunguje, skontrolujte:

```php
// V webhook.php modulu intro
$webhook = new Webhook();
$urls = $webhook->getSitemapModules('intro');
var_dump($urls); // Mala by vrátiť pole s URL adresami pre oba jazyky
```

## Technické detaily

Systém používa:
- `dnt_posts` tabuľku pre uloženie modulov (type = 'sitemap', service = 'intro')
- `dnt_translates` tabuľku pre prepojenie jazykových verzií
- `getSitemapModules('intro')` metódu na získanie URL adries

Multijazyčnosť funguje cez prefix v URL (`/sk/`) ktorý sa automaticky pridáva/odstraňuje podľa nastavenia.

