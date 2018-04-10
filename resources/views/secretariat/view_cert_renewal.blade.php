@extends($master)
@section('header', $category.': Report -> Certificate')
@section('content')
<style>
    .custom {
    width: 78px !important;
}
</style>

<h1 style="margin: 0px;font-size: 24px">{{$title}}&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  The purpose of this page is to approve the certificate according to the applicant status and marks.<br>  
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can view the marks and status of applicant procedure with clicking the button "View".<br>
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can fill the specialized area of the assignment at the text field of Specialized Area.<br>
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can endorse the certificate with select approve or reject at the field of Endorsement.<br>
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can give remarks or commend about the status and marks of the applicant procedure at the text area of Remarks(Comment)<br>
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can certified or not certified the certification at the field of Status<br>
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can click the button "Save" to save the progress that have been made.'
        data-html="true" data-placement="right" data-original-title="Certificate Approval Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

<br>

<!-- <div class="container"> -->
    <!-- <h1><font style="text-transform: uppercase">{{$category}}</font> - Certification<br></h1>
    <h2>{{$title}}<br></h2>

    <div style="width: 100%;" class="panel-group" >
        <div class="panel panel-primary" style="border-color:#4CAF50;">
            <div class="panel-heading" style="background-color:#4CAF50;" >
                <h4 class="panel-title" style="color:white;">
                    <a data-toggle="collapse" href="#collapse1">Certificate Approval Instruction :</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    •  The purpose of this page is to approve the certificate according to the applicant status and marks.<br>  
                    •  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can view the marks and status of applicant procedure with clicking the button "View".<br>
                    •  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can fill the specialized area of the assignment at the text field of Specialized Area.<br>
                    •  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can endorse the certificate with select approve or reject at the field of Endorsement.<br>
                    •  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can give remarks or commend about the status and marks of the applicant procedure at the text area of Remarks(Comment)<br>
                    •  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can certified or not certified the certification at the field of Status<br>
                    •  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can click the button "Save" to save the progress that have been made.
                </div>
            </div>
        </div>
    </div> -->
    				<div class="table-responsive">
				<table class="table table-bordered" id="myTable" >
                                    <thead class="alert-info">
				        <th style="width:1 %;"><center>No.</center></th>
				        <th style="width:8%;"><center>Applicant Name</center></th>
				        <th style="width:8%;"><center>NRIC/Passport</center></th>
				        <th style="width:40%;"><center>Specialized Area</center></th>
                                        <th style="width:8%;"><center>Expiry Date</center></th>
				        <th style="width:8%;"><center>Renewal Status</center></th>
                                        <th style="width:8%;"><center>Action</center></th>
				      </thead>
				    <tbody>
				    </tbody>
				  </table>

				</div>
<!-- </div> -->

    <!-- modal set status -->
    <div class="modal modal-default fade" id="setStatus" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!--  Form -->
         {!!Form::open(['role'=>'form', 'route'=>'certificateStatus']) !!}
              <input type='hidden' name='id' id='id'>
              <input type='hidden' name='page_renewal_status' value='{{$renewal_status}}'>
              <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Set Status</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">

                      {!! Form::label('panel', 'Select Status *', ['class' => 'control-label'])!!}

                      {!! Form::select('renewal_status',$listActionStatus, null, array('class'=>'form-control','required','style'=>'width:100%','placeholder' => 'Select status','id'=>'status')) !!}
                      @if($renewal_status === 'payment_submitted')
                      <div id="expired" class="hide">
                      <br>
                      <b>Expiry Date *</b> 
                      <br> 
                      <input type='date' name='expired'  class='form-control' value='{{$expiredDate}}' required>
                      </div>
                      @endif
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
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
    <div align="right">
         <button class="btn btn-primary" onclick="location.href='/cert/{{$category}}'">Back</button>
    </div>
   
<script>
    
        $('#status').on('change', function() {
              var status = $("#status").val();
              
              if(status === 'granted'){
                  $("#expired").removeClass("hide");
              }else{
                    $("#expired").addClass("hide");
              }
                
         });

       $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        ajax: {
            type: "POST",
            url: '/cert_find',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                category : '{{$category}}',
                renewal_status : '{{$renewal_status}}'
            }
        },
        columns: [
            {
                render: function (data, type, row, meta) {
                    if (type === 'display') {
                        return (meta.row + 1);
                    }
                    return row.id;
                },
                width: "1%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {

                    return  '<button class="btn btn-default" onclick="openGlobalProfile('+row.user.id+')" >'+row.user.name+'</button>';;
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {

                    return row.user.nric;
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {

                    return getSpecializedArea(row);
                }, width: "40%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                    var date = new Date(row.expired);
                    return date.toString('dd-MM-yy');
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {

                    var paymentInfo = '';
                    
                    if(row.renewal_status === "payment_submitted"){
                        paymentInfo = '<br><a target="blank" href="/paymentview/'+row.id+'">Payment Info</a>';
                    }
                    
                    return row.renewal_status+paymentInfo;
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                      return '<center><button type="button" class="btn  btn-info" data-tooltip="true" data-placement="bottom" title="Set Status"  data-toggle="modal" onclick="set('+row.id+')" >SET STATUS</button></center>';
                  
                }, width: "10%"
                , orderable: false
            }
        ]

    });
    
    function set(id){
        $("#id").val(id);
        $('#setStatus').modal("toggle");
        
    }
    
    function modalApproval(id,endorse,expired,remark,status){
        $('#modalApproval').modal('toggle');
        $('#id').val(id);
        $('#endorse').val(endorse);
        //$('#expired').val(expired);
        $('#remark').val(remark);
        $('#status').val(status);
    }
    
    var category = '{{$category}}';
    
    function getTitle(data){
           
            var title = '-';
            if(category === 'eia'){
                title = data.user.cert_eia_section_a.title;
            }
            else if(category === 'iets'){
                title = data.user.cert_iets_section_a.title;
            }
            else if(category === 'apcs'){
                title = data.user.cert_apcs_section_a.title;
            }
        
            return title;
    };
    
    function getSpecializedArea(data){
            var res = "";
         
            if(category === 'eia'){
               
                data.user.cert_eia_section_e.forEach(function(val){
                    res = res + "&bull; "+val.first_specialize+"<br><br>";
                    res = res + "&bull; "+val.second_specialize+"<br>";
                })
              
                
            }
            else if(category === 'iets'){
                res = data.user.cert_iets_section_e;
            }
            else if(category === 'apcs'){
                res = data.user.cert_apcs_section_e;
            }
        
            return res;
    };
    
</script>
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection
