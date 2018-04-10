@extends('layouts.master')
@section('content')
@section('header', ': IETS : SECTION B - ACADEMIC QUALIFICATION')

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
        
          width: 100%;

        }

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

  <!-- NAVIGATION BAR -->
   <!-- NAVIGATION BAR -->
  
  <!-- NAVIGATION BAR -->


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
 <!--<h4 class="text-center">SECTION B: ACADEMIC QUALIFICATION</h4>
          <hr/>-->

<div class="section" style="padding: 0px;">
  
  <div class="row" >
    
   {!! Form::model($ietsSectionB, ['route' =>['ietsSectionB.update', $ietsSectionB->id], 'method' => 'PUT', 'files' => true]) !!}
            

           <div class="col-md-5" >

             <div class="form-group{{ $errors->has('featured_image') ? ' has-error' : '' }}">
              
                
                  <text><b>Name / Course Title</b></text><br>
                    {{ Form::radio('coursetitle', 'Bachelor in Science' , false) }}
          <text>Bachelor in Science</text><br>
           
          {{ Form::radio('coursetitle', 'Bachelor in Engineering' , false) }}
        
          <text>Bachelor in Engineering</text><br>
          {{ Form::radio('coursetitle', 'Master' , false) }}
         <text>Master</text><br>
           
          {{ Form::radio('coursetitle', 'PhD' , false) }}
          <text>PhD</text>
            </div>

            <div class="form-group" >
                
                  <text><b>Major</b></text><br>
                   {{ Form::text('major', null, array('id'=>'major','class' => 'form-control input-sm','placeholder'=>'Eg: Software Engineering','maxlength'=>150,'style'=>'font-size:15px'))}}
                
            </div>

          
           
            </div> <!-- div col-md-5 col-md-offset-1-->
            <div class="div col-md-5 col-md-offset-1">
              


            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                  <text><b>Name of University / College</b></text>
                  {{ Form::text('universityname', null, array('class' => 'form-control input-sm', 'placeholder'=>'Eg: Universiti Malaysia Pahang', 'maxlength'=>100,'style'=>'font-size:15px'))}}
               
            </div>
              

           

             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
             
                
                  <text><b>Period of Study</b></text><br>
                  
             <div class="col-xs-6" style="margin-left: -16px">
            <div class="input-group" >
              <span class="input-group-addon" >From</span>
              <!-- {!! Form::text('from', '', array('id' => 'datepicker', 'class' => 'form-control', 'style' => 'width: 70%'  )) !!} -->
            {{ Form::date('from', null, array('id' => 'datepicker', 'class' => 'form-control', 'style' => 'width: 90%','title' => 'mm/dd/yyyy', 'required' => '' )) }}
            </div>
          </div>
          <div class="col-xs-5">
            <div class="input-group">
              <span class="input-group-addon">To</span>
              <!-- {!! Form::text('to', '', array('id' => 'datepicker2', 'class' => 'form-control', 'style' => 'width: 70%')) !!} -->
                {{ Form::date('to', null, array('id' => 'datepicker2', 'class' => 'form-control', 'style' => 'width: 90%','title' => 'mm/dd/yyyy', 'required' => '' )) }}
            </div>
          </div>   
           
            </div>
	<br>
             <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" >
                  <text><b>File Uploaded</b></text><br>
                   <a class="file" href="/uploads/{{$ietsSectionB->cert}}" style="cursor: default;" target="_blank">{{$ietsSectionB->cert}}</a>
            </div>

             <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" >
                  <text><b>Academic Certification</b></text>
                  <input type="file" name="cert_file" accept=".pdf" onchange="ValidateSingleInput(this);"> 
                  <p class="text-info" style="font-size: 12px;color: #0073e6">Attachment Specification : pdf Only less than 10MB and file name not more than 10 characters</p>
            </div>




            </div>
            </hr>
           

      <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a class="btn btn-primary" href="/ietsSectionB/{{$ietsSectionB->id}}" role="button">Back</a>
              <button id="btnSubmit" type="submit" class="btn btn-primary ">Update</button>
            </div>
          </div>
      {!! Form::close() !!}
     </div>
  </div>

</div>
    
         
          

         
                          
</div>
</body>


<script type="text/javascript">
  $(function()
{
    $("#myform").bootstrapValidator(
      {
        fields: 
        {
           major:{
        validators :{
          notEmpty: {  message: 'Major is required' },
          stringLength: {
                        message: 'Major must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },
          

        

         universityname:{
        validators :{
          notEmpty: {  message: 'University Name is required' },
          stringLength: {
                        message: 'University Name must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },

          
      to : {
       
        validators : {
          notEmpty: { message: 'Period of Study is required'}
        }
      },
          
      
      coursetitle:{
        validators :{
          notEmpty: {  message: 'Name/Course Title is required' },      
        }
      },
         
            
          from : {
       
        validators : {
          notEmpty: { message: 'Period of Study is required'}
        }
      },

       bumiputerastatus : {
       
        validators : {
          notEmpty: { message: 'Period of Study is required'}
        }
      },

      cert_file: {
              validators: {
              
                file: {
                      extension:'pdf',
                      type: 'application/pdf',
                      maxSize: 10485760, //5MB (1024*5*1024=5242880)
                      message: 'The selected file not comply the file specification'
                }
            }
        }         
         
         
        },

        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        },

        errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.container') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         }


    });
});
</script>

<script type="text/javascript">
 var _validFileExtensions = [".pdf"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                 $('#validationfile').html("Your file format is invalid");
                oInput.value = "";
                return false;
            }
            else
               $('#validationfile').html("");
        }
    }
    var file = oInput.files[0];
    if (file.size > 10485760) {
         //Now Here I need to update <span> 

       alert('Filesize must 10mb or below');
        // don't want alert message
        oInput.value = "";
    }
    return true;
}
</script>

<script type="text/javascript">
      var start = 1900;
var end = new Date().getFullYear();
var options = "";
var options2 = "Select year";
  options += "<option disabled selected>"+ ""  +"</option>";
for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("year").innerHTML = options;


    </script>

    <script type="text/javascript">

      var start1 = 1900;
var end = new Date().getFullYear();
var options = "";
var options2 = "Select year";
  options += "<option disabled selected>"+ "" +"</option>";
for(var year = start1 ; year <=end; year++){

  options += "<option>"+ year +"</option>";
}
document.getElementById("year2").innerHTML = options;


    </script>


     <script>
function validateForm() {
   var now = new Date(from);
    var past = new Date(to);
    var nowYear = now.getFullYear();
    var pastYear = past.getFullYear();
    var y = pastYear - nowYear;
 if (y>5) {
        alert("The period of study must be not more than 5 years");
       $('#from').val('');
          $('#to').val('');  
    }


}
</script>

</html>
@endsection