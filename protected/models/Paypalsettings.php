<?php

/**
 * This is the model class for table "paypalsettings".
 *
 * The followings are the available columns in table 'paypalsettings':
 * @property string $id
 * @property integer $Sandbox
 * @property string $DeveloperAccountEmail
 * @property string $ApplicationID
 * @property string $APIUsername
 * @property string $APIPassword
 * @property string $APISignature
 * @property string $APISubject
 * @property string $app_account_email
 * @property integer $admin_user_id

 * @property double $discount_offer_rate
 * @property string $timestamp
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 */
class Paypalsettings extends DTActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'paypalsettings';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('DeveloperAccountEmail, ApplicationID, APIUsername, APIPassword, APISignature, app_account_email, admin_user_id, timestamp, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('Sandbox, admin_user_id', 'numerical', 'integerOnly' => true),
            array('discount_offer_rate', 'numerical'),
            array('DeveloperAccountEmail, ApplicationID, APIUsername, APIPassword, APISignature, APISubject, app_account_email', 'length', 'max' => 255),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, Sandbox, DeveloperAccountEmail, ApplicationID, APIUsername, APIPassword, APISignature, APISubject, app_account_email, admin_user_id, timestamp, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'admin_user_rel' => array(self::BELONGS_TO, 'Users', 'admin_user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'Sandbox' => 'Sandbox',
            'DeveloperAccountEmail' => 'Developer Account Email',
            'ApplicationID' => 'Application',
            'APIUsername' => 'Apiusername',
            'APIPassword' => 'Apipassword',
            'APISignature' => 'Apisignature',
            'APISubject' => 'Apisubject',
            'app_account_email' => 'App Account Email (Money Transfered Email)',
            'admin_user_id' => 'Admin User',
      
            'discount_offer_rate' => 'Discount Offer rate',
            'timestamp' => 'Timestamp',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('Sandbox', $this->Sandbox);
        $criteria->compare('DeveloperAccountEmail', $this->DeveloperAccountEmail, true);
        $criteria->compare('ApplicationID', $this->ApplicationID, true);
        $criteria->compare('APIUsername', $this->APIUsername, true);
        $criteria->compare('APIPassword', $this->APIPassword, true);
        $criteria->compare('APISignature', $this->APISignature, true);
        $criteria->compare('APISubject', $this->APISubject, true);
        $criteria->compare('app_account_email', $this->app_account_email, true);
        $criteria->compare('admin_user_id', $this->admin_user_id);
       
        $criteria->compare('discount_offer_rate', $this->discount_offer_rate);
        $criteria->compare('timestamp', $this->timestamp, true);
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
     * @return Paypalsettings the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * 
     */
    public function getPayPallAdaptiveSetting() {
        $model = Paypalsettings::model()->findByPk(2);

        return array(
            "acct1.UserName" => $model->APIUsername,
            "acct1.Password" => $model->APIPassword,
            "acct1.Signature" => $model->APISignature,
            "acct1.AppId" => $model->ApplicationID,
            "acct1.CertPath" => "cert_key.pem",
            "discount_offer_rate" => $model->discount_offer_rate,
           
            "mode" => $model->Sandbox == 1 ? "sandbox" : "live",
        );
    }

}
