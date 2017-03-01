<?php 

class MessengerUI{
	
	public $newArr;

	public function getTranslate($src_text, $src_lang, $dst_lang){
		$src_text 	= urlencode($src_text);
		$url = 'http://www.transltr.org/api/translate?text='.$src_text.'&to='.$dst_lang.'&from='.$src_lang;
		
		$data= file_get_contents($url);		
		$arr = json_decode($data);
		return $arr->translationText;
	}

	public function translateParser($answer){
		$data = $answer;
		$langData = explode(" ", $data);
		$src_lang 	=  $langData[2];
		$dst_lang 	=  $langData[4];
		
		$textData = explode("dnt tl $src_lang to $dst_lang ", $data);
		$src_text = $textData[1]; 
		
		return self::getTranslate($src_text, $src_lang, $dst_lang);
		
	}
	
	public function getWordsAsUrl($arr){
		$this->newArr = array();
		$arr = explode(" ", $arr);
		foreach($arr as $item){
			$this->newArr[] = set_url_adresa($item);
		}
		return $this->newArr;
	}

	/* nadavky*/
	public function getNadavky(){
		return array(
			"kokot",
			"boha",
			"kkt",
			"pica",
			"pici",
			"pice",
			"debil",
			"blb",
			"idiot",
			"popici",
			"fico",
			"pic",
		);
	}
	public function getPozdrav(){

		/*
		$this->query = urlencode("SELECT * FROM response_messages where typ = 'pozdrav'");
		$this->xml = simplexml_load_file("http://msg.query.sk/?api=xml&query=".urldecode($this->query));
		foreach ($this->xml->item as $item){
			$this->data[] = $item->msg;
		}

		return $this->data;
		*/
		

		return array(
			"ahoj",
			"cau",
			"caau",
			"caaau",
			"caaaau",
			"cav",
			"caav",
			"caaav",
			"caaaav",
			"cus",
			"caf",
			"cav",
			"nazdar",
			"zdarec",
			"dobry",
			"sevas",
			"svs",
			"dobryden",
		);
		
	}
	
	public function getBasen(){
		return array(
			"Potulne myslienky.Honim teraz, honim zas, budem sa zas s pindom hrať.Prišla noc a s ňou aj chuť,prevetram si vsehochut.Chytím brko pravou rukou, zadumam nad novou kurvou.Už to ide, už to strika,beriem servítku zo stolika.Balík je už prazdny,semeno už neni k mání.V tom tu zazrem záclonu, uz mám za servítku nahradu.",
		);
	}
	
