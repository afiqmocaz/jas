<?php session_start(); ?>

<!DOCTYPE html>

<html>
    <head>

    </head>

    <style type="text/css">
@page {
    
  
    margin-bottom:0;
    margin-left:0;
    margin-right:0;
    padding: 0;
  }
        body {
            background-image:url('http://crs.doe.gov.my/image/certificate_template4.jpg');
            max-width: 100%;
            height: auto;
            background-repeat:no-repeat;
           
        }
        
       .text {
            font-size:100%;
            font-weight: bold;
            text-transform: uppercase;
            margin-right: 18%;
            padding-right: 70px;
            padding-left: 170px;
            font-family:Arial;
        }
         .text2 {
            font-size:100%;
            font-weight: bold;
            text-transform: uppercase;
            margin-right: 18%;
            padding-right: 70px;
            padding-left: 85px;
           width: 90%;
            margin-top: 13px;
            font-family:Arial;
        }
           .text3 {
            font-size:100%;
            font-weight: bold;
            text-transform: uppercase;
            margin-right: 10%;
            padding-left: 85px;
            margin-bottom: 30px;
            margin-top: -20px;
            float: right;
            font-family:Arial;
        }
    </style>
    <body><br><br>@if($data->category === 'iets')
    <div class="text2">CSIETSC-<?php echo sprintf('%04d', $data->user->id);?><div class="text3">EXPIRY DATE:{{ date('d/m/Y', strtotime($data->expired)) }}</div></div>
    @elseif($data->category === 'apcs')
    <div class="text2">CSAPCSC-<?php echo sprintf('%04d', $data->user->id);?><div class="text3">EXPIRY DATE:{{ date('d/m/Y', strtotime($data->expired)) }}</div></div>
     @elseif($data->category === 'eia')
    <div class="text2">QP-<?php echo sprintf('%06d', $data->user->id);?><div class="text3">EXPIRY DATE:{{ date('d/m/Y', strtotime($data->expired)) }}</div></div>
    @endif
     
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   
    <center>
        <div >
            <div class="text">{{$data->user->name}}</div>
             <div class="text">{{$data->user->nric}} </div>
            
            <br><br><br><br><br><br><br><br>
          
            <div class="text">COMPETENT PERSON</div>
          
                
               @if($data->category === 'eia')
                <div class="text">
                @foreach( $data->user->certEiaSectionE as $obj)
                    {{$obj->first_specialize}}
                    {{$obj->second_specialize}}
                @endforeach
                </div>
               @endif
               
                @if($data->category === 'iets')
                <div class="text">
                @foreach( $data->user->certIetsSectionE as $obj)
                    {{$obj->first_specialize}}
                    {{$obj->second_specialize}}
                @endforeach
                </div>
               @endif
               
               @if($data->category === 'apcs')
                <div class="text">
                @foreach( $data->user->certApcsSectionE as $obj)
                    {{$obj->first_specialize}}
                    {{$obj->second_specialize}}
                @endforeach
                </div>
               @endif
                
           
            <br>
            <div class="text">{{$data->expired->format('d M Y')}}</div>
            
         
        </div>
   
    </center>
    </body>
    
</html>