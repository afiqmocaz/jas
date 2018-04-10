@extends($master)
@section('js')
@endsection
@section('header', 'EIA: Comprehensive Exam')
@section('content') 


<!-- <h1>Comprehensive Exam<br></h1>  
<h2>Exam Schedule for Certified <font style="text-transform: uppercase">{{$category}}</font>  Consultant<br></h2> -->

<h1 style="margin: 0px;font-size: 24px">Exam Schedule for Certified <font style="text-transform: uppercase">{{$category}}</font>  Consultant&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  Secretariat <font style="text-transform: uppercase">{{$category}}</font>  can enter the title of exam at the text field provide.<br>
                &bull;  Secretariat <font style="text-transform: uppercase">{{$category}}</font>  can choose the date, time and enter venue of exam at the text field provided.<br>
                &bull;  Secretariat <font style="text-transform: uppercase">{{$category}}</font>  can click "Confirm" button to confirm the date,time and venue that has been filled.<br>
                &bull;  Secretariat <font style="text-transform: uppercase">{{$category}}</font>  can view the date, time and date at the table below the "Confirm" button.'
        data-html="true" data-placement="right" data-original-title='Exam Schedule for Certified <font style="text-transform: uppercase">{{$category}}</font> Consultant Instruction' data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

        <br>

<!-- INSTRUCTION -->
<!-- <div style="width: 100%;" class="panel-group" >
    <div class="panel panel-primary" style="border-color:#4CAF50;">
        <div class="panel-heading" style="background-color:#4CAF50;" >
            <h4 class="panel-title" style="color:white;">
                <a data-toggle="collapse" href="#collapse1">Exam Schedule for Certified <font style="text-transform: uppercase">{{$category}}</font> Consultant Instruction :</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font>  can enter the title of exam at the text field provide.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font>  can choose the date, time and enter venue of exam at the text field provided.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font>  can click "Confirm" button to confirm the date,time and venue that has been filled.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font>  can view the date, time and date at the table below the "Confirm" button.
            </div>
        </div>
    </div>
</div> -->
<center>


    <center>
        <table class='table'>
            <tr>
                <td colspan="2">
                    <div style="width: 100%;" class="panel-group" >
                        {!! Form::model($schedule, ['route' =>['schedule.update', $schedule->id], 'method' => 'PUT']) !!}


                        <div class="input-group" style="width: 100%;">
                            <span class="input-group-addon" style="width: 20%;text-align: left;" id="typeofexam">Type of Exam</span>
                           {{ Form::select('typeofexam', ['Main Comprehensive Exam' => 'Main Comprehensive Exam', 'Repeat Comprehensive Exam' => 'Repeat Comprehensive Exam'], $schedule->typeofexam, array('class' => 'form-control', 'style' => 'width: 20%', 'required' => ''))}}                        </div><br>

                        <nav>
                            <div class="input-group" style="width: 100%;">
                                <span class="input-group-addon" style="width: 20%;text-align: left;" id="examtitle">Exam Title</span>
                                {{ Form::select('examtitle_id', $examtitles, null, ['style' => 'width:97.7%;', 'class' => 'form-control']) }}
                            </div><br></nav>

                        <!-- <article>   
                        <div id="check">
                        <input type="checkbox" class="maxtickets_enable_cb" name="opwp_wootickets[tickets][0][enable]">Add New Exam Title

                <div class="max_tickets">
                <iframe src="{{ url('examtitle') }}" width="200" height="225" scrolling="yes">
                        <p>Your browser does not support iframes.</p>
                        </iframe>
                </div></div></article> -->

                        <div class="input-group" style="width: 100%;">
                            <span class="input-group-addon" style="width: 20%;text-align: left;" id="date">Date</span>
                            {{ Form::date('date', null, ['style' => 'width:36.6%;', 'class' => 'form-control']) }}
                        </div><br>

                        <div class="input-group" style="width: 100%;">
                            <span class="input-group-addon" style="width: 20%;text-align: left;" id="date">Start Time</span>
                            {{ Form::time('start', null, ['style' => 'width:36.6%;', 'class' => 'form-control']) }}
                        </div><br>

                        <div class="input-group" style="width: 100%;">
                            <span class="input-group-addon" style="width: 20%;text-align: left;" id="date">End Time</span>
                            {{ Form::time('end', null, ['style' => 'width:36.6%;', 'class' => 'form-control']) }}
                        </div><br>

                        <nav>

                            <div class="input-group" style="width: 100%;">
                                <span class="input-group-addon" style="width: 20%;text-align: left;" id="venue_id">Venue</span>
                                {{ Form::select('venue_id', $venues, null, ['style' => 'width:97.7%;', 'onChange' => 'ChangeVal(this.value);' , 'class' => 'form-control']) }}

                        </nav>

                        <!-- <article>
                        <div id="check">
                        <input type="checkbox" class="maxtickets_enable_cb1" name="opwp_wootickets[tickets][0][enable]">Add New Venue

                <div class="max_tickets1">
                        <iframe src="{{ url('venue') }}" width="200" height="225" scrolling="yes">
                        <p>Your browser does not support iframes.</p>
                        </iframe>
                        </div>
                        </div>
                        </article> -->

                        <br><br>
                        <div class="input-group" style="width: 100%;">
                            <span class="input-group-addon" style="width: 20%;text-align: left;">Address</span>
                            {{ Form::textarea('address', null, ['style' => 'width:36.6%;', 'class' => 'form-control', 'rows' => '4', 'cols' => '30', 'id' => 'address']) }}
                        </div><br>

                        <div class="input-group" style="width: 100%;">
                            <span class="input-group-addon" style="width: 20%;text-align: left;">State</span>
                            {{ Form::select('state', [
      'J' =>
      [
            'Johor' => 'Johor'],
      'K' =>
      [
            'Kedah' => 'Kedah',
            'Kelantan' => 'Kelantan',
            'Kuala Lumpur' => 'Kuala Lumpur'],
      'M' =>
      [
            'Malacca' => 'Malacca'],
      'L' =>
      [
            'Labuan' => 'Labuan'],      
      'N' =>
      [
            'Negeri Sembilan' => 'Negeri Sembilan'],
      'P' =>
      [
            'Pahang' => 'Pahang',
            'Perak' => 'Perak',
            'Perlis' => 'Perlis',
            'Penang' => 'Penang',
            'Putrajaya' => 'Putrajaya'],
      'S' =>
      [
            'Sabah' => 'Sabah',
            'Sarawak' => 'Sarawak',
            'Selangor' => 'Selangor'],     
      'T' =>
      [
            'Terengganu' => 'Terengganu'],            

            ], $schedule->state, array('class' => 'form-control', 'style' => 'width: 35%', 'required' => ''))}}                        </div><br>

                        <div class="input-group" style="width: 100%;">
                            <span class="input-group-addon" style="width: 20%;text-align: left;" id="address">Allocation of Seat</span>
                            {{ Form::number('seat', null, ['style' => 'width:36.6%;', 'class' => 'form-control']) }}
                        </div><br>


                        </td>

                        </tr>   
                        <tr>
                            <td align="right" >
                                    <button type="button" class="btn btn-primary" onclick='location.href="/schedule/{{$category}}"'>Back</button>
                                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                            </td>
                            
                        </tr>
        </table></center>
    {!! Form::close() !!} 
</div>
</center>
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection