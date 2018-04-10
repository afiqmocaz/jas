@extends($extendLayout)
@section('content')
<div class="container">

    <table class="table table-bordered"  style="width:61%" align="center">
        <tr>
            <td class='alert-success' ><center><h2><b>Comprehensive Examination</b></h2></center> </td>
        </tr>
        <tr><td>
        @if(!empty($examCandidate) && ($examCandidate->status_interview ==="failed" || $examCandidate->status_assigment ==="failed"))
        
        <h3>Comprehensive Exam : {{$examCandidate->status}}</h3>
        <h3>Assigment : {{$examCandidate->status_assigment}}</h3>
        <h3>Interview : {{$examCandidate->status_interview}}</h3>
         <button type="button" class="btn btn-warning form-control" onclick="window.location.href = '/makePayment/eia'">Make Payment</button>
        </td>
        </tr>
        
              
        @elseif(!empty($examCandidate) && $examCandidate->status ==="passed")
        <tr>
            <td>
                <button type="button" class="btn btn-success form-control" onclick="window.location.href = '/applicant_assigment/{{$category}}'">Proceed to assigment</button>
            </td>
        </tr>
        @else
       
        <div class="hide">
            {{$chooseSchedule = 1}}
           
        </div>


        <tr>
            <td>
                <div class="panel panel-primary">
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
            </td>
        </tr>
        <tr>
            <td>
                 @if($chooseSchedule === 1)
                
            
                <input type="hidden" name='category' value="{{$category}}">
                <input type="hidden" name='payment_id' value="{{$payment->id}}">

                @if(count($examScheduleList) > 0)                 
                @foreach($examScheduleList as $es)
             
                                 <!--<br><textarea id="reqaddinfo" name="reqaddinfo" required="" rows="7" cols="60" style="resize:none;width:60%"></textarea>-->
                <div class="hide">{{$availableSeat = $es->seat - count($es->examCandidates)}}</div>

                <table class='table table-bordered' >
                    <tr class='btn-default' style="background-color: skyblue">
                        <td >
<!--                            <div class="input-group {{$availableSeat <= 0?'hide':''}}" >
                                <input type="radio" id="schedule_id" name="schedule_id" required=""  value={{$es->id}}></input>
                            </div>-->
                            <table class="table table-bordered" style="background-color: white">
                                 <tr>
                                    <td scope="row">Title:</td>
                                    <td>@if(!empty($es->examtitle)){{$es->examtitle->examtitle}}@endif</td>
                                </tr>
                                  <tr>
                                    <td scope="row">Type of Exam</td>
                                    <td>{{$es->typeofexam}}</td>
                                </tr>
                                
                                <tr>
                                    <td scope="row">Date:</td>
                                    <td>{{ date('d/m/Y', strtotime($es->date))}}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Time:</td>

                                    <td>{{ date('g:i A', strtotime($es->start))}} - {{ date('g:i A', strtotime($es->end))}}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Venue:</td>
                                    <td><br>{{$es->venue->venue}}<br>{{$es->address}}<br>{{$es->state}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">No. of seat allocated:</th>
                                    <td>{{$es->seat}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">No. of seat left:</th>
                                    <td>{{$availableSeat}}</td>
                                </tr>
                                <tr>
                                   <td colspan="2">
                                       
                                    
                                        {!! Form::open(array('route' => 'examschedules.store','onsubmit' => 'return ConfirmSubmit()')) !!} 
                                    <form action="" method="get">
                                        <input type="hidden" id="payment_id" name="payment_id" required=""  value={{$payment->id}} />
                                        <input type="hidden" id="schedule_id" name="schedule_id" required=""  value={{$es->id}} />
                                        <input type="hidden" id="schedule_id" name="schedule_id" required=""  value={{$es->id}} />
                                        <input type="submit" class="btn btn-primary form-control"  value="Choose" /><br>
                                    </form>
                                         {!! Form::close() !!} 
                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                </table>

                </center>
                @endforeach

               


                @else
        <center><h2>No Schedule for Exam Yet.</h2></center>
        @endif





        @else
        <button type="button" class="btn btn-warning form-control" onclick="window.location.href = '/makePayment/eia'">Make Payment</button>
        @endif

        </td>

        </tr>
        @endif
    </table>
    <script>
        function ConfirmSubmit() {
            var r = confirm("Are you sure to submit this application?\n\n Click OK to confirm the examination date or CANCEL to cancel!");
            if (r == true) {
                return view('examschedules.store');
            } else {
                return false;
            }
        }
        $('#loading').removeClass('load');
    </script>

    
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    @endsection

