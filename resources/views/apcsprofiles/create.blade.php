@extends('layouts.master_consultant')
@section('header', $category.': Personal Profile')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
       <h2  style="margin-left:30px">Personal Profile&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='1. Online examination will be set-up at the Department of Environment Head Quarters or EiMAS. <br>
                2. The date for the examination will be announced by the secretariat. <br>
                3. Applicant is required to make yourselves available for the examination. <br>
                                4. Applicant have to click on the Confirm button to make the confirmation for the examination. <br>
                5. Once Applicant has submitted the confirmation, applicant must wait on that date to seat for the examination.<br>
                6. The applicant will be consider as failed if do not attend the examination.'
        data-html="true" data-placement="right" data-original-title="Instructions" data-trigger="hover" data-toggle="popover"><i class="glyphicon glyphicon-info-sign"></i></a></h2>

        <!-- <div class="panel-group">
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
    </div></div> --><br><br>

    @if (Session::has('success'))

        <div class="alert alert-success" role="alert">
    
        <strong>Success:</strong>  {{ Session::get('success') }}

        </div>

        @endif
  
 

    <div class="table-responsive" style="width: 80%; margin-left: 10%">
     <table class="table table-bordered">
  <tbody>
 
    <tr>
      <td style="background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Passport Image</label>
      </td>
      <td style="background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="background-color: #f2f2f2">
        
      <img class="file" src="/image/{{$sectionA->image}}" href="/image/{{$sectionA->image}}" width="100px" height="150px"></img></td>
      
        

        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
         
        {{ Auth::user()->name }}
        
        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">IC No.</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
        {{ Auth::user()->nric }}

      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">QP No.</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">CIETSC-{{$cert->id}} 
        
      </td>
    </tr>
    
    
      <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Address</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
          {{$sectionA->address}}
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">City</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
       {{$sectionA->city}}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Postcode</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
     
          {{$sectionA->postcode}}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">State</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
           {{$sectionA->state}}

        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Country</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
         {{$sectionA->country_id}}
        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Email</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
       {{$sectionA->email}}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
           {{$sectionA->phoneno}}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Certificate</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
          {{$cert->id}}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Certificate Expiry Date</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
           {{$cert->expired->format('d-M-Y')}}
        
      </td>
    </tr>
    
  </tbody>
</table>   
</div> 
 <center>
  
<a href="{{ route('apcsprofiles.edit',$sectionA->id) }}" class="btn btn-primary" style="width:100px;">Edit</a>
            
</center>


  </div>
</div>



            </div>
        </div><br><br>
    
</div>
<!-- azhari mustapa, azhari@nafa.my, 23/01/2018 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script src="{{ asset ('/node_modules/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>   
    $('#popoverData').popover({
    container: 'body' });
</script> 
@endsection
