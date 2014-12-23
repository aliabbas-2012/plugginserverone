<div class="right_banner">
    <div>
        <div class="right_banner_pad_img">
            <?php
            echo CHtml::link(CHtml::image($cat->show_image['link']), $this->createUrl("/web/product/products", array("slug" => $cat->slug))
            );
            ?>
        </div>
        <!--        <div class="right_banner_pad_img">
        <?php
        //            echo CHtml::link(CHtml::image($cat->show_image['link']), "javascript:void(0)", array(
        //                "onclick" => "dtech_app.updateEbookElementAjaxJson('" . $this->createUrl("/web/default/ebooks",array("slug"=>$cat->slug)) . "','','" . $this->action->id . "')",
        //                    )
        //            );
        ?>
                </div>-->
        <h1>
            <?php echo $cat->name; ?>
        </h1>
        <div class="right_banner_small_img">
            <?php
            //echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/book.png"), "javascript:void(0)", array("class" => "adds_link"));
            //echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/kobo.png"), "javascript:void(0)", array("class" => "adds_link"));
            echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/amazon.png"), "javascript:void(0)", array("class" => "adds_link"));
            echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/google-play.png"), "javascript:void(0)", array("class" => "adds_link"));
            ?>
        </div>
    </div>


</div>