<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico/72x72favicon.png">


        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="google-site-verification" content="TNff8WzEgCkK-LBRTediAvbgmn0wA7xtvb3e9BAGeGU" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../../assets/js/html5shiv.js"></script>
          <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles for this template -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet"/>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/carousel.css" rel="stylesheet"/>

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/li-scroller.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/lean-slider.css" rel="stylesheet" />
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mobile-1.3.2.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/holder.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.li-scroller.1.0.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/darussalamapp.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/lean-slider.js"></script>

        <script type="text/javascript">
            jQuery(function() {
                jQuery("ul#ticker01").liScroll();
            })


        </script>

    </head>
    <!-- NAVBAR
    ================================================== -->

    <body>
        <div class="modal"><!-- Place at bottom of page --></div>
        <div style="clear:both"></div>
        <header>
            <div class="navbar-wrapper">
                <div class="container">
                    <div class="navbar navbar-inverse navbar-fixed-top">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <?php
                                $criteria = new CDbCriteria();
                                $criteria->limit = 2;
                                $categories = Category::model()->findAll($criteria);
                                ?>
                                <ul class="nav navbar-nav coll-nav">

                                    <li><?php
                                        echo CHtml::link("Home", Yii::app()->homeUrl, array(
                                            'data-ajax' => "false"
                                        ));
                                        ?></li>
                                    <li class="coll-dash">
                                        -
                                    </li>
                                    <li> <?php
                                        echo CHtml::link("About Us", $this->createUrl("/web/default/aboutus"), array(
                                            'data-ajax' => "false"
                                        ));
                                        ?>
                                    </li>
                                    <li class="coll-dash">
                                        -
                                    </li>
                                    <li>
                                        <?php
                                        echo CHtml::link($categories[0]->name, $this->createUrl("/web/product/products", array("slug" => $categories[0]->slug)), array('data-ajax' => "false", "id" => $categories[0]->slug));
                                        ?>
                                    </li>
                                    <li class="coll-dash">
                                        -
                                    </li>
                                    <li><?php
                                        echo CHtml::link("Catalogue", $this->createUrl("default/underConstruction"), array(
                                        'data-ajax' => "false"
                                    ));
                                        ?>
                                    </li>

                                </ul>
                                <ul class="navigate nav navbar-nav">
                                    <li>
                                        <?php
                                        echo CHtml::link($categories[1]->name, $this->createUrl("/web/product/products", array("slug" => $categories[1]->slug)), array('data-ajax' => "false", "id" => $categories[1]->slug));
                                        ?>
                                    </li>
                                    <li class="coll-dash">
                                        -
                                    </li>
                                    <li><?php
                                        echo CHtml::link("Contact Us", $this->createUrl("/web/default/contactUs"), array(
                                            'data-ajax' => "false"
                                        ));
                                        ?></li>
                                    <li class="nav_search"><input type="text" placeholder="search" />

                                        <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/header_search_03.jpg"); ?></li>
                                    <li class="search-dropdown">
                                        <div class="dropdown">
                                            <a class="account" >
                                                <span></span>
                                            </a>
                                            <div class="submenu" style="display: none; ">
                                                <ul class="root">
                                                    <input type="text" />
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="logo_image">
                                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/pub_logo_02.png"), Yii::app()->homeUrl, array('data-ajax' => "false")); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="header">
            <div class="container">
                <div class="tickercontainer">
                    <div class="mask">
                        <ul id="ticker01" class="newsticker">
                            <?php
                            if (!empty(Yii::app()->params['darussalam_ticker_news'])) {

                                $ticker = $this->split_words(Yii::app()->params['darussalam_ticker_news'], 20);
                                foreach ($ticker as $data) {
                                    echo "<li>";
                                    echo "<span>";
                                    echo $data;
                                    echo "</span>";
                                    echo "</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <?php echo $content; ?>

    </body>
</html>