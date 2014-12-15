<?php

class m140908_194537_pluggins extends DTDbMigration {

    public function up() {
        $table = "pluggins";
        $columns = array(
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'name' => 'varchar(150) NOT NULL',
            'meta_title' => 'varchar(150) DEFAULT NULL',
            'meta_description' => 'text DEFAULT NULL',
            'description' => 'text DEFAULT NULL',
            'pluggin_id' => 'int(11) unsigned NOT NULL',
            'create_time' => 'datetime NOT NULL',
            'create_user_id' => 'int(11) unsigned NOT NULL',
            'update_time' => 'datetime NOT NULL',
            'update_user_id' => 'int(11) unsigned NOT NULL',
            'activity_log' => 'text',
            'PRIMARY KEY (`id`)',
        );
        $this->createTable($table, $columns);

    }

    public function down() {
        $table = "pluggins";
        $this->dropTable($table);

    }

}
