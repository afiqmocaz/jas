@extends('main')
@section('content')

<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Question</h1>
			<hr>
			{!! Form::open(array('route' => 'questions.store', 'files' => true)) !!}
			{{ Form::label('figure', 'Upload Figure:') }}
			{{ Form::file('figure')}}
			{{ Form::label('question', 'Question:') }}
			{{ Form::textarea('question', null, array('class' => 'form-control')) }}

			{{ Form::label('sub1_ans', 'Sub1_ans:') }}
			{{ Form::text('sub1_ans', null, array('class' => 'form-control')) }}

			{{ Form::label('sub2_ans', 'Sub2_ans:') }}
			{{ Form::text('sub2_ans', null, array('class' => 'form-control')) }}

			{{ Form::label('sub3_ans', 'Sub3_ans:') }}
			{{ Form::text('sub3_ans', null, array('class' => 'form-control')) }}

			{{ Form::label('sub4_ans', 'Sub4_ans:') }}
			{{ Form::text('sub4_ans', null, array('class' => 'form-control')) }}

			{{ Form::label('ans1', 'Ans1:') }}
			{{ Form::text('ans1', null, array('class' => 'form-control')) }}

			{{ Form::label('ans2', "Ans2:") }}
			{{ Form::text('ans2', null, array('class' => 'form-control')) }}

			{{ Form::label('ans3', "Ans3:") }}
			{{ Form::text('ans3', null, array('class' => 'form-control')) }}

			{{ Form::label('ans4', "Ans4:") }}
			{{ Form::text('ans4', null, array('class' => 'form-control')) }}

			{{ Form::label('true_ans', "True Answer:") }}
			{{ Form::text('true_ans', null, array('class' => 'form-control')) }}

			{{ Form::label('level_id', "Level of Question:") }}
			{{ Form::text('level_id', null, array('class' => 'form-control')) }}



			{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
   
			{!! Form::close() !!}
		</div>
	</div>

@endsection