<?php

/**
 * This is the model class for table "paypalresponse".
 *
 * The followings are the available columns in table 'paypalresponse':
 * @property string $id
 * @property integer $user_plan_id
 * @property string $paypal_action_id
 * @property string $Ack
 * @property string $Build
 * @property string $CorrelationID
 * @property string $Timestamp
 * @property string $PayKey
 * @property string $PaymentExecStatus
 * @property string $Status
 * @property string $RedirectURL
 * @property string $XMLRequest
 * @property string $XMLResponse
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 */
class Paypalresponse extends DTActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'paypalresponse';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('paypal_action_id, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('user_plan_id', 'numerical', 'integerOnly' => true),
            array('paypal_action_id, create_user_id, update_user_id', 'length', 'max' => 11),
            array('Ack, Build, CorrelationID, Timestamp, PayKey, PaymentExecStatus, Status', 'length', 'max' => 255),
            array('RedirectURL, XMLRequest, XMLResponse', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_plan_id, paypal_action_id, Ack, Build, CorrelationID, Timestamp, PayKey, PaymentExecStatus, Status, RedirectURL, XMLRequest, XMLResponse, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'offer' => array(self::BELONGS_TO, 'BspItem', 'user_plan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_plan_id' => 'Item',
            'paypal_action_id' => 'Paypal Action',
            'Ack' => 'Ack',
            'Build' => 'Build',
            'CorrelationID' => 'Correlation',
            'Timestamp' => 'Timestamp',
            'PayKey' => 'Pay Key',
            'PaymentExecStatus' => 'Payment Exec Status',
            'Status' => 'Status',
            'RedirectURL' => 'Redirect Url',
            'XMLRequest' => 'Xmlrequest',
            'XMLResponse' => 'Xmlresponse',
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
        $criteria->compare('user_plan_id', $this->user_plan_id);
        $criteria->compare('paypal_action_id', $this->paypal_action_id, true);
        $criteria->compare('Ack', $this->Ack, true);
        $criteria->compare('Build', $this->Build, true);
        $criteria->compare('CorrelationID', $this->CorrelationID, true);
        $criteria->compare('Timestamp', $this->Timestamp, true);
        $criteria->compare('PayKey', $this->PayKey, true);
        $criteria->compare('PaymentExecStatus', $this->PaymentExecStatus, true);
        $criteria->compare('Status', $this->Status, true);
        $criteria->compare('RedirectURL', $this->RedirectURL, true);
        $criteria->compare('XMLRequest', $this->XMLRequest, true);
        $criteria->compare('XMLResponse', $this->XMLResponse, true);
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
     * @return Paypalresponse the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * store paypall response against items
     * and paypall apative
     * @param type $response
     * @param type $paypalladaptive
     * @param type $payPallSetting
     */
    public function storeResponse($response, $paypalladaptive, $payPallSetting) {

        $response = json_decode(json_encode($response), true);

        $model = new Paypalresponse;
        $model->user_plan_id = $paypalladaptive->plan_id;
        $model->paypal_action_id = $paypalladaptive->id;
        $model->Ack = isset($response['responseEnvelope']['ack']) ? $response['responseEnvelope']['ack'] : "Failure";
        $model->Build = isset($response['responseEnvelope']['build']) ? $response['responseEnvelope']['build'] : "";
        $model->CorrelationID = isset($response['responseEnvelope']['correlationId']) ? $response['responseEnvelope']['correlationId'] : "";
        $model->Timestamp = isset($response['responseEnvelope']['timestamp']) ? $response['responseEnvelope']['timestamp'] : date("Y-m-d h:m:s");
        $model->PayKey = isset($response['payKey']) ? $response['payKey'] : "";
        $model->PaymentExecStatus = isset($response['paymentExecStatus']) ? $response['paymentExecStatus'] : "";
        ;
        $model->Status = "";
        if ($payPallSetting->Sandbox == 1) {
            $model->RedirectURL = "https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=" . $model->PayKey;
        }
        else {
            $model->RedirectURL = "https://www.paypal.com/webscr?cmd=_ap-payment&paykey=" . $model->PayKey;
        }
        $model->XMLRequest = "";
        $model->XMLRequest = "";
        $model->save();

        if (isset($response['responseEnvelope']['ack']) && $response['responseEnvelope']['ack'] == "Success") {
            return $model->RedirectURL;
        }
        return "";
    }

}
