<?php
//loading css and js files for own pages
$cs = Yii::app()->clientScript;

$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/career.css');
//$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/bootstrap.min.css');
?>
<!-- Carousel
   ================================================== -->
<div id="myCarousel" class="carousel slide career-banner" >
    <div class="carousel-inner">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ships.png" class="ships-img" />
                    <div class="careers-banner-text">
                        <h1>Be a leader</h1>
                        <p>Regardless of the path, Darussalam generally looks for people who take<br />initiative, possess strong communication skills, and work effectively with<br />others.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption">
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->
<div class="container marketing">
    <div class="row">
        <div class="main-career">
            <div class="col-lg-3 our-program-padding">
                <div class="our-team">
                    <h1>OUR TEAM</h1>
                    <p>Scholars, Visionaries, Traditionalists, Rebels, Artists, and Saviors of Islam, we have got something of everything. That’s our strength… that’s what makes us unique. </p>
                </div>
            </div>
            <div class="col-lg-6 our-program-padding">
                <div id="carousel-example-generic" class="carousel slide">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <!-- Slide 1-->
                        <div class="item active">
                            <div class="left-main-carsal our-program-padding">
                                <div class="career-founder">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/career-img1.png" class="career-name-img" />
                                    <h2>Talha Mujahid</h2>
                                    <p>Founder</p>
                                </div>
                            </div>
                            <div class="left-main-carsal our-career-padding">
                                <div class="career-founder">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/career-img2.png" class="career-name-img" />
                                    <h2>Zain Khan</h2>
                                    <p>Co-Founder</p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2-->
                        <div class="item">
                            <div class="left-main-carsal our-program-padding">
                                <div class="career-founder">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/career-img3.png" class="career-name-img" />
                                    <h2>Ovais Munir</h2>
                                    <p>Manager</p>
                                </div>
                            </div>
                            <div class="left-main-carsal our-career-padding">
                                <div class="career-founder">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/career-img4.png" class="career-name-img" />
                                    <h2>Irfan Khan</h2>
                                    <p>Head of Designer's</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 our-program-padding">
                <div class="career-news">
                    <section>News &amp; Events</section>
                    <div class="career-dates">
                        <div class="career-date-left">
                            <h3>JAN</h3>
                            <p>6</p>
                        </div>
                        <div class="career-date-right">
                            <p> 
                                D-Tech brings to you the Story of Adam; an Interactive story App for kids. Coming soon on your Android or iOS device. 



                            </p>
                        </div>
                    </div>
                    <div class="career-dates">
                        <div class="career-date-left">
                            <h3>JAN</h3>
                            <p>1</p>
                        </div>
                        <div class="career-date-right">
                            <p>Wish you all a very Happy New Year! We don’t know about you, but a mid-week party was much needed.</p>
                        </div>
                    </div>
                    <div class="career-dates">
                        <div class="career-date-left">
                            <h3>DEC</h3>
                            <p>30</p>
                        </div>
                        <div class="career-date-right">
                            <p>Darussalam opens two new Branches! In Makkah at Clock Tower, and in Pakistan at Peco Road.</p>
                            <article class="see-all-events"><a href="javascript:void(0)">See all events <img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/right.png" class="" alt="right-img" /></a></article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container marketing">
    <div class="row">
        <div style="border-bottom:1px solid #b7b7b7; padding-bottom:0px; text-align:center; margin-right:0px; margin-left:0px;">
        </div>
    </div>
