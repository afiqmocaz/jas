@extends('layouts.app3')
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
    </div><br><br>
  {!! Form::open(array('route' => 'apcs_exam.store')) !!}

              <div class="form-group" style="margin-left:5%">
              
                  <!--<label>Additional Information </label> </br>-->
              @foreach($eia_examschedule as $ietsschedules)
                  <!--<br><textarea id="reqaddinfo" name="reqaddinfo" required="" rows="7" cols="60" style="resize:none;width:60%"></textarea>-->
              <div class="input-group" style="width: 100%;">
                <br><br><input type="radio" id="schedule_id" name="schedule_id" required=""  value={{$ietsschedules->id}}></input>
                </div>
                               <center>
   <table class="table table-bordered" style="margin-center:25%;width:70%">
     <tr>
    <th scope="row">Date:</th>
    <td>{{ date('d/m/Y', strtotime($ietsschedules->date))}}</td>
  </tr>
  <tr>
    <th scope="row">Time:</th>
    
    <td>{{ date('g:i A', strtotime($ietsschedules->start))}} - {{ date('g:i A', strtotime($ietsschedules->end))}}</td>
  </tr>
       <tr>
    <th scope="row">Venue:</th>
    <td><br>{{$ietsschedules->address}}<br>{{$ietsschedules->state}}</td>
  </tr>
  
  <tr>
    <th scope="row">No. of seat allocated:</th>
    <td>{{$ietsschedules->seat}}</td>
  </tr>

  <tr>
    <th scope="row">No. of seat left:</th>
    <td>{{$ietsschedules->seat}}</td>
  </tr>
  </table>
  </center>
  @endforeach
            
                <br><br><form action="" method="get">
              <input type="submit" class="btn btn-primary" value="Save"/><hr><br>
              </div>
            {!! Form::close() !!} 
        </div>
        
            </div>
        </div>
    </div>
</div>

@endsection

