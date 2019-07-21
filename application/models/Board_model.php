<?php

class Board_model extends CI_Model {


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


public function update_guest_log()
{



$holder = array(

"lastlog" => time()



)  ;


  $this->db->update("guests",$holder,array("id" => $_SESSION['recognition_id']));
}



public function insert_guest_log()
{
$data = array(
        'id' => $_SESSION['recognition_id'],
        'lastlog' => time(),
        'time' => time()
);
$this->db->insert("guests", $data);

}


public function get_guests()
{


    $this->db->order_by("lastlog","DESC");


    $query = $this->db->get('guests');
  return $query->result_array();




}



public function count_topics_added_at_time($time)
{


    $query = $this->db->query('SELECT * FROM topics WHERE time >= '.(time()-$time).';');
  return $query->result_array();




}





public function count_guest_online_at_time($time)
{


    $query = $this->db->query('SELECT * FROM guests WHERE time >= '.(time()-$time).';');
  return $query->result_array();




}




public function get_post_details($slug)
{


$query = $this->db->get_where('topics',array('slug' => $slug));
  return $query->row_array();


}
public function get_reply_details($id)
{


$query = $this->db->get_where('comments',array('id' => $id));
  return $query->row_array();


}


public function get_categories()
{

$this->db->select('long_value');
$query = $this->db->get_where('system_var',array('variable_name' => 'board_category'));
  return json_decode($query->row_array()['long_value']);


}



/*
public function get_pagelist($offset,$limit)
{

 $res = $this->db->get("pages",$limit,$offset);
$result = $res->result_array();
return $result;

 }

*/

public function get_categories_pag($offset,$limit,$cat)
{
  $this->db->order_by('id', 'DESC');
$query = $this->db->get_where('topics',array("category" => $cat),$limit,$offset);
  return $query->result_array();






}


public function get_topics_front($offset,$limit)
{
  $this->db->order_by('rank', 'DESC');
$query = $this->db->get_where('topics',array("front_status" => 'active'),$limit,$offset);
  return $query->result_array();






}


public function get_topic($conditions)
{
$query = $this->db->get_where('topics',$conditions);
  return $query->row_array();


}


public function get_reports($offset,$limit)
{
  $this->db->order_by('id', 'DESC');

  $query = $this->db->get_where('topics',array('report_status' => "reported"),$limit,$offset);
  return $query->result_array();


}


public function get_topics_for_admin($offset,$limit)
{
  $this->db->order_by('id', 'DESC');

$query = $this->db->get('topics',$limit,$offset);
  return $query->result_array();


}



public function get_admin_topics($offset,$limit)
{
  $this->db->order_by('id', 'DESC');

$query = $this->db->get_where('topics',array('user_id' => "@Admin"),$limit,$offset);
  return $query->result_array();


}

public function get_last_time_of_post()
{
  $this->db->select_max('time');
  $query = $this->db->get("topics");
  return $query->row_array()['time'];


}

public function get_last_time_of_comment()
{
  $this->db->select_max('time');
  $query = $this->db->get("comments");
  return $query->row_array()['time'];


}

public function count_topics()
{
$query = $this->db->get('topics');
return count($query->result_array());


}


public function count_comments()
{
$query = $this->db->get('comments');
  return count($query->result_array());


}



public function count_views()
{
$query = $this->db->get('views');
  return count($query->result_array());


}


public function count_page_views($conditions)
{
  $query = $this->db->get_where('views',$conditions);
  return count($query->result_array());


}




public function get_comments($conditions,$offset,$limit)
{
  $this->db->order_by('id', 'ASC');
$query = $this->db->get_where('comments',$conditions,$limit,$offset);
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

public function insert_view($slug)
{if(isset($_SESSION['id']))
{
  $user_type = "user";
  $visitor_id = $_SESSION['id'];
}else {
  $user_type = "guest";
  $visitor_id = "guest";
}
$data = array(
        'user_id' => $visitor_id,
        'user_type' => $user_type,
        'slug' => $slug,
        'time' => time()
);
$this->db->insert('views', $data);

}


public function report($slug,$type,$id)
{
if ($type == 'p') {

              $data = array(
                      'sender_id' => $_SESSION['id'],
                      'receiver_username' => "@admin",
                      'contents' => 'Reported A Board Post',
                      'type' => 'board_post_report',
                      'type_id' => $slug,
                      'status' => 'unread',
                      'time' => time()
              );
              $this->db->insert('notifications', $data);


                        $data = array(
                                'report_status' => "reported"
                        );

$this->db->update('topics', $data,array('slug' => $slug));

}elseif($type == 'r'){



                $data = array(
                        'sender_id' => $_SESSION['id'],
                        'receiver_username' => "@admin",
                        'contents' => 'Reported A Board Reply',
                        'type' => 'board_reply_report',
                        'type_id' => $id,
                        'status' => 'unread',
                        'time' => time()
                );

                $this->db->insert('notifications', $data);


                          $data = array(
                                  'report_status' => "reported"
                          );

              $this->db->update('comments', $data,array('id' => $id));

}


return TRUE;


}


public function like($slug,$type,$id,$receiver_username,$likes_array)
{
if ($type == 'p') {

              $data = array(
                      'sender_id' => $_SESSION['id'],
                      'receiver_username' => $receiver_username,
                      'contents' => 'Like your Board Post',
                      'type' => 'board_like_post',
                      'type_id' => $slug,
                      'status' => 'unread',
                      'time' => time()
              );
              $this->db->insert('notifications', $data);


            $data = array(
                    'likes' => $likes_array,


            );

$this->db->update('topics', $data,array('slug' => $slug ));

}elseif($type == 'r'){


      $data = array(
              'sender_id' => $_SESSION['id'],
              'receiver_username' => $receiver_username,
              'contents' => 'Like your Reply',
              'type' => 'board_like_reply',
              'type_id' => $id,
              'slug' => $slug,
              'status' => 'unread',
              'time' => time()
      );
      $this->db->insert('notifications', $data);


        $data = array(
                'likes' => $likes_array,


        );
        $this->db->update('comments', $data,array('id' => $id));

}


return TRUE;


}


public function unlike($slug,$type,$id,$likes_array)
{
if ($type == 'p') {


            $data = array(
                    'likes' => $likes_array,


            );

$this->db->update('topics', $data,array('slug' => $slug ));

}elseif($type == 'r'){



        $data = array(
                'likes' => $likes_array,


        );
        $this->db->update('comments', $data,array('id' => $id));

}


return TRUE;


}

public function insert_admin_topic($slug,$timg,$username)
{


     $post = array(
       'title' => $this->input->post('title',TRUE),
    'slug' => $slug,
    'img_url' => $timg,
    'status' => 'published',
    'user_id' => $username,
    'category' => $this->input->post('category',TRUE),
    'contents' => $this->input->post('contents',TRUE),
    'time' => time()
    );






  $this->db->insert('topics',$post);



}


public function insert_topic($slug,$timg,$username)
{
  $data = array(
          'sender_id' => $_SESSION['id'],
          'receiver_username' => '@admin',
          'sender_username' => $username,
          'contents' => 'Just Posted New Topic',
          'type' => 'board_post',
          'type_id' => $slug,
          'status' => 'unread',
          'time' => time()
  );



  $this->db->insert('notifications', $data);


     $post = array(
       'title' => $this->input->post('title',TRUE),
    'slug' => $slug,
    'img_url' => $timg,
    'status' => 'published',
    'user_id' => $_SESSION['id'],
    'category' => $this->input->post('category',TRUE),
    'contents' => $this->input->post('contents',TRUE),
    'likes' => '[]',
    'time' => time()
    );






 if( $this->db->insert('topics',$post))
 {


return true;

}else {
return false;
}




}



public function insert_reply($slug,$timg)
{
  $query = $this->db->get_where('topics',array('slug' => $slug));
    $id = $query->row_array()['user_id'];

    $query = $this->db->get_where('users',array('id' => $id));

    $receiver_username = $query->row_array()['username'];

    $query = $this->db->get_where('users',array('id' => $_SESSION['id']));

    $sender_username = $query->row_array()['username'];
if($sender_username != $receiver_username)
{
 $data = array(
          'sender_id' => $_SESSION['id'],
          'receiver_username' => $receiver_username,
          'contents' => 'Just Replied to your Board Post',
          'type' => 'board_post_reply',
          'type_id' => $slug,
          'status' => 'unread',
          'time' => time()
  );



  $this->db->insert('notifications', $data);
}

     $post = array(
    'slug' => $slug,
    'img_url' => $timg,
    'status' => 'published',
    'user_id' => $_SESSION['id'],
    'content' => $this->input->post('contents',TRUE),
    'likes' => '[]',
    'time' => time()
    );






 if( $this->db->insert('comments',$post))
 {


return true;

}else {
return false;
}




}


}