</div>
<div class="container marketing">
    <div class="row">
        <div class="middle-career">
            <div class="col-lg-3 our-program-padding">
                <div class="our-programs">
                    <h4>Our Programs</h4>
                    <p>At Darussalam employment opportunities are wide-ranging and extend into almost every aspect of publishing. Each and every department is like a pillar, and our employees are like building blocks, everyone is essential and that’s how we stand; united as one. Be it Sales, Marketing, Finance, Editorial Research, Journalism, Human Resources, or Project Management we make sure all our departments stay happy and connected with each other.</p>

                </div>
            </div>
            <div class="col-lg-3 our-program-padding">
                <div class="opening">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/career-stars.png" class="career-top-stars" />
                    <h4>Openings</h4>
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/career-stars.png" class="" />
                </div>
            </div>
            <div class="col-lg-3 our-program-padding">
                <div class="submit-resume">
                    <span style="color: #0AC29E; font-size: 15px; margin-left: 40px">
                        <?php if ($model->hasErrors()): ?>

                            <?php
                            echo CHtml::errorSummary($model);
                        endif;
                        ?>
                    </span>
                    <?php if (Yii::app()->user->hasFlash('jobs')): ?>

                        <div class="flash-success" style="color:green">
                            <?php echo '<br/>' . Yii::app()->user->getFlash('jobs'); ?>
                        </div>


                    <?php endif; ?>
                    <h4 id="submitR">Submit</h4>
                    <p id="para">Your Resume</p>
                    <div id="jobsapplication" style=" display: none;" >
                        <a href="javascript:void(0)" id="close" style="float:right;"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/cross-24.png" class="" /></a>


                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'job-form',
                            'enableAjaxValidation' => true,
                            'htmlOptions' => array('enctype' => 'multipart/form-data', 'data-ajax' => 'false'),
                        ));
                        ?>

                        <?php //echo $form->errorSummary();  ?>
                        <p>Please Upload your CV</p>
                        <?php echo $form->fileField($model, 'cv_file', array('id' => 'cv_file', 'style' => 'visibility:hidden;')); ?>
                        <div class="input-append">
                            <?php echo $form->textField($model, 'cv_file_name', array('placeholder' => 'Upload your CV (pdf or word file)', 'id' => 'cv_file_name')); ?>
                            <a class="btn btn-default" onclick="$('#cv_file').click();">Browse</a>
                        </div>


<!--                    <input type="button" value="choose file to upload" style="top:128px" ></input>-->





                        <?php echo CHtml::submitButton('Submit', array("class" => "choose_file btn btn-default")); ?>

                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 our-program-padding">
                <div class="daily-effects">
                    <h4>Daily Facts</h4>
                    <div class="daily-facts">
                        <h2>Facts<span>213</span></h2>
                        <p>Darussalam has published more than 1500 authentic Islamic books in different languages of the world in a very unique and beautiful style.</p>
                        <div class="fact-border">
                        </div>
                        <h2>Facts<span>214</span></h2>
                        <p>Darussalam has published the translation of the Holy Quran in 25 different languages.</p>
                        <div class="fact-border">
                        </div>
                        <h2>Facts<span>215</span></h2>
                        <p>Darussalam has a team of more than 50 religious scholars whose knowledge and efforts make our work authentic and trustworthy.</p>
                        <div class="fact-border">
                        </div>
                        <h2>Facts<span>216</span></h2>
                        <p>Darussalam is headquartered in Riyadh and has branches in countries around the world including Saudi Arabia, UAE, Kuwait, Pakistan, USA, UK, Australia, Canada, France, Singapore, Malaysia, Sri Lanka, India, Nigeria and South Africa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container marketing">
    <div class="row">
        <div style="border-bottom:1px solid #b7b7b7; padding-bottom:0px; text-align:center; margin-right:0px; margin-left:0px;">
        </div>
    </div>
</div>
<div class="container marketing">
    <div class="row">
        <div class="connect-career">
            <div class="col-lg-4 our-program-padding">
                <div class="connection">
                    <h3><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/career-settings.png" class="" /> <span>Connect</span></h3>
                </div>
            </div>
            <div class="col-lg-4 our-program-padding">
                <div class="stay-connected">
                    <h3>Stay connected</h3>
                    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/i.png" class="" /></a>
                    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/f.png" class="" /></a>
                    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/t.png" class="" /></a>
                    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/u-tube.png" class="" /></a>
                    <p>Subscribe to newsletter <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/subscriber-blue_03.png" class="" /></p>
                </div>
            </div>
            <div class="col-lg-4 our-program-padding">
                <div class="daily-tweets">
                    <h4>Tweets</h4>
                    <p ><?php
                        $thirdParty = new ThirdParty("twitter");

