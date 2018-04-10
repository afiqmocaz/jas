@extends('main')
@section('content')


<div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="/assignment">General Question</a></p>
      <p><a href="/specificquestion">Specific Question</a></p>
    </div> 
    <div class="col-sm-8 text-left"> 
      <br>
    
      <label>Time Remaining                      :50 days</label>
      <hr>
      

<div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Applicant who passes the Examination is eligible to submit Course Assignment. <br>
                2. Course Assignment shall demonstrate that applicant can write the technical report and make a review as required by DOE. <br>
                3. The applicant should submit two assignments on general subject and area of expertise. <br>
                4. Each assignment is 1500-2000 words and must be submitted to DOE within 2 weeks after receiving the task.<br>
                5. Once Applicant have finish up the report, applicant must submit the report for the hardcopy and softcopy.<br>
                6. For the softcopy applicant must upload it in pdf format through this system.<br>
                7. For the hardcopy applicant must submit the assignments to DOE. </div>
      </div>
    </div>
  </div>

<center>
      <h2>Course Assignment Section</h2><br/>
</center>
<h4>b)<u>Specific Question:</u></h4>
      <p>Hutan Bandar Sdn Bhd is planning to develop a man-made island less than 50 hectares. The proposed project is located 10 kilometers from a mangrove area.

Based on the scenario above and the Environmental Impact Assessment Guideline in Malaysia 2016, explain the process of EIA procedure required.
</p><br/>

<div class="col-md-4 col-md-offset-4">
<a href="eiaupload" class="btn btn-lg btn-primary btn-block" role="button">Upload Assignment</a><br/>
</div>

    </div>
    <div class="col-sm-2 sidenav">
      
    </div> 
  </div>

  @endsection
