@if ($paginator->hasPages()|| count($paginator)==1)
    <ul class="pager">
				
				@if ($paginator->onFirstPage())
            <li class="disabled"><span>Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-primary">Previous</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
			
            <li><a action="" method="get" type="submit" href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-primary" value="Save">Next</a></li>
        @else
		
            <li> {!! Form::submit(trans('Finish'),['class' => 'btn btn-primary']) !!}</li>
        @endif
    </ul>

    @endif