<?php
/* @var $this TourController */
/* @var $model Tour */

$this->breadcrumbs=array(
	'Tours'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
array('label'=>'List Tour', 'url'=>array('index')),
array('label'=>'Create Tour', 'url'=>array('create')),

);
?>
<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Update Tour <?php echo $model->id; ?></h1>
    </div>
    <!--end page header -->
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>