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

			table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}

		th, td {
		    padding: 5px;
		    text-align: left;
		}
		th {
		    background-color: #4CAF50;
		    color: white;
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

	<script>   

				    function addRow() {
					    var table = document.getElementById("main");
						var rws = table.rows;
						var cols = table.rows[0].cells.length;
					    var row = table.insertRow(rws.length);
						var cell;
						
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<td><form onclick="deleteRow(this)" align="center"><input type="image" src="{{URL::asset("/images/delete.ico")}}" alt="Delete" width="15" height="15"></form></td>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input onkeyup="enableToggle()" type="number" id="below" onblur="findTotal1()" name="count" style="width: 100px;"></center>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input onkeyup="enableToggle()" type="number" id="below" onblur="findTotal1()" name="count" style="width: 100px;"></center>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input onkeyup="enableToggle()" type="number" id="below" onblur="findTotal1()" name="count" style="width: 100px;"></center>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input onkeyup="enableToggle()" type="number" id="below" onblur="findTotal1()" name="count" style="width: 100px;"></center>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input type="text" onblur="findTotal()" id="per" name="per" style="width: 35px;">(%)</center>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><textarea rows="2" cols="23" id="add2"></textarea></center>';
						}

						}

					
						function deleteRow(r) {
						    var i = r.parentNode.parentNode.rowIndex;
						    document.getElementById("main").deleteRow(i);
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
				    <a href="{{ url('secretariat_assigment/eia') }}">Applicant Assignment</a>
				    <a class="active" style="color: white">Rubric</a>        
				  </div>
				</div>

				<div class="row" id="thumbnails_container">      
				<div class="col-md-12 col-md-offset-0">
				
    			<h1>Rubric<br></h1>

    			<div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary" style="border-color:#4CAF50;">
				      <div class="panel-heading" style="background-color:#4CAF50;" >
				        <h4 class="panel-title" style="color:white;">
				          <a data-toggle="collapse" href="#collapse1">Rubric Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  Rubric<br>
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

				<input class="btn btn-success" type="button" value="Add Criteria" onclick="addRow();" id="rowButton" /><br><br>

				<div class="table-responsive">
				<table id="main" style="width:100%">
				  <tr>
				  	<th colspan="8"><center>RUBRIC FOR SUBJECT MATTER EXPERT (SME)</center></th>
				  <tr>
				    <th width="30%" rowspan="2"><center>Criteria</center></th>
				    <th width="10%" rowspan="2"><center>Percentage<br>(%)</center></th>
				    <th width="50%" colspan="4"><center>Level</center></th>
				    <th width="10%" rowspan="2"><center>Marks</center></th>
				    <th width="10%" rowspan="2"><center>Action</center></th>
				  </tr>
				  <tr>
				  	<th width="8%"><center>Weak<br>0-39</center></th>
				  	<th width="8%"><center>Medium<br>40-59</center></th>
				  	<th width="8%"><center>Good<br>60-79</center></th>
				  	<th width="8%"><center>Excellent<br>80-100</center></th>
				  	</tr>

				  	<tr>
				    <td width="30%" rowspan="2"><center><textarea rows="2" cols="23" id="add2" placeholder="Example: Understanding of Notification Process"></textarea></center></td>
				    <td width="10%" rowspan="2"><center><input type="text" id="usr" style="width: 35px;" placeholder="80">(%)</center></td>
				  </tr>
				  <tr>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;" placeholder="Below Expectation"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;" placeholder="Basic"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;" placeholder="Proficient"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;" placeholder="Outstanding"></center></td>
				  	<td><center><input type="text" id="usr" style="width: 35px;" placeholder="100"></center></td>
				  	<td></td>
				  	</tr>


				  	<tr>
				    <td width="30%" rowspan="2"><center><textarea rows="2" cols="23" id="add2"></textarea></center></td>
				    <td width="10%" rowspan="2"><center><input type="text" id="usr" style="width: 35px;">(%)</center></td>
				  </tr>
				  <tr>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td><center><input type="text" id="usr" style="width: 35px;"></center></td>
				  	<td></td>
				  	</tr>


				  	<tr>
				    <td width="30%" rowspan="2"><center><textarea rows="2" cols="23" id="add2"></textarea></center></td>
				    <td width="10%" rowspan="2"><center><input type="text" id="usr" style="width: 35px;">(%)</center></td>
				  </tr>
				  <tr>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td><center><input type="text" id="usr" style="width: 35px;"></center></td>
				  	<td></td>
				  	</tr>


				  	<tr>
				    <td width="30%" rowspan="2"><center><textarea rows="2" cols="23" id="add2"></textarea></center></td>
				    <td width="10%" rowspan="2"><center><input type="text" id="usr" style="width: 35px;">(%)</center></td>
				  </tr>
				  <tr>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td width="10%"><center><input type="text" id="usr" style="width: 100px;"></center></td>
				  	<td><center><input type="text" id="usr" style="width: 35px;"></center></td>
				  	<td></td>
				  	</tr>
				    
				</table>  
				<table  style="width:100%">
				<tr>
				  	<th colspan="8"><center>Total</center></th>
					<tr>
					<th width="26%" rowspan="2"><center>Percentage</center></th>
				    <td width="10%" rowspan="2"><center><input type="text" id="usr" style="width: 35px;">(%)</center></td>
				    <th width="50%" colspan="4"><center>Marks</center></th>
				    <td width="16%" rowspan="2"><center><input type="text" id="usr" style="width: 110px;"></center></td>
				    </tr></tr>
				</table><br><br>  

				<button class="btn btn-success">Save</button><br><br>    
				 
				</div>  
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