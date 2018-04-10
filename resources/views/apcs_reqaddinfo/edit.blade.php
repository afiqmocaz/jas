@extends('layouts.app5')

@section('content')

<div class="container">
    
          
			<h2 style="margin-left:30px">Request Additional Information</h2>
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
    			


    			{!! Form::model($reqaddinfo, ['route' =>['reqaddinfo.update', $smeaddinfo->id], 'method' => 'PUT']) !!}

							<div class="form-group" style="margin-left:5%">
							
					      	<label>Additional Information </label> </br>
							
					      	<br><textarea id="reqaddinfo" name="reqaddinfo" required="" rows="7" cols="60" style="resize:none"></textarea>



					    <br><br><center>
					     <table width="40%">
					     <tr>
					     <th width="50%">
					     <center>{{ Form::submit('Save', ['class' => 'btn btn-primary btn-block', 'style' => 'width:150px;']) }}</center></th>

					     <th>
					      <center>{!! Html::linkRoute('reqaddinfo.show', 'Cancel', array($smeaddinfo->id), array('class' => 'btn btn-danger btn-block', 'style' => 'width:150px')) !!}</center>
					      </th>
					      </tr>
					      </table></center><br>
					    </div>
									
				<div class="table-responsive">
	 <center>
	 
		<table class="table table-bordered table-striped  dt-select" id="myTable" style="width:80%;">
  <tr>
    <th >No.</th>
    <th >Additional Info Requested</th>
	<th >Action</th>
	
  </tr>
  {{csrf_field()}}
  <?php
		$no=1;
	?>
		@foreach ($smeaddinfo as $smeaddinfos)		
	
  <tr>
	<td>{{$no++}}</td>
	<td>{{$smeaddinfos -> reqaddinfo}}</td>
    <td>
	<a href="{{ route('reqaddinfo.edit', $ivschedules->id) }}" > id="showHide" class="btn btn-primary">Edit</a> 
	<a href="" id="showHide" class="btn btn-primary">Send</a> </td>
				        	
    
  </tr>
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

				 <script src="js/parsley.min.js"></script>      
				 <script type="text/javascript">
  				$('#form').parsley();
				</script>
				  
				</div>
				</div>
				</div>
				</div>



				                
			</div> <!-- thumbnail area -->  
		
		<footer>
			<div class="credit row">
				<center><div class="col-md-6 col-md-offset-3">
					<div id="templatemo_footer">
						Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
					</div>
				</div>
						
			</div>
		</footer>
	</div>
    <!-- templatemo 393 fantasy -->
    {!! Html::script('js/parsley.min.js')!!}
	{!! Html::script('js/jquery.js')!!}
	{!! Html::script('js/bootstrap.min.js')!!}
	{!! Html::script('js/templatemo_script.js')!!}
    <!-- templatemo 393 fantasy -->
    <!--<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>-->
</body>
@endsection
