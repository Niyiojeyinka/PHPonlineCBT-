<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {
/*

Name:Pryce
 Function:this will handle new account settings


*/



public function __construct()
{
     parent::__construct();

    $this->load->model(array('users_model','dashboard_model','board_model','pages_model','notes_model'));
    //$this->load->model('users_model,'dashboard_model');
        $this->load->helper(array('url','form','page_helper'));
     $this->load->library(array('form_validation','session'));
     //user login check here

           if (!isset($this->session->id) || !isset($this->session->logged_in))
            {      header('Location: '.base_url().'index.php/users/login');     }


}



public function index($slug = null)
{

        $data["title"] ="Pryce | Notes";
        $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
        $data["author"] ="Ojeyinka olaniyi philip";
       $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
       Examnation Candidates";
       $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['user_details'] = $this->users_model->get_user_by_id();
$data['subjects'] = $this->dashboard_model->get_avail_subject();


      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
           $this->load->view('user/first_notes_view',$data);
      $this->load->view('common/footer_view',$data);


}


public function view($subject =NULL,$id =NULL)
{
$subject = str_replace("_", " ", $subject);




        $data["title"] ="Pryce | ".$subject." Notes";
        $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
        $data["author"] ="Ojeyinka olaniyi philip";
       $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
       Examnation Candidates";
       $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['user_details'] = $this->users_model->get_user_by_id();
$data['subjects'] = $this->dashboard_model->get_avail_subject();
$data["topiclists"] = $this->notes_model->get_note_topic_list($subject);
$data["topic"] = $this->notes_model->get_note_by_topic($subject,$id);

      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
          $this->load->view('user/notes/notes_view',$data);
          $this->load->view('user/notes/notes_sidebar_view',$data);
      $this->load->view('common/footer_view',$data);



}


}