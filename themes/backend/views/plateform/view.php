<?php
/* @var $this PlateformController */
/* @var $model Plateform */

$this->breadcrumbs = array(
    'Plateforms' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Plateform', 'url' => array('index')),
    array('label' => 'Create Plateform', 'url' => array('create')),
);
?>
<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header"><h1>View Plateform [<?php echo $model->name; ?>]</h1></h1>
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
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'htmlOptions' => array("class" => "table table-striped table-bordered table-hover"),
                        'attributes' => array(
                            'name',
                    
                            array(
                                'name' => 'parent',
                                'value' => isset($model->parent_cat) ? $model->parent_cat->name : "",
                                'visible' => isset($model->parent_cat) ? true : false,
                            ),
                            'url',
                            'meta_title',
                            'meta_description',
                            array(
                                'name' => 'description',
                                'value' => $model->description,
                                'type' => 'raw'
                            ),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>    
<div class="clear"></div>
<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/scripts/jquery.ba-bbq1.js', CClientScript::POS_END);
?>
<?php
$criteria = new CDbCriteria();
$criteria->addCondition("parent =" . $model->id);
$lang = new CActiveDataProvider('Plateform', array(
    'criteria' => $criteria,
        ));

if (count($lang->getTotalItemCount()) > 0) {
    $this->renderPartial("//plateform/_languages", array("languages" => $lang));
}
?>
<?php /*$this->renderPartial("//plateform/_lang_form", array("model" => $model->plateform, "id" => $model->id));*/ ?>