<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {
/*

Name:CBT
Date:Start ReWriting  2018

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

public function template($view_name,$data)
{
    $data["keywords"] =$this->keywords;
    $data["author"] =$this->author;
    $data["descriptions"] =$this->descriptions;
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
    $data['user_details'] = $this->users_model->get_user_by_id();

    $this->load->view('common/headmeta_view',$data);
    $this->load->view('user/common/users_nav_view',$data);
    $this->load->view('common/header_view',$data);
    $this->load->view('user/common/pre_content_view',$data);
    $this->load->view($view_name,$data);
    $this->load->view('user/common/post_content_view',$data);
    $this->load->view('common/footer_view',$data);
}

public function index($slug = null)
{
            $data["title"] = $this->siteName." | Computer Based Test";
            $this->template('user/first_view',$data);

}

public function start(){

            $data["title"] = $this->siteName." | Pre Start";
            $data['next_test']= $this->dashboard_model->get_next_test();

            $this->template('user/pre_start_view',$data);
}

public function question(){

    $data["title"] = $this->siteName." | Test";
    $data['next_test']= $this->dashboard_model->get_next_test();

    $this->template('user/pre_start_view',$data);
}

}
