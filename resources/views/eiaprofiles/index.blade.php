@extends('layouts.master_consultant')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			 <h2  style="margin-left:30px">Personal Profile</h2>
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

    @if (Session::has('success'))

				<div class="alert alert-success" role="alert">
		
				<strong>Success:</strong>  {{ Session::get('success') }}

				</div>

				@endif
	
 @foreach($profiles as $profile)

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
        
      <img class="file" src="/image/{{$profile->image}}" href="/image/{{$profile->image}}" width="100px" height="150px"></img></td>
      
        

        
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
         
        {{ $profile->applicantname }}
        
        
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
      <td style="width: 60%; background-color: #f2f2f2">QP {{ $profile->qpno }}
        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">First Specialized Area</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">{{ $profile->first_specialize }}
        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Second Specialized Area</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">{{ $profile->second_specialize }}
        
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
     
        {{ $profile->address }}
       
        
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
      
        {{ $profile->city }}
        
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
     
        {{ $profile->postcode }}
        
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
      
        {{ $profile->state }}
        
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
      
        {{ $profile->countryid }}
        
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
      
        {{ $profile->email }}
        
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
      
        {{ $profile->phone_no }}
        
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
      
        {{ $profile->certificate }}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Certificate Valid Date</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
        {{ $profile->expired_date }} until {{ $profile->valid_date }}
        
      </td>
    </tr>
    
  </tbody>
</table>   
</div> 
 


@endforeach
<center>
	
<a href="{{ route('eiaprofiles.edit', $profile->id) }}" class="btn btn-primary" style="width:100px;">Edit</a>
            
</center>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

            </div>
        </div><br><br>
		
</div>
  
@endsection
