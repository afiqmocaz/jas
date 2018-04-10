@extends($extendLayout)
@section('content')
@if($examCandidate->status === 'passed')
<center>
    <table class="table table-bordered" style="width:50%">
            <tr>
            <td>
                            <center>

                <h2>You have passed the exam</h2>
                <button class="btn btn-success form-control" onclick="location.href='/applicant_assigment/{{$examCandidate->id}}'">Proceed to Assigment</button>
            </center>
                            </td>
            
            </tr>
</table>
</center>
@else
<script>
     function CountDownTimer(dt, id)
    {
         var server_end = new Date(dt);
        var server_now = <?php echo time(); ?> * 1000;
        var client_now = new Date().getTime();
        var end = server_end - server_now + client_now;

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
//           var nowx = function () {
//     var tmp = null;
//       $.ajax({
//             type: "POST",
//             url: '/tests/getTime',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (response) {
//               tmp=data;
//             }
//         });
//     return tmp;
// }(); 
            
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {
                
                clearInterval(timer);
                
                
               
                
                document.getElementById(id).innerHTML = '<center><button class="btn btn-warning " onclick="goToExam()">START EXAM</button></center>';
                //location.reload();
                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);
            
            

            document.getElementById(id).innerHTML = 'TIME LEFT BEFORE EXAM START :</center><br> ';
            if(days > 0){
               document.getElementById(id).innerHTML += days + 'DAYS ';
            }

        if(days > 0){
            document.getElementById(id).innerHTML += hours + ' HOUR ';
        }
        
        if(minutes > 0){
            document.getElementById(id).innerHTML += minutes + ' MINS ';
        }
        if(seconds > 0){
            document.getElementById(id).innerHTML += seconds + ' SECS</center>';
            }
        }

        timer = setInterval(showRemaining, 1000);
        
        
        
    }
    
    function goToExam(){
  
                var goToExam = "/take_exam/{{$examCandidate->schedule_id}}";
                if("{{$examCandidate->status}}" === 'attended'){
                    goToExam = "/take_exam/{{$examCandidate->schedule_id}}";
                }
                
                location.href = goToExam;
                
    }
    
     CountDownTimer('{{$startExamTime}}', 'countdown');
</script>
<div class="container">
    <div class="row">
        
        
       
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                 <center>
                
                     <div class="alert alert-success"><h2  style="margin-left:30px"><b>Comprehensive Examination</b></h2></div>
               
                 @if($examCandidate->status === "created")
                   <h3 style="margin-left:30px">Please contact admin to verify your attendance</h3>
                 @elseif($examCandidate->status === "failed")
                     <h3 style="margin-left:30px">You failed the exam</h3>
                 @elseif($examCandidate->status === "absence")
                     <h3 style="margin-left:30px">You absence the exam</h3>
             
                 @endif
                
                </center>
                
                   
                    
               
                         
                <h3 style="margin-left:30px"><b><font color="blue"></font><font color="#008B8B"><center> <div id="countdown"></center></h3>
				<div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Online examination will be set-up at the Department of Environment Head Quarters or EiMAS. <br>
								2. The date for the examination will be announced by the secretariat. <br>
								3. Applicant is required to make yourselves available for the examination. <br>
                                4. Applicant have to click on the Confirm button to make the confirmation for the examination. <br>
								5. Once Applicant has submitted the confirmation, applicant must wait on that date to seat for the examination.<br>
								6. The applicant will be consider as failed if do not attend the examination.
								</div>
      </div>
    </div><br><br>
	<h5 style="margin-left:15%;">The confirmation date for the Comprehensive Examination as below:</h5>
	@if(!empty($examSchedule))				
					 <table>
					<tr></tr>
					<table id="formABC" class="table" style="margin-left:15%;width:70%" method="POST">
					
					<tr>
					<th style="width:0.2%">Date:</th>
					<td style="width:1%">{{ date('d/m/Y', strtotime($examSchedule->date))}}</td>
					</tr>
					
					<tr>
					<th style="width:0.2%">Time:</th>
					
					<td style="width:1%">{{ date('g:i A', strtotime($examSchedule->start))}} - {{ date('g:i A', strtotime($examSchedule->end))}}</td>
					</tr>
					<tr>
					<th style="width:0.2%">Venue:</th>
					<td style="width:1%"><?php echo $examSchedule->address?></td>
					</tr>
					
					</table>
					<div>
					<label style="color:red;margin-left:15%;">**Candidates must appear at the examination room at least twenty minutes before the commencement of the examination.</label>
					</div>
          @else
          <div align="center"><b>  Please choose exam schedule to take exam</b> </div>
          @endif
	<!-- <object  style="margin-left:30px"width="90%" height="500"data="/uploads/13_TER.pdf">
</object><br><br> -->

   <!-- <button id="singlebutton" name="singlebutton" class="btn btn-primary center-block"disabled="disabled">Start Exam</button>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script>
$(document).ready(function(){
    $("button").click(function(){
        $("h5").text("The Confirmation date of the examination as below:");
         
    });
});
</script-->


<!--<script>
$(document).ready(function() {
  $("#show-button").click(function () {
   $("#hide-button").hide()
   $("#show-button").hide()
  });
  $("#hide-button").click(function () {
   $("#show-button").show()
   $("#hide-button").hide()
  });
 });

</script>-->


            </div>
        </div><br><br>
		
</div>
  </div >
				
            </div>
        </div>
    </div>
</div>
@endif
@endsection
