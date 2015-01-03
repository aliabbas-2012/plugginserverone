

<div class="container marketing">

    <div class="row">
        <?php
        $plateforms = Plateform::model()->findAll();
        foreach ($plateforms as $plateform):
            ?>
            <div class="span3 index_apps">
                <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/designed_img_03.png" /> <?php echo $plateform->name;?> Plugins</h2>
                <div class="index_books">
                    <?php echo CHtml::link(CHtml::image($plateform->image_url['image_large']), $this->createUrl("/web/default/plateform",array("id"=>$plateform->id)), array('data-ajax' => 'false'));
                    ?>
                </div>
                <p><?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/more_button.jpg"), $this->createUrl("/web/default/plateform",array("id"=>$plateform->id)), array('data-ajax' => 'false'));
                    ?></p>
            </div>

            <?php
        endforeach;
        ?>
    </div><!-- /.row -->
</div>

