<?php
if (!$model->isNewRecord) {
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
                            $option = array("m" => "Misc");
                            if (!empty($_GET['id'])) {
                                $option['id'] = $_GET['id'];
                            }
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'faq-form',
                                'enableAjaxValidation' => false,
                                'htmlOptions' => array(
                                    'class' => 'form-horizontal'
                                ),
                                'action' => $this->createUrl("load", $option),
                            ));
                            ?>

                            <p class="form-group alert alert-info">
                                <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
                            </p>

                            <?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-block alert-danger')); ?>


                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'title', array('class' => 'control-label col-lg-2')); ?>
                                <div class="col-lg-4">
                                    <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'maxlength' => 250)); ?>
                                    <?php echo $form->error($model, 'title'); ?>

                                </div>

                            </div><!-- group -->


                            <?php
                            if ($model->isNewRecord) {
                                ?>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'param', array('class' => 'control-label col-lg-2')); ?>
                                    <div class="col-lg-4">
                                        <?php echo $form->textField($model, 'param', array('class' => 'form-control', 'maxlength' => 250)); ?>
                                        <?php echo $form->error($model, 'param'); ?>

                                    </div>

                                </div><!-- group -->
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'value', array('class' => 'control-label col-lg-2')); ?>
                                <div class="col-lg-4">

                                    <?php
                                    /**
                                     * PCM: Make this code proper, because if there are multiple dropdowns
                                     * then we have to make array for each of it.
                                     */
                                    if ($model->field_type == "textArea") {
                                        echo $form->textArea($model, 'value', array('class' => 'form-control', 'maxlength' => 250));
                                    } else if ($model->field_type == "dropDown") {

                                        echo $form->dropDownList($model, 'value', $model->paramsOptions[$model->param], array('class' => 'form-control', 'maxlength' => 250));
                                    } else {
                                        echo $form->textField($model, 'value', array('class' => 'form-control', 'maxlength' => 250));
                                    }
                                    ?>
                                    <?php echo $form->error($model, 'value'); ?>

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

    <?php
}


