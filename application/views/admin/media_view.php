<div class="w3-twothird"><br>
<a style="margin-left:2%" class="w3-btn w3-blue" href="<?php
echo site_url("media/Upload_image");
?>">Add Image</a>


<div>
<br>




<?php 

if (!empty($items))
{

foreach ($items as $item)
{
echo "<br><div id='imgmedia' class='w3-image w3-card'>";
echo "<img src='".$item['link']."' width='auto' class='w3-image' height='auto'></img>";
echo "<br><input type='text' value='".$item['link']."'></input>";
echo "</div>";

}
}else{
echo "No Media Content";

}


?>






<?php
echo $pagination;
?>

</div>
</div>