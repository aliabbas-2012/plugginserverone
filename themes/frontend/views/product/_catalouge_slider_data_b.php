

<!--INITIALLIZING THE STYLE SHEETS REQUIRED FOR THIS PAGE-->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-ui.css" rel="stylesheet">

<style>
    .demo-section {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.01) 0%, rgba(0, 0, 0, 0.07) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
        border-color: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
        border-style: solid;
        border-width: 1px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        margin: 0 0 1px 0;
        padding: 10px;
    }

    .life_img { margin-left: 0!important; }

    .small_booktype img { border:1px solid #999; border-radius:2px; }
</style>




<div class="demo-section">
    <?php
    
    //********************************** Form for Search starts here ************************************//


    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'search-form',
        'enableAjaxValidation' => false,
//        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('enctype' => 'multipart/form-data', 'data-ajax' => 'false'),
    ));
    ?>
    <div class="container">
        <div class="row">

            <div class="col-lg-4 form-all-controls">
                <div class="style-selected">
                </div>





                <?php
                // Category Drop Down in search Form
                echo $form->dropDownList($model, 'category', CHtml::listData($data['allCat'], 'category_id', 'category_name'), array("prompt" => "Categories", 'class' => 'form-control', 'options' => array(
                        '1' => array(
                            'selected' => "selected"
                ))));
                ?>






            </div>
            <div class="col-lg-4 form-all-controls">
                <div class="style-selected">
                </div>


                <?php
                // Authors Drop Down in search Form
                echo $form->dropDownList($model, 'author', CHtml::listData($data['authors'], 'author_id', 'author_name'), array("prompt" => "Authors", 'class' => 'form-control', 'options' => array(
                        '1' => array(
                            'selected' => "selected"
                ))));
                ?>




            </div>
            <div class="col-lg-4 form-all-controls">

                <div class="input-group">

                    <?php
                    // Search Field by Book title in search Form
                    echo $form->textField($model, 'search', array("placeholder" => "Search By Title", 'class' => 'form-control form-search-control'));
                    ?>




                    <div class="input-group-btn">

                        <span class="glyphicon glyphicon-search">
                            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/glyphicons_027_search.png'), array('id' => 'form_submit', 'onclick' => 'dtech_app.disableDatapageAjax(this);return false;', 'class' => 'btn btn-info')); ?>
                        </span>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 form-all-controls" style="display:none;">
                <p style="text-align:center;">
                    <label for="amount" style=" font-weight: normal;color:#747474; font-size:13px; font-family:Arial, Helvetica, sans-serif; text-align:center;">min</label>
                    <input  type="text" disabled id="amount" style="border:1px solid #c7c7c7 !important; color:#6f6f6f; font-weight:bold; width:80px; border-radius:5px; text-align:center;">
                    <label for="amount" style=" font-weight: normal;text-align:center; color:#747474; font-size:13px; font-family:Arial, Helvetica, sans-serif;">max</label>
                </p>
                <div id="slider-range"></div>
            </div>
            <div class="col-lg-4 form-my-controls">
                <div class="style-selected">
                </div>
                <?php
                
                // LAnguage Drop Down  in search Form
                
                echo $form->dropDownList($model, 'lang', CHtml::listData($data['languages'], 'language_id', 'language_name'), array("prompt" => "Languages", 'class' => 'form-control', 'options' => array(
                        '1' => array(
                            'selected' => "selected"
                ))));
                ?>

            </div>
            <div class="col-lg-3 form-my-controls">
                <div class="style-selected">
                </div>
                <select class="form-control">
                    <option selected>Sort By</option>
                    <option>Name</option>
                    <option>Edition</option>
                </select>
            </div>
            <div class="col-lg-1 form-my-controls">

                <?php echo Chtml::submitButton('Search', array('id' => 'form_submit', 'onclick' => 'dtech_app.disableDatapageAjax(this);return false;', 'class' => 'btn btn-primary btn-sm')); ?>

            </div>
        </div>
    </div>
</div>
<?php
$this->endWidget();

//************************************************************* Search Form Ending ******************************************************//
?>

<div class="slide" id="brands-carousel" data-interval="false">


    <div class="carousel-inner">
        <?php
        $twitter = new ThirdParty('twitter');

        $twitterdata = $twitter->getTwitterPageFeeds('DarussalamSNS', 4);
//                        CVarDumper::dump($twitterdata,10,true);
        foreach ($twitterdata['statuses'] as $user) {
            if ($user['user']['screen_name'] == 'DarussalamSNS') {
                $c = $user['user']['followers_count'];
                break;
            }
        }


        /**
         * Catalogue Slider view 
         */
        $chunk_data = array_chunk($data['products'], 5);
        $current_page = $pages->getCurrentPage();
        $topcount = 0;
        $likescount = 0;
        $urllist = $data['productUrlArray'];
        $facebook = new ThirdParty();
        $fbstats = $facebook->getFacebookPageStats($urllist);
