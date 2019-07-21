<div class="w3-twothird">


<div class="w3-center">

<?php
if(isset($err_reports)){
echo $err_reports;
}
?>
<b class="w3-center w3-text-grey w3-xlarge"><?php echo $item['title']; ?></b><br>


<div class="" style="">
Sender:<?php echo $item['name']; ?><br>
Email:<?php echo $item['email']; ?><br>
Phone:<?php echo $item['phone']; ?><br>
Login:<?php echo ucfirst($item['logged_in']); ?><br>
Time:<?php echo date( "F j, Y, g:i a",$item['time']); ?><br>

Message:<?php echo $item['message']; ?><br>





</div>
</div>
</div>
