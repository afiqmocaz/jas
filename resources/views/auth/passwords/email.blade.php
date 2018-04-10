@extends('layouts.app4')

<!-- Main Content -->
@section('content')
<style type="text/css">
     footer a {
    color: #FFFFFF;
  }
  footer {
    color: #FFFFFF;
    width:100%;
  height:5%;   
  position:absolute;
  bottom:0;
  left:0;
  background-color:#222d32;
  }
.col-md-8 ,.col-md-offset-2{
    top:00px;}
.panel,.panel-default{
     background-color: rgba(245, 245, 245, 0.4);
}
.panel > .panel-heading {
    background-image: none;
    background-color: #222d32;
    color: white;

}
</style>

    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="top:100px;">
            <div class="panel panel-default">
                <div class="panel-heading" > <center><h4>RESET PASSWORD</h4> </center></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<footer >
    <!-- To the right -->
 
    <!-- Default to the left -->
    <center>Copyright © 2017 Jabatan Alam Sekitar.</center>
</footer>
@endsection
