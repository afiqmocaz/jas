@extends('main2')
@section('content2')

<div class="row content">
    <div class="col-sm-2 sidenav">
    </div> 
    <div class="col-sm-8 text-left"> 

<div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Applicant must take <br>
                                2. Applicant </div>
      </div>
    </div>
  </div>

<center>
      <h2>Personal Profile</h2></center><br/>

      <div class="outer" >
  <div class="inner">
    <img class="img-responsive center-block" src="{{ asset('images/' . $exam->figure) }}" height="400" width="800" ><br/>
    <center>
      <table class="table table-bordered">
       <tr>
    <th scope="row">Name:</th>
    <td>{{ $profile->name }}</td>
  </tr>
  <tr>
    <th scope="row">IC No.:</th>
    <td>{{ $profile->ic }}</td>
  </tr>
  <tr>
    <th scope="row">Date of Birth:</th>
    <td>{{ $profile->dob }}</td>
  </tr>
  <tr>
    <th scope="row">QP No.:</th>
    <td>{{ $profile->qp_no }}</td>
  </tr>
  <tr>
    <th scope="row">Specialized Area:</th>
    <td>i) {{ $profile->specialized_area_1 }}<br> 
       ii) {{ $profile->specialized_area_2 }}</td>
  </tr>
  
  <tr>
    <th scope="row">Citizenship:</th>
    <td>{{ $profile->citizenship }}</td>
  </tr>
  <tr>
    <th scope="row">Gender:</th>
    <td>{{ $profile->gender }}</td>
  </tr>
  <tr>
    <th scope="row">Address:</th>
    <td>{{ $profile->address }}</td>
  </tr>
  <tr>
    <th scope="row">Email:</th>
    <td>{{ $profile->email }}</td>
  </tr>
  <tr>
    <th scope="row">Phone No.:</th>
    <td>{{ $profile->phone_no }}</td>
  </tr>
  <tr>
    <th scope="row">Qualified Person Status:</th>
    <td>{{ $profile->qp_status }}</td>
  </tr>
  <tr>
    <th scope="row">Certificate:</th>
    <td>{{ $profile->certificate }}</td>
  </tr>
  <tr>
    <th scope="row">Certificate Expired Date:</th>
    <td>{{ $profile->cert_exp_date }}</td>
  </tr>
  </table>

    </center> 
  </div>
</div>
      <!-- <img class="img-responsive" src="images/foto.jpeg" alt=""> -->


<!-- <label class="">Email</label>
<input type="text" class="form-control" name="email" id="email" placeholder="Email address" required > <br/>

<label class="">Telephone Number</label>
<input type="text" class="form-control" pattern="\d+" placeholder="Telephone" name="telephone" required><br/>
-->

<div class="col-md-4 col-md-offset-4">
<a href="/updateprofile" class="btn btn-lg btn-primary btn-block" role="button">Edit Profile</a><br/>
</div>

    </div>
    <div class="col-sm-2 sidenav">
      
    </div> 
  </div>

  @endsection