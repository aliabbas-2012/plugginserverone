<?php

class ConfigurationsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('load'),
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
            if ($child_id!="new") {
               $childModel = $childModel->findByPk($child_id);
            }
      
            if (isset($_POST[$model->childModel])) {
                /* Assign attributes */

                $childModel->attributes = $_POST[$model->childModel];
                $childModel->parent_id = $model->id;
                /* Save record */
                if ($childModel->save()) {
                    Yii::app()->user->setFlash("success", "Data has been saved successfully");
                    $this->redirect(array('load', 'm' => $m, "id" => $model->id,"child_id"=>"new"));
                }
            }
        } else {
            if (isset($_POST[$model_name])) {
                /* Assign attributes */

                $model->attributes = $_POST[$model_name];
                /* Save record */
                if ($model->save()) {
                    Yii::app()->user->setFlash("success", "Data has been saved successfully");
                    $this->redirect(array('load', 'm' => $m, "id" => $model->id,"child_id"=>"new"));
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

}
