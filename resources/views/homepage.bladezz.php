<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <style>
    f1 {
      font-size: 10px;
    }

    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
    }
    p {
      text-align: justify;
    }
    .table th, .table td {
      border-top: none !important;
      border-left: none !important;
    }
    h4 {
      font-size: 20;
    }
   li {
        float: left;
        background-color: #ccd1d9;
    }

    li a, .dropbtn {
        display: inline-block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        background-color: #ccd1d9;
    }

    li a:hover, .dropdown:hover .dropbtn {
        background-color: #ccd1d9;
        color: black;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #ccd1d9;
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
        background-color: #ccd1d9
    }

    .dropdown-content a:hover {background-color: #ccd1d9}

    .dropdown:hover .dropdown-content {
        display: block;
        background-color: #ccd1d9
    }
    .credit {
  padding: 10px 0px;
  background-color: #006e00;
  }
  footer a {
    color: #FFFFFF;
  }
  footer {
    color: #FFFFFF;
  }
  .col-xs-12 {
    width: 0%;
  }
  .col-sm-10 {
    background-color: white;
  }
  .col-xs-3 {
    background-color: white;
  }

  </style>
  </head>

  <body class="">
  <!-- HEADER -->
    <div class="container">
    <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100", class="img-responsive cleaner">
    </div>
    </div>
  <!-- HEADER -->

    <!-- SLIDER -->
    <div class="container">
    <table class="table  hide">
              <form>
                <tbody>
                  <tr>
                    <td >
      <br>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
        <img src="{{URL::asset('/image/11.jpg')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
        <!--img src="image/11.jpg" alt="1" width="400px" height="200px"-->
        </div>

        <div class="item">
        <img src="{{URL::asset('/image/12.jpg')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
          <!--img src="image/12.jpg" alt="2" width="400px" height="200px"-->
        </div>

        <div class="item">
        <img src="{{URL::asset('/image/13.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
          <!--img src="image/13.png" alt="3" width="400px" height="200px"-->
        </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
    </td>
    </tr>
    </tbody>
    </form>
    </table>
    <br>
@if ($status = Session::get('status'))
      
        <div class="alert alert-success" role="alert" style="width:50%">
    
        <strong>{{$status}}</strong>  
        </div>
    @endif
    <!-- TABS -->
    <div >
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#intro">INFO</a></li>
        <li class="dropdown">

    <li class="dropdown"><a class="dropbtn">GUIDELINE<b class="caret"></b></a>
              <div class="dropdown-content">
                <a data-toggle="tab" href="#eia">EIA</a>
                <a data-toggle="tab" href="#iets">IETS</a>
                <a data-toggle="tab" href="#apcs">APCS</a>
              </div>
            </li>
      </li>
    <!--  <li><a data-toggle="tab" href="#payment">PAYMENT</a></li>
      <li class="dropdown"> -->

    <li class="dropdown"><a class="dropbtn">ANNOUNCEMENT<b class="caret"></b></a>
              <div class="dropdown-content">
                <a data-toggle="tab" href="#announceEia">EIA</a>
                <a data-toggle="tab" href="#announceIets">IETS</a>
                <a data-toggle="tab" href="#announceApcs">APCS</a>
              </div>
            </li>
      </li>
    </ul>
    </div>
    <!-- TABS -->


 @if (Session::has('success'))

        <div class="alert alert-success" role="alert">
    
        <strong>Success:</strong>  {{ Session::get('success') }}

        </div>

        @endif

       




        <div class="tab-content">

        <!-- TABS INFO -->
          <div id="intro" class="tab-pane fade in active">
            <table class="table table-bordered">
                <tbody>
                  <tr>
                      <td  style="width: 70%" >
                   
            <h3>INTRODUCTION</h3>

            <p> &nbsp &nbsp &nbsp Department of Environment (DOE) has developed EIA Consultant Registration Scheme in 2007 to regulate the list of eligible persons in Malaysia for the purposes of Section 34A (2A). Section 34A (2A), EQA 1974 (revised 2012) requires the Director General to maintain a list of persons entitled to carry out environmental impact assessments. The scheme has also been developed to improve the standard of professionalism among EIA practitioners in ensuring quality service, ethics and integrity.
            </p>
            <p>
            &nbsp &nbsp &nbsp Registration Consulting IETS and APCS is a new scheme that will be developed to accredit providers notifications to control the quality of notifications submitted to the DOE to improve the service delivery system to regulate the methods that are more creative, effective, holistic and efficient. Therefore, an integrated support system is required for the registration process for the online consultants to ensure that consultants are eligible to be certified in accordance with the direction of the DOE to mainstream the environment. This system allows consultants to register and undergo a course and meet the requirements established on-line consultant at the appropriate time during the year.</p>
             
                    </td>
                    <td  style="width: 30%" >

                 

     
                        <table class="table table-bordered" >
          <tr>
              <td colspan="2" class="alert-info">
                  <h3><font color="black">Registration Login</font></h3>
              </td>
          </tr>
          <tr>
              <td>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="{{ $errors->has('nric') ? ' has-error' : '' }}">
              <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon">IC/PASSPORT&nbsp;&nbsp</span>
                  <input  type="nric" class="form-control" userid="userid" id="userid"  placeholder="Enter your IC.No/Passport" name="nric" value="{{ old('nric') }}" required autofocus oninput="this.value=this.value.replace(/[^a-zA-Z_0-9-]/g,'');"/>
                 
                </div>
                   @if ($errors->has('nric'))
                      <span class="help-block">
                          <strong>{{ $errors->first('nric') }}</strong>
                      </span>
                  @endif
              </div>
            </div>
            
            <br>


            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon">PASSWORD&nbsp;&nbsp&nbsp;&nbsp&nbsp</span>
                  <input  type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>
                
                </div>
                    @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
            </div>
            
              <br>
         
             <div class="row ">
                 <div >
                              
                            </div>
                        </div>

                        <div class="form-group row ">
                            
                             &nbsp &nbsp &nbsp<div class="pull-right"><button type="submit" class="btn btn-warning">Sign in</button>&nbsp;&nbsp;&nbsp;</div>
                            <br>
                            <br>
                               &nbsp &nbsp &nbsp    <input name="remember" type="checkbox"  /><font color="black"> Remember me</font>
                            <br>
                            &nbsp &nbsp &nbsp<label><font color="black"> Don't have an account?</font></label>
                            <button type="button" style=" padding: 0;
                                    border: 0" class="btn btn-link" onclick="window.location.href='/register'"><strong><font color="lightblue">Sign up</font></strong></button>
                            <label><font color="black">here</font></label>
      </div>
      </form>
                  
              </td>
          </tr>
      </table>
    
      

                    </td>
                  </tr>
                </tbody>

            </table>
        </div>
        





        <!-- TABS PAYMENT
        <div id="payment" class="tab-pane fade">

          <center>
          <div class="" style="width: 80%">
          <h3>PAYMENT</h3>
          </br></br>
      <label style="color: #337ab7">Enter your :</label></br>
       <label style="color: #337ab7">I/C Number for Malaysian OR Passport Number for Foreigner</label></br>

      <input class="form-control" type="text" id="example-text-input" style="width: 20%" placeholder=" Eg : 870524105687">
      </br>
    <button type="button" class="btn btn-default" onclick="window.location.href='/paymentCategory/create'">Next</button>
    </br></br></br>
      </div>
        </center>
        </div>
         TABS PAYMENT-->






        <!-- TABS EIA-->
       <div id="eia" class="tab-pane fade">
            <!-- Tab panes -->
            <div class="tab-content">
            <center>
          <div >
              <h3>EIA PROCESS FLOW GUIDELINE</h3>
              </br></br>
              <label>Click on the image below to download the guideline :</label>
              </br></br>

<!--                 <a href="/document/reg_scheme_eia.pdf" download class="btn btn-link">REGISTRATION SCHEME FOR CERTIFIED EIA CONSULTANT IN MALAYSIA ver 2016</a>
                 <input type="image" src="{{URL::asset('/image/abc.jpg')}}" width="20%" height="40%"> -->
                 <input type="image" src="{{URL::asset('/image/abc.jpg')}}" alt="Submit" height="30%" width="60%", onclick="window.location.href='/document/reg_scheme_eia.pdf'" style="box-shadow: 10px 10px 5px grey">


            </div></div></center>

        <div class="clearfix"></div>

        </div>
         <!-- TABS EIA-->










         <!-- TABS IETS-->
        <div id="iets" class="tab-pane fade">
            <!-- Tab panes -->
            <div class="tab-content">
                <center>
          <div >
              <h3>IETS PROCESS FLOW GUIDELINE</h3>
              </br></br>
              &nbsp &nbsp &nbsp <label>Click on the image below to download the guideline :</label>
              </br></br>

               <!--  <a href="/document/reg_scheme_iets.pdf" download class="btn btn-link">PROCESS FLOW IETS</a>
                </br>
                <a href="/document/reg_scheme2_iets.pdf" download class="btn btn-link">DRAFT GUIDANCE ON IETS DESIGN CONSULTANT</a> -->
              <input type="image" src="{{URL::asset('/image/e.jpg')}}" alt="Submit" height="30%" width="60%", onclick="window.location.href='/document/reg_scheme_iets.pdf'" style="box-shadow: 10px 10px 5px grey">
              </br></br>
              <input type="image" src="{{URL::asset('/image/d.jpg')}}" alt="Submit" height="30%" width="60%", onclick="window.location.href='/document/reg_scheme2_iets.pdf'" style="box-shadow: 10px 10px 5px grey">
              </br></br>
              </div>

            </div></center>

        <div class="clearfix"></div>

        </div>

         <!-- TABS IETS-->

         <!-- TABS APCS-->
        <div id="apcs" class="tab-pane fade">
            <!-- Tab panes -->
            <div class="tab-content">
                 <center>
          <div >
              <h3>APCS PROCESS FLOW GUIDELINE</h3>
              </br></br>
               <label>Click on the image below to download the guideline :</label>
              </br></br>

                <!-- <a href="/document/reg_scheme_apcs.pdf" download class="btn btn-link">PROCESS FLOW APCS</a>
                </br>
                <a href="/document/reg_scheme2_apcs.pdf" download class="btn btn-link">DRAFT GUIDANCE ON APCS DESIGN CONSULTANT</a>
              </br></br> -->

            <input type="image" src="{{URL::asset('/image/f.jpg')}}" alt="Submit" height="30%" width="60%", onclick="window.location.href='/document/reg_scheme_apcs.pdf'" style="box-shadow: 10px 10px 5px grey">
              </br></br>
              <input type="image" src="{{URL::asset('/image/g.jpg')}}" alt="Submit" height="30%" width="60%", onclick="window.location.href='/document/reg_scheme2_apcs.pdf'" style="box-shadow: 10px 10px 5px grey">
              </br></br>
              </div>

            </div></center>

        <div class="clearfix"></div>

        </div>


         <!-- TABS APCS-->









 <!-- TABS ANNOUNCE EIA-->
       <div id="announceEia" class="tab-pane fade">
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="" style="width: 90%; margin-left: 5%">
              <h2>EIA Announcement</h2>
      <div class="col-xs-12" style="height:20px;"></div>
      @foreach($announce as $ann)
      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#announcement{{$ann->id}}">{{$ann->subject}}</button></br>
      @endforeach
      </br>
      </div></div>

        <div class="clearfix"></div>

        </div>
         <!-- TABS ANNOUNCE EIA-->
      <!-- announcement -->
      @foreach($announce as $ann)
  <div class="modal fade" id="announcement{{$ann->id}}" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <u><h4 class="modal-title">{{$ann->subject}}</h4></u>
        </div>
        <div class="modal-body">
          <p></u></strong>{{$ann->announcement}}</p>
           <a href="{{asset('uploads/'.$ann->original_filename)}}" >{{$ann->original_filename}}</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div></div></div>
      @endforeach





 <!-- TABS ANNOUNCE IETS-->
       <div id="announceIets" class="tab-pane fade">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="" style="width: 90%; margin-left: 5%">
              <h2>IETS Announcement</h2>
              
      <div class="col-xs-12" style="height:20px;"></div>
      @foreach($announce3 as $ann2)
      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#announcement2{{$ann2->id}}">{{$ann2->subject}}</button></br>
    
      @endforeach
      </br></br></br>
      </div></div>

        <div class="clearfix"></div>

        </div>

      <!-- announcement -->
      @foreach($announce3 as $ann2)
  <div class="modal fade" id="announcement2{{$ann2->id}}" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <u><h4 class="modal-title">{{$ann2->subject}}</h4></u>
        </div>
        <div class="modal-body">
          <p>{{$ann2->announcement}}</p>
          <a href="{{asset('uploads/'.$ann2->original_filename)}}" >{{$ann2->original_filename}}</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div></div></div>
      @endforeach
         <!-- TABS ANNOUNCE IETS-->




 <!-- TABS ANNOUNCE APCS-->
       <div id="announceApcs" class="tab-pane fade">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="" style="width: 90%; margin-left: 5%">
              <h2>APCS Announcement</h2>
      <div class="col-xs-12" style="height:20px;"></div>
      @foreach($announce2 as $ann3)
      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#announcement4{{$ann3->id}}">{{$ann3->subject}}</button></br>
      @endforeach
      </br></br></br>
      </div></div>

      
      <!-- announcement -->
  @foreach($announce2 as $ann3)
  <div class="modal fade" id="announcement4{{$ann3->id}}" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <u><h4 class="modal-title">{{$ann3->subject}}</h4></u>
        </div>
        <div class="modal-body">
          <p></u></strong>{{$ann3->announcement}}</p>
          <a href="{{asset('uploads/'.$ann3->original_filename)}}" >{{$ann3->original_filename}}</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div></div></div>
      @endforeach
         <!-- TABS ANNOUNCE APCS-->

<!-- FOOTER -->
 
      </div>

  <div class="clearfix"></div>

        </div>
        <footer>
      <div class="credit row">
        <center><div >
           <div id="templatemo_footer">Copyright Â© 2017 Jabatan Alam Sekitar
          </div>        </div>

      </div>
        </footer>

  </body>
</html>
