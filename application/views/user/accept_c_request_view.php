<div class="w3-container w3-center">
  <span class="w3-text-theme w3-large">Circle Requests</span>
<hr>
<?php

if(!empty($requests))
{
for($i=0;$i <=count($requests)-1;$i++)
{


    $img_url = base_url('assets/images/profiles/'.$requests[$i]['profile_img']);
    $link = site_url('users/me/'.$requests[$i]['username']);
    echo ' <div class="w3-container w3-cell-row">';
    echo   ' <div class="w3-cell" style="width:30%">';
    echo "<a href='".$link."'>";
      echo    '<img class="w3-circle w3-image w3-small" src="'.$img_url.'" style="width:100%">';
      echo  '</a></div>
        <div class="w3-cell w3-container">';
        echo "<a href='".$link."'>";
        echo   '<h3>'.$requests[$i]['firstname'].' '
        .$requests[$i]['lastname'].' '.$requests[$i]['username'].'</h3></a>';
          echo '<p>'.$requests[$i]['short_status'].'</p>';
          echo '<a class="w3-button w3-green" href="'.site_url('circle/request_action/'.$this->uri->segment(3).'/accept/'.
          $requests[$i]['id']).'">Accept </a> ';
          echo '<a class="w3-button w3-red" href="'.site_url('circle/request_action/'.$this->uri->segment(3).'/decline/'.
          $requests[$i]['id']).'"> Decline</a>';

  echo     ' </div>
      </div>
      <hr>';

}
}else{
  echo '
No Request Available';
}

?>
</div>
