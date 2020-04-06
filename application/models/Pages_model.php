<?php

class Pages_model extends CI_Model {


/***
 * Name:      CBT
 * Package:    Pages_model.php
 * About:        A model class that handle CBT's  model operation
 * Copyright:  (C) 2017,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();

}

public function get_pages($slug)
{


$query = $this->db->get_where('pages',array("slug" => $slug));
  return $query->row_array();




}
public function get_page_id($id)
{


$query = $this->db->get_where('pages',array("id" => $id));
  return $query->row_array();


}


public function get_pagelist($offset,$limit)
{

 $query = $this->db->get("pages",$limit,$offset);
return $query->result_array();


 }



public function get_pages_draft($offset,$limit)
{
$query = $this->db->get_where('pages',array("status" => "drafted"),$limit,$offset);
  return $query->result_array();






}


public function get_common($position)
{
//position option :pre_content,post_content,mid_content


$query = $this->db->get_where('common_tab',array("position" => $position));
  return $query->result_array();






}
public function delete_common($id)
{
//position option :pre_content,post_content,mid_content


$query = $this->db->delete('common_tab',array("id" => $id));

 return true;
}



public function get_commons()
{

   // $this->db->order_by("id","DESC");


$res = $this->db->get("common_tab");
$result = $res->result_array();
return $result;
}

public function edit_common($id)
{

$temp = array(

'content' => $this->input->post('content'),
'position' => $this->input->post('position'),
'short_det' => $this->input->post('name')



);

$this->db->update("common_tab",$temp,array('id' => $id));

return true;
}


public function insert_common()
{

$cmm = array(

'content' => $this->input->post('content'),
'position' => $this->input->post('position'),
'short_det' => $this->input->post('name')



);

if( $this->db->insert('common_tab',$cmm))
{


return true;

}
return false;





}




public function get_common_id($id)
{


$query = $this->db->get_where('common_tab',array("id" => $id));
  return $query->row_array();


}


public function insert_contact()
{


 $contact = array(

'name' => $this->input->post('name'),
'title' => $this->input->post('title'),
'email' => $this->input->post('email'),
'phone' => $this->input->post('phone'),
'message' => $this->input->post('message'),
'status' => 'unread',
'solved' => 'no',
'time' => time()
);



 if( $this->db->insert('cmessages',$contact))
 {


return true;

}else {
return false;
}




}



}
