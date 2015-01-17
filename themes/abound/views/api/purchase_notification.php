<h3>Your Trail period has over. You need to upgrade your plugin!</h3>

<label for="signup">Not Already registered ? </label>
<a href="<?php echo $this->createAbsoluteUrl('/web/users/register',
        array('url'=>$pluggin_site->site_name,'pluggin'=>$pluggin_site->plugin->name)); ?>" target="_blank" title="Click to Sign Up">Sing Up</a>

OR

<label for="signin">Already registered ? </label>
<a href="<?php echo $this->createAbsoluteUrl('/web/users/login',array('url'=>$pluggin_site->site_name,'pluggin'=>$pluggin_site->plugin->name)); ?>" target="_blank"  title="Click to Sign In">Sign In</a>