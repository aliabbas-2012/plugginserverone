<?php

class UpdateUser extends DTActiveRecord {

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('paypal_mail,username, first_name, last_name, email, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('email,username', 'unique'),
            array('paypal_mail,email','email'),
            array('is_active, deleted', 'numerical', 'integerOnly' => true),
            array('username, first_name, last_name, activation_key', 'length', 'max' => 50),
            array('type', 'length', 'max' => 9),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, first_name, last_name, password, email, ip_address, type, is_active, activation_key, deleted, create_time, create_user_id, update_time, update_user_id, activity_log', 'safe', 'on' => 'search'),
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'users';
    }

}
