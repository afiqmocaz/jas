<?php session_start(); ?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <title>Jabatan Alam Sekitar</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/justified-nav.css" rel="stylesheet" type="text/css">
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
    <link href="css/parsley.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>-->
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/justified-nav.css')!!}
    {!!Html::style('css/templatemo_style1.css')!!}
    {!!Html::style('css/parsley.css')!!}
    <style>
        p {
            text-indent: 30px;
        }

        
        li {
            float: left;
        }

        li a, .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover, .dropdown:hover .dropbtn {
            background-color: #00ad00;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #006e00;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 2;
        }

        .dropdown-content2 {
            display: none;
            position: absolute;
            background-color: #006e00;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            font-weight: bold;
            padding: 5px 27px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content2 a {
            color: black;
            font-weight: bold;
            padding: 5px 84.5px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {background-color: #00ad00}

        .dropdown-content2 a:hover {background-color: #00ad00}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropdown-content2 {
            display: block;
        }

        .dropbtn1 {
                background-color: #4CAF50;
                color: white;
                padding: 3px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                width: 900px;
                
            }

            .dropdown1 {
                position: relative;
                display: inline-block;
            }

            .dropdown-content1 {
                display: none;
                position: absolute;
                background-color: #d9ffb3;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                width: 900px;
            }

            .dropdown-content1 a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content1 a:hover {background-color: #f1f1f1}

            .dropdown1:hover .dropdown-content1 {
                display: block;
            }

            .dropdown1:hover .dropbtn1 {
                background-color: #3e8e41;
            }

            .parent {display: block;position: relative;float: left;line-height: 15px;background-color: #006e00;border-right:#006e00 1px solid;}
            .parent a{margin: 0px;color: #000000;text-decoration: none;}
            .parent:hover > ul {display:block;position:absolute;}
            .child {display: none;}
            .child li {background-color: #E4EFF7;line-height: 30px;border-bottom:#CCC 1px solid;border-right:#CCC 1px solid; width:100%;}
            .child li a{color: #000000;}
            ul{list-style: none;margin: 0;padding: 0px; min-width:10em;}
            ul ul ul{left: 100%;top: 31px;margin-left:1px;background-color: #008000;}
            li:hover {background-color: #95B4CA;}
            .parent li:hover {background-color: #F0F0F0;}

            .parent1 {display: block;position: relative;float: left;line-height: 15px;background-color: #006e00;border-right:#006e00 1px solid;}
            .parent1 a{margin: 0px;color: #000000;text-decoration: none;}
            .parent1:hover > ul {display:block;position:absolute;}
            .child1 {display: none;}
            .child1 li {background-color: #E4EFF7;line-height: 30px;border-bottom:#CCC 1px solid;border-right:#CCC 1px solid; width:100%;}
            .child1 li a{color: #000000;}
            ul{list-style: none;margin: 0;padding: 0px; min-width:10em;}
            ul ul ul{left: 100%;top: 0px;margin-left:1px;background-color: #008000;}
            li:hover {background-color: #95B4CA;}
            .parent1 li:hover {background-color: #F0F0F0;}

            body
                        {
                                counter-reset: Serial;           /* Set the Serial counter to 0 */
                            }

                        tr td:first-child:before
                            {
                              counter-increment: Serial;      /* Increment the Serial counter */
                              content:counter(Serial); /* Display the counter */
                            }

            
    </style>

    <script type="text/javascript">
        
        function AddData() {
    
        var rows = "";
        var id = "";
        var status = "IETS";
        var types = $('input[name="toq"]:checked').val();
        var que = document.getElementById('quest').value;
        var img = "";
        var i = document.getElementById("i").innerHTML;
        var sa1 = document.getElementById('sub1').value;
        var ii = document.getElementById("ii").innerHTML;
        var sa2 = document.getElementById('sub2').value;
        var iii = document.getElementById("iii").innerHTML;
        var sa3 = document.getElementById('sub3').value;
        var iv = document.getElementById("iv").innerHTML;
        var sa4 = document.getElementById('sub4').value;
        var a = document.getElementById("a").innerHTML;
        var a1 = document.getElementById('ans1').value;
        var b = document.getElementById("b").innerHTML;
        var a2 = document.getElementById('ans2').value;
        var c = document.getElementById("c").innerHTML;
        var a3 = document.getElementById('ans3').value;
        var d = document.getElementById("d").innerHTML;
        var a4 = document.getElementById('ans4').value;
        var sel = document.getElementById('ca');
        var selected = sel.options[sel.selectedIndex];
        var extra = selected.getAttribute('data-foo');
        var rr = document.getElementById('rr').value;
        var loq = $('input[name="loq"]:checked').val();
        var btn = document.getElementById("but").innerHTML;
        var by = document.getElementById("by").innerHTML;

        rows += "<tr><td rowspan=4>" + id + "</td><td rowspan=4>" + status + "</td><td rowspan=4>" + types + "</td><td rowspan=4>" + que + "</td><td rowspan=4>" + img + "</td><th>" + i + "</th><td>" + sa1 + "</td><th>" + a + "</th><td>" + a1 + "</td><td rowspan=4>" + extra + "</td><td rowspan=4>" + rr + "</td><td rowspan=4>" + loq + "</td><td rowspan=4>" + btn + "</td><td rowspan=4>" + by + "</td><td></tr>" + "<tr><th>" + ii + "</th><td>" + sa2 + "</td><th>" + b + "</th><td>" + a2  + "</td><td></tr>" + "</td><th>" + iii + "</th><td>" + sa3 + "</td><th>" + c + "</th><td>" + a3 + "</td><td></tr>" + "</td><th>" + iv + "</th><td>" + sa4 + "</td><th>" + d + "</th><td>" + a4 + "</td><td></tr>";
        $(rows).appendTo("#list tbody");
        var tr = document.createElement("tr");

        tr.innerHTML = rows;
        tbody.appendChild(tr)
}

    function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("list").deleteRow(i);
    document.getElementById("list").deleteRow(i);
    document.getElementById("list").deleteRow(i);
    document.getElementById("list").deleteRow(i);
}

    </script>

</head>
<body>
    <div id="main_container">
        <div>
            {{ HTML::image('images/banner1.png', 'a header image', array('class' => 'img-responsive cleaner', 'width' => '2048', 'height' => '100')) }}

            <div class="navbar templatemo-nav" id="navbar">

                
            
                <div class="navbar-header">                 
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav nav-justified" id="menu">
                    <li><a href="{{ url('ietsindex/create') }}">HOME</a></li>
                      <li><a href="{{ url('ietsannounce/show') }}">ANNOUNCEMENT</a></li>
                      <li class="dropdown"><a class="dropbtn">APPLICANT</a>
                        <div class="dropdown-content">
                          <a href="{{ url('ietsapplicant/create') }}">Applicant Registration</a>
                          <a href="{{ url('paymentview/iets') }}">Applicant Payment</a>
                        </div>
                      </li>
                      <li class="dropdown"><a class="dropbtn">MANAGE</a>
                        <div class="dropdown-content">
                          <a href="{{ url('ietssyllabus/show') }}">Syllabus</a>
                          <a href="{{ url('ietsrefference/show') }}">Reference</a>
                          <ul class="parent" ><a href="#">Comprehensive Examination <span class="caret"></span></a>
                            <ul class="child" >
                            <a href="{{ url('schedule/iets') }}">Schedule</a>
                            <a href="{{ url('quizModul/view/exam/iets') }}">Generating Question</a></ul></ul>
                            <ul class="parent1" ><a href="#">Assignment&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="caret"></span></a>
                            <ul class="child1" >
                             <a href="{{ url('ietsassignment/show') }}">PCER Format</a>
                          <a href="{{ url('/secretariat_assigment/apcs') }}">Applicant Assignment</a></ul></ul>
                          
                          <a href="{{ url('interview/iets') }}">Professional Interview</a>
                        </div>
                      </li>
                      <li class="dropdown"><a class="dropbtn">REPORT</a>
                        <div class="dropdown-content">
                          <a href="{{ url('cert/iets') }}">Certificate</a>
                          <a href="{{ url('ietscpd/create') }}">Continuous Professional Development</a>
                        </div>
                      </li>
                       <li class="dropdown"><a class="dropbtn">PROFILE</a>
                     
                                 <div class="dropdown-content">
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> {{ Auth::user()->name }} <br>{{ Auth::user()->nric }} <br>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        </div>
                                    </li>
                               
                      </ul>
                </div> <!-- nav -->
	      	</div>

	      	<div class="breadcrumb flat">
				    <a href="#">SECRETARIAT IETS</a>
				    <a href="#">MANAGE</a>
				    <a href="#">Comprehensive Exam</a>
				    <a class="active" style="color: white">Question Generation</a>        
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

				<div class="row" id="thumbnails_container">      
				<div class="col-md-12 col-md-offset-0">
				
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

                            {!! Form::model($question, ['route' =>['ietsquestion.update', $question->id], 'method' => 'PUT', 'files' => true]) !!}
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
                                                   {{ Form::select('ietsrelated_id', $ietsrelates, null, ['class' => 'form-control', 'style' => 'width:97.7%']) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    
                                                        <div id="check">
                                                            <input type="checkbox" class="maxtickets_enable_cb1" name="opwp_wootickets[tickets][0][enable]">Add New Related Reference

                                                            <div class="max_tickets1">
                                                                <iframe src="{{ url('ietsrelated') }}" width="500" height="500" scrolling="yes">
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
                                         {!! Html::linkRoute('ietsquestion.show', 'Cancel', array($question->id), array('class' => 'btn btn-danger' )) !!}
                                       
					
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
        
    {!! Html::script('js/parsley.min.js')!!}
	{!! Html::script('js/jquery.js')!!}
	{!! Html::script('js/bootstrap.min.js')!!}
	{!! Html::script('js/templatemo_script.js')!!}
    <!-- templatemo 393 fantasy -->
    <!--<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>-->
    <script type="text/javascript">
	jQuery(document).ready(function($) {
   // STOCK OPTIONS
	$('input.maxtickets_enable_cb1').change(function(){
		if ($(this).is(':checked'))
    $(this).next('div.max_tickets1').show();
else
    $(this).next('div.max_tickets1').hide();
	}).change();
});
</script>
</body>
</html>