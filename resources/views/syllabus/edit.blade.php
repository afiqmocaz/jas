@extends($master)
@section('header', 'APCS: Syllabus')
@section('content')

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

<h1 style="margin: 0px;font-size: 24px;">Upload Material&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;   In this form, Secretariat APCS can upload .pdf file of Syllibus.<br>
						&bull;  Secretariat APCS can click the button "Upload" to upload the file into the applicant login application to download by applicant.<br>
						&bull;  The upload file must below than 10MB and format of .pdf file.'
        data-html="true" data-placement="right" data-original-title="Upload Material Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

        <br>

{!! Form::model($syllabus, ['route' =>['syllabus.update', $syllabus->id], 'method' => 'PUT', 'files' => true]) !!}
					    
<div class="form-group">
		
      <div class="input-group" style="width: 100%;">
	      <span class="input-group-addon" style="width: 20%;text-align: left;" id="announcement">Title</span>
	      {{ Form::text('title', null, ['style' => 'width:100%', 'class' => 'form-control', 'rows' => '4', 'cols' => '50']) }}
	    </div><br>

	    <div class="input-group" style="width: 100%;">
	      <span class="input-group-addon" style="width: 20%;text-align: left;">Filename Uploaded </span>
	      
	     {{ Form::text('original_filename', null, ['style' => 'width:36.6%', 'class' => 'form-control','readonly']) }}
	    </div><br>
	    
	    <div class="input-group" style="width: 100%;">
	      <span class="input-group-addon" style="width: 20%;text-align: left;">Syllabus Upload (.pdf)</span>
	      <center><input id="original_filename" type="file" class="form-control" name="original_filename" accept=".pdf " onchange="myFunction(this)" multiple="multiple" style="width: 100%;"></center>
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
      <label><center><b>File Type: .pdf	|	Max File Upload: 10	|	Max Size Upload: 10MB</b></center></label>
      <br><br>
     <!-- <center>
     <table width="40%">
     <tr>
     <th width="50%">
     <center>{{ Form::submit('Save', ['class' => 'btn btn-primary btn-block', 'style' => 'width:150px;']) }}</center></th>

     <th>
      <center>{!! Html::linkRoute('syllabus.show', 'Cancel', array($syllabus->id), array('class' => 'btn btn-danger btn-block', 'style' => 'width:150px')) !!}</center>
      </th>
      </tr>
      </table></center> -->
      
      <div align="right">
    	{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    	{!! Html::linkRoute('syllabus.show', 'Cancel', array($syllabus->id), array('class' => 'btn btn-primary')) !!}
    </div>
    
  {!! Form::close() !!}

</div>

<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
<script type="text/javascript">
		
		function AddData() {
    var y = document.getElementById("title").value;
    	if ((y == "")) {
        alert("Please Enter Value");
    	} else {
        var rows = "";
        var id = "";
    	var title = document.getElementById("title").value;
    	var upload = document.getElementById("demo").innerHTML;
    	var date = new Date();
    	var btn = document.getElementById("but").innerHTML;

        rows += "<tr><td>" + id + "</td><td>" + title + "</td><td>"  + upload + "</td><td>" + date.toDateString() + "</td><td>" + btn + "</td><td>";
        $(rows).appendTo("#list");
}}

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

	</script>
@endsection