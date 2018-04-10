
@extends('main2')
@section('content2')

<div class="row content">
    <div class="col-sm-2 sidenav">
    </div> 
    <div class="col-sm-8 text-left"> 

<div class="panel-group"style="margin-left:15%;width:60%">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Payment in the form of Cheque / Money Order/ Postal Order must be made payable to Director General, Department of Environment.<br>
2. EIA Consultant need to pay the RM 200.00 for the certificate renewal.
 </div>
      </div>
    </div>
  </div>


<center>
      <h2>Certificate Renewal Application Status</h2></center><br/>

      
    
   
      <table class="table table-bordered" style="margin-left:15%;width:60%">
       <tr>
    <th scope="row">Renewal Certificate Application Status:</th>
    <td>Pre-approved</td>
  </tr>
  <tr>
    <th scope="row">Certificate No.</th>
    <td>: QP100100</td>
  </tr>
  <tr>
    <th scope="row">Specialized Area</th>
    <td>: i) Air Pollution Control(Pollution Control Technology)<br> &nbsp
      ii) Water Pollution Control(Impact Assessment)</td>
  </tr>
  <tr>
    <th scope="row">CPD Hours</th>
    <td>: 150</td>
  </tr>
  <!-- <tr>
    <th scope="row">Certification Expired Date</th>
    <td>: 12 June 2020</td>
  </tr>
  <tr>
    <th scope="row">Renewal Certification Date</th>
    <td>: 12 April 2020</td>
  </tr> -->
  <tr>
    <th scope="row">Disciplinary Status</th>
    <td>: Complete</td>
  </tr>
  </table>

  

    
  
      <!-- <img class="img-responsive" src="images/foto.jpeg" alt=""> -->


<!-- <label class="">Email</label>
<input type="text" class="form-control" name="email" id="email" placeholder="Email address" required > <br/>

<label class="">Telephone Number</label>
<input type="text" class="form-control" pattern="\d+" placeholder="Telephone" name="telephone" required><br/>
-->

<div class="col-md-4 col-md-offset-4">
<a href="#" class="btn btn-lg btn-primary btn-block" role="button">Pay Renewal Certificate</a><br/>
</div>


    </div>
    <div class="col-sm-2 sidenav">
      
    </div> 
  </div>

  @endsection