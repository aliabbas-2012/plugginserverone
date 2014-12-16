<?php
/* @var $this PlugginTourController */
/* @var $model Pluggin */

$this->breadcrumbs=array(
	'Pluggins'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
array('label'=>'List Pluggin', 'url'=>array('index')),
array('label'=>'Create Pluggin', 'url'=>array('create')),

);
?>
<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Update Pluggin <?php echo $model->id; ?></h1>
    </div>
    <!--end page header -->
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>