<?php

/*
 * all User Pluggins
 */

class UserPlugginController extends Controller {

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(
                    'index',),
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
        $this->render("//userPluggin/index",array("model"=>$model));
    }

}
