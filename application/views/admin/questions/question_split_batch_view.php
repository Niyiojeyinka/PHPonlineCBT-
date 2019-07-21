<div class="w3-twothird">


<div class="w3-center">
<b class="w3-xlarge w3-text-blue-grey">Add New Split Batch Questions:</b><br>
 <?php
echo form_open_multipart('admin_question/upload_split_batch');
?>

<span class="w3-text-red"><?php
echo validation_errors(); ?>

<?php
if(isset($_SESSION['action_report_status']))
{

  echo $_SESSION['action_report_status'];

}

echo "<BR>";
if(isset($upload_err))
{

  echo $upload_err;

}
?>
</span>
<br>


<div class="w3-container">
  

<div class="w3-container w3-half">
  

<span class="w3-label">Subject:</span><br>
<select class="w3-margin" name="subject">

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



<span class="w3-label">Question Paper Type</span><br>
<input type="text" class="w3-border-blue-grey w3-margin" style="width:80%;height: 04%" name="paper_type" value="<?php echo set_value('paper_type'); ?>" placeholder="Paper Type"></input>
<br>




<span class="w3-label">Exam Type:</span><br>
  <select type="text" class="w3-border-blue-grey w3-margin"  name="exam_type" >
    <option value="jamb">Jamb</option>
  </select>
<br>


  
<span  class="w3- w3-small">Account type:</span><br>

<select class="w3-margin" name="account_type">

<option value='free'>free</option>
<option value='premium'>Premium</option>

</select>


</div>



<div class="w3-container w3-half">
  
<span class="w3-label">Question Year</span><br>
<select class="w3-margin" name="year">

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




<span class="w3- w3-small">Start Number:</span><br>

<select class="w3-margin" name="starting_num">

<?php
 for ($i = 1;$i <= 200 ;$i++ )
{
if($i == set_value("starting_num"))
{
  echo "<option value='".$i."' selected>".$i."</option>";
}else{

  echo "<option value='".$i."'>".$i."</option>";

}
}


?>
</select>




<span  class="w3- w3-small">Stop Number:</span><br>

<select class="w3-margin" name="stopping_num">

<?php
 for($i = 1;$i <=200;$i++ )
{
if($i == set_value("stopping_num"))
{
  echo "<option value='".$i."' selected>".$i."</option>";
}else{

  echo "<option value='".$i."'>".$i."</option>";

}
}


?>
</select>



<input type="file" class="w3-padding" name="question_file">
</div>

</div>

<input type="submit" class="w3-btn w3-blue" value="Publish" name="submit"></input><br>







<br><br>
<a class="w3-btn w3-blue w3-round-large" value="Publish" href="<?= site_url("admin_question/upload_split_answer") ?>">UPLOAD SPLIT ANSWER</a><br>



</div>
