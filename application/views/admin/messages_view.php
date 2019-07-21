<div class="w3-twothird">


<div class="w3-center">

<?php
if(isset($err_reports)){
echo $err_reports;
}
?>
<b class="w3-center w3-text-grey w3-xlarge">Recieved Messages</b><br>
<ul class="w3-text-grey">
<?php
echo "<br>";
if (!empty($items))
{

foreach ($items as $item)
{
$border_colour = NULL;

if ($item['status'] == "unread")
{

	$border_colour = "w3-border-blue";


}

echo "<div style='width:90%' class='w3-container w3-border ".$border_colour." w3-center'>
<span class=''><a href='".site_url()."/admin/view_message/".$item['id']."'><b>".$item['title']."</b></a>
<br>By <b>".$item['name']."</b> ". date( "F j, Y, g:i a",$item['time']);





echo "</span></div><br>";

}
}else{
echo "No Contact Messages yet";

}


?>


</ul>




<?php echo $pagination; ?>
</div>
