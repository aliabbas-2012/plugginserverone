<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/form.css');
    
?>
 <?php
    $login_model = new LoginForm;
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'action' => Yii::app()->createUrl('/web/users/login'),
        'enableClientValidation' => true,
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
?>
<div class="right_user_login">
    <h2>Already have an account?</h2>
    <table>
        <tr>
            <td>
                <table>
                    <?php echo $form->errorSummary($login_model); ?>
                    <tr class="row_input">
                        <td class="row_text">Email</td>
                        <td class="right_login">
                            <?php echo $form->textField($login_model, 'username', array("class" => "login_text")); ?>
                        </td>
                    </tr>
                    <tr class="row_input">
                        <td class="row_text">Password</td>
                        <td class="right_login">
                            <?php echo $form->passwordField($login_model, 'password', $htmlOptions = array("class" => "login_text")); ?>
                            <?php
                            //echo $form->hiddenField($login_model, 'LoginForm');
                            ?>
                        </td>
                    </tr>
                    <tr class="row_input">
                        <td class="left_login"></td>
                        <td class="right_login"><input type="checkbox">
                            <span>Stay signed in 
                                <?php echo CHtml::link('Forgot password?', $this->createUrl('/web/users/forgot',array("data-ajax"=>"false"))); ?>
                            </span>
                        </td>
                    </tr>
                    <tr class="row_input">
                        <td class="left_login"></td>
                        <td class="right_login">
                            <?php echo CHtml::submitButton("Sign In", array("class" => "already_account")); ?>
                        </td>
                    </tr>
                   
                </table>
            </td>
        </tr>
    </table>
    <!--<h2>Sign in with</h2>
    <div id="login_images">
        <div class="login_img">
            <?php
            //echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/facebook_img_03.jpg"), $this->createUrl('/web/hybrid/login/', array("provider" => "facebook")));
            ?>
            <span>Facebook</span>
        </div>
        <div class="login_img">
            <?php
            //echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/linkedin_img_03.jpg"), $this->createUrl('/web/hybrid/login/', array("provider" => "linkedin")));
            ?>
            <span>Linkedin</span>
        </div>
        <div class="login_img">
            <?php
            //echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/twitter_img_03.jpg"), $this->createUrl('/web/hybrid/login/', array("provider" => "twitter")));
            ?>
            <span>Twitter</span>
        </div>
        <div class="login_img">
            <?php
            //echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/google_img_03.jpg"), $this->createUrl('/web/hybrid/login/', array("provider" => "google")));
            ?>
            <span>Google</span>
        </div>
    </div>-->
</div>
 <?php $this->endWidget(); ?>