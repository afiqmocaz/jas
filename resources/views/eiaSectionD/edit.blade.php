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
        
    {!! Form::model($eiaSectionD, ['route' =>['eiaSectionD.update', $eiaSectionD->id], 'method' => 'PUT', 'files' => true,'id'=>'applicantForm']) !!}
     
        
          <div class="col-md-5">
            <div class="form-group">    
                <text><b>Participation in</b></text>
                   <select name="participate" id="participate" class="form-control input-sm" style="font-size: 15px;width: 100%">
                   myFunction()">
            <option value="{{ $eiaSectionD->participate}}" selected="true">{{ $eiaSectionD->participate}}</option>

                   <option data-foo="" value=""   >--Please select your participation--</option>

                  @foreach ($manexp as $manexp) 
                  {

                    <option value="{{ $manexp->name_envmanexp}}">{{ $manexp->name_envmanexp }}</option>
                  }
                  @endforeach
                </select>          
              </div>


              <div class="form-group">    
                <text><b>Name of Project</b></text>
                 {{ Form::textarea('project_name', $eiaSectionD->project_name, array('class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Enter your project name','maxlength'=>100,'style'=>'font-size:15px'))}}        
              </div>



              <div class="form-group">    
                <text><b>Position</b></text>
                 <select name="position" class="form-control input-sm" style="font-size: 15px">
                   <option value="{{ $eiaSectionD->position}}" selected="true">{{ $eiaSectionD->position}}</option>
                  <option data-foo="" value=""  >--Please select your position--</option>

                @foreach ($position as $position) 
                {

                  <option value="{{ $position->position_name}}">{{ $position->position_name }}</option>
                }
                @endforeach
              </select>          
              </div>


              <div class="form-group">    
                <text><b>Responsibilities</b></text>

                     {{ Form::textarea('responsibilities', $eiaSectionD->responsibilities, array('class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Enter your responsibilities','maxlength'=>255,'style'=>'font-size:15px'))}} 
 
                  </textarea>         
              </div>


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  
             <div class="col-lg-5" style="margin-left: -16px">
            <div class="input-group" >
              <text><b>Date Start</b></text><br>
              <input type="date" data-date="" data-date-format="DD/MM/YYYY" id="datepicker" name="dateStart" onchange="cal();calculate()"  value="{{$eiaSectionD->dateStart}}" />
            </div>
          </div>
          <div class="col-lg-5" style="margin-left: 5%">
            <div class="input-group">
              <text><b>Date End</b></text><br>
             <input type="date" data-date="" data-date-format="DD/MM/YYYY" id="datepicker2" name="dateEnd" onchange="cal();calculate()"   value="{{$eiaSectionD->dateEnd}}" />
        
          </div>   
            </div></div>

            <br><br><br><br>
            
         

              <div class="form-group">    
             <text id="numdays">Number of days:</text>
             <input type="textbox" class="textbox" id="numdays2" name="numdays" readonly="readonly" style="width:10%;background-color: #d1e0e0" value="{{$eiaSectionD->numdays}}" >
             &nbsp&nbsp&nbsp&nbsp
          <text id="numMonths">Number of months:</text>
          <input type="textbox" class="textbox" id="numMonths2" name="numMonths" readonly="readonly" style="width: 10%;background-color: #d1e0e0" value="{{$eiaSectionD->numMonths}}">   
  
              </div>

               <div class="form-group">    
                <text class="">File Uploaded</text><br>
                   <a style="color:blue" class="file" src="/uploads/{{$eiaSectionD->supportdoc}}" href="/uploads/{{$eiaSectionD->supportdoc}}" target="_blank">{{$eiaSectionD->supportdoc}}</a>    
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
                 {{ Form::text('ref_name', $eiaSectionD->ref_name, array('id'=>'ref_name','class' => 'form-control input-sm', 'maxlength'=>'255','placeholder'=>'Eg: Hussin Bin Muhammad','minlength'=>3,'style'=>'font-size:15px'))}}     
              </div>
              

            <div class="form-group">    
                <text class=""><b>Referer Position</b></text><br>
                  {{ Form::text('ref_position', $eiaSectionD->ref_position, array('id'=>'ref_position','class' => 'form-control input-sm', 'maxlength'=>'50','placeholder'=>'Eg: Site Supervisor', 'minlength'=>5,'style'=>'font-size:15px'))}}    
              </div>

              <div class="form-group">    
                <text class=""><b>Address</b></text>
                   {{ Form::textarea('ref_address', $eiaSectionD->ref_address, array('id'=>'ref_address','class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Eg: No. 64, Jln Pahlawan 21, Taman Pahlawan', 'maxlength'=>'255','minlength'=>10,'style'=>'font-size:15px'))}}  
              </div>

              <div class="form-group">    
                <text class=""><b>Email Address</b></text>
                 {{ Form::email('ref_email', $eiaSectionD->ref_email, array('id'=>'ref_email','class' => 'form-control input-sm', 'style' => 'width: 50%', 'maxlength'=>'100','placeholder'=>'Eg: izzat@gmail.com','style'=>'font-size:15px'))}}             
                  
              </div>

            </div>
            

         
            </hr>
            <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a class="btn btn-primary" href="/eiaSectionD/{{$eiaSectionD->id}}" role="button">Back</a> 
              <button id="btnSubmit" type="submit" class="btn btn-primary ">Update</button>
            </div>
          </div>
          </div>
 {!!Form::close()!!}
    </div>
  </div>
  </body>

  <script type="text/javascript">
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