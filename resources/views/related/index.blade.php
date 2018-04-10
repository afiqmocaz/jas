<?php session_start(); ?>

<!DOCTYPE html>

<html>
<head>

	{!!Html::style('css/bootstrap.min.css')!!}
  	{!!Html::style('css/justified-nav.css')!!}
  	{!!Html::style('css/templatemo_style.css')!!}
  	{!!Html::style('css/parsley.css')!!}

  	<h3><center>Related Reference</center></h3>

<div class="row">

	<div class="col-md-3">
		<div class="well">

			{!! Form::open(['route' => 'related.store', 'method' => 'POST']) !!}
                        <input type="hidden" name='category' value='{{$category}}'>
			{{ Form::label('related', 'Related Reference:') }}
			{{ Form::text('related', null, ['class' => 'form-control']) }}<br>

			{{ Form::submit('Add Related Reference', ['class' => 'btn btn-success btn-block']) }}

			{!! Form::close() !!}
			
		</div>
	</div>

	<div class="col-md-8">
		
		<table class="table table-bordered" style="width:100%">
			<thead>
				<tr>
					<th style="width:1%"><center>No</center></th>
					<th style="width:99%"><center>Related Reference</center></th>
					<th style="width:1%"><center>Action</center></th>
				</tr>
			</thead>

			<tbody>
                        <div class="hide">{{$count = 1}}</div>
				@foreach($relates as $c)
				<tr>
					<td>{{$count++}}</td>
					<td><center>{{ $c->related }}</center></td>
					<td><center>{!! Form::open(['route' => ['related.destroy', $c->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

				        	{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit', 'class' => 'img-responsive cleaner', 'width' => '17', 'title' => 'Delete'] ) !!}</center>

				        	{!! Form::close() !!}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

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