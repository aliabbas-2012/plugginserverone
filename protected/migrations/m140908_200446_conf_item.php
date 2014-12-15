<?php

class m140908_200446_conf_item extends DTDbMigration {

    public function up() {
        $table = "conf_tour_types";
        $columns = array(
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'name' => 'varchar(150) NOT NULL',
            'create_time' => 'datetime NOT NULL',
            'create_user_id' => 'int(11) unsigned NOT NULL',
            'update_time' => 'datetime NOT NULL',
            'update_user_id' => 'int(11) unsigned NOT NULL',
            'activity_log' => 'text',
            'PRIMARY KEY (`id`)',
        );
        $options = "ENGINE=InnoDB";
        $this->createTable($table, $columns, $options);

        $table = "conf_tour_types_langs";
        $columns = array(
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'name' => 'varchar(150) NOT NULL',
            'lang_id' => 'int(4) NOT NULL',
            'parent_id' => 'int(4) NOT NULL',
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
        
        $table = "conf_tour_types_langs";
        $this->dropTable($table);
        
        $table = "conf_tour_types";
        $this->dropTable($table);
    }

}
