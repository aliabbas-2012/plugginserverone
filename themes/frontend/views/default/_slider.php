<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/apps.css" rel="stylesheet">
<div id="myCarousel" class="carousel slide">

    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php
        $cs = Yii::app()->clientScript;

        $count = 0;
        $active = "active";
        foreach ($sliders as $slider):

            if ($count > 0) {
                $active = "";
            }
            ?> 
            <div class="item <?php echo $active ?>  item-<?php echo $count; ?>" style="background:url(<?php echo $slider->show_image["link"]; ?>)">
                <?php
                // echo $slider->show_image['image'];
                ?>
                <div class="container">
                    <div class="carousel-caption about-carousel-<?php echo++$count; ?>">
                        <?php
                        $c = 0;

//                        foreach ($slider->sliderPlatforms as $sliderPlat):
//                            if ($c % 2 == 0) {
//                                
//                            } else {
//                                
//                            }
//                            
                        ?>


                                <!--<a href="//<?php // echo $sliderPlat->productPlateform->link; ?>" target="blank">-->
                        <?php
//                                
//                                //echo CHtml::image($sliderPlat->image_url['image_platform']);
//                                
//                                
                        ?>  



                        <?php
//                            $c++;
//                        endforeach;
                        ?>

                    </div>
                </div>
            </div>


            <?php
            //$count++;
        endforeach;
        ?>

    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner_left.png" /></span></a>
    <a id='o' class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner_right.png" /></span></a>
</div>

<script type="text/javascript">
    var slider;
    jQuery(document).ready(function() {

        slider = $('#slider').leanSlider({
            directionNav: '#slider-direction-nav',
            controlNav: '#slider-control-nav',
            afterLoad: function() {

               setTimeout(function() {
                   $(".right").trigger('click');
                   console.log( $(".right"));
                }, 3000);
 
 
            }

        });

    });
</script>


<script type="text/javascript">


    jQuery(document).bind('keyup', function(e) {

        if (e.keyCode == 39) {
            jQuery('a.carousel-control.right').trigger('click');
        }

        else if (e.keyCode == 37) {
            jQuery('a.carousel-control.left').trigger('click');
        }

    });


</script>
