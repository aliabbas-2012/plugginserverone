<?php

/**
 * This is the model class for table "payment_paypall_adaptive".
 *
 * The followings are the available columns in table 'payment_paypall_adaptive':
 * @property string $id
 * @property integer $seller_id
 * @property integer $buyer_id
 * @property integer $plan_id
 * @property string $payment_status
 * @property double $amount
 * @property double $extra_amount
 * @property string $ip_address
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property PaymentPaypallAdaptiveHistory[] $paymentPaypallAdaptiveHistories
 */
class PaymentPaypallAdaptive extends DTActiveRecord {

    public $_transfer_amount;
    public $_transfer_status;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'payment_paypall_adaptive';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('seller_id, buyer_id, plan_id, ip_address, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('seller_id, buyer_id, plan_id', 'numerical', 'integerOnly' => true),
            array('amount', 'numerical'),
            array('payment_status', 'length', 'max' => 9),
            array('ip_address', 'length', 'max' => 50),
            array('_transfer_status', 'safe'),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, seller_id, buyer_id, plan_id, payment_status, amount,ip_address, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'paymentPaypallAdaptiveHistories' => array(self::HAS_MANY, 'PaymentPaypallAdaptiveHistory', 'paypall_adaptive_id'),
            'seller' => array(self::BELONGS_TO, 'Users', 'seller_id'),
            'buyer' => array(self::BELONGS_TO, 'Users', 'buyer_id'),
            'user_plan' => array(self::BELONGS_TO, 'UserPlans', 'plan_id'),
                //'paypall_response' => array(self::HAS_ONE, 'Paypalresponse', 'paypal_action_id', 'condition' => 'plan_id  IS NOT NULL AND Ack = "Success"', "order" => " paypall_response.id DESC"),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'seller_id' => 'Sender',
            'buyer_id' => 'Buyer',
            'plan_id' => 'User Plan',
            'payment_status' => 'Buyer Status',
            'amount' => 'Amount',
            'ip_address' => 'Ip Address',
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
        $criteria->compare('seller_id', $this->seller_id);
        $criteria->compare('buyer_id', $this->buyer_id);
        $criteria->compare('plan_id', $this->plan_id);
        $criteria->compare('payment_status', $this->payment_status, true);

        $criteria->compare('amount', $this->amount);

        $criteria->compare('ip_address', $this->ip_address, true);

        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'sort' => array(
                'defaultOrder' => 'id DESC',
            )
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PaymentPaypallAdaptive the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * 
     * @return type
     */
    public function afterSave() {
        $this->saveHistory();
        return parent::afterSave();
    }

    /**
     * save history for log
     */
    public function saveHistory() {
        $model = new PaymentPaypallAdaptiveHistory();
        $model->paypall_adaptive_id = $this->id;
        $model->payment_status = $this->payment_status;
        $model->amount = $this->amount;
        $model->save();
    }

    /**
     * 
     * @param type $user_id
     * @param type $payment_adaptive_id
     * @param type $message
     */
    public function generateNotification($user_id, $payment_adaptive_id, $type, $message, $plan_id) {
        $model = new Notify();
        $model->user_id = $user_id;
        $model->payment_adaptive_id = $payment_adaptive_id;
        $model->message = $message;
        $model->user_type = $type;
        $model->user_plan_id = $plan_id;
        $model->save();
        return $model;
    }

    /*
     * 
     */

    public function afterFind() {
        $this->_transfer_status = 0;
        if (
                $this->payment_status == "completed"
        ) {
            $this->_transfer_status = 1;
        }
        return parent::afterFind();
    }

    /**
     * pay direct to puzzle during purchase
     * with discount price
     */
    public function payToPluggginOwner($plan, $selectedPlan) {
        //$paymentAdaptive, $notifyModel
        //creating paypall adaptive 
        $plan_id = $plan->id;
        $payPallSetting = Paypalsettings::model()->findByPk(2);

        $paymentAdaptive = new PaymentPaypallAdaptive;
        $paymentAdaptive->buyer_id = isset(Yii::app()->user->id) ? Yii::app()->user->id : 1;
        $paymentAdaptive->seller_id = $payPallSetting->admin_user_id;
        $paymentAdaptive->payment_status = "paying";

        $paymentAdaptive->plan_id = $plan_id;
        $paymentAdaptive->amount = $selectedPlan->price;


        $paymentAdaptive->ip_address = Yii::app()->request->userHostAddress;



        $paymentAdaptive->save();

        $paymentAdaptive->saveHistory();
        $message = "[" . Yii::app()->user->name . "] purchasing  " . $plan->plugin_plan->plan_rel->_duration . " ";
        $message.= " <br/> Price : " . $plan->plugin_plan->price;

        $notifyModel = $this->generateNotification($paymentAdaptive->seller_id, $paymentAdaptive->id, "seller", $message, $plan_id);


        Yii::import('application.extensions.paypalladaptive.samples.PPBootStrap');
        Yii::import('application.extensions.paypalladaptive.samples.Common.Constants');
        Yii::import('application.extensions.paypalladaptive.samples.Common.Error');
        Yii::import('application.extensions.paypalladaptive.samples.Common.Response');

        require_once(Yii::getPathOfAlias('application.extensions.paypalladaptive.samples.PPBootStrap')) . ".php";
        require_once(Yii::getPathOfAlias('application.extensions.paypalladaptive.samples.Common.Constants')) . ".php";

        $error_adaptive = Yii::getPathOfAlias('application.extensions.paypalladaptive.samples.Common.Error');
        $response_adaptive = Yii::getPathOfAlias('application.extensions.paypalladaptive.samples.Common.Response');

        $host_base = Yii::app()->request->hostInfo;
        //encoding plan
        $plan_id = base64_encode($plan_id);
        $cancel_url = $host_base . Yii::app()->controller->createUrl("/web/userPluggin/cancelPlan", array("plan" => $plan_id, "id" => $notifyModel->Id, "status" => "cancelled"));
        $return_url = $host_base . Yii::app()->controller->createUrl("/web/userPluggin/confirmPurchase", array("plan" => $plan_id, "id" => $notifyModel->Id, "status" => "completed"));

        $settings = Paypalsettings::model()->getPayPallAdaptiveSetting();
        $current_user = Yii::app()->user->User;
        define("DEFAULT_SELECT", "- Select -");
        spl_autoload_unregister(array('YiiBase', 'autoload'));


        $receiver = array();
        /*
         * A receiver's email address 
         */

        $receiver[0] = new Receiver();
        $receiver[0]->email = $payPallSetting->app_account_email;
        /*
         *  	Amount to be credited to the receiver's account 
         */
        $receiver[0]->amount = ceil((double) $selectedPlan->price);
        /*
         * Set to true to indicate a chained payment; only one receiver can be a primary receiver. Omit this field, or set it to false for simple and parallel payments. 
         */
        $receiver[0]->primary = false;

        $receiverList = new ReceiverList($receiver);





        $payRequest = new PayRequest(new RequestEnvelope("en_US"), "PAY", $cancel_url, "USD", $receiverList, $return_url);

        $payRequest->senderEmail = $current_user->paypal_mail;
        //$payRequest->senderEmail = "itsgeniusstar_test8@gmail.com";

        $payRequest->feesPayer = "SENDER";

        $service = new AdaptivePaymentsService($settings);
        spl_autoload_register(array('YiiBase', 'autoload'));



        try {
            /* wrap API method calls on the service object with a try catch */
            $response = $service->Pay($payRequest);

            $url = Paypalresponse::model()->storeResponse($response, $paymentAdaptive, $payPallSetting);

            return $url;
        } catch (Exception $ex) {
            echo "<pre>";
            print_r($ex);
        }
    }

}
