<div class='w3-container w3-center'>
<b>Payment options</b>
<li class='w3-text-theme'>Online Card Payment</li>



<?php
/*
*update merchant id
* update merchant
* update cenurl

*/

// this file shows how you can call the CashEnvoy payment interface from your online store

// your CashEnvoy merchant id
$cemertid = 1;

$_SESSION['payment_mer'] =$cemertid;
$this->session->mark_as_temp('payment_mer',1800);

// your merchant key (login to your cashenvoy account, your merchant key is displayed on the dashboard page)
$key = '2dawdszfcasdq24434242ffsdsfd';

$_SESSION['payment_key'] =$key;
$this->session->mark_as_temp('payment_key',1800);

// transaction reference which must not contain any special characters. Numbers and alphabets only.

$cetxref = $ref;
//echo $ref;
// transaction amount
$ceamt = $amount;
//echo $ceamt;

// customer id does not have to be an email address but must be unique to the customer
$cecustomerid = $user_details['username'];

// a description of the transaction
$cememo = 'Pryce Account Upgrade';

// notify url - absolute url of the page to which the user should be directed after payment
// an example of the code needed in this type of page can be found in example_requery_usage.php
$cenurl = site_url('dashboard/post_payment');

// generate request signature
$data = $key.$cetxref.$ceamt;
$signature = hash_hmac('sha256', $data, $key, false);
?>
<body onLoad="document.submit2cepay_form.submit()">
<!--
Note: Replace https://www.cashenvoy.com/sandbox2/?cmd=cepay with https://www.cashenvoy.com/webservice/?cmd=cepay once you have been switched to the live environment.
-->
<form class='w3-center' method="post" name="submit2cepay_form" action="https://www.cashenvoy.com/sandbox2/?cmd=cepay" target="_self">
<input type="hidden" name="ce_merchantid" value="<?= $cemertid ?>"/>
<input type="hidden" name="ce_transref" value="<?= $cetxref ?>"/>
<input type="hidden" name="ce_amount" value="<?= $ceamt ?>"/>
<input type="hidden" name="ce_customerid" value="<?= $cecustomerid ?>"/>
<input type="hidden" name="ce_memo" value="<?= $cememo ?>"/>
<input type="hidden" name="ce_notifyurl" value="<?= $cenurl ?>"/>
<input type="hidden" name="ce_window" value="parent"/><!-- self or parent -->
<input type="hidden" name="ce_signature" value="<?= $signature ?>"/>

<input class='w3-center w3-button w3-theme w3-margin-top w3-margin-bottom'
 type='submit' name='submit' value='Continue'/>


<div class="w3-container w3-small">
  Transaction Ref Id:<span class="w3-text-theme"> <?= $ref ?>
  </span> <br>
  <span class="w3-tiny">You may keep it/write it somewhere for reference Purpose
  </span>
</div>
</form>


<div class="">
<img class="" src="<?= base_url('assets/images/cashenvoy.gif') ?>" />
</div>


</div>
