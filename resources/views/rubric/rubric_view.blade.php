@extends($master)
@section('content')
<div class="container">
    <h1>Rubric</h1>
    <font color='blue'>
    Applicant Name : {{$upload->user->name}}
    <br>File View: <a target="_blank" href="/uploads/{{$upload->filename}}">{{$upload->original_filename}}</a>
    </font>


    <div style="width: 100%;" class="panel-group" >
        <div class="panel panel-primary" style="border-color:#4CAF50;">
            <div class="panel-heading" style="background-color:#4CAF50;" >
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
    </div>
</div>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>
<br>  


<input class="btn btn-success" type="button" value="Add Criteria" onclick='addRow("", "", "", "", "", "");' /><br><br>

<div class="table-responsive">
    <table id="tableRubric" class="table table-bordered" style="width:100%">
        <tr class="alert-success">
            <th colspan="7"><center>RUBRIC FOR SUBJECT MATTER EXPERT (SME)</center></th>

        <tr class="alert-success">
            <th width="30%" rowspan="2"><center>Criteria</center></th>
        <th width="10%" rowspan="2"><center>Percentage<br>(%)</center></th>
        <th width="50%" colspan="4"><center>Level</center></th>
        <th width="10%" rowspan="2"><center>Action</center></th>
        </tr>
        <tr  >
            <th width="8%" class="alert-danger"><center>Weak<br>0-39</center></th>
        <th width="8%" class="alert-warning"><center>Medium<br>40-59</center></th>
        <th width="8%" class="alert-info"><center>Good<br>60-79</center></th>
        <th width="8%" class="alert-default"><center>Excellent<br>80-100</center></th>
        </tr>


    </table>  
    <table  style="width:100%" class="table table-bordered alert-success" >
        <tr >
            <th colspan="8"><center>Total</center></th>
        <tr>
            <th width="33.6%"><center>Percentage</center></th>
        <td width="11%"><center><input type="text" id="total" name="total" style="width: 35px;">(%)</center></td>
        <th width="59%" colspan="4"><center>Marks</center></th>
        <td width="10%" rowspan="2"><center><input type="text" id="ttot" name="ttot" style="width: 82px;"></center></td>
        </tr></tr>
    </table><br><br> 
    
     <div class="row">
    <div class="col-sm-1">
     <input type="button" value="Back" class="btn btn-default" onclick="back()"/>
     
    </div>
    <div class="col-sm-1" >
        <input type="button" value="Save" class="btn btn-success" onclick="save()"/>
    </div>
  </div>
   
 
    
    <form id="rubricForm" action="/rubric_save" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type='hidden' name='id' value='{{$id}}'>
        <input type='hidden' id="rubricList" name='rubricList' value='{{$id}}'>
    </form>

