@extends('layouts.appeia')
@section('content')

<div class="container">
 
    <div class="row">
   
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
      <h2 style="margin-left:30px">Module 1: EIA in Malaysia</h2>
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

   <li><a href="images/CHAPTER 1.pdf"
   download="CHAPTER 1.pdf">Introduction to EIA in Malaysia</a></li><br><br>

   <li><a href="images/Appendix 6 - EIA Order 2015.pdf"
   download="Appendix 6 - EIA Order 2015.pdf">EIA Order 2015</a></li><br><br>

   <li><a href="images/EQA 1974(related to EIA).pdf"
   download="EQA 1974(related to EIA).pdf">EQA 1974(related to EIA)</a></li>
   </ul>
   
   <hr>

   <h3 style="padding-left:5%"><b>Quiz</b></h3>
      <p style="padding-left:5%">1. Environmental Impact Assessment Guideline (to be referred to as the EIA Guideline) in Malaysia is prepared in accordance with the requirements of _______ of the Environmental Quality Act (EQA), 1974 (Act 127).</p>
       <div class="radio" style="padding-left:5%">
  <label><input type="radio" name="optradio">Section34A (2C)</label>
</div>
<div class="radio" style="padding-left:5%">
  <label><input type="radio" name="optradio">Section34B (2C)</label>
</div>
<div class="radio" style="padding-left:5%">
  <label><input type="radio" name="optradio">Section34A (2D)</label>
</div>
<center>
      <a href="/quizmodul1" class="btn btn-primary">Next</a>
  </center>  

        </div>
        
            </div>
        </div>
    </div>
</div>

@endsection
     