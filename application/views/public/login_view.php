<div class='w3-container'>

<div class='w3-container  w3-card-4 w3-panel w3-leftbar w3-rightbar w3-border-indigo'>
  <div class="w3-container w3-center" style="">
 </div><br>
 <div>
   <form class='w3-center' method='POST' action='<?php echo site_url('users/login'); ?>'>
<h4 class='w3-text-theme'><b>Students Login</b></h4>
<div class='w3-text-red'><?php

echo validation_errors();
 if(isset($_SESSION['action_status_report']))
{

  echo $_SESSION['action_status_report'];

}
?></div>
<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-at
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='email' name='email'  value="<?php echo set_value("email"); ?>" placeholder='Email Address'/>
</div>

<br>

<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-unlock-alt
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='password' name='password' placeholder='password'/>
</div>


<input class='w3-center w3-button w3-theme w3-margin-top w3-margin-bottom' type='submit' name='submit' value='Sign In'/>



</div>
   </form>

<center>
   <div class="w3-text- w3-small w3-margin-bottom w3-margin-bottom">Don't have account yet? <span class="w3-text-theme"><?php
echo "<a href='";
echo site_url('users/register');
echo "'>Create Account Here</a>";

     ?></span></div>
</center>
 </div>





</div>
