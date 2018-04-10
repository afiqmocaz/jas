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
  	{!!Html::style('css/templatemo_style.css')!!}
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

			function myFunction1() {
		    var x = document.getElementById("mySelect");
		    var option = document.createElement("option");
		    option.text = document.getElementById("add").value;
		    x.add(option);
		}
		
		function AddData() {
    
        var rows = "";
        var id = "";
        var status = "APCS";
         var sel1 = document.getElementById('toq');
		var selected1 = sel1.options[sel1.selectedIndex];
		var extra1 = selected1.getAttribute('data-foo');
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
		var loq = $('input[name="level"]:checked').val();
		var btn = document.getElementById("but").innerHTML;
		var by = document.getElementById("by").innerHTML;


        rows += "<tr><td rowspan=4>" + id + "</td><td rowspan=4>" + status + "</td><td rowspan=4>" + extra1 + "</td><td rowspan=4>" + que + "</td><td rowspan=4>" + img + "</td><th>" + i + "</th><td>" + sa1 + "</td><th>" + a + "</th><td>" + a1 + "</td><td rowspan=4>" + extra + "</td><td rowspan=4>" + rr + "</td><td rowspan=4>" + level + "</td><td rowspan=4>" + btn + "</td><td rowspan=4>" + by + "</td></tr>" + "<tr><th>" + ii + "</th><td>" + sa2 + "</td><th>" + b + "</th><td>" + a2  + "</td></tr>" + "</td><th>" + iii + "</th><td>" + sa3 + "</td><th>" + c + "</th><td>" + a3 + "</td></tr>" + "</td><th>" + iv + "</th><td>" + sa4 + "</td><th>" + d + "</th><td>" + a4 + "</td></tr>";
        $(rows).appendTo("#list");
        var tr = document.createElement("tr");

        tr.innerHTML = rows;
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
					<li><a href="{{ url('index/create') }}">HOME</a></li>
	                  <li><a href="{{ url('announce/show') }}">ANNOUNCEMENT</a></li>
			          <li class="dropdown"><a class="dropbtn">APPLICANT</a>
					    <div class="dropdown-content">
					      <a href="{{ url('applicant/create') }}">Applicant Registration</a>
					      <a href="{{ url('paymentview/apcs') }}">Applicant Payment</a>
					    </div>
					  </li>
			          <li class="dropdown"><a class="dropbtn">MANAGE</a>
					    <div class="dropdown-content">
					      <a href="{{ url('syllabus/show') }}">Syllabus</a>
					      <a href="{{ url('refference/show') }}">Reference</a>
					      <ul class="parent" ><a href="#">Comprehensive Examination <span class="caret"></span></a>
							<ul class="child" >
							<a href="{{ url('schedule/apcs') }}">Schedule</a>
							<a href="{{ url('question/show') }}">Question Generation</a></ul></ul>
							<ul class="parent1" ><a href="#">Assignment&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="caret"></span></a>
							<ul class="child1" >
							 <a href="{{ url('assignment/show') }}">Master File</a>
					      <a href="{{ url('/secretariat_assigment/apcs') }}">Applicant Assignment</a></ul></ul>
					      
					      <a href="{{ url('interview/apcs') }}">Professional Interview</a>
					    </div>
					  </li>
					  <li class="dropdown"><a class="dropbtn">REPORT</a>
					    <div class="dropdown-content">
					      <a href="{{ url('cert/apcs') }}">Certificate</a>
					      <a href="{{ url('cpd/create') }}">Continuous Professional Development</a>
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

	      	<div class="breadcrumb flat">
				    <a href="#">SECRETARIAT APCS</a>
				    <a href="#">MANAGE</a>
				    <a href="#">Comprehensive Exam</a>
				    <a class="active">Question Generation</a>        
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

    			<div class="dropdown1">
				 	
					  <button class="dropbtn1">Instruction : </button>
					  <div class="dropdown-content1">
					   1. Secretariat APCS can enter question,Answer (A,B,C,D) and correct answer at the text field provided.<br>
2. Secretariat APCS can select Type of Question and Level of Question at the radio button provided.<br>
3. Secretariat APCS can click button "Save" to save the question of comprehensive examination.<br>
4. Secretariat APCS can view the previous filled question in the table below.<br>
5. Secretariat APCS can click "Edit" button to edit the question.<br>
6. Secretariat APCS can click "X" button to delete the question.<br>
7. Secretariat APCS can click button "Save" to save the question of Comprehensive Exam.
					  </div>
					
				</div><br>

    			{!! Form::model($question, ['route' =>['question.update', $question->id], 'method' => 'PUT', 'files' => true]) !!}

					    <div class="form-group">
							
								<label><br>Upload Image(If Needed) : </label><br>
								<center><input type="file" name="original_filename" id="original_filename" accept="image/*" onchange="myFunction(this)" multiple>
    							
					      <br></center><p id="demo"></p>
					      <script>
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
					      <label><b>File Type: image files	|	Max File Upload: 10	|	Max Size Upload: 10MB</b><br><br></label>

					      <br><label for="usr">Image Label &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{ Form::text('limg', null) }}<br><br>
					      

							<div class="form-group">

						    <table>
							<tr>
							<th>
					      	  <label for="usr">Specialized Area  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>&nbsp&nbsp&nbsp&nbsp
					      	  <!-- <select id="mySelect" name="specialized" required="">
					      	  <option data-foo="">--Please Choose--</option>
					      	  <option data-foo="Bag Filter">Bag Filter</option>
					      	  <option data-foo="Mechanical Separator">Mechanical Separator</option>
					      	  <option data-foo="Gas Scrubber">Gas Scrubber</option>
					      	  <option data-foo="Incineration System">Incineration System</option>
					      	  <option data-foo="Dust Scrubber">Dust Scrubber</option>
					      	  <option data-foo="Electrostatic precipitator">Electrostatic precipitator</option>
					      	  <option data-foo="Biofilters">Biofilters</option>
					      	  <option data-foo="Catalytic Converters">Catalytic Converters</option>
					      	  <option data-foo="Carbon Adsorber">Carbon Adsorber</option>
					      	  </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->

					      	  {{ Form::select('specialized_id', $specializes, null, ['style' => 'width:196px;']) }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  </th>

					      	  <th style="width:250px">
						<div id="check">
						<input type="checkbox" class="maxtickets_enable_cb" name="opwp_wootickets[tickets][0][enable]">Add New Specialized Area

				        <div class="max_tickets">
				        <iframe src="{{ url('specialized') }}" width="200" height="225" scrolling="yes">
  						<p>Your browser does not support iframes.</p>
						</iframe>
					      	</div>
					      	</th></tr></table>

							<br><label for="usr">Question  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>&nbsp&nbsp&nbsp&nbsp
					      	{{ Form::textarea('question', null, ['rows' => '4', 'cols' => '50']) }}

					      	<br><br>
					      	<label for="usr">Sub-Answer &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">i.</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  {{ Form::textarea('i', null, ['rows' => '3', 'cols' => '65']) }}<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">ii.</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  {{ Form::textarea('ii', null, ['rows' => '3', 'cols' => '65']) }}<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">iii.</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  {{ Form::textarea('iii', null, ['rows' => '3', 'cols' => '65']) }}<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">iv.</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp      
					      	  {{ Form::textarea('iv', null, ['rows' => '3', 'cols' => '65']) }}<br><br>

					      	<br><br>
					      	<label for="usr">Answer  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">A</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  {{ Form::textarea('a', null, ['rows' => '3', 'cols' => '65']) }}<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">B</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  {{ Form::textarea('b', null, ['rows' => '3', 'cols' => '65']) }}<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">C</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
					      	  {{ Form::textarea('c', null, ['rows' => '3', 'cols' => '65']) }}<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <label for="usr">D</label>   &nbsp&nbsp&nbsp&nbsp&nbsp    
					      	  {{ Form::textarea('d', null, ['rows' => '3', 'cols' => '65']) }}<br><br>

					      	<label for="usr">Correct Answer  &nbsp&nbsp&nbsp&nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp
					      	<select id="ca" name="correct" required="" style="width:200px">
					      	<option data-foo="" value="0" disabled="true" selected="true">--Please Select--</option>
					      	<option data-foo="A">A</option>
					      	<option data-foo="B">B</option>
					      	<option data-foo="C">C</option>
					      	<option data-foo="D">D</option>
					      	</select>
					      	<br><br>

					      	<table>
							<tr>
							<th>
					      	  <label for="usr">Related Refference&nbsp: </label>&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  <!-- <select id="mySelect" name="specialized" required="">
					      	  <option data-foo="">--Please Choose--</option>
					      	  <option data-foo="Bag Filter">Bag Filter</option>
					      	  <option data-foo="Mechanical Separator">Mechanical Separator</option>
					      	  <option data-foo="Gas Scrubber">Gas Scrubber</option>
					      	  <option data-foo="Incineration System">Incineration System</option>
					      	  <option data-foo="Dust Scrubber">Dust Scrubber</option>
					      	  <option data-foo="Electrostatic precipitator">Electrostatic precipitator</option>
					      	  <option data-foo="Biofilters">Biofilters</option>
					      	  <option data-foo="Catalytic Converters">Catalytic Converters</option>
					      	  <option data-foo="Carbon Adsorber">Carbon Adsorber</option>
					      	  </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->

					      	  {{ Form::select('related_id', $relates, null, ['style' => 'width:196px;']) }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      	  </th>

					      	  <th style="width:250px">
						<div id="check">
						<input type="checkbox" class="maxtickets_enable_cb1" name="opwp_wootickets[tickets][0][enable]">Add New Related Refference

				        <div class="max_tickets1">
					      	<iframe src="{{ url('related') }}" width="200" height="225" scrolling="yes">
  						<p>Your browser does not support iframes.</p>
						</iframe>
					      	</div>
					      	</div></th></tr></table><br>

							<label for="usr">Level of Question  &nbsp&nbsp : </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<!-- {{Form::radio('loq', 'low', true)}}
							{{Form::label('Low')}}
							{{Form::radio('loq', 'medium', false)}}
							{{Form::label('Medium')}}
							{{Form::radio('loq', 'High', false)}}
							{{Form::label('High')}} -->
							  <input type="radio" name="level" value="Low"> Low
							  <input type="radio" name="level" value="Medium"> Medium
							  <input type="radio" name="level" value="High"> High<br>
							</form>

					    </div>
					     <center>
					     <table width="40%">
					     <tr>
					     <th width="50%">
					     <center>{{ Form::submit('Save', ['class' => 'btn btn-primary btn-block', 'style' => 'width:150px;']) }}</center></th>

					     <th>
					      <center>{!! Html::linkRoute('question.show', 'Cancel', array($question->id), array('class' => 'btn btn-danger btn-block', 'style' => 'width:150px')) !!}</center>
					      </th>
					      </tr>
					      </table></center>
					    
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
    <script type="text/javascript">
	jQuery(document).ready(function($) {
   // STOCK OPTIONS
	$('input.maxtickets_enable_cb').change(function(){
		if ($(this).is(':checked'))
    $(this).next('div.max_tickets').show();
else
    $(this).next('div.max_tickets').hide();
	}).change();
});
</script>
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