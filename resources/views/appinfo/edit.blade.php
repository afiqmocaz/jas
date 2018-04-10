@extends($master)
@section('js')
@endsection
@section('content') 

				{!! Form::model($user, ['route' =>['appinfo.update', $applicant->id], 'method' => 'PUT', 'files' => true]) !!}
				
    			<h1>Applicant Registration Form<br></h1>

				<div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary" style="border-color:#4CAF50;">
				      <div class="panel-heading" style="background-color:#4CAF50;" >
				        <h4 class="panel-title" style="color:white;">
				          <a data-toggle="collapse" href="#collapse1">Applicant Registration Form Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  In this form, Secretariat APCS can view the selected applicant personal information that had been filled by applicant.<br>
						•  Secretariat APCS can approve and decline the applicant personal information.<br>
						•  Secretariat APCS can comment the applicant personal information.<br>
						•  After Secretariat click "Approve" button, the information will be automatically send in the email and the applicant can proceed to the next step.
				        </div>
				      </div>
				    </div>
				  </div>
				  <script>
				  $(document).ready(function(){
				    $('[data-toggle="popover"]').popover();   
				  });
				  </script>

				<br> 

    			<br>
                        <div class="alert alert-success">
                        <iframe src="/apcsapp/{{$user->id}}/edit" id="print" width="100%" height="1000" scrolling="yes" >
                            <p>Your browser does not support iframes.</p>
			</iframe>
                      
                            <input type=button name=print value="Print" class="btn btn-success " style="width:150px;" onClick="printExternal('/app/{{$user->id}}/edit')">
                            <button type="button" class="btn btn-default" onclick="window.history.back();" style="width:150px;">Back</button>
                       
                        </div>
                        
                        <table class="table table-bordered">
                             <tr>
                                 <td class="alert-success">
                             <center><h4><b> ACTION </b></h4></center>
                                </td>
                               
                            </tr>
                            <tr>
                               
                                 <td>
                                    comment :
                                    {{ Form::textarea('comment', $applicant->comment, ['class' => 'form-control', 'rows' => '5', 'cols' => '60', 'placeholder'=>'comment']) }}
                                    
                                    <br>
                                   <b>
                                    {{Form::radio('status', 'Approved')}}
                                    Approve
                                    &nbsp;  &nbsp;  &nbsp;  
                                     {{Form::radio('status', 'Declined')}}
                                      Decline
                                    <br>
                                    <div style="margin-left: 15%" id='reason' class="hide">
                                   Reason decline for Applicant <br>
                                   </b>
                                      {{Form::checkbox('reason1', 'Maklumat pemohon tidak lengkap')}} Maklumat pemohon tidak lengkap<br>
                                      {{Form::checkbox('reason2', 'Academic qualification tidak layak')}} Academic qualification tidak layak<br>
                                      {{Form::checkbox('reason3', 'Practical experience tidak relevan')}} Practical experience tidak relevan<br>
                                      </div>
                                    
                                    <br>
                                    <center><button class="btn btn-success" type="submit" style="width:150px;">SUBMIT</button></center>
                                </td>
                            </tr>
                        </table>

					{!! form::close() !!}
				  
				</div>
				</div>
				</div>



				                
			</div> <!-- thumbnail area -->  
		
		<footer>
			<div class="credit row">
				<center><div class="col-md-6 col-md-offset-3">
					<div id="templatemo_footer">
						Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
					</div>
				</div>
						
			</div>
		</footer>
	</div>

    <script type="text/javascript">
    	var box = document.getElementById("box");
    var approve = document.getElementById("approve");
    var decline = document.getElementById("decline");

    approve.onclick = function(){
        box.value = "Approved";
    }

    decline.onclick = function(){
        box.value = "Declined";
    }
    </script>
    <script type="text/javascript">
    	function printExternal(url) {
    var printWindow = window.open( url, 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');
    printWindow.addEventListener('load', function(){
        printWindow.print();
        printWindow.close();
    }, true);
}


$(document).ready(function() {
    $('input[type=radio][name=status]').change(function() {
        
        var status = this.value;
        if(status === 'Approved'){
            $('#reason').addClass('hide');
        }
        if(status === 'Declined'){
              $('#reason').removeClass('hide');
        }
       
    });
});
    </script>

@endsection