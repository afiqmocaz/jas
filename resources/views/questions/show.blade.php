@extends('main')


@section('content')

<div class="row">
<div class="col-md-8">

  <img src="{{ asset('images/' . $exam->figure) }}" height="400" width="800" />

<h1>{{ $exam->question }}</h1>


</div>
</div>
@endsection