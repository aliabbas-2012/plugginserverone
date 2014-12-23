
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/apps.css" rel="stylesheet">


<!-- Carousel
  ================================================== -->

<?php
$sliders = ProductSlider::model()->findAll();
$slider_content = $this->renderPartial('//default/_slider', array("sliders" => $sliders));
?>







<section id="contents">

</section>


<?php
if ($slug == "") {

    Yii::app()->clientScript->registerScript('click_categories', "
            dtech_app.updateElementAjax('" . $this->createUrl('/web/product/products', array('slug' => $slug)) . "','contents');
        ", CClientScript::POS_READY);
} else if ($slug == "e-books") {

    Yii::app()->clientScript->registerScript('click_categoriesa', "
        dtech_app.updateElementAjax('" . $this->createUrl('/web/product/products', array('slug' => $slug)) . "','contents');
     
                
        ", CClientScript::POS_READY);
} else if ($slug == "apps") {

    Yii::app()->clientScript->registerScript('click_categoriesa', "
        dtech_app.updateElementAjax('" . $this->createUrl('/web/product/products', array('slug' => $slug)) . "','contents');
     
                
        ", CClientScript::POS_READY);
} else if ($slug == "books") {


    $page = isset($_REQUEST['page']) ? ($_REQUEST['page']) : 0;
//    if (!empty($_REQUEST['page'])) {
//        Yii::app()->clientScript->registerScript('click_categoriesdsada', "
//        dtech_app.updatePage('" . $this->createUrl('/web/product/viewProducts', array('slug' => $slug, "page" => $page)) . "','contents','search-form');
//     
//                
//        ", CClientScript::POS_READY);
//    }

    Yii::app()->clientScript->registerScript('click_categoriesdsada', "
        dtech_app.updateElementAjax('" . $this->createUrl('/web/product/viewProducts', array('slug' => $slug, "page" => $page)) . "','contents');
     
                
        ", CClientScript::POS_READY);
}
   
    
