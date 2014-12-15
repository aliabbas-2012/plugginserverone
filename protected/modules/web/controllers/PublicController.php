<?php

/**
 * Description of PublicController
 *
 * @author ali
 */
class PublicController extends Controller {

    /**
     * 
     * @param type $model
     */
    public function sentContactEmail($model) {
        if ($model->validate()) {

            $email['To'] = CHtml::listData(Users::model()->getAdminUsers(),'email','email');
            $email['FromName'] = $model->name;
            $email['From'] = $model->email;
            if(empty($model->subject)){
                $email['Subject'] = 'Contact  From Mr/Mrs: ' . $model->name;
            }
            else {
                $email['Subject'] = 'Contact [ ' . $model->subject." ]";
            }
            
            $email['date'] = $model->date;
            $email['Body'] = $model->body;
            $email['Body'] = $this->renderPartial('//common/_email_template', array('email' => $email),true);
            //die($email['Body']);
            $this->sendEmail2($email);

            Yii::app()->user->setFlash('success', 'Thank you ! for your feedback ');
            $this->redirect(Yii::app()->request->url);
        }
        return $model;
    }

}
