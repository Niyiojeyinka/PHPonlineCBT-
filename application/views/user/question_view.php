<div id="q_div" class='w3-container'>
  <div class="w3-cell-row">
  <div class="w3-cell">
  <button onclick="document.getElementById('containerc').style.display='block'" class="w3-button w3-hover-indigo w3-border">Open Calculator</button>
  </div>

  <div class="w3-cell">
    <script>
    var t = setInterval(theCBTTimer, 1000);

  function theCBTTimer() {
    //var p = new Date();
    //document.getElementById("time_div").innerHTML = p.toLocaleTimeString();
    d = new Date();
    var date = d.getTime(); d = d/1000; d = new Number(d);
    d = d.toFixed();
  var e = <?php echo $_SESSION['start_time'] + ($_SESSION['running'] * 60); ?>;


  if(e > d)
  {
  if(<?php echo $_SESSION['running'];?> != 120)
  {
         var diff = e - d;
         var min = Math.floor(diff/60);
          var sec = (diff % 60);
          var tim = min+':'+sec+'   ';
      document.getElementById("time_div").innerHTML = tim;
    }else{


      var diff = e - d;
      var hour = Math.floor(diff/3600);
       var min = Math.floor((diff%3600)/60);
       var sec = (diff%3600)%60;

       var tim =hour+'hr:'+ min+'min:'+sec+'sec ';
      // var tim =hour+'h:'+ min+'m:'+sec+'s';

   document.getElementById("time_div").innerHTML = tim;

    }
  }else if (e <= d) {
    //submit
    document.getElementById("q_div").style.display = "none";
  window.location.assign('<?php echo site_url('question/submit'); ?>');
  }


  }
  </script>
    <div id='time_div'>

  </div>
  </div>
  </div>

 <!-- modal div -->

      <div id="containerc" style='max-width:600px;' class="w3-modal">
       <div class="w3-modal-content w3-theme">
         <header class="w3-container w3-center"><h2>CBT's Calculator</h2>
           <span onclick="document.getElementById('containerc').style.display='none'"
           class="w3-button w3-display-topright">&times;</span>

         </header>
<div class="w3-center w3-white">
  <br>
                    <?php

                               require("application/views/user/calculator.html");
                                ?>
<br>
</div>

             <footer class="w3-container w3-theme">
               <p>&copy; CBT <?php
              if (date('y') == 16)
              {
              echo "20".date('y');
              }else{
              echo "2016 - 20".date('y');
              }
              ?></p>
             </footer>



        </div>

     </div>
    <!--modal ends here-->


<!-- modal div -->

 <div id="container0" style='max-width:600px;display:none;' class="w3-modal">
  <div class="w3-modal-content w3-theme">
    <header class="w3-container w3-center"><h2>CBT</h2>
      <span onclick="document.getElementById('container0').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>

    </header>

        <div class="w3-container w3-white w3-center">
       

        </div>

        <footer class="w3-container w3-center w3-theme">
          <p>&copy; CBT <?php
         if (date('y') == 18)
         {
         echo "20".date('y');
         }else{
         echo "2018 - 20".date('y');
         }
         ?></p>
        </footer>



   </div>

</div>
<!--modal ends here-->







</div>
