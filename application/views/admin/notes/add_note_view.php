<div class="w3-twothird w3-center">
<span class="w3-text-xxxlarge w3-text-blue-grey w3-margin"><b>Add Note</b></span><br><br>



<?= form_open("admin/add_note") ?>
<span class="w3-text-red"><?= validation_errors() ?></span><br>

<input type="text" name="topic" class="w3-padding" placeholder="Note Topic"/><br>



<span class="w3-label">Subject:</span><br>
<select name="subject" class="w3-padding">

<?php




    if (!empty($items))
   {
    foreach ($items as $item)  {
if($item['name'] == set_value("subject"))
{
  echo "<Option  value='".$item['name']."'selected>".$item['name']."</option>";


}else{
echo "<Option  value='".$item['name']."'>".$item['name']."</option>";
}
}
}else{

echo 'No Subject Entry';
}



?>
</select>







<script type="text/javascript" src="<?= base_url('assets/js/nicEdit.js') ?>"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	
	new nicEditor({iconsPath : '/nicEditorIcons.gif'}).panelInstance('contents');
	
});
</script>



<center>
<span class="w3-label">Contents:</span><br>
<textarea id="contents" placeholder="Article contents" class="w3-center w3-border-blue-grey" name="contents"  value="<?php  echo set_value('contents'); ?>" rows="25" cols="52"></textarea>

<input type="submit" name="submit" value="Add Topic" class="w3-margin w3-btn w3-blue" />




</div>