@extends($master)
@section('content')
	
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
	<style>

			
	</style>


				<div class="row" id="thumbnails_container">      
				<div class="col-md-12 col-md-offset-0">

    			<!-- INSTRUCTION -->
				  <div style="width: 100%;" class="panel-group" >
				    <div class="panel panel-primary">
				      <div class="panel-heading" >
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
				  </div></div>
<!-- 
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span style="color:red;" class="li_megaphone"></span>
					  			<a style="color:red;" href="{{ url('eiaannounce/show') }}">
					  			<h3>Announcement<br><br>{{ $eiaannounce }}</h3></a>
                  			</div>
					  			<p>{{$eiaannounce}} Announcement has been made.</p>
                  		</div>

                  		<div class="col-md-2 col-sm-2 col-md-offset-0 box0">
                  			<div class="box1">
					  			<span style="color:orange;" class="li_stack"></span>
					  			<a style="color:orange;" href="{{ url('secretariat_assigment/eia') }}"><h3>Assignment<br><br>{{ $eiaassignapp }}</h3></a>
                  			</div>
					  			<p>{{$eiaassignapp}} Applicant is available for assignments.</p>
                  		</div>

                  		<div class="col-md-2 col-sm-2 col-md-offset-0 box0">
                  			<div class="box1">
					  			<span style="color:green;" class="li_user"></span>
					  			<a style="color:green;" href="{{ url('interview/eia') }}"><h3>Interview<br><br>{{ $eiaproiv }}</h3></a>
                  			</div>
					  			<p>{{$eiaproiv}} Applicant is available for interview.</p>
                  		</div>

                  		<div class="col-md-2 col-sm-2 col-md-offset-0 box0">
                  			<div class="box1">
					  			<span style="color:blue;" class="li_news"></span>
					  			<a style="color:blue;" href="{{ url('cert/eia') }}"><h3>Certificate<br><br>{{ $eiacert }}</h3></a>
                  			</div>
					  			<p>{{$eiacert}} Applicant is available to be cerficate.</p>
                  		</div>

                  		<div class="col-md-2 col-sm-2 col-md-offset-0 box0">
                  			<div class="box1">
					  			<span style="color:purple;" class="li_clip"></span>
					  			<a style="color:purple;" href="{{ url('eiacpd/create') }}"><h3>CPD<br><br>{{ $eiacpd }}</h3></a>
                  			</div>
					  			<p>{{$eiacpd}} Applicant that reach to gather Continuous Professional Development Points.</p>
                  		</div> -->
<div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ $eiaannounce  }}</h3>

            <p>Announcement</p>
          </div>
          <div class="icon">
            <i class="ion-android-volume-up"></i>
          </div>
          <a href="{{ url('eiaannounce/show') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
                 
   <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $eiaassignapp }}</h3>

            <p>Assignment</p>
          </div>
          <div class="icon">
            <i class="ion-document-text"></i>
          </div>
          <a href="{{ url('/secretariat_assigment/eia') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
          <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ $eiaproiv }}</h3>

            <p>Interview</p>
          </div>
          <div class="icon">
            <i class="ion-ios-people"></i>
          </div>
          <a href="{{ url('interview/eia') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <h3>{{ $eiacert }}</h3>

            <p>Certificate</p>
          </div>
          <div class="icon">
            <i class="ion-ios-paper"></i>
          </div>
          <a href="{{ url('cert/eia') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

<div class="row">
      <div class="col-md-8 col-md-offset-0">

            <div id="container"></div></div>  <div class="col-md-4"><div  id="container2" ></div></div> </div>  
                  		

                  		

                      <!-- SERVER STATUS PANELS -->
                  

	 <script>
  var pie=JSON.parse('<?php echo $pie ?>');
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
        series: [{
            name: 'IE',
            id: 'IE',
            data: [
                ['v11.0', 24.13],
                ['v8.0', 17.2],
                ['v9.0', 8.11],
                ['v10.0', 5.33],
                ['v6.0', 1.06],
                ['v7.0', 0.5]
            ]
        }, {
            name: 'Applicant',
            id: 'PRE-QUALIFICATION REGISTRATION',
            data: [
                ['Approved', 4],
                ['Pending', 1],
                ['Declined',2]
            ]
        }, {
            name: 'Firefox',
            id: 'CERTIFICATE RENEWAL',
            data: [
                ['v35', 2.76],
                ['v36', 2.32],
                ['v37', 2.31],
                ['v34', 1.27],
                ['v38', 1.02],
                ['v31', 0.33],
                ['v33', 0.22],
                ['v32', 0.15]
            ]
        }, {
            name: 'Safari',
            id: 'RESEAT EXAMINATION',
            data: [
                ['v8.0', 2.56],
                ['v7.1', 0.77],
                ['v5.1', 0.42],
                ['v5.0', 0.3],
                ['v6.1', 0.29],
                ['v7.0', 0.26],
                ['v6.2', 0.17]
            ]
        }, {
            name: 'Opera',
            id: 'Opera',
            data: [
                ['v12.x', 0.34],
                ['v28', 0.24],
                ['v27', 0.17],
                ['v29', 0.16]
            ]
        }]
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
        text: 'EIS Applicant registration status'
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