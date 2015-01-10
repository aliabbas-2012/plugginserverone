<?php
/* @var $this BspOrderController */
/* @var $model BspOrder */

$this->breadcrumbs = array(
    'Payments',
);

$this->PcmWidget['filter'] = array('name' => 'ItstLeftFilter',
    'attributes' => array(
        'model' => $model,
        'filters' => $this->filters,
        'keyUrl' => true,
        'action' => Yii::app()->createUrl($this->route),
        'grid_id' => 'payment-grid',
        "view" => "paymentNotifications"
        ));
?>
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Payment History</h1>
    </div>
    <!-- end  page header -->
</div>

<?php
if (Yii::app()->user->hasFlash('error')) {
    echo "<span class='alert alert-error'>" . Yii::app()->user->getFlash('error') . "</span>";
    echo CHtml::tag("div", array('class' => "clear"), false);
}
if (Yii::app()->user->hasFlash('success')) {
    echo "<span class='alert alert-success'>" . Yii::app()->user->getFlash('success') . "</span>";
    echo CHtml::tag("div", array('class' => "clear"), false);
}
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'admin-payment-form',
        ));
?>
<p class="note">
    <?php
    echo $form->hiddenField($transfer_Model, "flag", array("value" => "1"));
    echo $form->error($transfer_Model, 'selection');
    ?>
</p>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'payment-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'itemsCssClass' => 'table table-striped table-bordered table-hover',
    'pager' => array(
        'cssFile' => '',
    ),
    'columns' => array(
        array(
            'name' => 'plan_id',
            "type" => "raw",
            'value' => '!empty($data->user_plan)?CHtml::link($data->user_plan->plugin_plan->plan_rel->_duration,Yii::app()->controller->createUrl("/pluggin/plans",array("info_id"=>$data->user_plan->pluggin_site_info_id,"pluggin_id"=>$data->user_plan->plugin_plan->pluggin_id))):""',
        ),
        array('name' => 'buyer_id', 'value' => '!empty($data->buyer)?$data->buyer->name:""',),
        array('name' => 'seller_id', 'value' => '!empty($data->seller)?$data->seller->name:""',),
        array('name' => 'amount', 'value' => '$data->amount',),
        'payment_status',
    ),
));


$this->endWidget();
?>
