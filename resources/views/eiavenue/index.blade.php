<?php session_start(); ?>

<!DOCTYPE html>

<html>
<head>
<style type="text/css">
	body
						{
							    counter-reset: Serial;           /* Set the Serial counter to 0 */
							}

						tr td:first-child:before
							{
							  counter-increment: Serial;      /* Increment the Serial counter */
							  content:counter(Serial); /* Display the counter */
							}
</style>

	{!!Html::style('css/bootstrap.min.css')!!}
  	{!!Html::style('css/justified-nav.css')!!}
  	{!!Html::style('css/templatemo_style.css')!!}
  	{!!Html::style('css/parsley.css')!!}

  	<center><h3>Venue</h3></center>

  	<div class="col-md-3">
		<div class="well">

			{!! Form::open(['route' => 'eiavenue.store', 'method' => 'POST']) !!}

			{{ Form::label('eiavenue', 'Venue:') }}
			{{ Form::text('eiavenue', null, ['class' => 'form-control']) }}<br>

			{{ Form::submit('Add Venue', ['class' => 'btn btn-success btn-block']) }}

			{!! Form::close() !!}
			
		</div>
	</div>

</div>

<div class="row">
	<div class="col-md-8">
		
		<table class="table" style="width:100%">
			<thead>
				<tr>
					<th style="width:20%"><center>No</center></th>
					<th style="width:80%"><center>Venue</center></th>
					<th style="width:20%"><center>Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach($eiavenues as $category)
				<tr>
					<td></td>
					<td><center>{{ $category->eiavenue }}</center></td>
					<td><center>{!! Form::open(['route' => ['eiavenue.destroy', $category->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

				        	{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit', 'class' => 'img-responsive cleaner', 'width' => '17', 'title' => 'Delete'] ) !!}</center>

				        	{!! Form::close() !!}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
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