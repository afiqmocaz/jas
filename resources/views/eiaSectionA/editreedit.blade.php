@if(App\User::permission('applicants'))
<html lang="en">
<head>
  <html lang="en">
<head>
  <title>EIA Section A</title>
<!--   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/justified-nav.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<!--   <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">

 --> 
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/justified-nav.css')!!}
 {!!Html::style('css/templatemo_style1.css')!!}
  {!!Html::style('css/parsley.css')!!}
  {!!Html::style('css/button.css')!!}

 <script>
    function SameAs(f) {
  if(f.sameas.checked == true) {
    f.mailaddress.value = f.address.value + ", " + f.city.value + ", " + f.state.value + ", " + f.country_id.value;
    f.mailpostcode.value = f.postcode.value;
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

    input:invalid,
    select:invalid,
    textarea:invalid,
    input[type=radio]:invalid {
      border-color: 1px solid red;
      background-color:  #ffe6e6;
      outline: 1px solid red;
    }
    .navbar-brand {
  padding: 0px;
  width:100px;
}
.navbar-brand>img {
  height: 100%;
  padding: 15px;
  width: 85px;
}
.example2 .navbar-brand>img {
  padding: 7px 14px;
}
.navbar .nav > li > a, .navbar .nav > li > a:first-letter,
.navbar .nav > li.current-menu-item > a, 
.navbar .nav > li.current-menu-ancestor > a {

color:          black;                        
font-family:    bodoni;
 font-weight: bold;
}

</style>

</head>
<body>
<!-- HEADER -->
   <!--  <div class="container">
     <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner"> -->
      <!--img src="image/banner1.png" alt="header image" width="2048" height="100" class="img-responsive cleaner"
   </div> 
    <!-- <div class="col-xs-10" style="height:20px;"></div> -->
    <!-- </div> -->
  <!-- HEADER -->
 

 <!--<div class="well well-sm"  style="margin-left: 5%; margin-right: 15%; background-color: white">
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
          <label>: &nbsp &nbsp &nbsp <!-- 931405105499 -->
          <!--</label>
          <strong>{{ Auth::user()->nric }}</strong>
        </td>
      </tr>
     <tr>
        <button  class="small btn-primary" a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Signout</button>
      </tr>  
     <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </tbody>  
  </table>
  </div>-->
 
<!-- DISPLAY PERSONAL INFO -->

<!-- <div style="margin-left: 80%">
 
<u></u>l class="nav navbar-nav" style="color:black">
  
    <li id="Menu-Home" style="color:black"> 
    <a href="{{url('/')}}" style="color: black">
      <span class="glyphicon glyphicon-home"></span><strong>Home</strong>
    </a>
    </li>
    <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:black">
    <span class="glyphicon glyphicon-user" ></span> <strong>Profile</strong> <span class="caret"></span></a>
    <ul class="dropdown-menu"> <li id="Menu-Home" style="color:black"> 
    <a href="{{url('/')}}" style="color: black">
      <span class="glyphicon glyphicon-log-out"></span><strong>Sign Out</strong>
    </a>
    </li>
    </li><li id="Menu-Profile" style="color:black"><a href="/ctsonline/Account/ChangePassword"><span class="glyphicon glyphicon-lock"></span> Change Password</a></li>
    </ul>
    </li>



</ul>

</div> -->

@include('header')
  <!-- NAVIGATION BAR -->
  <div class="container" style="width:100%">
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
                    <li class="disabled"><a>SECTION B</a></li>
                    <li class="disabled"><a>SECTION C</a></li>

                    <li class="disabled"><a>SECTION D</a></li>
              
                    <li class="disabled"><a>SECTION E</a></li>
              
                    <li class="disabled"><a>SECTION F</a></li>
              
            </ul>

            </div> <!-- nav -->
          </div>
          </div>
  <!-- NAVIGATION BAR -->
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

<!-- PAGE TITLE -->
<center>
  <h2 >PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3 ><strong>
   SECTION A - PERSONAL INFORMATION
 </strong></h3>
</center>





 <!-- INSTRUCTION -->
  <div style="width: 60%; margin-left: 10%" class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">EIA Section A Instruction :</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">•  Enter your full name based on your name in I/C or passport<br />
        •  Click on <strong>Choose File </strong> to upload your photo and your photo must be in <strong>passport size</strong><br />
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


<br>

<!-- FORM -->

   <div class="well well-lg"  style="margin-left: 10%; margin-right: 10%; border-color: blue; background-color: #e6f2ff">    
  <table class="table">
    <tbody>
        {!! Form::model($eiaSectionA, ['route' =>['eiaSectionA.update', $eiaSectionA->id], 'method' => 'PUT', 'files'=>'true']) !!}
        <tr>

        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            {{ Form::label('featured_image', 'Passport Photo:') }}

            <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
            </td>
<!-- <td colspan="4">
    <input name="discount" type="radio" id="Yes" value="Yes" required="" />Yes
    <input name="discount" type="radio" id="No" value="No" required="" />No<br />  
    <select class="purple" name="discountselection" id="discountselection" disabled required="">
        <option data-foo="" value="" disabled="true" selected="true">--Select year--</option>
        <option value="1 Year">1 Year</option>
        <option value="2 Years">2 Years</option>
        <option value="3 Years">3 Years</option>
    </select>                  
</td> -->


            <td>
              <label for="example-text-input" class="col-2 col-form-label">:
            </td>
            <td>
            <em><label style="color: #aab2bd" class="col-2 col-form-label">image must be in (.png) and (.jpeg)</label></em>
            </br>
              <!-- {{ Form::file('featured_image')}} -->
              <input type="file" name="featured_image" accept="image/*" onchange="ValidateSingleInput(this);">
              
              <img class="file" src="/image/{{$eiaSectionA->image}}" href="/image/{{$eiaSectionA->image}}" width="100px" height="150px">
            
              </br>
                </td>
               
        </tr>
        <tr>
          <td>
              
              
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp{{ Form::label('name', 'Full Name:') }}

            <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
            </td>

            <td>
              <label for="example-text-input" class="col-2 col-form-label">:
            </td>
            <td>
              {{ Form::text('name', Auth::user()->name , array('class' => 'form-control',
               'style' => 'width: 95%', 'placeholder'=>'Eg: Muhd Izzat',
                'required' => ''))}}
                                </td>
        </tr>
        <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Title</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
    <!--     {{ Form::select('title', ['mr' => 'Mr', 'mrs' => 'Mrs', 'miss' => 'Miss', 'dr' => 'Dr', 'prof' => 'Prof' ], 'mr', array('class' => 'form-control', 'style' => 'width: 20%', 'required' => ''))}} -->
    
    {{ Form::select('title', ['Mr' => 'Mr', 'Mrs' => 'Mrs', 'Miss' => 'Ms', 'Dr' => 'Dr', 'Prof' => 'Prof' ], $eiaSectionA->title, array('class' => 'form-control', 'style' => 'width: 20%', 'required' => ''))}}
    
  

        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">NRIC / Passport</label>
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <!-- <label for="example-text-input" class="col-2 col-form-label">931405105499</label> -->
          {{ Auth::user()->nric }}
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Address</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          {{ Form::textarea('address', null, array('id'=>'address','style'=>'width: 95%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: No. 64, Jln Pahlawan 21, Taman Pahlawan', 'required' => '','maxlength' => 255 ))}}
          <!--<textarea style="width: 70%" class="form-control" rows="5" id="comment"></textarea>-->
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">City</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <!-- {{ Form::text('city', null, array('class' => 'form-control', 'style' => 'width: 30%', 'placeholder'=>'Eg: Banting', 'required' => ''))}} -->
          {{ Form::text('city', null, array('class' => 'form-control', 'style' => 'width: 30%', 'placeholder'=>'Eg: Banting', 'required' => '', 'id' => 'city', 'maxlenght'=>35))}}
          <!--<input style="width: 20%" class="form-control" type="text" id="example-text-input">-->
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Postcode</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <input type="value" pattern="\d+" id="postcode" name="postcode" class="form-control" style="width: 25%" placeholder="Eg: 42500" required title="Enter digit only. Min : 3, Max : 10" minlength="3" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{$eiaSectionA->postcode}}"> 
          
        </td>
      </tr>
       <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp{{ Form::label('country_id', 'Country')}}
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <select class="form-control" name="country_id" id="country_id" onchange="myFunction()" style="width:35%" required="">
            <option value="{{ $eiaSectionA->country_id}}">{{ $eiaSectionA->country_id}}</option>
           <option data-foo="" value="">--Please select--</option>
          @foreach ($country as $country) 
          {

            <option value="{{ $country->name}}">{{ $country->name }}</option>
          }
          @endforeach
        </select>
          </td>
      </tr>
      <tr id="state1" >
      <div style="display: none;">
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">State</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>

        <select class="form-control" name="state" id="state" required="" onchange="myFunction2()" style="width:40%">
            @if($eiaSectionA->country_id=='Malaysia')
            <option value="{{ $eiaSectionA->state}}">{{ $eiaSectionA->state}}</option>
         @else
          <option value="">--please select--</option>
          @endif
          @foreach ($state as $state) 
          {

            <option value="{{ $state->state }}">{{ $state->state }}</option>
          }
          @endforeach
        </select>
      
        </td>
        </div>
      </tr>
     
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Mail Address</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <input type="checkbox" name="sameas" id="sameas" onclick="SameAs(this.form)">
          <em>Check this box if Address and Mail Address are the same.</em>
          
          {{ Form::textarea('mailaddress', null, array('id'=>'mailaddress','style'=>'width: 95%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: No. 64, Jln Pahlawan 21, Taman Pahlawan', 'required' => '','maxlength'=>255))}}
          <!--<textarea style="width: 70%" class="form-control" rows="5" id="comment"></textarea>-->
        </td>

      </tr>
       <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Mail Postcode</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <input type="value" pattern="\d+" id="mailpostcode" name="mailpostcode" class="form-control" style="width: 25%" placeholder="Eg: 42500" required title="Enter digit only. Min : 3, Max : 10" minlength="3" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{$eiaSectionA->mailpostcode}}"> 
           
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Email</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
           {{ Form::email('email', null, array('class' => 'form-control', 'style' => 'width: 55%', 'placeholder'=>'Eg: izzat@gmail.com', 'required' => '','maxlength'=>100))}}
          <!--<input style="width: 30%" class="form-control" type="text" id="example-text-input">-->
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Bumiputera status</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
           {{ Form::radio('bumiputerastatus', 'Bumiputera' , true) }}
          {{ Form::label('Bumiputera')}}
          {{ Form::radio('bumiputerastatus', 'Non-Bumiputera' , false) }}
          {{ Form::label('Non-Bumiputera')}}
          {{ Form::radio('bumiputerastatus', 'Others' , false) }}
          {{ Form::label('Others')}} 
       
        <!-- <input type="radio" name="bumiputerastatus" value="Bumiputera" onclick="show1();" />
        Bumiputera
        <input type="radio" name="bumiputerastatus" value="Non-Bumiputera" onclick="show2();" />
        Non-Bumiputera
        <input type="radio" name="bumiputerastatus" value="Others" onclick="show3();" />
        Others
        <div id="div1" class="hide">
        <em><label style="color: #aab2bd; margin-left: 50%">Enter your Bumiputera status</label></em>
        <input style="width: 30%; margin-left: 50%" class="form-control" type="text">
        </div> -->



        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
           {{ Form::text('phoneno', null, array('id' => 'numb', 'class' => 'form-control', 'style' => 'width: 30%', 'placeholder'=>'Eg: 0132458672', 'required' => '','maxlength'=>15,'minlength'=>10))}} 
         
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Fax No.</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
         {{ Form::text('faxno', null, array('id' => 'faxno', 'class' => 'form-control', 'style' => 'width: 30%', 'placeholder'=>'Eg: 0132458672','maxlength'=>32,'minlength'=>10))}} 
        </td>
      </tr>


        <tr>
        <td colspan="3">
              
           <label for="chkPassport">
                <input class="boxcheck" type="checkbox" id="chkPassport" />
                Check this box if you are an existing consultant
          </label>
      
        </td>
      </tr>
      </tbody>
    </table>

<div id="dvPassport" style="display: none;">
               
          <table class="table">
    <tbody>
   
      <tr>
        <td>
          <label for="example-text-input" class="col-2 col-form-label" style="margin-left: 12%">Registered Number</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td style="margin-right: 15%">
          <label for="example-text-input" class="col-2 col-form-label" >:</label>
        </td>
        <td>
          {{ Form::text('regNo', null, array('id' => 'regNo', 'class' => 'form-control', 'style' => 'width: 35%', 'placeholder'=>'Eg:QP123456'))}}
        </td>
      </tr>
      
    </tbody>
  </table>
</div>
    
    <div class="well" id="txtA"  style="background-color: #e6e9ed; border-color: blue; width: 99%">
      <table class="table">
    <tbody>
    <tr>
        <td colspan="3">
          <label for="example-text-input" style="color: blue" class="col-2 col-form-label">Additional information for Non-Malaysian</label>
    <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        
      </tr>
      <tr>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">Place of Issue</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          {{ Form::text('placeofissue', null, array('id' => 'placeofissue', 'class' => 'form-control', 'style' => 'width: 60%', 'placeholder'=>'Eg: United State','maxlength' => 45))}}
          <!--<input style="width: 40%" class="form-control" type="text" id="example-text-input">-->
        </td>
      </tr>
      <tr>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">Date of Issue</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
                
<div class="input-group date" id="datepickerDemo17">
    
        <input type="text" class="form-control inputan kusus" id="dateofissue" data-format="dd-MM-yyyy" name="dateofissue"  value="{{$eiaSectionA->dateofissue}}" style="width: 55%" />  
        </div>

        </td>
      </tr>

    </tbody>
  </table>
</div>
<button style="margin-right: 15%" type="submit" class="button save">Update</button>
  </br>

</div></div>

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


    {!! Html::script('js/parsley.min.js')!!}
  {!! Html::script('js/jquery.js')!!}
  {!! Html::script('js/bootstrap.min.js')!!}
  {!! Html::script('js/templatemo_script.js')!!}
   
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- templatemo 393 fantasy -->


  <script>
  $('#txt').click(function() {
    $("#txtC").toggle(this.checked);
    $("#txtD").toggle(this.checked);
    $("#txtE").toggle(this.checked);
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
<!-- FOOTER -->
  

<!-- <script type="text/javascript">
  $('#country_id').hide();

$('#No').click(function() {
    $('#country_id').hide();
    $('#country_id').removeAttr('required');
});

$('#Yes').click(function() {
    $('#country_id').show();
    $('#country_id').removeAttr('disabled');
});
</script> -->
<!-- <script>
        $("#No").click(function() {
            $("#discountselection").prop("required", false);
            $("#discountselection").prop("disabled", true);
        });
        $("#Yes").click(function() {
           $("#discountselection").prop("required", true);
           $("#discountselection").prop("disabled", false);
        });
        

    </script>
 -->
 <script type="text/javascript">
 
  
 
   if('{{$eiaSectionA->country_id}}' === 'Malaysia'){
       $("#txtA").hide();
         $("#state1").show();
       document.getElementById("state").required = true;
        document.getElementById("placeofissue").required = false;
        document.getElementById("dateofissue").required = false;
$("#dateofissue").val('');
       $("#placeofissue").val('');

   }
   else{
      $("#state1").hide();
       document.getElementById("state").required = false;
       document.getElementById("placeofissue").required = true;
        document.getElementById("dateofissue").required = true;

   }

 
  $('#country_id').on('change', function () {
    if (this.value == 'Malaysia') {
        $("#txtA").hide();
          $("#state1").show();
       document.getElementById("state").required = true;
       // document.getElementById("placeofissue").required = false;
       $("#dateofissue").val('');
       $("#placeofissue").val('');
         document.getElementById("state").required = true;
          document.getElementById("dateofissue").required = false;
        document.getElementById("placeofissue").required = false;
    } else {
        $("#txtA").show();
         $("#state1").hide();
        document.getElementById("state").required = false;
        $("#state").val('');
        document.getElementById("dateofissue").required = true;
        document.getElementById("placeofissue").required = true;
    }
    
   

});
 </script>
 <script type="text/javascript">

 </script>


<script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
                 document.getElementById("regNo").required = true;
            } else {
                $("#dvPassport").hide();
            }
        });
    });
</script>
<script type="text/javascript">
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
</script>

<script type="text/javascript">
 if( document.getElementById("regNo").value === '' ){
      $("#dvPassport").hide();
      document.getElementById("regNo").required = false;
    }
    else{
       $("#dvPassport").show();
       document.getElementById("chkPassport").checked=true;
       //document.getElementById("regNo").required = true;
    }
</script>


<script  type="text/javascript">
  $(document).ready(function () {
    $('#chkPassport').on('change', function (e) {
        
        $("#chkPassport").prop("unchecked", this.unchecked);
      $("#regNo").val('');

    });
});

</script>




<script type="text/javascript">
  if( document.getElementById("mailaddress").value === '' ){
     document.getElementById("sameas").checked=false;
    }

      var x = document.getElementById("address").value+ ", "+document.getElementById("city").value+ ", "+ document.getElementById("state").value+ ", " +document.getElementById("country_id").value;

     if( document.getElementById("mailaddress").value === x ){
     document.getElementById("sameas").checked=true;
    }
</script>

<script>
function myFunction() {
    var x = document.getElementById("country_id").value;
   // document.getElementById("mailaddress").innerHTML = "You selected: " + x;
   document.getElementById("sameas").checked=false;
}

</script>
<script>
function myFunction2() {
    var y = document.getElementById("state").value;
   // document.getElementById("mailaddress").innerHTML = "You selected: " + x;
   document.getElementById("sameas").checked=false;
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
</body>
@else
<center><h1>NO PERMISSION TO ACCESS.PLEASE LOG IN INTO THE SYSTEM.</h1>
<a href="/">Login</a>
</center>
@endif

</html>
