<div class="w3-container">

  <?php
  if(isset($_SESSION['action_status_report']))
  {

    echo $_SESSION['action_status_report'];
  }
?>

  <hr>
 <a href='<?php echo site_url('question/index'); ?>'><div class='w3-container w3-panel w3-center'>
<i class='fa fa-graduation-cap w3-jumbo w3-text-indigo'></i><br>
<span style='width:20%'>Take Test</span>
</div></a>
<hr>
<a href='<?php echo site_url('dashboard/logout'); ?>'><div class='w3-container w3-panel w3-center'>
<i class='fa fa-user-minus w3-jumbo w3-text-indigo'></i><br>
<span style='width:20%'>Sign Out</span>
</div></a>
<hr>

</div>