</div>
<script>
    function back(){
        location.href = '/secretariat_assigment/{{$category}}';
    }

    function save() {

        var rubricList = [];


        var validate = 1;

        $('#tableRubric tbody tr').each(function (index) {
            if (index > 2) {


                var criteria = $(this).find(".row_criteria").val();
                var percentage = $(this).find(".row_percentage").val();

                var level = 0;
                $(this).find(".row_level").each(function () {
                    if (!jQuery.isEmptyObject($(this).val())) {
                        level = $(this).val();
                    }

                });

                if (jQuery.isEmptyObject(criteria)) {
                    validate = 0;
                }
                if (jQuery.isEmptyObject(percentage)) {
                    validate = 0;
                }
                if (jQuery.isEmptyObject(level)) {
                    validate = 0;
                }

                var rubric = {};
                rubric.criteria = criteria;
                rubric.percentage = percentage;
                rubric.level = level;

                rubricList.push(rubric);



            }
        });

        if (validate === 0) {
            alert("Please fill all the required input");
        } else {
            var rubricList = JSON.stringify(rubricList);
            $('#rubricList').val(rubricList);


            $('#rubricForm').submit();
            console.log(rubricList);
            //save data
        }
    }

    function addRow(criteria, percentage, level1, level2, level3, level4) {



        var id = uniqId();

        console.log("---" + id);
        var col1 = '<td><center><textarea rows="2" cols="23" id="add2" class="row_criteria" placeholder="Example: Understanding of Notification Process">' + criteria + '</textarea></td>';
        var col2 = '<td><center><input type="text" onblur="calculatePercentage(' + id + ')" class="row_percentage ' + id + '" id="per" name="per" style="width: 35px;" value="' + percentage + '"><center></td>';
        var col3 = '<td width="10%"><center><input class="level_1_' + id + ' row_level"  onkeyup="enableToggle(1,' + id + ')" type="number" id="below" onblur="calculateLevel(1,' + id + ')" name="count" style="width: 100px;" placeholder="Below Expectation" value="' + level1 + '"></center></td>';
        var col4 = '<td width="10%"><center><input class="level_2_' + id + ' row_level"  onkeyup="enableToggle(2,' + id + ')" type="number" id="Basic" onblur="calculateLevel(2,' + id + ')" name="count" style="width: 100px;" placeholder="Basic" value="' + level2 + '"></center></td>';
        var col5 = '<td width="10%"><center><input class="level_3_' + id + ' row_level"  onkeyup="enableToggle(3,' + id + ')" type="number" id="Proficient" onblur="calculateLevel(3,' + id + ')" name="count" style="width: 100px;" placeholder="Proficient" value="' + level3 + '"></center></td>';
        var col6 = '<td width="10%"><center><input class="level_4_' + id + ' row_level"  onkeyup="enableToggle(4,' + id + ')" type="number" id="Outstanding" onblur="calculateLevel(4,' + id + ')" name="count" style="width: 100px;" placeholder="Outstanding" value="' + level4 + '"></center></td>';


        var btnDel = '<td><button class="btnDelete btn delete-section-btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>';

        $("#tableRubric tbody").append('<tr class="ROW_INPUT">' + col1 + col2 + col3 + col4 + col5 + col6 + btnDel + '</tr>');
        $(".btnDelete").bind("click", Delete);
        
        if(!jQuery.isEmptyObject(level1)){
            enableToggle(1, id);
            calculateLevel(1, id);
            calculatePercentage(id);
        }
        if(!jQuery.isEmptyObject(level2)){
            enableToggle(2, id);
             calculateLevel(2, id);
            calculatePercentage(id);
        }
        if(!jQuery.isEmptyObject(level3)){
            enableToggle(3, id);
             calculateLevel(3, id);
            calculatePercentage(id);
        }
        if(!jQuery.isEmptyObject(level4)){
            enableToggle(4, id);
             calculateLevel(4, id);
            calculatePercentage(id);
        }

    }


    function Delete() {
        var par = $(this).parent().parent();
        par.remove();
    }

    function uniqId() {
        return Math.round(new Date().getTime() + (Math.random() * 100));
    }

    function enableToggle(level, id) {
        var i;

        for (i = 1; i < 5; i++) {

            if (level === i) {
                $('.level_' + i + '_' + id).prop('disabled', false);
            } else {
                $('.level_' + i + '_' + id).prop('disabled', true);
            }
        }

        var levelVal = $('.level_' + level + '_' + id).val();

        if (jQuery.isEmptyObject(levelVal)) {
            for (i = 1; i < 5; i++) {
                $('.level_' + i + '_' + id).val(null);
            }
        }


    }

    var validateCount = 0;

    function calculateLevel(level, id) {

        var levelVal = parseInt($('.level_' + level + '_' + id).val());

        var valid = 0;

        if (level === 1 && levelVal > -1 && levelVal < 40) {
            valid = 1;
        }
        else if (level === 2 && levelVal > 39 && levelVal < 60) {
            valid = 1;
        }
        else if (level === 3 && levelVal > 59 && levelVal < 80) {
            valid = 1;
        } else if (level === 4 && levelVal > 79 && levelVal < 101) {
            valid = 1;
        }


        if (valid === 0) {
            validateCount++;
            for (i = 1; i < 5; i++) {
                $('.level_' + i + '_' + id).val(null);
                $('.level_' + i + '_' + id).prop('disabled', false);
            }
        } else {
            var totalLevel = 0;
            $(".row_level").each(function () {
                
                console.log($(this).val());

                if (!jQuery.isEmptyObject($(this).val())) {
                    var value = parseInt($(this).val());
                    totalLevel = totalLevel + value;
                }

            });

            $('#ttot').val(totalLevel);
        }



    }


    function calculatePercentage(id) {
        var total = 0;
        $(".row_percentage").each(function () {

            if (!jQuery.isEmptyObject($(this).val())) {
                var value = parseInt($(this).val());
                total = total + value;
            }

        });

        if (total < 0 || total > 100) {
            alert('Total percentage should not be more than 100%');
            $('.' + id).val(null);
        } else {
            $('#total').val(total);
        }


    }


    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/rubric_find",
        data: {
            upload_id: '{{$id}}',
        },
        dataType: 'json',
        success: function (res) {
            res.data.forEach(function (data) {
                console.log(data);

                var levelVal = data.level;
                if (levelVal > -1 && levelVal < 40) {
                    addRow(data.criteria, data.percentage, levelVal, "", "", "");
                }
                else if (levelVal > 39 && levelVal < 61) {
                    addRow(data.criteria, data.percentage, "", levelVal, "", "");
                }
                else if (levelVal > 59 && levelVal < 80) {
                    addRow(data.criteria, data.percentage, "", "", levelVal, "");
                } else if (levelVal > 79 && levelVal < 101) {
                    addRow(data.criteria, data.percentage, "", "", "", levelVal);
                }

            });
        }
    });

</script>

@endsection
