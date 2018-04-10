<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */

    .outer {
   display: table;
   width: 100%;
}
.inner {
   display: table-cell;
   text-align: center;
   vertical-align: middle;
}
    
    .navbar {
      background-color: green;
      margin-bottom: 0;
      border-radius: 0;
    }

    .fixed-table-container {
      border: 0px;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: green;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    

.banner {
    margin: 0 auto;
  
    background-size: cover;
}

  </style>

  </head>
<body>
  <script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        placement : 'bottom'
    });
});
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script> 
<!-- <img class="banner" src="images/Banner.png"> -->
<img class="img-responsive" src="images/Banner.png" alt="">

   <div class="container">

</div>

  <!-- <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="images/Banner.png"></iframe>
  </div> -->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- <a class="navbar-brand" href="#">Logo</a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="/profile">Personal Profile</a></li>
        <li><a href="/profile">Self Learning</a></li>
        <li><a href="/cpd">Continuous Professional Development</a></li>
        <li><a href="/certificaterenewal">Certificate Renewal</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user" data-toggle="tooltip" data-original-title="Ahmad bin Mohd"></span></a></li>
      </ul>

<!-- <ul class="list-inline">
    <li><a href="#" title="Header" data-toggle="popover" data-placement="top" data-content="Content">Top</a></li>
    <li><a href="#" title="Header" data-toggle="popover" data-placement="bottom" data-content="ahmad bin mohd">Bottom</a></li></ul> -->
    </div>


  </div>
</nav>

  
<div class="container-fluid text-center"> 
<center><h1>Qualified Person Profile</h1></center>   
  @yield('content2')


</div>

<footer class="container-fluid text-center">
  <p>@ All Right Reserved!</p>
</footer>

</body>
</html>
