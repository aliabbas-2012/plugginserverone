<?php

class m150327_203128_add_PaypallSettings extends DTDbMigration {

    public function up() {
        $this->execute($this->readJsonData("settings_db.sql"));
    }

    public function down() {
        return;
    }

}
