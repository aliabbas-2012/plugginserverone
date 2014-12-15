<style>
.left_float_user{}
.left_float_user h1{
    margin-bottom: 0px;
    padding-bottom: 0px;
    font-size: 16px;
    font-weight: bold;
    color: #DD4B39;
    border: none;
}

</style>
<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<div class="pading-bottom-5">
    <div class="left_float_user">
        <h1>Create User</h1>
    </div>    
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>