<div class="w3-container w3-center  w3-margin-top">
  <span class="w3-text-theme w3-large">Pryce's Board</span><br>
  <span class="w3-text-theme w3-small">Statistics</span><br>
  <div class="w3-cell-row w3-small">
    <div class="w3-cell">

Total Post:<?php
echo $num_of_topics;
 ?></div>
<div class="w3-cell w3-margin-left">

Last Post Time:<?php
echo $last_post_time;
 ?></div>
</div>
<div class="w3-cell-row w3-small">

<div class="w3-cell">

Total Comments:<?php
echo $num_of_comments;
 ?></div>
<div class="w3-cell w3-margin-left">

Last Comment Time:<?php
echo $last_comment_time;
 ?></div>
</div>
<div class="w3-cell-row w3-small">

<div class="w3-cell">

Total Pages Requests:<?php
echo $total_views;
 ?></div>
<div class="w3-cell w3-margin-left">

This Page Views:<?php
echo $page_views;
 ?></div>
</div>


<div class="w3-container w3-center  w3-margin-top">

<span class="w3-text-theme w3-small">Categories</span><br>

<?php

foreach ($categories as $key => $value) {

 echo '<a class="w3-text-blue-grey w3-margin" href="'.site_url('board/category/'.$value).'">'.$value.'</a>';

}


 ?>
</div>

<hr>
<a class="w3-text-blue-grey w3-margin" href="<?php echo site_url('board/post_new_topic'); ?>">Post New Topic</a>
<hr>

<div class="w3-container w3-center  w3-margin-top">
<span class="w3-text-theme w3-small">Trending Now</span><br>
<div class="w3-container w3-center  w3-margin-top">


  <?php
  if(!empty($items))
  {
  foreach ($items as  $value) {

  echo '<hr><a class="" href="'.site_url('board/topic/'.$value['slug']).'">';
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
     echo "Sorry,Front Page is empty,Please check others Category!";
  }


   ?>



</div>

</div>

  <hr>
    <div class="w3-container">
      <p class="w3-small">Online Users :<?php
      echo $no_online;
       ?></p>
      <p class="w3-small">Guest:<?php
      echo $no_guests;
       ?></p>

  </div>
  <?php
    if($this->pages_model->get_common("post_content") != NULL)
    {

      foreach ($this->pages_model->get_common("post_content") as  $value) {
        echo $value['content'];


      }

    }
     ?>

</div>
