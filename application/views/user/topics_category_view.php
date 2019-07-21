<div class="w3-container w3-center">
<br>
  <span class="w3-text-theme w3-large w3-margin-top"><?php echo ucfirst($slug); ?></span><br>
<div class="w3-container">
<?php
if(!empty($categories))
{
foreach ($categories as  $value) {

echo '<hr><a class="" href="'.site_url('board/
topic/'.$value['slug']).'">';
echo  '<div class="w3-container">';
  echo  '<h6 class="w3-text-theme">'.ucfirst($value['title']).'</h6>';
  echo  '<p class="w3-tiny">'.get_blog_excerpt($value['contents'],42).'...</p>';
$username = $this->users_model->get_user_by_its_id($value['user_id'])['username'];
echo "<span class='w3-tiny'>by ".$username." at ".date( "F j, Y, g:i a",$value["time"])
;
echo '</div></a>
<hr>';
}

echo $pagination;
}else{
   echo "Sorry,this category is empty!";
}


 ?>
</div>

<div>
