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
	$model->id,
);

$this->menu=array(

	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<div class="pading-bottom-5">
    <div class="left_float_user">
        <h1>View Users #<?php echo $model->id; ?></h1>
    </div>    
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'first_name',
		'last_name',
		'password',
		'email',
		'ip_address',
		'type',
		'is_active',
                'notify_email',
		'activation_key',
		'deleted',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		'activity_log',
	),
)); ?>
