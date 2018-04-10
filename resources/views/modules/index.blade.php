@extends('layouts.appeia')
@section('content')

<div class="container">
 
    <div class="row">
   
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <section class= "selflearnings">
                @include('modules.load')

              </section>

      <center>
   <div class="text">
        <label class="text-danger"><strong>* Please click next button to proceed to quiz</strong></label>
      </div>
      <a href="tests" class="btn btn-primary">Next</a>
  </center> 
  <br>

        
            </div>
        </div>
    </div>
</div>

@endsection
