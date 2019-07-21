<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
/*

Name:Pryce
Date:Start Rewriting  it on Oct 6, 2017 1:09:25 PM



*/



public function __construct()
{
     parent::__construct();

    $this->load->model(array('board_model','users_model','dashboard_model','pages_model'));
    //$this->load->model('users_model,'dashboard_model');
        $this->load->helper(array('url','form','page_helper'));
     $this->load->library(array('form_validation','session'));
//user login check here

      if (!isset($this->session->id) || !isset($this->session->logged_in))
       {      header('Location: '.base_url().'index.php/users/login');     }


if($this->dashboard_model->get_user_subjects_combination() == NULL )
{

show_page('Dashboard_ext/subject_comb');

}


if($this->users_model->get_if_username_edit() == "0" )
{
$_SESSION['username_err_msg'] ="Please Change your Username Before you
Continue";
$this->session->mark_as_flash('username_err_msg');
show_page('Dashboard_ext/profile');

}


}



public function index($slug = null)
{

  $v_slug = "dashboard/index";
    $this->board_model->insert_view($v_slug);


        $data["title"] ="Pryce | The Online Student Resources Center";
        $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
        $data["author"] ="Ojeyinka olaniyi philip";
       $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
       Examnation Candidates";
       $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
       $data['user_details'] = $this->users_model->get_user_by_id();
       $data['count_not'] = $this->users_model->count_notifications($data['user_details']['username']);


      $this->load->view('common/headmeta_view',$data);
          $this->load->view('user/common/users_nav_view',$data);
          $this->load->view('common/header_view',$data);
          $this->load->view('user/common/pre_content_view',$data);
           $this->load->view('user/dashboard_view',$data);
           $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);






}

/*
public function chat()
{

//chats here

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
           $this->load->view('user/chat_view',$data);
           $this->load->view('user/common/post_content_view',$data);
      $this->load->view('common/footer_view',$data);





}

*/

public function Pryce_upgrade()
{
  //check if not already a premium
  //if not set as premium acct_type
  //update expiry date
  //redirect back
  $data['user_details'] = $this->users_model->get_user_by_id();

if($data['user_details']['acct_type'] != "premium")
{

  //check balance
  //if less than price return FALSE
  //else deduct
  $price = 299.99;
  if($data['user_details']['account_bal'] >= $price){

$new_bal = $data['user_details']['account_bal'] - $price;
$this->users_model->change_acct_type("premium",(time()+(31*24*60*60)),$new_bal);

$_SESSION['err_msg'] ='<div class="w3-text-green">Account Upgraded Successfully:your
balance now is '.$new_bal.'</div>';
$this->session->mark_as_flash('err_msg');
show_page("dashboard/purse");

}else{

  $_SESSION['err_msg'] ='<div class="w3-text-red">insufficient Balance :your
  balance now is '.$data['user_details']['account_bal'].'</div>';
  $this->session->mark_as_flash('err_msg');
  show_page("dashboard/purse");



}
}else{

  $_SESSION['err_msg'] ='<div class="w3-text-red">Account Already Upgraded</div>';
  $this->session->mark_as_flash('err_msg');
show_page("dashboard/purse");


}





}



public function contact_us()
{

  $v_slug = "dashboard/contact_us";
    $this->board_model->insert_view($v_slug);







  			$this->form_validation->set_rules("title","Message Title","required");
  		$this->form_validation->set_rules("message","Message Content","required");

  if ($this->form_validation->run() == FALSE)
  {



            $data["title"] ="Pryce | Contact Us";
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
               $this->load->view('user/contact_view',$data);
               $this->load->view('user/common/post_content_view',$data);
          $this->load->view('common/footer_view',$data);


}else{



$user_det = $this->users_model->get_user_by_id();

  if ($this->users_model->insert_contact($user_det))
  {
  //show success page

      $_SESSION['err_msg'] ='<div class="w3-text-green">You have successfully sent us a message.
      We will get back to you(through your email, Phone or our chat system)
       as soon as possible.Thank you</div>';
      $this->session->mark_as_flash('err_msg');
  show_page("dashboard/contact_us");
  }else{
  //show error

        $_SESSION['err_msg'] ='<div class="w3-text-red">Unknown "Error Occurred"</div>';
        $this->session->mark_as_flash('err_msg');
    show_page("dashboard/contact_us");


  }





}

}
public function test()
{

  echo uniqid();
}
public function micro_payment()
{

$v_slug = "dashboard/micro_payment";
  $this->board_model->insert_view($v_slug);


     $this->form_validation->set_rules("amount","Amount","required");



    if ($this->form_validation->run() ==  FALSE)
   {




            $data["title"] ="Pryce | Fund Account";
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
               $this->load->view('user/pay_view',$data);
               $this->load->view('user/common/post_content_view',$data);
          $this->load->view('common/footer_view',$data);
}
else{
//insert to db and give ref id and redirect to payment gateway



    $array_char = array('A','B','C','D');
    $i = mt_rand(0,3);
    $ref = 'HM'.uniqid().$array_char[$i];


    $referenceId = $ref;
    $merchantId = "1186";
    //production product key
    //$productKey = "b958812d39530ef35ec91d53e6cdbaaf59409b2b";
    //test product key
    $productKey = "8f5f3109b024ee748a7ec3e1366e194fd5fe421e";

    $deviceUuid = uniqid();
    $_SESSION['deviceUuid'] = $deviceUuid;
    $_SESSION['payment_ref'] = $referenceId;
    $this->session->mark_as_temp('payment_ref',1800);

    $amount = $this->input->post('amount');
    $description = "Pryce Account Upgrade And Deposit";
    $redirectUrl = site_url('dashboard/post_micro_payment');

    $data = array(
       "reference_id" => $referenceId,
       "merchant_id" => $merchantId,
       "product_key" => $productKey,
       "uuid" => $deviceUuid,
       "amount" => $amount,
       "description" => $description,
       "redirect_url" => $redirectUrl
    );

    $paymentUrl = "https://www.monapay.com/v1/merchant/pay?" . http_build_query($data);



    //insert payment details to db
    $data['user_details'] = $this->users_model->get_user_by_id();

    $this->dashboard_model->insert_payment_details($data['user_details']['id'],$referenceId
    ,$this->input->post('amount'),'m');



    header("Location: $paymentUrl");


}


}

