<?php

class PlugginController extends Controller {

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
                'actions' => array('create', 'update', 'index', 'view', 'delete',
                    'createNewLanguage', 'home', 'getHomePageSetting'),
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
        $this->manageRelations($model, $related, $related_id);

        $this->render('view', array(
            'model' => $model,
            'related' => $related,
            'related_id' => $related_id,
        ));
    }

    /**
     * create languages
     */
    public function actionCreateNewLanguage($id, $related = "", $related_id = "") {

        $model = $this->loadModel($id);
        $this->manageRelations($model, $related, $related_id);

        $this->render("/Pluggin/_lang_form", array("model" => $model, "id" => $model->id));
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

    //manage relationships here

    public function manageRelations($model, $related = "", $related_id = "") {

        switch ($related) {
            case "Pluggin":
                $this->setDefaultRelations($model);
                if (!empty($related_id)) {
                    $model->$related = Pluggin::model()->findByPk($related_id);
                }
                $model->$related->parent = $model->id;
                if (isset($_POST['Pluggin'])) {
                    $model->$related->attributes = $_POST['Pluggin'];
                    if ($model->$related->save()) {
                        $this->redirect(array('view', 'id' => $model->id, "related" => $related, "related_id" => $model->$related->id));
                    }
                }
                break;
            case "Pluggin_images":
                $this->setDefaultRelations($model);
                if (!empty($related_id)) {
                    $model->$related = PlugginImage::model()->findByPk($related_id);
                }
                $model->$related->pluggin_id = $model->id;
                if (isset($_POST['PlugginImage'])) {
                    $model->$related->attributes = $_POST['PlugginImage'];
                    if ($model->$related->save()) {
                        $this->redirect(array('view', 'id' => $model->id, "related" => $related, "related_id" => $model->$related->id));
                    }
                }
                break;
            default:
                $this->setDefaultRelations($model);
                break;
        }
    }

    /**
     * set all default relations
     */
    public function setDefaultRelations($model) {
        //handle other relations
        //$model->Pluggin_images = new PlugginImage();
        //$model->Pluggin_images->pluggin_id = $model->id;
    }

    /**
     * 
     * @param type $model
     * @param type $related
     * @param type $related_id
     */
    public function deleteRelations($related = "", $related_id = "") {

        switch ($related) {
            case "Pluggin":
                Pluggin::model()->deleteByPk($related_id);
                break;
            case "Pluggin_images":
                PlugginImage::model()->deleteByPk($related_id);
                break;
            default:
                break;
        }
    }

    /*
     * home page settings
     */

    public function actionHome($id, $object_type, $lang_id) {
        $criteria = new CDbCriteria();

        $criteria->addCondition("id =:id AND object_type = :object_type AND lang_id = :lang_id");
        $params = array(
            'id' => $id,
            'lang_id' => $lang_id,
            'object_type' => $object_type,
        );
        $criteria->params = $params;
        if ($model = HomePageItems::model()->find($criteria)) {
            
        } else {
            $model = new HomePageItems;
        }
        $model->lang_id = $lang_id;
        $model->id = $id;
        $model->object_type = $object_type;
        if (isset($_POST['HomePageItems'])) {
            $model->attributes = $_POST['HomePageItems'];
            if ($model->save()) {
                Yii::app()->user->setFlash("success", "Data has been saved successfully");
                if ($model->object_type == "Pluggin") {
                    $this->redirect($this->createUrl("/Pluggin/view", array("id" => $id)));
                } else if ($model->object_type == "diary") {
                    $this->redirect($this->createUrl("/motoDairy/index", array("id" => $id)));
                }
            }
        }
        $this->render("//Pluggin/home_page", array("model" => $model));
    }

    /**
     * get home page settings
     */
    public function actionGetHomePageSetting() {
        $this->render("//Pluggin/home_page_settings");
    }

}
