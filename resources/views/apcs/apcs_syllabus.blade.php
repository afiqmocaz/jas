@extends('layouts.master_applicant')

@section('content')
<div class="container">
 
    <div class="row">
	 
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			<h2 style="margin-left:30px">Syllabus</h2>
                <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. The applicant is required to self learning all the syllabus and reference given below. The Comprehensive Examination will focus on the understanding of applicants in the related guidance, legal requirement and area of expertise selected. <br>
	 </div>
      </div>
    </div></br>
	 @foreach($syllabi as $apcssyllabus)
	 <object  style="margin-left:30px"width="90%" height="500"data="/uploads/{{$apcssyllabus->original_filename}}"></object><br><br>
	@endforeach
	
	<!-- <center> 
	<label>Please click on the next button to proceed to the Comprehensive Examination.</label><br>
	<a href="/examschedules/{{$payment->id}}" class="btn btn-primary">Next</a></center> -->
        </div>
				
            </div>
        </div>
    </div>
</div><div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Attention</b></h4>
      </div>
      <div class="modal-body">
          <p>1. Please go through syllabus and references while preparing for the exam.</p><br>
          <p>2. When you are ready please click comprehensive exam to book exam date.</p>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
  $('#myModal').modal('toggle');
</script>
@endsection
