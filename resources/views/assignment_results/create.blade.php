@extends('layouts.appeia')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
       <h2  style="margin-left:30px">Course Assignment</h2>
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
    </div>
    <br>
    <center>
      
      <div class="well well-sm" style="margin-left: 5%; margin-right: 5%;background-color: #ffe6e6; border-color: red; display:inline-block;">
          <strong style="color: red">Sorry!!<br>Course Assignment Result is not available yet!!!</strong><br>
          </div>
  </center>

  

              
        </div>
    </div>
</div>
</div>
</div>

@endsection



