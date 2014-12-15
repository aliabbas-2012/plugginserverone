<?php

/**
 * @author Ali Abbas
 * @abstract use for 
 *  setting import class
 *  
  /**
 * Application Components 
 */
$conf_component_user = array(
    /* enable cookie-based authentication */
    'allowAutoLogin' => true,
    'class' => 'DTWebUser',
        //'loginUrl'=>array('/web/default/index'),
);
$conf_component_authManager = array(
    'class' => 'RDbAuthManager', // Provides support authorization item sorting. ...... 
);
?>
