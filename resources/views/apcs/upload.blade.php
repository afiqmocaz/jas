@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			<h2 style="margin-left:30px">Syllabus</h2>
                <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. The applicant is required to self learning all the syllabus and reference given below. The Comprehensive Examination will focus on the understanding of applicants in the related guidance, legal requirement and area of expertise selected. <br>
	 </div>
      </div>
    </div></br>
	 <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">

  	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
      <label>Alt Title:</label>
      <input type="text" name="title" class="form-control" placeholder="Add Title">
    </div>

	<div class="form-group">
      <label>Image:</label>
      <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
      <button class="btn btn-success upload-image" type="submit">Upload Image</button>
    </div>

  </form>
	<center> <a href="/examschedules/iets" class="btn btn-primary">Next</a></center>
        </div>
		<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });

  var options = { 
    complete: function(response) 
    {
    	if($.isEmptyObject(response.responseJSON.error)){
    		$("input[name='title']").val('');
    		alert('Image Upload Successfully.');
    	}else{
    		printErrorMsg(response.responseJSON.error);
    	}
    }
  };

  function printErrorMsg (msg) {
	$(".print-error-msg").find("ul").html('');
	$(".print-error-msg").css('display','block');
	$.each( msg, function( key, value ) {
		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	});
  }
</script>
				
            </div>
        </div>
    </div>
</div>
@endsection
