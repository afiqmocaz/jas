<!DOCTYPE html>
<html lang="en">
<head>
  <title>APCS Section C</title>
     {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::style('css/select2.min.css')!!}
        {!!Html::style('css/justified-nav.css')!!}
        {!!Html::style('css/templatemo_style1.css')!!}
        {!!Html::style('css/parsley.css')!!}
        {!!Html::style('css/ionicons.min.css')!!}
     
        {!! Html::script('js/jquery.min.js')!!}
        {!!Html::style('css/dataTables.min.css')!!}
        {!! Html::script('js/jquery.dataTables.min.js')!!}
        {!! Html::script('js/bootstrap.min.js')!!}
         {!!Html::style('css/button.css')!!}

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
.popover{
    max-width: 35%; /* Max Width of the popover (depending on the container!) */
}
.navbar { border: none; }
.navbar.templatemo-mobile-menu {
  position: fixed;
  top: 29px;
  right: 2px;
  z-index: 1000;
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
    input:invalid,
    select:invalid,
    textarea:invalid,
    input[type=radio]:invalid {
      border-color: 1px solid red;
      background-color:  #ffe6e6;
      outline: 1px solid red;
    }
</style>
</head>
<body>

<div class="container">





<!-- HEADER -->
    <div class="container">
    <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
      <!--img src="image/banner1.png" alt="header image" width="2048" height="100" class="img-responsive cleaner"-->
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
        <button  class="small btn-primary " a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Signout</button>
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
          <li class="active"><a href="/apcsSectionA/show">SECTION A</a></li>
                    <li class="active"><a href="/apcsSectionB/show">SECTION B</a></li>
                    <li class="active"><a href="/apcsSectionC/create">SECTION C</a></li>

                    <li class="disabled"><a>SECTION D</a></li>
              
                    <li class="disabled"><a>SECTION E</a></li>
              
                    <li class="disabled"><a>SECTION F</a></li>
              
            </ul>
            </div> <!-- nav -->
          </div>
          </div>
  <!-- NAVIGATION BAR -->





<!-- PAGE TITLE -->
<div class="well well-lg" style="margin-left: 5%; margin-right: 5%">
  <h2 style="margin-left: 5%">PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3 style="margin-left: 5%"><strong>
   SECTION C - ACADEMIC QUALIFICATIONS
 </strong></h3>
 
   
   
          

<!-- INSTRUCTION -->
  <div style="width: 60%; margin-left: 5%" class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">APCS Section C Instruction :</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">   •  Choose only <strong>ONE</strong> option from Name / Course Title and enter major of your study in text box given<br />
   •  Enter your Name of University / College<br />
   •  Enter your start Period of Study to end of your study<br />
   •  Click on <strong>Choose File </strong> to upload your Academic Certification and upload in <strong>PDF</strong><br />
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
<div class="">
   <div class="well well-lg"  style="margin-left: 10%; margin-right: 10%; border-color: blue; background-color: #e6f2ff">    
  <table class="table">
    <tbody>
        {!! Form::open(['route' => 'apcsSectionC.store', 'data-parsley-validate'=> '', 'files'=> true]) !!}
        <tr>
          <td>
            <label for="example-text-input" class="col-2 col-form-label">Name / Course Title</label>
            <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label>
          </td>
          <td>
            <label for="example-text-input" class="col-2 col-form-label">:</label>
          </td>
          <td>
            <!-- {{ Form::radio('coursetitle', 'Bachelor in Science' , true) }}
          {{ Form::label('Bachelor in Science')}}
           &nbsp &nbsp &nbsp
          {{ Form::radio('coursetitle', 'Bachelor in Engineering' , false) }}
          {{ Form::label('Bachelor in Engineering')}} -->
          <input type="radio" name="coursetitle" value="Bachelor in Science" required=""/>
        Bachelor in Science
        <input type="radio" name="coursetitle" value="Bachelor in Engineering" required=""/>
        Bachelor in Engineering
          </br></br>
          <em><p for="example-text-input" style="color: #aab2bd" class="col-2 col-form-label">( Enter your major here )</p></em>
          
          {{ Form::text('major', null, array('class' => 'form-control', 'style' => 'width: 80%', 'placeholder'=>'Eg: Software Engineering', 'required' => ''))}}
          </td></tr>
          <tr>
          <td>
            <label for="example-text-input" class="col-2 col-form-label">Name of University / College</label>
          <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label>
          </td>
          <td>
            <label for="example-text-input" class="col-2 col-form-label">:</label>
          </td>
          <td>
            {{ Form::text('universityname', null, array('class' => 'form-control', 'style' => 'width: 80%', 'placeholder'=>'Eg: Universiti Malaysia Pahang', 'required' => ''))}}
          </td>
          </tr>
          <tr>
          <td>
            <label for="example-text-input" class="col-2 col-form-label">Period of Study</label>
          <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label>
          </td>
          <td>
             <label for="example-text-input" class="col-2 col-form-label">:</label>
          </td>
          <td>
            <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">From</span>
              <!-- {!! Form::text('from', '', array('id' => 'datepicker', 'class' => 'form-control', 'style' => 'width: 70%', 'required' => '' )) !!} -->
              <input type="date" class="textbox" id="datepicker" name="from" onchange="cal()" required="" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">To</span>
              <!-- {!! Form::text('to', '', array('id' => 'datepicker2', 'class' => 'form-control', 'style' => 'width: 70%', 'required' => '' )) !!} -->
              <input type="date" class="textbox" id="datepicker" name="to" onchange="cal()" required="" />
            </div>
          </div>
          </td>
        </tr>
        <tr>
          <td>
            {{ Form::label('cert', 'Academic certification:') }}

            <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label>
            </td>

            <td>
              <label for="example-text-input" class="col-2 col-form-label">:
            </td>
            <td>
              <!-- {{ Form::file('cert_file')}} -->
              <!-- <input type="file" name="cert_file" accept=".pdf" required=""> -->
              <input type="file" name="cert_file" accept=".pdf" required="">
              <small style="color:red">PDF Format only</small>
        </td>
      </tr>
    </tbody>
  </table>
</div></div></div>
<button type="submit" class="button next" style="margin-right: 15%">Next</button>
  </br>
  {!! Form::close() !!}
    

</br></br>

</div></div></div>

<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
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
<!--    <script type="text/javascript" src="js/jquery.js"></script>
 --><!--     <script type="text/javascript" src="js/bootstrap.min.js"></script>
 --><!--     <script type="text/javascript" src="js/templatemo_script.js"></script>
 -->
<!--     <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
   <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 <!--  <script>
  $("#datepicker").datepicker({dateFormat: "yy/mm/dd"});
  $("#datepicker2").datepicker({dateFormat: "yy/mm/dd"});
  </script> -->
    </div>
<!-- FOOTER -->
</body>
</html>
