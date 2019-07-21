
<div Style="" class='w3-container w3-center'>




<form action="<?php echo site_url("Dashboard_ext/change_phone"); ?>" method="POST">


 <b class="w3-large w3-text-theme">Change Mobile Number
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
    <i  style='margin-right:3%' class="fa fa-phone
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='tel' name='nphone' placeholder='New Mobile Number'/>
</div>



<br>

<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-phone
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='tel' name='cphone' placeholder='Confirm Mobile Number'/>
</div>
<br>
<input type='submit' name='submit' value='Change Mobile Number' class='w3-button w3-theme'/>




</form>
</div>
