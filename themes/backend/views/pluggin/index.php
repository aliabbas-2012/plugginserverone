<?php
/* @var $this TourController */
/* @var $model Tour */

$this->breadcrumbs = array(
    'Tours' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Tour', 'url' => array('index')),
    array('label' => 'Create Tour', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#tour-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Manage Tours</h1>
    </div>
    <!-- end  page header -->
</div>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    $en_lang = Language::model()->getLanuageId("en", "id");
    ?>
</div><!-- search-form -->
<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="search-button" href="#">Advanced Search</a>            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'tour-grid',
                        'dataProvider' => $model->search(),
                        'htmlOptions' => array(
                            'class' => 'table-responsive'
                        ),
                        'itemsCssClass' => 'table table-striped table-bordered table-hover',
                        'filter' => $model,
                        'columns' => array(
                            'name',
                            'short_title',
                            'tour_type',
                            array(
                                'name' => 'category_id',
                                'value' => 'isset($data->category)?$data->category->name:""'
                            ),
                            array(
                                'header' => 'home Page ',
                                'value' => '$data->getHomePageLink("' . $en_lang->id . '")',
                                "type" => 'raw'
                            ),
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