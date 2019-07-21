
<div Style="" class='w3-container w3-center'>




<form action="<?php echo site_url("Dashboard_ext/change_password"); ?>" method="POST">


 <b class="w3-large w3-text-theme">Change Password
</b><br>

<?php
echo '<div class="w3-text-red">'.validation_errors().'</div>';

if(isset($_SESSION['err_msg']))
{

  echo '<div class="w3-text-red">'.$_SESSION["err_msg"].'</div>';
  unset($_SESSION["err_msg"]);
}
?>

<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-key
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='password' name='pass' placeholder='Current Password'/>
</div>

<br>

<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-unlock-alt
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='password' name='npass'  value="<?php echo set_value("npass"); ?>" placeholder='New Password'/>
</div>



<br>

<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-unlock-alt
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='password' name='cpass'  value="<?php echo set_value("cpass"); ?>" placeholder='Confirm Password'/>
</div>
<br>
<input type='submit' name='submit' value='Change Password' class='w3-button w3-theme'/>




</form>
</div>
