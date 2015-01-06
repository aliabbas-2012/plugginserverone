<div class="form wide">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'project-form',
//            'enableAjaxValidation' => true,
    ));
    ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'Sandbox', array('class' => 'control-label col-lg-4')); ?>
        <?php echo $form->dropDownList($model, 'Sandbox', array("1" => "Enabled", "0" => "Disabled")); ?>
        <?php echo $form->error($model, 'Sandbox'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'DeveloperAccountEmail', array('class' => 'control-label col-lg-4')); ?>
        <?php echo $form->textField($model, 'DeveloperAccountEmail'); ?>
        <?php echo $form->error($model, 'DeveloperAccountEmail'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'ApplicationID'); ?>
        <?php echo $form->textField($model, 'ApplicationID'); ?>
        <?php echo $form->error($model, 'ApplicationID'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'APIUsername'); ?>
        <?php echo $form->textField($model, 'APIUsername'); ?>
        <?php echo $form->error($model, 'APIUsername'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'APIPassword'); ?>
        <?php echo $form->textField($model, 'APIPassword'); ?>
        <?php echo $form->error($model, 'APIPassword'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'APISignature'); ?>
        <?php echo $form->textField($model, 'APISignature'); ?>
        <?php echo $form->error($model, 'APISignature'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'APISubject'); ?>
        <?php echo $form->textField($model, 'APISubject'); ?>
        <?php echo $form->error($model, 'APISubject'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'app_account_email'); ?>
        <?php echo $form->textField($model, 'app_account_email'); ?>
        <?php echo $form->error($model, 'app_account_email'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'admin_user_id'); ?>
        <?php
        $adminUsers = CHtml::listData(Users::model()->findAll("type = 'admin'"),'id','username');
        echo $form->dropDownList($model, 'admin_user_id', $adminUsers);
        ?>
        <?php echo $form->error($model, 'admin_user_id'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'comission_rate'); ?>
        <?php echo $form->textField($model, 'comission_rate'); ?>
        <?php echo $form->error($model, 'comission_rate'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'discount_offer_rate'); ?>
        <?php echo $form->textField($model, 'discount_offer_rate'); ?>
        <?php echo $form->error($model, 'discount_offer_rate'); ?>
    </div>


    <div class="row buttons">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'Create New' : 'Update Existing', array('class' => 'btn btn btn-primary'));
        echo " or ";
        echo CHtml::link('Cancel', $this->createUrl('/configurations/payPallSettings', array('id' => 2)));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>