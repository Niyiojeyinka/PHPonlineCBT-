<?php
/***
 * Name:       Pryce
 * Package:     Initial.php
 * About:        A controller that handle auto table creation operation operation
 * Copyright:  (C) 2018,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/


class Initial extends CI_Controller {
    function index()
    {

    $this->load->database();

        $sql1 = "CREATE TABLE users (
            id int(11) NOT NULL AUTO_INCREMENT,
            firstname varchar(128),
            lastname varchar(128),
            username varchar(128),
            username_edit varchar(128),
            course varchar(128),
            password varchar(128),
             state varchar(128),
            email varchar(128),
            phone varchar(128),
            profile_img varchar(128),
            phonevc varchar(128),
            status varchar(128),
            short_status varchar(128),
            long_status varchar(255),
            astatus varchar(128),
            time int(20),
            level int(2),
            subjects varchar(255),
            first_choice varchar(255),
            second_choice varchar(255),
            third_choice varchar(255),
            fourth_choice varchar(255),
            account_bal DECIMAL(19,2) NOT NULL,
            platform varchar(128),
            acct_type varchar(128),
            expiry_time varchar(128),
            upgraded_time varchar(128),
            browser varchar(128),
            lastlog varchar(128),
            PRIMARY KEY (id)
    );";







    $sql2 = "CREATE TABLE blog (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128),
        author varchar(128),
        time int(20) NOT NULL,
        keywords varchar(225),
        description varchar(225),
        img_url varchar(225),
        status varchar(225),
        text text NOT NULL,
        PRIMARY KEY (id)
);";



    $sql3 = "CREATE TABLE chats (
        id int(11) NOT NULL AUTO_INCREMENT,
        sender_id varchar(128) NOT NULL,
         receiver_id varchar(128),
         time int(20),
        receiver_status varchar(128),
        sender_status varchar(128),
        img_link varchar(128),
        type varchar(128),
         text text NOT NULL,
        PRIMARY KEY (id)
);";
//receiver_status options: unread,read
//sender_status options: sent,delivered

 //type options: image,text,imagetext




    $sql4 = "CREATE TABLE circles (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128) NOT NULL,
        admin_id varchar(128) NOT NULL,
        members_id varchar(128),
        profile_img varchar(128),
        requests varchar(128),
        circle_type varchar(128),
        disa_mem_id varchar(128),
        appr_mem_id varchar(128),
         status varchar(128),
         slug varchar(128),
         privacy varchar(128),
         time int(20),
        details text,
        PRIMARY KEY (id)
);";
//appr_mem_id,disa_mem_id are arrays

    $sql5 = "CREATE TABLE posts (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128) NOT NULL,
        username varchar(128) NOT NULL,
         slug varchar(128),
         status varchar(128),
        title varchar(128),
        receiver_id varchar(128),
        receiver_type varchar(128),
        post_type varchar(128),
        post_position varchar(128),
        privacy varchar(128),
        post_img varchar(128),
         time int(20),
        contents text,
        PRIMARY KEY (id)
);";





    $sql6 = "CREATE TABLE questions (
        id int(11) NOT NULL AUTO_INCREMENT,
        subject varchar(128),
         year varchar(128),
        answer varchar(128),
        question_img varchar(128),
        account_type varchar(128),
        option_a varchar(255),
        option_b varchar(255),
        option_c varchar(255),
        option_d varchar(255),
        option_e varchar(255),
        option_type varchar(128),
        question_number varchar(128),
        paper_type varchar(128),
        question text,
        comp text,
        question_type varchar(128),
        level int(2),
        instructions text,
        explanation text,
        status varchar(128),
         author varchar(128),
         time int(20),
         PRIMARY KEY (id)
);";
//level options:1,2,3,4
//account type :free,premium
//option type:image,text





    $sql7 = "CREATE TABLE payments (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128) NOT NULL,
        ref varchar(128) NOT NULL,
        method varchar(128) NOT NULL,
        phone int,
        amount DECIMAL(19,2) NOT NULL,
        status varchar(128),
         email varchar(128),
        product varchar(128),
        time int(20),
        details text,
        PRIMARY KEY (id)
);";


//status options: successful,unsuccessful
//methods options: convert, bank





    $sql8 = "CREATE TABLE notes (
        id int(11) NOT NULL AUTO_INCREMENT,
        subject varchar(128),
        author_id varchar(128),
        page_title varchar(128),
        page_content text,
        cont_of int(5),
        chapter_no int(2),
        level int(2),
        status varchar(128),
         time int(20),
         PRIMARY KEY (id)
);";
//level options:1,2,3,4




    $sql9 = "CREATE TABLE bought (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128),
        ref_id varchar(128),
        user_id varchar(128),
        expiry_time varchar(128),
        phone varchar(128),
         email varchar(128),
         price DECIMAL(19,2),
        time varchar(128),
         PRIMARY KEY (id)
);";






    $sql10 = "CREATE TABLE team (
        id int(11) NOT NULL AUTO_INCREMENT,
        firstname varchar(128),
        lastname varchar(128),
        username varchar(128),
        perm varchar(128) ,
        email varchar(128),
        time varchar(128),
        password varchar(128),
        PRIMARY KEY (id)
);";




    $sql11 = "CREATE TABLE pages (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128) NOT NULL,
        author varchar(128),
        time varchar(128) NOT NULL,
         keywords varchar(225),
        description varchar(225),
        status varchar(225),
        text text NOT NULL,
       PRIMARY KEY (id)
);";



     $sql12 = "CREATE TABLE cmessages (
        id int(11) NOT NULL AUTO_INCREMENT,
        email varchar(128),
        name varchar(128),
        phone varchar(128),
        title varchar(128) NOT NULL,
        sender_id varchar(128) NOT NULL,
        username varchar(128),
        message  text NOT NULL,
        status varchar(128),
        solved varchar(128),
        logged_in varchar(128),
        time varchar(128),
        PRIMARY KEY (id)
);";




     $sql13 = "CREATE TABLE newsletter (
        id int(11) NOT NULL AUTO_INCREMENT,
        email varchar(128),
        name varchar(128),
        status varchar(128),
        PRIMARY KEY (id)
);";




     $sql14 = "CREATE TABLE media (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128),
        time int(20),
        link varchar(128),
        type varchar(128),
        PRIMARY KEY (id)
);";



 $sql15= "CREATE TABLE system_var (
    id int(11) NOT NULL AUTO_INCREMENT,
    variable_name varchar(128),
    variable_value varchar(128),
    long_value text,
    PRIMARY KEY (id)
);";


     $sql16 = "CREATE TABLE history (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128),
         details varchar(128),
        action varchar(128),
         time int(20),
         PRIMARY KEY (id)
);";




     $sql17 = "CREATE TABLE common_tab (
        id int(11) NOT NULL AUTO_INCREMENT,
        position varchar(128),
        short_det varchar(128),
         content text,
        PRIMARY KEY (id)
);";




     $sql18 = "CREATE TABLE comments (
        id int(11) NOT NULL AUTO_INCREMENT,
        time varchar(128),
        email varchar(128),
        slug varchar(128),
        status varchar(128),
        img_url varchar(128),
        user_id varchar(128),
        is_reply varchar(128),
        reply_to varchar(128),
        report_status varchar(128),
        content text,
        likes text,
        PRIMARY KEY (id)
);";

//is_reply column is of "true" or "false"






    $sql19 = "CREATE TABLE results (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128) NOT NULL,
        standard_score varchar(128),
        percentage_got varchar(128),
        time int(20) NOT NULL,
        no_of_question varchar(225),
        time_used varchar(128),
        time_used_percentage varchar(128),
        start_time varchar(128),
        time_allowed varchar(128),
         PRIMARY KEY (id)
);";




     $sql20 = "CREATE TABLE subjects (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128),
        short_name varchar(128),
          PRIMARY KEY (id)
);";




     $sql21 = "CREATE TABLE notifications (
        id int(11) NOT NULL AUTO_INCREMENT,
        sender_id varchar(128),
        sender_username varchar(128),
        receiver_id varchar(128),
        receiver_username varchar(128),
        slug varchar(128),
        contents varchar(128),
        post_position varchar(128),
        type varchar(128),
        type_id varchar(128),
        status varchar(128),
        time varchar(128),
          PRIMARY KEY (id)
);";

      $sql22 = "CREATE TABLE top (
         id int(11) NOT NULL AUTO_INCREMENT,
         user_id varchar(128),
         circle_slug varchar(128),
         time varchar(128),
           PRIMARY KEY (id)
      );";



      $sql23 = "CREATE TABLE topics (
         id int(11) NOT NULL AUTO_INCREMENT,
         title varchar(128),
         slug varchar(128),
         user_id varchar(128) NOT NULL,
         status varchar(128),
         front_status varchar(128),
         category varchar(128),
         img_url varchar(128),
         report_status varchar(128),
         rank varchar(128),
         contents text,
         likes text,
         time int(20),
         PRIMARY KEY (id)
      );";


      $sql24 = "CREATE TABLE views (
         id int(11) NOT NULL AUTO_INCREMENT,
         user_id varchar(128),
         user_type varchar(128),
         slug varchar(128),
         time varchar(128),
           PRIMARY KEY (id)
      );";



            $sql25 = "CREATE TABLE guests (
         id int(11) NOT NULL AUTO_INCREMENT,
               lastlog varchar(128),
               time varchar(128),
                 PRIMARY KEY (id)
            );";



            $sql26 = "CREATE TABLE ranges (
         id int(11) NOT NULL AUTO_INCREMENT,
               ranges varchar(128),
               year varchar(128),
               subject varchar(128),
               exam_type varchar(128),
               paper_type varchar(128),
               time varchar(128),
                 PRIMARY KEY (id)
            );";


          $sql27 = "CREATE TABLE waitlist (
         id int(11) NOT NULL AUTO_INCREMENT,
             name varchar(128),
             email varchar(128),
             phone varchar(128),
             time varchar(128),
               PRIMARY KEY (id)
          );";



            $sql28 = "CREATE TABLE bulk_questions (
         id int(11) NOT NULL AUTO_INCREMENT,
               file_name varchar(128),
               file_type varchar(128),
               exam_type varchar(128),
               paper_type varchar(128),
               account_type varchar(128),
               year varchar(128),
               subject varchar(128),
               time varchar(128),
                 PRIMARY KEY (id)
            );";




    $sql29 = "CREATE TABLE putme_questions (
        id int(11) NOT NULL AUTO_INCREMENT,
        subject varchar(128),
        school varchar(128),
         year varchar(128),
        answer varchar(128),
        question_img varchar(128),
        account_type varchar(128),
        option_a varchar(255),
        option_b varchar(255),
        option_c varchar(255),
        option_d varchar(255),
        option_e varchar(255),
        option_type varchar(128),
        question_number varchar(128),
        paper_type varchar(128),
        question text,
        comp text,
        question_type varchar(128),
        level int(2),
        instructions text,
        explanation text,
        status varchar(128),
         author varchar(128),
         time int(20),
         PRIMARY KEY (id)
);";
//level options:1,2,3,4
//account type :free,premium
//option type:image,text


    $sq30 = "CREATE TABLE notes (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128),
        author varchar(128),
        time int(20) NOT NULL,
        keywords varchar(225),
        subject varchar(225),
        img_url varchar(225),
        status varchar(225),
        text text NOT NULL,
        PRIMARY KEY (id)
);";


 $arr = array($sql1,$sql2,$sql3,$sql4,$sql5,$sql6,$sql7,$sql8,$sql9,$sql10,
 $sql11,$sql12,$sql13,$sql14,$sql15,$sql16,$sql17,$sql18,$sql19,$sql20,$sql21
 ,$sql22 ,$sql23 ,$sql24,$sql25,$sql26,$sql27,$sql28,$sql29,$sq30);

 foreach($arr as $value)
 {
 $yea= $this->db->query($value);
  if ($yea)
  {

  echo "Tables sucessfully created"."<br>";

  }
  }
}


}
