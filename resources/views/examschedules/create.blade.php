@extends('layouts.appeia')
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
        <div class="panel-body">1. Online examination will be set-up at the Department of Environment Head Quarters or EiMAS. <br>
                2. Applicant must choose available date. <br>
                3. Applicant is required to make yourselves available for the examination. <br>
                4. Applicant need to click the Confirm button to make the confirmation for the examination. <br>
                5. Online examination contain 100 questions to ensure the applicant understood all the latest EIA procedure and requirements.<br>
                6. The applicant should pass the passing mark of 80 percent to proceed the next step. <br>
                7. The applicant will be considered fail if do not attend the examination.
   </div>
      </div>
    </div></br>
   <h4 style="padding-left:5%"><b>Details of comprehensive examination as below:</b></h4><br>
   @foreach($eiaschedule as $eiaschedules)
   <div class="radio" style="padding-left:15%">
  

   <input type='radio' name="schedule_id" value='$eiaschedules->id'>{{$eiaschedules->id}}

   <center>
   <table class="table table-bordered" style="margin-center:25%;width:70%">
     <tr>
    <th scope="row">Date:</th>
    <td>{{ date('d/m/Y', strtotime($eiaschedules->date))}}</td>
  </tr>
  <tr>
    <th scope="row">Time:</th>
    
    <td>{{ date('g:i A', strtotime($eiaschedules->start))}} - {{ date('g:i A', strtotime($eiaschedules->end))}}</td>
  </tr>
       <tr>
    <th scope="row">Venue:</th>
    <td>{{$eiaschedules->eiavenue->eiavenue}}<br>{{$eiaschedules->address}}<br>{{$eiaschedules->state}}</td>
  </tr>
  
  <tr>
    <th scope="row">No. of seat left:</th>
    <td>{{$eiaschedules->seat}}</td>
  </tr>
  </table>
  </center>
</div>
@endforeach
<br>
<center>
   
      <a href="/confirmationexam" class="btn btn-primary">Confirm</a>
  </center>  

        </div>
        
            </div>
        </div>
    </div>
</div>

@endsection




