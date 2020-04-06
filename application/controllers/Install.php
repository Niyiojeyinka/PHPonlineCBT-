<?php
/***
 * Name:       CBT
 * Package:     Initial.php
 * About:        A controller that handle auto table creation operation operation
 * Copyright:  (C) 2018,2019
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/


class Install extends CI_Controller {
    function index()
    {

    $this->load->database();
    $queries = array(
"CREATE TABLE users (
            id int(11) NOT NULL AUTO_INCREMENT,
            firstname varchar(128),
            lastname varchar(128),
            password varchar(128),
            email varchar(128),
            phone varchar(128),
            profile_img varchar(128),
            status varchar(128),
            time int(20),
            level int(2),
            lastlog varchar(128),
            PRIMARY KEY (id)
    );",
"CREATE TABLE questions (
        id int(11) NOT NULL AUTO_INCREMENT,
        subject_id int(4),
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
        question text,
        comp text,
        question_type varchar(128),
        level int(2),
        instructions text,
        explanation text,
        status enum( 'published','draft'),
        author varchar(128),
        test_id varchar(255),
        time int(20),
         PRIMARY KEY (id)
);",
"CREATE TABLE media (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128),
        time int(20),
        link varchar(128),
        type varchar(128),
        PRIMARY KEY (id)
);",
"CREATE TABLE system_var (
    id int(11) NOT NULL AUTO_INCREMENT,
    variable_name varchar(128),
    variable_value varchar(128),
    long_value text,
    PRIMARY KEY (id)
);",
"CREATE TABLE history (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128),
        details varchar(128),
        action varchar(128),
         time int(20),
         PRIMARY KEY (id)
);",
"CREATE TABLE common_tab (
        id int(11) NOT NULL AUTO_INCREMENT,
        position varchar(128),
        short_det varchar(128),
         content text,
        PRIMARY KEY (id)
);"
,
"CREATE TABLE results (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128) NOT NULL,
        standard_score varchar(128),
        test_id varchar(128),
        time int(20) NOT NULL,
         PRIMARY KEY (id)
);",
 "CREATE TABLE subjects (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128),
        short_name varchar(128),
          PRIMARY KEY (id)
);",

"CREATE TABLE tests (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128),
        questions text, 
        instructions text, 
        subject_id int(3),
        test_start varchar(128),
        test_end varchar(128),
        time_allowed varchar(128),
        time int(20),
        PRIMARY KEY (id)
);",
"CREATE TABLE test_sessions (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128),
        answers text, 
        questions text, 
        time_start varchar(128),
        test_id int(4),
        time_end varchar(128),
        status varchar(128),
        time int(20),
        PRIMARY KEY (id)
);",

"CREATE TABLE  team (
        id int(11) NOT NULL AUTO_INCREMENT,
        username varchar(128),
        password varchar(128),
        role_id int(10),
        status varchar(128),
        time int(20),
        PRIMARY KEY (id)
);",
"CREATE TABLE  roles (
        id int(11) NOT NULL AUTO_INCREMENT,
        role_name varchar(128),
        status varchar(128),
        time int(20),
        PRIMARY KEY (id)
);"
    );
       
 foreach($queries as $value)
 {
 
  if ($this->db->query($value))
  {

  echo "Tables sucessfully created"."<br>";

  }
  }
}


}
