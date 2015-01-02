<?php

/* $en_lang = Language::model()->getLanuageId("en", "id"); */
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'htmlOptions' => array("class" => "table table-striped table-bordered table-hover"),
    'attributes' => array(
        array(
            'name' => 'Pluggin',
            'value' => !empty($model->pluggin_plan_id) ? $model->plugin_plan->pluggin->name : "",
            'type' => "raw",
        ),
        'start_date',
        'end_date',

        array(
            'name' => '_running_status',
            'value' => $model->_running_status,
            'type' => "raw",
        ),
        array(
            'name' => 'pluggin_plan_id',
            'value' => !empty($model->pluggin_plan_id) ? $model->plugin_plan->plan_rel->_duration : "",
            'type' => "raw",
        ),
    ),
));
?>