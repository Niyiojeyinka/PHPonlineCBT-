<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {
/*

Name:Pryce
Date:Start writing  2018



*/



public function __construct()
{
     parent::__construct();

    $this->load->model(array('question_model','users_model','dashboard_model','circle_model','board_model','pages_model'));
         $this->load->helper(array('url','form','question_helper','page_helper','blog_helper','time_helper'));
     $this->load->library(array('form_validation','session'));
//user login check here

  /*    if (!isset($this->session->id) || !isset($this->session->logged_in))
       {      header('Location: '.base_url().'index.php/users/login');     }



if($this->dashboard_model->get_user_subjects_combination() == NULL )
{

show_page('Dashboard_ext/subject_comb');

}*/


}




public function index($offset =0)
{


    $limit = 3;




    $data['items'] = $this->board_model->get_topics_front($offset,
    $limit);

    	$this->load->library('pagination');

    	$config['base_url'] = site_url("board/index");



    $config['total_rows'] = count($this->board_model->get_topics_front(NULL,
    NULL));
    //  $config['total_rows'] = 10;
    	$config['per_page'] = $limit;

      $config['uri_segment'] = 3;
      $config['first_tag_open'] = '<span class="w3-btn  w3-indigo w3-text-white w3-round-xlarge">';
      $config['first_tag_close'] = '</span>';
      $config['last_tag_open'] = '<br><span class="w3-btn  w3-indigo w3-text-white w3-round-xlarge">';
      $config['last_tag_close'] = '</span>';
      $config['first_link'] = 'First';



      $config['prev_link'] = 'Prev';
      $config['next_link'] = 'Next';
      $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
      $config['next_tag_close'] = '</span><br>';
      $config['prev_tag_open'] = '<span style="" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
      $config['prev_tag_close'] = '</span>';
      $config['num_tag_open'] = '<span style="" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
      $config['num_tag_close'] = '</span>';
      $config['cur_tag_open'] = '<span style="" class="w3-btn w3-white w3-text-indigo w3-round-xlarge">';
      $config['cur_tag_close'] = '</span>';
      $config['last_link'] = 'Last';
      $config['display_pages'] = TRUE;
      //$config["use_page_numbers"] = TRUE;


    	   $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();




    if(isset($_SESSION['recognition_id']) && (!isset($_SESSION['id'])))
    {
    //update db time
    $this->board_model->update_guest_log();

    }elseif ((!isset($_SESSION['recognition_id'])) && (!isset($_SESSION['id']))) {
      $_SESSION['recognition_id'] = substr(md5(time()),1,8);

      $this->board_model->insert_guest_log();

    //insert new record

    }

    $data['no_guests'] = count(online_users($this->board_model->get_guests()));
    $data['no_online'] = count(online_users($this->users_model->get_users(NULL,NULL)));




        $data["title"] ="Pryce | Students' Board";
        $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
        $data["author"] ="Ojeyinka olaniyi philip";
       $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
       Examnation Candidates";
 $data['categories'] = $this->board_model->get_categories();

 $data['num_of_topics'] = $this->board_model->count_topics();
  $data['num_of_comments'] = $this->board_model->count_comments();
  $data['last_post_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_post());
  $data['last_comment_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_comment());
  $data['total_views'] = $this->board_model->count_views();
$v_slug ="board/index";
$data['page_views'] = $this->board_model->count_page_views(array('slug' => $v_slug));
$this->board_model->insert_view($v_slug);


      if(isset($_SESSION['id']))
      {
        $this->load->view('common/headmeta_view',$data);
        $data['user_details'] = $this->users_model->get_user_by_id();
        $this->load->view('user/common/users_nav_view',$data);

        $this->load->view('common/header_view',$data);


      }else{

        $this->load->view('common/headmeta_view',$data);

        $this->load->view('common/header_view',$data);

        $this->load->view('common/board_nav_view',$data);

      }
      $this->load->view('user/common/pre_content_view',$data);

           $this->load->view('user/board_view',$data);
           $this->load->view('user/common/post_content_view',$data);

      $this->load->view('common/footer_view',$data);






}



public function category($cat,$offset =0)
{

$data['slug'] =$cat;

  $limit = 5;




  $data['categories'] = $this->board_model->get_categories_pag($offset,
  $limit,$cat);

  	$this->load->library('pagination');

  	$config['base_url'] = site_url("board/category/".$cat);



  $config['total_rows'] = count($this->board_model->get_categories_pag(NULL,
  NULL,$cat));
  //  $config['total_rows'] = 10;
  	$config['per_page'] = $limit;

    $config['uri_segment'] = 4;
    $config['first_tag_open'] = '<span class="w3-btn  w3-indigo w3-text-white w3-round-xlarge">';
    $config['first_tag_close'] = '</span>';
    $config['last_tag_open'] = '<br><span class="w3-btn  w3-indigo w3-text-white w3-round-xlarge">';
    $config['last_tag_close'] = '</span>';
    $config['first_link'] = 'First';



    $config['prev_link'] = 'Prev';
    $config['next_link'] = 'Next';
    $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
    $config['next_tag_close'] = '</span><br>';
    $config['prev_tag_open'] = '<span style="" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
    $config['prev_tag_close'] = '</span>';
    $config['num_tag_open'] = '<span style="" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
    $config['num_tag_close'] = '</span>';
    $config['cur_tag_open'] = '<span style="" class="w3-btn w3-white w3-text-indigo w3-round-xlarge">';
    $config['cur_tag_close'] = '</span>';
    $config['last_link'] = 'Last';
    $config['display_pages'] = TRUE;
    //$config["use_page_numbers"] = TRUE;


  	   $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();



        $data["title"] ="Pryce | The Online Student Resources Center";
        $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
        $data["author"] ="Ojeyinka olaniyi philip";
       $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
       Examnation Candidates";

       $data['num_of_topics'] = $this->board_model->count_topics();
        $data['num_of_comments'] = $this->board_model->count_comments();
        $data['last_post_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_post());
        $data['last_comment_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_comment());
        $data['total_views'] = $this->board_model->count_views();
      $v_slug ="board/category/".$cat;
      $data['page_views'] = $this->board_model->count_page_views(array('slug' => $v_slug));
      $this->board_model->insert_view($v_slug);


      $this->load->view('common/headmeta_view',$data);
          if(isset($_SESSION['id']))
          {
            $data['user_details'] = $this->users_model->get_user_by_id();
            $this->load->view('user/common/users_nav_view',$data);

            $this->load->view('common/header_view',$data);

          }else{
            $this->load->view('common/header_view',$data);

            $this->load->view('common/board_nav_view',$data);

          }

          $this->load->view('user/common/board_upper_view',$data);
           $this->load->view('user/topics_category_view',$data);
           $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);






}



public function test()
{


}



public function like($slug,$type,$id,$receiver_id)
{


      $receiver_username = $this->users_model->get_user_by_its_id($receiver_id)['username'];
if($type == 'p')
{
  //use $slug
  $data['post_item'] =$this->board_model->get_post_details($slug);

        if($data['post_item']['likes'] != NULL)
        {
            $likes_array = json_decode($data['post_item']['likes']);
        }else{
          $likes_array =[];
        }
        if(isset($_SESSION['id']))
        {

        if(!in_array($_SESSION['id'],$likes_array))
        {
          array_push($likes_array,$_SESSION['id']);

        }

      }else{
        show_page('board/topic/'.$slug);

      }

}elseif ($type == 'r') {
//use $id
  $data['reply_item'] =$this->board_model->get_reply_details($id);
  if($data['reply_item']['likes'] != NULL)
  {
      $likes_array = json_decode($data['reply_item']['likes']);
  }else{
    $likes_array =[];
  }
  if(isset($_SESSION['id']))
  {

  if(!in_array($_SESSION['id'],$likes_array))
  {
    array_push($likes_array,$_SESSION['id']);

  }
}else{
  show_page('board/topic/'.$slug);

}
}

if(isset($_SESSION['id']))
{
    if($this->board_model->like($slug,$type,$id,$receiver_username,json_encode($likes_array)))
    {
      show_page('board/topic/'.$slug);

    }else{
         $_SESSION['err_report'] = '<span class="w3-text-red">Error occurred</span>';
         $this->session->mark_as_flash('err_report');
         show_page('board/topic/'.$slug);

    }
  }


}


public function unlike($slug,$type,$id,$receiver_id)
{


      if(!isset($_SESSION['id']))
      {
    show_page('users/login');
      }


      //function to removeby value from arrays

        function array_remove_value($arr,$value)
      {

      return array_values(array_diff($arr,array($value)));

      }





      $receiver_username = $this->users_model->get_user_by_its_id($receiver_id)['username'];
if($type == 'p')
{
  //use $slug
  $data['post_item'] =$this->board_model->get_post_details($slug);

        if($data['post_item']['likes'] != NULL)
        {
            $likes_array = json_decode($data['post_item']['likes']);
        }else{
          $likes_array =[];
        }

            if(in_array($_SESSION['id'],$likes_array))
            {
          $likes_array = array_remove_value($likes_array,$_SESSION['id']);
        }else{

          show_page('board/topic/'.$slug);

        }
}elseif ($type == 'r') {
//use $id
  $data['reply_item'] =$this->board_model->get_reply_details($id);
  if($data['reply_item']['likes'] != NULL)
  {
      $likes_array = json_decode($data['reply_item']['likes']);
  }else{
    $likes_array =[];
  }


    if(in_array($_SESSION['id'],$likes_array))
    {
  $likes_array = array_remove_value($likes_array,$_SESSION['id']);
}else{

  show_page('board/topic/'.$slug);

}
}


    if($this->board_model->unlike($slug,$type,$id,json_encode($likes_array)))
    {

      show_page('board/topic/'.$slug);

    }else{
         $_SESSION['err_report'] = '<span class="w3-text-red">Error occurred</span>';
         $this->session->mark_as_flash('err_report');
         show_page('board/topic/'.$slug);

    }


}



public function report($slug,$type,$id)
{
  //alert admin


    if(!isset($_SESSION['id']))
    {
  show_page('users/login');
    }

  if($this->board_model->report($slug,$type,$id))
  {
    $_SESSION['err_report'] = '<span class="w3-text-blue">The Content Have been
     flagged and will be review by the Admin shortly.Thank you for reporting.</span>';
    $this->session->mark_as_flash('err_report');
    show_page('board/topic/'.$slug);

  }else{
       $_SESSION['err_report'] = '<span class="w3-text-red">Error occurred</span>';
       $this->session->mark_as_flash('err_report');
       show_page('board/topic/'.$slug);

  }


}




public function reply($slug)
{
$data['slug'] =$slug;

  if(!isset($_SESSION['id']))
  {
show_page('users/login');
  }
       $this->form_validation->set_rules("contents","Contents","required");


       	$config['upload_path'] = "./assets/topics";
       	$config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '500';
          $config['max_width'] = '500';
           $config['max_height'] = '500';

        $this->load->library('upload', $config);

        $data['user_details'] = $this->users_model->get_user_by_id();


 if($this->upload->do_upload('topic_image') == TRUE)
 {
   $UP = 1;
 }
      // 	if($this->form_validation->run() == FALSE || $this->upload->do_upload('circle_image') == FALSE)
	if($this->form_validation->run() == FALSE )

       	{

       	//show error


      $data["title"] ="Pryce | The Online Student Resources Center";
      $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
     Examnation Candidates";

     $data['num_of_topics'] = $this->board_model->count_topics();
      $data['num_of_comments'] = $this->board_model->count_comments();
      $data['last_post_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_post());
      $data['last_comment_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_comment());
      $data['total_views'] = $this->board_model->count_views();
    $v_slug ="board/reply";
    $data['page_views'] = $this->board_model->count_page_views(array('slug' => $v_slug));
    $this->board_model->insert_view($v_slug);


    $this->load->view('common/headmeta_view',$data);

          $this->load->view('user/common/users_nav_view',$data);

          $this->load->view('common/header_view',$data);


        $this->load->view('user/common/board_upper_view',$data);
         $this->load->view('user/reply_view',$data);
         $this->load->view('user/common/post_content_view',$data);
    $this->load->view('common/footer_view',$data);




}else{


$timg =$this->upload->data("file_name");


if($this->board_model->insert_reply($slug,$timg))
{

  show_page('board/topic/'.$slug);

}else{
     $_SESSION['err_report'] = '<span class="w3-text-red">Error occurred</span>';
     $this->session->mark_as_flash('err_report');
  show_page('board/reply/'.$slug);

}
}

}


public function post_new_topic()
{


  if(!isset($_SESSION['id']))
  {
show_page('users/login');
  }
       $this->form_validation->set_rules("title","Title","required|is_unique[topics.title]");
       $this->form_validation->set_rules("contents","Contents","required");
       $this->form_validation->set_rules("category","Category","required");


       	$config['upload_path'] = "./assets/topics";
       	$config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '500';
          $config['max_width'] = '500';
           $config['max_height'] = '500';

        $this->load->library('upload', $config);

        $data['user_details'] = $this->users_model->get_user_by_id();


 if($this->upload->do_upload('topic_image') == TRUE)
 {
   $UP = 1;
 }
      // 	if($this->form_validation->run() == FALSE || $this->upload->do_upload('circle_image') == FALSE)
	if($this->form_validation->run() == FALSE )

       	{

       	//show error

          $data["title"] ="Pryce | Post new Topics";
$data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
$data["author"] ="Ojeyinka olaniyi philip";
$data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
Examnation Candidates";
$data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
     $data['upload_err'] = $this->upload->display_errors();
     $data['categories'] = $this->board_model->get_categories();

     $data['num_of_topics'] = $this->board_model->count_topics();
      $data['num_of_comments'] = $this->board_model->count_comments();
      $data['last_post_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_post());
      $data['last_comment_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_comment());
      $data['total_views'] = $this->board_model->count_views();
    $v_slug ="board/post_new_topic";
    $data['page_views'] = $this->board_model->count_page_views(array('slug' => $v_slug));
    $this->board_model->insert_view($v_slug);


        $this->load->view('common/headmeta_view',$data);
            $this->load->view('user/common/users_nav_view',$data);
            $this->load->view('common/header_view',$data);
            $this->load->view('user/common/board_upper_view',$data);
           $this->load->view('user/post_new_topic_view',$data);
           $this->load->view('user/common/post_content_view',$data);
        $this->load->view('common/footer_view',$data);
}else{

$slug = url_title($this->input->post('title'), 'dash', TRUE);

$timg =$this->upload->data("file_name");


if($this->board_model->insert_topic($slug,$timg,$data['user_details']['username']))
{

  show_page('board/topic/'.$slug);

}else{
     $_SESSION['err_report'] = '<span class="w3-text-red">Error occurred</span>';
     $this->session->mark_as_flash('err_report');
  show_page('board/post_new_topic');

}
}

}


public function topic($slug,$offset=0)
{

    $limit = 5;


    $conditions = array('slug' => $slug );

    $data['comments'] =$this->board_model->get_comments($conditions,$offset,$limit);


    	$this->load->library('pagination');

    	$config['base_url'] = site_url("board/topic/".$slug);



    $config['total_rows'] = count($this->board_model->get_comments($conditions,NULL,
    NULL));
    //  $config['total_rows'] = 10;
    	$config['per_page'] = $limit;

      $config['uri_segment'] = 4;
      $config['first_tag_open'] = '<span class="w3-btn  w3-indigo w3-text-white w3-round-xlarge">';
      $config['first_tag_close'] = '</span>';
      $config['last_tag_open'] = '<br><span class="w3-btn  w3-indigo w3-text-white w3-round-xlarge">';
      $config['last_tag_close'] = '</span>';
      $config['first_link'] = 'First';



      $config['prev_link'] = 'Prev';
      $config['next_link'] = 'Next';
      $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
      $config['next_tag_close'] = '</span><br>';
      $config['prev_tag_open'] = '<span style="" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
      $config['prev_tag_close'] = '</span>';
      $config['num_tag_open'] = '<span style="" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
      $config['num_tag_close'] = '</span>';
      $config['cur_tag_open'] = '<span style="" class="w3-btn w3-white w3-text-indigo w3-round-xlarge">';
      $config['cur_tag_close'] = '</span>';
      $config['last_link'] = 'Last';
      $config['display_pages'] = TRUE;
      //$config["use_page_numbers"] = TRUE;


    	   $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();



    $data['slug'] = $slug;


  //slug as reciever id in post table


      $conditions = array('slug' => $slug );
        $data['item'] =$this->board_model->get_topic($conditions);

$this->board_model->insert_view($slug);
  $data["title"] ="Pryce | ".ucfirst($data['item']['title']);
$data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
$data["author"] ="Ojeyinka olaniyi philip";
$data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
Examnation Candidates";

$data['num_of_topics'] = $this->board_model->count_topics();
 $data['num_of_comments'] = $this->board_model->count_comments();
 $data['last_post_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_post());
 $data['last_comment_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_comment());
 $data['total_views'] = $this->board_model->count_views();
$v_slug =$slug;
$data['page_views'] = $this->board_model->count_page_views(array('slug' => $v_slug));

$conditions = array('slug' => $slug );

$data['page_comments'] =count($this->board_model->get_comments($conditions,NULL,NULL));



    if(isset($_SESSION['id']))
      {
        $this->load->view('common/headmeta_view',$data);
        $data['user_details'] = $this->users_model->get_user_by_id();
        $this->load->view('user/common/users_nav_view',$data);

        $this->load->view('common/header_view',$data);


      }else{

        $this->load->view('common/headmeta_view',$data);

        $this->load->view('common/header_view',$data);

        $this->load->view('common/board_nav_view',$data);

      }

      $this->load->view('user/common/board_upper_view',$data);
      $this->load->view('user/topic_single_view',$data);
      $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);





}



}
