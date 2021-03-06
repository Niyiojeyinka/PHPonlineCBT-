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
            {      show_page('users/login') ;  exit();  }

            
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

            $this->template('user/question_view',$data);
}
public function ajax_get_question($question_index = 0)
{    //question_index variable in the parameter is the next question to get

    $test_details = $this->dashboard_model->get_next_test();
    $test_time_status = $this->question_model->check_test_time_status($test_details);
    $user_test_session = $this->users_model->get_user_test_session($this->session->id, $test_details['id']);
        //check for submit
        if ($user_test_session['status']=="submitted"){
            echo json_encode(['error'=>1,'report'=>'SUBMIT']);
return;
        }

        //check for test time
           if ($test_time_status == "ACTIVE"){
        
            $questions_array;
            if($this->users_model->check_if_attend_test( $test_details['id'],$this->session->id)){
                //attended already

                        $questions_array =json_decode($this->users_model->get_user_test_session($this->session->id,
                             $test_details['id'])['questions'],true);
                        //update session time

                             $data=[
                                'last_updated'=>time(),
                                'time_used'=> $user_test_session['time_used']+(time() - $user_test_session['last_updated'])
                            ];
                            $this->users_model->update_test_session($data,$test_details['id'],$this->session->id);


            }else{
            //yet to attend;new attendance
            //insert and randomized questions into test_session
            $questions_array = json_decode($test_details['questions']);
            //reverse-rand here is temporal ,use real randomize later
            $reverse_control= rand(1,2)==1?TRUE:FALSE;
            if($reverse_control){

                $questions_array = array_reverse($questions_array) ;
            }

            $data=[
                'questions'=> json_encode($questions_array),
                'user_id' => $this->session->id,
                'answers'=>"[]",//user answers
                'test_id'=>$test_details['id'],
                'last_updated'=>time(),
                'time'=>time(),
                'time_start'=> time(),
                'time_used'=>0,
                'status'=>'started'
            ];
              $this->users_model->insert_test_session($data);

                        //mark started

            }

//get updated user test session
            $user_test_session = $this->users_model->get_user_test_session($this->session->id, $test_details['id']);

            //check for user session time
        if ($user_test_session['time_used'] >= $test_details['time_allowed']){
           
            ///your time is up
            echo json_encode(['error'=>1,'report'=>'TIME_UP']);
            return;
            
    }

            //get question

            $question = $this->question_model->get_question_by_id($questions_array[$question_index],true);
            $question['index']=$question_index;
            $question['user_answers']=json_decode($user_test_session['answers']);
            $question['total_no_questions']=count(json_decode($test_details['questions']));
            $question['time_used']=$user_test_session['time_used'];
            $question['time_allowed']=$test_details['time_allowed'];

            echo json_encode(['error'=>0,'question' => $question]);

            

        }else{

            echo json_encode(['error'=>1,'report'=>$test_time_status]);
        }

}
public function ajax_post_question($next_question_index)
{
   
       
    $test_details = $this->dashboard_model->get_next_test();
    $user_test_session = $this->users_model->get_user_test_session($this->session->id, $test_details['id']);
    $user_answers =json_decode($user_test_session['answers'],true);
    $user_answers[$_POST['question_index']] = isset($_POST['user_answer'])?$_POST['user_answer']:NULL;

    
    if (!isset($_POST['submitted'])) {
        $data=[
            'answers'=>json_encode($user_answers)
        ];
        $this->users_model->update_test_session($data,$test_details['id'],$this->session->id);
    $this->ajax_get_question($next_question_index);
    }else{

        $data=[
            'status'=>'submitted',
            'time_end'=>time()
        ];
        $this->users_model->update_test_session($data,$test_details['id'],$this->session->id);
       echo json_encode(['error'=>1,'report'=>'SUBMIT']);

    }
}


}
