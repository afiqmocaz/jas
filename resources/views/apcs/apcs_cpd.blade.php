@extends('layouts.app6')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			<h2 style="margin-left:30px">Continuous Professional Development</h2>
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
		<table style="width:80%" border="1px" align="center">
  <tr>
    <th  align="center">No.</th>
    <th>Year</th>
    <th>Current CPD</th>
	<th>Total Number CPD</th>
  </tr>
  <tr>
    <td>1</td>
    <td>2017</td>
    <td>50</td>
	<td>70</td>
  </tr>
  
</table>
	 
	 
	 </div>

<!--	<center> 
	<label>Please click on next button to upload the report</label><br>
	<a href="ajaxImageUpload" class="btn btn-primary">Next</a></center>-->
        </div>
				
            </div>
        </div>
    </div>
</div>
@endsection