public function post_micro_payment()
{
$url = "https://www.monapay.com/v1/merchant/verifytransaction/233000046342388898765";
/*//production
 $param = array( 'Host: www.monapay.com','Content-Type:application/json','Ocm-Spmi:Y5MC'
,'Authentication: Basic b958812d39530ef35ec91d53e6cdbaaf59409b2b',
'Cache-Control: no-cache');
*/
//testing
$param = array( 'Host: www.monapay.com','Content-Type:application/json','Ocm-Spmi:Y5MC'
,'Authentication: Basic 8f5f3109b024ee748a7ec3e1366e194fd5fe421e',
'Cache-Control: no-cache');

  //  Initiate curl
  $ch = curl_init();
  //set the content type to application/json
  curl_setopt($ch, CURLOPT_HTTPHEADER, $param);

  // Disable SSL verification
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  // Will return the response, if false it print the response
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  // Set the url
  curl_setopt($ch, CURLOPT_URL,$url);
  // Execute
  $result=curl_exec($ch);
  // Closing
  curl_close($ch);

  $result_array = json_decode($result, true);




}


   public function payment()
 {

   $v_slug = "dashboard/payment";
     $this->board_model->insert_view($v_slug);


       	$this->form_validation->set_rules("amount","Amount","required");



       if ($this->form_validation->run() ==  FALSE)
      {




               $data["title"] ="Pryce | Fund Account";
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
                  $this->load->view('user/pay_view',$data);
                  $this->load->view('user/common/post_content_view',$data);
             $this->load->view('common/footer_view',$data);
}
else{
//insert to db and give ref id and redirect to payment gateway



               $data["title"] ="Pryce | Fund Account";
               $data["keywords"] ="Pryce,jamb,utme,examination,Nigeria,past questions,answer,notes";
               $data["author"] ="Ojeyinka olaniyi philip";
              $data["descriptions"] ="The online Education Platform for Student and Unified Tertiary Matriculation
              Examnation Candidates";
              $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
              $data['user_details'] = $this->users_model->get_user_by_id();
              $data['amount'] = $this->input->post('amount');
              $data['ref'] = $this->input->post('ref');
              $_SESSION['payment_ref'] =$this->input->post('ref');
              $this->session->mark_as_temp('payment_ref',1800);

//insert payment details to db
$this->dashboard_model->insert_payment_details($data['user_details']['id'],$data['ref'],$data['amount'],'c');



             $this->load->view('common/headmeta_view',$data);
                 $this->load->view('user/common/users_nav_view',$data);
                 $this->load->view('common/header_view',$data);
                 $this->load->view('user/common/pre_content_view',$data);
                  $this->load->view('user/payment_view',$data);
                  $this->load->view('user/common/post_content_view',$data);
             $this->load->view('common/footer_view',$data);


}


}


   public function post_payment()
 {



   $data['user_details'] = $this->users_model->get_user_by_id();

   /* IMPORTANT WARNING! - Do not retrieve any of the transaction details using the POST variables. */
   /* IMPORTANT WARNING! - Do not retrieve any of the transaction details using the POST variables. */
   /* IMPORTANT WARNING! - Do not retrieve any of the transaction details using the POST variables. */
   // This file shows how you can retrieve the transaction status via the api using CURL

   function getStatus($transref,$mertid,$type='',$sign){
   	$request = 'mertid='.$mertid.'&transref='.$transref.'&respformat='.$type.'&signature='.$sign; //initialize the request variables
   	$url = 'https://www.cashenvoy.com/sandbox2/?cmd=requery'; //this is the url of the gateway's test api
   	//$url = 'https://www.cashenvoy.com/webservice/?cmd=requery'; //this is the url of the gateway's live api
   	$ch = curl_init(); //initialize curl handle
   	curl_setopt($ch, CURLOPT_URL, $url); //set the url
   	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); //return as a variable
   	curl_setopt($ch, CURLOPT_POST, 1); //set POST method
   	curl_setopt($ch, CURLOPT_POSTFIELDS, $request); //set the POST variables
   	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//change to true when live
   	$response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
   	curl_close($ch); //close the curl handle
   	return $response;
   }



   //edit here:key transref
   $key = $_SESSION['payment_key'];
   $transref = $_SESSION['payment_ref'];
   $mertid = $_SESSION['payment_mer'];
   $type = ''; //Data return format. Options are xml or json. leave blank if you want data returned in string format.
   $cdata = $key.$transref.$mertid;
   $signature = hash_hmac('sha256', $cdata, $key, false);
   $response = getStatus($transref,$mertid,$type,$signature);

   /*------------------------------------- processing response in string format -------------------------*/

   $response = strip_tags(preg_replace('#(<title.*?>).*?(</title>)#', '$1$2', $response));
   $data = explode('-',$response);
   $cnt = count($data);
   if($cnt==3){
   	$returned_transref = $data[0];
   	$returned_status = $data[1];
   	$returned_amount = $data[2];
   	//always remember to cross-check the amount in your database with that returned by the webservice
   	//provide service for successful transaction only if the amount returned by cashenvoy matches what you have in your db
if($returned_status == "C00")
{//successful
$expected_amount = $this->dashboard_model->get_payment_amount($transref);
if($returned_amount == $expected_amount )
{
//add ammount to account balance
 $new_bal = $data['user_details']['account_bal'] + $returned_amount;
//update balance
$this->users_model->update_bal($new_bal);
//update payments table that payment as been credit
$this->dashboard_model->update_payment($transref);
//redirect upgrading pages

$_SESSION['err_msg'] ="<span class='w3-text-green'>Transaction successful</span>";
$this->session->mark_as_flash('err_msg');

show_page('dashboard/purse');

}
}elseif($returned_status == 'C01'){
//user cancel Transaction
//message user other payment options
show_page('dashboard/payment');
$_SESSION['err_msg'] ="We Detected you canceled The transaction
,Please check available options here";
$this->session->mark_as_flash('err_msg');

}elseif($returned_status == 'C04'){
//insufficient fund
//tell user to deposit to his/her card or cashenvoy account
show_page('dashboard/payment');
$_SESSION['err_msg'] ="insufficient fund :pls Deposit and try again";
$this->session->mark_as_flash('err_msg');


}
elseif($returned_status == 'C03'){
//insufficient fund
//tell user to deposit to his/her card or cashenvoy account
show_page('dashboard/payment');
$_SESSION['err_msg'] ="No transaction record.";
$this->session->mark_as_flash('err_msg');


}
elseif($returned_status == 'C05'){
//insufficient fund
//tell user to deposit to his/her card or cashenvoy account
show_page('dashboard/payment');
$_SESSION['err_msg'] ="Transaction failed. Contact support@cashenvoy.com for
more information.Or contact Pryce using the us form";
$this->session->mark_as_flash('err_msg');


}


   } else {
   	$error = $data[0];
   }
   /*------------------------------------------------------------------------------------------------------*/

   /*------------------------------------- processing response in json format ---------------------------*/
   /*
   PHP 5 >= 5.2.0, PECL json >= 1.2.0
   Go to http://php.net/manual/en/function.json-decode.php for more information */
   /*
   $data = json_decode($response);
   foreach ($data as $subdata) { @$cnt++; }
   if($cnt==3){
   	$returned_transref = $data->{'TransactionId'};
   	$returned_status = $data->{'TransactionStatus'};
   	$returned_amount = $data->{'TransactionAmount'};
   	//always remember to cross-check the amount in your database with that returned by the webservice
   	//provide service for successful transaction only if the amount returned by cashenvoy matches what you have in your db
   } else {
   	$error = $data->{'TransactionStatus'};
   }
   ------------------------------------------------------------------------------------------------------*/

   /* For response in xml format, there is no built-in PHP function to handle this. A variety of methods are available on the internet for purpose of handling XML documents. */





 }

   public function purse()
 {
   $v_slug = "dashboard/purse";
     $this->board_model->insert_view($v_slug);




               $data["title"] ="Pryce | Pryce Purse";
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
                  $this->load->view('user/purse_view',$data);
                  $this->load->view('user/common/post_content_view',$data);
             $this->load->view('common/footer_view',$data);


}






   public function logout()
 {
   $v_slug = "dashboard/logout";
     $this->board_model->insert_view($v_slug);




       unset($_SESSION["id"]);
    unset($_SESSION["logged_in"]);


    $_SESSION['err_msg'] = 'You are Successfully logged out';
    $this->session->mark_as_flash('err_msg');

    show_page("users/login");



 }

}
