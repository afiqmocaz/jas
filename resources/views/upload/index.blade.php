
  
@extends('layouts.appiets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			 <h2  style="margin-left:30px">Assignment for Pollution Control Engineering Report(PCER)</h2>
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
    </div>
	
	 @if (Session::has('success'))

        <div class="alert alert-success" role="alert">
    
        <strong>Success:</strong>  {{ Session::get('success') }}

        </div>

        @endif

        @if (count($errors) > 0)

        <div class="alert alert-danger" role="alert">

        <strong>Errors:</strong><ul>
        @foreach ($errors->all() as $error)
          <br><li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>

        @endif

	
      <div class="form-group"  style="width:90%;margin-left:30px">
        <h2>PCER Upload</h2>
		<small>Files must be uploaded in PDF format only and the maximum file size is 10MB</small>
		
        {!! Form::open(array('id' => 'fileinput','url'=>'upload/uploadFiles','method'=>'POST', 'files'=>true)) !!}
        {!! Form::file('images[]', array('multiple'=>true)) !!}
          <p>{!!$errors->first('images')!!}</p>
          @if(Session::has('error'))
            <p>{!! Session::get('error') !!}</p>
          @endif
        {!! Form::submit('Submit', array('class'=>'btn btn btn-primary')) !!}
        {!! Form::close() !!}
		
		<br>
		<table>
					<tr></tr>
					 <table class="table" style="margin-left:30px;width:90%;color:black" border="1px">
                    <tr>
                        <td bgcolor="#bfbfbf" style="">No</td>
                        
                        <td bgcolor="#bfbfbf">Original Filename</td>
                        <td bgcolor="#bfbfbf">Filesize (bytes)</td>
                        <td bgcolor="#bfbfbf" style="width:15%">Date</td>
                        <td bgcolor="#bfbfbf">Action</td>
                    </tr>
					{{csrf_field()}}
					
					
					
					<?php
					$no=1;?>
					
					@foreach ($upload as $uploads)
						 @if(Auth::user()->id ==$uploads->user_id)
					<tr class="item{{$uploads->id}}">
					<td>{{$no++}}</td>
					<td><?php echo $uploads->original_filename?></td>
					<td><?php echo $uploads->sizefile?></td>
					<td>{{ $uploads->created_at->format('d-m-Y H:i:s') }}</td>
					
					<td><a href="{{asset('uploads/'.$uploads->original_filename)}}" class="btn btn-primary">View</a>&nbsp <a id="delete-btn" href="" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a></td>
					
					</tr>
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog modal-sm">
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title"><!--Assignment Submission--></h4>
							</div>
							<div class="modal-body">
							  <p>Are you sure want to delete this file?</p>
							</div>
							<div class="modal-footer">
							  <center>
							  <a href="{{URL::to('delete',array($uploads->original_filename))}}" class="btn btn-info" role="button">Yes</a>
							  <a href="" class="btn btn-info" role="button">No</a>
							  </center>
							  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button> -->
							</div>
						  </div>
						</div>
						 </div>
					@endif

					@endforeach
					
					
					</table>
					
			<!--		<script>
    var deleter = {

        linkSelector : "a#delete-btn",

        init: function() {
            $(this.linkSelector).on('click', {self:this}, this.handleClick);
        },

        handleClick: function(event) {
            event.preventDefault();

            var self = event.data.self;
            var link = $(this);

            swal({
                title: "Confirm Delete",
                text: "Are you sure to delete this category?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = link.attr('href');
                }
                else{
                    swal("cancelled", "Category deletion Cancelled", "error");
                }
            });

        },
    };

    deleter.init();
</script>-->
      </div>
	
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>

$(document).ready(function() {
  $('#fileinput').change(function() {
    if (this.files.length >= 3)
      alert('to many files')
  });
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
