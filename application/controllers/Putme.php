<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Putme extends CI_Controller {
/*

Name:Pryce
Date:Start Writing  2018

*/



public function __construct()
{
     parent::__construct();

    $this->load->model(array('question_model','users_model','dashboard_model','board_model','pages_model'));
         $this->load->helper(array('url','form','question_helper','page_helper'));
     $this->load->library(array('form_validation','session'));
//user login check here
}


public function validate_subject()
{

if (count($this->input->post('subject')) > 4)
{


$this->form_validation->set_message("validate_subject" ,"You cannot select More than Four Subject");
return FALSE;

}elseif (!count($this->input->post('subject')) >= 1)
{


$this->form_validation->set_message("validate_subject" ,"You must select atleast One Subject");
return FALSE;

}else{

return TRUE;



}



}





public function index()
{







$this->form_validation->set_rules("school","School","required");
$this->form_validation->set_rules("number","
	Numbers","required");
$this->form_validation->set_rules("subject","School","callback_validate_subject");


if(!$this->form_validation->run())
{

unset_prev_sessions();





    $data["title"] ="Pryce | The Online Student Resources Center";
        $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
        $data["author"] ="Ojeyinka olaniyi philip";
       $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
       Examnation Candidates";
       $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);
       $data['user_details'] = $this->users_model->get_user_by_id();
$data['subjects'] = $this->dashboard_model->get_avail_subject();
      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
          $this->load->view('user/common/pre_content_view',$data);
           $this->load->view('user/first_putme_view',$data);
           $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);







}else{

	$subjects =$this->input->post('subject');
	$_SESSION['subjects'] = $subjects;

		$school =$this->input->post('school');
		$number = $this->input->post('number');
		$_SESSION['time_allowed'] = $this->input->post('period');
		$_SESSION['running'] = $this->input->post('period');
$_SESSION['school'] = $this->input->post('school');


switch (count($subjects)) {

	case 1:
	//get index 0 only
$_SESSION['no_of_subject'] = 1;

$cond = array(
"subject" => $subjects[0],
"school" => $school,
"status" => "published"
);
$subject_questions_id = $this->question_model->get_putme_questions($cond);
$subject_questions_id = randomize($subject_questions_id);
//get no question chosen only

 $_SESSION['subject_one'] = array_slice($subject_questions_id,1,$number);



		break;
	
	case 2:
	//get index 0-1 only
	$_SESSION['no_of_subject'] = 2;
$cond = array(
"subject" => $subjects[0],
"school" => $school,
"status" => "published"
);
$subject_questions_id = $this->question_model->get_putme_questions($cond);
$subject_questions_id = randomize($subject_questions_id);
//get no question chosen only

 $_SESSION['subject_one'] = array_slice($subject_questions_id,1,$number);


$cond = array(
"subject" => $subjects[1],
"school" => $school,
"status" => "published"
);
$subject_questions_id = $this->question_model->get_putme_questions($cond);
$subject_questions_id = randomize($subject_questions_id);
//get no question chosen only

 $_SESSION['subject_two'] = array_slice($subject_questions_id,1,$number);




		break;
	
	case 3:

	$_SESSION['no_of_subject'] = 3;
$cond = array(
"subject" => $subjects[0],
"school" => $school,
"status" => "published"
);
$subject_questions_id = $this->question_model->get_putme_questions($cond);
$subject_questions_id = randomize($subject_questions_id);
//get no question chosen only

 $_SESSION['subject_one'] = array_slice($subject_questions_id,1,$number);


$cond = array(
"subject" => $subjects[1],
"school" => $school,
"status" => "published"
);
$subject_questions_id = $this->question_model->get_putme_questions($cond);
$subject_questions_id = randomize($subject_questions_id);
//get no question chosen only

 $_SESSION['subject_two'] = array_slice($subject_questions_id,1,$number);



	//get index 0-2 only
$cond = array(
"subject" => $subjects[2],
"school" => $school,
"status" => "published"
);
$subject_questions_id = $this->question_model->get_putme_questions($cond);
$subject_questions_id = randomize($subject_questions_id);
//get no question chosen only

 $_SESSION['subject_three'] = array_slice($subject_questions_id,1,$number);


		break;
	
	case 4:
	//get index 0-3 only
	$_SESSION['no_of_subject'] = 4;


$cond = array(
"subject" => $subjects[0],
"school" => $school,
"status" => "published"
);
$subject_questions_id = $this->question_model->get_putme_questions($cond);
$subject_questions_id = randomize($subject_questions_id);
//get no question chosen only

 $_SESSION['subject_one'] = array_slice($subject_questions_id,1,$number);


$cond = array(
"subject" => $subjects[1],
"school" => $school,
"status" => "published"
);
$subject_questions_id = $this->question_model->get_putme_questions($cond);
$subject_questions_id = randomize($subject_questions_id);
//get no question chosen only

 $_SESSION['subject_two'] = array_slice($subject_questions_id,1,$number);



	//get index 0-2 only
$cond = array(
"subject" => $subjects[2],
"school" => $school,
"status" => "published"
);
$subject_questions_id = $this->question_model->get_putme_questions($cond);
$subject_questions_id = randomize($subject_questions_id);
//get no question chosen only

 $_SESSION['subject_three'] = array_slice($subject_questions_id,1,$number);


	//get index 0-2 only
$cond = array(
"subject" => $subjects[3],
"school" => $school,
"status" => "published"
);
$subject_questions_id = $this->question_model->get_putme_questions($cond);
$subject_questions_id = randomize($subject_questions_id);
//get no question chosen only

 $_SESSION['subject_four'] = array_slice($subject_questions_id,1,$number);



		break;
	
	
}








           $data["title"] ="Pryce | POST-UTME Examination";
          $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
          $data["author"] ="Ojeyinka olaniyi philip";
         $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
         Examnation Candidates";
         $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
         $data['items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);
         $data['user_details'] = $this->users_model->get_user_by_id();






if(isset($_SESSION['start_time']))
{
  unset($_SESSION['start_time']);
}
if(isset($_SESSION["question_index"]))
{
  unset($_SESSION["question_index"]);
}
if(isset($_SESSION['user_answers']))
{
  unset($_SESSION['user_answers']);
}
if(isset($_SESSION['correct_answers']))
{
  unset($_SESSION['correct_answers']);
}
if(isset($_SESSION['question_m_id']))
{
  unset($_SESSION['question_m_id']);
}
if(isset($_SESSION['question_number']))
{
  unset($_SESSION['question_number']);
}

if(isset($_SESSION['s0_score']))
{
  unset($_SESSION['s0_score']);
  unset($_SESSION['s1_score']);
  unset($_SESSION['s2_score']);
  unset($_SESSION['s3_score']);


}






        $this->load->view('common/headmeta_view',$data);
            $this->load->view('user/common/users_nav_view',$data);
            $this->load->view('common/header_view',$data);
            $this->load->view('user/common/pre_content_view',$data);
             $this->load->view('user/pre_putme_test_view',$data);
             $this->load->view('user/common/post_content_view',$data);
        $this->load->view('common/footer_view',$data);

}




}

public function putme_s0_question_page()
{
	 if(!isset($_SESSION['start_time']))
  {
    $_SESSION['start_time'] = time();
  }
    if(!isset($_SESSION['running']))
    {
      show_page('putme/index');
    }

    if(isset($_SESSION['timeout']) || isset($_SESSION['submit']))
    {
      show_page('putme/submit');
    }

    
           $data["title"] ="Pryce | ".$_SESSION['subjects'][0]." Examination";
           $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
           $data["author"] ="Ojeyinka olaniyi philip";
           $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
           Examnation Candidates";
           $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
           $data['user_details'] = $this->users_model->get_user_by_id();





if(!isset($_SESSION["question_index"]['putme_s0_question_page']) || $_SESSION["question_index"]['putme_s0_question_page'] ==1)
{
  $index_to_use = 0;
  /*$index_to_use is index of question id randomly selected from
corresponding subject session array
*/
}else{

  $index_to_use = $_SESSION["question_index"]['putme_s0_question_page'] - 1;
}


$question_id = $_SESSION['subject_one'][$index_to_use];
$data['count_sub'] =count($_SESSION['subject_one']);



//if click is more than available questions
//in other words if index not exists
if($question_id == NULL)
{
for($i=0;$i < $data['count_sub'];$i++)
{

  $bindex =$i;
}
$question_id = $_SESSION['subject_one'][$bindex];
 $_SESSION["question_index"]['putme_s0_question_page'] = $data['count_sub'] -1;
}




if($data['user_details']['acct_type'] == 'free')
{

  $condition_array  = array('subject' => $_SESSION['subjects'][0],'id' =>
   $question_id,'account_type' => $data['user_details']['acct_type']);


}else{

  $condition_array  = array('subject' => $_SESSION['subjects'][0],'id' =>
   $question_id,
"school" => $_SESSION['school']);


}
$data['question'] = $this->question_model->get_question_putme($condition_array);


$data["q_id"] = $question_id;
  $data["q_index"] = array_search($question_id,$_SESSION['subject_one']);
  //index of question_id in an array;



          $this->load->view('common/headmeta_view',$data);
              $this->load->view('user/common/users_nav_view',$data);
              $this->load->view('common/header_view',$data);
              $this->load->view('user/common/pre_content_view',$data);
               $this->load->view('user/putme_question_view',$data);
               $this->load->view('user/common/post_content_view',$data);
          $this->load->view('common/footer_view',$data);




}


public function test_init()
{
/*
//Abia State Polytechnic
$arr = array(
"school" => "Abia State Polytechnic"
);
$this->db->update("putme_questions",$arr);

*/	
}

public function putme_s1_question_page()
{


	 if(!isset($_SESSION['start_time']))
  {
    $_SESSION['start_time'] = time();
  }
    if(!isset($_SESSION['running']))
    {
      show_page('putme/index');
    }

    if(isset($_SESSION['timeout']) || isset($_SESSION['submit']))
    {
      show_page('putme/submit');
    }

    
           $data["title"] ="Pryce | ".$_SESSION['subjects'][1]." Examination";
           $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
           $data["author"] ="Ojeyinka olaniyi philip";
           $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
           Examnation Candidates";
           $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
           $data['user_details'] = $this->users_model->get_user_by_id();





if(!isset($_SESSION["question_index"]['putme_s1_question_page']) || $_SESSION["question_index"]['putme_s1_question_page'] ==1)
{
  $index_to_use = 0;
  /*$index_to_use is index of question id randomly selected from
corresponding subject session array
*/
}else{

  $index_to_use = $_SESSION["question_index"]['putme_s1_question_page'] - 1;
}


$question_id = $_SESSION['subject_two'][$index_to_use];
$data['count_sub'] =count($_SESSION['subject_two']);



//if click is more than available questions
//in other words if index not exists
if($question_id == NULL)
{
for($i=0;$i < $data['count_sub'];$i++)
{

  $bindex =$i;
}
$question_id = $_SESSION['subject_two'][$bindex];
 $_SESSION["question_index"]['putme_s1_question_page'] = $data['count_sub'] -1;
}




if($data['user_details']['acct_type'] == 'free')
{

  $condition_array  = array('subject' => $_SESSION['subjects'][1],'id' =>
   $question_id,'account_type' => $data['user_details']['acct_type']);


}else{

  $condition_array  = array('subject' => $_SESSION['subjects'][1],'id' =>
   $question_id,
"school" => $_SESSION['school']);


}
$data['question'] = $this->question_model->get_question_putme($condition_array);


$data["q_id"] = $question_id;
  $data["q_index"] = array_search($question_id,$_SESSION['subject_two']);
  //index of question_id in an array;



          $this->load->view('common/headmeta_view',$data);
              $this->load->view('user/common/users_nav_view',$data);
              $this->load->view('common/header_view',$data);
              $this->load->view('user/common/pre_content_view',$data);
               $this->load->view('user/putme_question_view',$data);
               $this->load->view('user/common/post_content_view',$data);
          $this->load->view('common/footer_view',$data);




	
}

public function putme_s2_question_page()
{


	 if(!isset($_SESSION['start_time']))
  {
    $_SESSION['start_time'] = time();
  }
    if(!isset($_SESSION['running']))
    {
      show_page('putme/index');
    }

    if(isset($_SESSION['timeout']) || isset($_SESSION['submit']))
    {
      show_page('putme/submit');
    }

    
           $data["title"] ="Pryce | ".$_SESSION['subjects'][2]." Examination";
           $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
           $data["author"] ="Ojeyinka olaniyi philip";
           $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
           Examnation Candidates";
           $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
           $data['user_details'] = $this->users_model->get_user_by_id();





if(!isset($_SESSION["question_index"]['putme_s2_question_page']) || $_SESSION["question_index"]['putme_s2_question_page'] ==1)
{
  $index_to_use = 0;
  /*$index_to_use is index of question id randomly selected from
corresponding subject session array
*/
}else{

  $index_to_use = $_SESSION["question_index"]['putme_s2_question_page'] - 1;
}


$question_id = $_SESSION['subject_three'][$index_to_use];
$data['count_sub'] =count($_SESSION['subject_three']);



//if click is more than available questions
//in other words if index not exists
if($question_id == NULL)
{
for($i=0;$i < $data['count_sub'];$i++)
{

  $bindex =$i;
}
$question_id = $_SESSION['subject_three'][$bindex];
 $_SESSION["question_index"]['putme_s2_question_page'] = $data['count_sub'] -1;
}




if($data['user_details']['acct_type'] == 'free')
{

  $condition_array  = array('subject' => $_SESSION['subjects'][2],'id' =>
   $question_id,'account_type' => $data['user_details']['acct_type']);


}else{

  $condition_array  = array('subject' => $_SESSION['subjects'][2],'id' =>
   $question_id,
"school" => $_SESSION['school']);


}
$data['question'] = $this->question_model->get_question_putme($condition_array);


$data["q_id"] = $question_id;
  $data["q_index"] = array_search($question_id,$_SESSION['subject_three']);
  //index of question_id in an array;



          $this->load->view('common/headmeta_view',$data);
              $this->load->view('user/common/users_nav_view',$data);
              $this->load->view('common/header_view',$data);
              $this->load->view('user/common/pre_content_view',$data);
               $this->load->view('user/putme_question_view',$data);
               $this->load->view('user/common/post_content_view',$data);
          $this->load->view('common/footer_view',$data);





	
}

public function putme_s3_question_page()
{


	 if(!isset($_SESSION['start_time']))
  {
    $_SESSION['start_time'] = time();
  }
    if(!isset($_SESSION['running']))
    {
      show_page('putme/index');
    }

    if(isset($_SESSION['timeout']) || isset($_SESSION['submit']))
    {
      show_page('putme/submit');
    }

    
           $data["title"] ="Pryce | ".$_SESSION['subjects'][2]." Examination";
           $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
           $data["author"] ="Ojeyinka olaniyi philip";
           $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
           Examnation Candidates";
           $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
           $data['user_details'] = $this->users_model->get_user_by_id();





if(!isset($_SESSION["question_index"]['putme_s3_question_page']) || $_SESSION["question_index"]['putme_s3_question_page'] ==1)
{
  $index_to_use = 0;
  /*$index_to_use is index of question id randomly selected from
corresponding subject session array
*/
}else{

  $index_to_use = $_SESSION["question_index"]['putme_s3_question_page'] - 1;
}


$question_id = $_SESSION['subject_four'][$index_to_use];
$data['count_sub'] =count($_SESSION['subject_four']);



//if click is more than available questions
//in other words if index not exists
if($question_id == NULL)
{
for($i=0;$i < $data['count_sub'];$i++)
{

  $bindex =$i;
}
$question_id = $_SESSION['subject_four'][$bindex];
 $_SESSION["question_index"]['putme_s3_question_page'] = $data['count_sub'] -1;
}




if($data['user_details']['acct_type'] == 'free')
{

  $condition_array  = array('subject' => $_SESSION['subjects'][3],'id' =>
   $question_id,'account_type' => $data['user_details']['acct_type']);


}else{

  $condition_array  = array('subject' => $_SESSION['subjects'][3],'id' =>
   $question_id,
"school" => $_SESSION['school']);


}
$data['question'] = $this->question_model->get_question_putme($condition_array);


$data["q_id"] = $question_id;
  $data["q_index"] = array_search($question_id,$_SESSION['subject_four']);
  //index of question_id in an array;



          $this->load->view('common/headmeta_view',$data);
              $this->load->view('user/common/users_nav_view',$data);
              $this->load->view('common/header_view',$data);
              $this->load->view('user/common/pre_content_view',$data);
               $this->load->view('user/putme_question_view',$data);
               $this->load->view('user/common/post_content_view',$data);
          $this->load->view('common/footer_view',$data);





	
}




 public function question_act()
{

if(!isset($_SESSION['user_answers'][$_POST['segment_cont']]))
{
$_SESSION['user_answers'][$_POST['segment_cont']] =[];
}


if(!isset($_SESSION['correct_answers'][$_POST['segment_cont']]))
{
$_SESSION['correct_answers'][$_POST['segment_cont']] =[];
}


if(!isset($_SESSION['question_m_id'][$_POST['segment_cont']]))
{
$_SESSION['question_m_id'][$_POST['segment_cont']] =[];
}


if(!isset($_SESSION['question_number'][$_POST['segment_cont']]))
{
  $_SESSION['question_number'][$_POST['segment_cont']] =[];
}

//if timeout
$diff_t =(time() - $_SESSION['start_time']);
if($diff_t >= (($_SESSION['running'] * 60) - 5))
{

  $_SESSION['timeout'] = TRUE;
  $_SESSION['stopped_time'] = time();
}





            if(!isset( $_SESSION["question_index"][$_POST['segment_cont']]))
              {
                 $_SESSION["question_index"][$_POST['segment_cont']] =1;
                                                                      }

//get needed variables
$q_id = $_POST['q_id'];
$q_index = $_POST['q_index'];
$_subject_items =   $_SESSION['subjects'];
$data['user_details'] = $this->users_model->get_user_by_id();


switch ($_POST['segment_cont']) {
  case 'putme_s0_question_page':
$_sub = $_subject_items[0];
    break;
    case 'putme_s1_question_page':
    $_sub = $_subject_items[1];
      break;
      case 'putme_s2_question_page':
      $_sub = $_subject_items[2];
        break;
  case 'putme_s3_question_page':
  $_sub = $_subject_items[3];
    break;

}


if(!empty($_POST['option']))
{
  $condition_array  = array('subject' => $_sub,'id' => $q_id,"school" => $_SESSION['school']);
   $data['question'] = $this->question_model->get_question_putme($condition_array);
$correct_answer = $data['question']['answer'];
$user_answer = $_POST['option'];
$_SESSION['user_answers'][$_POST['segment_cont']][$q_index] = $user_answer;
$_SESSION['correct_answers'][$_POST['segment_cont']][$q_index] = $correct_answer;
$_SESSION['question_m_id'][$_POST['segment_cont']][$q_index] = $q_id;
if(!in_array($q_index +1,$_SESSION['question_number'][$_POST['segment_cont']]))
{
array_push($_SESSION['question_number'][$_POST['segment_cont']],$q_index +1);

}
}




if(isset($_POST['next']))
    {
$_SESSION['count_sub_np'] = $_POST['total_no_q'];
$_SESSION["question_index"][$_POST['segment_cont']] =$_SESSION["question_index"][$_POST['segment_cont']] + 1;


    show_page("putme/".$_POST['segment_cont']);



    }

  if(isset($_POST['previous']))
  {
  //mark or save here
/*
get question index from question page
do neccessary arithmetic
save to  session 'question_index[subject question page slug]'
for uniqueness so a click in english page wont affect that of chemistry etc

redirect to question page where  next question will be display
*/
    $_SESSION["question_index"][$_POST['segment_cont']] = $_SESSION["question_index"][$_POST['segment_cont']] -1;


show_page("putme/".$_POST['segment_cont']);



}


if(isset($_POST['qno']))
{

    $_SESSION["question_index"][$_POST['segment_cont']] = $_POST['qno'];

show_page("putme/".$_POST['segment_cont']);



}

if(isset($_POST['change_sub']))
{

show_page($_POST['change_sub']);



}
//if isset submit
if(isset($_POST['submit']))
{
//mark and show,save

  $_SESSION['submit'] = TRUE;
  $_SESSION['stopped_time'] = time();

show_page('putme/submit');



}



}


public function submit()
{
  


$_SESSION['s0_score'] = 0;
$_SESSION['s1_score'] = 0;
$_SESSION['s2_score'] = 0;
$_SESSION['s3_score'] = 0;

  foreach($_SESSION['user_answers'] as $key => $value[])
  {
  //$key=putme_s1_question_page etc whilevalue is array of answers

  switch ($key) {
    case 'putme_s0_question_page':
    if(count($_SESSION['user_answers']["putme_s0_question_page"]) !=0)
    {
for($i =0;$i<count($_SESSION['user_answers']["putme_s0_question_page"]);$i++)
{
if($_SESSION['user_answers']["putme_s0_question_page"][$i] ==
$_SESSION['correct_answers']["putme_s0_question_page"][$i])
{
  $_SESSION['s0_score'] = $_SESSION['s0_score'] + 1;
}

}
}else {
  $_SESSION['s0_score'] = 0;

}
      break;
      case 'putme_s1_question_page':
       if(count($_SESSION['user_answers']["putme_s1_question_page"]) !=0)
        {
    for($i =0;$i<count($_SESSION['user_answers']["putme_s1_question_page"]);$i++)
    {
    if($_SESSION['user_answers']["putme_s1_question_page"][$i] ==
    $_SESSION['correct_answers']["putme_s1_question_page"][$i])
    {
      $_SESSION['s1_score'] = $_SESSION['s1_score'] + 1;
    }

    }
    }else {
      $_SESSION['s1_score'] = 0;

    }

        break;
        case 'putme_s2_question_page':
        if(count($_SESSION['user_answers']["putme_s2_question_page"]) !=0)
         {
     for($i =0;$i<count($_SESSION['user_answers']["putme_s2_question_page"]);$i++)
     {
     if($_SESSION['user_answers']["putme_s2_question_page"][$i] ==
     $_SESSION['correct_answers']["putme_s2_question_page"][$i])
     {
       $_SESSION['s2_score'] = $_SESSION['s2_score'] + 1;
     }

     }
     }else {
       $_SESSION['s2_score'] = 0;

     }


          break;
    case 'putme_s3_question_page':
    if(count($_SESSION['user_answers']["putme_s3_question_page"]) !=0)
     {
 for($i =0;$i<count($_SESSION['user_answers']["putme_s3_question_page"]);$i++)
 {
 if($_SESSION['user_answers']["putme_s3_question_page"][$i] ==
 $_SESSION['correct_answers']["putme_s3_question_page"][$i])
 {
   $_SESSION['s3_score'] = $_SESSION['s3_score'] + 1;
 }

 }
 }else {
   $_SESSION['s3_score'] = 0;

 }


      break;

  }//switch

}//foreach


//save result to db later here

        $data["title"] ="Pryce | Results";
        $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
        $data["author"] ="Ojeyinka olaniyi philip";
       $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
       Examnation Candidates";
       $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);
       $data['user_details'] = $this->users_model->get_user_by_id();


      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
          $this->load->view('user/common/pre_content_view',$data);
          $this->load->view('user/putme_result_view',$data);
          $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);







}




