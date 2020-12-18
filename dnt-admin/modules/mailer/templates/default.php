<?php

use DntLibrary\Base\Settings;

get_top();
get_top_html();
$db = $data['db'];
$rest = $data['rest'];
$adminMailer = $data['adminMailer'];
$dnt = $data['dnt'];
$vendor = $data['vendor'];
$settings = $data['settings'];
$countPages = $data['countPages'];
?>
<section class="row content-header">
    <ul >
        <li class="post_type" style="text-decoration: underline">
           <!--<span class="label label-primary bg-green" style="padding: 5px;"><big>PRIDAŤ EMAIL</big></span>-->
            <button class="btn btn-primary bg-green" data-toggle="modal" data-target="#modalPrimary2">PRIDAŤ EMAIL</button>
        </li>
        <li class="post_type" style="text-decoration: underline">
            <button class="btn btn-primary bg-green" data-toggle="modal" data-target="#pridat_kat">PRIDAŤ KATEGÓRIU</button>
        </li>
        <li class="post_type" >
            <a href="index.php?src=content&included=post&filter=293">
                <span class="btn btn-primary bg-green" >VYTVORIŤ ŠABLONU</span>
            </a>
        </li>
        <li class="post_type" style="text-decoration: underline">
           <!--<span class="label label-primary bg-green" style="padding: 5px;"><big>PRIDAŤ EMAIL</big></span>-->
            <button class="btn btn-primary bg-green" data-toggle="modal" data-target="#modalPrimary3">ODOSLAŤ HROMADNÝ MAIL</button>
        </li>
        <br/><br/><br/>
        <li class="post_type">
            <a href="index.php?src=mailer">
                <span class="label label-primary bg-blue" style="padding: 5px;"><big>Všetky</big></span>
            </a>
        </li>
        <?php
        foreach ($data['categories'] as $cat) {
            ?>
            <li class="post_type">
                <a href="<?php echo $adminMailer->url("filter", $cat['id_entity'], false, false, false, 1) ?>">
                    <span class="label label-primary bg-blue" style="padding: 5px;"><big><?php echo $cat['name']; ?></big></span>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
</section>
<!-- MODAL NEW EMAIL -->
<div class="modal fade" id="modalPrimary2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
    <div class="modal-wrapper">
        <div class="modal-dialog">
            <form action="<?php echo $adminMailer->url("add_mail", false, false, false, false, false) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header bg-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel8">Pridať email do zoznamu</h4>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control" placeholder="Meno:"/>
                        <br/>
                        <input type="text" name="surname" class="form-control" placeholder="Priezvisko:"/>
                        <br/>
                        <input type="text" name="email" class="form-control" placeholder="Email:"/>
                        <br/>
                        <select name="cat_id" id="cname" class="form-control" minlength="2" required="">
                            <option value="NULL">(kategória emailu)</option>
                            <?php
                            foreach ($data['categories'] as $cat) {
                                echo"<option value='" . $cat['id_entity'] . "'>" . $cat['name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Zavrieť</button>
                            <input type="submit" name="sent" value="Pridať email" class="btn btn-primary" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL -->
<!-- MODAL NEW KAT -->
<div class="modal fade" id="pridat_kat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
    <div class="modal-wrapper">
        <div class="modal-dialog">
            <form action="<?php echo $adminMailer->url("add_cat", false, false, false, false, false) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header bg-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel8">Pridať novú kategóriu do zoznamu</h4>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control" placeholder="Názov kategórie:"/>
                        <br/>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Zavrieť</button>
                            <input type="submit" name="sent" value="Pridať" class="btn btn-primary" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL -->
<!-- MODAL ODOSLAT EMAILY-->
<div class="modal fade" id="modalPrimary3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
    <div class="modal-wrapper">
        <div class="modal-dialog">
            <form action="<?php echo $adminMailer->url("sent_mail", false, false, false, false, false) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header bg-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel8">Pridať email do zoznamu</h4>
                    </div>
                    <div class="modal-body">
                        <h4><strong>Nastavenia odosielateľa</strong></h4>
                        <input type="text" name="subject" class="form-control" placeholder="Predmet:"/>
                        <br/>
                        <input type="text" name="senderName" class="form-control" placeholder="Odosielateľ (<?php echo $settings->get("vendor_company"); ?>)"/>
                        <br/>
                        <input type="text" name="senderEmail" class="form-control" value="" placeholder="Email odosielateľa (<?php echo $settings->get("vendor_email"); ?>)"/>
                        <br/>
                        <input type="checkbox" name="useSenderFromEmail" checked=""/> Ak je pri emaile v zozname emailov vyplnený <b>odosielateľ</b> a <b>email odosielateľa</b>, použiť tento email a meno (email odosielateľa a meno odosielateľa) na doručenie konkrétnej emailovej adresy pod týmito doručovacími údajmi.
                        <br/>
                        <input type="checkbox" name="addUrlIdentificator"/> Pridať ku cieľovým URL-adresám <b>dnt3ClickId</b> identifikátor.
                        <h4><strong>Šablóna alebo správa</strong></h4>
                        <input type="text" name="url_external" class="form-control" placeholder="Url: vzdialenej šablony"/>
                        <br/>
                        <select name="template" id="cname" class="form-control" minlength="2" required="">
                            <option value="NULL">(vyberte šablonu)</option>
                            <?php
                            $query = "SELECT * FROM dnt_posts WHERE cat_id = '293' AND vendor_id = '" . $vendor->getId() . "'";
                            if ($db->num_rows($query) > 0) {
                                foreach ($db->get_results($query) as $row) {
                                    echo"<option value='" . $row['cat_id'] . "'>" . $row['name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <br/>
                        <textarea  name="message" class="form-control" placeholder="Správa:"/></textarea>
                        <h4><strong>Cielenie</strong></h4>
                        <input type="text" name="campain" class="form-control" placeholder="Názov kampane:"/>
                        <br/>
                        <select name="users" id="cname" class="form-control" minlength="2" required="">
                            <option value="NULL">(vyberte kategóriu prijmateľov)</option>
                            <?php
                            foreach ($data['categories'] as $cat) {
                                echo"<option value='" . $cat['id_entity'] . "'>" . $cat['name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Zavrieť</button>
                            <input type="submit" name="sent" value="Odoslať" class="btn btn-primary" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL -->
<!-- BEGIN CUSTOM TABLE -->
<br/>
<div class="row" style="clear: both;"></div>
<div class="col-xs-12">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#maily" data-toggle="tab">Zoznam Mailov</a></li>
        <li><a href="#kat" data-toggle="tab">Kategórie</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="maily">
            <div class="grid-header">
                <i class="fa fa-table"></i>
                <span class="grid-title">Maily</span>
                <div class="pull-right grid-tools">
                    <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                    <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                    <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="grid-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 5%;">Titul</th>
                            <th style="width: 15%;">Meno</th>
                            <th style="width: 15%;">Priezvisko</th>
                            <th style="width: 15%;">Email</th>
                            <th style="width: 15%;">Odosielateľ</th>
                            <th style="width: 15%;">Email odosielateľa</th>
                            <!--<th>Dátum pridania</th>-->
                            <th style="width: 20%;">Kategória</th>
                            <th></th>
                            <th>Show</th>
                            <th>Vymazať</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $adminMailer->query();			
                        //$i = $adminMailer->showOrder();
                        //$page = $adminMailer->getPage("current");
						$i = $data['page'] * $data['pageLimit'] - $data['pageLimit'] + 1;
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                $cat_id = $row['cat_id'];
                                $post_id = $row['id_entity'];
                                $cat_id = $row['cat_id'];
                                ?>
                            <form method="POST" action="<?php echo $adminMailer->url("edit_mail", $cat_id, false, false, $post_id, $page) ?>" >
                                <tr>
                                    <td><?php echo $i++; ?> (<?php echo $row['id_entity']; ?>)</td>
                                    <td><b><input style="width: 80%;" type="text" name="title" value="<?php echo $row['title']; ?>" /></b></td>
                                    <td><b><input style="width: 80%;" type="text" name="name" value="<?php echo $row['name']; ?>" /></b></td>
                                    <td><b><input style="width: 80%;" type="text" name="surname" value="<?php echo $row['surname']; ?>" /></b></td>
                                    <td><b><input style="width: 100%;" type="email" name="email" value="<?php echo $row['email']; ?>" /></b></td>
                                    <td><b><input style="width: 100%;" type="text" name="senderName" value="<?php echo $row['sender_name']; ?>" /></b></td>
                                    <td><b><input style="width: 100%;" type="text" name="senderEamil" value="<?php echo $row['sender_email']; ?>" /></b></td>
                                    <td>
                                        <select name="cat_id" id="cname" class="form-control" minlength="2" required >
                                            <?php
                                            foreach ($data['categories'] as $cat) {
                                                if ($cat['id_entity'] == $row['cat_id'])
                                                    echo"<option value='" . $cat['id_entity'] . "' selected>" . $cat['name'] . "</option>";
                                                else
                                                    echo"<option value='" . $cat['id_entity'] . "'>" . $cat['name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <?php echo $dnt->returnInput(); ?>
                                        <input type="submit" name="sent" value="Upraviť" class="label-primary bg-green" />
                                    </td>
                                    <td>
                                        <a href="<?php echo $adminMailer->url("show_hide", $cat_id, false, false, $post_id, $page) ?>">
                                            <i class="<?php echo admin_zobrazenie_stav($row['show']); ?>"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a <?php echo $dnt->confirmMsg("Naozaj chcete zmazať tento email?"); ?> href="<?php echo $adminMailer->url("del_mail", $cat_id, false, false, $post_id, $page) ?>"><i class="fa fa-times bg-red action"></i></a>
                                    </td>
                                </tr>
                            </form>
                            <?php
                        }
									
                    } else {
                        no_results();
                    }
                    ?>									
                    </tbody>
                </table>
            </div>
	
            <ul class="pagination">
                <li class="">
                    <a href="<?php echo $adminMailer->paginator("prev", $countPages); ?>">
                        &laquo;
                    </a>
                </li>
                <li>
                    <a href="<?php echo $adminMailer->paginator("first", $countPages); ?>">
                        <?php echo $adminMailer->getPage("first", $countPages); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $adminMailer->paginator("last", $countPages); ?>">
                        <?php echo $adminMailer->getPage("last", $countPages); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $adminMailer->paginator("next", $countPages); ?>">
                        &raquo;
                    </a>
                </li>
            </ul>
            <!-- END PAGINATION -->
        </div>
        <div class="tab-pane " id="kat">
            <div class="grid-header">
                <i class="fa fa-table"></i>
                <span class="grid-title">Maily</span>
                <div class="pull-right grid-tools">
                    <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                    <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                    <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="grid-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Názov</th>
                            <th>Kategória</th>
                            <th></th>
                            <th>Akcia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $adminMailer->catQuery();
                        $pocet = $db->num_rows($query);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                            <form method="POST" action="index.php?src=mailer&upravit-akcia=<?php echo $row['id_entity']; ?>" >
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><b><input style="width: 60%;" type="text" name="nazov" value="<?php echo $row['name']; ?>" /></b></td>
                                    <td><b><input style="width: 60%;" type="text" name="typ" value="<?php echo $row['cat_id']; ?>" /></b></td>
                                    <td>
                                        <?php echo $dnt->returnInput(); ?>
                                        <input type="submit" name="odoslat" value="Upraviť" class="label-primary bg-green" />
                                    </td>
                                    <td>
                                        <a href="<?php echo $adminMailer->url("del_cat", $cat_id, false, false, $post_id, $page) ?>"><i class="fa fa-times bg-red action"></i></a>
                                    </td>
                                </tr>
                            </form>
                            <?php
                        }
                    } else {
                        no_results();
                    }
                    ?>									
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN PAGINATION -->
<?php get_bottom_html(); ?>
<?php get_bottom(); ?>