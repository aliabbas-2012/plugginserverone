<?php

class m120910_183824_add_column_user extends DTDbMigration {

    public function up() {
        $table = "users";
        $this->addColumn($table, "first_name", "varchar(50) NOT NULL after username");
        $this->addColumn($table, "last_name", "varchar(50) NOT NULL after first_name");
        $this->addColumn($table, "activation_key", "varchar(50) DEFAULT NULL after is_active");

        $this->alterColumn($table, "ip_address", "varchar(255) DEFAULT NULL");

        $table = "users";
        $columns = array(
            "first_name" => "admin",
        );
        $this->update($table, $columns, "username='admin'");
    }

    public function down() {
        $table = "users";
        $this->dropColumn($table, "first_name");
        $this->dropColumn($table, "last_name");
        $this->dropColumn($table, "activation_key");
    }

}
