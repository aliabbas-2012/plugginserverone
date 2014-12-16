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
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/scripts/jquery.ba-bbq1.js', CClientScript::POS_END);
?>
<div class="clear"></div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <ul class="nav nav-tabs">
                <!--<li class="<?php //echo empty($related) || $related == "pluggin_langs" ? "active" : "" ?>"><a href="#languages" data-toggle="tab">Pluggin Languages</a>
                </li>-->
                <li class="<?php echo $related == "pluggin_images" ? "active" : "" ?>"><a href="#images" data-toggle="tab">Pluggin Images</a>
                </li>

            </ul>

            <div class="tab-content">
                <!--<div class="tab-pane fade in <?php echo empty($related) || $related == "pluggin" ? "active" : "" ?>" id="languages">
                    <?php
                    /*$criteria = new CDbCriteria();
                    $criteria->addCondition("plateform_id =" . $model->id);
                    $lang = new CActiveDataProvider('Pluggin', array(
                        'criteria' => $criteria,
                    ));

                    if (count($lang->getTotalItemCount()) > 0) {
                        $this->renderPartial("//pluggin/_languages", array("languages" => $lang, "id" => $model->id));
                    }*/
                    ?>
                    <?php //$this->renderPartial("//pluggin/_lang_form", array("model" => $model->pluggin_langs, "id" => $model->id)); ?>
                </div>-->
                <div class="tab-pane <?php echo $related == "pluggin_images" ? "active" : "fade" ?>" id="images">
                    <?php
                    $criteria = new CDbCriteria();
                    $criteria->addCondition("pluggin_id =" . $model->id);
                    $images = new CActiveDataProvider('PlugginImage', array(
                        'criteria' => $criteria,
                    ));

                    if (count($images->getTotalItemCount()) > 0) {
                        $this->renderPartial("//pluggin/_imagas", array("images" => $images));
                    }
                    ?>
                    <?php //$this->renderPartial("//pluggin/_image_form", array("model" => $model->pluggin_images, "id" => $model->id)); ?>
                </div>

            </div>
        </div>
    </div>

</div>