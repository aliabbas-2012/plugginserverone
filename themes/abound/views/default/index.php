

<div class="container marketing">

    <div class="row">

        <div class="span3 index_apps">
            <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/designed_img_03.png" /> WordPress Plugins</h2>
            <div class="index_books">
                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/plugin_01.png"), $this->createUrl("default/underConstruction"), array('data-ajax' => 'false'));
                ?>
            </div>
            <p><?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/more_button.jpg"), $this->createUrl("default/underConstruction"), array('data-ajax' => 'false'));
                ?></p>
        </div>



        <div class="span3 index_apps">
            <h3><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/designed_img_03.png" />Joomla Plugins</h3>
            <div class="index_toys">

                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/plugin_02.png"), $this->createUrl("/web/default/underConstruction"), array('data-ajax' => 'false')); ?>


            </div>
            <p> <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/more_button.jpg"), $this->createUrl("/web/default/underConstruction"), array('data-ajax' => 'false')); ?></p>

        </div><!-- /.col-lg-3 -->
        <div class="span3 index_apps">
            <h3><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/designed_img_03.png" /> Druppal Plugins</h3>
            <div class="index_toys">

                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/plugin_03.png"), $this->createUrl("/web/default/underConstruction"), array('data-ajax' => 'false')); ?>


            </div>
            <p> <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/more_button.jpg"), $this->createUrl("/web/default/underConstruction"), array('data-ajax' => 'false')); ?></p>

        </div><!-- /.col-lg-3 -->
    </div><!-- /.row -->
</div>

