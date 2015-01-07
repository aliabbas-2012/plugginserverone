<?php

/**
 * This is the model class for table "bsp_notify".
 *
 * The followings are the available columns in table 'bsp_notify':
 * @property integer $Id
 * @property integer $user_plan_id
 * @property integer $user_id
 * @property string $date_time
 * @property integer $isview
 * @property integer $user_type
 * @property string $message
 * @property string $payment_adaptive_id
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property BspUser $user
 */
class Notify extends DTActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'notify';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('create_time, create_user_id, update_time, update_user_id', 'required'),
            array('user_plan_id, user_id, isview', 'numerical', 'integerOnly' => true),
            array('message, payment_adaptive_id', 'length', 'max' => 255),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            array('user_type,date_time', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Id, user_plan_id, user_id, date_time,user_type, isview, message, payment_adaptive_id, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'payment_adaptive' => array(self::BELONGS_TO, 'PaymentPaypallAdaptive', 'payment_adaptive_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Id' => 'ID',
            'user_plan_id' => 'Order',
            'user_id' => 'User',
            'date_time' => 'Date Time',
            'isview' => 'Isview',
            'user_type' => 'User Type',
            'message' => 'Message',
            'payment_adaptive_id' => 'Payment Adaptive',
            'create_time' => 'Create Time',
            'create_user_id' => 'Create User',
            'update_time' => 'Update Time',
            'update_user_id' => 'Update User',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('Id', $this->Id);
        $criteria->compare('user_plan_id', $this->user_plan_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('date_time', $this->date_time, true);
        $criteria->compare('isview', $this->isview);
        $criteria->compare('user_type', $this->user_type);
        $criteria->compare('message', $this->message, true);
        $criteria->compare('payment_adaptive_id', $this->payment_adaptive_id, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BspNotify the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
