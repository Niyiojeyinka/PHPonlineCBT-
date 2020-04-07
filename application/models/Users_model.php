<?php

class Users_model extends CI_Model {


/***
 * Name:      CBT
 * Package:    Users_model.php
 * About:        A model class that handle CBT user  model operation
 * Copyright:  (C) 2018
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();
    $this->load->library('session');

}
//new
public function register()
{



     $reg = array(

'firstname' =>  $this->input->post('firstname'),
'lastname' =>  $this->input->post('lastname'),
'email' => $this->input->post('email'),
'phone' => $this->input->post('phone'),
'password' => md5(md5($this->input->post('password'))),
'profile_img' => 'test.png',
 'level' => 1,
 'time' => time()

);



   $this->db->insert('users',$reg);


 return true;


}
//new
public function login_check()
{
$this->db->select('password');

$query = $this->db->get_where('users',array("email" => $this->input->post("email")));


$_pass = md5(md5($this->input->post('password')));
if (in_array($_pass,$query->row_array()) )
{
  return true;
}
   else
   {
   return false;
   }
}



//new
public function get_user_id_by_its_email($email)
{
   $query = $this->db->get_where('users',array("email" => $email));
  return $query->row_array()['id'];
}


//new
public function get_user_by_id()
{


    $query = $this->db->get_where('users',array("id" => $_SESSION["id"]));
  return $query->row_array();




}



}
