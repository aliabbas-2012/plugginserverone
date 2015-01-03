<?php

class m150103_155633_addUrlFieldInfPluggi extends DTDbMigration {

   public function up() {
        $table = "pluggin";
        $this->addColumn($table, "url", "varchar(100) after name");
    }

    public function down() {
        $table = "pluggin";
        $this->dropColumn($table, "url");
    }

}
