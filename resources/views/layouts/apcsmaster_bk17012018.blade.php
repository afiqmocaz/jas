@extends('layouts.master')

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
    
        
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src='{{ asset("assets/datatables/js/jquery.dataTables.js") }}'></script>
<script src="{{ asset('assets/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
 @include('layouts.apcssidebar')
        <style>

            /* The Modal (background) */
           
            body
            {
                counter-reset: Serial;           /* Set the Serial counter to 0 */
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
              $("#globalIFProfile").attr("src", "/apcsapp/"+$id+"/edit");
              $("#modalGlobalProfile").modal("toggle");
          }  
        </script>

        @yield('js')

    </head>
     @section('content')
    <div id="main_container">
        <div>
         
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
                        <li class="dropdown"><a class="dropbtn" href="{{ url('index/create') }}">HOME</a></li>
                        <li class="dropdown"><a class="dropbtn" href="{{ url('announce/show') }}">ANNOUNCEMENT</a></li>
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
                                <ul class="parent" ><a href="#">Assignment&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="caret"></span></a>
                                    <ul class="child" >
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