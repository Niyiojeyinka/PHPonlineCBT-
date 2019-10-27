<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct()
{
    parent::__construct();

    $this->load->library(array('form_validation','session'));
    $this->load->model(array('team_model','admin_question_model' ,
    'dashboard_model' ,'admin_blog_model','pages_model','users_model','question_model'));
    $this->load->helper(array('url','form_helper','blog_helper','time_helper','page_helper'));
    //  session_start();
     //get this from db later

 if ( !isset($this->session->admin_logged_in))
 {

	show_page('admin/enter');


 }



$this->siteName ="CBT";
$this->descriptions ="Examnation Software";
$this->author ="author Name";
$this->keywords ="keywords";




}





//callback function
public function index() {



            $data["title"] = $this->siteName." | Admin Dashboard";
            $data["keywords"] =$this->keywords;
            $data["author"] =$this->author;
           $data["descriptions"] =$this->descriptions;
$data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';

	$this->load->view('/admin/header_view',$data);

	$this->load->view('admin/sidebar_view',$data);

	$this->load->view('admin/first_view',$data);
	$this->load->view('admin/footer_view');

}

public function create_test(){
	//a method to create a test session
	
	          $data["title"] = $this->siteName." | Create New Test Session";
            $data["keywords"] =$this->keywords;
            $data["author"] =$this->author;
            $data["descriptions"] =$this->descriptions;
            $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';

	$this->load->view('/admin/header_view',$data);

	$this->load->view('admin/sidebar_view',$data);

	$this->load->view('admin/create_test_session_view',$data);
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


}
