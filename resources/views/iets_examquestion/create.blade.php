@extends('layouts.ietsexam')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			<h2 style="margin-left:30px">Comprehensive Examination</h2>

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
	<div>
    {!!Form::open(['method' => 'POST', 'id'=>'ajax'])!!}

    <font size="4" color="blue" style="margin-left: 5%">Timing remaining: <label id="hms"> 03:00:00</label></font><br><br>
   
	  <?php $i = $rank++ ?>
	  		@foreach ($iets_question as $index =>$exam_question)
					
			 @if ($i > 1) <hr /> @endif
					<form action=""  id="quiz" style="margin-left:15%;height:auto" 	method="POST" action="{{ url('/store') }}">
						
							@if ($exam_question->original_filename != '')
                <center>
               <img class="file" src="/uploads/{{$exam_question->original_filename}}" width="200px"></img>
               <br><a style="margin-left: 5%" class="file" href=><br>{{$exam_question->limg}}</</img></a></center>
               @endif
               <br />
							<label
                            name=""
                            value="{{ $exam_question->level }}">{{$exam_question->level}}</label><br>
							
							<label style="margin-left: 5%"> {{ $i }}. {{$exam_question['question']}}</label>  <br>
							
							   @if ($exam_question->i != '')
                            <div class="i">I {!! $exam_question->i !!}</div>
                        @endif
                       

                         @if ($exam_question->ii != '')
                            <div style="margin-left: 5%" class="i">II {!! $exam_question->ii !!}</div>
                        @endif
                      

                         @if ($exam_question->iii != '')
                            <div style="margin-left: 5%" class="i">III {!! $exam_question->iii !!}</div>
                        @endif
                    
                         @if ($exam_question->iv != '')
                            <div style="margin-left: 5%" class="i">IV {!! $exam_question->iii !!}</div>
                        @endif
												
								 @foreach($exam_question->options as $option)
                        <br>
                        <label style="margin-left: 5%" class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $exam_question->id }}]"
                                value="{{ $option->id }}"
                                required="">
                            {{ $option->option }}
                        </label>

                       
                    @endforeach
					@endforeach
					

					
					 <?php $i++; ?>
					
		<div id="pagination">{{($iets_question->links('vendor.pagination.custom'))}}</div>

        {!!Form::close()!!}

	
        </div>
				
            </div>
        </div>
    </div>
</div>
<script>
var startTime;
function start() {
  startTime = parseInt(localStorage.getItem('startTime') || Date.now());
  localStorage.setItem('startTime', startTime);
  timer = setInterval(clockTick, 100);
}

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 3) return parts.pop().split(";").shift();
} // credits kirlich @http://stackoverflow.com/questions/10730362/get-cookie-by-name


function count() {
 if(typeof getCookie('remaining')!= 'undefined')
 {
   startTime = getCookie('remaining');
  
 }
 else if(document.getElementById('hms').innerHTML.trim()!='')
 {
   startTime = document.getElementById('hms').innerHTML;
   
 }
 else
 {
  var d = new Date(); 
  var h=d.getHours(); 
  var m=d.getMinutes();
  var s=d.getSeconds();
  startTime = h+':'+m+':'+s;
  //OR
  startTime  = d.toTimeString().split(" ")[0]
 }

 var pieces = startTime.split(":");
 var time = new Date();
 time.setHours(pieces[0]);
 time.setMinutes(pieces[1]);
 time.setSeconds(pieces[2]);
 var timediff = new Date(time.valueOf()-1000)
 var newtime = timediff.toTimeString().split(" ")[0];
 document.getElementById('hms').innerHTML=newtime ;
 document.cookie = "remaining="+newtime;
 //localStorage.setItem('startTime', startTime);
 setTimeout(count,1000);

}
count();
</script>
    <script type="text/javascript">

        $(function() {
            
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                $('#soalan a').css('color', '#dfecf6');
                $('#soalan').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                var url = $(this).attr('href');
                getQuestions(url);
                window.history.pushState("", "", url);
                
            });

            function getQuestions(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('.soalan').html(data);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }
        });
    </script>

@endsection
