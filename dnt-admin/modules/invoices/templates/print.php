<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;

get_top();
get_top_html();

$name = !empty($data['order']['company_name']) ? $data['order']['company_name'] : $data['order']['name'] . ' ' . $data['order']['surname'];
$street = !empty($data['order']['company_street']) ? $data['order']['company_street'] : $data['order']['street'];
$gate_number = !empty($data['order']['company_gate_number']) ? $data['order']['company_gate_number'] : $data['order']['gate_number'];
$psc = !empty($data['order']['company_psc']) ? $data['order']['company_psc'] : $data['order']['psc'];
$city = !empty($data['order']['company_city']) ? $data['order']['company_city'] : $data['order']['city'];
$country = !empty($data['order']['company_country']) ? $data['order']['company_country'] : $data['order']['country'];
$telephone = !empty($data['order']['company_phone_number']) ? $data['order']['company_phone_number'] : $data['order']['phone_number'];
if ($data['order']['datetime_publish'] == "0000-00-00 00:00:00") {
    $datetimePublish = Dnt::datetime();
} else {
    $datetimePublish = $data['order']['datetime_publish'];
}
$datePublish = new DateTime($datetimePublish);
$invoiceHtml = false;
if (isset($data['invoiceHtml'])) {
    $invoiceHtml = $data['invoiceHtml'];
}
?>
<!--INVOICE-BEGIN-->

<section class="content">
    <div class="row">
        <div class="no-print col-xs-12">
            <!-- BEGIN CONTROL -->
            <div class="pull-left" style="display: flex">
                <a target="" href="index.php?src=invoices&action=edit&id_entity=<?php echo (new Rest())->get('id_entity'); ?>" class="btn btn-primary" ><i class="fa fa-arrow-left"></i> Prejsť späť na editáciu</a>
            </div>
            <div class="pull-right" style="display: flex">
                <button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Vytlačiť faktúru</button>
                <form  target="_blank" style="padding:0px 10px;" action="index.php?src=invoices&action=generate&id_entity=<?php echo (new Rest())->get('id_entity'); ?>" method="POST">
                    <textarea style="display:none;" type="hidden" name="invoiceHtml"><?php echo $invoiceHtml; ?></textarea>
                    <input type="hidden" name="order_id" value="<?php echo $data['order']['order_id']; ?>" >
                    <button class="btn btn-success"><i class="fa fa-file"></i> Vygenerovať a otvoriť PDF faktúru</button>
                </form>
                <?php if (file_exists($data['pdf_file'])) { ?>
                    <a target="_blank" href="<?php echo $data['pdf_file']; ?>" class="btn btn-warning" ><i class="fa fa-download"></i> Stiahnuť vygenerovanú faktúru</a>
                <?php } ?>
            </div>
            <!-- END CONTROL -->
        </div>
        <div class="col-xs-12">
            <div class="grid invoice">
                <div class="grid-body">
                    <div class="invoice-title">
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="<?php echo $data['image']($data['vendor']('invoice_logo')); ?>" alt="" height="35">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                <h2><?php echo $data['vendor']('vendor_company'); ?><br>
                                    <span class="small">č.: #<?php echo $data['order']['order_id']; ?></span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Dodávateľ:</strong><br>
                                <?php echo $data['vendor']('vendor_company'); ?><br>
                                <?php echo $data['vendor']('vendor_street') . ', ' . $data['vendor']('vendor_psc'); ?><br>
                                <?php echo $data['vendor']('vendor_city'); ?><br>
                                <abbr>Telefón:</abbr> <?php echo $data['vendor']('vendor_tel'); ?><br>
                                <abbr>IČO:</abbr> <?php echo $data['vendor']('vendor_ico'); ?><br>
                                <abbr>Bankové spojenie (IBAN):</abbr> <?php echo $data['vendor']('vendor_iban'); ?>										
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Odberateľ:</strong><br>
                                <?php echo $name; ?><br>
                                <?php echo $street . ' ' . $gate_number . ', ' . $psc; ?><br>
                                <?php echo $city . ', ' . $country; ?><br>
                                <abbr>Telefón:</abbr> <?php echo $telephone; ?><br>										
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
                                <?php echo $datePublish->format('d.m.Y'); ?>										
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
                                        <td class="text-left"><strong>Položka</strong></td>
                                        <td class="text-center"><strong>Množstvo</strong></td>
                                        <td class="text-center" style="width: 100px;"><strong>Jednotná cena</strong></td>
                                        <td></td>
                                        <td class="text-right" style="width: 100px;"><strong>Spolu</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <strong>Doprava k zákazníkovi</strong><!--<br>Náklady na dopravu.-->
                                        </td>
                                        <td class="text-center">1 ks</td>
                                        <td class="text-center">0.00 €</td>
                                        <td></td>
                                        <td class="text-right">0.00 €</td>
                                    </tr>
                                    <?php foreach ($data['orderProducts'] as $product) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $product['name']; ?></td>
                                            <td class="text-center"><?php echo $product['count']; ?> ks</td>
                                            <td class="text-center"><?php echo number_format($product['price'], 2, '.', ','); ?> €</td>
                                            <td></td>
                                            <td class="text-right"><?php echo number_format($product['price'] * $product['count'], 2, '.', ','); ?> €</td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="1">
                                        </td>
                                        <td class="text-left">Suma slovom: <strong>
                                                <?php echo $data['orderSumText']; ?></strong>
                                        </td>
                                        <td class="text-right"><strong></strong></td>
                                        <td class="text-right"><strong></strong></td>
                                        <td></td>
                                        <td class="text-right"><strong><?php echo $data['orderSum']; ?> €</strong></td>
                                    </tr>
                                    <?php if ($data['order']['percentage_discount'] > 0) { ?>
                                        <tr>
                                            <td colspan="1">
                                            </td>
                                            <td class="text-left"><strong>Zľava: </strong></td>
                                            <td class="text-center">1 ks</td>
                                            <td class="text-center"><?php echo $data['order']['percentage_discount']; ?> %</td>
                                            <td></td>
                                            <td class="text-right"><?php echo $data['discountSum']; ?> €</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">
                                            </td>
                                            <td class="text-left">Výsledná suma slovom: <strong>
                                                    <?php echo $data['finalDiscountSumText']; ?></strong>
                                            </td>
                                            <td class="text-right"><strong></strong></td>
                                            <td class="text-right"><strong></strong></td>
                                            <td></td>
                                            <td class="text-right"><strong><?php echo $data['finalDiscountSum']; ?> €</strong></td>
                                        </tr>    
                                    <?php } ?> 

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right identity">
                            <p>Faktúru vystavil<br><strong><?php echo $data['vendor']('vendor_company'); ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--INVOICE-END-->
<?php
get_bottom_html();
get_bottom();
?>