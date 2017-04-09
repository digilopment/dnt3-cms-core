Designdnt3 - Skeleton Aplication
=======================

Úvod
------------
Ide o jednoduchú, skeleton aplikáciu používajúcu framework Dnt3. 
Aplikácia je určená ako východiskový web pre demo účely, alebo pre programátorov programujúcich pod Dnt3.

FEATURES INCLUDED IN SKELETON APP:
1.)		Multyupload files \n
2.)		Sendgrid email client \n
3.) 	Internal Mail Client \n
4.) 	CMS \n 
5.) 	Sitemapa \n
6.) 	Automatic generating GoogleSItemap \n
7.) 	MultyVendor Platform \n
8.) 	MultyDomain Platform \n
9.) 	Ankety a kvízy \n
10.)	MessengerPlatform \n
11.)	Skeleton Application for programming \n
12.)	Easy framework \n
13.)	Auto Install full skeleton app by `One Click` \n

Inštalácia cez git clone
------------
V rootovskej zložke Vášho servera zavolajte príkaz
1.) git clone https://github.com/designdnt/cms-designdnt3 dnt3 \n
2.) open http://localhost/dnt3/ alebo http://skeleton.localhost/dnt3/

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

