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
                            'id' => 'tour-form',
                            'enableAjaxValidation' => false,
                            'htmlOptions' => array(
                                'class' => 'form-horizontal'
                            )
                        ));
                        ?>

                        <p class="form-group alert alert-info">
                            <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
                        </p>

                        <?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-block alert-danger')); ?>



                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'name', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                <?php echo $form->error($model, 'name'); ?>

                            </div>

                        </div><!-- group -->


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'short_title', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php echo $form->textField($model, 'short_title', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                <?php echo $form->error($model, 'short_title'); ?>

                            </div>

                        </div><!-- group -->


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'tour_type', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php
                                $tour_types = array(
                                    "1 day" => "1 day",
                                    "2 day" => "2 day",
                                    "3 day" => "3 day",
                                    "4 day" => "4 day",
                                    "5 day" => "5 day",
                                    "6 day" => "6 day",
                                    "7 day" => "7 day",
                                    "8 day" => "8 day",
                                    "9 day" => "9 day",
                                    "10 day" => "10 day",
                                );
                                ?>
                                <?php echo $form->dropDownList($model, 'tour_type', $tour_types, array('class' => 'form-control', 'maxlength' => 150)); ?>
                                <?php echo $form->error($model, 'tour_type'); ?>

                            </div>

                        </div><!-- group -->


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'category_id', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php
                                $criteria = new CDbCriteria();

                                $categories = array("" => "Select") + CHtml::listData(Category::model()->findAll($criteria), "id", "name");
                                echo $form->dropDownList($model, 'category_id', $categories, array('class' => 'form-control'));
                                ?>
                                <?php echo $form->error($model, 'category_id'); ?>

                            </div>

                        </div><!-- group -->


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'url', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php echo $form->textField($model, 'url', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                <?php echo $form->error($model, 'url'); ?>

                            </div>

                        </div><!-- group -->


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'meta_title', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php echo $form->textField($model, 'meta_title', array('class' => 'form-control', 'maxlength' => 150)); ?>
                                <?php echo $form->error($model, 'meta_title'); ?>

                            </div>

                        </div><!-- group -->


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'meta_description', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php echo $form->textArea($model, 'meta_description', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'meta_description'); ?>

                            </div>

                        </div><!-- group -->


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'short_description', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
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
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'description', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
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


                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6 input-group-btn">



                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary')); ?>

                                <?php
                                $this->endWidget();
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


