@extends('layouts.appiets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           
			<h2 style="margin-left:30px">Certificate</h2>
                <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1.Applicants will be certified as Competent Person upon the recommendation from the professional interview and final confirmed by The Qualified Person Registration Committee.<br>
								2.The certificate displayed can be printed or downloaded by the Applicants.<br>
								3.Applicants have to click on the print button in order to print or to download it.<br>
								
	  </div>
      </div>
    </div></br><br>
	 <section>
		@include('templatecerteia')
	 </section>
	
	 <!--<object  style="margin-left:30px"width="90%" height="500"data="/images/sijilJAS.pdf">
</object><br><br>-->

	<br><br><center> <input type=button name=print value="Print" class="btn btn-primary" onClick="printExternal('{{ url('templatecerteia') }}')"> <a href="profiles" class="btn btn-primary">View Profile</a></center>
        </div>
				
            </div>
        </div>
    </div>
</div>
@endsection
