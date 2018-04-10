@extends('layouts.appiets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			 <h2  style="margin-left:30px">Comprehensive Examination</h2>
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
	<h5 style="margin-left:15%;">Below are the details of the Comprehensive Examination:</h5>
					<form method="post" action="schduleupdate&<?php echo $exam_schedule->id ?>">
					 <table>
					<tr></tr>
					<table class="table" style="margin-left:15%;width:70%">
					<?php
						foreach ($examschedules/ietsschedule as $exam_schedule) {
					?>
					<tr>
					<th style="width:0.2%">Date:</th>
					<td style="width:1%">{{ $exam_schedule->exam_date->format('d-m-y') }}</td>
					</tr>
					<tr>
					<th style="width:0.2%">Time:</th>
					
					<td style="width:1%"><?php echo $exam_schedule->exam_time?></td>
					</tr>
					<tr>
					<th style="width:0.2%">Venue:</th>
					<td style="width:1%"><?php echo $exam_schedule->exam_venue?></td>
					</tr>
					
					<tr id="seat">
					<th style="width:0.2%">Available Seat:</th>
					<td id="seat2"style="width:1%">{{ $exam_schedule->exam_seatavailable}}</td>
					</tr>
					
						
					<?php
						}
					?>
					
					
					
					</table>
	<!-- <object  style="margin-left:30px"width="90%" height="500"data="/uploads/13_TER.pdf">
</object><br><br> -->

	<center> 
 <a id="show-button" href="{{ $exam_schedule->id}}" class="btn btn-primary">Confirm</a> <br>
  
		</center>
		
</form>
   <!-- <button id="singlebutton" name="singlebutton" class="btn btn-primary center-block"disabled="disabled">Start Exam</button>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("h5").text("The Confirmation date of the examination as below:");
         
    });
});
</script>
<script>

$('#show-button').click(function() {
    $('#seat2').html(function(i, val) { return val*1-1 });
});

</script>

<script>
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

</script>


            </div>
        </div><br><br>
		
</div>
  </div >
				
            </div>
        </div>
    </div>
</div>
@endsection
