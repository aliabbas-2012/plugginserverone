<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/form.css');

?>
   
<div class="form_container">
    <div class="row_left_form row_center_form row_signup_form" style="min-height: 430px;" >
 
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'users-form',
            'enableAjaxValidation' => false,
            'enableClientValidation' => false,
        ));
        ?>
 
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
               <?php echo isset($model->id) ? CHtml::tag('span',array('size'=>50,'maxlength'=>50,'id'=>  ucfirst($model->tableName())."_username",'name'=>ucfirst($model->tableName())."[username]"),$model->username) : $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
            </div>
            <div class="row_text">
                
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
               
            </div>
        </div>

        <div class="row_input">
            <div class="row_text">
                <article><?php echo $form->labelEx($model, 'email'); ?></article>
            </div>
            <div class="row_input_type">
                 <?php echo isset($model->id) ? CHtml::tag('span',array('size'=>50,'maxlength'=>50,'id'=>ucfirst($model->tableName())."_email",'name'=>ucfirst($model->tableName())."[email]"),$model->email) : $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
            </div>
            <div class="row_text">
               
            </div>
        </div>


        <div class="row_input">
            <div class="row_input_type">
                <?php echo CHtml::submitButton('Sign Up', array('class' => 'btn','data-ajax'=>'false')); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>