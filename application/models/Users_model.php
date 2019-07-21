<?php

class Users_model extends CI_Model {


/***
 * Name:      Pryce
 * Package:    Users_model.php
 * About:        A model class that handle Pryce user  model operation
 * Copyright:  (C) 2018
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();
    $this->load->library('session');

 $holder = array(

"lastlog" => time()



)  ;


   $this->db->update("users",$holder,array("id" => $this->session->id));


}
//new
public function register()
{



     $reg = array(

'firstname' =>  $this->input->post('firstname'),
'lastname' =>  $this->input->post('lastname'),
'username' =>  "@".$this->input->post('lastname').uniqid(),
'email' => $this->input->post('email'),
'phone' => $this->input->post('phone'),
'password' => $this->input->post('password'),
'profile_img' => 'test.png',
'first_choice' => 'First Choice Institution,Nigeria',
'second_choice' => 'Second Choice Institution,Nigeria',
'third_choice' => 'Third Choice Institution,Nigeria',
'fourth_choice' => 'Fourth Choice Institution,Nigeria',
'short_status' => '"Hello Guys,I"m new here"',
'course' => 'My course here',
'acct_type' => 'free',
'username_edit' => '0',
 'level' => 1,
'account_bal' => 0.00,
 'time' => time()

);
//if username_edit is then username have been changed



   $this->db->insert('users',$reg);


 return true;






}
//new
public function login_check()
{




$this->db->select('password');

$query = $this->db->get_where('users',array("phone" => $this->input->post("phone")));


$_pass = $this->input->post('password');
if (in_array($_pass,$query->row_array()) )
{
$datab  = array('lastlog' => time() );
$this->db->update('users',$datab,array('password' => $_pass));


      $datah = array(

  'user_id' => $query->row_array()['id'],
  'action' => 'Log into account',
  'time' => time()

 );


  $this->db->insert('history',$datah);




  return true;
}
   else
   {
   return false;
   }






}
/*
public function forg($emmail)
{


$this->db->select('password');
$query = $this->db->get_where('users',array("email" => $emmail));

foreach ($query->result_array() as $arr)
{
return $arr['password'];
}

}

*/

public function get_users($offset,$limit)
{


    $this->db->order_by("lastlog","DESC");


    $query = $this->db->get('users',$limit,$offset);
  return $query->result_array();




}


public function count_users_reg_at_time($time)
{


    $query = $this->db->query('SELECT * FROM users WHERE time >= '.(time()-$time).';');
  return $query->result_array();




}


public function count_users_upgraded_at_time($time)
{


    $query = $this->db->query('SELECT * FROM users WHERE upgraded_time >= '.(time()-$time).';');
  return $query->result_array();




}



public function count_users_online_at_time($time)
{


    $query = $this->db->query('SELECT * FROM users WHERE lastlog >= '.(time()-$time).';');
  return $query->result_array();




}



public function count_account_type($type,$offset,$limit)
{


    $query = $this->db->get_where('users',array('acct_type' => $type),$limit,$offset);
  return count($query->result_array());




}




public function get_all_posts()
{
$query = $this->db->get('posts');
  return $query->result_array();

}

public function update_bal($new_bal)
{
   $add = array(

    'account_bal' => $new_bal



    );

    $this->db->update('users',$add,array('id' =>$_SESSION['id']));



}



public function get_notifications($offset,
$limit,$username)
{


    $this->db->order_by("id","DESC");


    $query = $this->db->get_where('notifications', array('receiver_username' =>$username )
    ,$limit,$offset);

    $read = array(

    'status' => 'read'



    );

    $this->db->update('notifications',$read,array('receiver_username' =>$username));



  return $query->result_array();
}




public function count_notifications($username)
{


    $this->db->order_by("id","DESC");


    $query = $this->db->get_where('notifications', array('receiver_username' =>$username,'status' => "unread" )
  );

  return count($query->result_array());
}




//new
public function change_acct_type($type,$expire,$new_bal)
{

if($expire == NULL)
{
    $inp_dab = array(

   "acct_type" => $type



    );

    $this->db->update('users',$inp_dab,array("id" => $_SESSION['id']));

}else{


  $inp_dab = array(

 "acct_type" => $type,
  "expiry_time" => $expire,
  "upgraded_time" => time(),
  "account_bal" => $new_bal


  );

  $this->db->update('users',$inp_dab,array("id" => $_SESSION['id']));

}



}

public function change_profile_picture($new_img)
{


    $inp_dab = array(

   "profile_img" => $new_img



    );

    $this->db->update('users',$inp_dab,array("id" => $_SESSION['id']));


return true;



}



//new
public function get_user_id_by_password($pass)
{


    $query = $this->db->get_where('users',array("password" => $pass));
  return $query->row_array()['id'];




}

//new
public function get_user_by_id()
{


    $query = $this->db->get_where('users',array("id" => $_SESSION["id"]));
  return $query->row_array();




}
//new
public function get_if_username_edit()
{


    $query = $this->db->get_where('users',array("id" => $_SESSION["id"]));
  return $query->row_array()['username_edit'];




}

//new
public function get_user_by_its_id($id)
{


    $query = $this->db->get_where('users',array("id" => $id));
  return $query->row_array();




}
//new
public function get_user_by_username_link($username)
{


    $query = $this->db->get_where('users',array("username" => $username));
  return $query->row_array();




}


//new
public function insert_new_password()
{

$dab = array(

"password" => $this->input->post("npass")




)  ;






   if ($this->db->update("users",$dab,array("id" => $_SESSION["id"])))
   {


    return true;

   }
    return false;


}


//new
public function insert_waitlist()
{

$dab = array(

"name" => $this->input->post("name"),
"email" => $this->input->post("email"),
"phone" => $this->input->post("phone"),
"time" => time()


)  ;






   if ($this->db->insert("waitlist",$dab))
   {


    return true;

   }
    return false;


}



//new
public function edit_institution($first_choice,$second_choice,$third_choice,$fourth_choice)
{

$dab = array(

"first_choice" => $first_choice,
"second_choice" => $second_choice,
"third_choice" => $third_choice,
"fourth_choice" => $fourth_choice


)  ;






   $this->db->update("users",$dab,array("id" => $_SESSION["id"]));




}




//new
public function edit_username()
{

  $query = $this->db->get_where('users',array("id" => $_SESSION["id"]));
if($query->row_array()['username_edit'] == "1")
{
  return false;
}






$dab = array(

"username" => $this->input->post("username"),
"username_edit" => "1"




)  ;






   if ($this->db->update("users",$dab,array("id" => $_SESSION["id"])))
   {


    return true;

   }
    return false;


}


//new
public function edit_choices()
{

$dab = array(

"username" => $this->input->post("username")




)  ;






   if ($this->db->update("users",$dab,array("id" => $_SESSION["id"])))
   {


    return true;

   }
    return false;


}



//new
public function edit_status()
{

$dab = array(

"short_status" => $this->input->post("status")




)  ;






   if ($this->db->update("users",$dab,array("id" => $_SESSION["id"])))
   {


    return true;

   }
    return false;


}



//new
public function edit_course()
{

$dab = array(

"course" => $this->input->post("course")



)  ;






   if ($this->db->update("users",$dab,array("id" => $_SESSION["id"])))
   {


    return true;

   }
    return false;


}






//New
public function insert_new_email()
{

$dab = array(

"email" => $this->input->post("nemail")

)  ;






   if ($this->db->update("users",$dab,array("id" => $_SESSION["id"])))
   {



    return true;

   }
    return false;


}

//New
public function insert_new_phone()
{

$dab = array(

"phone" => $this->input->post("nphone"),
"status" => "unverified",
"phonevc" => md5(time())

)  ;






   if ($this->db->update("users",$dab,array("id" => $_SESSION["id"])))
   {



    return true;

   }
    return false;


}

//new
public function insert_contact($user_det)
{


 $contact = array(

'name' => $user_det['firstname'].' '.$user_det['lastname'],
'title' => $this->input->post('title'),
 'phone' => $user_det['phone'],
 'sender_id' => $_SESSION['id'],
'message' => $this->input->post('message'),
'status' => 'unread',
'logged_in' => 'yes',
'solved' => 'no',
'time' => time()
);



 if( $this->db->insert('cmessages',$contact))
 {


return true;

}else {
return false;
}




}

public function insert_to_circle($new_mem,$value)
{


   $query = array(

  'members_id' => $new_mem
   );



   if( $this->db->update('circles',$query,array('name' => $value)))
   {


  return TRUE;

  }else {
  return FALSE;
  }




}

//new
public function insert_subject_comb()
{


 $query = array(

'subjects' => json_encode($_SESSION['subject_options'])
 );



 if( $this->db->update('users',$query,array('id' => $_SESSION['id'])))
 {


return TRUE;

}else {
return FALSE;
}




}


public function get_circle($conditions)
{
$query = $this->db->get_where('circles',$conditions);
  return $query->row_array();


}



public function get_users_id($emai)
{

    $query = $this->db->get_where('users',array("email" => $emai));
  return $query->row_array()['id'];



}


public function get_vstatus()
{//options:verified,unverified,pending

    $query = $this->db->get_where('users',array("email" => $_SESSION['email']));
  return $query->row_array()['status'];



}


public function get_vcode()
{

    $query = $this->db->get_where('users',array("email" => $_SESSION['email']));
  return $query->row_array()['emailvc'];



}


    public function change_vcode()
    {

   $dab = array(
   "status" => "verified",
   "emailvc" => null
   ) ;


 if( $this->db->update('users',$dab,array("email" => $_SESSION["email"])))
 {

             $datah = array(

         'user_email' => $_SESSION['email'],
         'account_type' => 'General',
        'action' => 'Account Email Verified',
         'time' => time()

        );


         $this->db->insert('history',$datah);



return true;

}else {
return false;
}





    }



}
