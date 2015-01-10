<?php

class PlugginController extends AdminController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {

        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array_merge(parent::alloweActions(), array('create', 'update', 'index', 'view', 'delete',
                    'plans', 'editPlansStatus'
                )),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id, $related = "", $related_id = "") {
        $model = $this->loadModel($id);
        $this->manageChildrens($model);

        $this->render('view', array(
            'model' => $model,
            'related' => $related,
            'related_id' => $related_id,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Pluggin;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pluggin'])) {
            $model->attributes = $_POST['Pluggin'];
            $this->checkCilds($model);
            if ($model->save()) {
                Yii::app()->user->setFlash("success", "Data has been saved successfully");
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pluggin'])) {
            $model->attributes = $_POST['Pluggin'];
            if ($model->save()) {
                Yii::app()->user->setFlash("success", "Data has been saved successfully");
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id, $related = "", $related_id = "") {

        if (!empty($related)) {
            $this->deleteRelations($related, $related_id);
        } else {
            $this->loadModel($id)->delete();
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model = new Pluggin('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pluggin']))
            $model->attributes = $_GET['Pluggin'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /*
     * Plans registerd
     */

    public function actionPlans($info_id, $pluggin_id) {
        $model = new UserPlans('search');
        $model->pluggin_site_info_id = $info_id;
//        $model->is_active = 1;

        $pluggin = Pluggin::model()->findByPk($pluggin_id);
        $this->render('plans', array(
            'model' => $model,
            'pluggin' => $pluggin,
        ));
    }

    /**
     * edit plan status
     * @param type $id
     */
    public function actionEditPlansStatus($id) {
        $model = UserPlans::model()->findByPk($id);
        if (isset($_POST['UserPlans'])) {
            $model->attributes = $_POST['UserPlans'];
            $model->updateByPk($id, array("is_active" => $model->is_active));
            Yii::app()->user->setFlash("success", "Status been updated successfully");
            
            $body = "Admin Email: ".CHtml::mailto('Email Admin',Yii::app()->user->User->email);

            $email['FromName'] = Yii::app()->params['systemName'];
            $email['From'] = Yii::app()->params->adminEmail;
            $email['To'] = "";
            $email_status = $model->is_active ==0?"Disabled":"Enabled";
            $email['Subject'] = "Your plan has been ".$email_status." By Admin";
            $extra_body  = "Dear User ".$email['Subject']." For further information please contact admin ";
            $email['Body'] = $extra_body.$body;

            $email['Body'] = $this->renderPartial('//common/_email_template', array('email' => $email), true, false);
            $this->sendEmail2($email);
            
            $this->redirect(array('/pluggin/editPlansStatus', 'id' => $model->id));
        }
        $this->render('user_plan', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Pluggin the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Pluggin::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Pluggin $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'Pluggin-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    private function checkCilds($model) {

        if (isset($_POST['PlugginPlans'])) {
            $model->setRelationRecords('pluggin_plans', is_array($_POST['PlugginPlans']) ? $_POST['PlugginPlans'] : array());
        }
        if (isset($_POST['PlugginImage'])) {
            $model->setRelationRecords('pluggin_images', is_array($_POST['PlugginImage']) ? $_POST['PlugginImage'] : array());
        }

        return true;
    }

    /**
     * will be used to manage child at 
     * view mode
     * @param type $model 
     */
    private function manageChildrens($model) {

        $this->manageChild($model, "pluggin_plans", "pluggin");
        $this->manageChild($model, "pluggin_images", "pluggin");
    }

}
