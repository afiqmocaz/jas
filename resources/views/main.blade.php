<!DOCTYPE html>
<html lang="en">
<head>
  <title>EIA @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  {{ Html::style('css/styles.css') }}
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../js/fileinput.js" type="text/javascript"></script>
    <script src="../js/fileinput_locale_fr.js" type="text/javascript"></script>
    <script src="../js/fileinput_locale_es.js" type="text/javascript"></script>
    <script src="../themes/explorer/theme.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
  <style>

  ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
    background-color: #eee;
    font-size: 17px;
}
ul.breadcrumb li {display: inline;}
ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
}
ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
}
ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
}

  .button {
  background-color: Transparent;
  background-image:url('images/button.png');
  background-repeat:no-repeat;
  background-size:contain;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 21px;
  padding: 12px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;


}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
    /* Remove the navbar's default margin-bottom and rounded borders */
    
    .navbar {
      background-color: green;
      margin-bottom: 0;
      border-radius: 0;
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
  
<!-- <img class="banner" src="images/Banner.png"> -->

<img class="img-responsive" src="images/Banner.png" alt="">
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
      <a class="navbar-brand" href="#">EIA Consultant</a> 
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--<li class="{{ Request::is('selflearning(module1)') ? "active" : "" }}"><a href="/selflearning(module1)">Self Learning</a></li>-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>SELF LEARNING </strong><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="{{ Request::is('selflearning(module1)') ? "active" : "" }}"><a href="/selflearning(module1)">Module 1</a></li>
            <li class="{{ Request::is('modul2') ? "active" : "" }}"><a href="/modul2">Module 2</a></li>
            <li class="{{ Request::is('modul3') ? "active" : "" }}"><a href="/modul3">Module 3</a></li>
            <li class="{{ Request::is('modul4') ? "active" : "" }}"><a href="/modul4">Module 4</a></li>
            <li class="{{ Request::is('modul5') ? "active" : "" }}"><a href="/modul5">Module 5</a></li>
            <li role="separator" class="divider"></li>
            <li class="{{ Request::is('modulsummary') ? "active" : "" }}"><a href="/modulsummary">Summary</a></li>
          </ul>
        </li>
        <li class="{{ Request::is('exam') ? "active" : "" }}"><a href="/exam"><strong>COMPREHENSIVE EXAM</strong></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>COURSE ASSIGNMENT </strong><span class="caret"></span></a>
          <ul class="dropdown-menu">
            
            <li class="{{ Request::is('assignment') ? "active" : "" }}"><a href="/assignment">General Question</a></li>
            <li class="{{ Request::is('specificquestion') ? "active" : "" }}"><a href="/specificquestion">Specific Question</a></li>
            
          </ul>
        </li>
        <li class="{{ Request::is('interview') ? "active" : "" }}"><a href="/interview"><strong>PROFESSIONAL INTERVIEW</strong></a></li>
        <li class="{{ Request::is('certificate') ? "active" : "" }}"><a href="/certificate"><strong>CERTIFICATE</strong></a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user" data-toggle="tooltip" data-original-title="Ahmad bin Mohd"></span></a></li>
      </ul>

<!--<ul class="list-inline">
    <li><a href="#" title="Header" data-toggle="popover" data-placement="top" data-content="Content">Top</a></li>
    <li><a href="#" title="Header" data-toggle="popover" data-placement="bottom" data-content="ahmad bin mohd">Bottom</a></li></ul> -->
    </div>


  </div>
</nav> 


<div class="container">
  <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default"style="margin-left:8%;width:84%">
<div class="panel-body">
                   <label style="margin-left:3%">Time Remaining:</label><label id="demo" style=""></label>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Sept 19, 2017 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
</div>
</div>
</div>
</div>






<!--<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Self Learning</a></li>
  <li><a href="#">Module 1</a></li>
  <li>Quiz Module 1</li>
</ul>-->

@include('partials._messages')
  
<div class="container-fluid text-center">  

  @yield('content')


</div>
</div>

<footer class="container-fluid text-center">
  <p>@ All Right Reserved!</p>
</footer>


</body>
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

$(function(){
    $('#browse_app').click(function(){
        window.location='/selflearning(module1)'
    });
});

$(function(){
    $('#browse_app2').click(function(){
        window.location='/modul2'
    });
});

$(function(){
    $('#browse_app3').click(function(){
        window.location='/modul3'
    });
});

$(function(){
    $('#browse_app4').click(function(){
        window.location='/modul4'
    });
});

$(function(){
    $('#browse_app5').click(function(){
        window.location='/modul5'
    });
});

$(function(){
    $('#browse_summary').click(function(){
        window.location='/modulsummary'
    });
});

$('#file-fr').fileinput({
        language: 'fr',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
    $('#file-es').fileinput({
        language: 'es',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
    $("#file-0").fileinput({
        'allowedFileExtensions': ['jpg', 'png', 'gif']
    });
    $("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    /*
     $(".file").on('fileselect', function(event, n, l) {
     alert('File Selected. Name: ' + l + ', Num: ' + n);
     });
     */
    $("#file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        initialPreview: [
            "http://lorempixel.com/1920/1080/transport/1",
            "http://lorempixel.com/1920/1080/transport/2",
            "http://lorempixel.com/1920/1080/transport/3",
        ],
        initialPreviewConfig: [
            {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
            {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
            {caption: "transport-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3},
        ],
    });
    $("#file-4").fileinput({
        uploadExtraData: {kvId: '10'}
    });
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
    /*
     $('#file-4').on('fileselectnone', function() {
     alert('Huh! You selected no files.');
     });
     $('#file-4').on('filebrowse', function() {
     alert('File browse clicked for #file-4');
     });
     */
    $(document).ready(function () {
        $("#test-upload").fileinput({
            'showPreview': false,
            'allowedFileExtensions': ['jpg', 'png', 'gif'],
            'elErrorContainer': '#errorBlock'
        });
        $("#kv-explorer").fileinput({
            'theme': 'explorer',
            'uploadUrl': '#',
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [
                "http://lorempixel.com/1920/1080/nature/1",
                "http://lorempixel.com/1920/1080/nature/2",
                "http://lorempixel.com/1920/1080/nature/3",
            ],
            initialPreviewConfig: [
                {caption: "nature-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
                {caption: "nature-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
                {caption: "nature-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3},
            ]
        });
        /*
         $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
         alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
         });
         */
    });

</script> 
</html>
