<?php
//$update_url = $this->createUrl 
?>
<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/catalouge-banner_02.png" style=" max-width:100%; margin-left:auto; margin-right:auto; display:block;" />


<div id="carousel-wrap">

    <?php
    /**
     * loading slider data
     */
    $this->renderPartial("//product/_catalouge_slider_data_b", array("data" => $data, "pages" => $pages, "limit" => $limit, "slider" => $slider,'model'=> $model));
    ?>

</div>
<center>
    <div class="col-lg-12" style="margin-left: auto;margin-right: auto;" >
        <!--PAGINATION WIDGET 
        *    $pages is the object of cpagination
        *    Jsmethod the method which will be triggered on pagination click
        
        
        -->
        <?php
        $this->widget('DTPager', array(
            'pages' => $pages,
            'ajax' => true,
            //'jsMethod' => "dtech_app.updateCataloguePagination(this,jQuery(this).attr('href'),'carousel-wrap');return false;",
            'jsMethod' => "dtech_app.updateElementAjax(jQuery(this).attr('href'),'contents','','" . $this->action->id . "',false);return false;",
                )
        );
        ?>

    </div>
</center>

<script>
    jQuery().ready(function() {
        jQuery("a").attr("data-ajax", "false");

        //dtech_app.updateElementAjax(ajax_url,'catimonial-list','',true);
    });
</script>
