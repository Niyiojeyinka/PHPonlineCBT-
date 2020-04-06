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
  
}

public function get_next_test_id()
{
 $test_id = $this->db->get_where("system_var",["variable_name"=>"next_test_id"])->row_array()['variable_value'];
 
 return (int) $test_id;
}

public function get_next_test()
{
 $test_id = $this->get_next_test_id();
 return $this->db->get_where("tests",['id' => $test_id])->row_array();
}
}
