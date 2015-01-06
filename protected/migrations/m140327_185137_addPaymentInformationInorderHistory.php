<?php

class m140327_185137_addPaymentInformationInorderHistory extends DTDbMigration {

    public function up() {
        $table = "payment_paypall_adaptive_history";
        $columns = array(
            'id' => 'int(10) unsigned NOT NULL auto_increment',
            'paypall_adaptive_id' => 'int(11) unsigned NOT NULL',
            'buyer_status' => "enum('initiated','paying', 'completed','cancelled') DEFAULT NULL",
            'seller_status' => "enum('rejected', 'confirmed','completed') DEFAULT NULL",
            'amount' => 'double(12,3) DEFAULT 0',
            'extra_amount' => 'double(12,3) DEFAULT 0',
            'start_transfer_puzzzle' => 'double(12,3) DEFAULT 0',
            'puzzzle_commission' => 'double(12,3) DEFAULT 0',
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