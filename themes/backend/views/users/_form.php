<div class="form-group">
    <div class="col-lg-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-10">


                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'users-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>

                        <p class="note">Fields with <span class="required">*</span> are required.</p>

                        <?php echo $form->errorSummary($model); ?>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'username', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php echo isset($model->id) ? CHtml::tag('span', array('size' => 50, 'maxlength' => 50, 'id' => ucfirst($model->tableName()) . "_username", 'name' => ucfirst($model->tableName()) . "[username]"), $model->username) : $form->textField($model, 'username', array('size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($model, 'username'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'first_name', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php echo $form->textField($model, 'first_name', array('size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($model, 'first_name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'last_name', array('class' => 'control-label col-lg-2')); ?>
                            <div class="col-lg-4">
                                <?php echo $form->textField($model, 'last_name', array('size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($model, 'last_name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'email', array('class' => 'control-label col-lg-2')); ?>
                            <?php //echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
                            <?php echo isset($model->id) ? CHtml::tag('span', array('size' => 50, 'maxlength' => 50, 'id' => ucfirst($model->tableName()) . "_email", 'name' => ucfirst($model->tableName()) . "[email]"), $model->email) : $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($model, 'email'); ?>
                        </div>
                        <?php
                        if (!$model->isNewRecord && $this->action->id == "update"):
                            ?>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'is_active'); ?>
                                <div class="col-lg-4">
                                    <?php echo $form->checkBox($model, 'is_active'); ?>
                                    <?php echo $form->error($model, 'is_active'); ?>
                                </div>
                            </div>

                            <?php
                        endif;
                        ?>

                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6 input-group-btn">

                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary')); ?>
                            </div>
                        </div>

                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


