@extends($master)
@section('js')
@endsection
@section('content') 
				
    			<h1>Virtual Self-Learning<br></h1>   
    			<h2>Question Generation<br></h2> 

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
				  </div>
				  <script>
				  $(document).ready(function(){
				    $('[data-toggle="popover"]').popover();   
				  });
				  </script>
				  <br>

                            {!! Form::model($question, ['route' =>['eiaqs.update', $question->id], 'method' => 'PUT', 'files' => true]) !!}
                            <table class="table table-bordered">
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
                                        {{ Form::text('limg', null, ['class' => 'form-control', 'style' => 'width:100%']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alert-info" >Module</td>
                                    <td>
                                        <select id="module" name="module" class="form-control" required="">
                                            <option data-foo="" name="" value="0" disabled="true" selected="true">--Please Select--</option>
                                            @foreach($quizModule as $module)
                                            @if((int)$question->module === (int)$module->id)
                                            <option value="{{$module->id}}" selected="true">{{$module->name}}</option>
                                            @else
                                             <option value="{{$module->id}}">{{$module->name}}</option>
                                            @endif
                                           
                                            @endforeach
                                            
                                            
                                        </select>

                                    </td>
                                </tr>
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
                                                    {{ Form::textarea('i', null, ['class' => 'form-control', 'style' => 'width:100%', 'rows' => '4', 'cols' => '65']) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alert-success">ii</td>
                                                <td>
                                                   {{ Form::textarea('ii', null, ['class' => 'form-control', 'style' => 'width:100%', 'rows' => '4', 'cols' => '65']) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="alert-success">iii</td>
                                                <td>
                                                  {{ Form::textarea('iii', null, ['class' => 'form-control', 'style' => 'width:100%', 'rows' => '4', 'cols' => '65']) }}
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td class="alert-success">iv</td>
                                                <td>
                                                 {{ Form::textarea('iv', null, ['class' => 'form-control', 'style' => 'width:100%', 'rows' => '4', 'cols' => '65']) }}
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="alert-info" >Answer</td>
                                    <td>
                                        <table class="table table-bordered">
                                            
                                           
                                            <div id class="hide">{{$countH = 0}}</div>
                                            @foreach ($question->options as $option)
                                            <tr>
                                                <td width="1%"class="alert-warning">
                                                    @if($countH === 0)
                                                    A 
                                                    @elseif($countH === 1)
                                                    B
                                                    @elseif($countH === 2)
                                                    C
                                                    @elseif($countH === 3)
                                                    D
                                                    @endif
                                                     <div id class="hide">{{$countH++}}</div>
                                                   
                                                </td>
                                               
                                                <td>
						    @if($option->question_id == $question->id)
                                                    {!! Form::textarea('option'.$countH, $option->option, ['class' => 'form-control ', 'placeholder' => '', 'id' => 'a', 'required' => '', 'style' => 'width:100%;', 'size' => '50x4']) !!}
						    @endif
                                                </td>
                                             </tr>
                                             
					     @endforeach

						    <p class="help-block"></p>
			                    @if($errors->has('option4'))
			                        <p class="help-block">
			                            {{ $errors->first('option4') }}
			                        </p>
			                    @endif
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
                                                   {{ Form::select('eiarelated_id', $eiarelates, null, ['class' => 'form-control', 'style' => 'width:97.7%']) }}
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
                                <tr>
                                    <td colspan="2" align="center">
                                        
                                         {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                                         {!! Html::linkRoute('eiaqs.show', 'Cancel', array($question->id), array('class' => 'btn btn-danger' )) !!}
                                       
					
                                    </td>
                                </tr>
                            </table>
                            {!! Form::close() !!}     
				 		
				 
				 <script src="js/parsley.min.js"></script>      
				 <script type="text/javascript">
  				$('#form').parsley();
  				</script>
 
				</div>
				</div>
				</div>



				                
			</div> <!-- thumbnail area -->  
		
		<footer>
			<div class="credit row">
				<center><div class="col-md-6 col-md-offset-3">
					<div id="templatemo_footer">
						Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
					</div>
				</div>
						
			</div>
		</footer>
	</div><script>
							function myFunction(input){
							    var x = document.getElementById("original_filename");
							    var txt = "";
							    if ('files' in x) {
							        if (x.files.length == 0) {
							            txt = "Select one or more files.";
							        } else {
							            for (var i = 0; i < x.files.length; i++) {
							                txt += "<br><strong>" + (i+1) + ". </strong>";
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
							            txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
							        }
							    }
							    document.getElementById("demo").innerHTML = txt;
							}
							</script>

@endsection