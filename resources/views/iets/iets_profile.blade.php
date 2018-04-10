@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			<h2 style="margin-left:30px">Qualified Person Profile</h2>
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
	
<div class="container">
  
  	<hr>
	<div class="row">
      <!-- left column -->
      
        <div class="text-center">
		@foreach($apcsappa as $apcsappas)
          <img src="/image/{{$apcsappas->image}}" class="avatar img-square" alt="avatar" style="margin-right:35%">
        <!--  <h6 style="margin-right:45%">Upload a different photo...</h6>
          
          <input type="file" class="form-control" style="width:50%;margin-left:30px"> -->
        </div> <br>
		@endforeach
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        
       <table>
					<tr></tr>
					 
					<table class="table" style="margin-left:8%;width:70%"border="1px">
					<tr>
					@foreach($user as $users)
					<th style="width:0.2%">Name:</th>
					<td style="width:1%">{{$users->name}}</td>
					</tr>
					 
					<tr>
					<th style="width:0.2%">Nric/Passport. No:</th>
					<td style="width:1%">{{$users->nric}}</td>
					</tr>
					@endforeach
					<tr>
					<th style="width:0.2%">Date of Birth:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.2%">QP No.:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					 @foreach($apcsappb as $apcsappbs)
					<th style="width:0.2%">Specialized Area:</th>
					<td style="width:1%"><li>{{$apcsappbs->specialize_0}}</li><li>{{$apcsappbs->specialize_1}}</li><li>{{$apcsappbs->specialize_2}}</li><li>{{$apcsappbs->specialize_3}}</li></td>
					</tr>
					@endforeach
					<tr>
					<th style="width:0.2%">Citizenship</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.2%">Gender</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.2%">Address:</th>
					<td style="width:1%"><textarea rows="4" cols="50" readonly>{{$apcsappas->address}}</textarea></td>
					</tr>
					<tr>
					<th style="width:0.2%">Email:</th>
					<td style="width:1%">{{$apcsappas->mailaddress}}</td>
					</tr>
					<tr>
					<th style="width:0.2%">Phone No.:</th>
					<td style="width:1%">{{$apcsappas->phoneno}}</td>
					</tr>
					<tr>
					<th style="width:0.2%">Qualified Person Status:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.2%">Certificate:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.2%">Certificate Expired Date:</th>
					<td style="width:1%"></td>
					</tr>
					
					
					
					
					</table>
	  <center> <a href="" class="btn btn-primary">Edit Profile</a></center>
      </div>
  </div>
</div>
<hr>
        </div>
				
            </div>
        </div>
    </div>
</div>
@endsection
