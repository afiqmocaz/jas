@extends($master)
@section('header', $category.': Report -> Certificate')
@section('content')
<style>
    .custom {
    width: 78px !important;
}
</style>

<h1 style="margin: 0px;font-size: 24px">Certificate Approval&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  The purpose of this page is to approve the certificate according to the applicant status and marks.<br>  
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can view the marks and status of applicant procedure with clicking the button "View".<br>
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can fill the specialized area of the assignment at the text field of Specialized Area.<br>
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can endorse the certificate with select approve or reject at the field of Endorsement.<br>
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can give remarks or commend about the status and marks of the applicant procedure at the text area of Remarks(Comment)<br>
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can certified or not certified the certification at the field of Status<br>
                    &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can click the button "Save" to save the progress that have been made.'
        data-html="true" data-placement="right" data-original-title="Certificate Approval Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>


<!-- <div class="container"> -->
    <!-- <h1><font style="text-transform: uppercase">{{$category}}</font> - Certification<br></h1>
    <h2>Certificate Approval<br></h2> -->
    
    <br>
    
    <button class="btn btn-primary" onclick='location.href="/cert_renewal/{{$category}}/applied"'>@if($countApplied >0)<span class="label label-danger">{{$countApplied}}</span> @endif Renewal Certificate</button>
    <button class="btn btn-primary" onclick='location.href="/cert_renewal/{{$category}}/payment_submitted"'>@if($countSp >0)<span class="label label-danger">{{$countSp}}</span>@endif Payment Paid</button>

    <br><br>

    <!-- <table class="table table-bordered">
        <tr>
            <td>
                
            </td>
        </tr>
    </table> -->

    <!-- <div style="width: 100%;" class="panel-group" >
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
    </div> 
    				<div >-->
				<table class="table table-bordered" id="myTable" >
                                    <thead class="alert-info">
				        <th style="width:1 %;"><center>No.</center></th>
				        <th style="width:8%;"><center>Applicant Name</center></th>
				        <th style="width:8%;"><center>NRIC/Passport</center></th>
				        <th style="width:8%;"><center>Title</center></th>
				        <!-- <th style="width:40%;"><center>Specialized Area</center></th> -->
				        <th style="width:8%;"><center>Certification Status</center></th>
                                        <th style="width:8%;"><center>Endorsement</center></th>
                                        <th style="width:8%;"><center>Expiry Date</center></th>
				        <th style="width:8%;"><center>Remark</center></th>
				        <th style="width:8%;"><center>Certified By</center></th>
                                        <th style="width:8%;"><center>Action</center></th>
				      </thead>
				    <tbody>
				    </tbody>
				  </table>

				</div>
