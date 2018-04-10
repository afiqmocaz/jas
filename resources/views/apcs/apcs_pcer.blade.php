@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <label style="margin-left:5%">Time Remaining for PCER :  &nbsp  </label><label id="try" style=""></label>
            <div class="panel panel-default">
			<h2 style="margin-left:30px">Assignment for Pollution Control Engineering Report</h2>
                <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. An Applicant must complete this assignment within one(1) months from the date of announcement of examination result. <br>
								2. An Applicant who passes the Examination is eligible to submit a Pollution Control Engineering Report (PCER). <br>
								3. The PCER shall demostrate that the applicant has attained the engineering knowledge, understanding, and application in
								 the area of industrial effluent engineering at the level necessary to underpin the technical competencies required for a CIETSC.<br>
								4. An Applicant must prepared the PCER report based on format given below.<br>
								5. Once Applicant have finish up the report, applicant must submit the report for the hardcopy and softcopy.<br>
								6. For the softcopy applicant must upload it in pdf format through this system.<br>
								7. For the hardcopy applicant must submit the report to EiMAS.
	  </div>
      </div>
    </div></br>
 @foreach($assignment as $apcspcer)
	 <object  style="margin-left:30px"width="90%" height="500"data="/uploads/{{$apcspcer->original_filename}}"></object><br><br>
	@endforeach
	<center> 
	<label>Please click on next button to upload the report</label><br>
	<a href="apcsupload" class="btn btn-primary">Next</a></center>
        </div>
				
            </div>
        </div>
    </div>
</div>
<script>
// Set the date we're counting down to

var duedate = new Date("{{Auth::user()->created_at}}");
var timerday = 30;
duedate.setDate(duedate.getDate()+timerday);
var countDownDate2 = duedate.getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate2 - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("try").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("try").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
@endsection
