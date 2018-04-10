@if(App\User::permission('eia'))
@extends('layouts.master')
<!-- <html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Consultant Registration Scheme</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 

        {!! Html::script('js/jquery.min.js')!!}
        {!! Html::script('js/jquery.dataTables.min.js')!!}
      


        <style>


            body
            {
                counter-reset: Serial;           /* Set the Serial counter to 0 */
            }


            .btnimg {cursor: pointer; width: 17px; height: 17px;}

           

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
        </script> -->

        @yield('js')
@include('layouts.eiassidebar')
    <!-- </head> -->
    @section('content')
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
                    <ul class="nav nav-justified">
                        <li><a href="{{ url('eiaindex/create') }}">HOME</a></li>
                        <li><a href="{{ url('eiaannounce/show') }}">ANNOUNCEMENT</a></li>
                        <li class="dropdown"><a class="dropbtn">APPLICANT</a>
                            <div class="dropdown-content">
                                <a href="{{ url('eiaapplicant/create') }}">Applicant Registration</a>
                                <a href="{{ url('paymentview/eia') }}">Applicant Payment</a>
                            </div>
                        </li>
                        <li class="dropdown"><a class="dropbtn">MANAGE</a>
                            <div class="dropdown-content">
                                <ul class="parent" ><a href="#">Virtual Self-Learning <span class="caret"></span></a>
                                    <ul class="child" >

                                        <a href="{{ url('quizModul/view/quiz/eia') }}">Module and Quiz</a>
                                    </ul>
                                </ul>

                                <ul class="parent" ><a href="#">Comprehensive Examination <span class="caret"></span></a>
                                    <ul class="child" >
                                        <a href="{{ url('schedule/eia') }}">Schedule</a>
                                        <a href="{{ url('quizModul/view/exam/eia') }}">Generating Question</a></ul></ul>
                                <ul class="parent1" ><a href="#">Assignment&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="caret"></span></a>
                                    <ul class="child1" >
                                        <a href="{{ url('eiaassignment/show') }}">Course Assignment</a>
                                        <a href="{{ url('secretariat_assigment/eia') }}">Applicant Assignment</a></ul></ul>
                                <a href="{{ url('interview/eia') }}">Professional Interview</a>
                            </div>
                        </li>
                        <li class="dropdown"><a class="dropbtn">REPORT</a>
                            <div class="dropdown-content">
                                <a href="{{ url('cert/eia') }}">Certificate</a>
                                <a href="{{ url('eiacpd/create') }}">Continuous Professional Development</a>
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
                                                <a href="#">SECRETARIAT EIA</a>
                                                <a href="#">MANAGE</a>
                                                <a href="#">Virtual Self-Learning</a>
                                                <a class="active" style="color:white">Quiz</a>        
                                              </div>
                                    
                                            </div>-->

        </div>
        <div id="wrap">
            <div id="main" class="container clear-top">
      
                
                 @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
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
        @endsection
@else
<center><h1>NO PERMISSION TO ACCESS...</h1></center>
@endif