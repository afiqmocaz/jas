@if(App\User::permission('applicants'))
<html lang="en">
<head>
  <title>EIA Section D</title>
<!--   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/justified-nav.css" rel="stylesheet" type="text/css">
  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/justified-nav.css')!!}
  {!!Html::style('css/templatemo_style.css')!!}
  {!!Html::style('css/parsley.css')!!}
  {!!Html::style('css/button.css')!!}

<script type="text/javascript">
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

<style type="text/css">
.well {
  background: white;
}
  .table th, .table td {
    border-top: none !important;
    border-left: none !important;
}
.fixed-table-container {
    border:0px;
}
button {
  float: right;
}
h3{
  font-size: 15px;
  font-style: bold;
}
li {
        float: left;
    }

    li a, .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover, .dropdown:hover .dropbtn {
        background-color: #00ad00;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #006e00;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        font-weight: bold;
        padding: 5px 27px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {background-color: #00ad00}

    .dropdown:hover .dropdown-content {
        display: block;
    }
    .navbar-header {
      background-color: #006e00;
    }
</style>
</head>
<body>

<div class="container">





<!-- HEADER -->
    <div class="container">
    <div>
       <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
       </div>
    <div class="col-xs-10" style="height:20px;"></div>
    </div>
  <!-- HEADER -->






<!-- DISPLAY PERSONAL INFO -->
<div class="col-xs-10" style="height:20px;"></div>   

 <div class="well well-sm"  style="margin-left: 5%; margin-right: 15%; background-color: white">
 <table style="width: 60%">
    <tbody>   
      <tr>
        <td>
          <label>&nbsp &nbsp &nbsp NAME </label>
        </td>
        <td>
          <label>: &nbsp &nbsp &nbsp {{ Auth::user()->name }}</label>
        </td>
      </tr>
      <tr>
        <td>
          <label> &nbsp &nbsp &nbsp NRIC / PASSPORT NUMBER</label>
        </td>
        <td>
          <label>: &nbsp &nbsp &nbsp <!-- 931405105499 --></label>
          <strong>{{ Auth::user()->nric }}</strong>
        </td>
      </tr>
      <tr>
        <button  class="small btn-primary" a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Signout</button>
      </tr>  
     <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </tbody>  
  </table>
  </div>
 
<!-- DISPLAY PERSONAL INFO -->

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





  <!-- NAVIGATION BAR -->
  <div class="container">
  <div class="navbar templatemo-nav" id="navbar">
        <div class="navbar-header">               
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav nav-justified">
          <li class="active"><a href="/eiaSectionA/create">SECTION A</a></li>
                    <li class="active"><a href="/eiaSectionB/create">SECTION B</a></li>
                    <li class="active"><a href="/eiaSectionC/create">SECTION C</a></li>

                    <li class="active"><a href="/eiaSectionD/create">SECTION D</a></li>
              
                    <li class="disabled"><a>SECTION E</a></li>
              
                    <li class="disabled"><a>SECTION F</a></li>
            </ul>
            </div> <!-- nav -->
          </div>
          </div>
  <!-- NAVIGATION BAR -->




<!-- PAGE TITLE -->
<div class="well well-lg">
  <h2 style="margin-left: 5%">PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3 style="margin-left: 5%"><strong>
   SECTION D - ENVIRONMENT MANAGEMENT EXPERIENCE
 </strong></h3>





 
   <!-- INSTRUCTION -->
  <div style="width: 60%; margin-left: 5%" class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">EIA Section D Instruction :</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">   •  Experience must <strong>exceed THREE years and above</strong> to complete this section<br />
   •  Click on button <strong>Cancel Registration</strong> to cancel your application<br />
   •  Click on button <strong>Save Draft</strong> to save your application as draft<br />
   •  Click on button <strong>Next</strong> to save your application and continue to next step<br />
   •  You are <strong style="color: red">NOT ALLOWED</strong> to go to next page before completing this section
        </div>
      </div>
    </div>
  </div>
  <script>
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
  });
  </script>
 


<div class="col-xs-12" style="height:50px;"></div>

