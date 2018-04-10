@extends($extendLayout)
@section('content')

<style>
    .modal-backdrop
    {
        opacity:0.5 !important;
    }

    .custom {
        width: 50px !important;
    }

    .innerbox
    {
        width:700px; /* or whatever width you want. */
        max-width:700px; /* or whatever width you want. */
        height: 700px;
        display: inline-block;
    }
</style>
<script>
    $(document).ajaxStop(function () {
        $('#loading').removeClass('load');
    });

    var questionIndex = 0;
    var questionList = [];
    var currModulId = 0;
    var selectedAnswerList = null;



    function btnNext() {
        if (questionIndex <= (questionList.length - 1)) {
            questionIndex++;
            buildQuestion(questionList, questionIndex);
        }
    }

    function btnPrev() {
        if (questionIndex > 0) {
            questionIndex--;
            buildQuestion(questionList, questionIndex);
        }
    }

    function goToQuestionIndex($index) {
        buildQuestion(questionList, $index);
    }
    ;

    function buildQuestion(questionList, index) {

        console.log(questionList);
        questionIndex = index;
        var left = $('#tableQuestionContainer').offset().left;  // Get the calculated left position
        $("#tableQuestionContainer").css({left: left})  // Set the left to its calculated position
                .animate({"left": "0px"}, "slow");

        buildBtnIndicator(questionList, index);

        if (questionList.length === index) {

            $('#tableFinish').removeClass('hide');
            $('#tableQuestion').addClass('hide');
        } else if (index < questionList.length) {
            $('#tableFinish').addClass('hide');
            $('#tableQuestion').removeClass('hide');

            var obj = questionList[index];

            $('#moduleTitle').html(null);

            var buildQuestion = '';

            if (!jQuery.isEmptyObject(obj.original_filename)) {
                var img = '<center><img class="file" src="/uploads/' + obj.original_filename + '" width="100%" ></img><a class="file" href="/uploads/' + obj.original_filename + '"></center>';
                var titleImg = '<br><center>' + obj.limg + '</center></a><br>';
                buildQuestion = buildQuestion + (img + titleImg);
            }

            var questionNumber = parseInt(index) + 1;
            buildQuestion = buildQuestion + '<div > <h3><b>Question ' + questionNumber + '.</b></h3> ' + obj.question + "</div>";
             obj.correct_option.forEach(function(cor){
                 buildQuestion = buildQuestion + '<div > <h3><b>Question answer ' + cor.option +"</div>";
             })
            $("#question").html(buildQuestion);
            var i="";   var ii="";   var iii="";   var iv="";
          if(!jQuery.isEmptyObject(obj.i))
          {
              var i = "i. " + obj.i;
          }
            if(!jQuery.isEmptyObject(obj.ii))
          {
              var ii = "<br>ii. " + obj.ii;
          }
               if(!jQuery.isEmptyObject(obj.iii))
          {
                var iii = "<br>iii. " + obj.iii;
          }
               if(!jQuery.isEmptyObject(obj.iv))
          {
              var iv = "<br>iv. " + obj.iv;

          }
            
          
            

            $("#questionAnswer").html(i + ii + iii + iv);

            //{id: 21, question_id: 8, option: "i,ii,iii", correct: 0, deleted_at: null…}
            var quizOptionBuild = '';

            obj.quiz_options.forEach(function (val) {

                var isSelected = (parseInt(selectedAnswerList[parseInt(index)]) === parseInt(val.id) ? "checked" : "");
              
                  if(val.correct===1){

                     var radioBtn = '<label class="radio-inline"><input class="option" id="option" type="radio" name="option" value="' + val.id + '" ' + isSelected + '>' + val.option + '<strong>true answer<strong></label>';
              }
              else
                {    var radioBtn = '<label class="radio-inline"><input class="option" id="option" type="radio" name="option" value="' + val.id + '" ' + isSelected + '>' + val.option + '</label>';
                }
                quizOptionBuild = quizOptionBuild + '<br>' + radioBtn;
            });

            $("#questionOption").html(quizOptionBuild);

            $('.option').click(function () {

                var selectedAnswer = document.querySelector('input[name="option"]:checked').value;
                selectedAnswerList[index] = selectedAnswer;

                buildBtnIndicator(questionList, index);

                updateExamSession();
            })

        }

    }

    function buildBtnIndicator(questionList, index) {
        $('#questionIndicator').html(null);

        var indexQ = 0;
        var questionNy = 0;
        questionList.forEach(function (item) {
            var bgcolor = 'btn-default';
            if (indexQ === parseInt(index)) {
                bgcolor = 'btn-warning';
            }
            var questionIsAnswered = parseInt(selectedAnswerList[parseInt(indexQ)]);
            if (questionIsAnswered > 0) {
                questionIsAnswered = '';

            } else {
                questionNy++;
                questionIsAnswered = '<span style="color:red" class="glyphicon glyphicon-exclamation-sign"></span>';
            }
            $('#questionIndicator').append('&nbsp<button onclick="goToQuestionIndex(' + indexQ + ')" class="btn ' + bgcolor + ' custom"></span>' + questionIsAnswered + ' &nbsp' + (indexQ + 1) + '</button>');
            indexQ++;

            if (questionNy > 0) {
                $('#questionNy').html('<span style="color:red" class="glyphicon glyphicon-exclamation-sign"></span> ' + questionNy + " Question not answered yet");
            } else {
                $('#questionNy').html(null);
            }

        });


        $('#questionIndicator').append('&nbsp<button  class="btn btn-success" data-toggle="modal" data-target="#modalFinish" " >FINISH</button>');
    }


    function endExamSession() {
        $.ajax({
            type: "POST",
            url: '/tests/updateExamCandidateStatus',
            data: {
                examCandidateId : '{{$examCandidate->id}}',
                scheduleId: '{{$schedule->id}}',
                status: 'finished'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

                if (response === 'expired') {
                    $('#examBox').html('<h1>Exam session is expired</h1>');
                } else {

                    var info = "<h2><b>EXAM TIME FINISH</b></h2>";
                    var examsScore = "<h3><b>EXAM SCORE : " + response + " %</b></h3>";

                    var summary = "<h3><p><font color='red'>Sorry, you failed the exam</font></p></h3>   <button class='btn btn-primary' onclick='goToRetake()' > <b>RESIT EXAM</b></button>";

                    if (response >= 70) {
                        summary = "<h3><p><font color='green'>Congratulation, you passed the exam</font></p></h3>";
                    }


                    $('#examBox').html(info + examsScore + summary);
                }


            }
        });
    }
    
    function goToRetake(){
        location.href = '/examschedules/{{$payment->id}}';
    }


    function updateExamSession() {

        $('#loading').addClass('load');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '/tests/updateExamSession',
            data: {
                type: 'exam',
                scheduleId: '{{$schedule->id}}',
                answer_data: selectedAnswerList
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#loading').removeClass('load');
            }
        });
    }

    function CountDownTimer(dt, id)
    {
       var server_end = new Date(dt);
        var server_now = <?php echo time(); ?> * 1000;
        var client_now = new Date().getTime();
        var end = server_end - server_now + client_now;

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
            var now = new Date();
            // console.log(now);
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = 'EXPIRED!';
                $('#examBox').html('<h1>Exam session is expired</h1>');
                endExamSession();

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);



            document.getElementById(id).innerHTML = days + 'days ';
            document.getElementById(id).innerHTML += hours + 'hrs ';
            document.getElementById(id).innerHTML += minutes + 'mins ';
            document.getElementById(id).innerHTML += seconds + 'secs';
        }

        timer = setInterval(showRemaining, 1000);



    }
    //08/28/2017 03:35 PM -- system
    //'8/28/2017 3:30 PM' --example
    CountDownTimer('{{$finishExamTime}}', 'countdown');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: '/tests/generateExamQuestion',
        data: {
            scheduleId: '{{$schedule->id}}'
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {


            var data = response;

            questionList = data.questionList;


            if (questionList.length > 0) {

                selectedAnswerList = new Array(questionList.length + 1);

                if (!jQuery.isEmptyObject(data.answer_data) && data.answer_data.length > 0) {
                    selectedAnswerList = data.answer_data;
                }

                buildQuestion(questionList, questionIndex);

            } else {

                $("#questionAnswer").html("No Question available");
                $("#questionOption").remove();
            }

        }
    });

