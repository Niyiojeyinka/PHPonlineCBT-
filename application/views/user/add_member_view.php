<div class="w3-container w3-center w3-margin-top">
  <span class="w3-text-theme w3-large">Add New Member</span><br>
<div class="">
<?php echo form_open('circle/add_member/'.$slug); ?>
<?php echo '<i class="w3-text-red">'.validation_errors().'</i>'; ?>
<?php
if(isset($_SESSION['action_report']))
{
 echo '<i class="">'.$_SESSION['action_report'].'</i><br>';
} ?>

<input type="text" class="w3-border w3-border-indigo" name="username" placeholder="Username"/>
<br>
<input type="submit" class="w3-button w3-theme w3-margin" value="Add Member"/>


</form>
</div>

</div>
