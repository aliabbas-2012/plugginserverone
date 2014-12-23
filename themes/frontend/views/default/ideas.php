<?php
//loading css and js files for own pages
$cs = Yii::app()->clientScript;

$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/idea.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/contact_us.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/ebook_style.css');
?>

<script type="text/javascript">
    $(document).ready(function() {

        var myVar = 'application';
        $("#idea_for").val(myVar);

        $('#book_btn').click(function() {
            $('.right_upper_idea span').hide('slow');
            $('#book_btn').addClass('activ_idea');
            $('#app_btn').removeClass('activ_idea');
            var myVar = 'book';
            $("#idea_for").val(myVar);
        })
        $('#app_btn').click(function() {
            $('.right_upper_idea span').hide('slow');
            $('#app_btn').addClass('activ_idea');
            $('#book_btn').removeClass('activ_idea');
            var myVar = 'application';
            $("#idea_for").val(myVar);
            $(this).css('background:none');
        })

    });


</script>
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
<section id="idea">
    <article>
        <div class="upper_idea">
            <h1>A Chance to Win <b>$500.</b></h1>
            <h2>You Can Make the Difference in Islamic World.</h2>
        </div>
        <div class="lower_idea">
            <div class="left_idea">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/bulb_03.png" />
            </div>
            <span style="color: red; font-size: 15px">
                <?php if ($model->hasErrors()): ?>

                    <?php
                    echo "* These fields cannot be empty (Email ,idea name,Wireframe)";
                endif;
                ?>
            </span>
            <span style="color: gray; font-size: 15px">
                <?php
                if (!Yii::app()->user->hasFlash('idea') && !($model->hasErrors())):
                    echo ' * Fields are Required';
                endif;
                ?>
            </span>
            <?php if (Yii::app()->user->hasFlash('idea')): ?>

                <div class="flash-success" style="color:green">
                    <?php echo '<br/>' . Yii::app()->user->getFlash('idea'); ?>
                </div>

            <?php endif; ?>

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'idea-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>

            <div class="right_idea">
                <div class="right_upper_idea">
                    <?php echo CHtml::button('Applications', array('class' => 'book_btn activ_idea', 'id' => 'app_btn')); ?>
                    <?php echo CHtml::button('Book', array('class' => 'book_btn', 'id' => 'book_btn')); ?>
                    <?php echo $form->hiddenField($model, 'idea_for', array('id' => 'idea_for')); ?>


                    <span>Please Select</span>
                </div>
                <div class="right_middle_idea">
                    <?php //echo $form->textField($model, 'idea_for', array("placeholder" => "Your Email"));   ?>
                    <?php echo $form->textField($model, 'email', array("placeholder" => "Your Email * ")); ?>
                    <?php echo $form->textField($model, 'idea_name', array("placeholder" => "Idea Name * ")); ?>
                    <?php echo $form->textArea($model, 'description', array("placeholder" => "Description")); ?>
                    <?php echo $form->textField($model, 'utility', array("placeholder" => "Utility")); ?>
                    <?php echo $form->textField($model, 'features', array("placeholder" => "Features")); ?>
                    <?php echo $form->textField($model, 'usp', array("placeholder" => "USP")); ?>
                    <?php echo $form->textField($model, 'objective', array("placeholder" => "Objectives")); ?>
                    <?php echo $form->textField($model, 'similar_products', array("placeholder" => "Similar products in the market")); ?>
                    <?php echo CHtml::textField('file','',array('class'=>'wireframe_diagram','id'=>'cv_file_name','placeholder'=>'Wireframe Diagram (pdf or word file) *')); ?>
                    
                    <div class="cv_div">
                        <input type="button" value="choose file to upload" class="choose_file" />
                        <?php echo $form->fileField($model, 'wireframe', array('id' => 'cv_file')); ?>

<!--                        <input type="text" placeholder="Wireframe Diagram (pdf or word file)" class="wireframe_diagram" />
                        <input type="button" value="choose file to upload" class="choose_file" />-->
                    </div>

                    <?php echo CHtml::submitButton('Submit', array("class" => "choose_file")); ?>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
        <div class="lower_idea">
<!--            <h3>Instructions &amp; Guidelines</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>-->
        </div>
    </article>
</section>
 
<script type="text/javascript">
    document.getElementById("cv_file").onchange = function() {
        document.getElementById("cv_file_name").value = this.value;
    };


</script>