@extends($master)
@section('content')
<div class="container">
    <div>
        <table class="table table-bordered" style="width:61%" align="center">
            <tr><td class='alert-success' colspan='2'><center><h2><b>INTERVIEW</b></h2></center></td></tr>
         
            @if(empty($examCandidate)) 
                <tr>
                 <td>
                     <h2> <center>Please complete the assigment</center></h2>
                   </td>
             </tr>
            @elseif($examCandidate->status_assigment === 'created') 
            <tr>
                 <td>
                   <h2> <center>Please complete the assigment first</center></h2>
                 </td>
             </tr>
            @elseif($examCandidate->status_assigment === 'failed' || $examCandidate->status === 'failed') 
            <tr>
                 <td>
                     <h2><font color='red'><center>You have failed the exam</center></font></h2>
                 </td>
             </tr>
            @elseif($examCandidate->status_interview === 'pending')
             <tr>
                 <td>
                    <center>Please wait for interview email confirmation</center>
                 </td>
             </tr>
             @else
              <tr>
                 <td>
                    <center>Date</center>
                 </td>
                 <td>
                    <center>{{$examCandidate->ivSchedule->date->format('d M Y')}}</center>
                 </td>
             </tr>
             <tr>
                 <td>
                    <center>Time</center>
                 </td>
                 <td>
                    <center>{{$examCandidate->ivSchedule->time}}</center>
                 </td>
             </tr>
              <tr>
                 <td>
                    <center>Venue</center>
                 </td>
                 <td>
                    <center>{{$examCandidate->ivSchedule->venue->venue}}</center>
                 </td>
             </tr>
              <tr>
                 <td>
                    <center>Adress</center>
                 </td>
                 <td>
                    <center>{{$examCandidate->ivSchedule->address}}, {{$examCandidate->ivSchedule->state}}</center>
                 </td>
             </tr>
               @if($examCandidate->status_interview === 'assigned')
               <tr>
                   <td colspan="2">
                       <div class="row">

                           
                        <!-- <div class="col-sm-6"><button class="btn btn-danger form-control" data-toggle="modal" data-target="#modalReject">Reject</button></div> -->
                        <div class="col-sm-6"><center><button class="btn btn-success form-control" data-toggle="modal" data-target="#modalAccept">Acknowledge</button></button></div>
                    
                      </div>
                         
                     
                       
                     </td>
                 </tr>
             @elseif($examCandidate->status_interview === 'accepted')
                <tr>
                   <td colspan="2">
                        <center> You have accepted the interview </center>
                     </td>
                 </tr>
             @elseif($examCandidate->status_interview === 'rejected')
                <tr>
                   <td colspan="2">
                        <center> You have reject the interview </center>
                     </td>
                 </tr>
             @elseif($examCandidate->status_interview === 'passed')
                <tr>
                   <td colspan="2">
                        <center> You have passed the interview </center>
                     </td>
                 </tr>
             @elseif($examCandidate->status_interview === 'failed')
                <tr>
                   <td colspan="2">
                        <center> You have failed the interview </center>
                     </td>
                 </tr>
             @else
             @endif
             @endif
        </table>
    </div>
</div>


<!-- Modal -->
<div id="modalAccept" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Accept Interview</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to accept interview</p>
      </div>
        <div class="modal-footer" >
           
              
               
               <form action="/interview_applicant_set_status" method="post">
                   {{ csrf_field() }}
                     <input type="hidden" name="id" value="{{$examCandidate->id}}">
                    <input type="hidden" name="status_interview" value="accepted">
                    <input type="submit" value="Yes" class="btn btn-success">
                </form> 
            </form>
        </div>
    </div>

  </div>
</div>


<div id="modalReject" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reject Interview</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to reject interview</p>
      </div>
        <div class="modal-footer" >
           
              
               
               <form action="/interview_applicant_set_status" method="post">
                   {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$examCandidate->id}}">
                    <input type="hidden" name="status_interview" value="rejected">
                    <input type="submit" value="Yes" class="btn btn-danger">
                </form> 
            </form>
        </div>
    </div>

  </div>
</div>

@endsection
