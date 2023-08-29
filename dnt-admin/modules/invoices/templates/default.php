<?php

use DntLibrary\Base\Dnt;

get_top();
get_top_html();
?>
<section class="col-xs-12" style="margin-bottom:15px">
    <a href="index.php?src=invoices">
        <span class="label label-primary bg-green" style="padding:5px;"><big>ZOZNAM OBJEDNÁVOK</big></span>
    </a>
    <a href="index.php?src=content&included=product">
        <span class="label label-primary bg-blue" style="padding:5px;"><big>ZOZNAM PRODUKTOV</big></span>
    </a>
    <a href="index.php?src=invoices&action=add">
        <span class="label label-primary bg-orange" style="padding:5px;"><big>NOVÁ OBJEDNÁVKA</big></span>
    </a>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="grid no-border">
                <div class="grid-header">
                    <i class="fa fa-file-o"></i> <span class="grid-title">Objednávky</span> 
                    <div class="pull-right grid-tools"> <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a> <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a> <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a> </div>
                </div>
                <div class="grid-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id objednávky</th>
                                <th>Meno, priezvisko</th>
                                <th>Dátum objednania <br/> Dátum aktualizácie <br/> Dátum na faktúre</th>
                                <th>Status objednávky</th>
                                <th>Suma objednávky</th>
                                <th>Akcia</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php
                            foreach ($data['orders'] as $row) {
                                $dateCreated = new DateTime($row['datetime_creat']);
                                $dateUpdated = new DateTime($row['datetime_update']);
                                $datePublish = new DateTime($row['datetime_publish']);
                                ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td> <span class="label label-fa bg-green action"> <?php echo $row['order_id'] ?></span> </td>
                                    <td><b><?php echo (empty($row['company_name'])) ? $row['name'] . ' ' . $row['surname'] : $row['company_name'] ?> </b></td>
                                    <td><b><?php echo $dateCreated->format('d.m.Y H:i:s'); ?></b><br/><?php echo $dateUpdated->format('d.m.Y H:i:s'); ?><br/><?php echo $datePublish->format('d.m.Y H:i:s'); ?></td>
                                    <td> <span class="label label-fa bg-green action"> Objednávka je vybavená</span> </td>
                                    <td> <span class="text-green"> <b><big><?php echo $row['paid'] ?> €</big></b> </span> </td>
                                    <td> 
                                        <a title="Editovať objednávku" href="index.php?src=invoices&action=edit&id_entity=<?php echo $row['id_entity'] ?>"><i class="fa fa-pencil bg-blue action"></i></a>
                                        <a title="Vystaviť faktúru" href="index.php?src=invoices&action=print&id_entity=<?php echo $row['id_entity'] ?>"><i class="fa fa-file-o bg-green action"></i></a>
                                        <a title="Vymazať objednávku" <?php echo Dnt::confirmMsg('Naozaj chcete vymazať túto objednávku? Operáciu už nebude možné vrátiť späť'); ?> href="index.php?src=invoices&action=del&id_entity=<?php echo $row['id_entity'] ?>"><i class="fa fa-trash bg-red action"></i></a> </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <ul class="pagination">
            <li class=""> <a href="http://system.query.sk/dnt-admin/index.php?src=objednavky&amp;page=0"> « </a> </li>
            <li> <a href="http://system.query.sk/dnt-admin/index.php?src=objednavky&amp;page=1"> 1 </a> </li>
            <li> <a href="http://system.query.sk/dnt-admin/index.php?src=objednavky&amp;page=2"> 2</a> </li>
            <li> <a href="http://system.query.sk/dnt-admin/index.php?src=objednavky&amp;page=2"> » </a> </li>
        </ul>
    </div>
</section>
<?php
get_bottom_html();
get_bottom();
?>