<!-- </div> -->

 <!-- modal set status -->
   {!!Form::open(['role'=>'form', 'route'=>'certificateApproval']) !!}
   <input type="hidden" name="id" id="id">
   
    <div class="modal modal-default fade" id="modalApproval" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!--  Form -->
       

              <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Certificate Approval</h4>
              </div>
              <div class="modal-body">
                  
                  <div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary" style="border-color:#4CAF50;">
				      <div class="panel-heading" style="background-color:#4CAF50;" >
				        <h4 class="panel-title" style="color:white;">
				          <a data-toggle="collapse" href="#collapse2">Certificate Approval Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse2" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  The purpose of this page is to approve the certificate according to the applicant status and marks.<br>  
						•  Secretariat EIA can view the marks and status of applicant procedure with clicking the button "View".<br>
						•  Secretariat EIA can fill the specialized area of the assignment at the text field of Specialized Area.<br>
						•  Secretariat EIA can endorse the certificate with select approve or reject at the field of Endorsement.<br>
						•  Secretariat EIA can give remarks or commend about the status and marks of the applicant procedure at the text area of Remarks(Comment)<br>
						•  Secretariat EIA can certified or not certified the certification at the field of Status<br>
						•  Secretariat EIA can click the button "Save" to save the progress that have been made.
				        </div>
				      </div>
				    </div>
				  </div>
                  
                  <table class="table table-bordered">
                          <tr>
                             <td  class="alert-info">
                                 Endorsement
                            </td>
                            
                            <td>
                                <select  class="form-control" id="endorse" name="endorse" required>
                                    <option value="approve">Approve</option>
                                    <option value="reject">Reject</option>
                                </select>
                            </td>    
                          </tr>
                          <tr>
                             <td  class="alert-info">
                                 Expired Date
                            </td>
                            
                            <td>
                                <input   class="form-control" class="form-control" type="date" id="expired" name="expired" value="{{$expiredDate}}" required>
                            </td>    
                          </tr>
                           <tr>
                             <td  class="alert-info">
                                 Remark
                            </td>
                            
                            <td>
                                <textarea class="form-control" rows="4" cols="15" name="remark" id="remark" required></textarea>
                            </td>    
                          </tr>
                            <tr>
                          <td  class="alert-info">
                                 Status
                            </td>
                            
                            <td>
                                <select  class="form-control" id="status" name="status" id="status" required>
                                    <option value="certified">Certified</option>
                                    <option value="not_certified">Not Certified</option>
                                </select>
                            </td>      
                          </tr>
                          
                         
                  </table>
                    
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary ">Submit</button>
              </div>
          
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
   {!!Form::close() !!}

    <!-- /.modal -->
<script>

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
                category : '{{$category}}'
            }
        },
        columns: [
            {
                render: function (data, type, row, meta) {
                    if (type === 'display') {
                        return (meta.row + 1);
                    }
                    return meta.row+1;
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

                    return getTitle(row);
                }, width: "10%"
                , orderable: false
            },
            // {
            //     render: function (data, type, row, meta) {

            //         return getSpecializedArea(row);
            //     }, width: "40%"
            //     , orderable: false
            // },
            {
                render: function (data, type, row, meta) {

                    var classLabel = 'default';
                    var generateCertificate = '';
                    
                    var text = "-";
                          if(row.status === 'certified'){ 
                        generateCertificate = '<br><a target="_blank" href="/cert_generate/'+row.id+'">Generate Certificate</a>';      
                        text ="Certified"; classLabel = 'success';}
                     else if(row.status === 'not_certified'){ text ="Not Certified"; classLabel = 'danger';}
                    
                     return '<center><span class="label label-'+classLabel+'">'+text+'</span>'+generateCertificate+'</center>';
                }, width: "10%"
                , orderable: false
            },
             {
                render: function (data, type, row, meta) {

                    var classLabel = 'default';
                    var text = "-";
                          if(row.endorse === 'approve'){ text ="Approved"; classLabel = 'success';}
                     else if(row.endorse === 'reject'){ text ="Rejected"; classLabel = 'danger';}
                    
                     return '<center><span class="label label-'+classLabel+'">'+text+'</span></center>';   
                }, width: "10%"
                , orderable: false
            },
             {
                render: function (data, type, row, meta) {

                    return row.expired;   
                }, width: "10%"
                , orderable: false
            },
             {
                render: function (data, type, row, meta) {

                    return row.remark;   
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                    
                    if(jQuery.isEmptyObject(row.status_by)){
                        return "-";
                    }else{
                       return row.status_by.name;
                    }
                    
                    
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                    
                    var btnView = '<button type="button" class="btn btn-primary "   >View</button>&nbsp';
                    var btnEdit = '<button type="button" class="btn btn-primary " onclick="modalApproval('+ row.id + ', \'' + row.endorse + '\' , \'' + row.expired + ' \', \'' + row.remark + '\', \'' + row.status + '\')"  >Edit</button>&nbsp';
                    
                    if(row.status === 'certified'){
                        // btnEdit = "";
                    }
                    
                    return '<div style="white-space: nowrap;">' + btnEdit  + '</div>';
                  
                }, width: "10%"
                , orderable: false
            }
        ]

    });
    
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
