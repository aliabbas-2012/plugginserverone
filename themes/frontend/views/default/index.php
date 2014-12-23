<?php
//loading css and js files for own pages
$cs = Yii::app()->clientScript;

$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/scripts/lean-slider.js');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/banner-style.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/lean-slider.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/sample-styles.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/_book_style.css');
?>
<section id="banner" class="main_head_banner">
    <article>
        <?php
        $criteria = new CDbCriteria();
        $criteria->limit = 2;
        $categories = Category::model()->findAll($criteria);
        $count = 0;
        foreach ($categories as $cat):
            if ($count == 0) {
                $this->renderPartial("//default/_apps", array("cat" => $cat));
            } else if ($count == 1) {
                $this->renderPartial("//default/_ebooks", array("cat" => $cat));
            }
            $count++;
        endforeach;
        ?>
    </article>
</section>
<?php
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