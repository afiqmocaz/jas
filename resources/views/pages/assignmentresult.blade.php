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
        <div class="panel-body">1. Status of assignment wll be pending until the re<br>
                                2. Applicant </div>
      </div>
    </div>
  </div>

<center>
      <h2>Course Assignment Result</h2><br/>
      <h4><b>Assignment Result: 85/100</b></h4> 
      <!-- <h4><b>90/100</b></h4> --><br/>
      <h4>Congratulations! You have passed the course assignment</h4>
</center>    

<div class="col-md-4 col-md-offset-4">
  <a href="/interview" class="btn btn-lg btn-primary btn-block" role="button">Next</a> 
<!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Next</button><br/> -->
</div>

    </div>
    <div class="col-sm-2 sidenav">
      
    </div> 
  </div>

  @endsection