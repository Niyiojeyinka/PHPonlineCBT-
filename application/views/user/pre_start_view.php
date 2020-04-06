<div class='w3-container w3-center'>

<br>

<span class="w3-large w3-text-grey"><strong><?=$next_test['name']?></strong></span>

<br>

<?=$next_test['instructions']?>
<br>
<span class="w3-small">ALL Test must have been submitted before <?=date("F,j Y ,g:ia",$next_test['test_end'])?></span><br>
<a href='' class='w3-button w3-indigo w3-margin'>Start Now</a>


</div>