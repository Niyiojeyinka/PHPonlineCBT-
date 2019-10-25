<?php


/***
 * Name:       CBT
 * Package:     time_helper.php
 * About:       time helper
 * Copyright:  (C) 2018,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/


function get_time_date()
{

  $_tme = ' '.date('H').' '.date('i').' '.date('s').' '.date('d').' '.date('F').' '.date('y');
return $_tme;


}


 function online_users($users_log_array)
{

$online_users_array =[];
foreach ($users_log_array as $value) {

if((time() - $value['lastlog']) < 100)
array_push($online_users_array,$value['id']);
}
return $online_users_array;
}
