<div class="w3-container w3-center">
  <div class="w3-bar">
<a class="w3-bar-item w3-text-theme" href="<?php echo site_url("circle/add_member/".$circle_item['slug']); ?>">Add Member</a>
<a class="w3-bar-item w3-text-theme"  href="<?php echo site_url("circle/show_requests/".$circle_item['slug']); ?>">Requests
<?php
if(count(json_decode($circle_item['requests'])))
{
  echo" <span class='w3-text-red'>".count(json_decode($circle_item['requests']))."</span>";
}
?>
</a>
<a  class="w3-bar-item w3-text-theme" href="<?php echo site_url("circle/members/".$circle_item['slug']); ?>">Members<a>
  <a class="w3-bar-item w3-text-theme"  href="<?php echo site_url("circle/exit/".$circle_item['slug']); ?>">Exit Circle<a>
  </div>
   <div class="w3-large w3-center"><?php echo $circle_item['name']; ?>

</div>
<div class="w3-small w3-center"><?php echo $circle_item['details']; ?>

</div><br>
<div>
  <?php
if(isset($_SESSION['action_report']))
{
  echo $_SESSION['action_report'];
}

   ?>
<?php echo form_open("circle/dash/".$slug); ?>
  <textarea  class="w3-center
  w3-border-blue-grey w3-small  w3-round-xlarge" name="post"    rows="8" cols="20">
  <?php  echo set_value('post'); ?></textarea><input type="submit" class="w3-btn
   w3-theme w3-round-jumbo" value="Send" name="submit"></input><br>
</form>
<hr>

</div>

  <div class="w3-container w3-medium">
    <!--group posts here-->
    <?php
if(!empty($posts))
{

  foreach($posts as $post)
  {
echo "<div style='width:85%;' class='w3-container w3-padding w3-card-4 w3-round-xlarge'>";
echo "<b class='w3-medium w3-left w3-margin-left w3-text-theme w3-small'>".$post['username']."</b><br>";

$exploded =explode(" ",trim($post['contents']));
$message ='';

foreach ($exploded as $value)
{

  if($value[0] ==="@")

      {
      //  var_dump(trim($value));
      //  echo "<br>";

      $link = "<a class='w3-medium w3-text-theme' href='".site_url('users/me/'.$value)."'>".$value."</a>";


            $message .=' '.$link;
          }else{

            $message .=' '.$value;

  }





}
echo "<div class='w3-small'>".$message."</div>";

echo "</div><br>";


}
}
else{

  echo "<span class='w3-small'>No Message Entry</span>";
}
echo $pagination;



     ?>




  </div>



</div>
