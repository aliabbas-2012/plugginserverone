<?php

class m150327_185137_addPaymentInformationInorderHistory extends DTDbMigration {

    public function up() {
        $table = "payment_paypall_adaptive_history";
        $columns = array(
            'id' => 'int(10) unsigned NOT NULL auto_increment',
            'paypall_adaptive_id' => 'int(11) unsigned NOT NULL',
            'payment_status' => "enum('initiated','paying', 'completed','cancelled') DEFAULT NULL",
            'amount' => 'double(12,3) DEFAULT 0',
            'create_time' => 'datetime NOT NULL',
            'create_user_id' => 'int(11) unsigned NOT NULL',
            'update_time' => 'datetime NOT NULL',
            'update_user_id' => 'int(11) unsigned NOT NULL',
            'PRIMARY KEY  (`id`)');
        $this->createTable($table, $columns);
        $this->addForeignKey("fk_".$table, $table, 'paypall_adaptive_id', "payment_paypall_adaptive", "id");
    }

    public function down() {
        $table = "payment_paypall_adaptive_history";
        $this->dropForeignKey("fk_".$table, $table);
        $this->dropTable($table);
    }

}