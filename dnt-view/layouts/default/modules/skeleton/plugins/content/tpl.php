<main role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3"><?php print( $this->env('title')); ?></h1>
            <p><?php print( $this->env('subtitle')); ?></p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>Multidoménová platforma</h2>
                <p>Naša aplikácia funguje tak, že je možné vytvoriť nový web, napríklad skopírovaním existujúceho. Následne je možné priradiť rôznu doménu na danú aplikáciu.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Multijazyková platforma</h2>
                <p>Podporujeme neobmedzený počet jazykových mutáci pre klienta napríklad v angličtine, nemečine a napríklad v poľštine. </p>
                <p>Jednotlivé mutácie môžu byť na subdoména <b>sk.domain.com</b> alebo <b>pl.domain.com</b> <br/>alebo <b>domain.com/sk</b> alebo <b>domain.com/pl</b></p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Autoloader</h2>
                <p><b>Dnt autoloader</b> je typický štandardizovaný autoload, ktorý na základe requestu z url najprv načíta <b>abstract class</b> na získanie dát pre daného clienta (systemového vendora) (pre danú doménu) , potom načíta <b>konfiguračné súbory clienta (systemového vendora)</b>, z nich sa načíta <b>modul</b> a modul načíta <b>pluginy</b>. V poslednom rade môže prebehnúť inicializácia cez metódu <b>init()</b> a spustenie cez metódu <b>run()</b></p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Globálne moduly</h2>
                <p>Sú to moduly, ktoré majú definovanú genericku funkcionalitu. Napríklad <b>autoredirect</b>, <b>static redirect</b>, alebo <b>rpc</b> modul</p>
                <p>Jednotlivé moduly je možné preťažiť vždy v lokálnom module.
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>

            <div class="col-md-4">
                <h2>Lokálne moduly pre clienta (systemového vendora)</h2>
                <p>Lokálnym modulom sa myslí zväčša nejaká už samotná stránka na webe. Táto stránka môže byť nejakým listingom, alebo detailom článku, homepage-ou etc. 
                    <br/>Každý modul má svoje <b>meta parametre</b>, ktoré je možné nastavovať v databáze, programátor ich vie jednoducho registrovať</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>

            <div class="col-md-4">
                <h2>Pluginy pre Moduly</h2>
                <p>Každý modul môže mať 1 a viac pluginov. Každý plugin má vlastnú triedu a jeho vstupom sú vždy všetky dáta z modulu a z konfiguračného <b>.shell</b> súboru.
                    <br/> Pluginom sa môže rozumieť napríklad related články na webe, komentáre, rsp. hoc aká entita, ktorá je v rámci modulu. <b>Jeden modul je možné použiť neobmedzene veľa krát v rámci modulu</b></p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>

            <div class="col-md-4">
                <h2>.shell config</h2>
                <p>.shell konfig je súbor, ktorý sa nachádza v lokálnom module a definuje odkiaľ sa daný plugin pre modul ťahá, či je <b>lokálny alebo globálny</b>. Ako dlho má byť <b>cachovaný</b>, aké má mať daný plugin <b>konfiguračné properties</b> napríklad počet článkov. Tieto údaje taktiež môžu byť definované v meta parametroch konkrétneho modulu.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>

            <div class="col-md-4">
                <h2>Admin</h2>
                <p>Na základe generických konvecii je možné elegante pracovať v admine s rôznymi metadátami a tak veľmi jednoducho naprogramovať <b>používateľsky konfigurovateľné</b> prostredie pre klienta</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>

            <div class="col-md-4">
                <h2>Admin moduly</h2>
                <p><b>Article</b> knižnica, <b>Image</b> knižnica, <b>Video</b> knižnica, Zbieranie a spracovávanie <b>formulárových dát</b>, odosielanie newslettrov, správa <b>užívateľov</b>, správa <b>prekladov</b> a <b>domén</b>. Spravovanie všetkých naprogramovaných <b>modulov</b> a <b>pluginov</b> cez metadáta</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>

            <div class="col-md-4">
                <h2>Export a Import clienta (systemového vendora)</h2>
                <p>Celý web je možné exportovať (s fotka, s videami... a databázou) a následne naimportovať na inom hostingu na tej istej platforme. O všetko sa postará autoinštalácia. Stačí uploadnúť vyexportované <>.zip-ko</b></p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /container -->
</main>