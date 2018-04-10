@extends('layouts.appiets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
		<h2 style="margin-left:30px">Professional Interview Status</h2>
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
    </div><br>
					
					<center>
     
      
      <h4><b>Result Interview Status: PASSED</b></h4>
     
      <h5>Congratulations! You have passed the professional interview</h5><br>
   
   
   </center>  


    <center> 
	<small>Please click next button to proceed to the Certificate section</small><br>
<button id="show-button" type="button" class="btn btn-primary">Next</button>
 
				</center>
    



    </div>
    
  </div>

  @endsection