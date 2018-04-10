@extends('layouts.appeia')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
</style>
<script>
    $(document).ajaxStop(function () {
        $('#loading').removeClass('load');
    });
    
    var questionIndex = '{{$questionIndex}}';
    var questionList = [];
    var modulList = JSON.parse('<?php echo $modulList ?>');
    var currModulId = 0;
  

    $.ajax({
        type: "POST",
        dataType: "json",
        url: '/tests/findQuestionsExcludeAnswer',
        data: {
           type : '{{$session}}'
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            questionList = response;
            buildQuestion(questionList, questionIndex);
            
            if('{{$session}}' === 'quiz'){
                $('#myModalSelfLearning').modal({
                     backdrop: 'static',
                     keyboard: false
                });
            }
            
//            if(parseInt(questionIndex) === 0){
//               $('#myModalSelfLearning').modal('toggle');
//            }
        }
    });
    
   
    var firstAnswer = '{{$firstAnswer}}';
    function btnNext() {
        $("#btnNext").prop('disabled', true); 
       var selectedAnswer = document.querySelector('input[name="option"]:checked').value; 
       
       var tempQuestionIndex = questionIndex;
       var tempCurrModulId = currModulId;
       
       $('#loading').addClass('load');
       $.ajax({
            type: "POST",
            dataType: "json",
            url: '/tests/checkAnswer',
            data: {
                
                session : '{{$session}}',
                selectedAnswer:selectedAnswer,
                firstAnswer : firstAnswer
                
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                
                if('{{$session}}' === 'quiz'){
                    $('#loading').removeClass('load');
                    if(response === 1){
                         firstAnswer = 1;
                         questionIndex++; 
                         buildQuestion(questionList, questionIndex);

                    }else{
                        $('#myModalWrongAnswer').modal('toggle');
                        firstAnswer = 0;
                    }

                    if(tempCurrModulId!== currModulId){
                           $('#myModalSelfLearning').modal('toggle');
                    }
                }
                
                if('{{$session}}' === 'exam'){
                    $('#loading').removeClass('load');
                    questionIndex++; 
                    buildQuestion(questionList, questionIndex);
                }
               
              
            }
        });
       
      
    }

    function buildQuestion(questionList, index) {
       
        if (index < questionList.length) {
            var obj = questionList[index];
          
            if('{{$session === "quiz"}}'){
                 var selfLearning = obj.quiz_module.self_learning;
                currModulId = obj.quiz_module.id;
                $('#titleSelfLearningM').html(obj.quiz_module.name);
                //tableSelfLearning
                $("#tableSelfLearning").html(null);
                var i = 0;
                selfLearning.forEach(function(val){

                      i++;
                      $("#tableSelfLearning").append('<tr><td><a class="file" target="_blank" href="/uploads/'+val.original_filename+'">'+val.mtitle+'</a></td></tr>')
                })
                
                $('#moduleTitle').html(obj.quiz_module.name);
            }else{
                 $('#moduleTitle').html(null);
            }
           
          
            
            
            var buildQuestion = '';
       
            if (!jQuery.isEmptyObject(obj.original_filename)) {
                var img = '<center><img class="file" src="/uploads/' + obj.original_filename + '" width="100px"></img><a class="file" href="/uploads/' + obj.original_filename + '"></center>';
                var titleImg = '<br><center>' + obj.limg + '</center></a><br>';
                buildQuestion = buildQuestion + (img + titleImg);
            }
            buildQuestion = buildQuestion + obj.question;
            var questionNumber = parseInt(questionIndex)+1;
            $("#question").html(questionNumber + ". " + buildQuestion);


            var i = "i. " + obj.i;
            var ii = "<br>ii. " + obj.ii;
            var iii = "<br>iiI. " + obj.iii;
            var iv = "<br>iv. " + obj.iv;

            $("#questionAnswer").html(i + ii + iii + iv);

            //{id: 21, question_id: 8, option: "i,ii,iii", correct: 0, deleted_at: null…}
            var quizOptionBuild = '';
            obj.quiz_options.forEach(function (val) {
                var radioBtn = '<label class="radio-inline"><input class="option" id="option" type="radio" name="option" value="' + val.id + '">' + val.option + '</label>';
                quizOptionBuild = quizOptionBuild + '<br>' + radioBtn;
            });

            $("#questionOption").html(quizOptionBuild);

            $('.option').click(function () {
                $("#btnNext").prop('disabled', false);
            })

        }else{
            location.href = '/test/result_summary/{{$session}}';
        }
        
    }

  
</script>
<div class="container">
    <!-- ------------------{{json_encode($modulList)}}-->
    <div class="row">

        <div >
            <div align="center">
                <table style="width:70%" >
                    <tr>
                        <td>
                             <h2><b id="moduleTitle">Current Modul</b></h2>
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1">Instructions:</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body">1. Through the self-learning sessions, applicants should complete all the modules and able to understand the EIA in Malaysia including the legislation framework, EIA procedure, and the requirement of EIA Consultants.<br>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <!--                            -----------------question---------------------->
                            <h3></h3>
                            <div id="resultTitle"></div>

                         
                                <table id="tableQuestion" class="table table-bordered" width="50%" align="center">
                                    <tr>
                                        <td class="alert-success">
                                            <div id="question"> Question</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            <div id="questionAnswer">   Loading question answer...</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="questionOption">   Loading question option...</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="btn btn-success pull-right" id="btnNext" disabled="true" onclick="btnNext()">Next</button>
                                        </td>
                                    </tr>
                                </table>
                               
                            <!--                            -----------------end question---------------------->                           
                        </td>

                    </tr>
                    <tr>
                        <td align="center">
                            <div id="btnFinish"></div>
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
@if($session === 'quiz')
<!-- Modal -->
<div id="myModalSelfLearning" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b><div id="titleSelfLearningM"></div></b>Self-Learning</h4>
      </div>
      <div class="modal-body">
          <table id="tableSelfLearning" class="table table-borderless" align="center">
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Start</button>
      </div>
    </div>

  </div>
</div>

<div id="myModalWrongAnswer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Message</b></h4>
      </div>
      <div class="modal-body">
          <p>Wrong Answer, please choose another answer.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endif

@endsection
