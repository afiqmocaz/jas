<!DOCTYPE html>
<html lang="en">
<head>
  <title>APCS Section A</title>
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
 -->  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/justified-nav.css')!!}
  {!!Html::style('css/templatemo_style.css')!!}
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
          <li class="active"><a href="/apcsSectionA/create">SECTION A</a></li>
                    <li class="disabled"><a>SECTION B</a></li>
                    <li class="disabled"><a>SECTION C</a></li>

                    <li class="disabled"><a>SECTION D</a></li>
              
                    <li class="disabled"><a>SECTION E</a></li>
              
                    <li class="disabled"><a>SECTION F</a></li>
              
            </ul>
            </div> <!-- nav -->
          </div>
          </div>





<!-- PAGE TITLE -->
<div class="well well-lg" style="margin-left: 5%; margin-right: 5%">
  <h2 >PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3 ><strong>
   SECTION A - PERSONAL INFORMATION
 </strong></h3>


<!-- <div class="well well-sm" style="margin-left: 5%; margin-right: 5%;background-color: #ffe6e6; border-color: red; display:inline-block;">
          <strong style="color: red">Please click Add New button to enter your  Personal Information  </strong><br>
          </div>
<button type="button" class="button add"  style="margin-right: 30%" onclick="window.location.href='/apcsSectionA/create'">Add New</button> -->











<div>
     <table class="table table-bordered">
  <tbody>
 
    <tr>
      <td style="background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Passport Image</label>
      </td>
      <td style="background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="background-color: #f2f2f2">
        @foreach($apcsSectionA as $apcsSectionAs)
      <img class="file" src="/image/{{$apcsSectionAs->image}}" href="/image/{{$apcsSectionAs->image}}" width="100px" height="150px"></img></td>
      @endforeach
        

        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
         
        {{ Auth::user()->name }}
        
        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Title</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->title }}
        @endforeach
        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">NRIC / Passport</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
        {{ Auth::user()->nric }}
        
      </td>
    </tr>
      <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Address</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->address }}
        @endforeach
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">City</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->city }}
        @endforeach
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Postcode</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->postcode }}
        @endforeach
      </td>
    </tr>
    @if($apcsSectionAs->country_id === 'Malaysia')
    <tr class="rowState">
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">State</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->state }}
        @endforeach
      </td>
    </tr>
    @endif
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Country</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->country_id }}
        @endforeach
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Mail Address</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->mailaddress }}
        @endforeach
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Mail Postcode</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->mailpostcode }}
        @endforeach
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Email</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->email }}
        @endforeach
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Bumiputera Status</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->bumiputerastatus }}
        @endforeach
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Phone No</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      @foreach($apcsSectionA as $apcsSectionAs)
        {{ $apcsSectionAs->phoneno }}
        @endforeach
      </td>
    </tr>
    @foreach($apcsSectionA as $apcsSectionAs)
    @if ($apcsSectionAs->faxno != '')
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Fax No</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
        {{ $apcsSectionAs->faxno }}
        
      </td>
    </tr>
    @endif
    @endforeach

    @foreach($apcsSectionA as $apcsSectionAs)
    @if ($apcsSectionAs->placeofissue != '')
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Place of Issue</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
        {{ $apcsSectionAs->placeofissue }}
        
      </td>
    </tr>
    @endif
    @endforeach

    @foreach($apcsSectionA as $apcsSectionAs)
    @if ($apcsSectionAs->dateofissue != '')
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Date of Issue</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
        {{ $apcsSectionAs->dateofissue }}
        
        
      </td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>   
</div>     
@if ($apcsSectionA !== '')
@foreach($apcsSectionA as $apcsSectionAs)
<div >
  <a href="/apcsSectionB/create" >
            {{ Form::button('Next', array('class'=>'button next', 'type'=>'submit')) }}</a>

  <a href="{{ route('apcsSectionA.edit', $apcsSectionAs->id) }}" >
            {{ Form::button('Edit', array('class'=>'button edit', 'type'=>'submit')) }}</a>



</div>
      @endforeach
      @endif
     

<br><br>

</div></div>



 


<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 <label href="#">Jabatan Alam Sekitar</label>
          </div>
        </div>
            
      </div>
    </footer>

    <script type="text/javascript">
  function dynInput(cbox) {
      if (cbox.checked) {
        var input = document.createElement("input");
        input.type = "text";
        input.name = "regNo";
        var div = document.createElement("div");
        div.id = cbox.name;
        div.innerHTML = " <br> &nbsp &nbsp &nbsp &nbsp &nbsp Registered Number : " ;
        div.appendChild(input);
        document.getElementById("insertinputs").appendChild(div);
      } else {
        document.getElementById(cbox.name).remove();
      }
    }
</script>

 <script type="text/javascript">
  $('#country_id').on('change', function () {
    if (this.value == 'Malaysia') {
        $("#txtA").hide();
        document.getElementById("dateofissue").required = false;
        document.getElementById("placeofissue").required = false;
    } else {
        $("#txtA").show();
    }

});

 </script>






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
</body>
</html>

