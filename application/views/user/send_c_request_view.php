<div class="w3-container w3-card w3-margin-top w3-center w3-padding">
<div class="w3-xlarge w3-text-theme w3-center w3-margin-top"><?php echo $circle_item['name']; ?>

</div>
<div class="w3-large w3-center"><br>
<img    class="w3-circle w3-image" src="<?php echo
 base_url("assets/circles/".$circle_item['profile_img']); ?>" >
</div><br>
<div class="w3-small w3-center">
<?php echo $circle_item['details']; ?><br>
<span class='w3-large'><?php echo count(json_decode($circle_item['members_id'])); ?> Members</span>
</div>
<?php echo form_open('circle/request/'.$slug); ?>
<button name='request' class='w3-button w3-theme w3-margin'<?php if(in_array($_SESSION['id'],json_decode($circle_item['members_id'])))
 {
   echo " disabled";
} ?>><?php
if(in_array($_SESSION['id'],json_decode($circle_item['members_id'])))
 {echo "Aready A Member";
}
elseif(in_array($_SESSION['id'],json_decode($circle_item['requests'])))
 {echo "Request Sent";
}
else{
  echo "Send Join Request";

}  ?><br>
</button>
</form>
</div>
