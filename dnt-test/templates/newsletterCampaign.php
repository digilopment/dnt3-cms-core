<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />
        <title>Marketingové kampane</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?php echo $data['baseUrl'] ?>media/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $data['baseUrl'] ?>media/jquery.dataTables.min.css" rel="stylesheet">
        <script src="<?php echo $data['baseUrl'] ?>media/jquery-1.12.3.js"></script>
        <script src="<?php echo $data['baseUrl'] ?>media/jquery.dataTables.min.js"></script>
        <!-- CSS code from Bootply.com editor -->
        <style type="text/css">
            .logouted{
                opacity: 0.4;
                background-color: #efefef;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    "lengthMenu": [[15, 25, 75, -1], [15, 25, 75, "All"]],
                    "order": [[3, "asc"]],
                    "language": {
                        "url": "<?php echo $data['baseUrl'] ?>media/Slovak.json"
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Zoznam emailov z kampane <?php echo $data['campaignId']; ?></h2>
                    <h4>Generované: <?php echo $data['datetime'] ?></h4>
                    <hr/>
                    Všetky dáta sú vypočítané voči odoslaným emailom <b>(<?php echo $data['countMails'] ?> / 100%)</b>
                    <hr/>
                </div>
                <div class="col-md-4">
                    <p>
                        <span style="color:#ff0000">Počet odoslaných emailov: <b><?php echo $data['countMails'] ?> (100%)</b></span><br/>
                        Počet doručených emailov: <b><?php echo $data['countDelivered'] ?> (<?php echo $data['deliveredPercentage'] ?>%)</b><br/>
                        Celkový počet otvorení: <b><?php echo $data['countSeenEmails'] ?></b><br/>
                        Úspešnosť otvorenia: <b><?php echo $data['seenPercentage'] ?>%</b><br/><br/>
                        <span style="color:#ff0000">Celkový počet kliknutí: <b><?php echo $data['countClickedEmails'] ?></b></span><br/>
                        Úspešnosť kliknutia: <b><?php echo $data['clickedPercentage'] ?>%</b><br/>
                    </p>
                </div>
                <div class="col-md-4">
                    <p>
                        &nbsp;<br/><br/>
                        Unikátny počet otvorení: <b><?php echo $data['countSeenUnique'] ?></b><br/>
                        <span style="color:#ff0000">Unikátna úspešnosť otvorenia: <b><?php echo $data['seenUniquePercentage'] ?>%</b></span><br/><br/>
                        Unikátny počet kliknutí (<b>klik / email</b>): <b><?php echo $data['countClickedUnique'] ?></b><br/>
                        Unikátna úspešnosť kliknutia: <b><?php echo $data['clickedPercentageUnique'] ?>%</b><br/>
                    </p>
                </div>
                <div class="col-md-4">
                    <p>
                        &nbsp;<br/><br/>
                        Počet kliknutí na linku (bez odhlásenia): <b><?php echo $data['countDefaultUrl'] ?></b><br/>
                        Úspešnosť otvorenia (bez odhlásenia): <b><?php echo $data['percentageDefaultUrl'] ?>%</b><br/><br/>
                        Počet žiadostí o odhlásenie (unikátne): <b><?php echo $data['countLogoutedUrlUnique'] ?></b><br/>
                        Úspešnosť odhlásenia: <b><?php echo $data['percentageLogoutedUrl'] ?>%</b><br/>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Kliknuté URL adresy<small>[spolu]</small> bez kliknutia na odhlásenie sa(<?php echo $data['countDefaultUrl']; ?>)</h3>
                </div>
                <div class="col-md-12">
                    <p>
                        <?php
                        $defaultLinks = $data['urlCounter']['default'];
                        foreach ($defaultLinks as $keyUrl => $count) {
                            ?>
                            <b><?php echo $count ?></b> => <?php echo $keyUrl ?><br/>
                        <?php } ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <hr/>
            </div>
            <?php if ($data['showUsers']) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Meno a priezvisko</th>
                                    <th>email</th>
                                    <th>Videl</th>
                                    <th>Klikol</th>
                                    <th>Počet kliknutí</th>
                                    <th>Kde klikal</th>
                                    <th>System</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Meno a priezvisko</th>
                                    <th>email</th>
                                    <th>Videl</th>
                                    <th>Klikol</th>
                                    <th>Počet kliknutí</th>
                                    <th>Kde klikal</th>
                                    <th>System</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($data['sentEmails'] as $item) { ?>
                                    <tr <?php echo ($item->show != 1) ? 'class="logouted"' : false; ?>>
                                        <td> <?php echo $item->id ?></td>
                                        <td> <?php echo $item->name ?> <?php echo $item->surname ?></td>
                                        <td> <?php echo $item->email ?></td>
                                        <td> <?php echo isset($data['setLogData'][$item->email]) ? '<b>ÁNO</b>' : 'NIE'; ?></td>
                                        <td> <?php echo isset($data['setLogData'][$item->email]) ? '<b>' . $data['setLogData'][$item->email]['clicked']() . '</b>' : 'NIE'; ?></td>
                                        <td> <?php echo isset($data['setLogData'][$item->email]) ? '<b>' . $data['setLogData'][$item->email]['countClick']() . '</b>' : '0'; ?></td>
                                        <td> <?php
                                            if (isset($data['setLogSeenData'][$item->email])) {
                                                foreach ($data['setLogSeenData'][$item->email]['logs'] as $log) {
                                                    echo isset(json_decode($log->msg)->redirectTo) ? "Videl o: <b>" . $log->timestamp . "</b><br/>" : false . "<br/>";
                                                }
                                            }
                                            if (isset($data['setLogData'][$item->email])) {
                                                foreach ($data['setLogData'][$item->email]['logs'] as $log) {
                                                    echo isset(json_decode($log->msg)->redirectTo) ? "<b>" . $log->timestamp . "</b><br/>" . json_decode($log->msg)->redirectTo . "<br/>" : false . "<br/>";
                                                }
                                            }
                                            ?></td>
                                        <td> <?php
                                            if (isset($data['setLogData'][$item->email])) {
                                                foreach ($data['setLogData'][$item->email]['logs'] as $log) {
                                                    if ($log->system_status == 'newsletter_log_click') {
                                                        echo $data['dnt']->getOs($log->HTTP_USER_AGENT) . "<br/><br/>";
                                                    } else {
                                                        echo $data['dnt']->getOs($log->HTTP_USER_AGENT) . "<br/>";
                                                    }
                                                }
                                            }
                                            ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h2>Kliknuté URL adresy <small>[počet=>url]</small>(<?php echo count($data['urlCounter']['default']); ?>)</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>Žiadosti o odhlásenie <small>[počet=>email]</small>(<?php echo count($data['urlCounter']['logout']); ?>)</h2>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <?php
                            $defaultLinks = $data['urlCounter']['default'];
                            foreach ($defaultLinks as $keyUrl => $count) {
                                ?>
                                <b><?php echo $count ?></b> => <?php echo $keyUrl ?><br/>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <?php
                            $logoutLinks = $data['urlCounter']['logout'];
                            foreach ($logoutLinks as $keyUrl => $count) {
                                ?>
                                <b><?php echo $count ?></b> => <?php echo $keyUrl ?><br/>
                            <?php } ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>