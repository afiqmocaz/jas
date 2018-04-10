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
      <h2>Comprehensive Examination</h2><br/>
      </center>
      <h4>Time Remaining: 00:10:50</h4><br/>
      <h3>Questions:</h4><br/>

        <p>99. Can the Project Initiator conduct his own EIA and produce the EIA report for his project?</p>
       <div class="radio">
  <label><input type="radio" name="optradio">Yes, but only for Preliminary EIA</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">Yes, but provided the members of his EIA team are registered with the DOE</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">No</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">No, except in Sabah and Sarawak</label>
</div>
<br/>

<p>100. Which section of the Environmental Quality Act, 1974 provides the basis for the EIA requirement in Malaysia?</p>
       <div class="radio">
  <label><input type="radio" name="optradio">Section 33A</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">Section 34A</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">Section 33B/label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">Section 34AA</label>
</div>
<br/>
<br/>
      
<!-- <label class="">Email</label>
<input type="text" class="form-control" name="email" id="email" placeholder="Email address" required > <br/>

<label class="">Telephone Number</label>
<input type="text" class="form-control" pattern="\d+" placeholder="Telephone" name="telephone" required><br/>
-->
<div class="col-md-4 col-md-offset-4">
<ul class="list-inline">
        <li><a href="/examquestion">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#">7</a></li>
        <li><a href="#">8</a></li>
        <li><a href="#">9</a></li>
        <li><a href="#/lastquestion">10</a></li>
    </ul>
</div>
<div class="col-md-4 col-md-offset-4">
<ul class="list-inline">
<li><a href="/examquestion" class="btn btn-lg btn-primary btn-block" role="button">Back</a></li>
<li><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Finish</button><br/></li>
</ul>

</div>

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>Are you sure want to complete the exam now?</p>
        </div>
        <div class="modal-footer">
          <center>
          <a href="/examresult" class="btn btn-info" role="button">Yes</a>
          <a href="/lastquestion" class="btn btn-info" role="button">No</a>
          </center>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button> -->
        </div>
      </div>
    </div>
</div>


    </div>
    <div class="col-sm-2 sidenav">
      
    </div> 
  </div>

  @endsection