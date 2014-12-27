<?php

/*
 * setting url for web module
 * to beautify url in user's site
 * author:ubd
 */
$rules_web = array(
    /** other urls * */
    '' => '/web/default/index',
    'about-us/<target:[\w-\.]+>/' => '/web/default/aboutUs',
    'about-us' => '/web/default/aboutUs',
    'ideas' => '/web/default/ideas',
    'notification' => '/web/default/notification',
    'contact-us' => '/web/default/contactus',
    'slider/<slug:[\w-\.]+>/' => '/web/default/loadSlider',
    
    /*Users Links */
    'login' => '/web/users/login',
    'signup' => '/web/users/register',
    
    /* api **/
    'api-index'=>'web/api/index',
    
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
  
        //
);
?>
