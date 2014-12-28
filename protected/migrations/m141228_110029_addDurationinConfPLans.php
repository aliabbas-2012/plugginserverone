<?php

class m141228_110029_addDurationinConfPLans extends DTDbMigration {

    public function up() {
        $table = "conf_plans";
        $this->addColumn($table, "duration", "varchar(30) NOT NULL");
    }

    public function down() {
        $table = "conf_plans";
        $this->dropColumn($table, "duration");
    }

}
