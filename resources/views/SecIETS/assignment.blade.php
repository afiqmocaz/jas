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

	<script type="text/javascript">
		
		function AddData() {
    
        var rows = "";
        var id = "";
        var topic = document.getElementById('tpc').value;
        var sa = document.getElementById('sa').value;
        var upload = document.getElementById("demo").innerHTML;
        var dur = document.getElementById('duration').value;
        var code = document.getElementById('cd').value;
        var rub = document.getElementById("rub").innerHTML;
        var btn = document.getElementById("but").innerHTML;
        var send = document.getElementById("send").innerHTML;
        

        rows += "<tr><td>" + id + "</td><td>" + topic + "</td><td>" + sa + "</td><td>" + upload + "</td><td><center>" + dur + "</center></td><td>" + code + "</td><td>" + rub + "</td><td>" + btn + "</td><td>" + send + "</td><td></tr>";
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
				    <ol><a href="#">Assignment (PCER)</a></ol>
				    <ol class="active">Master File</ol>        
				  </ul>
				</div>

				<div class="row" id="thumbnails_container">      
				<div class="col-md-12 col-md-offset-0">
				
    			<h1>Pollution Control Engineering Report<br></h1>
    			<h2>Assignment Master File<br></h2> 

    			<div class="dropdown1">
				 	
					  <button class="dropbtn1">Instruction : </button>
					  <div class="dropdown-content1">
					   1. The purpose of this page is to generate the assignment and assign code to be use in the page of applicant assignment and panel assignment.<br>  
						2. Secretariat IETS can fill the title of the assignment at the text field of Topic.<br>
						3. Secretariat IETS can fill the specialized area of the assignment at the text field of Specialized Area.<br>
						4. Secretariat IETS can upload the assignment with clicking the button "Choose File" at the text field of Upload PCER<br>
						5. The Assign Date and Dateline can be set by date.<br>
						6. Secretariat IETS can fill the code of assign for example "APCS01" at the text field of Assign Code to be assign to applicant and panel.<br>
						7. Secretariat IETS can click the button "Save" to save the progress that have been made.<br>
						8. Secretariat IETS can view the uploaded assignment at the table below.
					  </div>
					
				</div><br><br>       
				 
				 <form>

							<div class="form-group">
							<label for="usr">Topic &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<input type="text" id="tpc">

					      	<br><br><label for="usr">Specialized Area &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<input type="text" id="sa"><br>

					      	<label for="usr"><br>Upload PCER &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>
					      	<br><center><input type="file"  name="fileToUpload" id="fileToUpload" accept=".pdf , .doc , .docx , .txt" onchange="myFunction()" multiple></center>

					      <br><p id="demo"></p>
					      <script>

					      	function PreviewImage() {
				                pdffile=document.getElementById("fileToUpload").files[0];
				                pdffile_url=URL.createObjectURL(pdffile);
				                $('#viewer').attr('src',pdffile_url);
				            }

							function myFunction(){
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
							                    txt += "Name: " + file.name + "&nbsp&nbsp&nbsp" + "<input type='button' value='Preview' onclick='PreviewImage();' />" + "<br>";
							                }
							                if ('size' in file) {
							                    txt += "&nbsp&nbsp&nbsp Size: " + file.size + " bytes <br>";
							                    
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
					      <label><br><b>File Type: .pdf, .doc, .docx, .txt	|	Max File Upload: 10	|	Max Size Upload: 10MB</b><br></label>

					       <div style="clear:both">
						           <iframe id="viewer" frameborder="0" scrolling="no" width="400" height="400"></iframe>
						        </div>
						        <br>

					     <br><br><label for="usr">Duration of Assignment &nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<input type="text" id="duration" style="width: 50px;"><label for="usr">&nbsp Days</label><br>

					      <br><br><label for="usr">Code Assign &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<input type="text" id="cd"><br>

					      <br><br><input class="btn btn-success" type="button" value="Save" name="save" onclick="AddData() "><hr><br>
					    </div>
					  </form> 


					  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<input type="search" class="light-table-filter" data-table="order-table"  placeholder="Search..." style="width: 222px;"><br><br>

				<table class="order-table table" id="list">
				    <thead>
				      <tr>
				        <th onclick="sortTable(0)">No.</th>
				        <th onclick="sortTable(1)">Topic</th>
				        <th onclick="sortTable(2)">Specialized Area</th>
				        <th onclick="sortTable(3)">Uploaded PCER</th>
				        <th onclick="sortTable(4)"><center>Duration of Assignment (days)</center></th>
				        <th onclick="sortTable(5)">Code Assign</th>
				        <th onclick="sortTable(6)">Rubric</th>
				        <th onclick="sortTable(7)">Action</th>
				        <th onclick="sortTable(8)"><center>Send Rubric to SME</center></th>
				      </tr></thead>

				      <tbody>
				      <tr>
				        <td></td>
				        <td>IETS Consultant PCER</td>
				        <td>Water Pollution Control</td>
				        <td><a>waterpollutioncontrol.pdf</a></td>
				         <td><center>30</center></td>
				        <td>IETS1</td>
				        <td id="rub"><center><form action="rubric" method="get">
					    <input type="submit" class="button" value="Rubric" />
					</form></center></td>
				        <td id="but"><form onclick="deleteRow(this)" align="center">
							  <input type="image" src="images/delete.ico" alt="Delete" width="15" height="15">
							</form><center><br><img src="images/edit.png" height=15px width=15px></center></td>
							<td id="send"><center><form action="rubric" method="get">
					    <input type="submit" class="button" value="Send" />
					</form></center></td>
				        </tbody>
				      </tr>
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
    <!-- templatemo 393 fantasy -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>
</body>
</html>