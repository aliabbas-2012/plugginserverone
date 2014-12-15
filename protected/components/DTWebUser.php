<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DTWebUser extends CWebUser {

    private $_user;



    //get the logged user
    function getUser() {
        if ($this->isGuest)
            return;
        if ($this->_user === null) {
            $this->_user = Users::model()->findByPk($this->id);
        }
        return $this->_user;
    }

}

?>
