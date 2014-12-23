

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
    <?php
    
    //********************************** Form for Search starts here ************************************//


    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'search-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('enctype' => 'multipart/form-data', 'data-ajax' => 'false'),
    ));
    ?>
    <div class="container">
        <div class="row">

            <div class="col-lg-4 form-all-controls">
                <div class="style-selected">
                </div>





                <?php
                // Category Drop Down in search Form
                echo $form->dropDownList($model, 'category', CHtml::listData($data['allCat'], 'category_id', 'category_name'), array("prompt" => "Categories", 'class' => 'form-control', 'options' => array(
                        '1' => array(
                            'selected' => "selected"
                ))));
                ?>






            </div>
            <div class="col-lg-4 form-all-controls">
                <div class="style-selected">
                </div>


                <?php
                // Authors Drop Down in search Form
                echo $form->dropDownList($model, 'author', CHtml::listData($data['authors'], 'author_id', 'author_name'), array("prompt" => "Authors", 'class' => 'form-control', 'options' => array(
                        '1' => array(
                            'selected' => "selected"
                ))));
                ?>




            </div>
            <div class="col-lg-4 form-all-controls">

                <div class="input-group">

                    <?php
                    // Search Field by Book title in search Form
                    echo $form->textField($model, 'search', array("placeholder" => "Search By Title", 'class' => 'form-control form-search-control'));
                    ?>




                    <div class="input-group-btn">

                        <span class="glyphicon glyphicon-search">
                            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/glyphicons_027_search.png'), array('id' => 'form_submit', 'onclick' => 'dtech_app.disableDatapageAjax(this);return false;', 'class' => 'btn btn-info')); ?>
                        </span>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 form-all-controls" style="display:none;">
                <p style="text-align:center;">
                    <label for="amount" style=" font-weight: normal;color:#747474; font-size:13px; font-family:Arial, Helvetica, sans-serif; text-align:center;">min</label>
                    <input  type="text" disabled id="amount" style="border:1px solid #c7c7c7 !important; color:#6f6f6f; font-weight:bold; width:80px; border-radius:5px; text-align:center;">
                    <label for="amount" style=" font-weight: normal;text-align:center; color:#747474; font-size:13px; font-family:Arial, Helvetica, sans-serif;">max</label>
                </p>
                <div id="slider-range"></div>
            </div>
            <div class="col-lg-4 form-my-controls">
                <div class="style-selected">
                </div>
                <?php
                
                // LAnguage Drop Down  in search Form
                
                echo $form->dropDownList($model, 'lang', CHtml::listData($data['languages'], 'language_id', 'language_name'), array("prompt" => "Languages", 'class' => 'form-control', 'options' => array(
                        '1' => array(
                            'selected' => "selected"
                ))));
                ?>

            </div>
            <div class="col-lg-3 form-my-controls">
                <div class="style-selected">
                </div>
                <select class="form-control">
                    <option selected>Sort By</option>
                    <option>Name</option>
                    <option>Edition</option>
                </select>
            </div>
            <div class="col-lg-1 form-my-controls">

                <?php echo Chtml::submitButton('Search', array('id' => 'form_submit', 'onclick' => 'dtech_app.disableDatapageAjax(this);return false;', 'class' => 'btn btn-primary btn-sm')); ?>

            </div>
        </div>
    </div>
</div>
<?php
$this->endWidget();

//************************************************************* Search Form Ending ******************************************************//
?>
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
                'jsMethod' => 'dtech_app.disableDatapageAjax(this);return false;',
                    )
            );
//            if (!isset($_REQUEST["page"]) || $_REQUEST["page"] == 1) {
//            $this->widget('DTScroller', array(
//                'pages' => $pages,
//                'ajax' => true,
//                'jsMethod' =>'dtech_app.disableDatapageAjax(this);return false;',
//                    )
//            );
//        }
            ?>

        </div>
    </div>
</div>

<script>
    jQuery().ready(function() {
        jQuery("a").attr("data-ajax", "false");
    }
    );





</script>
