<?php
$dir = "pluggin_plans";
$fields_div_id = $dir . '_fields';
$heading = "Pluggin Plans";
$mName = "PlugginPlans";

/* when page is rediretc it contains #relation name use same name to go at that child at page */
$relationName = $dir;
echo '<a name="' . $relationName . '"></a>';

$plusImage = "<div class='col-lg-1' style='padding-top:10px'>" .
        CHtml::image(Yii::app()->theme->baseUrl . '/images/icons/plus.gif', 'bingo', array('class' => 'rotate_iamge', 'id' => $relationName . '-plus', 'class' => 'plus')) .
        "</div>";
if (!isset($_POST[$mName])) {
    $criteria = new CDbCriteria();
    $criteria->select = "id";
    $criteria->limit = 1;
    $plateforms = ConfPlans::model()->findAll($criteria);
    $m = array();
    foreach ($plateforms as $pl) {
        $plM = new PlugginPlans;
        $plM->plan = $pl->id;
        $m[] = $plM;
    }

    $model->$relationName = $m;
}
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
            echo CHtml::link('Add New', '#', array(
                'onclick' => "
              
                    u = '" . $this->createUrl("loadChildByAjax", array("mName" => "$mName", "dir" => $dir, "load_for" => $this->action->id,)) . "&index=' +  " . $relationName . "_index_sc;

                    add_new_child_row(u, '" . $dir . "', '" . $fields_div_id . "', 'grid_fields', true);
                    jQuery('#" . $relationName . "-plus').attr('class', 'plus_rotate');
              
                     
                    " . $relationName . "_index_sc++;
                   
                    return false;
                    ", "class" => "plus_bind add_new"
            ))
            ?>
        </div>
        <div class="clear"></div>
    </div>

    <?php
    /* Hide or show this div */
    $basic_feature_div = "none";
    if (isset($_POST[$mName]) || ($this->action->id == 'create' && count($model->$relationName) > 0)) {
        $basic_feature_div = "block";
    }

    $relateModelobj = new $mName;
    ?>
    <div id="<?php echo $relationName ?>-form" class="subform" style="display:<?php echo $basic_feature_div; ?>">
        <div class="main">
            <!--        <div class="head">Field Force Labors</div>-->
            <div class="form_body">
                <div class="grid_title col-lg-12">
                    <div class="title col-lg-5" ><?php echo CHtml::activeLabelEx($relateModelobj, 'plan'); ?></div>
                    <div class="title col-lg-3" ><?php echo CHtml::activeLabelEx($relateModelobj, 'price'); ?></div>
                    <div class="title col-lg-2" ><?php echo CHtml::activeLabelEx($relateModelobj, 'currency'); ?></div>


                </div>
                <div class="clear"></div>
                <?php
                /* If type is form then set form html tag */
                if ($type == "form") {
                    /* Start Form */
                    $form = $this->beginWidget('CActiveForm', array(
                        'action' => '#' . $relationName,
                        'id' => $relationName,
                        'enableAjaxValidation' => true,
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    ));
                }
                ?>
                <div id="<?php echo $fields_div_id; ?>" class="form">
                    <?php
                    /* for loading with js */
                    $relationName_index_sc = -1;
                    if (isset($_POST[$mName]) || ($this->action->id == 'create' && count($model->$relationName) > 0)) {
                        foreach ($model->$relationName as $key => $relationModel) {

                            $this->renderPartial($dir . '/_fields_row', array('index' => $key, 'model' => $relationModel,
                                "load_for" => $this->action->id,
                                'display' => 'block',
                                'dir' => $dir,
                                'fields_div_id' => $fields_div_id));
                            $relationName_index_sc = $key;
                        }
                    }
                    ?>

                </div>

                <?php
                /* End form */
                if ($type == "form") {
                    ?>
                    <div class="form submit-btn-div">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn')); ?>
                        or
                        <?php
                        echo CHtml::link('Cancel', '#', array('onClick' => "
                                jQuery(this).parent().parent().parent().parent().parent().animate({opacity: 1, left: '+=50', height: 'toggle'}, 500,
                                    function() {
                                        jQuery('#" . $fields_div_id . "').html('');
                                    });

                                        return false;"));
                        ?>
                    </div>
                    <div class='clear'></div>
                    <?php
                    $this->endWidget();
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    /* Load grid if page is open in detail view mode */
    if ($this->action->id == "view") {
        $this->renderPartial($dir . "/_grid", array('model' => $model, "dir" => $dir,));
    }

    /* Only need when new record is being created. so that's why it is in this if. */
    Yii::app()->clientScript->registerScript($relationName . '_sc_script_define', $relationName . "_index_sc =  " . $relationName_index_sc . " + 1;
                add_mode = true;", CClientScript::POS_HEAD
    );
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
