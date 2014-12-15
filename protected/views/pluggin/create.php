<?php
/* @var $this TourController */
/* @var $model Tour */

$this->breadcrumbs=array(
	'Tours'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tour', 'url'=>array('index')),
	array('label'=>'Manage Tour', 'url'=>array('admin')),
);
?>
<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Create Tour</h1>
    </div>
    <!--end page header -->
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>