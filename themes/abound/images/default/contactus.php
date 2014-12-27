<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/contact_us.css"); ?>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/contact_us.css" rel="stylesheet">






<div class="contact_us_part">
    <div class="container contact_content">
        <div class="row">
            <div class="col-lg-6">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'contact-form',
                    'enableAjaxValidation'=>false,
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                        
                    ),
                ));
                ?>

                <div class="left_contact">
                    <div class="b">
                        <div class="base1">
                            <div class="base">
                                <div class="camera">
                                </div>
                                <div class="screen">
                                    <div class="contact_us_table">

                                        <h3>Contact Us</h3>
                                         <p>Please contact us in case of any inquiries, suggestions or feedback. We will get back to you as soon as possible.</p>
                                        <div style="margin: 11px 0px 4px 3px;font-size: 12px">
                                            <span style="color: red; ">
                                                <?php if ($model->hasErrors()): ?>
                                                
                                                    <?php
                                                    echo "* These fields cannot be empty";
                                                endif;
                                                ?>
                                            </span>
                                            <span style="color: #0AC29E; ">
                                                <?php
                                                if (!Yii::app()->user->hasFlash('contact') && !($model->hasErrors())):
                                                    echo ' * Fields are Required';
                                                endif;
                                                ?>
                                            </span>
                                            <?php if (Yii::app()->user->hasFlash('contact')): ?>

                                                <span  style="color:green">
                                                    <?php echo Yii::app()->user->getFlash('contact'); ?>
                                                </span>

                                            <?php endif; ?>
                                        </div>
                                       

                                        <?php echo $form->textField($model, 'name', array("placeholder" => "Name * ")); ?>

                                        <?php echo $form->textField($model, 'email', array("placeholder" => "Email * ")); ?>

                                        <?php echo $form->textField($model, 'subject', array("placeholder" => "Enquery Type")); ?>

                                        <?php echo $form->textArea($model, 'body', array("placeholder" => "Message")); ?>
                                        
                                        <div class="check_box_contact">
                                            <h4>
                    
                                                <?php
                    //                        echo CHtml::activeTextField($model, 'name', array("placeholder" => "News Letter ",
                    //                            'style' => '  border: 1px solid #C7C7C7;
                    //                     color: #B9B9B9; font-family: ArnoPro-Regular;
                    //                    font-size: 14px;
                    //                    margin: 5px 0;
                    //                    padding: 5px;
                    //                    width: 98%;'));
                                                ?><br/>
                                                <?php // echo CHtml::CheckBox('', false, array('value' => 'off')); ?>
                                                <?php /*echo $form->CheckBox($model, 'subscriber_status', array('value' => "on", 'uncheckValue' => 'off')); ?>
                                                <?php echo $form->labelEx($model, 'subscriber_status');*/ ?>
                                            </h4>
                                            <p>We always have some exciting news to share.</p>
                                        </div>
                                        <?php $this->widget('CCaptcha', array("buttonOptions" => array("class" => 'g_cp_link',))); ?>
                                        <?php echo $form->textField($model, 'verifyCode', array("class" => "captcha_txt" , "placeholder" => "Captcha *")); ?>
                                        <?php echo CHtml::submitButton('Submit',array('id' => 'form_submit', 'onclick' => 'disableDataAjax()')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right_contact">
                    <a href="javascript:void(0)" class="main_logo">
                        <?php
                        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/pluginserver_responsive.png")
                        ?>

                    </a>
                    <h6 style="text-align:center; font-family: ArnoPro-Regular; color:#000000; font-size:24px; font-weight:bold;">Seo Logica Plugin Server</h6>
                    <p style="text-align:justify; font-family: ArnoPro-Regular; color:#402c20; font-size:12px;">Seo Logica Plugin Server is one of the best plugins providers for different plateforms like, Joomla, WordPress, Druppal etc.</p>
                </div>  
            </div>     
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>

<script>
  function  disableDataAjax(){
      
      jQuery("#contact-form").attr("data-ajax","false");
      jQuery("#contact-form").submit();
        
    }




</script>



