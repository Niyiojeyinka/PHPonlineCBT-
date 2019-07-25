 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_question extends CI_Controller {

public function __construct()
{
     parent::__construct();

     $this->load->model(array('team_model','admin_question_model' ,
     'dashboard_model' ,'admin_blog_model','pages_model','users_model'));
     $this->load->helper(array('url','form_helper','blog_helper','time_helper','page_helper'));
     $this->load->library(array('form_validation','session'));
     //  session_start();
     	//get this from db later

   if (!isset($this->session->name) || !isset($this->session->logged_in))
  {


     header('Location: '.base_url().'index.php/team/');



  }



}
//callback function
public function if_question_exist() {
//check uniqueness

$condition_array = array('subject' => $this->input->post('subject'),'year' => $this->input->post('year'),
'paper_type'  => $this->input->post('paper_type'),'question_number'  => $this->input->post('question_number') );
$outp = $this->admin_question_model->get_questions($condition_array);
if(empty($outp))
{
  $_SESSION['action_status']= '<b class="w3-text-green">
  Question not already exists</b>';
  $this->session->mark_as_flash('action_status');

return TRUE;
}else{

  $_SESSION['action_status']= '<b class="w3-text-red">
  question Already Exists</b>';
  $this->session->mark_as_flash('action_status');
  return FALSE;


}

 }
	public function add_question()
	{




     $this->form_validation->set_rules("subject","Subject","required");
     $this->form_validation->set_rules("year","Question Year","required");
     $this->form_validation->set_rules("answer","Answer","required");
     $this->form_validation->set_rules("account_type","Account Type","required");
     $this->form_validation->set_rules("option_a","Option A","required");
     $this->form_validation->set_rules("option_b","Option B","required");
     $this->form_validation->set_rules("option_c","Option C","required");
     $this->form_validation->set_rules("option_d","Option D","required");
     $this->form_validation->set_rules("option_type","Option Type","required");
     $this->form_validation->set_rules("question_type","Question Type","callback_if_question_exist");
     $this->form_validation->set_rules("question","Question","required");
     $this->form_validation->set_rules("question_number","Question Number","required");
     $this->form_validation->set_rules("paper_type","Paper Type","required");



	$config['upload_path'] = "assets/questions";
	$config['allowed_types'] = 'gif|jpg|png|jpeg'; $config['max_size'] = '500';
   $config['max_width'] = '800'; $config['max_height'] = '600';

 $this->load->library('upload', $config);





	if($this->form_validation->run() == FALSE)
	{


            $data["title"] ="Pryce | Admin Dashboard";
            $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
            $data["author"] ="Ojeyinka olaniyi philip";
           $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
           Examnation Candidates";
           $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
           $data['items'] = $this->dashboard_model->get_avail_subject();

 	$this->load->view('/admin/header_view',$data);

		$this->load->view('admin/sidebar_view',$data);

						$this->load->view('admin/questions/add_question_view',$data);
		$this->load->view('admin/footer_view');




	}else{
	//show next:input to db
	if($this->upload->do_upload('question_img') !=FALSE)
	{
	$qimg = $this->upload->data("file_name");


	}

	if($this->admin_question_model->insert_question())
	{
	//sucesspage
  $_SESSION['action_statu']=  '<b class="w3-text-green">
  New Question Added Successfully</b>';
  $this->session->mark_as_flash('action_statu');
	show_page("admin_question/add_question");

	}else{
	//error page
  $_SESSION['action_statu']= '<b class="w3-text-red">
  Unknown error occurred</b>';
  $this->session->mark_as_flash('action_statu');
  show_page("admin_question/add_question");

	}




	}


	}

public function question_stat()
{
              $data["title"] ="Pryce | Admin Dashboard";
              $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
              $data["author"] ="Ojeyinka olaniyi philip";
             $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
             Examnation Candidates";
             $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
             $data['subjects'] = $this->dashboard_model->get_avail_subject();

   	$this->load->view('/admin/header_view',$data);

  		$this->load->view('admin/sidebar_view',$data);

  						$this->load->view('admin/questions/question_stat_view',$data);
  		$this->load->view('admin/footer_view');

}




//callback function
public function if_range_exist() {
//check uniqueness

$condition_array = array('ranges' => $this->input->post('starting_num')."-".$this->input->post('stopping_num'),'year' => $this->input->post('year'),
'paper_type'  => $this->input->post('paper_type'),'subject'  => $this->input->post('subject') );
$outp = $this->admin_question_model->get_range($condition_array);
if(empty($outp))
{
  $_SESSION['action_status_report']= '<b class="w3-text-green">
  Questions doesn"t  exists </b>';
  $this->session->mark_as_flash('action_status_report');

return TRUE;
}else{

  $_SESSION['action_status_report']= '<b class="w3-text-red">
  question Already Exists</b>';
  $this->session->mark_as_flash('action_status_report');
  return FALSE;


}

 }

public function upload_batch()
{



       $this->form_validation->set_rules("subject","Subject","required");
       $this->form_validation->set_rules("year","Year","required");
       $this->form_validation->set_rules("paper_type","Paper Type","required");
       $this->form_validation->set_rules("starting_num","Starting Number","callback_if_range_exist");
       $this->form_validation->set_rules("stopping_num","Stopping Number","callback_if_range_exist");
       $this->form_validation->set_message('if_range_exist', '{field} must be unique.');


$name = str_replace(" ", "_", $this->input->post('subject'))."_".$this->input->post('year')."_".$this->input->post('paper_type')."_".$this->input->post('starting_num')."-".$this->input->post('stopping_num')."_".$this->input->post('exam_type');
        $config['upload_path'] = './assets/batch/';
$config['allowed_types'] = 'xml';
$config['max_size']     = '90000';
$config['file_name']     = $name.".xml";

        $this->load->library('upload', $config);



              $data["title"] ="Pryce | Admin Dashboard";
              $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
              $data["author"] ="Ojeyinka olaniyi philip";
             $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
             Examnation Candidates";
             $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
             $data['subjects'] = $this->dashboard_model->get_avail_subject();
        $data['items'] = $this->dashboard_model->get_avail_subject();


	if(!$this->form_validation->run() )

       	{

         $data['upload_err'] = $this->upload->display_errors();

       
   	$this->load->view('/admin/header_view',$data);

  		$this->load->view('admin/sidebar_view',$data);
    $this->load->view('admin/questions/question_batch_view',$data);
  		$this->load->view('admin/footer_view');

    }else{
        $this->upload->do_upload('question_file');
        
        if($this->admin_question_model->save_bulk_question($this->upload->data("file_name"),$this->upload->data("file_ext")))
        {


$_SESSION['action_status_report'] = "<span class='w3-text-green'>Successfully uploaded</span>";
$this->session->mark_as_flash('action_status_report');
show_page('admin_question/bulklist');


        }
else {


$_SESSION['action_status_report'] = "<span class='w3-text-red'>Unknown Error Occurred PLs Try Again</span>";
$this->session->mark_as_flash('action_status_report');
show_page('admin_question/upload_batch');


}


    }


}
public function bulklist($offset = 0)
{


  $limit = 8;
    $this->load->library('pagination');




      $data['items'] = $this->admin_question_model->get_bulklist($offset,$limit);




  $config['base_url'] = site_url("admin_question/bulklist");



//$config['total_rows'] = count($this->admin_question_model->get_bulklist(null,null));
$config['total_rows'] = $this->db->count_all('bulk_questions');

  $config['per_page'] = $limit;

 //$config['uri_segment'] = 4;
$config['first_tag_open'] = '<span class="w3-btn w3-blue w3-text-white">';
$config['first_tag_close'] = '</span>';
$config['last_tag_open'] = '<br><span class="w3-btn w3-blue w3-text-white">';
$config['last_tag_close'] = '</span>';
$config['first_link'] = 'First';
$config['prev_link'] = 'Prev';
$config['next_link'] = 'Next';
$config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-blue w3-text-white">';
$config['next_tag_close'] = '</span><br>';
$config['prev_tag_open'] = '<span style="" class="w3-btn w3-blue w3-text-white">';
$config['prev_tag_close'] = '</span>';
$config['last_link'] = 'Last';
$config['display_pages'] = false;

     $this->pagination->initialize($config);
$data['pagination'] = $this->pagination->create_links();
//pagination



  $data["title"] ="Pryce | Admin Dashboard";
  $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
  $data["author"] ="Ojeyinka olaniyi philip";
 $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
 Examnation Candidates";
 $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';



    $this->load->view('/admin/header_view',$data);

      $this->load->view('admin/sidebar_view',$data);

      $this->load->view('admin/questions/bulklist_view',$data);
      $this->load->view('admin/footer_view');


}

public function save_question_todb($id)
{

$file_name = $this->admin_question_model->get_bulk($id)['file_name'];
$file_link = base_url('assets/batch/'.$file_name);

$data['action_status_report'] = " ";

$xml=simplexml_load_file($file_link) or die("Error: Cannot create object");
foreach($xml->children() as $question) { 


//check if question exist already

$condition_array = array('subject' => $question['subject'],'year' => $question->year,
'paper_type'  => $question->papertype,'question_number'  => $question->questionnumber  );

$outp = $this->admin_question_model->get_questions($condition_array);
if(!empty($outp))
{
  
 $data['action_status_report'] .= "<div class='w3-text-red w3-margin w3-small'>subject ".$question['subject']." question number ".$question->questionnumber." already in the database</div> ";

}else{

  
//sorry no mvc here
  if($question->optione == "NULL")
  {
    $alt_optione = NULL;
  }else{
        $alt_optione = $question->optione;

  }
if($question->questionimg == "NULL")
  {
    $alt_questionimg = NULL;
  }else{
        $alt_questionimg = $question->questionimg;

  }

 $question = array(

'subject' => $question['subject'],/**/
  'year' => $question->year,/**/
'answer' => $question->answer,/**/
'question_img' =>$alt_questionimg,/**/
'account_type' =>  $question->accounttype,/**/
'option_a' =>  $question->optiona,
'option_b' => $question->optionb,
'option_c' => $question->optionc,
'option_d' => $question->optiond,
'option_e' => $alt_optione,
'option_type' => $question->optiontype,/**/
'question' => $question->questiontext,/**/
'comp' => $question->comp,/**/
'question_type' => $question->questiontype,/**/
/*'level' => $this->input->post('level'),*/
'instructions' => $question->instructions,/**/
'status' =>"published"/**/,
'question_number' => $question->questionnumber ,/**/
'paper_type' => $question->papertype  ,/**/
 'author' => $question->author,/**/
 'time' => time()/**/
);


if( $this->db->insert('questions',$question))
{




 $data['action_status_report'] .=  "<span class='w3-text-green w3-margin w3-small'>subject ".$question['subject']." question number ".$question->questionnumber." saved to the database Successfully</span> <br>";

}else{






 $data['action_status_report'] .=  "<span class='w3-text-red w3-margin w3-small'>subject ".$question['subject']." question number ".$question->questionnumber." failed to save to the database Successfully</span><br> ";

}







}


  
   
} //foreach loop closed here




              $data["title"] ="Pryce | Admin Dashboard";
              $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
              $data["author"] ="Ojeyinka olaniyi philip";
             $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
             Examnation Candidates";
             $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
             //$data['subjects'] = $this->dashboard_model->get_avail_subject();


    $this->load->view('/admin/header_view',$data);

      $this->load->view('admin/sidebar_view',$data);

              $this->load->view('admin/questions/bulk_status_view',$data);
      $this->load->view('admin/footer_view');




} 





}
