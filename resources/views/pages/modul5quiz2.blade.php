@extends('main')
@section('content')

<div class="row content">
    <div class="col-sm-2 sidenav">
       <!-- <p><a href="/selflearning(module1)">Module 1</a></p>
      <p><a href="#">Module 2</a></p>
      <p><a href="#">Module 3</a></p>
      <p><a href="#">Module 4</a></p>
      <p><a href="#">Module 5</a></p>
      <p><a href="#">Summary</a></p> -->
      <!--<a href="/selflearning(module1)"  class="button" style="vertical-align:middle">Module 1 </a>-->
      <div id="browse_app">
      <button class="button" style="vertical-align:middle"><span>Module 1 </span></button>
      </div>
      <div id="browse_app2">
      <button class="button" style="vertical-align:middle"><span>Module 2 </span></button>
      </div>
      <div id="browse_app3">
      <button class="button" style="vertical-align:middle"><span>Module 3 </span></button>
      </div>
      <div id="browse_app4">
      <button class="button" style="vertical-align:middle"><span>Module 4 </span></button>
      </div>
      <div id="browse_app5">
      <button class="button" style="vertical-align:middle"><span>Module 5 </span></button>
      </div>
      <div id="browse_summary">
      <button class="button" style="vertical-align:middle"><span>Summary </span></button>
      </div>

    </div>
    <div class="col-sm-8 text-left"> 
      <br/>
      
      
      <hr>

      <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Through the self-learning sessions, applicants should complete all the modules and able to understand the EIA in Malaysia including the legislation framework, EIA procedure, and the requirement of EIA Consultants.</div>
      </div>
    </div>
  </div>

  <center>
      <h2>MODULE 5: REGISTRATION SCHEME  </h2>
      </center>
      <h3>Self Learning Material:</h3>
      <label>i) Registration Scheme for Qualified Person For EIA Consultant</label><br>
      <a href="images/REGISTRATION SCHEME FOR CERTIFIED EIA CONSULTANT IN MALAYSIA ver 2016.pdf"
   download="REGISTRATION SCHEME FOR CERTIFIED EIA CONSULTANT IN MALAYSIA ver 2016.pdf">- Registration Scheme for Qualified Person For EIA Consultant</a><br><br>

   <label>ii) Guidance Document on Continuous Professional Development (CPD)</label><br>
   <a href="images/Appendix I for LDP2M2 Guidance Document  - Log-CW2-1209.pdf"
   download="Appendix I for LDP2M2 Guidance Document  - Log-CW2-1209.pdf">- Appendix I</a><br>

   <a href="images/Appendix II for LDP2M2 Guidance Document - PMR Lot 1-2 Kelau Dam and Related Works.pdf"
   download="Appendix II for LDP2M2 Guidance Document - PMR Lot 1-2 Kelau Dam and Related Works.pdf">- Appendix II</a><br>

    <a href="images/Appendix III for LDP2M2 Guidance Document - BMPs Description NRH_edit.pdf"
   download="Appendix III for LDP2M2 Guidance Document - BMPs Description NRH_edit.pdf">- Appendix III</a><br>
      <hr>
      <h3>Quiz</h3>
      <p>2. Environmental Impact Assessment Guideline in Malaysia shall only be used within the framework of the Environmental Quality Act 1974 and its subsidiary regulations except for …………..</p>
       <div class="radio">
  <label><input type="radio" name="optradio">Sabah and Sarawak</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">Johor</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">Sarawak</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">Sabah</label>
</div>
<div class="col-md-4 col-md-offset-4">
  <a href="/modul5quizscore" class="btn btn-lg btn-primary btn-block" role="button">Next</a>
<!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Next</button> --><br/>
</div>
    </div>
    <!-- <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div> -->
  </div>

  @endsection