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

	<script>
function myFunction() {
    var x = document.getElementById("mySelect");
    var option = document.createElement("option");
    option.text = document.getElementById("add").value;
    x.add(option);
}

function myFunction1() {
    var x = document.getElementById("mySelect1");
    var option = document.createElement("option");
    option.text = document.getElementById("add1").value;
    x.add(option);
}

function AddData() {
    
        var rows = "";
        var id = "";
        var sel = document.getElementById('exam');
		var selected = sel.options[sel.selectedIndex];
		var extra = selected.getAttribute('data-foo');
		var sel1 = document.getElementById('mySelect');
		var selected1 = sel1.options[sel1.selectedIndex];
		var extra1 = selected1.getAttribute('data-foo');
		var date = document.getElementById('date').value;
		var stime = document.getElementById('stime').value;
		var etime = document.getElementById('etime').value;
		var sel2 = document.getElementById('mySelect1');
		var selected2 = sel2.options[sel2.selectedIndex];
		var extra2 = selected2.getAttribute('data-foo');
		var address = document.getElementById('address').value;
		var sel3 = document.getElementById('state');
		var selected3 = sel3.options[sel3.selectedIndex];
		var extra3 = selected3.getAttribute('data-foo');
		var al = document.getElementById('alloc').value;
		var apps = document.getElementById("app").innerHTML;
		var exam = document.getElementById("ex").innerHTML;
		var btn = document.getElementById("but").innerHTML;
		var rem = document.getElementById("rem").innerHTML;

        rows += "<tr><td>" + id + "</td><td>" + extra + "</td><td>" + extra1 + "</td><td>" + date + "</td><td>" + stime + "&nbsp-&nbsp" + etime + "</td><td>" + extra2 + "<br>" + address + "<br>" + extra3 + "</td><td>" + "<center>" + al + "</center" + "</td><td>" + apps + "</td><td>" + exam + "</td><td>" + btn + "</td><td>" + rem+ "</td><td>";
        $(rows).appendTo("#list tbody");
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
					      <a>Aizat Hamdan Jailani<br>Sekretariat APCS<br>941008065453</a>
					      <a href="">LogOut</a>
					    </div>
					  </li>
					  </ul>
		      	</div> <!-- nav -->
	      	</div>

	      	<ul class="breadcrumb">
				    <ol><a href="#">SECRETARIAT APCS</a></ol>
				    <ol><a href="#">MANAGE</a></ol>
				    <ol><a href="#">Comprehensive Exam</a></ol>
				    <ol class="active">Schedule</ol>        
				  </ul>
				</div>

				<div class="row" id="thumbnails_container">      
				<div class="col-md-12 col-md-offset-0">
				
    			<h1>Comprehensive Exam<br></h1>  
    			<h2>Exam Schedule for APCS Competent Person<br></h2>

    			<div class="dropdown1">
				 	
					  <button class="dropbtn1">Instruction : </button>
					  <div class="dropdown-content1">
					   1. Secretariat APCS can enter the title of exam at the text field provide.<br>
					   2. Secretariat APCS can choose the date, time and enter venue of exam at the text field provided.<br>
						3. Secretariat APCS can click "Confirm" button to confirm the date,time and venue that has been filled.<br>
						4. Secretariat APCS can view the date, time and date at the table below the "Confirm" button.
					  </div>
					
				</div><br><br>

    			<form>

							<div class="form-group">

						<label for="usr">Type of Exam &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<select id="exam">
				        <option data-foo="">--Please Choose--</option>
				        <option data-foo="Main Comprehensive Exam">Main Comprehensive Exam</option>
				        <option data-foo="Resit Comprehensive Exam">Resit Comprehensive Exam</option>
				        </select><br><br>

							<label for="usr">Exam Title &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<select  id="mySelect">
				        <option data-foo="">--Please Choose--</option>
				        <option data-foo="APCS Exam">APCS Exam</option>
				        <option data-foo="Applicant APCS Exam">Applicant APCS Exam</option>
				        </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

				        <label for="usr">Add Exam Title &nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<input type="text" id="add">

					      	<button type="button" onclick="myFunction()">Add Exam Title</button>

					      	<br><br><label for="usr">Date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<input type="date" id="date"><br><br>

					      	<label for="usr">Start Time &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<input type="time" id="stime">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

					      	<label for="usr">End Time &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<input type="time" id="etime">

					      	<br><br>
					      	<label for="usr">Venue &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<select id="mySelect1">
				        <option data-foo="">--Please Choose--</option>
				        <option data-foo="EiMAS">EiMAS</option>
				        <option data-foo="JAS">JAS</option>
				        </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

					      	<label for="usr">Add Venue &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<textarea rows="3" cols="30" id="add1"></textarea>

					      	<button type="button" onclick="myFunction1()">Add Venue</button>

					      	<br><br>
					      	<label for="usr">Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<textarea id="address" rows="2" cols="50"></textarea>

					      	<br><br>
					      	<label for="usr">State &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<select id="state">
				        <option data-foo="">--Please Choose--</option>
				        <option data-foo="Pahang">Pahang</option>
				        <option data-foo="Johor">Johor</option>
				        <option data-foo="Kelantan">Kelantan</option>
				        <option data-foo="Wilayah Persekutuan">Wilayah Persekutuan</option>
				        <option data-foo="Selangor">Selangor</option>
				        </select>
					      	
					      	<br><br>
					      	<label for="usr">Allocation of Seat : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="alloc">

					      <br><br><input class="btn btn-success" type="button" value="Save" name="save" onclick="AddData() "><hr><br>
					    </div>
					  </form> 


					  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<input type="search" class="light-table-filter" data-table="order-table"  placeholder="Search..." style="width: 222px;"><br><br>

				<table class="order-table table" id="list">
				    <thead>
				      <tr>
				        <th onclick="sortTable(0)">No.</th>
				        <th onclick="sortTable(1)">Type of Exam</th>
				        <th onclick="sortTable(2)">Exam Title</th>
				        <th onclick="sortTable(3)">Date</th>
				        <th onclick="sortTable(4)">Time</th>
				        <th onclick="sortTable(5)">Venue</th>
				        <th onclick="sortTable(6)">Allocation of Seat</th>
				        <th onclick="sortTable(7)"><center>Number of Applicant</center></th>
				        <th onclick="sortTable(8)">Action</th>
				        <th onclick="sortTable(9)">Status</th>
				        <th onclick="sortTable(9)">Reminder</th>
				      </tr></thead>


				      <tr>
				        <td></td>
				        <td>Comprehensive Exam</td>
				        <td>APCS Consultant Examination</td>
				        <td>1/03/2017</td>
				        <td>10:00 - 13:00</td>
				        <td>EiMAS<br>University Kebangsaan Malaysia<br>Selangor</td>
				        <td><center>20</center></td>
				        <td id="app"><center>1</center></td>
				        <td id="ex"><center><a href="examattend">Detail</a></center></td>
				        
				        <td  id="but"><button>Cancel</button></td>
				        <td id="rem"><button>Remind</button></td></tr>
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
    <!-- templatemo 393 fantasy -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>
</body>
</html>