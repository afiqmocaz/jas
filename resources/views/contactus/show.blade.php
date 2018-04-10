@extends('layouts.master')
@section('header', 'List Of Contact : DOE Contact') 
@section('content')
<html>
<head>
    <title>CRS Online: Contact Us</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">
      @include('adminsidebar')
    </head>
    <style>
      
        body {font-family: arial; }
        form{font-size: 15px;}
        
      .col-md-4 h1{ color : #9f00a7; font-family: calibri, arial; font-weight: bold; font-size: 30px; position: relative; left: 30px;} 
    .header{background: white; width : 100%; }
    .header a{color: rgb(100,100,100); padding: 20px; position: relative; top : 30px;font-family: calibri, arial;font-weight: 900;  }
    #col-md-4{ height: 50px;}
    .header a:hover{ transition-duration: 0.3s; color: rgb(0,0,0); }
    
    /*container design*/
    .control-label{float: left;}
    .container .inner{width: 480px; margin: 50px auto; border : 1px solid none; background: rgba(55,55,55, 0.4); padding: 50px;transition-duration: 0.7s;}
    .container .inner:hover{-webkit-transform:skew(0deg,0deg); -moz-transform:skew(0deg,0deg);-o-transform:skew(0deg,0deg);transition-duration: 0.7s; background: transparent;}
    .inner h1{color : rgb(200,200,200); font-family: calibri, arial; font-weight: bold; text-align: center; font-size: 20px}
    .inner h3{color: rgb(200,200,200); font-size: 18px; font-family: calibri; text-align: center; margin-top: -5px}
    .inner form label span{color: white;}
    .inner form lagend{color: white;}
    .inner .input{width : 100%; border: none; border-bottom: 1px solid white; color: #9f00a7; background: transparent; padding: 10px;}
    .inner .input:focus{box-shadow: none; border: 1px solid none;}
    .container hr{border-color: rgb(100,100,100);}
    .inner .button{border-radius:10px 10px 10px 10px;color: #FFFFFF; background: rgba(50,50,50, 0.4); padding: 2px 30px ;  border: 2px solid #9f00a7;  font-family: calibri; margin:10px auto; font-weight: bold;}
    .inner .button:hover{background: #8f00a7; color: white;}
    .btnimg {cursor: pointer; width: 30px; height: 30px;}

    </style>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.sheepItPlugin.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrapValidator.min.js"></script>
    <!--<script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.maskedinput.js"></script> -->
</head>
<body>
    
    <div id="section" style="padding: 0px">
        <div class="container">
     
          
            <!-- <div class="content-main"> -->
                
    <!-- <div class="col-md-12"> 
        <h3>DOE Contact&nbsp;</h3>-->
        <form action="{{ url('contactus/create') }}" method="get">
                        <input type="submit" class="btn btn-primary" value="Add Contact"/>
                    </form>
                    <br>
    <!-- </div>
    <div class="col-md-12"> -->
        <table class="table table-bordered" id="myTable" style="width: 95%">
            <thead valign="top" class="alert-info">
                <tr>
                    <th>No</th>
                    <th>Department</th>
                    <th>Address</th>
                    <th>Telephone No</th>
                    <th>Fax No</th>
                    <th colspan="2" onclick="sortTable(4)"><center>Action</center></th>
                </tr>
            </thead>
            <div class="hide">{{$count = 1}}</div>
            @foreach($contactus as $contactus)
            <tr>
            
                <td>{{$count++}}</td>
                <td>{{$contactus->department}}</td>
                <td>{{$contactus->address}}</td>
                <td>{{$contactus->telno}}</td>
                <td>{{$contactus->faxno}}</td>
              <td id="but" align="center">
                            <a href="{{ route('contactus.edit', $contactus->id) }}" >
                                                {!! Form::image('images/edit.png', 'a Delete', ['type' => 'submit',  'class' => 'btnimg', 'title' => 'Delete'] ) !!}</a></td>
                            <td>{!! Form::open(['route' => ['contactus.destroy', $contactus->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

                            {!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit',  'class' => 'btnimg', 'title' => 'Delete'] ) !!}

                            {!! Form::close() !!}
                            </td>
                
               </tr>@endforeach
        </table>
    <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
    

    </body>

    
        <script type="text/javascript">
$('#openBtn').click(function(){
    $('#guideline').modal({show:true})
});
});
</script>
    </script>
</html>
@endsection