<div class="row">
    <div class="col-lg-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Create or Edit Tour Images
                <?php
                $option = array("id" => $id, "related" => "tour_images");
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
                            'id' => 'tour-images-form',
                            'enableAjaxValidation' => false,
                            'action' => $this->createUrl("/tour/view", $option),
                            'htmlOptions' => array(
                                'enctype' => 'multipart/form-data'
                            )
                        ));
                        $form->hiddenField($model, "tour_id")
                        ?>

                        <p class="form-group alert alert-info">Fields with <span class="required">*</span> are required.</p>

                        <?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-block alert-danger')); ?>
                        <div class="col-lg-6">
                            <div class="form-group">

                                <?php echo $form->labelEx($model, 'lang_id', array('class' => 'control-label col-lg-3')); ?> 

                                <div class="col-lg-6">
                                    <?php
                                    $criteria = new CDbCriteria();
                                    $languages = array("" => "Select") + CHtml::listData(Language::model()->findAll($criteria), "id", "name");
                                    echo $form->dropDownList($model, 'lang_id', $languages, array('class' => 'form-control'));
                                    ?>
                                    <?php echo $form->error($model, 'lang_id'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'image_large', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-8">
                                    <?php echo $form->fileField($model, 'image_large', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                    <?php
                                    if (!empty($model->id) && !empty($model->image_large)) {
                                        echo CHtml::link("View Image", $model->image_url["image_large"], array("rel" => "lightbox[_default]","target"=>"blank"));
                                    }
                                    ?>
                                    <?php echo $form->error($model, 'image_large'); ?>

                                </div>

                            </div><!-- group -->


                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'is_default', array('class' => 'control-label col-lg-4')); ?>
                                <div class="col-lg-8">
                                    <?php echo $form->checkBox($model, 'is_default', array('class' => '', 'maxlength' => 150)); ?>
                                    <?php echo $form->error($model, 'is_default'); ?>

                                </div>

                            </div><!-- group -->

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'tag', array('class' => 'control-label col-lg-4')); ?>
                                <div class="col-lg-8">
                                    <?php echo $form->textField($model, 'tag', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'tag'); ?>

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