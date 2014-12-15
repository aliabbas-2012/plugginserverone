<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(
array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#<?php echo $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<!-- Page-Level CSS -->
<link href="<?php echo "<?php echo Yii::app()->theme->baseUrl; ?>"; ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>
    </div>
    <!-- end  page header -->
</div>

<div class="search-form" style="display:none">
    <?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->
<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
                    'dataProvider'=>$model->search(),
                    'htmlOptions' => array(
                    'class' => 'table-responsive'
                    ),
                    'itemsCssClass' => 'table table-striped table-bordered table-hover',
                    'filter'=>$model,
                    'columns'=>array(
                    <?php
                    $count = 0;
                    foreach ($this->tableSchema->columns as $column) {
                        if (++$count == 6)
                            echo "\t\t/*\n";
                        echo "\t\t'" . $column->name . "',\n";
                    }
                    if ($count >= 6)
                        echo "\t\t*/\n";
                    ?>
                    array(
                    'class'=>'CButtonColumn',
                    ),
                    ),
                    )); ?>

                </div>
            </div>
        </div>
    </div>
</div>    
