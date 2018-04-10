@extends($master)
@section('js')
@endsection
@section('header', $category.': Payment')
@section('content') 

<!-- <h1><font style="text-transform: uppercase">{{$category}} </font>- {{$title}}<br></h1>  -->
<h1 style="margin: 0px;font-size: 24px;text-transform: uppercase;">{{$category}} - {{$title}}&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content=' •  In this form, Secretariat <font style="text-transform: uppercase">{{$category}}</font> can view the list of applicant payment with proof.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can click the payment proof link to view applicant payment proof.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can click success if the payment is successful and the pending if the payment amount is not enough.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can click button "Save" to save the list of applicant payment after make changes.'
        data-html="true" data-placement="right" data-original-title="<?=strtoupper($category)?> - Pre-Qualification Payment of Applicant Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

        <br>        
@if(!isset($cert))
<!-- INSTRUCTION -->
<!-- <div style="width: 100%;" class="panel-group" >
    <div class="panel panel-primary" style="border-color:#4CAF50;">
        <div class="panel-heading" style="background-color:#4CAF50;" >
            <h4 class="panel-title" style="color:white;">
                <a data-toggle="collapse" href="#collapse1"><font style="text-transform: uppercase">{{$category}}</font> - Pre-Qualification Payment of Applicant Instruction :</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">
                •  In this form, Secretariat <font style="text-transform: uppercase">{{$category}}</font> can view the list of applicant payment with proof.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can click the payment proof link to view applicant payment proof.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can click success if the payment is successful and the pending if the payment amount is not enough.<br>
                •  Secretariat <font style="text-transform: uppercase">{{$category}}</font> can click button "Save" to save the list of applicant payment after make changes.
            </div>
        </div>
    </div>
</div> -->
<script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover();
    });               </script>
<br>

@endif

<div class="table-responsive">
<!--                <table class="table table-bordered order-table table" >
    <thead valign="top">
    
      <tr>
          <th class="alert-success">No.</th>
    
        <th class="alert-success">Applicant Name</th>
        <th class="alert-success">NRIC/Passport</th>
        <th class="alert-success"><center>Type of Payment</center></th>
        <th class="alert-success"><center>Mode of Payment</center></th>
        <th onclick="sortTable(0)">Payment For</th>
        <th class="alert-success">Status</th>
      </tr></thead>
    <tbody>
    <div class="hide">{{$count = 1}}</div>
    @foreach($payments as $payment)
      <tr>
        <td>{{$count++}}</td>
       
        <td>
            @if(!empty($payment->user))
            <a href="{{ route('payinfo.edit', $payment->id) }}" >{{ $payment->user->name }}</a>
            @endif
        </td>
        <td>
              @if(!empty($payment->user))
            {{$payment->user->nric}}
              @endif
        </td>
        <td><center>{{$payment->type}}</center></td>
        <td><center>{{$payment->paymentType}}</center></td>
        <td>{{$payment->payment_for}}</td>
        <td>{{$payment->status}}</td>
      
      </tr>
      @endforeach
  
    </tbody>
    
   
    
  </table>   -->

    <div id="message"></div>
    <div class="box-body table-responsive">
        <table class="table table-bordered" id="myTable" >
            <thead class="alert-info" >
            <th>No.</th>

            <th>Applicant Name</th>
            <th>NRIC/Passport</th>
            <th><center>Type of Payment</center></th>
            <th><center>Mode of Payment</center></th>
<!--            <th class="alert-success">Payment For</th>-->
            <th>Status</th>
            </thead>
        </table>
    </div>

    @if(!empty($cert))
    <button class="btn btn-default" onclick="location.href='/cert_renewal/{{$category}}/payment_submitted'">Back</button>
    @endif
</div>
<script>
    $(document).ready(function () {
        
    });
    
    
     $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        order: [[ 0, "desc" ]],
        ajax: {
            type: "POST",
            url: '/payment/find',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                category : '{{$category}}',
            }
        },
        columns: [
            {
                render: function (data, type, row, meta) {
                    if (type === 'display') {
                        return (meta.row + 1);
                    }
                    return row.id;
                },
                width: "1%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {
                     if(!jQuery.isEmptyObject(row.user)){
                    return  ' <a href="/payinfo/'+row.id+'/edit" >'+row.user.name+'</a>';
                }
                    else return '<span class="label label-danger">Error 404</span>';
                }, width: "10%"
                , orderable: true
            },
           {
                render: function (data, type, row, meta) {

                      if(!jQuery.isEmptyObject(row.user)){
                    return  row.user.nric;
                }
                    else return '<span class="label label-danger">Error 404</span>';
                }, width: "10%"
                , orderable: true
            },
            {
                render: function (data, type, row, meta) {

                    return row.type;
                }, width: "10%"
                , orderable: true
            },
             {
                render: function (data, type, row, meta) {

                    return row.paymentType;
                }, width: "10%"
                , orderable: true
            },
//            {
//                render: function (data, type, row, meta) {
//
//                    return row.payment_for;
//                }, width: "10%"
//                , orderable: true
//            },
            {
                render: function (data, type, row, meta) {

                   var labelClass = 'default';
                    if(row.status ==='Approved'){
                        labelClass = 'success';
                    }else if(row.status ==='Declined'){
                        labelClass = 'danger';
                    }
                    
                    return '<center><span class="label label-'+labelClass+'">'+row.status+'</span></center>';
                }, width: "10%"
                , orderable: true
            },
           
        ]

    });
</script>
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection