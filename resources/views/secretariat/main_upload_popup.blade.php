@extends("layouts.popup2")
@section('content')


@push('scripts')
<script type="text/javascript">

    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

</script>

@endpush


<div class="container">
    <div class="row">
        <div id = "message"></div>
    </div>
    <div class="row">
        <div>
            <div class="panel panel-default" >
                <div class="panel-heading" style="background-color:#0d162e; color:white">Main Attachments</div>
                <div class="panel-body">
                    <div class="form-group" style="margin: 5px">
                        {!! $uploadPlugin->get()!!}
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.close()">Close</button>
                    
                </div>
                
            </div>

        </div>

    </div>
</div>


@endsection