//        CVarDumper::dump($fbstats,10,true);

        foreach ($chunk_data as $key => $data):
            ?>
            <div class="item <?php echo $topcount == 0 ? "active" : ""; ?>">
                <ul>
                    <li class="span3">
                        <?php
                        // ********************************************** Showing Books ********************************************************//


                        $count = 0;
                        foreach ($data as $product):
                            $css_class = "catalouge-lower";
                            if ($count % 2 == 0) {
                                $css_class = "catalouge-upper";
                            }
                            //styles for the images
                            $noimage = "noidmagelist.jpg";

                            //in case of books it is more za123

                            $chrLength = 935;
                            ?>  
                            <div class="container marketing">
                                <div class="row">
                                    <div class="<?php echo $css_class; ?>">
                                        <?php
                                        $likes = $fbstats['link_stat'][$likescount]['like_count'];
                                        $likescount++;
                                        if (0 == $count % 2):
                                            ?>
                                            <div class="col-lg-4 cat-left">

                                                <?php
                                                if (!empty($product['image'][0]['image_small'])) {
                                                    echo CHtml::link(CHtml::image($product['image'][0]['image_small'], ''), $product['product_url'], array("target" => "_blank"));
                                                } else {
                                                    echo CHtml::link(CHtml::image(Yii::app()->baseUrl . "/images/" . $noimage, ''), $product['product_url'], array("target" => "_blank"));
                                                }
                                                ?>

                                            </div>
                                            <div class="col-lg-8 cat-right">
                                                <h3><?php echo $product['product_name'] ?></h3>
                                                <p>
                                                    <?php
                                                    if (strlen($product['product_overview']) > $chrLength) {
                                                        echo CHtml::openTag("span", array("title" => $product['product_overview'], "alt" => $product['product_description']));
                                                        echo substr($product['product_overview'], 0, $chrLength) . "...";
                                                        echo CHtml::closeTag("span");
                                                    } else {
                                                        echo $product['product_overview'];
                                                    }
                                                    ?>
                                                </p>    
                                                <div class="catalouge-links">
                                                    <div class="catalouge-g-plus" style="border-right: 1px solid #e3e3e3;">
                                                        <a href="javascript:void(0)"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/g-plus.png" /></a>
                                                        <p>0</p>
                                                    </div>
                                                    <div class="catalouge-g-plus" style="border-right: 1px solid #e3e3e3;">
                                                        <a ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/t-tweet.png" /></a>
                                                        <p><?php echo $c; ?></p>
                                                    </div>
                                                    <div class="catalouge-g-plus">
                                                        <a href="" onclick="dtech_app.updatefacebooklike('<?= $this->createUrl('/web/product/likeajax') ?>', '<?= $product['product_url'] ?>')"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/fb-small-icon_03.png" /></a>
                                                        <p><?php echo $likes; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        else :
                                            //RIGHT PRODUCT
                                            ?>

                                            <div class="col-lg-8 cat-main-right">
                                                <h3><?php echo $product['product_name'] ?></h3>
                                                <p>
                                                    <?php
                                                    if (strlen($product['product_overview']) > $chrLength) {
                                                        echo CHtml::openTag("span", array("title" => $product['product_overview'], "alt" => $product['product_description']));
                                                        echo substr($product['product_overview'], 0, $chrLength) . "...";
                                                        echo CHtml::closeTag("span");
                                                    } else {
                                                        echo $product['product_overview'];
                                                    }
                                                    ?>
                                                </p>    
                                                <div class="catalouge-links">
                                                    <div class="catalouge-g-plus" style="border-right: 1px solid #e3e3e3;">
                                                        <a href="javascript:void(0)"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/g-plus.png" /></a>
                                                        <p>0</p>
                                                    </div>
                                                    <div class="catalouge-g-plus" style="border-right: 1px solid #e3e3e3;">
                                                        <a ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/t-tweet.png" /></a>
                                                        <p><?php
//                        echo  . "<br/>";
                                                            //href="https://twitter.com/DarussalamSNS" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false" data-dnt="false" data-lang="en"                                  echo $c;
//                        echo $data['statuses'][2]['text'] . "<br/>" href="https://twitter.com/DarussalamSNS" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false" data-dnt="false" data-lang="en";
                                                            ?><?php echo $c; ?></p>
                                                    </div>
                                                    <div class="catalouge-g-plus">

                                                        <a href="" onclick="dtech_app.updatefacebooklike('<?= $this->createUrl('/web/product/likeajax') ?>', '<?= $product['product_url'] ?>')"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/fb-small-icon_03.png" /></a>
                                                        <p><?php echo $likes; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 cat-main-left">

                                                <?php
                                                if (!empty($product['image'][0]['image_small'])) {
                                                    echo CHtml::link(CHtml::image($product['image'][0]['image_small'], ''), $product['product_url'], array("target" => "_blank"));
                                                } else {
                                                    echo CHtml::link(CHtml::image(Yii::app()->baseUrl . "/images/" . $noimage, ''), $product['product_url'], array("target" => "_blank"));
                                                }
                                                ?>
                                            </div>
                                        <?php
                                        endif;
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <?php
                            $count++;
                        endforeach;
                        ?>
                    </li>
                </ul>
            </div>
            <?php
            $topcount++;
        endforeach; //parent foreach
        ?>
    </div> 
    <a data-ajax="false" class="cat-left-arrow" href='javascript:void(0);' onclick='dtech_app.moveArrowDir(this, "prev");' 
       ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/catalouge_left.png"  /></a>
    <a data-ajax="false" class="cat-right-arrow"  href="javascript:void(0);" onclick='dtech_app.moveArrowDir(this, "next");' ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/catalouge_right.png"  /></a>

</div>

<div id="fb-root"></div>
<script>
                                                function abc(x) {

                                                }

                                                (function(d, s, id) {



                                                    var js, fjs = d.getElementsByTagName(s)[0];
                                                    if (d.getElementById(id))
                                                        return;
                                                    js = d.createElement(s);
                                                    js.id = id;
                                                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=395003540638224";
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = "//platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, "script", "twitter-wjs");</script>