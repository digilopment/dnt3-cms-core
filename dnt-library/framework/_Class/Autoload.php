<?php

/**
 *  class       Autoload
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

class Autoload
{

    public function load($path)
    {
        /**
         * CONFIG
         */
        include $path . "dnt-library/framework/_keys/public.php";

        if (file_exists($path . "config_pro.dnt")) {
            include $path . "config_pro.dnt";
        } else {
            include $path . "config.dnt";
        }

        /**
         * CLASS
         */
        include $path . "dnt-library/framework/_Class/dompdf/dompdf_config.inc.php";
        include $path . "dnt-library/framework/_Class/qr/qrlib.php";
        include $path . "dnt-library/framework/_Class/xlsx/php-excel-reader/excel_reader2.php";
        include $path . "dnt-library/framework/_Class/xlsx/SpreadsheetReader.php";
        include $path . "dnt-library/framework/_Class/Db.php";
        include $path . "dnt-library/framework/_Class/GoogleCaptcha.php";
        include $path . "dnt-library/framework/_Class/MultyLanguage.php";
        include $path . "dnt-library/framework/_Class/Webhook.php";
        include $path . "dnt-library/framework/_Class/Config.php";
        include $path . "dnt-library/framework/_Class/Cache.php";
        include $path . "dnt-library/framework/_Class/Vendor.php";
        include $path . "dnt-library/framework/_Class/Mail.php";
        include $path . "dnt-library/framework/_Class/Upload.php";
        include $path . "dnt-library/framework/_Class/DntUpload.php";
        include $path . "dnt-library/framework/_Class/ExceptionThrower.php";
        include $path . "dnt-library/framework/_Class/Session.php";
        include $path . "dnt-library/framework/_Class/Cookie.php";
        include $path . "dnt-library/framework/_Class/Dnt.php";
        include $path . "dnt-library/framework/_Class/Rest.php";
        include $path . "dnt-library/framework/_Class/Url.php";
        include $path . "dnt-library/framework/_Class/FaceDetector.php";
        include $path . "dnt-library/framework/_Class/DntMailer.php";
        include $path . "dnt-library/framework/_Class/DntLog.php";
        include $path . "dnt-library/framework/_Class/XMLgenerator.php";
        include $path . "dnt-library/framework/_Class/Image.php";
        include $path . "dnt-library/framework/_Class/AdminUser.php";
        include $path . "dnt-library/framework/_Class/User.php";
        include $path . "dnt-library/framework/_Class/Settings.php";
        include $path . "dnt-library/framework/_Class/Api.php";
        include $path . "dnt-library/framework/_Class/AdminContent.php";
        include $path . "dnt-library/framework/_Class/AdminMailer.php";
        include $path . "dnt-library/framework/_Class/Navigation.php";


        include $path . "dnt-library/framework/_Class/Polls.php";
        include $path . "dnt-library/framework/_Class/PollsFrontend.php";
        include $path . "dnt-library/framework/_Class/ArticleView.php";
        include $path . "dnt-library/framework/_Class/ArticleList.php";
        include $path . "dnt-library/framework/_Class/Frontend.php";
        include $path . "dnt-library/framework/_Class/Install.php";
        include $path . "dnt-library/framework/_Class/FileAdmin.php";
        include $path . "dnt-library/framework/_Class/Pdf.php";
        include $path . "dnt-library/framework/_Class/Eshop.php";
        include $path . "dnt-library/framework/_Class/Meta.php";
        include $path . "dnt-library/framework/_Class/Xlsx.php";
        include $path . "dnt-library/framework/_Class/PostMeta.php";
        include $path . "dnt-library/framework/_Class/Voucher.php";
        include $path . "dnt-library/framework/_Class/Gallery.php";

        /**
         * MESSENGER BOT
         */
        include $path . "dnt-library/framework/_Class/MessengerBot.php";
    }

}
