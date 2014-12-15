<?php ?>

<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Manage Configurations </h1>
    </div>
    <!-- end  page header -->
</div>
<div class="row">
    <div class="col-lg-12" >
        <?php
        $this->renderPartial('//confMisc/_form', array(
            'model' => $model,
            'm' => $m,
        ));
        ?>
    </div><!-- search-form -->
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Items
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'confiItem-grid',
                        'dataProvider' => ConfMisc::model()->search(),
                        'htmlOptions' => array(
                            'class' => 'table-responsive'
                        ),
                        'itemsCssClass' => 'table table-striped table-bordered table-hover',
                        'filter' => $model,
                        'columns' => array(
                            array(
                                'name' => 'title',
                                'value' => '$data->title'
                            ),
                            array(
                                'name' => 'value',
                                'value' => '$data->value'
                            ),
                            array(
                                'class' => 'CButtonColumn',
                                'template' => '{update}',
                                'buttons' => array(
                                    'update' => array(
                                        'url' => 'Yii::app()->controller->createUrl("load",array("id"=>$data->id,"m"=>"Misc","child_id"=>"new"))'
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
<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/scripts/jquery.ba-bbq1.js', CClientScript::POS_END);
?>