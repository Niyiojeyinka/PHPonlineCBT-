<div class="w3-twothird">


 <div class="w3-center">
<b class="w3-center w3-text-grey w3-xlarge">Pages From Draft</b><br>

<?php //echo $err_reports; ?>

<?php

if (!empty($itemp))
{

foreach ($itemp as $item)
{

echo "<br><br><center><ul><div style='width:85%' class='w3-container w3-text-blue-grey w3-border w3-center'>
<span class='w3-text-blue-grey'><li><a href='".site_url()."/blog/view/".$item['slug']."'><b>".$item['title']."</b></a><br><a href='".site_url()."/admin_blog/edit_post/".$item['id']."'>Edit</a><a style='margin-left:2%' href='".site_url()."/admin_blog/delete_page/".$item['id']."'>Delete</a>";





 $statu = $item['status'];

if ($statu == "published")
{

 echo "<a style='margin-left:2%' href='".site_url("admin_blog/move/").$item['id']."/page'>Move To Draft</a>";

}
else {


echo "<a style='margin-left:2%' href='".site_url("admin_blog/move/").$item['id']."/page'>Publish</a>";

}






echo "</span></div></li></center><br>";

}
}else{
echo "No blog entries";

}


?>


</ul>

</div>
 
