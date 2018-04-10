<!DOCTYPE html>
<html lang="en">
<head>
  <title>CATEGORY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/justified-nav.css" rel="stylesheet" type="text/css">
  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/justified-nav.css')!!}
  {!!Html::style('css/templatemo_style.css')!!}
  {!!Html::style('css/parsley.css')!!}

  <style>
    p {
        text-indent: 30px;
    }

    
    li {
        float: left;
    }

    li a, .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover, .dropdown:hover .dropbtn {
        background-color: #00ad00;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #006e00;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        font-weight: bold;
        padding: 5px 27px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {background-color: #00ad00}

    .dropdown:hover .dropdown-content {
        display: block;
    }
    .img-responsive {
      float: left;
    }
  </style>
  
  </head>

<body>
 
  <!-- HEADER -->
    @include('header')
  <!-- HEADER -->


<div class="container">
<center>
  <h2>PRE-QUALIFICATION REGISTRATION</h2>

  </br>

  </br>
  <!-- DISPLAY INFO -->
<!--          <label for="example-text-input" class="col-2 col-form-label">NEW APPLICANT</label>-->
       
          <label for="example-text-input" class="col-2 col-form-label">{{ Auth::user()->name }}</label>
          <br>
          <label for="example-text-input" class="col-2 col-form-label">{{ Auth::user()->nric }}</label>
          <br>
             <a href="{{ url('/logout') }}" class="btn btn-warning "
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
       
<!-- DISPLAY INFO -->

</br>
<div class="panel-body"; style="color: blue">Choose <strong>ONE</strong> category based on your profession
        </div>
        </br>
<div class="container">
    <div class="row">
     
        <div class="col-sm-4" >
            
            <input type="image" src="{{URL::asset('/image/eia.png')}}" alt="Submit" height="100%" width="100%" style="box-shadow: 10px 10px 5px grey" disabled="">
            
            <br>  <br> 
            @if(count($eiaConsultant)>0)
                
               @if(empty($eiaConsultant[0]->endorse))
               <h3>  Waiting For Endorsement... </h3>
               @elseif($eiaConsultant[0]->endorse === 'reject')
                    Endorsement is rejected.
               @elseif($eiaConsultant[0]->endorse === 'approve')
               
                    <button type="button" class="btn btn-warning form-control"  onclick="window.location.href='/consultant_profile/eia'" >EIA CONSULTANT</button>
            
               @endif
            
            @else
            
                 @if(empty($eiaApplicant) || $eiaApplicant->status === 'In Process...'||$eiaApplicant->status === 'Declined'||$eiaApplicant->status === 'ReRegister')
                <button type="button" class="btn btn-success form-control"  onclick="window.location.href='/eiaSectionA/create'" >Register</button>
            @elseif($eiaApplicant->status === 'Approved')
                  @if($EiapayApprove>0)
                  @else
                <button type="button" class="btn btn-warning form-control" onclick="window.location.href='/makePayment/eia'">Make Payment</button>
                <br>&nbsp;
                  @endif
              
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
                                              
                                                    <button type="button" class="btn btn-info form-control" onclick="window.location.href='/take_quiz/{{$obj->id}}'">Proceed Self-Learning</button>
                                          @endif
                                    

                                @else
                                    <button type="button" class="btn btn-info form-control" onclick="window.location.href='/take_quiz/{{$obj->id}}'">Procced Self-Learning</button>
                                @endif
                                    
                            @else
                                <button type="button" class="btn btn-info form-control" disabled>Proceed Self-Learning</button>
                            @endif
                           
                        </td>
                    </tr>
                  
                     @endforeach
                </table>
               @else
               @endif
                
           @else
           @endif
            
            @endif
            
         </div>
 
             <div class="col-sm-4" >
            
                 <input type="image" src="{{URL::asset('/image/iets.png')}}" alt="Submit" height="100%" width="100%" style="box-shadow: 10px 10px 5px grey" disabled="">
            <br>  <br> 
        
             @if(count($ietsConsultant)>0)
              
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
           
           
           @endif
         </div>
        
        
        <div class="col-sm-4" >
            <input type="image" src="{{URL::asset('/image/apcs.png')}}" alt="Submit" height="100%" width="100%" style="box-shadow: 10px 10px 5px grey" disabled>
            <br>  <br> 
            @if(count($apcsConsultant)>0)
                
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
                <button type="button" class="btn btn-warning form-control" onclick="window.location.href='/makePayment/apcs'">Make Payment</button>
                <br>&nbsp;
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
           
           
           @endif
         </div>
    </div>    
         
      
    <div class="col-xs-12" style="height:50px;"></div>
              
</div></div>

<center>



<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 Jabatan Alam Sekitar
          </div>
        </div>
            
      </div>
    </footer>
      </div>

    <!-- templatemo 393 fantasy -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>
    </div>
<!-- FOOTER -->
</body>
</html>
