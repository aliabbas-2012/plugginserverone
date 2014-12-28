<?php
$relationName = "user_registered_pluggins";
$mName = "PlugginSiteInfo";
?>
<div class="clear"></div>
<div class="<?php echo $relationName; ?> child" style="<?php echo 'display:' . (isset($_POST[$mName]) ? 'block' : 'none'); ?>">
    <?php
    $config = array(
        'criteria' => array(
            'condition' => 'pluggin_id=' . $model->primaryKey,
        )
    );
    $mNameobj = new $mName;
    $mName_provider = new CActiveDataProvider($mName, $config);
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => $mName . '-grid',
        'htmlOptions' => array(
            'class' => 'table-responsive'
        ),
        'itemsCssClass' => 'table table-striped table-bordered table-hover',
        'dataProvider' => $mName_provider,
        'columns' => array(
            'site_name',
        ),
    ));
    ?>
</div>
<?php
//    $this->widget('ext.lyiightbox.LyiightBox2', array(
//    ));
?>