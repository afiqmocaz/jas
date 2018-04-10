<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsSession;
use App\ExamIets;
use App\IetsModul;
use App\IetsOptions;
use stdClass;
use App\Http\Requests\StoreTestRequest;
use DB;
use Session;
use Auth;
class IetsTestsController extends Controller
{
    /**
     * Display a new test.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {


        $modulList = IetsModul::all();
        $questionList = ExamIets::with('quizOptions', function($q) {
                    $q->makeHidden(["correct"]);
                })->get();
                
        return $questionList;
        return view('tests.create', compact(
                                'selflearnings', 'module', 'title', 'rank', 'modulList'))->with('questionList', $questionList);
    }

    public function findQuestions(Request $req) {
        $builder = ExamIets::with('quizOptions');

        if (!empty($req['module'])) {
            $builder->where('module', '=', $req['module']);
        }
                
        $questionList = $builder->get();
       
        return $questionList;
      
    }
    
    public function findQuestionsExcludeAnswer(Request $req) {
        $currUser = Auth::user()->id;
        
        $questionList = array();
        if($req['type'] === 'quiz'){
            
            $builder = ExamIets::with(
            [
                'quizOptions',
                'quizModule.selfLearning'
            ]);

            if (!empty($req['module'])) {
                $builder->where('module', '=', $req['module']);
            }

            if (!empty($req['type'])) {
                $type = $req['type'];
                $builder->whereHas('quizModule', function($query){
                    $query->where('type','=','quiz');
                });
            }
            
            $questionList = $builder->orderBy("module")->orderBy("id")->get();
        }
        
        
        if($req['type'] === 'exam'){
            
            $qzB = IetsSession::query();
            $qzB->where('user_id', '=', $currUser)->first();
            $qzB->where('type', '=','exam');
            $qz = $qzB->first();
          
            if(empty($qz)){
                $eiaQctrl = new IetsQuestionController();
                $listLevel = $eiaQctrl->listDifficulty();
                
                $questionIds = array();
                foreach ($listLevel as $level) {
                    $questionListB = ExamIets::with('quizModule');
                    $questionListB->whereHas('quizModule', function($query) {
                        $query->where('type', '=', 'exam');
                    });
                    $questionListB->where('difficulty_level','=',$level->code);
                    $questionListTemp =  $questionListB->orderByRaw("RAND()")->take($level->noOfRequiredQuestion)->get();
                    foreach ($questionListTemp as $qTemp) {
                        //$questionList[] = $qTemp;
                        $questionIds[] = $qTemp->id;
                    }
                }
                
                $qn = new IetsSession();
                $qn->user_id = $currUser;
                //$qn->answer_data = json_encode(array());
                $qn->type = 'exam';
                $qn->question_data = json_encode($questionIds);
                
                $qn->save();
                
            }
            
           
            $qzB = IetsSession::query();
            $qzB->where('user_id', '=', $currUser)->first();
            $qzB->where('type', '=','exam');
            $qz = $qzB->first();
           
            foreach (json_decode($qz->question_data) as $questionId) {
                $questionData = ExamIets::with('quizModule')->find($questionId);
                $questionList[] = $questionData;
            }
            
        }else{
            
            
            
            $qzB = IetsSession::query();
            $qzB->where('user_id', '=', $currUser)->first();
            $qzB->where('type', '=', 'quiz');
            $qz = $qzB->first();
            if(empty($qz)){
                $qn = new IetsSession();
                $qn->user_id = $currUser;
                $qn->type = 'quiz';
                $qn->save();
            }
           
        }
        
        //hide answer from data
        foreach ($questionList as $key => $value) {
            foreach ($value->quizOptions as $key2 => $value2) {
                 unset($value->quizOptions[$key2]->correct);
            }
        }

        return $questionList;
      
    }
    
    
    
    function calculateAnswerResult(Request $req){
        
        $answerList = $req['userAnswer'];
        
        $countCorrectAnswer = 0;
        
            if(!empty($answerList)){
                 foreach ($answerList as $questionOptionId) {
                $obj = IetsOptions::find($questionOptionId);

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

    
//    public function storeQuizSession(Request $req) {
//        
//        $userId = Auth::user()->id;
//        
//        $qz = QuizSession::where('user_id','=',$userId);
//        $qz->delete();
//        
//        $qn = new QuizSession();
//        $qn->user_id = $userId;
//        $qn->answer_data = json_encode($req->all());
//        $qn->save();
//       
//        return json_encode(empty($qz));
//    }
//    
//    public function quizSession(Request $req){
//     $userId = Auth::user()->id;
//     $qz = QuizSession::where('user_id','=',$userId)->first();   
//     
//     if(!empty($qz)){
//         return json_encode(json_decode($qz->answer_data));
//     }
//     return json_encode($qz);
//    }
    
    public function checkAnswer(Request $req) {

        $currUser = Auth::user()->id;
        $qzB = IetsSession::query();
        $qzB->where('user_id', '=', $currUser)->first();
        $qzB->where('type', '=', $req['session']);
        $qz = $qzB->first();
        
        
        $questionAnswer = array();
        
        $qzr = new IetsSession();
        if(!empty($qz)){
            $qzr = IetsSession::find($qz->id);
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

        return IetsOptions::find($req['selectedAnswer'])->correct;
    }

}

}
