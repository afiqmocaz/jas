@extends('layouts.appeia')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script>
    $('#loading').removeClass('load');


</script>
<div class="container">

    <div class="row">

        <div >
            <div align="center">
                <table style="width:70%" >
                    <tr>
                        <td>
                            <h2 style=" text-transform: uppercase;"><b id="moduleTitle">{{$session}} Summary</b></h2>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table class="table table-borderless">

                                <tr >
                                    <td colspan="3">
                                        <table class="table table-bordered">
<!--                                            <tr >
                                               <td colspan="2"><center><img src="/users/{{Auth::user()->avatar}}" alt="Mountain View" style="width:100px;height:100px;"></center></td>
                                            </tr>-->
                                            <tr >
                                                <td width="30%" class="alert-success"><b>Name</b></td>
                                                <td>{{Auth::user()->name}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%" class="alert-success"><b>No IC</b></td>
                                                <td>{{Auth::user()->nric}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%" class="alert-success"><b>Email</b></td>
                                                <td>{{Auth::user()->email}}</td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                                <tr><td>
                                        <table class="table table-bordered">

                                            <tr class="btn-success">
                                                <td width="30%">Module</td>
                                                <td width="30%">Point</td>
                                                <td>Percentage</td>
                                            </tr>
                                            @foreach($summarryList as $summary)
                                            <tr>
                                                <td ><b>{{$summary->module->name}}</b></td>
                                                <td>{{$summary->info}}</td>
                                                <td>{{$summary->percentage}} %</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </td></tr>
                                    <tr>
                                       <td>
                                           <h2 class="pull-right">Total : {{$totalPercentage}} %</h2>
                                       </td>
                                    </tr>
                            </table>
                        </td>
                    </tr>
                    </tr>
                </table>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>



@endsection
