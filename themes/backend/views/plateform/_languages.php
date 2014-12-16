<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Plateform in Different Languages
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'plateform-grid',
                        'dataProvider' => $languages,
                        'htmlOptions' => array(
                            'class' => 'table-responsive'
                        ),
                        'itemsCssClass' => 'table table-striped table-bordered table-hover',
                        'columns' => array(
                            'name',
                            array(
                                'name' => 'lang',
                                'value' => 'isset($data->lang)?$data->lang->name:""'
                            ),
                            'url',
                            'meta_title',
                            array(
                                'class' => 'CButtonColumn',
                                'template'=>'{update}{delete}',
                                'buttons'=>array(
                                    'update'=>array(
                                        'url'=>'Yii::app()->controller->createUrl("/plateform/view/",array("id"=>$data->plateform->id,"related"=>"plateformLangs","related_id"=>$data->id))'
                                    ),
                                    'delete'=>array(
                                        'url'=>'Yii::app()->controller->createUrl("/plateform/delete/",array("id"=>$data->plateform->id,"related"=>"plateformLangs","related_id"=>$data->id))'
                                    ),
                                )
                            ),
                        ),
                    ));
                    ?>

                </div>
            </div>
        </div>
    </div> 
</div>    

