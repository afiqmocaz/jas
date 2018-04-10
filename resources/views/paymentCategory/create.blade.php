
<!DOCTYPE html>
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
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/justified-nav.css')!!}
  {!!Html::style('css/templatemo_style.css')!!}
  {!!Html::style('css/parsley.css')!!}
  {!!Html::style('css/button.css')!!}
<script>
  $(window).load(function()
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
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'right',
        trigger : 'hover',
        html : true
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
          <p>•  The applicant can make payments by <strong style="color: blue"> online (FPX) or manually</strong>.
This manual is divided into two, namely <strong style="color: blue">cash and cheque</strong>.</p>
<p>•  If applicant makes the payment in <strong style="color: blue">CASH</strong>, applicant <strong style="color: blue">must pay in EiMAS Trust Fund</strong>, and <strong style="color: blue">must upload receipts into the system</strong> to inform the secretariat</p>
<p>•  If applicant want to make the payment by <strong style="color: blue">CHEQUE</strong>, applicant may <strong style="color: blue">send a cheque by email to the director of the Institute of Environment (EiMAS)</strong> and the secretariat will send the payment receipt to the applicant by post.</p>
        </div>
        <div class="modal-footer" style="border-color: transparent">
          <button type="button" class="button" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<div class="container">
 <!-- Page popup -->




<!-- HEADER -->
    <div class="container">
    <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
    </div>
    <div class="col-xs-12" style="height:50px;"></div>
    </div>
  <!-- HEADER -->



<!-- DISPLAY PERSONAL INFO -->

<!-- DISPLAY PERSONAL INFO -->


 

@if (Session::has('success'))

        <div class="alert alert-success" role="alert" style=" margin-left: 5%; margin-right: 5%">
    
        <strong>Success:</strong>  {{ Session::get('success') }}

        </div>

        @endif

        @if (count($errors) > 0)

        <div class="alert alert-danger" role="alert" style=" margin-left: 5%; margin-right: 5%">

        <strong>Errors:</strong><ul>
        @foreach ($errors->all() as $error)
          <br><li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>

        @endif
<div class="well well-lg" style="background-color: white; margin-left: 5%; margin-right: 5%">
  <center><h2>PAYMENT CATEGORY</h2>

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
        <input class="button" a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display: block; margin: 0 auto; width: 95px" value="Logout">
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
      </div>
      </td>
    </tr>
  </table>
  </center></div>
        @else



</br></br>
<p style="color: blue">Choose <strong>ONE</strong> payment method :</p>
</br></br>
    <div>
    <input type="image" src="{{URL::asset('/image/Cash.png')}}" alt="Submit" width="20%" height="40%" data-toggle="modal" data-target="#cash" id="textA">
    &nbsp &nbsp &nbsp
    <input type="image" src="{{URL::asset('/image/Check.png')}}" alt="Submit" width="20%" height="40%" data-toggle="modal" data-target="#check" id="textB">
    &nbsp &nbsp &nbsp
<!--    <input type="image" src="{{URL::asset('/image/FPX.png')}}" alt="Submit" width="20%" height="40%" data-toggle="modal" data-target="#fpx" id="textC">-->

    <div class="col-xs-12" style="height:50px;"></div>
      
</div>

     </center>

  <!-- CASH payment -->
  <div class="modal fade" id="cash" role="dialog">
    <div class="modal-dialog" style="width: 60%">
    
      <!-- Reg content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">CASH PAYMENT</h4></center>
        </div>
        <div class="modal-body">
        <div class="well well-lg">
        {!! Form::open(['route' => 'paymentCategory.store', 'data-parsley-validate'=> '', 'files'=> true, 'name'=>"cashpayment"]) !!}
        <label for="example-text-input" class="col-2 col-form-label">Payment For</label>
        </br>
<!--         {{ Form::select('type', 
        ['select' => '- Please select your type of payment -', 
        'PRE-QUALIFICATION REGISTRATION' => 'PRE-QUALIFICATION REGISTRATION ', 
        'RESEAT EXAMINATION' => 'RESEAT EXAMINATION', 
        'RENEWAL CERTIFICATE' => 'RENEWAL CERTIFICATE'], 'select', array('class' => 'form-control', 'style' => 'width: 80%', 'required' => ''))}} -->

          &nbsp &nbsp &nbsp{{ Form::radio('type', 'PRE-QUALIFICATION REGISTRATION' , false, array('id' => 'txt1','required' => '')) }}
          {{ Form::label('PRE-QUALIFICATION REGISTRATION')}}
          </br>
          &nbsp &nbsp &nbsp{{ Form::radio('type', 'RESEAT EXAMINATION' , false, array('id' => 'txt2','required' => '')) }}
          {{ Form::label('RESEAT EXAMINATION')}}
          </br>
          &nbsp &nbsp &nbsp{{ Form::radio('type', 'RENEWAL CERTIFICATE' , false, array('id' => 'txt3','required' => '')) }}
          {{ Form::label('RENEWAL CERTIFICATE')}}
      </br></br></br>
<!--         <div id="txtA" style="display:none; background-color: transparent; width: 30%">
          <label>Amount</label> -->
<!--           <input class="form-control" name="amount" type="text" value="RM 3500" readonly="readonly" >
 --><!--           <input class="form-control" name="paymentType" type="hidden" value="Cash" readonly="readonly" >
 -->        
<input class="form-control" name="paymentType" id="paymentType" type="hidden">
<input class="form-control" name="amount" id="amount" type="hidden">
<!--  </div>
        <div id="txtB" style="display:none; background-color: transparent; width: 30%">
          <label>Amount</label> -->
<!--           <input class="form-control" name="amount" type="text" value="RM 200" readonly="readonly" >
 --><!--           <input class="form-control" name="paymentType" type="hidden" value="Cash" readonly="readonly" >
 -->        
<!--  </div>
        <div id="txtC" style="display:none; background-color: transparent; width: 30%">
          <label>Amount</label> -->
<!--           <input class="form-control" name="amount" type="text" value="RM 300" readonly="readonly" >
 --><!--           <input class="form-control" name="paymentType" type="hidden" value="Cash" readonly="readonly" >
 -->        <!-- </div> -->
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
        <!-- {{ Form::text('referenceNo', null, array('class' => 'form-control', 'style' => 'width: 40%', 'placeholder'=>'Eg: AB 78964', 'required' => ''))}} -->
        
        </br>
        <label for="example-text-input" class="col-2 col-form-label">Upload payment receipt (.pdf)</label>
       <!--  {{ Form::file('receipt')}} -->
        <input type="file" name="receipt" accept=".pdf" required="">

       </div>
       <!-- <button style="margin-right: 10%" type="submit" class="button save" data-toggle="modal" data-target="#cash_confirm">Submit  <span></span></button>  -->
       <button name="submit" onclick='onSubmitClick();' type="submit" class="button save">Submit</button>
       </div>
       <div class="modal-footer" style="border-color: transparent">
  <!--       {{ Form::submit('Submit')}}  -->
         
          </div>
        </div>
        
      </div>
      <!-- Reg content-->
      
    </div>
    @endif
  </div>




   <!-- cash confirm-->
<div class="modal fade" id="cash_confirm" data-backdrop="static">
    <div class="modal-dialog">
    
      <!-- cash confirm content-->
      <div class="modal-content">
        <div class="modal-header" style="border-color: transparent">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        Are you sure you want to submit the information?
        </div>
       <div class="modal-footer" style="border-color: transparent">
       
       <button type="button" class="button delete" data-dismiss="modal">No</button>
       
       <button type="submit" class="button save">Yes</button onclick="location.href='/homepage/create'">
       &nbsp &nbsp &nbsp &nbsp
          </div>
      </div>
      <!-- cash confirm content-->
      
    </div>
  </div>
   <!-- cash confirm-->

<!-- CASH payment -->  
{!! Form::close() !!}





  <!-- CHECK payment -->
  <div class="modal fade" id="check" role="dialog">
    <div class="modal-dialog" style="width: 60%">
    
     <!-- Reg content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">CHECK PAYMENT</h4></center>
        </div>
        <div class="modal-body">
        <div class="well well-lg">
        {!! Form::open(['route' => 'paymentCategory.store', 'data-parsley-validate'=> '', 'files'=> true, 'name'=>"chequepayment"]) !!}
        <label for="example-text-input" class="col-2 col-form-label">Payment For</label>
        </br>
        <!-- {{ Form::select('type', 
        ['select' => '- Please select your type of payment -', 
        'PRE-QUALIFICATION REGISTRATION' => 'PRE-QUALIFICATION REGISTRATION ', 
        'RESEAT EXAMINATION' => 'RESEAT EXAMINATION', 
        'RENEWAL CERTIFICATE' => 'RENEWAL CERTIFICATE'], 'select', array('class' => 'form-control', 'style' => 'width: 80%', 'required' => ''))}}
      </br>
        <label for="example-text-input" class="col-2 col-form-label">Amount</label> 
        {{ Form::text('amount', null, array('class' => 'form-control', 'style' => 'width: 20%', 'placeholder'=>'Eg: 3500', 'required' => ''))}}
          </br>
            <label for="example-text-input" class="col-2 col-form-label">Date</label>
            </br>
          {!! Form::text('date', '', array('id' => 'datepicker')) !!}
          </br></br>
        <label for="example-text-input" class="col-2 col-form-label">Reference No</label>
        {{ Form::text('referenceNo', null, array('class' => 'form-control', 'style' => 'width: 30%', 'placeholder'=>'Eg: AB 78964', 'required' => ''))}}
        </br>
        <label for="example-text-input" class="col-2 col-form-label">Upload payment slip (.pdf)</label>
        {{ Form::file('receipt')}} -->

        &nbsp &nbsp &nbsp{{ Form::radio('type', 'PRE-QUALIFICATION REGISTRATION' , false, array('id' => 'txt4', 'required' => '')) }}
          {{ Form::label('PRE-QUALIFICATION REGISTRATION')}}
          </br>
          &nbsp &nbsp &nbsp{{ Form::radio('type', 'RESEAT EXAMINATION' , false, array('id' => 'txt5', 'required' => '')) }}
          {{ Form::label('RESEAT EXAMINATION')}}
          </br>
          &nbsp &nbsp &nbsp{{ Form::radio('type', 'RENEWAL CERTIFICATE' , false, array('id' => 'txt6', 'required' => '')) }}
          {{ Form::label('RENEWAL CERTIFICATE')}}
      </br></br></br>
        <!-- <div id="txtD" style="display:none; background-color: transparent; width: 30%">
          <label>Amount</label>
          <input class="form-control" name="amount" type="text" value="RM 3500" readonly="readonly" >
          <input class="form-control" name="paymentType" type="hidden" value="Cheque" readonly="readonly" >
        </div>
        <div id="txtE" style="display:none; background-color: transparent; width: 30%">
          <label>Amount</label>
          <input class="form-control" name="amount" type="text" value="RM 200" readonly="readonly" >
          <input class="form-control" name="paymentType" type="hidden" value="Cheque" readonly="readonly" >
        </div>
        <div id="txtF" style="display:none; background-color: transparent; width: 30%">
          <label>Amount</label>
          <input class="form-control" name="amount" type="text" value="RM 300" readonly="readonly" >
          <input class="form-control" name="paymentType" type="hidden" value="Cheque" readonly="readonly" >
        </div> -->
        <input class="form-control" name="paymentType" id="paymentType2" type="hidden">
<input class="form-control" name="amount" id="amount2" type="hidden">
          </br>
            <label for="example-text-input" class="col-2 col-form-label">Payment Transaction Date</label>
            </br>
          {!! Form::date('date', '', array('id' => 'datepicker2', 'required' => '')) !!}
          </br></br>
        <label for="example-text-input" class="col-2 col-form-label">Receipt No</label>
        
        <div class="bs-example">
        <input name="referenceNo" type="text" placeholder="Eg: AB 78964" required="" style="width: 20%">
          <input type="image" src="{{URL::asset('/image/info.png')}}" width="20px" height="20px" data-toggle="popover" title="Example of Receipt No." data-content='<a href="#" class="pull-left"><img src="/image/resitCheque.png" class="media-object" alt="Sample Image" style="width:400px; height:290px"></a>'>
        </div>
        <!-- {{ Form::text('referenceNo', null, array('class' => 'form-control', 'style' => 'width: 40%', 'placeholder'=>'Eg: AB 78964', 'required' => ''))}} -->
        </br>
        <label for="example-text-input" class="col-2 col-form-label">Upload payment receipt (.pdf)</label>
        <!-- {{ Form::file('receipt')}} -->
        <input type="file" name="receipt" accept=".pdf" required="">

       </div>
        <!-- <button style="margin-right: 20%" type="button" class="button save" data-toggle="modal" data-target="#check_confirm">Submit  <span></span></button>  -->
        <button name="submit" type="submit" class="button save" onclick='onSubmitClick();'>Submit</button>

       <div class="modal-footer" style="border-color: transparent">
  <!--       {{ Form::submit('Submit')}}  -->
        
          </div>
        </div>
        
      </div>
      <!-- Reg content-->
      
    </div>
  </div>
{!! Form::close() !!}



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
       
       <button type="submit" class="button save" href='paymentCategory'">Yes</button  onclick="location.href='/homepage/create'">
       &nbsp &nbsp &nbsp &nbsp
          </div>
      </div>
      <!-- check confirm content-->
      
    </div>
  </div>
   <!-- check confirm-->

<!-- CHECK payment -->  




  <!-- FPX payment -->
  <div class="modal fade" id="fpx" role="dialog">
    <div class="modal-dialog">
    
      <!-- Reg content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">FPX PAYMENT</h4></center>
        </div>
        <div class="modal-body">
        

       </div>
       <div class="modal-footer" style="border-color: transparent">
          </div>
      </div>
      <!-- Reg content-->
      
    </div>
  </div>
<!-- FPX payment -->  




  
</div>
<script type="text/javascript">
  //Syntax: checkboxlimit(checkbox_reference, limit)
  checkboxlimit(document.forms.cashpayment.type, 1)
</script>
<script type="text/javascript">
  //Syntax: checkboxlimit(checkbox_reference, limit)
  checkboxlimits(document.forms.chequepayment.type, 1)
</script>

<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
          </div>
        </div>
            
      </div>
    </footer>


    {!! Html::script('js/parsley.min.js')!!}
  {!! Html::script('js/jquery.js')!!}
  {!! Html::script('js/bootstrap.min.js')!!}
  {!! Html::script('js/templatemo_script.js')!!}



    <!-- templatemo 393 fantasy -->
<!--     <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script> -->
<!--     <script>
  $("#datepicker").datepicker({dateFormat: "yy/mm/dd"});
  $("#datepicker2").datepicker({dateFormat: "yy/mm/dd"});
  </script> -->

  <script type="text/javascript">
    function onSubmitClick() {

  var txt1 = document.getElementById('txt1');

  if (document.getElementById('txt1').checked) {
    document.getElementById("paymentType").value = "Cash";
    document.getElementById("amount").value = "RM 3500";
  }else if (document.getElementById('txt2').checked) {
    document.getElementById("paymentType").value = "Cash";
    document.getElementById("amount").value = "RM 200";
  }else if (document.getElementById('txt3').checked) {
    document.getElementById("paymentType").value = "Cash";
    document.getElementById("amount").value = "RM 300";
  }else if (document.getElementById('txt4').checked) {
    document.getElementById("paymentType2").value = "Cheque";
    document.getElementById("amount2").value = "RM 3500";
  }else if (document.getElementById('txt5').checked) {
    document.getElementById("paymentType2").value = "Cheque";
    document.getElementById("amount2").value = "RM 200";
  }else if (document.getElementById('txt6').checked) {
    document.getElementById("paymentType2").value = "Cheque";
    document.getElementById("amount2").value = "RM 300";
  }

  var r = confirm("Are you sure you want to submit the information?");
    if(r==true) {
      // $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        alert("You have successfully submit your payment information. We will process your application within 3 working days and we will inform the status of your applicant through your email\n\n Please logout after finish your submission.\n\n Thank you");
    } else {
        return false;
    }

}
  </script>


    <script>
  $('#textA').click(function() {
    $("#text1").toggle(this.checked);
  });
  </script>
  <script>
function ConfirmSubmit() {
    var r = confirm("Are you sure you want to submit the information?");
    if(r==true) {
      // $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        alert("You have successfully submit your payment information. We will process your application within 3 working days and we will inform the status of your applicant through your email\n\n Please logout after finish your submission.\n\n Thank you");
    } else {
        return false;
    }
}
</script>
<!-- FOOTER -->


</body>
</html>

