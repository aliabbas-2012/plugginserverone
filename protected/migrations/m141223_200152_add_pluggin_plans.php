<?php

class m141223_200152_add_pluggin_plans extends DTDbMigration {

    public function up() {

        $table = "pluggin_plans";
        $columns = array(
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'pluggin_id' => 'int(11) unsigned NOT NULL',
            'price' => 'decimal(8,2) DEFAULT 0',
            'plan' => 'int(11) unsigned NOT NULL',
            'currency' => 'enum("dollar","Euro")',
            'create_time' => 'datetime NOT NULL',
            'create_user_id' => 'int(11) unsigned NOT NULL',
            'update_time' => 'datetime NOT NULL',
            'update_user_id' => 'int(11) unsigned NOT NULL',
            'activity_log' => 'text',
            'PRIMARY KEY (`id`)',
        );
        $options = "ENGINE=InnoDB";
        $this->createTable($table, $columns, $options);

        $this->addForeignKey("fk_plans", $table, "plan", "conf_plans", "id");
    }

    public function down() {
        $table = "pluggin_plans";
        $this->dropTable($table);
    }

}
