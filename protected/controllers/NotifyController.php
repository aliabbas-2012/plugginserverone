<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NotifyController extends Controller {

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
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * List View
     */
    public function actionIndex() {
        $model = new Notify('search');
        $model->unsetAttributes();  // clear any default values
        $model->user_id = Yii::app()->user->id;
        if (isset($_GET['Notify']))
            $model->attributes = $_GET['Notify'];

        $this->render('index', array(
            'model' => $model,
        ));
        $this->render('index');
    }

    /*
     * 
     */

    public function actionView($id) {
        
    }

}
