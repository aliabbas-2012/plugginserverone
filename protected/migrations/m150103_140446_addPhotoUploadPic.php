<?php

class m150103_140446_addPhotoUploadPic extends DTDbMigration {

    public function up() {
        $table = "plateform";
        $this->addColumn($table, "image", "varchar(255) after name");
    }

    public function down() {
        $table = "plateform";
        $this->dropColumn($table, "image");
    }

}
