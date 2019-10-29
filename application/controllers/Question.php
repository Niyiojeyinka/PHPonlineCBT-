<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {
/*

Name:CBT
Date:Start Writing  2018

*/



public function __construct()
{
     parent::__construct();

    $this->load->model(array('question_model','users_model','dashboard_model','pages_model'));
         $this->load->helper(array('url','form','question_helper','page_helper'));
     $this->load->library(array('form_validation','session'));
//user login check here

      if (!isset($this->session->id) || !isset($this->session->logged_in))
       {      show_page('users/login') ;    }


$this->siteName ="CBT";
$this->descriptions ="Examnation Software";
$this->author ="author Name";
$this->keywords ="keywords";


}



public function index($slug = null)
{
  


            $data["title"] = $this->siteName." | Computer Based Test";
            $data["keywords"] =$this->keywords;
            $data["author"] =$this->author;
           $data["descriptions"] =$this->descriptions;
           $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['user_details'] = $this->users_model->get_user_by_id();



      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
          $this->load->view('user/common/pre_content_view',$data);
           $this->load->view('user/first_view',$data);
           $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);
}




public function pre_start(){


}

public function question_page()
{


  $data['subject_items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);


          $data["title"] = $this->siteName." | Examination";
               $data["keywords"] ="";
               $data["author"] =$this->author;
              $data["descriptions"] =$this->descriptions;
           $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
           $data['user_details'] = $this->users_model->get_user_by_id();


          $this->load->view('common/headmeta_view',$data);
              $this->load->view('user/common/users_nav_view',$data);
              $this->load->view('common/header_view',$data);
              $this->load->view('user/common/pre_content_view',$data);
               $this->load->view('user/question_view',$data);
               $this->load->view('user/common/post_content_view',$data);
          $this->load->view('common/footer_view',$data);



}

 public function question_act()
{

   
//if isset submit
if(isset($_POST['submit']))
{
//mark and show,save

  $_SESSION['submit'] = TRUE;
  $_SESSION['stopped_time'] = time();

show_page('question/submit');



}



}

public function submit()
{
$_SESSION['score'] = 0;

    
//save result to db later here
//check here if to release result immediately or not
            $data["title"] = $this->siteName." |  Results";
            $data["keywords"] =$this->keywords;
            $data["author"] =$this->author;
           $data["descriptions"] =$this->descriptions;

       $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);
       $data['user_details'] = $this->users_model->get_user_by_id();


      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
          $this->load->view('user/common/pre_content_view',$data);
          $this->load->view('user/result_view',$data);
          $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);







}


}