</script>
<div class="container">
    <div class="test"></div>
    @if($examCandidate->status === 'attended')   
    <table class="table table-bordered">

        <tr><td>
                <div id="examBox" align="center">
                    <div align="center">
                        <table style="width:70%" >

                            <tr>
                                <td>
                                    <h2><b><font color="blue">EXAM TIME REMAINING : </font><div id="countdown"></div></b></h2>
                                </td> 
                            </tr>
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

                                    <div id="tableQuestionContainer" align="center">
                                        <table id="tableFinish" class="table table-bordered"><tr>
                                                <td>
                                                    <button class="btn btn-warning form-control" id="btnFinish" onclick="endExamSession()">END EXAM SESSION</button>
                                                </td>
                                            </tr>
                                        </table>


                                        <table id="tableQuestion" class="table table-bordered" width="50%" align="center">
                                            <tr>
                                                <td >
                                                    <div id="question" > Question</div>
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
                                                    <div class="row">
                                                        <div class="col-sm-6">  <button class="btn btn-default pull-right form-control" onclick="btnPrev()">Previous</button></div>
                                                        <div class="col-sm-6">  <button class="btn btn-default pull-left form-control" onclick="btnNext()">Next</button></div>

                                                    </div>



                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                    <table class="table table-borderless grid" cellspacing="0">
                                        <tbody>
                                            <tr id="questionIndicator" >
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div id="questionNy"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                    </div>
                                    <!--                            -----------------end question---------------------->                           
                                </td>

                            </tr>
                        </table>
                        <br>
                        <br>
                        <br>
                    </div>

                </div>
            </td>
        </tr> 

        <center>



    </table>    
 
<table class="table table-bordered">

        
    @elseif($examCandidate->status === 'created')
    <tr>
        
    
        <td>
                <center>
        <h2>Please report to admin your attendance to take the exam</h2>
        <button class='btn btn-success btn-bg' onclick="location.href='/take_exam/{{$schedule->id}}'">Take Exam</button>
        
                  </center>
                </td>
       
</tr>

    @else     
    
    <tr>
        <td class="alert alert-danger">  
            <center>
            <h2>Status Exam : {{$examCandidate->status}}</h2>
            <button class='btn btn-primary' onclick="location.href='/examschedules/{{$payment->id}}'" ><b>RESIT EXAM</b> </button>
            </center>
              </td></tr>
    @endif
    
  
</table>
    
</div>
<br>


<div id="modalFinish" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">END EXAM SESSION</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to finish exam session</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">NO</button>
        <button type="button" class="btn btn-danger" onclick="endExamSession()" data-dismiss="modal">YES</button>
      </div>
    </div>

  </div>
</div>
@endsection
