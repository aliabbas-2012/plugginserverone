<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <!-- Core CSS - Include with every page -->
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/main-style.css" rel="stylesheet" />

    </head>

    <body class="body-Login-back">

        <div class="container">

            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo.png" alt=""/>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">                  
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Scripts - Include with every page -->
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/jquery-1.10.2.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/metisMenu/jquery.metisMenu.js"></script>

    </body>

</html>
