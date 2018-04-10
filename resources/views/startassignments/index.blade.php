@extends('layouts.appeia')
@section('content')

<div class="container">
 
    <div class="row">
   
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
      <h2 style="margin-left:30px">Course Assignment Section</h2>
                <div class="panel-group">

           <div class="panel-body">
                  <h4 color="black"> General Instructions :</h4>
          <p>1. Applicant who passes the Examination is eligible to submit Course Assignment.</p>
          <p>2. Course Assignment shall demonstrate that applicant can write the technical report and make a review as required by DOE.</p>
          <p>3. Applicant should submit two assignments on general subject and area of expertise.</p>
          <p>4. Each assignment is 1500-2000 words and must be submitted to DOE within two(2) weeks or fourteen(14) days after receiving the task.</p> 
         
          <p>5. Once applicant have finish up the assignment, applicant must submit the assignment for the hardcopy and softcopy.</p>

          <p>6. Applicant must upload softcopy of assignments in pdf format with maximum file size is 10MB for every submission through this system.</p>
          <p>7. Applicant allowed to submit only two(2) files for each assignment including one(1) file for attachment.</p>
          <p>8. Applicant must submit hardcopy of assignments to DOE.</p>
          <p>9. Fourteen(14) days duration wil be calculated once applicant click button "Start" below.</p>
          <p>10. Once the duration of assignment expired, applicant not allowed to submit the softcopy of assignment.</p>
         

                </div>
  
   <center>   
      <a href="{{ route('assignments.index') }}" class="btn btn-primary" id="button">Start</a>
  </center>  

        </div>
        
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
document.getElementById("button").onclick = function() {
    //disable
    this.disabled = true;
    </script>

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
  <script>
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
           
      clearInterval(timer);
        document.getElementById("time").innerHTML = "EXPIRED";
    if(timer="EXPIRED"){
      document.getElementById('myquiz').submit();
    // window.location.href = "{{URL::to('results')}}"
    
    }
        }
    

    }, 1000);
}


window.onload = function () {
    var fiveMinutes = 60 * 1,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
  
  
  </script>
  <script>
    $(document).on('click','.pagination a', function(e){
      e.preventDefault();
      //console.log($(this).attr('href').split('page=')[0]);
      
      var page = $(this).attr('href').split('page=')[1];
      getProducts(page);
      
    });
    
    function getProducts(page){
      console.log('getting question for page=' +page);
    }
  
  
  </script>
  
 
@stop


