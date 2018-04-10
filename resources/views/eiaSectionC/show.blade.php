@extends('layouts.master')
@section('content')
@section('header', ': EIA : SECTION C - COMPETENCY COURSE FROM INSTITUT ALAM SEKITAR MALAYSIA (EiMAS)')
<html>
  <head>
    <title>CRS Online: Registration</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

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
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

    <!--<script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.maskedinput.js"></script> -->

    <body>
 <!-- <h4 class="text-center">SECTION A: PERSONAL INFORMATION</h4>
  <hr/>-->
  <div class="section" style="padding: 0px;">

    <div class="row" >
         
  
         <table class="table table-hover" style="width: 90%; margin-left: 2%">
    <thead>
      <tr style="background-color: #428bca">
      <th style="width: 5%">No.</th>
        <th style="width: 60%">Name / Course Title</th>
        <th style="width: 15%">Date Completed</th>
        <th style="width: 15%">Certificate No</th>
        <th colspan="2" style="width: 10%;text-align: center;">Action</th>
      </tr>
    </thead>
    <?php 
      $no=1;
    ?>
    <tbody>
    @foreach($eiaSectionC as $eiaSectionCs)
      <tr style="border-bottom: 1px solid #ddd;background-color: white">
      <td>{{$no++}}</td>
        <td>{{ $eiaSectionCs->course }}</td>
        <td>{{ $eiaSectionCs->date_complete}}</td>
        <td>{{ $eiaSectionCs->cert_no }}</td>
        <td><center>
        <a href="{{ route('eiaSectionC.edit', $eiaSectionCs->id) }}" >
          {{ Form::image('/image/edit.png', 'a Edit', array('title' => 'Edit', 'class' => 'btnimg')) }}</a>
          </td>
          <td>
         {!! Form::open(['route' => ['eiaSectionC.destroy', $eiaSectionCs->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
          <center>{!! Form::image('/image/delete.png', 'a Delete', ['type' => 'submit', 'class' => 'btnimg'] ) !!}</center>
          {!! Form::close() !!}
        </center></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
             <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              
               <a class="btn btn-primary" href="/eiaSectionB/create" role="button">Back</a>
              <a data-toggle="modal" data-target="#eiaSecC" class="btn btn-primary" role="button">Add New</a>
              <a href="/eiaSectionD/create" class="btn btn-primary" role="button">Next</a>
            </div>
          </div>
           </br></br>
           </div>
            <!-- add content -->
  <div class="modal fade" id="eiaSecC" role="dialog">
    <div class="modal-dialog" style="width: 80%">
    
      <!-- Reg content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">ADD NEW COMPETENCY COURSE FROM INSTITUT ALAM SEKITAR MALAYSIA (EiMAS)</h4></center>
        </div>
        <div class="modal-body">
    <!-- FORM -->
<div class="section">
  
  <div class="row" >
    

         <form class="form-horizontal" role="form" method="POST" action="{{ route('eiaSectionC.store')}}" name="eventForm" id="eventForm"  accept-charset="UTF-8"
  enctype="multipart/form-data">


    <div class="col-md-10">

    <div class="form-group" style="margin-left: 4%">
        <text style="margin-left: 2%"><b>Name / Course Title</b></text><br>
        <div class="col-xs-8">
             <select class="form-control input-sm" name="course" id="course" style="font-size: 15px;width: 155%">
            <option data-foo="" value="" selected="true">--Please select your competency course--</option>

          @foreach ($course as $course) 
          {

            <option value="{{ $course->course_name}}">{{ $course->course_name }}</option>
          }
          @endforeach
        </select>
        </div>
    </div>

    <div class="form-group" style="margin-left: 4%">
        <text style="margin-left: 2%"><b>Date Complete</b></text><br>
        <div class="col-xs-8 date">
            <div class="input-group input-append date" id="datePicker">
                <input type="text" class="form-control input-sm" name="date_complete" style="font-size: 15px"  />
                <span class="input-group-addon add-on" style="width: 20%"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>

    <div class="form-group" style="margin-left: 4%">
        <text style="margin-left: 2%"><b>Certification No.</b></text><br>
        <div class="col-xs-8">
            <input type="text" placeholder="Certification No." id="cert_no" name="cert_no"  class="form-control input-sm"   maxlength="10" minlength="3" style="font-size: 15px;width: 35%"/>  
        </div>
    </div>

   </hr>
           

      <div class="row">
            <div class="col-md-13" style=" margin-top: 10px; margin-bottom: 10px;">
              <button id="btnSubmit" type="submit" class="btn btn-primary pull-right">Next</button>
            </div>
          </div>
    </div>
</form>


     </div>
  </div>
  </div>
  </body>

  <script>
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
              endDate: '+0m +0D',
        }).on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').bootstrapValidator('revalidateField', 'date_complete');
        });

    $('#eventForm').bootstrapValidator({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            course: {
                validators: {
                    notEmpty: {
                        message: 'Name or Course Title is required'
                    }
                }
            },
            date_complete: {
                validators: {
                    notEmpty: {
                        message: 'Date Complete is required'
                    }
                   
                }
            },

             cert_no: {
                validators: {
                    notEmpty: {
                        message: 'Certification Number is required'
                    }
                }
            }
        }
    });
});

$(document).ready(function() {
  $("#eiaSecC").on("hidden.bs.modal", function() {
     document.location.reload();
  });
});
</script>


<script>
  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }
</script>
   


</html>
@endsection
