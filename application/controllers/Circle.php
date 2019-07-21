<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Circle extends CI_Controller {
/*

Name:Pryce
Date:Start writing  2018



*/



public function __construct()
{
     parent::__construct();

    $this->load->model(array('question_model','users_model','dashboard_model','circle_model','board_model','pages_model'));
         $this->load->helper(array('url','form','question_helper','page_helper','blog_helper'));
     $this->load->library(array('form_validation','session'));
//user login check here

      if (!isset($this->session->id) || !isset($this->session->logged_in))
       {      header('Location: '.base_url().'index.php/users/login');     }



if($this->dashboard_model->get_user_subjects_combination() == NULL )
{

show_page('Dashboard_ext/subject_comb');

}

}



public function index($offset =0)
{

$v_slug = "circle/index";
$this->board_model->insert_view($v_slug);

  $limit = 3;


  $top_list = $this->circle_model->get_top_circles($offset,
  $limit);

  	$this->load->library('pagination');

  	$config['base_url'] = site_url("circle/index");



  $config['total_rows'] = count($this->circle_model->get_top_circles(NULL,
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
    $config['last_link'] = 'Last';
    $config['display_pages'] = false;


  	   $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();



        $data["title"] ="Pryce | The Online Student Resources Center";
        $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
        $data["author"] ="Ojeyinka olaniyi philip";
       $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
       Examnation Candidates";
       $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['user_details'] = $this->users_model->get_user_by_id();

       $subject =json_decode($data['user_details']['subjects'])[0];
       $conditions = array('name' => $subject );
         $data['sub_circle_1'] = $this->circle_model->get_circle($conditions);

      $subject =json_decode($data['user_details']['subjects'])[1];
      $conditions = array('name' => $subject );
     $data['sub_circle_2'] = $this->circle_model->get_circle($conditions);

     $subject =json_decode($data['user_details']['subjects'])[2];
     $conditions = array('name' => $subject );
     $data['sub_circle_3'] = $this->circle_model->get_circle($conditions);


    $subject =json_decode($data['user_details']['subjects'])[3];
    $conditions = array('name' => $subject );
    $data['sub_circle_4'] = $this->circle_model->get_circle($conditions);
$data['sub_circle'] =  array($data['sub_circle_1'],$data['sub_circle_2'],$data['sub_circle_3']
,$data['sub_circle_4']);




  $data['gotten_circles'] =[];
for ($i=0;$i<= count($top_list)-1;$i++) {

$conditions = array('slug' => $top_list[$i]['circle_slug'] );
  $circle_item_g = $this->circle_model->get_circle($conditions);
    array_push($data['gotten_circles'],$circle_item_g);
}



      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
           $this->load->view('user/circle_view',$data);
      $this->load->view('common/footer_view',$data);






}



public function circle_list($offset =0)
{


  $v_slug = "circle/circle_lists";
  $this->board_model->insert_view($v_slug);


  $limit = 8;




  $data['circles'] = $this->circle_model->get_circles_pag($offset,
  $limit);

  	$this->load->library('pagination');

  	$config['base_url'] = site_url("circle/circle_list");



  $config['total_rows'] = count($this->circle_model->get_circles("public"));
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
    $config['last_link'] = 'Last';
    $config['display_pages'] = false;


  	   $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();



        $data["title"] ="Pryce | The Online Student Resources Center";
        $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
        $data["author"] ="Ojeyinka olaniyi philip";
       $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
       Examnation Candidates";
       $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['user_details'] = $this->users_model->get_user_by_id();


      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
          $this->load->view('user/common/pre_content_view',$data);
           $this->load->view('user/circle_list_view',$data);
           $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);






}



public function test()
{

    $top_list = $this->circle_model->get_top_circles(0,
    8);

var_dump($top_list);
var_dump(array_values($top_list[0]));



}






public function create_new_circle()
{


  $v_slug = "circle/create_new_circle";
  $this->board_model->insert_view($v_slug);


       $this->form_validation->set_rules("name","Circle Name","required|is_unique[circles.name]");
       $this->form_validation->set_rules("privacy","Privacy","required");
       $this->form_validation->set_rules("description","Description","required");


       	$config['upload_path'] = "./assets/circles";
       	$config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '500';
          $config['max_width'] = '800';
           $config['max_height'] = '600';

        $this->load->library('upload', $config);



 if($this->upload->do_upload('circle_image') == TRUE)
 {
   $UP = 1;
 }
      // 	if($this->form_validation->run() == FALSE || $this->upload->do_upload('circle_image') == FALSE)
	if($this->form_validation->run() == FALSE )

       	{

       	//show error

       	          $data["title"] ="Pryce | Create new circle";
          $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
          $data["author"] ="Ojeyinka olaniyi philip";
         $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
         Examnation Candidates";
         $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
         $data['user_details'] = $this->users_model->get_user_by_id();
               $data['upload_err'] = $this->upload->display_errors();

        $this->load->view('common/headmeta_view',$data);
            $this->load->view('user/common/users_nav_view',$data);
            $this->load->view('common/header_view',$data);
            $this->load->view('user/common/pre_content_view',$data);
           $this->load->view('user/create_circle_view',$data);
           $this->load->view('user/common/post_content_view',$data);
        $this->load->view('common/footer_view',$data);
}else{

$admin_array = $member_array =[];
$admin_array[0] = $this->session->id;
$member_array[0] = $this->session->id;
$slug = url_title($this->input->post('name'), 'dash', TRUE);

$cimg =$this->upload->data("file_name");


if($this->circle_model->insert_circle($admin_array,$member_array,$slug,$cimg))
{

  show_page('circle/dash/'.$slug);

}else{
     $_SESSION['err_report'] = '<span class="w3-text-red">Error occurred</span>';
     $this->session->mark_as_flash('err_report');
  show_page('circle/create_new_circle');

}
}

}

public function request_action($slug,$action,$id)
{




  $data['user_details'] = $this->users_model->get_user_by_id();
  $data['receiver_details'] = $this->users_model->get_user_by_its_id($id);

    $data['circle_item'] =$this->circle_model->get_circle_details($slug);

if($data['circle_item']['disa_mem_id'] != NULL)
{
    $dec_array = json_decode($data['circle_item']['disa_mem_id']);
}else{
  $dec_array =[];
}
    $admin_array = json_decode($data['circle_item']['admin_id']);

        $member_array = json_decode($data['circle_item']['members_id']);
        $req_array = json_decode($data['circle_item']['requests']);

//function to removeby value from arrays

  function array_remove_value($arr,$value)
{

return array_values(array_diff($arr,array($value)));

}




switch ($action) {
  case 'accept':
  if($data['circle_item']['privacy'] == 'closed')
  {
  //only admin can accept and notify user upon acceptance
  if (!in_array($_SESSION['id'],$admin_array)) {
    $_SESSION['err_msg'] ="Operation failed,The function is for Closed Circle Admin only";
    $this->session->mark_as_flash('err_msg');
  }else{
    //add user id to memberand remove user id from request
    array_push($member_array,$id);
    $member_array = array_unique($member_array);

    $req_array = array_remove_value($req_array,$id);


if(in_array($id,$dec_array))
{

  $dec_array =json_encode(array_remove_value($dec_array,$id));
}else{
  $dec_array =json_encode($dec_array);

}

    if( $this->circle_model->accept_request($data['receiver_details']['username'],$data['user_details']['username'],
    json_encode($member_array),$slug,json_encode($req_array),$dec_array,$id))
    {
      $_SESSION['err_msg'] ="User Accepted";
      $this->session->mark_as_flash('err_msg');
    }

  }

  }elseif ($data['circle_item']['privacy'] == 'public') {
    //anyone can accept and notify user upon acceptance

  if (!in_array($_SESSION['id'],$member_array)) {
    $_SESSION['err_msg'] ="Operation failed,The function is for Circle Member only";
    $this->session->mark_as_flash('err_msg');
  }
  else{
    //add and remove req
    array_push($member_array,$id);
    $member_array = array_unique($member_array);

    $req_array = array_remove_value($req_array,$id);

    if(in_array($id,$dec_array))
    {

      $dec_array =json_encode(array_remove_value($dec_array,$id));
    }else{
      $dec_array =json_encode($dec_array);

    }

        if( $this->circle_model->accept_request($data['receiver_details']['username'],$data['user_details']['username'],
        json_encode($member_array),$slug,json_encode($req_array),$dec_array,$id))
        {
          $_SESSION['err_msg'] ="User Accepted";
          $this->session->mark_as_flash('err_msg');
        }
  }
}
    break;

    case 'decline':
  //insert to decline box remove from requests box
  array_push($dec_array,$id);
  $dec_array = array_unique($dec_array);
  $req_array = array_remove_value($req_array,$id);

  if( $this->circle_model->decline_request($data['receiver_details']['username'],$data['user_details']['username'],
  json_encode($dec_array),$slug,json_encode($req_array)))
  {
    $_SESSION['err_msg'] ="User Declined";
    $this->session->mark_as_flash('err_msg');  }



    break;
}


show_page('dashboard');



}
public function request($slug)
{
  $v_slug = "circle/request";
  $this->board_model->insert_view($v_slug);



          $data["title"] ="Pryce | The Online Student Resources Center";
          $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
          $data["author"] ="Ojeyinka olaniyi philip";
         $data["descriptions"] ="The online Education Platform for Student and
         Unified Tertiary Matriculation
         Examnation Candidates";
         $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
         $data['user_details'] = $this->users_model->get_user_by_id();

         $data['circle_item'] =$this->circle_model->get_circle_details($slug);
        $data['slug'] = $slug;

if(!isset($_POST['request']))
{

                 $this->load->view('common/headmeta_view',$data);
                     $this->load->view('user/common/users_nav_view',$data);
                     $this->load->view('common/header_view',$data);
                     $this->load->view('user/common/pre_content_view',$data);
                     $this->load->view('user/send_c_request_view',$data);
                     $this->load->view('user/common/post_content_view',$data);
                 $this->load->view('common/footer_view',$data);



}else{
  $data['circle_item'] =$this->circle_model->get_circle_details($slug);

  $admin_array = json_decode($data['circle_item']['admin_id']);

  $data['circle_item'] =$this->circle_model->get_circle_details($slug);

  $req_array = json_decode($data['circle_item']['requests']);
  /*$req_array =*/ array_push($req_array,$_SESSION['id']);
  $req_array = array_unique($req_array);
  $data['user_details'] = $this->users_model->get_user_by_id();
  $admin_usernames = [];

foreach ($admin_array as $value) {

array_push($admin_usernames,
$this->users_model->get_user_by_its_id($value)['username']);
}


  if( $this->circle_model->send_request($admin_usernames,  $data['user_details']['username'],
  json_encode($req_array),$slug))
  {
    show_page('circle/request/'.$slug);

  }


  show_page('circle/request/'.$slug);
}

}

public function show_requests($slug)
{
  $v_slug = "circle/show_request";
  $this->board_model->insert_view($v_slug);



          $data["title"] ="Pryce | The Online Student Resources Center";
          $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
          $data["author"] ="Ojeyinka olaniyi philip";
         $data["descriptions"] ="The online Education Platform for Student and
         Unified Tertiary Matriculation
         Examnation Candidates";
         $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
         $data['user_details'] = $this->users_model->get_user_by_id();

         $data['circle_item'] =$this->circle_model->get_circle_details($slug);
        $data['slug'] = $slug;

    $req_array = json_decode($data['circle_item']['requests']);

  $det_arrays=[];
foreach ($req_array as $value) {

$user_det = $this->users_model->get_user_by_its_id($value);
array_push($det_arrays,$user_det);

}
$data['requests'] = $det_arrays;
//var_dump($det_arrays);

           $this->load->view('common/headmeta_view',$data);
               $this->load->view('user/common/users_nav_view',$data);
               $this->load->view('common/header_view',$data);
               $this->load->view('user/common/pre_content_view',$data);
               $this->load->view('user/accept_c_request_view',$data);
               $this->load->view('user/common/post_content_view',$data);
           $this->load->view('common/footer_view',$data);



}

public function members($slug,$offset =0)
{
  $data['circle_item'] =$this->circle_model->get_circle_details($slug);

  $member_array = json_decode($data['circle_item']['members_id']);

  $v_slug = "circle/members";
  $this->board_model->insert_view($v_slug);



    $limit = 7;




    	$this->load->library('pagination');

    	$config['base_url'] = site_url("circle/members/".$slug);



    $config['total_rows'] = count($member_array);
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
      $config['last_link'] = 'Last';
      $config['display_pages'] = false;


    	   $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();




          $data["title"] ="Pryce | The Online Student Resources Center";
          $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
          $data["author"] ="Ojeyinka olaniyi philip";
         $data["descriptions"] ="The online Education Platform for Student and
         Unified Tertiary Matriculation
         Examnation Candidates";
         $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
         $data['user_details'] = $this->users_model->get_user_by_id();

        $data['slug'] = $slug;

      $member_array = array_slice($member_array,$offset,$limit);

  $det_arrays=[];
foreach ($member_array as $value) {

$user_det = $this->users_model->get_user_by_its_id($value);
array_push($det_arrays,$user_det);

}
$data['members'] = $det_arrays;
//var_dump($det_arrays);

           $this->load->view('common/headmeta_view',$data);
               $this->load->view('user/common/users_nav_view',$data);
               $this->load->view('common/header_view',$data);
               $this->load->view('user/common/pre_content_view',$data);
               $this->load->view('user/members_view',$data);
               $this->load->view('user/common/post_content_view',$data);
           $this->load->view('common/footer_view',$data);



}


public function add_member($slug =NULL)
{


$circle_item =$this->circle_model->get_circle(array('slug' =>
 $slug));
 $admin_array =json_decode($circle_item['admin_id']);
if($circle_item['privacy'] == 'closed')
{
 if(!in_array($_SESSION['id'],$admin_array))
 {
   $_SESSION['action_report'] = "<span class='w3-text-red'>Sorry,
   This Function is for Admin Only in a closed circle</span>";
   $this->session->mark_as_flash('action_report');
   //redirect to circles
   show_page('circle/dash/'.$slug);

 }
}

$this->form_validation->set_rules('username','Username','required');
if (!$this->form_validation->run()) {




  $v_slug = "circle/add_member/".$slug;
  $this->board_model->insert_view($v_slug);



          $data["title"] ="Pryce | Add Member";
          $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
          $data["author"] ="Ojeyinka olaniyi philip";
         $data["descriptions"] ="The online Education Platform for Student and
         Unified Tertiary Matriculation
         Examnation Candidates";
         $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
         $data['user_details'] = $this->users_model->get_user_by_id();

         $data['circle_item'] =$this->circle_model->get_circle_details($slug);
        $data['slug'] = $slug;

       $this->load->view('common/headmeta_view',$data);
               $this->load->view('user/common/users_nav_view',$data);
               $this->load->view('common/header_view',$data);
               $this->load->view('user/add_member_view',$data);
           $this->load->view('common/footer_view',$data);





}else{

$member_array =json_decode($this->circle_model->get_circle(array('slug' =>
 $slug))['members_id']);
$new_member_id = $this->users_model->get_user_by_username_link($this->input->post('username'))['id'];
//echo var_dump($new_member_id);
if((!in_array($new_member_id,$member_array)) && $new_member_id != NULL)
{
array_push($member_array,$new_member_id);
if($this->circle_model->insert_members_id($member_array,$slug,$new_member_id))
{

  $_SESSION['action_report'] = "<span class='w3-text-green'>New Member Added</span>";
  $this->session->mark_as_flash('action_report');
  //redirect to circles
  show_page('circle/add_member/'.$slug);

}
}elseif ($new_member_id == NULL) {
//invalid username
$_SESSION['action_report'] = "<span class='w3-text-red'>Invalid Username</span>";
$this->session->mark_as_flash('action_report');
//redirect to circles
show_page('circle/add_member/'.$slug);
}elseif (in_array($new_member_id,$member_array)) {
//user already a member
$_SESSION['action_report'] = "<span class='w3-text-red'>User Already a member of the circle</span>";
$this->session->mark_as_flash('action_report');
//redirect to circles
show_page('circle/add_member/'.$slug);

}

}


}


public function exit($slug)
{



  $circle_item =$this->circle_model->get_circle(array('slug' =>
   $slug));
  if($circle_item['circle_type'] == 'compulsory')
  {

     $_SESSION['action_report'] = "<span class='w3-text-red'>Sorry,
     You cannot leave compulsory subject circle</span>";
     $this->session->mark_as_flash('action_report');
     //redirect to circles
     show_page('circle/dash/'.$slug);


  }

  $this->form_validation->set_rules('confirm','Confirm','required');
  if (!$this->form_validation->run()) {




    $v_slug = "circle/exit/".$slug;
    $this->board_model->insert_view($v_slug);


      $data["title"] ="Pryce | Exit Circle";
      $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="The online Education Platform for Student and
     Unified Tertiary Matriculation
     Examnation Candidates";
     $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
     $data['user_details'] = $this->users_model->get_user_by_id();

     $data['circle_item'] =$this->circle_model->get_circle_details($slug);
    $data['slug'] = $slug;

    $this->load->view('common/headmeta_view',$data);
           $this->load->view('user/common/users_nav_view',$data);
           $this->load->view('common/header_view',$data);
           $this->load->view('user/common/pre_content_view',$data);
           $this->load->view('user/exit_view',$data);
           $this->load->view('user/common/post_content_view',$data);
       $this->load->view('common/footer_view',$data);



  }else{

    //function to removeby value from arrays

      function array_remove_value($arr,$value)
    {

    return array_values(array_diff($arr,array($value)));

    }

  $member_array =json_decode($this->circle_model->get_circle(array('slug' =>
   $slug))['members_id']);
  if(in_array($_SESSION['id'],$member_array))
  {
  $member_array = array_remove_value($member_array,$_SESSION['id']);
  if($this->circle_model->exit_circle($member_array,$slug))
  {

    //user already a member
    $_SESSION['err_msg'] = "<span class='w3-text-red'>You've exit the circle</span>";
    $this->session->mark_as_flash('err_msg');
    //redirect to circles
    show_page('dashboard');

  }
  }else{
  //user already a member
  $_SESSION['err_msg'] = "<span class='w3-text-red'>You not a member of the circle</span>";
  $this->session->mark_as_flash('err_msg');
  //redirect to circles
  show_page('dashboard');

  }

  }



}


public function dash($slug,$offset=0)
{
  $v_slug = "circle/dash";
  $this->board_model->insert_view($v_slug);





    $limit = 10;



    $conditions = array('receiver_id' => $slug );
      $data['posts'] =$this->circle_model->get_posts_pag($conditions,$offset,$limit);


    	$this->load->library('pagination');

    	$config['base_url'] = site_url("circle/dash/".$slug);



    $config['total_rows'] = count($this->circle_model->get_posts($conditions));
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
      $config['last_link'] = 'Last';
      $config['display_pages'] = false;


    	   $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();




  //slug as reciever id in post table
$data['slug'] = $slug;
  $data['circle_item'] =$this->circle_model->get_circle_details($slug);
$data['name'] =$data['circle_item']['name'];
  $data["title"] ="Pryce | ".$data['name'];
$data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
$data["author"] ="Ojeyinka olaniyi philip";
$data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
Examnation Candidates";

$data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';

$data['user_details'] = $this->users_model->get_user_by_id();

$member_array = json_decode($data['circle_item']['members_id']);

if(!in_array($_SESSION['id'],$member_array) && $data['circle_item']["privacy"] == "closed")
{
  $_SESSION['action_report'] = "<span class='w3-text-red'>CLOSE CIRCLE:You are not A members
  of the circle</span>";
  $this->session->mark_as_flash('action_report');
//redirect to circles
show_page('circle');
}elseif (!in_array($_SESSION['id'],$member_array) && $data['circle_item']["privacy"] == "public") {
  $_SESSION['action_report'] = "<span class='w3-text-red'>PUBLIC CIRCLE:You have send a request before
   you can view the circle</span>";
  $this->session->mark_as_flash('action_report');


}
if(!in_array($_SESSION['id'],$member_array))
{
/*  $_SESSION['action_report'] = "<span class='w3-text-red'>CLOSE CIRCLE:You are not A members
  of the circle</span>";
  $this->session->mark_as_flash('action_report');*/
//redirect to circles
show_page('circle/request/'.$slug);
}

  $this->form_validation->set_rules("post","Post","required");

  	if($this->form_validation->run() == FALSE)
  	{

$this->load->view('common/headmeta_view',$data);
$this->load->view('user/common/users_nav_view',$data);
$this->load->view('common/header_view',$data);
$this->load->view('user/common/pre_content_view',$data);
$this->load->view('user/circle_dash_view',$data);
$this->load->view('user/common/post_content_view',$data);
$this->load->view('common/footer_view',$data);
}else{
  $username = $this->users_model->get_user_by_id()['username'];


if($this->circle_model->insert_circle_post($data['circle_item']['privacy'],$slug,$username))
{
  show_page('circle/dash/'.$slug);
}

}

}



}
