<script type="text/javascript">
/* base code here*/
const state = {
  question:{},
  user_answers:null,
  current_screen_id:null,
  next_question_index:0
    };


function sendGetRequest(url, success) {
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    xhr.open('GET', url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) success(xhr.responseText);
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.send();
    return xhr;
}

function sendPostRequest(url, data, success) {
    var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
    return xhr;
}


</script>












<!--main screeen-->
<div id="screen" class='w3-container w3-padding'>
 

</div>

<!--loader screen here-->
<div id="hold_loader_screen" style="display:none">

<div class="w3-center w3-padding-jumbo">
<img src="<?= base_url('assets/images/loader.png')?>" class="w3-spin w3-image"/>
</div>

</div>

<!--submit screen here-->
<div id="hold_submit_screen" style="display:none">


<div class="w3-center w3-padding-jumbo">
<span class="w3-xlarge">Your Test has been Submitted Successfully</span>
<br><br>
<span>You can logout now</span>
<i class="fa fa-padlock"></i>
<br><br>
<a class="w3-button w3-indigo w3-text-white w3-large w3-hover-white w3-border w3-border-indigo w3-hover-text-indigo" href='<?php echo site_url('dashboard/logout'); ?>'>Logout</a>
</div>

</div>



<!--Pre test screen here-->
<div id="hold_pre_test_screen" style="display:none">


<div class="w3-center w3-padding-jumbo">
<span class="w3-xlarge">Your Test is schedule to start by <?=date('F j Y,g:ia',$next_test['test_start'])?></span>
<br><br>
<span>You can logout now</span>
<i class="fa fa-padlock"></i>
<br><br>
<a class="w3-button w3-indigo w3-text-white w3-large w3-hover-white w3-border w3-border-indigo w3-hover-text-indigo" href='<?php echo site_url('dashboard/logout'); ?>'>Logout</a>
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
<a class="w3-button w3-indigo w3-text-white w3-large w3-hover-white w3-border w3-border-indigo w3-hover-text-indigo" href='<?php echo site_url('dashboard/logout'); ?>'>Logout</a>
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
<a class="w3-button w3-indigo w3-text-white w3-large w3-hover-white w3-border w3-border-indigo w3-hover-text-indigo" href='<?php echo site_url('dashboard/logout'); ?>'>Logout</a>
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
      console.log("Hey Weldone you must be a dev ,wish you goodluck");

function activateTimer(time_used,time_allowed){


    var t = setInterval(theTimer, 1000);

  function theTimer() {
    
    d = new Date();
    var date = d.getTime(); d = d/1000; d = new Number(d);
    d = d.toFixed();


  var e = (parseInt(time_allowed) + parseInt(d)) - parseInt(time_used);
  

  if(e > d)
  {

    var diff = e - d;

        var hrs = Math.floor(diff/(60 * 60));

        var minSec = (diff/(60 * 60)-hrs)*60;
         var min = Math.floor(minSec);

          var sec = parseInt((minSec-min)*60);
          var tim = hrs+'hrs :'+min+'min :'+sec+'  secs ';
      document.getElementById("time_div").innerHTML = tim;
      //rowcontainers.insertAdjacentHTML('beforeend',newrow);

  }else if (e <= d) {
      //document.getElementById("parent_time").innerHTML = "Time out";
$("#question_container").html("<i class='w3-jumbo w3-text-yellow fa fa-clock-o w3-padding-jumbo'></i><br><span class='w3-large'>Oops,Game Timeout</span><br>");

   //timeOut();
  }

time_used++;

  }}
  </script>
    <div id='time_div' class='w3-large'>

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
        <img class='w3-margin' style='max-width:500px;max-height:550px' data-q-img src=''/>


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
<div id="theinstructions" style="width:98%" class='w3-container w3-tiny'><!----->


</div>
<div style="width:80%" class='w3-container w3-small' id="theimage">
<img onclick="document.getElementById('container0').style.display='block'"
 style='max-width:200px;max-height:250px' data-q-img src=''/>

</div>
<br>

<div style="width:90%" class='w3-container w3-small' id="thecomp"><!----->

<!--comp-->

</div>
<br>
<span id="thequestion"></span><!----->

<br><br>

<div id="theoptions"><!----->

</div>
<br>
<!---options end here--->
<div class="w3-cell-row">
<div  class="w3-cell">
  <button  class='w3-button w3-border w3-left w3-small' name='previous' onclick="controller.actionBtn(state.question.index-1<0?0:state.question.index-1)"  value='prev'>Previous</button>

</div>
<div  class="w3-cell">
  <button  class='w3-button w3-border w3-right w3-small' name='next' onclick="controller.actionBtn(state.question.index+1<state.question.total_no_questions?state.question.index+1:state.question.index)"  value='next'>Next</button>

</div>


</div>
<br>
<div id='thenos'>

        </div>
<br><br>
        <input  class="w3-btn w3-red" type="submit" name="submit" onclick="let u=confirm('Are sure want to Submit?');if(u){controller.submit();}" value="Submit"/>

