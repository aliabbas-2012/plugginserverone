<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItstActiveRecord
 *
 * @author Brain
 */
class DTActiveRecord extends CActiveRecord {

    //put your code here
    /**
     * Prepares attributes before performing validation.
     * create_time,
     * create_user_id,
     * update_time
     * update_user_id
     */
    public $_action;
    public $_controller;
    public $_no_condition = false;
    public $_current_module;
    public $land_scape, $detail_land_scape, $small_land_scape;
    public $image_1_land_scape, $image_2_land_scape, $image_3_land_scape;
    public $image_4_land_scape, $image_5_land_scape;

    public function __construct($scenario = 'insert') {

        if (!$this->isCommandLineInterface()) {
            $this->_action = isset(Yii::app()->controller->action) ? Yii::app()->controller->action->id : "";
            $this->_controller = Yii::app()->controller->id;
            $this->_current_module = get_class(Yii::app()->controller->getModule());
        }

        parent::__construct($scenario);
    }

    public function afterFind() {
        if (!$this->isCommandLineInterface() && isset(Yii::app()->controller->action->id)) {
            $this->_action = Yii::app()->controller->action->id;
        }

        $this->attributes = $this->decodeArray($this->attributes);
        parent::afterFind();
    }

    protected function beforeValidate() {

        if (!$this->isCommandLineInterface()) {
            $this->_action = Yii::app()->controller->action->id;
            if ($this->isNewRecord) {

                // set the create date, last updated date and the user doing the creating
                $this->create_time = $this->update_time = date("Y-m-d H:i:s"); //new CDbExpression('NOW()');
                $this->create_user_id = $this->update_user_id = Yii::app()->user->id;
                // $this->users_id=1;//$this->update_user_id=Yii::app()->user->id;
            } else {
                //not a new record, so just set the last updated time and last updated user id
                $this->update_time = new CDbExpression('NOW()');
                $this->update_user_id = Yii::app()->user->id;
                // $this->users_id=1;
            }
            /**
              special conidtion
             */
            if (empty(Yii::app()->user->id)) {
                $this->create_user_id = 1;
                $this->update_user_id = 1;
            }
        }

        parent::beforeValidate();
        $this->attributes = $this->decodeArray($this->attributes);
        return true;
    }

    /**
     *  will 
     *  be used 
     * during before save
     * @return boolean 
     */
    protected function beforeSave() {

        $update_time = date("Y-m-d") . " " . date("H:i:s");

        if ($this->_controller != "product" && $this->_action == "viewImage") {
            $this->attributes = CHtml::encodeArray($this->attributes);
        }
        parent::beforeSave();

        return true;
    }

    /**
     *
     * @return <array>
     */
    public function behaviors() {
        parent::behaviors();

        return array(
            'CMultipleRecords' => array(
                'class' => 'CMultipleRecords'
            ),
        );
    }

    /**
     *  will be used to deltee
     *  mark as dleted
     */
    public function markDeleted() {
        $this->updateByPk($this->primaryKey, array('deleted' => "1"));
    }

    public function getOrder() {
        $criteria = new CDbCriteria;
        $criteria->order = "t.order DESC";
        $criteria->select = "t.order";
        $orderM = $this->find($criteria);

        $this->order = $orderM->order + 1;
    }

    public function setUuid($length = 20) {
        $connection = Yii::app()->db;

        $command = $connection->createCommand("SELECT SUBSTRING(UUID(),1,$length) as uuid");
        $row = $command->queryRow();
        return $row['uuid'];
    }

    /*
     * method to decode an array 
     * removing special characters and slashes....
     */

    private function decodeArray($data) {
        $d = array();


        foreach ($data as $key => $value) {
            if (is_string($key))
                $key = stripslashes(htmlspecialchars_decode($key, ENT_QUOTES));
            if (is_string($value))
                $value = stripslashes(htmlspecialchars_decode($value, ENT_QUOTES));
            else if (is_array($value))
                $value = self::decodeArray($value);
            /*
             * IF condition is for arabic and internatational data handling 
             * 
             * and the else part is for local data entry for system
             */

            if (mb_detect_encoding($value) == "UTF-8") {

                $d[$key] = $this->_current_module == "WebModule" ? utf8_decode($value) : $value;
            } else {
                $d[$key] = $value;
            }
        }

        return $d;
    }

