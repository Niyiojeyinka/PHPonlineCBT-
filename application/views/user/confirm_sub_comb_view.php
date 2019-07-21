<div class='w3-container'>
  <br>
  <div class='w3-text-theme w3-large w3-center'>Confirm Subject Combination</div>

<?php

if(!empty($items))
{
   echo '<div style="margin-left:40%;">';
 foreach($items as $key => $value)
{

echo '<li>'.$value.'<br>';

}
 echo '</div>';

}




?>
<div class='w3-center'>
<br>
<a  class='w3-button w3-theme' href='<?php echo site_url('Dashboard_ext/subject_comb'); ?>'>Back</a>
<a  class='w3-button w3-theme' href='<?php echo site_url('Dashboard_ext/confirm_subject_comb'); ?>'>Confirm</a>

</div>
</div>
