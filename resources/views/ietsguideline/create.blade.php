@extends('layouts.master')
@section('header', 'IETS: Guidelines') 
@section('content')
<html>
  <head>
    <title>CRS Online: Guidelines</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">
    
     @include('adminsidebar')

    </head>
    <style>
      
        body {font-family: arial; }
        form{font-size: 15px;}
        
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
 
  <div class="section" style="padding: 0px;">
    <div class="container">
      <form id="applicantForm" action="{{ route('ietsguideline.store')}}" method="POST" enctype="multipart/form-data" style="width: 60%;">
        <div  style="border: 1px solid #C8C8C8; margin-top: 10px; background-color: #FFFFFF; opacity: 0.9; filter: alpha(opacity=60);">
          <h3 class="text-center">GUIDELINES UPLOAD</h3>
          <hr/>
          
            <div class="form-group" style="margin-left: 3%">    
                <label class="">Subject</label>
                  <input name="subject" id="subject" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your subject" value="" style="width:97%">  
                              
              </div>
             
              <div class="form-group" style="margin-left: 3%">
						    <label class="">File Upload (Optional)</label><br />
						 <input id="fileupload" type="file" class="form-control" name="fileupload" accept=".pdf" onchange="myFunction(this)" multiple="multiple" style="width: 100%;">
					    	<p class="text-info ">Attachment Specification : pdf Only less than 10MB and file name not more than 10 characters</p>
					    		
						</div>

             
             
             </div> 
           
            </hr>

            <div class="row">
            <div class="col-md-12" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a href="show" class="btn btn-primary" role="button">Back To IETS Guidelines</a>
              <button id="btnSubmit" type="submit" class="btn btn-primary ">Save</button>
            </div>
          </div>
          </div>
      </form>
    </div>
  </div>
  </body>
</html>

<script type="text/javascript">
  $('#applicantForm').bootstrapValidator({
    feedbackIcons : {
      //valid : 'glyphicon glyphicon-ok',
      //invalid : 'glyphicon glyphicon-remove',
      //validating : 'glyphicon glyphicon-refresh'
    },
    fields : {
      subject:{
        validators :{
          notEmpty: {  message: 'Subject of Guideline is required' },
          stringLength: {
                        message: 'Subject of Guideline must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },
      

      

      
    }
  });

  
  
 
  $("input[type=password]").keyup(function(){
      var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");
    
    if($("#password").val().length >= 8){
      $("#8char").removeClass("glyphicon-remove");
      $("#8char").addClass("glyphicon-ok");
      $("#8char").css("color","#00A41E");
    }else{
      $("#8char").removeClass("glyphicon-ok");
      $("#8char").addClass("glyphicon-remove");
      $("#8char").css("color","#FF0004");
    }
    
    if(ucase.test($("#password").val()) || lcase.test($("#password").val()) ){
      $("#ulcase").removeClass("glyphicon-remove");
      $("#ulcase").addClass("glyphicon-ok");
      $("#ulcase").css("color","#00A41E");

    }else{
      $("#ulcase").removeClass("glyphicon-ok");
      $("#ulcase").addClass("glyphicon-remove");
      $("#ulcase").css("color","#FF0004");

    }

    if(num.test($("#password").val())){
      $("#num").removeClass("glyphicon-remove");
      $("#num").addClass("glyphicon-ok");
      $("#num").css("color","#00A41E");
    }else{
      $("#num").removeClass("glyphicon-ok");
      $("#num").addClass("glyphicon-remove");
      $("#num").css("color","#FF0004");
    }   
  });

</script>
@endsection