@extends($master)
@section('js')
@endsection
@section('header', 'APCS: Course Assignment -> Pollution Control Engineering Report')
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
        var topic = document.getElementById('tpc').value;
        var sa = document.getElementById('sa').value;
        var upload = document.getElementById("demo").innerHTML;
        var dur = document.getElementById('duration').value;
        var code = document.getElementById('cd').value;
        var rub = document.getElementById("rub").innerHTML;
        var btn = document.getElementById("but").innerHTML;
        var send = document.getElementById("send").innerHTML;
        

        rows += "<tr><td>" + id + "</td><td>" + topic + "</td><td>" + sa + "</td><td>" + upload + "</td><td><center>" + dur + "</center></td><td>" + code + "</td><td>" + rub + "</td><td>" + btn + "</td><td>" + send + "</td><td></tr>";
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

<h1 style="margin: 0px;font-size: 24px">PCER Format&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  The purpose of this page is to generate the assignment and assign code to be use in the page of applicant assignment and panel assignment.<br>  
						&bull;  Secretariat APCS can fill the title of the assignment at the text field of Topic.<br>
						&bull;  Secretariat APCS can fill the specialized area of the assignment at the text field of Specialized Area.<br>
						&bull;  Secretariat APCS can upload the assignment with clicking the button "Choose File" at the text field of Upload PCER<br>
						&bull;  The Assign Date and Dateline can be set by date.<br>
						&bull;  Secretariat APCS can click the button "Save" to save the progress that have been made.<br>
						&bull;  Secretariat APCS can view the uploaded assignment at the table below.'
        data-html="true" data-placement="right" data-original-title="PCER Format Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

<br>           
				 
				 {!! Form::model($assignment, ['route' =>['assignment.update', $assignment->id], 'method' => 'PUT', 'files' => true]) !!}

							<div class="form-group">

							<div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;text-align: left;">Upload PCER</span>
						    <input type="file" id="original_filename" name="original_filename" class="form-control" required="" accept=".pdf" onchange="myFunction(this)" multiple style="width:100%">
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
					      <label><center><b>File Type: .pdf	|	Max File Upload: 10	|	Max Size Upload: 10MB</b></center></label><br>
						        <br>

						        <div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;text-align: left;" id="name">PCER Name</span>
						    {{ Form::text('name', null, ['style' => 'width:36.6%', 'class' => 'form-control']) }}
						    </div><br>

						    <div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;text-align: left;" id="name">Duration of Assignment</span>
						    {{ Form::number('duration', null, ['style' => 'width:36.6%', 'class' => 'form-control']) }}
						    <label for="usr">&nbsp Days</label>
						    </div>
					      
					    </div>
					    <!-- <center>
					     <table width="40%">
					     <tr>
					     <th width="50%">
					     <center>{{ Form::submit('Save', ['class' => 'btn btn-primary btn-block', 'style' => 'width:150px;']) }}</center></th>

					     <th>
					      <center>{!! Html::linkRoute('assignment.show', 'Cancel', array($assignment->id), array('class' => 'btn btn-danger btn-block', 'style' => 'width:150px')) !!}</center>
					      </th>
					      </tr>
					      </table></center> --><br>

					     <div align="right">
					    	{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
					    	{!! Html::linkRoute('assignment.show', 'Cancel', array($assignment->id), array('class' => 'btn btn-primary')) !!}
					    </div>

					  {!! Form::close() !!} 

<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
<script type="text/javascript">
 var _validFileExtensions = [".pdf"];    
function myFunction(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    var file = oInput.files[0];
    if (file.size > 10485760) {
         //Now Here I need to update <span> 

       alert('Filesize must 10mb or below');
        // don't want alert message
        oInput.value = "";
    }
    return true;
}
</script>

@endsection