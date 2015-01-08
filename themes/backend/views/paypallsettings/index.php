
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">PayPall Settings </h1>
    </div>
    <!-- end  page header -->
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Form Elements -->
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-9">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'project-form',
                                // 'enableAjaxValidation' => true,
                        ));
                        ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Sandbox', array('class' => 'control-label col-lg-4')); ?>
                            <div class="col-lg-8">
                                <?php echo $form->dropDownList($model, 'Sandbox', array("1" => "Enabled", "0" => "Disabled"), array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'Sandbox'); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'DeveloperAccountEmail', array('class' => 'control-label col-lg-4')); ?>
                            <div class="col-lg-8"><?php echo $form->textField($model, 'DeveloperAccountEmail', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'DeveloperAccountEmail'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'ApplicationID', array('class' => 'control-label col-lg-4')); ?>
                            <div class="col-lg-8"> <?php echo $form->textField($model, 'ApplicationID', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'ApplicationID'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'APIUsername', array('class' => 'control-label col-lg-4')); ?>
                            <div class="col-lg-8"><?php echo $form->textField($model, 'APIUsername', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'APIUsername'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'APIPassword', array('class' => 'control-label col-lg-4')); ?>
                            <div class="col-lg-8"><?php echo $form->textField($model, 'APIPassword', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'APIPassword'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'APISignature', array('class' => 'control-label col-lg-4')); ?>
                            <div class="col-lg-8"><?php echo $form->textField($model, 'APISignature', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'APISignature'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'APISubject', array('class' => 'control-label col-lg-4')); ?>
                            <div class="col-lg-8"><?php echo $form->textField($model, 'APISubject', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'APISubject'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'app_account_email', array('class' => 'control-label col-lg-4')); ?>
                            <div class="col-lg-8">
                                <?php echo $form->textField($model, 'app_account_email', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'app_account_email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'admin_user_id', array('class' => 'control-label col-lg-4')); ?>
                            <div class="col-lg-8">
                                <?php
                                $adminUsers = CHtml::listData(Users::model()->findAll("type = 'admin'"), 'id', 'username');
                                echo $form->dropDownList($model, 'admin_user_id', $adminUsers, array('class' => 'form-control'));
                                echo $form->hiddenField($model, 'discount_offer_rate', array("value" => 0));
                                ?>
                                <?php echo $form->error($model, 'admin_user_id'); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6 input-group-btn">
                                <?php
                                echo CHtml::submitButton($model->isNewRecord ? 'Create New' : 'Update Existing', array('class' => 'btn btn btn-primary'));
                                echo " or ";
                                echo CHtml::link('Cancel', $this->createUrl('/configurations/payPallSettings', array('id' => 2)));
                                ?>
                            </div>

                        </div>
                        <?php $this->endWidget(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>