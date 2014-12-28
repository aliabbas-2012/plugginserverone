<?php
$dir = "user_registered_pluggins";
$fields_div_id = $dir . '_fields';
$heading = "Registered Plugins";
$mName = "PlugginSiteInfo";

/* when page is rediretc it contains #relation name use same name to go at that child at page */
$relationName = $dir;
echo '<a name="' . $relationName . '"></a>';

$plusImage = "<div class='col-lg-1' style='padding-top:10px'>" .
        CHtml::image(Yii::app()->theme->baseUrl . '/images/icons/plus.gif', 'bingo', array('class' => 'rotate_iamge', 'id' => $relationName . '-plus', 'class' => 'plus')) .
        "</div>";

?>

<div class="child-container col-lg-12" id ="<?php echo $dir; ?>">
    <div class="subsection-header">
        <div class="col-lg-10">
            <?php
            if ($this->action->id == 'view') {
                echo CHtml::link($plusImage . ' ' . $heading, 'javascript:;', array('class' => $relationName . '-buttonsc'));
            } else {
                echo $plusImage . " ";
                echo "<div class='col-lg-8'>";
                echo '<div class="panel-heading">';
                echo $heading;
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="col-lg-2">
            <?php
           
            ?>
        </div>
        <div class="clear"></div>
    </div>


    <?php
    /* Load grid if page is open in detail view mode */
    if ($this->action->id == "view") {
        $this->renderPartial($dir . "/_grid", array('model' => $model, "dir" => $dir,));
    }

    Yii::app()->clientScript->registerScript($relationName . '_sc_script', "
            jQuery('.$relationName-buttonsc').click(function(){
               
                jQuery('#" . $relationName . "-plus').toggleClass('plus_rotate');
                jQuery('.$relationName').animate(
                        {opacity: 'toggle', left: '+=50', height: 'toggle'}, 500, 
                        function(){}
                    );
                return false;
            });
            ");
    ?>
</div>
