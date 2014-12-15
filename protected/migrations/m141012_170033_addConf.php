<?php

class m141012_170033_addConf extends DTDbMigration {

    public function up() {
        $table = "conf_misc";
        $columns = array(
            "title" => "Date Format",
            "param" => "dateformat",
            "value" => "m/d/y",
            "field_type" => "dropDown",
        );
        $this->insert($table, $columns);
        $columns = array(
            "title" => "Smtp",
            "param" => "smtp",
            "value" => "1",
            "field_type" => "dropDown",
        );
        $this->insert($table, $columns);
    }

    public function down() {
        $table = "conf_misc";
        $this->delete($table, 'param="dateformat"');
        $this->delete($table, 'param="smtp"');
    }

}
