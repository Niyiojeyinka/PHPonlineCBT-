<?php

class Question_model extends CI_Model {


/***
 * Name:      Pryce
 * Package:    Question_model.php
 * About:        A model class that handle Pryce user  model operation
 * Copyright:  (C) 2017,2018
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();
    $this->load->library('session');

    $holder = array(

    "lastlog" => time()



    )  ;


      $this->db->update("users",$holder,array("id" => $this->session->id));


}



public function count_questions_added_at_time($time)
{


    $query = $this->db->query('SELECT * FROM questions WHERE time >= '.(time()-$time).';');
  return $query->result_array();




}




public function count_questions($type)
{

if($type == NULL)
{

      $query = $this->db->get('questions');
    return count($query->result_array());


}else{


  $query = $this->db->get_where('questions',array('account_type' => $type));
return count($query->result_array());


}



}

public function get_leaders($offset,$limit)
{

    $query = $this->db->get('results',$limit,$offset);
  return $query->result_array();


}

public function get_leaders_at_time($time)
{


    $query = $this->db->query('SELECT * FROM results WHERE time >= '.(time()-$time).';');
  return $query->result_array();




}




//new
public function get_putme_questions($condition_array)
{
$this->db->select('id');
  $query = $this->db->get_where('putme_questions',$condition_array);

return $query->result_array();

}


//new
public function get_questions($condition_array)
{
$this->db->select('id');
  $query = $this->db->get_where('questions',$condition_array);

return $query->result_array();

}

public function insert_result($time_used,$time_allowed,$standard_score,
$no_of_question){

$percentage_score = (($standard_score/400)*100);

$dab = array(
"user_id" => $_SESSION['id'],
"standard_score" => number_format($standard_score),
"no_of_question" => $no_of_question,
"time" => time(),
"time_used" => $time_used,
"time_allowed" => $time_allowed,
"start_time" => $_SESSION['start_time'],
"percentage_got" => number_format($percentage_score),
"time_used_percentage" => number_format(($time_used/$time_allowed)*100)
);

$this->db->insert("results",$dab);

}



//new
public function get_questions_contents_with_or($id,$id1)
{
$this->db->select('*');
$this->db->where('id', $id);
$this->db->or_where('id', $id1);
  $query = $this->db->get('questions');

return $query->result_array();

}


//new
public function get_question($condition_array)
{


    $query = $this->db->get_where('questions', $condition_array);
  return $query->row_array();



}



//new
public function get_question_putme($condition_array)
{


    $query = $this->db->get_where('putme_questions', $condition_array);
  return $query->row_array();



}

//new
public function get_result($condition_array)
{


    $query = $this->db->get_where('results', $condition_array);
  return $query->row_array();



}





/*
public function get_vstatus()
{//options:verified,unverified,pending

  $query = $this->db->get_where('users',array("email" => $_SESSION['email']));
  return $query->row_array()['status'];



}


public function get_vcode()
{


    $query = $this->db->get_where('users',array("email" => $_SESSION['email']));
  return $query->row_array()['emailvc'];



}


    public function change_vcode()
    {

   $dab = array(
   "status" => "verified",
   "emailvc" => null
   ) ;


 if( $this->db->update('users',$dab,array("email" => $_SESSION["email"])))
 {

             $datah = array(

         'user_email' => $_SESSION['email'],
         'account_type' => 'General',
        'action' => 'Account Email Verified',
         'time' => time()

        );


         $this->db->insert('history',$datah);



return true;

}else {
return false;
}





    }

*/

}
