@extends('layouts.master')
@section('content')
@section('header', ': IETS : SECTION A - PERSONAL INFORMATION')
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
    .inner h1{color : rgb(200,200,200); font-family: arial; font-weight: bold; text-align: center; font-size: 20px}
    .inner h3{color: rgb(200,200,200); font-size: 18px; font-family: arial; text-align: center; margin-top: -5px}
    .inner form label span{color: white;}
    .inner form lagend{color: white;}
    .inner .input{width : 100%; border: none; border-bottom: 1px solid white; color: #9f00a7; background: transparent; padding: 10px;}
    .inner .input:focus{box-shadow: none; border: 1px solid none;}
    .container hr{border-color: rgb(100,100,100);}
    .inner .button{border-radius:10px 10px 10px 10px;color: #FFFFFF; background: rgba(50,50,50, 0.4); padding: 2px 30px ;  border: 2px solid #9f00a7;  font-family: arial; margin:10px auto; font-weight: bold;}
    .inner .button:hover{background: #8f00a7; color: white;}

    </style>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.sheepItPlugin.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrapValidator.min.js"></script>

<body>
 <!-- <h4 class="text-center">SECTION A: PERSONAL INFORMATION</h4>
  <hr/>-->
  <div class="section" style="padding: 0px">

    <div class="row" >
  
         {!! Form::model($ietsSectionA, ['route' =>['ietsSectionA.update', $ietsSectionA->id], 'method' => 'PUT', 'files'=>'true']) !!}

          <div class="col-md-5">

            <div class="form-group">    
                <text><b>Name</b></text>
                  <input name="name" id="name" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your name" value="{{Auth::user()->name}}" style="font-size: 15px">  
                              
              </div>

             

              <div class="form-group">    
                <text><b>NRIC/Passport No.</b></text>
                  <input name="nric" id="nric" type="text" maxlength="100" class="form-control input-sm" placeholder="" value="{{Auth::user()->nric}}" readonly style="font-size: 15px">               
              </div>

             

              <div class="form-group">    
                  <text><b>Bumiputera Status</b></text><br>
                 {{ Form::radio('bumiputerastatus', 'Bumiputera' , true) }}
                  <text>Bumiputera</text>
                  {{ Form::radio('bumiputerastatus', 'Non-Bumiputera' , false) }}
                   <text>Non-Bumiputera</text>
                  {{ Form::radio('bumiputerastatus', 'Others' , false) }}
                   <text>Others</text>        
                  
              </div>

              <div class="form-group">
                  <text><b>Passport Photo</b></text><br />
                  <input name="featured_image" id="featured_image" type="file" title="Profile Picture">
                  <p class="text-info" style="font-size: 12px;color: #0073e6">Attachment Specification : jpeg,jpg Only less than 10MB and file name not more than 10 characters</p>
                  <img class="file" src="/image/{{$ietsSectionA->image}}" href="/image/{{$ietsSectionA->image}}" width="100px" height="150px">  
              </div>

            <div class="form-group">    
                <text><b>Address</b></text>
                   {{ Form::textarea('address', $ietsSectionA->address, array('id'=>'address', 'class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Enter your address', 'maxlength' => 255,'onchange' => 'validateaddress(this)','style'=>'font-size:15px'))}}            
              </div>

              <div class="form-group">    
                <text><b>City</b></text>
                  <input type="text" name="city" id="city" class="form-control input-sm" placeholder="Enter your city"  minlength="3" maxlength="35" oninput="this.value=this.value.replace(/[^A-Za-z ]/g,'');"  onchange="cityValidation(this);" style="font-size: 15px" value="{{$ietsSectionA->city}}" >         
              </div>

               <div class="form-group">    
                <text><b>Postcode</b></text>
                  <input type="text" pattern="\d+" name="postcode" id="postcode" class="form-control input-sm" placeholder="Enter your postcode"   minlength="3" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" style="font-size: 15px" value="{{$ietsSectionA->postcode}}" onchange="postcodeValidation(this);">         
              </div>

              <div class="form-group">    
                <text><b>Country</b></text>
                  <select class="form-control input-sm" name="country_id" id="country_id" style="font-size: 15px" onchange="myFunction()">
                      <option value="{{ $ietsSectionA->country_id}}">{{ $ietsSectionA->country_id}}</option>
                      <option data-foo="" value="">--Please select--</option>
                    @foreach ($country as $country) 
                    {

                      <option value="{{ $country->name}}">{{ $country->name }}</option>
                      
                    }
                    @endforeach
                  </select>        
              </div>

               <div class="form-group" id="stateGroup">    
                <text><b>State</b></text>
                  <select class="form-control input-sm" name="state" id="state" style="font-size: 15px" onchange="myFunction2()">
                    @if($ietsSectionA->country_id=='Malaysia')
                      <option value="{{ $ietsSectionA->state}}">{{ $ietsSectionA->state}}</option>
                   @else
                    <option value="">--please select--</option>
                    @endif
                    @foreach ($state as $state) 
                    {

                      <option value="{{ $state->state }}">{{ $state->state }}</option>
                    }
                    @endforeach
                </select>     
              </div>
              
             
            </div>
            <div class="col-md-5 col-md-offset-1">

              <div class="form-group">    
                <text><b>Title</b></text>
                 {{ Form::select('title', ['Mr' => 'Mr', 'Mrs' => 'Mrs', 'Miss' => 'Ms', 'Dr' => 'Dr', 'Prof' => 'Prof' ], $ietsSectionA->title, array('class' => 'form-control', 'style' => 'width: 20%', 'required' => ''))}}               
              </div>


               <div class="form-group">    
                <text><b>Email Address</b></text>
                  <input id="email" name="email" type="text" maxlength="100" autocomplete="off" class="form-control input-sm" placeholder="Enter your email address" value="{{Auth::user()->email}}" style="font-size: 15px" style="font-size: 15px">             
                  
              </div>

               <div class="form-group">    
                <text><b>Telephone Number</b></text>
                  <input name="phoneno" id="phoneno" type="text" maxlength="12" class="form-control input-sm" placeholder="Telephone Number" value="{{$ietsSectionA->phoneno}}" style="font-size: 15px">              
                  
              </div>

              <div class="form-group">    
                <text><b>Fax Number</b></text>
                  <input name="faxno" id="faxno" type="text" maxlength="12" class="form-control input-sm" placeholder="Fax Number" value="{{$ietsSectionA->faxno}}" style="font-size: 15px">              
                  
              </div>


            

             

            <div class="form-group">    
                <text><b>Mail Address</b></text><br>
                <input type="checkbox" name="sameas" onclick="SameAs(this.form)">
          <text style="font-size: 12px;color: #0073e6">Check this box if Address and Mail Address are the same.</text>

                 {{ Form::textarea('mailaddress', $ietsSectionA->mailaddress, array('class'=>'form-control input-sm', 'rows' => 5, 'placeholder'=>'Enter your address', 'maxlength' => 255, 'style'=>'font-size:15px'))}}   
              </div>

              <div class="form-group">    
                <text><b>Mail Postcode</b></text>
                   <input type="text" pattern="\d+" name="mailpostcode" id="mailpostcode" class="form-control input-sm" placeholder="Enter your postcode" minlength="3" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" style="font-size: 15px"  value="{{$ietsSectionA->mailpostcode}}">   
              </div>

              
              
              
              
              <div class="form-group" id="poi" style="display: none">    
          
                 <text for="example-text-input" style="color: #0073e6" class="col-2 col-form-label">Additional information for Non-Malaysian</text>
              <br>
                  <text><b>Place of Issue</b></text>
               
                   {{ Form::text('placeofissue', $ietsSectionA->placeofissue, array('id' => 'placeofissue', 'class' => 'form-control input-sm', 'placeholder'=>'Enter your place of issue', 'maxlength' => 45, 'style'=>'font-size:15px'))}}
              </div>
             
              <div class="form-group"  id="doi" style="display: none">
              
               
                <text><b>Date of Issue</b></text>
                   {{ Form::date('dateofissue', $ietsSectionA->dateofissue, array('id' => 'dateofissue', 'class' => 'form-control input sm', 'placeholder'=>'Enter your date of issue', 'maxlength' => 45, 'style'=>'font-size:15px'))}}
                
           
            </div>

            
            </div>
            </hr>
            <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a class="btn btn-primary" href="/ietsSectionA/{{$ietsSectionA->id}}" role="button">Back</a>
              <button id="btnSubmit" type="submit" class="btn btn-primary ">Update</button>
            </div>
          </div>
          </div>
 </form>
    </div>
  </div>
  </body>

  <script  type="text/javascript">
  $(document).ready(function () {
    $('#chkPassport').on('change', function (e) {
        
        $("#chkPassport").prop("unchecked", this.unchecked);
      $("#regNo").val('');

    });
});

</script>

<script>
function myFunction() {
    var x, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("numb").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x) || x < 1 || x > 999999999) {
        text = "Input not valid";
    } else {
        text = "Input OK";
    }
    document.getElementById("demo").innerHTML = text;
}
</script>

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
          notEmpty: {  message: 'Title is required' }
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
          notEmpty: {  message: 'Bumiputera Status is required' },      
        }
      },

       

       placeofissue : {
        enabled: false,
        validators : {
          notEmpty: { message: 'Place of Issue is required'}
        }
      },

       dateofissue : {
        enabled: false,
        validators : {
          notEmpty: { message: 'Date of Issue is required'}
        }
      },

      featured_image: {
              validators: {
                 notEmpty: { message: 'Passport Photo is required'},
                file: {
                      extension: 'jpg,jpeg',
                      type: 'image/jpeg',
                      maxSize: 1048576, //5MB (1024*5*1024=5242880)
                      message: 'The selected file not comply the file specification'
                }
            }
        }


    }
  });

