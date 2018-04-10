@extends('layouts.master')
@section('content')
@section('header', ': EIA : SECTION F - DECLARATION')
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

    </style>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.sheepItPlugin.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrapValidator.min.js"></script>
    <!--<script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.maskedinput.js"></script> -->

    <body>
 <!-- <h4 class="text-center">SECTION A: PERSONAL INFORMATION</h4>
  <hr/>-->
  <div class="section">

    <div class="row" >
         
  
         
        <div class="well well-lg" style="width: 50%;margin-left: 25%; background-color: white">
  <table style="width: 100%">
    <tr>
      <td>
        Your application has been submitted. We will review your application and we will informed you to proceed for the next process. Thank you.<br>
      </td>
    </tr>
    
  </table>
</div>
        
           
            </hr>
             <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px; margin-left: 75%">
              
            <input type=button name=print value="Preview" class="btn btn-primary " style="width:100px;" onClick="printExternal('/eiaapp/{{Auth::user()->id}}/edit')">

<a type=button name=print href="{{url('/')}}" class="btn btn-primary " style="width:100px;">Back</a>

            </div>
          </div>
          </div>
 
    </div>
  </div>
  </body>

  <script type="text/javascript">
  $('#applicantForm').bootstrapValidator({
    feedbackIcons : {
      //valid : 'glyphicon glyphicon-ok',
      //invalid : 'glyphicon glyphicon-remove',
      //validating : 'glyphicon glyphicon-refresh'
    },
    fields : {
      name:{
        validators :{
          notEmpty: {  message: 'Name of Applicant is required' },
          stringLength: {
                        message: 'Name of Applicant must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },

       title:{
        validators :{
          notEmpty: {  message: 'title is required' }
        }
      },


      nric:{
        validators :{
          notEmpty: {  message: 'NRIC/Passport is required' }
        }
      },

      address:{
        validators :{
          notEmpty: {  message: 'Address is required' },
          stringLength: {
                        message: 'Address must be less than 50 characters',
                        max: function (value, validator, $field) {
                            return 50 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },

      city:{
        validators :{
          notEmpty: {  message: 'City is required' },
          stringLength: {
                        message: 'City must be less than 35 characters',
                        max: function (value, validator, $field) {
                            return 35 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },

      postcode:{
        validators :{
          notEmpty: {  message: 'Postcode is required' },
          stringLength: {
                        message: 'Postcode must be less than 35 characters',
                        max: function (value, validator, $field) {
                            return 10 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },
      
     
      country_id:{
        validators :{
          notEmpty: {  message: 'Country is required' }
        }
      },

      state : {
        enabled: false,
        validators : {
          notEmpty: { message: 'State is required'}
        }
      },
      
      mailaddress:{
        validators :{
          notEmpty: {  message: 'Mail Address is required' },
          stringLength: {
                        message: 'Mail Address must be less than 50 characters',
                        max: function (value, validator, $field) {
                            return 50 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },

       mailpostcode:{
        validators :{
          notEmpty: {  message: 'Mail Postcode is required' },
          stringLength: {
                        message: 'Mail Postcode must be less than 35 characters',
                        max: function (value, validator, $field) {
                            return 10 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },
      
      phoneno:{
        validators :{
          notEmpty: {  message: 'Telephone Number is required' },
          stringLength: {
                      message: 'Telephone Number must be less than 12 characters',
                      max: function (value, validator, $field) {
                          return 12 - (value.match(/\r/g) || []).length;
                      }
                  }
        }
      },
      faxno:{
        validators :{
          notEmpty: {  message: 'Fax Number is required' },
          stringLength: {
                      message: 'Fax Number must be less than 12 characters',
                      max: function (value, validator, $field) {
                          return 12 - (value.match(/\r/g) || []).length;
                      }
                  }
        }
      },
      
      email:{
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
      },
      
       bumiputerastatus:{
        validators :{
          notEmpty: {  message: 'Bumiputera status is required' },      
        }
      },

       regNo : {
        enabled: false,
        validators : {
          notEmpty: { message: 'Registered Number is required'}
        }
      },

       placeofissue : {
        enabled: false,
        validators : {
          notEmpty: { message: 'Place of issue is required'}
        }
      },

       dateofissue : {
        enabled: false,
        validators : {
          notEmpty: { message: 'Date of issue is required'}
        }
      },

      featured_image: {
              validators: {
                 notEmpty: { message: 'Passport photo is required'},
                file: {
                      extension: 'jpg,jpeg',
                      type: 'image/jpeg',
                      maxSize: 1048576, //5MB (1024*5*1024=5242880)
                      message: 'The selected file not comply the file specification'
                }
            }
        }


    }
  }).on('change','[name="country_id"]',function(e){
    var country_id = $(this).val();
  
    if(country_id == "Malaysia"){
      $('#applicantForm').bootstrapValidator('enableFieldValidators', 'state', true);
       $('#applicantForm').bootstrapValidator('enableFieldValidators', 'dateofissue', false);
       $('#applicantForm').bootstrapValidator('enableFieldValidators', 'placeofissue', false);
       $('[name="placeofissue"]').val('');
       $('[name="dateofissue"]').val('');

    }else{
      $('[name="state"]').val('');
      $('#applicantForm').bootstrapValidator('enableFieldValidators', 'state', false);
       $('#applicantForm').bootstrapValidator('enableFieldValidators', 'dateofissue', true);
        $('#applicantForm').bootstrapValidator('enableFieldValidators', 'placeofissue', true);
    }   
  });

  $('select[name="country_id"]').on('change',function(){
    var country_id = $(this).val();
    if(country_id == 'Malaysia'){
      $('#stateGroup').show();
       $('#poi').hide();
       $('#doi').hide();
     
    }else{
      $('#stateGroup').hide();
      $('#poi').show();
       $('#doi').show();
    }
  });
  
  $(document).ready(function(){
    if('' == 'Malaysia'){
      $('#stateGroup').show();
      $('#poi').hide();
       $('#doi').hide();
    }else{
      $('#stateGroup').hide();
      $('#poi').hide();
       $('#doi').hide();
    }
    //$('#applicant_tel_no').mask("99-9999999?9",{placeholder:""});
    //$('#applicant_fax_no').mask("99-9999999?9",{placeholder:""});
    //$('#applicant_hp_no').mask("999-9999999?9",{placeholder:""});
    
  });

  

    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
                  $('#applicantForm').bootstrapValidator('enableFieldValidators', 'regNo', true);
            } else {
                $("#dvPassport").hide();
                $('#applicantForm').bootstrapValidator('enableFieldValidators', 'regNo', false);

            }
        });
    });

    
 function SameAs(f) {
  if(f.sameas.checked == true) {
    f.mailaddress.value = f.address.value + ", " + f.city.value + ", " + f.state.value + "" + f.country_id.value;
    f.mailpostcode.value = f.postcode.value;
  }
else if(f.sameas.checked == false)
   {
    
       f.mailaddress.value = ''; 
    f.mailpostcode.value = '';
   }
}

function printExternal(url) {
    var printWindow = window.open( url, 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');
    printWindow.addEventListener('load', function(){
        printWindow.print();
        printWindow.close();
    }, true);
}

</script>

</html>
@endsection
