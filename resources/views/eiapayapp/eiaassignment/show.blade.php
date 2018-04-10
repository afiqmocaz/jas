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
	.modal {
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

	/* Modal Content */
	.modal-content {
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

	.modal-header {
	    padding: 2px 16px;
	    background-color: #5cb85c;
	    color: white;
	}

	.modal-body {padding: 2px 16px;}

	.modal-footer {
	    padding: 10px 16px;
	    background-color: #5cb85c;
	    color: white;
	    text-align: left;
	}


	th {
		    background-color: #4CAF50;
		    color: white;
		}
		tr:nth-child(even) {
    background-color: #e5e6e8;
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
        var sel = document.getElementById('opt');
		var selected = sel.options[sel.selectedIndex];
		var extra = selected.getAttribute('data-foo');
        var sa = document.getElementById('sa').value;
        var upload = document.getElementById('qa').value;
        var dur = document.getElementById('duration').value;
        var code = document.getElementById('cd').value;
        var rub = document.getElementById("rub").innerHTML;
        var btn = document.getElementById("but").innerHTML;
        var send = document.getElementById("send").innerHTML;
        

        rows += "<tr><td>" + id + "</td><td>" + extra + "</td><td>" + sa + "</td><td>" + upload + "</td><td><center>" + dur + "</center></td><td>" + code + "</td><td>" + rub + "</td><td>" + btn + "</td><td>" + send + "</td><td></tr>";
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


function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("list");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("list").deleteRow(i);
}

function findselected() {
    var selMenu = document.getElementById('opt');
    var txtField = document.getElementById('opt2');
    if(opt.value == 'General Question') 
        opt2.disabled = true
    else
        opt2.disabled = false
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
				    <a href="#">Assignment</a>
				    <a class="active" style="color:white">Course Assignment</a>        
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
				
    			<h1>Course Assignment<br></h1>
    			<h2>Assignment Master File<br></h2> 

    			<div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary" style="border-color:#4CAF50;">
				      <div class="panel-heading" style="background-color:#4CAF50;" >
				        <h4 class="panel-title" style="color:white;">
				          <a data-toggle="collapse" href="#collapse1">Assignment Master File Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  The purpose of this page is to generate the assignment and assign code to be use in the page of applicant assignment and panel assignment.<br>  
						•  Secretariat EIA can fill the title of the assignment at the text field of Topic.<br>
						•  Secretariat EIA can fill the specialized area of the assignment at the text field of Specialized Area.<br>
						•  Secretariat EIA can upload the assignment with clicking the button "Choose File" at the text field of Upload PCER<br>
						•  The Assign Date and Dateline can be set by date.<br>
						•  Secretariat EIA can fill the code of assign for example "EIA01" at the text field of Assign Code to be assign to applicant and panel.<br>
						•  Secretariat EIA can click the button "Save" to save the progress that have been made.<br>
						•  Secretariat EIA can view the uploaded assignment at the table below.
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

				<button id="myBtn" style="margin-left:10px;" class="btn btn-success" >Add New Assignment</button>

    			<div id="myModal" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
				    <div class="modal-header">
				      <span class="close">&times;</span>
				      <h2>Add New Assignment</h2>
				    </div>
				    <div class="modal-body">
				      {!! Form::open(array('route' => 'eiaassignment.store', 'data-parsley-validate' => '')) !!}


							<div class="form-group">

							<br><div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;" id="type">Type of Question</span>
						    <select id="opt" onChange="findselected()" name="type" class="form-control" required="" style="width:36.6%">
					      		<option data-foo="" value="0" disabled="true" selected="true">--Please Select--</option>
					      		<option value="General Question" data-foo="General Question">General Question</option>
					      		<option value="Specific Question" data-foo="Specific Question">Specific Question</option>
					      	</select>
						    </div><br>

							<div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;" id="specialized">Specialized Area</span>


						    {{ Form::select('specialized', [
						    'Air Pollution Control' =>
						    ['Air Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
						    'Air Pollution Control - Impact Assessment' => 'Impact Assessment',
						    'Air Pollution Control - Environmental Management' => 'Environmental Management',
						    'Air Pollution Control - Performance Monitoring' => 'Performance Monitoring',
						    'Air Pollution Control - Environmental Planning' => 'Environmental Planning',
						    'Air Pollution Control - Risk Assessment' => 'Risk Assessment'],

						    'Water Pollution Control' =>
						    ['Water Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
						    'Water Pollution Control - Impact Assessment' => 'Impact Assessment',
						    'Water Pollution Control - Environmental Management' => 'Environmental Management',
						    'Water Pollution Control - Performance Monitoring' => 'Performance Monitoring',
						    'Water Pollution Control - Environmental Planning' => 'Environmental Planning',
						    'Water Pollution Control - LDP2M2' => 'LDP2M2'],

						    'Waste Management' =>
						    ['Waste Management - Pollution Control Technology' => 'Pollution Control Technology',
						    'Waste Management - Impact Assessment' => 'Impact Assessment',
						    'Waste Management - Environmental Management' => 'Environmental Management',
						    'Waste Management - Performance Monitoring' => 'Performance Monitoring',
						    'Waste Management - Environmental Planning' => 'Environmental Planning',
						    'Waste Management - Risk Assessment' => 'Risk Assessment'],    
						], '', array('class' => 'form-control', 'id' => 'opt2', 'style' => 'width: 90%', 'required' => ''))}}
						    </div><br>

						    <div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;" id="question">Question</span>
						    <textarea id="question" rows="5" cols="60" name="question" class="form-control" required="" style="width:70%"></textarea>
						    </div><br>
					      	
					      <div class="input-group" style="width: 100%;">
						    <span class="input-group-addon" style="width: 20%;" id="name">Duration of Assignment</span>
						    <input type="number" id="duration" name="duration" class="form-control" required="" style="width:36.6%">
						    <label for="usr">&nbsp Days</label>
						    </div></div>

				    </div>
				    <div class="modal-footer">
				      {{Form::submit('Save', array('style' => 'background-color: green' ,'class' => 'btn btn-success'))}}
					  {!! Form::close() !!} 
				    </div>
				  </div>

				</div>

				<!-- end of modal -->
				 
				<input type="search" class="light-table-filter" data-table="order-table"  placeholder="Search..." style="width: 20%; float:right;"><br><br>

				<div class="table-responsive">
				<table class="order-table table" id="list" style="width:100%;">
				    <thead valign="top">
				      <tr>
				        <th onclick="sortTable(0)" style="width:3%;"><center>No.</center></th>
				        <th onclick="sortTable(1)" style="width:10%;"><center>Type of Question</center></th>
				        <th onclick="sortTable(2)" style="width:10%;"><center>Specialized Area</center></th>
				        <th onclick="sortTable(3)" style="width:17%;"><center>Question</center></th>
				        <th onclick="sortTable(4)" style="width:10%;"><center>Duration of Assignment (days)</center></th>
				        <th colspan="2" onclick="sortTable(5)" style="width:10%;"><center>Action</center></th>
				      </tr></thead>

				      <tbody>
						@foreach($eiaassignment as $eiaassignments)
				      <tr>
				        <td></td>
				        <td>{{$eiaassignments->type}}</td>
				        <td>{{$eiaassignments->specialized}}</td>
				        <td>{{$eiaassignments->question}}</td>
				         <td><center>{{$eiaassignments->duration}}</center></td>
				        <td><center><a href="{{ route('eiaassignment.edit', $eiaassignments->id) }}" >
				        	{{ HTML::image('images/edit.png', 'a Edit', array('class' => 'img-responsive cleaner', 'width' => '20', 'title' => 'Edit')) }}</a> </center></td>

				        	<td>{!! Form::open(['route' => ['eiaassignment.destroy', $eiaassignments->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

				        	<center>{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit', 'class' => 'img-responsive cleaner', 'width' => '17', 'title' => 'Delete'] ) !!}</center>

				        	{!! Form::close() !!}
							</td>
					@endforeach
				        </tbody>
				        
				      </tr>
				  </table>

				</div>  
				</div>
				</div>
				</div>
				                
			</div> <!-- thumbnail area -->  
		
		<footer>
			<div class="credit row">
				<center><div class="col-md-6 col-md-offset-3">
					<div id="templatemo_footer">Copyright © 2017 <label href="#">Jabatan Alam Sekitar</label>
          </div>
				</div>
						
			</div>
		</footer>
	</div>
    <!-- templatemo 393 fantasy -->
    {!! Html::script('js/parsley.min.js')!!}
	{!! Html::script('js/jquery.js')!!}
	{!! Html::script('js/bootstrap.min.js')!!}
	{!! Html::script('js/templatemo_script.js')!!}
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
	</script>

	
    <!-- templatemo 393 fantasy -->
    <!--<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>-->
</body>
</html>