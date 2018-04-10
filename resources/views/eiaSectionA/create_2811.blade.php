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
else if(f.sameas.checked == false)
   {
    
       f.mailaddress.value = ''; 
    f.mailpostcode.value = '';
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

  #myemailform .error {
    color: red;
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
   <!-- NAVIGATION BAR -->
  <div class="container" style="width: 100%">
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
  <h2>PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3><strong>
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
        <div class="panel-body">â€¢  Enter your full name based on your name in I/C or passport<br />
        â€¢  Click on <strong>Choose File </strong> to upload your photo and your photo must be in <strong>passport size</strong><br />
        â€¢  Click on button <strong>Cancel Registration</strong> to cancel your application<br />
        â€¢  Click on button <strong>Save Draft</strong> to save your application as draft<br />
        â€¢  Click on button <strong>Next</strong> to save your application and continue to next step<br />
        â€¢  You are <strong style="color: red">NOT ALLOWED</strong> to go to next page before completing this section
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

<div class="table-responsive">
   <div class="well well-lg"  style="margin-left: 10%; margin-right: 10%; border-color: blue; background-color: #e6f2ff">
  <div class="row main">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('eiaSectionA.store')}}" name="myemailform" id="myemailform"  accept-charset="UTF-8"
  enctype="multipart/form-data">
            {{ csrf_field() }}

         
                            
           <div class="form-group{{ $errors->has('featured_image') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Passport photo</span>
                  <input type="file" name="featured_image" accept="image/*" onchange="ValidateSingleInput(this);">
                </div>
                 @if ($errors->has('featured_image'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('featured_image') }}</text>
                      </span>
                  @endif
                <text id="validationfile" style="color:red"></text>
              </div>
            </div>






            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Name</span>
                  {{ Form::text('name', Auth::user()->name , array('class' => 'form-control',
               'style' => 'width: 50%', 'placeholder'=>'Eg: Muhd Izzat','onchange'=>'validatename(this)'))}}
                </div>
                 @if ($errors->has('name'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('name') }}</text>
                      </span>
                  @endif
                <text id="validationname" style="color:red"></text>
              </div>
            </div>


            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Title</span>
                   <select name="title" id="title" class="form-control" style="width: 15%" onchange="titleValidation(this);">
<option data-foo="" value=""  selected="true">--Please Select--</option>
    <option value="Mr">Mr</option>
    <option value="Mrs">Mrs</option>
    <option value="Miss">Ms</option>
    <option value="Dr">Dr</option>
    <option value="Prof">Prof</option>
