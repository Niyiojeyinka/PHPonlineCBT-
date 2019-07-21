
<nav class="w3-sidebar w3-bar-block w3-card" id="mySidebar">
<div class="w3-container w3-theme-d2">
  <span onclick="closeSidebar()" class="w3-button w3-display-topright w3-large">X</span>
  <br>
  <div class="w3-padding w3-center">
  <a href="<?php
  echo site_url('Dashboard_ext/profile');
  ?>"> <img class="w3-circle" src="<?php echo base_url('assets/images/profiles/'
  .$user_details['profile_img']); ?>" alt="avatar" style="width:75%">
</a>  </div>
</div>
<a class="w3-bar-item w3-button w3-border" href="<?php
echo site_url('Dashboard');
?>">  <i  style='margin-right:3%' class="fa fa-home
   w3-large w3-text-theme w3-center"></i>Home</a>

<a class="w3-bar-item w3-button w3-border" href="<?php
echo site_url('Dashboard_ext/Profile');
?>">  <i  style='margin-right:3%' class="fa fa-user
   w3-large w3-text-theme w3-center"></i>Profile</a>

<a class="w3-bar-item w3-button w3-border" href="<?php
echo site_url('Dashboard_ext/subject_comb');
?>">  <i  style='margin-right:3%' class="fa fa-book
   w3-large w3-text-theme w3-center"></i>Choose Subject Combination</a>

  <a class="w3-bar-item w3-button w3-border" href="<?php
  echo site_url('Dashboard_ext/change_phone');
  ?>">  <i  style='margin-right:3%' class="fa fa-phone
     w3-large w3-text-theme w3-center"></i>Change Mobile Number</a>

     <a class="w3-bar-item w3-button w3-border" href="<?php
     echo site_url('Dashboard_ext/change_password');
     ?>">  <i  style='margin-right:3%' class="fa fa-key
        w3-large w3-text-theme w3-center"></i>Change Password</a>

     <a class="w3-bar-item w3-button w3-border" href="<?php
     echo site_url('Dashboard_ext/change_email');
     ?>">  <i  style='margin-right:3%' class="fa fa-at
        w3-large w3-text-theme w3-center"></i>Change Email Address</a>

     <a class="w3-bar-item w3-button w3-border" href="<?php
     echo site_url('Dashboard/purse');
     ?>">  <i  style='margin-right:3%' class="fa fa-get-pocket
        w3-large w3-text-theme w3-center"></i>Pryce Purse</a>

      <a class="w3-bar-item w3-button w3-border" href="<?php
    echo site_url('Dashboard/payment');
    ?>">  <i  style='margin-right:3%' class="fa fa-credit-card
       w3-large w3-text-theme w3-center"></i>Fund Account</a>

       <a class="w3-bar-item w3-button w3-border" href="<?php
      echo site_url('Dashboard/contact_us');
      ?>">  <i  style='margin-right:3%' class="fa fa-envelope
         w3-large w3-text-theme w3-center"></i>Contact Us</a>

      <a class="w3-bar-item w3-button w3-border" href="<?php
      echo site_url('Dashboard/logout');
      ?>">  <i  style='margin-right:3%' class="fa fa-minus
         w3-large w3-text-theme w3-center"></i>Logout</a>
 </nav>
