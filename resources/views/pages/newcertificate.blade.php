
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
      <h2>New Certificate</h2><br/>

      
    
    <object data="images/sijilJAS.pdf" type="application/pdf" width="100%" height="800px">  
 </object>
      

    </center> 
  
      <!-- <img class="img-responsive" src="images/foto.jpeg" alt=""> -->


<!-- <label class="">Email</label>
<input type="text" class="form-control" name="email" id="email" placeholder="Email address" required > <br/>

<label class="">Telephone Number</label>
<input type="text" class="form-control" pattern="\d+" placeholder="Telephone" name="telephone" required><br/>
-->

<!-- <div class="col-md-4 col-md-offset-4">
<a href="/certificaterenewalstatus" class="btn btn-lg btn-primary btn-block" role="button">Apply for Renewal Certificate</a><br/>
</div>-->

    </div>
    <div class="col-sm-2 sidenav">
      
    </div> 
  </div>

  @endsection