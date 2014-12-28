<?php

/*
 * all User Pluggins
 */

class UserPlugginController extends Controller {

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(
                    'index','plans'),
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
    /**
     * 
     */
    public function actionPlans($info_id,$pluggin_id){
        
        $model = Pluggin::model()->findByPk($pluggin_id);
        $this->render("//userPluggin/plans",array("model"=>$model,'info_id'=>$info_id));
    }

}
