@extends($master)
@section('content')
@section('header', $category.': Quiz')
		
			  <div id="message"></div>
   <div class="box-body table-responsive">
        <table class="table table-bordered" id="myTable" >
            <thead class="alert-info" >
            <th  style="width:1%;"><center>No.</center></th>
            <th  style="width:10%;"><center>Applicant Name</center></th>
            <th style="width:5%;"><center>NRIC/Passport</center></th>
            <th style="width:5%;"><center>Date</center></th>
            <th style="width:5%;"><center>Score</center></th>
            </thead>
        </table>
   </div>
				  <script>

    
     $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        ajax: {
            type: "POST",
            url: '/findUserQuiz',
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
                             return row.user.name;
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

                    var date = new Date(row.updated_at);
        var month = date.getMonth() + 1;
        return date.getDate() + "/"+ (month.length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                }, width: "10%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {
                    
                    var labelClass = 'success';
                    if(row.status >75){
                        labelClass = 'success';
                    }else if(row.status <75){
                        labelClass = 'danger';
                    }
                        var btn='<button  type="button" class="btn  btn-primary  form-control " data-tooltip="true" data-placement="bottom" title="Summary" onclick="goTo('+row.user_id+')" >Summary</button>';
                    return '<center><span class="label label-'+labelClass+' "style="font-size:14px;">'+row.status+'%</span>&nbsp'+btn+'</center> ';
                }, width: "10%"
                , orderable: true
            },
           
        ]

    });
       function goTo(id) {
        location.href = "/quizSummary/" + id;
    }
				  </script>
@endsection
