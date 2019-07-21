
<div class="w3-container"><div class='w3-container w3-center'>
<b>Payment options</b>
<!--
<li class='w3-text-theme'>Pay Online</li>
<form class='w3-center' method='POST' action='<?php echo site_url('Dashboard/payment'); ?>'>


        <?php
        echo '<div class="w3-text-red">'.validation_errors().'</div>';

        if(isset($_SESSION['err_msg']))
        {

          echo '<div class="w3-text-red">'.$_SESSION["err_msg"].'</div>';
          unset($_SESSION["err_msg"]);
        }
        ?>


<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-bank
     w3-large w3-text-theme w3-center w3-margin"></i>
     <input class='w3-center' type='number' min='150' name='amount' placeholder='Amount'/><span class="w3-text-indigo"><del>N</del</span>
</div>
<?php


$array_char = array('A','B','C','D');
$i = mt_rand(0,3);
$ref = 'HM'.uniqid().$array_char[$i];



 ?>

 <input type="hidden" name="ref" value="<?= $ref ?>"/>

<div class="">
<img class="" src="<?= base_url('assets/images/cashenvoy.gif') ?>" />
</div>
<input class='w3-center w3-button w3-theme w3-margin-top w3-margin-bottom'
 type='submit' name='submit' value='Pay Online'/>
</form>

</div>-->
<div class='w3-container w3-center'>
<li class='w3-text-theme'>Pay With Airtime</li>
<form class='w3-center' method='POST' action='<?php echo
site_url('Dashboard/micro_payment'); ?>'>


        <?php
        echo '<div class="w3-text-red">'.validation_errors().'</div>';

        if(isset($_SESSION['err_msg']))
        {

          echo '<div class="w3-text-red">'.$_SESSION["err_msg"].'</div>';
          unset($_SESSION["err_msg"]);
        }
        ?>


<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-mobile
     w3-large w3-text-theme w3-center w3-margin"></i>
     <input class='w3-center' type='number' min='150' name='amount'
      placeholder='Amount'/><span class="w3-text-indigo"><del>N</del</span>
</div>
<?php


$array_char = array('A','B','C','D');
$i = mt_rand(0,3);
$ref = 'HM'.uniqid().$array_char[$i];



 ?>

 <input type="hidden" name="ref" value="<?= $ref ?>"/>

<div class="">
<img class="w3-image" style="max-height:65px" src="<?= base_url('assets/images/9mobile_logo.jpg') ?>" />
<img class="w3-image" style="max-height:80px" src="<?= base_url('assets/images/mtn_logo.png') ?>" />
<img class="w3-image" style="max-height:60px" src="<?= base_url('assets/images/airtel_logo.png') ?>" />
<img class="w3-image" style="max-height:65px" src="<?= base_url('assets/images/glo_logo.png') ?>" />

</div>
<input class='w3-center w3-button w3-theme w3-margin-top w3-margin-bottom'
 type='submit' name='submit' value='Pay with Airtel'/>
</form>

</div>
</div>
