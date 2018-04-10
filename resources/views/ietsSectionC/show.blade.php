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
             
             <table class="table table-hover" style="width: 90%; margin-left: 2%">
                        <thead>
                            <tr style="background-color: #428bca">
                                <th style="width: 5%">No.</th>
                                <th style="width: 10%">Date of Project Start</th>
                                <th style="width: 10%">Date of Project Completion</th>
                                <th style="width: 5%">Number of Days</th>
<!--                                <th style="width: 5%">Number of Months</th>-->
                                <th style="width: 20%">Title of Proposal</th>
                                <th style="width: 15%">Name of Client</th>
                                <th style="width: 30%">Address of Client</th>
                                <th style="width: 30%">Supporting Document</th>
                                <th colspan="2" style="text-align: center;width: 5%">Action</th>
                            </tr>
                        </thead>
                        <?php
                        $no=1;?>
                        <tbody>
                            @foreach($ietsSectionC as $ietsSectionCs)
                            <tr style="border-bottom: 1px solid #ddd;background-color: ">
                              <td>{{ $no++ }}</td>
                                <td>{{ date('d/m/Y', strtotime($ietsSectionCs->projectStart)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($ietsSectionCs->projectComplete)) }}</td>
                                <td>{{ $ietsSectionCs->numdays }}</td>
<!--                                <td>{{ $ietsSectionCs->numMonths }}</td>-->
                                <td>{{ $ietsSectionCs->proposaltitle }}</td>
                                <td>{{ $ietsSectionCs->clientname }}</td>
                                <td>{{ $ietsSectionCs->clientaddress }}</td>
                                <td><a class="file" style="color:blue" href="/uploads/{{$ietsSectionCs->supportdoc}}" target="_blank">{{$ietsSectionCs->supportdoc}}</a>


                                </td>
                                <td class="{{($count>0)?'':'hide'}} "><center>

                            <a href="{{ route('ietsSectionC.edit', $ietsSectionCs->id) }}" >
                                {{ Form::image('/image/edit.png', 'a Edit', array('title' => 'Edit', 'class' => 'btnimg')) }}</a>
                            </td>
                            <td class="{{($count>0)?'':'hide'}} ">
                                {!! Form::open(['route' => ['ietsSectionC.destroy', $ietsSectionCs->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
                            <center>{!! Form::image('/image/delete.png', 'a Delete', ['type' => 'submit', 'class' => 'btnimg'] ) !!}</center>
                            {!! Form::close() !!}
                        </center></td>
                        </tr>
                        @endforeach
                        <tr style="border-bottom: 1px solid #ddd;background-color: #f2f2f2">
                            <td></td>
                            <td colspan="2" valign="right"><strong style="color: blue">Total Month</strong></td>
                            <td><strong style="color: blue">{{number_format($ietsSectionC2,0)}}</strong></td>
                            <td colspan="6"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
               
                
               
         </div>
  
       
</div>
             
  
  <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" <?=(($ietsSectionC2 >= 36) ? 'align="right"' : '' )?> >
               @if ($ietsSectionC2 >= 36)
                 <a class="btn btn-primary" href="/ietsSectionB/create" role="button">Back</a>
                 <a  data-toggle="modal" data-target="#ietsSecC" >{{ Form::button('Add New', array('class'=>'btn btn-primary ', 'type'=>'submit')) }}</a>
                  <a href="/ietsSectionD/create" class="btn btn-primary" role='button'>Next</a>
                @else
                 <div class="well well-sm" style="margin-left: 1%; background-color: #ffe6e6; border-color: red; display:inline-block;">
                    <strong style="color: red">Your Practical Experience must be 36 months or above to continue to Section D  </strong><br>
                </div>
                <div align="right">
                  <a class="btn btn-primary" href="/ietsSectionB/create" role="button">Back</a>
                  <a  data-toggle="modal" data-target="#ietsSecC" >{{ Form::button('Add New', array('class'=>'btn btn-primary ', 'type'=>'submit')) }}</a>
                </div>
                @endif
              
            </div>
          </div>

          <div class="modal fade" id="ietsSecC" role="dialog">
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
    
          {!! Form::open(['route' => 'ietsSectionC.store', 'data-parsley-validate'=> '', 'files'=> true,'id'=>'applicantFormC']) !!}
     
        
          <div class="col-md-5">
            

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  
             <div class="col-lg-6" style="margin-left: -16px">
            <div class="input-group" >
              <text><b>Date of Project Start</b></text><br>
              <input type="date" class="form-control input-sm" id="datepicker" name="projectStart" onchange="cal();calculate();dateValidate(this)" style="font-size: 15px;width: 100%"  />
            </div>
          </div>

          <div class="col-lg-6">
            <div class="input-group">
              <text><b>Date of Project Complete</b></text><br>
             <input type="date" class="form-control input-sm" id="datepicker2" name="projectComplete" onchange="cal();calculate()" style="font-size: 15px;width: 100%" />
        
          </div>   
            </div>
            </div>
            

             <br><br>

               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
             
                  
             <div class="col-lg-6" style="margin-left: -16px">
            <div class="input-group" >
             <text id="numdays">Number of days:</text>
             <input type="textbox" class="textbox" id="numdays2" name="numdays" readonly="readonly" style="width:17%;background-color: #d1e0e0">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="input-group">
            
              <text id="numMonths">Number of months:</text>
          <input type="textbox" class="textbox" id="numMonths2" name="numMonths" readonly="readonly" style="width: 17%;background-color: #d1e0e0">            </div>
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
                <text class=""><b>Supporting Document</b></text>
                   <input name="supportdoc" id="supportdoc" type="file" title="Supporting Document">
		<p class="text-info" style="font-size: 12px;color: #0073e6">Attachment Specification : pdf Only less than 10MB and file name not more than 10 characters</p>       
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
                  notEmpty: { message: 'Supporting Document is required'},

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

$(document).ready(function() {
  $("#ietsSecC").on("hidden.bs.modal", function() {
     document.location.reload();
  });
});

</script>


</html>
@endsection
