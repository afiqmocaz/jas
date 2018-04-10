@extends($master)
@section('header', 'APCS: Syllabus')
@section('content')

<h1 style="margin: 0px;font-size: 24px;">Upload Material&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  In this form, Secretariat APCS can upload .pdf file of Syllibus.<br>
						&bull;  Secretariat APCS can click the button "Upload" to upload the file into the applicant login application to download by applicant.<br>
						&bull;  The upload file must below than 10MB and format of .pdf file.'
        data-html="true" data-placement="right" data-original-title="Upload Material Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>
				
    			<!-- <h1>Syllabus<br></h1>     
    			<h2>Upload Material<br></h2> --> 

    			<!-- INSTRUCTION -->
				  <!-- <div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary" style="border-color:#4CAF50;">
				      <div class="panel-heading" style="background-color:#4CAF50;" >
				        <h4 class="panel-title" style="color:white;">
				          <a data-toggle="collapse" href="#collapse1">Upload Material Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  In this form, Secretariat APCS can upload .pdf file of Syllibus.<br>
						•  Secretariat APCS can click the button "Upload" to upload the file into the applicant login application to download by applicant.<br>
						•  The upload file must below than 10MB and format of .pdf file.
					  </div>
				        </div>
				      </div> -->
                                      
                           <br>               
                        <!-- <div class="container">
                             <button id="myBtn"  class="btn btn-success" >Add New Syllabus</button>
                        </div> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Syllabus</button>
                                      <br><br>
			
                               
				<table class="table table-bordered" id="list" align="center">
				    <thead valign="top" class="alert-info">
				      <tr>
				        <th onclick="sortTable(0)">No.</th>
				        <th onclick="sortTable(1)">Title Name</th>
				        <th onclick="sortTable(2)">Upload Material</th>
				        <th onclick="sortTable(3)">Date Upload</th>
				        <th colspan="3" onclick="sortTable(4)"><center>Action</center></th>
				      </tr></thead>
				    <tbody>
                                    <div class="hide">{{$count = 1}}</div>
				    @foreach($syllabi as $syllabus)
				      <tr>
				        <td>{{$count++}}</td>
				        <td>{{$syllabus->title}}</td>
				        <td><a class="file" href="/uploads/{{$syllabus->original_filename}}">{{$syllabus->original_filename}}</a></td>
				        <td>{{ date('d F Y', strtotime($syllabus->created_at)) }}</td>
				     
				        	<td><center><a href="{{ route('syllabus.edit', $syllabus->id) }}" >
                                                 {!! Form::image('images/edit.png', 'a Delete', ['type' => 'submit',  'class' => 'btnimg', 'title' => 'Delete'] ) !!}
				        	<td>{!! Form::open(['route' => ['syllabus.destroy', $syllabus->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

				        	{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit',  'class' => 'btnimg', 'title' => 'Delete'] ) !!}

				        	{!! Form::close() !!}
							</td>
				      </tr>
				      @endforeach
				    </tbody>
				  </table>          
				    </div>
				  </div>
				  <script>
				  $(document).ready(function(){
				    $('[data-toggle="popover"]').popover();   
				  });
				  </script>
				  <br>    
	

    		<div id="myModal" class="modal fade" role="dialog">
    			<div class="modal-dialog">
				  <!-- Modal content -->
				  <div class="modal-content">
				    <div class="modal-header">
				      <!-- <span class="close">&times;</span>
				      <h2>Add New Syllabus</h2> -->
				      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Add New Syllabus</h4>
				    </div>
				    <div class="modal-body">
				      {!! Form::open(array('url'=>'syllabus/uploadFiles', 'data-parsley-validate' => '', 'method'=>'POST', 'files'=>true)) !!}
					    
				      	<br>
					      	<div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;" id="title">Title</span>
						      <input id="title" type="text" class="form-control" name="title" required="" maxlength="255" style="width: 100%;">
						    </div><br>
						    
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
					      <label><center><b>File Type: .pdf	|	Max File Upload: 10	|	Max Size Upload: 10MB</b></center></label><br>
						        <br>
					      
				    </div>
				
				     <!--  <form action="syllabus.show" method="get">
					    <input type="submit" class="btn btn-success" style="background-color: green " value="Save"/></form> -->

					  <div class="modal-footer">
                            {{Form::submit('Save', array('class' => 'btn btn-primary'))}}
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                     </div>
					    
					  {!! Form::close() !!}
				 
				  </div>
				</div>
			</div>
                      


    <script>

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

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }

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
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection
