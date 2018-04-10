@extends('layouts.master')
@section('content')
@section('header', ': IETS : SECTION C - PRACTICAL EXPERIENCES')
<html>
  <head>
    <title>CRS Online: Registration</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">

       @include('iets_sidebar')
    </head>
    <style>
      
        body {font-family: arial; }
        form{font-size: 15px;
            width: 100%}
        
div.has-error{
margin: -5px; } 
      .col-md-4 h1{ color : #9f00a7; font-family:  arial; font-weight: bold; font-size: 30px; position: relative; left: 30px;} 
    .header{background: white; width : 100%; }
    .header a{color: rgb(100,100,100); padding: 20px; position: relative; top : 30px;font-family:  arial;font-weight: 900;  }
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
   <!-- <h4 class="text-center">SECTION D: PRACTICAL EXPERIENCES</h4>
          <hr/>-->
          @if (Session::has('success'))

        <div class="alert alert-success" role="alert">
    
        <strong>Success:</strong>  {{ Session::get('success') }}

        </div>

        @endif

        @if (count($errors) > 0)

        <div class="alert alert-danger" role="alert">

        <strong>Errors:</strong><ul>
        @foreach ($errors->all() as $error)
          <br><li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>

        @endif
  <div class="section" style="padding: 0px;">
    <div class="row">
        
      {!! Form::model($ietsSectionC, ['route' =>['ietsSectionC.update', $ietsSectionC->id], 'method' => 'PUT', 'files' => true,'id'=>'applicantFormC']) !!}
     
        
          <div class="col-md-5">
            

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  
             <div class="col-lg-6" style="margin-left: -16px">
            <div class="input-group" >
              <text><b>Date of Project Start</b></text><br>
               {!! Form::date('projectStart', null, array('id' => 'datepicker', 'class' => 'form-control input-sm', 'style' => 'width: 100%;font-size:15px', 'title' => 'mm/dd/yyyy','onchange' => 'cal();calculate()' )) !!}
            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group">
              <text><b>Date of Project Complete</b></text><br>
              {!! Form::date('projectComplete', null, array('id' => 'datepicker2', 'class' => 'form-control', 'style' => 'width: 100%;font-size:15px', 'title' => 'mm/dd/yyyy','onchange' => 'cal();calculate()' )) !!}
        
          </div>   
            </div>
            </div>
            

             <br><br>

               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
             
                  
             <div class="col-lg-6" style="margin-left: -16px">
            <div class="input-group" >
             <text id="numdays">Number of days:</text>
             <input type="textbox" class="textbox" id="numdays2" name="numdays" readonly="readonly" style="width:17%;background-color: #d1e0e0" value="{{$ietsSectionC->numdays}}">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="input-group">
            
              <text id="numMonths">Number of months:</text>
          <input type="textbox" class="textbox" id="numMonths2" name="numMonths" readonly="readonly" style="width: 17%;background-color: #d1e0e0" value="{{$ietsSectionC->numMonths}}">           
           </div>
          </div>   

      
            </div>
            <br>

             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            
          <text class=""><b>Title of Proposal</b></text>
            {{ Form::textarea('proposaltitle', null, array('style'=>'font-size: 15px', 'class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Eg: '))}}
          </div>   

      
            </div>


             

     


            <div class="col-md-5 col-md-offset-1">

            <div class="form-group">    
                <text class=""><b>Name of Client</b></text>
                    {{ Form::text('clientname', null, array('class' => 'form-control input-sm', 'style' => 'font-size:15px', 'placeholder'=>'Eg: Jabatan Alam Sekitar'))}}      
              </div>

              <div class="form-group">    
                <text class=""><b>Address of Client</b></text>
                    {{ Form::textarea('clientaddress', null, array('style'=>'font-size: 15px', 'class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Eg: '))}}     
              </div>

              <div class="form-group">    
                <text class=""><b>Supporting Document Uploaded</b></text><br>
                   <a class="file" href="/uploads/{{$ietsSectionC->supportdoc}}" style="cursor: default;" target="_blank">{{$ietsSectionC->supportdoc}}</a>
                        
              </div>


             <div class="form-group">    
                <text class=""><b>Supporting Document</b></text>
                   <input name="supportdoc" id="supportdoc" type="file" title="Supporting Document"> 
                      <p class="text-info" style="font-size: 12px;color: #0073e6">Attachment Specification : pdf Only less than 10MB and file name not more than 10 characters</p>
                        
              </div>


               


            </div>
            

         
            </hr>
            <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a class="btn btn-primary" href="/ietsSectionC/{{$ietsSectionC->id}}" role="button">Back</a>
              <button id="btnSubmit" type="submit" class="btn btn-primary" style="">Update</button>
            </div>
          </div>
          </div>
 {!!Form::close()!!}
    </div>
  </div>
  </body>

  <script type="text/javascript">
  $('#applicantFormC').bootstrapValidator({
    feedbackIcons : {
      //valid : 'glyphicon glyphicon-ok',
      //invalid : 'glyphicon glyphicon-remove',
      //validating : 'glyphicon glyphicon-refresh'
    },
    fields : {
      
       projectStart:{
        validators :{
          notEmpty: {  message: 'Date Start is required' }
        }
      },

       projectComplete:{
        validators :{
          notEmpty: {  message: 'Date Complete is required' }
        }
      },



      proposaltitle:{
        validators :{
          notEmpty: {  message: 'Title of Proposal is required' }
        }
      },

      clientname:{
        validators :{
          notEmpty: {  message: 'Name of Client is required' },
          stringLength: {
                        message: 'Responsibilities must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },
     
      clientaddress : {
    
        validators : {
         notEmpty: {  message: 'Address of Client is required' },
          stringLength: {
                        message: 'Address must be less than 255 characters',
                        max: function (value, validator, $field) {
                            return 255 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },

      
       supportdoc: {
              validators: {
                
                file: {
                      extension: 'pdf',
                      type: 'application/pdf',
                      maxSize: 1048576, //5MB (1024*5*1024=5242880)
                      message: 'The selected file not comply the file specification'
                }
            }
        } 


    }
  });

    function GetDays(){
                var dropdt = new Date(document.getElementById("datepicker2").value);
                var pickdt = new Date(document.getElementById("datepicker").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("datepicker2")){
            document.getElementById("numdays2").value=GetDays();
        }  
    }

    </script>




 <script type="text/javascript">
        function GetMonths(){
                var dropdate = new Date(document.getElementById("datepicker2").value);
                var pickdate = new Date(document.getElementById("datepicker").value);
                return parseInt((dropdate - pickdate) / (24 * 3600 * 1000) / 30);
        }

        function calculate(){
        if(document.getElementById("datepicker2")){
            document.getElementById("numMonths2").value=GetMonths();
        }  
    }


</script>

<script type="text/javascript">
  
$("#datepicker2").change(function () {
    var startDate = new Date(document.getElementById("datepicker").value);
    var endDate = new Date(document.getElementById("datepicker2").value);
    if ((Date.parse(endDate) <= Date.parse(startDate))) {
        alert("Date Complete should be greater than Date Start");
       $('[id="datepicker2"]').val('');
          $('#applicantFormC').bootstrapValidator('revalidateField', 'projectComplete', false);
    }
});

</script>


<script type="text/javascript">
  $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
  
    $('#datepicker').attr('max', maxDate);
});
</script>
<script type="text/javascript">
  $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
  
    $('#datepicker2').attr('max', maxDate);
});
</script>


</html>

@endsection