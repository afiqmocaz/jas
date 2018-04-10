@extends('main')

@section('content')

<div class="row">
	{!! Form::model($quiz, ['route' => ['quizzes.update', $quiz->id], 'method' => 'PUT']) !!}
<div class="col-md-8">
	{{ Form::label('figure', 'Figure:') }}
	{{ Form::file('figure') }}

	{{ Form::label('question', 'Question:', ['class' => 'form-spacing-top']) }}
	{{ Form::textarea('question', null, ["class" => 'form-control']) }}

	{{ Form::label('sub1_ans', "Sub1 Ans:", ['class' => 'form-spacing-top']) }}
	{{ Form::text('sub1_ans', null, ['class' => 'form-control']) }}

	{{ Form::label('sub2_ans', "Sub2 Ans:", ['class' => 'form-spacing-top']) }}
	{{ Form::text('sub2_ans', null, ['class' => 'form-control']) }}

	{{ Form::label('sub3_ans', "Sub3 Ans:", ['class' => 'form-spacing-top']) }}
	{{ Form::text('sub3_ans', null, ['class' => 'form-control']) }}

	{{ Form::label('sub4_ans', "Sub4 Ans:", ['class' => 'form-spacing-top']) }}
	{{ Form::text('sub4_ans', null, ['class' => 'form-control']) }}

	{{ Form::label('ans1', "Ans1:", ['class' => 'form-spacing-top']) }}
	{{ Form::text('ans1', null, ['class' => 'form-control']) }}

	{{ Form::label('ans2', "Ans2:", ['class' => 'form-spacing-top']) }}
	{{ Form::text('ans2', null, ['class' => 'form-control']) }}

	{{ Form::label('ans3', "Ans3:", ['class' => 'form-spacing-top']) }}
	{{ Form::text('ans3', null, ['class' => 'form-control']) }}

	{{ Form::label('ans4', "Ans4:", ['class' => 'form-spacing-top']) }}
	{{ Form::text('ans4', null, ['class' => 'form-control']) }}

	{{ Form::label('true_ans', "True Answer:", ['class' => 'form-spacing-top']) }}
	{{ Form::text('ans4', null, ['class' => 'form-control']) }}

	{{ Form::label('module_id', "Module:", ['class' => 'form-spacing-top']) }}
	{{ Form::select('module_id', $categories, null, ['class' => 'form-control']) }}



</div>

<div class="col-md-4">
	<div class="well">
		<dl class="dl-horizontal">
			<dt>Create At:</dt>
			<dd>{{ date('M j, Y h:ia', strtotime($quiz->created_at)) }}</dd>
		</dl>

		<dl class="dl-horizontal">
			<dt>Last Updated:</dt>
			<dd>{{ date('M j, Y h:ia', strtotime($quiz->updated_at)) }}</dd>
		</dl>
		<hr>
		<div class="row">
			<div class="col-sm-6">
				{!! Html::linkRoute('quizzes.show', 'Cancel', array($quiz->id), array('class' => 'btn btn-danger btn-block')) !!}
				
			</div>

			<div class="col-sm-6">
				{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
				
			</div>
		</div>


	</div>
</div>
{!! Form::close() !!}
</div>

@endsection