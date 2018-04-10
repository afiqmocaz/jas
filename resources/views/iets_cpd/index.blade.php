@extends('layouts.certiets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			 <h2  style="margin-left:30px">Continuous Professional Development(CPD)</h2>
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
	


    <div class="table-responsive">
  <table class="table table-hover" style="width: 90%; margin-left: 5%">
    <thead>
      <tr style="background-color: #d9d9d9">
        <th style="width: 15%">Year</th>
        <th style="width: 20%">CPD Hours</th>
        
      </tr>
    </thead>
    <tbody>
    @foreach($ietscpd as $cpd)
      <tr style="border-bottom: 1px solid #ddd;background-color: #f2f2f2">
        <td></td>
        <td>{{ $cpd->cpd1 }}</td>
        
        
      </tr>
      <tr>

        <td></td>
        <td>{{ $cpd->cpd2 }}</td>
        </tr>
        <tr>
        <td></td>
        <td>{{ $cpd->cpd3 }}</td>
      </tr>
      
    </tbody>
  </table>
</div>
 



<center>
	
<label>Certificate Expiry Date: {{ $cpd->expired_date }}</label>
<label>*Note: Certificate renewal can only be made within 2 months prior to expiry date</label>
            
</center>
@endforeach
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

            </div>
        </div><br><br>
		
</div>
  
@endsection