    public function updateByPk($pk, $attributes, $condition = '', $params = array()) {
        if (!$this->isCommandLineInterface()) {
            $updateAttr = array("update_time" => new CDbExpression('NOW()'), "update_user_id" => Yii::app()->user->id);
            $attributes = array_merge($attributes, $updateAttr);
        }

        parent::updateByPk($pk, $attributes, $condition, $params);
        return true;
    }

    /**
     * Home page setting
     */
    public function getHomePageLink($lang_id, $object_type = 'tour', $link = true) {
        $criteria = new CDbCriteria();
        $criteria->select = 'id,lang_id,name,object_type';
        $criteria->addCondition("id =:id AND object_type = :object_type AND lang_id = :lang_id");
        $params = array(
            'id' => $this->id,
            'lang_id' => $lang_id,
            'object_type' => $object_type,
        );
        $criteria->params = $params;
        $url = Yii::app()->controller->createUrl("/tour/home", $params);
        if ($item = HomePageItems::model()->find($criteria)) {
            return CHtml::link($item->name, $url);
        } else {

            return CHtml::link("Set On Home Page", $url);
        }
    }

    //get image type
    public function get_transcript() {
        if ($this->width == $this->height) {
            $this->land_scape = 'equal';
        } else if ($this->width > $this->height) {
            $this->land_scape = 'landscape';
        } else if ($this->width < $this->height) {
            $this->land_scape = 'potrate';
        }

        if (isset($this->attributes['detail_width']) && isset($this->attributes['detail_height'])) {
            if ($this->detail_width == $this->detail_height) {
                $this->detail_land_scape = 'equal';
            } else if ($this->detail_width > $this->detail_height) {
                $this->detail_land_scape = 'landscape';
            } else if ($this->detail_width < $this->detail_height) {
                $this->detail_land_scape = 'potrate';
            }
        }
        if (isset($this->attributes['small_width']) && isset($this->attributes['small_height'])) {
            if ($this->small_width == $this->small_height) {
                $this->small_land_scape = 'equal';
            } else if ($this->small_width > $this->small_height) {
                $this->small_land_scape = 'landscape';
            } else if ($this->small_width < $this->small_height) {
                $this->small_land_scape = 'potrate';
            }
        }

        for ($i = 1; $i <= 5; $i++) {
            $width_at = 'image_' . $i . "_width";
            $height_at = 'image_' . $i . "_height";
            if (isset($this->attributes[$width_at]) && isset($this->attributes[$height_at])) {

                $land_s_at = "image_" . $i . "_land_scape";
                if ($this->$width_at == $this->$height_at) {
                    $this->$land_s_at = 'equal';
                } else if ($this->$width_at > $this->$height_at) {
                    $this->$land_s_at = 'landscape';
                } else if ($this->$width_at < $this->$height_at) {
                    $this->$land_s_at = 'potrate';
                }
            }
        }
    }

    /**
     * save image properties
     */
    public function save_image_properties($size, $type = '') {
        if (!empty($size)) {
            $this->updateByPk($this->primaryKey, array($type . "width" => $size[0], $type . "height" => $size[1]));
        }
    }

    /**
     * 
     * @param type $size
     * @param type $i
     */
    public function save_image_loop_properties($size, $i = 1) {
        if (!empty($size)) {
            $width_at = 'image_' . $i . "_width";
            $height_at = 'image_' . $i . "_height";
            $this->updateByPk($this->primaryKey, array($width_at => $size[0], $height_at => $size[1]));
        }
    }

    function isCommandLineInterface() {
        return (php_sapi_name() === 'cli');
    }

}

?>
