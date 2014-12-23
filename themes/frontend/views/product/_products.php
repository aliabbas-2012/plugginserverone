<div style="clear:both"></div>
<article>

    <h2>Darussalam <?php echo $category->name; ?></h2>
    <div style="clear:both"></div>
    <?php
    if (!empty($data)):

        foreach ($data as $chunk):
            ?>

            <div class="ebook_part">
                <?php
                $count = 0;
                foreach ($chunk as $product):
                    $css_class = "left_book";
                    if ($count == 0) {
                        $css_class = "left_book";
                    } else if ($count == 1) {
                        $css_class = "middle_book";
                    } else if ($count == 2) {
                        $css_class = "right_book";
                    }
                    ?>
                    <div class="<?php echo $css_class ?>">
                        <?php
                        $product_image = $product->getImage();
                        $noimage = "noimagelist.jpg";
                        $htmlOptionsImage = array("class"=>"custom_image");
                        $chrLength = 20;
                        
                        
                        //if product is ebook then image is different
                        if(strstr($category->name,"book")){
                              $noimage = "noidmagelist.jpg";
                              $htmlOptionsImage = array("width"=>"160","height"=>"214");
                              //in case of books it is more 
                              $chrLength = 35;
                        }
                        if (isset($product_image[0])) {
                            echo CHtml::image($product_image[0]['image_large'], '', $htmlOptionsImage);
                        } else {
                            echo CHtml::image(Yii::app()->baseUrl . "/images/".$noimage, '', array('class' => 'custom_image'));
                        }
                        ?>

                        <h1><?php echo $product->name ?></h1>
                        <p>
                            <?php
                            if (strlen($product->description) > $chrLength) {
                                echo CHtml::openTag("span", array("title" => $product->description, "alt" => $product->description));
                                echo substr($product->description, 0, $chrLength) . "...";
                                echo CHtml::closeTag("span");
                            } else {
                                echo $product->description;
                            }
                            ?>
                        </p>
                        <?php
                        if (!empty($product->productPlatforms)):
                            ?>
                            <div id="link_to_web">

                                <?php
                                foreach ($product->productPlatforms as $platefrm):

                                    echo CHtml::link($platefrm->plateform->show_image['image'], $platefrm->link, array("target" => "_blank"));
                                endforeach;
                                ?>
                            </div>

                            <?php
                        endif;
                        ;
                        ?>
                    </div>

                    <?php
                    $count++;
                endforeach;
                ?>
            </div>
            <?php
        endforeach;
    endif;
    ?>
    <div style="clear:both"></div>
    <?php
    $jsMethods = array();
    $jsMethods['loadSlider'] = "dtech_app.updateElementAjaxJsonPagination(jQuery(this).attr('href'));return false;";
    $jsMethods['ebooks'] = "dtech_app.updateElementAjaxJsonPagination(jQuery(this).attr('href'));return false;";

    $jsMethods['products'] = "dtech_app.updateElementAjax(jQuery(this).attr('href'),'content','','" . $this->action->id . "');return false;";



    /**
     * pagination
     */
    ?>
    <span class="pagination_span">
        <?php
        $this->widget('DTPager', array(
            'pages' => $dataProvider->pagination,
            'ajax' => true,
            'jsMethod' => $jsMethods[$this->action->id],
                )
        );
        ?>
    </span>

</article>
<script type="text/javascript">
    jQuery(".left_book a img,.middle_book a img,.right_book a img").hover(function() {

        jQuery(this).css({opacity: 0.5});
    })
    jQuery(".left_book a img,.middle_book a img,.right_book a img").mouseleave(function() {
        jQuery(this).css({opacity: 1});
    })

</script>
