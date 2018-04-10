@extends('layouts.ietsmaster')
@section('js')
@endsection
@section('content') 

<div class="row container">
    <div class="col-md-12" > 
        <h2>{{$title}}</h2>
    </div>
</div>
<div class="row container">
    <div class="col-md-12" > 
       
        <div class="panel panel-info">
            <div class="panel-heading">Exam Setting</div>
         
            <table class='table table-bordered' style='border-spacing: 0;
border-collapse: collapse;'>
                <tr><td colspan="4"> <button class="btn btn-info pull-right" onclick="$('#modalExamSetting').modal('toggle')" ><span class="glyphicon glyphicon-edit"></span></button></td></tr>
                <tr>
                    <td colspan="4"><h3>No of Exam Question : {{$examQuestionNumber}}</h3></td>
               
                </tr>
                <tr class="btn-primary">
                                <td width = "10%">Difficulty Level</td>
                                <td width = "10%">Percentage</td>
                                <td width = "10%">No of current question</td>
                                <td width = "70%">Required Question for Exam</td>
                              
                      
                </tr>
                @foreach($listDifficulty as $level)
                
             
                <div class="hide">
                    {{$label = 'alert-default'}}
                    @if($level->code === 'E')
                        {{$label = 'alert-success'}}
                    @elseif($level->code === 'M')
                         {{$label = 'alert-warning'}}
                    @else
                         {{$label = 'alert-danger'}}
                    @endif
                </div>
                <tr class='btn-default'>
                     <td class='{{$label}}'>{{$level->name}}</td>
                     <td>{{$level->percentage}} %</td>
                     <td>{{$level->noOfQuestion}}</td>
                     <td>
                         <div class='hide'>{{$need =   $level->noOfRequiredQuestion - $level->noOfQuestion}}</div>
                         
                         @if($need <= 0)
                         <b><font color="green">sufficient no of question for exam</font></b>
                         @else
                         <b><font color="red">Need {{$need}} more of question to satisfied exam condition</font></b>
                         @endif
                         
                     </td>
                </tr>
                @endforeach
                
                 <tr class="btn-default">
                               
                </tr>
            </table>
           </div>

        </div>
    </div>


<div class="row container">
    <div class="col-md-12" >  
        <div class="box box-primary">
            <div class="box-header with-border">
                <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myModal" onclick="$('#formId').html(null);$('#formTitle').html('Add Modul');">Add Modul</button>
            </div>
            <br>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div> <!-- end .flash-message -->
            <br>

            <div class="box-body table-responsive">
                <div id="message"></div>
                <div>
                    <table class="table table-bordered" id="myTable" >
                        <thead >
                        <th class="alert-success" width="1%" class="btn-primary">No</th>
                        <th class="alert-success" width="60%" class="btn-primary">Name</th>
                        <th class="alert-success" width="15%" class="btn-primary">Self-Learning</th>
                        <th class="alert-success" width="25%" class="btn-primary">Action</th>

                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
{{ Form::open(array('url' => 'ietsquizModul/save')) }}
<div id="formId"></div>
<input type="hidden" name="type" value="{{$type}}">
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="formTitle">New Module</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td width="40%" class="alert-success">Name</td>
                        <td><input type="text" id="name" name="name" class="form-control" style="width:100%"></td>
                    </tr>

                </table>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{Form::submit('Save', array('style' => 'background-color: green' ,'class' => 'btn btn-success'))}}  
            </div>
        </div>


    </div>
</div>
{{ Form::close() }}


<!--{{ Form::open(array('url' => 'quizModul/saveExamSetting')) }}-->
<form id="formExamSetting" action="/ietsquizModul/saveExamSetting" method="POST">

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="type" value="{{$type}}">
<div id="modalExamSetting" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="formTitle">Exam Setting</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td width="40%" class="alert-default">No Of Question</td>
                        <td><input type="number" id="no_of_question" name="no_of_question" value='{{$examSetting->no_of_question}}' class="form-control" style="width:100%"></td>
                    </tr>
                    <tr>
                        <td width="40%" class="alert-success">Easy Percentage</td>
                        <td><input type="number" id="easy_percentage" name="easy_percentage" value='{{$examSetting->easy_percentage}}' class="form-control" style="width:100%"></td>
                    </tr>
                    <tr>
                        <td width="40%" class="alert-warning">Medium Percentage</td>
                        <td><input type="number" id="medium_percentage" name="medium_percentage" value='{{$examSetting->medium_percentage}}' class="form-control" style="width:100%"></td>
                    </tr>
                    <tr>
                        <td width="40%" class="alert-danger">Hard Percentage</td>
                        <td><input type="number" id="hard_percentage" name="hard_percentage" value='{{$examSetting->hard_percentage}}'  class="form-control" style="width:100%"></td>
                    </tr>

                </table>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-success" onclick="saveSetting()">Save</button>
<!--                {{Form::submit('Save', array('style' => 'background-color: green' ,'class' => 'btn btn-success'))}}  -->
            </div>
        </div>


    </div>
</div>
</form>
<!--{{ Form::close() }}-->


{{ Form::open(array('url' => 'ietsquizModul/remove')) }}
<div id="formRemoveId"></div>
<div id="myModalRemove" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="formTitle">Message</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to remove this modul?
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-danger" >Yes</button>
               
            </div>
        </div>


    </div>
</div>
{{ Form::close() }}
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
    
    
    if('{{$errors->any()}}'){
        $('#myModal').modal('toggle');
    }

    $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        ajax: {
            type: "POST",
            url: '/ietsquizModul/find',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                type : '{{$type}}'
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

                    return '<a href="/ietsquestion/' + row.id + '">' + row.name + '</a>';
                }, width: "60%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {

                    //return '<a href="/ietsquizModul/selflearning/' + row.id + '">VIEW</a>';
                }, width: "5%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {

                    var btnRemove = '<button type="button" class="btn btn-danger" onclick="remove(' + row.id + ')" id="bn"><span class="glyphicon glyphicon-trash"></span></button>';
                    var btnEdit = '<button type="button" class="btn btn-info" onclick="edit(' + row.id + ')" id="bn"><span class="glyphicon glyphicon-edit"></span></button>';
                    return '<div style="white-space: nowrap;">' + btnEdit + " " + btnRemove + '</div>';
                }, width: "1%"
                , orderable: false
            }

        ]

    });
    
    function edit($id){
        $.ajax({
        type: "POST",
            url: '/ietsquizModul/findById',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id :$id,
            }, // serializes the form's elements.
            success: function ($data)
            {
                $('#name').val($data.name);
                $("#myModal").modal('toggle');
                $('#formTitle').html("Edit Modul");
                $('#formId').html("<input type='hidden' name='id' value='"+$id+"'>");
            }
            });
       
    }
    
    function remove($id){
        $("#myModalRemove").modal('toggle');
        $('#formRemoveId').html("<input type='hidden' name='id' value='"+$id+"'>");
    }
    
    function saveSetting(){
        
        var easy = parseInt($('#easy_percentage').val());  
        var medium = parseInt($('#medium_percentage').val());  
        var hard = parseInt($('#hard_percentage').val());  
        
        var total = easy + medium + hard;
        
        if(total === 100){
             $('#formExamSetting').submit();
        }else{
            alert("Invalid Data! The sum of easy + medium + hard need to be 100");
        }
        
     
    }
</script>
@endsection
