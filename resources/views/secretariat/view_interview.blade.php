@extends($master)
@section('header', $category.': Professional Interview')
@section('content')

<h1 style="margin: 0px;font-size: 24px">Applicant Information&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  In this Form, Secretariat {{strtoupper($category)}} can set the interview session for applicant and can set the attendance of the applicant.<br>
                    &bull;  Secretariat can click "Assign" button to set the date, time and venue of interview session.<br>
                    &bull;  Secretariat {{strtoupper($category)}} can select the attendance of the applicant.'
        data-html="true" data-placement="right" data-original-title="Applicant Information Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>


<!-- <div class="container"> -->
    <!-- <h1>Professional Interview<br></h1>
    <h2>Applicant Information<br></h2>

    <div style="width: 100%;" class="panel-group" >
        <div class="panel panel-primary" style="border-color:#4CAF50;">
            <div class="panel-heading" style="background-color:#4CAF50;" >
                <h4 class="panel-title" style="color:white;">
                    <a data-toggle="collapse" href="#collapse1">Applicant Information Instruction :</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    •  In this Form, Secretariat EIA can set the interview session for applicant and can set the attendance of the applicant.<br>
                    •  Secretariat can click "Assign" button to set the date, time and venue of interview session.<br>
                    •  Secretariat EIA can select the attendance of the applicant.
                </div>
            </div>
        </div>
    </div> -->
    <br> 
    <div class="table-responsive">
        <table class="table table-bordered" >
            <tr>
                <td colspan='2'>
                    <button class="btn btn-danger"  onclick="search('accepted')">Accepted Interview</button>
                    <button class="btn btn-danger" onclick="search('assigned')">Waiting for applicant confirmation</button>
                    <button class="btn btn-danger" onclick="search('pending')">Pending for interview</button>
                    <button class="btn btn-info"  onclick="search('passed')">Passed Interview</button>
                    <button class="btn btn-info" onclick="search('failed')">Failed Interview</button>
                    <button class="btn btn-info" onclick="search('rejected')">Rejected Interview</button>
                     <button class="btn btn-info" onclick="search('all')">All</button>
                <td>
            </tr>
        </table>     
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered" id="myTable" >
            <thead class="alert-info" >
                <tr>
                    <th style="width:3%;"><center>No.</center></th>
            <th style="width:12%;"><center>Applicant Name</center></th>
            <th style="width:13%;"><center>NRIC/Passport</center></th>
<!--            <th style="width:12%;"><center>Applicant ID</center></th>-->
            <th style="width:10%;"><center>Set Interview Session</center></th>
            <th style="width:10%;"><center>Date of Interview</center></th>
            <th style="width:10%;"><center>Interview Status</center></th>
            <th style="width:10%;"><center>Action</center></th>
            </tr></thead>
            <tbody>
            </tbody>
        </table>     
    </div>
    <br>

<!-- </div> -->
<!-- Modal -->
<div id="modalAssign" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id='form' action='' method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name='exam_candidate' id='id'>    

            <div class="modal-content">
                <div class="modal-header" class='alert alert-warning'>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" >Assign Schedule</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id='validationMsg'></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Title of Interview</span>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('title', null, ['class' => 'form-control form']) }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Date</span>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::date('date', null, ['class' => 'form-control form']) }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Time</span>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::time('time', null, ['class' => 'form-control form']) }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Venue</span>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::select('venues', $venues, null, ['class' => 'form-control','name'=>'venue_id']) }}
                        </div>
                    </div>
                    <br>
                     <div class="row">
                        <div class="col-sm-6">
                            <span>Address</span>
                        </div>
                        <div class="col-sm-6">
                               {{ Form::textarea('address', null, ['class' => 'form-control', 'rows' => '4', 'cols' => '30', 'id' => 'address']) }}
                        </div>
                    </div>
                    <br>
                     <div class="row">
                        <div class="col-sm-6">
                            <span>State</span>
                        </div>
                        <div class="col-sm-6">
                   <select id="state" name="state" class="form-control" >
					        <option data-foo="" value="0" disabled="true" selected="true">--Please Select--</option>
					        <option data-foo="J" value="0" disabled="true">J</option>
					        <option data-foo="Johor" value="Johor">&nbsp&nbsp&nbsp Johor</option>
					        <option data-foo="K" value="0" disabled="true">K</option>
					        <option data-foo="Kedah" value="Kedah">&nbsp&nbsp&nbsp Kedah</option>
					        <option data-foo="Kelantan" value="Kelantan">&nbsp&nbsp&nbsp Kelantan</option>
					        <option data-foo="Kuala Lumpur" value="Kuala Lumpur">&nbsp&nbsp&nbsp Kuala Lumpur</option>
					        <option data-foo="M" value="0" disabled="true">M</option>
					        <option data-foo="Malacca" value="Malacca">&nbsp&nbsp&nbsp Malacca</option>
					        <option data-foo="L" value="0" disabled="true">L</option>
					        <option data-foo="Labuan" value="Labuan">&nbsp&nbsp&nbsp Labuan</option>
					        <option data-foo="N" value="0" disabled="true">N</option>
					        <option data-foo="Negeri Sembilan" value="Negeri Sembilan">&nbsp&nbsp&nbsp Negeri Sembilan</option>
					        <option data-foo="P" value="0" disabled="true">P</option>
					        <option data-foo="Pahang" value="Pahang">&nbsp&nbsp&nbsp Pahang</option>
					        <option data-foo="Perak" value="Perak">&nbsp&nbsp&nbsp Perak</option>
					        <option data-foo="Perlis" value="Perlis">&nbsp&nbsp&nbsp Perlis</option>
					        <option data-foo="Penang" value="Penang">&nbsp&nbsp&nbsp Penang</option>
					        <option data-foo="Putrajaya" value="Putrajaya">&nbsp&nbsp&nbsp Putrajaya</option>
					        <option data-foo="S" value="0" disabled="true">S</option>
					        <option data-foo="Sabah" value="Sabah">&nbsp&nbsp&nbsp Sabah</option>
					        <option data-foo="Sarawak" value="Sarawak">&nbsp&nbsp&nbsp Sarawak</option>
					        <option data-foo="Selangor" value="Selangor">&nbsp&nbsp&nbsp Selangor</option>
					        <option data-foo="T" value="0" disabled="true">T</option>
					        <option data-foo="Terengganu" value="Terengganu">&nbsp&nbsp&nbsp Terengganu</option>
					        </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitAssign()">Save</button>
                </div>
            </div>
        </form>

    </div>
</div>
<!-- modal edit interview schedule -->
<div id="modalEdit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id='form2' action='' method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name='exam_candidate' id='id'>    

            <div class="modal-content">
                <div class="modal-header" class='alert alert-warning'>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" >Edit Schedule</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id='validationMsg'></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Title of Interview</span>
                        </div>
                        <div class="col-sm-6">
                          {{ Form::text('title', null, ['class' => 'form-control form','id' => 'titleE']) }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Date</span>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::date('date', null, ['class' => 'form-control form','id' => 'dateE']) }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Time</span>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::time('time', null, ['class' => 'form-control form','id' => 'timeE']) }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <span>Venue</span>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::select('venues', $venues, null, ['class' => 'form-control','name'=>'venue_id','id' => 'venueE']) }}
                        </div>
                    </div>
                    <br>
                     <div class="row">
                        <div class="col-sm-6">
                            <span>Address</span>
                        </div>
                        <div class="col-sm-6">
                               {{ Form::textarea('address', null, ['class' => 'form-control', 'rows' => '4', 'cols' => '30', 'id' => 'addressE']) }}
                        </div>
                    </div>
                    <br>
                     <div class="row">
                        <div class="col-sm-6">
                            <span>State</span>
                        </div>
                        <div class="col-sm-6">
                   <select id="stateE" name="state" class="form-control" >
                            <option data-foo="" value="0" disabled="true" selected="true">--Please Select--</option>
                            <option data-foo="J" value="0" disabled="true">J</option>
                            <option data-foo="Johor" value="Johor">&nbsp&nbsp&nbsp Johor</option>
                            <option data-foo="K" value="0" disabled="true">K</option>
                            <option data-foo="Kedah" value="Kedah">&nbsp&nbsp&nbsp Kedah</option>
                            <option data-foo="Kelantan" value="Kelantan">&nbsp&nbsp&nbsp Kelantan</option>
                            <option data-foo="Kuala Lumpur" value="Kuala Lumpur">&nbsp&nbsp&nbsp Kuala Lumpur</option>
                            <option data-foo="M" value="0" disabled="true">M</option>
                            <option data-foo="Malacca" value="Malacca">&nbsp&nbsp&nbsp Malacca</option>
                            <option data-foo="L" value="0" disabled="true">L</option>
                            <option data-foo="Labuan" value="Labuan">&nbsp&nbsp&nbsp Labuan</option>
                            <option data-foo="N" value="0" disabled="true">N</option>
                            <option data-foo="Negeri Sembilan" value="Negeri Sembilan">&nbsp&nbsp&nbsp Negeri Sembilan</option>
                            <option data-foo="P" value="0" disabled="true">P</option>
                            <option data-foo="Pahang" value="Pahang">&nbsp&nbsp&nbsp Pahang</option>
                            <option data-foo="Perak" value="Perak">&nbsp&nbsp&nbsp Perak</option>
                            <option data-foo="Perlis" value="Perlis">&nbsp&nbsp&nbsp Perlis</option>
                            <option data-foo="Penang" value="Penang">&nbsp&nbsp&nbsp Penang</option>
                            <option data-foo="Putrajaya" value="Putrajaya">&nbsp&nbsp&nbsp Putrajaya</option>
                            <option data-foo="S" value="0" disabled="true">S</option>
                            <option data-foo="Sabah" value="Sabah">&nbsp&nbsp&nbsp Sabah</option>
                            <option data-foo="Sarawak" value="Sarawak">&nbsp&nbsp&nbsp Sarawak</option>
                            <option data-foo="Selangor" value="Selangor">&nbsp&nbsp&nbsp Selangor</option>
                            <option data-foo="T" value="0" disabled="true">T</option>
                            <option data-foo="Terengganu" value="Terengganu">&nbsp&nbsp&nbsp Terengganu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitEdit()">Save</button>
                </div>
            </div>
        </form>

    </div>
</div>
  <!-- modal set status -->
    <div class="modal modal-default fade" id="setStatus" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!--  Form -->
         {!!Form::open(['role'=>'form', 'route'=>'secretariatSetStatus']) !!}

              <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Set Status</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">
                    
                      {!! Form::label('panel', 'Select Status *', ['class' => 'control-label'])!!}
                      {!! Form::select('status_interview',$listIvSFS, null, array('class'=>'form-control','required','style'=>'width:100%','placeholder' => 'Select status')) !!}
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

