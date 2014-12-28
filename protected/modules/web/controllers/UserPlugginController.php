<?php

/*
 * all User Pluggins
 */

class UserPlugginController extends Controller {

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(
                    'index', 'plans', 'purchase', 'confirmPurchase'),
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

    /**
     * 
     * @param type $id
     * @param type $info
     */
    public function actionConfirmPurchase($id, $info = '') {
        $info = PlugginSiteInfo::model()->findByPk($info);
        $model = PlugginPlans::model()->findByPk($id);
        
        $purchase_plan = new UserPlans;
        $purchase_plan->user_id = Yii::app()->user->id;
        $purchase_plan->pluggin_site_info_id = $info->id;
        $purchase_plan->pluggin_plan_id = $model->id;
        $purchase_plan->is_active = 1;
        $purchase_plan->start_date = date("Y-m-d");
        
        if(strstr($model->plan_rel->name, 'Week')){
            
        }
        
        echo $model->plan_rel->name;
       ///$purchase_plan->end_date = 1;
    }

}
