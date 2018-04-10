@extends($master)
@section('content')
@section('header', $category.': Applicant')

<h1 style="margin: 0px;font-size: 24px">Pre-Qualification Registration of Applicant Information&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  Secretariat {{strtoupper($category)}} can click the applicant name to view the applicant registeration form from section A to Section F.<br>  
                &bull; Secretariat can approve or reject the applicant registeration if the the applicant not fill the form following the criteria.<br>
                &bull; Secretariat {{strtoupper($category)}} can view the comment that have been given at the applicant registeration form.'
        data-html="true" data-placement="right" data-original-title="Pre-Qualification Registration of Applicant Information Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

        <br>

{!! Form::open(array('route' => 'eiaapplicant.store', 'data-parsley-validate' => '')) !!}
<!-- <h1>Pre-Qualification Registration of Applicant Information<br></h1>

<div style="width: 100%;" class="panel-group" >
    <div class="panel panel-primary" style="border-color:#4CAF50;">
        <div class="panel-heading" style="background-color:#4CAF50;" >
            <h4 class="panel-title" style="color:white;">
                <a data-toggle="collapse" href="#collapse1">Pre-Qualification Registration of Applicant Information Instruction :</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">
                •  Secretariat {{$category}} can click the applicant name to view the applicant registeration form from section A to Section F.<br>  
                •  Secretariat can approve or reject the applicant registeration if the the applicant not fill the form following the criteria.<br>
                •  Secretariat {{$category}} can view the comment that have been given at the applicant registeration form.
            </div>
        </div>
    </div>
</div> -->

   <div id="message"></div>
   <div class="box-body table-responsive">
        <table class="table table-bordered" id="myTable" >
            <thead class="alert-info" >
            <th  style="width:1%;"><center>No.</center></th>
            <th  style="width:10%;"><center>Applicant Name</center></th>
            <th style="width:5%;"><center>NRIC/Passport</center></th>
            <th style="width:5%;"><center>Comment</center></th>
            <th style="width:5%;"><center>Status</center></th>
            </thead>
        </table>
   </div>

</div>
<script>
    $(document).ready(function () {
        
    });
    
    
     $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        ajax: {
            type: "POST",
            url: '/applicant/find',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                category : '{{$category}}',
            }
        },
        columns: [
            {
                render: function (data, type, row, meta) {
                    if (type === 'display') {
                        return (meta.row + 1);
                    }
                    return meta.row + 1;
                },
                width: "1%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {
                    //openGlobalProfile($id)
                    return  '<a href="/{{$link}}appinfo/'+row.id+'/edit">'+row.user.name+'</a>';
                    //return  '<button class="btn btn-default" onclick="openGlobalProfile('+row.user.id+')" >'+row.user.name+'</button>';;
                }, width: "10%"
                , orderable: true
            },
           {
                render: function (data, type, row, meta) {

                    return row.user.nric;
                }, width: "10%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {

                    return row.comment;
                }, width: "10%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {
                    
                    var labelClass = 'default';
                    if(row.status ==='Approved'){
                        labelClass = 'success';
                    }else if(row.status ==='Declined'){
                        labelClass = 'danger';
                    }
                    
                    return '<center><span class="label label-'+labelClass+'">'+row.status+'</span></center>';
                }, width: "10%"
                , orderable: true
            },
           
        ]

    });
</script>
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection