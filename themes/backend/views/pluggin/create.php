<?php
/* @var $this PlugginController */
/* @var $model Pluggin */

$this->breadcrumbs=array(
	'Pluggins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pluggin', 'url'=>array('index')),
	array('label'=>'Manage Pluggin', 'url'=>array('admin')),
);
?>
<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Create Pluggin</h1>
    </div>
    <!--end page header -->
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>