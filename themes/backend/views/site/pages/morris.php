
<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />

<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Morris Charts</h1>
    </div>
    <!--end  page header -->
</div>
<div class="row">
    <div class="col-lg-6">
        <!--  Area Chart -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Area Chart Example
            </div>
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
        </div>
        <!-- End Area Chart -->
    </div>

    <div class="col-lg-6">
        <!--  Bar Chart -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Bar Chart Example
            </div>
            <div class="panel-body">
                <div id="morris-bar-chart"></div>
            </div>
        </div>
        <!-- End Bar Chart -->
    </div>
    <div class="col-lg-6">
        <!--  Line Chart -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Line Chart Example
            </div>
            <div class="panel-body">
                <div id="morris-line-chart"></div>
            </div>
        </div>
        <!--  End Line Chart -->
    </div>
    <div class="col-lg-6">
        <!--  Donut Chart -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Donut Chart Example
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart"></div>
            </div>
        </div>
        <!-- End Donut Chart -->
    </div>

</div>
<?php
//Page-Level Plugin Scripts
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl . '/assets/plugins/morris/raphael-2.1.0.min.js', CClientScript::POS_END);
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl . '/assets/plugins/morris/morris.js', CClientScript::POS_END);
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl . '/assets/scripts/morris-demo.js', CClientScript::POS_END);
?>
