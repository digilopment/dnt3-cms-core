<?php
get_top();
get_top_html();
$name = !empty($data['order']['company_name']) ? $data['order']['company_name'] : $data['order']['name'] . ' ' . $data['order']['surname'];
//osetrenie vstupov
if ($data['order']['datetime_publish'] == "0000-00-00 00:00:00") {
    $datetime_publish = Dnt::datetime();
}else{
    $datetime_publish = $data['order']['datetime_publish'];
}
?>
<style>
    .line{
        display: block;
        border-top: 1px solid #929292;
        margin-top: 20px;
    }
</style>
<section class="col-xs-12" style="margin-bottom:15px">
    <a href="index.php?src=invoices&action=print&id_entity=<?php echo (new Rest())->get('id_entity') ?>">
        <span class="label label-primary bg-blue" style="padding:5px;"><big>VYSTAVIŤ FAKTÚRU</big></span>
    </a>
    <a href="index.php?src=invoices">
        <span class="label label-primary bg-green" style="padding:5px;"><big>ZOZNAM OBJEDNÁVOK</big></span>
    </a>
    <a href="index.php?src=content&included=product">
        <span class="label label-primary bg-blue" style="padding:5px;"><big>ZOZNAM PRODUKTOV</big></span>
    </a>
    <a href="index.php?src=invoices&action=add">
        <span class="label label-primary bg-orange" style="padding:5px;"><big>NOVÁ OBJEDNÁVKA</big></span>
    </a>
    <a style="float:right" <?php echo Dnt::confirmMsg("Naozaj chcete vymazať túto objednávku? Operáciu už nebude možné vrátiť späť"); ?> href="index.php?src=invoices&action=del&id_entity=<?php echo (new Rest())->get('id_entity') ?>">
        <span class="label label-primary bg-red" style="padding:5px;"><big>VYMAZAŤ OBJEDNÁVKU</big></span>
    </a>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-file-o"></i> <?php echo $data['order']['order_id'] . ' ' . $name ?></h3>
            <h4>Celková suma objednávky: <b><?php echo $data['orderSum']?> €</b> 
                <br/>Zaplatené v hotovosti: <b><?php echo $data['order']['from_cash']; ?> €</b>, Zaplatené kartou: <b><?php echo $data['order']['from_account']; ?> €</b>
                <br/>Zostáva zaplatiť: <b><?php echo $data['toBePaid'];?> €</b></h4>
        </div>
    </div>
    <form action="index.php?src=invoices&action=update&id_entity=<?php echo $data['order']['id']; ?>" method="POST">
        <div class="row">
            <div class="col-md-12 line">
                <h3 class="grid-title"><i class="fa fa-user"></i> Klient - kontaktné údaje</h3>
            </div>
            <div class="form-group col-md-3">
                <label for="usr">číslo objednávky:</label>
                <input type="text" name="order_id" value="<?php echo $data['order']['order_id']; ?>" class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Meno:</label>
                <input type="text" name="name" value="<?php echo $data['order']['name']; ?>" class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Priezvisko:</label>
                <input type="text" name="surname" value="<?php echo $data['order']['surname']; ?>" class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Email:</label>
                <input type="text" name="email" value="<?php echo $data['order']['email']; ?>" class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Telefón:</label>
                <input type="text" name="phone_number" value="<?php echo $data['order']['phone_number']; ?>" class="form-control" >
            </div>
            <div class="col-md-12 line">
                <h3 class="grid-title"><i class="fa fa-envelope"></i> Adresa klienta</h3>
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Ulica:</label>
                <input type="text"  name="street" value="<?php echo $data['order']['street']; ?>" class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">č. domu:</label>
                <input type="text"  name="gate_number" value="<?php echo $data['order']['gate_number']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">PSČ:</label>
                <input type="text" name="psc" value="<?php echo $data['order']['psc']; ?>" class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Mesto:</label>
                <input type="text" name="city" value="<?php echo $data['order']['city']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Krajina:</label>
                <input type="text" name="country" value="<?php echo $data['order']['country']; ?>"  class="form-control" >
            </div>
            <div class="col-md-12 line">
                <h3 class="grid-title"><i class="fa fa-address-book"></i> Informácie o firme klienta (ak sú uvedené)</h3>
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Názov firmy:</label>
                <input type="text" name="company_name" value="<?php echo $data['order']['company_name']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Ulica firmy:</label>
                <input type="text" name="company_street" value="<?php echo $data['order']['company_street']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Súpisné číslo:</label>
                <input type="text" name="company_gate_number" value="<?php echo $data['order']['company_gate_number']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Mesto:</label>
                <input type="text" name="company_city" value="<?php echo $data['order']['company_city']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Krajina:</label>
                <input type="text" name="company_country" value="<?php echo $data['order']['company_country']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Email firmy:</label>
                <input type="text" name="company_email" value="<?php echo $data['order']['company_email']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Telefón firmy:</label>
                <input type="text" name="company_phone_number" value="<?php echo $data['order']['company_phone_number']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">PSČ firmy:</label>
                <input type="text" name="company_psc" value="<?php echo $data['order']['company_psc']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">IČO firmy:</label>
                <input type="text" name="ico" value="<?php echo $data['order']['ico']; ?>"  class="form-control" >
            </div>
            <div class="form-group col-md-3">
                <label for="usr">DIČ firmy:</label>
                <input type="text" name="dic" value="<?php echo $data['order']['dic']; ?>"  class="form-control" >
            </div>


            <div class="col-md-12 line">
                <h3 class="grid-title"><i class="fa fa-info-circle"></i> informácie o objednávke</h3>
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Zaplatené z účtu:</label>
                <div class="input-group date form_date">
                    <input type="text" name="from_account" value="<?php echo $data['order']['from_account']; ?>" class="form-control" placeholder="Zalatené z účtu"> 
                    <span class="input-group-addon bg-blue"><i class="fa fa-percentage"><b>€</b></i></span> 
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Zaplatené v hotovosti:</label>
                <div class="input-group date form_date">
                    <input type="text" name="from_cash" value="<?php echo $data['order']['from_cash']; ?>" class="form-control" placeholder="Zalatené z účtu"> 
                    <span class="input-group-addon bg-blue"><i class="fa fa-percentage"><b>€</b></i></span> 
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Nastaviť zľavu ( v %):</label>
                <div class="input-group date form_date">
                    <input type="text" name="percentage_discount" value="<?php echo $data['order']['percentage_discount']; ?>" class="form-control" placeholder="Zalatené z účtu"> 
                    <span class="input-group-addon bg-blue"><i class="fa fa-percentage"><b>€</b></i></span> 
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Stav objednávky:</label>
                <select name="status" style="display: block; width: 100%; height: 34px; padding: 6px 12px; font-size: 14px; line-height: 1.42857143; color: #555; background-color: #fff; background-image: none; border: 1px solid #ccc; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075); box-shadow: inset 0 1px 1px rgba(0,0,0,.075); -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s; -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s; transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;}">
                    <?php
                    foreach ($data['orderStatus'] as $key => $val) {
                        if ($key == $data['order']['status']) {
                            echo '<option value="' . $key . '" selected>' . $val . '</option>';
                        } else {
                            echo '<option value="' . $key . '">' . $val . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Typ dopravy:</label>
                <select name="transportation" style="display: block; width: 100%; height: 34px; padding: 6px 12px; font-size: 14px; line-height: 1.42857143; color: #555; background-color: #fff; background-image: none; border: 1px solid #ccc; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075); box-shadow: inset 0 1px 1px rgba(0,0,0,.075); -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s; -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s; transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;}">
                    <?php
                    foreach ($data['orderTransportation'] as $key => $val) {
                        if ($key == $data['order']['transportation']) {
                            echo '<option value="' . $key . '" selected>' . $val . '</option>';
                        } else {
                            echo '<option value="' . $key . '">' . $val . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="usr">Dátum na faktúre:</label>
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' name="datetime_publish" class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker1').datetimepicker({
                                        defaultDate: "<?php echo $datetime_publish; ?>",
                                        locale: 'sk'
                                    });
                                });
                            </script>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 line">
                <h3 class="grid-title"><i class="fa fa-product-hunt"></i>
                    <span class="btn btn-primary" data-toggle="modal" data-target="#image_picker_products" style="font-size: 12px;"><i class="fa fa-print"></i> Pridať produkt</span>
                </h3>
                
                <?php 
                //return POST['gallery_key_products']
                productsChooser($data['products']); ?>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            <?php foreach ($data['orderProducts'] as $product) { ?>
                                <tr>
                                    <!-- id -->
                                    <td class="number text-center">
                                        <?php echo $product['id_entity']; ?>													
                                    </td>
                                    <!--nazov a popis -->
                                    <td class="">
                                        <strong> <?php echo $product['name']; ?></strong>
                                    </td>
                                    <td class="">
                                        <strong> <?php echo $product['count']; ?> x</strong>
                                    </td>
                                    <!-- cena / item -->
                                    <td class="price text-center">
                                        <strong>€ <?php echo $product['price']; ?></strong>												
                                    </td>
                                    <!-- cena sum -->
                                    <td class="price text-center">
                                        <strong>€ <?php echo $product['price'] * $product['count']; ?></strong>												
                                    </td>
                                    <!-- zvýšiť o jeden -->
                                    <td style="width:20px" class="price text-right">
                                        <a onclick="return confirm('Zvýšiť počet o 1');" href="index.php?src=invoices&action=add_to_cart&order_id=<?php echo (new Rest())->get('id_entity') ?>&count=1&id_entity=<?php echo $product['id_entity']?>">
                                            <i class="fa fa-plus bg-blue action"></i>
                                        </a>											
                                    </td>
                                    <!-- znizit o jeden -->
                                    <td style="width:20px" class="price text-right">
                                        <a onclick="return confirm('Znížiť počet o 1');" href="index.php?src=invoices&action=add_to_cart&order_id=<?php echo (new Rest())->get('id_entity') ?>&count=-1&id_entity=<?php echo $product['id_entity']?>">
                                            <i class="fa fa-minus bg-orange action"></i>
                                        </a>											
                                    </td>
                                    <!-- vzmazat -->
                                    <td style="width:20px" class="price text-right">
                                        <a onclick="return confirm('Naozaj chcete vymazať tento produkt?');" href="index.php?src=invoices&action=del_product&order_id=<?php echo (new Rest())->get('id_entity') ?>&product_id=<?php echo $product['id_entity']?>">
                                            <i class="fa fa-trash bg-red action"></i>
                                        </a>											
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3"></div>
            <div class="form-group col-md-6">
                <div class="checkbox">
                    <input type="submit" name="sent" class="form-control btn-primary" value="Aktualizovať údaje">
                </div>
            </div>
            <div class="form-group col-md-3"></div>
        </div>
    </form>
</section>
<?php
get_bottom_html();
get_bottom();
?>