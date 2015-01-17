<?php


echo "Your Plugin has expired! You need to upgrade your Plugin to ".
        "use it's services in the future";
echo "<br/>";
?>
<label for="signin">Go To our My Plugin and Click on your url  </label>
<br/>
<a href="<?php echo $this->createAbsoluteUrl('/web/users/login',array('url'=>$pluggin_site->site_name,'pluggin'=>$pluggin_site->plugin->name)); ?>" target="_blank"  title="Click to Sign In">Sign In</a>