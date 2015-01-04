<?php

/**
 * This is the model class for table "user_sub_plans".
 *
 * The followings are the available columns in table 'user_sub_plans':
 * @property string $id
 * @property string $pluggin_plan_id
 * @property string $user_plan_id
 * @property integer $payment_status
 * @property integer $is_active
 * @property string $start_date
 * @property string $end_date
 * @property integer $deleted
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 * @property string $activity_log
 */
class UserSubPlans extends DTActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_sub_plans';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('start_date, end_date, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('payment_status, is_active, deleted', 'numerical', 'integerOnly' => true),
            array('pluggin_plan_id, user_plan_id, create_user_id, update_user_id', 'length', 'max' => 11),
            array('activity_log', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, pluggin_plan_id, user_plan_id, payment_status, is_active, start_date, end_date, deleted, create_time, create_user_id, update_time, update_user_id, activity_log', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
             "plugin_plan" => array(self::BELONGS_TO, "PlugginPlans", 'pluggin_plan_id'),
             "user_plan" => array(self::BELONGS_TO, "UserPlans", 'user_plan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'pluggin_plan_id' => 'Pluggin Plan',
            'user_plan_id' => 'User Plan',
            'payment_status' => 'Payment Status',
            'is_active' => 'Is Active',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('pluggin_plan_id', $this->pluggin_plan_id, true);
        $criteria->compare('user_plan_id', $this->user_plan_id, true);
        $criteria->compare('payment_status', $this->payment_status);
        $criteria->compare('is_active', $this->is_active);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);
        $criteria->compare('activity_log', $this->activity_log, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UserSubPlans the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
