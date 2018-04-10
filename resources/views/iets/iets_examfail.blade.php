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
    </div><br>
	<div>
		<center>
      <h4>Comprehensive Examination Result</h4><br/>
      </center>

  <table class="table table-bordered" style="margin-left:25%;width:50%">
    <tr>
    <th scope="row"style="width:5%">Exam Score:</th>
    <td style="width:5%">50/100</td>
  </tr>
       <tr>
    <th scope="row"style="width:5%">Status:</th>
    <td style="width:5%">Failed</td>
  </tr>
  </table>



<center> 
<button id="show-button" name="singlebutton"  class="btn btn-primary center-block">Resit Exam</button> <br>
</center>
</div>

    </div>
    <!--<div class="col-sm-2 sidenav">
      
    </div> -->
  </div>
 </div>
</div>
</div>
  @endsection
		

  