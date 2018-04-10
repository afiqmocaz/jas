@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			<h2 style="margin-left:30px">Certificate Renewal </h2>
                <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. An Applicant must complete this assignment within one(1) months from the date of announcement of examination result. <br>
								
	  </div>
      </div>
    </div></br>
	 <div>
		<table>
					<tr></tr>
					<table class="table" style="margin-left:15%;width:70%"border="1px">
					
					<tr>
					<th style="width:0.2%">Renewal Certificate Application Status:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.2%">Certificate No.:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.2%">Specialized Area:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.2%">CPD Hours:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.2%">Disciplinary Status:</th>
					<td style="width:1%"></td>
					</tr>		
			</table>
	 
      </div>
<!--	<br><center> <div>
		<label>Certificate Expired Date: </label><br>
		<label>Renewal Certificate Date:</label>
	 </div><center>

	<center> 
	<label>Please click on next button to upload the report</label><br>
	<a href="ajaxImageUpload" class="btn btn-primary">Next</a></center>-->
        </div>
				
            </div>
        </div>
    </div>
</div>
@endsection
