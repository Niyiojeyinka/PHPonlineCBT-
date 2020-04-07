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



}
