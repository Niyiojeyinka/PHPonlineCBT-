<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
/*

Name:Citedlink
Date:Start Rewriting  it on Oct 6, 2017 1:09:25 PM



*/



public function __construct()
{
     parent::__construct();

    //$this->load->model(array('pages_model','users_model'));
    $this->load->model(array('users_model','pages_model'));
        $this->load->helper(array('url','form','page_helper'));
     $this->load->library(array('form_validation','session'));
  //   session_start();

}





	public function register($slug = null)
	{
    $v_slug = "users/register";
       $this->board_model->insert_view($v_slug);


$this->form_validation->set_rules("firstname","Firstname","required");
$this->form_validation->set_rules("lastname","Lastname","required");

$this->form_validation->set_rules("email","Email","trim|required|valid_email|is_unique[users.email]");
$this->form_validation->set_rules("phone","Mobile Phone Number","required|is_unique[users.phone]");


$this->form_validation->set_rules("password","Account Password","trim|required|is_unique[users.password]");

$this->form_validation->set_rules("cpassword","Account Password Comfirmation","trim|required|matches[password]");


if ($this->form_validation->run() == FALSE)
{


               $data["title"] ="Pryce | Register";
               $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past
               questions,answer,notes";
               $data["author"] ="Ojeyinka olaniyi philip";
              $data["descriptions"] ="The online Education Platform for Student
              and Unified Tertiary Matriculation
              Examnation Candidates";

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


  $_SESSION['err_msg'] ='Unknown Error Occurred,
   Please try again later';
  $this->session->mark_as_flash('err_msg');
  show_page("page/register");








}
else{




//show dash

$_SESSION["id"] = $this->users_model->get_user_id_by_password($this->input->post('password'));


$_SESSION["logged_in"] = true;


show_page("dashboard");







}





}//close parent else block




 }







 public function me($username)
 {
if((!isset($username)) || $username == NULL)
{
  show_page();
}

$v_slug = "users/me";
      $this->board_model->insert_view($v_slug);

            $data["title"] ="Pryce | Profile";
            $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
            $data["author"] ="Ojeyinka olaniyi philip";
           $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
           Examnation Candidates";
           $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
         $data['item'] = $this->users_model->get_user_by_username_link($username);
if($data['item'] == NULL)
{
  show_404();
}
          $this->load->view('common/headmeta_view',$data);
          if(isset($_SESSION['id']))
          {
          $data['user_details'] = $this->users_model->get_user_by_id();
            $this->load->view('user/common/users_nav_view',$data);
          }
          $this->load->view('common/header_view',$data);
               $this->load->view('user/me_view',$data);
          $this->load->view('common/footer_view',$data);




 }


 	public function waitlist($slug = null)
 	{
     $v_slug = "question/waitlist";
         $this->board_model->insert_view($v_slug);

 $this->form_validation->set_rules("name","Full Name","required");
 $this->form_validation->set_rules("email","Email","trim|required|valid_email|is_unique[waitlist.email]");
 $this->form_validation->set_rules("phone","Phone","trim|required|is_numeric|is_unique[waitlist.phone]");

 if ($this->form_validation->run() == FALSE)
 {


   $data["title"] ="Pryce | The Online Student Resources Center";
   $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
   $data["author"] ="Ojeyinka olaniyi philip";
  $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
  Examnation Candidates";

 $this->load->view('common/headmeta_view',$data);
     $this->load->view('common/header_view',$data);
     $this->load->view('common/nav_view',$data);
 $this->load->view('public/home_view',$data);
 $this->load->view('common/footer_view',$data);







 }else
 {

 if($this->users_model->insert_waitlist())
 {
    $_SESSION['err_msg'] = '<span class="w3-text-green">Operation Successful</span>';
    $this->session->mark_as_flash('err_msg');

  show_page();

 }
 else{
 $_SESSION['err_msg'] = '<span class="w3-text-red">Error Ocurred</span>';
 $this->session->mark_as_flash('err_msg');

 show_page();


 }






 }



  }


	public function login($slug = null)
	{
    $v_slug = "question/login";
        $this->board_model->insert_view($v_slug);

$this->form_validation->set_rules("password","Password","required");
$this->form_validation->set_rules("phone","Mobile Phone","trim|required|numeric");

if ($this->form_validation->run() == FALSE)
{


  	  	//login page


              $data["title"] ="Pryce | Student login";
              $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past
              questions,answer,notes";
              $data["author"] ="Ojeyinka olaniyi philip";
             $data["descriptions"] ="The online Education Platform for Student
             and Unified Tertiary Matriculation
             Examnation Candidates";

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
    $_SESSION["id"] = $this->users_model->get_user_id_by_password($this->input->post('password'));

 $_SESSION["logged_in"] = true;
 show_page("dashboard");

}
else{
//incorrect password error msg
$_SESSION['err_msg'] = 'Incorrect Login Information';
$this->session->mark_as_flash('err_msg');

show_page("users/login");


}






}



 }

}
