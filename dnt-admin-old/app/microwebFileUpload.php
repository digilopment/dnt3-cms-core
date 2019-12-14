<?php
include "../../dnt-library/framework/_Class/Autoload.php";
$autoload = new Autoload;
$path = "../../";
$autoload->load($path);

$rest = new Rest;
$metaId = $rest->get("metaId");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">	
        <title>Designdnt</title>
    </head>
    <body style="margin: 0px; padding: 0px; float: left; font-family: font-family;  Arial, Sans-Serif;">

        <?php
        if (isset($_POST['odoslat'])) {
            $dntUpload = new DntUpload;
            $dntUpload->addDefaultImage(
                    "userfile", //input type file
                    "dnt_microsites_composer", //update table
                    "value", //update table column
                    "id", //where column
                    $metaId, //where value
                    "../../dnt-view/data/" . Vendor::getId()  //path
            );
            echo '<table><tr><td><a style="text-decoration: none;" href="">
		 <img src="' . WWW_PATH_ADMIN . 'img/add.png" style="margin-right: 5px; width: 20px; float: left;" alt="Pridať ďalší súbor" title="Pridať ďalší súbor" />
		 </a>
		 </td><td>Fotografia bola úspešne pridaná</td></tr></table>';
        } else {
            ?>
            <form enctype='multipart/form-data' action="" method="POST">
                <input name="userfile" type="file" class="form-control">
                <input name="odoslat" type="submit" name="odoslat" value="Nahrať">
            </form>
<?php } ?>
    </body>
</html>