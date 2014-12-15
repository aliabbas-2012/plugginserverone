<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Category in Different Languages
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'category-grid',
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
                                        'url'=>'Yii::app()->controller->createUrl("/category/view/",array("id"=>$data->category->id,"related"=>"categoryLangs","related_id"=>$data->id))'
                                    ),
                                    'delete'=>array(
                                        'url'=>'Yii::app()->controller->createUrl("/category/delete/",array("id"=>$data->category->id,"related"=>"categoryLangs","related_id"=>$data->id))'
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

