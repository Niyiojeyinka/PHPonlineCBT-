<div class="w3-twothird w3-center">
  <div class="w3-text-xxlarge w3-text-blue w3-margin"><b>Users Statistics</b></div>

  <div class="w3-row w3-center w3-small">
    <div class="w3-half">
Users Accounts:<?php echo "<span class='w3-text-green'>".$num_of_users."</span>"; ?><br>
New Accounts in the last 24hrs:<?php echo $num_of_users_24; ?><br>
No Free Accounts:<?php echo $num_of_free_users; ?><br>
No Premium Accounts:<?php echo $num_of_premium_users; ?><br>
Page Requests:<?php echo $total_views; ?><br>


    </div>
    <div class="w3-half">
      Online Users now:<?php
      if($no_online > 1 )
    {
    echo $no_online-1;

  }else{

echo $no_online;
  }
       ?><br>
     Users Online in the last 24hrs:<?php echo $num_of_users_online_24; ?><br>
Users Online in the last 30days:<?php echo $num_of_users_online_30d; ?><br>
Users Upgraded in the last 24hrs:<?php echo $num_of_users_up_24; ?><br>
Users Upgraded in the last 30days:<?php echo $num_of_users_up_30d; ?><br>


    </div>




  </div>

  <div class="w3-text-xxlarge w3-text-blue w3-margin"><b>Questions
     Statistics</b></div>


       <div class="w3-row w3-center w3-small">

         <div class="">
           Total questions:<?php echo $num_of_total_questions; ?><br>
           New Question in the last 24hrs:<?php echo $num_of_questions_24; ?><br>
           Total Free Questions:<?php echo $num_of_free_questions; ?><br>
           Total Premium Questions:<?php echo $num_of_premium_questions; ?><br>
           Subjects:22<br>



         </div>

       </div>



         <div class="w3-text-xxlarge w3-text-blue w3-margin"><b>Board
            Statistics</b></div>


              <div class="w3-row w3-center w3-small">
                <div class="w3-half">
            Board Posts:<?php echo $num_of_topics; ?><br>
            Board Replies:<?php
            echo $num_of_comments;
             ?><br>
            Online Guests now:<?php
      echo $no_guests;
       ?><br>


                </div>
                <div class="w3-half">
                  Online Guests in the last 24hrs:<?php echo $num_of_guests_24;
                   ?><br>
                    New Board Post in the last 24hrs:<?php echo $num_of_topics_24;
                     ?><br>
                   Last Post Time:<?php echo $last_post_time; ?><br>



                </div>

              </div>
              <div class="w3-text-xxlarge w3-text-blue w3-margin"><b>Circles
                 Statistics</b></div>


                   <div class="w3-row w3-center w3-small">

                     <div class="">
           Total Circles:<?php echo $num_of_circles; ?><br>

           Total Circle Messages:<?php echo $num_of_messages; ?><br>


         No of Circles created in the last 24hrs:<?php echo $num_of_circles_online_24; ?><br>
         No of Circles Messages  in the last 24hrs:<?php echo $num_of_messages_online_24; ?><br>




                     </div>

                   </div>





        </div>
