@extends('layouts.appeia')
@section('content')

<div class="container">
 
    <div class="row">
   
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
      <h2 style="margin-left:30px">Module 2: EIA Procedure</h2>
                <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Through the self-learning sessions, applicants should complete all the modules and able to understand the EIA in Malaysia including the legislation framework, EIA procedure, and the requirement of EIA Consultants.<br>
   </div>
      </div>
    </div></br>
   <h4 style="padding-left:5%"><b>Self Learning Material:</b></h4><br>
   <ul>

   <li><a href="images/CHAPTER 3.pdf"
   download="CHAPTER 3.pdf">EIA Methodologies</a></li><br><br>

   <li><a href="images/Pre-Submission Stage Of EIA Report.pdf"
   download="Pre-Submission Stage Of EIA Report.pdf">Pre-Submission Stage Of EIA Report</a></li><br><br>

   <li><a href="images/CHAPTER 5.pdf"
   download="CHAPTER 5.pdf">During Submission Stage of EIA Report</a></li><br><br>

   <li><a href="images/CHAPTER 6.pdf"
   download="CHAPTER 6.pdf">Post-Submission Stage of EIA Report</a></li>
   </ul>
   
   <hr>

   <center>
   <div class="text">
        <label class="text-danger"><strong>* Please click next button to proceed to quiz</strong></label>
      </div>
      <a href="/selflearning" class="btn btn-primary">Next</a>
  </center>  

        </div>
        
            </div>
        </div>
    </div>
</div>

@endsection
