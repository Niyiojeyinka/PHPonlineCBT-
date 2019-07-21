<div class='w3-container w3-center'>
<div class='w3-text-theme w3-large w3-margin-top'><b>Pryce Purse</b></div>


        <?php

        if(isset($_SESSION['err_msg']))
        {

          echo '<div class="w3-text-red">'.$_SESSION["err_msg"].'</div>';
          unset($_SESSION["err_msg"]);
        }
        ?>
<hr>
ACCOUNT BALANCE: <?= "<del>N</del>".$user_details['account_bal'] ?>
<hr>
<div class='w3-text-theme w3-small w3-margin-top'><b>Pryce Free</b></div>
<div class='w3-text-theme w3-tiny w3-margin-top'><b>Features</b></div>
<div class='w3-tiny w3-margin-top'>
Access To  180 Static Questions in total<br>
Use of English :60 Questions<br>
Access To Unlimited Number Of Corrections after Tests<br>
Other three subjects    :40 Questions each

<br>

<span class='w3-text-theme w3-small w3-center w3-margin-right'><b><del>N150.00</del></b>/month</span>
<span class='w3-text-red w3-small w3-center w3-margin-right'><b><del>N</del>0.00</b>/month</span>

</ul></div>


<hr>
<a href="<?= site_url('dashboard/Pryce_upgrade') ?>">
<div class='w3-text-theme w3-small w3-margin-top'><b>Pryce Upgrade</b></div>
<div class='w3-text-theme w3-tiny w3-margin-top'><b>Features</b></div>
<div class='w3-tiny w3-margin-top'>
Access To Unlimited Number Of Random Questions<br>
Access To Unlimited Number Of Corrections after Tests<br>
Use of English :Unlimited Questions<br>
Other three  subjects  :Unlimited Questions each<br>
Ability to Practise on our supported Systems/Platforms<br>
Ability to Participate any of our weekly contest and competition <br>

<span class='w3-text-theme w3-small w3-center w3-margin-right'><b><del>N1500</del></b>/3month</span>
<span class='w3-text-red w3-small w3-center w3-margin-right'><b><del>N</del>299.99</b>/3month</span>




</ul></div></a>

<hr>
<!--
<div class='w3-text-theme w3-small w3-margin-top'><b>Pryce Go</b></div>
<div class='w3-text-theme w3-tiny w3-margin-top'><b>Features</b></div>
<div class='w3-tiny w3-margin-top'>
Access To Unlimited Number Of Offline Questions<br>
Access To Unlimited Number Of Corrections after Tests<br>
Use of English :Unlimited Questions<br>
Other three    :Unlimited Questions each<br>


<span class='w3-text-theme w3-small w3-center w3-margin-right'><b><del>N1500</del></b>/120days</span>
<span class='w3-text-red w3-small w3-center w3-margin-right'><b><del>N</del>800.00</b>/120days</span>




</ul></div>




<hr>
<div class='w3-text-theme w3-small w3-margin-top'><b>Pryce Social</b></div>
<div class='w3-text-theme w3-tiny w3-margin-top'><b>Features</b></div>
<div class='w3-tiny w3-margin-top'>
Access To Unlimited Number Of Questions<br>
Access To Unlimited Number Of Corrections after Tests<br>
Use of English :Unlimited Questions<br>
Other three    :Unlimited Questions each<br>

<span class='w3-text-theme w3-small w3-center w3-margin-right'><b><del>N999.99</del></b>/90days</span>
<span class='w3-text-red w3-small w3-center w3-margin-right'><b><del>N</del>600.00</b>/90days</span>





</ul></div>

-->




</div>
</div>
