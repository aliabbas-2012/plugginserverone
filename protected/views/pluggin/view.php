<?php
/* @var $this PlugginController */
/* @var $model Pluggin */

$this->breadcrumbs=array(
	'Pluggins'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Pluggin', 'url'=>array('index')),
array('label'=>'Create Pluggin', 'url'=>array('create')),

);
?>
<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">View Pluggin #<?php echo $model->id; ?></h1>
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
                    <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                    		'id',
		'name',
		'short_title',
		'pluggin_type',
		'plateform_id',
		'url',
                'meta_title',
                    'meta_description',
                            'description',

                    ),
                    )); ?>

                </div>
            </div>
        </div>
    </div>
</div>    
