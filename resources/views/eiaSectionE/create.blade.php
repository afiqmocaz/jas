@extends('layouts.master')
@section('content')
@section('header', ': EIA : SECTION E - SPECIALIZED AREA')
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
 <!-- <h4 class="text-center">SECTION E: SPECIALIZED AREA</h4>
          <hr/>-->

  <div class="section" style="padding: 0px;">
    <div class="row">
         
          <form role="form" method="POST" action="{{ route('eiaSectionE.store')}}" name="applicantForm" id="applicantForm"  accept-charset="UTF-8"
  enctype="multipart/form-data">
  
          
          <div class="col-md-5">
         


              <div class="form-group">    
                <text class=""><b>First Specialize</b></text>
                  {{ Form::select('first_specialize', ['' => '-- Select Specialize --',
    'Air Pollution Control' =>
    ['Air Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
    'Air Pollution Control - Impact Assessment' => 'Impact Assessment',
    'Air Pollution Control - Environmental Management' => 'Environmental Management',
    'Air Pollution Control - Performance Monitoring' => 'Performance Monitoring',
    'Air Pollution Control - Environmental Planning' => 'Environmental Planning',
    'Air Pollution Control - Risk Assessment' => 'Risk Assessment'],

    'Water Pollution Control' =>
    ['Water Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
    'Water Pollution Control - Impact Assessment' => 'Impact Assessment',
    'Water Pollution Control - Environmental Management' => 'Environmental Management',
    'Water Pollution Control - Performance Monitoring' => 'Performance Monitoring',
    'Water Pollution Control - Environmental Planning' => 'Environmental Planning',
    'Water Pollution Control - LDP2M2' => 'LDP2M2'],

    'Waste Management' =>
    ['Waste Management - Pollution Control Technology' => 'Pollution Control Technology',
    'Waste Management - Impact Assessment' => 'Impact Assessment',
    'Waste Management - Environmental Management' => 'Environmental Management',
    'Waste Management - Performance Monitoring' => 'Performance Monitoring',
    'Waste Management - Environmental Planning' => 'Environmental Planning',
    'Waste Management - Risk Assessment' => 'Risk Assessment'],    
], '', array('id' => 'select1', 'class' => 'form-control input-sm','style'=>'font-size:15px'))}}
           
              </div>
              
            </div>
            <div class="col-md-5 col-md-offset-1">

            

              <div class="form-group">    
                <text class=""><b>Second Specialize</b></text>
                 {{ Form::select('second_specialize', ['' => '-- Select Specialize --',
    'Air Pollution Control' =>
    ['Air Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
    'Air Pollution Control - Impact Assessment' => 'Impact Assessment',
    'Air Pollution Control - Environmental Management' => 'Environmental Management',
    'Air Pollution Control - Performance Monitoring' => 'Performance Monitoring',
    'Air Pollution Control - Environmental Planning' => 'Environmental Planning',
    'Air Pollution Control - Risk Assessment' => 'Risk Assessment'],

    'Water Pollution Control' =>
    ['Water Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
    'Water Pollution Control - Impact Assessment' => 'Impact Assessment',
    'Water Pollution Control - Environmental Management' => 'Environmental Management',
    'Water Pollution Control - Performance Monitoring' => 'Performance Monitoring',
    'Water Pollution Control - Environmental Planning' => 'Environmental Planning',
    'Water Pollution Control - LDP2M2' => 'LDP2M2'],

    'Waste Management' =>
    ['Waste Management - Pollution Control Technology' => 'Pollution Control Technology',
    'Waste Management - Impact Assessment' => 'Impact Assessment',
    'Waste Management - Environmental Management' => 'Environmental Management',
    'Waste Management - Performance Monitoring' => 'Performance Monitoring',
    'Waste Management - Environmental Planning' => 'Environmental Planning',
    'Waste Management - Risk Assessment' => 'Risk Assessment'],    
], '', array('id' => 'select2', 'class' => 'form-control input-sm','style'=>'font-size:15px'))}}   
              </div>
        
            </div>
            </hr>
            <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a class="btn btn-primary" href="/eiaSectionD/create" role="button">Back</a>
              <button id="btnSubmit" type="submit" class="btn btn-primary ">Next</button>
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
   
      first_specialize:{
        validators :{
          notEmpty: {  message: 'First Specialize is required' }
        }
      },

      second_specialize : {
        
        validators : {
          notEmpty: { message: 'Second Specialize is required'}
        }
      }  
      
    }
  });

function preventDupes( select, index ) {
    var options = select.options,
        len = options.length;
    while( len-- ) {
        options[ len ].disabled = false;
    }
    select.options[ index ].disabled = true;
    if( index === select.selectedIndex ) {
        alert('You\'ve already selected the item "' + select.options[index].text + '".\n\nPlease choose another.');
        this.selectedIndex = 0;
    }
}

var select1 = select = document.getElementById( 'select1' );
var select2 = select = document.getElementById( 'select2' );

select1.onchange = function() {
    preventDupes.call(this, select2, this.selectedIndex );
};

select2.onchange = function() {
    preventDupes.call(this, select1, this.selectedIndex );
};
</script>

</html>

@endsection