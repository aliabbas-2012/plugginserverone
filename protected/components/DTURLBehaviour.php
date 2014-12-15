<?php

class DTURLBehaviour extends CBehavior
{

    public function attach($owner)
    {
        // set the event callback
        $owner->attachEventHandler('onBeginRequest', array($this, 'beginRequest'));
    }

    /**
     * This method is attached to the 'onBeginRequest' event above.
     * */
    public function beginRequest(CEvent $event)
    {
        $route = Yii::app()->getUrlManager()->parseUrl(Yii::app()->getRequest());
        $controllers = array("product");
        return true;
  
    }

}

?>
