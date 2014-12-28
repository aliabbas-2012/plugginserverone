<div class="page-header">
    <h1> <small>My Pluggins</small></h1>
</div>
<div class="row-fluid">
    <div class="span10">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => "My Pluggins",
        ));
        ?>

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            /* 'type'=>'striped bordered condensed', */
            'itemsCssClass' => 'table table-bordered',
            'dataProvider' => $model->search(),
            'columns' => array(
                'site_name',
                array(
                    'name' => 'pluggin_id',
                    'value' => 'isset($data->plugin)?$data->plugin->name:""'
                ),
                array(
                    'header' => 'Plans',
                    'value' => '$data->getPlansCountforGrid()',
                    'type'=>'raw'
                ),

            ),
        ));
        ?>
        <?php $this->endWidget(); ?>
    </div>

</div>