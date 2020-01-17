<?php
get_top();
get_top_html();

$name = !empty($data['order']['company_name']) ? $data['order']['company_name'] : $data['order']['name'] . ' ' . $data['order']['surname'];
$street = !empty($data['order']['company_street']) ? $data['order']['company_street'] : $data['order']['street'];
$gate_number = !empty($data['order']['company_gate_number']) ? $data['order']['company_gate_number'] : $data['order']['gate_number'];
$psc = !empty($data['order']['company_psc']) ? $data['order']['company_psc'] : $data['order']['psc'];
$city = !empty($data['order']['company_city']) ? $data['order']['company_city'] : $data['order']['city'];
$country = !empty($data['order']['company_country']) ? $data['order']['company_country'] : $data['order']['country'];
$telephone = !empty($data['order']['company_phone_number']) ? $data['order']['company_phone_number'] : $data['order']['phone_number'];
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="grid invoice">
                <div class="grid-body">
                    <div class="invoice-title">
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="http://system.query.sk/dnt-system/data/0/uploads/logo_tmave_male.png" alt="" height="35">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                <h2><?php echo $data['order']['name'] . ' ' . $data['order']['surname']; ?><br>
                                    <span class="small">č: #20160007</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Dodávateľ:</strong><br>
                                <?php echo $name; ?><br>
                                <?php echo $data['order']['street'] . ' ' . $data['order']['gate_number']; ?><br>
                                <?php echo $data['order']['city'] . ', ' . $data['order']['psc']; ?><br>
                                <abbr>Telefón:</abbr> <?php echo $data['order']['phone_number']; ?><br>
                                <abbr>IČO:</abbr> 48272205<br>
                                <abbr>Bankové spojenie (IBAN):</abbr> SK7383605207004205294565										
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Odberateľ:</strong><br>
                                <?php echo $name; ?><br>
                                <?php echo $street . ' ' . $gate_number . ', ' . $psc; ?><br>
                                <?php echo $city . ', ' . $country; ?><br>
                                <abbr title="Phone">Telefón:</abbr> <?php echo $telephone; ?><br>										
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                               <!--<strong>Spôsob platby:</strong><br>
                                  Visa ending **** 1234<br>
                                  h.elaine@gmail.com<br>-->
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Dátum vystavenia:</strong><br>
                                30.6.2016										
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>FAKTURUJEME VÁM</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr class="line">
                                        <td><strong></strong></td>
                                        <td class="text-center"><strong>Položka</strong></td>
                                        <td class="text-center"><strong>Množstvo</strong></td>
                                        <td class="text-center" style="width: 100px;"><strong>Jednotná cena</strong></td>
                                        <td></td>
                                        <td class="text-right" style="width: 100px;"><strong>Spolu</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td><strong>TVN Odmena - 801PO0029231</strong></td>
                                        <td class="text-center">1 ks</td>
                                        <td class="text-center">124 €</td>
                                        <td></td>
                                        <td class="text-right">124 €</td>
                                    </tr>
                                    <!-- END LOOP -->
                                    <!-- END LOOP -->
                                    <tr>
                                        <td></td>
                                        <td>
                                            <strong>Doprava k zákazníkovi</strong><!--<br>Náklady na dopravu.-->
                                        </td>
                                        <td class="text-center">1 ks</td>
                                        <td class="text-center">0 €</td>
                                        <td></td>
                                        <td class="text-right">0 €</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                        </td>
                                        <td class="text-left">Suma slovom: <strong>
                                                <?php echo $data['sumText']; ?></strong>
                                        </td>
                                        <td class="text-right"><strong></strong></td>
                                        <td class="text-right"><strong></strong></td>
                                        <td></td>
                                        <td class="text-right"><strong>124 €</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right identity">
                            <p>Faktúru vystavil<br><strong>Tomáš Doubek  - Designdnt</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-print">
            <!-- BEGIN CONTROL -->
            <div class="col-xs-12">
                <div class="pull-right">
                    <button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Vytlačiť faktúru</button>
                    <button class="btn btn-success"><i class="fa fa-download"></i> Vygenerovať PDF faktúru</button>
                </div>
            </div>
            <!-- END CONTROL -->
        </div>
    </div>
</section>
<?php
get_bottom_html();
get_bottom();
?>