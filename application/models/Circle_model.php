<?php

class Circle_model extends CI_Model {


/***
 * Name:      Pryce
 * Package:    Circle_model.php
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
/*
public function get_pages($slug)
{


$query = $this->db->get_where('pages',array("slug" => $slug));
  return $query->row_array();




}*/
public function get_circle_details($slug)
{


$query = $this->db->get_where('circles',array('slug' => $slug));
  return $query->row_array();


}
public function get_top_circles($offset,$limit)
{

$this->db->select('circle_slug');
$query = $this->db->get_where('top',array('user_id' => $_SESSION['id']),$limit,$offset);
  return $query->result_array();


}




public function count_circles_added_at_time($time)
{


    $query = $this->db->query('SELECT * FROM circles WHERE time >= '.(time()-$time).';');
  return count($query->result_array());




}


public function count_messages_added_at_time($time)
{


    $query = $this->db->query('SELECT * FROM posts WHERE time >= '.(time()-$time).';');
    return count($query->result_array());




}




public function count_circle_for_admin()
{


    $query = $this->db->get('circles');
return count($query->result_array());



}


public function count_circle_messages()
{


    $query = $this->db->get('posts');
return count($query->result_array());



}



/*
public function get_pagelist($offset,$limit)
{

 $res = $this->db->get("pages",$limit,$offset);
$result = $res->result_array();
return $result;

 }

*/

public function get_circles_pag($offset,$limit)
{
  $this->db->order_by('id', 'DESC');
$query = $this->db->get_where('circles',array("privacy" => "public"),$limit,$offset);
  return $query->result_array();






}


public function get_circle($conditions)
{
$query = $this->db->get_where('circles',$conditions);
  return $query->row_array();


}




public function get_circles($where)
{
  $this->db->order_by('id', 'DESC');
$query = $this->db->get_where('circles',array("privacy" => $where));
  return $query->result_array();






}



public function get_posts_pag($conditions,$offset,$limit)
{
  $this->db->order_by('id', 'DESC');
$query = $this->db->get_where('posts',$conditions,$limit,$offset);
  return $query->result_array();






}



public function get_posts($conditions)
{
  $this->db->order_by('id', 'DESC');
$query = $this->db->get_where('posts',$conditions);
  return $query->result_array();






}



public function send_request($rusername,$susername,$req_array,$slug)
{
foreach ($rusername as $value) {

              $data = array(
                      'sender_id' => $_SESSION['id'],
                      'receiver_username' => $value,
                      'sender_username' => $susername,
                      'contents' => 'Want to join your circle',
                      'type' => 'circle_request',
                      'type_id' => $slug,
                      'status' => 'unread',
                      'time' => time()
              );



              $this->db->insert('notifications', $data);


}



          $data = array(
                  'requests' => $req_array
          );



      if(  $this->db->update('circles', $data,array('slug' => $slug)))
      {
return TRUE;

}
return FALSE;
}

public function accept_request($rusername,$susername,$circle_members,$slug,
$req,$dec_array,$user_id)
{

              $data = array(
                      'sender_id' => $_SESSION['id'],
                      'receiver_username' => $rusername,
                      'sender_username' => $susername,
                      'contents' => 'Accepted Your Request to join circle',
                      'type' => 'circle_accept',
                      'type_id' => $slug,
                      'status' => 'unread',
                      'time' => time()
              );


               $top_item = array(

              'user_id' => $user_id,
              'circle_slug' => $slug,
              'time' => time()
              );

$this->db->insert('top',$top_item);
              $this->db->insert('notifications', $data);






          $data = array(
                  'members_id' => $circle_members,
                  'requests' => $req,
                  'disa_mem_id' => $dec_array

          );



      if(  $this->db->update('circles', $data,array('slug' => $slug)))
      {
return TRUE;

}
return FALSE;
}


public function decline_request($rusername,$susername,$dec_members,$slug,$req)
{

              $data = array(
                      'sender_id' => $_SESSION['id'],
                      'receiver_username' => $rusername,
                      'sender_username' => $susername,
                      'contents' => 'Declined Your Request to join circle',
                      'type' => 'circle_decline',
                      'type_id' => $slug,
                      'status' => 'unread',
                      'time' => time()
              );



              $this->db->insert('notifications', $data);






          $data = array(
                  'disa_mem_id' => $dec_members,
                  'requests' => $req
          );



      if(  $this->db->update('circles', $data,array('slug' => $slug)))
      {
return TRUE;

}
return FALSE;
}


public function insert_members_id($arr,$slug,$new_member_id)
{

  $data = array(
          'sender_id' => $_SESSION['id'],
          'receiver_username' => $this->input->post('username'),
          'contents' => 'Added You to circle',
          'type' => 'circle_add',
          'type_id' => $slug,
          'status' => 'unread',
          'time' => time()
  );

//insert to favourite group
   $top_item = array(

  'user_id' => $new_member_id,
  'circle_slug' => $slug,
  'time' => time()
  );

$this->db->insert('top',$top_item);
  $this->db->insert('notifications', $data);


            $data = array(
                    'members_id' => json_encode($arr)
            );



        if(  $this->db->update('circles', $data,array('slug' => $slug)))
        {
  return TRUE;

  }
  return FALSE;



}



public function exit_circle($arr,$slug)
{


            $data = array(
                    'members_id' => json_encode($arr)
            );



        if(  $this->db->update('circles', $data,array('slug' => $slug)))
        {
  return TRUE;

  }
  return FALSE;



}



public function insert_circle_post($privacy,$slug,$username)
{
//search for username in input and use it to produce array
  $user_msg = trim($this->input->post('post',TRUE));

  $exploded =explode(" ",$user_msg);

  $i =0;


  //count previous no of post to keep track of msg page in a circle
  $query = $this->db->get('posts');

  //$query = $this->db->get_where('posts',array('receiver_id' => $slug ));
  $position_no = count($query->result_array()) +1 ;

  foreach ($exploded as $value) {


    if(stripos($value,"@") ==0)
     {


          $data = array(
                  'sender_id' => $_SESSION['id'],
                  'post_position' => $position_no,
                  'receiver_username' => $value,
                  'sender_username' => $username,
                  'contents' => 'mention you in a message',
                  'type' => 'circle_post',
                  'type_id' => $slug,
                  'status' => 'unread',
                  'time' => time()
          );



          $this->db->insert('notifications', $data);



    }


  }




   $post = array(
     'username' => $username,
  'privacy' => $privacy,
  'user_id' => $_SESSION['id'],
  'post_type' => "circle_post",
  'receiver_type' => "circle",
  'receiver_id' => $slug,
  'contents' => $this->input->post('post',TRUE),
  'time' => time()
  );



 if( $this->db->insert('posts',$post))
 {


return true;

}else {
return false;
}




}
/*

public function insert_p($admin_array,$member_array,$slug,$cimg)
{
$admin_array = json_encode($admin_array);
$member_array  = json_encode($member_array);
if($cimg == NULL)
{
  $cimg = "circle.png";
}

 $circle = array(

'name' => $this->input->post('name'),
'privacy' => $this->input->post('privacy'),
'details' => $this->input->post('description'),
'admin_id' => $admin_array,
'members_id' => $member_array,
'slug' => $slug,
'profile_img' => $cimg,
'time' => time()
);



 if( $this->db->insert('circles',$circle))
 {


return true;

}else {
return false;
}




}


*/

public function insert_circle($admin_array,$member_array,$slug,$cimg)
{
$admin_array = json_encode($admin_array);
$member_array  = json_encode($member_array);
if($cimg == NULL)
{
  $cimg = "circle.png";
}

 $circle = array(

'name' => $this->input->post('name'),
'privacy' => $this->input->post('privacy'),
'details' => $this->input->post('description'),
'admin_id' => $admin_array,
'members_id' => $member_array,
'requests' => json_encode(array()),
'disa_mem_id' => json_encode(array()),
'slug' => $slug,
'profile_img' => $cimg,
'time' => time()
);


 $top_item = array(

'user_id' => $_SESSION['id'],
'circle_slug' => $slug,
'time' => time()
);



 if( $this->db->insert('circles',$circle) &&  $this->db->insert('top',$top_item))
 {


return true;

}else {
return false;
}




}



}
