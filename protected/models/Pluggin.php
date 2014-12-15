<?php

/**
 * This is the model class for table "tours".
 *
 * The followings are the available columns in table 'tours':
 * @property string $id
 * @property string $name
 * @property string $short_title
 * @property string $tour_type
 * @property integer $category_id
 * @property string $url
 * @property string $meta_title
 * @property string $meta_description
 * @property string $description
 * @property string $short_description
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
        return 'tours';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name,category_id, short_title, tour_type, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('category_id', 'numerical', 'integerOnly' => true),
            array('name, short_title, tour_type, url, meta_title', 'length', 'max' => 150),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            array('meta_description, description,short_description, activity_log', 'safe'),
            array('name', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, short_title, tour_type, category_id, url, meta_title, meta_description, description, create_time, create_user_id, update_time, update_user_id, activity_log', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Behaviour
     *
     */
    public function behaviors() {
        return array(
            'DTMultiLangBehaviour' => array(
                'class' => 'DTMultiLangBehaviour',
                'langClassName' => 'TourLang',
                'relation' => 'tour_langs',
                'langTableName' => 'tour_langs',
                'langForeignKey' => 'parent_id',
                'localizedAttributes' => array(
                    'name',
                    'short_title',
                    'tour_type',
                    'meta_title',
                    'meta_description',
                    'description',
                    'short_description',
                ), //attributes of the model to be translated
                'localizedPrefix' => '',
                'defaultLanguage' => 'en', //your main language. Example : 'fr'
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
            'tour_langs' => array(self::HAS_MANY, 'TourLang', 'parent_id'),
            'tour_images' => array(self::HAS_MANY, 'TourImage', 'tour_id'),
            'tour_images_display_def' => array(self::HAS_ONE, 'TourImage', 'tour_id', 'condition' => 'is_default=1 '),
            'tour_images_display' => array(self::HAS_ONE, 'TourImage', 'tour_id', 'order' => 'id DESC '),
            'tour_images_display_def_count' => array(self::STAT, 'TourImage', 'tour_id', 'condition' => 'is_default=1 '),
            'tour_images_display_count' => array(self::STAT, 'TourImage', 'tour_id', 'order' => 'id DESC '),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'name' => 'Name',
            'short_title' => 'Short Title',
            'tour_type' => 'Tour Type',
            'category_id' => 'Category',
            'url' => 'Url',
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
        $criteria->compare('short_title', $this->short_title, true);
        $criteria->compare('tour_type', $this->tour_type, true);
        //$criteria->compare('category_id', $this->category_id);

        if ($id = $this->getCategoryId($this->name) != '') {
            $criteria->compare('category_id', $id);
        }
        $criteria->compare('url', $this->url, true);
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('short_description', $this->short_description, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);
        $criteria->compare('activity_log', $this->activity_log, true);

        return new CActiveDataProvider('Tour', array(
            'criteria' => $criteria,
        ));
    }

    /**
     * 
     * @param type $name
     */
    public function getCategoryId($name) {
        $criteria = new CDbCriteria;
        $criteria->compare('name', $name, true);
        $criteria->select = 'id';
        if ($model = Category::model()->find($criteria)) {
            return $model->id;
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * @return tours the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * set image
     * @return type
     */
    public function afterFind() {
//        if(!empty($this->tour_images)){
//            //$this->_image = $this->tour_images[0]->image_url['image_large'];
//        }
        $this->url = $this->id . "-" . $this->url;
        return parent::afterFind();
    }

    /**
     * 
     * @return type
     */
    public function beforeSave() {
        $this->setSlug();
        return parent::beforeSave();
    }

    /**
     * setting slug
     * for url
     * before save 
     */
    public function setSlug() {
        if (empty($this->url)) {
            $this->url = $this->name;
        }
        $this->url = strtolower(trim($this->url));
        $this->url = str_replace(" ", "-", $this->url);
        $this->url = str_replace("_", "-", $this->url);
        $this->url = MyHelper::convert_no_sign($this->url);
    }

}
