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
    'activate/password' => '/web/users/activate',
    'set-new/password' => '/web/users/setNewPass',
    'forgot/password' => '/web/users/forgot',
    'change/password' => '/web/users/changePass',
    'update/profile' => '/web/users/updateProfile',
    //others user
    'user-plateform/index' => '/web/default/plateform',
    'user-plugin/index' => '/web/userPluggin/index',
    'user-plugin/plans/<info_id:\w+>/<pluggin_id:\d+>' => '/web/userPluggin/plans',
    'user-plugin/purchase/<id:\w+>/<info:\d+>' => '/web/userPluggin/purchase',
    'user-plugin/pay-to-pay-pall' => '/web/userPluggin/paytopaypall',
    'user-plugin/confirm-purchase' => '/web/userPluggin/confirmPurchase',
    'user-plugin/canel-plan' => '/web/userPluggin/cancelPlan',
    
    /* api **/
    'api-index'=>'web/api/index',
    
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
  
        //
);
?>
