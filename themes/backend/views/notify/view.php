<?php
/* @var $this PlateformController */
/* @var $model Plateform */

$this->breadcrumbs = array(
    'Notifications' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Notifications', 'url' => array('index')),
);
?>
<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        Detail Page
    </div>
    <!--end page header -->
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'htmlOptions' => array("class" => "table table-striped table-bordered table-hover"),
                        'attributes' => array(
                       
                            array(
                                'name' => 'message',
                                'value' => $model->message,
                                'type' => 'raw'
                            ),
                            array(
                                'name' => 'user_plan_id',
                                'value' => isset($model->user_plan)?CHtml::link($model->user_plan->plugin_plan->plan_rel->_duration,$this->createUrl("/pluggin/editPlansStatus/",array("id"=>$model->user_plan->id))):"",
                                'type' => 'raw'
                            ),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>    
<div class="clear"></div>
