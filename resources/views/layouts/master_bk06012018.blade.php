<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Consultant Registration Scheme</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('/node_modules/admin-lte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('/node_modules/admin-lte/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset('/node_modules/admin-lte/dist/css/skins/skin-purple.min.css')}}" rel="stylesheet" type="text/css" />


    <![endif]-->
    <style type="text/css">
	.scrollable-menu {
		height: auto;
		max-height: 200px;
		overflow-x: hidden;
	}
	.margin-kiri {
		margin-left: 0px !important;
	}
.popover{
    max-width: 30%; // Max Width of the popover (depending on the container!)
    max-height: 1000px;

}
  .uppercase {
    text-transform: uppercase;
  }

  .lowercase {
      text-transform: lowercase;
  }

  .capitalize {
      text-transform: capitalize;
  }
  
.fileUpload {
	position: relative;
	overflow: hidden;
}
.fileUpload input {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	cursor: pointer;
	opacity: 0;
}
.progress {
    margin-bottom: 0;
}

 .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.42;
        border-radius: 15px;
        background: #357ca5;
        color: #f9f9f9;
    }
    #content {
        background-color:#FFF;
    }
    
    .padding {
        padding: 40px 40px 40px 40px;
    }
    
      .tree {
        min-height:20px;
        padding:19px;
        margin-bottom:20px;
        background-color:#fbfbfb;
        border:1px solid #999;
        -webkit-border-radius:4px;
        -moz-border-radius:4px;
        border-radius:4px;
        -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
        -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05)
    }
    .tree li {
        list-style-type:none;
        margin:0;
        padding:10px 5px 0 5px;
        position:relative
    }
    .tree li::before, .tree li::after {
        content:'';
        left:-20px;
        position:absolute;
        right:auto
    }
    .tree li::before {
        border-left:1px solid #999;
        bottom:50px;
        height:100%;
        top:0;
        width:1px
    }
    .tree li::after {
        border-top:1px solid #999;
        height:20px;
        top:25px;
        width:25px
    }

    .tree li span {
        -moz-border-radius:5px;
        -webkit-border-radius:5px;
        border:1px solid #999;
        border-radius:5px;
        display:inline-block;
        padding:3px 8px;
        text-decoration:none
    }
    .tree li.parent_li>span {
        cursor:pointer
    }
    .tree>ul>li::before, .tree>ul>li::after {
        border:0
    }
    .tree li:last-child::before {
        height:30px
    }
    .tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
        background:#eee;
        border:1px solid #94a0b4;
        color:#000
    }
    .fa-circle {
        color: green;
      }
      
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.42;
  border-radius: 15px;
}
.content-wrapper,
.right-side {
background-color: #ffffff;
}
    </style>
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
        ]) !!};
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    </script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  
    
    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->

    @yield('js')
    
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    @include('header2')

    <!-- Sidebar -->
   

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('title')
            <!-- <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1> -->
            <!-- You can dynamically generate breadcrumbs here -->
            <!--<ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
          
            @yield('content')
            
            <!--Modal dialog: Profil Saya-->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profil Saya</h4>
              </div>
              <form id="myForm" method="post" class="form-horizontal" action="profile/kemaskini&{{ Auth::user()->id }}">
              {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-bordered table-responsive form-group margin-kiri">
                      <tr>
                        <td>Nama:</td>
                        <td><input id="userName" name="userName" type="text" value="{{ Auth::user()->name }}" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>Emel:</td>
                        <td><input id="userEmail" name="userEmail" type="text" value="{{ Auth::user()->email }}" class="form-control"></td>
                      </tr>
                      
                      {{-- persatuan --}}
                      @if(Auth::user()->position_id == 1) 
                          <tr>
                            <th colspan="2">Maklumat Persatuan:</th>
                          </tr>
                          <tr>
                            <td>Jenis Sukan</td>
                            <td>
                              <input id="profile_sport_type" name="profile_sport_type"  @isset($assocData) 
                                  value="{{ $assocData->sport_type }}" 
                                @endisset 
                              type="text" class="form-control" disabled></td>
                          </tr>
                          <tr>
                            <td>Nama Sukan</td>
                            <td>
                                <input id="profile_sport_name" name="profile_sport_name" type="text" class="form-control"
                                @isset($assocData)
                                  value="{{ $assocData->sport_name }}"
                                @endisset>
                              </td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td><textarea  id="profile_address" name="profile_address" class="form-control" style="text-align:left;">@isset($assocData){{ $assocData->address }} @endisset </textarea></td>
                          </tr>
                          <tr>
                            <td>No. Perhubungan</td>
                            <td><input id="profile_contact" name="profile_contact" type="text" class="form-control" @isset($assocData) value="{{ $assocData->contact }} " @endisset></td>
                          </tr>
                          <tr>
                            <td>Emel Tambahan</td>
                            <td><input id="profile_email_additional" name="profile_email_additional" type="text" class="form-control" @isset($assocData) value="{{ $assocData->email_additional }}"> @endisset</td>
                          </tr>
                          <tr>
                            <td>Presiden</td>
                            <td><input id="profile_president" name="profile_president" type="text" class="form-control" @isset($assocData) value="{{ $assocData->president }}" @endisset></td>
                          </tr>
                          <tr>
                            <td>Timbalan Presiden</td>
                            <td><input id="profile_president_deputy" name="profile_president_deputy" type="text" class="form-control" @isset($assocData) value="{{ $assocData->president_deputy }}" @endisset></td>
                          </tr>
                          <tr>
                            <td>Naib Presiden</td>
                            <td><input id="profile_president_vice" name="profile_president_vice" type="text" class="form-control" @isset($assocData) value="{{ $assocData->president_vice }}"> @endisset</td>
                          </tr>
                          <tr>
                            <td>Setiausaha Agung</td>
                            <td><input id="profile_secretary_gen" name="profile_secretary_gen" type="text" class="form-control" @isset($assocData) value="{{ $assocData->secretary_gen }}" @endisset></td>
                          </tr>
                          <tr>
                            <td>Setiausaha Kehormat</td>
                            <td><input id="profile_secretary_hon" name="profile_secretary_hon" type="text" class="form-control" @isset($assocData) value="{{ $assocData->secretary_hon }}" @endisset></td>
                          </tr>
                          <tr>
                            <td>Penolong Setiausaha Agung</td>
                            <td><input id="profile_secretary_gen_assist" name="profile_secretary_gen_assist" type="text" class="form-control" @isset($assocData) value="{{ $assocData->secretary_gen_assist }}" @endisset></td>
                          </tr>
                          <tr>
                            <td>Setiausaha Eksekutif</td>
                            <td><input id="profile_secretary_exe" name="profile_secretary_exe" type="text" class="form-control" @isset($assocData) value="{{ $assocData->secretary_exe }}" @endisset></td>
                          </tr>
                          <tr>
                            <td>Pengurus Besar/CEO</td>
                            <td><input id="profile_secretary_ceo" name="profile_secretary_ceo" type="text" class="form-control" @isset($assocData) value="{{ $assocData->secretary_ceo }}" @endisset></td>
                          </tr>
                          
                    @else
                        <tr>
                          <td>Jawatan:</td>
                          <td><input id="userPosition" name="userPosition" type="text" value="{{ Auth::user()->position['name'] }}" class="form-control" disabled></td>
                        </tr>
                        <tr>
                          <th colspan="2">Tukar Kata Laluan:</th>
                        </tr>
                        <tr>
                          <td>Katalaluan Baru:</td>
                          <td><input name="userPassword" type="password" class="form-control"></td>
                        </tr>
                        <tr>
                          <td>Katalaluan Baru (Taip Semula):</td>
                          <td><input name="userPassword-confirm" type="password" class="form-control"></td>
                        </tr>
                    @endif
                  </table>
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <input type="submit" class="btn btn-primary" value="Kemaskini" aria-hidden="true">
              </div>
              </form>
            </div>
          </div>
        </div>
            
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
   

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<!--<script src="{{ asset ('/node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>-->
<!-- Bootstrap 3.3.2 JS -->

<!-- <script src="{{ asset ('/node_modules/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> -->
<!-- AdminLTE App -->
<script src="{{ asset ('/node_modules/admin-lte/dist/js/app.min.js') }}" type="text/javascript"></script>
 
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
	$(this).next('ul').toggle();
	e.stopPropagation();
	e.preventDefault();
  });
});


var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var errPanel =

function errPanel(listError){
    var text = '';
    listError.forEach(function(msg){
       text = text + '<font color="red">&#x25cf; ' + msg + '</font><br>';
    });

    var errorPanel  = '<div class="panel panel-danger"> <div class="panel-heading"> <h3 class="panel-title">Ralat</h3> </div> <div class="panel-body">'+text+'</div> </div> </div>'; 
    return errorPanel;
}

function getClassMonthList(){
    
    console.log("set month list");
     var index = 0;
    $('.MONTH_LIST').append('<option value="">Sila-Pilih</option>');
    monthNames.forEach(function($obj){
    $('.MONTH_LIST').append('<option value='+index+'>' + $obj + '</option>');
        index++;
    })
}
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>