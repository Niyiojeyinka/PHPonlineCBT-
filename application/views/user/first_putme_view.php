
<div class="w3-container w3-center">
<span class="w3-text-theme w3-large">PUTME Initial Settings</span><br>
<span class="w3-text-red">
<?= validation_errors() ?></span><br>

<span class="w3-text-theme">Institution Selection</span><br>
<?= form_open("putme/index") ?>
<br>


 <select style="max-width: 60%" name='school' class='w3-select w3-border-indigo'>

         <?php

         require("application/views/user/common/school.html");
         ?>


<br>
<span class="w3-label">Number Of Questions per subject</span><br>
<?php
echo "<select class='w3-padding' name='number'>";
for($i = 1;$i < 51;$i++)
{


echo "<option value='".$i."'>".$i." Questions Per Subject</option>";


}
echo "</select>";







?>
<br>
<span class="w3-label">Time/Period</span><br>
<?php
echo "<select class='w3-padding' name='period'>";
for($i = 5;$i <= 60;$i= $i+5)
{


echo "<option value='".$i."'>".$i." Minutes</option>";


}
echo "</select>";







?><br><br>
<?php

if(!empty($subjects))
{
foreach ($subjects as $subject) {

echo "<input class='w3-check' type='checkbox'name='subject[]' value='".$subject['name']."'/></input>".$subject['name']."<br>";

}





}

?>
<br>
<input type="submit" name="submit" value="Next" class="w3-btn w3-theme w3-round">
















</form>


















</div>