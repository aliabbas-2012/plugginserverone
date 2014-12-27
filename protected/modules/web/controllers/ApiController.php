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
       
        if (!empty($_POST['pluggin_name']) && !empty($_POST['host_name'])) {
            if(($id = Pluggin::model()->getPlugginId($_POST['pluggin_name']))!='') {
                $model = new PlugginSiteInfo;
                $model->pluggin_id = $id;
                $model->site_name = $_POST['host_name'];
                $model->save();
                if($model->hasErrors("_exist")){
                    echo "ali";
                }
                else {
                    echo 'Your pluggin  has been started for trial version.'; 
                }
            }
            else {
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.'); 
            }
            

            
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * 
     */
    private function registerPluggin() {
        
    }

}
