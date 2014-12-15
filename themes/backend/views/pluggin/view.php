<?php
/* @var $this TourController */
/* @var $model Tour */

$this->breadcrumbs = array(
    'Tours' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Tour', 'url' => array('index')),
    array('label' => 'Create Tour', 'url' => array('create')),
);
?>
<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">View Tour #<?php echo $model->id; ?></h1>
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
                    $en_lang = Language::model()->getLanuageId("en", "id");
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'htmlOptions' => array("class" => "table table-striped table-bordered table-hover"),
                        'attributes' => array(
                            'name',
                            'short_title',
                            'tour_type',
                            array(
                                'name' => 'category_id',
                                'value' => isset($model->category) ? $model->category->name : "",
                                'type' => "raw",
                            ),
                            array(
                                'name' => 'home Page',
                                'value' => $model->getHomePageLink($en_lang->id),
                                'type' => "raw",
                            ),
                            'url',
                            'meta_title',
                            'meta_description',
                            array(
                                'name' => 'short_description',
                                'value' => $model->short_description,
                                'type' => "raw",
                            ),
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
                <li class="<?php echo empty($related) || $related == "tour_langs" ? "active" : "" ?>"><a href="#languages" data-toggle="tab">Tour Languages</a>
                </li>
                <li class="<?php echo $related == "tour_images" ? "active" : "" ?>"><a href="#images" data-toggle="tab">Tour Images</a>
                </li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in <?php echo empty($related) || $related == "tour_langs" ? "active" : "" ?>" id="languages">
                    <?php
                    $criteria = new CDbCriteria();
                    $criteria->addCondition("parent_id =" . $model->id);
                    $lang = new CActiveDataProvider('TourLang', array(
                        'criteria' => $criteria,
                    ));

                    if (count($lang->getTotalItemCount()) > 0) {
                        $this->renderPartial("//tour/_languages", array("languages" => $lang, "id" => $model->id));
                    }
                    ?>
                    <?php //$this->renderPartial("//tour/_lang_form", array("model" => $model->tour_langs, "id" => $model->id)); ?>
                </div>
                <div class="tab-pane <?php echo $related == "tour_images" ? "active" : "fade" ?>" id="images">
                    <?php
                    $criteria = new CDbCriteria();
                    $criteria->addCondition("tour_id =" . $model->id);
                    $images = new CActiveDataProvider('TourImage', array(
                        'criteria' => $criteria,
                    ));

                    if (count($images->getTotalItemCount()) > 0) {
                        $this->renderPartial("//tour/_imagas", array("images" => $images));
                    }
                    ?>
                    <?php $this->renderPartial("//tour/_image_form", array("model" => $model->tour_images, "id" => $model->id)); ?>
                </div>

            </div>
        </div>
    </div>

</div>