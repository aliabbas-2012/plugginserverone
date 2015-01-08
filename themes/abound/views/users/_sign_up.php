<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/form.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/sliderlayer/jquery.js");
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/media/css/password_strength.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/media/js/password_strength_plugin.js', CClientScript::POS_END);
?>
<script>
    jQuery(function() {
        jQuery(".password_test").passStrength({
            userid: "#Users_username"
        });
    })

</script>    
<div class="form_container">
    <div class="row_left_form row_center_form row_signup_form" style="min-height: 430px;" >
        <?php
        if (Yii::app()->user->hasFlash('hybrid')) {
            ?>
            <div class="flash-done">
                <?php echo Yii::app()->user->getFlash('hybrid'); ?>
            </div>

        <?php } ?>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'users-form',
            'enableAjaxValidation' => false,
            'enableClientValidation' => false,
        ));
        ?>
        <div class="shipping_address_heading">
            <h2>
                <?php echo Yii::t('common', 'Create Your Account', array(), NULL, "en") ?>
            </h2>
            <div class="clear"></div>
            <article><span>*</span>
                <?php echo Yii::t('common', 'Mandatory Fields', array(), NULL, 'en') ?>
            </article>
        </div>
        <?php //echo CHtml::submitButton($model->isNewRecord ? 'Sign Up' : 'Save', array('class' => 'row_button')); ?>

        <div class="row_input">
            <div class="row_text">
                <article></article>
            </div>
            <div class="row_input_type">
                <div class="errorSummary-custom">
                    <?php echo $form->errorSummary($model); ?>
                </div>
            </div>

        </div>

        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'username'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->textField($model, 'username', array('class' => 'row_text_type')); ?>
            </div>
            <div class="row_text">
                <article><?php // echo $form->error($model, 'username');             ?></article>
            </div>
        </div>


        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'first_name'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->textField($model, 'first_name', array('class' => 'row_text_type')); ?>
            </div>
            <div class="row_text">
                <article><?php // echo $form->error($model, 'first_name');             ?></article>
            </div>
        </div>

        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'last_name'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->textField($model, 'last_name', array('class' => 'row_text_type')); ?>
            </div>
            <div class="row_text">
                <article><?php // echo $form->error($model, 'last_name');             ?></article>
            </div>
        </div>


        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'email'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->textField($model, 'email', array('class' => 'row_text_type')); ?>
            </div>
            <div class="row_text">
                <article><?php //echo $form->error($model, 'email');             ?></article>
            </div>
        </div>



        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'password'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->passwordField($model, 'password', array('class' => 'row_text_type password_test')); ?>
            </div>
            <div class="row_text">
                <article><?php //echo $form->error($model, 'password');             ?></article>
            </div>
        </div>

        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'password2'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->passwordField($model, 'password2', array('class' => 'row_text_type')); ?>
            </div>
            <div class="row_text">
                <article><?php //echo $form->error($model, 'password2');             ?></article>
            </div>
        </div>

        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'paypal_mail'); ?></article>
            </div>
            <div class="row_input_type">
                <?php echo $form->textField($model, 'paypal_mail', array('class' => 'row_text_type')); ?>
            </div>
            <div class="row_text">
                <article><?php // echo $form->error($model, 'paypal_mail');             ?></article>
            </div>
        </div>
        <div class="row_input">
            <div class="row_input_type">
                <?php echo CHtml::submitButton('Sign Up', array('class' => 'row_button submit-btn', 'data-ajax' => 'false')); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>