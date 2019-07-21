<div class="w3-twothird w3-center">
<div class="w3-text-xxlarge w3-text-blue w3-margin"><b>Subject
   Statistics</b></div>
<!--table subjects and no free and paid questions-->
<div>
<table class="w3-table w3-striped w3-small">
<tr>
<td>Subject</td>
<td>Total</td>
<td>Free</td>
<td>Premium</td>


</tr>
<?php
foreach ($subjects as $subject) {
echo "<tr><td>";
echo $subject['name'];
echo "</td><td>";
echo count($this->dashboard_model->get_subject_question($subject['name'],NULL));
echo "</td><td>";
echo count($this->dashboard_model->get_subject_question($subject['name'],'free'));
echo "</td><td>";
echo count($this->dashboard_model->get_subject_question($subject['name'],'premium'));
echo "</td></tr>";

}



?>


</table>
<div class="w3-container"><br>

Total Questions:<?php echo count($this->dashboard_model->get_subjects(NULL)); ?>
 Total Free Questions:<?php echo count($this->dashboard_model->get_subjects('free'));
  ?> Total Premium Questions: <?php echo count($this->dashboard_model->get_subjects(
    'premium'
  )); ?>



<br><br>
</div>
</div>
