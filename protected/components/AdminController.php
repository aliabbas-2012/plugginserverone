<?php

class AdminController extends Controller {
    /*
     * ONly use for admin operation
     *
     */

    public function alloweActions() {
        return array('deleteChildByAjax', 'editChild', 'loadChildByAjax',);
    }

    /**
     *
     * @param <type> $mName
     * @param <type> $index
     */
    public function actionLoadChildByAjax($mName, $dir, $load_for, $index, $upload_index = "") {
        /* Get regarding model */
        $model = new $mName;

        $this->renderPartial($dir . '/_fields_row', array(
            'index' => $index,
            'model' => $model,
            "load_for" => $load_for,
            'dir' => $dir,
            'upload_index' => isset($_REQUEST['upload_index']) ? $_REQUEST['upload_index'] : "",
            'fields_div_id' => $dir . '_fields'), false, true);
    }

    /**
     *
     * @param <type> $id
     * @param <type> $mName
     * @param <type> $dir 
     */
    public function actionEditChild($id, $mName = "", $dir = "") {

        /* Get regarding model */
        $model = new $mName;
        $render_view = $dir . '/_fields_row';

        $model = $model->findByPk($id);


        $this->renderPartial($render_view, array('index' => 1, 'model' => $model,
            "load_for" => "view", 'dir' => $dir, "displayd" => "block",
            'fields_div_id' => $dir . '_fields',
            'upload_index' => isset($_REQUEST['upload_index']) ? $_REQUEST['upload_index'] : ""
                ), false, true);
    }

    /**
     * delete child by ajax
     * @param type $id
     * @param type $mName
     * @throws CHttpException 
     */
    public function actionDeleteChildByAjax($id, $mName) {

        if (Yii::app()->request->isAjaxRequest) {
            $this->deleteChildren($id, $mName);
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * used for reusibility
     * @param type $id
     * @param type $mName
     */
    public function deleteChildren($id, $mName) {
        /* Get regarding model */
        $model = new $mName;

        $model = $model->findByPk($id);

        $model->deleteByPk($id);
    }

}
