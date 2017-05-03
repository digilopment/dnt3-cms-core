<!DOCTYPE html>
<!--INFO
  This website is powered by Designdnt3 a generated as 3rd version - professionals for better internet.
  Designdnt3 is a Application framework initially written by DntLibrary and developed by Designdnt - The Query company. 
  Author: Tomas Doubek.
  Addons, services and overlays are copyright of their respective owners. 
  Information and contribution at http://designdnt.query.sk/  
  active packages: dntLibrary; dntAddOnsComposer; dntServices; dntJson; dntSoap; dntXml; dntRss; dntBoost-balancer
  
  TECHNICAL
  *designdnt 	-> https://www.facebook.com/designdnt
  *system:   	-> Designdnt3 - The Query
  *version:   	-> 3.3 - December 2015
  *api version	-> 2.1
-->
<?php
$image = new Image();
?>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo Meta::getCompetitionMeta('description'); ?>">
        <meta name="keywords" content="<?php echo Meta::getCompetitionMeta('keywords'); ?>">
        <meta name="author" content="">
        <meta name="robots" content="index, follow">
        <title><?php echo Meta::link_format(Vendor::getColumn('real_url')); ?></title>

        <!-- Bootstrap Core CSS -->
        <link rel="shortcut icon" href="<?php echo $image->getFileImage(Meta::getCompetitionMeta('favicon')); ?>" type="text/css">

        <link rel="stylesheet" href="<?php echo $css_path; ?>/bootstrap.min.css" type="text/css">

        <!-- Custom Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo $css_path; ?>/font-awesome.min.css" type="text/css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="<?php echo $css_path; ?>/animate.min.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo $css_path; ?>/creative.css" type="text/css">
        <link rel="stylesheet" href="<?php echo $css_path; ?>/custom.css?<?php echo rand(1, 15) ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo $css_path; ?>/custom2.css?<?php echo rand(1, 15) ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo $css_path; ?>/color.blue.css" type="text/css">
        <?php
        //adapter
        $r = Meta::getCompetitionMeta('_r');
        $g = Meta::getCompetitionMeta('_g');
        $b = Meta::getCompetitionMeta('_b');

        if (Meta::getCompetitionMetaExists('_r') && Meta::getCompetitionMetaExists('_g') && Meta::getCompetitionMetaExists('_b')) {
            echo
            '
		<style type="text/css">
		hr {
			  border-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}

			a {
			  color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			
			.navbar-default .nav > li.active > a, 
			.navbar-default .nav > li.active > a:hover, 
			.navbar-default .nav > li.active > a:focus {
				 color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1) !important;
				 font-weight: bold;
				 text-decoration: none;
			}
			
			#main-carousel{
				background-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}

			.bg-primary {
			  background-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			
			.dnt-form-control input {
				border: 1.5px solid rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			
			.navbar-default.affix {
				/*background-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 0.8);*/
				background-color: rgba(245, 245, 245, 0.9);
				border-bottom: 2px solid rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}


			.navbar-default .navbar-header .navbar-brand {
			  color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}

			.navbar-default .nav > li > a:hover,
			.navbar-default .nav > li > a:focus:hover {
			  color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			
			/*
			.navbar-default .nav > li.active > a,
			.navbar-default .nav > li.active > a:focus {
			  color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1); !important;
			}
			*/
			

			@media (min-width: 768px) {

			  .navbar-default.affix .navbar-header .navbar-brand {
				color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
				color: #fff !important;
			  }
			  /*.navbar-default.affix .nav > li.active > a:hover,
			  .navbar-default.affix .nav > li.active > a:focus,*/
			  .navbar-default.affix .nav > li > a:hover,
			  .navbar-default.affix .nav > li > a:focus {
				color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
				/*color: #fff !important;*/
			  }
			  
			  
			  /*.navbar-default.affix .nav > li > a, 
			  .navbar-default.affix .nav > li > a:hover {
					color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
				}
			*/
			  
			  header .header-content .header-content-inner p {
					background-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
				}
			}

			.text-primary {
			  color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			
			#portfolio .landscape {
				border: 15px solid rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			
			.ubytovanie {
				background-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}

			.register-info{
				 border-right: 0px dashed rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			.register-form{
				 border-left: 1px dashed rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}


			.dnt-form-control .btn-post{
				background-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
				border-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			
			.dnt-form-control .btn-post {
				background-color: rgba(100, 88, 83, 0.5);
				border-color: rgba(42, 39, 37, 0.5);
			}

			.btn-primary {
			  background-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			  border-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			
			.footer_widget ul li a {
				color: #111111;
			}


			.btn-primary.disabled,
			.btn-primary[disabled],
			fieldset[disabled] .btn-primary,
			.btn-primary.disabled:hover,
			.btn-primary[disabled]:hover,
			fieldset[disabled] .btn-primary:hover,
			.btn-primary.disabled:focus,
			.btn-primary[disabled]:focus,
			fieldset[disabled] .btn-primary:focus,
			.btn-primary.disabled.focus,
			.btn-primary[disabled].focus,
			fieldset[disabled] .btn-primary.focus,
			.btn-primary.disabled:active,
			.btn-primary[disabled]:active,
			fieldset[disabled] .btn-primary:active,
			.btn-primary.disabled.active,
			.btn-primary[disabled].active,
			fieldset[disabled] .btn-primary.active {
			  background-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			  border-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			.btn-primary .badge {
			  color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}
			.portfolio-box .portfolio-box-caption {
				background: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}';


            //horny footer
            echo '.footer_top_two {
				background-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 0.9);
			}';

            //dolny footer
            echo '
			.footer_bottom_two {
				background-color: rgba(' . $r . ', ' . $g . ', ' . $b . ', 1);
			}';

            echo '</style>
		';
        }
        if (Meta::getCompetitionMetaExists('_font')) {
            echo '
			<style type="text/css">
			
				body {
					font-family: ' . Meta::getCompetitionMeta('_font') . ';
				}
				
				h1,
				h2,
				h3,
				h4,
				h5,
				h6 {
				  font-family: ' . Meta::getCompetitionMeta('_font') . ';
				}
				
				.navbar-default {
					font-family: ' . Meta::getCompetitionMeta('_font') . ';
				}
				
				.navbar-default .navbar-header .navbar-brand {
				  font-family: ' . Meta::getCompetitionMeta('_font') . ';
				}



				.portfolio-box .portfolio-box-caption .portfolio-box-caption-content .project-category,
				.portfolio-box .portfolio-box-caption .portfolio-box-caption-content .project-name {
				  font-family: ' . Meta::getCompetitionMeta('_font') . ';
				}

				.btn {
				  font-family: ' . Meta::getCompetitionMeta('_font') . ';
				}
				
				
				
			</style>
			';
        }
        ?>

        <!-- light box -->
        <link href="<?php echo $css_path; ?>/lightbox.css" rel="stylesheet">
        <script type="text/javascript">
            /* THIS IS GLOBAL */
            var locationTitle = "<?php echo Meta::getCompetitionMeta('map_location'); ?>"; // Enter your event title
            var locationAddress = "<?php echo Meta::getCompetitionMeta('map_location'); ?>"; // Enter your event address
        </script>
        <script  type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAjpUqmtS9blsxsEUUgFN8HXjBSf2esdLI"></script>
        <?php /* <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjpUqmtS9blsxsEUUgFN8HXjBSf2esdLI"></script> */ ?>
        <?php
        $mapLocation = Meta::getMapLocation();
        $map_first = $mapLocation[0];
        $map_second = $mapLocation[1];
        $map_zoom = $mapLocation[2];
        ?>
        <script  type="text/javascript">
          /*function initMap() {
           // Create a map object and specify the DOM element for display.
           var map = new google.maps.Map(document.getElementById('googleMap'), {
           center: {lat: -34.397, lng: 150.644},
           scrollwheel: false,
           zoom: 8
           });
           }*/

          function initialize()
          {
              var mapProp = {
                  center: new google.maps.LatLng(<?php echo $map_first; ?>,<?php echo $map_second; ?>),
                  zoom:<?php echo $map_zoom; ?>,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              };
              var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
          }
          google.maps.event.addDomListener(window, 'load', initialize);





        </script>


        <script src="<?php echo $js_path; ?>/jquery-1.11.3.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function () {       //Error happens here, $ is not defined.
            $(".ubytovanie").last().css("border-bottom", "0px solid #fff");
        });
        </script>
    </head>