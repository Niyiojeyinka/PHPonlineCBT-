<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

public function __construct()
{
     parent::__construct();
     $this->load->model(array(/*'blog_model',*/'board_model','users_model','pages_model'));
     $this->load->helper(array('url','form'/*,'blog_helper'*/,'page_helper'));
     $this->load->library(array('form_validation'));
}


	public function index($slug = null)
	{
    $v_slug = "page/index";
      $this->board_model->insert_view($v_slug);


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



	}




public function single_page($slug = NULL)
{
       $data['item'] = $this->pages_model->get_pages($slug);

        if (empty($data['item']) || $slug == NULL)
        {
                show_404();
        }


        $data['title'] = 'Pryce | '.$data['item']['title'];
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

/*
public function contact_us($errr = null)
{





	switch($errr)
	{
	case "emp":
	$data["error_report"] = "All field are required";
	break;	case "err":
	$data["error_report"] = "Unknown Error Occurred:db error";
	break;
	case "inv":
	$data["error_report"] = "Please Provide valid Email";
	break;
	case "suc":
	$data["success_report"] = "You have successfully sent us a message.We will get back to you(through your email or Phone) as soon as possible.Thank you";

	break;
	case NULL:
	$data["error_report"] = NULL;

	break;


	}








  $data['head_content'] = $this->blog_model->get_common("head_content") ;


  $data['pre_content'] = $this->blog_model->get_common("pre_content") ;
  $data['mid_content'] = $this->blog_model->get_common("mid_content") ;
  $data['post_content'] = $this->blog_model->get_common("post_content") ;




	    $data['title'] = "PRYCE | Contact Us";
	    $data['author'] = "Olaniyi Ojeyinka";
	    $data['keywords'] = "Deals,deal,Nigeria,Promotions,Discounts,Discount,Pryce,Ng";
	    $data['description'] = "Know Prices,Features,Specifications of Mobile phones,Smart Phones ,Laptop Computers,Accessories,fashion and more.";
	$offset = 0; //for now
	    $data['items'] = $this->blog_model->get_posts_pag($offset,5);

		$this->load->view('/common/header_view',$data);
		$this->load->view('/public/contact_view',$data);
		$this->load->view('/common/rsidebar_view',$data);
		$this->load->view('/common/footer_view',$data);

}

public function contact_act()
{


		$this->form_validation->set_rules("name","Name","required");
		$this->form_validation->set_rules("title","Message Title","required");
		$this->form_validation->set_rules("message","Message Content","required");
		$this->form_validation->set_rules("email","Email","trim|valid_email|required");
if ($this->form_validation->run())
{//insert into db

if ($this->pages_model->insert_contact())
{
//show success page
show_page("page/contact_us/suc");
}else{
//show error
show_page("page/contact_us/err");


}

}else {
//show error message



$data['head_content'] = $this->blog_model->get_common("head_content") ;


$data['pre_content'] = $this->blog_model->get_common("pre_content") ;
$data['mid_content'] = $this->blog_model->get_common("mid_content") ;
$data['post_content'] = $this->blog_model->get_common("post_content") ;




	    $data['title'] = "PRYCE | Contact Us";
	    $data['author'] = "Olaniyi Ojeyinka";
	    $data['keywords'] = "Deals,deal,Nigeria,Promotions,Discounts,Discount,Pryce,Ng";
	    $data['description'] = "Know Prices,Features,Specifications of Mobile phones,Smart Phones ,Laptop Computers,Accessories,fashion and more.";

		$this->load->view('/common/header_view',$data);
		$this->load->view('/public/contact_view',$data);
		$this->load->view('/common/rsidebar_view',$data);
		$this->load->view('/common/footer_view',$data);


}






}*/
}
