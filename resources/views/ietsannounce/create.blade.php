@extends($master)
@section('header', 'IETS: Announcement')
@section('content')
				
<h1 style="margin: 0px;font-size: 24px;">Announcement Upload (New)&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  Secretariat IETS can enter announcement in the text area and click button "Submit".<br>&bull;  The announcement entered by Secretariat IETS will be shown in the announcement box at the Home Page.'
        data-html="true" data-placement="right" data-original-title="Announcement Upload Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>


    			<!-- <h1>Announcement Upload <br></h1> 

				<div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary" style="border-color:#4CAF50;">
				      <div class="panel-heading" style="background-color:#4CAF50;" >
				        <h4 class="panel-title" style="color:white;">
				          <a data-toggle="collapse" href="#collapse1">Announcement Upload Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  Secretariat IETS can enter announcement in the text area and click button "Submit".<br>
						•  The announcement entered by Secretariat IETS will be shown in the announcement box at the Home Page.
				        </div>
				      </div>
				    </div>
				  </div> -->
				  <script>
				  $(document).ready(function(){
				    $('[data-toggle="popover"]').popover();   
				  });
				  </script>

				<br> 

					    <!-- {!! Form::open(array('route' => 'ietsannounce.store', 'data-parsley-validate' => '','files' => true)) !!} -->

					    {!! Form::open(array('url'=>'ietsannounce/uploadFiles', 'data-parsley-validate' => '', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'files'=>true)) !!}
					    <div class="form-group">

							<div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;" id="subject">Subject</span>
						      <input id="subject" type="text" class="form-control" name="subject" required="" maxlength="255" style="width: 100%;">
						    </div><br>

						    <div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;" id="announcement">Announcement</span>
						      <textarea id="announcement" class="form-control" name="announcement" required="" style="width: 100%;" rows="4" cols="50"></textarea>
						    </div><br>
					    
					    	<div class="input-group" style="width: 100%;">
						      <span class="input-group-addon" style="width: 20%;text-align: left;">Upload File (If Needed)</span>
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
    <div align="right">
        <form action="show" method="get">
            <a href="show" class="btn btn-primary" role="button">Back To Announcement</a>
            <input type="submit" class="btn btn-primary" value="Save"/>
        </form>
    </div>
						<div id="message"></div>
					    </div>
					{!! Form::close() !!}
					<br>
					<script src="js/parsley.min.js"></script>      
				 <script type="text/javascript">
  				$('#form').parsley();
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