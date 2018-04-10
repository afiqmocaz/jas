<?php
//Mohamad Nadiy bin Md Nazir
//nadiyxshinku89@gmail.com

namespace App\Http\Controllers;


use DB;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\QuizModul;
use App\QuestionList;
use App\EiaRelated;
use App\QuizOptions;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\QuestionListController;
use App\ExamSetting;
use stdClass;
use App\Http\Controllers\MasterLayoutController;


class QuizModulController extends Controller
{
    
    public function view($type,$category){
            
        //Mohamad Nadiy bin Md Nazir
        //nadiyxshinku89@gmail.com
        
        //quizModul Type
        //1. EXAM
        //2. QUIZ
        //set question difficulty percentage in QuestionListController->listDifficulty()
        //set number of exam question in QuestionListController->numofexamquestion()
        
        //Category
        //1. eia
        //2. iets
        //3. apcs
        
        $examSetting = ExamSetting::where('category','=',$category)->first();
        
        $eiaqCtrl = new QuestionListController();
        $examQuestionNumber = $examSetting->no_of_question;
        $listDifficulty = $eiaqCtrl->listDifficulty($category);
        
        $title = null;
        if($type === 'exam'){
           $title = 'Exam Modul';
        }else if($type === 'quiz'){
            $title = 'Quiz Modul';
        }else{
            return null;
        } 
        
        $masterCtrl = new MasterLayoutController();
        $master = $masterCtrl->getSec($category);
        return view('quizModul.quizModulList',compact('master','type','category','title','examQuestionNumber','reqQuestion','listDifficulty','examSetting'));
               
    }
    
     public function listQuestionView($id){
         
       $quizModule = QuizModul::all();
       $questionsBuilder = QuestionList::with("quizModule");
       $questionsBuilder->where('module','=',$id)->get();
       $questions =   $questionsBuilder->get();
     
       $eiarelates = EiaRelated::all();
    
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        return view('quizModul.quizQuestionList', compact('correct_options','questions','eiarelates','quizModule'));
    }
    
    public function listQuestionView2($id){
         
       $quizModule = QuizModul::all();
       $questionsBuilder = QuestionList::with("quizModule");
       $questionsBuilder->where('module','=',$id)->get();
       $questions =   $questionsBuilder->get();
     
       $eiarelates = EiaRelated::all();
    
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        return view('quizModul.quizQuestionList', compact('correct_options','questions','eiarelates','quizModule'));
    }
    
    public function findById(Request $req){
        $builder = QuizModul::query();
        $builder->where('id','=', $req['id']);
        return $builder->first();
    }
    
    public function find(Request $req){
        $builder = QuizModul::with('questionList');
        
        if(!empty($req['id'])){
            $builder->where('id','=', $req['id']);
        }
        
        if(!empty($req['name'])){
            $builder->where('name','LIKE', '%'.$req['id'].'%');
        }
        
        if(!empty($req['category'])){
            $builder->where('category','=', $req['category']);
        }
        
        if(!empty($req['type'])){
            $builder->where('type','=', $req['type']);
        }
        
        $res = new \stdClass();
        $res->data = $builder->get();
        return json_encode($res);
    }
    
    public function save(Request $req){
        
        $this->validate($req, [
        'name' => 'required',
        ]);
        
        $returnMsg = 'Modul was successful added!';
        
         $sl = new QuizModul();
              if(!empty($req->id)){
                 $sl =  QuizModul::find($req['id']);
              }
              $sl->name = $req->name;
              $sl->type = $req->type;
              $sl->category =  $req->category;
             
              if(!empty($req->id)){
                  $returnMsg = 'Modul was successfully edited!';
                 $sl->update();
              }else{
                 $sl->save();
              }
     
        $req->session()->flash('alert-success', $returnMsg);
        return  redirect('quizModul/view/'.$req->type.'/'.$req->category);
    }
    
    public function remove(Request $req){
        $data = QuizModul::find($req->id);
        
        $category = $data->category;
        $type = $data->type;
        
        $data->delete();
        
        $req->session()->flash('alert-success', 'Modul was successfully removed!');
        return  redirect('quizModul/view/'.$type.'/'.$category);
      
    }
    
    public function saveQuestion(Request $req){
        return $req->all();
    }
    
    public function saveExamSetting(Request $req){
      
        
        $examSetting = ExamSetting::where('category','=',$req->category)->first();
        $examSetting->no_of_question = $req->no_of_question;
        $examSetting->easy_percentage = $req->easy_percentage;
        $examSetting->medium_percentage = $req->medium_percentage;
        $examSetting->hard_percentage = $req->hard_percentage;
        $examSetting->save();
        
        return redirect('quizModul/view/exam/'.$req->category);
    }
    
    
}
