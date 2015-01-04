<?php

class m150104_154654_add_subPlans extends DTDbMigration {

    public function up() {
        $table = "user_sub_plans";
        $columns = array(
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'pluggin_plan_id' => 'int(11) unsigned DEFAULT NULL',
            'user_plan_id'=> 'int(11) unsigned DEFAULT NULL',
            'payment_status' => 'tinyint(1) NOT NULL DEFAULT 0',
            'is_active' => 'tinyint(1) NOT NULL DEFAULT 0',
            'start_date' => 'datetime NOT NULL',
            'end_date' => 'datetime NOT NULL',
            'deleted' => 'tinyint(1) NOT NULL DEFAULT 0',
            'create_time' => 'datetime NOT NULL',
            'create_user_id' => 'int(11) unsigned NOT NULL',
            'update_time' => 'datetime NOT NULL',
            'update_user_id' => 'int(11) unsigned NOT NULL',
            'activity_log' => 'text',
            'PRIMARY KEY (`id`)',
        );
        $options = "ENGINE=InnoDB";
        $this->createTable($table, $columns, $options);
    
    }

    public function down() {
        $table = "user_sub_plans";
        $this->dropTable($table);
    }

}
