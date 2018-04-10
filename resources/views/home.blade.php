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
  	{!!Html::style('lineicons/style.css')!!}
  	{!!Html::style('css/style.css')!!}
  	{!!Html::style('css/style-responsive.css')!!}
  	{!!Html::script('js/chart-master/Chart.js')!!}
</head>
<body>
@role('admin')
    <script type="text/javascript">
        window.location = '/users';
    </script>
@endrole
@role('secapcs')
    <script type="text/javascript">
        window.location = '/index/create';
    </script>
@endrole
@role('seceia')
    <script type="text/javascript">
        window.location = '/eiaindex/create';
    </script>
@endrole
@role('seciets')
    <script type="text/javascript">
        window.location = '/ietsindex/create';
    </script>
@endrole
@role('applicants')
    <script type="text/javascript">
        window.location = '/regCategory/create';
    </script>
@endrole
@role('consultantapcs')
    <script type="text/javascript">
        window.location = '/apcs_syllabus';
    </script>
@endrole
@role('consultanteia')
    <script type="text/javascript">
        window.location = '/modules';
    </script>
@endrole
@role('consultantiets')
    <script type="text/javascript">
        window.location = '/iets_syllabus';
    </script>
@endrole
@role('certapcs')
    <script type="text/javascript">
        window.location = '/apcsprofiles/index';
    </script>
@endrole
@role('certeia')
    <script type="text/javascript">
        window.location = '/eiaprofiles/index';
    </script>
@endrole
@role('certiets')
    <script type="text/javascript">
        window.location = '/ietsprofiles/index';
    </script>
@endrole
@role('smeapcs')
    <script type="text/javascript">
        window.location = '/apcsme';
    </script>
@endrole
@role('smeeia')
    <script type="text/javascript">
        window.location = '/eia_sme';
    </script>
@endrole
@role('smeiets')
    <script type="text/javascript">
        window.location = '/sme';
    </script>
@endrole
<footer>
			<div class="credit row">
				<center><div class="col-md-6 col-md-offset-3">
					 <div id="templatemo_footer">Copyright © 2017 Jabatan Alam Sekitar
          </div>
				</div>
						
			</div>
</footer>
</body>
</html>