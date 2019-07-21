<div class="w3-twothird">


<div class="w3-center">
<b class="w3-xlarge w3-text-blue-grey">Add New PUTME Question:</b><br>
 <?php
echo form_open_multipart('/admin_question/add_question');
?>

<span class="w3-text-red"><?php
echo validation_errors(); ?>
</span>
<?php
if(isset($_SESSION['action_status']))
{

  echo $_SESSION['action_status'];

}
echo "<BR>";
if(isset($_SESSION['action_statu']))
{

  echo $_SESSION['action_statu'];

}
?>
<br>
<div class='w3-row'>
  <div class='w3-third'>
<span class="w3-label">Subject:</span><br>
<select name="subject">

<?php




    if (!empty($items))
   {
    foreach ($items as $item)  {
if($item['name'] == set_value("subject"))
{
  echo "<Option  value='".$item['name']."'selected>".$item['name']."</option>";


}else{
echo "<Option  value='".$item['name']."'>".$item['name']."</option>";
}
}
}else{

echo 'No Subject Entry';
}



?>
</select>


</div>

<div class='w3-third'>
<span class="w3-label">Question Paper Type</span><br>
<input type="text" class="w3-border-blue-grey" style="width:80%;height: 04%" name="paper_type" value="<?php echo set_value('paper_type'); ?>" placeholder="Paper Type"></input>
<br><br>
</div>

<div class='w3-third'>
<span class="w3-label">Question Year</span><br>
<select name="year">

<?php
 for($i = "20".date('y');$i >=1970;$i-- )
{
if($i == set_value("year"))
{
  echo "<option value='".$i."' selected>".$i."</option>";
}else{

  echo "<option value='".$i."'>".$i."</option>";

}
}


?>
</select>


</div>

  </div>

  <br>
  <div class='w3-row'>
    <div class='w3-third'>
  <span class="w3-label">Question Number:</span><br>
  <input type="number" class="w3-border-blue-grey" style="width:80%;height: 04%" name="question_number" min="1" value="<?php echo set_value('question_number'); ?>" placeholder="Question Number"></input>
  <br><br>
  </div>

  <div class='w3-third'>
  <span class="w3-label">Question  Type</span><br>
  <select name="question_type">
    <?php
 if(set_value("question_type") == 'image')
 {
 $qt1 = 'selected';

 }else{

 $qt2 = 'selected';

 }
 echo  '<option value="text" '.$qt2.'>Text</option>';
 echo ' <option value="image"'.$qt1.'>Image</option>';


 ?>


  </select>
  </div>

  <div class='w3-third'>
  <span class="w3-label">Question Image</span><br>
  <input type="file" class="w3-border-blue-grey" style="width:80%;height: 04%" name="question_img" ></input>
  <br><br>
  </div>

    </div>
    <br>
    <div class='w3-row'>
      <div class='w3-third'>
    <span class="w3-label">Instructions</span><br>
    <input type="text" class="w3-border-blue-grey" style="width:80%;height: 04%" name="instructions" value="<?php echo set_value('instructions'); ?>" placeholder="Instructions"></input>
    <br><br>
    </div>

    <div class='w3-third'>
    <span class="w3-label">Account  Type</span><br>
   <select name="account_type">


         <?php
     if(set_value("account_type") == 'free')
     {
     $a1 = 'selected';

     }else{

       $a2 = 'selected';

     }
       echo  '<option value="free" '.$t1.'>Free</option>';
       echo ' <option value="premium"'.$t2.'>Premium</option>';


          ?>






   </select>
    </div>

    <div class='w3-third'>
    <span class="w3-label">Answer</span><br>
    <select name="answer">
      <?php
if(set_value("answer") == 'a')
{
$an1 = 'selected';

}elseif(set_value("answer") == 'b')
{
$an2 = 'selected';

}elseif(set_value("answer") == 'c')
{
$an3 = 'selected';

}elseif(set_value("answer") == 'd')
{
$an4 = 'selected';

}elseif(set_value("answer") == 'e')
{
$an5 = 'selected';

}
echo  '<option value="a" '.$an1.'>A</option>';
echo  '<option value="b" '.$an2.'>B</option>';
echo  '<option value="c" '.$an3.'>C</option>';
echo  '<option value="d" '.$an4.'>D</option>';
echo  '<option value="e" '.$an5.'>E</option>';


 ?>


    </select>
    </div>

      </div>

      <br>
      <div class='w3-row'>
        <div class='w3-half'>
      <span class="w3-label">Status</span><br>
      <select name="status">
        <?php
if(set_value("status") == 'published')
{
$s1 = 'selected';

}else{

  $s2 = 'selected';

}
  echo  '<option value="published" '.$s1.'>Published</option>';
  echo ' <option value="drafted"'.$s2.'>Drafted</option>';


     ?>


    </select>
      </div>

      <div class='w3-half'>
      <span class="w3-label">Option  Type</span><br>
       <select name="option_type">
         <?php
      if(set_value("option_type") == 'image')
      {
      $op1 = 'selected';

      }else{

      $op2 = 'selected';

      }
      echo  '<option value="text" '.$op2.'>Text</option>';
      echo ' <option value="image"'.$op1.'>Image</option>';


      ?>

      </select>
      </div>

</div>
       <span class="w3-label">Question:</span><br>
      <textarea placeholder="Question" class="w3-center w3-border-blue-grey" name="question"    rows="10" cols="25"><?php  echo set_value('question'); ?></textarea><br>

      <br>


      <br>
          <div class='w3-row'>
              <div class='w3-twothird'>
            <div class='w3-third'>
          <span class="w3-label">Option A</span><br>
          <input type="text" class="w3-border-blue-grey" style="width:80%;height: 04%" name="option_a" value="<?php echo set_value('option_a'); ?>" placeholder="Option A"></input>
          <br><br>
          </div>

          <div class='w3-third'>
          <span class="w3-label">Option B</span><br>
          <input type="text" class="w3-border-blue-grey" style="width:80%;height: 04%" name="option_b" value="<?php echo set_value('option_b'); ?>" placeholder="Option B"></input>
          <br><br>
          </div>

          <div class='w3-third'>
          <span class="w3-label">Option C</span><br>
          <input type="text" class="w3-border-blue-grey" style="width:80%;height: 04%" name="option_c" value="<?php echo set_value('option_c'); ?>" placeholder="Option C"></input>
          <br><br>
          </div>
            </div>
<div class='w3-third'>
          <div class='w3-half'>
          <span class="w3-label">Option D</span><br>
          <input type="text" class="w3-border-blue-grey" style="width:80%;height: 04%" name="option_d" value="<?php echo set_value('option_d'); ?>" placeholder="Option D"></input>
          <br><br>
          </div>

          <div class='w3-half'>
          <span class="w3-label">Option E</span><br>
          <input type="text" class="w3-border-blue-grey" style="width:80%;height: 04%" name="option_e" value="<?php echo set_value('option_e'); ?>" placeholder="Option E"></input>
          <br><br>
          </div>


      </div>
      <a class='w3-button w3-text-green' href='<?php echo site_url('media'); ?>'>Go To Media</a>
            </div>



<div id='compdiv'>
 <span class="w3-label">Comprehension:</span><br>
<textarea placeholder="Comprehension" class="w3-center w3-border-blue-grey" name="comp"  rows="20" cols="40"><?php  echo set_value('comp'); ?></textarea><br>
</div>
<br>

<input type="submit" class="w3-btn w3-blue" value="Publish" name="submit"></input><br>

<BR>
</div>
