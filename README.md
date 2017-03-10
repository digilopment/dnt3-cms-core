Designdnt3 - Skeleton Aplication
=======================

Úvod
------------
Ide o jednoduchú, skeleton aplikáciu používajúcu framework Dnt3. 
Aplikácia je určená ako východiskový web pre demo účely, alebo pre programátorov programujúcich pod Dnt3.


Inštalácia xampp -> Windows (localhost) do zložky
------------

1.) Na adrese https://github.com/designdnt/cms-designdnt3 kliknite na "Clone or download" => "Download ZIP"
2.) Otvorťe zložku v ceste C:\xampp\htdocs\ a vložte zložku zo ZIP-u s názvom "cms-designdnt3-master"
3.) Zložku premenujte na dnt3
4.) Spustite adresu: http://localhost/dnt3/

Inštalácia xampp -> Windows (localhost) do vlastnej zložky
------------

1.) Na adrese https://github.com/designdnt/cms-designdnt3 kliknite na "Clone or download" => "Download ZIP"
2.) Otvorťe zložku v ceste C:\xampp\htdocs\ a vložte zložku zo ZIP-u s názvom "cms-designdnt3-master"
3.) Zložku premenujte na {moj-projekt}
4.) Otvorte súbor C:\xampp\htdocs\config.dnt
5.) Nájdite riadok 31
6.) Nahraďte frázu: define( 'WWW_FOLDERS', "/dnt3" ); frázou: define( 'WWW_FOLDERS', "{moj-projekt}" );
7.) Spustite adresu: http://localhost/{moj-projekt}/

Inštalácia xampp -> Windows (localhost) do rootu 
------------

1.) Na adrese https://github.com/designdnt/cms-designdnt3 kliknite na "Clone or download" => "Download ZIP"
2.) Otvorťe zložku v ceste C:\xampp\htdocs\ a vložte obsah zložky zo ZIP-u s názvom "cms-designdnt3-master"
3.) Otvorte súbor C:\xampp\htdocs\config.dnt
4.) Nájdite riadok 31
5.) Nahraďte frázu: define( 'WWW_FOLDERS', "/dnt3" ); frázou: define( 'WWW_FOLDERS', "" );
4.) Spustite adresu: http://localhost/

