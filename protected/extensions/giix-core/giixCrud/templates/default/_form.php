<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="row">
    <div class="col-lg-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-9">

                        <?php $ajax = ($this->enable_ajax_validation) ? 'true' : 'false'; ?>

                        <?php echo '<?php '; ?>
                        $form = $this->beginWidget('CActiveForm', array(
                        'id' => '<?php echo $this->class2id($this->modelClass); ?>-form',
                        'enableAjaxValidation' => <?php echo $ajax; ?>,
                        'htmlOptions' => array(
                        'class' => 'form-horizontal'
                        )
                        ));
                        <?php echo '?>'; ?>


                        <p class="form-group alert alert-info">
                            <?php echo "<?php echo Yii::t('app', 'Fields with'); ?> <span class=\"required\">*</span> <?php echo Yii::t('app', 'are required'); ?>"; ?>.
                        </p>

                        <?php echo "<?php echo \$form->errorSummary(\$model,'', array('class' => 'alert alert-block alert-danger')); ?>\n"; ?>

                        <?php foreach ($this->tableSchema->columns as $column): ?>
                            <?php if ((!$column->autoIncrement) && !in_array($column->name, $this->notavailableColumns)) { ?>  

                                <div class="form-group">
                                    <?php echo "<?php echo " . $this->generateActiveLabel($this->modelClass, $column) . "; ?>\n"; ?>
                                    <div class="col-lg-4">
                                        <?php echo "<?php " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
                                        <?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?> 
                                    </div>

                                </div><!-- group -->
                            <?php } ?>
                        <?php endforeach; ?>

                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6 input-group-btn">

                                <?php echo "

    <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary')); ?>
     
<?php
\$this->endWidget();
?>\n"; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


