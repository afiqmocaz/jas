@extends($master)
@section('js')
@endsection
@section('header', $category.': Virtual Self-Learning')
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
        var sel = document.getElementById('mySelect');
		var selected = sel.options[sel.selectedIndex];
		var extra = selected.getAttribute('data-foo');
		var sel1 = document.getElementById('mySelect1');
		var selected1 = sel1.options[sel1.selectedIndex];
		var extra1 = selected1.getAttribute('data-foo');
		var title = document.getElementById('title').value;
		var upload = document.getElementById("demo").innerHTML;
		var date = new Date();
		var btn = document.getElementById("but").innerHTML;

        rows += "<tr><td>" + id + "</td><td>" + extra + "</td><td>" + extra1 + "</td><td>" + title + "</td><td>" + upload + "</td><td>" + date.toDateString() + "</td><td>" + btn + "</td><td></tr>";
        $(rows).appendTo("#list tbody");
        var tr = document.createElement("tr");

        tr.innerHTML = rows;
        tbody.appendChild(tr);
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

function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
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

<h1 style="margin: 0px;font-size: 24px;">Upload Material (Edit)&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull; In this form, Secretariat {{strtoupper($category)}} can upload .pdf file of Self-Learning module 1 to module 5.<br>&bull; Secretariat {{$category}} can click the button "Upload" to upload the file into the applicant login application to download by applicant.<br>&bull; The upload file must below than 10MB and format of .pdf file.'
        data-html="true" data-placement="right" data-original-title="Upload Material Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

        <br>


{!! Form::model($selflearning, ['route' =>['selflearning.update', $selflearning->id], 'method' => 'PUT']) !!}
					    <div class="form-group">

					    	<div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;" id="module">Module</span>
						      <select id="module" name="module" class="form-control" required="" style="width: 36.6%;">
					    		<option data-foo="{{$selflearning->module}}" value="{{$selflearning->module}}"  selected="true">--Please Select--</option>
					    		@foreach($modules as $module)
					    		<option data-foo="{{$module->id}}" value="{{$module->id}}">{{$module->name}}</option>
					    		@endforeach
							  	<!-- <option data-foo="Module 1">Module 1</option>
							  	<option data-foo="Module 2">Module 2</option>
							  	<option data-foo="Module 3">Module 3</option>
							  	<option data-foo="Module 4">Module 4</option>
							  	<option data-foo="Module 5">Module 5</option> -->
								</select>
						    </div><br>

							<div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;" id="mtitle">Module Title</span>
						      {{ Form::text('mtitle', null, ['class' => 'form-control', 'style' => 'width: 100%;']) }}
						    </div><br>

							<div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;" id="submodule">Sub-Module</span>
						      <select id="submodule" name="submodule" class="form-control" required="" style="width: 36.6%;">
					    		<option data-foo="" value="0" disabled="true" selected="true">--Please Select--</option>
							  	<option data-foo="Sub-Module 1">Sub-Module 1</option>
							  	<option data-foo="Sub-Module 2">Sub-Module 2</option>
							  	<option data-foo="Sub-Module 3">Sub-Module 3</option>
							  	<option data-foo="Sub-Module 4">Sub-Module 4</option>
							  	<option data-foo="Sub-Module 5">Sub-Module 5</option>
								</select>
						    </div><br>

						    <div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;" id="title">Sub-Module Title</span>
						      {{ Form::text('title', null, ['class' => 'form-control', 'style' => 'width: 100%;']) }}
						    </div><br>

						    <div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;">Syllabus Upload (.pdf)</span>
						      <center><input id="original_filename" type="file" class="form-control" name="original_filename" accept=".png, .jpg, .pdf , .doc , .docx , .txt" onchange="myFunction()" multiple="multiple" style="width: 100%;"></center>
						    </div>

					      <br><p id="demo"></p>
					      <script>

					      	
					      	function PreviewImage() {
				                pdffile=document.getElementById("original_filename").files[0];
				                pdffile_url=URL.createObjectURL(pdffile);
				                $('#viewer').attr('src',pdffile_url);
				            }

							function myFunction(){

							    var x = document.getElementById("original_filename");
							    var txt = "";
							    if ('files' in x) {
							        if (x.files.length == 0) {
							            txt = "Select one or more files.";
							        } else {
							            for (var i = 0; i < x.files.length; i++) {
							                txt += "<br><strong>" + (i+1) + ". </strong>";
							                var file = x.files[i];
							                if ('name' in file) {
							                    txt += "Name: " + file.name + "<br>";
							                }
							                if ('size' in file) {
							                    txt += "&nbsp&nbsp&nbsp Size: " + file.size + " bytes <br>";
							                    
							                }
							            }
							        }
							    } 
							    else {
							        if (x.value == "") {
							            txt += "Select one or more files.";
							        } else {
							            txt += "The files property is not supported by your browser!";
							            txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
							        }
							    }
							    document.getElementById("demo").innerHTML = txt;
							}
							</script>
					      <label><center><b>File Type: .pdf, .doc, .docx, .txt	|	Max File Upload: 10	|	Max Size Upload: 10MB</b></center></label><br>
						        <br>

					      
					    <!--  <table width="40%">
					     <tr>
					     <th width="50%">
					     <center>{{ Form::submit('Save', ['class' => 'btn btn-primary btn-block', 'style' => 'width:150px;']) }}</center></th>

					     <th>
					      <center>{!! Html::linkRoute('selflearning.show', 'Cancel', array($selflearning->id), array('class' => 'btn btn-danger btn-block', 'style' => 'width:150px')) !!}<a href="{{ url()->previous() }}" class="btn btn-danger btn-block">Cancel</a></center>
					      </th>
					      </tr>
					      </table> -->

					      <div align="right">
					      	{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
					      	<a href="{{ url()->previous() }}" class="btn btn-primary">Cancel</a>
					      </div>
					    
					  {!! Form::close() !!}


<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection