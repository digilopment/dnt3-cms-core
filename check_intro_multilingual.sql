-- SQL skript na kontrolu a opravu dvojjazyčnej verzie modulu intro
-- Použitie: Spustite tento skript v databáze a skontrolujte výsledky

-- 1. KONTROLA: Zobrazenie všetkých modulov intro
SELECT 
    p.id_entity,
    p.name_url,
    p.type,
    p.service,
    p.show,
    p.vendor_id,
    p.language,
    t.translate_id,
    t.type as translate_type,
    t.value as translate_value
FROM dnt_posts p
LEFT JOIN dnt_translates t ON p.id_entity = t.translate_id AND t.type = 'name_url'
WHERE p.service = 'intro' 
AND p.type = 'sitemap'
ORDER BY p.language, p.id_entity;

-- 2. KONTROLA: Počet aktívnych jazykových verzií
SELECT 
    language,
    COUNT(*) as pocet,
    GROUP_CONCAT(name_url) as urls
FROM dnt_posts
WHERE service = 'intro' 
AND type = 'sitemap'
AND show > 0
GROUP BY language;

-- 3. KONTROLA: Translate ID prepojenia
SELECT 
    p1.id_entity as id_default,
    p1.name_url as url_default,
    p1.language as lang_default,
    p2.id_entity as id_sk,
    p2.name_url as url_sk,
    p2.language as lang_sk,
    t.translate_id
FROM dnt_posts p1
LEFT JOIN dnt_translates t ON p1.id_entity = t.translate_id AND t.type = 'name_url'
LEFT JOIN dnt_posts p2 ON t.value = p2.name_url AND p2.service = 'intro'
WHERE p1.service = 'intro' 
AND p1.type = 'sitemap'
AND (p1.language = '' OR p1.language IS NULL OR p1.language = 'default')
ORDER BY p1.id_entity;

-- 4. OPRAVA: Ak chýba SK verzia, vytvorí sa nový záznam
-- POZOR: Upravte vendor_id a translate_id podľa vašich potrieb!
/*
INSERT INTO dnt_posts (
    type, 
    service, 
    name_url, 
    name, 
    show, 
    vendor_id, 
    language,
    datetime_creat,
    datetime_update
) 
SELECT 
    'sitemap',
    'intro',
    'intro',  -- alebo 'sk/intro' ak chcete explicitný prefix
    'Intro SK',
    1,
    vendor_id,
    'sk',
    NOW(),
    NOW()
FROM dnt_posts
WHERE service = 'intro' 
AND type = 'sitemap'
AND (language = '' OR language IS NULL OR language = 'default')
LIMIT 1;

-- Potom vytvorte translate prepojenie
INSERT INTO dnt_translates (
    translate_id,
    type,
    value
)
SELECT 
    (SELECT id_entity FROM dnt_posts WHERE service = 'intro' AND type = 'sitemap' AND (language = '' OR language IS NULL) LIMIT 1) as translate_id,
    'name_url',
    'intro'  -- URL SK verzie
WHERE NOT EXISTS (
    SELECT 1 FROM dnt_translates 
    WHERE translate_id = (SELECT id_entity FROM dnt_posts WHERE service = 'intro' AND type = 'sitemap' AND (language = '' OR language IS NULL) LIMIT 1)
    AND type = 'name_url'
    AND value = 'intro'
);
*/

-- 5. KONTROLA: Výsledok po oprave
SELECT 
    p.id_entity,
    p.name_url,
    p.language,
    p.show,
    CASE 
        WHEN p.language = 'sk' OR p.language = 'SK' THEN CONCAT('https://skisport-rockpoint.com/sk/', p.name_url)
        ELSE CONCAT('https://skisport-rockpoint.com/', p.name_url)
    END as full_url
FROM dnt_posts p
WHERE p.service = 'intro' 
AND p.type = 'sitemap'
AND p.show > 0
ORDER BY p.language;

