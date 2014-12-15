<?php
/* @var $this TourController */
/* @var $model Tour */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12">
        <!-- Form Elements -->
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-9">

                        <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6 input-group-btn">
                                <?php echo CHtml::submitButton('Search',array('class' => 'btn btn-primary')); ?>
                            </div>
                        </div>


                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    


