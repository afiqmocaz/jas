@extends('layouts.ietsmaster')
@section('header', ': Applicant Assignment - Rubric')
@section('content')

<h1 style="margin: 0px;font-size: 24px">Add Format&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='&bull;  Rubric.'
        data-html="true" data-placement="right" data-original-title="Rubric Instruction" data-trigger="hover"><i class="glyphicon glyphicon-info-sign"></i></a></h1>

<!-- <div class="container"> -->
    <!-- <h1>Rubric</h1>-->
   <!--  <font color='blue'>
    
    
    <div class="alert bg-navy">
        


    </div>
    
    
   


    <!-- <div style="width: 100%;" class="panel-group" >
        <div class="panel panel-primary" style="border-color:#4CAF50;">
            <div class="panel-heading" " >
                <h4 class="panel-title" style="color:white;">
                    <a data-toggle="collapse" href="#collapse1">Rubric Instruction :</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    •  Rubric
                </div>
            </div>
        </div>
    </div> -->
<!-- </div> -->
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>
<!-- <br>  --> 


<input class="btn btn-primary" type="button" value="Add Criteria" onclick='addRow("", "", "", "", "", "","","","","","");' /><br><br>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">&times;</button> 
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="table-responsive">
    <table id="tableRubric" class="table table-bordered" style="width:100%">
        <tr class="btn-primary">
            <th colspan="7"><center>RUBRIC FOR SUBJECT MATTER EXPERT (SME)</center></th>

        <tr class="btn-primary">
            <th width="20%" rowspan="2"><center>Criteria</center></th>
        <th width="1%" rowspan="2"><center>Percentage<br>(%)</center></th>
        <th width="50%" colspan="4"><center>Level</center></th>
        <th width="1%" rowspan="2"><center>Action</center></th>
        </tr>
        <tr  >
            <th width="8%" class="alert-danger"><center>1</center></th>
        <th width="8%" class="alert-warning"><center>2</center></th>
        <th width="8%" class="alert-info"><center>3</center></th>
        <th width="8%" class="alert-success"><center>4</center></th>
        </tr>


    </table>  
    <table  style="width:100%" class="table table-bordered btn-primary" >
        <tr >
            <th colspan="8"><center>Total</center></th>
        <tr>
            <th width="33.6%"><center>Percentage</center></th>
        <td width="11%"><center><input type="text" id="total" name="total" style="width: 35px;color:black;">(%)</center></td>
        <th width="59%" colspan="4"><center>Marks</center></th>
        <td width="10%" rowspan="2"><center><input type="text" id="ttot" name="ttot" style="width: 82px;color:black;"></center></td>
        </tr></tr>
    </table><br><br> 
    
     <!-- <div class="row">
    <div class="col-sm-1">
     
     
    </div>
    <div class="col-sm-1" >
        
    </div>
     <div class="col-sm-1" >
        
    </div>
  </div> -->

    <div align="right">
        <input type="button" value="Back" class="btn btn-primary" onclick="back()"/>
        <input type="button" value="Save" class="btn btn-primary" onclick="save()"/>
  
    </div>
     <form id="rubricForm" action="/criteria_save" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!-- format id soon -->
        <input type='hidden' id="rubricList" name='rubricList' >
    </form>
 
    

