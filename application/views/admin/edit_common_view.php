<div class="w3-twothird">


<div class="w3-center">
<b class="w3-xlarge w3-text-blue-grey">Edit Common Space:</b><br>
<form action="<?php
echo site_url('admin/edit_common');
?>" method="post">
<span ="w3-text-red"><?php
echo validation_errors(); ?>
</span>

<?php
if(isset($_SESSION['action_status_report']))
{
echo $_SESSION['action_status_report'];
}
?>
<br>


<center>

<input type="hidden" name="id" value="<?php echo $id2; ?>" ></input>


<span class="w3-label">Position:</span><br>
<select name='position'>
  <option value='head_content'>Head Meta Area</option>
   <option value='pre_content'>Before Contents</option>
    <option value='mid_content'>In-between Contents</option>
    <option value='post_content'>After Contents</option>
  </select>



<br><br>




<span class="w3-label">Name:</span><br>
<input type="text" class="w3-border-blue-grey" style="width:30%;" name="name" value="<?php echo $name; ?>" placeholder="Name of Space"></input>
<br><br>




<span class="w3-label">Commom Space Content :</span><br>
<textarea placeholder="Long Description" class="w3-center w3-border-blue-grey" name="content"  rows="16" cols="26"><?php  echo $content; ?></textarea><br>



<input type="submit" class="w3-btn w3-blue" value="Edit Common Content" name="submit"></input><br>
</center>
<br>
<div><?php

if (!empty($items))
{
echo '<table class="w3-table w3-striped">';
echo "<tr><td><b>Name</b></td><td><b>Position</b></td><td><b>Delete</b></td></tr>";
foreach ($items as $item)
{

echo "<tr><td><a href='".site_url("admin/edit_common/".$item['id'])."' >".$item['short_det'].
"</a></td><td><a href='".site_url("admin/edit_common/".$item['id'])."' >".$item['position']."</a></td>
<td class='w3-text-red'><a href='".site_url("admin/delete_common/".$item['id'])."' >Delete</a></td>
</tr>";
echo '<br>';
}
echo '</table>';
}else{
echo "No Common Space found";

}


?>

<br>
<br>
</div>

</div>
