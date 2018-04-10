

<div class="row example2">
  <nav class="navbar navbar-default">
    <div class="container-fluid" style="background-color: #222d32 ">
      <div class="navbar-header" >
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" ><img src="/jata.png" alt="Dispute Bills" hspace="20" width="20%">
        </a>
        <a class="navbar-brand" ><img src="/logo.png" alt="Dispute Bills" hspace="20">
        </a>
        <h4 class="navbar-text text-uppercase" style="font-family:arial; color:white"><b>Consultant Registration Scheme</b></h4>
      </div>
      <div id="navbar2" class="navbar-collapse collapse" style=" background-color: #222d32">
        <ul class="nav navbar-nav navbar-right">
          <li><a style=" font-family:arial; font-size:12px; color: white" href="/"> HOME </a></li>
          <li><a style=" font-family:arial; font-size:12px; color: white" href="#" data-toggle="modal" data-target="#myModal">GUIDELINE</a></li>
          <li><a style=" font-family:arial; font-size:12px; color: white" href="/contactus">CONTACT US</a></li>

          @if(!empty(Auth::user()))
            <li class="dropdown">
                    <a style="font-family:arial; font-size:12px" href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        PROFILE
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong>{{Auth::user()->name}}</strong></p>
                                        <p class="text-left small">{{Auth::user()->nric}}</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                                <button  class="small btn-primary" a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Signout</button>
                                             <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>@endif
        </ul>
      </div>
  
    </div>

  </nav>
</div>





<style type="text/css">
.navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
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

color:          white;                        
font-family:    arial;
 font-weight: bold;
}
.modal-header-primary {
  color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #428bca;
    -webkit-border-top-left-radius: 2px;
    -webkit-border-top-right-radius: 2px;
    -moz-border-radius-topleft: 2px;
    -moz-border-radius-topright: 2px;
     border-top-left-radius: 2px;
     border-top-right-radius: 2px;
}

.modal-body {
    max-height: 300px;
    overflow-y: auto;
}
.modal-backdrop
{
    opacity:0.1 !important;
}
.modal-dialog
{
  width: 40%;

}</style>