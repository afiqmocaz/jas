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
    @foreach($eiaappa as $eiaappas)
  <tr>
    <th width="30%">Registered Number</th>
    <td width="70%"></td>
  </tr>
  <tr>
    <th>Uploaded Image</th>
    <td><img class="file" src="/image/{{$eiaappas->image}}" width="100px" height="150px"></img><a class="file" href="/image/{{$eiaappas->image}}"><br></img></td>
  </tr>
  @foreach($user as $users)
  <tr>
    <th>Full Name</th>
    <td>{{$users->name}}</td>
  </tr>
  @endforeach
  <tr>
    <th>Title</th>
    <td>{{$eiaappas->title}}</td>
  </tr>
  @foreach($user as $users)
  <tr>
    <th>NRIC</th>
    <td>{{$users->nric}}</td>
  </tr>
  @endforeach
  <tr>
    <th>Address</th>
    <td>{{$eiaappas->address}}</td>
  </tr>
  <tr>
    <th>Postcode</th>
    <td>{{$eiaappas->postcode}}</td>
  </tr>
  <tr>
    <th>City</th>
    <td>{{$eiaappas->city}}</td>
  </tr>
  <tr>
    <th>Country</th>
    <td>{{$eiaappas->country_id}}</td>
  </tr>
  <tr>
    <th>Mail Address</th>
    <td>{{$eiaappas->mailaddress}}</td>
  </tr>
  <tr>
    <th>Mail Postcode</th>
    <td>{{$eiaappas->mailpostcode}}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{$eiaappas->email}}</td>
  </tr>
  <tr>
    <th><i>Bumiputera</i></th>
    <td><i>{{$eiaappas->bumiputerastatus}}</i></td>
  </tr>
  <tr>
    <th>Tel No.</th>
    <td>{{$eiaappas->phoneno}}</td>
  </tr>
  <tr>
    <th>Fax No.</th>
    <td>{{$eiaappas->faxno}}</td>
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
    <td>{{$eiaappas->placeofissue}}</td>
  </tr>
  <tr>
    <th>Date of Issue</th>
    <td>{{$eiaappas->dateofissue}}</td>
  </tr>
  @endforeach
</table>

<table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION B - ACADEMIC QUALIFICATION</center></th></tr>
    @foreach($eiaappb as $eiaappbs)
  <tr>
    <th width="30%">Name / Course Title</th>
    <td width="70%">{{$eiaappbs->coursetitle}}</td>
  </tr>
  <tr>
    <th>Major</th>
    <td>{{$eiaappbs->major}}</td>
  </tr>
  <tr>
    <th>Name of University / College</th>
    <td>{{$eiaappbs->universityname}}</td>
  </tr>
  <tr>
    <th>Year of Study</th>
    <td>From {{ date('d/m/Y', strtotime($eiaappbs->from))}} Until {{ date('d/m/Y', strtotime($eiaappbs->to))}}</td>
  </tr>
  <tr>
    <th>Academic Certification</th>
    <td><a style="color: blue;" href="/uploads/{{$eiaappbs->cert}}">{{$eiaappbs->cert}}</a></td>
  </tr>
  @endforeach
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION C - COMPETENCY COURSE FROM INSTITUT ALAM SEKITAR MALAYSIA (EiMAS)</center></th></tr>
    @foreach($eiaappc as $eiaappcs)
  <tr>
    <th width="30%">Name / Course Title</th>
    <td width="70%">{{$eiaappcs->course}}</td>
  </tr>
  <tr>
    <th>Date Completed</th>
    <td>{{$eiaappcs->date_complete}}</td>
  </tr>
  <tr>
    <th>Certificate No.</th>
    <td>{{$eiaappcs->cert_no}}</td>
  </tr>
  @endforeach
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION D - ENVIRONMENT MANAGEMENT EXPERIENCE</center></th></tr>
    @foreach($eiaappd as $eiaappds)
  <tr>
    <th width="30%">Participation in</th>
    <td width="70%">{{$eiaappds->participate}}</td>
  </tr>
  <tr>
    <th>Name of Project</th>
    <td>{{$eiaappds->project_name}}</td>
  </tr>
  <tr>
    <th>Position</th>
    <td>{{$eiaappds->position}}</td>
  </tr>
  <tr>
    <th>Responsibilities</th>
    <td>{{$eiaappds->responsibilities}}</td>
  </tr>
  <tr>
    <th>Date Start</th>
    <td>{{$eiaappds->dateStart}}</td>
  </tr>
  <tr>
    <th>Date End</th>
    <td>{{$eiaappds->dateEnd}}</td>
  </tr>
  <th colspan="2">Project Refference</th>
  <tr>
    <th>Name</th>
    <td>{{$eiaappds->ref_name}}</td>
  </tr>
  <tr>
    <th>Address</th>
    <td>{{$eiaappds->ref_address}}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{$eiaappds->ref_email}}</td>
  </tr>
  @endforeach
</table>

<table style="width:100%">
  <tr>
  	<br><th colspan="4"><center>SECTION E - SPECIALIZED AREA</center></th></tr>
    @foreach($eiaappe as $eiaappes)
  <tr>
    <th width="30%" >Category 1</th>
    <td width="70%" >{{$eiaappes->first_specialize}}</td>
  </tr>
  <tr>
    <th width="30%" >Category 2</th>
    <td width="70%" >{{$eiaappes->second_specialize}}</td>
  </tr>
  </tr>
  @endforeach
  </table>

  <table style="width:100%">
  <tr>
  	<br><th colspan="2"><center>SECTION F - DECLARATION</center></th></tr>
    @foreach($eiaappf as $eiaappfs)
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
         @endforeach
</table>
</div>
</div>
</div>
</div>

</body>
</html>