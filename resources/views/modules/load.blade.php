<div id="load" style="position: relative;">

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
</div>
</div>




   
