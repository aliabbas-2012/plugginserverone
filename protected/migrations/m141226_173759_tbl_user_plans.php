<?php

/**
 * This will be the table of the user plguins plans and it's life time
 */
class m141226_173759_tbl_user_plans extends DTDbMigration {

    public function up() {
        $table = "user_plans";
        $columns = array(
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'user_id' => 'int(11) unsigned DEFAULT NULL',
            'pluggin_plan_id' => 'int(11) unsigned DEFAULT NULL',
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
        $table = "user_plans";
        $this->dropTable($table);
    }

}