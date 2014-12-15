
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>
<fieldset>
    
    <div class="form-group">

        <?php echo $form->emailField($model, 'username', array("class" => "form-control", "autofocus" => "")); ?>
    </div>
    <div class="form-group">
        
        <?php echo $form->passwordField($model, 'password', array("class" => "form-control", "autofocus" => "")); ?>
    </div>
    <div class="checkbox">
        <label>
            <?php echo $form->checkBox($model, 'rememberMe'); ?>Remember Me
        </label>
    </div>
    <!-- Change this to a button or input when using this as a form -->
    <?php echo CHtml::submitButton('Login', array("class" => "btn btn-lg btn-success btn-block")); ?>
    <div class="clear"></div>
    <?php if ($model->hasErrors()): ?>
    <div class="form-group alert alert-danger" style="margin-top: 15px;">
       <?php echo $form->errorSummary($model); ?> 
    </div>
    <?php endif; ?>
</fieldset>
<?php $this->endWidget(); ?>
