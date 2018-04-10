@extends($master)
@section('content')
@section('header', $category.': Summary')
@if(empty($questionList))
 No data
@else		
				 <!-- <h1>Announcement<br></h1>

				 <div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary">
				      <div class="panel-heading"  >
				        <h4 class="panel-title">
				          <a data-toggle="collapse" href="#collapse1">Announcement Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  Secretariat IETS can enter announcement by clicking the Add Announcement button.
					    •  The announcement can be view, edit or delete in the table below.
						•  The announcement entered by Secretariat EIA will be shown in the announcement box at the Home Page.
				        </div>
				      </div>
				    </div>
				  </div>
				  <script>
				  $(document).ready(function(){
				    $('[data-toggle="popover"]').popover();   
				  });
				  </script>
 --><style ></style>
					
				<!--  <a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"></a>
				  <form action="{{ url('ietsannounce/create') }}" method="get">
					    <input type="submit" class="btn btn-primary" value="Add Announcement"/> 
					     <a id="popoverData" class="btn btn-primary" href="#" data-content="&bull; Secretariat IETS can enter announcement by clicking the Add Announcement button.<br /> &bull;  The announcement can be view, edit or delete in the table below.<br />&bull;  The announcement entered by Secretariat IETS will be shown in the announcement box at the Home Page."
        data-html="true" data-placement="right" data-original-title="Announcement Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a>
					</form>
                                <br> -->
				<div class="table-responsive">
				<table class="order-table table table-bordered" id="myTable">
                    <thead valign="top" class="alert-info">
				      <tr>
				        <th onclick="sortTable(0)">No.</th>
				        <th onclick="sortTable(1)">Question</th>
				        <th onclick="sortTable(2)">Module</th>
				        <th onclick="sortTable(3)">Difficulty</th>
				         <th onclick="sortTable(4)">Correct</th>
				      </tr>
				    </thead>
				    <tbody>
                                    <div class="hide">{{$count = 1}}</div>
				    @foreach($questionList as $question)
				      <tr>
				        <td>{{$count++}}</td>
				        <td>{{$question->question}}</td>
				        <td>{{$question->quizModule->name}}</td>
				       <td>@foreach($difficulty_level as $level)
            @if($level->code === $question->difficulty_level)
            <div class='hide'>{{$label = 'default'}}</div> 
            @if($level->code === 'E')  
            <div class='hide'>{{$label = 'success'}}</div> 
            @elseif($level->code === 'M')  
            <div class='hide'>{{$label = 'warning'}}</div> 
            @elseif($level->code === 'H')  
            <div class='hide'>{{$label = 'danger'}}</div> 
            @endif

            <span class="label label-{{$label}}">{{$level->name}}</span>    

            @else
            @endif
            @endforeach</td>
            <td>
            	@if($question->correct==="true")
           <i class="fa fa-check text-blue"  style="font-size:24px;"></i>
            	@else
            	<i class="fa fa-times text-red" style="font-size:24px;"></i>
            	@endif
            </td>
				      </tr>
				      @endforeach
				    </tbody>
				  </table>
			<!-- 	      <div class="box-body table-responsive">
        <table class="table table-bordered" id="myTable" >
            <thead class="alert-info" >
            <th>No.</th>

            <th>Question</th>
            <th>Module</th>
            <th><center>Difficulty</center></th>
            <th><center>Correct</center></th> -->
<!--            <th class="alert-success">Payment For</th>-->
       <!--   
            </thead>
        </table>
    </div> -->
				  <script>
			$('#popoverData').popover({
container: 'body' });
$('#popoverOption').popover({ trigger: "hover" });

//    $('#myTable').DataTable({
//         processing: true,
//         serverSide: false,
//         bPaginate: true,
//         order: [[ 0, "desc" ]],
//         ajax: {
//             type: "POST",
//             url: '/find/summary',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             data: {
//               user_id:'{{Auth::user()->id}}',
//               scheduleId:'{{$scheduleId}}'
//             }
//         },
//         columns: [
//             {
//                 render: function (data, type, row, meta) {
//                     if (type === 'display') {
//                         return (meta.row + 1);
//                     }
//                     return row.id;
//                 },
//                 width: "1%"
//                 , orderable: true
//             },
//             {
//                 render: function (data, type, row, meta) {
//                   return row.question;
//                 }, width: "10%"
//                 , orderable: true
//             },
//            {
//                 render: function (data, type, row, meta) {

//                    return row.question;
//                 }, width: "10%"
//                 , orderable: true
//             },
//             {
//                 render: function (data, type, row, meta) {

//                    return row.question;
//                 }, width: "10%"
//                 , orderable: true
//             },
//              {
//                 render: function (data, type, row, meta) {

//                     return row.question;
//                 }, width: "10%"
//                 , orderable: true
//             },
// //        
           
//         ]

//     });
				  </script>
@endsection
@endif