<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Home Page setting</h1>
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'tour-images-form',
                            'enableAjaxValidation' => false,
                            'htmlOptions' => array(
                                'enctype' => 'multipart/form-data'
                            )
                        ));
                        ?>

                        <p class="form-group alert alert-info">Fields with <span class="required">*</span> are required.</p>

                        <?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-block alert-danger')); ?>
                        <div class="col-lg-12">
                            <div class="form-group">

                                <?php echo $form->labelEx($model, 'object_type', array('class' => 'control-label col-lg-3')); ?> 

                                <div class="col-lg-6">
                                    <?php
                                    echo $form->hiddenField($model, "object_type");
                                    if ($model->object_type == "tour") {
                                        echo Tour::model()->find($model->id)->name;
                                        echo " --- ";
                                    } else if ($model->object_type == "diary") {
                                        echo MotoDairy::model()->find($model->id)->title;
                                        echo " --- ";
                                    }
                                    echo $model->object_type;
                                    ?>
                                    <?php echo $form->error($model, 'object_type'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">

                                <?php echo $form->labelEx($model, 'lang_id', array('class' => 'control-label col-lg-3')); ?> 

                                <div class="col-lg-6">
                                    <?php
                                    $criteria = new CDbCriteria();
                                    $languages = CHtml::listData(Language::model()->findAll($criteria), "id", "name");
                                    echo $form->hiddenField($model, "lang_id");
                                    echo $languages[$model->lang_id];
                                    ?>
                                    <?php echo $form->error($model, 'lang_id'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'image_large', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-6">
                                    <?php echo $form->fileField($model, 'image_large', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                    <?php
                                    if (!empty($model->id) && !empty($model->image_large)) {
                                        echo CHtml::link("View Image", $model->image_url["image_large"], array("rel" => "lightbox[_default]", "target" => "blank"));
                                    }
                                    ?>
                                    <?php echo $form->error($model, 'image_large'); ?>

                                </div>

                            </div><!-- group -->


                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'name', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-6">
                                    <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                    <?php echo $form->error($model, 'name'); ?>

                                </div>

                            </div><!-- group -->

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'short_description', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-6">
                                    <?php echo $form->textField($model, 'short_description', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                    <?php echo $form->error($model, 'short_description'); ?>

                                </div>

                            </div><!-- group -->
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'alt', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-6">
                                    <?php echo $form->textField($model, 'alt', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                    <?php echo $form->error($model, 'alt'); ?>

                                </div>

                            </div><!-- group -->

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'title', array('class' => 'control-label col-lg-3')); ?>
                                <div class="col-lg-6">
                                    <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                    <?php echo $form->error($model, 'title'); ?>

                                </div>

                            </div><!-- group -->
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'description', array('class' => 'control-label col-lg-3')); ?>
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