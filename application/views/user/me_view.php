<div class='w3-container w3-center'>
  <hr>
  <div class='w3-container w3-card'>
    <div class="w3-padding w3-center"><br>
      <img class="w3-circle" style='width:30%;height:50%' src="<?php echo base_url('assets/images/profiles/'.$item['profile_img']); ?>" alt="avatar" style="width:75%">

    <br>
    </div>




    <?php


    echo "<b>".strtoUpper($item['firstname']).'  '.strtoUpper($item['lastname']).
    "(".ucfirst(strtolower($item['username'])).")</b></br>"; ?>



<br>

<div class='w3-center'>
<span><b>Status:</b></span><br>
<?php
 echo  "<div class='w3-small'>".$item['short_status'];
 ?>

</div><br>

</div>



<div class='w3-center'>
<span><b>Choices:</b></span><br>
<div class='w3-cell-row'>
<div class='w3-cell'>
 <?php echo $item['first_choice']; ?> </div>

 <div class='w3-cell'>
<?php echo $item['second_choice']; ?>

  </div>


</div>
<br>
<hr>
<br>
<div class='w3-cell-row'>
<div class='w3-cell'>
<?php echo $item['third_choice']; ?> </div>

 <div class='w3-cell'>
<?php echo $item['fourth_choice']; ?>

  </div>


</div>

<hr>
<span><b>Course:</b></span><br>
<?php echo $item['course'];
 ?>


<hr>
<span><b>Last Seen:</b></span><br>
<?php echo date( "F j, Y, g:i a",$item['lastlog']);
;
 ?>



<br>
<br>



</div>


   </div>
   <hr>




</div>
