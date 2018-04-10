@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CATEGORY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />


@include('sidebar') 
  <style>

  </style>
  </head>
<body>

  <!-- HEADER -->

  <!-- HEADER -->



<center>
  <h3>Pre-Qualtification Registration</h3>

  <h5>Choose <strong>ONE</strong> category based on your profession</h5>
  
    <div class="row">
     
        <div class="col-sm-4" >
             
               <div class="panel-heading" style="background-image:url('image/eia.jpg'); background-repeat: no-repeat;background-size: cover;" ><h3 style="color:white;"><strong>EIA</strong></h3></div>
              <div class="panel-body">  Department of Environment (DOE) has developed EIA Consultant Registration Scheme in 2007 to regulate the list of eligible persons in Malaysia for the purposes of Section 34A (2A). Section 34A (2A), EQA 1974 (revised 2012) requires the Director General to maintain a list of persons entitled to carry out environmental impact assessments. The scheme has also been developed to improve the standard of professionalism among EIA practitioners in ensuring quality service, ethics and integrity.</div>
           <!--  <input type="image" src="{{URL::asset('/image/eia.png')}}" alt="Submit" height="100%" width="100%" style="box-shadow: 10px 10px 5px grey" disabled=""> -->
            
            <br>  <br> 
          <!--   @if(count($eiaConsultant)>0)
                
               @if(empty($eiaConsultant[0]->endorse))
               <h3>  Waiting For Endorsement... </h3>
               @elseif($eiaConsultant[0]->endorse === 'reject')
                    Endorsement is rejected.
               @elseif($eiaConsultant[0]->endorse === 'approve')
               
                    <button type="button" class="btn btn-warning form-control"  onclick="window.location.href='/consultant_profile/eia'" >EIA CONSULTANT</button>
            
               @endif
            
            @else
            
                @if(empty($eiaApplicant) || $eiaApplicant->status === 'In Process...'||$eiaApplicant->status === 'Declined')
            <button type="button" class="btn btn-success form-control"  onclick="window.location.href='/eiaSectionA/create'" >Register</button>
            @elseif($eiaApplicant->status === 'Approved')
                <button type="button" class="btn btn-warning form-control" onclick="window.location.href='/makePayment/eia'">Make Payment</button>
                
                <br>&nbsp;
              
                @if(!empty($paymentEia) )
                <table class="table table-bordered">
                    
                    <tr class="btn-success">
                        <td>Payment For</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                    
                    @foreach($paymentEia as $obj)
                   <tr>
                        <td>
                            {{$obj->type}}
                        </td>
                        <td>
                            {{$obj->status}}
                        </td>
                        <td>
                           
                          @if($obj->status === 'Approved')

                                 @if(!empty($obj->examCandidates) && count($obj->examCandidates)>0)
                                    
                                  <div class="hide">{{$currEc = $obj->examCandidates[(count($obj->examCandidates)-1)]}};</div>
                                          @if( (count($obj->examCandidates) > $retakeExam) && $currEc->status === 'failed')
                                                You have failed the exam
                                          @elseif($currEc->status_assigment === 'failed')
                                                You have failed the assigment
                                          @elseif($currEc->status_interview === 'failed')
                                                 You have failed the interview
                                          @else
                                              
                                                    <button type="button" class="btn btn-info form-control" onclick="window.location.href='/take_quiz/{{$obj->id}}'">Take Exam</button>
                                          @endif
                                    

                                @else
                                    <button type="button" class="btn btn-info form-control" onclick="window.location.href='/take_quiz/{{$obj->id}}'">Take Exam</button>
                                @endif
                                    
                            @else
                                <button type="button" class="btn btn-info form-control" disabled>Take Exam</button>
                            @endif
                           
                        </td>
                    </tr>
                  
                     @endforeach
                </table>
               @else
               @endif
                
           @else
           @endif
            
            @endif -->
            
         </div>
 
             <div class="col-sm-4" >
      
              
                 <div class="panel-heading" style="background-image:url('image/iets.jpg'); background-repeat: no-repeat;background-size: cover;" ><h3><strong style="color:white">IETS</strong></h3></div>              <div class="panel-body">  Department of Environment (DOE) has developed EIA Consultant Registration Scheme in 2007 to regulate the list of eligible persons in Malaysia for the purposes of Section 34A (2A). Section 34A (2A), EQA 1974 (revised 2012) requires the Director General to maintain a list of persons entitled to carry out environmental impact assessments. The scheme has also been developed to improve the standard of professionalism among EIA practitioners in ensuring quality service, ethics and integrity.</div>
            <br>  <br> 
        
            <!--  @if(count($ietsConsultant)>0)
              
               @if(empty($ietsConsultant[0]->endorse))
               <h3>  Waiting For Endorsement... </h3>
               @elseif($ietsConsultant[0]->endorse === 'reject')
                    Endorsement is rejected.
               @elseif($ietsConsultant[0]->endorse === 'approve')
               
                    <button type="button" class="btn btn-warning form-control"  onclick="window.location.href='/consultant_profile/iets'" >IETS CONSULTANT</button>
            
               @endif
              
            @else
            
            
            @if(empty($ietsApplicant) || $ietsApplicant->status === 'In Process...'||$ietsApplicant->status === 'Declined'||$ietsApplicant->status === 'ReRegister')
                <button type="button" class="btn btn-success form-control"  onclick="window.location.href='/ietsSectionA/create'" >Register</button>
            @elseif($ietsApplicant->status === 'Approved')
                  @if($IetspayApprove>0)
                  @else
                <button type="button" class="btn btn-warning form-control" onclick="window.location.href='/makePayment/iets'">Make Payment</button>
                <br>&nbsp;
                  @endif
                @if(!empty($paymentIets))
                <table class="table table-bordered" x >
                    
                    <tr class="btn-success">
                        <td>Payment For</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                    
                    @foreach($paymentIets as $obj)
                 
                    <tr>
                        <td>
                            {{$obj->type}}
                        </td>
                        <td>
                            {{$obj->status}}
                        </td>
                        <td>
                           
                          @if($obj->status === 'Approved')

                                @if(!empty($obj->examCandidates) && count($obj->examCandidates)>0)
                                    
                                  <div class="hide">{{$currEc = $obj->examCandidates[(count($obj->examCandidates)-1)]}};</div>
                                          @if( (count($obj->examCandidates) >= $retakeExam) && $currEc->status === 'failed')
                                                You have failed the exam
                                          @elseif($currEc->status_assigment === 'failed')
                                                You have failed the assigment
                                          @elseif($currEc->status_interview === 'failed')
                                                 You have failed the interview
                                          @else
                                                    <button type="button" class="btn btn-info form-control" onclick="window.location.href='/examschedules/{{$obj->id}}'">Take Exam</button>
                                          @endif
                                    

                                @else
                                    <button type="button" class="btn btn-info form-control" onclick="window.location.href='/examschedules/{{$obj->id}}'">Take Exam</button>
                                @endif
                                    
                            @else
                                <button type="button" class="btn btn-info form-control" disabled>Take Exam</button>
                            @endif
                           
                        </td>
                    </tr>
                  
                     @endforeach
                </table>
               @else
               @endif
                
           @else
           @endif
           
           
           @endif -->
         </div>
        
        
        <div class="col-sm-4" >
            
               <div class="panel-heading" style="background-image:url('image/apcs.jpg'); background-repeat: no-repeat;background-size: cover;" ><h3><strong style="color:white">APCS</strong></h3></div>
              <div class="panel-body">  Department of Environment (DOE) has developed EIA Consultant Registration Scheme in 2007 to regulate the list of eligible persons in Malaysia for the purposes of Section 34A (2A). Section 34A (2A), EQA 1974 (revised 2012) requires the Director General to maintain a list of persons entitled to carry out environmental impact assessments. The scheme has also been developed to improve the standard of professionalism among EIA practitioners in ensuring quality service, ethics and integrity.</div>
            <br>  <br> 
           <!--  @if(count($apcsConsultant)>0)
                
              @if(empty($apcsConsultant[0]->endorse))
               <h3>  Waiting For Endorsement... </h3>
               @elseif($apcsConsultant[0]->endorse === 'reject')
                    Endorsement is rejected.
               @elseif($apcsConsultant[0]->endorse === 'approve')
               
                    <button type="button" class="btn btn-warning form-control"  onclick="window.location.href='/consultant_profile/apcs'" >APCS CONSULTANT</button>
            
               @endif
            
            @else
            
            
            @if(empty($apcsApplicant) || $apcsApplicant->status === 'In Process...'||$apcsApplicant->status === 'Declined')
                <button type="button" class="btn btn-success form-control"  onclick="window.location.href='/apcsSectionA/create'" >Register</button>
            @elseif($apcsApplicant->status === 'Approved')
             @if($ApcspayApprove>0||$ApcspayPending>0)
                  @else
                <button type="button" class="btn btn-warning form-control" onclick="window.location.href='/makePayment/apcs'">Make Payment</button>
                <br>&nbsp;
                @endif
                @if(!empty($paymentApcs))
                <table class="table table-bordered "  width = "100%" >
                    <tr class="btn-success">
                        <td>Payment For</td>
                      
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                    @foreach($paymentApcs as $obj)
                  <tr>
                        <td>
                            {{$obj->type}}
                        </td>
                        <td>
                            {{$obj->status}}
                        </td>
                        <td>
                           
                          @if($obj->status === 'Approved')

                                @if(!empty($obj->examCandidates) && count($obj->examCandidates)>0)
                                    
                                  <div class="hide">{{$currEc = $obj->examCandidates[(count($obj->examCandidates)-1)]}};</div>
                                          @if( (count($obj->examCandidates) > $retakeExam) && $currEc->status === 'failed')
                                                You have failed the exam
                                          @elseif($currEc->status_assigment === 'failed')
                                                You have failed the assigment
                                          @elseif($currEc->status_interview === 'failed')
                                                 You have failed the interview
                                          @else
                                                    <button type="button" class="btn btn-info form-control" onclick="window.location.href='/examschedules/{{$obj->id}}'">Take Exam</button>
                                          @endif
                                    

                                @else
                                    <button type="button" class="btn btn-info form-control" onclick="window.location.href='/examschedules/{{$obj->id}}'">Take Exam</button>
                                @endif
                                    
                            @else
                                <button type="button" class="btn btn-info form-control" disabled>Take Exam</button>
                            @endif
                           
                        </td>
                    </tr>
                  
                     @endforeach
                </table>
               @else
               @endif
                
           @else
           @endif
           
           
           @endif -->
         </div>
       
         
      
 
              
</div>

<center>



<!-- FOOTER -->
    <div class="container">
        

    <!-- templatemo 393 fantasy -->
  <!--   <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="js/templatemo_script.js"></script>
    </div>
<!-- FOOTER -->
</body>
</html>
@endsection