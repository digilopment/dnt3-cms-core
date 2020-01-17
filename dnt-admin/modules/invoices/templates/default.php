<?php
get_top();
get_top_html();
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="grid no-border">
                <div class="grid-header">
                    <i class="fa fa-file-o"></i> <span class="grid-title">Objednávky | <a href="index.php?src=objednavky&amp;pridat">Vygenerovať novú objednávku</a></span> 
                    <div class="pull-right grid-tools"> <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a> <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a> <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a> </div>
                </div>
                <div class="grid-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id objednávky</th>
                                <th>Meno, priezvisko</th>
                                <th>Dátum objednania</th>
                                <th>Dátum aktualizácie</th>
                                <th>Status objednávky</th>
                                <th>Zostáva zaplatiť</th>
                                <th>Akcia</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php foreach ($data['orders'] as $row) { ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td> <span class="label label-fa bg-green action"> 20190001</span> </td>
                                    <td><b>team4tourism s.r.o. </b></td>
                                    <td><b>2.2.2019</b> - </td>
                                    <td><b>2.2.2019</b> - </td>
                                    <td> <span class="label label-fa bg-green action"> Objednávka je vybavená</span> </td>
                                    <td> <span class="text-green"> <b><big>0€ / 710</big></b> </span> </td>
                                    <td> <a href="index.php?src=invoices&action=edit&id_entity=<?php echo $row['id_entity'] ?>"><i class="fa fa-pencil bg-blue action"></i></a> <a href="http://system.query.sk/dnt-admin/index.php?src=objednavky&amp;vymazat&amp;id=47&amp;this_address"><i class="fa fa-times bg-red action"></i></a> </td>
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