<div class="right_banner">
    <?php
    echo CHtml::link(CHtml::image($cat->show_image['small_link']), $this->createUrl("/web/product/products", array("slug" => $cat->slug)), array(
        "onclick" => "dtech_app.updateElementAjax('" . $this->createUrl("/web/product/products", array("slug" => $cat->slug)) . "','content','','".$this->action->id."',false);return false;",
        "id" => "category_" . $cat->slug,
        "class" => "category_labels",
        "alt" => $cat->name,
        "title" => $cat->name,
            )
    );
    ?>
</div>