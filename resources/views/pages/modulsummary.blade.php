@extends('layouts.appeia')
@section('content')

<div class="container">
 
    <div class="row">
   
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
      <h2 style="margin-left:30px">Summary of Modules' Quizzes</h2>
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

    <center>

   <table class="table table-bordered" style="margin-center:25%;width:50%">
    <thead>
      <tr>
        <th>MODULE</th>
        <th>SCORE</th>
        <th>NUMBER OF QUESTION</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>4</td>
        <td>5</td>
      </tr>
      <tr>
        <td>2</td>
        <td>2</td>
        <td>5</td>
      </tr>
      <tr>
        <td>3</td>
        <td>5</td>
        <td>5</td>
      </tr>
      <tr>
        <td>4</td>
        <td>4</td>
        <td>5</td>
      </tr>
      <tr>
        <td>5</td>
        <td>5</td>
        <td>5</td>
      </tr>
      <tr>
        <th>TOTAL</th>
        <th>20</th>
        <th>25</th>
      </tr>
    </tbody>
  </table>
  </center>

   <label style="padding-left:5%">Congratulations! You have completed this section</label>
    <br/>
      <label style="padding-left:5%">You are qualified for comprehensive examination</label>
       <br/>
 <center>      
         <div class="text">
          <label class="text-danger"><strong>* Please click next button to proceed to comprehensive examination section</strong></label>
      </div>

      <a href="/exam" class="btn btn-primary">Next</a>
  </center>  

        </div>
        
            </div>
        </div>
    </div>
</div>

@endsection