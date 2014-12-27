<?php
$params = array("url"=>$pluggin_site->site_name,"pluggin"=>$pluggin_site->pluggin_id);
echo "<h2>";
    echo CHtml::link("Already have login",$this->createAbsoluteUrl("/web/users/login",$params));
echo "</h2>";
echo "<br/>";

echo "<h2>";
    echo CHtml::link("Register ",$this->createAbsoluteUrl("/web/users/register",$params));
echo "</h2>";




?>