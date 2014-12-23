<?php
//loading css and js files for own pages
$cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/catalouge.css');
?>
<section id="contents">

</section>

<?php

if ($slug == "") {

    Yii::app()->clientScript->registerScript('click_categories', "
            dtech_app.updateElementAjax('" . $this->createUrl('/web/product/catlogue', array('slug' => $slug)) . "','contents');
        ", CClientScript::POS_READY);
} else if ($slug == "e-books") {

    Yii::app()->clientScript->registerScript('click_categoriesa', "
        dtech_app.updateElementAjax('" . $this->createUrl('/web/product/catlogue', array('slug' => $slug)) . "','contents');
     
                
        ", CClientScript::POS_READY);
} else if ($slug == "apps") {

    Yii::app()->clientScript->registerScript('click_categoriesa', "
        dtech_app.updateElementAjax('" . $this->createUrl('/web/product/catlogue', array('slug' => $slug)) . "','contents');
     
                
        ", CClientScript::POS_READY);
} else {


    $page = isset($_REQUEST['page']) ? ($_REQUEST['page']) : 0;


    Yii::app()->clientScript->registerScript('click_categoriesdsada', "
        dtech_app.updateElementAjax('" . $this->createUrl('/web/product/catlogue', array('slug' => $slug, "page" => $page)) . "','contents');
     
                
        ", CClientScript::POS_READY);
}
   
    
