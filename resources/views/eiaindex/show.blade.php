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
							<a href="{{ url('eiaquestion/show') }}">Generating Question</a></ul></ul>
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
				    <a class="active" style="color:white">Dashboard</a>        
				  </div>
				</div>

				<div class="row" id="thumbnails_container">      
				<div class="col-md-12 col-md-offset-0">
				
    			<h1>Welcome, <br></h1>  

    			<div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary" style="border-color:#4CAF50;">
				      <div class="panel-heading" style="background-color:#4CAF50;" >
				        <h4 class="panel-title" style="color:white;">
				          <a data-toggle="collapse" href="#collapse1">Dashboard Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  Welcome to Jabatan Alam Sekitar(JAS) Secretariat System for EIA.<br>
				        •  This is the dashboard for this system.<br>
				        •  This interface will show the summarize of the overall process of consultant registration scheme.
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

					  <div class="newspaper">
					  <br><br><form action="{{ url('eiaannounce/show') }}" method="get">
					  <button class="button" style="vertical-align:middle"><br><label>1</label><br><span>ANNOUNCEMENT</span></button></form>

					  <br><form action="{{ url('secretariat_assigment/eia') }}" method="get">
					  <button class="button1" style="vertical-align:middle">
					  <br><label>1</label><br>
					<span>ASSIGNMENT</span></button></form><br>

					  <br><form action="{{ url('eiaapplicant/create') }}" method="get">
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

					  <br><form action="{{ url('interview/eia') }}" method="get">
					  <button class="button3" style="vertical-align:middle"><br><label>1</label><br><span>INTERVIEW</span></button></form><br>

					  <br><form action="{{ url('paymentview/eia') }}" method="get">
					  <button class="button4" style="vertical-align:middle"><br><label>1</label><br><span>PAYMENT</span></button></form>

					  <br><form action="{{ url('cert/eia') }}" method="get">
					  <button class="button5" style="vertical-align:middle"><br><label>1</label><br><span>CERTIFICATE</span></button></form><br>
						</div>
					  <form action="{{ url('eiacpd/create') }}" method="get">
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