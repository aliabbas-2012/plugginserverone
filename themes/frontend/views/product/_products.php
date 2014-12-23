

<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/pagination.css" rel="stylesheet">
<?php
?>
<div id="a"></div>

<?php
if (!empty($data)):
    $count = 0;
    foreach ($data as $chunk):

        if ($count == 0) {
            ?>
            <div class="container marketing">


                <div class="row">
                <?php } ?>



                <?php
                foreach ($chunk as $product):



                    $product_image = $product->getImage();
                    $noimage = "noimagelist.jpg";
                    $htmlOptionsImage = array("class" => "dreams_img");
                    $chrLength = 20;


                    //if product is ebook then image is different
                    if (strstr($category->name, "book")) {
                        $noimage = "noidmagelist.jpg";
                        $htmlOptionsImage = array("class" => "life_img");
                        //in case of books it is more 
                        $chrLength = 35;
                    }
                    ?>
                    <div class="col-lg-6 apps_part">
                    	<div class="all-transition-parts">
							<?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/designed_img_03.png"); ?>
                            <article>
                                <?php echo $product->name ?>
                            </article>
                            <section><i>
                                    <?php
                                    if (strlen($product->description) > $chrLength) {
    //                                    echo CHtml::openTag("span", array("title" => $product->description, "alt" => $product->description));
    //                                    echo substr($product->description, 0, $chrLength) . "...";
    //                                    echo CHtml::closeTag("span");
                                    } else {
    //                                    echo $product->description;
                                    }
                                    ?>
                                </i></section>
    
    
                            <?php
                            if (isset($product_image[0])) {
                                echo CHtml::link(CHtml::image($product_image[0]['image_large'], '', $htmlOptionsImage), 'javascript:void(0)');
                            } else {
                                echo CHtml::link(CHtml::image(Yii::app()->baseUrl . "/images/" . $noimage, ''), 'javascript:void(0)');
                            }
                            ?>
    
                            <div class="col-lg-2 icon_img">
                                <?php
                                if (!empty($product->productPlatforms)):
                                    ?>
    
    
                                    <?php
                                    foreach ($product->productPlatforms as $platefrm):
    
                                        echo CHtml::link($platefrm->plateform->show_image['image'], $platefrm->link, array("target" => "_blank"));
                                    endforeach;
                                    ?>
    
    
                                    <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;

                endforeach;
                ?>
                <!-- /.col-lg-6 -->


                <?php
            endforeach;
        endif;
        ?>
    </div>
</div>
<?php
$jsMethods = array();
$jsMethods['loadSlider'] = "dtech_app.updateElementAjaxJsonPagination(jQuery(this).attr('href'));return false;";
$jsMethods['ebooks'] = "dtech_app.updateElementAjaxJsonPagination(jQuery(this).attr('href'));return false;";

$jsMethods['products'] = "dtech_app.updateElementAjax(jQuery(this).attr('href'),'contents','','" . $this->action->id . "',true);return false;";



/**
 * pagination
 */
?>
<div class="container marketing">
    <div class="row product_data">

    </div>
    <span class="pagination_span" style="display: none">
        <?php
//            $this->widget('DTPager', array(
//                'pages' => $dataProvider->pagination,
//                'ajax' => true,
//                'jsMethod' => $jsMethods[$this->action->id],
//                    )
//            );
        // same case when first page it loaded other wise only change on scroll
        if (!isset($_REQUEST["Product_page"]) || $_REQUEST["Product_page"] == 1) {
            $this->widget('DTScroller', array(
                'pages' => $dataProvider->pagination,
                'ajax' => true,
                'jsMethod' => $jsMethods[$this->action->id],
                    )
            );
        }
        ?>

    </span>
</div>

<script type="text/javascript">
<?php
//in case when first page is loaded then scroll to top 
//other wise it normal
if (!isset($_REQUEST["Product_page"]) || $_REQUEST["Product_page"] == 1):
    ?>
        jQuery(document).ready(function() {

            //jQuery(window).scrollTop(0);

        })
    <?php
endif;
?>

    jQuery(".left_book a img,.middle_book a img,.right_book a img").hover(function() {

        jQuery(this).css({opacity: 0.5});
    })
    jQuery(".left_book a img,.middle_book a img,.right_book a img").mouseleave(function() {
        jQuery(this).css({opacity: 1});
    })

</script>

