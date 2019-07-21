<div class="w3-container w3-center">
<span class="w3-xxlarge w3-serif w3-text-theme">Read Notes</span><br>


<div class="w3-container">
	
<?php



for ($i=0; $i < count($subjects) ; $i++) { 

echo "<a href='".site_url('notes/view/'.str_replace(" ", "_", $subjects[$i]['name']))."'>";
echo "<div style='display:inline-block' class='w3-padding-large w3-margin w3-border'>";
echo "<i class='fa fa-book w3-xxlarge w3-text-theme'></i><br>";
echo "<span class=''>".$subjects[$i]['name']."</span>";
echo "</div>";





}




/*
foreach ($subjects as $value) {


}*/
?>





</div>










</div>