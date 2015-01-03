<?php
/* @var $this PlugginController */
/* @var $model Pluggin */

$this->breadcrumbs = array(
    'Pluggins' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Pluggin', 'url' => array('index')),
    array('label' => 'Create Pluggin', 'url' => array('create')),
);
?>
<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">View Pluggin #<?php echo $model->id; ?></h1>
    </div>
    <!--end page header -->
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    /*$en_lang = Language::model()->getLanuageId("en", "id");*/
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'htmlOptions' => array("class" => "table table-striped table-bordered table-hover"),
                        'attributes' => array(
                            'name',
                            'meta_title',
                            array(
                                'name' => 'plateform_id',
                                'value' => isset($model->plateform) ? $model->plateform->name : "",
                                'type' => "raw",
                            ),
                            'url',
                            'meta_title',
                            'meta_description',
                            array(
                                'name' => 'description',
                                'value' => $model->description,
                                'type' => "raw",
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
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/gridform.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/functions.js',  CClientScript::POS_END);
?>
<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/scripts/jquery.ba-bbq1.js', CClientScript::POS_END);
?>
<?php
$this->renderPartial('pluggin_plans/_container', array('model' => $model, "type" => "form"));
$this->renderPartial('pluggin_images/_container', array('model' => $model, "type" => "form"));
$this->renderPartial('user_registered_pluggins/_container', array('model' => $model, "type" => "form"));
?>

