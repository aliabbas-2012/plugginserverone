<div class="left_banner">
    <div>
        <?php
        echo CHtml::link(CHtml::image($cat->show_image['link']), "javascript:void(0)", array(
            "onclick" => "dtech_app.updateElementAjaxJson('" . $this->createUrl("/web/default/loadSlider",array("slug"=>$cat->slug)) . "','','" . $this->action->id . "')",
                )
        );
        ?>
        <h1>
            <?php echo $cat->name; ?>
        </h1>

        <?php
        echo CHtml::link(
                CHtml::image(Yii::app()->theme->baseUrl . "/images/android.png"), "javascript:void(0)", array("class" => "adds_link")
        );
        ?>

    
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/iphone.png"), "javascript:void(0)", array("class" => "adds_link"));
        ?>
    </div>

</div>
<div class="middle_banner">

    <?php
    echo CHtml::image(Yii::app()->theme->baseUrl . "/images/banner_center_img_03.jpg");
    ?>
</div>

