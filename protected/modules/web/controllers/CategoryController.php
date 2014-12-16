<?php

class PlateformController extends PublicController {

    public $layout = "//layouts/main";

    public function actionIndex($plateform = '') {
        $this->page_key = "tours-bikes";
        $criteria = new CDbCriteria();
        $criteria->addCondition("name = :name");
        $criteria->params = array(
            ':name' => $plateform
        );
        $model = Plateform::model()->find($criteria);
        //contact us model

        $contact = new ContactForm;

        if (isset($_POST['ContactForm'])) {
            $contact->attributes = $_POST['ContactForm'];
            $this->sentContactEmail($contact);
        }
        if (isset($_GET['ajax'])) {
            $this->renderPartial('//default/_contact_form', array('model' => $contact));
        } else {
            $this->render('//plateform/index', array('model' => $model, "contact" => $contact));
        }
    }

    /**
     * 
     * @param type $plateform
     * @param type $slug
     */
    public function actionDetail($plateform = "", $slug = "") {
        $slug = explode("-", $slug);
        $id = $slug[0];

        $model = Pluggin::model()->findByPk($id);

        $this->pageTitle = "[" . Yii::app()->name . "]" . $model->name;
        $this->meta_keywords = $model->meta_title;
        $this->meta_description = $model->meta_description;

        //contact us model

        $contact = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $contact->attributes = $_POST['ContactForm'];
            $this->sentContactEmail($contact);
        }
        if (isset($_GET['ajax'])) {
            $this->renderPartial('//default/_contact_form', array('model' => $contact));
        } else {
            $this->render('//plateform/detail', array('model' => $model, "contact" => $contact));
        }
    }

}
