<?php


/***
 * Name:       Pryce
 * Package:     question_helper.php
 * About:       question helper
 * Copyright:  (C) 2018,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/




 function randomize($out_put)
{


  $i = 0;
 $container =[];

 while($i < count($out_put) ){


for($x = 1;$x <= count($out_put);$x++){

  $ran = mt_rand(0,count($out_put)-1);
//add as many random numbers as available
  array_push($container,$out_put[$ran]['id']);

}


  $i++;

}
$uni_out_put = array_unique($container);
//remove duplicate

$uni_out_put = array_merge($uni_out_put);
//serialize key to be like 0,1...

    return $uni_out_put;
}

function unset_prev_sessions()
{

function unset_prev($ind)
{

  if(isset($_SESSION[$ind]))
  {
    unset($_SESSION[$ind]);
  }

}



unset_prev("subject_ids");

unset_prev("english_ids");
   unset_prev("subject_1_ids");
 unset_prev("subject_2_ids");
 unset_prev("subject_3_ids");


  unset_prev("stopped_time");
  unset_prev("start_time");
  unset_prev("submit");
  unset_prev("timeout");






  }
