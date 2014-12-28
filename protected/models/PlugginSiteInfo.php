<?php

/**
 * This is the model class for table "plugin_site_info".
 *
 * The followings are the available columns in table 'plugin_site_info':
 * @property string $id
 * @property string $user_id
 * @property string $pluggin_id
 * @property string $site_name
 * @property integer $deleted
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 * @property string $activity_log
 */
class PlugginSiteInfo extends DTActiveRecord {

    /**
     * will only be use as bit in api
     * @var type 
     */
    public $_exist, $_model;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'plugin_site_info';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('site_name,pluggin_id, create_time, create_user_id, update_time, update_user_id', 'required'),
            array("site_name", 'validatePluggin'),
            array('deleted', 'numerical', 'integerOnly' => true),
            array('user_id, pluggin_id, create_user_id, update_user_id', 'length', 'max' => 11),
            array('site_name', 'length', 'max' => 255),
            array('_exist,activity_log', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, pluggin_id, site_name, deleted, create_time, create_user_id, update_time, update_user_id, activity_log', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Find pluggin id
     */
    public function validatePluggin() {
        $criteria = new CDbCriteria;
        $criteria->compare('site_name', $this->site_name, true);
        $criteria->compare('pluggin_id', $this->pluggin_id, true);

        if ($model = $this->find($criteria)) {
            $this->addError("site_name", "already Exist this pluggin for this url");
            $this->addError("pluggin_id", "already Exist this url for this pluggin");
            $this->addError("_exist", "already");
            $this->_model = $model;
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            "user" => array(self::BELONGS_TO, "Users", 'user_id'),
            "plugin" => array(self::BELONGS_TO, "Pluggin", 'pluggin_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'pluggin_id' => 'Pluggin',
            'site_name' => 'Site Name',
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
        $criteria->compare('pluggin_id', $this->pluggin_id, true);
        $criteria->compare('site_name', $this->site_name, true);
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
     * @return PluginSiteInfo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * 
     * @param type $user_id
     * @param type $site_name
     * @param type $pluggin_id
     */
    public function updateSitinfoUser($user_id, $site_name, $pluggin_id) {

        if (!empty($site_name) && !empty($pluggin_id)) {
            $criteria = new CDbCriteria;
            $criteria->compare('site_name', $site_name, false);
            $criteria->compare('pluggin_id', $pluggin_id, false);

            if ($model = $this->find($criteria)) {

                $this->updateByPk($model->id, array("user_id" => $user_id));
            }
        }
    }

    public function getPlansCountforGrid() {

        $criteria = new CDbCriteria;

        $criteria->compare('user_id', Yii::app()->user->id, false);
        $criteria->compare('pluggin_site_info_id', $this->id, false);

        $url = Yii::app()->controller->createUrl("/web/userPluggin/plans", array("site_name" => $this->site_name, "pluggin_id" => $this->pluggin_id));
        if ($plans = UserPlans::model()->count($criteria) > 0) {
            return CHtml::link("Total Plans (" . $plans . ")", $url);
        } else {
            return CHtml::link("No Plans (Make new plans)", $url);
        }
    }

}
