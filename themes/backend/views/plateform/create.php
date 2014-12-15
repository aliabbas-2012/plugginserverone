<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Manage Category', 'url' => array('admin')),
);
?>


<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Create Category</h1>
    </div>
    <!--end page header -->
</div>
<?php $this->renderPartial('_form', array('model' => $model)); ?>