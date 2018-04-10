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

	/* The Modal (background) */
	.modal1 {
	    display: none; /* Hidden by default */
	    position: fixed; /* Stay in place */
	    z-index: 1; /* Sit on top */
	    padding-top: 100px; /* Location of the box */
	    left: 0;
	    top: 0;
	    width: 100%; /* Full width */
	    height: 100%; /* Full height */
	    overflow: auto; /* Enable scroll if needed */
	    background-color: rgb(0,0,0); /* Fallback color */
	    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal1 Content */
	.modal1-content {
	    position: relative;
	    background-color: #fefefe;
	    margin: auto;
	    padding: 0;
	    border: 1px solid #888;
	    width: 80%;
	    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
	    -webkit-animation-name: animatetop;
	    -webkit-animation-duration: 0.4s;
	    animation-name: animatetop;
	    animation-duration: 0.4s
	}

	/* Add Animation */
	@-webkit-keyframes animatetop {
	    from {top:-300px; opacity:0} 
	    to {top:0; opacity:1}
	}

	@keyframes animatetop {
	    from {top:-300px; opacity:0}
	    to {top:0; opacity:1}
	}

	/* The Close Button */
	.close {
	    color: white;
	    float: right;
	    font-size: 28px;
	    font-weight: bold;
	}

	.close:hover,
	.close:focus {
	    color: #000;
	    text-decoration: none;
	    cursor: pointer;
	}

	.modal1-header {
	    padding: 2px 16px;
	    background-color: #5cb85c;
	    color: white;
	}

	.modal1-body {padding: 2px 16px;}

	.modal1-footer {
	    padding: 2px 16px;
	    background-color: #5cb85c;
	    color: white;
	}

		nav {
		    float: left;
		    max-width: 100%;
		    min-width: 50%;
		    /*margin-right: 50%;*/
		    /*margin: -13px;*/
		    /*padding: 1em;*/
		}

		article {
		    margin-left: 53%;
		    /*border-left: 1px solid gray;*/
		    /*padding: 1em;*/
		    overflow: hidden;
		}
	
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
		
		function AddData() {
    
        var rows = "";
        var id = "";
        var status = "EIA";
        var img = "";
        var que = document.getElementById('quest').value;
        
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
		var btn = document.getElementById("but").innerHTML;

        rows += "<tr><td rowspan=4>" + id + "</td><td rowspan=4>" + status + "</td><td rowspan=4>" + img + "</td><td rowspan=4>" + que + "</td><th>" + i + "</th><td>" + sa1 + "</td><th>" + a + "</th><td>" + a1 + "</td><td rowspan=4>" + extra + "</td><td rowspan=4>" + rr + "</td><td rowspan=4>" + btn + "</td><td></tr>" + "<tr><th>" + ii + "</th><td>" + sa2 + "</td><th>" + b + "</th><td>" + a2  + "</td><td></tr>" + "</td><th>" + iii + "</th><td>" + sa3 + "</td><th>" + c + "</th><td>" + a3 + "</td><td></tr>" + "</td><th>" + iv + "</th><td>" + sa4 + "</td><th>" + d + "</th><td>" + a4 + "</td><td></tr>";
        $(rows).appendTo("#list tbody");
        var tr = document.createElement("tr");

        tr.innerHTML = rows;
        tbody.appendChild(tr)
}

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

function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
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
				    <a href="#">SECRETARIAT EIA</a>
				    <a href="#">MANAGE</a>
				    <a href="#">Virtual Self-Learning</a>
				    <a class="active">Quiz</a>        
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

    			<!-- {!! Form::open(array('route' => 'eiaquiz.store', 'data-parsley-validate' => '', 'files' => true)) !!} -->

    			<button id="myBtn" style="margin-left:60px;" class="btn btn-success" >Add New Quiz</button><br><br>

    			<div id="myModal" class="modal1">

				  <!-- Modal1 content -->
				  <div class="modal1-content">
				    <div class="modal1-header">
				      <span class="close">&times;</span>
				      <h2>Add New Quiz</h2>
				    </div>
				   
				      <div class="modal1-body">
				      {!! Form::open(array('url'=>'eiaquestion/uploadFiles', 'route'=> ['eiaquestion.store'], 'data-parsley-validate' => '', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'files'=>true)) !!}

					    <div class="form-group">

					    	<br><div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;">Upload Image(If Needed)</span>
						    <input type="file" id="fileToUpload" name="fileToUpload[]" class="form-control"  style="width:100%" accept="image/*" onchange="myFunction(this)" multiple>
						    </div>

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
					      <label><b>File Type: image files	|	Max File Upload: 10	|	Max Size Upload: 10MB</b><br><br></label>

					      <div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;" id="limg">Image Label</span>
						    <input type="text" id="limg" name="limg" class="form-control" style="width:100%">
						    </div><br>

						    <div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;" id="module">Module</span>
						    <select id="module" name="module" class="form-control" required="" style="width:36.6%">
					      	<option data-foo="" name="" value="0" disabled="true" selected="true">--Please Select--</option>
					      	<option data-foo="Module 1">Module 1</option>
					      	<option data-foo="Module 2">Module 2</option>
					      	<option data-foo="Module 3">Module 3</option>
					      	<option data-foo="Module 4">Module 4</option>
					      	<option data-foo="Module 5">Module 5</option>
					      	</select>
						    </div>

						   <br><br><div class="input-group" style="width: 100%;">
						    <span class="input-group-addon control-label" style="width: 20%;" name="question" id="question">Question</span>
						    {!! Form::textarea('question', old('question'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'question', 'required' => '', 'style' => 'width:75%;',
						    'size' => '50x4']) !!}
						    </div><br>
			                    <p class="help-block"></p>
			                    @if($errors->has('question'))
			                        <p class="help-block">
			                            {{ $errors->first('question') }}
			                        </p>
			                    @endif

						    <div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%; border: 1px solid #CACCCA;">Sub-Answer</span>
						    <label style="width: 10%; padding: 33px; margin:2px; background-color: #E1E0E0; font-size:17px; color: black;" id="i"> i</label>
						    <textarea id="i" name="i" class="form-control control-label" style="width:64.5%" rows="4" cols="50"></textarea>

						    <br><label style="width: 10%; padding: 33px; margin:2px; background-color: #E1E0E0; font-size:17px; color: black;" id="ii"> ii</label>
						    <textarea id="ii" name="ii" class="form-control" style="width:64.5%" rows="4" cols="50"></textarea>
						    <br><label style="width: 10%; padding: 33px; margin:2px; background-color: #E1E0E0; font-size:17px; color: black;" id="iii"> iii</label>
						    <textarea id="iii" name="iii" class="form-control" style="width:64.5%" rows="4" cols="50"></textarea>
						    <br><label style="width: 10%; padding: 33px; margin:2px; background-color: #E1E0E0; font-size:17px; color: black;" id="iv"> iv</label>
						    <textarea id="iv" name="iv" class="form-control" style="width:64.5%" rows="4" cols="50"></textarea>
						    </div><br>

					      	<div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%; border: 1px solid #CACCCA;">Answer</span>
						    <label style="width: 10%; padding: 33px; margin:2px; background-color: #E1E0E0; font-size:17px; color: black;" id="a" name="a" class="control-label"> A</label>
						    {!! Form::textarea('option1', old('option1'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'a', 'required' => '', 'style' => 'width:64.5%;', 'size' => '50x4']) !!}
						     <p class="help-block"></p>
			                    @if($errors->has('option1'))
			                        <p class="help-block">
			                            {{ $errors->first('option1') }}
			                        </p>
			                    @endif

						    <br><label style="width: 10%; padding: 33px; margin:2px; background-color: #E1E0E0; font-size:17px; color: black;" id="b" name="b" class="control-label"> B</label>
						    {!! Form::textarea('option2', old('option2'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'b', 'required' => '', 'style' => 'width:64.5%;', 'size' => '50x4']) !!}
						    <p class="help-block"></p>
			                    @if($errors->has('option2'))
			                        <p class="help-block">
			                            {{ $errors->first('option2') }}
			                        </p>
			                    @endif

						    <br><label style="width: 10%; padding: 33px; margin:2px; background-color: #E1E0E0; font-size:17px; color: black;" id="c" name="c" class="control-label"> C</label>
						    {!! Form::textarea('option3', old('option3'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'c', 'required' => '', 'style' => 'width:64.5%;', 'size' => '50x4']) !!}
						     <p class="help-block"></p>
			                    @if($errors->has('option3'))
			                        <p class="help-block">
			                            {{ $errors->first('option3') }}
			                        </p>
			                    @endif

						    <br><label style="width: 10%; padding: 33px; margin:2px; background-color: #E1E0E0; font-size:17px; color: black;" id="d" name="d" class="control-label"> D</label>
						    {!! Form::textarea('option4', old('option4'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'd', 'required' => '', 'style' => 'width:64.5%;', 'size' => '50x4']) !!}
						    <p class="help-block"></p>
			                    @if($errors->has('option4'))
			                        <p class="help-block">
			                            {{ $errors->first('option4') }}
			                        </p>
			                    @endif
						    </div><br>
						   
			            
					      	<div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;" id="correct" name="correct" class="control-label">Correct Answer</span>
						    {!! Form::select('correct', $correct_options, old('correct'), ['class' => 'form-control', 'style' => 'width:36.6%']) !!}
						    </div><br>
		                    <p class="help-block"></p>
		                    @if($errors->has('correct'))
		                        <p class="help-block">
		                            {{ $errors->first('correct') }}
		                        </p>
		                    @endif
		                    
					      	<nav>

				        	<div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 40%;" id="eiarelated" name="eiarelated_id">Related Refference</span>
						    <select id="eiarelated" name="eiarelated_id" class="form-control" required="" style="width:97.7%">
				        	<option value="0" disabled="true" selected="true">--Please Select--</option>

				        	@foreach($eiarelates as $catr)
				        	<option value="{!! $catr->id !!}">{!! $catr->eiarelated !!}</option>
				        	@endforeach
				        	</select>
						    
				        	</nav>

				        	<article>
						<div id="check">
						<input type="checkbox" class="maxtickets_enable_cb1" name="opwp_wootickets[tickets][0][enable]">Add New Related Reference

				        <div class="max_tickets1">
					      	<iframe src="{{ url('eiarelated') }}" width="200" height="225" scrolling="yes">
  						<p>Your browser does not support iframes.</p>
						</iframe>
					      	</div>
					      	</div>
					      	</article></div>

					      		
				    </div>
				    <div class="modal1-footer">
				      {{Form::submit('Save', array('style' => 'background-color: green' ,'class' => 'btn btn-success'))}}
					    {!! Form::close() !!}
				    </div>
				  </div>

				</div></div>

				 
				  		<div class="table-responsive">
				  		

				  <table class="order-table table" id="list" style="width:90%;" align="center">
				    
				      <tr style="background-color: #4CAF50; color: white;">
				        <th style="width:3%;">No.</th>
				        <th style="width:17%;">Question</th>
				        <th style="width:17%;">Answer</th>
				        <th style="width:7%;">Correct Answer</th>
				        <th style="width:10%;" colspan="3"><center>Action</center></th>
				        
				      </tr>
				     @foreach($questions_option as $questions_option)
				      <tbody>
					
					 <th style="width:3%;">1.</th>
					 
                    <td>{{ $questions_option->question->question or '' }}</td>
                    <td>{{ $questions_option->option }}</td>
                    <td>{{ $questions_option->correct == 1 ? 'Yes' : 'No' }}</td>
                    
				        <td><center><a href="{{ route('eiaexamoption.edit', $questions_option->id) }}" >
				        	{{ HTML::image('images/edit.png', 'a Edit', array( 'width' => '20', 'title' => 'Edit')) }}</a> </center><br></td>

				        	<td>{!! Form::open(['route' => ['eiaexamoption.destroy', $questions_option->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

				        	{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit',  'width' => '17', 'title' => 'Delete'] ) !!}

				        	{!! Form::close() !!}
				        	</td>
				        
				     
				      @endforeach
				      
						
				      </tbody>
				     
				      </table><br><br>

				      
				 
				  
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
    {!! Html::script('js/parsley.min.js')!!}
	{!! Html::script('js/jquery.js')!!}
	{!! Html::script('js/bootstrap.min.js')!!}
	{!! Html::script('js/templatemo_script.js')!!}
    <!-- templatemo 393 fantasy -->
    <!--<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>-->
    <script type="text/javascript">

    	/// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}

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