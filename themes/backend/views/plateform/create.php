<?php
/* @var $this PlateformController */
/* @var $model Plateform */

$this->breadcrumbs = array(
    'Plateforms' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Plateform', 'url' => array('index')),
    array('label' => 'Manage Plateform', 'url' => array('admin')),
);
?>


<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Create Plateform</h1>
    </div>
    <!--end page header -->
</div>
<?php $this->renderPartial('_form', array('model' => $model)); ?>