</div>
<script>
 

    function addRow(criteria, percentage, checked1, checked2, checked3, checked4,percentageCol,desc1,desc2,desc3,desc4) {
        var rowCount = $('#tableRubric tr').length;


        var id = uniqId();

        console.log("---" + id);
      
      
        
            var col1 = '<td><center><textarea rows="2" cols="23" id="add2" class="row_criteria" placeholder="Example: Understanding of Notification Process">' + criteria + '</textarea></td>';
       var colP = '<td><center><input type="text" onblur="calculatePercentage(' + id + ')" class="row_percentage ' + id + '" id="'+rowCount+'"  name="per" style="width: 35px;" value="' + percentageCol + '"><center></td>';
                var col2 = '<td width="15%"><center><input class="level_' + id + ' row_level hide" type="radio" id="below" name="'+rowCount+'" value="1" onclick="calculateMark()" '+checked1+'></center><center><textarea rows="4" cols="20" id="add2" class="row_desc1" placeholder="Description 1">' + desc1 + '</textarea></td>';
         var col3 = '<td width="15%"><center><input class="level_' + id + ' row_level hide" type="radio" id="below"  name="'+rowCount+'" value="2" onclick="calculateMark()" '+checked2+'></center><center><textarea rows="4" cols="20" id="add2" class="row_desc2" placeholder="Description 2">' + desc2 + '</textarea></td>';
           var col4 = '<td width="15%"><center><input class="level_' + id + ' row_level hide" type="radio" id="below"  name="'+rowCount+'" value="3" onclick="calculateMark()" '+checked3+'></center><center><textarea rows="4" cols="20" id="add2" class="row_desc3" placeholder="Description 3">' + desc3 + '</textarea></td>';
             var col5 = '<td width="15%"><center><input class="level_' + id + ' row_level hide" type="radio" id="below"  name="'+rowCount+'" value="4" onclick="calculateMark()" '+checked4+'></center><center><textarea rows="4" cols="20" id="add2" class="row_desc4" placeholder="Description 4">' + desc4 + '</textarea></td>';
               var btnDel = '<td><button class="btnDelete btn delete-section-btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>';
           


      

        $("#tableRubric tbody").append('<tr class="ROW_INPUT">' + col1 +colP+ col2+ col3 + col4 + col5 + btnDel + '</tr>');
        $(".btnDelete").bind("click", Delete);

        calculateMark();
    }

    function Delete() {
        var par = $(this).parent().parent();
        par.remove();
    }

    function uniqId() {
        return Math.round(new Date().getTime() + (Math.random() * 100));
    }
   function calculatePercentage(id) {
        var total = 0;calculateMark()
        $(".row_percentage").each(function () {

            if (!jQuery.isEmptyObject($(this).val())) {
                var value = parseInt($(this).val());
                total = total + value;
            }

        });

        if (total < 0 || total > 100) {
            alert('Total percentage should not be more than 100%');
            $('.' + id).val(null);
        } 

    }

    function calculateMark(){
         var totalRow = $('#tableRubric tr').length;
         var total=0;
         var totalMark = 0;
         var totalSelectedMark = 0;
        var score = [];
         
         var rubricList = [];
    
         for(var i=3; i<totalRow;i++){
             console.log();
             var Percentage=$('#'+i+'');
             var selected = $("input[type='radio'][name='"+i+"']:checked");
             if (selected.length > 0) {
                 var selectedPer=parseInt(Percentage.val());
                var selectedVal = parseInt(selected.val());
                console.log('selectedPer----',i,selectedPer);
               console.log('selectedVal----',selectedVal);
               totalMark=totalMark+selectedPer; console.log('totalMark ===',totalMark);
               selectedVal=(selectedVal/4)*selectedPer;
                totalSelectedMark = totalSelectedMark + selectedVal;
                rubricList.push(selectedVal);
             }
             
             
             
         }
            if (total < 0 || total > 100) {
            alert('Total percentage should not be more than 100%');
            $('.' + id).val(null);
        } else {
           $('#ttot').val(totalSelectedMark+"/"+(totalMark))
         
         $('#total').val( (totalSelectedMark/totalMark)*100);
        }

         
      
         
    }



    //
    
   function save() {

        var rubricList = [];


        var validate = 1;

        $('#tableRubric tr').each(function (index) {
            if (index > 2) {


                var criteria = $(this).find(".row_criteria").val();
                var percentage = $(this).find(".row_percentage").val();
                var desc1 = $(this).find(".row_desc1").val();
                var desc2 = $(this).find(".row_desc2").val();
                var desc3 = $(this).find(".row_desc3").val();
                var desc4 = $(this).find(".row_desc4").val();
                 
                var selected = $("input[type='radio'][name='"+index+"']:checked");
                var level = 0;
                
                if (jQuery.isEmptyObject(criteria)) {
                    validate = 0;
                }
                if (jQuery.isEmptyObject(desc1)) {
                    validate = 0;
                }
                 if (jQuery.isEmptyObject(desc2)) {
                    validate = 0;
                }
                 if (jQuery.isEmptyObject(desc3)) {
                    validate = 0;
                }
                 if (jQuery.isEmptyObject(desc4)) {
                    validate = 0;
                }
       
                var rubric = {};
                rubric.criteria = criteria;
                rubric.percentage = percentage;
                rubric.level = level;
                rubric.desc1=desc1;
                rubric.desc2=desc2;
                rubric.desc3=desc3;
                rubric.desc4=desc4;
                rubricList.push(rubric);



            }
        });

        var total = 0;
        $(".row_percentage").each(function () {

            if (!jQuery.isEmptyObject($(this).val())) {
                var value = parseInt($(this).val());
                total = total + value;
            }

        });

        if (total < 100 || total > 100) {
            validate=0;
        } 
        if (validate === 0) {
       alert("Please fill all the required input");
        }  else {
            var rubricList = JSON.stringify(rubricList);
            $('#rubricList').val(rubricList);
            $('#rubricForm').submit();
    
        }
        console.log('rubricList :',rubricList);
    }
</script>
<script>
    $('#popoverData').popover({
    container: 'body' });
    $('#popoverOption').popover({ trigger: "hover" });
</script>
@endsection
