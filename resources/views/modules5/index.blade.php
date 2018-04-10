@extends('layouts.appeia')
@section('content')

<div class="container">
 
    <div class="row">
   
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <section class= "selflearnings">
                <h2 style="margin-left:30px">{{ $module }}: {{ $title }}</h2>
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
   @foreach($selflearnings as $selflearning)
   
   <ul>

   <li><a class="file" href="/uploads/{{$selflearning->original_filename}}">{{$selflearning->title}}</a></li>
   </ul>
   
   @endforeach
   
   <hr>


              </section>

      <center>
   <div class="text">
        <label class="text-danger"><strong>* Please click next button to proceed to quiz</strong></label>
      </div>
      <a href="tests5" class="btn btn-primary">Next</a>
  </center> 
  <br>

        
            </div>
        </div>
    </div>
</div>

@endsection
