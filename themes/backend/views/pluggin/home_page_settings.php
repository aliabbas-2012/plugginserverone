<!-- Page-Level CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Manage Moto Dairies</h1>
    </div>
    <!-- end  page header -->
</div>


<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                All Home Page Settings

            </div>
            <div class="col-lg-12">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="row">
                            <ul class="nav nav-tabs nav-list">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="row">
                            <?php
                            $dataProiver = new CActiveDataProvider('HomePageItems', array(
                            ));
                            if ($dataProiver->itemCount > 0):
                                foreach ($dataProiver->getData() as $data):
                                    ?>
                                    <!--Default Pannel, Primary Panel And Success Panel   -->
                                    <div class="col-lg-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <?php
                                                echo $data->getHomePageLink($data->lang_id, $data->object_type);
                                                ?>
                                            </div>

                                            <div class="panel-body">
                                                <?php
                                                echo CHtml::link(CHtml::image($data->image_url['image_large'], $data->alt, array("class" => "col-lg-12", 'style' => 'width:100%')), $data->image_url['image_large'], array("target" => "_blank"));
                                                ?>
                                            </div>
                                            <div class="panel-footer">
                                                <?php echo $data->object_type; ?>
                                            </div>
                                            <div class="panel-footer">
                                                <?php echo $data->short_description; ?>
                                            </div>
                                            <div class="panel-footer">
                                                <?php echo $data->description; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php
$this->widget('ext.BootstrapLinkPager', array(
    'pages' => $dataProiver->getPagination(),
    'header' => '',
    'htmlOptions' => array('class' => 'pagination')
        )
);
?>
<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/scripts/jquery.ba-bbq1.js', CClientScript::POS_END);
?>