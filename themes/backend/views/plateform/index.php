<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Manage Categories</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
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
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'category-grid',
                        'dataProvider' => $model->search(),
                        'htmlOptions' => array(
                            'class' => 'table-responsive'
                        ),
                        'itemsCssClass' => 'table table-striped table-bordered table-hover',
                        'filter' => $model,
                        'columns' => array(
                            'name',
                            'heading',
                            array(
                                'name' => 'parent',
                                'value' => 'isset($data->parent_cat)?$data->parent_cat->name:""'
                            ),
                            'url',
                            array(
                                'class' => 'CButtonColumn',
                            ),
                        ),
                    ));
                    ?>

                </div>
            </div>
        </div>
    </div> 
</div>    



<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/scripts/jquery.ba-bbq1.js', CClientScript::POS_END);
?>