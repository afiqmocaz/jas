@extends($master)

@section('content')

<div class="container">

    <div>
        <table class="table table-bordered" style="width:61%" align="center">
             <tr><td class='alert-success' colspan='2'><center><h2><b>PCER REPORT</b></h2></center></td></tr>
            @if(!isset($title))
            <tr>
                <td align="center" class="alert-success">
                    <h3>{{$title}}</h3>
                </td>
            </tr>
            @endif
            
            @if($examCandidate->status === "passed")
            
            @if($isExpired === 0 && $examCandidate->status_assigment ==='created')
            <tr>
                        <td>
                            <h2><b><font color="blue">PCER REPORT TIME REMAINING : </font><div id="countdown"></div></b></h2>
                        </td> 
            </tr>
            @endif
             @if($isExpired === 0 && $examCandidate->status_assigment ==='created')
            <tr>
                <td align="center">
                    <div class="panel panel-primary">
                        <div class="panel-heading" class="alert-info">
                            <h4 class="panel-title">
                                <a >Instructions:</a>
                            </h4>
                        </div>
                        <div >
                            <div class="panel-body">1. An Applicant must complete this assignment within one(1) months from the date of announcement of examination result. <br>
                                2. An Applicant who passes the Examination is eligible to submit a Pollution Control Engineering Report (PCER). <br>
                                3. The PCER shall demostrate that the applicant has attained the engineering knowledge, understanding, and application in
                                the area of industrial effluent engineering at the level necessary to underpin the technical competencies required for a CIETSC.<br>
                                4. An Applicant must prepared the PCER report based on format given below.<br>
                                5. Once Applicant have finish up the report, applicant must submit the report for the hardcopy and softcopy.<br>
                                6. For the softcopy applicant must upload it in pdf format through this system.<br>
                                7. For the hardcopy applicant must submit the report to EiMAS.
                            </div>
                        </div>
                    </div>

                    @if (Session::has('success'))

                    <div class="alert alert-success" role="alert">
                        <strong>Success:</strong>  {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">

                        <strong>Errors:</strong><ul>
                            @foreach ($errors->all() as $error)
                            <br><li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </td>
            </tr>
            @else
            <tr><td class='alert-success'><center><h2><b>ASSIGNMENT RESULT</b></h2></center></td></tr>
            <tr><td>
                <center>
                 
                <h3>
                @if($examCandidate->status_assigment ==='failed')
                <font color="red">Sorry, You have failed the assignment.</font>
                @endif
                
                @if($examCandidate->status_assigment ==='passed')
                <font color="green">Congratulation, You have passed the assignment.</font>
                <br>&nbsp; <br>
                 <button type="button" class="btn btn-success " onclick='window.location.href="/interview_applicant/{{$examCandidate->id}}"'>Proceed to interview</button>
                @endif
                </h3>
            </center></td></tr>
            @endif
            
            <tr>
                <td>
                    <h2>
                     
                    </h2>
                    
                    
                    @if($category === 'eia')
                    <h2><label><font size="5">Question</font></label></h2>
                       
                        @if(!empty($eiaAssigment))
                          Question : {{$eiaAssigment->question}}
                          <br>
                         
                          
                        @endif
                        
                      
                       
                    @elseif($category === 'apcs')
                       @if(!empty($apcsAssigment))
                       <label><font size="5">Assignment Question </font></label>&nbsp;&nbsp;&nbsp; <br><a href="{{asset('uploads/'.$apcsAssigment->original_filename)}}" target="_blank">View Questions</a> <br>
                       @else
                            --No Question uploaded,Please Contact Secretariat--
                       @endif
                       
                       @elseif($category === 'iets')
                      
                       @if(!empty($ietsAssigment))
                        <a href="{{asset('uploads/'.$ietsAssigment->original_filename)}}" target="_blank"> <h2>The Preparation Of PCER Report</h2></a>&nbsp;&nbsp;&nbsp; <br>
                       @else
                            --No Question uploaded,Please Contact Secretariat--
                       @endif
                    
                    @else
                        No Category 
                    @endif
                </td>
            </tr>
            
            <tr>
                <td>
                          <div>
        {{-- @if($isExpired === 0)                        --}}
        {{-- @if($allowUpload === 1)                       --}}
        {{-- <h2>Assignment Upload</h2> --}}
        {{-- <small>Files must be uploaded in PDF format only and the maximum file size is 10MB</small> --}}


        <div>

        {{-- {!! Form::submit('Upload Main Files', array('class'=>'btn btn btn-primary')) !!} --}}

        
        <div class="hide">
            {{$allowUpload = 1}}
            
           
            @foreach($upload as $u)
            
                @if(!empty($u->assign_panel))
                   {{$allowUpload = 0}};
                @endif
            
            @endforeach
        
        </div> 
        

        @if($allowUpload === 1)
        <button title="Upload Main Files" type="button" class="btn btn btn-primary" onclick="uploadMainFiles('{{$examCandidate->id}}','{{$category}}')">Upload Main Files</button>'
        @endif

        {{-- {!! $uploadPlugin->get()!!} --}}

        
        
        </div>

        {{-- {!! Form::open(array('id' => 'fileinput','url'=>'applicant_assigment/uploadFile','method'=>'POST', 'files'=>true)) !!} --}}
        {{-- {!!Form::hidden('category', $category) !!} --}}
        {{-- {!!Form::hidden('question', 'testing') !!} --}}
        {{-- {!!Form::hidden('examCandidateId', $examCandidate->id) !!} --}}
        
     
        {{-- {!! Form::file('images[]', array('multiple'=>true)) !!} --}}
          {{-- <p>{!!$errors->first('images')!!}</p> --}}
          {{-- @if(Session::has('error')) --}}
            {{-- <p>{!! Session::get('error') !!}</p> --}}
          {{-- @endif --}}
        {{-- {!! Form::submit('Submit', array('class'=>'btn btn btn-primary')) !!} --}}
        {{-- {!! Form::close() !!} --}}
        
        {{-- @else --}}
        
        {{-- <div class="alert alert-info"> You can only upload {{$maxUpload}} files </div> --}}
        {{-- @endif --}}
          {{-- @else        --}}
        {{-- @endif --}}
    
    <br>
        
    <table class="table table-bordered">
      <tr class="alert-default">
        <td style="width:1%">No</td>

        <td >Original Filename</td>
        <td >Filesize (bytes)</td>
        <td  style="width:15%">Date</td>
        <td>
          @if($isExpired === 0)
          Status File
          @else
          Result
          @endif


        </td>
        <td>Status</td>
      </tr>
      {{csrf_field()}}
      <?php $no=1;?>
      @foreach ($upload as $uploads)


      <tr class="item{{$uploads->id}} {{count($uploads->rubrics)>0?"alert-success":""}}">
       <td>{{$no++}}</td>
       <td>
         <a href="{{asset('uploads/'.$uploads->filename)}}" target="_blank"> <?php echo $uploads->original_filename?></a>
       </td>
       <td><?php echo $uploads->sizefile?></td>
       <td>{{ $uploads->created_at->format('d-m-Y H:i:s') }}</td>

       
       @if(!empty($uploads->assign_panel) && empty($uploads->rubrics)) 
       -- Assigned To Panel --
       @elseif(!empty($uploads->rubrics) && count($uploads->rubrics) > 0)
       <td>
            <center>{{$uploads->rubrics->sum('level')/(count($uploads->rubrics)*4) * 100}} %</center>
       </td>
       @else
       <td>
          <a id="delete-btn" href="" class="btn btn-danger form-control myModal" data-toggle="modal" data-upload_id="{{$uploads->id}}" data-target="#myModal">Delete</a>
       </td>
          @endif
      <td>
        <center>
        @if(empty($uploads->status)) 
            In Process...
        @else
          {{$uploads->status}}
        @endif
          
        
        </center>
      </td>

    </tr>

    @endforeach
  </table>



          <div>

          <button title="Upload Additional Files" type="button" class="btn btn btn-primary" onclick="uploadAdditionalFiles('{{$examCandidate->id}}','{{$category}}')">Upload Additional Files</button>'


          <div/>
          <br/>


              <table class="table table-bordered">
                <tr class="alert-default">
                  <td style="width:1%">No</td>

                  <td >Original Filename</td>
                  <td >Filesize (bytes)</td>
                  <td  style="width:15%">Date</td>
                 
                 
                </tr>
                {{csrf_field()}}
                <?php $no=1;?>
                @foreach ($uploadAdditional as $uploads)


                <tr class="item{{$uploads->id}} {{count($uploads->rubrics)>0?"alert-success":""}}">
                 <td>{{$no++}}</td>
                 <td>
                   <a href="{{asset('uploads/'.$uploads->filename)}}" target="_blank"> <?php echo $uploads->original_filename?></a>
                 </td>
                 <td><?php echo $uploads->sizefile?></td>
                 <td>{{ $uploads->created_at->format('d-m-Y H:i:s') }}</td>

              </tr>

              @endforeach
            </table>
            <!-- Table Specialized -->
            @if(!empty($eiaAssigment->specialized))
             <h2><label><font size="5">Specialized Question</font></label></h2>
             Question : {{$eiaAssigment->specialized}}<br>
             <button title="Upload Spec Files" type="button" class="btn btn btn-primary" onclick="uploadSpecFiles('{{$examCandidate->id}}','{{$category}}')">Upload Specialized Files</button>
            
            <table class="table table-bordered">
      <tr class="alert-default">
        <td style="width:1%">No</td>

        <td >Original Filename</td>
        <td >Filesize (bytes)</td>
        <td  style="width:15%">Date</td>
        <td>
          @if($isExpired === 0)
          Status File
          @else
          Result
          @endif


        </td>
        <td>Status</td>
      </tr>
      {{csrf_field()}}
      <?php $no=1;?>
      @foreach ($uploadS as $uploadx)
     

      <tr class="item{{$uploadx->id}} {{count($uploadx->rubrics)>0?"alert-success":""}}">
       <td>{{$no++}}</td>
       <td>
         <a href="{{asset('uploads/'.$uploadx->filename)}}" target="_blank"> <?php echo $uploadx->original_filename?></a>
       </td>
       <td><?php echo $uploadx->sizefile?></td>
       <td>{{ $uploadx->created_at->format('d-m-Y H:i:s') }}</td>

       
       @if(!empty($uploadx->assign_panel) && empty($uploadx->rubrics)) 
       -- Assigned To Panel --
       @elseif(!empty($uploadx->rubrics) && count($uploadx->rubrics) > 0)
       <td>
            <center>{{$uploadx->rubrics->sum('level')/(count($uploadx->rubrics)*4) * 100}} %</center>
       </td>
       @else
       <td>
          <a id="delete-btn" href="" class="btn btn-danger form-control myModal" data-toggle="modal" data-upload_id="{{$uploadx->id}}" data-target="#myModal">Delete</a>
       </td>
          @endif
      <td>
        <center>
        @if(empty($uploadx->status)) 
            In Process...
        @else
          {{$uploadx->status}}
        @endif
          
        
        </center>
      </td>

    </tr>
  
    @endforeach
  </table> 
   <div>

          <button title="Upload Additional Files" type="button" class="btn btn btn-primary" onclick="uploadAddspecFiles('{{$examCandidate->id}}','{{$category}}')">Upload Additional Files</button>'


          <div/>
          <br/>


              <table class="table table-bordered">
                <tr class="alert-default">
                  <td style="width:1%">No</td>

                  <td >Original Filename</td>
                  <td >Filesize (bytes)</td>
                  <td  style="width:15%">Date</td>
                 
                 
                </tr>
                {{csrf_field()}}
                <?php $no=1;?>
                @foreach ($uploadAS as $uploads)


                <tr class="item{{$uploads->id}} {{count($uploads->rubrics)>0?"alert-success":""}}">
                 <td>{{$no++}}</td>
                 <td>
                   <a href="{{asset('uploads/'.$uploads->filename)}}" target="_blank"> <?php echo $uploads->original_filename?></a>
                 </td>
                 <td><?php echo $uploads->sizefile?></td>
                 <td>{{ $uploads->created_at->format('d-m-Y H:i:s') }}</td>

              </tr>

              @endforeach
            </table>
  @endif
      </div>
                </td>
            </tr>
            
            @else
            <tr><td><center><h3>Please complete comprehensive exam</h3></center></td></tr>
            @endif
           
        </table>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm" style="left:auto">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><!--Assignment Submission--></h4>
            </div>
            <div class="modal-body">
              <p>Are you sure want to delete this file?</p>
            </div>
            <div class="modal-footer">
             <div class="row">
                                             
              <div class="col-sm-6">
                  <form action="/applicant_assigment/removeFile" method="post">
                      {!! csrf_field() !!}
                      <input type="hidden" name="id" id='upload_id'>
                      <input type="hidden" name="category" value="{{$category}}">
                      <button type="submit" class='btn btn-danger form-control'>Yes </button> 
                  </form>      
              </div>
              
              <div class="col-sm-6">  <button class='btn btn-info form-control' data-dismiss="modal">No </button></div>
              
             
             </div>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button> -->
           </div>
         </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        
     //delete file
        $(document).on("click", ".myModal", function () {
          var upload_id = $(this).data('upload_id');
          $("#upload_id").val(upload_id);
             
        });
    </script>
<script>
var isExpired = '{{$isExpired}}';    
    
function CountDownTimer(dt, id)
    {
        var end = new Date(dt);

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = 'EXPIRED!';
               
                if(isExpired === 0){
                    location.reload();
                }
                
               
                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);



            document.getElementById(id).innerHTML = days + 'days ';
            document.getElementById(id).innerHTML += hours + 'hrs ';
            document.getElementById(id).innerHTML += minutes + 'mins ';
            document.getElementById(id).innerHTML += seconds + 'secs';
        }

        timer = setInterval(showRemaining, 1000);



    }
    //08/28/2017 03:35 PM -- system
    //'8/28/2017 3:30 PM' --example
    CountDownTimer('{{$finishAssigmentTime}}', 'countdown');



        function uploadMainFiles($id, $category) {
          var url = "/upload_main_files/"+$id+"/"+$category;
          var newWindow = window.open(url,'popUpWindow','height=700,width=900,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
              newWindow.onbeforeunload = function () {
              window.top.close();
             }
        } 

  function uploadSpecFiles($id, $category) {
          var url = "/upload_spec_files/"+$id+"/"+$category;
          var newWindow = window.open(url,'popUpWindow','height=700,width=900,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
              newWindow.onbeforeunload = function () {
              window.top.close();
             }
        } 
        function uploadAdditionalFiles($id, $category) {
          var url = "/upload_additional_files/"+$id+"/"+$category;
          var newWindow = window.open(url,'popUpWindow','height=700,width=900,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
              newWindow.onbeforeunload = function () {
              window.top.close();
             }
        }
        function uploadAddspecFiles($id, $category) {
          var url = "/upload_addspec_files/"+$id+"/"+$category;
          var newWindow = window.open(url,'popUpWindow','height=700,width=900,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
              newWindow.onbeforeunload = function () {
              window.top.close();
             }
        }



</script>


</div>
@endsection
