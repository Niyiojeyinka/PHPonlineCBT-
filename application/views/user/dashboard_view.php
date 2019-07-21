<div class="w3-container">

  <?php
  if(isset($_SESSION['err_msg']))
  {

    echo '<div class="w3-text-red">'.$_SESSION["err_msg"].'</div>';
  }
?>
<hr>
<div class="w3-center"><a href="<?php echo site_url('dashboard_ext/notifications'); ?>">
   Notifications<span class="w3-badge w3-theme"><?php echo $count_not; ?></span></a></div>
  <hr>
 <a href='<?php echo site_url('question/index'); ?>'><div class='w3-container w3-panel w3-center'>
<i class='fa fa-graduation-cap w3-jumbo w3-text-indigo'></i><br>
<span style='width:20%'>Practice UTME Computer Based  Test  Questions</span>
</div></a>
<hr>
<?php //echo $_SESSION['id']; ?>

  <hr>

<a href='<?php echo site_url('notes'); ?>'><div class='w3-container w3-panel w3-center'>
<i class='fa fa-book w3-jumbo w3-text-indigo'></i><br>
<span style='width:20%'>Read Notes</span><br>
</div></a>
<hr>

<hr>

<a href='<?php echo site_url('putme'); ?>'><div class='w3-container w3-panel w3-center'>
<i class='fa fa-building w3-jumbo w3-text-indigo'></i><br>
<span style='width:20%'>Pratice Post UTME Test</span><br>
</div></a>
<hr>




  <hr>

<a href='<?php echo site_url('board/index'); ?>'><div class='w3-container w3-panel w3-center'>
<i class='fa fa-bullhorn w3-jumbo w3-text-indigo'></i><br>
<span style='width:20%'>Public Board!</span>
</div></a>
<hr>



  <hr>

<a href='<?php echo site_url('circle'); ?>'><div class='w3-container w3-panel w3-center'>
<i class='fa fa-group w3-jumbo w3-text-indigo'></i><br>
<span style='width:20%'>Circles</span>
</div></a>
<hr>



  <hr>

<!--<a href='<?php echo site_url('dashboard/chat'); ?>'><div class='w3-container w3-panel w3-center'>
<i class='fa fa-comment-o w3-jumbo w3-text-indigo'></i><br>
<span style='width:20%'>Chats</span>
</div></a>
<hr>-->


</div>