	public function getVtip(){

		$this->query = urlencode("SELECT * FROM response_messages where typ = 'joke' order by rand() limit 1");
		$this->xml = simplexml_load_file("http://msg.query.sk/?api=xml&query=".urldecode($this->query));
		foreach ($this->xml->item as $item){
			return $item->msg;
		}

		/*
		return array(
			'Co je to 90-50-90? Jízda městem kolem dopravního policajta.',
			'V autě jedou Laco, Dežo a Jožo. Kdo řídí? Policie.',
			'Co je to maximální osamělost? Veš na holé hlavě.',
			'Co je to: Nejí to, nepije to a přece to roste? Ceny.',
			'Co vznikne zkřížením krávy a želvy? Tele s přilbou.',
			'Dežo dostane práci u stavební firmy. Šéf mu povídá: "Natři okna!" Po pěti hodinách přijde Dežo za šéfem a ptá se : "Šéfe, aj rámy?"',
			'Černoch s papouškem na rameni vejde do obchodu a prodavačka praví: "Je krásný, odkud ho máte?" "Z Afriky, tam je jich plno." odpoví papoušek.',
			'Psychiatr se ptá alkoholika: Co pijete? Ale pane doktore, já nejsem vybíravý. Nalejte klidně, co máte.',
			'"Šly kolem dvě děti a chtěly pochovat, tak jsem je pochoval," řekl hrobař.',
			'"Dnes mi šla stará koupit brambory a přejelo ji auto!" "A co teď budeš dělat?" "No, asi budu vařit rejži..."',
			'Holčička cucá žiletku a směje se čím dál víc...',
			'Jede kostra v tramvaji a přijde k ní revizor: "Prosím jízdenku!" A kostra: "Mě ještě nebylo 12let!!!"',
			'Povídá jeden policajt druhému: "Ten rogalo, to je ale strašnej pták. Musel jsem do něj nastřílet celej zásobník, než toho chlapa pustil..."',
			'"Prasátko, proč tak bulíš? Co se ti stalo?" Prasátko odpoví: "Protože moje maminka je svině."',
			'Proč už Vašek Havel nechodí na ryby? Ale, co byl na posled s Olgou, tak oba chytli akorát tak raka...',
			'Říká úředník v bance: "Paní, ale ta tisícovka je falešná!" "Cože?! Ale... ale to znamená, že jsem byla znásilněna!"',
			'Na stanici Veřejné Bezpečnosti dostali nový psací stroj. Proto si udělali oslavu a pan kapitán slavnostně přestřihl pásku.',
			'Jedou tři policajti na loďce. Kolik se jich utopí ? Šest. Tři hned a tři při rekonstrukci nehody ....',
			'Povídají si dva policajti: "Ty, slyšel jsi, že letos bude Nový rok v pátek?" Druhý na to: "No, jen aby to nebylo 13-tého"',
			'Naskočí policajt do tramvaje a zařve: "Sledujte ten taxík!"',
			'"Za takové vysvědčení se dává pár facek!" rozčiluje se otec. "Maš pravdu, tati, pojď, pan učitel bydlí hned za rohem."',
			'"Mami, jsem jedovatá?" ptá se malá zmije své matky. "Ano, proč se ptáš?" "Protože jsem se právě kousla do jazyka."',
			'Jede had na kole. Jede z kopce, chce zabrzdit a zapomene, že nemá nohy. "Áááá...!"',
			'Zvířecí komando: "Do pozoru!" Po chvíli: "Řekl jsem do pozoru!" "Já vím, ale když já jsem had..."',
			'Víte, co se stane, když strčí Sněhurka prsty do zásuvky? Popelka.',
			'Až zemřu, chtěl bych odejít klidně ve spánku, jako můj děda, a ne křičíc s vlasy zježenými hrůzou, jako cestující jeho autobusu.',
			'Proč nosí smrtka kosu? Protože nemá papíry na kombajn.',
			'Sedí chlap na stromě a kolemjdoucí se ho ptá: "Co děláte na tom stromě? Že by vám Red Bull dal křídla?" "Žádnej Red Bull, ale pitbul!"',
			'Tak se jednou šťourám špendlíkem v uchu a najednou ticho.',
			'U hořícího domu povídá jeden druhému: "Cítím tady karamel!" A druhý na to: "Vím, můj děda měl cukrovku..."',
			'Jde slepý a jednooký lesem k babičce. Zčistajasna si jednooký vypíchne oko o větev. Jednooký: "Tak jsme došli." Slepý: "Nazdar, babi!"',
			'Leží chlap na kolejích a křičí: "Moje nohy, moje nohy!" Jde okolo průvodčí a říká: "Co tady řvete, člověče, vždyť žádný nohy nemáte..."',
			'Víte, proč si bezdomovci kupují mobilní telefony? Protože nejsou doma k zastižení.',
			'Slyšela jsem, že Váš syn studuje na univerzitě. Co z něho bude, až skončí?" ptá se známá paní Novákové. "Obávám se, že důchodce."',
			'Učitel k žákovi: "Kdybys měl sedm jablíček a já tě o dvě poprosil, kolik by ti jich zůstalo?" "Sedum!"',
			'"Pepíčku, řekni dvě zájmena." "Kdo, já?" "Výborně, Pepíčku."',
			'Jdou dva policajti na obchůzku, když tu jeden povídá: "Koukej, chcíplej pták!" Druhý policista si zacloní rukou oči, vzhlédne k nebi a povídá: "Kde?"',
			'Víš, proč tak málo farářů jezdí mercedesem? Protože ten stojí nekřesťanské peníze.',
			'Pane doktore, co mi je? Nevím, to ukáže až pitva.',
			'Na nádraží: "Slečno, dejte mi jednu jízdenku." "A kam?" "No, do ruky přece!!!"',
			'Pacient k lékaři: "Proč si nemohu nahmatat nohy?" Lékař: "Protože jsme Vám amputovali ruce!"',
			'Potkají se dva šneci. "Pročpak nemáš ulitu?" ptá se jeden. "Ale, utekl jsem z domova."',
			'Víš proč blondýnka nosí na přechod seno? Jde krmit zebru.',
			'"Máte barevné televize?" Prodavač odpoví: "Ano, máme." Zákazník: "Tak mi dejte červenou!"',
			'Ahoj bacile, jak se máš? Špatně, asi jsem chytil penicilín.',
			'"Pane číšník, v polévce mi plave naslouchátko." "Cože....?"',
			'"Já mám chřipku, pane doktore." "Tak co sem lezete, chlape, ještě ji od Vás chytím!!!"',
			'"Proč mi nedovolíš sednout za volant tati, jsem přece už dost starý, ne?" Otec: "Ty ano, ale auto ještě ne!"',
			'Víte, jak u vegetariánů volá manželka svého muže k obědu? "Pojď už jíst, nebo ti zvadne oběd."',
			'Víte, jaká je největší pohroma pro vegetariána? Když ho pohřbí do masového hrobu.',
			'"Pane doktore, já mám hrozný strach, je to moje první operace." "Vím, jak vám je," říká chirurg, "moje také!"',
			'Víte, kdo byl inspirací pro vznik triatlonu? No přece cikáni. Běží na koupaliště, tam si zaplavou a zpátky jedou na kole.',
			'"Včera jsem vyhrál druhou cenu v loterii!" "Neříkej, a cos vyhrál?" "Žigulíka." "A co byla první cena?" "Košík tropického ovoce."',
			'"Mami, proč nesmím škrtit kamaráda?" Maminka: "Budou tě bolet ručičky."',
			'"Ten děda Voloďa, představte si, už je mu 90 let a pořád je plný energie." "A odkud je?" "Z Černobylu."',
			'Víte, proč měla blondýnka radost, když dokončila puzzle za 11 měsíců? Protože na krabici bylo napsáno 2 až 4 roky.',
			'Co řekne blondýnka, když jí požádáte, aby vyhláskovala své jméno? "S-V-É J-M-É-N-O"',
			'Lenin měl pravdu, socialismus se ukázal jako éra elektřiny. Do práce se chodí s odporem, na plat se čeká s napětím a vedení se dotknout nemůžeš.',
			'Víte, jaký je rozdíl mezi slovenskou korunou a americkým dolarem? Jeden americký dolar.',
			'Profesor říká: "Dnes vás pustím o čtvrt hodiny dřív. Odcházejte prosím potichu, ať nevzbudíte nikoho ve vedlejších učebnách."',	
		);
		*/
	}

