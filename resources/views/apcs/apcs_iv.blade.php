@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
		<h2 style="margin-left:30px">Professional Interview</h2>
                <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Applicants who fulfilled the passing criteria in both comprehensive exam and assignments, will be called for the viva or final interview for the final assessment.<br>
                                2. The objective of the interview session is to provide an opportunity to the interview panel to clarify those point which to them are not adequately discussed in the PCER.
								At the same time, the session also provides an opportunity to the CIETSC applicant to further explain their technical contributions in the IETS design projects that they have
								handled in a verbal fashion. The presentation skills of the applicant is also evaluated through the interview process.<br>
								3. The interview will be conducted by a panel consisting of at least two members. The applicant is required to present their two selected IETS projects and answer questions from
								the panel, related to the projects.<br>
								4. Below are the details of the interview. Applicant click "Accept" button to confirm your attendance or click "Decline" button if the time is not suitable. <br>
								5. Applicant must make the confirmation of the interivew date within seven(7) days from date assigned, if not the interview will be consider as failed.<br>
								6. Secretariat will assigned new date for the professional interview once applicant decline it.<br>
							    7. Once applicant decline the date assigned, applicant may not change it
								</div>
      </div>
    </div></br>
					<h5 style="margin-left:15%;">Below are the details of the Comprehensive Examination:</h5>
					 <table>
					<tr></tr>
					<table id="iv_table" class="table" style="margin-left:15%;width:70%">
					<?php
						foreach ($iets_interview as $interview) {
					?>
					<tr>
					<th style="width:0.5%">Date:</th>
					<td style="width:1%">{{ date('d/m/Y', strtotime($interview->iv_date))}}</td>
					</tr>
					<tr>
					<th style="width:0.5%">Time:</th>
					<td style="width:1%"><?php echo $interview->iv_time?></td>
					</tr>
					<tr>
					<th style="width:0.5%">Venue:</th>
					<td style="width:1%"><?php echo $interview->iv_venue?></td>
					</tr>
					
					
						
					<?php
						}
					?>
					
					
					
					</table>
	<!-- <object  style="margin-left:30px"width="90%" height="500"data="/uploads/13_TER.pdf">
</object><br><br> -->
<label id ="remind"style="margin-left:15%;color:red"></label>
	<center> 
<button id="show-button" type="button" class="btn btn-primary">Accept</button>
  <button id="hide-button" type="button" class="btn btn-primary">Decline</button>	
				</center>
		

  <!--  <br><button id="singlebutton" name="singlebutton" class="btn btn-primary center-block"disabled="disabled">Next</button>-->

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("h5").text("The Confirmation date of the Professional Interview as below:");
        
        
    });
});
</script>

<script>
$(document).ready(function() {
  $("#show-button").click(function () {
   $("#hide-button").hide()
   $("#show-button").hide()
  });
  $("#hide-button").click(function () {
   $("#show-button").hide()
   $("#hide-button").hide()
  });
 });

</script>
<script>
	   $("#show-button").click(function(){
    $('#iv_table tr:last').after('<tr><th style="width:0.5%">Presence Interview Status:</th><td>Confirmed</td></tr>');
	});
</script>

<script>
	   $("#show-button").click(function(){
    $("#remind").after('* Please be there fifteen(15) minutes before the time of interview');
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
