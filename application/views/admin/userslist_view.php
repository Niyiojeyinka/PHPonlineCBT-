<div class="w3-twothird">


<div class="w3-center">

<b class="w3-center w3-text-grey w3-xlarge">Users</b><br>

<?php

if (!empty($items))
{

foreach ($items as $item)
{


  echo "<a href='".site_url('users/me/'.$item['username'])."'>";
echo "<div class='w3-container w3-border w3-padding w3-margin'>";
echo $item['firstname']." ".$item['lastname']." ".$item['username']."<br>";
echo "<span class='w3-small'>Last Seen:";
echo " ".date( "F j, Y, g:i a",$item["lastlog"]);
echo "</span>";
echo "</div>";
echo "</a>";
}
}else{
echo "No Topic entries";

}


?>


</ul>
<?php echo $pagination; ?>
</div>
