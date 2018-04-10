@extends('layouts.appeia')
@section('content')

<div class="container">
 
    <div class="row">
   
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
      <h2 style="margin-left:30px">{{ $module }}: {{ $title }}</h2>
                <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Through the self-learning sessions, applicants should complete all the modules and able to understand the EIA in Malaysia including the legislation framework, EIA procedure, and the requirement of EIA Consultants.<br>
   </div>
      </div>
    </div></br>
   <h4 style="padding-left:5%"><b>Self Learning Material:</b></h4><br>
   @foreach($selflearnings as $selflearning)
   
   <ul>

   <li><a class="file" href="/uploads/{{$selflearning->original_filename}}">{{$selflearning->title}}</a></li>
   </ul>
   
   @endforeach
   
   <hr>

   <h3 class="page-title">Quiz</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['tests4.store']]) !!}

    <div class="panel panel-default">
        
        <?php //dd($questions) ?>
    @if(count($questions) > 0)
        <div class="panel-body">

          <?php $i = 1; ?>
       
        @foreach($questions as $question)
        @if ($i > 1) <hr /> @endif
       
           
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-group">
                        <strong>Question {{ $i }}.</strong><br />
@if ($question->original_filename != '')
<center>
               <img class="file" src="/uploads/{{$question->original_filename}}" width="100px"></img><a class="file" href="/uploads/{{$question->original_filename}}"><br><center>{{$question->limg}}</center></img></a></center>
               @endif
               <br />
               
                          <strong>{!! nl2br($question->question) !!}</strong>

                        @if ($question->i != '')
                            <div class="i">I {!! $question->i !!}</div>
                        @endif
                       

                         @if ($question->ii != '')
                            <div class="i">II {!! $question->ii !!}</div>
                        @endif
                      

                         @if ($question->iii != '')
                            <div class="i">III {!! $question->iii !!}</div>
                        @endif
                    
                         @if ($question->iv != '')
                            <div class="i">IV {!! $question->iii !!}</div>
                        @endif

                        <input
                            type="hidden"
                            name="questions[{{ $i }}]"
                            value="{{ $question->id }}">
                    @foreach($question->options as $option)

                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}"
                                required="">
                            {{ $option->option }}
                        </label>
                    @endforeach

                    <input
                            type="hidden"
                            name="answer[{{ $question->id }}]"
                            value="{{ $question->id }}">

                    </div>
                </div>
            </div>
            <?php $i++; ?>
       
        @endforeach
        </div>
    @endif
    </div>

    {{($questions->links('vendor.pagination.custom2'))}}
    
    {!! Form::close() !!} 

        </div>
        
            </div>
        </div>
    </div>
</div>

@endsection
            
