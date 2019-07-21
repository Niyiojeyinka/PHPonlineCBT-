<div class="w3-container w3-center">
  <span class="w3-text-theme w3-large">Circle Members</span>
<hr>
<?php

if(!empty($members))
{
for($i=0;$i <=count($members)-1;$i++)
{


    $img_url = base_url('assets/images/profiles/'.$members[$i]['profile_img']);
    $link = site_url('users/me/'.$members[$i]['username']);
    echo ' <div class="w3-container w3-cell-row">';
    echo   ' <div class="w3-cell" style="width:30%">';
    echo "<a href='".$link."'>";
      echo    '<img class="w3-circle w3-tiny" src="'.$img_url.'" style="width:100%">';
      echo  '</a></div>
        <div class="w3-cell w3-container">';
        echo "<a href='".$link."'>";
        echo   '<h3>'.$members[$i]['firstname'].' '
        .$members[$i]['lastname'].' '.$members[$i]['username'].'</h3></a>';
          echo '<p>'.$members[$i]['short_status'].'</p>';
        //  echo '<a class="w3-button w3-green" href="'.site_url('circle/request_action/'.$this->uri->segment(3).'/accept/'.
        //  $members[$i]['id']).'">Accept </a> ';
        //  echo '<a class="w3-button w3-red" href="'.site_url('circle/request_action/'.$this->uri->segment(3).'/decline/'.
        //  $members[$i]['id']).'"> Decline</a>';

  echo     ' </div>
      </div>
      <hr>';

}
echo $pagination;
}else{
  echo '
No member Available';
}

?>
</div>
