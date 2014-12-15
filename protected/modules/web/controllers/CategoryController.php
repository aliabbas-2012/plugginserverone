<?php

class CategoryController extends PublicController {

    public $layout = "//layouts/main";

    public function actionIndex($category = '') {
        $this->page_key = "tours-bikes";
        $criteria = new CDbCriteria();
        $criteria->addCondition("name = :name");
        $criteria->params = array(
            ':name' => $category
        );
        $model = Category::model()->find($criteria);
        //contact us model

        $contact = new ContactForm;

        if (isset($_POST['ContactForm'])) {
            $contact->attributes = $_POST['ContactForm'];
            $this->sentContactEmail($contact);
        }
        if (isset($_GET['ajax'])) {
            $this->renderPartial('//default/_contact_form', array('model' => $contact));
        } else {
            $this->render('//category/index', array('model' => $model, "contact" => $contact));
        }
    }

    /**
     * 
     * @param type $category
     * @param type $slug
     */
    public function actionDetail($category = "", $slug = "") {
        $slug = explode("-", $slug);
        $id = $slug[0];

        $model = Tour::model()->findByPk($id);

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
            $this->render('//category/detail', array('model' => $model, "contact" => $contact));
        }
    }

}
