<?php


$myfile = fopen("answers.txt", "r+") or die("Unable to open file!");
 $answers = fread($myfile,filesize("answers.txt"));

$i= 50;
while( $i > 0 )
{
    
   $answers = str_replace($i.". ","QAA. ",$answers );

    $i--;
}


fclose($myfile);


$myfile = fopen("answers.txt", "w+") or die("Unable to open file!");
          

 fwrite($myfile,$answers);

fclose($myfile);



$myfile = fopen("answers.txt", "r+") or die("Unable to open file!");
 $answers = fread($myfile,filesize("answers.txt"));
$answers = explode('QAA. ',$answers);
fclose($myfile);

//echo var_dump($answers);
$no = 1;


$into_file_xml = "";
 $into_file_xml .= '<?xml version="1.0" encoding="utf-8"?>
<answers>';

$explanation = null;


$i= 1;
    while($i < 51){
    
    if(strpos( $answers[$i] ,'Reference:') != FALSE ){
//if there is reference 
        $op_handle = explode('Reference:',$answers[$i])[0];
        $explanation = explode('Reference:',$answers[$i])[1];
        if(strpos( $op_handle ,'A') != FALSE ){
                        $ans_option = 'a';

        }
        elseif(strpos( $op_handle ,'B') != FALSE ){
            $ans_option = 'b';
        }elseif(strpos( $op_handle ,'C') != FALSE  ){
             $ans_option = 'c';

        }elseif(strpos( $op_handle ,'D') != FALSE ){
                         $ans_option = 'd';

        }elseif(strpos( $op_handle ,'E' != FALSE ) ){
                         $ans_option = 'e';

        }
        //echo $ans_option;
       // echo $explanation;
        
}elseif(strlen($answers[$i]) < 9 ){
//if not greater than certain no then it has no explanation
//and there is option keyword
        $op_handle =  $answers[$i];
        if(strpos( $op_handle ,'A') != FALSE ){
                        $ans_option = 'a';

        }
        elseif(strpos( $op_handle ,'B') != FALSE ){
            $ans_option = 'b';
        }elseif(strpos( $op_handle ,'C') != FALSE  ){
             $ans_option = 'c';

        }elseif(strpos( $op_handle ,'D') != FALSE ){
                         $ans_option = 'd';

        }elseif(strpos( $op_handle ,'E' != FALSE ) ){
                         $ans_option = 'e';

        }
        //echo $ans_option." ".$no;

} elseif(!strlen($answers[$i]) > 3 ){
//if not greater than certain no then it has no explanation
//and no option keyword
        //$op_handle =  substr($answers[$i], 0,9);
        $op_handle =  $answers[$i];
;
        if(strpos( $op_handle ,'A') != FALSE ){
                        $ans_option = 'a';

        }
        elseif(strpos( $op_handle ,'B') != FALSE ){
            $ans_option = 'b';
        }elseif(strpos( $op_handle ,'C') != FALSE  ){
             $ans_option = 'c';

        }elseif(strpos( $op_handle ,'D') != FALSE ){
                         $ans_option = 'd';

        }elseif(strpos( $op_handle ,'E' != FALSE ) ){
                         $ans_option = 'e';

        }
        //echo $ans_option." ".$no;

}  elseif((!strlen($answers[$i]) < 9 ) && (!strpos( $answers[$i] ,'Reference:'))){
//if greater than certain no and reference not present then it has  explanation
//and option keyword
        
    //i need to slice
        
        $op_handle =  substr($answers[$i], 0,9);
        if(strpos( $op_handle ,'A') != FALSE ){
                        $ans_option = 'a';

        }
        elseif(strpos( $op_handle ,'B') != FALSE ){
            $ans_option = 'b';
        }elseif(strpos( $op_handle ,'C') != FALSE  ){
             $ans_option = 'c';

        }elseif(strpos( $op_handle ,'D') != FALSE ){
                         $ans_option = 'd';

        }elseif(strpos( $op_handle ,'E' != FALSE ) ){
                         $ans_option = 'e';

        }
        $explanation =   $answers[$i]  ;    

}  
    
   $into_file_xml .= '<answer>';
   $into_file_xml .= '<canswer>'.$ans_option.'</canswer>';
   $into_file_xml .= '<ano>'.$no.'</ano>';
   $into_file_xml .= '<explanation>'.$explanation.'</explanation>';
       $into_file_xml .= '</answer>';

   
    $no++;
    $i++;
}
$into_file_xml .= '</answers>';


$myfile = fopen("answer.xml", "w") or die("Unable to open file!");
          

 fwrite($myfile,$into_file_xml);

fclose($myfile);



echo "Done";

//                                                                                                              echo strlen("Done");

?>