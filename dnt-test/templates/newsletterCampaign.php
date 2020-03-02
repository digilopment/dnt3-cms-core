<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Marketingové kampane | TV Markíza</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?php echo $data['baseUrl'] ?>media/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $data['baseUrl'] ?>media/jquery.dataTables.min.css" rel="stylesheet">
        <script src="<?php echo $data['baseUrl'] ?>media/jquery-1.12.3.js"></script>
        <script src="<?php echo $data['baseUrl'] ?>media/jquery.dataTables.min.js"></script>
        <!-- CSS code from Bootply.com editor -->
        <style type="text/css">
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Zoznam emailov z odoslanej kampane</h2>
            </div>
            <div class="col-md-4">
                <p>
                    Počet odoslaných emailov: <b><?php echo $data['countMails']?></b><br/>
                    Počet respondentov, ktorý otvorili email: <b><?php echo $data['countOpenedMails']?></b><br/>
                    Percentuálna úspešnosť otvorenia: <b><?php echo $data['percentage']?></b><br/>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Meno</th>
                            <th>Priezvisko</th>
                            <th>email</th>
                            <th>Otovril</th>
                            <th>Kde klikal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Meno</th>
                            <th>Priezvisko</th>
                            <th>email</th>
                            <th>Otovril</th>
                            <th>Kde klikal</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data['sentEmails'] as $item) { ?>
                            <tr>
                                <td> <?php echo $item->id ?></td>
                                <td> <?php echo $item->name ?></td>
                                <td> <?php echo $item->surname ?></td>
                                <td> <?php echo $item->email ?></td>
                                <td> <?php echo $data['countClicks']($item->email) ?></td>
                                <td> <?php foreach($data['logByEmail']($item->email) as $log){
                                    echo isset(json_decode($log->msg)->redirectTo) ? "<b>" . $log->timestamp ."</b><br/>". json_decode($log->msg)->redirectTo . "<br/>" : '(undefined)' ."<br/>";
                                } ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>