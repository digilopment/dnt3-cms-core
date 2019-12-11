<?php include "plugins/webhook/tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "plugins/webhook/top.php"; ?>
<?php
$db = new Db;
$rest = new Rest;
$image = new Image();

$urlUpdate = "index.php?src=" . $rest->get('src') . "&id=" . $rest->get('id') . "&action=update";
?>

<?php
//creatXlsFile($table, $columns, $andWhere, $downloadXlsPath);

/*
  $downloadXlsPath 		= "../dnt-system/data/30/uploads/competition_".$_GET['id']."_competitors.xls";
  $input = Array (
  Array ("ID sutaze", "Zobrazeni", "Pocet navstev", "Pocet registracii", "Pocet jedinecnych registracii"),
  Array (
  GET('id'),
  dntPocet($dntDb, "dnt_statistika", "AND competition_id = ".GET('id').""),
  dntStatPocet($dntDb, "dnt_statistika", "AND competition_id = ".GET('id').""),
  dntPocet($dntDb, "obchod_zakaznici", "AND competition_id = ".GET('id').""),
  dntStatUniqueReg($dntDb, "obchod_zakaznici", "AND competition_id = ".GET('id')."")
  ),
  );
  creatXlsFileFromArray($input, $downloadXlsPath);
 */
?>
<section class="content">
    <div class="row" style="background-color: #fff;padding: 5px;margin: 0px;">
        <label class="col-sm-2 control-label"><b>Názov vstupu</b></label>
        <label class="col-sm-1 control-label"><b>Zobraziť na webe?</b></label>
        <label class="col-sm-1 control-label"><b>Nastavenie hodnoty</b></label>

    </div>

    <div class="row">
        <form enctype='multipart/form-data' action="<?php echo $urlUpdate; ?>" method="POST">
            <div class="col-md-12">
                <style type="text/css">
                    .row.form {
                        padding: 0px 15px;
                    }

                    .img-thumb{
                        height: 50px;
                        margin-bottom: -24px;
                        margin-top: -50px;
                    }
                </style>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#sutaz" data-toggle="tab">Nastavenia súťaže</a></li>
                    <li class=""><a href="#hotel" data-toggle="tab">Informácie o hoteli</a></li>
                    <li class=""><a href="#partner" data-toggle="tab">Informácie o partnerovi</a></li>
                    <li class=""><a href="#region" data-toggle="tab">Informácie o regióne</a></li>
                    <li class=""><a href="#preklady" data-toggle="tab">Nastavenia prekladov</a></li>
                    <li class=""><a href="#content" data-toggle="tab">Content</a></li>
                    <li class=""><a href="#form" data-toggle="tab">Formulár</a></li>
                    <li class=""><a href="#email" data-toggle="tab">Konfigurácia emailu</a></li>
                    <li class=""><a href="#statistika" data-toggle="tab">Štatistika</a></li>
                    <li class=""><a href="#poradie-modulov" data-toggle="tab">Poradie modulov</a></li>
                    <li class=""><a href="#save" data-toggle="tab">Uložiť údaje</a></li>
                </ul>
                <div class=" tab-content">
                    <!-- base settings -->
                    <div class="tab-pane active" id="sutaz">
                        <?php
                        $query = meta::competition_id_query(1);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-1 control-label">
                                        <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                    </label>
                                    <div class="col-sm-9 text-left">
                                        <?php if (strpos($row['meta'], "avico") > 0) { ?>
                                            <img class="img-thumb" src="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())) ?>" alt="" />
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>

                                        <?php } elseif (strpos($row['meta'], "ayou") > 0) { ?>

                                            <?php Meta::getCompetitionLayout($row['value']); ?>

                                        <?php } elseif (strpos($row['meta'], "language") > 0) { ?>

                                            <?php Meta::getCompetitionLanguage($row['value']); ?>

                                        <?php } elseif (strpos($row['meta'], "font") > 0) { ?>

                                            <?php Meta::getCompetitionFont($row['value']); ?>

                                        <?php } else { ?>
                                            <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <br/>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <!-- nastavenia partnera -->
                    <div class="tab-pane" id="hotel">
                        <h1>Hotel 1</h1>
                        <b style="color: red;">Vypnutie tohoto hotela na stránke docielite nastavením hodnoty "Zobrazenie" na hodnotu "NIE" pre vstup fieldu  "Názov hotelu 1". </b><br/><br/>
                        <?php
                        $query = meta::competition_id_query(2);
						$i = 0;
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-1 control-label">
                                        <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                    </label>
                                    <div class="col-sm-9 text-left">
                                        <?php if (strpos($row['meta'], "_text_") > 0) { ?>

                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>

                                            <textarea name="<?php echo $row['meta'] ?>" class="ckeditor" id="editor<?php echo $i; ?>" style="height: 95px;"><?php echo $row['value'] ?></textarea>
                                        <?php } elseif (strpos($row['meta'], "image") > 0) { ?>
                                            <img class="img-thumb" src="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())); ?>" alt="" />

                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                        <?php } else { ?>
                                            <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <br/>
                                <?php
								$i++;
                            }
                        }
                        ?>
                        <hr/>
                        <h1>Hotel 2</h1>
                        <b style="color: red;">Vypnutie tohoto hotela na stránke docielite nastavením hodnoty "Zobrazenie" na hodnotu "NIE" pre vstup fieldu  "Názov hotelu 2".  </b><br/><br/>
                        <?php
                        $query = meta::competition_id_query(16);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-1 control-label">
                                        <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                    </label>
                                    <div class="col-sm-9 text-left">
                                        <?php if (strpos($row['meta'], "_text_") > 0) { ?>

                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>

                                            <textarea name="<?php echo $row['meta'] ?>" class="ckeditor" id="editor<?php echo $i; ?>" style="height: 95px;"><?php echo $row['value'] ?></textarea>
                                        <?php } elseif (strpos($row['meta'], "image") > 0) { ?>
                                            <img class="img-thumb" src="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())); ?>" alt="" />
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                        <?php } else { ?>
                                            <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <br/>
                                <?php
                            }
                        }
                        ?>
                        <hr/>  
                        <h1>Hotel 3</h1>
                        <b style="color: red;">Vypnutie tohoto hotela na stránke docielite nastavením hodnoty "Zobrazenie" na hodnotu "NIE" pre vstup fieldu  "Názov hotelu 3".  </b><br/><br/>
                        <?php
                        $query = meta::competition_id_query(17);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-1 control-label">
                                        <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                    </label>
                                    <div class="col-sm-9 text-left">
                                        <?php if (strpos($row['meta'], "_text_") > 0) { ?>
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                            <textarea name="<?php echo $row['meta'] ?>" class="ckeditor" id="editor<?php echo $i; ?>" style="height: 95px;"><?php echo $row['value'] ?></textarea>
                                        <?php } elseif (strpos($row['meta'], "image") > 0) { ?>
                                            <img class="img-thumb" src="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())); ?>" alt="" />
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                        <?php } else { ?>
                                            <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <br/>
                                <?php
                            }
                        }
                        ?>

                        <hr/>  
                        <h1>Hotel 4</h1>
                        <b style="color: red;">Vypnutie tohoto hotela na stránke docielite nastavením hodnoty "Zobrazenie" na hodnotu "NIE" pre vstup fieldu  "Názov hotelu 3".  </b><br/><br/>
                        <?php
                        $query = meta::competition_id_query(18);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-1 control-label">
                                        <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                    </label>
                                    <div class="col-sm-9 text-left">
                                        <?php if (strpos($row['meta'], "_text_") > 0) { ?>
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                            <textarea name="<?php echo $row['meta'] ?>" class="ckeditor" id="editor<?php echo $i; ?>" style="height: 95px;"><?php echo $row['value'] ?></textarea>
                                        <?php } elseif (strpos($row['meta'], "image") > 0) { ?>
                                            <img class="img-thumb" src="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())); ?>" alt="" />
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                        <?php } else { ?>
                                            <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <br/>
                                <?php
                            }
                        }
                        ?>


                    </div>

                    <!-- nastavenia partnera -->
                    <div class="tab-pane" id="partner">
                        <?php
                        $query = meta::competition_id_query(15);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-1 control-label">
                                        <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                    </label>
                                    <div class="col-sm-9 text-left">
                                        <?php if (strpos($row['meta'], "logo") > 0) { ?>
                                            <img class="img-thumb" src="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())); ?>" alt="" />
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                        <?php } else { ?>
                                            <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <br/>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <!-- nastavenia regionu -->
                    <div class="row tab-pane row" id="region">
                        <?php
                        $query = meta::competition_id_query(3);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-1 control-label">
                                        <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                    </label>
                                    <div class="col-sm-9 text-left">
                                        <?php if (strpos($row['meta'], "logo") > 0) { ?>
                                            <img class="img-thumb" src="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())); ?>" alt="" />
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                        <?php } else { ?>
                                            <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <br/>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row tab-pane" id="preklady">
                        <?php
                        $query = meta::competition_id_query(4);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-1 control-label">
                                        <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                    </label>
                                    <?php if (strpos($row['meta'], "koniec_registracie") > 0) { ?>
                                        <div class="col-sm-9 text-left">
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                            <textarea name="<?php echo $row['meta'] ?>" class="ckeditor" id="editor_a" style="height: 95px;"><?php echo $row['value'] ?></textarea>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-sm-9 text-left">
                                            <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        </div>
                                    <?php } ?>
                                </div>
                                <br/>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row tab-pane" id="content">
                        <?php
                        $content_begin_id = 5;
                        $content_end_id = 11;
                        for ($i = $content_begin_id; $i <= $content_end_id; $i++) {
                            $query = meta::competition_id_query($i);
                            if ($db->num_rows($query) > 0) {
                                foreach ($db->get_results($query) as $row) {
                                    ?>
                                    <div class="row form">
                                        <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                        <label class="col-sm-1 control-label">
                                            <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                        </label>
                                        <div class="col-sm-9 text-left">
                                            <?php if (strpos($row['meta'], "_text_") > 0) { ?>
                                                <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                                <textarea name="<?php echo $row['meta'] ?>" class="ckeditor" id="editor<?php echo $i; ?>" style="height: 95px;"><?php echo $row['value'] ?></textarea>


                                            <?php } elseif (strpos($row['meta'], "image") > 0 && $i == 8) { ?>
                                                <img class="img-thumb" src="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())); ?>" alt="" />
                                                <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>

                                            <?php } elseif (strpos($row['meta'], "image") > 0) { ?>
                                                <img class="img-thumb" src="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())); ?>" alt="" />
                                                <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>

                                            <?php } elseif (strpos($row['meta'], "gallery") > 0) { ?>
                                                <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>

                                            <?php } else { ?>
                                                <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <br/>
                                    <?php
                                }
                            }
                            echo "<hr/><br/>";
                        }
                        ?>
                    </div>
                    <div class="row tab-pane" id="form">
                        <?php
                        $query = meta::competition_id_query(12);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-1 control-label">
                                        <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                    </label>
                                    <div class="col-sm-9 text-left">
                                        <?php if (strpos($row['meta'], "file") > 0) { ?>
                                            <a target="_blank" href="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())) ?>">
                                                <img class="img-thumb" src="./img/pdf.png" alt="" style="height: 30px;"/>
                                            </a>
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                        <?php } else { ?>
                                            <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <br/>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <div class="row tab-pane" id="email">
                        <?php
                        $query = meta::competition_id_query(13);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-1 control-label">
                                        <?php Meta::setMetaStatus($row['zobrazenie'], $row['meta']); ?>
                                    </label>
                                    <div class="col-sm-9 text-left">
                                        <?php if (strpos($row['meta'], "file") > 0) { ?>
                                            <img class="img-thumb" src="<?php echo $image->getFileImage(Meta::getCompetitionMetaById($row['meta'], Vendor::getId())); ?>" alt="" />
                                            <iframe src="app/microwebFileUpload.php?metaId=<?php echo $row['id_entity']; ?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                                        <?php } else { ?>
                                            <input type="text" name="<?php echo $row['meta'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <br/>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <div class="row tab-pane" id="poradie-modulov">


                        <div class="row form">

                            <?php
                            $query = "SELECT * FROM `dnt_microsites_composer` WHERE 
					`vendor_id` = '" . Vendor::getId() . "' AND 
					`zobrazenie` = '1' AND
					`competition_id` = '".$rest->get('id')."' AND
					`meta` LIKE '%_menu_name%'
					ORDER by `poradie` ASC
					";
                            if ($db->num_rows($query) > 0) {
                                foreach ($db->get_results($query) as $row) {
                                    ?>

                                    <label class="col-sm-2 control-label"><b><?php echo $row['value'] ?></b></label>
                                    <div class="col-sm-2 text-left">
                                        <input type="number" name="poradie_<?php echo $row['meta'] ?>" value="<?php echo $row['poradie'] ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-sm-8 ">&nbsp;<br/>&nbsp;</div>

                                    <br/>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="row tab-pane" id="save">
                        <input type="submit" name="odoslat" class="btn btn-primary btn-lg btn-block" value="Uložiť">
                    </div>
                    <div class="row tab-pane" id="statistika">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row" style="padding: 15px;">

                                    <!-- počet zobrazení -->
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="grid widget bg-light-blue">
                                            <div class="grid-body">
                                                <span class="title">ZOBRAZENÍ</span>
                                                <span class="value">></span>
                                                <span class="stat1 chart">&nbsp;</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- počet návštev -->
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="grid widget bg-green">
                                            <div class="grid-body">
                                                <span class="title">NÁVŠTEV</span>
                                                <span class="value"></span>
                                                <span class="stat2 chart">&nbsp;</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- počet návštev -->
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="grid widget bg-purple">
                                            <div class="grid-body">
                                                <span class="title">REGISTRÁCII</span>
                                                <span class="value"></span>
                                                <span class="stat3 chart">&nbsp;</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="grid widget bg-red">
                                            <div class="grid-body">
                                                <span class="title">JEDINEČNÝCH REGISTRÁCII</span>
                                                <span class="value"></span>
                                                <span class="stat3 chart">&nbsp;</span></span>
                                                <span class="stat4 chart">&nbsp;</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding: 15px;">
                            <div class="col-sm-12 text-left">
                                <h3><a href="<?php /* echo $downloadXlsPath; */ ?>">Vygenerovať štatistiku do XLS</a></h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include "plugins/webhook/bottom.php"; ?>
<?php get_bottom(); ?>