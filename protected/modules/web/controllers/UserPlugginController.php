<?php

/*
 * all User Pluggins
 */

class UserPlugginController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
                /* "https +array('changePass','setNewPass')", */
                /* "http + array(activate','register','updateProfile','updateProfile','forgot','productReview','customerHistory','orderDetail','print','customerDetail')" */
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(
                    'index', 'plans', 'purchase', 'confirmPurchase', 'cancelPlan',
                    'paytopaypall'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $model = new PlugginSiteInfo('search');
        $model->user_id = Yii::app()->user->id;
        $this->render("//userPluggin/index", array("model" => $model));
    }

    /**
     * Plans detail
     */
    public function actionPlans($info_id, $pluggin_id) {

        $model = Pluggin::model()->findByPk($pluggin_id);
        $this->render("//userPluggin/plans", array("model" => $model, 'info_id' => $info_id));
    }

    public function actionPurchase($id, $info = '') {
        $info = PlugginSiteInfo::model()->findByPk($info);
        $model = PlugginPlans::model()->findByPk($id);
        $this->render("//userPluggin/purchase_step_1", array("model" => $model, "info" => $info));
    }

    public function actionPaytopaypall($id, $info = '', $pay = '') {

        $info = PlugginSiteInfo::model()->findByPk($info);
        $model = PlugginPlans::model()->findByPk($id);

        $purchase_plan = new UserPlans;

        if ($pay == '') {
            if (UserPlans::model()->getActivePlan($info->id) > 0) {
                Yii::app()->user->setFlash("error", 'You have your current plan , you cannot purchase new plan');
                $this->redirect($this->createUrl("/web/userPluggin/plans", array("info_id" => $info->id, "pluggin_id" => $info->pluggin_id)));
            }
        } else {
            $purchase_plan = UserPlans::model()->findByPk($pay);
        }

        if (!$purchase_plan->isNewRecord && $purchase_plan->payment_status != 0) {

            Yii::app()->user->setFlash("error", 'You already purchased this plan');
            $this->redirect($this->createUrl("/web/userPluggin/plans", array("info_id" => $info->id, "pluggin_id" => $info->pluggin_id)));
        }



        $purchase_plan->user_id = Yii::app()->user->id;
        $purchase_plan->pluggin_site_info_id = $info->id;
        $purchase_plan->pluggin_plan_id = $model->id;
        $purchase_plan->is_active = 0;
        $purchase_plan->payment_status = 0;
        $purchase_plan->start_date = date("Y-m-d");

        $date = strtotime($purchase_plan->start_date);



        switch ($model->plan_rel->duration) {
            case "Days":
                $date = strtotime("+" . $model->plan_rel->name . " day", $date);
                break;
            case "Weeks":
                $date = strtotime("+" . $model->plan_rel->name . " week", $date);
                break;
            case "Months":
                $date = strtotime("+" . $model->plan_rel->name . " months", $date);
                break;
            case "Years":
                $date = strtotime("+" . $model->plan_rel->name . " years", $date);
                break;
            default:
                echo "";
        }

        $purchase_plan->end_date = date("Y-m-d", $date);

        if ($purchase_plan->save()) {
            $url = PaymentPaypallAdaptive::model()->payToPluggginOwner($purchase_plan->id, $model);

            $this->redirect($url);
        } else {

            Yii::app()->user->setFlash("error_array", $purchase_plan->getErrors());
            $this->redirect($this->createUrl("/web/userPluggin/plans", array("info_id" => $info->id, "pluggin_id" => $info->pluggin_id)));
        }
    }

    /**
     * 
     * @param type $id
     * @param type $info
     */
    public function actionConfirmPurchase($plan, $id = '', $status = '') {
        $plan = base64_decode($plan);
        if ($model = UserPlans::model()->findByPk($plan)) {
            UserPlans::model()->updateByPk($plan, array("payment_status" => 1));
            $model = UserPlans::model()->findByPk($plan);
            $model->paypalladaptive->updateByPk($model->paypalladaptive->id,array("payment_status"=>"completed"));
            //email code
            
            $body = $this->renderPartial("//userPluggin/emails/_plan", array("model" => $model), true);

            $email['FromName'] = Yii::app()->params['systemName'];
            $email['From'] = Yii::app()->params->adminEmail;
            $email['To'] = Yii::app()->user->User->email;
            $email['Subject'] = "You plan detail for  url ".$model->pluggin_site_info->site_name;
            $email['Body'] = $body;

            $email['Body'] = $this->renderPartial('//users/_email_template', array('email' => $email), true, false);
            $this->sendEmail2($email);


            Yii::app()->user->setFlash("success", 'You have purchased plan successfully');
            $this->redirect($this->createUrl("/web/userPluggin/plans", array("info_id" => $model->pluggin_site_info->id, "pluggin_id" => $model->pluggin_site_info->pluggin_id)));
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /*
     * 
     */

    public function actionCancelPlan($plan, $id = '', $status = '') {
        $plan = base64_decode($plan);
        if ($model = UserPlans::model()->findByPk($plan)) {
            $model->paypalladaptive->updateByPk($model->paypalladaptive->id,array("payment_status"=>"cancelled"));

            $body = $this->renderPartial("//userPluggin/emails/_plan", array("model" => $model), true);

            $email['FromName'] = Yii::app()->params['systemName'];
            $email['From'] = Yii::app()->params->adminEmail;
            $email['To'] = Yii::app()->user->User->email;
            $email['Subject'] = "You  have cancelled your plan";
            $extra_body = "Dear User you  have cancelled your plan,you can purchase again by click on following link<br/>";
            $email['Body'] = $extra_body . $body;

            $email['Body'] = $this->renderPartial('//users/_email_template', array('email' => $email), true, false);
            $this->sendEmail2($email);

            UserPlans::model()->updateByPk($plan, array("payment_status" => 0));
            Yii::app()->user->setFlash("error", 'You have cancelled your plan purchase order');
            $this->redirect($this->createUrl("/web/userPluggin/plans", array("info_id" => $model->pluggin_site_info->id, "pluggin_id" => $model->pluggin_site_info->pluggin_id)));
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

}
