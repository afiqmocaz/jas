@extends('layouts.master')
@section('content')
@section('header', ': APCS : SECTION E - TRAINING ATTENDED')
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
         
  <table class="table table-hover" style="width: 90%; margin-left: 2%">
    <thead>
      <tr style="background-color: #428bca">
        <th style="width: 5%">No.</th>
        <th style="width: 10%">Date Start</th>
        <th style="width: 10%">Date End</th>
        <th style="width: 20%">Name of Course / Seminar / Conference</th>
        <th style="width: 40%">Venue</th>
        <th colspan="2" style="width: 10%;text-align: center;">Action</th>
      </tr>
    </thead>
     <?php
  $no=1;?>
    <tbody>
      @foreach($apcsSectionE as $apcsSectionEs)
      <tr style="border-bottom: 1px solid #ddd;background-color: ">
      <td>{{$no++ }}</td>
        <td>{{ date('d/m/Y', strtotime($apcsSectionEs->starttrainning)) }}</td>
        <td>{{ date('d/m/Y', strtotime($apcsSectionEs->endtraining)) }}</td>
        <td>{{ $apcsSectionEs->seminarname }}</td>
        <td>{{ $apcsSectionEs->venue }}</td>
        <td><center>
        <a href="{{ route('apcsSectionE.edit', $apcsSectionEs->id) }}" >
          {{ Form::image('/image/edit.png', 'a Edit', array('title' => 'Edit', 'class' => 'btnimg')) }}</a>
          </td>
          <td>
          {!! Form::open(['route' => ['apcsSectionE.destroy', $apcsSectionEs->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
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
              
            @if(count($apcsSectionE) > 0)
              <a class="btn btn-primary" href="/apcsSectionD/create" role="button">Back</a>
              <a data-toggle="modal" data-target="#apcsSecE">
            {{ Form::button('Add New', array('class'=>'btn btn-primary ', 'type'=>'submit')) }}</a>

              <a href="/apcsSectionF/create" >
            {{ Form::button('Next', array('class'=>'btn btn-primary', 'type'=>'submit')) }}</a>

            @else
              <a class="btn btn-primary" href="/apcsSectionD/create" role="button">Back</a>
              <a data-toggle="modal" data-target="#apcsSecE">
            {{ Form::button('Add New', array('class'=>'btn btn-primary', 'type'=>'submit')) }}</a>
            @endif
            </div>
          </div>
           </br></br>
           </div>
            <!-- add content -->
  <div class="modal fade" id="apcsSecE" role="dialog">
    <div class="modal-dialog" style="width: 90%">
    
      <!-- Reg content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">ADD NEW TRAINING ATTENDED</h4></center>
        </div>
        <div class="modal-body">
<!-- FORM -->

  <div class="section">
  <div class="row" >
    
              
    {!! Form::open(['route' => 'apcsSectionE.store', 'data-parsley-validate'=> '', 'files'=> true,'id'=>'applicantFormD']) !!}
     
        
          <div class="col-md-5">
            

                <div class="form-group">
                  
             <div class="col-lg-6" style="margin-left: -16px">
            <div class="input-group" >
              <text><b>Date Start</b></text><br>
              <input type="date" class="form-control input-sm" id="datepicker" name="starttrainning" onchange="cal();calculate();dateValidate(this)" style="font-size: 15px;width: 100%"  />
            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group">
              <text><b>Date End</b></text><br>
             <input type="date" class="form-control input-sm" id="datepicker2" name="endtraining" onchange="cal();calculate()" style="font-size: 15px;width: 100%" />

          </div>   
            </div>
            </div>
            <br><br>

               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
             <text class=""><b>Name of Course / Seminar / Conference</b></text>
                   {{ Form::textarea('seminarname', null, array('class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Eg: ','style'=>'font-size: 15px'))}}
        
               </div>
      
            </div>


             

     


            <div class="col-md-5 col-md-offset-1">

            <div class="form-group">    
                <text class=""><b>Venue</b></text>
                     {{ Form::textarea('venue', null, array('class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Eg: ','style'=>'font-size: 15px'))}}      
              </div>
            </div>
            

         
            </hr>
            <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;">
              <button id="btnSubmit" type="submit" class="btn btn-primary pull-right">Next</button>
            </div>
          </div>
          </div>
 {!!Form::close()!!}         


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


  $('#applicantFormD').bootstrapValidator({
    feedbackIcons : {
      //valid : 'glyphicon glyphicon-ok',
      //invalid : 'glyphicon glyphicon-remove',
      //validating : 'glyphicon glyphicon-refresh'
    },
    fields : {
      
       starttrainning:{
        validators :{
          notEmpty: {  message: 'Date Start is required' }
        }
      },

       endtraining:{
        validators :{
          notEmpty: {  message: 'Date End is required' }
        }
      },



      seminarname:{
        validators :{
          notEmpty: {  message: 'Name of Course / Seminar / Conference is required' },
          stringLength: {
                        message: 'Name of Course / Seminar / Conference must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },
     
      venue : {
    
        validators : {
         notEmpty: {  message: 'Venue is required' },
          stringLength: {
                        message: 'Venue must be less than 255 characters',
                        max: function (value, validator, $field) {
                            return 255 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      }

    }
  });

    $(document).ready(function() {
  $("#apcsSecE").on("hidden.bs.modal", function() {
     document.location.reload();
  });
});

</script>

<script type="text/javascript">
  
$("#datepicker2").change(function () {
    var startDate = new Date(document.getElementById("datepicker").value);
    var endDate = new Date(document.getElementById("datepicker2").value);
    if ((Date.parse(endDate) <= Date.parse(startDate))) {
        alert("End Date should be greater than Start Date");
       $('[name="endtraining"]').val('');
          $('#applicantFormD').bootstrapValidator('revalidateField', 'endtraining', false);
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
