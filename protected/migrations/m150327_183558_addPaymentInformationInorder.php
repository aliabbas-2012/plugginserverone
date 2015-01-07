<?php

class m150327_183558_addPaymentInformationInorder extends DTDbMigration {

    public function up() {
        $table = "payment_paypall_adaptive";
        $columns = array(
            'id' => 'int(10) unsigned NOT NULL auto_increment',
            'seller_id' => 'int(11) NOT NULL',
            'buyer_id' => 'int(11) NOT NULL',
            "plan_id" => 'int(11) NOT NULL',
            'payment_status' => "enum('initiated','paying', 'completed','cancelled') DEFAULT NULL",
            'amount' => 'double(12,3) DEFAULT 0',
        
            'ip_address' => 'varchar(50) NOT NULL',
            'create_time' => 'datetime NOT NULL',
            'create_user_id' => 'int(11) unsigned NOT NULL',
            'update_time' => 'datetime NOT NULL',
            'update_user_id' => 'int(11) unsigned NOT NULL',
            'PRIMARY KEY  (`id`)');
        $this->createTable($table, $columns);
    }

    public function down() {
        $table = "payment_paypall_adaptive";
        $this->dropTable($table);
    }

}
