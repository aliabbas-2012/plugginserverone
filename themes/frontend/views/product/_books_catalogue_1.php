

<!--INITIALLIZING THE STYLE SHEETS REQUIRED FOR THIS PAGE-->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-ui.css" rel="stylesheet">

<style>
    .demo-section {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.01) 0%, rgba(0, 0, 0, 0.07) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
        border-color: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
        border-style: solid;
        border-width: 1px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        margin: 0 0 1px 0;
        padding: 10px;
    }

    .life_img { margin-left: 0!important; }

    .small_booktype img { border:1px solid #999; border-radius:2px; }
</style>
<div class="demo-section">
    <div class="container marketing">
        <div class="row">
            <?php
            // ********************************************** Showing Books ********************************************************//
      
            foreach ($data['products'] as $product):

                //styles for the images
                $noimage = "noidmagelist.jpg";

                //in case of books it is more za123

                $chrLength = 35;
                ?>
                <div class="col-lg-4 apps_part">
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/designed_img_03.png"); ?>
                    <article>
                        <?php echo $product['product_name'] ?>
                    </article>
                    <section><i>
                            <?php
                            if (strlen($product['product_description']) > $chrLength) {
                                echo CHtml::openTag("span", array("title" => $product['product_description'], "alt" => $product['product_description']));
                                echo substr($product['product_description'], 0, $chrLength) . "...";
                                echo CHtml::closeTag("span");
                            } else {
                                echo $product['product_description'];
                            }
                            ?>
                        </i></section>

                    <div class="small_booktype">
                        <?php
                        if (!empty($product['image'][0]['image_small'])) {
                            echo CHtml::link(CHtml::image($product['image'][0]['image_small'], ''), $product['product_url'], array("target" => "_blank"));
                        } else {
                            echo CHtml::link(CHtml::image(Yii::app()->baseUrl . "/images/" . $noimage, ''), $product['product_url'], array("target" => "_blank"));
                        }
                        ?>
                    </div>


                </div>
                <div class="clear"></div>
                <?php
            endforeach;
            // ********************************************************** End of showing Books *******************************************************//
            ?>
            <!-- /.col-lg-6 -->

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="text-align:center; margin:5px 0;">
                <!--PAGINATION WIDGET 
                *    $pages is the object of cpagination
                *    Jsmethod the method which will be triggered on pagination click
                
                
                -->
                <?php
                $this->widget('DTPager', array(
                    'pages' => $pages,
                    'ajax' => true,
                    'jsMethod' => "dtech_app.updateElementAjax(jQuery(this).attr('href'),'contents','','" . $this->action->id . "',true);return false;",
                        )
                );
                ?>

            </div>
        </div>
    </div>

<script>
    jQuery().ready(function() {
        jQuery("a").attr("data-ajax", "false");
    });
</script>
