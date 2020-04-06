<div class="w3-container w3-center">
<span class="w3-text-theme w3-large"><a href='<?php echo site_url('board'); ?>'>CBT's Board</a></span><br>
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


<hr>
<div class="w3-container w3-center">

<a class="w3-text-blue-grey w3-margin" href="<?php echo site_url('board/post_new_topic'); ?>">Post New Topic</a>
</div>
<hr>

 <?php
 if($this->pages_model->get_common("pre_content") != NULL)
 {

   foreach ($this->pages_model->get_common("pre_content") as  $value) {
     echo $value['content'];


   }

 }
  ?>

<hr>
