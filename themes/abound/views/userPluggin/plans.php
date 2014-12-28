<div class="page-header">
    <h1> <small>Your Plans for this Plugin (<?php echo $model->name; ?>)</small></h1>
</div>
<div class="row-fluid">
    <div class="span10">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => "Your Plans for this Plugin (" . $model->name . ")",
        ));
        ?>

        <?php
        $criteria = new CDbCriteria;
        $criteria->compare('pluggin_site_info_id', $info_id, false);
        $dataProvider = new CActiveDataProvider('UserPlans', array(
            'criteria' => $criteria,
        ));
        ?>
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            /* 'type'=>'striped bordered condensed', */
            'itemsCssClass' => 'table table-bordered',
            'dataProvider' => $dataProvider,
            'id' => 'user_plans',
            'columns' => array(
                array(
                    'name' => 'pluggin_plan_id',
                    'value' => '$data->plugin_plan->plan',
                    "type" => "raw",
                ),
                array(
                    'header' => 'price',
                    'value' => '$data->plugin_plan->price',
                    "type" => "raw",
                ),
                array(
                    'header' => 'currency',
                    'value' => '$data->plugin_plan->currency',
                    "type" => "raw",
                ),
            ),
        ));
        ?>
        <?php $this->endWidget(); ?>
    </div>

</div>
<div class="page-header">
    <h1> <small>Other Available Plans</small></h1>
</div>
<div class="row-fluid">
    <div class="span10">
        <?php
        $criteria = new CDbCriteria;
        $criteria->compare('pluggin_id', $model->id, false);
        $dataProvider = new CActiveDataProvider('PlugginPlans', array(
            'criteria' => $criteria,
        ));
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => "Other Available Plans",
        ));
        ?>

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            /* 'type'=>'striped bordered condensed', */
            'itemsCssClass' => 'table table-bordered',
            'dataProvider' => $dataProvider,
            'id' => 'available_plans',
            'columns' => array(
                array(
                    'name' => 'plan',
                    'value' => '$data->plan_rel->name',
                    "type" => "raw",
                ),
                array(
                    'name' => 'price',
                    'value' => '$data->price',
                    "type" => "raw",
                ),
                array(
                    'name' => 'currency',
                    'value' => '$data->currency',
                    "type" => "raw",
                ),
                array(
                    'header' => 'Purchase',
                    'value' => 'CHtml::link("Purchase",Yii::app()->controller->createUrl("/web/userPluggin/purchase",array("id"=>$data->id,"info"=>"'.$info_id.'")))',
                    "type" => "raw",
                ),
            ),
        ));
        ?>
        <?php $this->endWidget(); ?>
    </div>

</div>