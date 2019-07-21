<div class="w3-twothird">


<div class="w3-center">

<?php

if (!empty($items))
{

foreach ($items as $item)
{

echo "<div class='w3-margin w3-card w3-small'>";
echo $item['file_name']."<br>";
//echo $item['file_type']."<br>";
echo $item['exam_type']."<br>";
echo date("F j, Y, g:i a",$item['time'])."<br>";


if(strpos($item['file_name'],"split") != FALSE)
{
echo "<a class='w3-btn w3-blue w3-margin-bottom' href=".site_url("admin_question/save_split_question_todb/".$item['id'])." >Install Split</a>";

}elseif(strpos($item['file_name'],"ANSWER") != FALSE)
{
echo "<a class='w3-btn w3-blue w3-margin-bottom' href=".site_url("admin_question/save_split_answer_todb/".$item['id'])." >Install Answer</a>";

}else{
	echo "<a class='w3-btn w3-blue w3-margin-bottom' href=".site_url("admin_question/save_question_todb/".$item['id'])." >Install</a>";
}

echo "</div>";
}
echo $pagination;

}



?>



</div>
</div>