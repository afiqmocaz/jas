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
					<table id="maintable"class="table" style="margin-left:10%;width:80%"border="1px">
					<tr>
					<th style="width:0.3%">Certificate No.:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.5%">CPD Hours:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.5%">Certificate Expired Date:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.5%">Renewal Certificate Date:</th>
					<td style="width:1%"></td>
					</tr>
					<tr>
					<th style="width:0.5%">Disciplinary Status:</th>
					<td style="width:1%"></td>
					</tr>		
			</table>
	  <center> <a class="btn btn-primary"id="addrows">Apply Renewal Certificate</a></center>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <script>
	   $("#addrows").click(function(){
    $('#maintable tr:last').after('<tr><th>Renewal Certificate Application Status:</th><td>Submitted</td></tr>');
    });
	
	
	  
	  </script>
	  
	  <script>
	  $("#addrows").click(function(){
     $("#addrows").hide()
    });
	
	
 
</script>
      </div>

        </div>
	
				
            </div>
        </div>
    </div>
</div>
@endsection
