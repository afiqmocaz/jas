<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Auth;
use App\Test;
use App\TestAnswer;
use App\Topic;
use App\SelfLearning;
use App\QuestionList;
use App\QuizOptions;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestRequest;
use App\QuizModul;
use stdClass;
use App\QuizSession;
use App\Schedule;
use App\ExamCandidate;
use Carbon\Carbon;
use DateTime;
use App\ExamSetting;
use App\User;
use App\apcsSectionB;

class TestsController extends Controller {

    /**
     * Display a new test.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {


        $modulList = QuizModul::all();
        $questionList = QuestionList::with('quizOptions', function($q) {
                    $q->makeHidden(["correct"]);
                })->get();
                
        return $questionList;
        return view('tests.create', compact(
                                'selflearnings', 'module', 'title', 'rank', 'modulList'))->with('questionList', $questionList);
    }

    public function findQuestions(Request $req) {
        $builder = QuestionList::with('quizOptions');

        if (!empty($req['module'])) {
            $builder->where('module', '=', $req['module']);
        }
                
        $questionList = $builder->get();
       
        return $questionList;
      
    }
    
    public function findQuizQuestion(Request $req) {

        $builder = QuestionList::with(
                        [
                            'quizOptions',
                            'quizModule.selfLearning'
        ]);

        $builder->whereHas('quizModule', function($q) {
            $q->where('type', '=', 'quiz');
        });

        $questionList = $builder->orderBy("module")->orderBy("id")->get();

        return $questionList;
    }

    public function generateExamQuestion(Request $req) {
     
        $schedule = Schedule::find($req['scheduleId']);
        $scheduleCat=$schedule->category;   
        $currUser = Auth::user()->id;
        
        $questionList = array();
        
        $questionIds = array();
        $correctAnswer = array();
        
        $qzB = QuizSession::query();
        $qzB->where('user_id', '=', $currUser)->first();
        $qzB->where('type', '=', 'exam');
        $qzB->where('exam_schedule', '=', $schedule->id);
        $qz = $qzB->first();

        $test = array();
           $apcsSectionB=apcsSectionB::where('user_id',Auth::user()->id)->first();
              $test=array();
              $test[]=$apcsSectionB->specialize_0;
              $test[]=$apcsSectionB->specialize_1;
              $test[]=$apcsSectionB->specialize_2;
              $test[]=$apcsSectionB->specialize_3;
        if (empty($qz)) {
            $eiaQctrl = new QuestionListController();
            $listLevel = $eiaQctrl->listDifficulty($schedule->category);

            foreach ($listLevel as $level) {
                $questionListB = QuestionList::with('quizModule', 'correctOption','specialized');
                $questionListB->whereHas('quizModule', function($query) {
                    $query->where('type', '=', 'exam');
                });
                  $questionListB->whereHas('quizModule', function($query) use($scheduleCat) {
                    $query->where('category', '=',$scheduleCat );
                });
                  if($scheduleCat==="apcs"){
                      $questionListB->whereHas('specialized', function($query) use($test) {
                    $query->whereIn('specialized',  $test);
                });
                  }
                $questionListB->whereHas('quizOptions', function($query) {
                    $query->where('correct', '=', 1);
                });
                
                $questionListB->where('difficulty_level', '=', $level->code);
                $questionListTemp = $questionListB->orderByRaw("RAND()")->take($level->noOfRequiredQuestion)->get();
                foreach ($questionListTemp as $qTemp) {
                    //$questionList[] = $qTemp;
                    
                    	            if(count($qTemp->correctOption) > 0){
                                        $questionIds[] = $qTemp->id;
                                        $correctAnswer[] = $qTemp->correctOption[0]->id;
                                    }	
                   
                }
                
                $testing[] = $level->noOfRequiredQuestion;
            }
            
           

            $qn = new QuizSession();
            $qn->user_id = $currUser;
            //$qn->answer_data = json_encode(array());
            $qn->type = 'exam';
            $qn->category = $schedule->category;
            $qn->exam_schedule = $schedule->id;
            $qn->question_data = json_encode($questionIds);
            $qn->correct_answer = json_encode($correctAnswer);

            $qn->save();
        }


        $qzB = QuizSession::query();
        $qzB->where('user_id', '=', $currUser)->first();
        $qzB->where('type', '=', 'exam');
        $qzB->where('exam_schedule', '=', $req['scheduleId']);
        $qz = $qzB->first();

        foreach (json_decode($qz->question_data) as $questionId) {
            $questionData = QuestionList::with('quizModule','correctOption','specialized')->find($questionId);
            $questionList[] = $questionData;
        }
        
        //hide answer from data
        foreach ($questionList as $key => $value) {
            foreach ($value->quizOptions as $key2 => $value2) {
                unset($value->quizOptions[$key2]->correct);
            }
        }
        
        $data = new stdClass();
        $data->answer_data = json_decode($qz->answer_data);
        $data->questionList = $questionList;

        return json_encode($data);
    }
    
    
    function calculateAnswerResult(Request $req){
        
        $answerList = $req['userAnswer'];
        
        $countCorrectAnswer = 0;
          $examSetting = ExamSetting::where('category','=',$category)->first();
            if(!empty($answerList)){
                 foreach ($answerList as $questionOptionId) {
                $obj = QuizOptions::find($questionOptionId);

                $countCorrectAnswer = $countCorrectAnswer + $obj->correct;
            }
        
            $percentage = ($countCorrectAnswer / count($answerList)) * 100;

            $result = new \stdClass();
            $result->status = '00'; 
            $result->correct = $countCorrectAnswer;
            $result->totalQuestion = count($answerList);
            $result->percentage = number_format((float)$percentage, 2, '.', ''); ;
            return json_encode($result);
        }else{
            $result = new \stdClass();
            $result->status = '01'; 
            $result->remark = 'No Question/User answer'; 
            return json_encode($result);
        }
       
    }
    
    function updateExamCandidateStatus(Request $req){
            $ob = ExamCandidate::find($req->examCandidateId);
       $schedule = Schedule::find($req['scheduleId']);
            $mark = $this->calculateExamScore(Auth::user()->id, $ob->schedule_id,$schedule->category);
           
            $status = 'failed';
            if((int)$mark >= 70){
                $status = 'passed';
            }
           
            $ob->status = $status;
            $ob->mark = $mark;
            $ob->update();
            return $mark;
       
       
        
    }
    
    function calculateExamScore($userId,$scheduleId,$category){
        
      
        //check if already take exam
        $qzB = QuizSession::query();
        $qzB->where('user_id', '=', $userId);
        $qzB->where('type', '=', 'exam');
        $qzB->where('exam_schedule', '=', $scheduleId);
       $examSetting = ExamSetting::where('category','=',$category)->first();
        $qz = $qzB->first();
        
        $answerList = json_decode($qz->answer_data);
        $correctAnswerLists = json_decode($qz->correct_answer);
        
        $answerIndex = 0;
        $totalCorrectAnswer = 0;
        if(!empty($answerList))
            
        foreach($answerList as $answer){
            if((int)$answer ===$correctAnswerLists[$answerIndex]){
                $totalCorrectAnswer++;
            }
            
            $answerIndex++;
        }
        else{
            return number_format(0,2);
        }
        
        // $totalScore = ($totalCorrectAnswer/count($answerList))*100;
         $totalScore = ($totalCorrectAnswer/$examSetting->no_of_question)*100;
       
        return number_format($totalScore,2);
    }
    
   
    
      function updateExamSession(Request $req){
          
        $qzB = QuizSession::query();
        $qzB->where('user_id', '=', Auth::user()->id);
        $qzB->where('type', '=', $req['type']);
        $qzB->where('exam_schedule', '=', $req['scheduleId']);
       
        $qz = $qzB->first();

        $qz->answer_data = json_encode($req['answer_data']);
        $qz->update();
        
        return $qz;
    }
    
    function updateQuizSession(Request $req){
          
        $qzB = QuizSession::query();
        $qzB->where('user_id', '=', Auth::user()->id);
        $qzB->where('type', '=', $req['type']);
        $qzB->where('category', '=', $req['category']);
    
        
        $qz = $qzB->first();
        $qz->answer_data = json_encode($req['answer_data']);
        $qz->question_data = json_encode($req['question_data']);
        if(!empty($req['mark'])){
                
                $qz->status=$req['mark'];
        }
        $qz->update();
        
        return $qz;
    }

    public function checkAnswer(Request $req) {

        $currUser = Auth::user()->id;
        $qzB = QuizSession::query();
        $qzB->where('user_id', '=', $currUser)->first();
        $qzB->where('type', '=', $req['session']);
        $qz = $qzB->first();
        
        
        $questionAnswer = array();
        
        $qzr = new QuizSession();
        if(!empty($qz)){
            $qzr = QuizSession::find($qz->id);
            if(!empty($qzr->answer_data)){
                $questionAnswer = json_decode($qzr->answer_data);
            }
            
        }
       
        $qzr->type = $req['session'];
        
        if ($req['session'] === 'quiz') {
            if((int) $req['firstAnswer'] === 1){
                $questionAnswer[] = $req['selectedAnswer'];
            }
        }else{
            $questionAnswer[] = $req['selectedAnswer'];
        }
        
        $qzr->answer_data = json_encode($questionAnswer);
        
        if(!empty($qz)){
            $qzr->update();
        }else{
            $qzr->save();
        }
        
       
        
//        $question_data = null;
//        
//        $questionAnswer = array();
//        if (!empty($qz)) {
//            $questionAnswer = json_decode($qz->answer_data);
//            $question_data = $qz->question_data;
//            $qz->delete();
//        }
//
//        if ((int) $req['firstAnswer'] === 1) {
//            $questionAnswer[] = $req['selectedAnswer'];
//        }
//
//        $qn = new QuizSession();
//        $qn->user_id = $currUser;
//        $qn->answer_data = json_encode($questionAnswer);
//        $qn->type = $req['session'];
//        
//        if($req['session'] === 'exam'){
//            $qn->question_data = $question_data;
//        }
//
//        $qn->save();

        return QuizOptions::find($req['selectedAnswer'])->correct;
    }
    
  public function getTime()
    {
         $time=new DateTime();
         return $time;
    }
    public function summary($scheduleId,$user_id,Request $req)
  {
              $qzB = QuizSession::query();
        $qzB->where('user_id', '=', $user_id)->first();
        $qzB->where('type', '=', 'exam');
        $qzB->where('exam_schedule', '=', $scheduleId);
        $qz = $qzB->first();
    if(!empty($qz)){
              $answerList = json_decode($qz->answer_data);
        $correctAnswerLists = json_decode($qz->correct_answer);
        
        $answerIndex = 0;
        $totalCorrectAnswer = 0;
        if(!empty($answerList))
            
        foreach($answerList as $answer){
            if((int)$answer ===$correctAnswerLists[$answerIndex]){
                $totalCorrectAnswer++;
            }
            
            $answerIndex++;
        }
        else{
            return number_format(0,2);
        }
         foreach (json_decode($qz->question_data) as $key =>$questionId) {
            $questionData = QuestionList::with('quizModule','correctOption')->find($questionId);
            $questionData->quiz_module = json_decode( $questionData->quiz_module, true);
                $questionData->correct = new stdClass;
            if($key<$answerIndex){
            if((int)$answerList[$key]===$questionData->correctOption[0]->id){
            $questionData->correct = "true";
        }    else{
          
        }
    }
            $questionList[] = $questionData;
        

        }
       
        $difficulty_level = (new QuestionListController())->listDifficulty($qz->category);
    }
       else{
        return 'blocked';
       }
       
 $category=$qz->category;
$master = (new MasterLayoutController())->getSec($qz->category);
              return view('tests.summary', compact('','questionList','master','difficulty_level','category','scheduleId'));
  }
  public function findSummary(Request $req)
  {
    $qzB = QuizSession::query();
        $qzB->where('user_id', '=', $req['user_id'])->first();
        $qzB->where('type', '=', 'exam');
        $qzB->where('exam_schedule', '=', $req['scheduleId']);
        $qz = $qzB->first();
    if(!empty($qz)){
              $answerList = json_decode($qz->answer_data);
        $correctAnswerLists = json_decode($qz->correct_answer);
        
        $answerIndex = 0;
        $totalCorrectAnswer = 0;
        if(!empty($answerList))
            
        foreach($answerList as $answer){
            if((int)$answer ===$correctAnswerLists[$answerIndex]){
                $totalCorrectAnswer++;
            }
            
            $answerIndex++;
        }
        else{
            return number_format(0,2);
        }
         foreach (json_decode($qz->question_data) as $key =>$questionId) {
            $questionData = QuestionList::with('quizModule','correctOption')->find($questionId);
            $questionData->quiz_module = json_decode( $questionData->quiz_module, true);
                $questionData->correct = new stdClass;
            if($key<$answerIndex){
            if((int)$answerList[$key]===$questionData->correctOption[0]->id){
            $questionData->correct = "true";
        }    else{
          
        }
    }
            $questionList[] = $questionData;
        

        }
          $res = new \stdClass();
        $res->data = $questionList;
        return json_encode($res);
        $difficulty_level = (new QuestionListController())->listDifficulty($qz->category);
    }
       // else{
       //  return 'blocked';
       // }
  
  }
  public function UserQuiz()
  { 
    $master = (new MasterLayoutController())->getSec('eia');
    $category='eia';
      return view('tests.quizCandidate', compact('category','master'));

  }
  public function findUserQuiz()
  {
       $qzB = QuizSession::with('user');
        $qzB->where('type', '=', 'quiz');
        $qzB->whereNotNull('status');
     $res = new \stdClass();
        $res->data = $qzB->get();
        return json_encode($res);

  }
  public function quizSummary($user_id)
  {
      $qzB = QuizSession::query();
        $qzB->where('user_id', '=', $user_id)->first();
        $qzB->where('type', '=', 'quiz');
        $qz = $qzB->first();
        // return $qz;
    if(!empty($qz)){
              $answerList = json_decode($qz->answer_data);
        $correctAnswerLists = json_decode($qz->correct_answer);
        
        $answerIndex = 0;
        $totalCorrectAnswer = 0;
        if(!empty($answerList))
            
        foreach($answerList as $answer){
            if((int)$answer ===1){
                $totalCorrectAnswer++;
            }
            
            $answerIndex++;
        }
        else{
            return number_format(0,2);
        }
         foreach (json_decode($qz->question_data) as $key => $questionId) {
            $questionData = QuestionList::with('quizModule','correctOption')->find($questionId);
            $questionData->quiz_module = json_decode( $questionData->quiz_module, true);
            $questionData->correct = new stdClass;
            if((int)$answerList[$key]===1)
            {
                $questionData->correct="true";
            }
            else
            {

            }
       
            $questionList[] = $questionData;
        

        }
      
        $difficulty_level = (new QuestionListController())->listDifficulty($qz->category);
    }
       else{
        return 'blocked';
       }
       
 $category=$qz->category;
$master = (new MasterLayoutController())->getSec($qz->category);
              return view('tests.quizSummary', compact('','questionList','master','difficulty_level','category'));
  }
}
