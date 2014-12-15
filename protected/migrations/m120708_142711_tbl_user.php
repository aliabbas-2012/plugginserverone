<?php

class m120708_142711_tbl_user extends DTDbMigration {

    public function up() {

        $table = "users";
        $columns = array(
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'username' => 'varchar(50) NOT NULL',
            'password' => 'varchar(255) NOT NULL',
            'email' => 'varchar(255) NOT NULL',
            'ip_address' => 'varchar(255) NOT NULL',
            'type' => 'enum("admin","non-admin")',
            'is_active' => 'tinyint(1) NOT NULL DEFAULT 0',
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
        $table = "users";
        $this->dropTable($table);
    }

}
