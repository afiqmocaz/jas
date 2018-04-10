@extends('layouts.master_consultant')
@section('header', $category.': Certificate Renewal')
@section('content')

<div class="container"  style="width:40%;margin-left:28%">
    <h1>Certificate Renewal&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='1. An applicant have to click on the Renew Certificate button in order to apply for the renewal.<br>
                2. The applicant will be consider as failed if the certificate failed to renew.<br>
                3. The renewal will be processed within 3 working days after submission.'
        data-html="true" data-placement="right" data-original-title="Instructions" data-trigger="hover" data-toggle="popover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>
    
   
      <!-- <div class="panel-heading"> 
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body"> 1. An applicant have to click on the Renew Certificate button in order to apply for the renewal.<br>
                2. The applicant will be consider as failed if the certificate failed to renew.<br>
                3. The renewal will be processed within 3 working days after submission.
                </div>
      </div> -->
   <a target="_blank" href="/cert_generate/{{$cert->id}}">Download Certificate</a>
   <table class="table table-bordered" >
       <tr>
           <td class="alert-success" width="30%">
               Certificate No  
           </td>
           <td>
               cert-{{$cert->id}}
           </td>
       </tr>
     <!--   <tr>
           <td class="alert-success">
               Specialize Area  
           </td>
           <td>
               @foreach($cert->user->certEiaSectionE as $data)
                    <li> {{$data->first_specialize}}
                    
                    <li>{{$data->second_specialize}}
               @endforeach
           </td>
       </tr> -->
       <tr>
           <td class="alert-success">
               CPD Hour
           </td>
           <td>
               <table class="table table-bordered">
                   <tr><td class="alert-success"><b>Year</b></td><td class="alert-success"><b>Collected Point</b></td></tr>
                   <tr><td>{{$prevYear3[0]}}</td><td>{{$prevYear3[1]}}</td></tr>
                    <tr><td>{{$prevYear2[0]}}</td><td>{{$prevYear2[1]}}</td></tr>
                     <tr><td>{{$prevYear1[0]}}</td><td>{{$prevYear1[1]}}</td></tr>
                     <tr><td><b>Total Point</b></td><td><b>{{$totalCPD}}</b></td></tr>
               </table>
           </td>
       </tr>
        <tr>
           <td class="alert-success">
               Certification Expiry Date
           </td>
           <td>
               {{$cert->expired->format('d M Y')}}
           </td>
       </tr>
        <tr>
           <td class="alert-success">
               Disciplinary Status
           </td>
           <td>
               
           </td>
       </tr>
        <tr>
            <td colspan="2">
                
                 @if($totalCPD >= 150 && $diffDay <= 60)
                 
                  <center>
                 @if($cert->renewal_status === '0' || $cert->renewal_status === 'granted' || $cert->renewal_status === 'reject'  || $cert->renewal_status === 'not_granted')
                   <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Renew Certificate</button>
                 @endif
                  <h3> 
                 @if($cert->renewal_status === 'applied')
                 <font style="color: green">Your renewal application has been submitted.</font>
                 @elseif($cert->renewal_status === 'reject')
                 <font style="color: red">Renewal was rejected..</font>
                  @elseif($cert->renewal_status === 'payment_submitted')
                 <font style="color: green">Waiting for approval status</font>
                  @elseif($cert->renewal_status === 'approve')
                 <font style="color: green">Renewal was approved, Please make Payment</font>
                 <br>
                 <br>
                 <button class="btn btn-success" onclick='location.href="/makePayment/{{$category}}"'>Make Payment</button>
                  @else
                 @endif
                 </h3>
                </center>
        
                @else
                <h3>Certificate Renewal Requirement:</h3>
                   <h4>1.Minimum of 150 CPD points accumulated within the past 3 years</h4>
                   <h4>2.Consultants would be able to renew their certificate within 2 month before 
expiry date.</h4>
                   
                @endif
           </td>
           
       </tr>
   </table>
     </div>


<!-- Modal -->
{!!Form::open(['role'=>'form', 'route'=>'applyRenewal']) !!}
 <input type='hidden' name='id' value='{{$cert->id}}'>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Renewal Certificate</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to apply for certificate renewal?</p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          
        
          <button type="submit" class="btn btn-success" >Yes</button>
         
      </div>
    </div>

  </div>
</div>
{!!Form::close() !!}
<!-- azhari mustapa, azhari@nafa.my, 23/01/2018 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset ('/node_modules/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>   
    $('#popoverData').popover({
    container: 'body' });
</script>
@endsection
