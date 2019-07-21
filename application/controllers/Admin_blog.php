<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_blog extends CI_Controller {

public function __construct()
{
     parent::__construct();

     $this->load->model(array('team_model','pages_model','admin_blog_model',
     'pages_model','users_model','board_model'));
     $this->load->helper(array('url','form_helper','blog_helper','time_helper','page_helper'));
     $this->load->library(array('form_validation','session'));
     //  session_start();
     	//get this from db later

   if (!isset($this->session->name) || !isset($this->session->logged_in))
  {


     header('Location: '.base_url().'index.php/team/');



  }



}




	public function add_board_post($err = NULL)
	{



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



	if($this->form_validation->run() == FALSE)
	{

	//show error

  $data['upload_err'] = $this->upload->display_errors();
  $data['categories'] = $this->board_model->get_categories();



		$this->load->view('/admin/header_view',$data);

		$this->load->view('admin/sidebar_view',$data);

						$this->load->view('admin/topics/add_topic_view',$data);
		$this->load->view('admin/footer_view');




	}else{
	//show next:input to db
  $slug = url_title($this->input->post('title'), 'dash', TRUE);

  $timg =$this->upload->data("file_name");


	$this->board_model->insert_admin_topic($slug,$timg,"@Admin");

  show_page('board/topic/'.$slug);




	}






	}






	//edit function here


/*




public function edit_page($id =NULL,$err=NULL)
	{



if ($err == "suc")
{
$data['err_reports']= "<span class='w3-text-green'>This Page  has been successfully Edited</span>";
}
elseif ($err == "unk"){

$data['err_reports']= "<span class='w3-text-red'>Unknown error occurred</span>";
}else
{


$data['err_reports']= NULL;
}
//get post content from db here



       $data['item'] = $this->pages_model->get_page_id($id);


        $data['title'] = $data['item']['title'];
        $data['author'] = $data['item']['author'];
        $data['content'] = $data['item']['text'];
       $data['description'] = $data['item']['description'];
        $data['keywords'] = $data['item']['keywords'];
              $idkey = $id;

              $this->form_validation->set_rules("title","Post Title","required");


if($this->form_validation->run() == FALSE){

		$this->load->view('/admin/header_view',$data);

		$this->load->view('admin/sidebar_view',$data);

						$this->load->view('admin/pages/edit_page_view',$data);
		$this->load->view('admin/footer_view');

}
else{


	//show next:input to db

	if($this->admin_blog_model->edit_page($idkey))
	{
	//sucesspage
	show_page("admin_blog/edit_page/".$idkey."/suc");

	}else{
	//error page
		show_page("admin_blog/edit_page/".$idkey."/unk");

	}





}






	}


*/


	public function admin_board_posts($offset=0)
	{

	$limit = 8;
		$this->load->library('pagination');




      $data['items'] = $this->board_model->get_admin_topics($offset,$limit);




	$config['base_url'] = site_url("admin_blog/admin_board_posts");



$config['total_rows'] = count($this->board_model->get_admin_topics(null,null));
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






	//check admin login here


	//check admin login here







		$this->load->view('/admin/header_view',$data);

		$this->load->view('admin/sidebar_view',$data);

		$this->load->view('admin/topics/topic_list_view',$data);
		$this->load->view('admin/footer_view');





	}


  	public function reports($offset=0)
  	{

  	$limit = 8;
  		$this->load->library('pagination');




        $data['items'] = $this->board_model->get_reports($offset,$limit);




  	$config['base_url'] = site_url("admin_blog/reports");



  $config['total_rows'] = count($this->board_model->get_reports(null,null));
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






  	//check admin login here


  	//check admin login here







  		$this->load->view('/admin/header_view',$data);

  		$this->load->view('admin/sidebar_view',$data);

  		$this->load->view('admin/topics/topic_list_view',$data);
  		$this->load->view('admin/footer_view');





  	}



  	public function board_posts($offset=0)
  	{

  	$limit = 8;
  		$this->load->library('pagination');




        $data['items'] = $this->board_model->get_topics_for_admin($offset,$limit);




  	$config['base_url'] = site_url("admin_blog/board_posts");



  $config['total_rows'] = count($this->board_model->get_topics_for_admin(null,null));
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






  	//check admin login here


  	//check admin login here







  		$this->load->view('/admin/header_view',$data);

  		$this->load->view('admin/sidebar_view',$data);

  		$this->load->view('admin/topics/topic_list_view',$data);
  		$this->load->view('admin/footer_view');





  	}


/*

	public function delete_page($id)
	{




	if($this->admin_blog_model->delete_item('page',$id))
	{


	show_page("admin_blog/pages/suc");


	}else{

	show_page("admin_blog/pages/una");



	}





	}


*/


	public function add_page()
	{



	      $this->form_validation->set_rules("title","Post Title","required");
     $this->form_validation->set_rules("contents","Post Contents","required");
     $this->form_validation->set_rules("keywords","Post Keywords","required");
     $this->form_validation->set_rules("desc","Post Descriptions","required");



	if($this->form_validation->run() == FALSE)
	{
$data =[];
	//show error

			//check login for admin here later


		$this->load->view('/admin/header_view',$data);

		$this->load->view('admin/sidebar_view',$data);

						$this->load->view('admin/pages/add_page_view',$data);
		$this->load->view('admin/footer_view');




	}else{
	//show next:input to db

	$this->admin_blog_model->insert_post("pages");
	//sucesspage
  $_SESSION['err_reports'] = "<span class='w3-text-green'>Page Added successfully
  </span>";
  $this->session->mark_as_flash('err_reports');
	show_page("admin_blog/add_page");




	}


}



	//edit function here







public function edit_page($id =NULL,$err=NULL)
	{



//get post content from db here



       $data['item'] = $this->pages_model->get_page_id($id);


        $data['title'] = $data['item']['title'];
        $data['author'] = $data['item']['author'];
        $data['content'] = $data['item']['text'];
       $data['description'] = $data['item']['description'];
        $data['keywords'] = $data['item']['keywords'];
              $idkey = $id;

              $this->form_validation->set_rules("title","Post Title","required");


if($this->form_validation->run() == FALSE){

		$this->load->view('/admin/header_view',$data);

		$this->load->view('admin/sidebar_view',$data);

						$this->load->view('admin/pages/edit_page_view',$data);
		$this->load->view('admin/footer_view');

}
else{


	//show next:input to db

	if($this->admin_blog_model->edit_page($idkey))
	{
	//sucesspage
  $_SESSION['err_reports'] = "<span class='w3-text-green'>Page Edited successfully
  </span>";
  $this->session->mark_as_flash('err_reports');

	show_page("admin_blog/edit_page/".$idkey);

	}else{
	//error page

  $_SESSION['err_reports'] = "<span class='w3-text-green'>Unknown error occurred</span>";
  $this->session->mark_as_flash('err_reports');

		show_page("admin_blog/edit_page/".$idkey);

	}





}






	}





	public function pages($err="no",$offset=0)
	{

 	//	$err = $this->uri->segment(3, 0);
	$limit = 4;
		$this->load->library('pagination');




      $data['items'] = $this->pages_model->get_pagelist($offset,$limit);




	$config['base_url'] = site_url("admin_blog/pages/no");



$config['total_rows'] = count($this->pages_model->get_pagelist(null,null));
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

						$this->load->view('admin/pages/pagelist_view',$data);
		$this->load->view('admin/footer_view');





	}


  	public function move_post_front($id,$action_type)
  	{
//function to move boardpost to front page
if($action_type =='m')
{
//move to front page

  	$this->admin_blog_model->move_post_front($id,'m');

      $_SESSION['err_reports'] = "<span class='w3-text-green'>Board Post Moved
      successfully
      to frontpage  </span>";
        $this->session->mark_as_flash('err_reports');

  	show_page("admin_blog/board_posts");

}elseif($action_type =='r'){
//remove from frontpage

  	$this->admin_blog_model->move_post_front($id,'r');

      $_SESSION['err_reports'] = "<span class='w3-text-green'>Board Post Removed
       successfully from Frontpage
        </span>";
        $this->session->mark_as_flash('err_reports');

  	show_page("admin_blog/board_posts");


}






  	}



	public function delete_page($id)
	{




	$this->admin_blog_model->delete_item('page',$id);

    $_SESSION['err_reports'] = "<span class='w3-text-green'>Page Deleted successfully
      </span>";
      $this->session->mark_as_flash('err_reports');

	show_page("admin_blog/pages");





	}
  public function delete_board_post($id)
  {




  $this->admin_blog_model->delete_item('board_post',$id);
    $_SESSION['err_reports'] = "<span class='w3-text-green'>Board Post Deleted successfully
      </span>";
      $this->session->mark_as_flash('err_reports');

  show_page("admin_blog/board_posts");






  }




	public function move($id=NULL,$type=NULL)
	{




       $data['item'] = $this->pages_model->get_page_id($id);

 $status = $data['item']['status'];

	$type = "page";
	$this->admin_blog_model->move_item($type,$id,$status);

      $_SESSION['err_reports'] = "<span class='w3-text-green'>Page Moved successfully
        </span>";
        $this->session->mark_as_flash('err_reports');

show_page('admin_blog/pages');






	}





	public function draft($err= null)
	{


//pagination for post start here
//get post content from db here


      $data['itemp'] = $this->pages_model->get_pages_draft(null,null);





		$this->load->view('/admin/header_view',$data);

		$this->load->view('admin/sidebar_view',$data);

						$this->load->view('admin/pages/draft_view',$data);
		$this->load->view('admin/footer_view');





	}










	}
