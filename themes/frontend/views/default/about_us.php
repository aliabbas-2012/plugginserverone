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
                    <li class="research-list" style="text-align:right;">
                        <span class="research-span" style="display: none"></span>
                        <a href="#research" class="f-text">Research</a>
                    </li>
                    <li class="publish-list" style="text-align:right;">
                        <span class="publish-span" style="display: none"></span>
                        <a href="#publish" class="f-text">Publishings</a>
                    </li>
                </ul>
            </div><!-- /.col-lg-3 -->
            <div id="founder" name="founder" class="col-lg-9 about-content">
                <h1>Introduction</h1>
                <p>Darussalam Publishers is an International multilingual Islamic Publishing House. Formulated in 1986 by Mr. Abdul Malik Mujahid headquartered in Riyadh, Kingdom of Saudi Arabia having branches in many countries around the globe including Saudi Arabia, UAE, Pakistan, USA,UK, Australia, Canada, France, Malaysia, Sri Lanka, India and South Africa. This international organization has achieved a lot of success within the last two decades and is renowned across the Muslim world and beyond in the field of Islamic publishing.  Its success is attributed to the efforts of more than 50 research scholars, experts and workers of the institution who are known for the propagation of the Quran and Sunnah. Darussalam considers it a priority to maintain international publishing standards in terms of quality and content.</p>
                <div class="border-bottom-p"></div>
                <div class="about_content about_right_part">
                    <h2 style="padding-top:14px;">Founder:</h2>
                    <p style="padding: 10px 0 0 0 !important; ">Mr. Abdul Malik Mujahid was born in the village of Kailiyanwala (District Gujranwala) in 1955. He acquired early education there after which his family moved to Hafiz Abad. He completed his metric from Hafiz Abad, and acknowledged further religious education from Dar ul Hadees Muhammadiyya. Then he immigrated to Saudi Arabia and has been living there for the past 30 years. He did not stop enlightening himself and continued to pursue religious understanding.</p>
                    <div class="about_hidden">
                        <p>He received the knowledge of Hadith from Fazal Ilahi, brother of Ehsan Ilahi Zaheer. He also gained knowledge of English and Arabic language. Mr. Mujahid is a calligrapher by profession. He worked in the calligraphy department of Defense Ministry of Saudi Arabia before resigning and laying the foundation of Darussalam.</p>

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
                    <p>The inspiration of Darussalam came to Mr. Abdul Malik Mujahid when he read about the largest publishing institute of Lebanon which was owned by a non-Muslim and worked for the propagation of their religion. Mr. Abdul Malik Mujahid also realized that the books on Islam published in the past contained many academic mistakes and shortcomings of production. In view of this situation an institute for the printing and publication of Islamic academic and research works was founded by the name of Darussalam. Established in 1986, this institute has so far established its publication centers in many countries of the world. It has the distinction that a large team of eminent scholars and researchers is engaged in the preparation and supervision of the academic plans of this institute. Initially Darussalam’s aim was to print an authentic Arabic text of the Quran, its translation in different languages, and publication of brief commentaries and marginal notes on it. These publications have been received with positive reception at the international level. King Fahd established a permanent system for the publications of Darussalam’s 'Tafsir Ahsan ul Bayan' (which comprises translation and marginal notes on the Quran) and 'The Noble Quran’ in the millions and their distribution in the world of Islam. English translation of the most popular interpretation of the Quran (Tafsir Ibn Kathir) has been completed and its translation into other modern languages is in progress.</p>
                    <div class="about_content about_right_part">
                        <div class="about_hidden">
                            <p>Similarly in the realm of Hadith, its publications have been admired by scholars and specialists on the subject. Darussalam has also taken up the task of publishing the accurate texts of Hadith along will full reference to the relevant authorities.</p>
                            <ul>
                                <li>Sahih al-Bukhari has been printed from Italy and has the finest level of printing. Darussalam has also combined the Sihah Sitta (The Six Authentic Books of Ahadith) in one volume. Sihah sitta has also been translated into English, French, German Spanish, Persian and Urdu.</li>
                                <li>On March 30, 2012, Darussalam Publications published the first volume of an eleven-volume series entitled Encyclopedia of Seerah.</li>
                                <li>On April 19, 2013, Darussalam received a commemorative plaque from the Saudi Gazette in an event organized by the Saudi Gazette in Riyadh in honor of its advertisers.</li>
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
                <p>Darussalam Publishers is an International multilingual Islamic Publishing House. Formulated in 1986 by Mr. Abdul Malik Mujahid headquartered in Riyadh, Kingdom of Saudi Arabia having branches in many countries around the globe including Saudi Arabia, UAE, Pakistan, USA,UK, Australia, Canada, France, Malaysia, Sri Lanka, India and South Africa. This international organization has achieved a lot of success within the last two decades and is renowned across the Muslim world and beyond in the field of Islamic publishing.  Its success is attributed to the efforts of more than 50 research scholars, experts and workers of the institution who are known for the propagation of the Quran and Sunnah. Darussalam considers it a priority to maintain international publishing standards in terms of quality and content.</p>
            </div><!-- /.col-lg-9 -->
        </div><!-- /.row -->
        <div class="row fourth_about_us" id="research">
            <div class="col-lg-3 about-listing">
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-9 about-content about-top">
                <h1>Research</h1>
                <p>Darussalam’s Research Centers located in the head office in Riyadh and the Pakistan’s main office is in 36 Lower Mall, Lahore. Before reaching Press, all the important phases of publication take place at these Research Centers. A team of Ulama work on the books. Other than that, there is an extensive network of Religious Scholars across the globe who are working diligently on the excellence of Islamic teachings  based upon the glorious Qur'an and authentic Hadith, as well as adhering to reasons and logic.</p>
                <div class="about_content about_right_part">
                    <div class="about_hidden">
                        <ul>
                            <li>Presenting books free from sectarianism and in accordance with the Quran and the Sunnah.</li>
                            <li>Producing books in concise, easy, lucid, comprehensive form.</li>
                            <li>Working to develop a better understanding of different schools of thought among the Muslims.</li>
                            <li>Presenting books written by the most senior Islamic scholars and authors.</li>
                            <li>Editing of manuscripts by a Board of senior editors.</li>
                            <li>Supervising every stage of publication by a team of qualified staff.</li>
                            <li>Introducing educational devices for the learning of the Quran through computer technology.</li>
                        </ul>
                    </div>
                    <div class="border-bottom-p"></div>
                    <div class="clickable_img">
                        <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/about_p_btn_03.jpg"), '', array('down_image' => 'as')); ?>
                    </div>
                </div>
            </div><!-- /.col-lg-9 -->
        </div><!-- /.row -->
        <div id="publish" class="row fifth_about_us">
            <div class="col-lg-3 about-listing">
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-9 about-content about-top">
                <h1>Publishings</h1>
                <p>Most of the books published by Darussalam are according to the standards of Italy and Lebanon. There are printing presses located in Italy and Beirut. These books are of the highest printing and binding quality. Other books of different languages are also printed in Saudi Arabia and China. There is also a printing press in Pakistan which specializes in books in the Urdu language. The other main features of Darussalam are as follows:</p>
                <ul>
                    <li>Presenting books free from sectarianism and in accordance with the Quran and the Sunnah.</li>
                    <li>Producing books in concise, easy, lucid, comprehensive form.</li>
                    <li>Working to develop a better understanding of different schools of thought among the Muslims.</li>
                    <li>Presenting books written by the most senior Islamic scholars and authors.</li>
                    <li>Editing of manuscripts by a Board of senior editors.</li>
                    <li>Supervising every stage of publication by a team of qualified staff.</li>
                    <li>Introducing educational devices for the learning of the Quran through computer technology.</li>
                </ul>
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