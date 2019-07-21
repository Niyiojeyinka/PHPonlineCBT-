<div class='w3-container w3-center'>
  <span class='w3-text-theme w3-large'>Select Subject Combination</span>
<div>
<br>
<form action='<?php echo site_url('Dashboard_ext/subject_comb'); ?>' method='POST'>
  <?php

if(isset($_SESSION['err_msg']))
{

  echo '<div class="w3-text-red">'.$_SESSION["err_msg"].'</div>';
}
  echo '<div class="w3-text-red">'.validation_errors().'</div>';




    if (!empty($items))
   {
    foreach ($items as $item)  {

if($item['short_name'] == 'eng')
{
  $check ='checked';

        echo "<input style='display:none' type='checkbox' name='subject[]'
        value='".$item['name']."' checked>".$item['name']."</input>";
      echo '<br>';


}else{



      echo "<input type='checkbox' name='subject[]'
      value='".$item['name']."'>".$item['name']."</input>";
    echo '<br>';

}
}

}else{

echo 'No Subject Entry';
}



?>
<br>
<input type='submit' name='submit' class='w3-theme w3-btn'>

</form>
</div>

</div>
