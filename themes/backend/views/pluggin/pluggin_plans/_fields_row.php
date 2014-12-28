<?php
/* mean it is called by ajax. */
if (!isset($display)) {
    $display = 'none';
}
$mName = "PlugginPlans";
$relationName = "pluggin_plans";
?>
<div class="grid_fields" style="display:<?php echo $display; ?>">


    <div class="field col-lg-5">
        <?php
        if ($load_for == "view") {
            echo CHtml::activeHiddenField($model, '[' . $index . ']id');
        }

        $criteria = new CDbCriteria();
        $data = array("" => "Select") + CHtml::listData(ConfPlans::model()->findAll($criteria), "id", "_duration");
        echo CHtml::activeDropDownList($model, '[' . $index . ']plan', $data);
        ?>
    </div>
    <div class="field col-lg-3">
        <?php

        echo CHtml::activeTextField($model, '[' . $index . ']price');
        ?>
    </div>
    <div class="field col-lg-2">
        <?php

        echo CHtml::activeDropDownList($model, '[' . $index . ']currency', 
                array("dollar"=>"Dollar","Euro"=>"Euro"));
        ?>
    </div>



    <div class="del del-icon col-lg-2" >
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/icons/plus.gif', 'Add'), '#', array(
            'class' => 'plus',
            'onclick' =>
            "
                  
		    u = '" . Yii::app()->controller->createUrl("loadChildByAjax", array("mName" => "$mName", "dir" => $dir, "load_for" => $load_for,)) . "&index=' + " . $relationName . "_index_sc;
                   
                    
                    add_new_child_row(u, '" . $dir . "', '" . $fields_div_id . "', 'grid_fields', true);
                    
                    " . $relationName . "_index_sc++;
                    return false;
                    "
        ));
        ?>
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/icons/cross.gif', 'Delete'), '#', array('onclick' => 'delete_fields(this, 2, "#' . $relationName . '-form", ".grid_fields"); return false;', 'title' => 'sc'));
        ?>
    </div>

    <div class="clear"></div>
</div>
<div class="clear"></div>
