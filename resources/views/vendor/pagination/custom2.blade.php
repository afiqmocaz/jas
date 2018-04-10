@if ($paginator->hasPages() || count($paginator)==1)
    <ul class="pager">
				
			

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
			 
          
             <li><a action="" method="get" href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-primary">Next</a></li>
              
        @else
		
            <li> {!! Form::submit(trans('Finish'),['class' => 'btn btn-primary']) !!}</li>
        @endif
    </ul>

    @endif

   
  <script type="text/javascript">
  $(".pagination").click(function(e){
    e.preventDefault();
    var form_action = $("#ajax").find("form").attr("action");
    var option = $("#ajax").find("input[name='option']").val();

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{option:option}
    }).done(function(data){
        getPageData();
        toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
    });     
     
</script>
   

<!--<script type="text/javascript">
   $(document).ready(function(){
        function autosave()
        {
            
                window.location.href="{{ $paginator->nextPageUrl() }}";
               /* $.ajax({
                    //url:window.location.href="{{ $paginator->nextPageUrl() }}";
                    method:"POST",
                    data:{option:option},
                    success:function(data){

                        if(data !='')
                        {
                           window.location.href="{{ $paginator->nextPageUrl() }}";
                        }
                        $('#autosave').text("hai");
                    }

                });*/
            }

        }

   });
   
</script>-->
   