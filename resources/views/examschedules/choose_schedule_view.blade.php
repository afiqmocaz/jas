@extends($extendLayout)
@section('content')
<div class="container">
@if(empty($examCandidate) || ($examCandidate->status === 'failed' && $retakeToken >0))


<center>

@if(!empty($examCandidate) && $examCandidate->status === 'failed')
    <h2>Resit Exam : {{$remaining}} of {{$tokenExam}} more only </h2>
@endif
    
<table class="table table-bordered" style="width:50%">
            <tr>
            <td>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse1">Instructions:</a>
                        </h4>
                        
                    </div>
                    <div  >
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
</table>
</center>

@if(count($examScheduleList) > 0)                 
                @foreach($examScheduleList as $es)
             <center>
                                 <!--<br><textarea id="reqaddinfo" name="reqaddinfo" required="" rows="7" cols="60" style="resize:none;width:60%"></textarea>-->
                <div class="hide">{{$availableSeat = $es->seat - count($es->examCandidates)}}</div>

                <table class='table table-bordered'  style="width:50%" >
                    <tr class='btn-default'>
                        <td >
<!--                            <div class="input-group {{$availableSeat <= 0?'hide':''}}" >
                                <input type="radio" id="schedule_id" name="schedule_id" required=""  value={{$es->id}}></input>
                            </div>-->
                            <table class="table table-bordered" style="background-color: white">
                                 <tr>
                                    <td scope="row" bgcolor="#C0C0C0">Title:</td>
                                    <td>@if(!empty($es->examtitle)){{$es->examtitle->examtitle}}@endif</td>
                                </tr>
                                  <tr>
                                    <td scope="row" bgcolor="#C0C0C0">Type of Exam</td>
                                    <td>{{$es->typeofexam}}</td>
                                </tr>
                                
                                <tr>
                                    <td scope="row" bgcolor="#C0C0C0">Date:</td>
                                    <td>{{ date('d/m/Y', strtotime($es->date))}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" bgcolor="#C0C0C0">Time:</td>

                                    <td>{{ date('g:i A', strtotime($es->start))}} - {{ date('g:i A', strtotime($es->end))}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" bgcolor="#C0C0C0">Venue:</td>
                                    <td><br>{{$es->venue->venue}}<br>{{$es->address}}<br>{{$es->state}}</td>
                                </tr>

                                <tr>
                                    <th scope="row" bgcolor="#C0C0C0">No. of seat allocated:</th>
                                    <td>{{$es->seat}}</td>
                                </tr>

                                <tr>
                                    <th scope="row" bgcolor="#C0C0C0">No. of seat left:</th>
                                    <td>{{$availableSeat}}</td>
                                </tr>
                                <tr>
                                   <td colspan="2">
                                       
                                    
                                        {!! Form::open(array('route' => 'examschedules.store','onsubmit' => 'return ConfirmSubmit()')) !!} 
                                    <form action="" method="get">
                                        <input type="hidden" id="payment_id" name="payment_id" required=""  value={{$payment->id}} />
                                        <input type="hidden" id="schedule_id" name="schedule_id" required=""  value={{$es->id}} />
                                        <input type="hidden" id="schedule_id" name="schedule_id" required=""  value={{$es->id}} />
                                        <input type="submit" class="btn btn-warning form-control"  value="Confirm" /><br>
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
<center>
@else
        @if(!empty($examCandidate) && $examCandidate->status === 'passed')
                <button class="btn btn-success">Procced To Assigment</button>
        @elseif(!empty($examCandidate) && $examCandidate->status === 'failed')
                <h2>You have failed the Exam {{$tokenExam}} times</h2>
                @if($tokenExam=="2")
                <button class="btn btn-success form-control" onclick="location.href='/ReRegister/{{$payment->id}}'">Make New Registration</button>
                @endif
        @endif
        
        
@endif 
</center>
        
        <br><br>
</div>   
  <script>
        function ConfirmSubmit() {
            var r = confirm("Please confirm on the selected exam date or CANCEL to cancel!");
            if (r == true) {
                return view('examschedules.store');
            } else {
                return false;
            }
        }
        $('#loading').removeClass('load');
    </script>
@endsection

