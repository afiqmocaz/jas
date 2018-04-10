@extends('layouts.certeia')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
       <h2  style="margin-left:30px">Certificate Renewal</h2>
        <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body"> 1. An applicant have to click on the Renew Certificate button in order to apply for the renewal.<br>
                2. The applicant will be consider as failed if the certificate failed to renew.
                </div>
      </div>
    </div><br><br>
    <div class="form-group" style="margin-left:5%">
              
                  <!--<label>Additional Information </label> </br>-->
              @foreach($certs as $cert)
                  <!--<br><textarea id="reqaddinfo" name="reqaddinfo" required="" rows="7" cols="60" style="resize:none;width:60%"></textarea>-->
              <div class="input-group" style="width: 100%;">
                
                
   <center>
      <table class="table table-bordered" style="margin-left:15%;width:60%">
       <!--<tr>
    <th scope="row">Certificate Renewal Status</th>
    <td>: Submitted</td>
  </tr> -->
  <tr>
    <th scope="row">Certificate No.:</th>
    <td>{{$certs->qpno}}</td>
  </tr>
  <tr>
    <th scope="row">Specialized Area</th>
    <td>: i) {{$cert->first_specialize}}<br> &nbsp
      ii) {{$cert->second_specialize}}</td>
  </tr>
  <tr>
    <th scope="row">CPD Hours:</th>
    <td></td>
  </tr>
  <tr>
    <th scope="row">Certification Expired Date:</th>
    <td>{{$cert->expired_date}}</td>
  </tr>
  <tr>
    <th scope="row">Disciplinary Status:</th>
    <td>{{$cert->status_disp}}</td>
  </tr>
  </table>

    

  @endforeach
             <br><br><form action="" method="get">
             <center>
              <input type="submit" class="btn btn-primary" onclick='onSubmitClick();' value="Renew Certificate" /><hr><br></center>
             
               </center> 
               </form>
               <label color="red">**Note: Certificate Renewal can only be made within 2 months prior to expiry date.</label>
            {!! Form::close() !!} </div>
        <script>
function ConfirmSubmit() {
    var r = confirm("Are you sure to submit this application?\n\n Click OK to confirm the examination date or CANCEL to cancel!");
    if(r==true) {
      return view('examschedules.index') ;
    } else {
        return false;
    }
}
</script>
            </div>
        </div>
    </div>
</div>

@endsection

