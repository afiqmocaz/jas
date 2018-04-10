@extends($master)
@section('content')
<div class="container">

    <h1 style=' text-transform: uppercase;'>{{$category}}</h1>
    <h2>Pollution Control Engineering Report<br></h2>
    <h3>Applicant Assignment</h3>
    <!-- INSTRUCTION -->
    <div style="width: 100%;" class="panel-group" >
        <div class="panel panel-primary" style="border-color:#4CAF50;">
            <div class="panel-heading" style="background-color:#4CAF50;" >
                <h4 class="panel-title" style="color:white;">
                    <a data-toggle="collapse" href="#collapse1">Applicant Assignment Instruction :</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    •  Secretariat APCS can assign assignment to applicant with assignning the assign code that have been generate at the master file<br>
                    •  Secretariat can set the date hardcopy received field after the applicant have submit the assignment hardcopy.<br>
                    •  The date softcopy received field will automatically generated after the applicant have submit the assignment softcopy.<br>
                    •  Secretariat APCS can set the status pass or fail to the assignmet of the applicant<br>
                    •  Secretariat APCS can click the button "Save" to save the progress that have been made.
                </div>
            </div>
        </div>
    </div>
</div>



    <div id="message"></div>
   <div class="box-body table-responsive">
        <table class="table table-bordered" id="myTable" >
            <thead class="alert-info" >
            <th  style="width:1%;"><center>No.</center></th>
            <th  style="width:10%;"><center>Applicant Name</center></th>
            <th style="width:5%;"><center>NRIC/Passport</center></th>
            <th style="width:10%;"><center>File Uploaded</center></th>
            <th style="width:10%;"><center>Assign Panel</center></th>

            <th  style="width:10%;"><center>Rubric</center></th>
            <th style="width:10%;"><center>Date Softcopy Received</center></th>
            <th style="width:10%;"><center>Date Hardcopy Received</center></th>
            <th  style="width:10%;"><center>Result</center></th>
            <th  style="width:10%;"><center>Status</center></th>
           
            </thead>
        </table>
   </div>
    <!-- modal assign panel -->
    <div class="modal modal-default fade" id="assignPanel" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!--  Form -->
         {!!Form::open(['role'=>'form', 'route'=>'assignPanel']) !!}

              <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Assign Panel</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">

                      {!! Form::label('panel', 'Select Panel *', ['class' => 'control-label'])!!}

                      {!! Form::select('panel_id',$smePanel, null, array('class'=>'form-control select2','required','style'=>'width:100%','data-placeholder' => 'Select panel')) !!}
                      
                      {!! Form::hidden('upload_id',null,['id'=>'upload_id'] ) !!}
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

     <!-- modal set status -->
    <div class="modal modal-default fade" id="setStatus" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!--  Form -->
         {!!Form::open(['role'=>'form', 'route'=>'setStatus']) !!}

              <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Set Status</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">

                      {!! Form::label('panel', 'Select Status *', ['class' => 'control-label'])!!}

                      {!! Form::select('status',['passed'=>'Passed','failed'=>'Failed'], null, array('class'=>'form-control','required','style'=>'width:100%','placeholder' => 'Select status')) !!}
                      
                      {!! Form::hidden('upload_id',null,['id'=>'upload_id2'] ) !!}
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

<script>
 
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
        $('#myTable').DataTable();
        $('.select2').prepend('<option selected=""></option>').select2({allowClear: true});
    });
        
        //assign panel
        $(document).on("click", ".assignPanel", function () {
          var upload_id = $(this).data('upload_id');
          $("#upload_id").val(upload_id);
             
        });

        //set status
        $(document).on("click", ".setStatus", function () {
          var upload_id = $(this).data('upload_id');
          $("#upload_id2").val(upload_id);
             
        });

       $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        ajax: {
            type: "POST",
            url: '/applicant_assigment/find',
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
                     return '<a target="blank" href="/uploads/' + row.filename + '">' + row.original_filename + '</a>';
                    //return JSON.stringify(row.filename);
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                    if (row.assign_panel){
                        return row.panel.name;
                    }
                    return '<center><button type="button" class="btn  btn-info assignPanel" data-tooltip="true" data-placement="bottom" title="Assign"  data-toggle="modal" data-target="#assignPanel" data-upload_id="'+row.id+'" >ASSIGN</button></center>'; 
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                    @if (Auth::user()->roleUserNew->role_id==13)
                        return '<button type="button" class="btn btn-warning form-control" onclick="goToRubric('+row.id+')">RUBRIC</button>';
                    @else
                          return '<button type="button" disabled class="btn btn-warning form-control" >RUBRIC</button>';
                    @endif
                }, width: "5%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                    return row.created_at;
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {

                    return '-not implemented yet-';
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                    var totalPer = 0;
                 
                    row.rubrics.forEach(function(rubric){
                        totalPer = totalPer + parseInt(rubric.percentage);
                    });
                 
                    return totalPer+ ' %';
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                    if (row.status=='passed'){
                        return '<center><button type="button" class="btn  btn-success">'+row.status.toUpperCase()+'</button></center>';
                    }
                    else if(row.status=='failed'){
                         return '<center><button type="button" class="btn  btn-danger">'+row.status.toUpperCase()+'</button></center>';
                    }

                    return '<center><button type="button" class="btn  btn-info setStatus" data-tooltip="true" data-placement="bottom" title="Set Status"  data-toggle="modal" data-target="#setStatus" data-upload_id="'+row.id+'" >SET STATUS</button></center>';
                    
                }, width: "10%"
                , orderable: false
            }
        ]

    });
    
    
    function goToRubric(id){
        location.href = "/rubric_view/"+id;
    }



</script>
@endsection
