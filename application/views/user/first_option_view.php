<div class='w3-container w3-center'>
  <span class='w3-large w3-text-theme'>
    <?php
    if($user_details['acct_type'] == "free")
    {
      echo "Account License:FREE(About 180  Free Questions & Answers )";


    }else{
      echo "Account License:Premium(Access to Unlimited Questions & Answers )";


    }
?>
  </span><BR>

  <span class='w3-large w3-text-theme'>Choose Test Type</span>
  <br>

  <li class='w3-text-theme'>Timed Test</li>



    <?php

    if(!empty($items))
    {
       echo '<div style="">';
     foreach($items as $key => $value)
    {

    echo '<li class="w3-margin-left" style="display:inline">'.$value.'</li>';

    }
     echo '</div>';

    }




    ?>
<br>
<div class='w3-container w3-center'>
  <form class='w3-center' method='POST' action='<?php echo site_url('question/timed_test'); ?>'>

<select name='type' style='width:60%;margin-left:20%' class='w3-input w3-border w3-center'>
  <!--get from db-->
<option value='5'>5 minutes & 9 questions</option>
<option value='10'>10 minutes & 14 questions</option>
<option value='20'>20 minutes & 30 questions</option>
<option value='30'>30 minutes & 45 questions</option>
<option value='120'>2hr & 180 questions(UTME STANDARD)</option>



</select>
<br>
<input type='submit' class='w3-button w3-theme' name='submit' value='Proceed'/>
</form>
</div>
<br>
  <li class='w3-text-theme'>Freedom Tier</li><br>
  <?php
  if($user_details['acct_type'] == "free")
  {
    echo "<span class='w3-text-red w3-small'>This feature is not available on
    free Account,Please Upgrade your account
  to gain Access to Unlimted Questions.
</span>";


  }else{
    echo "Your Account License is Premium,you are qualified for this product";


  }
?>

<form class='w3-center' method='POST' action='<?php echo site_url('question/freedom_test'); ?>'>
<span>Choose Subject:</span>

      <?php

      if(!empty($items))
      {
         echo '<div style="">';

   if($user_details['acct_type'] == "free")
   {
     $dis = "disabled";


   }else{
     $dis = NULL;


   }
       foreach($items as $key => $value)
      {

      echo '<input type="radio" class="w3-margin-left" name="subject"
       value="'.$key.'" style="" '.$dis.'>'.$value.'<br>';

      }
       echo '</div>';

      }




      ?>
      <br>
      <span>Select No Of Questions:</span>
      <select  name='no' style='width:60%;margin-left:20%' class='w3-input w3-border w3-center'    <?php
    if($user_details['acct_type'] == "free")
    {
      echo "disabled";


    }else{
      echo " ";


    }
?> >
        <!--get from db-->
        <?php
        $i = 5;

        while ($i <= 200)
        {

        echo  "<option value=".$i.">".$i." Questions</option>";

        $i =$i+5;
        }
        echo "</select>";




?>
<br>
<span>Select Time:</span>
<select name='time' style='width:60%;margin-left:20%' class='w3-input w3-border w3-center'    <?php
if($user_details['acct_type'] == "free")
{
echo "disabled";


}else{
echo " ";


}
?> >
  <!--get from db-->
  <?php
  $i = 5;

  while ($i <= 200)
  {

  echo  "<option value=".$i.">".$i." minutes</option>";

  $i =$i+5;
  }
  echo "</select>";




?>

<!--get from db-->
<br>
<input type='submit' class='w3-button w3-theme' name='submit' value='Proceed' <?php
if($user_details['acct_type'] == "free")
{
echo "disabled";


}else{
echo " ";


}
?>/>


</form>
</div>
