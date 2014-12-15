<?php

class UsersController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    public function filters() {
        return array(
            'accessControl',
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {

        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index', 'delete', 'view', 'create', 'update'),
                'users' => array('developer'),
            ),
            array('allow',
                'actions' => array('changePass', 'profile','updateProfile'),
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
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionProfile() {

        $model = Users::model()->findByPk(Yii::app()->user->id);
        $this->render('profile', array('model' => $model));
    }
    
    public function actionUpdateProfile() {
        $model = Users::model()->findByPk(Yii::app()->user->id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            if ($model->save()) {
                Yii::app()->user->setFlash("success", "Data has been saved successfully");
                $this->redirect(array('profile'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Users;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            $itst = new DTFunctions();
            $model->activation_key = $itst->getRanddomeNo(25);
            if ($model->save()) {
                Yii::app()->user->setFlash("success", "Data has been saved successfully");
                $this->generateEmail($model);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * genreate email message
     * for registration 
     */
    public function generateEmail($model) {

        $email['From'] = Yii::app()->params['adminEmail'];
        $email['To'] = $model->email;
        $email['Subject'] = "Congratz! You are now registered on " . Yii::app()->name;
        $body = "You are now registered on " . Yii::app()->name . ", please validate your email";
        $body.=" Temporary Password is : test123<br /> \n";
        $body.=" going to this url: <br /> \n" . $model->getActivationUrl();
        $email['Body'] = $body;


        $email['Body'] = $this->renderPartial('common/_email_template', array('email' => $email, "heading" => "Dear " . $model->name), true, false);
        //  CVarDumper::dump($email, 10, true); die;

        $this->sendEmail2($email);
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

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
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
    public function actionDelete($id) {

        $this->loadModel($id)->delete();


        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Users('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Users']))
            $model->attributes = $_GET['Users'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        // criteria is added to prevent access by url
        $superAdmin = $this->_authorizer->getSuperusers();
        $criteria = new CDbCriteria();

        $model = Users::model()->findByPk($id, $criteria); /* checking the currently creating user is superAdmin or not */

        $criteria->condition = ($model->username == $superAdmin[0]) ? 'username = :username' : 'username <> :username';
        //$criteria->condition = 'username <> :username';
        //$criteria->condition = 'username = :username'; /*Enabling User profile updation*/
        $criteria->params = array(':username' => $superAdmin[0]);
        $model = Users::model()->findByPk($id, $criteria);

        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Users $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * change password of login user
     */
    public function actionChangePass() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $this->layout = "//layouts/column2";
        if (Yii::app()->user->isGuest) {
            // If the user is guest or not logged in redirect to the login form
            $this->redirect(array('site/login'));
        } else {
            $model = new ChangePassword;
            if (isset($_POST['ChangePassword'])) {

                $model->attributes = $_POST['ChangePassword'];
                if ($model->validate()) {

                    $user = $model->_model;
                    $user->password = $model->password;
                    $user->save(false);
                    Yii::app()->user->setFlash("success", "Your Password change Successfully");
                    $this->redirect($this->createUrl("changePass"));
                }
            }

            $this->render('//users/changepass', array('model' => $model));
        }
    }

}
