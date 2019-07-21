<div class='w3-container'>
  <hr>
  <div  class='w3-container  w3-card w3-row w3-center'>
    <div style='display:inline-block;margin-bottom:5%;margin-top:0px;width:40%' class=""><br>
      <img class="w3-circle w3-image" style='widtbh:40%;' src="<?php echo base_url('assets/images/profiles/'.$user_details['profile_img']); ?>" alt="avatar" style="width:75%">

    </div><br>
    <div style='margin-bottom:5% width:60%;display:inline-block;margin-top:0;' class=""><br>

          <?php
    $allowed_time = $_SESSION['time_allowed'];
//no of question is same just choose one
echo $_SESSION['school'];

          if(!empty($_SESSION['subjects']))
          {
             echo '<div style="">';
             echo '<table class="w3-table w3-striped">';
             echo '<tr><td>';
             echo '<b class="">Subjects</b>';
             echo '</td><td><b class="">No of Question</b></td></tr>';
             $loop_count = 0;
           foreach($_SESSION['subjects'] as $value)
          {

            $loop_count++;
          echo "<tr>";
          echo '<td class="" style"">'.$value.'</td>';

          switch ($loop_count) {
            case 1:
            $sub_count = count($_SESSION['subject_one']);
              break;     
            case 2:
            $sub_count = count($_SESSION['subject_two']);
              break;
            case 3:
            $sub_count = count($_SESSION['subject_three']);
              break;
            case 4:
            $sub_count = count($_SESSION['subject_four']);
              break;

          }
          echo '<td class="" style"">'.$sub_count.'</td>';

          echo "</tr>";

          }
           echo '</table>';
           echo '</div>';

          }




          ?>
    </div>
    <br><div class="w3-padding" style="">
<b>Time Allowed: <?php if($allowed_time < 60 ){
  echo $allowed_time.' Minutes';
}else{
  echo ($allowed_time/60).' hours';


} ?>(<?php echo $allowed_time * 60 ?> Seconds)</b>
</div>
<br>
<a class="w3-button w3-theme w3-margin-bottom" href="<?php echo site_url('putme/putme_s0_question_page'); ?>">Start</a>
<br>
</div>
