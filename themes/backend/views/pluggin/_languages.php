<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Tour in Different Languages
                <?php
                $option = array("id" => $id, "related" => "tour_langs");
                echo CHtml::link("(Add New)", $this->createUrl("/tour/createNewLanguage", $option))
                ?>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'tour-grid-langs',
                        'dataProvider' => $languages,
                        'htmlOptions' => array(
                            'class' => 'table-responsive'
                        ),
                        'itemsCssClass' => 'table table-striped table-bordered table-hover',
                        'columns' => array(
                            'name',
                            'short_title',
                            'tour_type',
                            array(
                                'name' => 'lang_id',
                                'value' => 'isset($data->lang)?$data->lang->name:""'
                            ),
                            array(
                                'header' => 'home Page ',
                                'value' => '$data->getHomePageLink($data->lang_id)',
                                "type" => 'raw'
                            ),
                            array(
                                'class' => 'CButtonColumn',
                                'template' => '{update}{delete}',
                                'buttons' => array(
                                    'update' => array(
                                        'url' => 'Yii::app()->controller->createUrl("/tour/createNewLanguage/",array("id"=>$data->tour->id,"related"=>"tour_langs","related_id"=>$data->id))'
                                    ),
                                    'delete' => array(
                                        'url' => 'Yii::app()->controller->createUrl("/tour/delete/",array("id"=>$data->tour->id,"related"=>"tour_langs","related_id"=>$data->id))'
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

