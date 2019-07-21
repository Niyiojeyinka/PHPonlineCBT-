<?php

class Dashboard_model extends CI_Model {


/***
 * Name:      Pryce
 * Package:    Dashboard_model.php
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

//new
public function get_avail_subject()
{

    $query = $this->db->get('subjects');
  return $query->result_array();



}



public function update_payment($ref)
{



$holder = array(

"status" => "Paid"



)  ;


  $this->db->update("payments",$holder,array("ref" => $ref));

}




//new
public function get_user_subjects_combination()
{

  $query = $this->db->get_where('users',array("id" => $_SESSION['id']));
  return $query->row_array()['subjects'];



}
public function get_payment_amount($ref)
{

  $query = $this->db->get_where('payments',array("ref" => $ref ,"status" => "Pre_pay"));
return $query->row_array()['amount'];
}



//new
public function insert_payment_details($user_id,$ref,$amount,$type)
{

if($type =='c'){
  //cashenvoy
  $method = "Online Card Payment";
}elseif ($type =='m') {
  //monapay
  $method = "Online Monapay Payment";

}


  $arr =  array(
    'amount' => $amount,
    'ref' => $ref,
    'user_id' =>$user_id ,
    'status' => "Pre_pay" ,
    'time' => time() ,
    'details' => "Deposit to Pryce Account" ,
    'method' => $method ,
    'product' => 'deposit'

   );


   $query = $this->db->get_where('payments',array("ref" => $ref));

 if($query->row_array() != NULL)
 {
   $this->db->update('payments',$arr,array('ref' => $ref));


 }else{
   $this->db->insert('payments',$arr);

 }



}


public function get_subjects($type)
{

  if($type == NULL)
  {


      $query = $this->db->get('questions');
      return $query->result_array();

  }else{
    $query = $this->db->get_where('questions',array(
    "account_type" => $type));
    return $query->result_array();

  }


}

//new
public function get_subject_question($subject,$type)
{
if($type == NULL)
{


    $query = $this->db->get_where('questions',array("subject" => $subject));
    return $query->result_array();

}else{
  $query = $this->db->get_where('questions',array("subject" => $subject,
  "account_type" => $type));
  return $query->result_array();

}



}



}
