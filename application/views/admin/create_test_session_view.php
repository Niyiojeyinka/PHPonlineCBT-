<div class="w3-container">

<span>Create a new test session</span>

<br></br>
<?=form_open_multipart("admin/create_test_session") ?>
<label for="test_name" class="w3-label">Test Name / Subject</label><br>
<input type='text' name='test_name' class='w3-padding'/>
<br>
<label for="test_start" class="w3-label">Time Start</label><br>
<input type='text' name='test_start' class='w3-padding'/>
<br>
<label for="test_end" class="w3-label">Time End</label><br>
<input type='text' name='test_end' class='w3-padding'/>
<br>
<label for="time_allowed" class="w3-label">Time Allowed</label><br>
<input type='text' name='time_allowed' class='w3-padding'/>
<br>

<label for="question_file" class="w3-label">Question File</label><br>
<input type='file' name='question_file' class='w3-padding'/>
<br>
<input type="submit" name="submit" class="w3-button w3-blue w3-text-white w3-hover-white w3-hover-text-blue w3-border w3-border-blue w3-margin">

</div>