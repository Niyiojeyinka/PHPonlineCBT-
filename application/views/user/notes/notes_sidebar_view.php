<div class="w3-third w3-center w3-mobile">
	<span class="w3-large w3-text-theme">Table Of Contents</span>
<div>
<?php

if(!empty($topiclists))
{
foreach ($topiclists as $topicitem) {
echo "<a href='".site_url("notes/view/".$this->uri->segment(3)."/"
	.$topicitem['id'])."'>".$topicitem['title']."</a><br>";

}


}else{

echo "No Topic Found";	
}

?>	




</div>
	
</div></div>
