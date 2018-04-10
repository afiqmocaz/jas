@extends($extendLayout)
@section('content')
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
 
    var questionList = [];
    var currModulId = 0;

    var selfLearningCache = [];
    
   
   
    var click = 0;
  
    var selectedAnswerList = JSON.parse('<?php echo $answer_data ?>');
    var question_data = JSON.parse('<?php echo $question_data ?>');
    var questionIndex = JSON.parse('<?php echo $currQuestionIndex ?>');
  
    $.ajax({
        type: "POST",
        dataType: "json",
        url: '/tests/findQuizQuestion',
        data: {
           category : '{{$category}}',
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            questionList = response;
            console.log(questionList);
           
            if(questionList.length > 0){
                buildQuestion(questionList, questionIndex);
            }else{
                 $("#questionAnswer").html("No Question available");
                 $("#questionOption").remove();
            }
        }
    });
    
 
    function btnNext() {
          var selectedAnswer = document.querySelector('input[name="option"]:checked').value; 
        
        if(click === 0){
              selectedAnswerList[questionIndex] = selectedAnswer;
              var selectedAnswer = document.querySelector('input[name="option"]:checked').value;
              updateQuizSession();
         }
        
        click++;
        console.log(selectedAnswerList);
        
        $("#btnNext").prop('disabled', true); 
      
        
        if(parseInt(selectedAnswer) === 1){
            questionIndex++;
            buildQuestion(questionList,questionIndex);
            
        }else{
            $('#myModalWrongAnswer').modal('toggle');
        }
     
         
    }
    
    
     function updateQuizSession(){
        
       $('#loading').addClass('load'); 
       $.ajax({
                      type: "POST",
                      dataType: "json",
                      url: '/tests/updateQuizSession',
                      data: {
                          type:'quiz',
                          category:'{{$category}}',
                          answer_data:selectedAnswerList,
                          question_data:question_data
                      },
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success: function (response) {
                          $('#loading').removeClass('load');
                      }
                  });
      }
         function updateMark(mark){
        
       $('#loading').addClass('load'); 
       $.ajax({
                      type: "POST",
                      dataType: "json",
                      url: '/tests/updateQuizSession',
                      data: {
                          type:'quiz',
                          category:'{{$category}}',
                          answer_data:selectedAnswerList,
                          question_data:question_data,
                          mark:mark
                      },
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success: function (response) {
                          $('#loading').removeClass('load');
                      }
                  });
      }

    function buildQuestion(questionList, index) {
           click = 0;
           var obj = questionList[index];
           
           console.log(questionList.length+"/"+index);
           if(questionList.length === index){ //FINISH QUIZ
               
               var totalScore = 0;
               selectedAnswerList.forEach(function(score){
                   totalScore = totalScore + parseInt(score);
               })
               
               console.log("total score : "+totalScore);
               console.log("selectedAnswerList : "+selectedAnswerList.length);
               
               var percentage  = Math.floor((totalScore / selectedAnswerList.length) * 100);
              
               var empty = '<div align="center"><h1> &nbsp  &nbsp  &nbsp  &nbsp </h1></div>';
               var title = '<div align="center"><h1>CONGRATULATION</h1><h1>QUIZ COMPLETED</h1></div>';
               var quizResult = '<div align="center"><h2>Score '+percentage+" %  </h2><br><strong>You may proceed to the Comprehensive Examination section to choose the Examination date.</strong></div>"
              updateMark(percentage);                 
               $('#examBox').html(empty+title+quizResult);
           }
           
           question_data.push(obj.id);
          
                var selfLearning = obj.quiz_module.self_learning;
               
                console.log(selfLearningCache);
                
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
                
                var exist = 0;
                selfLearningCache.forEach(function(modulId){
                    if(currModulId === modulId){
                        exist = 1;
                    }
                })
                if(exist === 0){
                     $('#myModalSelfLearning').modal('toggle');
                     selfLearningCache.push(currModulId);
                }
               
                console.log(selfLearningCache);
          
           
            var buildQuestion = '';
       
            if (!jQuery.isEmptyObject(obj.original_filename)) {
                var img = '<center><img class="file" src="/uploads/' + obj.original_filename + '" width="100%"></img><a class="file" href="/uploads/' + obj.original_filename + '"></center>';
                var titleImg = '<br><center>' + obj.limg + '</center></a><br>';
                buildQuestion = buildQuestion + (img + titleImg);
            }
            buildQuestion = buildQuestion + obj.question;
            var questionNumber = "<h3><b>Question "+(parseInt(questionIndex)+1)+"</b></h3>";
             $("#question").html(questionNumber + " " + buildQuestion);
           if(!jQuery.isEmptyObject(obj.i)){
            var i = "i. " + obj.i;
            var ii = "<br>ii. " + obj.ii;
            var iii = "<br>iiI. " + obj.iii;
            var iv = "<br>iv. " + obj.iv;

            $("#questionAnswer").html(i + ii + iii + iv);
}$("#questionAnswer").html("");

            //{id: 21, question_id: 8, option: "i,ii,iii", correct: 0, deleted_at: null…}
            var quizOptionBuild = '';
            obj.quiz_options.forEach(function (val) {
              if(val.correct===1){ var radioBtn = '<label class="radio-inline"><input class="option" id="option" type="radio" name="option" value="' + val.correct + '">' + val.option + ' <strong>true answer<strong></label>';}
              else
                { var radioBtn = '<label class="radio-inline"><input class="option" id="option" type="radio" name="option" value="' + val.correct + '">' + val.option + '</label>';
                }
               
                quizOptionBuild = quizOptionBuild + '<br>' + radioBtn;
            });

            $("#questionOption").html(quizOptionBuild);

            $('.option').click(function () {
                $("#btnNext").prop('disabled', false);
            })
            
          

    }
    


  
</script>
<div class="container">

    <div class="row">

        <div id="examBox" align="center">
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
                                        <td >
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
                                            
                                            <button class="btn btn-info form-control" id="btnNext" disabled="true" onclick="btnNext()">Next</button>
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

<!-- Modal -->
<div id="myModalSelfLearning" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b><div id="titleSelfLearningM"></div></b>Self-Learning</h4>
         <h5 class="modal-title"><b><div id="titleSelfLearningM"></div></b>Instructions:</h5>
         <text>1. Please open all the given materials.</text><br>
         <text>2. All open materials will remain on another browser for your reference during your quiz session.</text><br>
         <text>3. Please click start button to answer the quiz.</text>
      </div>
      <div class="modal-body">
		 <text><b>List of Self-Learning materials: </b></text>
          <table id="tableSelfLearning" class="table table-borderless" align="center">
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Start Quiz</button>
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


@endsection
