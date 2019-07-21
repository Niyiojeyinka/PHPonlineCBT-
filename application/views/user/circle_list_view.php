<div class="w3-container w3-center">
  <span class="w3-container w3-text-theme w3-xlarge">Circles</span><br>
<?php
if(isset($_SESSION['action_report']))
{
  echo $_SESSION['action_report'];
}
?>
  <div class="w3-container w3-text-theme"><a
    href="<?php echo site_url('circle/create_new_circle'); ?>">Create A Circle</a>

  </div>
  <br>


        <br>

        <?php
if(!empty($circles))
{
echo '<span class="w3-text-theme w3-large">Suggested Circles</span>';

    foreach($circles as $circle)
      {
        $member_array = json_decode($circle['members_id']);
        $admin_array = json_decode($circle['admin_id']);

        $link =site_url('circle/dash/'.$circle['slug']);

        if(!in_array($_SESSION['id'],$member_array))
        {
          $link =site_url('circle/request/'.$circle['slug']);

}

    echo   ' <hr>
    <a href="'.$link.'">
        <div style="" class="w3-cell-row">
          <div class="w3-cell" style="width:15%">';
        echo    '<img height="60" style="max_height:60px;"  class="w3-circle w3-right"
         src="'.base_url("assets/circles/".$circle['profile_img']).'" style="width:100%">';
        echo  '</div>
          <div class="w3-cell w3-container w3-left">';
            echo '<h3>'.$circle['name'].'</h3>';
          echo  '<p class="w3-small">'. get_blog_excerpt($circle['details'],180).'</p>';

if(in_array($_SESSION['id'],$member_array))
{
  echo '<span class="w3-text-theme">Member </span>';
//  echo '<span class="w3-text-theme">Pin to Top </span>';

}
if(in_array($_SESSION['id'],$admin_array))
{
  echo '<span class="w3-text-theme"> Admin</span>';
}


      echo    '</div>
        </div></a>
        <hr>
  ';

     }
}else{

  echo "No suggested Circle Yet";
}

            echo $pagination;

         ?>


</div>
