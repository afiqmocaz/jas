<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsExamSetting;
use DB;
use App\IetsRelated;
use App\IetsOptions;
use App\IetsModul;
use App\IetsQuestion;
use stdClass;
use App\Http\Controllers\QuestionListController;
class IetsExamModulController extends Controller
{
     
 public function view($type){

     $examSetting = IetsExamSetting::all()->first();
        
        $eiaqCtrl = new IetsQuestionController();
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
    
        return view('ietsquizModul.quizModulList',compact('type','title','examQuestionNumber','reqQuestion','listDifficulty','examSetting'));
               
    }
    
     public function listQuestionView($id){
         
      $quizModule = IetsModul::all();
       $questionsBuilder = IetsQuestion::with("quizModule");
       $questionsBuilder->where('module','=',$id)->get();
       $questions =   $questionsBuilder->get();
     
       $eiarelates = IetsRelated::all();
    
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        return view('ietsquizModul.quizQuestionList', compact('correct_options','questions','eiarelates','quizModule'));
    }
    
    public function findById(Request $req){
        $builder = IetsModul::query();
        $builder->where('id','=', $req['id']);
        return $builder->first();
    }
    
    public function find(Request $req){
        $builder = IetsModul::query();
        
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
        
         $sl = new IetsModul();
              if(!empty($req->id)){
                 $sl =  IetsModul::find($req['id']);
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
        return  redirect('ietsquizModul/view/'.$req->type);
    }
    
    public function remove(Request $req){
        $data = IetsModul::find($req->id);
        $data->delete();
        
        $req->session()->flash('alert-success', 'Modul was successfully removed!');
        return  redirect('ietsquizModul/view');
      
    }
    
    public function saveQuestion(Request $req){
        return $req->all();
    }
    
    public function saveExamSetting(Request $req){
       
        
        IetsExamSetting::truncate();
        
        $examSetting = new IetsExamSetting();
        $examSetting->no_of_question = $req->no_of_question;
        $examSetting->easy_percentage = $req->easy_percentage;
        $examSetting->medium_percentage = $req->medium_percentage;
        $examSetting->hard_percentage = $req->hard_percentage;
        $examSetting->save();
        
        return redirect('ietsquizModul/view/exam');
    }
}
