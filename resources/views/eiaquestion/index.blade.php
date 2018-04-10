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

			.breadcrumb {
				/*centering*/
				/*display: inline-block;*/
				/*box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.35);
				overflow: hidden;*/
				border-radius: 5px;
				/*Lets add the numbers for each link using CSS counters. flag is the name of the counter. to be defined using counter-reset in the parent element of the links*/
				counter-reset: flag; 
			}

			.breadcrumb a {
				text-decoration: none;
				outline: none;
				display: block;
				float: left;
				font-size: 12px;
				line-height: 36px;
				color: white;
				/*need more margin on the left of links to accomodate the numbers*/
				padding: 0 10px 0 30px;
				background: #666;
				background: linear-gradient(#666, #333);
				position: relative;
			}
			/*since the first link does not have a triangle before it we can reduce the left padding to make it look consistent with other links*/
			.breadcrumb a:first-child {
				padding-left: 15px;
				border-radius: 5px 0 0 5px; /*to match with the parent's radius*/
			}
			.breadcrumb a:first-child:before {
				left: 14px;
			}
			.breadcrumb a:last-child {
				border-radius: 0 5px 5px 0; /*this was to prevent glitches on hover*/
				padding-right: 20px;
			}

			/*hover/active styles*/
			.breadcrumb a.active, .breadcrumb a:hover{
				background: #333;
				background: linear-gradient(#333, #000);
			}
			.breadcrumb a.active:after, .breadcrumb a:hover:after {
				background: #333;
				background: linear-gradient(135deg, #333, #000);
			}

			/*adding the arrows for the breadcrumbs using rotated pseudo elements*/
			.breadcrumb a:after {
				content: '';
				position: absolute;
				top: 0; 
				right: -18px; /*half of square's length*/
				/*same dimension as the line-height of .breadcrumb a */
				width: 36px; 
				height: 36px;
				/*as you see the rotated square takes a larger height. which makes it tough to position it properly. So we are going to scale it down so that the diagonals become equal to the line-height of the link. We scale it to 70.7% because if square's: 
				length = 1; diagonal = (1^2 + 1^2)^0.5 = 1.414 (pythagoras theorem)
				if diagonal required = 1; length = 1/1.414 = 0.707*/
				transform: scale(0.707) rotate(45deg);
				/*we need to prevent the arrows from getting buried under the next link*/
				z-index: 1;
				/*background same as links but the gradient will be rotated to compensate with the transform applied*/
				background: #666;
				background: linear-gradient(135deg, #666, #333);
				/*stylish arrow design using box shadow*/
				box-shadow: 
					2px -2px 0 2px rgba(0, 0, 0, 0.4), 
					3px -3px 0 2px rgba(255, 255, 255, 0.1);
				/*
					5px - for rounded arrows and 
					50px - to prevent hover glitches on the border created using shadows*/
				border-radius: 0 5px 0 50px;
			}
			/*we dont need an arrow after the last link*/
			.breadcrumb a:last-child:after {
				content: none;
			}
			/*we will use the :before element to show numbers*/
			/*.breadcrumb a:before {
				content: counter(flag);
				counter-increment: flag;
				/*some styles now
				border-radius: 100%;
				width: 20px;
				height: 20px;
				line-height: 20px;
				margin: 8px 0;
				position: absolute;
				top: 0;
				left: 30px;
				background: #444;
				background: linear-gradient(#444, #222);
				font-weight: bold;
			}*/


			.flat a, .flat a:after {
				background: #a5f5a8;
				color: black;
				transition: all 0.5s;
			}
			.flat a:before {
				background: white;
				box-shadow: 0 0 0 2px #006e00;
			}
			.flat a:hover, .flat a.active, 
			.flat a:hover:after, .flat a.active:after{
				background: #00cc44;
			}

	</style>

	<script type="text/javascript">

	function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }
		
// 		function AddData() {
    
//         var rows = "";
//         var id = "";
//         var status = "IETS";
//         var types = $('input[name="type"]:checked').val();
//         var que = document.getElementById('quest').value;
//         var img = "";
//         var i = document.getElementById("i").innerHTML;
//         var sa1 = document.getElementById('sub1').value;
//         var ii = document.getElementById("ii").innerHTML;
//         var sa2 = document.getElementById('sub2').value;
//         var iii = document.getElementById("iii").innerHTML;
//         var sa3 = document.getElementById('sub3').value;
//         var iv = document.getElementById("iv").innerHTML;
//         var sa4 = document.getElementById('sub4').value;
//         var a = document.getElementById("a").innerHTML;
//         var a1 = document.getElementById('ans1').value;
//         var b = document.getElementById("b").innerHTML;
//         var a2 = document.getElementById('ans2').value;
//         var c = document.getElementById("c").innerHTML;
//         var a3 = document.getElementById('ans3').value;
//         var d = document.getElementById("d").innerHTML;
//         var a4 = document.getElementById('ans4').value;
//         var sel = document.getElementById('ca');
// 		var selected = sel.options[sel.selectedIndex];
// 		var extra = selected.getAttribute('data-foo');
// 		var rr = document.getElementById('rr').value;
// 		var loq = $('input[name="level"]:checked').val();
// 		var btn = document.getElementById("but").innerHTML;
// 		var by = document.getElementById("by").innerHTML;

//         rows += "<tr><td rowspan=4>" + id + "</td><td rowspan=4>" + status + "</td><td rowspan=4>" + types + "</td><td rowspan=4>" + que + "</td><td rowspan=4>" + img + "</td><th>" + i + "</th><td>" + sa1 + "</td><th>" + a + "</th><td>" + a1 + "</td><td rowspan=4>" + extra + "</td><td rowspan=4>" + rr + "</td><td rowspan=4>" + loq + "</td><td rowspan=4>" + btn + "</td><td rowspan=4>" + by + "</td></tr>" + "<tr><th>" + ii + "</th><td>" + sa2 + "</td><th>" + b + "</th><td>" + a2  + "</td></tr>" + "<tr><th>" + iii + "</th><td>" + sa3 + "</td><th>" + c + "</th><td>" + a3 + "</td></tr>" + "<tr><th>" + iv + "</th><td>" + sa4 + "</td><th>" + d + "</th><td>" + a4 + "</td></tr>";
//         $(rows).appendTo("#list tbody");
//         var tr = document.createElement("tr");

//         tr.innerHTML = rows;
//         tbody.appendChild(tr)
// }

(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);

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
			        <ul class="nav nav-justified">
					<li class="active"><a href="{{ url('eiaindex/create') }}">HOME</a></li>
	                  <li><a href="{{ url('eiaannounce/show') }}">ANNOUNCEMENT</a></li>
			          <li class="dropdown"><a class="dropbtn">APPLICANT</a>
					    <div class="dropdown-content">
					      <a href="{{ url('eiaapplicant/create') }}">Applicant Registration</a>
					      <a href="{{ url('paymentview/eia') }}">Applicant Payment</a>
					    </div>
					  </li>
			          <li class="dropdown"><a class="dropbtn">MANAGE</a>
					    <div class="dropdown-content">
					      <ul class="parent" ><a href="#">Virtual Self-Learning <span class="caret"></span></a>
							<ul class="child" >
							
					      <a href="{{ url('quizModul/view/quiz/eia') }}">Module and Quiz</a>
					      </ul>
                          </ul>
					      
					      
					      <ul class="parent" ><a href="#">Comprehensive Examination <span class="caret"></span></a>
							<ul class="child" >
							<a href="{{ url('schedule/eia') }}">Schedule</a>
							<a href="{{ url('quizModul/view/exam/eia') }}">Generating Question</a></ul></ul>
							<ul class="parent1" ><a href="#">Assignment&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="caret"></span></a>
							<ul class="child1" >
							 <a href="{{ url('eiaassignment/show') }}">Course Assignment</a>
					      <a href="{{ url('secretariat_assigment/eia') }}">Applicant Assignment</a></ul></ul>
					      <a href="{{ url('interview/eia') }}">Professional Interview</a>
					    </div>
					  </li>
					  <li class="dropdown"><a class="dropbtn">REPORT</a>
					    <div class="dropdown-content">
					      <a href="{{ url('cert/eia') }}">Certificate</a>
					      <a href="{{ url('eiacpd/create') }}">Continuous Professional Development</a>
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
				    <a href="#">SECRETARIAT EIA</a>
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
				
    			<h1>Comprehensive Exam<br></h1>   
    			<h2>Question Generation<br></h2> 

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
						•  Secretariat EIA can select Type of Question and Level of Question at the radio button provided.<br>
						•  Secretariat EIA can click button "Save" to save the question of comprehensive examination.<br>
						•  Secretariat EIA can view the previous filled question in the table below.<br>
						•  Secretariat EIA can click "Edit" button to edit the question.<br>
						•  Secretariat EIA can click "X" button to delete the question.<br>
						•  Secretariat EIA can click button "Save" to save the question of Comprehensive Exam.
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

    			{!! Form::open(array('route' => 'eiaquestion.store', 'data-parsley-validate' => '', 'files' => true)) !!}
					    <div class="form-group">
							<label><br>Upload Image(If Needed) : </label><br>
								<center><input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" onchange="myFunction(this)" multiple>
    							
					      <br></center><p id="demo"></p>
					      <script>
							function myFunction(input){
							    var x = document.getElementById("fileToUpload");
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
							                    txt += "&nbsp&nbsp&nbsp Size: " + file.size + " bytes <br>" + "<img id='blah' src='#'' alt='your image' width='500px'/>";
							                    
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
					      <label><b>File Type: image files	|	Max File Upload: 10	|	Max Size Upload: 10MB</b><br><br></label>

							<div class="form-group">

							

							<label for="usr">Type of Question &nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							  <input type="radio" name="type" value="Module"> Module
							  <input type="radio" name="type" value="Sub-Module"> Sub-Module<br>
							

							<br><label for="usr">Question &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>&nbsp&nbsp&nbsp&nbsp
					      	<textarea id="quest" name="question" required="" max="255" rows="4" cols="50"></textarea>

					      	<br><br>
					      	<label for="usr">Sub-Answer &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">i.</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <textarea id="sub1" name="i" rows="3" cols="65"></textarea><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">ii.</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <textarea id="sub2" name="ii" rows="3" cols="65"></textarea><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">iii.</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <textarea id="sub3" name="iii" rows="3" cols="65"></textarea><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">iv.</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp      
					      	  <textarea id="sub4" name="iv" rows="3" cols="65"></textarea><br><br>

					      	<br><br>
					      	<label for="usr">Answer &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">A</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <textarea id="ans1" name="a" required="" rows="3" cols="65"></textarea><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">B</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <textarea id="ans2" name="b" required="" rows="3" cols="65"></textarea><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">C</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
					      	  <textarea id="ans3" name="c" required="" rows="3" cols="65"></textarea><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">D</label>   &nbsp&nbsp&nbsp&nbsp&nbsp    
					      	  <textarea id="ans4" name="d" required="" rows="3" cols="65"></textarea><br><br>

					      	<label for="usr">Correct Answer &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<select id="ca" name="correct" required="">
					      	<option data-foo="">--Please Choose--</option>
					      	<option data-foo="A">A</option>
					      	<option data-foo="B">B</option>
					      	<option data-foo="C">C</option>
					      	<option data-foo="D">D</option>
					      	</select>
					      	<br><br><label for="usr">Related Reference&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="rr" name="related" required=""><br><br>
					      	

							<label for="usr">Level of Question &nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<!-- {{Form::radio('loq', 'low', true)}}
							{{Form::label('Low')}}
							{{Form::radio('loq', 'medium', false)}}
							{{Form::label('Medium')}}
							{{Form::radio('loq', 'High', false)}}
							{{Form::label('High')}} -->
							  <input type="radio" name="level" value="Low"> Low
							  <input type="radio" name="level" value="Medium"> Medium
							  <input type="radio" name="level" value="High"> High<br>
							

					    </div>
					    {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}

					    <br><br><hr>

					    <form action="{{ url('eiabank/create') }}" method="get">
					    <input type="submit" class="btn btn-success" value="Question Bank"/><br><br>
					  {!! Form::close() !!}      
				 
				  		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<input type="search" class="light-table-filter" data-table="order-table"  placeholder="Search..." style="width: 222px;"><br><br>

				<div class="table-responsive">
				<table class="order-table table" id="list">
				    <thead>
				      <tr>
				        <th>No.</th>
				        <th><center>Status</center></th>
				        <th>Type of Question</th>
				        <th><center>Image</center></th>
				        <th>Question</th>
				        <th colspan="2">Sub-Answer</th>
				        <th colspan="2">Answer</th>
				        <th>Correct Answer</th>
				        <th>Related Reference</th>
				        <th>Level of Question</th>
				        <th><center>Action</center></th>
				        <th><center>Uploaded By</center></th>
				      </tr></thead>
				      <tbody>
						@foreach($eiaquestion as $eiaquestions)
				      <tr>
				        <td rowspan="4"></td>
				        <td rowspan="4">APCS</td>
				        <td rowspan="4">{{$eiaquestions->type}}</td>
				        <td rowspan="4"><img class="file" src="/images/{{$eiaquestions->fileToUpload}}" width="200px"></img><a class="file" href="/images/{{$eiaquestions->fileToUpload}}">{{$eiaquestions->fileToUpload}}</img></td>
				        <td rowspan="4">{{$eiaquestions->eiaquestion}}</td>
				        <th id="i">I</th>
				        <td>{{$eiaquestions->i}}</td>
				        <th id="a">A</th>
				        <td>{{$eiaquestions->a}}</td>
				        <td rowspan="4">{{$eiaquestions->correct}}</td>
				        <td rowspan="4">{{$eiaquestions->related}}</td>
				        <td rowspan="4">{{$eiaquestions->level}}</td>
				        <td rowspan="4" id="but"><button>Approve<br>eiaQuestion</button><br><br>
				        <center><a href="{{ route('eiaquestion.edit', $eiaquestions->id) }}" >
				        	{{ HTML::image('images/edit.png', 'a Edit', array('class' => 'img-responsive cleaner', 'width' => '15', 'height' => '15')) }}</a> </center><br>


				        <td><center><a href="{{ route('eiaexamoption.index') }}" >
				        	{{ HTML::image('images/edit.png', 'a Edit', array( 'width' => '20', 'title' => 'Edit Options')) }}</a> </center><br></td>
				        	{!! Form::open(['route' => ['eiaquestion.destroy', $eiaquestions->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

				        	<center>{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit', 'class' => 'img-responsive cleaner', 'width' => '15', 'height' => '15'] ) !!}</center>

				        	{!! Form::close() !!}
				        	</td>
				        <td rowspan="4" id="by" rowspan="4">Aizat Hamdan Jailani</td>
				      </tr>

				      <tr>
				        <th id="ii">II</th>
				        <td>{{$eiaquestions->ii}}</td>
						<th id="b">B</th>
				        <td>{{$eiaquestions->b}}</td>
				      </tr>

				      <tr>
				        <th id="iii">III</th>
				        <td>{{$eiaquestions->iii}}</td>
						<th id="c">C</th>
				        <td>{{$eiaquestions->c}}</td>
				      </tr>

				      <tr>
				      	<th id="iv">IV</th>
				        <td>{{$eiaquestions->iv}}</td>
				        <th  id="d">D</th>
				        <td>{{$eiaquestions->d}}</td>
				      </tr>
						@endforeach
				      </tbody>

				      </table><br><br>  

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
	</div>
    <!-- templatemo 393 fantasy -->
    <!-- templatemo 393 fantasy -->
    {!! Html::script('js/parsley.min.js')!!}
	{!! Html::script('js/jquery.js')!!}
	{!! Html::script('js/bootstrap.min.js')!!}
	{!! Html::script('js/templatemo_script.js')!!}
    <!-- templatemo 393 fantasy -->
    <!--<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>-->
</body>
</html>