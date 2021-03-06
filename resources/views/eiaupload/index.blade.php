
@extends('layouts.appeia')
@section('content')

<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default"style="margin-left:8%;width:84%">

<div class="panel-body">
                   <label style="margin-left:3%">Time Remaining for Assignment:</label><label id="demo2" style=""></label>
                   <script>
// Set the date we're counting down to

var duedate = new Date("{{Auth::user()->created_at}}");
var timerday = 14;
duedate.setDate(duedate.getDate()+timerday);
var countDownDate2 = duedate.getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate2 - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo2").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo2").innerHTML = "EXPIRED";
        window.location.href="{{ route('assignment_results.index') }}";
        //window.location.href="assignmentresult";
    }
}, 1000);
</script>
                 </div>

                 </div>

               </div>
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
	
		 @if(Session::has('success'))
        <div class="alert-box success" style="width:90%;margin-left:30px">
          <h2>{!! Session::get('success') !!}</h2>
        </div>
      @endif
	
      <div class="form-group"  style="width:90%;margin-left:30px">
        <label><font size="5">Assignment Upload </font></label>&nbsp;&nbsp;&nbsp; <a href="{{ route('assignments.create') }}">View Questions</a> <br>
		<small><b>Files must be uploaded in <span style="color:red">PDF</span> format only and the maximum file size is <span style="color:red">10MB</span></b></small>
		
        {!! Form::open(array('url'=>'eiaupload/uploadFiles','method'=>'POST', 'files'=>true)) !!}

        


        {!! Form::file('images[]', array('multiple'=>true)) !!}
        <br>
<label>Assignment Question:</label>
        
<select  id="assignment_id" class="form-control" name="assignment_id" required="">
     <option value="">--Please Select--</option>
     @foreach ($eiaquestion as $v)
         <option value="{!! $v->general_assignment_id !!}">{!! $v->general->question !!}</option>
         <option value="{!! $v->specific_assignment_id !!}">{!! $v->specific->question !!}</option>
     @endforeach
</select>
        <!--<input type="file" name="fileInput" id="fileInput" />
    <input type="submit" value="submit" disabled />-->
          <p>{!!$errors->first('images')!!}</p>
          @if(Session::has('error'))
            <p>{!! Session::get('error') !!}</p>
          @endif
        {!! Form::submit('Submit', array('class'=>'btn btn btn-primary')) !!}
        {!! Form::close() !!}

<!--script to disable submit button before file not chosen-->
        <script type="text/javascript">
$(document).ready(
    function(){
        $('input:file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false); 
                } 
            }
            );
    });</script>
		
		<br>
		<table>
					<tr></tr>
					<table class="table" style="margin-left:30px;width:90%"border="1px">
					<tr>
						<td bgcolor="#bfbfbf">No</td>
						<td bgcolor="#bfbfbf">Original Filename</td>
            <td bgcolor="#bfbfbf">Assignment Question</td>
						<td  bgcolor="#bfbfbf" style="width:15%">Date</td>
            <td bgcolor="#bfbfbf" style="width:15%">File Size(Byte)</td>
						<td bgcolor="#bfbfbf" style="width:25%">Action</td>
					</tr>
					{{csrf_field()}}
					
					<?php
					$no=1;?>
					
					@foreach ($upload as $uploads)
                    @if(Auth::user()->id == $uploads->user_id)
					<tr class="item{{$uploads->id}}">
					<td>{{$no++}}</td>
					<td><?php echo $uploads->original_filename?></td>
          <td>{{substr($uploads->general2->question,0 , 250)}}</td>
          <button type="button" class="btn btn-primary btn-lg" class="btn btn-primary" data-toggle="modal" data-target="#yourModal">Read More</button>
					<td>{{ $uploads->created_at->format('d-m-Y H:i:s') }}</td>
          <td>{{ $uploads->sizefile }}</td>
					<td><a href="{{asset('uploads/'.$uploads->original_filename)}}" class="btn btn-primary">View</a>&nbsp;{!! Form::open(['route' => ['eiaupload.destroy', $uploads->id], 'method' => 'DELETE', 'style'=>'display:inline-block', 'onsubmit' => 'return ConfirmDelete()']) !!}

                  {!! Form::submit('Delete', array('class'=>'btn btn btn-danger')) !!}</td>

                  {!! Form::close() !!}

         </td>
					
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

function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }


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
