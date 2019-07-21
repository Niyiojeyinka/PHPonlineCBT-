<div class='w3-container'>
  <hr>
  <div  class='w3-container  w3-card w3-row w3-center'>
    <div style='display:inline-block;margin-bottom:5%;margin-top:0px;width:40%' class=""><br>
      <img class="w3-circle w3-image" style='widtbh:40%;' src="<?php echo base_url('assets/images/profiles/'.$user_details['profile_img']); ?>" alt="avatar" style="width:75%">

    </div><br>
    <div style='margin-bottom:5% width:60%;display:inline-block;margin-top:0;' class=""><br>

          <?php

if($this->input->post('type') == '5')
{

$allowed_time = 5;

}elseif($this->input->post('type') == '10'){
  $allowed_time = 10;

}elseif($this->input->post('type') == '20'){
  $allowed_time = 20;

}
elseif($this->input->post('type') == '30'){
  $allowed_time = 30;

}
elseif($this->input->post('type') == '120'){
    $allowed_time = 120;

}

$eng_count = count($_SESSION['english_ids']);
$other_count1 = count($_SESSION['subject_1_ids']);
$other_count2 = count($_SESSION['subject_2_ids']);
$other_count3 = count($_SESSION['subject_3_ids']);




          if(!empty($items))
          {
             echo '<div style="">';
             echo '<table class="w3-table w3-striped">';
             echo '<tr><td>';
             echo '<b class="">Subjects</b>';
             echo '</td><td><b class="">No of Question</b></td></tr>';
           foreach($items as $key => $value)
          {
            echo "<tr>";
          echo '<td class="" style"">'.$value.'</td>';
          if($value == "Use of English")
          {
            echo '<td class="" style"">'.$eng_count.'</td>';

          }elseif($value == $items[1])
            {
              echo '<td class="" style"">'.$other_count1.'</td>';

            }elseif($value == $items[2])
              {
                echo '<td class="" style"">'.$other_count2.'</td>';

              }elseif($value == $items[3])
                {
                  echo '<td class="" style"">'.$other_count3.'</td>';

                }
          echo "</tr>";

          }
           echo '</table>';
           echo '</div>';

          }




          ?>
    </div>
    <br><div class="w3-padding" style="">
<b>Time Allowed: <?php if($allowed_time != 120 ){
  echo $allowed_time.' Minutes';
}else{
  echo ($allowed_time/60).' hours';


} ?>(<?php echo $allowed_time * 60 ?> Seconds)</b>
</div>
<br>
<a class="w3-button w3-theme w3-margin-bottom" href="<?php echo site_url('question/s0_question_page'); ?>">Start</a>
<br>
</div>
