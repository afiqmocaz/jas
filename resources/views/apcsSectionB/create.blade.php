@extends('layouts.master')
@section('content')
@section('header', ': APCS : SECTION B - FIELD SPECIALIZATION')
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
         
  
          <form role="form" method="POST" action="{{ route('apcsSectionB.store')}}" name="applicantForm" id="applicantForm"  accept-charset="UTF-8"
  enctype="multipart/form-data">

        
          <div class="col-md-5">
         

            <div class="form-group">    
                <text><b>Specialized Area</b></text><br><br>
                 @foreach($specializes as $key => $specialize)
              <input type="checkbox" name="item" id="item_{{$key+1}}"  value="{{$specialize->specialized}}" /> {{$key+1}}. {{$specialize->specialized}}
              <br>
              @endforeach
              </div>

            </div>
            <div class="col-md-5 col-md-offset-1">

             <div class="form-group">    
                  
                  <text><b>Specialized Area Selected<b></text><br><br>
                1. <input type="text" name="specialize_0" id="specialize_0" value="" style="width: 95%;font-weight:normal" readonly="readonly"/><br><br>
                2. <input type="text" name="specialize_1" id="specialize_1" value="" style="width: 95%;font-weight:normal" readonly="readonly"/><br><br>
                3. <input type="text" name="specialize_2" id="specialize_2" value="" style="width: 95%;font-weight:normal" readonly="readonly"/><br><br>
                4. <input type="text" name="specialize_3" id="specialize_3" value="" style="width: 95%;font-weight:normal" readonly="readonly"/>             
              </div>

            
            </div>
            </hr>
            <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a class="btn btn-primary" href="/apcsSectionA/create" role="button">Back</a>
              <button id="btnSubmit" type="submit" class="btn btn-primary">Next</button>
            </div>
          </div>
          </div>
 </form>
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
     

       item:{
        validators :{
          notEmpty: {  message: 'Specialized Area is required' }
        }
      }


     
  }


});

  
 checkboxlimit(document.forms.apcsSecB.specialize_, 4)
    $("#btnSubmit").click(function(e){
        if( $("input[name=item]:checked").length !== 0){
          $("input[name=item]").removeAttr("required");       
        }     
      });

</script>
<script type="text/javascript">
$(document).ready(function(e) {
  var counter = 0,
    $specializes = $('input[name^="specialize_"]');
  $('input[id^="item_"]').change(function() {
    var id = this;

    if (this.checked) {
      if (counter == 4) {
        this.checked = false;
        return;
      }
      $("#specialize_" + counter).val(this.value).attr('data-value', this.value);
      ++counter;
    } else {
      var $specialize = $specializes.filter('[data-value="' + this.value + '"]');
      var index = $specializes.index($specialize);
      $specializes.slice(index, counter).each(function(i) {
        var $n = $specializes.eq(index + i + 1);
        $(this).val($n.val() || '').attr('data-value', $n.attr('data-value'));
      });
      counter--;
      $("#specialize_" + counter).val('').removeAttr('data-value');
    }

  });
});
</script>
  <script type="text/javascript">
    function checkboxlimit(checkgroup, limit){
      var checkgroup=checkgroup
      var limit=limit
      for (var i=0; i<checkgroup.length; i++){
        checkgroup[i].onclick=function(){
        var checkedcount=0
        for (var i=0; i<checkgroup.length; i++)
          checkedcount+=(checkgroup[i].checked)? 1 : 0
        if (checkedcount>limit){
          alert("You can only select a maximum of "+limit+" checkboxes")
          this.checked=false
          }
        }
      }
    }
</script>

</html>
@endsection
