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
       $data['items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);
       $data['user_details'] = $this->users_model->get_user_by_id();

      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
          $this->load->view('user/common/pre_content_view',$data);
           $this->load->view('user/first_option_view',$data);
           $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);






}

public function start($slug = null)
{
  

            $data["title"] = $this->siteName." | Start";
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
           $this->load->view('user/first_option_view',$data);
           $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);






}

public function timed_test($slug = null)
{
  

     		$this->form_validation->set_rules("type","Test Type","required");

    if ($this->form_validation->run() == TRUE)
    {
      $acct_type = $this->users_model->get_user_by_id()['acct_type'];
    //  $acct_type = "free";
//english is compulsory
//subject 1-3 means other three subjects
          unset_prev_sessions();
  $english = strtolower(json_decode($this->users_model->get_user_by_id()['subjects'])[0]);
  $subject_1 = strtolower(json_decode($this->users_model->get_user_by_id()['subjects'])[1]);
  $subject_2 = strtolower(json_decode($this->users_model->get_user_by_id()['subjects'])[2]);
  $subject_3 = strtolower(json_decode($this->users_model->get_user_by_id()['subjects'])[3]);


switch ($this->input->post('type')) {
  case '5':
//english will be 3 questions while others is 2each
$english_no =3;
$others_no =2;
$_SESSION['running'] = 5;

    break;
    case '10':
  //english will be 5 questions while others is 3each
  $english_no =5;
  $others_no =3;
  $_SESSION['running'] = 10;

      break;

      case '20':
    //english will be 12 questions while others is 8each
    $english_no =12;
    $others_no =8;
    $_SESSION['running'] = 20;

        break;

        case '30':
      //english will be 15 questions while others is 10each
      $english_no =15;
      $others_no =10;
      $_SESSION['running'] = 30;

          break;

          case '120':
        //english will be 3 questions while others is 2each
        $english_no =60;
        $others_no =40;
        $_SESSION['running'] = 120;

            break;


}
if($acct_type == 'free')
{

  $condition_array  = array('subject' => $english,
   'status' => 'published','account_type' => $acct_type);


}else{

  $condition_array  = array('subject' => $english,
   'status' => 'published');


}

$out_put = $this->question_model->get_questions($condition_array);
$english_items = randomize($out_put);
//get english question out of available randoms
 $english_items = array_slice($english_items,1,$english_no);
$_SESSION['english_ids'] = $english_items;




 if($acct_type == 'Free')
 {

   $condition_array  = array('subject' => $subject_1,
    'status' => 'published','account_type' => $acct_type);


 }else{

   $condition_array  = array('subject' => $subject_1,
    'status' => 'published');


 }

$out_put = $this->question_model->get_questions($condition_array);
$subject_1_items = randomize($out_put);
//get english question out of available randoms
 $subject_1_items = array_slice($subject_1_items,1,$others_no);
$_SESSION['subject_1_ids'] = $subject_1_items;



 if($acct_type == 'Free')
 {

   $condition_array  = array('subject' => $subject_2,
    'status' => 'published','account_type' => $acct_type);


 }else{

   $condition_array  = array('subject' => $subject_2,
    'status' => 'published');


 }

$out_put = $this->question_model->get_questions($condition_array);
$subject_2_items = randomize($out_put);
//get english question out of available randoms
 $subject_2_items = array_slice($subject_2_items,1,$others_no);
$_SESSION['subject_2_ids'] = $subject_2_items;




 if($acct_type == 'Free')
 {

   $condition_array  = array('subject' => $subject_3,
    'status' => 'published','account_type' => $acct_type);


 }else{

   $condition_array  = array('subject' => $subject_3,
    'status' => 'published');


 }

$out_put = $this->question_model->get_questions($condition_array);
$subject_3_items = randomize($out_put);
//get english question out of available randoms
 $subject_3_items = array_slice($subject_3_items,0,$others_no);
$_SESSION['subject_3_ids'] = $subject_3_items;




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




       
            $data["title"] = $this->siteName." | Timed Examination";
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
             $this->load->view('user/pre_test_view',$data);
             $this->load->view('user/common/post_content_view',$data);
        $this->load->view('common/footer_view',$data);
    }//close form validation true block
else{

show_page('question/index');
}


}







