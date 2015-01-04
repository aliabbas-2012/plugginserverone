
<div class="row">
    <!-- page name -->
    <div class="col-lg-12">
        <h1 class="page-name">Update User Plan Status</h1>
    </div>
    <!--end page name -->
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'user-plan-update-form',
                        'enableAjaxValidation' => false,
                        'htmlOptions' => array(
                            'class' => 'form-horizontal',
                            'enctype' => "multipart/form-data"
                        )
                    ));
                    
                    $drop_down_status = " ".$form->dropDownList($model, 'is_active', 
                            array("1"=>"Enable","0"=>"Disable"),array('class' => 'form-control','style'=>'width:25%'));

                    /* $en_lang = Language::model()->getLanuageId("en", "id"); */
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'htmlOptions' => array("class" => "table table-striped table-bordered table-hover"),
                        'attributes' => array(
                            array(
                                'name' => 'pluggin_plan_id',
                                'value' => $model->plugin_plan->plan_rel->_duration,
                                "type" => "raw",
                            ),
                            array(
                                'name' => 'price',
                                'value' => $model->plugin_plan->price,
                                "type" => "raw",
                            ),
                            array(
                                'name' => 'currency',
                                'value' => $model->plugin_plan->currency,
                                "type" => "raw",
                            ),
                            array(
                                'name' => 'start_date',
                                'value' => $model->_dates["start_date"][0],
                                "type" => "raw",
                            ),
                            array(
                                'name' => 'end_date',
                                'value' => $model->_dates["end_date"][0],
                                "type" => "raw",
                            ),
                            array(
                                'name' => '_running_status',
                                'value' => $model->_running_status,
                                "type" => "raw",
                            ),
                            array(
                                'name' => 'is_active',
                                'value' => $model->_admin_activation.$drop_down_status,
                                "type" => "raw",
                            ),
                            array(
                                'name' => 'create_time',
                                'value' => $model->create_time,
                                "type" => "raw",
                            ),
                        ),
                    ));
                    ?>
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-6 input-group-btn">
                            <?php echo CHtml::submitButton('Update', 
                                    array(
                                        'class' => 'btn btn-primary',
                                        'onclick'=>'if(confirm("Are you sure you want to change Status")){return true;}return false;'
                                        )); ?>
                        </div>
                    </div>
                    <?php
                    $this->endWidget();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>   