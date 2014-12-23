<?php

/**
 * This is the model class for table "plugins".
 *
 * The followings are the available columns in table 'plugins':
 * @property string $id
 * @property string $name
 * @property integer $plateform_id
 * @property string $meta_title
 * @property string $meta_description
 * @property string $description
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 * @property string $activity_log
 */
class Pluggin extends DTActiveRecord {

    public $_image;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pluggin';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name,plateform_id, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('plateform_id', 'numerical', 'integerOnly' => true),
            array('name, meta_title', 'length', 'max' => 150),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            array('meta_description, description, activity_log', 'safe'),
            array('name', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, meta_title, plateform_id, meta_title, meta_description, description, create_time, create_user_id, update_time, update_user_id, activity_log', 'safe', 'on' => 'search'),
        );
    }



    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'plateform' => array(self::BELONGS_TO, 'Plateform', 'plateform_id'),
            'pluggin_plans' => array(self::HAS_MANY, 'PlugginPlans', 'pluggin_id'),
            'pluggin_images' => array(self::HAS_MANY, 'PlugginImage', 'pluggin_id'),
            'pluggin_images_display_def' => array(self::HAS_ONE, 'PlugginImage', 'pluggin_id', 'condition' => 'is_default=1 '),
            'pluggin_images_display' => array(self::HAS_ONE, 'PlugginImage', 'pluggin_id', 'order' => 'id DESC '),
            'pluggin_images_display_def_count' => array(self::STAT, 'PlugginImage', 'pluggin_id', 'condition' => 'is_default=1 '),
            'pluggin_images_display_count' => array(self::STAT, 'PlugginImage', 'pluggin_id', 'order' => 'id DESC '),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'name' => 'Name',
            'plateform_id' => 'Plateform',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'description' => 'Description',
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
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
   
        $criteria->compare('plateform_id', $this->plateform_id);

        if ($id = $this->getPlateformId($this->name) != '') {
            $criteria->compare('plateform_id', $id);
        }
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);
        $criteria->compare('activity_log', $this->activity_log, true);

        return new CActiveDataProvider('Pluggin', array(
            'criteria' => $criteria,
        ));
    }

    /**
     * 
     * @param type $name
     */
    public function getPlateformId($name) {
        $criteria = new CDbCriteria;
        $criteria->compare('name', $name, true);
        $criteria->select = 'id';
        if ($model = Plateform::model()->find($criteria)) {
            return $model->id;
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * @return plugins the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * set image
     * @return type
     */
    public function afterFind() {
//        if(!empty($this->pluggin_images)){
//            //$this->_image = $this->pluggin_images[0]->image_url['image_large'];
//        }
        //$this->url = $this->id . "-" . $this->url;
        return parent::afterFind();
    }

    /**
     * 
     * @return type
     */
    public function beforeSave() {
        //$this->setSlug();
        return parent::beforeSave();
    }

    /**
     * setting slug
     * for url
     * before save 
     */
    /*public function setSlug() {
        if (empty($this->url)) {
            $this->url = $this->name;
        }
        $this->url = strtolower(trim($this->url));
        $this->url = str_replace(" ", "-", $this->url);
        $this->url = str_replace("_", "-", $this->url);
        $this->url = MyHelper::convert_no_sign($this->url);
    }*/

}
