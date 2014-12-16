<?php
/* @var $this PlateformController */
/* @var $model Plateform */

$this->breadcrumbs=array(
	'Plateforms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Plateform', 'url'=>array('index')),
	array('label'=>'Create Plateform', 'url'=>array('create')),
);
?>

<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Update Plateform <?php echo $model->id; ?></h1>
    </div>
    <!--end page header -->
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>