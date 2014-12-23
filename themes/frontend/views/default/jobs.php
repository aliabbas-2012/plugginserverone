<?php
//loading css and js files for own pages
$cs = Yii::app()->clientScript;

$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/jobs.css');

?>


<section id="banner">

    
</section>
<section id="jobs">
    <article>
        <div class="left_job">
        </div>
        <div class="right_job">
            <h1>Want to work for Darussalam?</h1>
            <h2>We are always hiring.</h2>

            <span style="color: #0AC29E; font-size: 15px; margin-left: 40px">
                <?php if ($model->hasErrors()): ?>

                    <?php
                    echo CHtml::errorSummary($model);
                endif;
                ?>
            </span>
            <?php if (Yii::app()->user->hasFlash('jobs')): ?>

                <div class="flash-success" style="color:green">
                    <?php echo '<br/>' . Yii::app()->user->getFlash('jobs'); ?>
                </div>

            <?php endif; ?>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'job-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data', 'data-ajax'=>'false'),
            ));
            ?>
            <div class="upload_cv">
                <?php //echo $form->errorSummary(); ?>
                <p>Please Upload your CV here with Cover Letter</p>
                <?php echo $form->textField($model, 'cv_file_name', array('placeholder' => 'Upload your CV (pdf or word file)', 'id' => 'cv_file_name')); ?>

                <div class="cv_div">
                    
                    <input type="button" value="choose file to upload" style="top:128px" ></input>
                    <?php echo $form->fileField($model, 'cv_file', array('id' => 'cv_file')); ?>
                </div>
                <?php echo CHtml::submitButton('Submit', array("class" => "choose_file")); ?>
            </div>
            <?php $this->endWidget(); ?>
            <div class="lower_job">
<!--                <h3>Instructions &amp; Guidelines</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>-->
            </div>
        </div>
    </article>
</section>
<script type="text/javascript">
    document.getElementById("cv_file").onchange = function() {
        
        document.getElementById("cv_file_name").value = this.value;
    };


</script>