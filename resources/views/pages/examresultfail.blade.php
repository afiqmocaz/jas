@extends('main')
@section('content')

<div class="row content">
    <div class="col-sm-2 sidenav">
    </div> 
    <div class="col-sm-8 text-left"> 
      <br>
    
      <hr>
      

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
      <h2>Comprehensive Examination Result</h2><br/>
      </center>


  <table class="table table-bordered">
    <tr>
    <th scope="row">Exam Score:</th>
    <td>50/100</td>
  </tr>
       <tr>
    <th scope="row">Status:</th>
    <td>Fail</td>
  </tr>
  </table>
 
  
     <!-- <h2>Comprehensive Examination Result</h2><br/>
      <h4>Exam Score: 80/100</h4><br/>
      <h4>Status: Pass</h4><br/> -->


<!-- <label class="">Email</label>
<input type="text" class="form-control" name="email" id="email" placeholder="Email address" required > <br/>

<label class="">Telephone Number</label>
<input type="text" class="form-control" pattern="\d+" placeholder="Telephone" name="telephone" required><br/>
-->

<div class="col-md-4 col-md-offset-4">
<!-- <a href="/assignment" class="btn btn-lg btn-primary btn-block" role="button">Next</a><br/> -->
<a href="/beforeexam" class="btn btn-lg btn-primary btn-block" role="button">Re-sit Exam</a>
</div>

    </div>
    <div class="col-sm-2 sidenav">
      
    </div> 
  </div>

  @endsection