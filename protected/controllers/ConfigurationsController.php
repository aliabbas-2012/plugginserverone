<?php

class ConfigurationsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
     public $filters;

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('load', 'payPallSettings','paymentNotifications'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Conf default page.
     */
    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Load Configuration
     * 
     * @param <string> $m (Model name without Conf)
     * @param <int> $id
     */
    public function actionLoad($m, $id = 0, $child_id = '', $type = "") {

        /* Complete Model name */
        $model_name = 'Conf' . $m;


        /* For add new or update */
        $model = new $model_name;


        if ($id != 0) {
            $model = $model->findByPk($id);
        }
        $childModel = '';
        if ($child_id != '' && isset($model->childModel)) {
            $childModel = new $model->childModel;
            if ($child_id != "new") {
                $childModel = $childModel->findByPk($child_id);
            }

            if (isset($_POST[$model->childModel])) {
                /* Assign attributes */

                $childModel->attributes = $_POST[$model->childModel];
                $childModel->parent_id = $model->id;
                /* Save record */
                if ($childModel->save()) {
                    Yii::app()->user->setFlash("success", "Data has been saved successfully");
                    $this->redirect(array('load', 'm' => $m, "id" => $model->id, "child_id" => "new"));
                }
            }
        } else {
            if (isset($_POST[$model_name])) {
                /* Assign attributes */

                $model->attributes = $_POST[$model_name];
                /* Save record */
                if ($model->save()) {
                    Yii::app()->user->setFlash("success", "Data has been saved successfully");
                    $this->redirect(array('load', 'm' => $m, "id" => $model->id, "child_id" => "new"));
                }
            }
        }

        /* if form is posted */


        $this->render($model->confViewName, array('model' => $model, 'm' => $m, 'child_id' => $child_id, "childModel" => $childModel));
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {


        if (isset($_POST['ajax']) && $_POST['ajax'] === 'project-form') {
            //echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Set comments for appSettng action 
     */
    public function actionAppSettings() {
        /* Complete Model name */
        $model = new ConfMisc();

        $this->render("appSettings/index", array('model' => $model));
    }

    /**
     * 
     * paypall settings
     */
    public function actionPayPallSettings($id = 2) {
        if ($id != 0) {
            $model = Paypalsettings::model()->findByPk($id);
            if (isset($_POST['Paypalsettings'])) {
                $model->attributes = $_POST['Paypalsettings'];
                if ($model->save()) {
                    Yii::app()->user->setFlash("success", "Data has been saved successfully");
                    $this->redirect($this->createUrl('/configurations/payPallSettings', array('id' => 2)));
                }
            }
            $this->render("//paypallsettings/index", array("model" => $model));
        }
    }

    public function actionPaymentNotifications() {

        $transfer_Model = new AdminPaymentTransfer();
        $this->filters = array(
            'payment_status' => array(
                "initiated" => "Initiated",
                "completed" => "Completed",
                "paying" => "Paying",
                "cancelled" => "Cancelled",
            ),

        );

        $this->layout = "column2";
        $model = new PaymentPaypallAdaptive('search');
        $criteria = new CDbCriteria();
        if (isset($_GET['PaymentPaypallAdaptive'])) {
            $model->attributes = $_GET['PaymentPaypallAdaptive'];
            $criteria->compare('payment_status', $model->payment_status);
          
        }

        $dataProvider = new CActiveDataProvider('PaymentPaypallAdaptive', array(
            'criteria' => $criteria,
        ));

        //transfer money
        if (isset($_POST['AdminPaymentTransfer'])) {
            $transfer_Model->attributes = $_POST['AdminPaymentTransfer'];
            $transfer_Model->selection = isset($_POST['id']) ? $_POST['id'] : "";
            if ($transfer_Model->validate()) {
                $url = $transfer_Model->transferMoney($transfer_Model->selection);
                if ($url != "") {
                    $this->redirect($url);
                } else {
                    Yii::app()->user->setFlash("error", "Some things not completed pleas try again");
                    $this->redirect($this->createUrl("/configurations/paymentNotifications"));
                }
            }
        }

        $this->render("//payment/notifications", array(
            "dataProvider" => $dataProvider,
            "model" => $model,
            "transfer_Model" => $transfer_Model
        ));
    }

    /**
     * 
     * @param type $ids
     */
    public function actionNotificationConfirm($ids = "") {
        $ids = explode(",", $ids);

        foreach ($ids as $id) {
            $model = PaymentPaypallAdaptive::model()->findByPk($id);
            Yii::app()->user->setFlash("success", "Payment has been Transfered");
            $model->updateByPk($id, array("puzzzle_admin_status" => "tranfered"));
            $model = PaymentPaypallAdaptive::model()->findByPk($id);
            $model->saveHistory();
            $this->redirect($this->createUrl("/configurations/paymentNotifications"));
        }
    }

}
