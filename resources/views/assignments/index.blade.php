@extends('layouts.appeia')
@section('content')


<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default"style="margin-left:8%;width:84%">

<div class="panel-body">
                   <label style="margin-left:3%">Time Remaining (Course Assignment): &nbsp;</label><label id="demo2" style=""></label>
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
      <h2 style="margin-left:30px">Course Assignment Section</h2>
                <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Applicant who passes the Examination is eligible to submit Course Assignment. <br>
                2. Course Assignment shall demonstrate that applicant can write the technical report and make a review as required by DOE. <br>
                3. The applicant should submit two assignments on general subject and area of expertise. <br>
                4. Each assignment is 1500-2000 words and must be submitted to DOE within 2 weeks after receiving the task.<br>
                5. Once Applicant have finish up the report, applicant must submit the report for the hardcopy and softcopy.<br>
                6. For the softcopy applicant must upload it in pdf format through this system.<br>
                7. For the hardcopy applicant must submit the assignments to DOE.
   </div>
      </div>
    </div></br>
    <ul>
   <h4 style="padding-left:2%"><li><b>General Question:</b></li></h4><br>

  
   {!!Form::open(['method' => 'POST','route' => ['assignments.store']]) !!}

   @foreach($eiaassignment as $assignment)

   <p style="padding-left:2%;padding-right:5%">{{$assignment->question}}
</p><br/>

<p style="padding-left:2%;padding-right:5%">{{$assignment->id}}
</p><br/>
{!! Form::hidden('general_assignment_id',  $assignment->id) !!}

@endforeach
<h4 style="padding-left:2%"><li><b>Specific Question:</b></li></h4><br>
@foreach($sassignment as $ass)
@foreach($special as $s)

@if($ass->specialized == $s->first_specialize && $s->user_id == Auth::id() )

<p style="padding-left:2%;padding-right:5%">{{$ass->question}}</p><br/>
<p style="padding-left:2%;padding-right:5%">{{$ass->id}}
</p><br/>

{!! Form::hidden('specific_assignment_id',  $ass->id) !!}
@endif


@endforeach
@endforeach
{!! Form::submit('Upload Assignment', array('class'=>'btn btn btn-primary')) !!}
        {!! Form::close() !!}





</ul>
   <center>   
      
  </center>  

        </div>
        
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "hh:mm:ss"
        });
    </script>



<!--<script type="text/javascript">

function jjg_calculate_next_year($start_date = FALSE) {
  if ($start_date) {
    $now = $start_date; // Use supplied start date.
  } else {
    $now = time(); // Use current time.
  }
  $month = date('m', $now);
  $day = date('d', $now);
  $year = date('Y', $now) + 1;
  $plus_one_year = strtotime("$year-$month-$day"); // Use ISO 8601 standard.
  return $plus_one_year;

  document.getElementById("demo2").innerHTML = $plus_one_year;
}</script>-->
@stop




