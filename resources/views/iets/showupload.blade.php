@extends('layouts.appiets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
					<table>
					<tr></tr>
					<table class="table" style="margin-left:30px;width:90%"border=1px>
					<tr>
						<td>No</td>
						<td>Original Filename</td>
						<td>Date</td>
						<td>Action</td>
						
						
					</tr>
					<?php
						foreach ($upload as $uploads) {
					?>
					<tr>
					<td><?php echo $uploads->id?></td>
					<td><?php echo $uploads->original_filename?></td>
					<td><?php echo $uploads->created_at?></td>
					<td><a href="#">Edit</a>&nbsp <a href="#">Delete</a></td>
					</tr>
					
					<?php
						}
					?>
					
					
					</table>
	<!-- <object  style="margin-left:30px"width="90%" height="500"data="/uploads/13_TER.pdf">
</object><br><br> -->

	<center> 
	<label>Please click on next button to upload the report</label><br>
	<a href="upload" class="btn btn-primary">Next</a></center>
        </div>
				
            </div>
        </div>
    </div>
</div>
@endsection
