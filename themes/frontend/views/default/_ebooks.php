<div class="col-lg-3 index_apps">
    <h4>
        <?php
        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/designed_img_03.png");
        echo " ".$cat->name;
        ?> </h4>
    <div class="index_ebooks">
<?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/ebooks_03.png"),$this->createUrl("/web/product/products", array("slug" => $cat->slug)),array('data-ajax' => 'false')); ?>
    </div>
    <p><?php 
    echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/more_button.jpg"), $this->createUrl("/web/product/products", array("slug" => $cat->slug)),array("data-ajax"=>"false")); 
    ?>
    </p>
</div>