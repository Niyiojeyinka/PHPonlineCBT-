<div class='w3-container'>
  <hr>
  <div  class='w3-container  w3-card w3-row w3-center'>
    <a href="<?= site_url('question') ?>"><i class="fa-arrow-circle-left w3-text-theme w3-left w3-xlarge"></i></a>
    <div style='display:inline-block;margin-bottom:5%;margin-top:0px;width:40%' class=""><br>
      <img class="w3-circle w3-image" style='widtbh:40%;' src="<?php echo
      base_url('assets/images/profiles/'.$user_details['profile_img']); ?>" alt="avatar" style="width:75%">

    </div><br>
    <div style='margin-bottom:5% width:60%;display:inline-block;margin-top:0;' class=""><br>

          <?php

if($_SESSION['running'] == '5')
{

$allowed_time = 5;

}elseif($_SESSION['running'] == '10'){
  $allowed_time = 10;

}elseif($_SESSION['running'] == '20'){

  $allowed_time = 20;

}
elseif($_SESSION['running'] == '30'){

  $allowed_time = 30;

}
elseif($_SESSION['running'] == '120'){

  $allowed_time = 120;

}

$eng_count = count($_SESSION['english_ids']);
$other_count1 = count($_SESSION['subject_1_ids']);
$other_count2 = count($_SESSION['subject_2_ids']);
$other_count3 = count($_SESSION['subject_3_ids']);



          if(!empty($items))
          {
             echo '<div style="">';
             echo '<table class="w3-table w3-striped w3-responsive w3-mobile">';
             echo '<tr><td>';
             echo '<b class="">Subjects</b>';
             echo '</td>
             <td><b class="">No of Question</b></td>
             <td><b class="">Score</b></td>
             <td><b class="">Jamb Standard</b></td>


             </tr>';
           foreach($items as $key => $value)
          {
            echo "<tr>";
          echo '<td class="" style"">'.$value.'</td>';
          if($value == "Use of English")
          {
            echo '<td class="" style"">'.$eng_count.'</td>';
            echo '<td class="" style"">'.$_SESSION['s0_score'].'</td>';
            if($eng_count ==0)
            {
              $eng_count = 1;
            }
            $_stan0 = ($_SESSION['s0_score']/$eng_count)*100;
            echo '<td class="" style"">'.number_format($_stan0).'</td>';

          }elseif($value == $items[1])
            {
              echo '<td class="" style"">'.$other_count1.'</td>';
              echo '<td class="" style"">'.$_SESSION['s1_score'].'</td>';
               if($other_count1 ==0)
            {
              $other_count1 = 1;
            }
              $_stan1 = ($_SESSION['s1_score']/$other_count1)*100;
              echo '<td class="" style"">'.number_format($_stan1).'</td>';

            }elseif($value == $items[2])
              {
                echo '<td class="" style"">'.$other_count2.'</td>';
                echo '<td class="" style"">'.$_SESSION['s2_score'].'</td>'; if($other_count2 ==0)
            {
              $other_count2 = 1;
            }
                $_stan2 = ($_SESSION['s2_score']/$other_count2)*100;
                echo '<td class="" style"">'.number_format($_stan2).'</td>';

              }elseif($value == $items[3])
                {
                  echo '<td class="" style"">'.$other_count3.'</td>';
                  echo '<td class="" style"">'.$_SESSION['s3_score'].'</td>'; if($other_count3 ==0)
            {
              $other_count3 = 1;
            }
                  $_stan3 = ($_SESSION['s3_score']/$other_count3)*100;
                  echo '<td class="" style"">'.number_format($_stan3).'</td>';

                }
          echo "</tr>";


          }

              $total_q =$eng_count+$other_count1+$other_count2+$other_count3;
              $total =$_SESSION['s0_score']+$_SESSION['s1_score']+
              $_SESSION['s2_score']+$_SESSION['s3_score'];
              $stan =$_stan0 +$_stan1+$_stan2+$_stan3;
                    echo "<tr class='w3-border w3-border-indigo'><td><b>Total:
                    </b></td><td>".$total_q."</td>
                    <td>". number_format($total)."</td><td>".number_format($stan)."</td>";

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
 value="<?= $stan ?>">Save Results
</button>

</form>


<center><div style="max-width:80%" class="w3-container w3-center">
<span class="w3-large w3-text-grey">Notice:</span><span
class="w3-text-grey w3-small">For the ability to  save result and ability to compete
with others student For <span class="w3-large w3-text-theme" >MarkHitter </span>
of the week you must upgrade your account.Click <a class="w3-text-theme" href="<?= site_url('') ?>" >here</a> to know the benefit of being
a <span class="w3-large w3-text-theme" >MarkHitter </span> of the week </span>
</div>
</center>
<br>
<a class="w3-button w3-theme w3-margin-bottom" href="<?php echo
site_url('question/corrections/s0_correction_page'); ?>">View Corrections</a>
<br>
</div>
