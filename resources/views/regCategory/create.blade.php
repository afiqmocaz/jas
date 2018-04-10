<!DOCTYPE html>
<html lang="en">
<head>
  <title>CATEGORY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/justified-nav.css" rel="stylesheet" type="text/css">
  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/justified-nav.css')!!}
  {!!Html::style('css/templatemo_style.css')!!}
  {!!Html::style('css/parsley.css')!!}

  <style>
    p {
        text-indent: 30px;
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
    .img-responsive {
      float: left;
    }
  </style>
  </head>
<body>

  <!-- HEADER -->
    <div class="container">
    <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
      <!--img src="image/banner1.png" alt="header image" width="2048" height="100" class="img-responsive cleaner"-->
    </div>
    </div>
  <!-- HEADER -->


<div class="container">
<center>
  <h2>PRE-QUALIFICATION REGISTRATION</h2>
  </br>
  </br>
  <!-- DISPLAY INFO -->
          <label for="example-text-input" class="col-2 col-form-label">NEW APPLICANT</label>
        &nbsp &nbsp
          <label for="example-text-input" class="col-2 col-form-label">| {{ Auth::user()->nric }}</label>
        &nbsp &nbsp
          <label for="example-text-input" class="col-2 col-form-label">{{ Auth::user()->name }}</label>
<!-- DISPLAY INFO -->
 &nbsp &nbsp
<button class="button" a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Signout</button>

</br>
<div class="panel-body"; style="color: blue">Choose <strong>ONE</strong> category based on your profession
        </div>
        </br>
<div class="container">
    <input type="image" src="{{URL::asset('/image/eia.png')}}" alt="Submit" height="20%" width="30%", onclick="window.location.href='/eiaSectionA/create'" style="box-shadow: 10px 10px 5px grey">
    &nbsp &nbsp &nbsp
    <input type="image" src="{{URL::asset('/image/iets.png')}}" alt="Submit" height="20%" width="30%", onclick="window.location.href='/ietsSectionA/create'" style="box-shadow: 10px 10px 5px grey">
    &nbsp &nbsp &nbsp
    <input type="image" src="{{URL::asset('/image/apcs.png')}}" alt="Submit" height="20%" width="30%", onclick="window.location.href='/apcsSectionA/create'" style="box-shadow: 10px 10px 5px grey">
 

    <div class="col-xs-12" style="height:50px;"></div>
              
</div></div>

<center>



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
      </div>

    <!-- templatemo 393 fantasy -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>
    </div>
<!-- FOOTER -->
</body>
</html>
