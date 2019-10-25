<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
/*

Name:CBT
Date:Start Rewriting  it on Oct 6, 2017 1:09:25 PM

*/

public function __construct()
{
     parent::__construct();

    $this->load->model(array('users_model','pages_model'));
        $this->load->helper(array('url','form','page_helper'));
     $this->load->library(array('form_validation','session'));


$this->siteName ="CBT";
$this->descriptions ="Examnation Software";
$this->author ="author Name";
$this->keywords= "the, keywords";
}

	public function register($slug = null)
	{

$this->form_validation->set_rules("firstname","Firstname","required");
$this->form_validation->set_rules("lastname","Lastname","required");

$this->form_validation->set_rules("email","Email","trim|required|valid_email|is_unique[users.email]");
$this->form_validation->set_rules("phone","Mobile Phone Number","required|is_unique[users.phone]");


$this->form_validation->set_rules("password","Account Password","trim|required|is_unique[users.password]");

$this->form_validation->set_rules("cpassword","Account Password Comfirmation","trim|required|matches[password]");


if ($this->form_validation->run() == FALSE)
{


               $data["title"] = $this->siteName." | Register";
               $data["keywords"] = $this->keywords;
               $data["author"] =$this->author;
              $data["descriptions"] =$this->descriptions;

             $this->load->view('common/headmeta_view',$data);
                 $this->load->view('common/header_view',$data);
                 $this->load->view('common/nav_view',$data);
             $this->load->view('public/register_view',$data);
             $this->load->view('common/footer_view',$data);
}
else
{
if ($this->users_model->register() === false)
{


  $_SESSION['action_status_report'] ='<span class="w3-text-red">Unknown Error Occurred,
   Please try again later</span>';
  $this->session->mark_as_flash('action_status_report');
  show_page("page/register");


}
else{
//show dash

$_SESSION["id"] = $this->users_model->get_user_id_by_its_email($this->input->post('email'));


$_SESSION["logged_in"] = true;


show_page("dashboard");
}
}//close parent else block
 }
	public function login($slug = null)
	{
   
$this->form_validation->set_rules("password","Password","required");
$this->form_validation->set_rules("email","Email Address","trim|required");

if ($this->form_validation->run() == FALSE)
{


  	  	//login page


               $data["title"] = $this->siteName." | Student Login";
               $data["keywords"] ="";
               $data["author"] =$this->author;
              $data["descriptions"] =$this->descriptions;
            $this->load->view('common/headmeta_view',$data);
                $this->load->view('common/header_view',$data);
                $this->load->view('common/nav_view',$data);
            $this->load->view('public/login_view',$data);
            $this->load->view('common/footer_view',$data);
}else
{

if($this->users_model->login_check())
{


//success page
    $_SESSION["id"] = $this->users_model->get_user_id_by_its_email($this->input->post('email'));

 $_SESSION["logged_in"] = true;
 show_page("dashboard");

}
else{
//incorrect password error msg
$_SESSION['action_status_report'] = '<span class="w3-text-red">Incorrect Login Information</span>';
$this->session->mark_as_flash('action_status_report');

show_page("users/login");


}






}



 }

}
