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

<table style="width:100%">
  <tr>
  	<th colspan="2"><center>SECTION A - PERSONAL INFORMATION</center></th></tr>
    @foreach($ietsappa as $ietsappas)
  <tr>
    <th width="30%">Registered Number</th>
    <td width="70%"></td>
  </tr>
  <tr>
    <th>Uploaded Image</th>
    <td><img class="file" src="/image/{{$ietsappas->image}}" width="100px" height="150px"></img><a class="file" href="/image/{{$ietsappas->image}}"><br></img></td>
  </tr>
  @foreach($user as $users)
  <tr>
    <th>Full Name</th>
    <td>{{$users->name}}</td>
  </tr>
  @endforeach
  <tr>
    <th>Title</th>
    <td>{{$ietsappas->title}}</td>
  </tr>
  @foreach($user as $users)
  <tr>
    <th>NRIC</th>
    <td>{{$users->nric}}</td>
  </tr>
  @endforeach
  <tr>
    <th>Address</th>
    <td>{{$ietsappas->address}}</td>
  </tr>
  <tr>
    <th>Postcode</th>
    <td>{{$ietsappas->postcode}}</td>
  </tr>
  <tr>
    <th>City</th>
    <td>{{$ietsappas->city}}</td>
  </tr>
  <tr>
    <th>Country</th>
    <td>{{$ietsappas->country_id}}</td>
  </tr>
  <tr>
    <th>Mail Address</th>
    <td>{{$ietsappas->mailaddress}}</td>
  </tr>
  <tr>
    <th>Mail Postcode</th>
    <td>{{$ietsappas->mailpostcode}}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{$ietsappas->email}}</td>
  </tr>
  <tr>
    <th><i>Bumiputera</i></th>
    <td><i>{{$ietsappas->bumiputerastatus}}</i></td>
  </tr>
  <tr>
    <th>Tel No.</th>
    <td>{{$ietsappas->phoneno}}</td>
  </tr>
  <tr>
    <th>Fax No.</th>
    <td>{{$ietsappas->faxno}}</td>
  </tr>
  <tr>
  <tr>
  	<th colspan="2">For Non-Malaysian</th></tr>
    @foreach($user as $users)
  <tr>
    <th>Passport</th>
    <td>{{$users->passport}}</td>
  </tr>
  @endforeach
  <tr>
    <th>Place of Issue</th>
    <td>{{$ietsappas->placeofissue}}</td>
  </tr>
  <tr>
    <th>Date of Issue</th>
    <td>{{$ietsappas->dateofissue}}</td>
  </tr>
  @endforeach
</table>

<table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION B - ACADEMIC QUALIFICATION</center></th></tr>
    @foreach($ietsappb as $ietsappbs)
  <tr>
    <th width="30%">Name / Course Title</th>
    <td width="70%">{{$ietsappbs->coursetitle}}</td>
  </tr>
  <tr>
    <th>Major</th>
    <td>{{$ietsappbs->major}}</td>
  </tr>
  <tr>
    <th>Name of University / College</th>
    <td>{{$ietsappbs->universityname}}</td>
  </tr>
  <tr>
    <th>Year of Study</th>
    <td>From {{ date('d/m/Y', strtotime($ietsappbs->from))}} Until {{ date('d/m/Y', strtotime($ietsappbs->to))}}</td>
  </tr>
  <tr>
    <th>Academic Certification</th>
    <td><a style="color: blue;" href="/uploads/{{$ietsappbs->cert}}">{{$ietsappbs->cert}}</a></td>
  </tr>
  @endforeach
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION C - PRACTICAL EXPERIENCE</center></th></tr>
    @foreach($ietsappc as $ietsappcs)
  <tr>
    <th width="30%">Date of Project Start</th>
    <td width="70%">{{$ietsappcs->projectStart}}</td>
  </tr>
  <tr>
    <th>Title of Proposal</th>
    <td>{{$ietsappcs->proposaltitle}}</td>
  </tr>
  <tr>
    <th>Name and Address of Client</th>
    <td>{{$ietsappcs->clientname}}<br>{{$ietsappcs->clientaddress}}</td>
  </tr>
  <tr>
    <th>Date of Project Completed</th>
    <td>{{$ietsappcs->projectComplete}}</td>
  </tr>
  @endforeach
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION D - TRAINING ATTENDED</center></th></tr>
    @foreach($ietsappd as $ietsappds)
  <tr>
    <th width="30%">Date</th>
    <td width="70%">Start from {{ date('d/m/Y', strtotime($ietsappds->starttrainning))}} Until {{ date('d/m/Y', strtotime($ietsappds->endtraining))}}</td>
  </tr>
  <tr>
    <th>Name of Course/ Seminar/ Conference</th>
    <td>{{$ietsappds->seminarname}}</td>
  </tr>
  <tr>
    <th>Venue</th>
    <td>{{$ietsappds->venue}}</td>
  </tr>
  @endforeach
</table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION E - DECLARATION</center></th></tr>
    @foreach($ietsappe as $ietsappes)
  
  <tr>
    <td colspan="2"><center><b>{{$ietsappes->confession}}</center></td>
  </tr>
  @endforeach
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