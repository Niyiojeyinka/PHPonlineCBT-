<div class="w3-twothird">


<div class="w3-center">
<b class="w3-xlarge w3-text-blue-grey">Edit Page:</b><br>
<form action="<?php
echo site_url('admin_blog/edit_page/'.$this->uri->segment(3));
?>" method="post">
<span ="w3-text-red"><?php
echo validation_errors(); ?>
</span>
<?php
echo $err_reports;
?>
<br>
<span class="w3-label">Title:</span><br>
<input type="text" class="w3-border-blue-grey" style="width:80%;height: 04%" name="title" value="<?php echo $title; ?>" placeholder="Article title"></input>
<br><br>



<input type="hidden" name="idkey" value="<?php echo $this->uri->segment(3); ?>"></input>



<center>
<span class="w3-label">Contents:</span><br>
<textarea placeholder="Article contents" class="w3-center w3-border-blue-grey" name="contents"  rows="25" cols="52"><?php  echo $content; ?></textarea><br>

<br>
<span class="w3-label">Meta Keywords(separated by comma):</span><br>
<input type="text" class="w3-border-blue-grey" style="width:80%;height: 04%" name="keywords"  value="<?php echo $keywords; ?>" placeholder="Post Meta Keywords"></input>
<br>

<br>
<span class="w3-label">Meta Description:</span><br>
<input type="text" class="w3-border-blue-grey" style="width:80%;height: 04%" name="desc"  value="<?php echo $description; ?>" placeholder="Post Meta Description"></input>
<br>



</center>


<a class="w3-button w3-green" href="<?php echo site_url("media"); ?>">Go to Media</a><br>

<input type="submit" class="w3-btn w3-blue" value="Update" name="submit"></input><br>


</div>
