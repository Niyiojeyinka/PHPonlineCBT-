
<div class="w3-container w3-center"><br>
<span class="w3-text-theme">Replying to <?php
echo '"'.ucfirst(str_replace('-',' ',$this->uri->segment(3))).'"';?></span><br><br>
<div class="">
<?php echo form_open_multipart("board/reply/".$slug);?>
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

  ?></span>
<span class="w3-text-indigo">Contents</span><br>

<textarea  class="w3-center
w3-border-blue-grey w3-round-xlarge" name="contents"    rows="12" cols="30">
<?php  echo set_value('contents'); ?></textarea><br><br>
<span class="w3-text-indigo">Feature Image</span><br>

<input type="file" name="topic_image" /><br><br>
<input type="submit" class="w3-btn w3-theme w3-round-jumbo" value="Post Now" name="submit"></input><br>


  <br>

</form>

</div>
</div>
