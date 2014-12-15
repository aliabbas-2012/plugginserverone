<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12">
        <!-- Form Elements -->
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-9">

                        <?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
)); ?>\n"; ?>

                        <?php foreach ($this->tableSchema->columns as $column) { ?>
                            <?php
                            if ((!$column->autoIncrement) && !in_array($column->name, $this->notavailableColumns)) {
                                $field = $this->generateInputField($this->modelClass, $column);
                                if (strpos($field, 'password') !== false) {
                                    continue;
                                    ?>
                                    <div class="form-group">
                                        <?php echo "<?php  \$form->label(\$model,'{$column->name}'); ?>\n"; ?>
                                        <div class="col-lg-6">
                                            <?php echo "<?php  " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
                                        </div>

                                    </div>

                                    <?php
                                }
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6 input-group-btn">
                                <?php echo "<?php echo CHtml::submitButton('Search',array('class' => 'btn btn-primary')); ?>\n"; ?>
                            </div>
                        </div>


                        <?php echo "<?php \$this->endWidget(); ?>\n"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    


