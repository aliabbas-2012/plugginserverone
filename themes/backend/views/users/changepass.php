<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Change Password</h1>
    </div>
    <div class="col-lg-12">

        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Change Password
            </div>
            <div class="panel-body">

                <div class="col-lg-9">

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'changepassword-form',
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    ));
                    ?>

                    <p class="form-group alert alert-info">
                        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
                    </p>

                    <?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-block alert-danger')); ?>
                    <?php
                    if (Yii::app()->user->hasFlash('success')) {
                        echo "<div class='alert alert-success'>" . Yii::app()->user->getFlash('success') . "</div>";
                    }
                    ?>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'old_pwd', array('class' => 'control-label col-lg-2')); ?>
                        <div class="col-lg-4">
                            <?php echo $form->passwordField($model, 'old_pwd'); ?>
                            <?php echo $form->error($model, 'old_pwd'); ?> 
                        </div>

                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'password', array('class' => 'control-label col-lg-2')); ?>
                        <div class="col-lg-4">
                            <?php echo $form->passwordField($model, 'password'); ?>
                            <?php echo $form->error($model, 'password'); ?>
                        </div>

                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'pwd_repeat', array('class' => 'control-label col-lg-2')); ?>
                        <div class="col-lg-4">
                            <?php echo $form->passwordField($model, 'pwd_repeat'); ?>
                            <?php echo $form->error($model, 'pwd_repeat'); ?>
                        </div>

                        <p class="hint">
                            Passwords must be minimum 6 characters and can contain alphabets, numbers and special characters.
                        </p>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-6 input-group-btn">
                            <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary')); ?>
                        </div>
                    </div>

                    <?php $this->endWidget(); ?>
                </div><!-- form -->
            </div> 

        </div> 
    </div>
</div>