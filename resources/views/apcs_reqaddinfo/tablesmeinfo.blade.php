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
	<a href="" id="showHide" class="btn btn-primary">Edit</a> 
	<a href="" id="showHide" class="btn btn-primary">Send</a> </td>
	  			        	
    
  </tr>
@endforeach
</table>
	 </center>