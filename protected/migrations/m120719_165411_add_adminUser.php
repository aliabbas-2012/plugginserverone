<?php

class m120719_165411_add_adminUser extends DTDbMigration {

    public function up() {
        $table = "users";
        $columns = array(
            "username" => "admin",
            "password" => md5("admin"),
            "email" => "admin@admin.com",
            "ip_address" => "",
            "type" => "admin",
            "is_active" => "1",
            "create_time" => date("Y-m-d h:m:s"),
            "create_user_id" => "1",
            "update_time" => date("Y-m-d h:m:s"),
            "update_user_id" => "1",
            "activity_log" => "user insterted through console",
        );
        $this->insert($table, $columns);
    }

    public function down() {
        $table = "users";
        $this->delete($table, "username='admin'");
    }

}
