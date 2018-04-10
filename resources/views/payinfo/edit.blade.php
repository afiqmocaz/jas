@extends($master)
@section('js')
@endsection
@section('header', $category.': Payment')
@section('content') 

				
    			<!-- <h1>Payment Information <br></h1> --> 
    			<h1 style="margin: 0px;font-size: 24px;">Payment Information&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='•  Welcome to Jabatan Alam Sekitar'
        data-html="true" data-placement="right" data-original-title="Payment Information Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

        <br> 

				<!-- INSTRUCTION -->
				  <!-- <div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary" style="border-color:#4CAF50;">
				      <div class="panel-heading" style="background-color:#4CAF50;" >
				        <h4 class="panel-title" style="color:white;">
				          <a data-toggle="collapse" href="#collapse1">Payment Information Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  Welcome to Jabatan Alam Sekitar
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

				<div class="table-responsive">
				<table class="table table-bordered">
				    <thead valign="top">
				      <tr>
                        <th class="alert-info">Applicant Name</th>
				        <th class="alert-info">NRIC/Passport</th>
				        <th class="alert-info"><center>Amount</center></th>
				        <th class="alert-info"><center>Payment Transaction Date</center></th>
				        <th class="alert-info"><center>Receipt No.</center></th>
				        <th class="alert-info"><center>Payment Receipt</center></th>
				        <th class="alert-info" width="20%"><center>Action</center></th>
				      </tr>
				      </thead>
				    {!! Form::model($array, ['route' =>['payinfo.update', $payinfo->payment_id], 'method' => 'PUT', 'files' => true]) !!}
				    <tbody>
				      <tr>
				        <td>{{ Form::text('name', null, ['readonly' => 'readonly', 'style' => 'border:0; width:100%;']) }}</td>
				        <td>{{ Form::text('nric', null, ['readonly' => 'readonly', 'style' => 'border:0; width:100%;']) }}</td>
				        <td><center>{{ Form::text('amount', null, ['readonly' => 'readonly', 'style' => 'border:0; width:100%;']) }}</center></td>
				        <td><center>{{ date('d-m-Y', strtotime($payinfo->date))}}</center></td>
				        <td><center>{{ Form::text('referenceNo', null, ['readonly' => 'readonly', 'style' => 'border:0; width:100%;']) }}</center></td>
				        
				        <div>
					        @if(! empty($payinfo->slip))
					        <td><center><div class="attachment-replace" style="display:none;">

					        {{ Form::file('slip', null, array('class' => 'form-control' )) }}

					        </div>
					        <a class="current-attachment" src="/backend/uploads/{{$payinfo->slip}}" href="/backend/uploads/{{$payinfo->slip}}" target="_blank" width="100px" height="150px">{{$payinfo->slip}}</a></center></td>
					        @endif
					    </div>
                                 {!!form::close()!!}
				        <td>
                                            <div class="row">
                                                <div class="col-sm-6" >
                                                    {!! Form::model($array, ['route' =>['payinfo.update', $payinfo->payment_id], 'method' => 'PUT', 'files' => true]) !!}
                                                     {{ Form::submit('Approved', ['status' => 'approved','id' => 'approve', 'class' => 'btn btn-primary']) }}
                                                     <input type="hidden" name="status" value="Approved" id="box">   
                                                     {!!form::close()!!}
                                                </div>
                                                <div class="col-sm-6">
                                                 <button  type="button" class="btn  btn-danger" data-toggle="modal" data-target="#setStatus"  >Decline</button> 
                                                 

                                                     <!-- modal set status -->
                    <div class="modal modal-default fade" id="setStatus" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                         <!--  Form -->
                          {!! Form::model($array, ['route' =>['payinfo.update', $payinfo->payment_id], 'method' => 'PUT', 'files' => true]) !!}

                              <div class="modal-header btn-info">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Decline Payment</h4>
                              </div>
                              <div class="modal-body">

                                    <div class="form-group">
                                        
                                      {!! Form::label('Reason', 'Remark', ['class' => 'control-label'])!!}
                                      <input type="text" name="remark" class="form-control" required>
                                      <input type="hidden" name="status" value="Declined" class="form-control">
                                    </div>
                                    <div class="form-group help-block">

                                        <b>Note: Fields marked with * are compulsary.</b>

                                    </div>  
                              </div>
                              <div class="modal-footer">
                               <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary ">Submit</button>
                              </div>
                          {!!Form::close() !!}

                        </div>
        <!-- /.modal-content -->
                                                    
                                                    
<!--                                                    {!! Form::model($array, ['route' =>['payinfo.update', $payinfo->payment_id], 'method' => 'PUT', 'files' => true]) !!}
                                                        {{ Form::submit('Declined', ['status' => 'declined','id' => 'decline','class' => 'btn btn-danger']) }}
                                                        <input type="hidden" name="status" value="Declined" id="box">   
                                                        {!!form::close()!!}-->
                                                </div>

                                            </div>
                                        
                                        </td>
				      </tr>
				    </tbody>
				  </table>  
				</div>
<br>
				  <div align="right">
			        <!-- <form action="show" method="get"> -->
			            <a href="/paymentview/{{$category}}" class="btn btn-primary" role="button">Back To Payment</a>
			            <!-- <input type="submit" class="btn btn-primary" value="Save"/> -->
			        <!-- </form> -->
				  </div>
				  
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>				
@endsection