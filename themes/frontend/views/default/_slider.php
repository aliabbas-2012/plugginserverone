<style>
    #banner { display:block; float:left; padding: 0; margin-top: 77px; width:100%; height:575px; background: none}
</style>
<!--<div class="cross">

<?php
//        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl."/images/cross_03.jpg"), "javascript:void(0)", array(
//            "onclick" => "dtech_app.loadHomeAgain('" . $this->createUrl("/web/default/loadHome",array("slug"=>"")) . "','','" . $this->action->id . "')",
//                )
//        );

//echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/cross_03.jpg"), Yii::app()->homeUrl);
?>
</div>-->
<div class="cross">
    <?php
    echo CHtml::link("", Yii::app()->homeUrl);
    ?>
</div>
<div class="slider-wrapper">
    <div id="slider">
        <?php
        $cs = Yii::app()->clientScript;

        $count = 1;
        foreach ($sliders as $slider):
            ?> 
            <div class="slide<?php echo $count ?>">

                <?php
                echo $slider->show_image['image'];
                ?>
                <div class="slider_part">
                    <?php
                    $c = 0;
                    $css_class = "slide_bg";
                    foreach ($slider->sliderPlatforms as $sliderPlat):
                        if ($c % 2 == 0) {
                            $css_class = "slide_bg";
                        } else {

                            $css_class = "slide_right_bg";
                        }
                        ?>
                        <div class="<?php echo $css_class ?>">
                            <a href="<?php echo $sliderPlat->productPlateform->link ?>" target="blank">
                                <?php
                                echo CHtml::image($sliderPlat->image_url['image_platform']);
                                ?>  
                            </a>
                        </div>

                        <?php
                        $c++;
                    endforeach;
                    ?>
                </div>
            </div>

            <?php
            $count++;
        endforeach;
        ?>

    </div>
    <div id="slider-direction-nav"></div>
    <div id="slider-control-nav"></div>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            var slider = $('#slider').leanSlider({
                directionNav: '#slider-direction-nav',
                controlNav: '#slider-control-nav',
                afterLoad: function() {

                }
            });
        });
    </script>