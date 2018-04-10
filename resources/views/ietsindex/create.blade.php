@extends($master)
@section('content')


  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

	<style>

	</style>
</head>
<body>
	<div id="main_container" class="">
	
				<div class="row" id="thumbnails_container">      
				<div class="col-md-12 col-md-offset-0">

					 <div style="width:100%;" class="panel-group" >
				    <div class="panel panel-primary">
				      <div class="panel-heading"  >
				        <h4 class="panel-title" style="color:white;">
				          <a data-toggle="collapse" href="#collapse1">Dashboard Instruction :</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        •  Welcome to Jabatan Alam Sekitar(JAS) Secretariat System for IETS.<br>
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
				  </div></div>

                  		<!-- <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span style="color:red;" class="li_megaphone"></span>
					  			<a style="color:red;" href="{{ url('ietsannounce/show') }}"><h3>Announcement<br><br>{{ $ietsannounce }}</h3></a>
                  			</div>
					  			<p>{{$ietsannounce}} Announcement has been made.</p>
                  		</div> -->
                  		<div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ $ietsannounce  }}</h3>

            <p>Announcement</p>
          </div>
          <div class="icon">
            <i class="ion-android-volume-up"></i>
          </div>
          <a href="{{ url('ietsannounce/show') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
                 <!--  		<div class="col-md-2 col-sm-2 col-md-offset-0 box0">
                  			<div class="box1">
					  			<span style="color:orange;" class="li_stack"></span>
					  			<a style="color:orange;" href="{{ url('/secretariat_assigment/iets') }}"><h3>Assignment<br><br>{{ $ietsassignapp }}</h3></a>
                  			</div>
					  			<p>{{$ietsassignapp}} Applicant is available for assignments.</p>
                  		</div> -->
   <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $ietsassignapp }}</h3>

            <p>Assignment</p>
          </div>
          <div class="icon">
            <i class="ion-document-text"></i>
          </div>
          <a href="{{ url('/secretariat_assigment/iets') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
          <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ $ietsproiv }}</h3>

            <p>Interview</p>
          </div>
          <div class="icon">
            <i class="ion-ios-people"></i>
          </div>
          <a href="{{ url('interview/iets') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <h3>{{ $ietscert }}</h3>

            <p>Certificate</p>
          </div>
          <div class="icon">
            <i class="ion-ios-paper"></i>
          </div>
          <a href="{{ url('cert/iets') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
<div class="row">
      <div class="col-md-8 col-md-offset-0">

            <div id="container"></div></div>  <div class="col-md-4"><div  id="container2" ></div></div> </div>   
                           		<!-- <div class="col-md-2 col-sm-2 col-md-offset-0 box0">
                  			<div class="box1">
					  			<span style="color:green;" class="li_user"></span>
					  			<a style="color:green;" href="{{ url('interview/iets') }}"><h3>Interview<br><br>{{ $ietsproiv }}</h3></a>
                  			</div>
					  			<p>{{$ietsproiv}} Applicant is available for interview.</p>
                  		</div> -->

                  	<!-- 	<div class="col-md-2 col-sm-2 col-md-offset-0 box0">
                  			<div class="box1">
					  			<span style="color:blue;" class="li_news"></span>
					  			<a style="color:blue;" href="{{ url('cert/iets') }}"><h3>Certificate<br><br>{{ $ietscert }}</h3></a>
                  			</div>
					  			<p>{{$ietscert}} Applicant is available to be cerficate.</p>
                  		</div>	 -->
						
					<!-- 	<div class="col-md-2 col-sm-2 col-md-offset-0 box0">
                  			<div class="box1">
					  			<span style="color:purple;" class="li_clip"></span>
					  			<a style="color:purple;" href="{{ url('ietscpd/create') }}"><h3>CPD<br><br>{{ $ietscpd }}</h3>
                  			</div>
					  			<p>{{$ietscpd}} Applicant that reach to gather Continuous Professional Development Points.</p>
                  		</div> -->
						
						

                  <!-- 		<div class="row" id="thumbnails_container"> 
                  		<center><button onmouseover="myFunction()" class="btn btn-primary" style="opacity: 0.5; border: 0px; background-color:maroon; padding-left:4.2%; padding-right: 4.2%; margin-right: 0.8%"><div style="font-size: 43px"><span class="li_user"></div>View Applicant Chart</button>
                  		<button onmouseover="myFunction1()" class="btn btn-primary" style="opacity: 0.5; border: 0px; background-color:brown; padding-left:4.2%; padding-right: 4.2%; margin-left: 0.6%"><div style="font-size: 43px"><span class="li_banknote"></div>View Payment Chart</button></center>
                  		<div class="col-md-12 col-md-offset-0"> -->

                  		

                      <!-- SERVER STATUS PANELS -->
                      	<div class="col-md-6 col-sm-3 col-md-offset-3 mb">
                      		<div id="myDIV" style="color:maroon; visibility: hidden; display: none;" class="white-panel pn donut-chart">
                      			<div class="white-header">
						  			<a style="color:maroon;" href="{{ url('applicant/create') }}"><h5>Applicant : Qualified vs New</h5></a>
                      			</div>
								<div id="myDIV" class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-database"></i>{{ $ietsapplicant }}%</p>
									</div>
	                      		</div>
								<canvas id="serverstatus01" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: 70,
												color:"#68dff0"
											},
											{
												value : {{ $ietsapplicant }},
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
								</script>
	                      	</div>
                      	</div><!-- /col-md-4-->

                      	<!-- SERVER STATUS PANELS -->
                      	<div class="col-md-3 col-sm-4 mb">
                      		<div id="myDIV1" style="color:brown; visibility: hidden; display: none;" class="white-panel pn donut-chart">
                      			<div class="white-header">
						  			<a style="color:brown;" href="{{ url('paymentview/iets') }}"><h5>Payment : Paid vs Applicant</h5></a>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-database"></i>{{ $ietspayment }}%</p>
									</div>
	                      		</div>
								<canvas id="serverstatus02" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: {{ $ietspayment }},
												color:"#68dff0"
											},
											{
												value : 20,
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
								</script>
	


    <script>
	function myFunction() {
	    var x = document.getElementById('myDIV');
	    if (x.style.visibility === 'hidden') {
	        x.style.visibility = 'visible';
	        x.style.display = 'block';
	    } else {
	        x.style.visibility = 'hidden';
	        x.style.display = 'none';
	    }
	}
	</script>
	<script>
  var pie=JSON.parse('<?php echo $pie ?>');
   var drill=JSON.parse('<?php echo $Arr ?>');
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Payments'
    },
colors: ['#428bca', '#FFA500', '#5cb85c', '#FFC0CB', '#00FF00'],
    series: [{
        name: 'Applicant',
        colorByPoint: true,
        data: pie
    }],
    drilldown: {
        series: drill
    }
});
	</script>
	<script type="text/javascript"> var donut = JSON.parse('<?php echo $donut ?>');
Highcharts.chart('container2', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },

    colors: ['#428bca', '#FFA500', '#FF0000', '#FFC0CB', '#00FF00'],  
    title: {
        text: 'IETS Applicant registration status'
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Number',
        data: donut
    }]
});</script>
@endsection