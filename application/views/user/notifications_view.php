<div class="w3-center">

<span class="w3-text-theme w3-large">Notifications</span><br>
<div class="">
<?php
if(!empty($notifications))
{
foreach ($notifications as $not) {
  $design = 'w3-margin';
  if($not['status'] == 'unread')
  {
    $design = 'w3-light-grey w3-padding w3-round';
  }
  $link = NULL;
  if($not['type'] == 'circle_post')
  {
  $get_it =  $total_posts  -$not['post_position'];
    $link = site_url('circle/dash/'.$not['type_id']."/".$get_it);
  }elseif ($not['type'] == 'circle_request') {
    $link = site_url('circle/show_requests/'.$not['type_id']);


  }elseif ($not['type'] == 'circle_accept') {
    $link = site_url('circle/dash/'.$not['type_id']);


  }elseif ($not['type'] == 'circle_add') {
    $link = site_url('circle/dash/'.$not['type_id']);

    $not['sender_username'] = $this->users_model->
    get_user_by_its_id($not['sender_id'])['username'];

  }
  elseif ($not['type'] == 'circle_decline') {
    $link = site_url('circle/request/'.$not['type_id']);


  }
  elseif ($not['type'] == 'board_like_post') {
    $link = site_url('board/topic/'.$not['type_id']);
$not['sender_username'] = $this->users_model->
get_user_by_its_id($not['sender_id'])['username'];

}elseif ($not['type'] == 'board_like_reply') {
      $link = site_url('board/topic/'.$not['type_id']);
  $not['sender_username'] = $this->users_model->
  get_user_by_its_id($not['sender_id'])['username'];

}elseif ($not['type'] == 'board_post_reply') {
          $link = site_url('board/topic/'.$not['type_id']);
      $not['sender_username'] = $this->users_model->
      get_user_by_its_id($not['sender_id'])['username'];

        }



  echo "<a href='".$link."'>";
echo '<div class="w3-container w3-small '.$design.'">';
echo $not['sender_username']." ";
echo $not['contents']." ";
if($not['type'] == "circle_post")
{
echo " in the Circle ";
echo ucfirst(str_replace("-"," ",$not['type_id']));
}elseif ($not['type'] == 'circle_request' || $not['type'] == 'circle_accept') {
  echo ucfirst(str_replace("-"," ",$not['type_id']));

}elseif ($not['type'] == 'board_like_reply') {
  echo " in the Board Post ";
  echo ucfirst(str_replace("-"," ",$not['slug']));

}
elseif ($not['type'] == 'board_like_post' || $not['type'] == 'board_post_reply'
) {
  echo " in the Board Post ";
  echo ucfirst(str_replace("-"," ",$not['type_id']));

}
elseif ($not['type'] == 'circle_add') {
  echo ucfirst(str_replace("-"," ",$not['type_id']));

}





echo '</div></a>';
}
}else{

  echo "<br>No Notifications yet";
}
echo "<br>".$pagination;
?>
</div>
</div>
