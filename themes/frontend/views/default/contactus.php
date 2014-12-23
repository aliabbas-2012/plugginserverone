<?php
//loading css and js files for own pages
$cs = Yii::app()->clientScript;

$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/ebook_style.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/contact_us.css');
?>

<section id="banner">
    <article>
        <?php
        $criteria = new CDbCriteria();
        $criteria->limit = 2;
        $categories = Category::model()->findAll($criteria);
        $count = 0;
        foreach ($categories as $cat):
            if ($count == 0) {
                $this->renderPartial("//product/_apps_banner", array("cat" => $cat));
            } else if ($count == 1) {
                $this->renderPartial("//product/_ebooks_banner", array("cat" => $cat));
            }
            $count++;
        endforeach;
        ?>
    </article>
</section>
<section id="content">
    <article>
        <div class="contact_us_part">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'contact-form',
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
                                    <div style="margin: -11px 0px 4px 3px;font-size: 12px">
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
                                    <p>Please contact us in case of any inquiries, suggestions or feedbacks We will get back to you as soon as possible.</p>

                                    <?php echo $form->textField($model, 'name', array("placeholder" => "Name * ")); ?>

                                    <?php echo $form->textField($model, 'email', array("placeholder" => "Email * ")); ?>

                                    <?php echo $form->textField($model, 'subject', array("placeholder" => "App Type (E-book, App)")); ?>

                                    <?php echo $form->textArea($model, 'body', array("placeholder" => "Message")); ?>
                                    <?php $this->widget('CCaptcha', array("buttonOptions" => array("class" => 'g_cp_link'))); ?>
                                    <?php echo $form->textField($model, 'verifyCode', array("class" => "captcha_txt")); ?>
                                    <?php echo CHtml::submitButton('Submit', array("class" => "")); ?>

                                </div>
                            </div>
                            <div class="button">
                                <div class="button1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right_contact">
                <a href="javascript:void(0)" class="main_logo">
                    <?php
                    echo CHtml::image(Yii::app()->theme->baseUrl . "/images/darussalam_main_logo_03.png")
                    ?>

                </a>
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
                        <?php echo $form->CheckBox($model, 'subscriber_status', array('value' => "on", 'uncheckValue' => 'off')); ?>
                        <?php echo $form->labelEx($model, 'subscriber_status'); ?>
                    </h4>
                    <p>We always have some exiting news to share.</p>
                </div>
                <?php echo Chtml::submitButton('Submit', array('id' => 'form_submit', 'onclick' => 'jQuery("#contact-form").submit()')); ?>

                <?php
                echo CHtml::image(Yii::app()->theme->baseUrl . "/images/contact_us_design_03.png", '', array("class" => "contact_design"));
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </article>
</section>


