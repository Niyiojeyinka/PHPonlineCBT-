<?php

class Notes_model extends CI_Model {


/***
 * Name:      Pryce
 * Package:    Board_model.php
 * About:        A model class that handle Pryce's
  Users conversation model operation
 * Copyright:  (C) 2018,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();
if(isset($_SESSION['id']))
{
        $holder = array(

        "lastlog" => time()



        )  ;


          $this->db->update("users",$holder,array("id" => $_SESSION['id']));
}

}
public function get_note_by_topic($subject,$id)
{
	if (empty($subject) || (!isset($id))) {

$query = $this->db->get_where("notes",array("subject" => $subject,"status" => "published"));
 return $query->result_array()[0];
	}else{

		$query = $this->db->get_where("notes",array("subject" => $subject,
			"status" => "published","id" => $id));
 return $query->row_array();
	}

}

public function get_note_topic_list($subject)
{
	//$this->db->select("title");
$query = $this->db->get_where("notes",array("subject" => $subject,"status" => "published"));
 return $query->result_array();
}


}