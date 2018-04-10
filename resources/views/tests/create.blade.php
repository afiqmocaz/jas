@extends('layouts.appeia')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script>
$(document).ajaxStop(function() {
     $('#loading').removeClass('load');
});    
   
var questionIndex = 0;
var questionList = [];  
var questionResult = 0;
var modulList = JSON.parse('<?php echo $modulList?>');
var currModulId = '{{$currModul->id}}';
var currModulIndex = null;

var userAnswer = [];

$.each(modulList,function(index,obj){
    if(parseInt(obj.id) === parseInt(currModulId)){
       currModulIndex = index;
    }
})
$.ajax({
        type: "POST",
        dataType: "json",
        url: '/tests/findQuestions',
        data :{
            module : '{{$moduleId}}'
        },
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            questionList = response;
            buildQuestion(questionList , 0);
        }
});


function btnNext(){
    
    var selectedAnswer = document.querySelector('input[name="option"]:checked').value;
    userAnswer.push(selectedAnswer);
    $("#btnNext").prop('disabled', true);
    questionIndex++;
    buildQuestion(questionList , questionIndex);
}

function buildQuestion(questionList , index){
    
    
    
    if(index < questionList.length){
        var obj = questionList[index];
        var questionIndex = index + 1;
        var buildQuestion = '';
//        
//            <center><img class="file" src="/uploads/1560716_795349673813562_500272134_n.jpg" width="100px"></img><a class="file" href="/uploads/1560716_795349673813562_500272134_n.jpg"></center>
//				          <br><center>limg</center></a><br>
//        
        if(!jQuery.isEmptyObject(obj.original_filename)){
            var img = '<center><img class="file" src="/uploads/'+obj.original_filename+'" width="100px"></img><a class="file" href="/uploads/'+obj.original_filename+'"></center>';
            var titleImg = '<br><center>'+obj.limg+'</center></a><br>';
            buildQuestion = buildQuestion + (img+titleImg);
        }
        buildQuestion = buildQuestion + obj.question;
        $("#question").html(questionIndex+". " + buildQuestion);
        
        
        var i = "i. "+obj.i;
        var ii = "<br>ii. "+obj.ii;
        var iii = "<br>iiI. "+obj.iii;
         var iv = "<br>iv. "+obj.iv;
        
        $("#questionAnswer").html(i+ii+iii+iv);
        
        //{id: 21, question_id: 8, option: "i,ii,iii", correct: 0, deleted_at: null…}
        var quizOptionBuild = '';
        obj.quiz_options.forEach(function (val){
            var radioBtn = '<label class="radio-inline"><input class="option" id="option" type="radio" name="option" value="'+val.id+'">'+val.option+'</label>';
            quizOptionBuild = quizOptionBuild + '<br>'+radioBtn;
        });
        
        $("#questionOption").html(quizOptionBuild);
        
        $('.option').click(function() {
           $("#btnNext").prop('disabled', false);
        })
        
    }else{
        $("#result").html("Quiz Finished : Calculation result...");
        $("#resultTitle").html('<h1>Quiz Result</h1>')
        $("#result").addClass("alert alert-success")
    
        if(currModulIndex < (modulList.length-1)){
            $("#btnFinish").append('<br><button class="btn btn-warning" onclick="goToNextModul()">Procedd to '+modulList[currModulIndex+1].name+'</button>');
        }else{
            $("#btnFinish").append('<br><div><button class="btn btn-warning">Quiz Finish</button></div>');
        }
    
      
        $.ajax({
        type: "POST",
        dataType: "json",
        url: '/tests/calculateAnswerResult',
        data :{
            userAnswer : userAnswer
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        timeout: 5000,
        success: function(data, textStatus ){
            $("#result").html("");
            $("#result").append("<br>Total Question : "+data.totalQuestion);
            $("#result").append("<br>Correct Answer : "+data.correct);
            $("#result").append("<br><br><b>Percentage : "+data.percentage+" %</b>");
            
        },
        error: function(xhr, textStatus, errorThrown){
           alert(errorThrown);
        }
       });
    
    }
  
    
}

function goToNextModul(){
        location.href = "/quiz/takeQuiz/"+modulList[currModulIndex+1].id;
}

//function calculateResult(){
//        $.ajax({
//        type: "POST",
//        dataType: "json",
//        url: '/tests/calculateAnswerResult',
//        data :{
//            userAnswer : userAnswer
//        },
//        headers: {
//        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//        },
//        success: function (response) {
//            
//            
//            alert(response);
//           
//        $("#resultTitle").html('<h1>Quiz Result</h1>')
//        $("#result").html(response);
//        $("#result").addClass("alert alert-success")
//        }
//});     
//
//}

</script>
<div class="container">
    <!-- ------------------{{json_encode($modulList)}}-->
    <div class="row">

        <div >
            <div align="center">
                <table style="width:70%" >
                    <tr>
                        <td>
                            <h2><b>{{$currModul->name}}</b></h2>
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
                            
                            <div id="result">
                            <table class="table table-bordered" width="50%" align="center">
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
                            </div> 
                           
                            
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



@endsection