public function s0_question_page()
{
if(!isset($_SESSION['start_time']))
{
  $_SESSION['start_time'] = time();
}
  if(!isset($_SESSION['running']))
  {
    show_page('question/index');
  }

  if(isset($_SESSION['timeout']) || isset($_SESSION['submit']))
  {
    show_page('question/submit');
  }

  $v_slug = "question/s0_question_page";
    $this->board_model->insert_view($v_slug);



  $data['subject_items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);


           $data["title"] ="CBT | ".$data['subject_items'][0]." Examination";
           $data["keywords"] ="CBT,jamb,utme,examination,Nigeria,past questions,answer,notes";
           $data["author"] ="Ojeyinka olaniyi philip";
           $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
           Examnation Candidates";
           $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
           $data['user_details'] = $this->users_model->get_user_by_id();

if(!isset($_SESSION["question_index"]['s0_question_page']) || $_SESSION["question_index"]['s0_question_page'] ==1)
{
  $index_to_use = 0;
  /*$index_to_use is index of question id randomly selected from
corresponding subject session array
*/
}else{

  $index_to_use = $_SESSION["question_index"]['s0_question_page'] - 1;
}


$question_id = $_SESSION['english_ids'][$index_to_use];
$data['count_sub'] =count($_SESSION['english_ids']);



//if click is more than available questions
//in other words if index not exists
if($question_id == NULL)
{
for($i=0;$i < $data['count_sub'];$i++)
{

  $bindex =$i;
}
$question_id = $_SESSION['english_ids'][$bindex];
 $_SESSION["question_index"]['s0_question_page'] = $data['count_sub'] -1;
}




if($data['user_details']['acct_type'] == 'free')
{

  $condition_array  = array('subject' => $data['subject_items'][0],'id' =>
   $question_id,'account_type' => $data['user_details']['acct_type']);


}else{

  $condition_array  = array('subject' => $data['subject_items'][0],'id' =>
   $question_id);


}
$data['question'] = $this->question_model->get_question($condition_array);


$data["q_id"] = $question_id;
  $data["q_index"] = array_search($question_id,$_SESSION['english_ids']);
  //index of question_id in an array;


          $this->load->view('common/headmeta_view',$data);
              $this->load->view('user/common/users_nav_view',$data);
              $this->load->view('common/header_view',$data);
              $this->load->view('user/common/pre_content_view',$data);
               $this->load->view('user/question_view',$data);
               $this->load->view('user/common/post_content_view',$data);
          $this->load->view('common/footer_view',$data);



}
public function s1_question_page()
{

  if(!isset($_SESSION['start_time']))
  {
    $_SESSION['start_time'] = time();
  }
    if(!isset($_SESSION['running']))
    {
      show_page('question/index');
    }

    if(isset($_SESSION['timeout']) || isset($_SESSION['submit']))
    {
      show_page('question/submit');
    }

    


    $data['subject_items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);


             $data["title"] ="CBT | ".$data['subject_items'][1]." Examination";
             $data["keywords"] ="CBT,jamb,utme,examination,Nigeria,past questions,answer,notes";
             $data["author"] ="Ojeyinka olaniyi philip";
             $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
             Examnation Candidates";
             $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
             $data['user_details'] = $this->users_model->get_user_by_id();

  if(!isset($_SESSION["question_index"]['s1_question_page']) || $_SESSION["question_index"]['s1_question_page'] ==1)
  {
    $index_to_use = 0;
    /*$index_to_use is index of question id randomly selected from
  corresponding subject session array
  */
  }else{

    $index_to_use = $_SESSION["question_index"]['s1_question_page'] - 1;
  }


  $question_id = $_SESSION['subject_1_ids'][$index_to_use];
  $data['count_sub'] =count($_SESSION['subject_1_ids']);



  //if click is more than available questions
  //in other words if index not exists
  if($question_id == NULL)
  {
  for($i=0;$i < $data['count_sub'];$i++)
  {

    $bindex =$i;
  }
  $question_id = $_SESSION['subject_1_ids'][$bindex];

  }




  if($data['user_details']['acct_type'] == 'free')
  {

    $condition_array  = array('subject' => $data['subject_items'][1],'id' =>
     $question_id,'account_type' => $data['user_details']['acct_type']);


  }else{

    $condition_array  = array('subject' => $data['subject_items'][1],'id' =>
     $question_id);


  }
   $data['question'] = $this->question_model->get_question($condition_array);


  $data["q_id"] = $question_id;
    $data["q_index"] = array_search($question_id,$_SESSION['subject_1_ids']);
    //index of question_id in an array;


            $this->load->view('common/headmeta_view',$data);
                $this->load->view('user/common/users_nav_view',$data);
                $this->load->view('common/header_view',$data);
                $this->load->view('user/common/pre_content_view',$data);
                 $this->load->view('user/question_view',$data);
                 $this->load->view('user/common/post_content_view',$data);
            $this->load->view('common/footer_view',$data);





}
public function s2_question_page()
{
  $v_slug = "question/s2_question_page";
    $this->board_model->insert_view($v_slug);



    if(!isset($_SESSION['start_time']))
    {
      $_SESSION['start_time'] = time();
    }
      if(!isset($_SESSION['running']))
      {
        show_page('question/index');
      }

      if(isset($_SESSION['timeout']) || isset($_SESSION['submit']))
      {
        show_page('question/submit');
      }



      $data['subject_items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);


               $data["title"] ="CBT | ".$data['subject_items'][2]." Examination";
               $data["keywords"] ="CBT,jamb,utme,examination,Nigeria,past questions,answer,notes";
               $data["author"] ="Ojeyinka olaniyi philip";
               $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
               Examnation Candidates";
               $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
               $data['user_details'] = $this->users_model->get_user_by_id();

    if(!isset($_SESSION["question_index"]['s2_question_page']) || $_SESSION["question_index"]['s2_question_page'] ==1)
    {
      $index_to_use = 0;
      /*$index_to_use is index of question id randomly selected from
    corresponding subject session array
    */
    }else{

      $index_to_use = $_SESSION["question_index"]['s2_question_page'] - 1;
    }


    $question_id = $_SESSION['subject_2_ids'][$index_to_use];
    $data['count_sub'] =count($_SESSION['subject_2_ids']);



    //if click is more than available questions
    //in other words if index not exists
    if($question_id == NULL)
    {
    for($i=0;$i < $data['count_sub'];$i++)
    {

      $bindex =$i;
    }
    $question_id = $_SESSION['subject_2_ids'][$bindex];

    }



    if($data['user_details']['acct_type'] == 'free')
    {

      $condition_array  = array('subject' => $data['subject_items'][2],'id' =>
       $question_id,'account_type' => $data['user_details']['acct_type']);


    }else{

      $condition_array  = array('subject' => $data['subject_items'][2],'id' =>
       $question_id);


    }
      $data['question'] = $this->question_model->get_question($condition_array);


    $data["q_id"] = $question_id;
      $data["q_index"] = array_search($question_id,$_SESSION['subject_2_ids']);
      //index of question_id in an array;


              $this->load->view('common/headmeta_view',$data);
                  $this->load->view('user/common/users_nav_view',$data);
                  $this->load->view('common/header_view',$data);
                  $this->load->view('user/common/pre_content_view',$data);
                   $this->load->view('user/question_view',$data);
                   $this->load->view('user/common/post_content_view',$data);
              $this->load->view('common/footer_view',$data);





}
public function s3_question_page($question_index = null)
{



    if(!isset($_SESSION['start_time']))
    {
      $_SESSION['start_time'] = time();
    }
      if(!isset($_SESSION['running']))
      {
        show_page('question/index');
      }

      if(isset($_SESSION['timeout']) || isset($_SESSION['submit']))
      {
        show_page('question/submit');
      }

      $v_slug = "question/s3_question_page";
        $this->board_model->insert_view($v_slug);



      $data['subject_items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);


               $data["title"] ="CBT | ".$data['subject_items'][3]." Examination";
               $data["keywords"] ="CBT,jamb,utme,examination,Nigeria,past questions,answer,notes";
               $data["author"] ="Ojeyinka olaniyi philip";
               $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
               Examnation Candidates";
               $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
               $data['user_details'] = $this->users_model->get_user_by_id();

    if(!isset($_SESSION["question_index"]['s3_question_page']) || $_SESSION["question_index"]['s3_question_page'] ==1)
    {
      $index_to_use = 0;
      /*$index_to_use is index of question id randomly selected from
    corresponding subject session array
    */
    }else{

      $index_to_use = $_SESSION["question_index"]['s3_question_page'] - 1;
    }


    $question_id = $_SESSION['subject_3_ids'][$index_to_use];
    $data['count_sub'] =count($_SESSION['subject_3_ids']);



    //if click is more than available questions
    //in other words if index not exists
    if($question_id == NULL)
    {
    for($i=0;$i < $data['count_sub'];$i++)
    {

      $bindex =$i;
    }
    $question_id = $_SESSION['subject_3_ids'][$bindex];

    }



    if($data['user_details']['acct_type'] == 'free')
    {

      $condition_array  = array('subject' => $data['subject_items'][3],'id' =>
       $question_id,'account_type' => $data['user_details']['acct_type']);


    }else{

      $condition_array  = array('subject' => $data['subject_items'][3],'id' =>
       $question_id);


    }
      $data['question'] = $this->question_model->get_question($condition_array);


    $data["q_id"] = $question_id;
      $data["q_index"] = array_search($question_id,$_SESSION['subject_3_ids']);
      //index of question_id in an array;


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
$_subject_items =   json_decode($this->users_model->get_user_by_id()['subjects']);
$data['user_details'] = $this->users_model->get_user_by_id();


switch ($_POST['segment_cont']) {
  case 's0_question_page':
$_sub = $_subject_items[0];
    break;
    case 's1_question_page':
    $_sub = $_subject_items[1];
      break;
      case 's2_question_page':
      $_sub = $_subject_items[2];
        break;
  case 's3_question_page':
  $_sub = $_subject_items[3];
    break;

}


if(!empty($_POST['option']))
{
              $condition_array  = array('subject' => $_sub,'id' => $q_id);
               $data['question'] = $this->question_model->get_question($condition_array);
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


    show_page("question/".$_POST['segment_cont']);



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


show_page("question/".$_POST['segment_cont']);



}


if(isset($_POST['qno']))
{

    $_SESSION["question_index"][$_POST['segment_cont']] = $_POST['qno'];

show_page("question/".$_POST['segment_cont']);



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

show_page('question/submit');



}



}

public function submit()
{
  $v_slug = "question/submit";
  $this->board_model->insert_view($v_slug);


$_SESSION['s0_score'] = 0;
$_SESSION['s1_score'] = 0;
$_SESSION['s2_score'] = 0;
$_SESSION['s3_score'] = 0;

  foreach($_SESSION['user_answers'] as $key => $value[])
  {
  //$key=s1_question_page etc whilevalue is array of answers

  switch ($key) {
    case 's0_question_page':
    if(count($_SESSION['user_answers']["s0_question_page"]) !=0)
    {
for($i =0;$i<count($_SESSION['user_answers']["s0_question_page"]);$i++)
{
if($_SESSION['user_answers']["s0_question_page"][$i] ==
$_SESSION['correct_answers']["s0_question_page"][$i])
{
  $_SESSION['s0_score'] = $_SESSION['s0_score'] + 1;
}

}
}else {
  $_SESSION['s0_score'] = 0;

}
      break;
      case 's1_question_page':
       if(count($_SESSION['user_answers']["s1_question_page"]) !=0)
        {
    for($i =0;$i<count($_SESSION['user_answers']["s1_question_page"]);$i++)
    {
    if($_SESSION['user_answers']["s1_question_page"][$i] ==
    $_SESSION['correct_answers']["s1_question_page"][$i])
    {
      $_SESSION['s1_score'] = $_SESSION['s1_score'] + 1;
    }

    }
    }else {
      $_SESSION['s1_score'] = 0;

    }

        break;
        case 's2_question_page':
        if(count($_SESSION['user_answers']["s2_question_page"]) !=0)
         {
     for($i =0;$i<count($_SESSION['user_answers']["s2_question_page"]);$i++)
     {
     if($_SESSION['user_answers']["s2_question_page"][$i] ==
     $_SESSION['correct_answers']["s2_question_page"][$i])
     {
       $_SESSION['s2_score'] = $_SESSION['s2_score'] + 1;
     }

     }
     }else {
       $_SESSION['s2_score'] = 0;

     }


          break;
    case 's3_question_page':
    if(count($_SESSION['user_answers']["s3_question_page"]) !=0)
     {
 for($i =0;$i<count($_SESSION['user_answers']["s3_question_page"]);$i++)
 {
 if($_SESSION['user_answers']["s3_question_page"][$i] ==
 $_SESSION['correct_answers']["s3_question_page"][$i])
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

        $data["title"] ="CBT | Results";
        $data["keywords"] ="CBT,jamb,utme,examination,Nigeria,past questions,answer,notes";
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
          $this->load->view('user/result_view',$data);
          $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);







}


//function
public function corrections($slug= NULL,$offset =NULL){

  $v_slug = "question/corrections";
    $this->board_model->insert_view($v_slug);


//var_dump($_SESSION['running']);
if($offset == 1)
{
$offset =0;

}


if($offset >1)
{
$offset =$offset-1;

}

          $data["title"] ="CBT | Corrections";
          $data["keywords"] ="CBT,jamb,utme,examination,Nigeria,past questions,answer,notes";
          $data["author"] ="Ojeyinka olaniyi philip";
         $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
         Examnation Candidates";
         $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
         $data['subject_reg'] =   json_decode($this->users_model->get_user_by_id()['subjects']);
         $data['user_details'] = $this->users_model->get_user_by_id();







         switch ($slug) {
           case 's0_correction_page':
           if($offset == NULL)
           {
             $offset = 0;
           }



           $questions_arr  =  $_SESSION['english_ids'];

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


             $questions_arr  =  $_SESSION['subject_1_ids'];


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


               $questions_arr  =  $_SESSION['subject_2_ids'];


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



           $questions_arr  =  $_SESSION['subject_3_ids'];

  if(!isset($data['count_q']))
  {
  $data['count_q'] = count($questions_arr);
}

             break;
             default:
             $questions_arr  =  $_SESSION['subject_ids'];

             $data['count_q'] = count($questions_arr);
break;

         }//switch

if($offset < count($questions_arr))
{
$condition_array = array('id' => $questions_arr[$offset] );
$data['question'] = $this->question_model->get_question($condition_array);


$data['subject_items'] =   json_decode($this->users_model->get_user_by_id()['subjects']);
$data['slug'] =$slug;

        $this->load->view('common/headmeta_view',$data);
            $this->load->view('user/common/users_nav_view',$data);
            $this->load->view('common/header_view',$data);
            $this->load->view('user/common/pre_content_view',$data);
            $this->load->view('user/correction_view',$data);
            $this->load->view('user/common/post_content_view',$data);
        $this->load->view('common/footer_view',$data);



}



}

public function save_result($offset = 0)
{


    $limit = 5;


    $data['leaders'] = $this->question_model->get_leaders($offset,
    $limit);

    	$this->load->library('pagination');

    	$config['base_url'] = site_url("question/save_result");



    $config['total_rows'] = count($this->question_model->get_leaders(NULL,
    NULL));
    //  $config['total_rows'] = 10;
    	$config['per_page'] = $limit;

      $config['uri_segment'] = 3;
      $config['first_tag_open'] = '<span class="w3-btn  w3-indigo w3-text-white w3-round-xlarge">';
      $config['first_tag_close'] = '</span>';
      $config['last_tag_open'] = '<br><span class="w3-btn  w3-indigo w3-text-white w3-round-xlarge">';
      $config['last_tag_close'] = '</span>';
      $config['first_link'] = 'First';



      $config['prev_link'] = 'Prev';
      $config['next_link'] = 'Next';
      $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn
       w3-indigo w3-text-white w3-round-xlarge">';
      $config['next_tag_close'] = '</span><br>';
      $config['prev_tag_open'] = '<span style="" class="w3-btn w3-indigo
       w3-text-white w3-round-xlarge">';
      $config['prev_tag_close'] = '</span>';
      $config['last_link'] = 'Last';
      $config['display_pages'] = false;


    	   $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();




$data["title"] ="CBT | Corrections";
$data["keywords"] ="CBT,jamb,utme,examination,Nigeria,past questions,answer
,notes";
$data["author"] ="Ojeyinka olaniyi philip";
$data["descriptions"] ="The online Education Platform for Student and Unified
 Tertiary Matriculation
Examnation Candidates";
$data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$data['subject_reg'] =   json_decode($this->users_model->get_user_by_id()
['subjects']);
$data['user_details'] = $this->users_model->get_user_by_id();
$account_type = $data['user_details']['acct_type'];


    if($account_type != "free"){
//tell them u are qualify
//if no test is written rediret to test
$time_allowed = ($_SESSION['running'] *60 );
$time_used  = $_SESSION['stopped_time'] - $_SESSION['start_time'];
$standard_score = $this->input->post("score");
switch ($_SESSION['running']) {
  case '5':
$no_of_question = 9;
    break;
    case '10':
  $no_of_question = 14;
      break;
      case '20':
    $no_of_question = 30;
        break;
        case '30':
      $no_of_question = 45;
          break;

          case '120':
        $no_of_question = 180;
            break;


  }

if($this->question_model->get_result(array("user_id" => $_SESSION['id'],
"start_time" => $_SESSION['start_time'])) == NULL)
{
$this->question_model->insert_result($time_used,$time_allowed,$standard_score,
$no_of_question);
}
$_SESSION['post_submit_compete'] = "<span class='w3-text-theme'>You've have sucessfully
nominate Yourself for the MArkHitter of week,Goodluck.Please visit the Leaderboard
frequently to know the winners.</span>";
$this->session->mark_as_flash('post_submit_compete');

      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
          $this->load->view('user/compete_view',$data);
      $this->load->view('common/footer_view',$data);





}else {

//tell them they are not qualify
//tell them to upgrade and redirect them to payment page
    show_page('dashboard/purse');


}








}


}
