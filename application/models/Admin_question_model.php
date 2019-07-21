<?php

class Admin_question_model extends CI_Model {


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



}

//new
public function get_bulk($id)
{
   $query = $this->db->get_where('bulk_questions',array('id' => $id));

return $query->row_array();

}


//new
public function get_questions($condition_array)
{
   $query = $this->db->get_where('questions',$condition_array);

return $query->result_array();

}


//new
public function get_range($condition_array)
{
   $query = $this->db->get_where('ranges',$condition_array);

return $query->result_array();

}


//new
public function get_bulklist($offset,$limit)
{
    $this->db->order_by('id', 'DESC');

   $query = $this->db->get('bulk_questions',$limit,$offset);

return $query->result_array();

}


public function get_competitors()
{


}


public function insert_question()
{


//insert into pages

 $question = array(

'subject' => $this->input->post('subject'),/**/
  'year' => $this->input->post('year'),/**/
'answer' => $this->input->post('answer'),/**/
'question_img' => $this->upload->data("file_name"),/**/
'account_type' => $this->input->post('account_type'),/**/
'option_a' => $this->input->post('option_a'),
'option_b' => $this->input->post('option_b'),
'option_c' => $this->input->post('option_c'),
'option_d' => $this->input->post('option_d'),
'option_e' => $this->input->post('option_e'),
'option_type' => $this->input->post('option_type'),/**/
'question' => $this->input->post('question'),/**/
'comp' => $this->input->post('comp'),/**/
'question_type' => $this->input->post('question_type'),/**/
/*'level' => $this->input->post('level'),*/
'instructions' => $this->input->post('instructions'),/**/
'status' =>$this->input->post('status') ,/**/
'question_number' => $this->input->post('question_number') ,/**/
'paper_type' => $this->input->post('paper_type') ,/**/
 'author' => $_SESSION['name'],/**/
 'time' => time()/**/
);


if( $this->db->insert('questions',$question))
{


return true;

}



}


public function save_bulk_question($file_link,$file_type,$range_data)
{

$data = array(

'file_name' =>$file_link ,
'file_type' => $file_type ,
'exam_type' => $this->input->post("exam_type") ,
'time' => time() 


);


$range_data =array(

"year" => $this->input->post('year'),
"paper_type" => $this->input->post('paper_type'),
"subject" => $this->input->post('subject'),
"ranges" => $this->input->post('starting_num')."-".$this->input->post('stopping_num'),
"exam_type" => $this->input->post('exam_type'),
'time' => time()


);










if ($this->db->insert('bulk_questions',$data) && $this->db->insert('ranges',$range_data))
{
	return true;

}
return false;


}


public function save_split_bulk_question($file_link,$file_type,$range_data)
{

$data = array(

'file_name' =>$file_link ,
'file_type' => $file_type ,
'exam_type' => $this->input->post("exam_type") ,
'year' => $this->input->post("year") ,
'subject' => $this->input->post('subject') ,
'paper_type' => $this->input->post('paper_type') ,
'account_type' => $this->input->post('account_type') ,
'time' => time() 


);


$range_data =array(

"year" => $this->input->post('year'),
"paper_type" => $this->input->post('paper_type'),
"subject" => $this->input->post('subject'),
"ranges" => $this->input->post('starting_num')."-".$this->input->post('stopping_num'),
"exam_type" => $this->input->post('exam_type'),
'time' => time()


);










if ($this->db->insert('bulk_questions',$data) && $this->db->insert('ranges',$range_data))
{
	return true;

}
return false;


}
}
