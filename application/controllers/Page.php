<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

public function __construct()
{
     parent::__construct();
     $this->load->model(array('users_model','pages_model','admin_model'));
     $this->load->helper(array('url','form','page_helper'));
     $this->load->library(array('form_validation'));


$this->siteName ="CBT";
$this->descriptions ="Examnation Software";
$this->author ="author Name";
$this->keywords="aut, Name";

}


	public function index($slug = null)
	{


   
     $data["title"] = $this->siteName." | Welcome";
               $data["keywords"] = $this->keywords;
               $data["author"] =$this->author;
              $data["descriptions"] =$this->descriptions;

		$this->load->view('common/headmeta_view',$data);
        $this->load->view('common/header_view',$data);
        $this->load->view('common/nav_view',$data);
		$this->load->view('public/home_view',$data);
		$this->load->view('common/footer_view',$data);



	}




public function single_page($slug = NULL)
{
       $data['item'] = $this->pages_model->get_pages($slug);

        if (empty($data['item']) || $slug == NULL)
        {
                show_404();
        }


        $data['title'] = $this->siteName. ' | '.$data['item']['title'];
      $data['keywords'] = $data['item']['keywords'];
      $data['keywords'] = $data['item']['description'];
      $data['author'] = $data['item']['author'];
      $data['description'] = $data['item']['description'];


        $data['page_code'] = $data['item']['text'];


        		$this->load->view('common/headmeta_view',$data);
                $this->load->view('common/header_view',$data);
                $this->load->view('common/nav_view',$data);
        		$this->load->view('public/single_view',$data);
        		$this->load->view('common/footer_view',$data);


}

public function admin_login(){

   
$this->form_validation->set_rules("password","Password","required");
$this->form_validation->set_rules("username","Username","trim|required");



if ($this->form_validation->run() == FALSE)
{


  	  	//login page


               $data["title"] = $this->siteName." | Admin Login";
               $data["keywords"] =$this->keywords;
               $data["author"] =$this->author;
              $data["descriptions"] =$this->descriptions;
            $this->load->view('admin/login_view',$data);
}else{

	     if($this->admin_model->check_login()){
		
		         show_login('admin');
		}else{
			
				$_SESSION['error_status_report'] ="<span class='w3-text-red'>Incorrect login details</span>";
		$this->session->mark_as_flash('error_status_report');
		     
		show_page('admin/enter');
		}

}
	
	
	
	


}

}
