@extends('layouts.master')
@section('content')
@section('header', ': EIA : SECTION B - ACADEMIC QUALIFICATION')
<html>
  <head>
    <title>CRS Online: Registration</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">
      @include('sidebar2') 
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
    .btnimg {cursor: pointer; width: 30px; height: 30px;}

 
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
         
  
     <div class="table-responsive">

         <table class="table table-hover" style="width: 80%; margin-left: 3%; overflow: auto;">
    <thead>
      <tr style="background-color: #428bca">
        <th style="width: 5%">No.</th>
        <th style="width: 15%">Name / Course Title</th>
        <th style="width: 20%">Major</th>
        <th style="width: 20%">University Name</th>
        <th style="width: 10%">From</th>
        <th style="width: 15%">To</th>
        <th style="width: 10%">Academic Certification</th>
        <th colspan="2" style="width: 10%"><center>Action</center></th>
      </tr>
    </thead>
    <?php
    $no=1;
    ?>
    <tbody>
    @foreach($eiaSectionB as $eiaSectionBs)
      <tr  style="border-bottom: 1px solid #ddd;background-color: white">
      <td>{{ $no++ }}</td>
        <td>{{ $eiaSectionBs->coursetitle }}</td>
        <td>{{ $eiaSectionBs->major }}</td>
        <td>{{ $eiaSectionBs->universityname }}</td>
        <td>{{ $eiaSectionBs->date_from }}</td>
        <td>{{ $eiaSectionBs->date_to }}</td>
        <td>
        <a class="file" href="/uploads/{{$eiaSectionBs->cert}}" target="_blank" style="color:blue;">{{$eiaSectionBs->cert}}</a>
        </td>
        <td><center>
        <a href="{{ route('eiaSectionB.edit', $eiaSectionBs->id) }}" >
        {{ Form::image('/image/edit.png', 'a Edit', array('class' => 'btnimg', 'title' => 'Edit')) }}
          </a>
          </td>
          <td>
         {!! Form::open(['route' => ['eiaSectionB.destroy', $eiaSectionBs->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

                <center>{!! Form::image('/image/delete.png', 'a Delete', ['type' => 'submit', 'class' => 'btnimg'] ) !!}</center>
                  {!! Form::close() !!}
        </center></td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
 
  <div class="row">

	 <div  style=" margin-top: 10px; margin-bottom: 10px; padding-right: 50px" align="right">
              @if(count($eiaSectionB) > 0)
              <a class="btn btn-primary" href="/eiaSectionA/create" role="button">Back</a>
              <a data-toggle="modal" data-target="#eiaSecB" class="btn btn-primary" role="button">Add New</a>
            <a href="/eiaSectionC/create" class="btn btn-primary" role="button">Next</a>

            @else
             <a class="btn btn-primary" href="/eiaSectionA/create" role="button">Back</a>
             <a data-toggle="modal" data-target="#eiaSecB" class="btn btn-primary" role="button">Add New</a>
            @endif
            </div>
     </div>
                    <!-- add content -->
  <div class="modal fade" id="eiaSecB" role="dialog">
    <div class="modal-dialog" style="width: 80%">
    
      <!-- Reg content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">ADD NEW ACADEMIC QUALIFICATIONS</h4></center>
        </div>
        <div class="modal-body">
<!-- FORM -->

<div class="section">
  
  <div class="row" >
    
   {!! Form::open(['route' => 'eiaSectionB.store', 'data-parsley-validate'=> '', 'files'=> true,'id'=>'myform']) !!}
            

           @if(count($eiaSectionB) > 0)
           <div class="col-md-5" >

             <div class="form-group{{ $errors->has('featured_image') ? ' has-error' : '' }}">
              
                
                  <text><b>Name / Course Title</b></text><br>
                   <input type="radio" name="coursetitle" value="Bachelor in Science" required=""/>
        Bachelor in Science
        <br>
        <input type="radio" name="coursetitle" value="Bachelor in Engineering" required=""/>
        Bachelor in Engineering
        <br>
        <input type="radio" name="coursetitle" value="Master" required=""/>
        Master
        <br>
               <input type="radio" name="coursetitle" value="PhD" required=""/>
        PhD
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
                  
             <div class="col-lg-6" style="margin-left: -16px">
            <div class="input-group" >
              <span class="input-group-addon" >From</span>
              <!-- {!! Form::text('from', '', array('id' => 'datepicker', 'class' => 'form-control', 'style' => 'width: 70%'  )) !!} -->
             <select id="year" name="from" class="form-control input-sm"  style="font-size:15px">
               
             </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">To</span>
              <!-- {!! Form::text('to', '', array('id' => 'datepicker2', 'class' => 'form-control', 'style' => 'width: 70%')) !!} -->
              <select id="year2" name="to" class="form-control input-sm" style="font-size:15px"  onchange="validateForm(this);"></select>
            </div>
          </div>   

            </div>

            <br><br>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" >
                  <text><b>Academic Certification</b></text>
                  <input type="file" name="cert_file"  accept=".pdf" style="font-size:15px"  onchange="ValidateSingleInput(this);">
    <p class="text-info" style="font-size: 12px;color: #0073e6">Attachment Specification : pdf Only less than 10MB and file name not more than 10 characters</p>  
            </div>

            </div>
            @else
               <div class="col-md-5" >

             <div class="form-group{{ $errors->has('featured_image') ? ' has-error' : '' }}">
              
                
                  <text><b>Name / Course Title</b></text><br>
                   <input type="radio" name="coursetitle" value="Bachelor in Science" required=""/>
        Bachelor in Science
        <br>
        <input type="radio" name="coursetitle" value="Bachelor in Engineering" required=""/>
        Bachelor in Engineering
        <br>
       
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
                  
             <div class="col-lg-6" style="margin-left: -16px">
            <div class="input-group" >
              <span class="input-group-addon" >From</span>
              <!-- {!! Form::text('from', '', array('id' => 'datepicker', 'class' => 'form-control', 'style' => 'width: 70%'  )) !!} -->
             <select id="year" name="from" class="form-control input-sm"  style="font-size:15px">
               
             </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">To</span>
              <!-- {!! Form::text('to', '', array('id' => 'datepicker2', 'class' => 'form-control', 'style' => 'width: 70%')) !!} -->
              <select id="year2" name="to" class="form-control input-sm" style="font-size:15px"  onchange="validateForm(this);"></select>
            </div>
          </div>   

            </div>

            <br><br>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" >
                  <text><b>Academic Certification</b></text>
                  <input type="file" name="cert_file"  accept=".pdf" style="font-size:15px"  onchange="ValidateSingleInput(this);">
    <p class="text-info" style="font-size: 12px;color: #0073e6">Attachment Specification : pdf Only less than 10MB</p>  
            </div>
            @endif         
	   </hr>
           

      <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;">
              <button id="btnSubmit" type="submit" class="btn btn-primary pull-right">Next</button>
            </div>
          </div>
      </form>
     </div>
  </div>
</div>
    </div>
  </div>
  </body>

  <script type="text/javascript">
  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }

 
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

      
      cert_file: {
              validators: {
                 notEmpty: { message: 'Academic Certification is required'},
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
      var start = 1950;
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

      var start1 = 1950;
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
    var x = document.forms["myform"]["year"].value;
    var y = document.forms["myform"]["year2"].value;

    var z= y-x;

    if (x >= y) {
        alert("The year from must be smaller than the year to.");
       
    }

    if(z>=6)
    {
      alert("The year of studies must be 5 years max");
        
    }


    
}

$(document).ready(function() {
  $("#eiaSecB").on("hidden.bs.modal", function() {
     document.location.reload();
  });
});
</script>

</html>
@endsection
