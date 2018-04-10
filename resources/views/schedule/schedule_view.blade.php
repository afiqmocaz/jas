@extends($master)
@section('js')
@endsection
@section('header', $category.': Comprehensive Exam')
@section('content') 

<h1 style="margin: 0px;font-size: 24px">Exam Schedule for Certified <font style="text-transform: uppercase">{{$category}}</font> Consultant&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can enter the title of exam at the text field provide.<br>
                &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can choose the date, time and enter venue of exam at the text field provided.<br>
                &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can click "Confirm" button to confirm the date,time and venue that has been filled.<br>
                &bull;  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can view the date, time and date at the table below the "Confirm" button.'
        data-html="true" data-placement="right" data-original-title="Exam Schedule for Certified  <font style='text-transform: uppercase'>{{$category}}</font> Consultant Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

        <br>


<!-- <h1>Comprehensive Exam<br></h1>  
<h2>Exam Schedule for Certified <font style="text-transform: uppercase">{{$category}}</font> Consultant<br></h2> -->

<!-- INSTRUCTION -->
<!-- <div style="width: 100%;" class="panel-group" >
    <div class="panel panel-primary" style="border-color:#4CAF50;">
        <div class="panel-heading" style="background-color:#4CAF50;" >
            <h4 class="panel-title" style="color:white;">
                <a data-toggle="collapse" href="#collapse1">Exam Schedule for Certified  <font style="text-transform: uppercase">{{$category}}</font> Consultant Instruction :</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">
                •  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can enter the title of exam at the text field provide.<br>
                •  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can choose the date, time and enter venue of exam at the text field provided.<br>
                •  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can click "Confirm" button to confirm the date,time and venue that has been filled.<br>
                •  Secretariat  <font style="text-transform: uppercase">{{$category}}</font> can view the date, time and date at the table below the "Confirm" button.
            </div>
        </div>
    </div>
</div>


<br> --> 
<div class="row" >
    <div class="col-sm-6"><button  class="btn btn-primary" onclick="$('#modalExam').modal('toggle')">Add New Exam Schedule</button>&nbsp;&nbsp;<button  class="btn btn-primary" onclick="$('#modalDropdown').modal('toggle')" >Add New Dropdowns</button></div>
 
  <div class="col-sm-4 pull-right">
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button  class="btn btn-warning" onclick="location.href='/schedule_show/{{$category}}/available'">Waiting List</button>
      &nbsp;<button  class="btn btn-danger"  onclick="location.href='/schedule_show/{{$category}}/ended'">Ended List</button>
       <button  class="btn btn-info" onclick="location.href='/schedule/{{$category}}'">All List</button>
  </div>

</div>


