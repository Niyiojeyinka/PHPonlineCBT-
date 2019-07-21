<div id="q_div" class='w3-container'>
  <br>


  <br>

  <div class="w3-cell-row">
  <div class="w3-cell">
  <button onclick="document.getElementById('containerc').style.display='block'" class="w3-button w3-hover-indigo">Open Calculator</button>
  </div>

  <div class="w3-cell">
    <script>
    var t = setInterval(thePryceTimer, 1000);

  function thePryceTimer() {
    //var p = new Date();
    //document.getElementById("time_div").innerHTML = p.toLocaleTimeString();
    d = new Date();
    var date = d.getTime(); d = d/1000; d = new Number(d);
    d = d.toFixed();
  var e = <?php echo $_SESSION['start_time'] + ($_SESSION['running'] * 60); ?>;


  if(e > d)
  {
  if(<?php echo $_SESSION['running'];?> != 120)
  {
         var diff = e - d;
         var min = Math.floor(diff/60);
          var sec = (diff % 60);
          var tim = min+':'+sec+'   ';
      document.getElementById("time_div").innerHTML = tim;
    }else{


      var diff = e - d;
      var hour = Math.floor(diff/3600);
       var min = Math.floor((diff%3600)/60);
       var sec = (diff%3600)%60;

       var tim =hour+'hr:'+ min+'min:'+sec+'sec ';
      // var tim =hour+'h:'+ min+'m:'+sec+'s';

   document.getElementById("time_div").innerHTML = tim;

    }
  }else if (e <= d) {
    //submit
    document.getElementById("q_div").style.display = "none";
  window.location.assign('<?php echo site_url('question/submit'); ?>');
  }


  }
  </script>
    <div id='time_div'>

  </div>
  </div>
  </div>






  <?php echo form_open("question/freedom_question_act"); ?>

<!--</form>-->
<br>







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















<br>
<div style="width:98%" class='w3-container w3-tiny'>

<?php echo  $question['instructions']; ?>

</div>
<div style="width:80%" class='w3-container w3-small'>

<?php
if($question["question_img"] != NULL)
{
  echo "<img ";
  $hold_string = "document.getElementById('container0').style.display='block'";
  echo 'onclick="'.$hold_string.'"';
echo " style='max-width:200px;max-height:250px' src='".base_url("assets/questions/".$question['question_img']."'/>");

} ?>

</div>





<!-- modal div -->

 <div id="container0" style='max-width:600px;display:none;' class="w3-modal">
  <div class="w3-modal-content w3-theme">
    <header class="w3-container w3-center"><h2>Pryce</h2>
      <span onclick="document.getElementById('container0').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>

    </header>

        <div class="w3-container w3-white w3-center">
        <?php
if($question["question_img"] != NULL)
{
echo "<img class='w3-margin' style='max-width:500px;max-height:550px' src='".base_url("assets/questions/".$question['question_img']."'/>");

} ?>


        </div>

        <footer class="w3-container w3-center w3-theme">
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






<!--new-->
<!--<?php echo form_open("question/question_act"); ?>-->
<!--new-->

<div style="width:90%" class='w3-container w3-small'>

<?php echo  $question['comp']; ?>

</div>

<?php
$no = $q_index + 1;
 echo '('.$no.') ';
 ?><?php echo  $question['question']; ?>
<br>
<?php
$answered = FALSE;
if(isset($_SESSION['user_answers'][$this->uri->segment(2)][$q_index]))
{
switch ($_SESSION['user_answers'][$this->uri->segment(2)][$q_index]) {
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

}



 ?>


<br><span class="w3-large">A </span>
<input type="radio" name="option"  value="a" class="w3-radio w3-small" <?php
if(isset($check_option_a))
{
 echo $check_option_a;
}
 ?>/>

<?php echo  $question['option_a']; ?>

<br><span class="w3-large">B </span>
<input type="radio" name="option" value="b" class="w3-radio w3-small" <?php
if(isset($check_option_b))
{
 echo $check_option_b;
}
 ?>/>

<?php echo  $question['option_b']; ?>

<br><span class="w3-large">C </span>
<input type="radio" name="option" value="c" class="w3-radio w3-small" <?php
if(isset($check_option_c))
{
 echo $check_option_c;
}
 ?>/>

<?php echo  $question['option_c']; ?>

<br><span class="w3-large">D</span>
<input type="radio" name="option" value="d" class="w3-radio w3-small" <?php
if(isset($check_option_d))
{
 echo $check_option_d;
}
 ?>/>

<?php echo  $question['option_d']; ?>

<br>
<?php
if($question["option_e"] != NULL)
{

  if(!isset($check_option_e))
  {
 $check_option_e = NULL;
  }


  echo '<span class="w3-large">E </span>';
echo '<input type="radio" name="option" value="e" class="w3-radio w3-small"'.$check_option_e.'/>';
 echo  $question['option_e'];

} ?>



<br>
<style>

 button:active {
background-color:indigo;

}
 </style>
<div class="">


<!--new-->
<input type="hidden" name="q_id" value="<?php echo $q_id; ?>"/>
<input type="hidden" name="q_index" value="<?php echo $q_index; ?>"/>
<input type="hidden" name="total_no_q" value="<?php echo $count_sub; ?>"/>

<div class="w3-cell-row">
<div  class="w3-cell">
  <button style="<?php
if(!isset($_SESSION["question_index"]['freedom']) || $_SESSION["question_index"]['freedom'] <=1)
{
  echo "display:none;";

} ?>" class='w3-button w3-border w3-left' name='previous'   value='prev'>Previous</button>

</div>
<div  class="w3-cell">
  <button style="<?php

  if(isset($_SESSION["question_index"]['freedom']))
  {
if( $_SESSION["question_index"]['freedom'] >= $count_sub)
{
  echo "display:none;";

}

}?>" class='w3-button w3-border w3-right' name='next'   value='next'>Next</button>

</div>

</div>
<!--new-->

<?php

for($i = 1;$i <  $count_sub + 1; $i++)
{
  $colour = NULL;

 if(isset($_SESSION['question_number']['freedom']))
  {
  if(in_array($i,$_SESSION['question_number']['freedom']))
{
  $colour = "w3-green";


}
}


  //echo "<input  class='w3-button w3-border' type='button' 7 name='qno' value='".$i."'/>";
  echo "<button class='w3-button w3-border ".$colour."' name='qno'   value='".$i."'>".$i."</button>";

}
//echo var_dump($q_id);
 ?>

</div>
<br>
<!--<button class="w3-btn w3-red">End Test</button>-->
<input  class="w3-btn w3-red" type="submit" name="submit" value="Submit"/>

</form>



</div>
