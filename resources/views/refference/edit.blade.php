@extends($master)
@section('header', 'APCS: Reference')
@section('content')

<h1 style="margin: 0px;font-size: 24px;">Upload Material&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  In this form, Secretariat APCS can upload .pdf file of Refference.<br>
						&bull;  Secretariat APCS can click the button "Upload" to upload the file into the applicant login application to download by applicant.<br>
						&bull;  The upload file must below than 10MB and format of .pdf file.'
        data-html="true" data-placement="right" data-original-title="Upload Material Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>
				
    			<!-- <h1>Reference<br></h1>     
    			<h2>Upload Material<br></h2>  -->

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
				        •  In this form, Secretariat APCS can upload .pdf file of Refference.<br>
						•  Secretariat APCS can click the button "Upload" to upload the file into the applicant login application to download by applicant.<br>
						•  The upload file must below than 10MB and format of .pdf file.
					  </div>
				        </div>
				      </div> -->
                      <br>
                      {!! Form::model($refference, ['route' =>['refference.update', $refference->id], 'method' => 'PUT', 'files' => true]) !!}

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
						      <span class="input-group-addon" style="width: 20%;text-align: left;">Reference Upload (.pdf)</span>
						      <center><input id="original_filename" type="file" class="form-control" name="original_filename" accept=".pdf" onchange="myFunction(this)" multiple="multiple" style="width: 100%;"></center>
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
					      <label><center><b>File Type: .pdf	|	Max File Upload: 10	|	Max Size Upload: 10MB</b></center></label><br><br>
						        
					    <!-- </div> -->

					    
					     <!-- <center>
					     <table width="40%">
					     <tr>
					     <th width="50%">
					     <center>{{ Form::submit('Save', ['class' => 'btn btn-primary btn-block', 'style' => 'width:150px;']) }}</center></th>

					     <th>
					      <center>{!! Html::linkRoute('refference.show', 'Cancel', array($refference->id), array('class' => 'btn btn-danger btn-block', 'style' => 'width:150px')) !!}</center>
					      </th>
					      </tr>
					      </table></center> <br>-->

					      <div align="right">
					    	{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
					    	{!! Html::linkRoute('refference.show', 'Cancel', array($refference->id), array('class' => 'btn btn-primary')) !!}
					    </div>

					  {!! Form::close() !!}
				    <!-- </div> -->

				  </div>
				 
				  <script>
				  $(document).ready(function(){
				    $('[data-toggle="popover"]').popover();   
				  });
				  </script>
				  <br>  
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