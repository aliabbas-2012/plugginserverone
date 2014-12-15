<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $email
 * @property string $ip_address
 * @property string $type
 * @property integer $is_active
 * @property string $activation_key
 * @property integer $deleted
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 * @property string $activity_log
 */
class Users extends DTActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public $new_password;
    public $new_password_repeat;
    public $name;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, first_name, last_name, password, email, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('email,username', 'unique'),
            array('is_active, deleted', 'numerical', 'integerOnly' => true),
            array('username, first_name, last_name, activation_key', 'length', 'max' => 50),
            array('password, email, ip_address', 'length', 'max' => 255),
            array('type', 'length', 'max' => 9),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            array('name,activity_log', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, first_name, last_name, password, email, ip_address, type, is_active, activation_key, deleted, create_time, create_user_id, update_time, update_user_id, activity_log', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'password' => 'Password',
            'email' => 'Email',
            'ip_address' => 'Ip Address',
            'type' => 'Type',
            'is_active' => 'Is Active',
            'activation_key' => 'Activation Key',
            'deleted' => 'Deleted',
            'create_time' => 'Create Time',
            'create_user_id' => 'Create User',
            'update_time' => 'Update Time',
            'update_user_id' => 'Update User',
            'activity_log' => 'Activity Log',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('ip_address', $this->ip_address, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('is_active', $this->is_active);
        $criteria->compare('activation_key', $this->activation_key, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);
        $criteria->compare('activity_log', $this->activity_log, true);

        $criteria->addCondition("username <>'admin'");

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * set password as md5
     * @return boolean
     */
    public function beforeSave() {
        if (Yii::app()->controller->action->id != "update") {
            $this->password = md5($this->password);
        }
        parent::beforeSave();
        return true;
    }

    /**
     * set password as md5
     * @return boolean
     */
    public function beforeValidate() {
        if ($this->username != "admin" && $this->isNewRecord) {
            $this->password = "test123";
            $this->type = "non-admin";
            $this->is_active = 0;
        }
        parent::beforeValidate();
        return true;
    }

    /**
     * setting for name  
     */
    public function afterFind() {
        $this->name = $this->first_name . " " . $this->last_name;
        parent::afterFind();
    }

    /**
     * getting activation url
     * @return type 
     */
    public function getActivationUrl() {
        $activationUrl = '/site/activation';
        $params['key'] = $this->activation_key;
        $params['id'] = $this->id;

        return Yii::app()->controller->createAbsoluteUrl($activationUrl, $params);
    }

    public function validatePassword($password, $old_password) {

        return md5($password) === $old_password;
        //return $password;
    }

    public function getRows($file) {
        $row = 1;
        $arr = array();
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                for ($c = 0; $c < $num; $c++) {

                    $arr[$row][$c] = $data[$c];
                }
                $row++;
            }
            fclose($handle);
        }

        return $arr;
    }

    public function getArray($file) {
        $row = 1;
        $arr = array();
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                for ($c = 0; $c < $num; $c++) {

                    $arr[$row] = $data[$c];
                }
                $row++;
            }
            fclose($handle);
        }

        return $arr;
    }

    /**
     * get Admin Users;
     */
    public function getAdminUsers() {
        $criteria = new CDbCriteria();
        $criteria->addCondition("type = :type AND is_active = :is_active AND deleted = :deleted");
        $criteria->params = array(
            "type" => "admin",
            "is_active" => "1",
            "deleted" => "0",
        );
        return $this->findAll($criteria);
    }

}
