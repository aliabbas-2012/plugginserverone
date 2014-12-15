<div class="clear"></div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            View Profile

        </h1>
    </div>
    <!-- Page-Level CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <div class="col-lg-12">

        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                echo CHtml::link("Edit Profile", $this->createUrl("updateProfile"), array('class' => ""));
                ?>
            </div>
            <div class="panel-body">

                <div class="col-lg-9">
                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'htmlOptions' => array("class" => "table table-striped table-bordered table-hover"),
                        'attributes' => array(
                            array(
                                'name' => 'username',
                                'value' => $model->username,
                            ),
                            array(
                                'name' => 'first_name',
                                'value' => !empty($model->first_name) ? $model->first_name : "",
                            ),
                            array(
                                'name' => 'last_name',
                                'value' => !empty($model->last_name) ? $model->last_name : "",
                            ),
                            array(
                                'name' => 'email',
                                'value' => !empty($model->email) ? $model->email : "",
                            ),
                        ),
                    ));
                    ?>

                </div><!-- form -->
            </div> 

        </div> 
    </div>
</div>