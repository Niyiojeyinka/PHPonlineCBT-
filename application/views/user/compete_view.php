<div class="w3-container w3-center">
<br>
<div style="max-width:90%;" class="w3-center">

<?php
if(isset($_SESSION['post_submit_compete']))
{
  echo $_SESSION['post_submit_compete'];
}


 ?>

</div>

<div class="w3-container w3-center"><br>
    <span class="w3-text-theme w3-large">Leaders Board</span>
</div>
<hr>


<?php
//on the build
if(!empty($winners))
{
foreach($winners as $winner)
{

  echo '<div class="w3-container">';
  echo '<span class="name w3-block">';
  echo $winner['name'];
  echo '</span>';
  echo '<div class="name w3-block">';
  echo '<img class="" src="'.$winner['winner_badge'].'" />';
  echo '</div>';

  echo '</div>';
}



}



?>

  <hr>
 <?php
//$leader = NULL;
  if(!empty($leaders))
  {


foreach ($leaders as $leader) {


if($leader['standard_score'] == 0)
      {

        continue;
      }


$user =$this->users_model->get_user_by_its_id($leader['user_id']);
  $img_url = base_url('assets/images/profiles/'.$user['profile_img']);
  $link = site_url('users/me/'.$user['username']);
  echo ' <div class="w3-cell-row">';
  echo   ' <div class="w3-cell w3-responsive" style="width:30%">';
  echo "<a href='".$link."'>";
    echo    '<img class="w3-circle w3-tiny" src="'.$img_url.'" style="width:100%;height:30%;">';
    echo  '</a></div>
      <div class="w3-cell w3-container w3-responsive">';
      echo "<a href='".$link."'>";
      echo   '<h3>'.$user['firstname'].' '
      .$user['lastname'].' '.$user['username'].'</h3></a>';
        //echo '<p class="w3-small">'.$user['short_status'].'</p>';
      
  echo '<span class="">Standard Score : '.$leader['standard_score'].'</span>';
  echo '<span class=""> Time Used Percentage :'.$leader['time_used_percentage'].'%</span>';
  echo '<br><span class="w3-small">'.date( "F j, Y, g:i a",$leader['time']).'
  '.date('WS',$leader['time']).'Week</span>';

echo     ' </div>
    </div>
    <hr>';

}
  echo $pagination;
  }else{
    echo '
  <span class="w3-small">Leader Board is empty</span>';
  }

  ?>


</div>