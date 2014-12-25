<?php

class UsersController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
            /*"https +array('changePass','setNewPass')",*/
            /*"http + array(activate','register','updateProfile','updateProfile','forgot','productReview','customerHistory','orderDetail','print','customerDetail')"*/
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('login','register', 'activate', 'setNewPass', 'ProductReview', 'forgot'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(
                    'updateprofile', 'ChangePass', 'CustomerHistory',
                    'customerDetail', 'print',
                    'OrderDetail'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionRegister() {
        $this->layout = "//layouts/frontend";
        $model = new Users;
        
        if (isset($_POST['Users'])) {

            $model->attributes = $_POST['Users'];

            $model->activation_key = sha1(mt_rand(10000, 99999) . time() . $model->email);
            $activation_url = $this->createUrl('/web/users/activate', array('key' => $model->activation_key));
            
            if ($model->save()) {

                //Sending email part - For activation

                $subject = "Your Activation Link";
                $message = "Please click this below to activate your account <br /><br />" .$this->createAbsoluteUrl('/web/users/activate', array('key' => $model->activation_key, 'id' => $model->id)) ."<br /><br /> Thanks you ";

                $email['FromName'] = Yii::app()->params['systemName'];
                $email['From'] = Yii::app()->params['adminEmail'];
                $email['To'] = $model->email;
                $email['Subject'] = "Your Activation Link";
                $body = "You are now registered on " . Yii::app()->name . ", please validate your email <br/>" . $message;
                //$body.=" going to this url: <br /> \n" . $model->getActivationUrl();
                $email['Body'] = $body;
                $email['Body'] = $this->renderPartial('//users/_email_template', array('email' => $email), true, false);
                
                $this->sendEmail2($email);
                Yii::app()->user->setFlash('registration', 'Thank you for Registration...Please activate your account by visiting your email account.');
                $this->redirect($this->createUrl('/web/default/index'));  ///take him to login page....
            }
        }

        $this->render('//users/register', array(
            'model' => $model,
        ));
    }

    /**
     * This will be responsible for logging in the user to the system
     */
    public function actionLogin(){
        
        $this->layout = "//layouts/frontend";
        
        $model = new LoginForm;
        
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            var_dump($model->validate());
            var_dump($model->login());
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()){
                if(!empty(Yii::app()->user->returnUrl)){
                    $this->redirect($this->createUrl("/web/default/index"));
                }
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        
        $this->render("//users/_login");
    }
    
    public function actionActivate() {
        $this->layout = "//layouts/frontend";
        //Yii::app()->user->SiteSessions;
        $id = $_GET['id'];
        $activation_key = $_GET['key'];
        $criteria = new CDbCriteria;
        $criteria->select = '*';
        $criteria->condition = "id='" . $id . "'";
        $obj = Users::model()->find($criteria);
       
        if (!empty($obj)) {
            if ($obj->is_active == '1') {
                //already activated
                Yii::app()->user->setFlash('login', 'Your account is already activated. Please try login or if you have missed your login information then go to forgot password section. Thank You');
                $this->redirect($this->createUrl('/web/users/login'));
            } else if ($obj->activation_key != $activation_key) {
                Yii::app()->user->setFlash('login', 'Your activation key not registered. Please resend activation key and activate your account. Thank You');
                $this->redirect($this->createUrl('/web/users/login'));
            }

            Yii::app()->user->setFlash('login', 'Thank You ! Your account has been activated....Now Please Login');
            
            $modelUsers = new Users();
            $modelUsers->updateByPk($id, array('is_active' => '1'));
            $this->redirect($this->createUrl('/web/users/login'));
            
        } else {
            Yii::app()->user->setFlash('login', 'User does not exist. Please signup and get activation link.');
            $this->redirect($this->createUrl('/web/users/login'));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Users::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionUpdateProfile($id) {
        $this->layout = "//layouts/frontend";
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update_profile', array(
            'model' => $model,
        ));
    }

    public function actionForgot() {
        $this->layout = "//layouts/frontend";
        //Yii::app()->user->SiteSessions;
        if (isset($_POST['Users'])) {
            $record = Users::model()->find(array(
                'select' => '*',
                'condition' => "email='" . $_POST['Users']['email'] . "'"
                    )
            );
            if ($record === null) {
                Yii::app()->user->setFlash('incorrect_email', 'Email does not exists...Please try correct email address');
            } else {

                $pass_new = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 7)), 0, 9);
                $body = "Your New Password : " . $pass_new;
                $email['FromName'] = Yii::app()->params['systemName'];
                $email['From'] = Yii::app()->params->adminEmail;
                $email['To'] = $record->email;
                $email['Subject'] = "Your New Password";
                $email['Body'] = $body;
                
                $email['Body'] = $this->renderPartial('//users/_email_template', array('email' => $email), true, false);
                $this->sendEmail2($email);

                $id = $record->id;
                
                
                    $modelUsers = new Users;
                    $pass_new = md5($pass_new);
                    if ($modelUsers->updateByPk($id, array('password' => "$pass_new"))) {
                        //Users::updateAll(array('email=>'), $condition='', $params=array());

                        Yii::app()->user->setFlash('password_reset', 'Your passowrd has been sent to your Email.Please get your new password form your email account');
                    }
            }
        }

        $this->render('//users/forgot_password', array('model' => Users::model()));
    }

    /*
     * 
     * @return method for change users password.
     */

    public function actionChangePass() {
        $this->layout = "//layouts/frontend";
        //Yii::app()->user->SiteSessions;
        //Yii::app()->controller->layout = '//layouts/main';
        $model = new ChangePassword;
        if (Yii::app()->user->id) {
            if (isset($_POST['ChangePassword'])) {
                $model->attributes = $_POST['ChangePassword'];
                if ($model->validate()) {
                    if ($model->updatePassword()) {
                        /*
                         * here we will add sending email module to inform users for password change..
                         */
                        $this->redirect($this->createUrl('/web/users/changePass'));
                    }
                }
            }
            $this->render('//users/change_password', array('model' => $model));
        }
    }

    /**
     * Set New Password here
     * from when special users request 
     * is made here
     */
    public function actionSetNewPass() {
        $this->layout = "//layouts/frontend";
        //Yii::app()->user->SiteSessions;
        //Yii::app()->controller->layout = '//layouts/main';

        if (isset($_GET['key']) && $_GET['id']) {
            $model = new NewPassword();

            if (isset($_POST['NewPassword'])) {
                $model->attributes = $_POST['NewPassword'];
                if ($model->validate()) {
                    if ($model->updatePassword($_GET['id'])) {
                        /*
                         * here we will add sending email module to inform user for password change..
                         */
                        $this->redirect($this->createUrl('/web/users/login'));
                    }
                }
            }

            $this->render('//users/new_password', array('model' => $model));
        }
    }

    public function actionProductReview() {

        $modelComment = new ProductReviews;
        
        if (isset($_POST['ProductReviews'])) {
            $modelComment->attributes = $_POST['ProductReviews'];
            $modelComment->added_date = time();
            $modelComment->is_approved = '1';
            $modelComment->id = Yii::app()->user->id;

            if (!isset($_POST['ratingUsers'])) {
                $modelComment->rating = 5;
            } else {
                $modelComment->rating = $_POST['ratingUsers'];
            }

            $product = Product::model()->findByPk($modelComment->product_id);

            $url = $this->createUrl('/web/product/productDetail', array(
                'country' => Yii::app()->session['country_short_name'],
                'city' => Yii::app()->session['city_short_name'],
                'city_id' => Yii::app()->session['city_id'],
                "pcategory" => $product->parent_category->category_slug,
                "slug" => $product->slag,
            ));


            if ($modelComment->save()) {
                $this->redirect($url);
            } else {
                echo CHtml::errorSummary($modelComment);
                $this->redirect($url);
            }
        }
    }

    /**
     * show customer order history
     * 
     */
    public function actionCustomerHistory() {
        //Yii::app()->user->SiteSessions;
        $ip = Yii::app()->request->getUserHostAddress();
        $order_history = Users::model()->customerHistory();
        $this->render('//users/customer_history', array('history' => $order_history));
    }

    public function actionPrint($id) {
        //Yii::app()->user->SiteSessions;
        $model = Order::model()->findByPk($id);

        /**
         * order detail part
         * 
         */
        $model_d = new OrderDetail('Search');
        $model_d->unsetAttributes();  // clear any default values
        $model_d->order_id = $id;
        if (isset($_GET['OrderDetail'])) {
            $model_d->attributes = $_GET['Order'];
        }

        $this->renderPartial('//users/print', array('model' => $model, "model_d" => $model_d), false, false);
    }

    /**
     * customer order detail
     * to fetch
     */
    public function actionCustomerDetail($id) {
        //Yii::app()->user->SiteSessions;
        $model = Order::model()->findByPk($id);

        /**
         * order detail part
         * 
         */
        $model_d = new OrderDetail('Search');
        $model_d->unsetAttributes();  // clear any default values
        $model_d->order_id = $id;
        if (isset($_GET['OrderDetail'])) {
            $model_d->attributes = $_GET['Order'];
        }

        $this->render('//users/order_detail', array('model' => $model, "model_d" => $model_d));
    }

    /**
     * load products under history
     * @param type $id
     */
    public function actionOrderDetail($id) {

        //Yii::app()->user->SiteSessions;
        $model = new OrderDetail('Search');
        $model->unsetAttributes();  // clear any default values
        $model->order_id = $id;
        if (isset($_GET['Order'])) {
            $model->attributes = $_GET['Order'];
        }
        $this->renderPartial('//users/_order_detail', array(
            'model' => $model,
        ));
        Yii::app()->end();
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

}