</div>


<script>
console.log("ALL CRITICAL VALIDATION ARE DONE IN THE BACKEND,THE TIMER IS JUST FOR YOUR NOTICE SAKE");

//document.querySelector("div[id='q_div']").addEventListener('load',function(){ alert("hi")});

var changeScreenTo=(screenId) => {
  document.querySelector(`div[id='screen']`).innerHTML =document.querySelector(`div[id="${screenId}"]`).innerHTML;
  state.current_screen_id = screenId;
}

changeScreenTo('hold_loader_screen');


var buildWholeOptionLook = function(question) {
  //build the option look
//check no of available option and iterate accordingly
let options= ['a','b','c','d'];

if(question['option_e'] != null){
  options.push('e');
}


  
let holdOptionHtml =``;

for (var i = 0;i<options.length ; i++) {
   holdOptionHtml +=`<span class="w3-large">${options[i].toUpperCase()} </span>
<input type="radio" name="option"  value="${options[i]}" class="w3-radio w3-small" ${question.user_answers[question.index] ==options[i]?"checked":""}/> ${question[`option_${options[i]}`]}<br>`; 
}


return holdOptionHtml;

}


var buildQuestionsno = function(question) {
  let holdnos =``;
  // w3-green gray 

for (var i = 0;i<question.total_no_questions ; i++) {
  let color='white';
   if (question.index==i){
     color ="light-gray";
   }else if(question.user_answers[i] != undefined && question.user_answers[i] !="empty"){
    color ="green";

   }

   holdnos +=`<button class='w3-button w3-border w3-${color} w3-small' name='qno' onclick="controller.actionBtn(this.value)"   value='${i}'>${i+1}</button>
`; 
}


return holdnos;

}

var buildWholeQuestionLook = function(question) {
  //build the question look

document.querySelector('div[id="theoptions"]').innerHTML= buildWholeOptionLook(question);
document.querySelector('div[id="theinstructions"]').innerHTML =question.instructions;
document.querySelector('div[id="thecomp"]').innerHTML =question.comp;
document.querySelector('span[id="thequestion"]').innerHTML=`( ${parseInt(question.index)+1} ) ${question.question}`;

if(question.question_img != null){
document.querySelectorAll('img[data-q-img]').forEach((eachImg)=>{
eachImg.setAttribute("src",`<?=base_url()?>/assets/questions/${question.question_img}`);

});

}else{
  document.querySelector('div[id="theimage"]').style.display ="none";
}

document.querySelector('div[id="thenos"]').innerHTML= buildQuestionsno(question);


}

var controller = {
"init":function(){

sendGetRequest('<?=site_url('question/ajax_get_question') ?>',(data)=>{
  if (JSON.parse(data).error == 1){
  //check error 
   changeScreenTo(`hold_${JSON.parse(data).report.toLowerCase()}_screen`);
   return;
}
state.question = JSON.parse(data).question;
state.question.index = parseInt(state.question.index);
changeScreenTo('hold_question_screen');
buildWholeQuestionLook(state.question);
activateTimer(state.question.time_used,state.question.time_allowed)
});

}
,
"processAction":function(next_question_index,submitted) {
  //process no,next,previous btn click
  let userAnswer = this.getUserChosenOption();

  changeScreenTo('hold_loader_screen');
if(submitted){


  let payLoad = {"question_index":state.question.index,"user_answer":userAnswer,"submitted":true};
  sendPostRequest(`<?=site_url('question/ajax_post_question') ?>/${state.next_question_index}`,payLoad,(data)=>{
    if (JSON.parse(data).error == 1){
  //check error 
   changeScreenTo(`hold_${JSON.parse(data).report.toLowerCase()}_screen`);
   return;
}
changeScreenTo('hold_submit_screen');

  });

}else{

  let payLoad = {"question_index":state.question.index,"user_answer":userAnswer};
  sendPostRequest(`<?=site_url('question/ajax_post_question') ?>/${state.next_question_index}`,payLoad,(data)=>{
    if (JSON.parse(data).error == 1){
  //check error 
   changeScreenTo(`hold_${JSON.parse(data).report.toLowerCase()}_screen`);
   return;
}
    state.question = JSON.parse(data).question;
    state.question.index = parseInt(state.question.index);

changeScreenTo('hold_question_screen');
buildWholeQuestionLook(state.question);

  });


}

}
,
"actionBtn":function(btn) {
     
      state.next_question_index = btn;
    
     this.processAction(state.next_question_index,false);
},
"submit":function(){
//submit function here
this.processAction(state.question.index,true);

}
,

"getUserChosenOption" : function(){
let answers =['a','b','c','d','e'];

let optionIndex=null;
 document.querySelectorAll('input[name="option"]').forEach((option,index)=>{
    if( option.checked)
    {
      optionIndex= index;
    }
});
return optionIndex==null?"empty": answers[optionIndex] ;

}

};

controller.init();

</script>