<!-- end of modal -->
<br>&nbsp;
<div class="table-responsive" >
    <table class="table table-bordered" id="list"  align="center" >
        <thead valign="top">
            <tr class="alert-info">
                <th onclick="sortTable(1)" style="width:1%;">No.</th>
                <th onclick="sortTable(1)" style="width:10%;">Type of Exam</th>
                <th onclick="sortTable(2)" style="width:10%;">Exam Title</th>
                <th onclick="sortTable(3)" style="width:10%;">Date</th>
                <th onclick="sortTable(4)" style="width:20%;">Time</th>
                <th onclick="sortTable(5)" style="width:20%;">Venue</th>
                <th onclick="sortTable(6)" style="width:7%;"><center>Seat No.</center></th>
        <th onclick="sortTable(7)" style="width:7%;"><center>Participants</center></th>
       
        <th  onclick="sortTable(8)" style="width:15%;"><center>Action</center></th>
      
        
        </tr></thead>
    <div class="hide">{{$count = 1}}</div>
        @foreach($schedule as $schedules)
       <tbody>
        <tr>@if(!empty($schedules->date)&&!empty($schedules->end))
            <td>{{$count++}}</td>
            <td>{{$schedules->typeofexam}}</td>
            @if(!empty($schedules->examtitle->examtitle))
            <td>{{$schedules->examtitle->examtitle}} </td>
            @else
            <td>Null</td>
            @endif
            <td>{{ date('d/m/Y', strtotime($schedules->date))}}</td>
            <td>{{ date('g:i A', strtotime($schedules->start))}} - {{ date('g:i A', strtotime($schedules->end))}}</td>
            <td><center>    @if(!empty($schedules->venue->venue)){{$schedules->venue->venue}}
            @else @endif,<br>{{$schedules->address}},<br>{{$schedules->state}}</center></td>
        <td><center>{{$schedules->seat}}</center></td>
        <td><center>{{count($schedules->examCandidates)}}</center></td>

       
        <td>
            
            <button class="btn btn-primary form-control" onclick='location.href = "/schedule_attendant/{{$schedules->id}}"'><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Attendant </button>
            
            <button type="submit" class="btn btn-primary form-control {{$disableCancel>0?"":"hide"}}" onclick="location.href='{{ route('schedule.edit', $schedules->id) }}'">
                <span class="glyphicon glyphicon-edit"></span>  Edit
            </button>
            
            {!! Form::open(['route' => ['schedule.destroy', $schedules->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
            <button type="submit" class="btn btn-danger form-control {{$disableCancel>0?"":"hide"}}"  >
              <span class="glyphicon glyphicon-remove"></span>  Cancel  
            </button>
           {!! Form::close() !!}
           
          {!! Form::open(['url' => 'schedule_remind', 'method' => 'PATCH', 'onsubmit' => 'return ConfirmRemind()']) !!}
          <input type="hidden" name='id' value='{{$schedules->id}}'>
            <button type="submit" class="btn btn-warning form-control {{$disableCancel>0?"":"hide"}}"  >
                <span class="glyphicon glyphicon-time"></span> Remind 
            </button>
           {!! Form::close() !!}
        </td>
       @else
       @endif
        @endforeach
        </tbody>
    </table>  
</div>



<div id="modalDropdown" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <!-- Modal1 content -->
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h2>Add New Dropdowns</h2> -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Dropdowns</h4>
            </div>  

            <div class="modal-body ">

                <div class="row">
                    <div class="col-sm-6"> 	
                        <iframe src="{{ url('examtitle') }}" height="450" scrolling="yes"></iframe>
                    </div>
                    <div class="col-sm-6"> 	
                        <iframe src="{{ url('venue') }}" width="280" height="450" scrolling="yes"></iframe>
                    </div>

                </div>
                <div class="row">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>    

    </div>      
</div>

<div id="modalExam" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <!-- <span class="close">&times;</span>
                <h2>Add New Exam Schedule</h2> -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Exam Schedule</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array('route' => 'schedule.store', 'data-parsley-validate' => '')) !!}
                <input type="hidden" name="category" value="{{$category}}">
                <br><div class="form-group">
                    <div class="input-group" style="width: 100%;">
                        <span class="input-group-addon" style="width: 25%;text-align: left;" id="title">Type of Exam</span>
                        <select id="exam" name="typeofexam" class="form-control" required="" style="width:36.6%">
                            <option data-foo="" value="" disabled="true" selected="true">--Please Select--</option>
                            <option data-foo="Main Comprehensive Exam">Main Comprehensive Exam</option>
                            <option data-foo="Repeat Comprehensive Exam">Repeat Comprehensive Exam</option>
                        </select>
                    </div><br>

                    <nav>
                        <div class="input-group" style="width: 100%;">
                            <span class="input-group-addon" style="width: 25%;text-align: left;" id="examtitle" name="examtitle_id">Exam Title</span>
                            <select style="width:97.7%" id="examtitle" name="examtitle_id" class="form-control" required="">
                                <option value="" disabled="true" selected="true">--Please Select--</option>
                                @foreach($examtitles as $cat)
                                <option value="{!! $cat->id !!}">{!! $cat->examtitle !!}</option>
                                @endforeach
                            </select>
                        </div><br></nav>

                    <div class="input-group" style="width: 100%;">
                        <span class="input-group-addon" style="width: 25%;text-align: left;" id="date">Date</span>
                        <input type="date" id="date" name="date" class="form-control" required="" style="width:36.6%">
                    </div><br>

                    <div class="input-group" style="width: 100%;">
                        <span class="input-group-addon" style="width: 25%;text-align: left;" id="stime">Start Time</span>
                        <input type="time" id="stime" name="start" class="form-control" required="" style="width:36.6%">
                    </div><br>

                    <div class="input-group" style="width: 100%;">
                        <span class="input-group-addon" style="width: 25%;text-align: left;" id="etime">End Time</span>
                        <input type="time" id="etime" name="end" class="form-control" required="" style="width:36.6%">
                    </div><br>

                    <nav>

                        <div class="input-group" style="width: 100%;">
                            <span class="input-group-addon" style="width: 25%;text-align: left;" id="venue_id" name="venue_id">Venue</span>
                            <select id="venue" name="venue_id" class="form-control" required="" onchange='ChangeVal(this.value);' style="width:97.7%">
                                <option value="0" disabled="true" selected="true">--Please Select--</option>

                                @foreach($venues as $cat)
                                <option value="{!! $cat->id !!}">{!! $cat->venue !!}</option>
                                @endforeach
                            </select>

                    </nav>

                    <br><br><br>
                    <div class="input-group" style="width: 100%;">
                        <span class="input-group-addon" style="width: 25%;text-align: left;">Address</span>
                        <textarea id="address" name="address" class="form-control" required="" style="width:36.6%" rows="4" cols="30"></textarea>
                    </div><br>

                    <div class="input-group" style="width: 100%;">
                        <span class="input-group-addon" style="width: 25%;text-align: left;">State</span>
                        <select id="state" name="state" class="form-control" required="" style="width:36.6%">
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
                    </div><br>

                    <div class="input-group" style="width: 100%;">
                        <span class="input-group-addon" style="width: 25%;text-align: left;" id="seat">Allocation of Seat</span>
                        <input type="number" id="alloc" name="seat" class="form-control" required="" style="width:36.6%">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <form action="show" method="get">
                    <input type="submit" class="btn btn-primary" value="Save"/></form>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
<script>

    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to cancel the exam, the data will be removed, and system will inform to the user the schedule has been canceled?");
        if (x)
            return true;
        else
            return false;
    }
    
    function ConfirmRemind()
    {
        var x = confirm("Are you sure want to remind the user?");
        if (x)
            return true;
        else
            return false;
    }

</script>
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection