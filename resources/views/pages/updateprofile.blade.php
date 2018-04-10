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
    <img class="img-responsive center-block" src="images/foto.jpeg"><br/>
    <center>
      <table class="table table-bordered">
       <tr>
    <th scope="row">Name:</th>
    <td>AHMAD BIN MOHD</td>
  </tr>
  <tr>
    <th scope="row">IC No.:</th>
    <td>901201034567</td>
  </tr>
  <tr>
    <th scope="row">QP No.:</th>
    <td>QP100100</td>
  </tr>
  <tr>
    <th scope="row">Citizenship:</th>
    <td>MALAYSIAN</td>
  </tr>
  <tr>
    <th scope="row">Gender:</th>
    <td>MALE</td>
  </tr>
   <tr>
    <th scope="row">Address:</th>
    <td>
     <form>
    <div class="form-group">
      <textarea class="form-control" rows="5"id="comments" placeholder="NO. 2, JALAN KENANGA, 16300 BACHOK, KELANTAN"></textarea>
    </div>
  </form>
  </td>
  </tr>
  <tr>
    <th scope="row">Email</th>
    <td>
     <form>
    <div class="form-group">
      <input type="text" class="form-control" id="usr" placeholder="ahmadmohd@gmail.com">
    </div>
  </form>
  </td>
  </tr>
  <tr>
    <th scope="row">Phone No.</th>
    <td>
     <form>
    <div class="form-group">
      <input type="text" class="form-control" id="usr" placeholder="0136790858">
    </div>
  </form>
  </td>
  </tr>
    <th scope="row">Qualified Person Status</th>
    <td>: REGISTERED</td>
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
<a href="/profile" class="btn btn-lg btn-primary btn-block" role="button">Update Profile</a><br/>
</div>

    </div>
    <div class="col-sm-2 sidenav">
      
    </div> 
  </div>

  @endsection