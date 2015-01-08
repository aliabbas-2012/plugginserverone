<div class="row">
    <div class="col-lg-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
     
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-9">
                        <?php
                        $option = array("m" => "Plans");
                        if (!empty($_GET['id'])) {
                            $option['id'] = $_GET['id'];
                        }
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'plans-form',
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
                            <?php echo $form->labelEx($model, 'name', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'maxlength' => 250)); ?>
                                <?php echo $form->error($model, 'name'); ?>

                            </div>

                        </div><!-- group -->
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'duration', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php echo $form->dropDownList($model, 'duration', $model->duration_types,array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'duration'); ?>

                            </div>

                        </div><!-- group -->


                        </div><!-- group -->

                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6 input-group-btn">



                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary')); ?>
                                or
                                <?php echo CHtml::link(" Cancel",$this->createUrl("/configurations/load", array("m" => "Plans",)),array('class' => 'btn btn-cancel')); ?>
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


