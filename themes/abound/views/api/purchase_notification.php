<h3>Your Trail period has over. You need to upgrade your plugin!</h3>

<label for="signup">Not Already registered ? </label>
<a href="<?php echo $this->createAbsoluteUrl('/web/users/register',array()); ?>" target="_blank" title="Click to Sign Up">Sing Up</a>

OR

<label for="signin">Already registered ? </label>
<a href="<?php echo $this->createAbsoluteUrl('/web/users/login',array()); ?>" target="_blank"  title="Click to Sign In">Sing In</a>