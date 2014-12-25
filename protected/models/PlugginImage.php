<?php

/**
 * This is the model class for table "pluggin_image".
 *
 * The followings are the available columns in table 'pluggin_image':
 * @property string $id
 * @property string $pluggin_id
 * @property string $tag
 * @property string $is_default
 * @property string $image_large
 * @property string $image_small
 * @property string $image_detail
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 * @property string $activity_log
 *
 * The followings are the available model relations:
 * @property Product $pluggin
 */
class PlugginImage extends DTActiveRecord {

    public $upload_key = "";
    public $uploaded_img = "";
    public $no_image, $alt_title;

    /**
     * upload instance and index for multiple uploader
     * index is no and instance is object
     * @var type 
     */
    public $upload_index, $upload_insance;

    /**
     * copy path in case of only import
     * @var type 
     */
    public $_copy_path;

    /**
     *
     * @var type 
     * for purpose of deleting old image
     */
    public $oldLargeImg = "";
    public $oldSmallImg = "";
    public $oldDetailImg = "";
    public $image_url = array();

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductImage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function __construct($scenario = 'insert') {
        $this->no_image = Yii::app()->baseUrl . "/images/no_image.png";
        parent::__construct($scenario);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pluggin_image';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('create_time, create_user_id, update_time, update_user_id', 'required'),
            array('pluggin_id, create_user_id, update_user_id', 'length', 'max' => 11),
            array('tag, image_large, image_small, image_detail', 'length', 'max' => 150),
            array('alt_title,_copy_path,image_large,upload_key,pluggin_id, is_default,activity_log', 'safe'),
            array('image_large', 'file', 'allowEmpty' => $this->isNewRecord ? false : true,
                'types' => 'jpg,jpeg,gif,png,JPG,JPEG,GIF,PNG'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, pluggin_id, tag, image_large, image_small, image_detail, create_time, create_user_id, update_time, update_user_id, activity_log', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pluggin' => array(self::BELONGS_TO, 'Pluggin', 'pluggin_id'),
           
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tour_id' => 'Tour',
            'tag' => 'Tag',
            'image_large' => 'Image Large',
            'image_small' => 'Image Small',
            'is_default' => 'display',
            'image_detail' => 'Image Detail',
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
        $criteria->compare('pluggin_id', $this->pluggin_id, true);
        $criteria->compare('tag', $this->tag, true);
        $criteria->compare('image_large', $this->image_large, true);
        $criteria->compare('image_small', $this->image_small, true);
        $criteria->compare('image_detail', $this->image_detail, true);
        $criteria->compare('is_default', $this->is_default, true);
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

    public function afterFind() {
        $this->oldLargeImg = $this->image_large;
        $this->oldSmallImg = $this->image_small;
        $this->oldDetailImg = $this->image_detail;
        //set alt and title for images
        $this->alt_title = !empty($this->tag) ? $this->tag : $this->tour->name;



        /**
         *  setting path  for front end images
         */
        if (!empty($this->image_large)) {


            $this->image_url['image_large'] = Yii::app()->baseUrl . "/uploads/tour/" . $this->tour->primaryKey;
            $this->image_url['image_large'].= "/tour_images/" . $this->id . "/" . $this->image_large;
        } else {
            $this->image_url['image_large'] = Yii::app()->baseUrl . "/images/tour_images/noimages.jpeg";
        }

        if (!empty($this->image_small)) {

            $this->image_url['image_small'] = Yii::app()->baseUrl . "/uploads/tour/" . $this->tour->primaryKey;
            $this->image_url['image_small'].= "/tour_images/" . $this->id . "/" . $this->image_small;
        } else {
            $this->image_url['image_small'] = Yii::app()->baseUrl . "/images/tour_images/noimages.jpeg";
        }

        if (!empty($this->image_detail)) {

            $this->image_url['image_detail'] = Yii::app()->baseUrl . "/uploads/tour/" . $this->tour->primaryKey;
            $this->image_url['image_detail'].= "/tour_images/" . $this->id . "/" . $this->image_detail;
        } else {
            $this->image_url['image_detail'] = Yii::app()->baseUrl . "/images/tour_images/noimages.jpeg";
        }

        $this->get_transcript();
        parent::afterFind();
    }

    /**
     * set for validation to occure
     * need image instance for validation rules
     * @return type
     */
    public function beforeValidate() {
        $this->upload_insance = DTUploadedFile::getInstance($this, 'image_large');
         //CVarDumper::dump($_POST,10,true);
         //CVarDumper::dump($_FILES,10,true);
         CVarDumper::dump($this->upload_insance,10,true);
        if (!empty($this->upload_insance)) {
            $this->image_large = $this->upload_insance;
        }
        return parent::beforeValidate();
    }
    
    public function afterValidate() {
        CVarDumper::dump($this->attributes,10,true);
       
       
        die;
        return parent::afterValidate();
    }

    /**
     * for setting object to save
     * image name rather its emtpy
     * @return type 
     */
    public function beforeSave() {


        $this->setUploadVars();
        $this->updateAllToUndefault();
        return parent::beforeSave();
    }

    public function afterSave() {
        parent::afterSave();
        $this->uploadImages();

        return true;
    }

    /**
     * set image variable before save
     */
    public function setUploadVars() {



        $its_t = new DTFunctions();
        if (!empty($this->upload_insance)) {

            $this->image_large = $its_t->getRanddomeNo(10) . "." . $this->upload_insance->extensionName;
            $this->image_small = str_replace(" ", "_", "small_" . $this->image_large);
            $this->image_detail = str_replace(" ", "_", "detail_" . $this->image_large);
        } else {

            $this->image_large = $this->oldLargeImg;
            $this->image_small = $this->oldSmallImg;
            $this->image_detail = $this->oldDetailImg;
        }
    }

    /**
     * upload images
     */
    public function uploadImages() {

        if (!empty($this->upload_insance)) {


            $folder_array = array("tour", $this->tour->id, "tour_images", $this->getPrimaryKey());

            $upload_path = DTUploadedFile::creeatRecurSiveDirectories($folder_array);
            $this->upload_insance->saveAs($upload_path . str_replace(" ", "_", $this->image_large));

            $thumb1 = DTUploadedFile::createThumbs($upload_path . $this->image_large, $upload_path, 170, str_replace(" ", "_", "small_" . $this->image_large));
            $thumb2 = DTUploadedFile::createThumbs($upload_path . $this->image_large, $upload_path, 180, str_replace(" ", "_", "detail_" . $this->image_large));
            //save acutal
            $size = @getimagesize($upload_path . str_replace(" ", "_", $this->image_large));
            $this->save_image_properties($size);
            $size = @getimagesize($thumb1);
            $this->save_image_properties($size, "small_");
            $size = @getimagesize($thumb2);
            $this->save_image_properties($size, "detail_");
            $this->deleteldImage();
        }
    }

    /**
     * to delete old image in case of not empty
     * not equal new image
     */
    public function deleteldImage() {

        if (!empty($this->oldLargeImg) && $this->oldLargeImg != $this->image_large) {
            $path = Yii::app()->basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;
            $path.= "uploads" . DIRECTORY_SEPARATOR . "tour" . DIRECTORY_SEPARATOR . $this->tour->primaryKey . DIRECTORY_SEPARATOR . "tour_images";
            $large_path = $path . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . $this->oldLargeImg;

            DTUploadedFile::deleteExistingFile($large_path);
        }

        if (!empty($this->oldSmallImg) && $this->oldSmallImg != $this->image_small) {
            $path = Yii::app()->basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;
            $path.= "uploads" . DIRECTORY_SEPARATOR . "tour" . DIRECTORY_SEPARATOR . $this->tour->primaryKey . DIRECTORY_SEPARATOR . "tour_images";

            $small_path = $path . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . $this->oldSmallImg;

            DTUploadedFile::deleteExistingFile($small_path);
        }

        if (!empty($this->oldDetailImg) && $this->oldDetailImg != $this->image_detail) {
            $path = Yii::app()->basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;
            $path.= "uploads" . DIRECTORY_SEPARATOR . "tour" . DIRECTORY_SEPARATOR . $this->tour->primaryKey . DIRECTORY_SEPARATOR . "tour_images";

            $detail_path = $path . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . $this->oldDetailImg;

            DTUploadedFile::deleteExistingFile($detail_path);
        }
    }

    public function beforeDelete() {
        $this->deleteldImage();
        parent::beforeDelete();
    }

    /**
     *  before saving all the records needs
     *  to be undefault
     */
    public function updateAllToUndefault() {
        if (!empty($this->tour_id)) {
            $connection = Yii::app()->db;
            $sql = "UPDATE " . $this->tableName() . " t SET t.is_default=0 WHERE t.pluggin_id ='" . $this->tour_id . "' ";
            $command = $connection->createCommand($sql);
            $command->execute();
        }
    }

}
