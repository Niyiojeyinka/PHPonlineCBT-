<?php

class Admin_blog_model extends CI_Model {


/***
 * Name:      Pryce
 * Package:    Team_model.php
 * About:        A model class that handle Pryce Team  model operation
 * Copyright:  (C) 2018,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();

}




public function insert_note()
{

 $pag = array(

'title' => $this->input->post('topic'),
'text' => $this->input->post('contents'),
'subject' => $this->input->post('subject'),
'status' => 'published',
'slug' => url_title($this->input->post('topic'), 'dash', TRUE),
'author' => $_SESSION['name'],
'time' => time()
);

$this->db->insert('notes',$pag);


}


public function edit_note($slug)
{
$pag = array(

'title' => $this->input->post('topic'),
'text' => $this->input->post('contents'),
'subject' => $this->input->post('subject'),
'status' => 'published',
'time' => time()

);

$this->db->update("notes",$pag,array('slug' => $slug));

return true;
}
public function get_topic_by_slug($slug){

$query = $this->db->get_where("notes",array("slug" => $slug));
 return $query->row_array();
}

public function insert_post($what = NULL)
{

if($what == "pages")
{
//insert into pages
$slg = url_title($this->input->post('title'),"dash",TRUE);

 $pag = array(

'title' => $this->input->post('title'),
'keywords' => $this->input->post('keywords'),
 'description' => $this->input->post('desc'),
'text' => $this->input->post('contents'),
'status' => 'published',
'slug' => $slg,
'author' => $_SESSION['name'],
'time' => time(),
);


 $this->db->insert('pages',$pag);



}

}


public function edit_page($idkey)
{

//edit means to update



 $page = array(

'title' => $this->input->post('title'),
'keywords' => $this->input->post('keywords'),
'description' => $this->input->post('desc'),
'text' => $this->input->post('contents')
);


 if($this->db->update("pages",$page,array("id" => $idkey)))
 {

return true;

}
return false;
}


public function delete_item($type,$id)
{

if ($type == "page")
{


$this->db->delete("pages",array("id" => $id));


}elseif ($type == "board_post") {

  $this->db->delete("topics",array("id" => $id));

}
}


public function move_post_front($id,$type)
{

if ($type == "m")
{
 $pag = array(

'front_status' => "active",
'rank' => time()
);


$this->db->update("topics",$pag,array("id" => $id));


}


if ($type == "r")
{
 $pag = array(

   'front_status' => NULL
);






$this->db->update("topics",$pag,array("id" => $id));


}
}

public function move_item($type,$id,$status)
{

if ($type == "page" && $status == "published")
{
 $pag = array(

'status' => "drafted"
);


$this->db->update("pages",$pag,array("id" => $id));


}


elseif ($type == "page" && $status == "drafted")
{
 $pag = array(

'status' => "published"
);






$this->db->update("pages",$pag,array("id" => $id));


}
}


}
