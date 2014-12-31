<?php

/**
 * This is the model class for table "user_plans".
 *
 * The followings are the available columns in table 'user_plans':
 * @property string $id
 * @property string $user_id
 * @property string $pluggin_site_info_id
 * @property string $pluggin_plan_id
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
class UserPlans extends DTActiveRecord {

    public $_running_status, $_admin_activation, $_dates;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_plans';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pluggin_site_info_id,start_date, end_date, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('payment_status, is_active, deleted', 'numerical', 'integerOnly' => true),
            array('user_id, pluggin_plan_id, create_user_id, update_user_id', 'length', 'max' => 11),
            array('_running_status,activity_log', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, pluggin_plan_id, payment_status, is_active, start_date, end_date, deleted, create_time, create_user_id, update_time, update_user_id, activity_log', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            "user" => array(self::BELONGS_TO, "Users", 'user_id'),
            "pluggin_site_info" => array(self::BELONGS_TO, "PlugginSiteInfo", 'pluggin_site_info_id'),
            "plugin_plan" => array(self::BELONGS_TO, "PlugginPlans", 'pluggin_plan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'pluggin_plan_id' => 'Pluggin Plan',
            'payment_status' => 'Payment Status',
            '_running_status' => 'Running Status',
            'is_active' => 'Admin activation',
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
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('pluggin_plan_id', $this->pluggin_plan_id, true);
        $criteria->compare('pluggin_site_info_id', $this->pluggin_site_info_id, false);
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
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UserPlans the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function afterFind() {
        $image = Yii::app()->theme->baseUrl . "/images/icons/";
        $end_date = explode(" ", $this->end_date);
        if ($end_date[0] >= date("Y-m-d")) {
            $this->_running_status = CHtml::image($image . "running.png") . " Running";
        } else if ($end_date[0] < date("Y-m-d")) {
            $this->_running_status = CHtml::image($image . "expired.gif") . "Expired";
        } else {
            $this->_running_status = "Unknown";
        }


        if ($this->is_active == 1) {
            $this->_admin_activation = CHtml::image($image . "enable.png") . " Enable";
        } else if ($this->is_active == 0) {
            $this->_admin_activation = CHtml::image($image . "disable.png") . "Disable";
        } else {
            $this->_admin_activation = "Unknown";
        }

        $this->_dates['start_date'] = explode(" ", $this->start_date);
        $this->_dates['end_date'] = explode(" ", $this->end_date);
        return parent::afterFind();
    }

    /*
     * 
     */

    public function getActivePlan($site_info) {
        $criteria = new CDbCriteria();
        $criteria->addCondition("end_date < :current_time AND pluggin_site_info_id = :site_info");
        $criteria->params = array("current_time" => date("Y-m-d"), "site_info" => $site_info);
        
        return $this->count($criteria);
    }
    
    /**
     * This will return user's lates site's plugin plan
     * @param type $pluggin_site_info
     */
    public function getLatestPlan($pluggin_site_info){
        
    }
            
            /**
     * Pluggin Plan
     * @param type $pluggin_id
     */
    public function getPlugginPlans($pluggin_id) {
        
        $criteria = new CDbCriteria;
        $criteria->compare('pluggin_id', $pluggin_id, true);
         
        $criteria->select = 'id';
        $pluggin_plans_list = CHtml::listData($this->findAll($criteria), "id", "id");
        
        /* here we are getting all plans of a user against a site against single plan id , this will be for logging purposes that we can know how many times user has upgraded a particular plan*/
        $criteria = new CDbCriteria;
        $criteria->addInCondition("pluggin_plan_id", array_keys($pluggin_plans_list)); // here plan is assigned by default

        return UserPlans::model()->find($criteria); /* for single user plan against a single plugin id for single site*/
    }

}
