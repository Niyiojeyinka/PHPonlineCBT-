<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
/*

Name:CBT
Date:Start Rewriting  it on Oct 6, 2017 1:09:25 PM



*/



public function __construct()
{
     parent::__construct();

    $this->load->model(array('users_model','dashboard_model','pages_model'));
        $this->load->helper(array('url','form','page_helper'));
     $this->load->library(array('form_validation','session'));
//user login check here

      if (!isset($this->session->id) || !isset($this->session->logged_in))
       {      header('Location: '.base_url().'index.php/users/login');     }


$this->siteName ="CBT";
$this->descriptions ="Examnation Software";
$this->author ="author Name";>>>



}



public function index($slug = null)
{

     $data["title"] = $this->siteName." | Welcome";
               $data["keywords"] ="";
               $data["author"] =$this->author;
              $data["descriptions"] =$this->descriptions;
       $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['user_details'] = $this->users_model->get_user_by_id();


      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
          $this->load->view('user/common/pre_content_view',$data);
           $this->load->view('user/dashboard_view',$data);
           $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);

}



   public function logout()
 {
   
       unset($_SESSION["id"]);
    unset($_SESSION["logged_in"]);


   $_SESSION['action_status_report'] = 'You are Successfully logged out';
    $this->session->mark_as_flash('action_status_report');

    show_page("users/login");



 }

}
