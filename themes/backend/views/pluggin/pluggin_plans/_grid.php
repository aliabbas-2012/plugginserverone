<?php
$relationName = "pluggin_plans";
$mName = "PlugginPlans";
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
            array(
                'name' => 'plan',
                'value' => '$data->plan_rel->_duration',
                "type" => "raw",
            ),
            array(
                'name' => 'price',
                'value' => '$data->price',
                "type" => "raw",
            ),
            array(
                'name' => 'currency',
                'value' => '$data->currency',
                "type" => "raw",
            ),
            array
                (
                'class' => 'CButtonColumn',
                'template' => '{update} {delete}',
                'afterDelete' => 'window.location.reload()',
                'buttons' => array
                    (
                    'update' => array
                        (
                        'label' => 'update',
//                                'url' => 'Yii::app()->controller->createUrl("laborForm",array("id"=> $data->id, "daily_report_id"=>' . $model->id . '))',
                        'url' => 'Yii::app()->controller->createUrl("editChild", array("id"=> $data->primaryKey, "mName"=>get_class($data), "dir" => "' . $dir . '"))',
                        'click' => "js:function() {
                                            $('#loading').toggle();
                                            $.ajax({
                                                url: $(this).attr('href'),
                                                success: function(response)
                                                {
                                                    $('#$relationName-form').css('display', 'block');
                                                    $('#" . $dir . "_fields').html(response);
                                                    $('#" . $dir . "_fields .grid_fields').last().animate({
                                                            opacity:1, left: '+50', height: 'toggle'
                                                        });
                                                    $('#loading').toggle();
                                                    add_mode = false;
                                                }
                                            }); return false; }",
                    ),
                    'delete' => array(
                        'label' => 'Delete',
                        'url' => 'Yii::app()->controller->createUrl("deleteChildByAjax",array("id" => $data->primaryKey, "mName" => "' . $mName . '"))',
                    ),
                ),
            ),
        ),
    ));
    ?>
</div>
<?php
//    $this->widget('ext.lyiightbox.LyiightBox2', array(
//    ));
?>