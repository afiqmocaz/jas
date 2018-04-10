@extends($master)
@section('header', $category.': Course Assignment')
@section('content')

<h1 style="margin: 0px;font-size: 24px">Applicant Assignment&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  In this Form, Secretariat <font style="text-transform: uppercase">{{$category}}</font> can set the interview session for applicant and can set the attendance of the applicant.<br>
                    &bull;  Secretariat can click "Assign" button to set the date, time and venue of interview session.<br>
                    &bull;  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can select the attendance of the applicant.'
        data-html="true" data-placement="right" data-original-title="Applicant Information Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>
 <br> 

<!-- <div class="row"> -->
    <!-- <h1><font style="text-transform: uppercase">{{$category}}</font><br></h1>
    <h2>Applicant Assignment<br></h2>

    <div style="width: 100%;" class="panel-group" >
        <div class="panel panel-primary" style="border-color:#4CAF50;">
            <div class="panel-heading" >
                <h4 class="panel-title" style="color:white;">
                    <a data-toggle="collapse" href="#collapse1">Applicant Information Instruction :</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
               might need to change this to fit the content
                <div class="panel-body">
                    •  In this Form, Secretariat <font style="text-transform: uppercase">{{$category}}</font> can set the interview session for applicant and can set the attendance of the applicant.<br>
                    •  Secretariat can click "Assign" button to set the date, time and venue of interview session.<br>
                    •  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can select the attendance of the applicant.
                </div>
            </div>
        </div>
    </div> -->
   
    <div class="table-responsive">
        <table class="table table-bordered" id="myTable" >
            <thead class="alert-info" >
                <tr>
                    <th style="width:3%;"><center>No.</center></th>
                    <th style="width:12%;"><center>Applicant Name</center></th>
                    <th style="width:13%;"><center>NRIC/Passport</center></th>
                    <th style="width:10%;"><center>Assignment</center></th>
                    <!-- <th style="width:10%;"> <center>File(s) Uploaded</center></th> -->
                    <th style="width:10%;"><center>Assignment Status</center></th>
                    <th style="width:10%;"><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>     
    </div>
    <br>

