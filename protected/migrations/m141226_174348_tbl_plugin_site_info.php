<?php
/**
 * This will contain the plugin site information when a plugin is installed to remote server and populate with curl command
 */
class m141226_174348_tbl_plugin_site_info extends DTDbMigration
{
    public function up() {
        $table = "plugin_site_info";
        $columns = array(
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'user_id' => 'int(11) unsigned DEFAULT NULL',
            'plugin_id' => 'int(11) unsigned DEFAULT NULL',
            'site_name' => 'varchar(255) NOT NULL',
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
        $table = "plugin_site_info";
        $this->dropTable($table);
    }
}