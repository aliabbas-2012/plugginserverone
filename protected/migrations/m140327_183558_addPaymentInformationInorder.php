<?php

class m140327_183558_addPaymentInformationInorder extends DTDbMigration {

    public function up() {
        $table = "payment_paypall_adaptive";
        $columns = array(
            'id' => 'int(10) unsigned NOT NULL auto_increment',
            'sender_id' => 'int(11) NOT NULL',
            'buyer_id' => 'int(11) NOT NULL',
            "item_id" => 'int(11) NOT NULL',
            'buyer_status' => "enum('initiated', 'completed') DEFAULT NULL",
            'seller_status' => "enum('rejected', 'confirmed','completed') DEFAULT NULL",
            'amount' => 'double(12,3) DEFAULT 0',
            'extra_amount' => 'double(12,3) DEFAULT 0',
            'start_transfer_puzzzle' => 'double(12,3) DEFAULT 0',
            'puzzzle_commission' => 'double(12,3) DEFAULT 0',
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