//function
public function corrections($slug= NULL,$offset =NULL){

  
//var_dump($_SESSION['running']);
if($offset == 1)
{
$offset =0;

}


if($offset >1)
{
$offset =$offset-1;

}

          $data["title"] ="Pryce | Corrections";
          $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
          $data["author"] ="Ojeyinka olaniyi philip";
         $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
         Examnation Candidates";
         $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
         $data['subject_reg'] =  $_SESSION['subjects'];
         $data['user_details'] = $this->users_model->get_user_by_id();







         switch ($slug) {
           case 's0_correction_page':
           if($offset == NULL)
           {
             $offset = 0;
           }



           $questions_arr  =  $_SESSION['subject_one'];

    if(!isset($data['count_q']))
    {
    $data['count_q'] = count($questions_arr);
  }


               break;
             case 's1_correction_page':
             if($offset == NULL)
             {
               $offset = 0;
             }


             $questions_arr  =  $_SESSION['subject_two'];


      if(!isset($data['count_q']))
      {

      $data['count_q'] = count($questions_arr);

    }


               break;
               case 's2_correction_page':
               if($offset == NULL)
               {
                 $offset = 0;
               }


               $questions_arr  =  $_SESSION['subject_three'];


        if(!isset($data['count_q']))
        {
        $data['count_q'] = count($questions_arr);
      }



                 break;
           case 's3_correction_page':
           if($offset == NULL)
           {
             $offset = 0;
           }



           $questions_arr  =  $_SESSION['subject_four'];

  if(!isset($data['count_q']))
  {
  $data['count_q'] = count($questions_arr);
}

             break;
             default:
             $questions_arr  =  $_SESSION['subject_one'];

             $data['count_q'] = count($questions_arr);
break;

         }//switch

if($offset < count($questions_arr))
{
$condition_array = array('id' => $questions_arr[$offset] );
$data['question'] = $this->question_model->get_question_putme($condition_array);


$data['subject_items'] =   $_SESSION['subjects'];
$data['slug'] =$slug;

        $this->load->view('common/headmeta_view',$data);
            $this->load->view('user/common/users_nav_view',$data);
            $this->load->view('common/header_view',$data);
            $this->load->view('user/common/pre_content_view',$data);
            $this->load->view('user/putme_correction_view',$data);
            $this->load->view('user/common/post_content_view',$data);
        $this->load->view('common/footer_view',$data);



}



}













}