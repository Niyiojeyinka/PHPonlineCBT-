<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

public function __construct()
{
     parent::__construct();
     $this->load->model(array('team_model'));
     $this->load->helper(array('url','form','page_helper'));
     $this->load->library(array('form_validation','session'));
         // session_start();

    
     	//get this from db later
	
	
     
}



	public function index($tip =NULL)
	{
	
	
	
	
	
	
$this->form_validation->set_rules("pass","Password","required");
$this->form_validation->set_rules("name","Name","trim|required");

	if($this->form_validation->run() === FALSE)
	{
	
	$data['err'] = $data['action_status_report'];
	
		$this->load->view('/admin/login_view',$data);
    


	
	
	
	
}
else
{


if($this->team_model->login_check())
{


//success page
//session_start();

$this->session->name = $this->input->post("name");


$this->session->logged_in = true;



		show_page("admin");

}
else{
//incorrect password error msg
	$data['action_status_report'] =	$data["err"]="Incorrect 
	Username/pasdword:Please try again";
    $this->session->mark_as_flash('action_status_report');

show_page("team/index");


}





	}
	

	


	
	
	}
	
	
	public function dashboard()
	{
	//check login for admin here later
	
	
 if (!isset($this->session->name) || !isset($this->session->logged_in))
{


   header('Location: '.base_url().'index.php/team/');



}
 

	
		$this->load->view('/admin/header_view',$data);
   	
		$this->load->view('admin/sidebar_view',$data);
		
						$this->load->view('admin/first_view',$data);
		$this->load->view('admin/footer_view');
    


	
	
	}
		
		
		
	}
	


