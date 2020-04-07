<?php

class Question_model extends CI_Model {


/***
 * Name:      CBT
 * Package:    Question_model.php
 * About:        A model class that handle CBT user  model operation
 * Copyright:  (C) 2017,2018
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();
    $this->load->library('session');

   
}
/*
@description:A function to check if a test is active
@parameters:test (row array)
@returns  :PRE_TEST,ACTIVE,POST_TEST (all string)

*/
public function check_test_time_status($test)
{
        if($test['test_start'] < time() && time() < $test['test_end']){

        return "ACTIVE";
        }elseif($test['test_start'] > time()){
        return "PRE_TEST";
        }else{
        return "POST_TEST";

        }

}
public function get_question_by_id($id,$hide_answer)
{
  $question =$this->db->get_where("questions",["id"=>$id])->row_array();
  if ($hide_answer) {
    unset($question['answer']);
  }
 return $question;
}

}
