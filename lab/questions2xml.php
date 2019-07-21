<?php


$myfile = fopen("questions.txt", "r+") or die("Unable to open file!");
 $questions = fread($myfile,filesize("questions.txt"));

$i= 50;
while( $i > 0 )
{
    
   $questions = str_replace($i.". ","QQQ. ",$questions );

    $i--;
}

if(!strpos( $questions ,'QOO') ){
   
 $questions = str_replace("A. ", " QOO. ",$questions);
$questions = str_replace("B. ", " QOO. ",$questions);
$questions = str_replace("C. ", " QOO. ",$questions);
$questions = str_replace("D. ", " QOO. ",$questions);
$questions = str_replace("E. ", " QOO. ",$questions);

    
}

fclose($myfile);


$myfile = fopen("questions.txt", "w+") or die("Unable to open file!");
          

 fwrite($myfile,$questions);

fclose($myfile);


//use $question to split

$myfile = fopen("questions.txt", "r+") or die("Unable to open file!");
 $questions = fread($myfile,filesize("questions.txt"));
$questions = explode('QQQ. ',$questions);
fclose($myfile);

//echo var_dump($questions);
$no = 1;


$into_file_xml = "";
 $into_file_xml .= '<?xml version="1.0" encoding="utf-8"?>
<questions>';

$i= 1;
    while($i <= 50)
//foreach($questions as $questions[$i])
{
    //echo $questions[$i]."<br><br>";
   // echo var_dump(explode('QOO. ',$questions[$i]));
    $question_pack = explode('QOO. ',$questions[$i]);
    $question_text = $question_pack[0];
    $question_optiona = $question_pack[1];
    $question_optionb = $question_pack[2];
    $question_optionc = $question_pack[3];
    $question_optiond = $question_pack[4];
    if(count($question_pack) >5)
    {
        
            $question_optione = $question_pack[5];

    }else{
            $question_optione = NULL;

    }
    
    
    $into_file_xml .=  "<question><questiontext>".$question_text."</questiontext>";
    $into_file_xml .=  "<optiona>".$question_optiona."</optiona>";
     $into_file_xml .=  "<optionb>".$question_optionb."</optionb>";
     $into_file_xml .=  "<optionc>".$question_optionc."</optionc>";
     $into_file_xml .=  "<optiond>".$question_optiond."</optiond>";
      $into_file_xml .= "<optione>".$question_optione."</optione>";
     $into_file_xml .=  "<questionnumber>".$no."</questionnumber></question>";
    $i++;
    $no++;

}
 $into_file_xml .=  "</questions>";


$myfile = fopen("result.xml", "w") or die("Unable to open file!");
          

 fwrite($myfile,$into_file_xml);

fclose($myfile);



echo "Done";



?>