<div class="w3-container">




    <button onclick="document.getElementById('containerc').style.display='block'" class="w3-button w3-hover-indigo">Open Calculator</button>

         <!-- modal div -->

          <div id="containerc" style='max-width:600px;' class="w3-modal">
           <div class="w3-modal-content w3-theme">
             <header class="w3-container w3-center"><h2>Pryce's Calculator</h2>
               <span onclick="document.getElementById('containerc').style.display='none'"
               class="w3-button w3-display-topright">&times;</span>

             </header>
    <div class="w3-center w3-white">
      <br>
                        <?php

                                   require("application/views/user/calculator.html");
                                    ?>
    <br>
    </div>

                 <footer class="w3-container w3-theme">
                   <p>&copy; Pryce <?php
                  if (date('y') == 18)
                  {
                  echo "20".date('y');
                  }else{
                  echo "2018 - 20".date('y');
                  }
                  ?></p>
                 </footer>



            </div>

         </div>
        <!--modal ends here-->



  <?php



  $check_option_a =  $check_option_b =  $check_option_c =  $check_option_d =NULL;

  switch ($question['answer']) {
    case 'a':
  $check_option_a = 'checked';
  $answered = TRUE;

      break;
      case 'b':
    $check_option_b = 'checked';
    $answered = TRUE;

        break;
        case 'c':
    $check_option_c = 'checked';
    $answered = TRUE;

        break;
        case 'd':
      $check_option_d = 'checked';
      $answered = TRUE;

          break;
          case 'e':
        $check_option_e = 'checked';
        $answered = TRUE;

            break;

  }




  echo "<div class='w3-tiny'>".$question['instructions']."</div><br>";
  echo $question['comp'].'<br>';

  echo $question['question'];
  echo '<br><span class="w3-large">A</span><input type="radio"
   value="a" class="w3-radio w3-small"/ disabled '.$check_option_a.'>'. $question['option_a'];
   echo '<br><span class="w3-large">B</span><input type="radio"
    value="b" class="w3-radio w3-small"/ disabled '.$check_option_b.'>'. $question['option_b'];
    echo '<br><span class="w3-large">C</span><input type="radio"
     value="c" class="w3-radio w3-small"/ disabled '.$check_option_c.'>'. $question['option_c'];
     echo '<br><span class="w3-large">D</span><input type="radio"
      value="d" class="w3-radio w3-small" disabled '.$check_option_d.'/>'. $question['option_d'];

      if($question["option_e"] != NULL)
      {

        if(!isset($check_option_e))
        {
       $check_option_e = NULL;
        }


        echo '<br><span class="w3-large">E </span>';
      echo '<input type="radio"  value="e" class="w3-radio w3-small"'.$check_option_e.'/>';
       echo  $question['option_e'];

      }


        echo "<div class='w3-text-green'>Correct 0ption is ".
        $question['answer']."</div><br><br>";





         $colour = NULL;
         $link = NULL;

      $_index = array_search($question["id"],$_SESSION['question_m_id']['freedom']);


if($_index != FALSE )
{
  if($_index >= count($_SESSION['user_answers']['freedom']))
  {

  }else{

    echo "<div class='w3-text-blue'>Your Answer is ".
    $_SESSION['user_answers']['freedom'][$_index]
    ."</div><br><br>";
  }

}else{

}





 ?>



 <?php

 for($i = 1;$i <=$count_q; $i++)
 {
   $colour = NULL;


$link = site_url('question/freedom_correction/'.$i);

$_index = array_search($question["id"],$_SESSION['question_m_id']['freedom'
]);

if(isset($_SESSION['user_answers']['freedom'][$i-1])  &&
isset($_SESSION['correct_answers']['freedom'][$i-1]))
{

if($_SESSION['user_answers']['freedom'][$i-1] ==
$_SESSION['correct_answers']['freedom'][$i-1])
{

  $colour = "w3-green";
//  $info = "<span class='w3-text-green'>You got it right,Hurray!</span>";

}
else{

  $colour = "w3-red";
//  $info = "<span class='w3-text-red'>You got it wrong,Sorry!</span>";

}
}else{

  $colour = NULL;

}
  // echo "<button class='w3-button w3-border ".$colour."' name='qno'   value='".$i."'>".$i."</button>";
   echo "<a class='w3-button w3-border ".$colour."' href='".$link."' >".$i."</a>";

 }
   ?>

</div>