<!-- </div> -->

  <!-- modal set status -->
    <div class="modal modal-default fade" id="setStatus" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!--  Form -->
         {!!Form::open(['role'=>'form', 'route'=>'setStatusAssignment']) !!}

              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Set Status</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">
                    
                      {!! Form::label('status', 'Select Status *', ['class' => 'control-label'])!!}
                      {!! Form::select('status',$list, null, array('class'=>'form-control','required','style'=>'width:100%','placeholder' => 'Select status')) !!}
                      <input type='hidden' name='id' id='examCandidateId' >
                      <input type='hidden' name='category' id='category' value='{{$category}}'>
                        
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


    <!-- modal send mail -->
      <div class="modal modal-default fade" id="sendComment" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
           <!--  Form -->
           {!!Form::open(['role'=>'form', 'route'=>'sendUploadComment']) !!}

                <div class="modal-header btn-primary">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Send Comment to Applicant</h4>
                </div>
                <div class="modal-body">
                  
                      <div class="form-group">
                      
                        {!! Form::label('text', 'Comment*', ['class' => 'control-label'])!!}
                       {{--  {!! Form::select('status',$list, null, array('class'=>'form-control','required','style'=>'width:100%','placeholder' => 'Select status')) !!} --}}
                       <textarea type='textArea' name='comment_text' id='comment_text'  class='form-control' required> </textarea>

                         <input type='hidden' name='upload_id2' id='upload_id2' >
                        {{-- <input type='hidden' name='category' id='category' value='{{$category}}' --}}
                        
                        
                          
                      </div>
                      <div class="form-group help-block">

                          <b>Note: Fields marked with * are compulsary.</b>

                      </div>  
                </div>
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary ">Send</button>
                </div>
            {!!Form::close() !!}

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



    <!-- modal assign assignment -->
    <div class="modal modal-default fade" id="assignAssignment" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!--  Form -->
         {!!Form::open(['role'=>'form', 'route'=>'assignAssignment']) !!}

              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Assign Assignment</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">

                      {!! Form::label('panel_id', 'Select Panel *', ['class' => 'control-label'])!!}

                      {!! Form::select('panel_id',$sme, null, array('class'=>'form-control select2','required','style'=>'width:100%','data-placeholder' => 'Select panel')) !!}
                      
                      <input type='hidden' name='id' id='upload_id' >
                      <input type='hidden' name='category' id='category' value='{{$category}}'>
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

    $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        ajax: {
            type: "POST",
            url: 'find',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
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
                    var btnProfile = '<button class="btn btn-default" onclick="openGlobalProfile('+row.user.id+')" >'+row.user.name+'</button>';console.log(row)
                    return btnProfile;
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
                    
                    if(!jQuery.isEmptyObject(row.uploads)){
                        rowTitle="<tr><th  class='btn-primary' colspan='7'><center>Additional File</center></th></tr>";
                        var row1 = "<tr><th class='btn-info'>File</th><th class='btn-info'>Result</th><th class='btn-info'>Panel</th><th class='btn-info'>SME Note</th><th class='btn-info'>Action</th></tr>";
                        var row2 = '';
                        var row3='';
                        var totalPer = 0;
                        var panel='-';
                        var i=0;
                        var j=0;
                        row.uploads.forEach(function(upload){
                            
                            // totalPer = 0;
                            // upload.rubrics.forEach(function(rubric){
                            //     totalPer = totalPer + parseInt(rubric.percentage);
                            // });
                            var mark = 0;
                        upload.rubrics.forEach(function(val){
                        percent=(parseInt(val.level)/4)*parseInt(val.percentage);
                        mark = mark + percent;
                        percentage=parseInt(val.percentage);
                   })
                        if(jQuery.isEmptyObject(upload.status)){
                          mark='<span class="label label-warning">Pending</span>';
                        }
                   // var percentage = mark/percentage * 100;
                    // console.log(percentage);

                            panel = 'Not Assigned';
                            type = '-';
                            note = '-';
                            var btnRubric='<button style="width:150px" type="button" class="btn  btn-primary  form-control '+(jQuery.isEmptyObject(upload.status)?'':'hide')+'" data-tooltip="true" data-placement="bottom" title="Assign Criteria" onclick="goToRubric('+upload.id+')" >Rubric Criteria</button>';
                           var btnAssign = '<button style="width:150px" type="button" class="btn  btn-warning  form-control" data-tooltip="true" data-placement="bottom" title="Assign Assignment"  data-toggle="modal" data-target="#assignAssignment" onclick="setAssignId('+upload.id+')" >Assign</button>';
                           var btnNotify = '<button style="width:150px" type="button" class="btn  btn-info  form-control sendComment" data-tooltip="true" data-placement="bottom" title="Assign Assignment"  data-toggle="modal" data-target="#sendComment" data-upload-id="'+upload.id+'" data-comment-text="'+upload.sme_request_text+'"" >Notify Applicant</button>';
                          

                            if (upload.assign_panel)
                                panel = upload.panel.name;
                            
                            if(upload.upload_type === "main_upload"){
                                type = "Main";
                            }
                            else if(upload.upload_type === "spec_upload"){
                                type = "Specialized";
                            }
                            else if(upload.upload_type === "additional_upload")
                            {
                                type = "Additional";
                                btnAssign = '';
                            }   
                            
                            if(jQuery.isEmptyObject(upload.sme_request_text)){
                                btnNotify = '';
                            }
                            if(!jQuery.isEmptyObject(upload.sme_request_text)){
                                note = upload.sme_request_text;
                            }
                            
                            var btnAction = '<td><div ><center>'+btnAssign+'&nbsp'+btnRubric+'&nbsp'+btnNotify +' </center> </div></td>';
                            
                             if(upload.upload_type === "main_upload"){
                              rowType="<tr><th  class='btn-success' colspan='7'><center>Main</center></th></tr>";
                                  row2 = rowType+row2+'<tr><td><a target="blank" href="/uploads/' + upload.filename + '">' + upload.original_filename + '</a></td><td>'+mark+' %</td><td>'+panel+'</td><td>'+note+'</td>'+btnAction+'</tr>';
                            }

                            else if(upload.upload_type === "additional_upload")
                            {   if(i==0)
                              {
                                row2=row2+rowTitle+'<tr><td><a target="blank" href="/uploads/' + upload.filename + '">' + upload.original_filename+ '</a></tr>';
                              }
                                else{
                                row2 = row2+'<tr><td><a target="blank" href="/uploads/' + upload.filename + '">' + upload.original_filename+ '</a></tr>';}
                                i++;
                            } 
                             else if(upload.upload_type === "spec_upload"){
                               rowType="<tr><th  class='btn-success' colspan='7'><center>Specialized</center></th></tr>";
                                  row3 =rowType+ row3+'<tr><td><a target="blank" href="/uploads/' + upload.filename + '">' + upload.original_filename + '</a></td><td>'+mark+' %</td><td>'+panel+'</td><td>'+note+'</td>'+btnAction+'</tr>';
                            } 
                            else if(upload.upload_type === "addspec_upload")
                            {   if(j==0){
                                row3 = row3+rowTitle+'<tr><td><a target="blank" href="/uploads/' + upload.filename + '">' + upload.original_filename + '</a></tr>';}
                                else
                                {
                                  row3 = row3+'<tr><td><a target="blank" href="/uploads/' + upload.filename + '">' + upload.original_filename + '</a></tr>';
                                }
                                j++;
                            } 
                         

                        });
                       
                        return '<table class="table table-bordered">'+row1+row2+row3+'</table>';
                    }else return "-";
                  
                }, width: "10%"
                , orderable: false
            },
            
            {
                render: function (data, type, row, meta) {
                     var classLabel = 'default';
                     if(row.status_assigment === 'passed')
                     {
                         classLabel = 'success';
                     }else if(row.status_assigment === 'failed'){
                          classLabel = 'danger';
                     }
                   
                     return '<center><span class="label label-'+classLabel+'">'+row.status_assigment+'</span></center>';
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                   
                    return '<center><button style="width:150px" type="button" class="btn  btn-info" data-tooltip="true" data-placement="bottom" title="Set Status"  data-toggle="modal" data-target="#setStatus" onclick="setStatusId('+row.id+')" >Set Status</button></center>';
                }, width: "10%"
                , orderable: false
            }


        ]

    });
    
    
    $(document).on("click", ".sendComment", function () {

      var upload_id = $(this).data('upload-id');
      var comment_text = $(this).data('comment-text');
      $("#upload_id2").val(upload_id);
      $("#comment_text").val(comment_text);

         
    });


    function setStatusId(id){
        $('#examCandidateId').val(id);
    }

   function setAssignId(id){
        $('#upload_id').val(id);
    }
    function goToRubric(id) {
        location.href = "/rubric_view/" + id;
    }
    function back() {
        location.href = '/secretariat_assigment/{{$category}}';
    }
</script>
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection
