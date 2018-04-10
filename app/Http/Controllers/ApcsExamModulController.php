<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApcsModul;
use App\ApcsExamSetting;
use App\Question;
use App\Related;
use App\Specialized;
use App\ApcsOption;

class ApcsExamModulController extends Controller
{
   

 public function view($type){

    $examSetting = ApcsExamSetting::all()->first();
        
        $eiaqCtrl = new QuestionController();
        $examQuestionNumber = $examSetting->no_of_question;
        $listDifficulty = $eiaqCtrl->listDifficulty();
        
        $title = null;
        if($type === 'exam'){
           $title = 'Exam Modul';
        }else if($type === 'quiz'){
            $title = 'Quiz Modul';
        }else{
            return null;
        } 
    
        return view('apcsquizModul.quizModulList',compact('type','title','examQuestionNumber','reqQuestion','listDifficulty','examSetting'));
               
    }
    
     public function listQuestionView($id){
         
       $quizModule = ApcsModul::all();
       $questionsBuilder = Question::with("quizModule");
       $questionsBuilder->where('module','=',$id)->get();
       $questions =   $questionsBuilder->get();
     
       $relates = Related::all();
       $specializes = Specialized::all();

        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        return view('quizModul.quizQuestionList', compact('correct_options','questions','relates','quizModule','specializes'));
    }
    
    public function findById(Request $req){
        $builder = ApcsModul::query();
        $builder->where('id','=', $req['id']);
        return $builder->first();
    }
    
    public function find(Request $req){
        $builder = ApcsModul::query();
        
        if(!empty($req['id'])){
            $builder->where('id','=', $req['id']);
        }
        
        if(!empty($req['name'])){
            $builder->where('name','LIKE', '%'.$req['id'].'%');
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
        
         $sl = new ApcsModul();
              if(!empty($req->id)){
                 $sl =  ApcsModul::find($req['id']);
              }
              $sl->name = $req->name;
              $sl->type = $req->type;
             
              if(!empty($req->id)){
                  $returnMsg = 'Modul was successfully edited!';
                 $sl->update();
              }else{
                 $sl->save();
              }
     
        $req->session()->flash('alert-success', $returnMsg);
        return  redirect('apcsquizModul/view/'.$req->type);
    }
    
    public function remove(Request $req){
        $data = ApcsModul::find($req->id);
        $data->delete();
        
        $req->session()->flash('alert-success', 'Modul was successfully removed!');
        return  redirect('apcsquizModul/view');
      
    }
    
    public function saveQuestion(Request $req){
        return $req->all();
    }
    
    public function saveExamSetting(Request $req){
       
        
        ApcsExamSetting::truncate();
        
        $examSetting = new ApcsExamSetting();
        $examSetting->no_of_question = $req->no_of_question;
        $examSetting->easy_percentage = $req->easy_percentage;
        $examSetting->medium_percentage = $req->medium_percentage;
        $examSetting->hard_percentage = $req->hard_percentage;
        $examSetting->save();
        
        return redirect('quizModul/view/exam/apcs');
    }
    
    
}
