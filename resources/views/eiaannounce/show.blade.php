@extends($master)
@section('content')
@section('header', 'EIA: Announcement')

	<script type="text/javascript">
		
		(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);


function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
}

function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }

</script>

				
				 <!-- <h1>Announcement<br></h1>

				 <div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary" style="border-color:#4CAF50;">
				      <div class="panel-heading" style="background-color:#4CAF50;" >
				        <h4 class="panel-title" style="color:white;">
				          <a data-toggle="collapse" href="#collapse1">Announcement Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  Secretariat EIA can enter announcement by clicking the "Add Announcement" button.<br>
					    •  The announcement can be view, edit or delete in the table below.<br>
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

				<br> -->

				
				  <form action="{{ url('eiaannounce/create') }}" method="get">
					    <input type="submit" class="btn btn-primary" value="Add Announcement"/>
					    <a id="popoverData" class="btn btn-primary" href="#" data-content="• Secretariat EIA can enter announcement by clicking the Add Announcement button.<br /> •  The announcement can be view, edit or delete in the table below.<br />•  The announcement entered by Secretariat EIA will be shown in the announcement box at the Home Page."
        data-html="true" data-placement="right" data-original-title="Announcement Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a>
					</form>

				<!-- &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->
<!--				<input type="search" class="light-table-filter" data-table="order-table"  placeholder="Search..." style="width: 20%; float:right;"><br><br>-->
                                <br>
				<div class="table-responsive">
				<table class="table table-bordered" id="myTable">
                                    <thead valign="top" class="alert-info">
				      <tr>
				        <th onclick="sortTable(0)">No.</th>
				        <th onclick="sortTable(1)">Subject</th>
				        <th onclick="sortTable(2)">Announcement</th>
				        <th onclick="sortTable(3)">Uploaded File</th>
				        <th colspan="2" onclick="sortTable(4)" style="text-align: center;"><center>Action</center></th>
				      </tr></thead>
				    
				    <tbody>
                                    <div class="hide">{{$count = 1}}</div>
				    @foreach($eiaannounce as $eiaannounces)
				      <tr>
				        <td>{{$count++}}</td>
				        <td>{{$eiaannounces->subject}}</td>
				        <td>{{$eiaannounces->announcement}}</td>
				        <td><a class="file" href="/uploads/{{$eiaannounces->original_filename}}">{{$eiaannounces->original_filename}}</a></td>
				        <td id="but" align="center">
				        	<a href="{{ route('eiaannounce.edit', $eiaannounces->id) }}" >{!! Form::image('images/edit.png', 'a Delete', ['type' => 'submit',  'class' => 'btnimg', 'title' => 'Edit'] ) !!}</a>
				        </td>
			        	<td align="center">
			        	{!! Form::open(['route' => ['eiaannounce.destroy', $eiaannounces->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
						{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit',  'class' => 'btnimg', 'title' => 'Delete'] ) !!}
			        	{!! Form::close() !!}
						</td>
				      </tr>
				      @endforeach
				    </tbody>
				  </table>
				</div>
				 <script>
			$('#popoverData').popover({
container: 'body' });
$('#popoverOption').popover({ trigger: "hover" });
				  </script>
				</div>  
	@endsection			