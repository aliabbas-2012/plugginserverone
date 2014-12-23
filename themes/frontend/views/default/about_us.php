<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/about.css"); ?>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/js/jquery.nav.js", CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/js/jquery.scrollTo.js", CClientScript::POS_END); ?>
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/packages/jui/js/jquery-ui.min.js", CClientScript::POS_END); ?>
<?php //Yii::app()->clientScript->registerScriptFile("http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js", CClientScript::POS_END); ?>
<?php //Yii::app()->clientScript->registerScriptFile("http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.slide.js", CClientScript::POS_END); ?>


<script type="text/javascript">
    jQuery(function() {
        dtech_app.registerScrollUsingPluggin();
        footler_pos = jQuery(".all_sect").offset().top;

        total_height = ($(".all_sect").height() + $(".footer_sect").height()) - $(".footer-market").height();

        $(window).scroll(function(e) {

            top_scroll = $(document).scrollTop();

            if (jQuery(window).scrollTop() >= footler_pos - total_height) {


                $("#about-mosque").attr("class", "about-mosque-big-img");
            }
            else {
                $("#about-mosque").attr("class", "about-mosque");
            }


        });

        $("#abount_us_page li a").hover(function() {
            if ($(this).parent().hasClass("activelist") == false) {
                $(this).prev().animate({"right": "0", width: 'show', direction: 'right'});
            }

        }, function() {
            // change to any color that was previously used.
            if ($(this).parent().hasClass("activelist") == false) {
                $(this).prev().hide();
            }

        });

    })
</script>
<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<div class="about_us_part">
    <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row first_about_us">
            <div class="col-lg-3 about-listing">
                <ul id="abount_us_page">
                    <li class="founder-list" style="text-align:right;">
                        <span class="founder-span" style="display: none"></span>
                        <a href="#founder" class="active f-text">Founder</a>
                    </li>
                    <li class="history-list" style="text-align:right;">
                        <span class="history-span" style="display: none"></span>
                        <a href="#history" class="f-text">History</a>
                    </li>
                    <li class="vision-list" style="text-align:right;">
                        <span class="vision-span" style="display: none"></span>
                        <a href="#vision" class="f-text">Vision</a>
                    </li>
                </ul>
            </div><!-- /.col-lg-3 -->
            <div id="founder" name="founder" class="col-lg-9 about-content">
                <h1>Introduction</h1>
                <p>Intro of the Plugin Server</p>
                <div class="border-bottom-p"></div>
                <div class="about_content about_right_part">
                    <h2 style="padding-top:14px;">Founder:</h2>
                    <p style="padding: 10px 0 0 0 !important; ">Seo Logic Plugin Server.</p>
                    <div class="about_hidden">
                        <p>SEO Logic is the Founder of Plugin Server </p>

                    </div>
                    <div class="clickable_img">
                        <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/about_p_btn_03.jpg"), '', array('down_image' => 'as')); ?>
                    </div>
                    <div class="border-bottom-p"></div>
                </div>
            </div><!-- /.col-lg-9 -->
        </div><!-- /.row -->
        <section id="history">
            <div class="row second_about_us">
                <div class="col-lg-3 about-listing">
                </div><!-- /.col-lg-3 -->
                <div class="col-lg-9 about-content about-top">
                    <h1>History</h1>
                    <p>history of the Plugin Server</p>
                    <div class="about_content about_right_part">
                        <div class="about_hidden">
                            <p> This is the History of the Plugin Server </p>
                            <ul>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                            </ul>
                        </div>
                        <div class="border-bottom-p"></div>
                        <div class="clickable_img">
                            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/about_p_btn_03.jpg"), '', array('down_image' => 'as')); ?>
                        </div>
                    </div>
                </div><!-- /.col-lg-9 -->
            </div><!-- /.row -->
        </section>
        <div class="row third_about_us" id="vision">
            <div class="col-lg-3 about-listing">
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-9 about-content about-top">
                <h1>Vision</h1>
                <p>This is the VIsion of the Plugin Server </p>
            </div><!-- /.col-lg-9 -->
        </div><!-- /.row -->
    </div>

</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.about_hidden').hide();

        jQuery('.clickable_img img').css("-moz-transform", "rotate(-180deg)");
        jQuery(".clickable_img").click(function() {
            if (jQuery('.about_hidden').is(":visible") == false)
            {
                jQuery('.clickable_img img').css("-webkit-transform", "rotate(-360deg)");
                jQuery('.clickable_img img').css("-moz-transform", "rotate(-360deg)");
            }
            else {
                jQuery('.clickable_img img').css("-webkit-transform", "rotate(-180deg)");
                jQuery('.clickable_img img').css("-moz-transform", "rotate(-180deg)");
            }
            jQuery('.about_hidden').slideToggle('slow');
        })
    })
</script>

<script type="text/javascript">
    $(".about-listing ul .founder-list a").on("click", function() {
        $(this).focus()
    })
    $(".about-listing ul .history-list a").on("click", function() {
        $(this).focus()
    })
    $(".about-listing ul .vision-list a").on("click", function() {
        $(this).focus()
    })
    $(".about-listing ul .research-list a").on("click", function() {
        $(this).focus()
    })
    $(".about-listing ul .publish-list a").on("click", function() {
        $(this).focus()
    })
</script>