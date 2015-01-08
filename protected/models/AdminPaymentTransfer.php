<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class AdminPaymentTransfer extends CFormModel {

    public $selection, $flag;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('selection', 'required'),
            array('flag', 'safe'),
        );
    }

    /**
     * 
     * @param type $transer_arr
     */
    public function transferMoney($transer_arr = array()) {
        $i = 0;
        $receivers = array();
        $criteria = new CDbCriteria();
        $criteria->addInCondition('id', $transer_arr);
        $criteria->select = "*,SUM(t.amount - t.puzzzle_commission) as amount";
        $criteria->group = "t.sender_id";
        $adaptive = PaymentPaypallAdaptive::model()->findAll($criteria);

        $dataProvider = new CActiveDataProvider('PaymentPaypallAdaptive', array(
            'criteria' => $criteria,
        ));


        foreach ($adaptive as $aptModel) {

            $receivers[$i]['email'] = $aptModel->seller->paypal_mail;
            /*
             *  Amount to be credited to the receiver's account 
             */
            $receivers[$i]['amount'] = (double) $aptModel->amount;

            $i++;
        }
        $ids = implode(",", $transer_arr);


        $payPallSetting = Paypalsettings::model()->findByPk(2);
        Yii::import('application.extensions.paypalladaptive.samples.PPBootStrap');
        Yii::import('application.extensions.paypalladaptive.samples.Common.Constants');
        Yii::import('application.extensions.paypalladaptive.samples.Common.Error');
        Yii::import('application.extensions.paypalladaptive.samples.Common.Response');

        require_once(Yii::getPathOfAlias('application.extensions.paypalladaptive.samples.PPBootStrap')) . ".php";
        require_once(Yii::getPathOfAlias('application.extensions.paypalladaptive.samples.Common.Constants')) . ".php";

        $error_adaptive = Yii::getPathOfAlias('application.extensions.paypalladaptive.samples.Common.Error');
        $response_adaptive = Yii::getPathOfAlias('application.extensions.paypalladaptive.samples.Common.Response');

        $host_base = Yii::app()->request->hostInfo;
        $cancel_url = $host_base . Yii::app()->controller->createUrl("/configurations/notificationConfirm", array("ids" => $ids));
        $return_url = $host_base . Yii::app()->controller->createUrl("/configurations/notificationConfirm", array("ids" => $ids));


        define("DEFAULT_SELECT", "- Select -");
        spl_autoload_unregister(array('YiiBase', 'autoload'));


        $receiver = array();
        /*
         * A receiver's email address 
         */
        foreach ($receivers as $key => $data) {
            $receiver[$key] = new Receiver();
            $receiver[$key]->email = $data['email'];
            /*
             *  	Amount to be credited to the receiver's account 
             */
            $receiver[$key]->amount = (double) $data['amount'];
            /*
             * Set to true to indicate a chained payment; only one receiver can be a primary receiver. Omit this field, or set it to false for simple and parallel payments. 
             */
            $receiver[$key]->primary = false;
        }


        $receiverList = new ReceiverList($receiver);


        $payRequest = new PayRequest(new RequestEnvelope("en_US"), "PAY", $cancel_url, "USD", $receiverList, $return_url);

        $payRequest->senderEmail = $payPallSetting->app_account_email;

        $payRequest->feesPayer = "SENDER";

        $service = new AdaptivePaymentsService(Paypalsettings::model()->getPayPallAdaptiveSetting());
        try {
            /* wrap API method calls on the service object with a try catch */
            $response = $service->Pay($payRequest);
            spl_autoload_register(array('YiiBase', 'autoload'));
            
            $url = "";
            foreach ($transer_arr as $id) {
                $paymentAdaptive = PaymentPaypallAdaptive::model()->findByPk($id);
                BspOrder::model()->setStatusOrder($paymentAdaptive, BspOrder::STATUS_ESCROW_PAID);
                $url = Paypalresponse::model()->storeResponse($response, $paymentAdaptive, $payPallSetting);
            }
            return $url;
            
            //return Paypalresponse::model()->storeResponse($response, $paymentAdaptive, $payPallSetting);
        } catch (Exception $ex) {
            
        }
        return "";
    }
    
    

}

//recent link
//https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-9YY42050JM302272L