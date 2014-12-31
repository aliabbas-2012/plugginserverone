<?php

class ApiController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
        );
    }

    /**
     * cache settings
     * @return type
     */
    public function filters() {

        return array(
        );
    }

    /**
     * redirect site to for having www  lazmi
     * @param type $action
     * @return type
     */
    public function beforeAction($action) {

        return parent::beforeAction($action);
    }

    /**
     * home page
     */
    public function actionIndex() {
        //echo "in the main index funciotn";
        
        if (!empty($_POST['pluggin_name']) && !empty($_POST['host_name'])) {
           //echo "in the plugin name and hostname info case<pre>";
            
            if (($id = Pluggin::model()->getPlugginId($_POST['pluggin_name'])) != '') {
               //echo "in the existing plugin name or id or record";
                $model = new PlugginSiteInfo;
                $model->pluggin_id = $id;
                $model->site_name = $_POST['host_name'];
                $model->save();
                if ($model->hasErrors("_exist")) {
                 //   echo "in the already exiting";
                    $this->findPlans($model->_model);
                } else {
                    echo json_encode(array("status"=>true,"type"=>"trial","message"=>"Your pluggin  has been started for trial version"));
                }
            } else {
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * 
     */
    private function findPlans($pluggin_site) {
//        print_r($pluggin_site->attributes);
      
        //$pluggin_plans = PlugginPlans::model()->getPlugginPlans($pluggin_site->pluggin_id);//these are the all admin plans
        $user_pluggin_plans = PlugginPlans::model()->getPlugginPlans($pluggin_site->pluggin_id);//these are the all admin plans
        
        $hourdiff = round((strtotime(date("Y-m-d H:i:s")) - strtotime($pluggin_site->create_time)) / 3600, 1);
            
        if (empty($user_pluggin_plans)) {
            $hourdiff = round((strtotime(date("Y-m-d H:i:s")) - strtotime($pluggin_site->create_time)) / 3600, 1);
            if($hourdiff>24){
                
                echo json_encode(array("status"=>false,"type"=>"register","message"=>"Your Trial version has expired, Upgrade your plugin"));
                $this->renderPartial("//api/purchase_notification",array("pluggin_site"=>$pluggin_site));
                
            }
            else
            {
                echo json_encode(array("status"=>true));
                //if plugin plans time is over than 24 hours .. then get the time expiray limit 
                // here user will get plans . by getting notificaiton that. you willl get user plans after register with new  
                
                // here i have to inform plugin user that ur trial period is over.. you need to register or login to upgrade your plugin 
                // after register or sign up
                // here i will let a user show the list of pluggin plans against a single plugin 
            }
        } else {
            echo "in the non empty pluggin plan for a single plugin need to upgrade";
             
            // here one needs to hit query UserPlans to get user's latest plans by pluggin_id, order_by created_time descending , limit 1,,
            $user_pluggin_plan = UserPlans::model()->getLatestPlan($pluggin_site);
            //$user_pluggin_plan = UserPlans::model()->getActivePlan($pluggin_site->id);
            
            
            if($user_pluggin_plan->end_date <= strtotime(date("Y-m-d H:i:s")) ){ // plan is running
                echo "success";
            }else{ // plan is expired
                echo "Your Plugin has expired! You need to upgrade your Plugin to use it's services in the future";
            }
            
            // here one needs to hit query UserPlans to get user's latest plans by pluggin_id, order_by created_time descending , limit 1,,
            //whose end date is not greater than user today's date.. 
            // if plan is over ..
            // if plan is live or runnning ... then check  
        }
        die;
    }

}
