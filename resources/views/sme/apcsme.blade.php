@extends('layouts.apcsapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

               
                <div class="panel-body">
                   <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                           
                            <div class="box1">
                                <span style="color:green;" class="li_bubble"></span>
                                <a style="color:green;" href="{{ url('/apcspcersme') }}"><h3>Assignment<br><br>


                                </h3></a>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="box1">
                                <span style="color:blue;" class="li_news"></span>
                                <a style="color:blue;" href=""><h3>Applicants<br><br></h3></a>
                            </div>
                        </div>
                       
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
