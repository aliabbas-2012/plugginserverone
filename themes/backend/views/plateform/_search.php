<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-9">

                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'action' => Yii::app()->createUrl($this->route),
                            'method' => 'get',
                        ));
                        ?>

                        <div class="form-group">
                            <?php echo $form->label($model, 'name'); ?>
                            <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label($model, 'parent'); ?>
                            <?php
                            $criteria = new CDbCriteria();
                            $criteria->addCondition("parent = 0");

                            $categories = array("" => "Select") + CHtml::listData(Category::model()->findAll($criteria), "id", "name");
                            echo $form->dropDownList($model, 'parent', $categories, array('class' => 'form-control'));
                            ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label($model, 'url'); ?>
                            <?php echo $form->textField($model, 'url', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->label($model, 'meta_title'); ?>
                            <?php echo $form->textField($model, 'meta_title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
                        </div>


                        <div class="form-group">

                            <div class="col-lg-6 input-group-btn">
                                <?php echo CHtml::submitButton('Search', array("class" => "btn btn-primary")); ?>
                            </div>
                        </div>

                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div><!-- search-form -->