<?php

/*
 * setting url for admin site
 * to beautify url in admin site
 * author:ubd
 */
$rules_admin = array(
    /** admin url ** */
    'admin/login' => '/site/login',
    'gii' => 'gii',
    'config/<m:[\w-\.]+>' => '/configurations/load',
    'config/paypall-setting/<id:[\w-\.]+>' => '/configurations/payPallSettings',
    'config/payment/history/' => '/configurations/paymentHistory',
    //plateform create 
    'plateform/index' => '/plateform/index',
    'plateform/<id:[\w-\.]+>/view-<related:[\w-\.]+>-<related_id:[\w-\.]+>' => '/plateform/view',
    'plateform/<id:[\w-\.]+>/view-<related:[\w-\.]+>' => '/plateform/view',
    'plateform/<id:[\w-\.]+>/view' => '/plateform/view',
    'plateform/<id:[\w-\.]+>/update' => '/plateform/update',
    'plateform/<id:[\w-\.]+>/delete-<related:[\w-\.]+>-<related_id:[\w-\.]+>' => '/plateform/delete',
    'plateform/<id:[\w-\.]+>/delete-<related:[\w-\.]+>' => '/plateform/delete',
    'plateform/<id:[\w-\.]+>/delete' => '/plateform/delete',
    'plateform/create' => '/plateform/create',
    //pluggin create 
    'pluggin/index' => '/pluggin/index',
    'pluggin/<id:[\w-\.]+>/view-<related:[\w-\.]+>-<related_id:[\w-\.]+>' => '/pluggin/view',
    'pluggin/<id:[\w-\.]+>/view-<related:[\w-\.]+>' => '/pluggin/view',
    'pluggin/<id:[\w-\.]+>/view' => '/plateform/view',
    'pluggin/<id:[\w-\.]+>/update' => '/plateform/update',
    'pluggin/<id:[\w-\.]+>/delete-<related:[\w-\.]+>-<related_id:[\w-\.]+>' => '/pluggin/delete',
    'pluggin/<id:[\w-\.]+>/delete-<related:[\w-\.]+>' => '/pluggin/delete',
    'pluggin/<id:[\w-\.]+>/delete' => '/pluggin/delete',
    'pluggin/create' => '/pluggin/create',
    'admin/pluggin/deleteChildByAjax' => '/pluggin/deleteChildByAjax',
    'admin/pluggin/editChild' => '/pluggin/editChild',
    'admin/pluggin/loadChildByAjax' => '/pluggin/loadChildByAjax',
);
/* * ----------- advertinsg -----------* */
?>
