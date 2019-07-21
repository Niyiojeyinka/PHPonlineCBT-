<div class="w3-container w3-center">
<?php
echo '<a href="'.site_url('board').'">Board Home>></a>';
echo '<a href="'.site_url('board/category/'.$item['category']).'">'.$item['category'].'>></a>';
echo '<a href="'.site_url('board/topic/'.$item['slug']).'">'.$item['title'].'</a>';

 ?>
  <hr>
<div style="max_width:90%" class="w3-container"><br>
<?php
if(isset($_SESSION['err_report']))
{
  echo $_SESSION['err_report'].'<br>';
}
 ?>

  <span class="w3-text-theme w3-large w3-margin"><?php echo ucfirst($item['title']); ?></span>
<br><span class="w3-tiny"><?php
echo $page_views;
?> views</span><span class="w3-tiny w3-margin-right"> <?php
echo $page_comments;
?> Comments</span></div><?php
echo "<a href='".site_url('board/reply/'.$item['slug'])."' class='w3-center w3-text-theme'>( Reply )<hr></a>";
?>
<div class="w3-container w3-padding w3-border w3-small w3-margin"><?php
if($item['user_id'] =="@Admin")
{
  $username= $item['user_id'];
}else{
$username = $this->users_model->get_user_by_its_id($item['user_id'])['username'];
}
echo "<div><span class='w3-text-theme w3-left'><b><a href='".site_url('users/me/'.$username)."'>".
$username."</a></b></span></div><br>";

echo nl2br($item['contents']);
if($item['img_url'] !=NULL)
{
echo "<div style='max-width:80%' class='w3-container'>";
echo "<img class='' src='".base_url('assets/topics/'.$item['img_url'])."'/>";
echo "</div>";
}
echo "<br><div class='w3-text-theme'>";
/*

$likes_array=json_decode($item['likes']);

$likes = count($likes_array);
if($likes != 0)
{
 echo '<span class="w3-left">'.$likes.'likes</span>';
}
if(isset($_SESSION['id']))
{
if(!in_array($_SESSION['id'],$likes_array))
   {
echo "<a href='".site_url('board/like/'.$item['slug'].'/p/'.$item['id'].'/'.$item['user_id'])
."' class='w3-left w3-margin-left w3-text-theme'>Like</a>";
}
else{
  echo "<a href='".site_url('board/unlike/'.$item['slug'].'/p/'.$item['id'].'/'.$item['user_id'])
  ."' class='w3-left w3-margin-left w3-text-theme'>Unlike</a>";


}
}else{
  echo "<a href='".site_url('board/like/'.$item['slug'].'/p/'.$item['id'].'/'.$item['user_id'])
  ."' class='w3-left w3-margin-left w3-text-theme'>Like</a>";

}
*/

echo "<a href='".site_url('board/reply/'.$item['slug'])."' class='w3-left w3-margin-left w3-text-theme'> Reply </a>
<a href='".site_url('board/report/'.$item['slug'].'/p/'.$item['id'])."' class='w3-left w3-margin-left w3-text-theme'> Report </a>";
echo "<span class='w3-right'>".date( "F j, Y, g:i a",$item["time"])."</span>";
echo "</div>";
 ?>
</div>
<div class="w3-container">
  <?php
  if(!empty($comments))
  {
  foreach ($comments as  $item) {
  echo  '<div class="w3-container w3-padding w3-border w3-small w3-margin">';
  $username = $this->users_model->get_user_by_its_id($item['user_id'])['username'];
  echo "<div><span class='w3-text-theme w3-left'><b><a href='".site_url('users/me/'.$username)."'>".
  $username."</a></b></span></div><br>";

    echo $item['content'];
    if($item['img_url'] !=NULL)
    {
    echo "<div style='max-width:80%' class='w3-container'>";
    echo "<img class='' src='".base_url('assets/topics/'.$item['img_url'])."'/>";
    echo "</div>";
    }
    echo "<br><div class='w3-text-theme'>";

      /*    $likes_array=json_decode($item['likes']);

$likes = count($likes_array);
if($likes != 0)
{
     echo '<span class="w3-left">'.$likes.'likes</span>';
}
    if(isset($_SESSION['id']) )
    {
    if(!in_array($_SESSION['id'],$likes_array))
       {
    echo "<a href='".site_url('board/like/'.$item['slug'].'/r/'.$item['id'].'/'.$item['user_id'])
    ."' class='w3-left w3-margin-left w3-text-theme'>Like</a>";
    }
    else{
      echo "<a href='".site_url('board/unlike/'.$item['slug'].'/r/'.$item['id'].'/'.$item['user_id'])
      ."' class='w3-left w3-margin-left w3-text-theme'>Unlike</a>";


    }
    }else{
    //  echo "<a href='".site_url('users/login') ."' class='w3-left w3-margin-left w3-text-theme'>Like</a>";
    echo "<a href='".site_url('board/like/'.$item['slug'].'/r/'.$item['id'].'/'.$item['user_id'])
    ."' class='w3-left w3-margin-left w3-text-theme'>Like</a>";

    }
*/

  echo "<a href='".site_url('board/report/'.$item['slug'].'/r/'.$item['id'])."' class='w3-left w3-margin-left w3-text-theme'> Report </a>";
    echo "<span class='w3-right'>".date( "F j, Y, g:i a",$item["time"])."</span>";
    echo "</div>";
    echo "</div>";


  }
  echo "<a href='".site_url('board/reply/'.$item['slug'])."' class='w3-center w3-text-theme'>( Reply )<hr></a>";

  echo $pagination;
  }else{
     echo "Sorry,No comment yet!";
  }


   ?>
</div>

</div>
