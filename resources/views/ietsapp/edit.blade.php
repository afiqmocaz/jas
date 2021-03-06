<?php session_start(); ?>

<!DOCTYPE html>
<!-- Secretariat Setup Announcements Page-->

<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>Jabatan Alam Sekitar</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<!--<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/justified-nav.css" rel="stylesheet" type="text/css">
  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
  <link href="css/parsley.css" rel="stylesheet" type="text/css">
  <script src="js/jquery.js"></script>-->
  {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/justified-nav.css')!!}
    {!!Html::style('css/templatemo_style1.css')!!}
    {!!Html::style('css/parsley.css')!!}

	<style>

		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}

		th, td {
		    padding: 5px;
		    text-align: left;
		}
		th {
		    background-color: #4CAF50;
		    color: white;
		}

</style>

</head>
<body>
<div id="main_container">
<div class="container" id="home">
<div class="row" id="thumbnails_container">            
<div class="col-md-12">

{!! Form::model($array, ['route' =>['ietsapp.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}

<table style="width:100%">
  <tr>
  	<th colspan="2"><center>SECTION A - PERSONAL INFORMATION</center></th></tr>
    
 
  <tr>
    <div>
        @if(! empty($ietsappa->image))
        <th width="30%">{{ Form::label('image', 'Uploaded Image:') }} </th>
        <td><div class="attachment-replace" style="display:none;">

        {{ Form::file('image', null, array('class' => 'form-control' )) }}

        </div>
        <img class="current-attachment" src="/image/{{$ietsappa->image}}" href="/image/{{$ietsappa->image}}" width="100px" height="150px"></img></td>
        @endif
    </div>
    </tr>
  
  <tr>
    <th>Full Name</th>
    <td>{{ Form::text('name', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  
  <tr>
    <th>Title</th>
    <td>{{ Form::text('title', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  
  <tr>
    <th>NRIC/Passport</th>
    <td>{{ Form::text('nric', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  
  <tr>
    <th>Address</th>
    <td>{{ Form::text('address', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  <tr>
    <th>Postcode</th>
    <td>{{ Form::text('postcode', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  <tr>
    <th>City</th>
    <td>{{ Form::text('city', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  <tr>
    <th>Country</th>
    <td>{{ Form::text('country_id', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  <tr>
    <th>Mail Address</th>
    <td>{{ Form::text('mailaddress', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  <tr>
    <th>Mail Postcode</th>
    <td>{{ Form::text('mailpostcode', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{ Form::text('email', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  <tr>
    <th><i>Bumiputera</i></th>
    <td><i>{{ Form::text('bumiputerastatus', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</i></td>
  </tr>
  <tr>
    <th>Tel No.</th>
    <td>{{ Form::text('phoneno', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  <tr>
    <th>Fax No.</th>
    <td>{{ Form::text('faxno', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  <tr>
  <tr>
    <th colspan="2">For Non-Malaysian</th>
    
  <!-- <tr>
    <th>Passport</th>
    <td>{{ Form::text('passport', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr> -->
  
  <tr>
    <th>Place of Issue</th>
    <td>{{ Form::text('placeofissue', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  <tr>
    <th>Date of Issue</th>
    <td>{{ Form::text('dateofissue', null, ['readonly' => 'readonly', 'style' => 'border:0; width:100%;']) }}</td>
  </tr>
  
</table>

<table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION B - ACADEMIC QUALIFICATION</center></th></tr>
    
  <tr>
    <th width="30%">Name / Course Title</th>
    <td width="70%">{{ Form::text('coursetitle', null, ['readonly' => 'readonly', 'style' => 'border:0; width:100%;']) }}</td>
  </tr>
  <tr>
    <th>Major</th>
    <td>{{ Form::text('major', null, ['readonly' => 'readonly', 'style' => 'border:0; width:100%;']) }}</td>
  </tr>
  <tr>
    <th>Name of University / College</th>
    <td>{{ Form::text('universityname', null, ['readonly' => 'readonly', 'style' => 'border:0; width:100%;']) }}</td>
  </tr>
  <tr>
    <th>Year of Study</th>
    <td>From {{ date('d-m-Y', strtotime($ietsappb->from))}} <br> Until {{ date('d-m-Y', strtotime($ietsappb->to))}}</td>
  </tr>
  <tr>
     <div>
        @if(! empty($ietsappb->cert))
        <th width="30%">{{ Form::label('cert', 'Academic Certification:') }} </th>
        <td><div class="attachment-replace" style="display:none;">

        {{ Form::file('cert', null, array('class' => 'form-control' )) }}

        </div>
        <a class="current-attachment" src="/uploads/{{$ietsappb->cert}}" href="/uploads/{{$ietsappb->cert}}" target="_blank" width="100px" height="150px">{{$ietsappb->cert}}</a></td>
        @endif
    </div>
    </tr>
  
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION C - PRACTICAL EXPERIENCE</center></th></tr>
    @foreach($ietsappc as $ietsappcs)
  <tr>
    <th width="30%">Date of Project Start</th>
    <td width="70%">{{ date('d-m-Y', strtotime($ietsappcs->projectStart))}}</td>
  </tr>
  <tr>
    <th>Title of Proposal</th>
    <td>{{ Form::text('proposaltitle', $ietsappcs->proposaltitle, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Name and Address of Client</th>
    <td>{{ Form::text('clientname', $ietsappcs->clientname, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}<br>{{ Form::text('clientaddress', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Date of Project Completed</th>
    <td>{{ date('d-m-Y', strtotime($ietsappcs->projectComplete))}}</td>
  </tr>
  <tr>
     <div>
        @if(! empty($ietsappcs->supportdoc))
        <th width="30%">{{ Form::label('supportdoc', 'Supporting Document:') }} </th>
        <td><div class="attachment-replace" style="display:none;">

        {{ Form::file('cert', null, array('class' => 'form-control' )) }}

        </div>
        <a class="current-attachment" src="/uploads/{{$ietsappcs->supportdoc}}" target="_blank" href="/uploads/{{$ietsappcs->supportdoc}}" width="100px" height="150px">{{$ietsappcs->supportdoc}}</a></td>
        @endif
    </div>
    </tr>
     @if ( $ietsappcs != $ietsappc->last() )
      <tr> <th colspan="2"></th></tr>
     @else
    @endif
    @endforeach
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION D - TRAINING ATTENDED</center></th></tr>
    
  <tr>
    <th width="30%">Training Period</th>
    <td width="70%">{{ date('d-m-Y', strtotime($ietsappd->starttrainning))}} <br>Until {{ date('d-m-Y', strtotime($ietsappd->endtraining))}}</td>
  </tr>
  <tr>
    <th>Name of Course/ Seminar/ Conference</th>
    <td>{{ Form::text('seminarname', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Venue</th>
    <td>{{ Form::text('venue', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  
</table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION E - DECLARATION</center></th></tr>
    
  
  <tr>
    <td colspan="2"><center><b>{{ Form::text('confession', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }} </center></td>
    </tr>
  
  <tr>
  	<th colspan="2"><center>Applicant Declaration</center></th>
  <tr>
    <td colspan="2">I hereby apply for registration and agree to observe and abide by the Code of Practice specified
         in the final part of this form. I certify that the statements contained in this form is true.<br><br></td>
  
</table>
</div>
</div>
</div>
</div>

</body>
</html>