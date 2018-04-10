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
    <label>Please Choose Examination Date Below:</label> <br>
  {!! Form::open(array('route' => 'apcs_schedules.store')) !!}

             <div class="form-group" style="margin-left:5%">
              
                  <!--<label>Additional Information </label> </br>-->
             @foreach($eia_examschedule as $ietsschedules)
                  <!--<br><textarea id="reqaddinfo" name="reqaddinfo" required="" rows="7" cols="60" style="resize:none;width:60%"></textarea>-->
 <div class="hide">{{$availableSeat = $ietsschedules->seat - count($ietsschedules->ietsCandidates)}}</div>
 
 <table class='table table-bordered' style="width:90%">
     <tr class='btn-default' style="background-color: skyblue">
         <td >
            <div class="input-group {{$availableSeat <= 0?'hide':''}}" >
                <input type="radio" id="schedule_id" name="schedule_id" required=""  value={{$ietsschedules->id}}></input>
            </div>
             <table class="table table-bordered" style="background-color: white">
                <tr>
                <td scope="row">Date:</td>
                <td>{{ date('d/m/Y', strtotime($ietsschedules->date))}}</td>
               </tr>
             <tr>
               <td scope="row">Time:</td>

               <td>{{ date('g:i A', strtotime($ietsschedules->start))}} - {{ date('g:i A', strtotime($ietsschedules->end))}}</td>
             </tr>
                  <tr>
               <td scope="row">Venue:</td>
               <td><br>{{$ietsschedules->ietsvenue->ietsvenue}}<br>{{$ietsschedules->address}}<br>{{$ietsschedules->state}}</td>
             </tr>

             <tr>
               <th scope="row">No. of seat allocated:</th>
               <td>{{$ietsschedules->seat}}</td>
             </tr>

             <tr>
               <th scope="row">No. of seat left:</th>
               <td>{{$availableSeat}}</td>
             </tr>
             </table>
         </td>
        
     </tr>
 </table>

  </center>
  @endforeach
            
              <form action="" method="get">
              <input type="submit" class="btn btn-primary" onclick='onSubmitClick();' value="Save" /><hr><br>
              </div>
            {!! Form::close() !!} 
        </div>
        <script>
function ConfirmSubmit() {
    var r = confirm("Are you sure to submit this application?\n\n Click OK to confirm the examination date or CANCEL to cancel!");
    if(r==true) {
      return view('examschedules.index') ;
    } else {
        return false;
    }
}
</script>
            </div>
        </div>
    </div>
</div>

@endsection

