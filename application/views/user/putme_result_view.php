<div class='w3-container'>
  <hr>
  <div  class='w3-container  w3-card w3-row w3-center'>
    <a href="<?= site_url('putme') ?>"><i class="fa-arrow-circle-left w3-text-theme w3-left w3-xlarge"><span class="w3-small">Back</span></i></a>
    <div style='display:inline-block;margin-bottom:5%;margin-top:0px;width:40%' class=""><br>
      <img class="w3-circle w3-image" style='widtbh:40%;' src="<?php echo
      base_url('assets/images/profiles/'.$user_details['profile_img']); ?>" alt="avatar" style="width:75%">

    </div><br>
    <div style='margin-bottom:5% width:60%;display:inline-block;margin-top:0;' class=""><br>

          <?php
          echo $_SESSION['school'];
echo "<br>";
$allowed_time =$_SESSION['running'] ;


$items = $_SESSION['subjects'];

          if(!empty($items))
          {
             echo '<div style="">';
             echo '<table class="w3-table w3-striped w3-responsive w3-mobile">';
             echo '<tr><td>';
             echo '<b class="">Subjects</b>';
             echo '</td>
             <td><b class="">No of Question</b></td>
             <td><b class="">Score</b></td>
             <td><b class="">Percentage</b></td>


             </tr>';

             $total_q = 0;
             $total_score = 0;
             $total_per = 0;
           foreach($items as $key => $value)
          {

            switch ($key) {
              case 0:
              $quest_count= count($_SESSION['subject_one']);
              $score = $_SESSION['s0_score'];
              $per_score = number_format(($_SESSION['s0_score']/$quest_count)*100);
                break;
               case 1:
$quest_count= count($_SESSION['subject_two']);
              $score = $_SESSION['s1_score'];
              $per_score = number_format(($_SESSION['s1_score']/$quest_count)*100);
               
                break;
               case 2:
$quest_count= count($_SESSION['subject_three']);
              $score = $_SESSION['s2_score'];
              $per_score = number_format(($_SESSION['s2_score']/$quest_count)*100);
               
  
                break;
               case 3:
$quest_count= count($_SESSION['subject_four']);
              $score = $_SESSION['s3_score'];
              $per_score = number_format(($_SESSION['s3_score']/$quest_count)*100);
   
                break;
              
             
            }
            $total_q += $quest_count;
            $total_score += $score;
            $total_per += $per_score;


            echo "<tr>";
          echo '<td class="" style"">'.$value.'</td>';
            echo '<td class="" style"">'.$quest_count.'</td>';
            echo '<td class="" style"">'.$score.'</td>';

             echo '<td class="" style"">'.$per_score.'</td>';

          }
                  echo "<tr class='w3-border w3-border-indigo'><td><b>Total:
                    </b></td><td>".$total_q."</td>
                    <td>". number_format($total_score)."</td><td>".number_format($total_per/count($_SESSION['subjects']))."</td>";

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

<form class="" action="<?= site_url('question/save_result') ?>"
method="POST">


<button type="" class="w3-button w3-theme w3-round-xlarge" name="score"
 value="<?= $total_per ?>">Save Results
</button>

</form>


<center><div style="max-width:80%" class="w3-container w3-center">
<span class="w3-large w3-text-grey">Notice:</span><span
class="w3-text-grey w3-small">For the ability to  save result and ability to compete
with others student For <span class="w3-large w3-text-theme" >Prize Winner </span>
of the week you must upgrade your account.Click <a class="w3-text-theme" href="<?= site_url('') ?>" >here</a> to know the benefit of being
a <span class="w3-large w3-text-theme" >Prize Winner  </span> of the week </span>
</div>
</center>
<br>
<a class="w3-button w3-theme w3-margin-bottom" href="<?php echo
site_url('putme/corrections/s0_correction_page'); ?>">View Corrections</a>
<br>
</div>
</div>