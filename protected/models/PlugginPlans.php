<?php

/**
 * This is the model class for table "pluggin_plans".
 *
 * The followings are the available columns in table 'pluggin_plans':
 * @property string $id
 * @property string $pluggin_id
 * @property string $price
 * @property string $plan
 * @property string $currency
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 * @property string $activity_log
 *
 * The followings are the available model relations:
 * @property ConfPlans $plan0
 */
class PlugginPlans extends DTActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pluggin_plans';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('plan, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('plan, create_user_id, update_user_id', 'length', 'max' => 11),
            array('price', 'length', 'max' => 8),
            array('currency', 'length', 'max' => 6),
            array('pluggin_id,activity_log', 'safe'),
            array('price', 'numerical', 'integerOnly' => FALSE),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, pluggin_id, price, plan, currency, create_time, create_user_id, update_time, update_user_id, activity_log', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'plan_rel' => array(self::BELONGS_TO, 'ConfPlans', 'plan'),
            'pluggin' => array(self::BELONGS_TO, 'Pluggin', 'pluggin_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'pluggin_id' => 'Pluggin',
            'price' => 'Price',
            'plan' => 'Plan',
            'currency' => 'Currency',
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
        $criteria->compare('pluggin_id', $this->pluggin_id, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('plan', $this->plan, true);
        $criteria->compare('currency', $this->currency, true);
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
     * @return PlugginPlans the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function afterValidate() {

        return parent::afterValidate();
    }

    /**
     * Pluggin Plans
     * @param type $pluggin_id
     */
    public function getPlugginPlans($pluggin_id) {
        
        $criteria = new CDbCriteria;
        $criteria->compare('pluggin_id', $pluggin_id, true);
         
        $criteria->select = 'id';
        $pluggin_plans_list = CHtml::listData($this->findAll($criteria), "id", "id");
        
        /* here we are getting all plans of a user against a site against single plan id , this will be for logging purposes that we can know how many times user has upgraded a particular plan*/
        $criteria = new CDbCriteria;
        $criteria->addInCondition("pluggin_plan_id", array_keys($pluggin_plans_list));
        //$criteria->addInCondition("pluggin_plan_id", array(25,26));
        
        return UserPlans::model()->findAll($criteria);  /* to get the list of latest plugin upgrade*/
        
    }
}
