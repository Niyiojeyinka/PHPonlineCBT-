<div class="w3-container w3-center w3-margin-top">
  <span class="w3-text-theme w3-large">Exit Circle</span><br>
<div class="">
  <div class="w3-small">Are Sure you want to exit the group?</div>

<?php echo form_open('circle/exit/'.$slug); ?>
<?php echo '<i class="w3-text-red">'.validation_errors().'</i>'; ?>
<?php
if(isset($_SESSION['action_report']))
{
 echo '<i class="">'.$_SESSION['action_report'].'</i><br>';
} ?>

<button class="w3-button w3-theme w3-margin" name="confirm"  value='Exit'>Exit</button>
<br>
<a class="w3-button w3-theme" href="<?php echo site_url("circle/dash/".$slug); ?>" >Cancel</a>
</form>

</div>

</div>
