<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Motolo | Admin</title>
        <!-- Core CSS - Include with every page -->
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/main-style.css" rel="stylesheet" />
        <!--gallery-->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/bootstrap-gallery/css/blueimp-gallery.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/bootstrap-gallery/css/bootstrap-image-gallery.css" />
        <!-- Page-Level CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <script>
            // defining js base path
            var js_basePath = '<?php echo Yii::app()->theme->baseUrl; ?>';

            var yii_base_url = "<?php echo Yii::app()->baseUrl; ?>";

        </script>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    </head>
    <body>
        <!--  wrapper -->
        <div id="wrapper">
            <!-- navbar top -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
                <!-- navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $this->createUrl("/site/index"); ?>">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo.png" alt="" />
                    </a>
                </div>
                <!-- end navbar-header -->
                <!-- navbar-top-links -->
                <ul class="nav navbar-top-links navbar-right">
                    <?php
                    //notification box
                    ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                            <i class="fa fa-user fa-3x"></i>
                        </a>
                        <!-- dropdown user-->
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo $this->createUrl("//users/profile"); ?>"><i class="fa fa-user fa-fw"></i>User Profile</a>
                            </li>
                            <li><a href='<?php echo $this->createUrl("/configurations/load", array("m" => "TourType", "child_id" => "new")); ?>'><i class="fa fa-gear fa-fw"></i>Configuration</a>
                            </li>
                            <li><a href='<?php echo $this->createUrl("/configurations/load", array("m" => "ContactUsSetting", "id"=>1, "child_id" => "new")); ?>'><i class="fa fa-gear fa-fw"></i>Contact Us</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->createUrl("/site/logout"); ?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                            </li>
                        </ul>
                        <!-- end dropdown-user -->
                    </li>
                    <!-- end main dropdown -->
                </ul>
                <!-- end navbar-top-links -->

            </nav>
            <!-- end navbar top -->


            <?php echo $content; ?>


        </div>

        <!-- gallery -->
        <div id="blueimp-gallery" class="blueimp-gallery">
            <!-- The container for the modal slides -->
            <div class="slides"></div>
            <!-- Controls for the borderless lightbox -->
            <h3 class="title"></h3>
            <a class="prev"><<</a>
            <a class="next">></a>
            <a class="close">X</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
            <!-- The modal dialog, which will be used to wrap the lightbox content -->
            <div class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body next"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left prev">
                                <i class="glyphicon glyphicon-chevron-left"></i>
                                <?php echo Yii::t("links", "Previous"); ?>
                            </button>
                            <button type="button" class="btn btn-primary next">
                                <?php echo Yii::t("links", "Next"); ?>
                                <i class="glyphicon glyphicon-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end wrapper -->

        <!-- Core Scripts - Include with every page -->

        <?php
        //Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/jquery-1.10.2.js');
        ?>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-1.10.2.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/pace/pace.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/scripts/siminta.js"></script>
        <!--gallery -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/media/bootstrap-gallery/js/jquery.blueimp-gallery.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/media/bootstrap-gallery/js/bootstrap-image-gallery.js"></script>
        <script type="text/javascript">
                jQuery(function() {
                    jQuery('#blueimp-gallery').data('fullScreen', true);
                })
        </script> 
    </body>
</html>
