<?php

use DntLibrary\Base\Api;

?>
<?php get_top(); ?>
<?php
get_top_html();
$api = new Api();
$SQL_LOG_FILES = array();
$folderOfQueries = '../dnt-logs/' . $vendor->getId() . '/sql/';
$files = glob($folderOfQueries . '*.{csv}', GLOB_BRACE);
foreach ($files as $file) {
    $SQL_LOG_FILES[] = (basename($file));
}
?>
<section class="content">
    <div class="row">
        <div style="clear: both;"></div>
        <!-- BEGIN CUSTOM TABLE -->
        <div class="col-md-12">
            <div class="grid no-border">
                <div class="grid-header">
                    <i class="fa fa-table"></i>
                    <span class="grid-title">Spustené SQL query v jednotlivých moduloch</span>
                    <div class="pull-right grid-tools">
                        <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                        <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                        <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <?php
                    $i = 0;
                    foreach ($SQL_LOG_FILES as $file) {
                        ?>
                        <li class="<?php
                        if ($i == 0) {
                            echo 'active';
                        }
                        ?>"><a href="#<?php echo md5($file); ?>" data-toggle="tab"><?php echo $file; ?></a></li>
                            <?php
                            $i++;
                    }
                    ?>
                </ul>
                <div class=" tab-content">
                    <!-- base settings -->
                    <?php
                    $i = 0;
                    foreach ($SQL_LOG_FILES as $file) {
                        ?>
                        <div class="tab-pane <?php
                        if ($i == 0) {
                            echo 'active';
                        }
                        ?>" id="<?php echo md5($file); ?>">
                            <div class="grid-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>Názov</th>
                                            <th>Query</th>
                                            <th>Url pre JSON</th>
                                            <th>Url pre XML</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $row = array();
                                        $i = 0;
                                        if (($handle = fopen($folderOfQueries . $file, 'r')) !== false) {
                                            while (($row = fgetcsv($handle, 10000000, ';')) !== false) {
                                                if (isset($row['0']) && $i > 0) {
                                                    $name = $row[3];
                                                    $nameUrl = $row[4];
                                                    $getQuery = $row[5];

                                                    $base64Query = base64_encode(urldecode($getQuery));

                                                    $jsonURL = WWW_PATH . 'dnt-api/json/' . $nameUrl . '/base64/?q=' . $base64Query;
                                                    $xmlURL = WWW_PATH . 'dnt-api/xml/' . $nameUrl . '/base64/?q=' . $base64Query;

                                                    $jsonURLShow = WWW_PATH . 'dnt-api/json/' . $nameUrl;
                                                    $xmlURLShow = WWW_PATH . 'dnt-api/xml/' . $nameUrl;
                                                    ?>
                                                    <tr>
                                                        <td style="width: 2%;"><?php echo $i; ?></td>
                                                        <td style="width: 8%;"><b><?php echo $name; ?></b></td>
                                                        <td style="width: 30%;">
                                                            <textarea style="width: 100%; height:60px"><?php echo $getQuery; ?></textarea>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <i class="fa fa-arrow-right bg-green action"></i> <a href="<?php echo $jsonURL; ?>" target="_blank">
                                                                <?php echo $jsonURLShow; ?></a>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <i class="fa fa-arrow-right bg-green action"></i> <a href="<?php echo $xmlURL; ?>" target="_blank">
                                                    <?php echo $xmlURLShow; ?></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $i++;
                                            }
                                            fclose($handle);
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- base settings -->
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
                <!-- end tabs -->
            </div>
            <!-- END PAGINATION -->
        </div>
        <!-- BEGIN PAGINATION -->
        <!-- END CUSTOM TABLE -->           
    </div>
    <!-- END CUSTOM TABLE -->
<?php get_bottom_html(); ?>
<?php get_bottom(); ?>