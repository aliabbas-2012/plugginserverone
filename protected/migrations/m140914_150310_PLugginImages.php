<?php

class m140914_150310_PLugginImages extends DTDbMigration {

      public function up() {
        $table = "pluggin_image";
        $columns = array(
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'pluggin_id' => 'int(11) unsigned NOT NULL',
            'is_default' => 'tinyint(11) DEFAULT 0',
            'tag' => 'varchar(150) DEFAULT NULL',
            'image_large' => 'varchar(150) NOT NULL',
            'image_small' => 'varchar(150) DEFAULT NULL',
            'image_detail' => 'varchar(150) DEFAULT NULL',
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
        $table = "pluggin_image";
        $this->dropTable($table);
    }

}
