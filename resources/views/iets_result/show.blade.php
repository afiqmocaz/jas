@extends('layouts.ietsexam')

@section('content')

<div class="container">
 
    <div class="row">
     <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
       <h2  style="margin-left:30px">Comprehensive Examination Result</h2>
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

              
                   
    </div><br><br>
 

     
        
                

          <table class="table table-bordered table-striped" style="padding-left:5%">
                       
                        <tr>
                            <th>User Details</th>
                            <td>{{ $test->user->name or '' }} ({{ $test->user->email or '' }})</td>
                        </tr>
                       
                        <tr>
                            <th>Date</th>
                            <td>{{ date('d/m/Y', strtotime($test->created_at))}}</td>
                        </tr>
                        <tr>
                            <th>Result</th>
                            <td>{{ $test->result }}/{{$count}}
              @if(($test->result) >=3)
                  &nbsp; <label style="color:blue">PASS</label>
                @else
                   &nbsp; <label style="color:red">FAILED</label> 
                 </td>
               <tr>
               <th>Action</th>
                <td> 
                
                <input type=button name=print class="btn btn-xs btn-primary" value="Print" onClick="window.print()">
                
                </td></tr>
               @endif
                    </table>
          @if(($test->result) >=3)
                  &nbsp; <label style="color:blue;padding-left:5%">Congratulation!</label>
                @else
                   <br><label  style="color:blue;padding-left:5%">Candidate is allowed to repeat the examination only<label style="color:red"> &nbsp; 2 times. </label> <label style="color:blue">If candidates fail the examination <label style="color:red">twice</label>, then the candidates are required to make <label style="color:red">new registration.</label>
                 <label style="color:blue">Please notes that, the schedule of the repeat examination will be arranged and published by Secretariat.</label>
                 <label style="color:blue">Please login into the system in order to booking the date for the repeat examination.</label> 
                      
          @endif            
                
          
           
        </div>
    </div>
    </div>
           
        </div>
    </div>
@stop
