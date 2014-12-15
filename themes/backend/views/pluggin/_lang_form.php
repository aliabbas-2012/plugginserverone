<div class="row">
    <div class="col-lg-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Create or Edit Tour Languages
                <?php
                $option = array("id" => $id, "related" => "tour_langs");
                echo CHtml::link("(Add New)", $this->createUrl("/tour/view", $option))
                ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        if (!empty($model->id)) {
                            $option['related_id'] = $model->id;
                        }
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'tour-lang-form',
                            'enableAjaxValidation' => false,
                            'action' => $this->createUrl("/tour/createNewLanguage", $option),
                        ));
                        $form->hiddenField($model, "parent_id")
                        ?>

                        <p class="form-group alert alert-info">Fields with <span class="required">*</span> are required.</p>

                        <?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-block alert-danger')); ?>
                        <div class="col-lg-6">
                            <div class="form-group">

                                <?php echo $form->labelEx($model, 'lang_id', array('class' => 'control-label col-lg-3')); ?> 

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
                                <?php echo $form->labelEx($model, 'name', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-8">
                                    <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                    <?php echo $form->error($model, 'name'); ?>

                                </div>

                            </div><!-- group -->

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'url', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-8">
                                    <?php echo $form->textField($model, 'url', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                    <?php echo $form->error($model, 'url'); ?>

                                </div>

                            </div><!-- group -->

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'meta_description', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-8">
                                    <?php echo $form->textArea($model, 'meta_description', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'meta_description'); ?>

                                </div>

                            </div><!-- group -->


                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'short_title', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-8">
                                    <?php echo $form->textField($model, 'short_title', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                    <?php echo $form->error($model, 'short_title'); ?>

                                </div>

                            </div><!-- group -->

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'meta_title', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-8">
                                    <?php echo $form->textField($model, 'meta_title', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                    <?php echo $form->error($model, 'meta_title'); ?>

                                </div>

                            </div><!-- group -->

                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'short_description', array('class' => 'control-label col-lg-2')); ?>
                                <div class="col-lg-10">
                                    <?php
                                    $this->widget('application.extensions.tinymce.ETinyMce', array(
                                        'editorTemplate' => 'full',
                                        'model' => $model,
                                        'attribute' => 'short_description',
                                        'options' => array('theme' => 'advanced')));
                                    ?>
                                    <?php echo $form->error($model, 'short_description'); ?>

                                </div>

                            </div><!-- group -->
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'description', array('class' => 'control-label col-lg-2')); ?>
                                <div class="col-lg-10">
                                    <?php
                                    $this->widget('application.extensions.tinymce.ETinyMce', array(
                                        'editorTemplate' => 'full',
                                        'model' => $model,
                                        'attribute' => 'description',
                                        'options' => array('theme' => 'advanced')));
                                    ?>
                                    <?php echo $form->error($model, 'description'); ?>

                                </div>

                            </div><!-- group -->
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