<div class="w3-container w3-center">
  <b>Contact Us</b>

  <div class='w3-container'>
    <form class='w3-center' method='POST' action='<?php echo site_url('Dashboard/contact_us'); ?>'>

      <?php
      echo '<div class="w3-text-red">'.validation_errors().'</div>';

      if(isset($_SESSION['err_msg']))
      {

        echo '<div class="w3-text-red">'.$_SESSION["err_msg"].'</div>';
        unset($_SESSION["err_msg"]);
      }
      ?>

      <i  style='margin-right:3%' class="fa fa-arrows-h
       w3-large w3-text-theme w3-center w3-margin-top"></i>
<br>
       <input class='w3-center' type='text' name='title'
       value="<?php echo set_value('title'); ?>" placeholder='Message Title'/>
<br>
<br>

<i  style='margin-right:3%' class="fa fa-envelope
 w3-large w3-text-theme w3-center"></i>
<br>

<textarea class='' cols="" rows="10" name='message' placeholder="Your Message" ><?php echo set_value('message'); ?></textarea>
<br>
<input class='w3-center w3-button w3-theme w3-margin-top w3-margin-bottom' type='submit' name='submit' value='Send'/>
<br><br>

</form>

  </div>
  </div>
