@extends($master)
@section('header', 'SME - '.$category.' -> Pollution Control Engineering Report')
@section('content')

<h1 style="margin: 0px;font-size: 24px">Applicant Assignment&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  RUBRIC used to calculate mark.<br>
                    &bull;  Date Hardcopy Received use to set received hardcopy.<br>
                    &bull;  SET Comment if SME want to request additional file.'
        data-html="true" data-placement="right" data-original-title="SME Assignment Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>
 <br>

<!-- <div class="container">

    <h1 style=' text-transform: uppercase;'>SME - {{$category}}</h1>
    <h2>Pollution Control Engineering Report<br></h2>
    <h3>Applicant Assignment</h3> -->
    <!-- INSTRUCTION -->
<!-- <div style="width: 100%;" class="panel-group" >
        <div class="panel panel-primary" style="border-color:#4CAF50;">
            <div class="panel-heading" style="background-color:#4CAF50;" >
                <h4 class="panel-title" style="color:white;">
                    <a data-toggle="collapse" href="#collapse1">SME Assignment Instruction :</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    •  RUBRIC used to calculate mark<br>
                    •  Date Hardcopy Received use to set received hardcopy<br>
                    •  SET Comment if SME want to request additional file<br>
                  
                </div>
            </div>
        </div>
    </div>
</div> -->

    <div id="message"></div>
   <div class="table table-responsive">
        <table class="table table-bordered" id="myTable" >
            <thead class="alert-info" >
            <th  style="width:1%;"><center>No.</center></th>
            <th  style="width:10%;"><center>Applicant Name</center></th>
            <th style="width:5%;"><center>NRIC/Passport</center></th>
            <th style="width:10%;"><center>File Uploaded</center></th>
            <th  style="width:10%;"><center>Rubric</center></th>
            <th style="width:10%;"><center>Date Softcopy Received</center></th>
            <th style="width:10%;"><center>Date Hardcopy Received</center></th>
            <th style="width:10%;"><center>SME comment</center></th>
            <th style="width:10%;"><center>Additional File</center></th>
            <th  style="width:10%;"><center>Result</center></th>
           
            </thead>
        </table>
   </div>


   {{-- <div class="modal fade" id="myModal" role="dialog">
       <div class="modal-dialog modal-sm"> --}}
   

     <!-- modal set status -->
    <div class="modal  fade" id="setHardCopyDate" role="dialog">
      <div class="modal-dialog modal-sm" style="left:auto">
        <div class="modal-content">
         <!--  Form -->
         {!!Form::open(['role'=>'form', 'route'=>'setHardCopyDate']) !!}

              <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Set Status</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">

                      {!! Form::label('panel', 'Select Date *', ['class' => 'control-label'])!!}

                       <input type='date' name='date_hardcopy'  class='form-control' required>
                      
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


     <!-- modal set status -->
    <div class="modal  fade" id="setSMEComment" role="dialog">
      <div class="modal-dialog modal-sm" style="left:auto">
        <div class="modal-content">
         <!--  Form -->
         {!!Form::open(['role'=>'form', 'route'=>'setSMEComment']) !!}

              <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Set SME Comment</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">

                      {!! Form::label('panel', 'Comment Text *', ['class' => 'control-label'])!!}

                       <textarea type='textArea' name='text_smecomment'  class='form-control' required> </textarea>
                      
                      {!! Form::hidden('upload_id',null,['id'=>'upload_id3'] ) !!}
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
        $(document).on("click", ".setHardCopyDate", function () {
          var upload_id = $(this).data('upload_id');
          $("#upload_id2").val(upload_id);
             
        });


        $(document).on("click", ".setSMEComment", function () {

          var upload_id = $(this).data('upload_id');
          $("#upload_id3").val(upload_id);
             
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
                category : '{{$category}}',
                assign_panel : '{{Auth::user()->id}}'
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
                    //openGlobalProfile($id)
                    return  '<button class="btn btn-default" onclick="openGlobalProfile('+row.user.id+')" >'+row.user.name+'</button>';
                    //return  '<button class="btn btn-default" onclick="openGlobalProfile('+row.user.id+')" >'+row.user.name+'</button>';;
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
                    
                    return '<button type="button" class="btn btn-warning form-control" onclick="goToRubric('+row.id+')">RUBRIC</button>';

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
                    
                    return '<center><button type="button" class="btn  btn-'+(jQuery.isEmptyObject(row.date_hardcopy)?'warning':'default')+' setHardCopyDate" data-tooltip="true" data-placement="bottom" title="Set received hardcopy date"  data-toggle="modal" data-target="#setHardCopyDate" data-upload_id="'+row.id+'" >'+(jQuery.isEmptyObject(row.date_hardcopy)?'SET DATE':row.date_hardcopy)+'</button></center>';
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {

                        return '<center><button id="btnSMEComment" name="btnSMEComment" type="button" class="btn btn-danger setSMEComment" data-tooltip="true" data-placement="bottom" title="Set SME comment"  data-toggle="modal" data-target="#setSMEComment" data-upload_id="'+row.id+'" >'+(jQuery.isEmptyObject(row.sme_request_text)?'SET Comment':row.sme_request_text)+'</button></center>';
                    }, width: "10%"
                    , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                    var files = '';
                    var count = 1;console.log(row);
                    if(row.upload_type==='spec_upload'){
                      row.addspec_file.forEach(function(val){
                          files = files + (count+ '. <a target="blank" href="/uploads/'+val.filename+'">'+val.original_filename+'</a><br>');
                          count++;
                    })
                  
                    return files;
                    }
                      else{
                    row.additional_file.forEach(function(val){
                          files = files + (count+ '. <a target="blank" href="/uploads/'+val.filename+'">'+val.original_filename+'</a><br>');
                          count++;
                    })
                  
                    return files;}
                }, width: "20%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                   var mark = 0;var percent=0;
                   row.rubrics.forEach(function(val){
                    percent=(parseInt(val.level)/4)*parseInt(val.percentage);
                      mark = mark + percent;
                       percentage=parseInt(val.percentage);console.log('percent->>',percent);console.log('mark->>',mark);
                   })
                   var percentage = mark/percentage * 100;
                    return mark+ ' %';
                }, width: "10%"
                , orderable: false
            }
        ]

    });




    
    
    
    function goToRubric(id){
        location.href = "/rubric_view/"+id;
    }

</script>
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection
