# Príručka: Viacjazyčnosť a nastavenie domén

## Prečo sa toto robí?

Viacjazyčnosť je primárne súvisí s aktualizáciou na PHP 8.4, pretože na vašom hostingu je už nastavená PHP 8.4, ale funkcionalita nefunguje na novších verziách. To je rovnaká situácia, ako sa stalo s emailami.

**Odporúčaný postup:**
1. Aktualizovať kód (CMS core + layouty)
2. Overiť multilanguage funkcionalitu

---

## Ako funguje multilanguage systém

Multilanguage systém umožňuje zobraziť rôzne mikrostránky (Kilpi) na tej istej doméne s rôznymi jazykovými verziami. Každá mikrostránka má nastavený **defaultný jazyk** v nastaveniach aplikácie.

### Základné koncepty

1. **Defaultný jazyk** - nastavuje sa v nastaveniach každej mikrostránky (Kilpi)
2. **Doména** - nastavuje sa v administrácii aplikácie (rovnako ako doteraz cez Websupport)
3. **Jazykový slug** - voliteľný parameter, ktorý určuje, či bude jazyk v URL adrese

---

## Nastavenie v administrácii

### 1. Nastavenie domény

V administrácii aplikácie sa nastavuje iba **doména**, ktorú nasmerujete pre všetky mikrostránky (Kilpi A, Kilpi B, Kilpi C) rovnako ako doteraz cez Websupport.

**Príklad:** `kilpidomain.loc`

### 2. Nastavenie jazyka pre mikrostránku

Vpravo v administrácii pribudol **choozer na výber jazyka**. Tu si vyberiete:
- **Jazyk** - ktorý jazyk bude táto mikrostránka používať
- **Bez jazyka v URL** - či bude jazyk v URL adrese alebo nie

---

## Príklady nastavenia

### Scenár 1: Slovenská verzia na hlavnej doméne

**Predpoklady:**
- Kilpi A má defaultný jazyk: **SK**
- Kilpi B má defaultný jazyk: **CZ**
- Kilpi C má defaultný jazyk: **PL**
- Doména: `kilpidomain.loc`

**Nastavenie:**

#### Kilpi A (slovenská verzia)
- **Doména:** `kilpidomain.loc`
- **Jazyk:** SK
- **Bez jazyka v URL:** ✅ Áno
- **Výsledná URL:** `kilpidomain.loc`

#### Kilpi B (česká verzia)
- **Doména:** `kilpidomain.loc`
- **Jazyk:** CZ
- **Bez jazyka v URL:** ❌ Nie
- **Výsledná URL:** `kilpidomain.loc/cz`

#### Kilpi C (poľská verzia)
- **Doména:** `kilpidomain.loc`
- **Jazyk:** PL
- **Bez jazyka v URL:** ❌ Nie
- **Výsledná URL:** `kilpidomain.loc/pl`

---

### Scenár 2: Česká verzia na hlavnej doméne

**Predpoklady:**
- Kilpi A má defaultný jazyk: **SK**
- Kilpi B má defaultný jazyk: **CZ**
- Kilpi C má defaultný jazyk: **PL**
- Doména: `kilpidomain.loc`

**Nastavenie:**

#### Kilpi B (česká verzia - hlavná)
- **Doména:** `kilpidomain.loc`
- **Jazyk:** CZ
- **Bez jazyka v URL:** ✅ Áno
- **Výsledná URL:** `kilpidomain.loc`

#### Kilpi A (slovenská verzia)
- **Doména:** `kilpidomain.loc`
- **Jazyk:** SK
- **Bez jazyka v URL:** ❌ Nie
- **Výsledná URL:** `kilpidomain.loc/sk`

#### Kilpi C (poľská verzia)
- **Doména:** `kilpidomain.loc`
- **Jazyk:** PL
- **Bez jazyka v URL:** ❌ Nie
- **Výsledná URL:** `kilpidomain.loc/pl`

---

## Dôležité pravidlá

### ⚠️ Pravidlo: Iba jedna mikrostránka môže mať "Bez jazyka v URL"

Na každej doméne môže byť iba **jedna mikrostránka** s nastavením "Bez jazyka v URL" = Áno. Všetky ostatné mikrostránky na tej istej doméne musia mať jazyk v URL.

**Príklad správneho nastavenia:**
- ✅ Kilpi A: `kilpidomain.loc` (bez jazyka)
- ✅ Kilpi B: `kilpidomain.loc/cz` (s jazykom)
- ✅ Kilpi C: `kilpidomain.loc/pl` (s jazykom)

**Príklad nesprávneho nastavenia:**
- ❌ Kilpi A: `kilpidomain.loc` (bez jazyka)
- ❌ Kilpi B: `kilpidomain.loc` (bez jazyka) - **CHYBA!**

---

## Kombinácie a scenáre

### Kombinácia 1: Všetky jazyky s URL slugom

Ak chcete, aby všetky jazykové verzie mali slug v URL:

- Kilpi A: `kilpidomain.loc/sk`
- Kilpi B: `kilpidomain.loc/cz`
- Kilpi C: `kilpidomain.loc/pl`

**Nastavenie:**
- Všetky mikrostránky majú "Bez jazyka v URL" = ❌ Nie

---

### Kombinácia 2: Jeden jazyk bez slug, ostatné so slugom

Ak chcete, aby jeden jazyk bol na hlavnej doméne:

- Kilpi A: `kilpidomain.loc` (slovenská verzia)
- Kilpi B: `kilpidomain.loc/cz`
- Kilpi C: `kilpidomain.loc/pl`

**Nastavenie:**
- Kilpi A: "Bez jazyka v URL" = ✅ Áno
- Kilpi B: "Bez jazyka v URL" = ❌ Nie
- Kilpi C: "Bez jazyka v URL" = ❌ Nie

---

## Časté otázky

### Otázka: Môžem mať viacero domén?

**Odpoveď:** Áno, každá mikrostránka môže mať nastavenú vlastnú doménu. Môžete mať napríklad:
- `kilpidomain.loc` - pre Kilpi A, B, C
- `kilpi2domain.loc` - pre Kilpi D, E, F

### Otázka: Čo sa stane, ak nastavím "Bez jazyka v URL" pre viacero mikrostránok?

**Odpoveď:** Systém automaticky presmeruje na správnu URL. Iba jedna mikrostránka môže byť na hlavnej doméne bez jazykového slugu.

### Otázka: Môžem zmeniť jazyk mikrostránky neskôr?

**Odpoveď:** Áno, môžete kedykoľvek zmeniť nastavenie jazyka a "Bez jazyka v URL" v administrácii. Systém automaticky aktualizuje URL adresy.

### Otázka: Čo ak chcem mať rovnaký obsah v rôznych jazykoch?

**Odpoveď:** Každá mikrostránka (Kilpi) je samostatná entita. Ak chcete rovnaký obsah v rôznych jazykoch, musíte vytvoriť samostatné mikrostránky pre každý jazyk a nastaviť im rovnakú doménu s rôznymi jazykovými slugmi.

---

## Technické poznámky

- Systém automaticky spracováva presmerovania medzi jazykovými verziami
- URL adresy sa generujú automaticky na základe nastavenia
- Defaultný jazyk sa nastavuje v nastaveniach každej mikrostránky
- Doména sa nastavuje v administrácii aplikácie

---

## Kontakt a podpora

Pre otázky a podporu kontaktujte vášho správcu systému.

