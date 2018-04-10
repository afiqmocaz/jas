<!DOCTYPE html>
<html lang="en">
    <head>
        <title>APCS Section D</title>
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
        <script type="text/javascript">
            function GetDays() {
                var dropdt = new Date(document.getElementById("datepicker2").value);
                var pickdt = new Date(document.getElementById("datepicker").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
            }

            function cal() {
                if (document.getElementById("datepicker2")) {
                    document.getElementById("numdays2").value = GetDays();
                }
            }

        </script>


        <script type="text/javascript">
            function GetMonths() {
                var dropdate = new Date(document.getElementById("datepicker2").value);
                var pickdate = new Date(document.getElementById("datepicker").value);
                return parseInt((dropdate - pickdate) / (24 * 3600 * 1000) / 30);
            }

            function calculate() {
                if (document.getElementById("datepicker2")) {
                    document.getElementById("numMonths2").value = GetMonths();
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
                    <button  class="small btn-primary " a href="{{ url('/logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Signout</button>
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
                            <li class="active"><a href="/apcsSectionB/create">SECTION B</a></li>
                            <li class="active"><a href="/apcsSectionC/create">SECTION C</a></li>

                            <li class="active"><a href="/apcsSectionD/create">SECTION D</a></li>

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
            <div class="well well-lg" style="margin-left: 5%; margin-right: 5%">
                <h2 style="margin-left: 5%">PRE-QUALIFICATION REGISTRATION FORM</h2>

                <h3 style="margin-left: 5%"><strong>
                        SECTION D - PRACTICAL EXPERIENCE
                    </strong></h3>




                <!-- INSTRUCTION -->
                <div style="width: 60%; margin-left: 5%" class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1">APCS Section D Instruction :</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">   •  List of APCS consultancy projects and APCS installations carried out in the last <strong>THREE</strong> years. <br />
                                •  Click on button <strong>Cancel Registration</strong> to cancel your application<br />
                                •  Click on button <strong>Save Draft</strong> to save your application as draft<br />
                                •  Click on button <strong>Next</strong> to save your application and continue to next step<br />
                                •  You are <strong style="color: red">NOT ALLOWED</strong> to go to next page before completing this section
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function () {
                            $('[data-toggle="popover"]').popover();
                        });
                    </script>
                </div>







                <div class="col-xs-12" style="height:50px;"></div>   


                <!-- FORM -->
                <div class="">
                    <div class="well well-lg"  style="margin-left: 10%; margin-right: 10%; border-color: blue; background-color: #e6f2ff">    
                        <table class="table">
                            <tbody>
                                {!! Form::open(['route' => 'apcsSectionD.store', 'data-parsley-validate'=> '', 'files'=> true]) !!}
                                <tr>
                                    <td style="width: 20%">
                                        <label>Date</label>

                                    </td>
                                    <td style="width: 5%;">
                                        <label>:</label>
                                    </td>
                                    <td>
                                        <!--         <div class="col-lg-11">
                                            <div class="input-group">
                                              <span class="input-group-addon">Date of Project Start</span>
                                              {!! Form::date('projectStart', '', array('id' => 'datepicker', 'class' => 'form-control', 'style' => 'width: 40%', 'required' => '' )) !!}
                                                  
                                
                                 
                                            </div>
                                          </div> -->
                                        <div id="projectStart"><p><label class="form">Date of Project Start : </label><input type="date" class="textbox" id="datepicker" name="projectStart" onchange="cal();
                  calculate()" required="" /></p></div>
                                        <!--           <div class="col-lg-12">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">Date of Project Completion</span>
                                                      {!! Form::date('projectComplete', '', array('id' => 'datepicker2', 'class' => 'form-control', 'style' => 'width: 40%', 'required' => '' )) !!}
                                                         
                                                    </div>
                                                  </div> -->
                                        <div id="projectComplete"><p><label class="form">Date of Project Completion : </label><input type="date" class="textbox" id="datepicker2" name="projectComplete" onchange="cal();
                  calculate()" required=""/></p></div>

                                        <div id="numdays" class="left"><label class="form">Number of days:</label><input type="textbox" class="form-control" id="numdays2" name="numdays" readonly="readonly" style="width: 30%" /></div>
                                        <!-- <div style="margin:1%;" id="Result">
                                        <input type="text" class="textbox" name="Result"/>
                                         </div>
                                        <button type="button" onClick="CalculateDiff();" style="padding:1px; color:#0C6;margin-left:15%;margin-top:5%" >Calculate </button> -->
                                        <div id="numMonths" class="left"><label class="form">Number of months:</label><input type="textbox" class="form-control" id="numMonths2" name="numMonths" readonly="readonly" style="width: 30%" /></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Title of Proposal</label>

                                    </td>
                                    <td style="width: 5%;">
                                        <label>:</label>
                                    </td>
                                    <td>
                                        {{ Form::textarea('proposaltitle', null, array('style'=>'width: 95%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: ', 'required' => ''))}}
                                        <!--<textarea style="width: 70%" class="form-control" rows="5" id="comment"></textarea>-->
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Name of Client</label>

                                    </td>
                                    <td>
                                        <label>:</label>
                                    </td>
                                    <td>
                                        {{ Form::text('clientname', null, array('class' => 'form-control', 'style' => 'width: 95%', 'placeholder'=>'Eg: Jabatan Alam Sekitar', 'required' => ''))}}
                                        <!--<input style="width: 70%;" class="form-control" type="text" id="example-text-input">-->
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Address of Client</label>

                                    </td>
                                    <td>
                                        <label>:</label>
                                    </td>
                                    <td>
                                        {{ Form::textarea('clientaddress', null, array('style'=>'width: 95%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: ', 'required' => ''))}}
                                        <!--<textarea style="width: 70%" class="form-control" rows="5" id="comment"></textarea>-->
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Supporting Document</label>

                                    </td>

                                    <td>
                                        <label for="example-text-input" class="col-2 col-form-label">:
                                    </td>
                                    <td>
                                        <!--               {{ Form::file('featured_image')}}
                                        -->              <input type="file" name="supportdoc" accept=".pdf" required="">
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
                    <div id="templatemo_footer">Copyright © 2017 <label href="#">Jabatan Alam Sekitar</label>
                    </div>
                </div>

        </div>
    </footer>

</div>
<!-- FOOTER -->

</body>
</html>

