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

{!! Form::model($array, ['route' =>['eiaapp.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}

<table style="width:100%">
  <tr>
    <th colspan="2"><center>SECTION A - PERSONAL INFORMATION</center></th>
    
  <tr>
    <th width="30%">Registered Number</th>
    <td width="70%">{{ Form::text('applicant_id', null, ['readonly' => 'readonly', 'style' => 'border:0; width:100%;']) }}</td>
  </tr>

  <tr>
    <div>
        @if(! empty($eiaappa->image))
        <th width="30%">{{ Form::label('image', 'Uploaded Image:') }} </th>
        <td><div class="attachment-replace" style="display:none;">

        {{ Form::file('image', null, array('class' => 'form-control' )) }}

        </div>
        <img class="current-attachment" src="/image/{{$eiaappa->image}}" href="/image/{{$eiaappa->image}}" width="100px" height="150px"></img></td>
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
    <th>NRIC</th>
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
    
  <tr>
    <th>Passport</th>
    <td>{{ Form::text('passport', null, ['readonly' => 'readonly', 'style' => 'border:0;  width:100%;']) }}</td>
  </tr>
  
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
    <td width="70%">{{ Form::text('coursetitle', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Major</th>
    <td>{{ Form::text('major', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Name of University / College</th>
    <td>{{ Form::text('universityname', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Year of Study</th>
    <td>From {{ Form::date('from', null, ['readonly' => 'readonly', 'style' => 'border:0; width:90%;']) }} <br> Until {{ Form::date('to', null, ['readonly' => 'readonly', 'style' => 'border:0; width:90%;']) }}</td>
  </tr>
  
  <tr>
    <div>
        @if(! empty($eiaappc->cert))
        <th width="30%">{{ Form::label('cert', 'Academic Certification:') }} </th>
        <td><div class="attachment-replace" style="display:none;">

        {{ Form::file('cert', null, array('class' => 'form-control' )) }}

        </div>
        <a class="current-attachment" src="/uploads/{{$eiaappc->cert}}" href="/uploads/{{$eiaappc->cert}}" width="100px" height="150px">{{$eiaappc->cert}}</a></td>
        @endif
    </div>
    </tr>
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION C - COMPETENCY COURSE FROM INSTITUT ALAM SEKITAR MALAYSIA (EiMAS)</center></th></tr>
  <tr>
    <th width="30%">Name / Course Title</th>
    <td width="70%">{{ Form::text('course', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Date Completed</th>
    <td>{{ Form::date('date_complete', null, ['readonly' => 'readonly', 'style' => 'border:0; width:90%;']) }}</td>
  </tr>
  <tr>
    <th>Certificate No.</th>
    <td>{{ Form::text('cert_no', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION D - ENVIRONMENT MANAGEMENT EXPERIENCE</center></th></tr>
  <tr>
    <th width="30%">Participation in</th>
    <td width="70%">{{ Form::text('participate', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Name of Project</th>
    <td>{{ Form::text('project_name', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Position</th>
    <td>{{ Form::text('position', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Responsibilities</th>
    <td>{{ Form::text('responsibilities', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Date Start</th>
    <td>{{ Form::date('dateStart', null, ['readonly' => 'readonly', 'style' => 'border:0; width:90%;']) }}</td>
  </tr>
  <tr>
    <th>Date End</th>
    <td>{{ Form::date('dateEnd', null, ['readonly' => 'readonly', 'style' => 'border:0; width:90%;']) }}</td>
  </tr>
  <th colspan="2">Project Refference</th>
  <tr>
    <th>Name</th>
    <td>{{ Form::text('ref_name', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Address</th>
    <td>{{ Form::text('ref_address', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{ Form::text('ref_email', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
</table>

<table style="width:100%">
  <tr>
  	<br><th colspan="4"><center>SECTION E - SPECIALIZED AREA</center></th></tr>
  <tr>
    <th width="30%" >Category 1</th>
    <td width="70%" >{{ Form::text('first_specialize', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  <tr>
    <th width="30%" >Category 2</th>
    <td width="70%" >{{ Form::text('second_specialize', null, ['readonly' => 'readonly', 'style' => 'border:0; width:95%;']) }}</td>
  </tr>
  </tr>
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION F - DECLARATION</center></th></tr>
  	<th colspan="2"><center>Code of Practice</center></th>
  <tr>
    <td colspan="2">All EIA Consultant and EIA Assisstants are obliged to improve the standing of the environmental impact
        assessment profession by rigorously observing the following Codes of Practice. Failure to conform may
        result in suspension or deregistration. All registrant shall:<br><br>
        <ul>
        <li>Act professionally, accurately and in an unbiased manner;</li>
        <li>Strive to increase the competence and prestige of the environmental impact assessment profession;</li>
        <li>Assist those under my supervision (if relevant) in developing their management, professional and
             environmental impact assessment skills;</li>
        <li>Not to undertake any jobs that I am not competence to perform;</li>
        <li>Not to represent conflicting or competing interests and to disclose to any client or employer any
             relationship that may influence my judgement;</li>
        <li>Not to accept any inducement, commission, gift or any other benefit from any interested party or
             knowingly allow colleagues to do so;</li>
        <li>Not to intentionally communicate false or misleading information that may compromise the integrity of
             any EIA study;</li>
        <li>Not to act in any way that would prejudice the reputation of the EIA Consultants Registration Scheme
             or the environmental consultants registration process and to cooperate fully with any enquiry in the
             event of any illegal breach of this code. </li>
		</td>
  </tr>
  
  <tr>
  	<th colspan="2"><center>Applicant Declaration</center></th>
  <tr>
    <td colspan="2">I hereby apply for registration and agree to observe and abide by the Code of Practice specified
         in the final part of this form. I certify that the statements contained in this form.<br><br></td></tr>
         
</table>
</div>
</div>
</div>
</div>

</body>
</html>