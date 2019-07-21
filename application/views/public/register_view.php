<div class='w3-container'>

<div class='w3-container  w3-card-4 w3-panel w3-leftbar w3-rightbar w3-border-indigo'>
  <div class="w3-container w3-center" style="">
 </div><br>
 <div>
   <form class='w3-center' method='POST' action='<?php echo site_url('users/register'); ?>'>
<h4 class='w3-text-theme'><b>Registration</b></h4>

<div class='w3-text-red'><?php echo validation_errors();
if(isset($_SESSION['err_msg']))
{

 echo $_SESSION['err_msg'];

}
 ?></div>

<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-user
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='text' name='firstname'  value="<?php echo set_value("firstname"); ?>"  placeholder='Firstname'/>
</div>


<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-user
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='text' name='lastname'  value="<?php echo set_value("lastname"); ?>"placeholder='Lastname'/>
</div>

<br>


<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-envelope
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='email' name='email'  value="<?php echo set_value("email"); ?>" placeholder='Email'/>
</div>


<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-phone
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='tel' name='phone'  value="<?php echo set_value("phone"); ?>" placeholder='Phone Number'/>
</div>

<br>

<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-unlock-alt
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='password' name='password'  value="<?php //echo set_value("password"); ?>" placeholder='Password'/>
</div>


<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-unlock-alt
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='password' name='cpassword' placeholder='Confirm Password'/>
</div>



<input class='w3-center w3-button w3-theme w3-margin-top w3-margin-bottom' type='submit' name='submit' value='Register'/>



</div>
   </form>



   <center>
      <div class="w3-text- w3-small w3-margin-bottom w3-margin-bottom">Already have Account? <span class="w3-text-theme"><?php
   echo "<a href='";
   echo site_url('users/login');
   echo "'>Login Here</a>";

        ?></span></div>
   </center>
 </div>





</div>
