<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);
?>

<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Update Category <?php echo $model->id; ?></h1>
    </div>
    <!--end page header -->
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>