	public function randHlaska(){
		return array(
			"Ja som to mal dobre, len som to zle napísal! ",
			"Toto je účet za obed, - pýta sa hosť čašníka, - alebo mi chcete predať reštauráciu?",
			"Neľakajte sa našej kávy ... i vy raz budete slabí a studení!",
			"Dachto robi jak še patri, dachto patri jak še robi.",
			"Šťastné detstvo bol ten najkrajší darček, aký nám mohli rodičia dať. Pretože oni najlepšie vedeli, čo prináša dospelosť.",
			"Keď do mňa vniká hlbšie a hlbšie, chce sa mi kričať. Keď to do mňa už strekne, myslím, že omdliem. Keď je vonku, je to slasť. Injekcie sú už také.",
			"Ležím na zemi, oči zavreté, sny závratné, líca rumenejú, srdce prudko bije, dych sa prehlbuje, ústa k bozku pripravené, tak poď a vdýchni život. Zn. Respirátor",
			"Teším sa na to, až do mňa vnikne Tvoj prst, Ty ho potom vytiahneš a olížeš moju sladkosť. S láskou, Tvoja Nutella.",
			"Prial by som si, aby si cítila to, čo ja ... moje ponožky z basketbalu",
			"Obchytkávaj ma, schovávaj ma pred manželkou, stláčaj ma...",
			"Rád sledujem tvoje ladné krivky, obdivujem, ako keď ma zbadáš, pootvoríš ústa a onemieš úžasom. Bude to tvoj koniec, ty nafúkaný vianočný kapor!",
			"Každý pohárik chlastu skracuje život o 5 minút, každý sexuálny styk ho predlžuje o 3 minúty. Tak ak si alkoholik, vieš čo máš robiť... ide o život! ",
			"Vieš o tom, že Každá choroba je zanedbané pitie.",
			"Nazdar! Zo včera si pamätám všetko. Kde sme boli? ",
			"Tam, kde dvaja pijú, borovička zvíťazí.",
			"Včera to bola krása, ožral som sa ako prasa!",
			"Je dokázané, že pivo obsahuje najmä ženské hormóny. Preto 70% mužov nie je schopných po 10 pivách hovoriť, logicky myslieť či riadiť auto.",
		);
	}
	
