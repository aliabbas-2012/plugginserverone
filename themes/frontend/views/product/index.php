<?php
//loading css and js files for own pages
$cs = Yii::app()->clientScript;

$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/ebook_style.css');
?>
<section id="banner">
    <article>
        <?php
        $criteria = new CDbCriteria();
        $criteria->limit = 2;
        $categories = Category::model()->findAll($criteria);
        $count = 0;
        foreach ($categories as $cat):
            if ($count == 0) {
                $this->renderPartial("//product/_apps_banner", array("cat" => $cat));
            } else if ($count == 1) {
                $this->renderPartial("//product/_ebooks_banner", array("cat" => $cat));
            }
            $count++;
        endforeach;
        ?>
    </article>
</section>
<section id="content">

</section>
<?php
/**
 * slug is empty then automatic first will be called as loaded
 * category
 */
if ($slug == "") {
    Yii::app()->clientScript->registerScript('click_categories', "
            jQuery('.category_labels').first().trigger('click');
        ", CClientScript::POS_READY);
} else {
    Yii::app()->clientScript->registerScript('click_categories', "
            jQuery('#category_" . $slug . "').trigger('click');
        ", CClientScript::POS_READY);
}

Yii::app()->clientScript->registerScript('click_nav_menu', '
    
    jQuery("body").click(function() {
            jQuery(".subs div").hide();

        });
    $("#d_nav > li > a").live("click",function () { // binding onclick
            if ($(this).parent().hasClass("selected")) {
                $("#d_nav .selected div div").slideUp(100); // hiding popups
                $("#d_nav .selected").removeClass("selected");
            } else {
                $("#d_nav .selected div div").slideUp(100); // hiding popups
                $("#d_nav .selected").removeClass("selected");

            if ($(this).next(".subs").length) {
                $(this).parent().addClass("selected"); // display popup
                $(this).next(".subs").children().slideDown(200);
            }
        }
    });
', CClientScript::POS_READY);
?>
