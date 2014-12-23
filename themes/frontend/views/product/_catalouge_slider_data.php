<ul id="catimonial-list" class="clearfix">
    <?php
    /**
     * Catalogue Slider view 
     */
    $chunk_data = array_chunk($data['products'], 5);
    $current_page = $pages->getCurrentPage();
    foreach ($chunk_data as $key => $data):
        ?>

        <li class='<?php echo ($current_page == 0 || $slider == "") && $key == 0 ? "current_cat" : "" ?>'>
            <div id="catlogue_content" class="catlogue_content2 "> 
                <?php
                // ********************************************** Showing Books ********************************************************//
                $count = 0;
                foreach ($data as $product):

                    $css_class = "catalouge-upper";
                    if ($count % 2 == 0) {
                        $css_class = "catalouge-lower";
                    }
                    //styles for the images
                    $noimage = "noidmagelist.jpg";

                    //in case of books it is more za123

                    $chrLength = 35;
                    ?>  
                    <div class="container marketing">
                        <div class="row">
                            <div class="<?php echo $css_class; ?>">
                                <div class="col-lg-4 cat-left">

                                    <?php
                                    if (!empty($product['image'][0]['image_small'])) {
                                        echo CHtml::link(CHtml::image($product['image'][0]['image_small'], ''), $product['product_url'], array("target" => "_blank"));
                                    } else {
                                        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . "/images/" . $noimage, ''), $product['product_url'], array("target" => "_blank"));
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-8 cat-right">
                                    <h3><?php echo $product['product_name'] ?></h3>
                                    <p>
                                        <?php
                                        if (strlen($product['product_overview']) > $chrLength) {
                                            echo CHtml::openTag("span", array("title" => $product['product_overview'], "alt" => $product['product_description']));
                                            echo substr($product['product_overview'], 0, $chrLength) . "...";
                                            echo CHtml::closeTag("span");
                                        } else {
                                            echo $product['product_overview'];
                                        }
                                        ?>
                                    </p>    
                                    <div class="catalouge-links">
                                        <div class="catalouge-g-plus" style="border-right: 1px solid #e3e3e3;">
                                            <a href="javascript:void(0)"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/g-plus.png" /></a>
                                            <p>0</p>
                                        </div>
                                        <div class="catalouge-g-plus">
                                            <a href="javascript:void(0)"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/t-tweet.png" /></a>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $count++;
                endforeach;
                ?>

            </div>
        </li>
        <?php
    endforeach;
    ?>
</ul>

