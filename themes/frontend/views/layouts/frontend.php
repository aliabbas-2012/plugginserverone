<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Plugin server, Joomla, wordpress, Druppal">
        <meta name="keywords" content="Plugin server providing plugins for Joomla, wordpress, Druppal" />
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/fav_icon.png">
    <a href="https://plus.google.com/" rel="Plugin server"> </a>
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
</head>
<!-- NAVBAR ================================================== -->
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
                            /* $criteria = new CDbCriteria();
                              $criteria->limit = 2;
                              $categories = Category::model()->findAll($criteria); */
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
                            </ul>
                            <ul class="navigate nav navbar-nav">
                                <li>
                                    <?php
                                    //echo CHtml::link($categories[1]->name, $this->createUrl("/web/product/products", array("slug" => $categories[1]->slug)), array('data-ajax' => "false", "id" => $categories[1]->slug));
                                    ?>
                                </li>
                                <li class="coll-dash">
                                    <?php
                                    echo CHtml::link("Sign Up", $this->createUrl("/web/users/register"), array(
                                        'data-ajax' => "false"
                                    ));
                                    ?>
                                </li>

                                <li class="coll-dash">
                                    <?php
                                    echo CHtml::link("Sign In", $this->createUrl("/web/users/login"), array(
                                        'data-ajax' => "false"
                                    ));
                                    ?>
                                </li>


                            </ul>
                        </div>
                        <div class="logo_image">
                            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/pluginserver.png"), Yii::app()->homeUrl, array('data-ajax' => "false")); ?>
                            <h1 style="display:none;">Plugin Server</h1>
                        </div>
                        <div class="mini_logo">
                            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/pluginserver_responsive.png"), Yii::app()->homeUrl, array('data-ajax' => "false")); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <?php echo $content; ?>
    <div class="all_sect">
        <div class="container marketing">

        </div><!-- /.row -->
        <div class="row footer_facebook">
            <div class="col-lg-6 left-footer_facebook">
                <div class="fb-like"  data-href="" data-colorscheme="dark" data-width="80%" data-height="50px" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
                <a href="//plus.google.com/"
                   rel="plugin server" target="_top" style="text-decoration:none;display:inline-block;color:#333;text-align:center; font:13px/16px arial,sans-serif;white-space:nowrap;">
                    <span style="display:inline-block;font-weight:bold;vertical-align:top;margin-right:5px; margin-top:8px;">Plugin Server</span><span style="display:inline-block;vertical-align:top;margin-right:15px; margin-top:8px;">on</span>
                    <img src="//ssl.gstatic.com/images/icons/gplus-32.png" alt="Google+" style="border:0;width:32px;height:32px;"/>
                </a>
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6 right-footer_facebook">
                <span>Follow Us</span>
<!--                        <a href="#"><img src="<?php /* echo Yii::app()->theme->baseUrl; ?>/images/skype_03.png" onmouseover="this.src = '<?php echo Yii::app()->theme->baseUrl; ?>/images/skype_hover.png'" onmouseout="this.src = '<?php echo Yii::app()->theme->baseUrl; */ ?>/images/skype_03.png'" title="Skype" alt="Skype"></a>-->
                <a href="" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/twitter_03.png" onmouseover="this.src = '<?php echo Yii::app()->theme->baseUrl; ?>/images/twitter_hover.png'" onmouseout="this.src = '<?php echo Yii::app()->theme->baseUrl; ?>/images/twitter_03.png'" title="Twitter" alt="Twitter"></a>
                <a href="" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/facebook_03.png" onmouseover="this.src = '<?php echo Yii::app()->theme->baseUrl; ?>/images/facebook_hover.png'" onmouseout="this.src = '<?php echo Yii::app()->theme->baseUrl; ?>/images/facebook_03.png'" title="Facebook" alt="Facebook"></a>
                <a href="" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/linked_in_03.png" onmouseover="this.src = '<?php echo Yii::app()->theme->baseUrl; ?>/images/linked_in_hover.png'" onmouseout="this.src = '<?php echo Yii::app()->theme->baseUrl; ?>/images/linked_in_03.png'" title="Linkedin" alt="Linkedin"></a>

            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row footer_p">
            <p>© Plugin Server LTD.</p>
            <p>All rights reserved. Various trademarks held by their respective owners.</p>
        </div><!-- /.row -->
    </div>
</div>
<div class="footer-market">
    <div class="container marketing">
        <!-- FOOTER -->
        <footer>
            <!-- Place this code where you want the badge to render. -->

            <p>Designed &amp; Developed by Itst</p>
        </footer>
    </div>
</div><!-- /.container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
    jQuery(document).bind('keyup', function(e) {
        if (e.keyCode == 39) {
            jQuery('a.carousel-control.right').trigger('click');
        }
        else if (e.keyCode == 37) {
            jQuery('a.carousel-control.left').trigger('click');
        }
    });
</script>


<!--     AddThis Smart Layers BEGIN 
     Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52b91a2534f2f001"></script>
<script type="text/javascript">
    addthis.layers({
        'theme': 'transparent',
        'share': {
            'position': 'left',
            'numPreferredServices': 5
        },
//            'follow': {
//                'services': [
////                    {'service': 'facebook', 'id': 'darussalam.sns'},
////                    {'service': 'twitter', 'id': 'darussalamsns'},
////                    {'service': 'google_follow', 'id': '+DarussalamPublishers'}
//                ]
//            },
        'whatsnext': {},
        'recommended': {}

    });
</script>
<!-- AddThis Smart Layers END -->
<script type="text/javascript" >
    jQuery(document).ready(function()
    {
        jQuery(".account").click(function()
        {
            var X = $(this).attr('id');

            if (X == 1)
            {
                jQuery(".submenu").hide();
                jQuery(this).attr('id', '0');
            }
            else
            {

                jQuery(".submenu").show();
                jQuery(this).attr('id', '1');
            }

        });
        jQuery(".submenu").mouseup(function()
        {
            return false
        });
        jQuery(".account").mouseup(function()
        {
            return false
        });
        jQuery(document).mouseup(function()
        {
            jQuery(".submenu").hide();
            jQuery(".account").attr('id', '');
        });

    });

</script>

</body>
</html>