<!-- FORM -->
<div class="table">
   <div class="well well-lg"  style="margin-left: 5%; margin-right: 5%; border-color: blue; background-color: #e6f2ff">    
  <table class="table">
    <tbody>
    {!! Form::model($eiaSectionD, ['route' =>['eiaSectionD.update', $eiaSectionD->id], 'method' => 'PUT', 'files' => true]) !!}
      <tr>
        <td style="width: 15%">
          <label>Participation in</label>
          <label style="color: red">*</label>
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
        {{ Form::select('participate', 
        ['select' => '- Please select your participation -', 
        'Participation in Term of Reference (TOR) preparation for Environmental Impact Assessment (EIA) Study' => 
        'Participation in Term of Reference (TOR) preparation for Environmental Impact Assessment (EIA) Study', 
        'Participation in Environmental Impact Assessment (EIA) Study' => 
        'Participation in Environmental Impact Assessment (EIA) Study', 
        'Participation in Environmental Assessment or Site Assessment' => 
        'Participation in Environmental Assessment or Site Assessment', 
        'Participation in preparation of Environmental Management Plan (EMP)' => 'Participation in preparation of Environmental Management Plan (EMP)', 
        'Involvement in preparation of any EIA guidance documents or any other environmental and technical guidelines' => 
        'Involvement in preparation of any EIA guidance documents or any other environmental and technical guidelines', 
        'Study or research related to the consultant’s expertise' => 
        'Study or research related to the consultant’s expertise',
        'Participation in preparation of Land Disturbance Prevention Pollution Mitigating Measures (LDP2M2)' => 
        'Participation in preparation of Land Disturbance Prevention Pollution Mitigating Measures (LDP2M2)',
        'Participation in environmental modeling' => 
        'Participation in environmental modeling',
        'Participation in environmental statistic' => 
        'Participation in environmental statistic',
        'Participation in environmental monitoring' => 
        'Participation in environmental monitoring',
        'Participation in any environmental discipline' => 
        'Participation in any environmental discipline'  ], null, array('class' => 'form-control', 'required' => ''))}}

        
        </td>
      </tr>
      <tr>
        <td>
          <label>Name of Project</label>
          <label style="color: red">*</label>
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::textarea('project_name', null, array('style'=>'width: 90%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: Integrated Research on the Development of Global Climate Risk Management Strategies', 'required' => ''))}}
        </td>
      </tr>
      <tr>
        <td>
          <label>Position</label>
          <label style="color: red">*</label>
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
                  {{ Form::select('position', 
        ['select' => '- Please select your position -', 
        'Project Manager' => 'Project Manager', 
        'Developer' => 'Developer', 
        'Quality Assurance' => 'Quality Assurance', 
        'Tester' => 'Tester', 
        'System Analyse' => 'System Analyse' ], null, array('class' => 'form-control', 'style' => 'width: 30%', 'required' => ''))}}
        
        </td>
      </tr>
      <tr>
        <td>
          <label>Responsibilities</label>
          <label style="color: red">*</label>
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::textarea('responsibilities', null, array('style'=>'width: 90%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: Prevent and remedy pollution incidents', 'required' => ''))}}
        </td>
      </tr>
      <tr>
        <td>
          <label>Date</label>
          <label style="color: red">*</label>
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">Date Start</span>
              {!! Form::date('dateStart', null, array('id' => 'datepicker', 'class' => 'form-control', 'style' => 'width: 60%', 'required' => '','onchange' => 'cal();calculate()' )) !!}
            </div>
          </div>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">Date End</span>
              {!! Form::date('dateEnd', null, array('id' => 'datepicker2', 'class' => 'form-control', 'style' => 'width: 60%', 'required' => '','onchange' => 'cal();calculate()' )) !!}
            </div>
          </div>
          <br><br><br>
          <div id="numdays" style="margin-left: 2%" class="left"><label class="form">Number of days:</label><!-- <input type="textbox" class="form-control" id="numdays2" name="numdays" readonly="readonly" style="width: 20%" /> -->
             {{ Form::text('numdays', null, array('class' => 'form-control', 'id' => 'numdays2', 'style' => 'width: 30%', 'readonly' => ''))}}
          </div>
          <div id="numMonths" class="left"><label class="form">Number of months:</label>
             {{ Form::text('numMonths', null, array('class' => 'form-control', 'id' => 'numMonths2', 'style' => 'width: 30%', 'readonly' => ''))}}
          </div>
        </td>
      </tr>
 <tr>
                                    <td>
                                        <label>Supporting Document Uploaded</label>

                                    </td>

                                    <td>
                                        <label>:
                                    </td>
                                    <td>

                                        {{ Form::text('supportdoc', null, ['style' => 'width:36.6%', 'class' => 'form-control','readonly']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Supporting Document</label>

                                    </td>

                                    <td>
                                        <label for="example-text-input" class="col-2 col-form-label">:
                                    </td>
                                    <td>
                                        <!--               {{ Form::file('featured_image')}}
                                        -->              <input type="file" name="supportdoc" accept=".pdf">

                                    </td>
                                </tr>
      <tr>
        <td colspan="3"><u><center>
        <div class="col-xs-12" style="height:50px;"></div>


          <label style="color: blue;">PROJECT REFERENCE</label></center></u>
        
        </td>
      </tr>
       <tr>
        <td>
          <label>Name</label>
          <label style="color: red">*</label>
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::text('ref_name', null, array('class' => 'form-control', 'style' => 'width: 90%', 'placeholder'=>'Eg: Hussin Bin Muhammad', 'required' => ''))}}
        </td>
      </tr>
      <tr>
        <td>
          <label>Address</label>
          <label style="color: red">*</label>
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::textarea('ref_address', null, array('style'=>'width: 90%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: No. 64, Jln Pahlawan 21, Taman Pahlawan', 'required' => ''))}}
        </td>
      </tr>
        
      <tr>
        <td>
          <label>Email</label>
          <label style="color: red">*</label>
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::text('ref_email', null, array('class' => 'form-control', 'style' => 'width: 30%', 'placeholder'=>'Eg: izzat@gmail.com', 'required' => ''))}}
          </td>
      </tr>
    </tbody>
  </table>
</div></div></div>
<button type="submit" class="button save" style="margin-right: 5%">Update</button>
  </br>
  {!! Form::close() !!}
    

</br></br>

</div></div></div>     

    


<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 Jabatan Alam Sekitar
          </div>
        </div>
            
      </div>
    </footer>
      

      
    <!-- templatemo 393 fantasy -->
{!! Html::script('js/parsley.min.js')!!}
{!! Html::script('js/jquery.js')!!}
{!! Html::script('js/bootstrap.min.js')!!}
{!! Html::script('js/templatemo_script.js')!!}
    <!-- templatemo 393 fantasy -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>
    <script type="text/javascript" src="js/disable_navbar.js"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<!--   <script>
  $("#datepicker").datepicker({dateFormat: "yy/mm/dd"});
  $("#datepicker2").datepicker({dateFormat: "yy/mm/dd"});
  </script> -->
    </div>
<!-- FOOTER -->

</body>
 @else
<center><h1>NO PERMISSION TO ACCESS.PLEASE LOG IN INTO THE SYSTEM.</h1>
<a href="/">Login</a>
</center>
@endif
</html>
