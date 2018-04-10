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

<h1 style="margin: 0px;font-size: 24px;">Upload Material&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull; In this form, Secretariat {{strtoupper($category)}} can upload .pdf file of Self-Learning module 1 to module 5.<br>&bull; Secretariat {{strtoupper($category)}} can click the button "Upload" to upload the file into the applicant login application to download by applicant.<br>&bull; The upload file must below than 10MB and format of .pdf file.'
        data-html="true" data-placement="right" data-original-title="Upload Material Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a>&nbsp;<!-- <button id="myBtn" class="btn btn-primary" >Add New Self-Learning</button> --><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Add New Self-Learning</button></h1>

        <br>

        <input type="search" class="light-table-filter" data-table="order-table"  placeholder="Search..." style="width: 17%; float:right;"><br><br>

        <div class="table-responsive">
				<table class="order-table table table-bordered" id="list">
				    <thead valign="top" class="alert-info">
				    
				      <tr>
				        <th style="width:3%;" onclick="sortTable(0)">No.</th>
				        <th style="width:7%;" onclick="sortTable(1)">Module</th>
				        <th style="width:12%;" onclick="sortTable(2)">Title</th>
<!--				        <th style="width:8%;" onclick="sortTable(3)">Sub-Module</th>
				        <th style="width:12%;" onclick="sortTable(4)">Sub-Module Title</th>-->
				        <th style="width:16%;" onclick="sortTable(5)" >Upload Material</th>
				        <th style="width:10%;" onclick="sortTable(6)">Date Upload</th>
				        <th style="width:10%;" colspan="2" onclick="sortTable(7)" style="text-align: center;"><center>Action</center></th>
				      </tr></thead>
				    
				    <tbody>
				    @foreach($selflearning as $selflearnings)
				      <tr>
				        <td></td>
				        <td>{{$selflearnings->quizModul->name}}</td>
				        <td>{{$selflearnings->mtitle}}</td>
<!--				        <td>{{$selflearnings->submodule}}</td>
				        <td>{{$selflearnings->title}}</td>-->
				        <td><a class="file" href="/uploads/{{$selflearnings->original_filename}}">{{$selflearnings->original_filename}}</a></td>
				        <td>{{ date('d F Y', strtotime($selflearnings->created_at)) }}</td>
				        <td align="center"><a href="{{ route('selflearning.edit', $selflearnings->id) }}" >{!! Form::image('images/edit.png', 'a Edit', ['type' => 'submit',  'class' => 'btnimg', 'title' => 'Edit'] ) !!}</a></td>
			        	<td align="center">{!! Form::open(['route' => ['selflearning.destroy', $selflearnings->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
			        	{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit',  'class' => 'btnimg', 'title' => 'Delete'] ) !!}
			        	{!! Form::close() !!}
						</td>
				      </tr>
				      @endforeach
				    </tbody>
				  </table>      
				 
				</div>  

				<div align="right">
				    <!-- <button class="btn btn-primary" onclick="location.href='/quizModul/view/{{$type}}/{{$category}}'">Back</button> -->
				    <a href="/quizModul/view/{{$type}}/{{$category}}" class="btn btn-primary" role="button">Back</a>
				</div>



				<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
    <!-- <input type="hidden" id="module" name="module" value="{{$moduleId}}" /> -->
    <div class="modal-dialog">
 	{!! Form::open(array('url'=>'selflearning/uploadFiles', 'data-parsley-validate' => '', 'method'=>'POST', 'files'=>true)) !!}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Self-Learning</h4>
            </div>
            <div class="modal-body">
               
                                       <input type="hidden" name="title" value="NULL">
                                      <input type="hidden" name="module" value="{{$moduleId}}">
                                      <input type="hidden" name="submodule" value="NULL">
                                     
					    <div class="form-group">

						   <div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;" id="mtitle">Module Title</span>
						      <input id="mtitle" type="text" class="form-control" name="mtitle" required="" maxlength="255" style="width: 100%;">
						    </div>
                                                

<!--							<div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;" id="submodule">Sub-Module</span>
						      <select id="submodule" name="submodule" class="form-control" required="" style="width: 100%;">
					    	      <option data-foo="" value="0" disabled="true" selected="true">--Please Select--</option>
							  	<option data-foo="Sub-Module 1">Sub-Module 1</option>
							  	<option data-foo="Sub-Module 2">Sub-Module 2</option>
							  	<option data-foo="Sub-Module 3">Sub-Module 3</option>
							  	<option data-foo="Sub-Module 4">Sub-Module 4</option>
							  	<option data-foo="Sub-Module 5">Sub-Module 5</option>
								</select>
						    </div>-->

<!--						    <div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;" id="title">Sub-Module Title</span>
						      <input id="title" type="text" class="form-control" name="title" required="" maxlength="255" style="width: 100%;">
						    </div>-->

						    <div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;">Syllabus Upload (.pdf)</span>
						      <center><input id="fileToUpload" type="file" class="form-control" name="fileToUpload[]" accept=".pdf" onchange="myFunction(this)" multiple="multiple" style="width: 100%;"></center>
						    </div>
						    
					      <br><p id="demo"></p>
					      <script>

					      	
					      	function PreviewImage() {
				                pdffile=document.getElementById("fileToUpload").files[0];
				                pdffile_url=URL.createObjectURL(pdffile);
				                $('#viewer').attr('src',pdffile_url);
				            }

							function myFunction(){

							    var x = document.getElementById("fileToUpload");
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
					      </div>
            </div>
            <div class="modal-footer">
                {{Form::submit('Save', array('class' => 'btn btn-primary'))}}
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>

<script type="text/javascript">
		/// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}
	</script>
    <!-- templatemo 393 fantasy -->
    <!--<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>-->
	
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