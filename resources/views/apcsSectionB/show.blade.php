@extends('layouts.master')
@section('content')
@section('header', ': APCS : SECTION B - FIELD SPECIALIZATION')
<html>
  <head>
    <title>CRS Online: Registration</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">
      @include('apcs_sidebar') 
    </head>
    <style>
      
        body {font-family: arial; 
        }
        form{font-size: 15px;
          
          width: 100%}
        
      .col-md-4 h1{ color : #9f00a7; font-family: calibri, arial; font-weight: bold; font-size: 30px; position: relative; left: 30px;} 
    .header{background: white; width : 100%; }
    .header a{color: rgb(100,100,100); padding: 20px; position: relative; top : 30px;font-family: calibri, arial;font-weight: 900;  }
    #col-md-4{ height: 50px;}
    .header a:hover{ transition-duration: 0.3s; color: rgb(0,0,0); }
    
    /*container design*/
    .control-label{float: left;}
    .container .inner{width: 480px; margin: 50px auto; border : 1px solid none; background: rgba(55,55,55, 0.4); padding: 50px;transition-duration: 0.7s;}
    .container .inner:hover{-webkit-transform:skew(0deg,0deg); -moz-transform:skew(0deg,0deg);-o-transform:skew(0deg,0deg);transition-duration: 0.7s; background: transparent;}
    .inner h1{color : rgb(200,200,200); font-family: calibri, arial; font-weight: bold; text-align: center; font-size: 20px}
    .inner h3{color: rgb(200,200,200); font-size: 18px; font-family: calibri; text-align: center; margin-top: -5px}
    .inner form label span{color: white;}
    .inner form lagend{color: white;}
    .inner .input{width : 100%; border: none; border-bottom: 1px solid white; color: #9f00a7; background: transparent; padding: 10px;}
    .inner .input:focus{box-shadow: none; border: 1px solid none;}
    .container hr{border-color: rgb(100,100,100);}
    .inner .button{border-radius:10px 10px 10px 10px;color: #FFFFFF; background: rgba(50,50,50, 0.4); padding: 2px 30px ;  border: 2px solid #9f00a7;  font-family: calibri; margin:10px auto; font-weight: bold;}
    .inner .button:hover{background: #8f00a7; color: white;}

    </style>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.sheepItPlugin.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrapValidator.min.js"></script>
    <!--<script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.maskedinput.js"></script> -->

    <body>
 <!-- <h4 class="text-center">SECTION A: PERSONAL INFORMATION</h4>
  <hr/>-->
  <div class="section" style="padding: 0px;">

    <div class="row" >
         
  
          <form role="form" method="POST" action="" name="applicantForm" id="applicantForm"  accept-charset="UTF-8"
  enctype="multipart/form-data">
  @foreach($apcsSectionB as $apcsSectionBs)
        
          <div class="col-md-5">
         
              @if ($apcsSectionBs->specialize_0 != '')
            <div class="form-group">    
                <text><b>Specialization 1</b></text>
                  <input name="name" id="name" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your name" value=" {{$apcsSectionBs->specialize_0}}" style="font-size: 15px" readonly="">  
                              
              </div>
              @endif


              @if ($apcsSectionBs->specialize_1 != '')
               <div class="form-group">    
                <text><b>Specialization 2</b></text>
                  <input name="name" id="name" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your name" value="{{$apcsSectionBs->specialize_1}}" style="font-size: 15px" readonly="">  
                              
              </div>
              @endif

             

              
             
  
              
             

                           
             
            </div>


            <div class="col-md-5 col-md-offset-1">
               @if ($apcsSectionBs->specialize_2!= '')
              <div class="form-group">    
                  <text><b>Specialization 3</b></text>
                  
                    <input name="city" id="city" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your name" value="{{ $apcsSectionBs->specialize_2}}" style="font-size: 15px" readonly="">  
               
              </div>
              @endif


               @if ($apcsSectionBs->specialize_3!= '')
              <div class="form-group">    
                <text><b>Specialization 4</b></text>
                
          <input name="city" id="city" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your name" value="{{ $apcsSectionBs->specialize_3 }}" style="font-size: 15px" readonly="">  
      
                        
              </div>
              @endif


                

                

            

             

         
              
              
              

            
            </div>
            </hr>
          
          </div>
          @endforeach
 </form>
  <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">

              <a class="btn btn-primary" href="/apcsSectionA/create" role="button">Back</a>
              <a href="{{ route('apcsSectionB.edit', $apcsSectionBs->id) }}" >
            {{ Form::button('Edit', array('class'=>'btn btn-primary ', 'type'=>'submit')) }}</a>

              <a href="/apcsSectionC/create" >
            {{ Form::button('Next', array('class'=>'btn btn-primary', 'type'=>'submit')) }}</a>

            </div>
          </div>
    </div>
  </div>
  </body>

  <script type="text/javascript">
  
  

 

</script>

</html>
@endsection