//                        $this->getTwitterInstance($settings['oauth_access_token'], $settings['oauth_access_token_secret'], $settings['consumer_key'], $settings['consumer_secret']);
                        $data = $thirdParty->getTwitterPageFeeds('DarussalamSNS', 10);

//                        $this->dtdump($data['statuses']);

                        echo "<span>" . $data['statuses'][0]['text'] . "</span>";
                        echo "<span style='border-bottom:1px solid #b7b7b7; padding:0; margin:0; display:block; height: 2px;'>&nbsp;</span>";
                        echo "<span>" . $data['statuses'][1]['text'] . "</span>";
                        ?>


                    </p>
                    <p style="text-align:center; padding:20px 0 0 0;"><a href="https://twitter.com/darussalamsns" target="_blank">See all tweets <img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/right.png" class="" /></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container marketing">
    <div class="row">
        <div style="border-bottom:1px solid #b7b7b7; padding-bottom:0px; text-align:center; margin-right:0px; margin-left:0px;">
        </div>
    </div>
</div>
<div class="container marketing">
    <div class="row" style="padding-bottom:0px;">
        <div class="go-and-do">
            <div class="col-lg-6 our-go-padding">
                <div class="go">
                    <div class="col-lg-5">
                        <h2>GO</h2>
                    </div>
                    <div class="col-lg-7">
                        <div class="go-p">
<?php
$criteria = new CDbCriteria();
$criteria->limit = 2;
$categories = Category::model()->findAll($criteria);
?>
                            <p> <?php
                            echo CHtml::link($categories[0]->name, $this->createUrl("/web/product/products", array("slug" => $categories[0]->slug)), array('data-ajax' => "false", "id" => $categories[0]->slug));
                            ?> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/right.png" class="" /></p>
                            <p> <?php
                                echo CHtml::link($categories[1]->name, $this->createUrl("/web/product/products", array("slug" => $categories[1]->slug)), array('data-ajax' => "false", "id" => $categories[0]->slug));
                                ?> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/right.png" class="" /></p>



                            <p><?php echo CHtml::link('Books', $this->createUrl("/web/product/viewProducts", array("slug" => 'books')), array('data-ajax' => 'false'));
                                ?> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/right.png" class="" /></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 our-do-padding">
                <div class="do">
                    <div class="col-lg-5">
                        <h2>DO</h2>
                    </div>
                    <div class="col-lg-7">
                        <div class="do-p">
                            <p><a href="#" onclick="clickingSubmit()">Submit your resume <img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/left.png" class="" /></a></p>
                            <p><?php
                            echo CHtml::link("Submit your personal work", $this->createUrl("/web/default/underConstruction"), array
                                (
                                'data-ajax' => "false"
                            ));
                            ?> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/left.png" class="" /></p>
                            <p><?php
                            echo CHtml::link("Information about disabilities &amp; opportunity ", $this->createUrl("/web/default/underConstruction"), array
                                (
                                'data-ajax' => "false"
                            ));
                            ?><img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/left.png" class="" /></p>
                            <p><?php
                            echo CHtml::link("Subscribe to newsletter", $this->createUrl("/web/default/underConstruction"), array
                                (
                                'data-ajax' => "false"
                            ));
                            ?><img src="<?php echo Yii::app()->theme->baseUrl; ?>/sliderlayer/left.png" class="" /></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
                                $('#carousel-example-generic').carousel({wrap: true});
                                function clickingSubmit() {$('#submitR').click(); 
                                jQuery(document).scrollTop(600);
                                };
                                 
                                
                                $('#submitR').click(function() {
                                    $('#submitR').hide("slow", function() {
                                    });
                                    $('#para').hide("slow", function() {
                                    });
                                    $('#jobsapplication').show("slow", function() {

                                    });
                                });


                                $('#close').click(function() {
                                    $('#jobsapplication').hide("slow", function() {

                                    });
                                    $('#submitR').show("slow", function() {
                                    });
                                    $('#para').show("slow", function() {
                                        
                                    });
                                });
                                document.getElementById("cv_file").onchange = function() {

                                    document.getElementById("cv_file_name").value = this.value;
                                }


</script>