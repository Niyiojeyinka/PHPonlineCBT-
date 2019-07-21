<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct()
{
    parent::__construct();

    $this->load->model(array('team_model','admin_question_model' ,
    'dashboard_model' ,'admin_blog_model','pages_model','board_model','users_model','question_model','circle_model'));
    $this->load->helper(array('url','form_helper','blog_helper','time_helper','page_helper'));
    $this->load->library(array('form_validation','session'));
    //  session_start();
     //get this from db later

 if (!isset($this->session->name) || !isset($this->session->logged_in))
 {


    header('Location: '.base_url().'index.php/team/');



 }



}





//callback function
public function index() {



$data["title"] ="Pryce | Admin Dashboard";
$data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
$data["author"] ="Ojeyinka olaniyi philip";
$data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
Examnation Candidates";
$data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$data['subjects'] = $this->dashboard_model->get_avail_subject();

     $data['num_of_topics'] = $this->board_model->count_topics();
      $data['num_of_comments'] = $this->board_model->count_comments();
      $data['last_post_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_post());
      $data['last_comment_time'] = date( "F j, Y, g:i a",$this->board_model->get_last_time_of_comment());
      $data['total_views'] = $this->board_model->count_views();
$data['num_of_users'] =  count($this->users_model->get_users(NULL,NULL));
$data['num_of_free_users'] = $this->users_model->count_account_type("free",NULL,NULL);
$data['num_of_premium_users'] = $this->users_model->count_account_type("premium",NULL,NULL);
$data['no_guests'] = count(online_users($this->board_model->get_guests()));
$data['no_online'] = count(online_users($this->users_model->get_users(NULL,NULL)));
$data['num_of_premium_questions'] = $this->question_model->count_questions("premium");
$data['num_of_free_questions'] = $this->question_model->count_questions("free");
$data['num_of_total_questions'] = $this->question_model->count_questions(NULL);
$data['num_of_users_24'] = count($this->users_model->count_users_reg_at_time(86400));
$data['num_of_users_online_24'] = count($this->users_model->count_users_online_at_time(86400));
$data['num_of_users_online_30d'] = count($this->users_model->count_users_online_at_time(2592000));
$data['num_of_questions_24'] = count($this->question_model->count_questions_added_at_time(86400));
$data['num_of_guests_24'] = count($this->board_model->count_guest_online_at_time(86400));
$data['num_of_topics_24'] = count($this->board_model->count_topics_added_at_time(86400));
$data['num_of_circles'] = $this->circle_model->count_circle_for_admin();
$data['num_of_messages'] = $this->circle_model->count_circle_messages();
$data['num_of_circles_online_24'] = $this->circle_model->count_circles_added_at_time(86400);
$data['num_of_messages_online_24'] = $this->circle_model->count_messages_added_at_time(86400);
$data['num_of_users_up_24'] = count($this->users_model->count_users_upgraded_at_time(86400));
$data['num_of_users_up_30d'] = count($this->users_model->count_users_upgraded_at_time(2592000));

	$this->load->view('/admin/header_view',$data);

	$this->load->view('admin/sidebar_view',$data);

	$this->load->view('admin/first_view',$data);
	$this->load->view('admin/footer_view');




}

public function our_users($offset = 0) {


  	$limit = 8;
  		$this->load->library('pagination');




        $data['items'] = $this->users_model->get_users($offset,$limit);




  	$config['base_url'] = site_url("admin/our_users");



  $config['total_rows'] = count($this->users_model->get_users(null,null));
  //$config['total_rows'] = $this->db->count_all('pages');

  	$config['per_page'] = $limit;

   //$config['uri_segment'] = 4;
  $config['first_tag_open'] = '<span class="w3-btn w3-blue w3-text-white">';
  $config['first_tag_close'] = '</span>';
  $config['last_tag_open'] = '<br><span class="w3-btn w3-blue w3-text-white">';
  $config['last_tag_close'] = '</span>';
  $config['first_link'] = 'First';



  $config['prev_link'] = 'Prev';
  $config['next_link'] = 'Next';
  $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-blue w3-text-white">';
  $config['next_tag_close'] = '</span><br>';
  $config['prev_tag_open'] = '<span style="" class="w3-btn w3-blue w3-text-white">';
  $config['prev_tag_close'] = '</span>';
  $config['last_link'] = 'Last';
  $config['display_pages'] = false;

  	   $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();



$this->load->view('/admin/header_view',$data);

  		$this->load->view('admin/sidebar_view',$data);

  		$this->load->view('admin/userslist_view',$data);
  		$this->load->view('admin/footer_view');



}

public function competition($offset = 0) {


  /*	$limit = 8;
  		$this->load->library('pagination');




        $data['items'] = $this->users_model->get_users($offset,$limit);




  	$config['base_url'] = site_url("admin/our_users");



  $config['total_rows'] = count($this->users_model->get_users(null,null));
  //$config['total_rows'] = $this->db->count_all('pages');

  	$config['per_page'] = $limit;

   //$config['uri_segment'] = 4;
  $config['first_tag_open'] = '<span class="w3-btn w3-blue w3-text-white">';
  $config['first_tag_close'] = '</span>';
  $config['last_tag_open'] = '<br><span class="w3-btn w3-blue w3-text-white">';
  $config['last_tag_close'] = '</span>';
  $config['first_link'] = 'First';



  $config['prev_link'] = 'Prev';
  $config['next_link'] = 'Next';
  $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-blue w3-text-white">';
  $config['next_tag_close'] = '</span><br>';
  $config['prev_tag_open'] = '<span style="" class="w3-btn w3-blue w3-text-white">';
  $config['prev_tag_close'] = '</span>';
  $config['last_link'] = 'Last';
  $config['display_pages'] = false;

  	   $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();

*/


$data = [];

$this->form_validation->set_rules("week",'Competition', 'required');


if(!$this->form_validation->run())
{

  $this->load->view('/admin/header_view',$data);

    		$this->load->view('admin/sidebar_view',$data);

    		$this->load->view('admin/competition_view',$data);
    		$this->load->view('admin/footer_view');



}else{

$data['competitors'] = $this->admin_question_model->get_competitors();




  $this->load->view('/admin/header_view',$data);

    		$this->load->view('admin/sidebar_view',$data);

    		$this->load->view('admin/competition_view',$data);
    		$this->load->view('admin/footer_view');







}


}

public function add_note()
{


$this->form_validation->set_rules("topic","Topic","required|is_unique[notes.title]");
$this->form_validation->set_rules("subject","Subject","required");
$this->form_validation->set_rules("contents","Contents","required");
//$this->form_validation->set_rules("topic","Topic","required");
if(!$this->form_validation->run())
{

           $data['items'] = $this->dashboard_model->get_avail_subject();



        //check login for admin here later

      $this->load->view('/admin/header_view',$data);

      $this->load->view('admin/sidebar_view',$data);

     $this->load->view('admin/notes/add_note_view',$data);
      $this->load->view('admin/footer_view');



}else{

  //show next:input to db
  
  $this->admin_blog_model->insert_note();
   $_SESSION['action_status_report'] = '<b class="w3-text-green">Note Added successfully</b>';
    $this->session->mark_as_flash('action_status_report');
    show_page("admin/edit_note/".url_title($this->input->post('topic'), 'dash', TRUE));



}

}



  public function edit_note($slug =NULL)
  {
//get common from db here
        $data['itemn'] = $this->admin_blog_model->get_topic_by_slug($slug);

$this->form_validation->set_rules("topic","Topic","required");
$this->form_validation->set_rules("subject","Subject","required");
$this->form_validation->set_rules("contents","Contents","required");

  if($this->form_validation->run() == FALSE)
  {
           $data['items'] = $this->dashboard_model->get_avail_subject();



    $this->load->view('/admin/header_view',$data);

    $this->load->view('admin/sidebar_view',$data);

            $this->load->view('admin/notes/edit_note_view',$data);
    $this->load->view('admin/footer_view');

}else{



  //show next:input to db

  if($this->admin_blog_model->edit_note($slug))
  {
  //sucesspage
  $_SESSION['action_status_report'] ="<span class='w3-text-green'>This Note  has been successfully Edited</span>";
  $this->session->mark_as_flash('action_status_report');

  show_page("admin/edit_note/".$this->uri->segment(3));

  }else{
  //error page
  $_SESSION['action_status_report'] = "<span class='w3-text-red'>Unknown error occurred</span>";
  $this->session->mark_as_flash('action_status_report');

  show_page("admin/edit_note/".$this->uri->segment(3));

  }






}

  }



public function add_common()
{




	    $data['items'] = $this->pages_model->get_commons();





    $this->form_validation->set_rules("position","Common Element Position",
  "required"/*|is_unique[common_tab.position]*/);



	if($this->form_validation->run() == FALSE)
	{

	//show error

			//check login for admin here later

	    $data['items'] = $this->pages_model->get_commons();




	$this->load->view('/admin/header_view',$data);

		$this->load->view('admin/sidebar_view',$data);

						$this->load->view('admin/add_common_view',$data);
		$this->load->view('admin/footer_view');




	}else{
	//show next:input to db

	if($this->pages_model->insert_common())
	{
	//sucesspage
  $_SESSION['action_status_report'] ='<span class="w3-text-green">A new Common Space has been
  successfully created</span>';
  $this->session->mark_as_flash('action_status_report');
	show_page("admin/add_common");

	}else{
	//error page
  $_SESSION['action_status_report'] ='<span class="w3-text-red">Unknown error occurred</span>';
  $this->session->mark_as_flash('action_status_report');

		show_page("admin/add_common");

	}




	}





		}




	public function edit_common($id =NULL)
	{



//get common from db here

	    $data['items'] = $this->pages_model->get_commons();



        $data['item'] = $this->pages_model->get_common_id($id);

        $data['position'] = $data['item']['position'];
        $data['name'] = $data['item']['short_det'];
        $data['content'] = $data['item']['content'];



        $data['id2'] = $id;

        $this->form_validation->set_rules("position","Common Element Position","required");


  if($this->form_validation->run() == FALSE)
	{



		$this->load->view('/admin/header_view',$data);

		$this->load->view('admin/sidebar_view',$data);

						$this->load->view('admin/edit_common_view',$data);
		$this->load->view('admin/footer_view');

}else{



	//show next:input to db

	if($this->pages_model->edit_common($this->input->post("id")))
	{
	//sucesspage
  $_SESSION['action_status_report'] ="<span class='w3-text-green'>This Common
   Space  has been successfully Edited</span>";
  $this->session->mark_as_flash('action_status_report');

	show_page("admin/edit_common/".$this->input->post('id'));

	}else{
	//error page
  $_SESSION['action_status_report'] = "<span class='w3-text-red'>Unknown error occurred</span>";
  $this->session->mark_as_flash('action_status_report');

		show_page("admin/edit_common/".$this->input->post('id'));

	}






}

	}





  	public function delete_common($id =NULL)
  	{


  	if($this->pages_model->delete_common($id))
  	{
  	//sucesspage
    $_SESSION['action_status_report'] ='<span class="w3-text-green">This
     Common Space  has been successfully Deleted</span>';
    $this->session->mark_as_flash('action_status_report');
  	show_page("admin/add_common/");

  	}else{
  	//error page
    $_SESSION['action_status_report'] ='<span class="w3-text-red">
    Unknown error occurred</span>';
    $this->session->mark_as_flash('action_status_report');

  		show_page("admin/add_common/");

  	}






  }

  public function messages($offset=0)
  {







  //		$limit = 10;
  		$limit = 8;


  	$data['items']= $this->team_model->messages($limit,$offset);
  		$this->load->library('pagination');

  	$config['base_url'] = site_url("admin/messages");



  $config['total_rows'] = $this->db->count_all('cmessages');

  	$config['per_page'] = $limit;

   //$config['uri_segment'] = 4;
  $config['first_tag_open'] = '<span class="w3-btn w3-blue w3-text-white">';
  $config['first_tag_close'] = '</span>';
  $config['last_tag_open'] = '<br><span class="w3-btn w3-blue w3-text-white">';
  $config['last_tag_close'] = '</span>';
  $config['first_link'] = 'First';



  $config['prev_link'] = 'Prev';
  $config['next_link'] = 'Next';
  $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-blue w3-text-white">';
  $config['next_tag_close'] = '</span><br>';
  $config['prev_tag_open'] = '<span style="" class="w3-btn w3-blue w3-text-white">';
  $config['prev_tag_close'] = '</span>';
  $config['last_link'] = 'Last';
  $config['display_pages'] = false;

  	   $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();






  			//check login for admin here later

  		$this->load->view('/admin/header_view',$data);

  		$this->load->view('admin/sidebar_view',$data);

  						$this->load->view('admin/messages_view',$data);
  		$this->load->view('admin/footer_view');



  }

  public function view_message($id = null)
  {



          $data['item'] = $this->team_model->get_message($id);



  		$this->load->view('/admin/header_view',$data);

  		$this->load->view('admin/sidebar_view',$data);

  						$this->load->view('admin/message_view',$data);
  		$this->load->view('admin/footer_view');






  }



}
