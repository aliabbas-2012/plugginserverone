<div class="page-header">
    <h1> <small>Ready Four Purchase Plan</small></h1>
</div>
<div class="row-fluid">
    <div class="span10">
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'htmlOptions' => array("class" => 'table table-striped table-hover table-bordered table-condensed'),
            'attributes' => array(
                array(
                    'name' => 'pluggin',
                    'value' => $info->plugin->name,
                    "type" => "raw",
                ),
                array(
                    'name' => 'plan',
                    'value' => $model->plan_rel->name,
                    "type" => "raw",
                ),
                array(
                    'name' => 'price',
                    'value' => $model->price,
                    "type" => "raw",
                ),
                array(
                    'name' => 'currency',
                    'value' => $model->currency,
                    "type" => "raw",
                ),
                array(
                    'name' => 'Purchase',
                    'value' => CHtml::button("Purchase", array(
                        "class" => 'btn',
                        'id'=>'purchase_btn',
                        'url' => $this->createUrl('/web/userPluggin/confirmPurchase'))),
                    "type" => "raw",
                ),
            ),
        ));
        ?>

    </div>    
</div>
<?php
Yii::app()->clientScript->registerScript('purchase_btn_script', "
    alert('hello world');
", CClientScript::POS_READY);
?>