@extends($master)
@section('js')
@endsection
@section('header', $category.': Comprehensive Exam')
@section('content') 
<style>
    .custom {
    width: 78px !important;
}
</style>
<!-- <h1><font style="text-transform: uppercase">{{$category}}</font> - Comprehensive Examination<br></h1>
<h2>Exam Attendant List<br></h2>  -->

<h1 style="margin: 0px;font-size: 24px">Exam Attendant List&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  In this form, the name of applicant that qualified to take comprehensive examination will be appear in this form.<br>
                &bull;  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can select the applicant attendant to take the attendant of applicant which is attend or absent.<br> 
                &bull;  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can select the Status to give the marks status of applicant which is pass,fail or acknowledge if the applicant is absent the examination.<br>
                &bull;  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can click button "Save" to save the applicant exam information that has been changes.'
        data-html="true" data-placement="right" data-original-title="Exam Attendant List Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

<!-- <div style="width: 100%;" class="panel-group" >
    <div class="panel panel-primary" style="border-color:#4CAF50;">
        <div class="panel-heading" style="background-color:#4CAF50;" >
            <h4 class="panel-title" style="color:white;">
                <a data-toggle="collapse" href="#collapse1">Exam Attendant List Instruction :</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">
                •  In this form, the name of applicant that qualified to take comprehensive examination will be appear in this form.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can select the applicant attendant to take the attendant of applicant which is attend or absent.<br> 
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can select the Status to give the marks status of applicant which is pass,fail or acknowledge if the applicant is absent the examination.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can click button "Save" to save the applicant exam information that has been changes.
            </div>
        </div>
    </div> 
    
    
</div>-->

<br><b>Exam Title : </b>{{$schedule->examtitle->examtitle }}
    <br><b>Exam Venue : </b>{{$schedule->venue->venue }}
     <br><b>Exam Address : </b>{{$schedule->address}} , {{$schedule->state}}
    <br><b>Exam Time : </b>{{$schedule->date }}  &nbsp; &nbsp;{{$schedule->start }}  to  {{$schedule->end }}

    <br><br>

<div class="table-responsive">
    <table id="myTable" class="table table-bordered">

        <thead valign="top" class="alert-info">


        <th width='1%'>No.</th>
        <th width='30%'>Applicant Name</th>
        <th width='15%'>NRIC/Passport</th>
<!--				        <th>Seat</th>-->
        <th width='10%'>Mark</th>
        <th width='10%'>Status</th>
        <th><center>Action</center></th>

        </thead>
    </table>  
</div>
<br>

<div align="right">
    <button class="btn btn-primary" onclick='location.href = "/schedule/{{$category}}"'>Back</button>
</div>

<form id="form" action="/schedule_attendant_set_status" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type='hidden' id="id" name='id' >
    <input type='hidden' id="status" name='status' >
</form>
<script>


    $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        ajax: {
            type: "POST",
            url: '/schedule_attendant_find',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                schedule_id:'{{$schedule->id}}',
                category: '{{$category}}'
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
                    
                     return  '<button class="btn btn-default" onclick="openGlobalProfile('+row.user.id+')" >'+row.user.name+'</button>';
            
                }, width: "60%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {

                    return row.user.nric;
                }, width: "5%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                    console.log('rowschedule:',row);
                    return row.mark;
                }, width: "5%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {
                    var labelClass = 'default'
                    if(row.status === 'absence'){
                        labelClass = 'warning';
                    }else if(row.status === 'attended'){
                        labelClass = 'info';
                    }else if(row.status === 'passed'){
                        labelClass = 'success';
                    }else if(row.status === 'failed'){
                        labelClass = 'danger';
                    }
                    
                    
                    return '<span class="label label-'+labelClass+'">'+row.status+'</span>';
                }, width: "5%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {

                    var btnAbsence = "<button type='button' id='"+row.id+"' status='absence' class='btn btn-warning custom' onclick='setStatus(this)' >Absence</button>&nbsp";
                    var btnAttended = "<button type='button' id='"+row.id+"' status='attended' class='btn btn-info custom' onclick='setStatus(this)' >Attended</button>&nbsp";
                    var btnPassed = "<button type='button' id='"+row.id+"' status='passed' class='btn btn-success custom' onclick='setStatus(this)' >Passed</button>&nbsp";
                    var btnFailed = "<button type='button' id='"+row.id+"' status='failed' class='btn btn-danger custom' onclick='setStatus(this)' >Failed</button>";
                        var btnSummary = "</br></br><button type='button' id='"+row.id+"' status='summary' class='btn btn-primary custom' onclick='goToSummary("+row.user_id+")'  >Summary</button>";
                    var allowedBtn = "";
                    if(row.status === "created"){
                        allowedBtn = btnAbsence + btnAttended+btnSummary;
                    }else{
                          allowedBtn = btnPassed + btnFailed+btnSummary;
                    }
                    
                    return '<div style="white-space: nowrap;">' + allowedBtn + '</div>';
                }, width: "1%"
                , orderable: false
            }

        ]

    });

    function setStatus(obj) {

        $('#id').val($(obj).attr('id'));
        $('#status').val($(obj).attr('status'));
        $.ajax({
                   type: "POST",
                   url: '/schedule_attendant_set_status',
                   data: $("#form").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                      $('#myTable').DataTable().ajax.reload();
                   }
        });
    }
    function goToSummary($userId){
        location.href = '/summary/{{$schedule->id}}/'+$userId;
    }
</script>
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection