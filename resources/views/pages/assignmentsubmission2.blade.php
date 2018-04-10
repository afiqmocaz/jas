@extends('main')
@section('content')

<div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="/assignment">General Question</a></p>
      <p><a href="/specificquestion">Specific Question</a></p>
    </div> 
    <div class="col-sm-10 text-left"> 
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
        <div class="panel-body">1. To upload the assignments, applicant must click add file button.<br>
                2. Applicant have to select files that will be uploaded.<br>
                 3. Once finished it, applicant must click submit assignment button.</div>
      </div>
    </div>
  </div>

<center>
      <h2>Course Assignment Submission</h2><br/>
</center>
<table class="table table-bordered">
       <tr>
    <th scope="row">Due Date:</th>
    <td>Monday, 10/05/2017, 5:00 PM</td>
  </tr>
  <tr>
    <th scope="row">Last Modified:</th>
    <td>Sunday, 09/05/2017, 3:00 PM</td>
  </tr>
  <tr>
    <th scope="row">File Submissions (General Question):</th>
    <td>
    <form enctype="multipart/form-data">
        <input id="kv-explorer" type="file" multiple>
        </form></td>
  </tr>
  
  </table>

<div class="col-md-4 col-md-offset-4">
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Submit Assignment</button><br/><br/>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><!--Assignment Submission--></h4>
        </div>
        <div class="modal-body">
          <p>Are you sure want to submit the course assignment?</p>
        </div>
        <div class="modal-footer">
          <center>
          <a href="/assignmentstatus" class="btn btn-info" role="button">Yes</a>
          <a href="/assignmentsubmission" class="btn btn-info" role="button">No</a>
          </center>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button> -->
        </div>
      </div>
    </div>
</div>

    <!--<div class="col-sm-2 sidenav">
      
    </div> -->
  </div>
</div>

  @endsection