<div class="w3-container w3-center"><br>
<span class="w3-text-theme">Create New Circle</span><br><br>
<div class="">
<?php echo form_open_multipart("circle/create_new_circle");?>
  <span class="w3-text-red"><?php echo validation_errors(); ?></span><br>
  <span class="w3-text-red"><?php
  if(isset($_SESSION['err_report']))
  {
    echo  $_SESSION['err_report'];


  }
  if(isset($upload_err))
  {

    echo $upload_err;

  }

  ?></span><br>

<input type="text" name="name" value="<?php  echo set_value('name'); ?>" placeholder="Circle Name" class="w3-border w3-border-indigo w3-round"/>
<br>
<span class="w3-text-indigo">Privacy</span><br>
<select name="privacy" class="">
<option value="public">Public</option>
<option value="closed">Closed</option>
</select>
<br>
<br>
<span class="w3-text-indigo">Short Description</span><br>

<textarea  class="w3-center
w3-border-blue-grey w3-round-xlarge" name="description"    rows="10" cols="25">
<?php  echo set_value('description'); ?></textarea><br><br>
<span class="w3-text-indigo">Circle Profile Image</span><br>

<input type="file" name="circle_image" /><br><br>
<input type="submit" class="w3-btn w3-theme w3-round-jumbo" value="Create" name="submit"></input><br>


  <br>

</form>

</div>
</div>
