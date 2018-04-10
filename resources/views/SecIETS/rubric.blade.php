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
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/justified-nav.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
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
		    z-index: 1;
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

			ul.breadcrumb {
			    padding: 10px 16px;
			    list-style: none;
			    background-color: #a5f5a8;
			    font-size: 12px;
			}
			ul.breadcrumb ol {display: inline;}
			ul.breadcrumb ol+ol:before {
			    padding: 0px;
			    color: black;
			    content: "\2771";
			}
			ul.breadcrumb ol a {
			    color: #006e00;
			    text-decoration: none;
			}
			ul.breadcrumb ol a:hover {
			    color: #01447e;
			    text-decoration: underline;
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
							cell.innerHTML = '<td><form onclick="deleteRow(this)" align="center"><input type="image" src="images/delete.ico" alt="Delete" width="15" height="15"></form></td>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input type="text" id="usr" style="width: 35px;"></center>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input type="text" id="usr" style="width: 100px;"></center>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input type="text" id="usr" style="width: 100px;"></center>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input type="text" id="usr" style="width: 100px;"></center>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input type="text" id="usr" style="width: 100px;"></center>';
						}
						for(var i=0;i<cols;i++){
							cell = row.insertCell(i);
							cell.innerHTML = '<center><input type="text" id="usr" style="width: 35px;">(%)</center>';
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
			<img src="images/banner1.png" alt="header image" width="2048" height="100" class="img-responsive cleaner">

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
					<li><a href="index">HOME</a></li>
	                  <li><a href="announcement">ANNOUNCEMENT</a></li>
			          <li class="dropdown"><a class="dropbtn">APPLICANT</a>
					    <div class="dropdown-content">
					      <a href="applicant">Applicant Registration</a>
					      <a href="payment">Applicant Payment</a>
					    </div>
					  </li>
			          <li class="dropdown"><a class="dropbtn">MANAGE</a>
					    <div class="dropdown-content">
					      <a href="syllibus">Syllibus</a>
					      <a href="refference">Refference</a>
					      <ul class="parent" ><a href="#">Comprehensive Examination <span class="caret"></span></a>
							<ul class="child" >
							<a href="compexam">Schedule</a>
							<a href="exam">Question Generation</a></ul></ul>
							<ul class="parent1" ><a href="#">Assignment&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="caret"></span></a>
							<ul class="child1" >
							 <a href="assignment">Master File</a>
					      <a href="assignapp">Applicant Assignment</a>
					      <a href="assignpanel">Panel Assignment</a></ul></ul>
					      <a href="proiv">Professional Interview</a>
					    </div>
					  </li>
					  <li class="dropdown"><a class="dropbtn">REPORT</a>
					    <div class="dropdown-content">
					      <a href="cert">Certificate</a>
					      <a href="cpd">Continuous Professional Development</a>
					    </div>
					  </li>
					  <li class="dropdown"><a class="dropbtn">PROFILE</a>
					    <div class="dropdown-content">
					      <a>Aizat Hamdan Jailani<br>Sekretariat IETS<br>941008065453</a>
					      <a href="">LogOut</a>
					    </div>
					  </li>
					  </ul>
		      	</div> <!-- nav -->
	      	</div>

	      	<ul class="breadcrumb">
				    <ol><a href="#">SECRETARIAT IETS</a></ol>
				    <ol><a href="#">MANAGE</a></ol>
				    <ol><a href="#">Assignment</a></ol>
				    <ol><a href="assignment">Master File</a></ol>
				    <ol class="active">Rubric</ol>        
				  </ul>
				</div>

				<div class="row" id="thumbnails_container">      
				<div class="col-md-12 col-md-offset-0">
				
    			<h1>Rubric<br></h1>

    			<div class="dropdown1">
				 	
					  <button class="dropbtn1">Instruction : </button>
					  <div class="dropdown-content1">
					    1. Rubric<br>
					  </div>
					
				</div><br><br>

				<input class="btn btn-success" type="button" value="Add Criteria" onclick="addRow();" id="rowButton" /><br><br>

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
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>
</body>
</html>