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
	.modal2 {
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
	.modal2-content {
	    position: relative;
	    background-color: #fefefe;
	    margin: auto;
	    padding: 0;
	    border: 1px solid #888;
	    width: 40%;
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
	.close1 {
	    color: white;
	    float: right;
	    font-size: 28px;
	    font-weight: bold;
	}

	.close1:hover,
	.close1:focus {
	    color: #000;
	    text-decoration: none;
	    cursor: pointer;
	}

	.modal2-header {
	    padding: 2px 16px;
	    background-color: #5cb85c;
	    color: white;
	}

	.modal2-body {padding: 2px 16px;}

	.modal2-footer {
	    padding: 2px 16px;
	    background-color: #5cb85c;
	    color: white;
	}


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
	    padding: 10px 16px;
	    background-color: #5cb85c;
	    color: white;
	    text-align: left;
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
				  </div>
				  <script>
				  $(document).ready(function(){
				    $('[data-toggle="popover"]').popover();   
				  });
				  </script>

				<br>

    			<!-- {!! Form::open(array('route' => 'eiaquestion.store', 'data-parsley-validate' => '', 'files' => true)) !!} -->

    			<div id="myModal1" class="modal2">

				  <!-- Modal1 content -->
				  <div class="modal2-content">
				    <div class="modal2-header">
				      <span class="close1">&times;</span>
				      <h2>Add New Related Reference</h2>
				    </div>
				    <div class="modal2-body">
				      
					      	<iframe src="{{ url('eiarelated') }}" width="200" height="450" scrolling="yes">
  						<p>Your browser does not support iframes.</p>
						</iframe>
					      	</div><br>

				</div></div>

    			<div id="myModal" class="modal1">

				  <!-- Modal1 content -->
				  <div class="modal1-content">
				    <div class="modal1-header">
				      <span class="close">&times;</span>
				      <h2>Add New Question</h2>
				    </div>
				    <div class="modal1-body">
				     {!! Form::open(array('url'=>'eiaquestion/uploadFiles', 'data-parsley-validate' => '', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'files'=>true)) !!}

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
						    </div><br><br>

						    <div class="input-group" style="width: 49.5%;">
						    <span class="input-group-addon" style="width: 20%;" id="type">Type of Question</span>
						    <div class="form-control" style="width: 39%;">
						    <label class="radio-inline">
						    <input type="radio" name="type" required="" value="Module" id="type" > Module</input>
						    </label>
						    <label class="radio-inline">
							<input type="radio" name="type" required="" value="Sub-Module"id="type"> Sub-Module </input>
							</label>
							</div></div>

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
						    <span class="input-group-addon" style="width: 40%;" id="eiarelated" name="eiarelated_id">Related Reference</span>
						    <select id="eiarelated" name="eiarelated_id" class="form-control" required="" style="width:97.7%">
				        	<option value="0" disabled="true" selected="true">--Please Select--</option>

				        	@foreach($eiarelates as $catr)
				        	<option value="{!! $catr->id !!}">{!! $catr->eiarelated !!}</option>
				        	@endforeach
				        	</select>
						    
				        	</nav>

					      	<br><br><br>

					      	<div class="input-group" style="width: 49.5%;">
						    <span class="input-group-addon" style="width: 20%;" id="level">Level of Question</span>
						    <div class="form-control" style="width: 39%;">
						    <label class="radio-inline">
						    <input type="radio" name="level" required="" value="Low"> Low
						    </label>
						    <label class="radio-inline">
							<input type="radio" name="level" required="" value="Medium"> Medium
							</label>
							<label class="radio-inline">
							<input type="radio" name="level" required="" value="High"> High
							</label><br>
							</div></div>

					    </div>
					      		
				    </div>
				    <div class="modal1-footer">
				      {{Form::submit('Save', array('style' => 'background-color: green' ,'class' => 'btn btn-success'))}}
					    {!! Form::close() !!}
				    </div>
				  </div>

				</div></div>

				<!-- end of modal -->
				<nav>
				<button id="myBtn" style="margin-left:186px;" class="btn btn-success" >Add New Question</button>
				<button id="myBtn1" style="margin-left:20px;" class="btn btn-success" >Add New Related Reference</button><br><br></nav>

				<!-- <input type="search" class="light-table-filter" data-table="order-table"  placeholder="Search..." style="width: 20%; float:right; margin-right: 130px"><br><br> -->

				<div class="table-responsive">
				<table class="order-table table" id="list" style="width:90%;" align="center">
				    
				      <tr style="background-color: #4CAF50; color: white;">
				        <th style="width:3%;">No.</th>
				        <th style="width:10%;">Type of Question</th>
				        <th style="width:7%;"><center>Image</center></th>
				        <th style="width:20%;">Question</th>
				        <th style="width:17%;" >Sub-Answer</th>
				        <th style="width:17%;">Answer</th>
				        <th style="width:7%;">Correct Answer</th>
				        <th style="width:7%;">Related Reference</th>
				        <th style="width:7%;">Level of Question</th>
				        <th style="width:15%;" colspan="4"><center>Action</center></th>
				        <th style="width:15%;" colspan="2"><center>Uploaded By</center></th>
				      </tr>
				      <tbody>
						@foreach($eiaquestion as $eiaquestions)
				      <tr>
				        <td rowspan="4"></td>
				        <td rowspan="4">{{$eiaquestions->type}}</td>
				       <td rowspan="4">
				       	@if (count($eiaquestions->original_filename) === 1)
				       <img class="file" src="/uploads/{{$eiaquestions->original_filename}}" width="100px"></img><a class="file" href="/uploads/{{$eiaquestions->original_filename}}"><br><center>{{$eiaquestions->limg}}</center></img>
				       @else
				       @endif
				       </td>
				        <td rowspan="4">{{$eiaquestions->question}}</td>
				        <td>I. {{$eiaquestions->i}} <br> ii. {{$eiaquestions->ii}} <br> iii. {{$eiaquestions->iii}} <br> iv. {{$eiaquestions->iv}}</td>
				     
				          @foreach($eiaquestions->options as $option)
                        <br>
                        <td rowspan="4" class="radio-inline">
                            <ol
                                type="1"
                                name="answers[{{ $eiaquestions->id }}]"
                                value="{{ $option->id }}">
                            {{ $option->option }}</ol>
                        </td>
                    @endforeach
                    @foreach($eiaquestions->options as $option)
                    @if($option->correct==1)
				        <td rowspan="4">{{$option->option}}</td>
				    @endif   
				    @endforeach    
				        <td rowspan="4">{{$eiaquestions->eiarelated->eiarelated}}</td>
				        <td rowspan="4">{{$eiaquestions->level}}</td>
				        <td rowspan="4" id="but" align="right"><button type="button" title="Question Preview" data-toggle="modal" data-target="#yourModal{{$eiaquestions->id}}">Preview</button>
				        </td>

				        <td><center><a href="{{ route('eiaexamoption.index') }}" >
				        	{{ HTML::image('images/edit.png', 'a Edit', array( 'width' => '20', 'title' => 'Edit Options')) }}</a> </center><br></td>
				        <td><center><a href="{{ route('eiaquestion.edit', $eiaquestions->id) }}" >
				        	{{ HTML::image('images/edit.png', 'a Edit', array( 'width' => '20', 'title' => 'Edit')) }}</a> </center><br></td>

				        	<td>{!! Form::open(['route' => ['eiaquestion.destroy', $eiaquestions->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

				        	{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit',  'width' => '17', 'title' => 'Delete'] ) !!}

				        	{!! Form::close() !!}
				        	</td>
				        <td rowspan="4" id="by" rowspan="4"></td>
				      </tr>

				      <tr>
				        
				      </tr>

				      <tr>
				        
				      </tr>

				      <tr>
				      	
				      </tr>
						@endforeach
				      </tbody>

				      </table><br><br>  

				      @foreach($eiaquestion as $eiaquestions)    
				    <div class="modal fade" id="yourModal{{$eiaquestions->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				      <div class="modal-dialog" role="document">
				        <div class="modal-content">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				            <h4 class="modal-title" id="myModalLabel">Preview Question</h4>
				          </div>
				          <div class="modal-body">

				          @if (count($eiaquestions->original_filename) === 1)
				          <center><img class="file" src="/uploads/{{$eiaquestions->original_filename}}" width="100px"></img><a class="file" href="/uploads/{{$eiaquestions->original_filename}}"></center>
				          <br><center>{{$eiaquestions->limg}}</center></a><br>
				          @else   
						  @endif

				          

				            {{$eiaquestions->id}}. {{$eiaquestions->question}}

				           	@if (count($eiaquestions->i) === 1)
				            <br><br>I. {{$eiaquestions->i}}
				            @else   
							@endif

							@if (count($eiaquestions->ii) === 1)
				            <br>II. {{$eiaquestions->ii}}
				            @else   
							@endif

							@if (count($eiaquestions->iii) === 1)
				            <br>III. {{$eiaquestions->iii}}
				            @else   
							@endif

							@if (count($eiaquestions->iv) === 1)
				            <br>IV. {{$eiaquestions->iv}}
				            @else   
							@endif

						   @foreach($eiaquestions->options as $option)
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $eiaquestions->id }}]"
                                value="{{ $option->id }}">
                            {{ $option->option }}
                        </label>
                    @endforeach
				          </div>
				          <div class="modal-footer">
				            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				          </div>
				        </div>
				      </div>
				    </div>
				@endforeach     

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
	// window.onclick = function(event) {
	//     if (event.target == modal) {
	//         modal.style.display = "none";
	//     }
	// }

	/// Get the modal
	var modal1 = document.getElementById('myModal1');

	// Get the button that opens the modal
	var btn1= document.getElementById("myBtn1");

	// Get the <span> element that closes the modal
	var span1 = document.getElementsByClassName("close1")[0];

	// When the user clicks the button, open the modal 
	btn1.onclick = function() {
	    modal1.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span1.onclick = function() {
	    modal1.style.display = "none";
	    window.location.reload(true);
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