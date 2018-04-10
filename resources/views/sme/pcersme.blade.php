@extends('layouts.app5')

@section('content')
<div class="container">
    
          
			<h2 style="margin-left:30px">Submitted PCER</h2>
                <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Below are the list of assignment that has been assigned to SME.<br>
								2. SME are required to grade that assignment based on rubric given within ONE MONTH.<br>
								3. SME have to click on the name of the assignment on file uploaded in order to view the assignment.<br>
								4. For the rubrics SME have to click on the name of rubrics on rubrics in order to grade the assignment.<br>
								5. SME have to fill in the score for the assignment on the rubric given.<br>					
	  </div>
      </div>
    </div></br><br>
	<div class="table-responsive">
	 <center>
	 
		<table class="table table-bordered table-striped  dt-select" id="myTable" style="width:80%;">
		
  <tr>
 
    <th >No.</th>
    <th >NRIC/Passport No.</th>
    <th >Name</th>
	<th >File Uploaded</th>
	<th >Rubrics</th>
	<th >Date Assigned to SME</th>
	<th>Mark</th>
	<th >Status</th>
	<th >Action</th>
	
		@foreach($assignupload as $assign)
		@foreach($ietsassignapp as $ietsasign)
   @if($ietsasign->panel == Auth::user()->name )
  </tr>
 
  {{csrf_field()}}
					
	<?php
		$no=1;
	?>
  <tr>
	<td>{{$no++}}</td>
	<td>{{$ietsasign->IC}}</td>
    <td>{{$ietsasign->applicantname}}</td>
    <td><a class="file" href="/uploads/{{$assign->original_filename}}">{{$assign->original_filename}}</a></td>
	 <td></td>
    <td>{{ date('d/m/Y', strtotime($ietsasign->updated_at))}}</td>
	<td></td>
	<td></td>
	<td><button id="show-button" type="button" class="btn btn-small btn-primary">Send</button> <br>
	<a href="reqaddinfo"id="show-button" type="button" class="btn btn-large btn-primary">Additional Info</a></td>

  </tr>
  @endif

  @endforeach
  @endforeach
</table>
	 </center>
	  <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	 </div>
	<script>
	$('#myTable').DataTable( {
    responsive: true
} );
	
	</script>

<!--	<center> 
	<label>Please click on next button to upload the report</label><br>
	<a href="ajaxImageUpload" class="btn btn-primary">Next</a></center>-->
        </div>
				
            </div>
        </div>
    </div>
</div>
@endsection
