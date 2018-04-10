 <div id="soalan" style="position:relative;">
 <?php $i = $rank++ ?>
        @foreach($questions4 as $question)
            @if ($i > 1) <hr /> @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-group">
					
                        <strong class="try">Question {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong>
					
                        @if ($question->code_snippet != '')
                            <div class="code_snippet">{!! $question->code_snippet !!}</div>
                        @endif
						<label
                            name="questions[{{ $i }}]"
                            value="{{ $question->level }}">{{$question->level}}</label>
                        <input
                            type="hidden"
                            name="questions[{{ $i}}]"
                            value="{{ $question->id }}">
                    @foreach($question->options as $option)
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}">
                            {{ $option->option }}
                        </label>
                    @endforeach
                    </div>

					{{($questions4->links())}}
                </div>
				
				
            </div>
			
        <?php $i++; ?>
		<script language=JavaScript> 
<!--
function incr() { 
var v1=document.getElementById('p1').value;
document.getElementById("p1").value= v1 + 1;
}
//-->
</script> 
		
        @endforeach
