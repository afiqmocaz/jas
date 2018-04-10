<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Jabatan Alam Sekitar</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
        {!! Html::script('js/jquery.min.js')!!}
        {!! Html::script('js/jquery.dataTables.min.js')!!}
        {!!Html::style('css/dataTables.min.css')!!}
        {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::style('css/select2.min.css')!!}
        {!!Html::style('css/justified-nav.css')!!}
        {!!Html::style('css/templatemo_style1.css')!!}
        {!!Html::style('css/parsley.css')!!}
        {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::style('css/responsive.bootstrap.min')!!}
        
        
          	{!!Html::style('lineicons/style.css')!!}
  	{!!Html::style('css/style.css')!!}
  	{!!Html::style('css/style-responsive.css')!!}
  	{!!Html::script('js/chart-master/Chart.js')!!}
        <style>

            /* The Modal (background) */
            .modal1 {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal1 Content */
            .modal1-content {
                position: relative;
                background-color: #fefefe;
                margin: auto;
                padding: 0;
                border: 1px solid #888;
                width: 80%;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s
            }

            /* Add Animation */
            @-webkit-keyframes animatetop {
                from {top:-300px; opacity:0} 
                to {top:0; opacity:1}
            }

            @keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
            }

            /* The Close Button */
            .close {
                color: white;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            .modal1-header {
                padding: 2px 16px;
                background-color: #5cb85c;
                color: white;
            }

            .modal1-body {padding: 2px 16px;}

            .modal1-footer {
                padding: 2px 16px;
                background-color: #5cb85c;
                color: white;
            }

            nav {
                float: left;
                max-width: 100%;
                min-width: 50%;
                /*margin-right: 50%;*/
                /*margin: -13px;*/
                /*padding: 1em;*/
            }

            article {
                margin-left: 53%;
                /*border-left: 1px solid gray;*/
                /*padding: 1em;*/
                overflow: hidden;
            }

            p {
                text-indent: 30px;
            }


            li {
                float: left;
            }

            li a, .dropbtn {
                /*                display: inline-block;*/
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
                z-index: 2;
            }

            .dropdown-content2 {
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

            .dropdown-content2 a {
                color: black;
                font-weight: bold;
                padding: 5px 84.5px;
                text-decoration: none;
                display: block;
                text-align: left;
            }

            .dropdown-content a:hover {background-color: #00ad00}

            .dropdown-content2 a:hover {background-color: #00ad00}

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown:hover .dropdown-content2 {
                display: block;
            }

            .dropbtn1 {
                background-color: #4CAF50;
                color: white;
                padding: 3px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                width: 900px;

            }

            .dropdown1 {
                position: relative;
                /*                display: inline-block;*/
            }

            .dropdown-content1 {
                display: none;
                position: absolute;
                background-color: #d9ffb3;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                width: 900px;
            }

            .dropdown-content1 a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content1 a:hover {background-color: #f1f1f1}

            .dropdown1:hover .dropdown-content1 {
                display: block;
            }

            .dropdown1:hover .dropbtn1 {
                background-color: #3e8e41;
            }

            .parent {display: block;position: relative;float: left;line-height: 15px;background-color: #006e00;border-right:#006e00 1px solid;}
            .parent a{margin: 0px;color: #000000;text-decoration: none;}
            .parent:hover > ul {display:block;position:absolute;}
            .child {display: none;}
            .child li {background-color: #E4EFF7;line-height: 30px;border-bottom:#CCC 1px solid;border-right:#CCC 1px solid; width:100%;}
            .child li a{color: #000000;}
            ul{list-style: none;margin: 0;padding: 0px; min-width:10em;}
            ul ul ul{left: 100%;top: 31px;margin-left:1px;background-color: #008000;}
            li:hover {background-color: #95B4CA;}
            .parent li:hover {background-color: #F0F0F0;}

            .parent1 {display: block;position: relative;float: left;line-height: 15px;background-color: #006e00;border-right:#006e00 1px solid;}
            .parent1 a{margin: 0px;color: #000000;text-decoration: none;}
            .parent1:hover > ul {display:block;position:absolute;}
            .child1 {display: none;}
            .child1 li {background-color: #E4EFF7;line-height: 30px;border-bottom:#CCC 1px solid;border-right:#CCC 1px solid; width:100%;}
            .child1 li a{color: #000000;}
            ul{list-style: none;margin: 0;padding: 0px; min-width:10em;}
            ul ul ul{left: 100%;top: 0px;margin-left:1px;background-color: #008000;}
            li:hover {background-color: #95B4CA;}
            .parent1 li:hover {background-color: #F0F0F0;}
            body
            {
                counter-reset: Serial;           /* Set the Serial counter to 0 */
            }

            /*            tr td:first-child:before
                        {
                            counter-increment: Serial;       Increment the Serial counter 
                            content:counter(Serial);  Display the counter 
                        }*/

            .breadcrumb {
                /*centering*/
                display: inline-block;
                /*box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.35);
                overflow: hidden;*/
                border-radius: 5px;
                /*Lets add the numbers for each link using CSS counters. flag is the name of the counter. to be defined using counter-reset in the parent element of the links*/
                counter-reset: flag; 
            }

            .breadcrumb a {
                text-decoration: none;
                outline: none;
                display: block;
                float: left;
                font-size: 12px;
                line-height: 36px;
                color: white;
                /*need more margin on the left of links to accomodate the numbers*/
                padding: 0 10px 0 30px;
                background: #666;
                background: linear-gradient(#666, #333);
                position: relative;
            }
            /*since the first link does not have a triangle before it we can reduce the left padding to make it look consistent with other links*/
            .breadcrumb a:first-child {
                padding-left: 15px;
                border-radius: 5px 0 0 5px; /*to match with the parent's radius*/
            }
            .breadcrumb a:first-child:before {
                left: 14px;
            }
            .breadcrumb a:last-child {
                border-radius: 0 5px 5px 0; /*this was to prevent glitches on hover*/
                padding-right: 20px;
            }

            /*hover/active styles*/
            .breadcrumb a.active, .breadcrumb a:hover{
                background: #333;
                background: linear-gradient(#333, #000);
            }
            .breadcrumb a.active:after, .breadcrumb a:hover:after {
                background: #333;
                background: linear-gradient(135deg, #333, #000);
            }

            /*adding the arrows for the breadcrumbs using rotated pseudo elements*/
            .breadcrumb a:after {
                content: '';
                position: absolute;
                top: 0; 
                right: -18px; /*half of square's length*/
                /*same dimension as the line-height of .breadcrumb a */
                width: 36px; 
                height: 36px;
                /*as you see the rotated square takes a larger height. which makes it tough to position it properly. So we are going to scale it down so that the diagonals become equal to the line-height of the link. We scale it to 70.7% because if square's: 
                length = 1; diagonal = (1^2 + 1^2)^0.5 = 1.414 (pythagoras theorem)
                if diagonal required = 1; length = 1/1.414 = 0.707*/
                transform: scale(0.707) rotate(45deg);
                /*we need to prevent the arrows from getting buried under the next link*/
                z-index: 1;
                /*background same as links but the gradient will be rotated to compensate with the transform applied*/
                background: #666;
                background: linear-gradient(135deg, #666, #333);
                /*stylish arrow design using box shadow*/
                box-shadow: 
                    2px -2px 0 2px rgba(0, 0, 0, 0.4), 
                    3px -3px 0 2px rgba(255, 255, 255, 0.1);
                /*
                        5px - for rounded arrows and 
                        50px - to prevent hover glitches on the border created using shadows*/
                border-radius: 0 5px 0 50px;
            }
            /*we dont need an arrow after the last link*/
            .breadcrumb a:last-child:after {
                content: none;
            }
            /*we will use the :before element to show numbers*/
            /*.breadcrumb a:before {
                    content: counter(flag);
                    counter-increment: flag;
                    /*some styles now
                    border-radius: 100%;
                    width: 20px;
                    height: 20px;
                    line-height: 20px;
                    margin: 8px 0;
                    position: absolute;
                    top: 0;
                    left: 30px;
                    background: #444;
                    background: linear-gradient(#444, #222);
                    font-weight: bold;
            }*/


            .flat a, .flat a:after {
                background: #a5f5a8;
                color: black;
                transition: all 0.5s;
            }
            .flat a:before {
                background: white;
                box-shadow: 0 0 0 2px #006e00;
            }
            .flat a:hover, .flat a.active, 
            .flat a:hover:after, .flat a.active:after{
                background: #00cc44;
            }

            .footer {
                position: relative;
                clear:both;
            } 

            html, body {
                height: 100%;
            }

            #wrap {
                min-height: 100%;
            }

            #main {
                overflow:auto;
                padding-bottom:150px; /* this needs to be bigger than footer height*/
            }

        </style>



        <script>
            function errPanel(listError) {
                var text = '';
                listError.forEach(function (msg) {
                    text = text + '<font color="red">&#x25cf; ' + msg + '</font><br>';
                });

                var errorPanel = '<div class="panel panel-danger"> <div class="panel-heading"> <h3 class="panel-title">Required</h3> </div> <div class="panel-body">' + text + '</div> </div> </div>';
                return errorPanel;



            }
            
          function openGlobalProfile($id){
              $("#globalIFProfile").attr("src", "/eiaapp/"+$id+"/edit");
              $("#modalGlobalProfile").modal("toggle");
          }  
        </script>

        @yield('js')

    </head>
    <div id="main_container">
        <div>
            {{ HTML::image('images/banner1.png', 'a header image', array('class' => 'img-responsive cleaner', 'width' => '2048', 'height' => '100')) }}

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
                    <ul class="nav nav-justified" id="menu">
                        <li><a href="{{ url('index/create') }}">HOME</a></li>
                        <li><a href="{{ url('announce/show') }}">ANNOUNCEMENT</a></li>
                        <li class="dropdown"><a class="dropbtn">APPLICANT</a>
                            <div class="dropdown-content">
                                <a href="{{ url('applicant/create') }}">Applicant Registration</a>
                                <a href="{{ url('paymentview/apcs') }}">Applicant Payment</a>
                            </div>
                        </li>
                        <li class="dropdown"><a class="dropbtn">MANAGE</a>
                            <div class="dropdown-content">
                                <a href="{{ url('syllabus/show') }}">Syllabus</a>
                                <a href="{{ url('refference/show') }}">Reference</a>
                                <ul class="parent" ><a href="#">Comprehensive Examination <span class="caret"></span></a>
                                    <ul class="child" >
                                        <a href="{{ url('schedule/apcs') }}">Schedule</a>
                                        <a href="{{ url('quizModul/view/exam/apcs') }}">Generating Question</a></ul></ul>
                                <ul class="parent1" ><a href="#">Assignment&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="caret"></span></a>
                                    <ul class="child1" >
                                        <a href="{{ url('assignment/show') }}">PCER Format</a>
                                        <a href="{{ url('/secretariat_assigment/apcs') }}">Applicant Assignment</a></ul></ul>

                                <a href="{{ url('interview/apcs') }}">Professional Interview</a>
                            </div>
                        </li>
                        <li class="dropdown"><a class="dropbtn">REPORT</a>
                            <div class="dropdown-content">
                                <a href="{{ url('cert/apcs') }}">Certificate</a>
                                <a href="{{ url('cpd/create') }}">Continuous Professional Development</a>
                            </div>
                        </li>
                        <li class="dropdown"><a class="dropbtn">PROFILE</a>

                            <div class="dropdown-content">
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"> {{ Auth::user()->name }} <br>{{ Auth::user()->nric }} <br>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </div> <!-- nav -->
            </div>

<!--            <div class="breadcrumb flat">
                <a href="#">SECRETARIAT APCS</a>
                <a href="#">MANAGE</a>
                <a href="#">Comprehensive Exam</a>
                <a class="active" style="color: white">Question Generation</a>        
            </div>-->

        </div>


    </div>
    <div id="wrap">
        <div id="main" class="container clear-top">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @yield('content')
        </div>
    </div>
    <footer class="footer">
        <div class="credit row">
            <center><div class="col-md-6 col-md-offset-3">
                    <div id="templatemo_footer">
                        Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
                    </div>
                </div>

        </div>
    </footer>
</html>

  
        <!-- Modal -->
        <div id="modalGlobalProfile" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profile</h4>
              </div>
              <div class="modal-body">
                <iframe id="globalIFProfile" src="" id="print" width="100%" height="1000" >
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>