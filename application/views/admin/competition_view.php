<div class="w3-containeryter w3-center">
<br>
<span class="w3-large">Current Week:<?= date('WS',time())."Week" ?></span>

<?= form_open('admin/competition')?>
<select class="" name="week">
  <?php
for($i= 1;$i <= 56 ;$i++)
{

echo"<option>". $i."Th Week</option>";

}
echo '</select>';


   ?>
<br><br>
<input type="submit" name="submit" class="w3-btn w3-round-large w3-blue" value="Submit"/>
</form>
<div class="w3-container result">




</div>


<div class=''>



</div>
</div>
