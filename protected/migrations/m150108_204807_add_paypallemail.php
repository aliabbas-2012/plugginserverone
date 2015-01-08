<?php

class m150108_204807_add_paypallemail extends DTDbMigration {

    public function up() {
        $table = "users";
        $this->addColumn($table, "paypal_mail", "varchar(50) NOT NULL after email");
    }

    public function down() {
        $table = users;
        $this->dropColumn($table, "paypal_mail");
    }

}
