Designdnt3 - Skeleton Aplication
=======================

Úvod
------------
Ide o jednoduchú, skeleton aplikáciu používajúcu framework Dnt3. 
Aplikácia je určená ako východiskový web pre demo účely, alebo pre programátorov programujúcich pod Dnt3.

Features:
------------
- Multyupload files
- Sendgrid email client
- Internal Mail Client
- CMS
- Sitemapa
- Automatic generating GoogleSItemap
- MultyVendor Platform
- MultyDomain Platform
- Ankety a kvízy
- MessengerPlatform
- Skeleton Application for programming
- Easy framework
- Auto Install full skeleton app by `One Click` 

Inštalácia cez git clone
------------
V rootovskej zložke Vášho servera zavolajte príkaz
- `git clone https://github.com/designdnt/cms-designdnt3 dnt3`
- open http://localhost/dnt3/ alebo http://skeleton.localhost/dnt3/

Inštalácia cez git `install script`
------------
V rootovskej zložke Vášho servera zavolajte príkaz
- uložiť do root-ovskej zložky tensto script `https://github.com/designdnt/cms-designdnt3/blob/master/dnt-install/dnt3InstallScript.php`
- spustiť script buď z konzoly, alebo z prehliadaču
- open http://localhost/dnt3/ alebo http://skeleton.localhost/dnt3/

Inštalácia xampp -> Windows (localhost) do zložky
------------

- Na adrese https://github.com/designdnt/cms-designdnt3 kliknite na "Clone or download" => "Download ZIP"
- Otvorťe zložku v ceste C:\xampp\htdocs\ a vložte zložku zo ZIP-u s názvom "cms-designdnt3-master"
- Zložku premenujte na dnt3
- Spustite adresu: http://localhost/dnt3/

Inštalácia xampp -> Windows (localhost) do vlastnej zložky
------------

- Na adrese https://github.com/designdnt/cms-designdnt3 kliknite na "Clone or download" => "Download ZIP"
- Otvorťe zložku v ceste C:\xampp\htdocs\ a vložte zložku zo ZIP-u s názvom "cms-designdnt3-master"
- Zložku premenujte na {moj-projekt}
- Otvorte súbor C:\xampp\htdocs\config.dnt
- Nájdite riadok 31
- Nahraďte frázu: define( 'WWW_FOLDERS', "/dnt3" ); frázou: define( 'WWW_FOLDERS', "{moj-projekt}" );
- Spustite adresu: http://localhost/{moj-projekt}/

Inštalácia xampp -> Windows (localhost) do rootu 
------------

- Na adrese https://github.com/designdnt/cms-designdnt3 kliknite na "Clone or download" => "Download ZIP"
- Otvorťe zložku v ceste C:\xampp\htdocs\ a vložte obsah zložky zo ZIP-u s názvom "cms-designdnt3-master"
- Otvorte súbor C:\xampp\htdocs\config.dnt
- Nájdite riadok 31
- Nahraďte frázu: define( 'WWW_FOLDERS', "/dnt3" ); frázou: define( 'WWW_FOLDERS', "" );
- Spustite adresu: http://localhost/

