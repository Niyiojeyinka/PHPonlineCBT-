<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_ext extends CI_Controller {
/*

Name:Pryce
 Function:this will handle new account settings


*/



public function __construct()
{
     parent::__construct();

    $this->load->model(array('users_model','dashboard_model','board_model','pages_model'));
    //$this->load->model('users_model,'dashboard_model');
        $this->load->helper(array('url','form','page_helper'));
     $this->load->library(array('form_validation','session'));
     //user login check here

           if (!isset($this->session->id) || !isset($this->session->logged_in))
            {      header('Location: '.base_url().'index.php/users/login');     }


}



public function index($slug = null)
{


/*
        $data["title"] ="Pryce | The Online Student Resources Center";
        $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
        $data["author"] ="Ojeyinka olaniyi philip";
       $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
       Examnation Candidates";
       $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['user_details'] = $this->users_model->get_user_by_id();
       $data['count_not'] = count($this->users_model->count_notifications());


      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
           $this->load->view('user/dashboard_view',$data);
      $this->load->view('common/footer_view',$data);


*/



}

//a call back function in subject_comb
public function subject_combo()
{

if(count($this->input->post('subject')) != 4)
{

      $err_m = 'Use of English is compulsory,
      You are required to select any other three subjects';
      $this->form_validation->set_message('subject_combo',$err_m);
     return  FALSE;



}else {


  return TRUE;
}





}



	public function subject_comb($slug = null)
	{

    $v_slug = "dashboard_ext/subject_comb";
    $this->board_model->insert_view($v_slug);

    if($this->dashboard_model->get_user_subjects_combination() != NULL )
    {

        $_SESSION['err_msg'] ='<b class="w3-text-green">You Can Only
        Register Subject Combination Once</b>';
        $this->session->mark_as_flash('err_msg');

    show_page('Dashboard');

    }


$data['items'] = $this->dashboard_model->get_avail_subject();
/*$this->form_validation->set_rules("subject[]","Subject","required",array('required' => 'You are required to select
Use of English and any other three subjects'));*/

$this->form_validation->set_rules("subject[]","Subject",'callback_subject_combo');

//if (!isset($_POST['submit']))
if ($this->form_validation->run() ==  FALSE)
{



                           $data["title"] ="Pryce | Subject Combination";
                 $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past
                 questions,answer,notes";
                 $data["author"] ="Ojeyinka olaniyi philip";
                $data["descriptions"] ="The online Education Platform for Student
                and Unified Tertiary Matriculation
                Examnation Candidates";
                $data['user_details'] = $this->users_model->get_user_by_id();




                     $this->load->view('common/headmeta_view',$data);
                         $this->load->view('user/common/users_nav_view',$data);
                         $this->load->view('common/header_view',$data);
                         $this->load->view('user/common/pre_content_view',$data);
                          $this->load->view('user/subject_comb_view',$data);
                          $this->load->view('user/common/post_content_view',$data);
                     $this->load->view('common/footer_view',$data);









}
else
{



  $_SESSION['subject_options'] = $this->input->post('subject');
  $this->session->mark_as_temp('subject_options',340);
  //confirmation page
$data['items'] = $_SESSION['subject_options'];
$data['items_db'] = $this->dashboard_model->get_avail_subject();

          $data["title"] ="Pryce | The Online Student Resources Center";
          $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
          $data["author"] ="Ojeyinka olaniyi philip";
         $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
         Examnation Candidates";
         $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
         $data['user_details'] = $this->users_model->get_user_by_id();


        $this->load->view('common/headmeta_view',$data);
            $this->load->view('user/common/users_nav_view',$data);
            $this->load->view('common/header_view',$data);
            $this->load->view('user/common/pre_content_view',$data);
             $this->load->view('user/confirm_sub_comb_view',$data);
             $this->load->view('user/common/post_content_view',$data);
        $this->load->view('common/footer_view',$data);



}//close parent else block




 }



 public function confirm_subject_comb()
 {




       if($this->dashboard_model->get_user_subjects_combination() != NULL )
       {

           $_SESSION['err_msg'] ='<b class="w3-text-green">You Can Only
           Register Subject Combination Once</b>';
           $this->session->mark_as_flash('err_msg');

       show_page('Dashboard');

       }





    if ($this->users_model->insert_subject_comb() == FALSE)
    {

    $_SESSION['err_msg'] ='Unknown Error Occurred,
     Please try again later';
    $this->session->mark_as_flash('err_msg');
    show_page("Dashboard_ext/subject_comb");






    }
    else{
//insert user id to corressponding group
foreach ($_SESSION['subject_options'] as  $value) {
$member_array = json_decode($this->users_model->get_circle(array('name' => $value))['members_id']);
array_push($member_array,$_SESSION['id']);
$new_mem = json_encode($member_array);
$this->users_model->insert_to_circle($new_mem,$value);

}


    //show dash

  $_SESSION['err_msg'] ='<b class="w3-text-green">Your Subject
  Combination has been successfully Registered</b>';
  $this->session->mark_as_flash('err_msg');
  show_page("Dashboard");







    }







 }



 public function change_password($slug = null)
 {
   $v_slug = "dashboard_ext/change_password";
   $this->board_model->insert_view($v_slug);



       $this->form_validation->set_rules("pass","Old Password","trim|required");
   	$this->form_validation->set_rules("npass","New Password","trim|required|is_unique[users.password]");
   	$this->form_validation->set_rules("cpass","Confirm New Password","trim|required|matches[npass]");


    if ($this->form_validation->run() ==  FALSE)
   {


         $data["title"] ="Pryce | Change Password";
         $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
         $data["author"] ="Ojeyinka olaniyi philip";
        $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
        Examnation Candidates";
        $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
        $data['user_details'] = $this->users_model->get_user_by_id();


       $this->load->view('common/headmeta_view',$data);
           $this->load->view('user/common/users_nav_view',$data);
           $this->load->view('common/header_view',$data);
           $this->load->view('user/common/pre_content_view',$data);
            $this->load->view('user/change_pass_view',$data);
            $this->load->view('user/common/post_content_view',$data);
       $this->load->view('common/footer_view',$data);


}else{

//change here



     $user_det =   $this->users_model->get_user_by_id();

       if ($user_det['password'] == trim($this->input->post('pass')))
       {

        //change password
          if( $this->users_model->insert_new_password())
          {
             //show suc message

            $_SESSION['err_msg'] = '<b class="w3-text-blue">Password changed successfully</b><br>';
              $this->session->mark_as_flash('err_msg');
              show_page("Dashboard_ext/change_password");
          }else{

              //show err message

             $_SESSION['err_msg'] = '<b class="w3-text-red">uknown error occurred</b>';
              $this->session->mark_as_flash('err_msg');
              show_page("Dashboard_ext/change_password");


          }





       }else{


                   //incorrect password  error page


             $_SESSION["err_msg"] = '<b>The Current Account
             Password you entered is incorrect</b><br>';
              $this->session->mark_as_flash('err_msg');
              show_page("Dashboard_ext/change_password");



       }




}



 }

//function ends here



 public function change_email($slug = null)
 {
   $v_slug = "dashboard_ext/change_email";
   $this->board_model->insert_view($v_slug);


       $this->form_validation->set_rules("pass","Password","trim|required");
   	$this->form_validation->set_rules("nemail","New Email","trim|required|is_unique[users.email]");
   	$this->form_validation->set_rules("cemail","Confirm New Email","trim|required|matches[nemail]");



    if ($this->form_validation->run() ==  FALSE)
   {


         $data["title"] ="Pryce | Change Email";
         $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
         $data["author"] ="Ojeyinka olaniyi philip";
        $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
        Examnation Candidates";
        $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
        $data['user_details'] = $this->users_model->get_user_by_id();


       $this->load->view('common/headmeta_view',$data);
           $this->load->view('user/common/users_nav_view',$data);
           $this->load->view('common/header_view',$data);
           $this->load->view('user/common/pre_content_view',$data);
            $this->load->view('user/change_email_view',$data);
            $this->load->view('user/common/post_content_view',$data);
       $this->load->view('common/footer_view',$data);


}else{

//change here



     $user_det =   $this->users_model->get_user_by_id();

       if ($user_det['password'] == trim($this->input->post('pass')))
       {

        //change email
          if( $this->users_model->insert_new_email())
          {
             //show suc message

            $_SESSION['err_msg'] = '<b class="w3-text-blue">Email changed successfully</b><br>';
              $this->session->mark_as_flash('err_msg');
              show_page("Dashboard_ext/change_email");
          }else{

              //show err message

             $_SESSION['err_msg'] = '<b class="w3-text-red">uknown error occurred</b>';
              $this->session->mark_as_flash('err_msg');
              show_page("Dashboard_ext/change_email");


          }





       }else{


                   //incorrect password  error page


             $_SESSION["err_msg"] = '<b>Th Account
             Password you entered is incorrect</b><br>';
              $this->session->mark_as_temp('err_msg',2);
              show_page("Dashboard_ext/change_email");



       }




}



 }


//function ends here

 public function change_phone($slug = null)
 {

   $v_slug = "dashboard_ext/change_phone";
   $this->board_model->insert_view($v_slug);



       $this->form_validation->set_rules("pass","Password","trim|required");
   	$this->form_validation->set_rules("nphone","New Mobile Number","trim|required|is_unique[users.phone]");
   	$this->form_validation->set_rules("cphone","Confirm New Mobile Number","trim|required|matches[nphone]");



    if ($this->form_validation->run() ==  FALSE)
   {


         $data["title"] ="Pryce | Change Mobile Number";
         $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
         $data["author"] ="Ojeyinka olaniyi philip";
        $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
        Examnation Candidates";
        $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
        $data['user_details'] = $this->users_model->get_user_by_id();


       $this->load->view('common/headmeta_view',$data);
           $this->load->view('user/common/users_nav_view',$data);
           $this->load->view('common/header_view',$data);
           $this->load->view('user/common/pre_content_view',$data);
            $this->load->view('user/change_phone_view',$data);
            $this->load->view('user/common/post_content_view',$data);
       $this->load->view('common/footer_view',$data);


}else{

//change here



     $user_det =   $this->users_model->get_user_by_id();

       if ($user_det['password'] == trim($this->input->post('pass')))
       {

        //change email
          if( $this->users_model->insert_new_phone())
          {
             //show suc message

            $_SESSION['err_msg'] = '<b class="w3-text-blue">Mobile Number
             changed successfully</b><br>';
              $this->session->mark_as_flash('err_msg');
              show_page("Dashboard_ext/change_phone");
          }else{

              //show err message

             $_SESSION['err_msg'] = '<b class="w3-text-red">uknown error occurred</b>';
              $this->session->mark_as_flash('err_msg');
              show_page("Dashboard_ext/change_phone");


          }





       }else{


                   //incorrect password  error page


             $_SESSION["err_msg"] = '<b>The Account
             Password you entered is incorrect</b><br>';
              $this->session->mark_as_flash('err_msg');
              show_page("Dashboard_ext/change_phone");



       }




}



 }


//functions ends here


 public function edit_username($slug = null)
 {
   $v_slug = "dashboard_ext/edit_username";
   $this->board_model->insert_view($v_slug);




    	$this->form_validation->set_rules("username","Username","trim|required|is_unique[users.username]");



    if ($this->form_validation->run() ==  FALSE)
   {

                 $_SESSION['username_err_msg'] = validation_errors();
                   $this->session->mark_as_flash('username_err_msg');
                   show_page("Dashboard_ext/profile");



}else{

//change here



        //change email
          if( $this->users_model->edit_username())
          {
             //show suc message

            $_SESSION['username_err_msg'] = '<b class="w3-text-blue">Username
             changed successfully</b><br>';
              $this->session->mark_as_flash('username_err_msg');
              show_page("Dashboard_ext/profile");
          }else{

              //show err message

             $_SESSION['username_err_msg'] = '<b class="w3-text-red">uknown error occurred</b>';
              $this->session->mark_as_flash('username_err_msg');
              show_page("Dashboard_ext/profile");


          }






}



 }


//functions ends here


	public function change_profile_picture()
	{
    $v_slug = "dashboard_ext/change_profile_picture";
    $this->board_model->insert_view($v_slug);


 $this->form_validation->set_rules("picture","Profile Picture","required");


	$config['upload_path'] = "assets/images/profiles";
	$config['allowed_types'] = 'gif|jpg|png|jpeg'; $config['max_size'] = '500';
   $config['max_width'] = '800';
    $config['max_height'] = '600';

 $this->load->library('upload', $config);



if ($this->form_validation->run() == FALSE  && $this->upload->do_upload('picture') ==FALSE )
{



 $data['error'] =  $this->upload->display_errors();


 $_SESSION['picture_err_msg'] = $data['error'];
   $this->session->mark_as_flash('picture_err_msg');
    show_page("Dashboard_ext/Profile");



	}else
	{
    //change here



               if( $this->users_model->change_profile_picture($this->upload->data("file_name")))
              {
                 //show suc message

                $_SESSION['picture_err_msg'] = '<b class="w3-text-blue">Profile Picture
                 changed successfully</b><br>';
                  $this->session->mark_as_flash('picture_err_msg');
                  show_page("Dashboard_ext/profile");
              }else{

                  //show err message

                 $_SESSION['picture_err_msg'] = '<b class="w3-text-red">uknown error occurred</b>';
                  $this->session->mark_as_flash('picture_err_msg');
                  show_page("Dashboard_ext/profile");


              }





	}



 }




//functions ends here

 public function edit_status($slug = null)
 {
   $v_slug = "dashboard_ext/edit_status";
   $this->board_model->insert_view($v_slug);


    	$this->form_validation->set_rules("status","Status","required");



    if ($this->form_validation->run() ==  FALSE)
   {

                 $_SESSION['status_err_msg'] = validation_errors();
                   $this->session->mark_as_flash('status_err_msg');
                   show_page("Dashboard_ext/profile");



}else{

//change here



        //change email
          if( $this->users_model->edit_status())
          {
             //show suc message

            $_SESSION['status_err_msg'] = '<b class="w3-text-blue">Status
             changed successfully</b><br>';
              $this->session->mark_as_flash('status_err_msg');
              show_page("Dashboard_ext/profile");
          }else{

              //show err message

             $_SESSION['status_err_msg'] = '<b class="w3-text-red">uknown error occurred</b>';
              $this->session->mark_as_flash('status_err_msg');
              show_page("Dashboard_ext/profile");


          }






}



 }


//functions ends here



 public function edit_course($slug = null)
 {
   $v_slug = "dashboard_ext/edit_course";
   $this->board_model->insert_view($v_slug);



    	$this->form_validation->set_rules("course","Course","required");



    if ($this->form_validation->run() ==  FALSE)
   {

                 $_SESSION['course_err_msg'] = validation_errors();
                   $this->session->mark_as_flash('course_err_msg');
                   show_page("Dashboard_ext/profile");



}else{

//change here



        //change email
          if( $this->users_model->edit_course())
          {
             //show suc message

            $_SESSION['course_err_msg'] = '<b class="w3-text-blue">Your Course
             changed successfully</b><br>';
              $this->session->mark_as_flash('course_err_msg');
              show_page("Dashboard_ext/profile");
          }else{

              //show err message

             $_SESSION['course_err_msg'] = '<b class="w3-text-red">uknown error occurred</b>';
              $this->session->mark_as_flash('course_err_msg');
              show_page("Dashboard_ext/profile");


          }






}



 }


//functions ends here




public function profile()
{

  $v_slug = "dashboard_ext/profile";
  $this->board_model->insert_view($v_slug);

           $data["title"] ="Pryce | Profile";
           $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
           $data["author"] ="Ojeyinka olaniyi philip";
          $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
          Examnation Candidates";
          $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
        $data['item'] = $this->users_model->get_user_by_id();
        $data['user_details'] = $this->users_model->get_user_by_id();

         $this->load->view('common/headmeta_view',$data);
             $this->load->view('user/common/users_nav_view',$data);
             $this->load->view('common/header_view',$data);
              $this->load->view('user/profile_view',$data);
         $this->load->view('common/footer_view',$data);




}


//functions ends here




public function institution()
{
if(isset($_POST['submit']))
{

  //if input equal to "" use previous record
  $data['user_details'] = $this->users_model->get_user_by_id();
if($_POST['first_choice'] == "")
{
  $first_choice = $data['user_details']['first_choice'];
}else{
  $first_choice = $_POST['first_choice'];

}
if($_POST['second_choice'] == "")
{
  $second_choice = $data['user_details']['second_choice'];
}else{
  $second_choice = $_POST['second_choice'];

}
if($_POST['third_choice'] == "")
{
  $third_choice = $data['user_details']['third_choice'];
}else{
  $third_choice = $_POST['third_choice'];

}

if($_POST['fourth_choice'] == "")
{
  $fourth_choice = $data['user_details']['fourth_choice'];
}else{
  $fourth_choice = $_POST['fourth_choice'];

}
$this->users_model->edit_institution($first_choice,$second_choice,$third_choice
,$fourth_choice);

show_page("Dashboard_ext/profile");

}else{


   show_page("Dashboard_ext/profile");

}


}



public function notifications($offset = 0)
{
  $v_slug = "dashboard_ext/notifications";
    $this->board_model->insert_view($v_slug);


    $limit = 12;
    $data['user_details'] = $this->users_model->get_user_by_id();

    $data['notifications'] = $this->users_model->get_notifications($offset,
    $limit,$data['user_details']['username']);

    	$this->load->library('pagination');

    	$config['base_url'] = site_url("dashboard_ext/notifications");



    $config['total_rows'] = count($this->users_model->get_notifications(null,null,$data['user_details']['username']));
    //  $config['total_rows'] = 10;
    	$config['per_page'] = $limit;

      //$config['uri_segment'] = 2;
      $config['first_tag_open'] = '<span class="w3-btn  w3-indigo w3-text-white w3-round-xlarge">';
      $config['first_tag_close'] = '</span>';
      $config['last_tag_open'] = '<br><span class="w3-btn  w3-indigo w3-text-white w3-round-xlarge">';
      $config['last_tag_close'] = '</span>';
      $config['first_link'] = 'First';



      $config['prev_link'] = 'Prev';
      $config['next_link'] = 'Next';
      $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
      $config['next_tag_close'] = '</span><br>';
      $config['prev_tag_open'] = '<span style="" class="w3-btn w3-indigo w3-text-white w3-round-xlarge">';
      $config['prev_tag_close'] = '</span>';
      $config['last_link'] = 'Last';
      $config['display_pages'] = false;


    	   $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();

   $data['total_posts'] = count($this->users_model->get_all_posts());


           $data["title"] ="Pryce | Notifications";
           $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
           $data["author"] ="Ojeyinka olaniyi philip";
          $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
          Examnation Candidates";
          $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
        $data['item'] = $this->users_model->get_user_by_id();

         $this->load->view('common/headmeta_view',$data);
             $this->load->view('user/common/users_nav_view',$data);
             $this->load->view('common/header_view',$data);
             $this->load->view('user/common/pre_content_view',$data);
              $this->load->view('user/notifications_view',$data);
              $this->load->view('user/common/post_content_view',$data);
         $this->load->view('common/footer_view',$data);




}


 }
