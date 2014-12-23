<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <!--        
               
              Powered By:
        
        
                           00000000000000            
                           000000000000000
                           0000         0000
                           0000           0000
                           0000             0000         
                           0000              0000
                           0000              0000
                           0000              0000  000000000000000    000000000      0000000      00       00
                           0000              0000  000000000000000    000000000     000000000     00       00  
                           0000              0000        00           00           00        0    00       00 
                           0000              0000        00           00           00             00       00  
                           0000             0000  0000   00           0000000      00             00000000000
                           0000            0000          00           00           00             00       00 
                           0000           0000           00           00           00       0     00       00 
                           0000000000000000              00           000000000     000000000     00       00
                           00000000000000                00           000000000      0000000      00       00 
                                                                                    
                                                                                                             (Authors:AA/UB)  
               
         
        -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/fav_icon.png" type="image/png" /> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="google-site-verification" content="TNff8WzEgCkK-LBRTediAvbgmn0wA7xtvb3e9BAGeGU" />
        <!--[if IE]>
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/all-ie-only.css" />
        <![endif]-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/modernizr-2.6.1.min.js"></script>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/jquery.min1.8.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/darussalamapp.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/jquery.li-scroller.1.0.js"></script>

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/li-scroller.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom_style.css" rel="stylesheet" type="text/css" />


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script type="text/javascript">
            jQuery(function() {
                jQuery("ul#ticker01").liScroll();
            })
        </script>
    </head>

    <body>
        <div class="modal"><!-- Place at bottom of page --></div>
        <div style="clear:both"></div>
        <header>
            <article id="">
                <nav>
                    <ul>
                        <li>
                            <?php
                            echo CHtml::link("Home", Yii::app()->homeUrl);
                            ?>
                        </li>
                        <li>-</li>
                        <li>

                            <?php
                            echo CHtml::link("About Us", $this->createUrl("/web/default/aboutus"));
                            ?>

                        </li>
                        <li>-</li>
                        <?php
                        $criteria = new CDbCriteria();
                        $criteria->limit = 2;
                        $categories = Category::model()->findAll($criteria);

                        foreach ($categories as $key => $cat):
                            ?>
                            <li>
                                <?php
                                echo CHtml::link($cat->name, $this->createUrl("/web/product/products", array("slug" => $cat->slug)));
                                ?>
                            </li>
                            <?php
                            if ($key == 0) {
                                echo "<li>-</li>";
                            }
                            ?>

                            <?php
                        endforeach;
                        ?>
                    </ul>
                </nav>
                <div class="logo">

                    <?php
                    echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/darussalam.png"), Yii::app()->homeUrl);
                    ?>

                </div>
                <div class="right_nav">
                    <ul>
                        <li>-</li>
                        <li>
                            <?php
                            echo CHtml::link("Ideas", $this->createUrl("/web/default/ideas"));
                            ?>
                        </li>
                        <li>-</li>
                        <li>

                            <?php
                            echo CHtml::link("Jobs", $this->createUrl("/web/default/jobs"));
                            ?>
                        </li>
                        <li>-</li>
                        <li>

                            <?php
                            echo CHtml::link("Contact Us", $this->createUrl("/web/default/contactUs"));
                            ?>
                        </li>
                    </ul>
                </div>
            </article>
        </header>
        <section id="header">
            <article>

                <ul id="ticker01">
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


                    <!-- eccetera -->
                </ul>

            </article>
        </section>
        <?php
        echo $content;
        ?>
        <footer>
            <article>
                <p><?php echo Yii::app()->name; ?> All Rights Reserved 2013.</p>
            </article>
        </footer>
        <section id="under_footer">
            <article>
                <p>Design &amp; Developed by : <?php
                    echo CHtml::link("Dtech-Systems", "http://www.dtechsystems.co.uk", array('target' => 'blank'));
                    ?></p>
            </article>
        </section>
        <script>
                    (function(i, s, o, g, r, a, m) {
                        i['GoogleAnalyticsObject'] = r;
                        i[r] = i[r] || function() {
                            (i[r].q = i[r].q || []).push(arguments)
                        }, i[r].l = 1 * new Date();
                        a = s.createElement(o),
                                m = s.getElementsByTagName(o)[0];
                        a.async = 1;
                        a.src = g;
                        m.parentNode.insertBefore(a, m)
                    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-44777740-2', 'darussalampublishers.com');
            ga('send', 'pageview');

        </script>
    </body>
</html>