<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Pluggin in Different Languages
                <?php
                $option = array("id" => $id, "related" => "pluggin_langs");
                echo CHtml::link("(Add New)", $this->createUrl("/pluggin/createNewLanguage", $option))
                ?>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'pluggin-grid-langs',
                        'dataProvider' => $languages,
                        'htmlOptions' => array(
                            'class' => 'table-responsive'
                        ),
                        'itemsCssClass' => 'table table-striped table-bordered table-hover',
                        'columns' => array(
                            'name',
                            'meta_title',
                            'pluggin_type',
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
                                        'url' => 'Yii::app()->controller->createUrl("/pluggin/createNewLanguage/",array("id"=>$data->pluggin->id,"related"=>"pluggin_langs","related_id"=>$data->id))'
                                    ),
                                    'delete' => array(
                                        'url' => 'Yii::app()->controller->createUrl("/pluggin/delete/",array("id"=>$data->pluggin->id,"related"=>"pluggin_langs","related_id"=>$data->id))'
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

