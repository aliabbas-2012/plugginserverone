<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Tour Images
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'tour-img-grid',
                        'dataProvider' => $images,
                        'htmlOptions' => array(
                            'class' => 'table-responsive'
                        ),
                        'itemsCssClass' => 'table table-striped table-bordered table-hover',
                        'columns' => array(
                            array(
                                'name' => 'lang_id',
                                'value' => 'isset($data->lang)?$data->lang->name:""'
                            ),
                            array(
                                'name' => 'image_small',
                                'value' => 'CHtml::link($data->image_small,$data->image_url["image_large"],array("target"=>"blank","rel" => "lightbox[_default]"))',
                                "type" => "raw",
                            ),
                            array(
                                'name' => 'image_large',
                                'value' => '$data->image_large',
                                "type" => "raw",
                            ),
                            array(
                                'name' => 'tag',
                                'value' => '$data->tag',
                                "type" => "raw",
                            ),
                            array(
                                'name' => 'is_default',
                                'value' => '$data->is_default==1?"Yes":"No"',
                                "type" => "raw",
                            ),
                            array(
                                'class' => 'CButtonColumn',
                                'template' => '{update}{delete}',
                                'buttons' => array(
                                    'update' => array(
                                        'url' => 'Yii::app()->controller->createUrl("/tour/view/",array("id"=>$data->tour->id,"related"=>"tour_images","related_id"=>$data->id))'
                                    ),
                                    'delete' => array(
                                        'url' => 'Yii::app()->controller->createUrl("/tour/delete/",array("id"=>$data->tour->id,"related"=>"tour_images","related_id"=>$data->id))'
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

