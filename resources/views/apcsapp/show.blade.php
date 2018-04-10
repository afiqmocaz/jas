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
  	<th colspan="2"><center>SECTION A - PERSONAL INFORMATION</center></th>
    @foreach($apcsappa as $apcsappas)
  <tr>
    <th width="30%">Registered Number</th>
    <td width="70%">{{$apcsappas->applicant_id}}</td>
  </tr>
  <tr>
    <th>Uploaded Image</th>
    <td><img class="file" src="/image/{{$apcsappas->image}}" width="100px" height="150px"></img><a class="file" href="/image/{{$apcsappas->image}}"><br></img></td>
  </tr>
  @foreach($user as $users)
  <tr>
    <th>Full Name</th>
    <td>{{$users->name}}</td>
  </tr>
  @endforeach
  <tr>
    <th>Title</th>
    <td>{{$apcsappas->title}}</td>
  </tr>
  @foreach($user as $users)
  <tr>
    <th>NRIC</th>
    <td>{{$users->nric}}</td>
  </tr>
  @endforeach
  <tr>
    <th>Address</th>
    <td>{{$apcsappas->address}}</td>
  </tr>
  <tr>
    <th>Postcode</th>
    <td>{{$apcsappas->postcode}}</td>
  </tr>
  <tr>
    <th>City</th>
    <td>{{$apcsappas->city}}</td>
  </tr>
  <tr>
    <th>Country</th>
    <td>{{$apcsappas->country_id}}</td>
  </tr>
  <tr>
    <th>Mail Address</th>
    <td>{{$apcsappas->mailaddress}}</td>
  </tr>
  <tr>
    <th>Mail Postcode</th>
    <td>{{$apcsappas->mailpostcode}}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{$apcsappas->email}}</td>
  </tr>
  <tr>
    <th><i>Bumiputera</i></th>
    <td><i>{{$apcsappas->bumiputerastatus}}</i></td>
  </tr>
  <tr>
    <th>Tel No.</th>
    <td>{{$apcsappas->phoneno}}</td>
  </tr>
  <tr>
    <th>Fax No.</th>
    <td>{{$apcsappas->faxno}}</td>
  </tr>
  <tr>
  <tr>
  	<th colspan="2">For Non-Malaysian</th>
    @foreach($user as $users)
  <tr>
    <th>Passport</th>
    <td>{{$users->passport}}</td>
  </tr>
  @endforeach
  <tr>
    <th>Place of Issue</th>
    <td>{{$apcsappas->placeofissue}}</td>
  </tr>
  <tr>
    <th>Date of Issue</th>
    <td>{{$apcsappas->dateofissue}}</td>
  </tr>
  @endforeach
</table>

<table style="width:100%">
  <tr>
    <br><th colspan="2"><center>SECTION B - FIELD OF SPECIALIZATION IN AIR POLLUTION CONTROL</center></th>
    @foreach($apcsappb as $apcsappbs)
  <tr>
    <th width="30%">Field Of Specialization In Air Pollution Control</th>
    <td width="70%"><li>{{$apcsappbs->specialize_0}}</li><li>{{$apcsappbs->specialize_1}}</li><li>{{$apcsappbs->specialize_2}}</li><li>{{$apcsappbs->specialize_3}}</li>
    </td>
    @endforeach
  </tr>
  
  </table>

<table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION C - ACADEMIC QUALIFICATION</center></th>
    @foreach($apcsappc as $apcsappcs)
  <tr>
    <th width="30%">Name / Course Title</th>
    <td width="70%">{{$apcsappcs->coursetitle}}</td>
  </tr>
  <tr>
    <th>Major</th>
    <td>{{$apcsappcs->major}}</td>
  </tr>
  <tr>
    <th>Name of University / College</th>
    <td>{{$apcsappcs->universityname}}</td>
  </tr>
  <tr>
    <th>Year of Study</th>
    <td>From {{ date('d/m/Y', strtotime($apcsappcs->from))}} Until {{ date('d/m/Y', strtotime($apcsappcs->to))}}</td>
  </tr>
  <tr>
    <th>Academic Certification</th>
    <td><a style="color: blue;" href="/uploads/{{$apcsappcs->cert}}">{{$apcsappcs->cert}}</a></td>
  </tr>
  @endforeach
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION D - PRACTICAL EXPERIENCE</center></th>
    @foreach($apcsappd as $apcsappds)
  <tr>
    <th width="30%">Date of Project Start</th>
    <td width="70%">{{ date('d/m/Y', strtotime($apcsappds->projectStart))}}</td>
  </tr>
  <tr>
    <th>Title of Proposal</th>
    <td>{{$apcsappds->proposaltitle}}</td>
  </tr>
  <tr>
    <th>Name and Address of Client</th>
    <td>{{$apcsappds->clientname}}<br>{{$apcsappds->clientaddress}}</td>
  </tr>
  <tr>
    <th>Date of Project Completed</th>
    <td>{{ date('d/m/Y', strtotime($apcsappds->projectComplete))}}</td>
  </tr>
  @endforeach
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION E - TRAINING ATTENDED</center></th>
    @foreach($apcsappe as $apcsappes)
  <tr>
    <th width="30%">Training Period</th>
    <td width="70%">From {{ date('d/m/Y', strtotime($apcsappes->starttrainning))}} Until {{ date('d/m/Y', strtotime($apcsappes->endtraining))}}</td>
  </tr>
  <tr>
    <th>Name of Course/ Seminar/ Conference</th>
    <td>{{$apcsappes->seminarname}}</td>
  </tr>
  <tr>
    <th>Venue</th>
    <td>{{$apcsappes->venue}}</td>
  </tr>
  @endforeach
</table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION F - DECLARATION</center></th>
    @foreach($apcsappf as $apcsappfs)
  <tr>
    <td colspan="2"><center><b>{{$apcsappfs->confession}}</center></td></tr>
  
  <tr>
  	<th colspan="2"><center>Applicant Declaration</center></th></tr>
  <tr>
    <td colspan="2">I hereby apply for registration/renewal of registration and declare that the information supplied is true and accurate to the best of my knowledge and permit DOE to verify the information from the sources concerned. I understand that my application may be rejected without notice if the information supplied is found to be untrue.<br><br></td></tr>
    @endforeach
</table>
</div>
</div>
</div>
</div>

</body>
</html>