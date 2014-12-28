<?php
/* @var $this PlugginController */
/* @var $model Pluggin */

$this->breadcrumbs = array(
    'Pluggins' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Pluggin', 'url' => array('index')),
    array('label' => 'Create Pluggin', 'url' => array('create')),
);


?>

<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Plugin [<?php echo $pluggin->name; ?>] User Plans</h1>
    </div>
    <!-- end  page header -->
</div>


<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">

                <div class="panel-body">
                    <div class="table-responsive">
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            /* 'type'=>'striped bordered condensed', */
                            'itemsCssClass' => 'table table-bordered',
                            'dataProvider' => $model->search(),
                            'id' => 'user_plans',
                            'columns' => array(
                                array(
                                    'name' => 'pluggin_plan_id',
                                    'value' => '$data->plugin_plan->plan_rel->_duration',
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
                                array(
                                    'header' => 'start_date',
                                    'value' => '$data->_dates["start_date"][0]',
                                    "type" => "raw",
                                ),
                                array(
                                    'header' => 'end_date',
                                    'value' => '$data->_dates["end_date"][0]',
                                    "type" => "raw",
                                ),
                                array(
                                    'name' => '_running_status',
                                    'value' => '$data->_running_status',
                                    "type" => "raw",
                                ),
                                array(
                                    'name' => 'is_active',
                                    'value' => '$data->_admin_activation',
                                    "type" => "raw",
                                ),
                                array(
                                    'name' => 'create_time',
                                    'value' => '$data->create_time',
                                    "type" => "raw",
                                ),
                            ),
                        ));
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    
