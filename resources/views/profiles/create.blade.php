@extends('main2')
@section('content2')

<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3>Create New Question</h3>
			<hr>
			{!! Form::open(array('route' => 'profiles.store', 'files' => true)) !!}
			{{ Form::label('picture', 'Upload Profile Picture:') }}
			{{ Form::file('picture')}}

			{!! Form::open(array('route' => 'profiles.store', 'files' => true)) !!}
			{{ Form::label('certificate', 'Upload Certificate:') }}
			{{ Form::file('certificate')}}
			


			{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
   
			{!! Form::close() !!}
		</div>
	</div>

@endsection