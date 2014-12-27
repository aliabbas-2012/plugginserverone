<?php

/*
 * to handle error from all the system
 */

class ErrorController extends Controller {



    public function actionError() {
        $error = Yii::app()->errorHandler->error;
        if (!empty($error)) {


            $body = "<div style='color:red'>url= " . Yii::app()->request->hostInfo . Yii::app()->request->url . "<br/>";
            $body = $body . "code= " . $error['code'] . "<br/>";
            $body = $body . "type= " . $error['type'] . "<br/>";
            $body = $body . "message= " . $error['message'] . "<br/>";
            $body = $body . "file= " . $error['file'] . "<br/>";
            $body = $body . "line= " . $error['line'] . "<br/>";
            $body = $body . "Browser= " . Yii::app()->request->userAgent . "<br/>";
            $body = $body . "trace= " . $error['trace'] . "<br/></div>";


            Yii::log(str_replace("<br/>", "\n", $body), "info");

     
            $this->renderPartial('//error/error', array('error' => $error));
        }
        else
            throw new CHttpException(404, 'Page not found.');
    }

}

?>