	public function getPodakovanie(){
		return array(
			"dakujem",
			"vdaka",
			"dik",
		);
	}
	
	/* this function returning optimal ansewer.... */
	public function mainUI($answer){

		if(in_string("dnt bot add msg joke", $answer)){
			$log = new Log;
			$vtip = explode("dnt bot add msg joke", $answer);
			$vtip = $vtip[1];
			$query = urlencode("INSERT INTO response_messages(typ, msg) VALUES ('joke', '".$vtip."' )");
			$data = "http://msg.query.sk/?insert=1&query=".$query;
			file_get_contents($data);
			return "Dakujem, tento vtip si urcite zapamatam, dufam, ze spravne :) ".$vtip."";
			break;
		}
		
		foreach($this->getNadavky() as $nadavka){
			if(in_array($nadavka, $this->getWordsAsUrl($answer))){
				return "Prosím nenadávaj ".$this->getUserParam('first_name').", som slušne vychovaný.";
				break;
			}
		}
		foreach($this->getPozdrav() as $word){
			if(in_array($word, $this->getWordsAsUrl($answer))){
				return $word." ".$this->getUserParam('first_name')." ako ti môžem pomôcť?";
				break;
			}
		}
		foreach($this->getPodakovanie() as $word){
			if(in_array($word, $this->getWordsAsUrl($answer))){
				return "Nie je za čo, som rád, že som pomohol.";
				break;
			}
		}
		
		if(in_string("akosamas", set_url_adresa($answer))){
			return set_url_adresa($answer) . "Ďakujem za opýtanie ".$this->getUserParam('first_name').". Újde to a čo ty?";
		}
		elseif(in_string("dnt tl", $answer)){
			return self::translateParser($answer);
		}
		//elseif($answer == "dnt bot add msg joke"){
		elseif(in_string("vtip", set_url_adresa($answer))){
			/*$vtipov = count($this->getVtip());
			$rand = rand(0,$vtipov);
			for($i=0;$i<=$vtipov;$i++){
				if($rand == $i){
					return $this->getVtip()[$i];
				}
			}*/
			return $this->getVtip()." ";
		}
		elseif(in_string("basen", set_url_adresa($answer))){
			$basni = count($this->getBasen());
			$rand = rand(0,$basni);
			for($i=0;$i<=$basni;$i++){
				if($rand == $i){
					return $this->getBasen()[$i];
				}
			}
		}
		elseif(in_string("natalia", set_url_adresa($answer))){
			return "Ahoj Natália, ako sa darí? čo máš nové? Nie je to zvláštne, že si píšeš somnou, s obyčajným botom, ktorého stvoril niekto úplne iný a vkladá do mňa ľudskú inteligenciu? Je to zvláštne, však? No hmmm ak sa rada zabávaš, napíš do správy vtip a nejaký ti určite vyberiem :-*";
		}
		elseif(
			in_string("kina", set_url_adresa($answer)) ||
			in_string("kino", set_url_adresa($answer))
			){
			return "Jasne, veľmi rád pôjdem s tebou do kina :)";
		}
		elseif(in_string("vecer", set_url_adresa($answer))){
			return "Joj, ale dnes večer nemôžem, mohli by sme inokedy?";
		}
		elseif(in_string("kedy", set_url_adresa($answer))){
			return "Neviem...";
		}
		elseif(in_string("problem", set_url_adresa($answer))){
			return "O aký problém ide?";
		}
		elseif(in_string("sex", set_url_adresa($answer))){
			return $this->getUserParam('first_name')." toto je veľmi citlivá téma. Mal by su ju poriešiť s niekym iným, ako somnou.";
		}
		elseif(
			set_url_adresa($answer) == "jj" ||
			set_url_adresa($answer) == "ok" ||
			set_url_adresa($answer) == "nojo" ||
			set_url_adresa($answer) == "jj" ||
			set_url_adresa($answer) == "nuz" ||
			set_url_adresa($answer) == "aha"
			)
		{
			return $this->getUserParam('first_name')." nemám rada takýto štýl komunikácie...";
		}
		else{
			//return $this->getUserParam('first_name').", neviem odpovedať na tvoju nelogickú otázku. Vieš čo si práve napísal? :O Tak ti to ukážem: ". $answer;
			$x = count($this->randHlaska()) - 1;
			$hlaska = $this->randHlaska();
			$rand = rand(0,$x);
			for($i=0;$i<=$x;$i++){
				if($rand == $i){
					return $hlaska[$i];
				}
			}
		}
	}
}
