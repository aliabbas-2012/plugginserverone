
<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!--End Page Header -->
</div>

<div class="row">
    <!-- Welcome -->
    <div class="col-lg-12">
        <div class="alert alert-info">
            <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back 
            <b> <?php echo Yii::app()->user->user->last_name; ?></b>
            <i class="fa  fa-pencil"></i>
        </div>
    </div>
    <!--end  Welcome -->
</div>

<?php
    /*
      will be implement soon
      $this->renderPartial("//site/_dashboard");
     */
//Page-Level Plugin Scripts
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl . '/assets/plugins/morris/raphael-2.1.0.min.js', CClientScript::POS_END);
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl . '/assets/plugins/morris/morris.js', CClientScript::POS_END);
Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl . '/assets/scripts/dashboard-demo.js', CClientScript::POS_END);
?>