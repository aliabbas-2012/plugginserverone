<?php

class m141228_094218_addUsersiteInfoIdinUserPlans extends DTDbMigration {

    public function up() {
        $table = "user_plans";
        $this->addColumn($table, "pluggin_site_info_id", "int(11) unsigned NOT NULL after user_id");
    }

    public function down() {
        $table = "user_plans";
        $this->dropColumn($table, "pluggin_site_info_id");
    }

}
