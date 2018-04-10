@extends($master)
@section('js')
@endsection
@section('header', 'EIA: Virtual Self-Learning')
@section('content') 

            <div class="container">      
                <h1>Virtual Self-Learning<br></h1>   
                <h2><b><font color="blue">{{$title}}</font></b> - Question Generation<br></h2> 

                <!-- INSTRUCTION -->
                <div style="width: 100%;" class="panel-group" >
                    <div class="panel panel-primary" style="border-color:#4CAF50;">
                        <div class="panel-heading" style="background-color:#4CAF50;" >
                            <h4 class="panel-title" style="color:white;">
                                <a data-toggle="collapse" href="#collapse1">Question Generation Instruction :</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                •  Secretariat EIA can enter question,Answer (A,B,C,D) and correct answer at the text field provided.<br>
                                •  Secretariat EIA can click button "Save" to save the question of comprehensive examination.
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function () {
                        $('[data-toggle="popover"]').popover();
                    });
                </script>
        
                <button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal2">Add New</button>

            </div>

            <div class="container" >
                <br>
                <table class="table table-bordered" width="50%" align="center">
                    <thead class="alert-success">
                    <th style="width:1%;">No.</th>
                    <th style="width:7%;"><center>Image</center></th>
                    <th style="width:10%;">Module</th>
                    <th style="width:17%;">Question</th>
                    @if($type === 'exam')
                          <th style="width:17%;">Difficulty Level</th>
                    @else
                    @endif
                    <th style="width:17%;">Sub-Answer</th>
                    <th style="width:17%;">Answer</th>
                    <th style="width:7%;">Correct Answer</th>
                    <th style="width:7%;">Related Reference</th>
                    <th style="width:10%;" colspan="3"><center>Action</center></th>
                    </thead>
                    <tbody>
                    <div class="hide">{{$countRow = 1}}</div>
                    @foreach($questions as $eiaquestions)
                    <tr>
                        <td>{{$countRow++}}</td>
                        <td>
                    <center>
                        @if(!empty($eiaquestions->original_filename))
                        <img class="file" src="/uploads/{{$eiaquestions->original_filename}}" width="100px"></img><a class="file" href="/uploads/{{$eiaquestions->original_filename}}"><br><center>{{$eiaquestions->limg}}</center></img>
                            @else
                            -
                            @endif
                    </center>
                    </td>
                    <td>{{$eiaquestions->quizModule->name}}</td>
                    <td>{{$eiaquestions->question}}</td>
                    @if($type === 'exam')
                    <td>
                    <center>
                        @foreach($difficulty_level as $level)
                            @if($level->code === $eiaquestions->difficulty_level)
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
                        @endforeach
                    </center>
                    </td>     
                    @else
                    @endif
                    <td>I. {{$eiaquestions->i}} <br> ii. {{$eiaquestions->ii}} <br> iii. {{$eiaquestions->iii}} <br> iv. {{$eiaquestions->iv}}</td>
                    <td>
                        @foreach($eiaquestions->options as $option)
                        {{ $option->option }}<br>
                        @endforeach
                    </td>
                    <td>
                        {{ $eiaquestions->correctOption[0]->option}}
                    </td>
                    <td>
                        @if(!empty($eiaquestions->eiarelated))
                            {{$eiaquestions->eiarelated->eiarelated}}</td>
                        @endif
                    <td>
                    <center>
                        <a class="btn btn-warning form-control" href="{{ route('eiaqs.edit', $eiaquestions->id) }}" >Edit</a> 

                        {!! Form::open(['route' => ['eiaqs.destroy', $eiaquestions->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
                            <button type="submit" class="btn btn-danger form-control">Remove</button>
                        {!! Form::close() !!}
                        </td>

                        </tr>

                        @endforeach
                        </tbody>
                </table>

            </div> <!-- thumbnail area -->  
            <div class="container">
                <button class="btn btn-default pull-right" onclick="location.href='/quizModul/view/{{$type}}/{{$category}}'">Back</button>
            </div>
            <br>
            <footer>
                <div class="credit row">
                    <center><div class="col-md-6 col-md-offset-3">
                            <div id="templatemo_footer">
                                Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
                            </div>
                        </div>

                </div>
            </footer>

                          



            <!-- Modal -->
             {!! Form::open(array('url'=>'eiaqs/uploadFiles', 'route'=> ['eiaqs.store'], 'data-parsley-validate' => '', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'files'=>true)) !!}
            <div id="myModal2" class="modal fade" role="dialog">
                <input type="hidden" id="module" name="module" value="{{$moduleId}}" />
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header btn-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                
                                  @if($type === 'exam')
                                     <tr>
                                    <td class="alert-info" >
                                        Question Level
                                    </td>
                                 
                                    <td>
                                        <select id="difficulty_level" name="difficulty_level" class="form-control" required="" style="width:97.7%">
                                        <option value="0" selected="true">--Please Select--</option>
                                        @foreach($difficulty_level as $level)
                                          <option value="{{$level->code}}">{{$level->name}}</option>
                                        @endforeach
                                        </select>
                                    </td>
                                     

                                </tr>
                                  @else
                                  @endif
                               
                                <tr>
                                    <td class="alert-info" >
                                        Upload Image(If Needed)
                                    </td>
                                    <td>
                                        <input type="file" id="fileToUpload" name="fileToUpload[]" class="form-control"  style="width:100%" accept="image/*" onchange="myFunction(this)" multiple>
                                        <br>
                                        File Type: image files	|	Max File Upload: 10	|	Max Size Upload: 10MB
                                    </td>

                                </tr>
                                <tr>
                                    <td class="alert-info" >Image Label</td>
                                    <td>
                                        <input type="text" id="limg" name="limg" class="form-control" style="width:100%">
                                    </td>
                                </tr>
<!--                                <tr>
                                    <td class="alert-info" >Module</td>
                                    <td>
                                        <select id="module" name="module" class="form-control" required="">
                                            <option data-foo="" name="" value="0" disabled="true" selected="true">--Please Select--</option>
                                            @foreach($quizModule as $module)
                                            <option value="{{$module->id}}">{{$module->name}}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                </tr>-->
                                <tr>
                                    <td class="alert-info" >Question</td>
                                    <td>
                                        {!! Form::textarea('question', old('question'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'question', 'required' => '', 'style' => 'width:100%;',
                                        'size' => '50x4']) !!}
                                        </div><br>
                                        <p class="help-block"></p>
                                        @if($errors->has('question'))
                                        <p class="help-block">
                                            {{ $errors->first('question') }}
                                        </p>
                                        @endif


                                    </td>
                                </tr>
                                <tr>
                                    <td class="alert-info" >Sub-Answer</td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td width ="1%"class="alert-success">i</td>
                                                <td>
                                                    <textarea id="i" name="i" class="form-control control-label" style="width:100%" rows="2" cols="50"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alert-success">ii</td>
                                                <td>
                                                    <textarea id="ii" name="ii" class="form-control control-label" style="width:100%" rows="2" cols="50"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alert-success">iii</td>
                                                <td>
                                                    <textarea id="iii" name="iii" class="form-control control-label" style="width:100%" rows="2" cols="50"></textarea>
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td class="alert-success">iv</td>
                                                <td>
                                                    <textarea id="iv" name="iv" class="form-control control-label" style="width:100%" rows="2" cols="50"></textarea>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="alert-info" >Answer</td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td width ="1%"class="alert-success">A</td>
                                                <td>
                                                    {!! Form::textarea('option1', old('option1'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'a', 'required' => '', 'style' => 'width:100%;', 'size' => '50x2']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('option1'))
                                                    <p class="help-block">
                                                        {{ $errors->first('option1') }}
                                                    </p>
                                                    @endif

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alert-success">B</td>
                                                <td>
                                                    {!! Form::textarea('option2', old('option2'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'a', 'required' => '', 'style' => 'width:100%;', 'size' => '50x2']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('option2'))
                                                    <p class="help-block">
                                                        {{ $errors->first('option2') }}
                                                    </p>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alert-success">C</td>
                                                <td>
                                                    {!! Form::textarea('option3', old('option3'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'a', 'required' => '', 'style' => 'width:100%;', 'size' => '50x2']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('option3'))
                                                    <p class="help-block">
                                                        {{ $errors->first('option3') }}
                                                    </p>
                                                    @endif
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td class="alert-success">D</td>
                                                <td>
                                                    {!! Form::textarea('option4', old('option4'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'a', 'required' => '', 'style' => 'width:100%;', 'size' => '50x2']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('option4'))
                                                    <p class="help-block">
                                                        {{ $errors->first('option4') }}
                                                    </p>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="alert-info" >Correct Answer</td>
                                    <td>
                                        {!! Form::select('correct', $correct_options, old('correct'), ['class' => 'form-control', 'style' => 'width:100%']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('correct'))
                                        <p class="help-block">
                                            {{ $errors->first('correct') }}
                                        </p>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td class="alert-info" >Related Refference</td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>
                                                    <select id="eiarelated" name="eiarelated_id" class="form-control" required="" style="width:97.7%">
                                                        <option value="0" disabled="true" selected="true">--Please Select--</option>

                                                        @foreach($eiarelates as $catr)
                                                        <option value="{!! $catr->id !!}">{!! $catr->eiarelated !!}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    
                                                        <div id="check">
                                                            <input type="checkbox" class="maxtickets_enable_cb1" name="opwp_wootickets[tickets][0][enable]">Add New Related Reference

                                                            <div class="max_tickets1">
                                                                <iframe src="{{ url('eiarelated') }}" width="500" height="500" scrolling="yes">
                                                                <p>Your browser does not support iframes.</p>
                                                                </iframe>
                                                            </div>
                                                        </div>
                                                   
                                                </td>
                                            </tr>
                                        </table>


                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {{Form::submit('Save', array('style' => 'background-color: green' ,'class' => 'btn btn-success'))}}
                          
                        </div>
                    </div>

                </div>
            </div>
          <script>
                function myFunction(input) {
                                    var x = document.getElementById("fileToUpload");
                                    var txt = "";
                                    if ('files' in x) {
                                        if (x.files.length == 0) {
                                            txt = "Select one or more files.";
                                        } else {
                                            for (var i = 0; i < x.files.length; i++) {
                                                txt += "<br><strong>" + (i + 1) + ". </strong>";
                                                var file = x.files[i];
                                                if ('name' in file) {
                                                    txt += "Name: " + file.name + "<br>";
                                                }
                                                if ('size' in file) {
                                                    txt += "&nbsp&nbsp&nbsp Size: " + file.size + " bytes <br>";

                                                }
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        $('#blah')
                                                                .attr('src', e.target.result)

                                                    };

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        }
                                    }
                                    else {
                                        if (x.value == "") {
                                            txt += "Select one or more files.";
                                        } else {
                                            txt += "The files property is not supported by your browser!";
                                            txt += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
                                        }
                                    }
                                    document.getElementById("demo").innerHTML = txt;
                                }
                                
                                  function ConfirmDelete() {
                                        var txt;
                                        var r = confirm("Are you sure want to delete ");
                                        if (r) {
                                            return true;
                                        } else {
                                            return false;
                                        }
   
                                  }
          </script>
            {!! Form::close() !!}
           @endsection