if('{{$ietsSectionA->country_id}}' === 'Malaysia'){
       $("#txtA").hide();
         $("#stateGroup").show();
          $('#applicantForm').bootstrapValidator('revalidateField', 'state', true);
           $('#applicantForm').bootstrapValidator('revalidateField', 'placeofissue', false);
             $('#applicantForm').bootstrapValidator('revalidateField', 'dateofissue', false);
 
$("#dateofissue").val('');
       $("#placeofissue").val('');
        $("#poi").hide();
         $("#doi").hide();

   }
   else{
      $("#stateGroup").hide();
         $('#applicantForm').bootstrapValidator('revalidateField', 'state', false);
           $('#applicantForm').bootstrapValidator('revalidateField', 'placeofissue', true);
             $('#applicantForm').bootstrapValidator('revalidateField', 'dateofissue', true);
        $("#poi").show();
         $("#doi").show();

   }

 
  $('#country_id').on('change', function () {
    if (this.value == 'Malaysia') {
        
          $("#stateGroup").show();
       document.getElementById("state").required = true;
       // document.getElementById("placeofissue").required = false;
       $("#dateofissue").val('');
       $("#placeofissue").val('');
         document.getElementById("state").required = true;
          document.getElementById("dateofissue").required = false;
        document.getElementById("placeofissue").required = false;
        $("#poi").hide();
         $("#doi").hide();
    } else {
        $("#txtA").show();
         $("#stateGroup").hide();
        document.getElementById("state").required = false;
        $("#state").val('');
        document.getElementById("dateofissue").required = true;
        document.getElementById("placeofissue").required = true;
        $("#poi").show();
         $("#doi").show();
    }
    
   

});
    
    
</script>
<!-- <script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
                 document.getElementById("regNo").required = true;
            } else {
               document.getElementById("regNo").required = false;
            }
        });
    });


 if( document.getElementById("regNo").value === '' ){
      $("#dvPassport").hide();
      document.getElementById("regNo").required = false;
    }
    else{
       $("#dvPassport").show();
       document.getElementById("chkPassport").checked=true;
       //document.getElementById("regNo").required = true;
    }
</script> -->


<script type="text/javascript">
  if( document.getElementById("mailaddress").value === '' ){
     document.getElementById("sameas").checked=false;
    }

      var x = document.getElementById("address").value+ ", "+document.getElementById("city").value+ ", "+ document.getElementById("state").value+ ", " +document.getElementById("country_id").value;

     if( document.getElementById("mailaddress").value === x ){
     document.getElementById("sameas").checked=true;
    }
</script>



<script type="text/javascript">
 var _validFileExtensions = [".jpg", ".jpeg", ".png"];    
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
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
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

function SameAs(f) {
  if(f.sameas.checked == true) {
    f.mailaddress.value = f.address.value + ", " + f.city.value + ", " + f.state.value + ", " + f.country_id.value;
    f.mailpostcode.value = f.postcode.value;
    $('#applicantForm').bootstrapValidator('revalidateField', 'mailaddress', true);
    $('#applicantForm').bootstrapValidator('revalidateField', 'mailpostcode', true);
  }
else if(f.sameas.checked == false)
   {
    
       f.mailaddress.value = ''; 
    f.mailpostcode.value = '';
    $('#applicantForm').bootstrapValidator('revalidateField', 'mailaddress', false);
    $('#applicantForm').bootstrapValidator('revalidateField', 'mailpostcode', false);
   }
}
</script>

<script type="text/javascript"> 
$(function(){
    $("#dateofissue").datepicker({
       
         dateFormat: 'dd-mm-yy',
       //  minDate: -20, 
         maxDate: "+0m +0D"
    });
})
</script>


</html>
@endsection