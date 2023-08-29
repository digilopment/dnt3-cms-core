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
                        Percentuálny počet odhlásení: <b><?php echo $data['percentageLogoutedUrl'] ?>%</b><br/>
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
        </div>
    </body>
</html>