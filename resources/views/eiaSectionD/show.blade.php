@extends('layouts.master')
@section('content')
@section('header', ': EIA : SECTION D - PRACTICAL EXPERIENCES')
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

    input[type="date"] {
        position: relative;
        width: 150px; height: 25px;
        color: white;
    }

    input[type="date"]:before {
        position: absolute;
        /*top: 3px;*/ left: 3px;
        content: attr(data-date);
        display: inline-block;
        color: black;
    }

    input[type="date"]::-webkit-datetime-edit, input::-webkit-inner-spin-button, input::-webkit-clear-button {
        display: none;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 3px;
        right: 0;
        color: black;
        opacity: 1;
    }

    </style>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.sheepItPlugin.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
    <!--<script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.maskedinput.js"></script> -->

    <script type='text/javascript'>
    //<![CDATA[
    $(function(){
      $("input[type='date']").on("change", function() {
          this.setAttribute(
              "data-date",
              moment(this.value, "YYYY-MM-DD")
              .format( this.getAttribute("data-date-format") )
          )
      }).trigger("change")
    });//]]> 

    </script>

    <body>
 <!-- <h4 class="text-center">SECTION A: PERSONAL INFORMATION</h4>
  <hr/>-->
  <div class="section" style="padding: 0px;">

    <div class="row" >
        <div class="table-responsive">
           <table class="table table-hover" style="width:80%;margin-left: 3%;overflow: auto;">
    <thead>
      <tr style="background-color: #428bca">
   <th>No</th>
        <th>Participation in</th>
        <th>Name of Project</th>
        <th>Position</th>
        <th>Responsibilities</th>
        <th>Date Start</th>
        <th>Date End</th>
        <th>Number of Days</th>
        <th>Name</th>
        <th>Referer Position</th>
        <th>Address</th>
        <th>Email</th>
        <th style="width: 30%">Supporting Document</th>
        <th colspan="2" style="text-align: center;">Action</th>
      </tr>
    </thead>
  <?php
  $no=1;?>
    <tbody>
    @foreach($eiaSectionD as $eiaSectionDs)
      <tr style="border-bottom: 1px solid #ddd;background-color: ;">
  <td>{{$no++}}</td>
        <td>{{ $eiaSectionDs->participate }}</td>
        <td>{{ $eiaSectionDs->project_name }}</td>
        <td>{{ $eiaSectionDs->position }}</td>
        <td>{{ $eiaSectionDs->responsibilities }}</td>
        <td>{{ date('d/m/Y', strtotime($eiaSectionDs->dateStart)) }}</td>
        <td>{{ date('d/m/Y', strtotime($eiaSectionDs->dateEnd)) }}</td>
        <td>{{ $eiaSectionDs->numdays }}</td>
        <td>{{ $eiaSectionDs->ref_name }}</td>
        <td>{{ $eiaSectionDs->ref_position }}</td>
        <td>{{ $eiaSectionDs->ref_address }}</td>
        <td>{{ $eiaSectionDs->ref_email }}</td>
        <td><a class="file" style="color:blue" href="/uploads/{{$eiaSectionDs->supportdoc}}" target="_blank">{{$eiaSectionDs->supportdoc}}</a>
        </td>
        <td>
        <a href="{{ route('eiaSectionD.edit', $eiaSectionDs->id) }}" >
          {{ Form::image('/image/edit.png', 'a Edit', array('title' => 'Edit', 'class' => 'btnimg')) }}</a>
          </td>
          <td>
          {!! Form::open(['route' => ['eiaSectionD.destroy', $eiaSectionDs->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
          {!! Form::image('/image/delete.png', 'a Delete', ['type' => 'submit', 'class' => 'btnimg'] ) !!}
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
      <tr style="border-bottom: 1px solid #ddd;background-color: #f2f2f2">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2" valign="right"><strong style="color: blue">Total Month</strong></td>
        <td><strong style="color: blue">{{$eiaSectionD2}}</strong></td>
        <td colspan="7"></td>
      </tr>
    </tbody>
  </table>
         
        </div>  
    
  <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              
              <a class="btn btn-primary" href="/eiaSectionC/create" role="button">Back</a>
              <a data-toggle="modal" data-target="#eiaSecD" class="btn btn-primary" role="button">Add New</a>
              <a href="/eiaSectionE/create" class="btn btn-primary" role="button">Next</a>
            </div>
          </div>
    </div>
  </div>
  <div class="modal fade" id="eiaSecD" role="dialog">
    <div class="modal-dialog" style="width: 90%">
    
      <!-- Reg content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">ADD NEW PRACTICAL EXPERIENCE</h4></center>
        </div>
        <div class="modal-body">
    <!-- FORM -->
<div class="section">
  
  <div class="row" >
    
   {!! Form::open(['route' => 'eiaSectionD.store', 'data-parsley-validate'=> '', 'files'=> true,'id'=>'applicantFormD']) !!}
     
        
          <div class="col-md-5">
            <div class="form-group">    
                <text><b>Participation in</b></text>
                   <select name="participate" id="participate" class="form-control input-sm" style="font-size: 15px;width: 100%">
                   <option data-foo="" value="" disabled="true" selected="true" >--Please select your participation--</option>

                  @foreach ($manexp as $manexp) 
                  {

                    <option value="{{ $manexp->name_envmanexp}}">{{ $manexp->name_envmanexp }}</option>
                  }
                  @endforeach
                </select>          
              </div>


              <div class="form-group">    
                <text><b>Name of Project</b></text>
                 {{ Form::textarea('project_name', '', array('class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Enter your project name','maxlength'=>100,'style'=>'font-size:15px'))}}        
              </div>



              <div class="form-group">    
                <text><b>Position</b></text>
                 <select name="position" class="form-control input-sm" style="font-size: 15px">
                  <option data-foo="" value="" disabled="true" selected="true" >--Please select your position--</option>

                @foreach ($position as $position) 
                {

                  <option value="{{ $position->position_name}}">{{ $position->position_name }}</option>
                }
                @endforeach
              </select>          
              </div>


              <div class="form-group">    
                <text><b>Responsibilities</b></text>

                     {{ Form::textarea('responsibilities', '', array('class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Enter your responsibilities','maxlength'=>255,'style'=>'font-size:15px'))}} 
 
                  </textarea>         
              </div>


               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  
             <div class="col-lg-5" style="margin-left: -16px">
            <div class="input-group" >
              <text><b>Date Start</b></text><br>
              <input type="date" data-date="" data-date-format="DD/MM/YYYY" value="<?=date('Y-m-d', strtotime('-2 days'))?>" id="datepicker" name="dateStart" onchange="cal();calculate()" />
            </div>
          </div>
          <div class="col-lg-">
            <div class="input-group">
              <text><b>Date End</b></text><br>
             <input type="date" data-date="" data-date-format="DD/MM/YYYY" value="<?=date('Y-m-d')?>" id="datepicker2" name="dateEnd" onchange="cal();calculate()" />
        
          </div>   
            </div></div>

            
         

              <div class="form-group">    
             <text id="numdays">Number of days:</text><input type="textbox" class="textbox" id="numdays2" name="numdays" readonly="readonly" style="width:10%;background-color: #d1e0e0">
             &nbsp&nbsp&nbsp&nbsp
          <text id="numMonths">Number of months:</text>
          <input type="textbox" class="textbox" id="numMonths2" name="numMonths" readonly="readonly" style="width: 10%;background-color: #d1e0e0">   
  
              </div>

             <div class="form-group">    
                <text class=""><b>Supporting Document</b></text>
                   <input name="supportdoc" id="supportdoc" type="file" title="Supporting Document"> 
                   <p class="text-info" style="font-size: 12px;color: #0073e6">Attachment Specification : pdf Only less than 10MB and file name not more than 10 characters</p>      
              </div>
             
            </div>


            <div class="col-md-5 col-md-offset-1">

             
               

              <text style="color: #0073e6;font-size:15px"><b>Project Reference</b></text></center></u>

              <div class="form-group">    
                <text class=""><b>Name</b></text>
                  {{ Form::text('ref_name', '', array('id'=>'ref_name','class' => 'form-control input-sm', 'maxlength'=>'255','placeholder'=>'Eg: Hussin Bin Muhammad','minlength'=>3,'style'=>'font-size:15px'))}}   
              </div>
              

            <div class="form-group">    
                <text class=""><b>Referer Position</b></text><br>
                 {{ Form::text('ref_position', '', array('id'=>'ref_position','class' => 'form-control input-sm', 'maxlength'=>'50','placeholder'=>'Eg: Site Supervisor', 'minlength'=>5,'style'=>'font-size:15px'))}}   
              </div>

              <div class="form-group">    
                <text class=""><b>Address</b></text>
                   {{ Form::textarea('ref_address', '', array('id'=>'ref_address','class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Eg: No. 64, Jln Pahlawan 21, Taman Pahlawan', 'maxlength'=>'255','minlength'=>10,'style'=>'font-size:15px'))}}  
              </div>

              <div class="form-group">    
                <text class=""><b>Email Address</b></text>
                  {{ Form::email('ref_email', '', array('id'=>'ref_email','class' => 'form-control input-sm', 'style' => 'width: 50%', 'maxlength'=>'100','placeholder'=>'Eg: izzat@gmail.com','style'=>'font-size:15px'))}}            
                  
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
      
       participate:{
        validators :{
          notEmpty: {  message: 'Participation in is required' }
        }
      },

       project_name:{
        validators :{
          notEmpty: {  message: 'Name of Project in is required' }
        }
      },



      position:{
        validators :{
          notEmpty: {  message: 'Position is required' }
        }
      },

      responsibilities:{
        validators :{
          notEmpty: {  message: 'Responsibilities is required' },
          stringLength: {
                        message: 'Responsibilities must be less than 255 characters',
                        max: function (value, validator, $field) {
                            return 255 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },
     
      dateStart : {
    
        validators : {
          notEmpty: { message: 'Date start is required'}
        }
      },

       dateEnd : {
        
        validators : {
          notEmpty: { message: 'Date End is required'}
        }
      },

       supportdoc: {
              validators: {
                  notEmpty: { message: 'Supporting document is required'},

                file: {
                      extension: 'pdf',
                      type: 'application/pdf',
                      maxSize: 1048576, //5MB (1024*5*1024=5242880)
                      message: 'The selected file not comply the file specification'
                }
            }
        },

      

      ref_position:{
        validators :{
          notEmpty: {  message: 'Referer position is required' },
          stringLength: {
                        message: 'Referer position must be less than 50 characters',
                        max: function (value, validator, $field) {
                            return 50 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },

      ref_name:{
        validators :{
          notEmpty: {  message: 'Referer name is required' },
          stringLength: {
                        message: 'Referer name must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },



        ref_address:{
        validators :{
          notEmpty: {  message: 'Referer Address is required' },
          stringLength: {
                        message: 'Referer Address must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },

       ref_email:{
        validators :{
          notEmpty: {  message: 'Email Address is required' },
          emailAddress: { message: 'Please enter a valid email address' },
          stringLength: {
                      message: 'Email Address must be less than 100 characters',
                      max: function (value, validator, $field) {
                          return 100 - (value.match(/\r/g) || []).length;
                      }
                },
                
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

$(document).ready(function() {
  $("#eiaSecD").on("hidden.bs.modal", function() {
     document.location.reload();
  });
});
</script>

<script type="text/javascript">
  
$("#datepicker2").change(function () {
    var startDate = new Date(document.getElementById("datepicker").value);
    var endDate = new Date(document.getElementById("datepicker2").value);
    if ((Date.parse(endDate) <= Date.parse(startDate))) {
        alert("End date should be greater than Start date");
       $('[name="dateEnd"]').val('');
          $('#applicantFormD').bootstrapValidator('revalidateField', 'dateEnd', false);
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
  
    $('#datepicker2').attr('max', maxDate);
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


</html>
@endsection
