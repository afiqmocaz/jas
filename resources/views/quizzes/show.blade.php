@extends('main')


@section('content')

<div class="row">
<div class="col-md-8">

<h1>{{ $quiz->question }}</h1>

<p class="lead">{{ $quiz->ans1 }}</p>
</div>
<div class="col-md-4">
	<div class="well">

		<dl class="dl-horizontal">
			<label>Sub1 Ans:</label>
			<p>{{ $quiz->sub1_ans }}</p>
		</dl>

		<dl class="dl-horizontal">
			<label>Sub1 Ans:</label>
			<p>{{ $quiz->sub2_ans }}</p>
		</dl>
		<hr>
		<div class="row">
			<div class="col-sm-6">

				{!! Html::linkRoute('quizzes.edit', 'Edit', array($quiz->id), array('class' => 'btn btn-primary btn-block')) !!}
				
			</div>

			<div class="col-sm-6">
				{!! Form::open(['route' => ['quizzes.destroy', $quiz->id], 'method' => 'DELETE']) !!}

				{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
				{!! Form::close() !!}
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				{{ Html::linkRoute('quizzes.index', '<< See All Quizzes', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
			</div>
		</div>


	</div>
</div>
</div>
@endsection