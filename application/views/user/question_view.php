<!--main screeen-->
<div id="screen" class='w3-container w3-padding'>
 
<div class="w3-center w3-padding-jumbo">
<img src="<?= base_url('assets/images/loader.png')?>" class="w3-spin w3-image"/>
</div>
</div>




<!--submit screen here-->
<div id="hold_submit_screen" style="display:none">


<div class="w3-center w3-padding-jumbo">
<span class="w3-xlarge">Your Test has been Submitted Successfully</span>
<br>
<span>You can logout now</span>
<i class="fa fa-padlock"></i>
<br><br>
<a class="w3-button w3-indigo w3-text-white w3-large" href='<?php echo site_url('dashboard/logout'); ?>'>Logout</a>
</div>

</div>



<!--Pre test screen here-->
<div id="hold_pre_test_screen" style="display:none">


<div class="w3-center w3-padding-jumbo">
<span class="w3-xlarge">Your Test is schedule to start by <?=date('F j Y,g:ia',$next_test['test_start'])?></span>
<br>
<span>You can logout now</span>
<i class="fa fa-padlock"></i>
<br><br>
<a class="w3-button w3-indigo w3-text-white w3-large" href='<?php echo site_url('dashboard/logout'); ?>'>Logout</a>
</div>


</div>

<!--Post-test screen here-->
<div id="hold_post_test_screen" style="display:none">


<div class="w3-center w3-padding-jumbo">
<span class="w3-xlarge">OOPs Sorry ,You missed the Test</span>
<br>
<span class="w3-large">Your Test is schedule to start by <?=date('F j Y,g:ia',$next_test['test_start'])?>
 and ended at <?=date('F j Y,g:ia',$next_test['test_end'])?>
</span>
<br>
<span>You can logout now</span>
<i class="fa fa-padlock"></i>
<br><br>
<a class="w3-button w3-indigo w3-text-white w3-large" href='<?php echo site_url('dashboard/logout'); ?>'>Logout</a>
</div>


</div>

<!--time up screen here-->
<div id="hold_time_up_screen" style="display:none">


<div class="w3-center w3-padding-jumbo">
<span class="w3-xlarge">OOPS your time is up and your test has been submitted</span>
<br>
<span>You can logout now</span>
<i class="fa fa-padlock"></i>
<br><br>
<a class="w3-button w3-indigo w3-text-white w3-large" href='<?php echo site_url('dashboard/logout'); ?>'>Logout</a>
</div>


</div>


<!--question here--->

<div id="hold_question_screen" style="display:none">




 <div class="w3-cell-row">
  <div class="w3-cell">
  <button onClick="document.getElementById('containerc').style.display='block'" class="w3-button w3-hover-indigo w3-border">Open Calculator</button>
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
        <img class='w3-margin' style='max-width:500px;max-height:550px' src='<?=base_url("")?>/assets/questions/physics32.png'/>


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






<br>
<div style="width:98%" class='w3-container w3-tiny'>


Use the Diagram below to answer the following question correctly
</div>
<div style="width:80%" class='w3-container w3-small'>
<img onclick="document.getElementById('container0').style.display='block'"
 style='max-width:200px;max-height:250px' src='<?=base_url()?>/assets/questions/physics32.png'/>

</div>

<div style="width:90%" class='w3-container w3-small'>

<!--comp-->

</div>
<br>
( 2 ) Calculate the current (I) that flows through the closed Circuit ?

<br><br><span class="w3-large">A </span>
<input type="radio" name="option"  value="a" class="w3-radio w3-small" /> 3.9 Amperes<br>

<span class="w3-large">B </span>
<input type="radio" name="option"  value="a" class="w3-radio w3-small" /> 1.9 Amperes<br>

<span class="w3-large">C </span>
<input type="radio" name="option"  value="a" class="w3-radio w3-small" /> 0.9 Amperes<br>

<span class="w3-large">D </span>
<input type="radio" name="option"  value="a" class="w3-radio w3-small"  checked/> None of the Above<br>
<br>
<!---options end here--->
<div class="w3-cell-row">
<div  class="w3-cell">
  <button  class='w3-button w3-border w3-left' name='previous'   value='prev'>Previous</button>

</div>
<div  class="w3-cell">
  <button  class='w3-button w3-border w3-right' name='next'   value='next'>Next</button>

</div>


</div>
<br>
<button class='w3-button w3-border w3-green' name='qno'   value='1'>1</button>

<button class='w3-button w3-border w3-gray' name='qno'   value='1'>2</button>
<button class='w3-button w3-border' name='qno'   value='1'>3</button>

<button class='w3-button w3-border' name='qno'   value='1'>4</button>
<br><br>
<input  class="w3-btn w3-red" type="submit" name="submit" value="Submit"/>

</div>


<script>
console.log("ALL CRITICAL VALIDATION ARE DONE IN THE BACKEND,THE TIMER IS JUST FOR YOUR NOTICE SAKE");

//document.querySelector("div[id='q_div']").addEventListener('load',function(){ alert("hi")});

var changeScreenTo=(screenId) => {
  document.querySelector(`div[id='screen']`).innerHTML =document.querySelector(`div[id="${screenId}"]`).innerHTML;
}


</script>