@extends($master)
@section('js')
@endsection
@section('header', 'EIA: Course Assignment')
@section('content')

<style type="text/css">
	body
	{
		    counter-reset: Serial;           /* Set the Serial counter to 0 */
		}

	tr td:first-child:before
		{
		  counter-increment: Serial;      /* Increment the Serial counter */
		  content:counter(Serial); /* Display the counter */
		}
</style>

<script type="text/javascript">
		
		function AddData() {
    
        var rows = "";
        var id = "";
        var sel = document.getElementById('opt');
		var selected = sel.options[sel.selectedIndex];
		var extra = selected.getAttribute('data-foo');
        var sa = document.getElementById('sa').value;
        var upload = document.getElementById('qa').value;
        var dur = document.getElementById('duration').value;
        var code = document.getElementById('cd').value;
        var rub = document.getElementById("rub").innerHTML;
        var btn = document.getElementById("but").innerHTML;
        var send = document.getElementById("send").innerHTML;
        

        rows += "<tr><td>" + id + "</td><td>" + extra + "</td><td>" + sa + "</td><td>" + upload + "</td><td><center>" + dur + "</center></td><td>" + code + "</td><td>" + rub + "</td><td>" + btn + "</td><td>" + send + "</td><td></tr>";
        $(rows).appendTo("#list tbody");
        var tr = document.createElement("tr");

        tr.innerHTML = rows;
        tbody.appendChild(tr)
}

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
  table = document.getElementById("list");
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
    document.getElementById("list").deleteRow(i);
}

function findselected() {
    var selMenu = document.getElementById('opt');
    var txtField = document.getElementById('opt2');
    if(opt.value == 'General Question') 
        opt2.disabled = true
    else
        opt2.disabled = false
}

	</script>

@if (Session::has('success'))

<div class="alert alert-success" role="alert">

<strong>Success:</strong>  {{ Session::get('success') }}

</div>

@endif

@if (count($errors) > 0)

<div class="alert alert-danger" role="alert">

<strong>Errors:</strong><ul>
@foreach ($errors->all() as $error)
	<br><li>{{ $error }}</li>
@endforeach
</ul>
</div>

@endif


<h1 style="margin: 0px;font-size: 24px">Assignment Master File&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  The purpose of this page is to generate the assignment and assign code to be use in the page of applicant assignment and panel assignment.<br>  
						&bull;  Secretariat EIA can fill the title of the assignment at the text field of Topic.<br>
						&bull;  Secretariat EIA can fill the specialized area of the assignment at the text field of Specialized Area.<br>
						&bull;  Secretariat EIA can upload the assignment with clicking the button "Choose File" at the text field of Upload PCER<br>
						&bull;  The Assign Date and Dateline can be set by date.<br>
						&bull;  Secretariat EIA can fill the code of assign for example "EIA01" at the text field of Assign Code to be assign to applicant and panel.<br>
						&bull;  Secretariat EIA can click the button "Save" to save the progress that have been made.<br>
						&bull;  Secretariat EIA can view the uploaded assignment at the table below.'
        data-html="true" data-placement="right" data-original-title="Assignment Master File Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

<br>

{!! Form::model($eiaassignment, ['route' =>['eiaassignment.update', $eiaassignment->id], 'method' => 'PUT']) !!}

			<div class="form-group">

				<div class="input-group" style="width: 100%;">
		    <span class="input-group-addon" style="width: 20%;text-align: left;" id="type">Type of Question</span>
		    <select id="opt" onChange="findselected()" name="type" class="form-control" required="" style="width:36.6%">
	      		<option value="1" data-foo="" value="0" disabled="true" selected="true">--Please Select--</option>
	      		<option value="General Question" data-foo="General Question">General Question</option>
	      		<option value="Specific Question" data-foo="Specific Question">Specific Question</option>
	      	</select>
		    </div><br>

			<div class="input-group" style="width: 100%;">
		    <span class="input-group-addon" style="width: 20%;text-align: left;" id="specialized">Specialized Area</span>
		    {{ Form::select('specialized', [
		    'Air Pollution Control' =>
		    ['Air Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
		    'Air Pollution Control - Impact Assessment' => 'Impact Assessment',
		    'Air Pollution Control - Environmental Management' => 'Environmental Management',
		    'Air Pollution Control - Performance Monitoring' => 'Performance Monitoring',
		    'Air Pollution Control - Environmental Planning' => 'Environmental Planning',
		    'Air Pollution Control - Risk Assessment' => 'Risk Assessment'],

		    'Water Pollution Control' =>
		    ['Water Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
		    'Water Pollution Control - Impact Assessment' => 'Impact Assessment',
		    'Water Pollution Control - Environmental Management' => 'Environmental Management',
		    'Water Pollution Control - Performance Monitoring' => 'Performance Monitoring',
		    'Water Pollution Control - Environmental Planning' => 'Environmental Planning',
		    'Water Pollution Control - LDP2M2' => 'LDP2M2'],

		    'Waste Management' =>
		    ['Waste Management - Pollution Control Technology' => 'Pollution Control Technology',
		    'Waste Management - Impact Assessment' => 'Impact Assessment',
		    'Waste Management - Environmental Management' => 'Environmental Management',
		    'Waste Management - Performance Monitoring' => 'Performance Monitoring',
		    'Waste Management - Environmental Planning' => 'Environmental Planning',
		    'Waste Management - Risk Assessment' => 'Risk Assessment'],    
		], '', array('class' => 'form-control', 'id' => 'opt2', 'style' => 'width: 90%', 'required' => ''))}}
		    </div><br>

		    <div class="input-group" style="width: 100%;">
		    <span class="input-group-addon" style="width: 20%;text-align: left;" id="question">Question</span>
		    {{ Form::textarea('question', null, ['class' => 'form-control', 'style' => 'width:70%', 'rows' => '5', 'cols' => '60']) }}
		    </div><br>
	      	
	      <div class="input-group" style="width: 100%;">
		    <span class="input-group-addon" style="width: 20%;text-align: left;" id="name">Duration of Assignment</span>
		    {{ Form::number('duration', null, ['class' => 'form-control', 'style' => 'width:36.6%']) }}
		    </div>

	    </div>

	    <div align="right">
	    	{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
	    	{!! Html::linkRoute('eiaassignment.show', 'Cancel', array($eiaassignment->id), array('class' => 'btn btn-primary')) !!}
	    </div>
	   
	     
	  {!! Form::close() !!} 

</div>


<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection