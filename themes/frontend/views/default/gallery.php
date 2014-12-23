
<?php
//loading css and js files for own pages
$cs = Yii::app()->clientScript;

$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/gallery.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/about.css');

$cs->registerCssFile(Yii::app()->theme->baseUrl . '/lightbox/css/lightbox.css');
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/lightbox/js/lightbox-2.6.min.js', CClientScript::POS_END);
?>

<div class="gallery_banner">
</div>

<div class="gallery_main_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 gallery_content">
                <h1>Darussalam Achievements</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-lg-3 banner_small">
                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/gallery_1_03.jpg'), Yii::app()->theme->baseUrl . '/images/gallery_1_03.jpg', array("rel"=>"lightbox[_default]","class" => 'product_detail ', 'data-ajax' => "false"));
                ?>
                
            
            </div>
            <div class="col-lg-3 banner_small">
                 <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/gallery_2_03.jpg'), Yii::app()->theme->baseUrl . '/images/gallery_2_03.jpg', array("rel"=>"lightbox[_default]","class" => 'product_detail ', 'data-ajax' => "false"));
                ?>
              
            </div>
            <div class="col-lg-3 banner_small">
                 <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/gallery_3_03.jpg'), Yii::app()->theme->baseUrl . '/images/gallery_3_03.jpg', array("rel"=>"lightbox[_default]","class" => 'product_detail ', 'data-ajax' => "false"));
                ?>
                
            </div>
            <div class="col-lg-3 banner_small">
                 <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/gallery_4_03.jpg'), Yii::app()->theme->baseUrl . '/images/gallery_4_03.jpg', array("rel"=>"lightbox[_default]","class" => 'product_detail ', 'data-ajax' => "false"));
                ?>
                
            </div>
            <div class="col-lg-3 banner_small">
                 <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/gallery_5_03.jpg'), Yii::app()->theme->baseUrl . '/images/gallery_5_03.jpg', array("rel"=>"lightbox[_default]","class" => 'product_detail ', 'data-ajax' => "false"));
                ?>
                
            </div>
            <div class="col-lg-3 banner_small">
                 <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/gallery_6_03.jpg'), Yii::app()->theme->baseUrl . '/images/gallery_6_03.jpg', array("rel"=>"lightbox[_default]","class" => 'product_detail ', 'data-ajax' => "false"));
                ?>
                
            </div>
            <div class="col-lg-3 banner_small">
                 <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/gallery_7_03.jpg'), Yii::app()->theme->baseUrl . '/images/gallery_7_03.jpg', array("rel"=>"lightbox[_default]","class" => 'product_detail ', 'data-ajax' => "false"));
                ?>
                
            </div>
            <div class="col-lg-3 banner_small">
                 <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/gallery_8_03.jpg'), Yii::app()->theme->baseUrl . '/images/gallery_8_03.jpg', array("rel"=>"lightbox[_default]","class" => 'product_detail ', 'data-ajax' => "false"));
                ?>
               
            </div>
            <div class="col-lg-3 banner_small">
                 <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/gallery_9_03.jpg'), Yii::app()->theme->baseUrl . '/images/gallery_9_03.jpg', array("rel"=>"lightbox[_default]","class" => 'product_detail ', 'data-ajax' => "false"));
                ?>

            </div>
            <div class="col-lg-3 banner_small">
                 <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/gallery_10_03.jpg'), Yii::app()->theme->baseUrl . '/images/gallery_10_03.jpg', array("rel"=>"lightbox[_default]","class" => 'product_detail ', 'data-ajax' => "false"));
                ?>
                
            </div>
        </div>
    </div>
</div>