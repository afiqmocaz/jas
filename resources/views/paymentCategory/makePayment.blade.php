@extends('layouts.master')
@section('content')
<html lang="en">
    <head>
        <title>Payment</title>
        <!--   <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
          <meta name="keywords" content="" />
          <meta name="description" content="" />
          <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
          <link href="css/justified-nav.css" rel="stylesheet" type="text/css">
          <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> -->
<!--        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
        {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::style('css/justified-nav.css')!!}
        {!!Html::style('css/templatemo_style.css')!!}
        {!!Html::style('css/parsley.css')!!}
        {!!Html::style('css/button.css')!!}
        <script>
            $(window).load(function ()
            {
                $('#myModal').modal('show');
            });
        </script>
        <!-- <script type="text/javascript">
            function checkboxlimit(checkgroup, limit){
              var checkgroup=checkgroup
              var limit=limit
              for (var i=0; i<checkgroup.length; i++){
                checkgroup[i].onclick=function(){
                var checkedcount=0
                for (var i=0; i<checkgroup.length; i++)
                  checkedcount+=(checkgroup[i].checked)? 1 : 0
                if (checkedcount>limit){
                  alert("You can only select a maximum of "+limit+" checkboxes")
                  this.checked=false
                  }
                }
              }
            }
        </script>
        <script type="text/javascript">
            function checkboxlimits(checkgroup, limit){
              var checkgroup=checkgroup
              var limit=limit
              for (var i=0; i<checkgroup.length; i++){
                checkgroup[i].onclick=function(){
                var checkedcount=0
                for (var i=0; i<checkgroup.length; i++)
                  checkedcount+=(checkgroup[i].checked)? 1 : 0
                if (checkedcount>limit){
                  alert("You can only select a maximum of "+limit+" checkboxes")
                  this.checked=false
                  }
                }
              }
            }
        </script> -->

        <script type="text/javascript">
            $(document).ready(function () {
                $('[data-toggle="popover"]').popover({
                    placement: 'right',
                    trigger: 'hover',
                    html: true
                            // content : '<div class="media"><strong>Example of Receipt No.</strong></br></br><a href="#" class="pull-left"><img src="/image/resitCash.png" class="media-object" alt="Sample Image" style="width:250px; height:100px"></a></div>'
                });
            });
        </script>

        <style type="text/css">

            .popover{
                height: 350px;
                max-width: 100%;
            }
            /*.popover-content {
            
              background-color: yellow;
            }
            .popover-title {
            
              background-color: blue;
              }
            */
            .bs-example button{
                margin: 10px;
            }
            .table th, .table td {
                border-top: none !important;
                border-left: none !important;
            }
            .fixed-table-container {
                border:0px;
            }
            button {
                float: right;
            }
            h3{
                font-size: 15px;
                font-style: bold;
            }
            li {
                float: left;
            }

            li a, .dropbtn {
                display: inline-block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover, .dropdown:hover .dropbtn {
                background-color: #00ad00;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #006e00;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                font-weight: bold;
                padding: 5px 27px;
                text-decoration: none;
                display: block;
                text-align: left;
            }

            .dropdown-content a:hover {background-color: #00ad00}

            .dropdown:hover .dropdown-content {
                display: block;
            }
            .navbar-header {
                background-color: #006e00;
            }
            input:invalid,
            select:invalid,
            textarea:invalid,
            input[type=radio]:invalid {
                border-color: 1px solid red;
                background-color:  #ffe6e6;
                outline: 1px solid red;
            }
            .navbar-login
            {
                width: 305px;
                padding: 10px;
                padding-bottom: 0px;
            }

            .navbar-login-session
            {
                padding: 10px;
                padding-bottom: 0px;
                padding-top: 0px;
            }

            .icon-size
            {
                font-size: 87px;
            }
            .nav.navbar-nav.navbar-right li a {
    color: blue;
}
        </style>
    </head>

    <body>

        <!-- Page popup -->
        <div class="container">
            <!-- Trigger the modal with a button -->

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: blue; color: white">
                            <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>
                            <h4 class="modal-title">INSTRUCTION</h4>
                        </div>
                        <div class="modal-body">
<!--                            <p>•  The applicant can make payments by <strong style="color: blue"> online (FPX) or manually</strong>.
                                This manual is divided into two, namely <strong style="color: blue">cash and cheque</strong>.</p>
                            <p>•  If applicant makes the payment in <strong style="color: blue">CASH</strong>, applicant <strong style="color: blue">must pay in EiMAS Trust Fund</strong>, and <strong style="color: blue">must upload receipts into the system</strong> to inform the secretariat</p>
                            <p>•  If applicant want to make the payment by <strong style="color: blue">CHEQUE</strong>, applicant may <strong style="color: blue">send a cheque by email to the director of the Institute of Environment (EiMAS)</strong> and the secretariat will send the payment receipt to the applicant by post.</p>
                        </div>-->
  
       
                            <h2><b>Please upload your payment receipt to the system.</b></h2>
                            
                              </div>
                        <div class="modal-footer" style="border-color: transparent">
                            <button type="button" class="button" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <!-- Page popup -->




            <!-- HEADER -->
            <div class="row">
               <!--  <div>
                    <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
                </div> -->
         
            </div>
            <!-- HEADER -->



            <!-- DISPLAY PERSONAL INFO -->

            <!-- DISPLAY PERSONAL INFO -->

            
                <center><h2 style=" text-transform: uppercase;">{{$category}} PAYMENT CATEGORY</h2>
                    @if(count($errors))
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <br>{{ $error }}
                        @endforeach
                    </div>
                    @endif          
                    @if (Session::has('message'))
                    <div class="alert alert-info" role="alert" style="width: 50%">
                        <table style="width: 100%">
                            <tr>
                                <td><center>


                                <strong><center>You have successfully submit your payment information. We will process your application within 3 working days and we will inform the status of your applicant through your email<br><br>
                                        Please logout after finish your submission.<br><br>
                                        Thank you</center></strong>  {{ Session::get('message') }}
                                </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br>
                                        <div>
                                            <input class="button" a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" style="display: block; margin: 0 auto; width: 95px" value="Logout">
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                        </div>
                                    </td>
                                </tr>
                        </table>
                </center>
            @else


            </br><br>
            <p style="color: blue">Choose <strong>ONE</strong> payment method :</p>
            </br><br>
            <div>
                <table class="table table-bordered ">
                    <tr>
                        <td> 
                    <center><h2> Proof of Payment </h2>
                            <br><br><br>
                         <input type="image" src="{{URL::asset('/image/Cash.png')}}" alt="Submit" onclick="modalPayment('Cash')">
                       
                        <input type="image" src="{{URL::asset('/image/Check.png')}}" alt="Submit" onclick="modalPayment('Cheque')">
                       </center>
                        </td>
                        
                        <td > 
                            <h2> Online Payment </h2>
                            <input type="image" src="{{URL::asset('/image/fpx.jpg')}}" alt="Submit" data-toggle="modal" data-target="#fpx" id="textB">
                        </td>
                    </tr>

                </table>    

                <div class="col-xs-12" style="height:50px;"></div>

            </div>

        </center>

        {!! Form::open(['route' => 'paymentCategory.store', 'data-parsley-validate'=> '', 'files'=> true, 'name'=>"cashpayment",'files'=> true]) !!}
        <!-- CASH payment -->
        <div class="modal fade" id="modalPayment" role="dialog">
            <div class="modal-dialog" style="width: 60%">

                <!-- Reg content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center><h4 class="modal-title" id="modalTitle" style="text-transform: uppercase"></h4></center>
                    </div>
                    <div class="modal-body">
                        <div class="well well-lg">
                         
                            <input type="hidden" name="paymentfor" value="{{$paymentfor}}">
                            <input type="hidden" class="paymentType" name="paymentType" >
                            <input type="hidden" class="type" name="type" >
<!--                            <input type="hidden" class="amount" name="amount" >-->

                            <label for="example-text-input" class="col-2 col-form-label">Payment For</label>
                            <br>
                            <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Item</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            @if(isset($cert))
                            {{ Form::radio('type', 'renewal_cert' , false, array('id' => 'txt3','required' => '')) }}
                            {{ Form::label('RENEWAL CERTIFICATE')}}
                            </br>
                            @else 
                            
                            @if($preQualificationReg === 0)
                            <tbody>
                            <tr><td>1.</td><td>
                            {{ Form::radio('type', 'PRE-QUALIFICATION REGISTRATION' , false, array('id' => 'txt1','required' => '')) }}
                            {{ Form::label('PRE-QUALIFICATION REGISTRATION')}}
                            </td>
                            
                            @else
                              <tbody>
                            <tr><td>1.</td><td>
                            {{ Form::radio('type', 'RESEAT EXAMINATION' , false, array('id' => 'txt2','required' => '')) }}
                            {{ Form::label('RESEAT EXAMINATION')}}
                            </td>
                            @endif
                            
                            @endif
                           <td>
                            <div class="bs-example">
                              <label for="example-text-input" class="col-2 col-form-label"></label>
                                <br>
                                <input type="text"  class="amount" name="amount" required="">
                            </div></td>
                            </tr>
                            </tbody>
 </table>
                            </br>
                            <label for="example-text-input" class="col-2 col-form-label">Payment Transaction Date</label>
                            </br>
                            {!! Form::date('date', '', array('id' => 'datepicker', 'required' => '')) !!}
                            </br></br>
                            <label for="example-text-input" class="col-2 col-form-label">Receipt No</label>

                            <div class="bs-example">
                                <input name="referenceNo" type="text" placeholder="Eg: AB 78964" required="" style="width: 20%">
                                <input type="image" src="{{URL::asset('/image/info.png')}}" width="20px" height="20px" data-toggle="popover" title="Example of Receipt No." data-content='<a href="#" class="pull-left"><img src="/image/resitCash.png" class="media-object" alt="Sample Image" style="width:400px; height:290px"></a>'>
                            </div>
                            </br>
                            <label for="example-text-input" class="col-2 col-form-label">Upload payment receipt (.pdf)</label>
                            <input type="file" name="receipt" accept=".pdf" required="">
                        </div>
                        <button name="submit" type="button" class="button save" data-toggle="modal" data-target="#check_confirm">Submit</button>
                    </div>
                    <div class="modal-footer" style="border-color: transparent">

                    </div>
                </div>

            </div>
            <!-- Reg content-->

        </div>
        <!-- check confirm-->
    <div class="modal fade" id="check_confirm" data-backdrop="static">
        <div class="modal-dialog">

            <!-- check confirm content-->
            <div class="modal-content">
                <div class="modal-header" style="border-color: transparent">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit the information?
                </div>
                <div class="modal-footer" style="border-color: transparent">
                    <button type="button" class="button delete" data-dismiss="modal">No</button>

                    <button type="submit" class="button save" href='paymentCategory'">Yes</button>
                    &nbsp &nbsp &nbsp &nbsp
                </div>
            </div>
            <!-- check confirm content-->

        </div>
    </div>
     {!!Form::close() !!}    
        
        
       
    </div>
 @endif
<!--
{!! Form::open(['route' => 'paymentCategory.store', 'data-parsley-validate'=> '', 'files'=> true, 'name'=>"fpx"]) !!}
 FPX payment 
<div class="modal fade" id="fpx" role="dialog">
    <div class="modal-dialog" style="width: 60%">

         Reg content
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h4 class="modal-title">FPX PAYMENT</h4></center>
            </div>
            <div class="modal-body">
                <div class="well well-lg">
                                 <label for="example-text-input" class="col-2 col-form-label">Payment For</label>
                    </br>
                    </br>
                    <label for="example-text-input" class="col-2 col-form-label">Payment Transaction Date</label>
                    </br>
                    {!! Form::date('date', '', array('id' => 'datepicker2', 'required' => '')) !!}
                    </br>
                    <input type="hidden" name="paymentType" value="fpx">
                    <input type="hidden" name="referenceNo" value="fpx_testing">
                    <input type="hidden" name="slip" value="fpx">
                    <input type="hidden" name="paymentfor" value="{{$paymentfor}}">
                    
                    <input type="text" class="amount" name="amount">
                    <br>
                    @if(isset($cert))
                    {{ Form::radio('type', 'renewal_cert' , false, array('class' => 'radio_renewal','required' => '')) }}
                    {{ Form::label('RENEWAL CERTIFICATE')}}
                    </br>
                    @else 
                    {{ Form::radio('type', 'PRE-QUALIFICATION REGISTRATION' , false, array('class' => 'radio_reg','required' => '')) }}
                    {{ Form::label('PRE-QUALIFICATION REGISTRATION')}}
                    </br>
                    {{ Form::radio('type', 'RESEAT EXAMINATION' , false, array('class' => 'radio_reseat','required' => '')) }}
                    {{ Form::label('RESEAT EXAMINATION')}}

                    @endif
                    </br></br></br>

         <button style="margin-right: 20%" type="button" class="button save" data-toggle="modal" data-target="#check_confirm">Submit  <span></span></button>  
                    <button name="submit" type="submit" class="button save" onclick='onSubmitClick();'>Submit</button>

                    <div class="modal-footer" style="border-color: transparent">
                               {{ Form::submit('Submit')}}  

                    </div>
                </div>

            </div>
             Reg content

        </div>
    </div>
    {!! Form::close() !!}-->


  

</div>
<!-- FOOTER -->



    {!! Html::script('js/parsley.min.js')!!}
    {!! Html::script('js/jquery.js')!!}
    {!! Html::script('js/bootstrap.min.js')!!}
    {!! Html::script('js/templatemo_script.js')!!}


  <script type="text/javascript">
     
      function modalPayment($type){
          $("#modalPayment").modal('toggle');
          $("#modalTitle").html($type+" PAYMENT");
          $('.paymentType').val($type);
      }
      
    
      
      $('input:radio').change(function(){
          
          $('.type').val($(this).val());
          
          var price = 0;
          
          if($(this).val() === "PRE-QUALIFICATION REGISTRATION"){
             price = '{{$pricePrequalification}}';
          }else if($(this).val() === "RESEAT EXAMINATION"){
             price = '{{$priceReseat}}';
          }else if($(this).val() === "renewal_cert"){
               price = '{{$priceRenewal}}';
          }
         
          
          $('.amount').val(price);
      }); 

  </script>
</body>
</html>
@endsection
