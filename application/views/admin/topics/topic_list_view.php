<div class="w3-twothird">


<div class="w3-center">

  <?php
  if(isset($_SESSION['err_reports']))
  {

    echo $_SESSION['err_reports'];

  }
  ?>
  <br>

<b class="w3-center w3-text-grey w3-xlarge">
  <?php if($this->uri->segment(2) == "reports")
{

 echo "Reported Posts";
}elseif($this->uri->segment(2) == "admin_board_posts")
{

 echo "Admin Board Posts";
}else{
echo "Board Topics";

}
?>
</b><br>

<?php

if (!empty($items))
{

foreach ($items as $item)
{
echo "<div class='w3-container w3-border w3-padding w3-margin'>";
echo "<a href='".site_url('board/topic/'.$item['slug'])."'>";
echo $item['title']."<br>";
echo "</a>";

echo "<span class='w3-small'>By ";
if($item['user_id'] == "@Admin")
{
 $username =$item['user_id'];
}else{
  $username = $this->users_model->get_user_by_its_id($item['user_id'])['username'];
}
 echo "<a href='".site_url('users/me/'.$username)."'>".$username."</a>";

echo " ".date( "F j, Y, g:i a",$item["time"]);
echo "</span>";


 $front_status = $item['front_status'];

if ($front_status != "active")
{

  echo "<a style='margin-left:2%' class='w3-text-blue' href='"
  .site_url("admin_blog/move_post_front/".$item['id']."/m")."'>Move To Frontpage</a>";
}
else {


  echo "<a style='margin-left:2%' class='w3-text-blue' href='".
  site_url("admin_blog/move_post_front/".$item['id']."/r")."'>Remove From Frontpage</a>";

}



echo "<a style='margin-left:2%' class='w3-text-red' href='".
site_url("admin_blog/delete_board_post/".$item['id'])."'>Delete</a>";
echo "</div>";
}
}else{
echo "No Topic entries";

}


?>


</ul>
<?php echo $pagination; ?>
</div>
