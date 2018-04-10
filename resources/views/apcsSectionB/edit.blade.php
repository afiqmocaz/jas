@extends('layouts.master')
@section('content')
@section('header', ': APCS : SECTION B - FIELD SPECIALIZATION')

<html>
  <head>
    <title>CRS Online: Registration</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">


      @include('apcs_sidebar') 
    </head>
    <style>
      
        body {font-family: arial; 
        }
        form{font-size: 15px;
          
          width: 100%}
        
      .col-md-4 h1{ color : #9f00a7; font-family: calibri, arial; font-weight: bold; font-size: 30px; position: relative; left: 30px;} 
    .header{background: white; width : 100%; }
    .header a{color: rgb(100,100,100); padding: 20px; position: relative; top : 30px;font-family: calibri, arial;font-weight: 900;  }
    #col-md-4{ height: 50px;}
    .header a:hover{ transition-duration: 0.3s; color: rgb(0,0,0); }
    
    /*container design*/
    .control-label{float: left;}
    .container .inner{width: 480px; margin: 50px auto; border : 1px solid none; background: rgba(55,55,55, 0.4); padding: 50px;transition-duration: 0.7s;}
    .container .inner:hover{-webkit-transform:skew(0deg,0deg); -moz-transform:skew(0deg,0deg);-o-transform:skew(0deg,0deg);transition-duration: 0.7s; background: transparent;}
    .inner h1{color : rgb(200,200,200); font-family: calibri, arial; font-weight: bold; text-align: center; font-size: 20px}
    .inner h3{color: rgb(200,200,200); font-size: 18px; font-family: calibri; text-align: center; margin-top: -5px}
    .inner form label span{color: white;}
    .inner form lagend{color: white;}
    .inner .input{width : 100%; border: none; border-bottom: 1px solid white; color: #9f00a7; background: transparent; padding: 10px;}
    .inner .input:focus{box-shadow: none; border: 1px solid none;}
    .container hr{border-color: rgb(100,100,100);}
    .inner .button{border-radius:10px 10px 10px 10px;color: #FFFFFF; background: rgba(50,50,50, 0.4); padding: 2px 30px ;  border: 2px solid #9f00a7;  font-family: calibri; margin:10px auto; font-weight: bold;}
    .inner .button:hover{background: #8f00a7; color: white;}

    </style>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.sheepItPlugin.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrapValidator.min.js"></script>
    <!--<script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.maskedinput.js"></script> -->
    {!! Html::script('js/jquery.dataTables.min.js')!!}
    <body>
 <!-- <h4 class="text-center">SECTION A: PERSONAL INFORMATION</h4>
  <hr/>-->
  <div class="section" style="padding: 0px;">

    <div class="row" >
         
  
       {!! Form::model($apcsSectionB, ['route' =>['apcsSectionB.update', $apcsSectionB->id], 'method' => 'PUT','id'=>'applicantForm']) !!}
        
 <!--          <div class="col-md-5">
         

            <div class="form-group">    
                <text><b>Specialized Area</b></text><br>
                 @foreach($specializes as $key => $specialize)
              <input type="checkbox" name="item" id="item_{{$key+1}}"  value="{{$specialize->specialized}}" /> {{$key+1}}. {{$specialize->specialized}}
              <br>
              @endforeach
              </div>

            </div> -->
            <div class="col-md-7 col-md-offset-0">

             <div class="form-group">    
                             <table class="table table-bordered" id="x" >
            <thead class="btn-primary" >
            <th  style="width:1%;"><center>No.</center></th>
            <th  style="width:50%;"><center>Specialized Area Selected</center></th>
            <th style="width:20%;"><center>Action</center></th>
            </thead>
            <tbody>
       
              <tr>
                <td>1.</td>
                 <td>  {{ Form::text('specialize_0', null, array('style' => 'width: 95%;font-weight:normal', 'id' => 'specialize_0','readonly','name'=>'specialize_0'))}}  </td>
                  <td><center><button class="btn btn-primary" type="button" onclick="modalSpecialized(1);" > Change</button> <button class="btn btn-danger" type="button"  onclick="deleteSpecialized(1)">Delete</button></center></td>
              </tr>
               <tr>
                <td>2.</td>
                 <td>  {{ Form::text('specialize_1', null, array('style' => 'width: 95%;font-weight:normal', 'id' => 'specialize_1','readonly'))}}  </td>
                  <td><center><button class="btn btn-primary" type="button" onclick="modalSpecialized(2);" > Change</button> <button class="btn btn-danger" type="button"  onclick="deleteSpecialized(2)">Delete</button></center></td>
              </tr> 
               <tr>
                <td>3.</td>
                 <td>  {{ Form::text('specialize_2', null, array('style' => 'width: 95%;font-weight:normal', 'id' => 'specialize_2','readonly'))}}  </td>
                  <td><center><button class="btn btn-primary" type="button" onclick="modalSpecialized(3);" > Change</button> <button class="btn btn-danger" type="button"  onclick="deleteSpecialized(3)">Delete</button></center></td>
              </tr> 
               <tr>
                <td>4.</td>
                 <td>  {{ Form::text('specialize_3', null, array('style' => 'width: 95%;font-weight:normal', 'id' => 'specialize_3','readonly'))}}  </td>
                  <td><center><button class="btn btn-primary" type="button" onclick="modalSpecialized(4);" > Change</button> <button class="btn btn-danger" type="button"  onclick="deleteSpecialized(4)">Delete</button></center></td>
              </tr>    
            </tbody>
        </table>
                  
             
    
              </div>

            
            </div>
            </hr>
            <div class="row">
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a class="btn btn-primary" href="/apcsSectionB/{{$apcsSectionB->id}}" role="button">Back</a>
              <button id="update" type="submit" class="btn btn-primary">Update</button>   
            </div>
          </div>
          </div>
{!!Form::close()!!}
    </div>
  </div>
<!-- modal specialized -->
<div id="modalSpecialized" class="modal" role="dialog">
 <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Specialized Area</h4>
            </div>

            <div class="modal-body">
               
             <div class="form-group">    
                
                 
           <!--    <input type="checkbox" name="item" id="item_{{$key+1}}"  value="{{$specialize->specialized}}" /> {{$key+1}}. {{$specialize->specialized}} -->

         
                <table class="table table-bordered" id="myTable" >
            <thead class="btn-primary" >
            <th  style="width:1%;"><center>No.</center></th>
            <th  style="width:10%;"><center>Specilized Area</center></th>
            <th style="width:5%;"><center>Action</center></th>
            </thead>
          <!--   <tbody>
            @foreach($specializes as $key => $specialize)
              <tr>
                <td>{{$key+1}}</td>
                 <td>{{$specialize->specialized}} </td>
                  <td><center><button class="btn btn-primary" onclick=" pilihSukan('{{$specialize->specialized}}')">Choose</button></center></td>
              </tr>     @endforeach
            </tbody> -->
        </table>
        
              </div>

                          
            </div>
        </div></div>
  </div>
  </body>

  <script type="text/javascript">



  $('#applicantForm').bootstrapValidator({
    feedbackIcons : {
      //valid : 'glyphicon glyphicon-ok',
      //invalid : 'glyphicon glyphicon-remove',
      //validating : 'glyphicon glyphicon-refresh'
    },
    fields : {
     

       item:{
        validators :{
          notEmpty: {  message: 'Specialized Area is required' }
        }
      }


     
  }


});



  
 checkboxlimit(document.forms.apcsSecB.specialize_, 4)
    $("#btnSubmit").click(function(e){
        if( $("input[name=item]:checked").length !== 0){
          $("input[name=item]").removeAttr("required");       
        }     
      });

</script>

<script type="text/javascript">
$(document).ready(function(e) {
  var counter = 0,
    $specializes = $('input[name^="specialize_"]');
  $('input[id^="item_"]').change(function() {
    var id = this;

    if (this.checked) {
      if (counter == 4) {
        this.checked = false;
        return;
      }
      $("#specialize_" + counter).val(this.value).attr('data-value', this.value);
      ++counter;
    } else {
      var $specialize = $specializes.filter('[data-value="' + this.value + '"]');
      var index = $specializes.index($specialize);
      $specializes.slice(index, counter).each(function(i) {
        var $n = $specializes.eq(index + i + 1);
        $(this).val($n.val() || '').attr('data-value', $n.attr('data-value'));
      });
      counter--;
      $("#specialize_" + counter).val('').removeAttr('data-value');
    }

  });
});

function tblSpecialized(id) {
 $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        bDestroy: true,
        ajax: {
            type: "POST",
            url: '/specializedData',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
             // specialize_0: $('#specialize_0').val(),
             // specialize_1: $('#specialize_1').val(),
             // specialize_2: $('#specialize_2').val(),
             // specialize_3: $('#specialize_3').val(),
            }
        },
        columns: [
            {
                render: function (data, type, row, meta) {
                    if (type === 'display') {
                        return (meta.row + 1);
                    }
                    return meta.row+1;
                },
                width: "1%"
                , orderable: false
            },
    
            {
                render: function (data, type, row, meta) {

                    return row.specialized;
                }, width: "10%"
                , orderable: false
            },
            {
                render: function (data, type, row, meta) {
                  var btn="";
               
                  if(row.specialized==$('#specialize_0').val()||row.specialized==$('#specialize_1').val()||row.specialized==$('#specialize_2').val()||row.specialized==$('#specialize_3').val()){
                      btn='<center><button class="btn btn-primary disabled" onclick=" chooseSpecialized(' + id + ',\'' + row.specialized + '\')">Choose</button></center>'; 
                  }
                  else{
                    btn='<center><button class="btn btn-primary" onclick=" chooseSpecialized(' + id + ',\'' + row.specialized + '\')">Choose</button></center>'; 
                  }
                  return btn;
                }, width: "10%"
                , orderable: false
            },
            // {
            //     render: function (data, type, row, meta) {

            //         return getSpecializedArea(row);
            //     }, width: "40%"
            //     , orderable: false
            // },
           
        ]

    });
}
  function modalSpecialized(id){
    tblSpecialized(id);
$('#modalSpecialized').modal('toggle');
  }
  function deleteSpecialized(id){
           if(id==1){
       $('#specialize_0').val('');
        }
         if(id==2){
       $('#specialize_1').val('');
        }
         if(id==3){
       $('#specialize_2').val('');
        }
         if(id==4){
       $('#specialize_3').val('');
        }
        checkField();
  }
  function checkField(){
    var field = [];
    if($('#specialize_0').val()!="")
    {
      field.push($('#specialize_0').val());
    }
      if($('#specialize_1').val()!="")
    {
      field.push($('#specialize_1').val());
    }
      if($('#specialize_2').val()!="")
    {
      field.push($('#specialize_2').val());
    }
      if($('#specialize_3').val()!="")
    {
      field.push($('#specialize_3').val());
    }
  if(field.length<1)
  {
    $("#update").attr("disabled", "disabled");
  }
  else
  {
    $('#update').prop("disabled", false);
  }
  
  
  
  }
</script>
<script >
    function chooseSpecialized(id,name) {
      
      $('#modalSpecialized').modal('hide');
        if(id==1){
       $('#specialize_0').val(name);
        }
         if(id==2){
       $('#specialize_1').val(name);
        }
         if(id==3){
       $('#specialize_2').val(name);
        }
         if(id==4){
       $('#specialize_3').val(name);
        }
        checkField();

    }

</script>
</html>
@endsection
