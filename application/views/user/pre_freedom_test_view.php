<div class='w3-container'>
  <hr>
  <div  class='w3-container  w3-card w3-row w3-center'>
    <div style='display:inline-block;margin-bottom:5%;margin-top:0px;width:40%' class=""><br>
      <img class="w3-circle w3-image" style='widtbh:40%;' src="<?php echo base_url('assets/images/profiles/'.$user_details['profile_img']); ?>" alt="avatar" style="width:75%">

    </div><br>
    <div style='margin-bottom:5% width:60%;display:inline-block;margin-top:0;' class=""><br>

          <?php


$allowed_time = $this->input->post('time');


$other_count = count($_SESSION['subject_ids']);



             echo '<div style="">';
             echo '<table class="w3-table w3-striped">';
          echo "<tr>";
          echo '<td class="" style""><b>'.$_SESSION['subject'].'</b></td>';

            echo '<td class="" style"">'.$other_count.' Questions</td>';


          echo "</tr>";
       echo '</table>';
           echo '</div>';






          ?>
    </div>
    <br><div class="w3-padding" style="">
<b>Time Allowed:</b> <?php if($allowed_time != 120 ){
  echo $allowed_time.' Minutes';
}else{
  echo ($allowed_time/60).' hours';


} ?>(<?php echo $allowed_time * 60 ?> Seconds)</b>
</div>
<br>
<a class="w3-button w3-theme w3-margin-bottom" href="<?php echo site_url('question/freedom_question_page'); ?>">Start</a>
<br>
</div>
