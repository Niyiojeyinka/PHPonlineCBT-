<?php

class Team_model extends CI_Model {


/***
 * Name:        CBT
 * Package:    Team_model.php
 * About:        A model class that handle plugpress Team  model operation
 * Copyright:  (C) 2017,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();

}



public function login_check()
{

 $this->db->select('password');
$query = $this->db->get_where('team',array("username" => $this->input->post("username")));
$_pass = $this->input->post('password');
if (in_array($_pass,$query->row_array()))
{ return true;
}
 else
   {
   return false;
   }

}


public function messages($limit,$offset)
{

   $this->db->order_by("id","DESC");

    $query = $this->db->get('cmessages',$limit,$offset);
  return $query->result_array();




}

public function get_message($id)
{



$query = $this->db->get_where('cmessages',array("id" => $id));


$upd = array(

'status' => 'read'

);

$this->db->update("cmessages",$upd,array('id' => $id));



  return $query->row_array();






}

}
