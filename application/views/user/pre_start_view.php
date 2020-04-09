<div class='w3-container w3-center'>

<br>

<span class="w3-large w3-text-grey"><strong><?=$next_test['name']?></strong></span>

<br>
<div class="" style='max-width:80%;'>
<?=$next_test['instructions']?>
</div>
<br>
<span class="w3-small">ALL Test must have been submitted before <?=date("F,j Y ,g:ia",$next_test['test_end'])?></span><br>
<a href='<?=site_url("question/question") ?>' class='w3-button w3-indigo w3-text-white w3-small w3-margin w3-hover-white w3-border w3-border-indigo w3-hover-text-indigo'>Start Now</a>


</div>