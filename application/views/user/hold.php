----modal image
<?php
if($question["question_img"] != NULL)
{
echo "<img class='w3-margin' style='max-width:500px;max-height:550px' src='".base_url("assets/questions/".$question['question_img']."'/>");

} ?>















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
<input type="hidden" name="segment_cont" value="<?php echo $this->uri->segment(2); ?>" />
<input type="hidden" name="q_id" value="<?php echo $q_id; ?>"/>
<input type="hidden" name="q_index" value="<?php echo $q_index; ?>"/>
<input type="hidden" name="total_no_q" value="<?php echo $count_sub; ?>"/>

<div class="w3-cell-row">
<div  class="w3-cell">
  <button style="<?php
if(!isset($_SESSION["question_index"][$this->uri->segment(2)]) || $_SESSION["question_index"][$this->uri->segment(2)] <=1)
{
  echo "display:none;";

} ?>" class='w3-button w3-border w3-left' name='previous'   value='prev'>Previous</button>

</div>
<div  class="w3-cell">
  <button style="<?php

  if(isset($_SESSION["question_index"][$this->uri->segment(2)]))
  {
if( $_SESSION["question_index"][$this->uri->segment(2)] >= $count_sub)
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

 if(isset($_SESSION['question_number'][$this->uri->segment(2)]))
  {
  if(in_array($i,$_SESSION['question_number'][$this->uri->segment(2)]))
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

