@extends($master)
@section('content')
@section('header', 'IETS: Announcement')		
				 <!-- <h1>Announcement<br></h1>

				 <div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary">
				      <div class="panel-heading"  >
				        <h4 class="panel-title">
				          <a data-toggle="collapse" href="#collapse1">Announcement Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  Secretariat IETS can enter announcement by clicking the Add Announcement button.
					    •  The announcement can be view, edit or delete in the table below.
						•  The announcement entered by Secretariat EIA will be shown in the announcement box at the Home Page.
				        </div>
				      </div>
				    </div>
				  </div>
				  <script>
				  $(document).ready(function(){
				    $('[data-toggle="popover"]').popover();   
				  });
				  </script>
 --><style ></style>
					
				 <a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"></a>
				  <form action="{{ url('ietsannounce/create') }}" method="get">
					    <input type="submit" class="btn btn-primary" value="Add Announcement"/> 
					     <a id="popoverData" class="btn btn-primary" href="#" data-content="&bull; Secretariat IETS can enter announcement by clicking the Add Announcement button.<br /> &bull;  The announcement can be view, edit or delete in the table below.<br />&bull;  The announcement entered by Secretariat IETS will be shown in the announcement box at the Home Page."
        data-html="true" data-placement="right" data-original-title="Announcement Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a>
					</form>
                                <br>
				<div class="table-responsive">
				<table class="order-table table table-bordered" id="myTable">
                    <thead valign="top" class="alert-info">
				      <tr>
				        <th onclick="sortTable(0)">No.</th>
				        <th onclick="sortTable(1)">Subject</th>
				        <th onclick="sortTable(2)">Announcement</th>
				        <th onclick="sortTable(3)">Uploaded File</th>
				        <th colspan="2" onclick="sortTable(4)"><center>Action</center></th>
				      </tr>
				    </thead>
				    <tbody>
                                    <div class="hide">{{$count = 1}}</div>
				    @foreach($ietsannounce as $ietsannounces)
				      <tr>
				        <td>{{$count++}}</td>
				        <td>{{$ietsannounces->subject}}</td>
				        <td>{{$ietsannounces->announcement}}</td>
				        <td><a class="file" href="/uploads/{{$ietsannounces->original_filename}}">{{$ietsannounces->original_filename}}</a></td>
				        <td id="but">
				        	<center><a href="{{ route('ietsannounce.edit', $ietsannounces->id) }}" >
				        		{!! Form::image('images/edit.png', 'a Delete', ['type' => 'submit',  'class' => 'btnimg', 'title' => 'Delete'] ) !!}</center></a><br></td>

				        	<td>{!! Form::open(['route' => ['ietsannounce.destroy', $ietsannounces->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

				        	<center>{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit',  'class' => 'btnimg', 'title' => 'Delete'] ) !!}</center>

				        	{!! Form::close() !!}
							</td>
				      </tr>
				      @endforeach
				    </tbody>
				  </table>
				  <script>
			$('#popoverData').popover({
container: 'body' });
$('#popoverOption').popover({ trigger: "hover" });
				  </script>
@endsection