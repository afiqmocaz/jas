@extends('layouts.appeia')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
       <h2  style="margin-left:30px">Course Assignment</h2>
        <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Online examination will be set-up at the Department of Environment Head Quarters or EiMAS. <br>
                2. The date for the examination will be announced by the secretariat. <br>
                3. Applicant is required to make yourselves available for the examination. <br>
                                4. Applicant have to click on the Confirm button to make the confirmation for the examination. <br>
                5. Once Applicant has submitted the confirmation, applicant must wait on that date to seat for the examination.<br>
                6. The applicant will be consider as failed if do not attend the examination.
                </div>
      </div>
    </div>
    <br>
    <div>
      <h4 style="padding-left:5%">The Course Assignment Result is:</div>
    <center>

     @foreach($result as $results)
                    <table class="table table-bordered table-striped" style="margin-center:25%;width:50%">
                        
                        
                        <tr>
                            <th style="width:40%" bgcolor="#bfbfbf">Assignment Result:</th>
                            
                            <td bgcolor="#ffffff">{{ $results->user_id }}/100</td>
                         </tr>
                         <tr>   
                            <th style="width:40%" bgcolor="#bfbfbf">Result Status:</th>
                            @if($results->user_id >= 5)
                            <td>Pass</td>
                            @else
                            <td>Fail</td>
                            @endif
                        </tr>
                    </table>
                
@if($results->user_id >= 5)
                <label style="padding-left:5%"><font color="blue">Congratulations! You have passed the course assignment</font></label><br/>
                @else
                <label style="padding-left:5%"><font color="red">Sorry! You were not passed the course assignment</font></label><br/>
                @endif
@endforeach
  </center>

              
        </div>
    </div>
</div>
</div>
</div>

@endsection



