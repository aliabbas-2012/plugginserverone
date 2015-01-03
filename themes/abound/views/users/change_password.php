<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/login_style.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'password-change-form',
    'enableClientValidation' => TRUE,
        ));
?>
<div class="form_container">
    <div class="row_left_form row_center_form">
        <div class="shipping_address_heading">
            <h2>Change Password</h2>
            <div class="clear"></div>
            <div id='error' style="color: red">
                <?php echo $form->errorSummary($model); ?>
            </div>
        </div>


        <div class="row_input">
            <div class="row_text">
                <article>
                    <?php echo $form->labelEx($model, 'old_pwd'); ?>
                </article>
            </div>
            <div class="row_input_type">
                <?php echo $form->passwordField($model, 'old_pwd', array("class" => "text")); ?>
            </div>
        </div>

        <div class="row_input">
            <div class="row_text">
                <article>
                    <?php echo $form->labelEx($model, 'password'); ?>
                </article>
            </div>
            <div class="row_input_type">
                <?php echo $form->passwordField($model, 'password', array('class' => 'text')); ?>
            </div>
        </div>
        <div class="row_input">
            <div class="row_text">
                <article>
                    <?php echo $form->labelEx($model, 'pwd_repeat'); ?>
                </article>
            </div>
            <div class="row_input_type">
                <?php echo $form->passwordField($model, 'pwd_repeat', array('class' => 'text')); ?>
            </div>
        </div>
        <div class="row_input">

            <?php
            echo CHtml::submitButton('Submit', array("class" => "btn"));
            ?>
        </div>


    </div>

</div>
<?php $this->endWidget(); ?>