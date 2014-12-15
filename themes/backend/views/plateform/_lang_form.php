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
                Create or Edit Category Languages
                <?php
                $option = array("id" => $id, "related" => "categoryLangs");
                echo CHtml::link("(Add New)", $this->createUrl("/category/view", $option))
                ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-9">
                        <?php
                        if (!empty($model->id)) {
                            $option['related_id'] = $model->id;
                        }
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'category-form',
                            'enableAjaxValidation' => false,
                            'action' => $this->createUrl("/category/view", $option),
                        ));
                        $form->hiddenField($model, "parent_id")
                        ?>

                        <p class="form-group alert alert-info">Fields with <span class="required">*</span> are required.</p>

                        <?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-block alert-danger')); ?>

                        <div class="form-group">
                            <div class="col-lg-2">
                                <?php echo $form->labelEx($model, 'name'); ?>
                            </div>
                            <div class="col-lg-6">
                                <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
                                <?php echo $form->error($model, 'name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-2">
                                <?php echo $form->labelEx($model, 'heading'); ?>
                            </div>
                            <div class="col-lg-8">
                                <?php echo $form->textField($model, 'heading', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
                                <?php echo $form->error($model, 'heading'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-2">
                                <?php echo $form->labelEx($model, 'lang_id'); ?> 
                            </div>
                            <div class="col-lg-6">
                                <?php
                                $criteria = new CDbCriteria();
                                $criteria->addCondition("Lower(name)<>'english'");
                                $languages = array("" => "Select") + CHtml::listData(Language::model()->findAll($criteria), "id", "name");
                                echo $form->dropDownList($model, 'lang_id', $languages, array('class' => 'form-control'));
                                ?>
                                <?php echo $form->error($model, 'lang_id'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-2">
                                <?php echo $form->labelEx($model, 'url'); ?>
                            </div>
                            <div class="col-lg-6">

                                <?php echo $form->textField($model, 'url', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
                                <?php echo $form->error($model, 'url'); ?>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-lg-2">
                                <?php echo $form->labelEx($model, 'meta_title'); ?>
                            </div>
                            <div class="col-lg-6">
                                <?php echo $form->textField($model, 'meta_title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
                                <?php echo $form->error($model, 'meta_title'); ?>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="col-lg-2">
                                <?php echo $form->labelEx($model, 'meta_description'); ?>
                            </div>
                            <div class="col-lg-6">

                                <?php echo $form->textArea($model, 'meta_description', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                                <?php echo $form->error($model, 'meta_description'); ?>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-lg-2">
                                <?php echo $form->labelEx($model, 'description'); ?>
                            </div>
                            <div class="col-lg-6">

                                <?php
                                $this->widget('application.extensions.tinymce.ETinyMce', array(
                                    'editorTemplate' => 'full',
                                    'model' => $model,
                                    'attribute' => 'description',
                                    'options' => array('theme' => 'advanced')));
                                ?>
                                <?php echo $form->error($model, 'description'); ?>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6 input-group-btn">
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn btn-primary")); ?>
                            </div>
                        </div>


                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<!-- form -->