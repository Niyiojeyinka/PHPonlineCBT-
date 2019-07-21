 <div class="w3-container">
<div class=''>
<h1>Whats Pryce?</h1>
<p>Pryce is a Platform that help Students across the
 country to Prepare and Practice  Jamb CBT UTME
  Past Questions and Answers Online and even offline
   Anywhere,Anytime.Here are steps Successful  students who
    used our platform took. </p>


</div>


<hr>
<div class="w3-cell-row">
  <div class="w3-cell" style="width:30%">
     <i  style='margin-left:64px' class="fa fa-user-plus
      w3-jumbo w3-text-theme w3-center"></i>
  </div>

  <a href='<?php echo site_url('users/register'); ?>'><div class="w3-cell w3-container">
    <h3>Registration</h3>
    <p>They registered on Pryce with just their Name and
      Mobile Number after which they logged into their
      private account to learn.</p>
  </div></a>
</div>
<hr>

<hr>
<div class="w3-cell-row">
  <div class="w3-cell" style="width:30%">
     <i  style='margin-left:64px' class="fa fa-book
      w3-jumbo w3-text-theme w3-center"></i>
  </div>
  <div class="w3-cell w3-container">
    <h3>Notes</h3>
    <p>They read available notes  and tutorial on their respective
        subjects in the Notes Section of Pryce.</p>
  </div>
</div>
<hr>


<hr>
<div class="w3-cell-row">
  <div class="w3-cell" style="width:30%">
     <i  style='margin-left:64px' class="fa fa-desktop
      w3-jumbo w3-text-theme w3-center"></i>
  </div>
  <div class="w3-cell w3-container">
    <h3>Practice CBT Questions</h3>
    <p> They Practice both timed and Untimed CBT Questions
      and Answers on Pryce.</p>
  </div>
</div>
<hr>

<hr>
<div class="w3-cell-row">
  <div class="w3-cell" style="width:30%">
     <i  style='margin-left:64px' class="fa fa-group
      w3-jumbo w3-text-theme w3-center"></i>
  </div>
  <div class="w3-cell w3-container">
    <h3>Pryce's Circle</h3>
    <p> They took advantage of Pryce's Circle,News,Forum to explain and learn
       from each other and also to get neccessary information to succeed in
       their Examination.</p>
  </div>
</div>
<hr>
<div>
<center>  <div style='width:80%' class='w3-center'>
you also can join those Successful students today by
<a class='w3-button w3-indigo' href='<?php echo site_url('users/register'); ?>'>Clicking here</a>
<br>Our mission is to have helped above  2.5 million Students succeed in their
various Examination before 2020

<br><i class='fa fa-check w3-jumbo w3-text-theme w3-center'></i>
</div></center>



<div class='w3-container  w3-card-4 w3-panel w3-leftbar w3-rightbar w3-border-indigo'>
  <div class="w3-container w3-center" style="">
<span class='w3-xxlarge w3-text-theme'><b>Pryce GO</b></span>
    <br>
Be the first to know and also first to get it whenever our offline <i class='fa fa-android
 w3-medium w3-text-green'></i>Andriod application  is ready
</div><br>
 <div>
   <form class='w3-center' method='POST' action='<?php echo site_url('waitlist'); ?>'>
<h4 class='w3-text-theme'><b>Wait List</b></h4>

<?php
if(isset($_SESSION['err_msg']))
{

  echo $_SESSION['err_msg'];
}



 ?>
 <div class="w3-text-red"><?php echo validation_errors(); ?></div>
<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-user
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='text' name='name' placeholder='full name'/>
</div>


<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-envelope
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='email' name='email' placeholder='Email'/>
</div>


<div class='w3-row'>
    <i  style='margin-right:3%' class="fa fa-phone
     w3-large w3-text-theme w3-center"></i>
     <input class='w3-center' type='tel' name='phone' placeholder='Phone Number'/>
</div>
<input class='w3-center w3-button w3-theme w3-margin-top w3-margin-bottom' type='submit' name='submit' value='Submit'/>



</div>
   </form>
 </div>



</div>
</div>
