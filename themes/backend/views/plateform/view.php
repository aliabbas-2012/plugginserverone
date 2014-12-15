<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs = array(
    'Categories' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
);
?>
<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header"><h1>View Category [<?php echo $model->name; ?>]</h1></h1>
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
                            'heading',
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
$criteria->addCondition("parent_id =" . $model->id);
$lang = new CActiveDataProvider('CategoryLang', array(
    'criteria' => $criteria,
        ));

if (count($lang->getTotalItemCount()) > 0) {
    $this->renderPartial("//category/_languages", array("languages" => $lang));
}
?>
<?php $this->renderPartial("//category/_lang_form", array("model" => $model->categoryLangs, "id" => $model->id)); ?>