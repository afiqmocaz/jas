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

		.newspaper {
		    
		    column-count: 3;
		    column-width: 100px;
		}

		.button {
		  display: inline-block;
		  border-radius: 4px;
		  background-color: #f4511e;
		  border: none;
		  color: #FFFFFF;
		  text-align: center;
		  font-size: 23px;
		  padding: 20px;
		  width: 200px;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
		}

		.button span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}


		.button span:after {
		   content: "\261B";
		  position: center;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		  font-size: 40px;
		}

		.button:hover span {
		  padding-right: 30px;
		}

		.button:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		.button {
		  display: inline-block;
		  padding: 15px 25px;
		  font-size: 24px;
		  cursor: pointer;
		  text-align: center;
		  text-decoration: none;
		  outline: none;
		  color: #fff;
		  background-color: #4CAF50;
		  border: none;
		  border-radius: 15px;
		  box-shadow: 0 9px #999;
		}

		.button:hover {background-color: #ff1a1a}

		.button:active {
		  background-color: #ff4d4d;
		  box-shadow: 0 5px #666;
		  transform: translateY(8px);
		}
		.button {
		    position: relative;
		    background-color: #cc0000;
		    border: none;
		    font-size: 23px;
		    color: #FFFFFF;
		    padding: 40px;
		    width: 275px;
		    text-align: center;
		    -webkit-transition-duration: 0.4s; /* Safari */
		    transition-duration: 0.4s;
		    text-decoration: none;
		    overflow: hidden;
		    cursor: pointer;
		}

		.button:after {
		    content: "";
		    background: #f1f1f1;
		    display: block;
		    position: absolute;
		    padding-top: 300%;
		    padding-left: 350%;
		    margin-left: -20px !important;
		    margin-top: -120%;
		    opacity: 0;
		    transition: all 0.8s
		}

		.button:active:after {
		    padding: 0;
		    margin: 0;
		    opacity: 1;
		    transition: 0s
		}

		.button1 {
		  display: inline-block;
		  border-radius: 4px;
		  background-color: #f4511e;
		  border: none;
		  color: #FFFFFF;
		  text-align: center;
		  font-size: 23px;
		  padding: 20px;
		  width: 200px;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
		}

		.button1 span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.button1 span:after {
		   content: "\261B";
		  position: center;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		  font-size: 40px;
		}

		.button1:hover span {
		  padding-right: 25px;
		}

		.button1:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		.button1 {
		  display: inline-block;
		  padding: 15px 25px;
		  font-size: 24px;
		  cursor: pointer;
		  text-align: center;
		  text-decoration: none;
		  outline: none;
		  color: #fff;
		  background-color: #4CAF50;
		  border: none;
		  border-radius: 15px;
		  box-shadow: 0 9px #999;
		}

		.button1:hover {background-color: #ffd11a}

		.button1:active {
		  background-color: #ffff00;
		  box-shadow: 0 5px #666;
		  transform: translateY(8px);
		}
		.button1 {
		    position: relative;
		    background-color: #cccc00;
		    border: none;
		    font-size: 23px;
		    color: #FFFFFF;
		    padding: 40px;
		    width: 275px;
		    text-align: center;
		    -webkit-transition-duration: 0.4s; /* Safari */
		    transition-duration: 0.4s;
		    text-decoration: none;
		    overflow: hidden;
		    cursor: pointer;
		}

		.button1:after {
		    content: "";
		    background: #f1f1f1;
		    display: block;
		    position: absolute;
		    padding-top: 300%;
		    padding-left: 350%;
		    margin-left: -20px !important;
		    margin-top: -120%;
		    opacity: 0;
		    transition: all 0.8s
		}

		.button1:active:after {
		    padding: 0;
		    margin: 0;
		    opacity: 1;
		    transition: 0s
		}

		.button2 {
		  display: inline-block;
		  border-radius: 4px;
		  background-color: #f4511e;
		  border: none;
		  color: #FFFFFF;
		  text-align: center;
		  font-size: 23px;
		  padding: 20px;
		  width: 200px;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
		}

		.button2 span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.button2 span:after {
		   content: "\261B";
		  position: center;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		  font-size: 40px;
		}

		.button2:hover span {
		  padding-right: 25px;
		}

		.button2:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		.button2 {
		  display: inline-block;
		  padding: 15px 25px;
		  font-size: 24px;
		  cursor: pointer;
		  text-align: center;
		  text-decoration: none;
		  outline: none;
		  color: #fff;
		  background-color: #4CAF50;
		  border: none;
		  border-radius: 15px;
		  box-shadow: 0 9px #999;
		}

		.button2:hover {background-color: #0052cc}

		.button2:active {
		  background-color: #66a3ff;
		  box-shadow: 0 5px #666;
		  transform: translateY(8px);
		}
		.button2 {
		    position: relative;
		    background-color: #003380;
		    border: none;
		    font-size: 23px;
		    color: #FFFFFF;
		    padding: 40px;
		    width: 275px;
		    text-align: center;
		    -webkit-transition-duration: 0.4s; /* Safari */
		    transition-duration: 0.4s;
		    text-decoration: none;
		    overflow: hidden;
		    cursor: pointer;
		}

		.button2:after {
		    content: "";
		    background: #f1f1f1;
		    display: block;
		    position: absolute;
		    padding-top: 300%;
		    padding-left: 350%;
		    margin-left: -20px !important;
		    margin-top: -120%;
		    opacity: 0;
		    transition: all 0.8s
		}

		.button2:active:after {
		    padding: 0;
		    margin: 0;
		    opacity: 1;
		    transition: 0s
		}

		.button3 {
		  display: inline-block;
		  border-radius: 4px;
		  background-color: #f4511e;
		  border: none;
		  color: #FFFFFF;
		  text-align: center;
		  font-size: 23px;
		  padding: 20px;
		  width: 200px;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
		}

		.button3 span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.button3 span:after {
		   content: "\261B";
		  position: center;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		  font-size: 40px;
		}

		.button3:hover span {
		  padding-right: 25px;
		}

		.button3:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		.button3 {
		  display: inline-block;
		  padding: 15px 25px;
		  font-size: 24px;
		  cursor: pointer;
		  text-align: center;
		  text-decoration: none;
		  outline: none;
		  color: #fff;
		  background-color: #4CAF50;
		  border: none;
		  border-radius: 15px;
		  box-shadow: 0 9px #999;
		}

		.button3:hover {background-color: #9900cc}

		.button3:active {
		  background-color: #d966ff;
		  box-shadow: 0 5px #666;
		  transform: translateY(8px);
		}
		.button3 {
		    position: relative;
		    background-color: #600080;
		    border: none;
		    font-size: 23px;
		    color: #FFFFFF;
		    padding: 40px;
		    width: 275px;
		    text-align: center;
		    -webkit-transition-duration: 0.4s; /* Safari */
		    transition-duration: 0.4s;
		    text-decoration: none;
		    overflow: hidden;
		    cursor: pointer;
		}

		.button3:after {
		    content: "";
		    background: #f1f1f1;
		    display: block;
		    position: absolute;
		    padding-top: 300%;
		    padding-left: 350%;
		    margin-left: -20px !important;
		    margin-top: -120%;
		    opacity: 0;
		    transition: all 0.8s
		}

		.button3:active:after {
		    padding: 0;
		    margin: 0;
		    opacity: 1;
		    transition: 0s
		}

		.button4 {
		  display: inline-block;
		  border-radius: 4px;
		  background-color: #f4511e;
		  border: none;
		  color: #FFFFFF;
		  text-align: center;
		  font-size: 23px;
		  padding: 20px;
		  width: 200px;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
		}

		.button4 span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.button4 span:after {
		   content: "\261B";
		  position: center;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		  font-size: 40px;
		}

		.button4:hover span {
		  padding-right: 25px;
		}

		.button4:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		.button4 {
		  display: inline-block;
		  padding: 15px 25px;
		  font-size: 24px;
		  cursor: pointer;
		  text-align: center;
		  text-decoration: none;
		  outline: none;
		  color: #fff;
		  background-color: #4CAF50;
		  border: none;
		  border-radius: 15px;
		  box-shadow: 0 9px #999;
		}

		.button4:hover {background-color: #1aff66}

		.button4:active {
		  background-color: #66ff99;
		  box-shadow: 0 5px #666;
		  transform: translateY(8px);
		}
		.button4 {
		    position: relative;
		    background-color: #00cc44;
		    border: none;
		    font-size: 23px;
		    color: #FFFFFF;
		    padding: 40px;
		    width: 275px;
		    text-align: center;
		    -webkit-transition-duration: 0.4s; /* Safari */
		    transition-duration: 0.4s;
		    text-decoration: none;
		    overflow: hidden;
		    cursor: pointer;
		}

		.button4:after {
		    content: "";
		    background: #f1f1f1;
		    display: block;
		    position: absolute;
		    padding-top: 300%;
		    padding-left: 350%;
		    margin-left: -20px !important;
		    margin-top: -120%;
		    opacity: 0;
		    transition: all 0.8s
		}

		.button4:active:after {
		    padding: 0;
		    margin: 0;
		    opacity: 1;
		    transition: 0s
		}

		.button5 {
		  display: inline-block;
		  border-radius: 4px;
		  background-color: #f4511e;
		  border: none;
		  color: #FFFFFF;
		  text-align: center;
		  font-size: 23px;
		  padding: 20px;
		  width: 200px;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
		}

		.button5 span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.button5 span:after {
		   content: "\261B";
		  position: center;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		  font-size: 40px;
		}

		.button5:hover span {
		  padding-right: 25px;
		}

		.button5:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		.button5 {
		  display: inline-block;
		  padding: 15px 25px;
		  font-size: 24px;
		  cursor: pointer;
		  text-align: center;
		  text-decoration: none;
		  outline: none;
		  color: #fff;
		  background-color: #4CAF50;
		  border: none;
		  border-radius: 15px;
		  box-shadow: 0 9px #999;
		}

		.button5:hover {background-color: #ff8533}

		.button5:active {
		  background-color: #ffb380;
		  box-shadow: 0 5px #666;
		  transform: translateY(8px);
		}
		.button5 {
		    position: relative;
		    background-color: #e65c00;
		    border: none;
		    font-size: 23px;
		    color: #FFFFFF;
		    padding: 40px;
		    width: 275px;
		    text-align: center;
		    -webkit-transition-duration: 0.4s; /* Safari */
		    transition-duration: 0.4s;
		    text-decoration: none;
		    overflow: hidden;
		    cursor: pointer;
		}

		.button5:after {
		    content: "";
		    background: #f1f1f1;
		    display: block;
		    position: absolute;
		    padding-top: 300%;
		    padding-left: 350%;
		    margin-left: -20px !important;
		    margin-top: -120%;
		    opacity: 0;
		    transition: all 0.8s
		}

		.button5:active:after {
		    padding: 0;
		    margin: 0;
		    opacity: 1;
		    transition: 0s
		}

		.button6 {
		  display: inline-block;
		  border-radius: 4px;
		  background-color: #f4511e;
		  border: none;
		  color: #FFFFFF;
		  text-align: center;
		  font-size: 23px;
		  padding: 20px;
		  width: 200px;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
		}

		.button6 span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.button6 span:after {
		   content: "\261B";
		  position: center;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		  font-size: 40px;
		}

		.button6:hover span {
		  padding-right: 25px;
		}

		.button6:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		.button6 {
		  display: inline-block;
		  padding: 15px 25px;
		  font-size: 24px;
		  cursor: pointer;
		  text-align: center;
		  text-decoration: none;
		  outline: none;
		  color: #fff;
		  background-color: #4CAF50;
		  border: none;
		  border-radius: 15px;
		  box-shadow: 0 9px #999;
		}

		.button6:hover {background-color: #666666}

		.button6:active {
		  background-color: #b3b3b3;
		  box-shadow: 0 5px #666;
		  transform: translateY(8px);
		}
		.button6 {
		    position: relative;
		    background-color: #404040;
		    border: none;
		    font-size: 23px;
		    color: #FFFFFF;
		    padding: 40px;
		    width: 825px;
		    text-align: center;
		    -webkit-transition-duration: 0.4s; /* Safari */
		    transition-duration: 0.4s;
		    text-decoration: none;
		    overflow: hidden;
		    cursor: pointer;
		}

		.button6:after {
		    content: "";
		    background: #f1f1f1;
		    display: block;
		    position: absolute;
		    padding-top: 300%;
		    padding-left: 350%;
		    margin-left: -20px !important;
		    margin-top: -120%;
		    opacity: 0;
		    transition: all 0.8s
		}

		.button6:active:after {
		    padding: 0;
		    margin: 0;
		    opacity: 1;
		    transition: 0s
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
			        <ul class="nav nav-justified" id="menu">
					<li class="active"><a href="index">HOME</a></li>
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
				    <ol class="active">HOME</ol>        
				  </ul>
				</div>

				<div class="row" id="thumbnails_container">      
				<div class="col-md-12 col-md-offset-0">
				
    			<h1>Welcome, <br></h1>  

    			<div class="dropdown1">
				 	
					  <button class="dropbtn1">Instruction : </button>
					  <div class="dropdown-content1">
					  1. Welcome to Jabatan Alam Sekitar
					  </div>

					  <div class="newspaper">
					  <br><br><form action="announcement" method="get">
					  <button class="button" style="vertical-align:middle"><br><label>1</label><br><span>ANNOUNCEMENT</span></button></form>

					  <br><form action="applicant assignapp" method="get">
					  <button class="button1" style="vertical-align:middle">
					  <br><label>1</label><br>
					<span>ASSIGNMENT</span></button></form><br>

					  <br><form action="applicant" method="get">
					  <button class="button2" style="vertical-align:middle">
					  	<center><table>
					  <tr>
					  <th>New</th>	
					  <th>&nbsp&nbsp&nbspQualified</th>	
					  </tr>
					  <tr>
					  <td><center>1</center></td>	
					  <td><center>&nbsp&nbsp&nbsp0</center> </td>	
					  </tr>
					  </table></center>
					  <span>REGISTRATION</span></button></form>

					  <br><form action="proiv" method="get">
					  <button class="button3" style="vertical-align:middle"><br><label>1</label><br><span>INTERVIEW</span></button></form><br>

					  <br><form action="payment" method="get">
					  <button class="button4" style="vertical-align:middle"><br><label>1</label><br><span>PAYMENT</span></button></form>

					  <br><form action="cert" method="get">
					  <button class="button5" style="vertical-align:middle"><br><label>1</label><br><span>CERTIFICATE</span></button></form><br>
						</div>
					  <form action="cpd" method="get">
					  <center><button class="button6" style="vertical-align:middle"><label>1</label><br><span>CONTINUOUS PROFESSIONAL DEVELOPMENT</span></button></center></form><br>
					
				</div><br><br>       
				 
				  
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