<?php
/* @var $this PlateformController */
/* @var $model Plateform */

$this->breadcrumbs = array(
    'Notifications' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Notifications', 'url' => array('index')),
);
?>
<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Notifications</h1>
    </div>
    <!-- end  page header -->
</div>


<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                   
                    
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'plateform-grid',
                        'dataProvider' => $model->search(),
                        'htmlOptions' => array(
                            'class' => 'table-responsive'
                        ),
                        'itemsCssClass' => 'table table-striped table-bordered table-hover',
                        'filter' => $model,
                        'columns' => array(
                            array(
                                'name' => 'message',
                                'value' => '($data->isview==0)?CHtml::tag("span",array("style"=>"font-weight:bold"),$data->message):$data->message',
                                'type' => 'raw'
                            )
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