<script>

    function submitAssign() {
        $.ajax({
            type: "POST",
            url: '/interview_assign',
            data: $("#form").serialize(), // serializes the form's elements.
            dataType:'json',
            success: function (res)
            {
                if (res.status === 'error') {
                    $('#validationMsg').empty();
                    $('#validationMsg').html(errPanel(res.data));
                }else{
                    $('#modalAssign').modal('toggle');
                    $('#myTable').DataTable().ajax.reload();
                    alert("Successfully assign schedule");
                }
            }
        });
    }
    ;
   function submitEdit() {
        $.ajax({
            type: "POST",
            url: '/interview_assign',
            data: $("#form2").serialize(), // serializes the form's elements.
            dataType:'json',
            success: function (res)
            {
                if (res.status === 'error') {
                    $('#validationMsg').empty();
                    $('#validationMsg').html(errPanel(res.data));
                }else{
                    $('#modalEdit').modal('toggle');
                    $('#myTable').DataTable().ajax.reload();
                    alert("Successfully assign schedule");
                }
            }
        });
    }
    ;
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
        $('#myTable').DataTable();
    });
    search(null);
    function search(status){
        $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        bDestroy: true,
        ajax: {
            type: "POST",
            url: '/interview_find',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                category: '{{$category}}',
                status_interview : status
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
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {

                    return  '<button class="btn btn-default" onclick="openGlobalProfile('+row.user.id+')" >'+row.user.name+'</button>';;
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
   if(!jQuery.isEmptyObject(row.iv_schedule)&&row.status_interview=="pending"){
        
                           return '<button class="btn btn-primary form-control" onclick="modalAssign(' + row.id + ')" >Assign</button></br></br><button class="btn btn-warning form-control" onclick="modalEdit(' + row.iv_schedule.id + ')" >Edit</button>';
                    }
                else{
                    return  '<button class="btn btn-primary form-control" onclick="modalAssign(' + row.id + ')" >Assign</button>'
                }
                }, width: "10%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {
                    
                    if(!jQuery.isEmptyObject(row.iv_schedule)){
                        var row1 = "<tr><td>Date</td><td>"+row.iv_schedule.date+"</td></tr>";
                        var row2 = "<tr><td>Time</td><td>"+row.iv_schedule.time+"</td></tr>";
                        var row3 = "<tr><td>Address</td><td>"+row.iv_schedule.address+"</td></tr>";
                        var row4 = "<tr><td>State</td><td>"+row.iv_schedule.state+"</td></tr>";
                       
                        return '<table class="table table-bordered">'+row1+row2+row3+row4+'</table>';
                    }else return "-";
                  
                }, width: "10%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {
                     
                     var classLabel = 'default';
                          if(row.status_interview === 'passed'){ classLabel = 'success';}
                     else if(row.status_interview === 'failed' || row.status_interview === 'not_accepted' ){classLabel = 'danger';}
                      else if(row.status_interview === 'accepted'){classLabel = 'info';}
                   
                     return '<center><span class="label label-'+classLabel+'">'+row.status_interview+'</span></center>';
                }, width: "10%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {
                    var disabled = "";
                    if(row.status_interview === "pending"){
                       disabled = "disabled";
                    }
                    return '<center><button  type="button" class="btn  btn-info setStatus" data-tooltip="true" data-placement="bottom" title="Set Status"  data-toggle="modal" data-target="#setStatus" data-id="'+row.id+'" onclick="setStatusId('+row.id+')" '+disabled+'>SET STATUS</button></center>';
                }, width: "10%"
                , orderable: true
            }


        ]

    });
    }

    
    
    function setStatusId(id){
        $('#examCandidateId').val(id);
    }

    function modalAssign(id) {
        $('#modalAssign').modal('toggle');
        $('.form').val(null);
        $('#id').val(id);
    }
    function modalEdit(id) {
        var idIv=id;
        
           $.ajax({
        type: "POST",
        dataType: "json",
        url: '/interview_find',
        data: {
           idIv: idIv,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
var data = response;

console.log('modal edit response',data.data);
           $('#modalEdit').modal('toggle');
        $('#titleE').val(data.data.iv_schedule.title);
        var now = new Date(data.data.iv_schedule.date);

var day = ("0" + now.getDate()).slice(-2);
var month = ("0" + (now.getMonth() + 1)).slice(-2);

var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

$('#dateE').val(today);
        $('#addressE').val(data.data.iv_schedule.address);
         $('#timeE').val(data.data.iv_schedule.time);
         $('#stateE').val(data.data.iv_schedule.state);
        // $('.form').val(null);
        $('#id').val(data.data.id);
        }
    });
     
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