</select>
                </div>
                @if ($errors->has('title'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('title') }}</text>
                      </span>
                  @endif
                 <text id="validationnric" style="color:red"></text>
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">NRIC/Passport.No</span>
                  {{ Form::text('nric', Auth::user()->nric , array('class' => 'form-control',
               'style' => 'width: 20%', 'placeholder'=>'Eg: Muhd Izzat','onchange'=>'validatename(this)','readonly'))}}
                </div>
                 @if ($errors->has('email'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('email') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
                  
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Address</span>
                  {{ Form::textarea('address', null, array('id'=>'address','style'=>'width: 50%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: No. 64, Jln Pahlawan 21, Taman Pahlawan', 'maxlength' => 255,'onchange' => 'validateaddress(this)'))}}

                </div>
                 @if ($errors->has('address'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('address') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
                  
            </div>

             <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">City</span>
                  <input type="text" name="city" id="city" class="form-control" style="width: 20%" placeholder="Eg: Banting"  minlength="3" maxlength="35" oninput="this.value=this.value.replace(/[^A-Za-z ]/g,'');" onchange="cityValidation(this);">
                </div>
                 @if ($errors->has('city'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('city') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
                  
            </div>

            <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Postcode</span>
                 <input type="text" pattern="\d+" name="postcode" id="postcode" class="form-control" style="width: 20%" placeholder="Eg: 42500"   minlength="3" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" onchange="postcodeValidation(this);">
          <text id="validationpcode" style="color:red"></text>
                </div>
                 @if ($errors->has('postcode'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('postcode') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
                  
            </div>

            <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Country</span>
                 <select class="form-control" name="country_id" id="country_id"   style="width:35%">
            <option value="" >--Please Select--</option>
          @foreach ($country as $country) 
          {

            <option value="{{ $country->name}}">{{ $country->name }}</option>
          }
          @endforeach
        </select>
          <text id="validationpcode" style="color:red"></text>
                </div>
                 @if ($errors->has('country_id'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('country_id') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
                  
            </div>

              <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}" id="state2" style="display: none;margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">State</span>
                 <select class="form-control" name="state" id="state"  style="width:20%">
            <option value="" >--Please Select--</option>
          @foreach ($state as $state) 
          {

            <option value="{{ $state->state}}">{{ $state->state }}</option>
          }
          @endforeach
        </select>
          <text id="validationpcode" style="color:red"></text>
                </div>
                 @if ($errors->has('state'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('state') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
                  
            </div>
<input type="checkbox" name="sameas" onclick="SameAs(this.form)"  style="margin-left: 5%">
          <em>Check this box if Address and Mail Address are the same.</em>
          
<div class="form-group{{ $errors->has('mailaddress') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">

                  <span class="input-group-addon">Mail Address</span>
          {{ Form::textarea('mailaddress', null, array('style'=>'width: 50%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: No. 64, Jln Pahlawan 21, Taman Pahlawan', 'maxlength' => 255))}}
          <text id="validationpcode" style="color:red"></text>
                </div>
                 @if ($errors->has('mailaddress'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('mailaddress') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
                  
            </div>

            <div class="form-group{{ $errors->has('mailpostcode') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">

                  <span class="input-group-addon">Mail Postcode</span>
          <input type="text" pattern="\d+" name="mailpostcode" id="mailpostcode" class="form-control" style="width: 20%" placeholder="Eg: 42500"   minlength="3" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" onchange="postcodeValidation(this);">
                </div>
                 @if ($errors->has('mailpostcode'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('mailpostcode') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
                  
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Email</span>
                 <input  type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email" style="width: 52%" maxlength="100" value="{{Auth::user()->email}}" required onchange="emailValidation(this);">
           <text id="validationemail" style="color:red"></text>
                </div>
                 @if ($errors->has('email'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('email') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
            </div>


             <div class="form-group{{ $errors->has('bumiputerastatus') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Bumiputera status</span>

                     <p class='container' style="width: 70%;margin-right: 50%;background-color: #e6f2ff">
<label><input type='radio' name="bumiputerastatus" value="Bumiputera"  />Bumiputera</label>  &nbsp &nbsp &nbsp
<label><input type='radio' name="bumiputerastatus" value="Non-Bumiputera" /> Non-Bumiputera</label>   &nbsp &nbsp &nbsp
<label><input type='radio' name="bumiputerastatus" value="Others" />Others</label>
  </p>
                
                  
                </div>
                 @if ($errors->has('bumiputerastatus'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('bumiputerastatus') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
            </div>

            <div class="form-group{{ $errors->has('phoneno') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Phone No.</span>
               
                    <input type="text" pattern="\d+" name="phoneno" class="form-control" style="width: 20%" placeholder="Eg: 0132458672"  minlength="10" maxlength="15"   oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                
                  
                </div>
                 @if ($errors->has('phoneno'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('phoneno') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
            </div>


             <div class="form-group{{ $errors->has('phoneno') ? ' has-error' : '' }}" style="margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Fax No.</span>
               
                   <input type="text" pattern="\d+" name="faxno" class="form-control" style="width: 20%" placeholder="Eg: 0132458672" minlength="10" maxlength="32" title="Enter digit only. Min : 10, Max : 11" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                
                  
                </div>
                 @if ($errors->has('faxno'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('faxno') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
            </div>
            
             <label for="chkPassport" style="margin-left: 5%">
                <input type="checkbox" id="chkPassport" />
                Check this box if you are an existing consultant
          </label>

          <div class="form-group{{ $errors->has('regNo') ? ' has-error' : '' }}" id="dvPassport" style="display: none;margin-left: 5%">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Registered No.</span>
               
                   {{ Form::text('regNo', null, array('id' => 'regNo', 'class' => 'form-control', 'style' => 'width: 15%', 'placeholder'=>'Eg:QP123456'))}}
                
                  
                </div>
                 @if ($errors->has('regNo'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('regNo') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
            </div>


             <div class="form-group{{ $errors->has('placeofissue') ? ' has-error' : '' }}" style="display: none;margin-left: 5%" id="poi">

                 <label for="example-text-input" style="color: blue" class="col-2 col-form-label">Additional information for Non-Malaysian</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Place of Issue</span>
               
                   {{ Form::text('placeofissue', null, array('id' => 'placeofissue', 'class' => 'form-control', 'style' => 'width: 20%', 'placeholder'=>'Eg: United State', 'maxlength' => 45))}}
                
                  
                </div>
                 @if ($errors->has('placeofissue'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('placeofissue') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
            </div>

             <div class="form-group{{ $errors->has('dateofissue') ? ' has-error' : '' }}" style="display: none;margin-left: 5%" id="doi">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">Date of Issue</span>
               
                   {{ Form::date('dateofissue', null, array('id' => 'dateofissue', 'class' => 'form-control', 'style' => 'width: 20%', 'placeholder'=>'Eg: United State', 'maxlength' => 45))}}
                
                  
                </div>
                 @if ($errors->has('dateofissue'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('dateofissue') }}</text>
                      </span>
                  @endif

                  <text id="validationemail" style="color:red"></text>
              </div>
            </div>
            



    </div>
              
        


    

  <!-- Modal -->
 
  <!-- Modal -->


             <!--  <button  type="button" class="btn btn-primary btn-lg btn-block login-button">Register</button> -->
           
      </div>
<div class="form-group " style="margin-left: 40%">
             <input type="submit" name='submit' class="button" value="Register">
          
</div>
    </div>
    </form>
    </div>

 </div>

</div>





<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
          </div>
        </div>
           </center>
      </div>
    </footer></div>
    <!-- templatemo 393 fantasy -->
    {!! Html::script('js/parsley.min.js')!!}
    {!! Html::script('js/jquery.js')!!}
    {!! Html::script('js/bootstrap.min.js')!!}
    {!! Html::script('js/templatemo_script.js')!!}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
 
<!--include jQuery Validation Plugin-->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js" type="text/javascript"></script>
 
<!--Optional: include only if you are using the extra rules in additional-methods.js -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/additional-methods.min.js" type="text/javascript"></script>

<!-- templatemo 393 fantasy -->

<!-- FOOTER -->
</div>
</body>
<script>
$("#password").on('input',function(e){
     var password = $("#password").val();
     console.log(password);
    
     var textValidation = "";
     if(password.length < 8){
         var textCount = "Password must at least 8 charachter"
         textValidation = textValidation + textCount;
         document.getElementById('password').style.borderColor = "red";
     }
     else{
      document.getElementById('password').style.borderColor = "green";
     }
     
     var matches = password.match(/\d+/g);
     if (matches === null) {
         var textNumber = "<br>Password must at least 1 number"
         textValidation = textValidation + textNumber;
         document.getElementById('password').style.borderColor = "red";
     }
     
     var matchesL = password.match(/[a-zA-Z]/);
     if (matchesL === null) {
         var textLetter = "<br>Password must at least 1 letter"
         textValidation = textValidation + textLetter;
         document.getElementById('password').style.borderColor = "red";
     }
     
     $('#passwordValidation').html(textValidation);
     
      var password = $("#password").val();
      var passwordC = $("#password_confirmation").val();
       if(!jQuery.isEmptyObject(passwordC) && password !== passwordC){
           $('#passwordValidationC').html("<br>confirmation password doesn't match");

      }else{
           $('#passwordValidationC').html("");
      }
     
});

$("#password_confirmation").on('input',function(e){
      var password = $("#password").val();
      var passwordC = $("#password_confirmation").val();
      
      if(!jQuery.isEmptyObject(passwordC) && password !== passwordC){
           $('#passwordValidationC').html("<br>confirmation password doesn't match");
            document.getElementById('password_confirmation').style.borderColor = "red";
      }else{
           $('#passwordValidationC').html("");
             document.getElementById('password_confirmation').style.borderColor = "green";
      }
});
</script>

<script type="text/javascript">
  $(function()
{
    $("#myemailform").validate(
      {
        rules: 
        {
           featured_image: 
          {
            required: true,
          },
          name: 
          {
            required: true
          },
          title: 
          {
            required: true
          },

          address: 
          {
            required: true
          },

          city: 
          {
            required: true
          },
          postcode: 
          {
            required: true
          },
           country_id: 
          {
            required: true
          },
           state: 
          {
            required: true
          },
           mailaddress: 
          {
            required: true
          },
           mailpostcode: 
          {
            required: true
          },
          email: 
          {
            required: true,
            email: true
          },
          bumiputerastatus: 
          {
            required: true,

            
          },
          phoneno: 
          {
            required: true,
            
          },
          regNo: 
          {
            required: true,
          },

           placeofissue: 
          {
            required: true,
          },
           dateofissue: 
          {
            required: true,
          },
          password: 
          {
            required: true,
          },
          password_confirmation: 
          {
            required: true,
          }
        },

       messages: {
         bumiputerastatus:
          {
            required:"This field is required<br/>"
          }
       },
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        },

        errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.container') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         }


    });
});
</script>
<script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
                // document.getElementById("regNo").required = true;
            } else {
                $("#dvPassport").hide();

            }
        });
    });
</script>

<script type="text/javascript">
  $('#country_id').on('change', function () {
    if (this.value == 'Malaysia') {
      $("#state2").show();
      $("#poi").hide();
      $("#doi").hide();
      //document.getElementById("state").required = true;
      
    } else {
         $("#state2").hide();
          $("#poi").show();
      $("#doi").show();
       // document.getElementById("state").required = false;
        // document.getElementById("dateofissue").required = true;
       // document.getElementById("placeofissue").required = true;
        $("#state").val('');
    }

});
 </script>

 <script  type="text/javascript">
  $(document).ready(function () {
    $('#chkPassport').on('change', function (e) {
        
        $("#chkPassport").prop("checked", this.checked);
        $("#regNo").val('');
    });
});
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


@else
<center><h1>NO PERMISSION TO ACCESS.PLEASE LOG IN INTO THE SYSTEM.</h1>
<a href="/">Login</a>
</center>
@endif
</html>
