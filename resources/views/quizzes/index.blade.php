
@extends('main')

@section('content')


<div class="row">
	<div class="col-md-12">
    @foreach ($quizzes as $quiz)
    <form action="" id="quiz" style="margin-left:15%;height:auto" align="left">
		<ol>
			

		

	
      @if( isset ($quiz->figure))
      
      <img src="{{ asset('images/' . $quiz->figure) }}" height="400" width="800" />
@endif

       
		<h4><strong>Question:{{ $quiz->id }}</strong></h4>
		<h5>{{ $quiz->question }}</h5>


                {{ isset ($quiz->sub1_ans) ? $quiz->sub1_ans : ''}}</p>
                {{ isset ($quiz->sub2_ans) ? $quiz->sub2_ans : ''}}</p>
                {{ isset ($quiz->sub3_ans) ? $quiz->sub3_ans : ''}}</p>
                {{ isset ($quiz->sub4_ans) ? $quiz->sub4_ans : ''}}</p>
              
                <div>
                  <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                  <label for="question-1-answers-A">{{ $quiz->ans1 }}</label>
                </div>
                
                <div>
                  <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                  <label for="question-1-answers-B">{{ $quiz->ans2 }}</label>
                </div>
                
                <div>
                  <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                  <label for="question-1-answers-C">{{ $quiz->ans3 }}</label>
                </div>
                
                <div>
                  <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                  <label for="question-1-answers-D">{{ $quiz->ans4 }}</label>
                </div>
               <br>
              

              
     
		

     </ol>
   </form>
     @endforeach
		<div class="text-center">
			{{ $quizzes->links('vendor.pagination.custom') }}</div>
	</div>
</div>

@endsection