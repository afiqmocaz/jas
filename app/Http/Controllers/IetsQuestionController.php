<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ExamIets;
use App\IetsRelated;
use App\IetsOptions;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\IetsExamSetting;
use stdClass;
use App\IetsModul;


class IetsQuestionController extends Controller
{
    public function index()
    {
       $quizModule = IetsModul::all();
       $questions = ExamIets::with("quizModule")->get();
      // $options = IetsOptions::all();
       $ietsrelates = IetsRelated::all();
    
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

        return view('ietsquestion.show', compact('correct_options','questions','ietsrelates','options','quizModule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsRequest $request)
    {
        return "back to...";

        $questions = ExamIets::create($request->all());
        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                IetsOptions::create([
                    'question_id' => $questions->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

         Session::flash('success', 'The question has been added!');

        return redirect() -> route(('ietsquestion.show'),$questions->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($moduleId)
    {
      
         $quizModule = IetsModul::all();
      $quiz =  IetsModul::find($moduleId);
      $title = $quiz->name;
      $type = $quiz->type;

       $questionsBuilder = ExamIets::with(["quizModule",'quizOptions','correctOption']);
       $questionsBuilder->where('module', '=', $moduleId);
       $questions = $questionsBuilder->get();

      //  $specializes = Specialized::all();
        $ietsrelates = IetsRelated::all();
        //$options = ApcsOption::all();
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

          $difficulty_level = $this->listDifficulty();

        return view('ietsquestion.viewModulQuestionList', compact('moduleId','questions', '', 'ietsrelates', 'quizModule', 'correct_options','options','difficulty_level','type','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $question = ExamIets::find($id);
        $quizModule = IetsModul::all();

          $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        $ietsrelates = IetsRelated::all();
        $catrs = array();
        foreach ($ietsrelates as $cat) {
            $catrs[$cat->id] = $cat->ietsrelated;
        }
         $correct = IetsOptions::find($id);
         
         
         
        return view('ietsquestion.edit')->with(['quizModule'=>$quizModule])->withquestion($question)->withietsrelates($catrs)->withcorrect($correct)->withcorrect_options($correct_options);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $listOption = IetsOptions::where('question_id','=',$id)->get();
        foreach ($listOption as $key => $value) {
            if($key === 0){
                   IetsOptions::find($value->id)->update(['option' => $request->option1]);
            }
            if($key === 1){
                   IetsOptions::find($value->id)->update(['option' => $request->option2]);
            }
            if($key === 2){
                   IetsOptions::find($value->id)->update(['option' => $request->option3]);
            }
            if($key === 3){
                   IetsOptions::find($value->id)->update(['option' => $request->option4]);
            }
         
        }
        $questions = ExamIets::findOrFail($id);
        $questions->update($request->all());
        Session::flash('success', 'The question has been updated!');
       
        return  redirect('ietsquestion/'.$questions->module);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        $question = ExamIets::findOrFail($id);
        
        $moduleId = $question->module;
        
        $question->delete();

      //  return redirect()->route('questions_quiz.index');*/
     //   $questions = QuizEia::find($id);

       // $questions->delete();

        Session::flash('success', 'The quiz has been deleted!');
        return redirect() -> route(('ietsquestion.show'),$moduleId);
    }

    public function massDestroy(Request $request)
    {
        /*if ($request->input('ids')) {
            $entries = QuizEia::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }*/
    }

    public function multiple_upload(Request $request) {
        
       
      // getting all of the post data
      $files = Input::file('fileToUpload');
      // Making counting of uploaded images
      $file_count = count($files);
      // start count how many uploaded
      $uploadcount = 0;
      if (is_array($files) || is_object($files))
        {
      foreach ($files as $file) {
        $rules = array('photo' => 'mimes:jpeg,bmp,png|max:10240'); //'required|mimes:pdf'
        $validator = Validator::make(array('file'=> $file), $rules);
        if($validator->passes()){
          $destinationPath = 'uploads'; // upload folder in public directory
          $filename = $file->getClientOriginalName();
          $upload_success = $file->move($destinationPath, $filename);
          $uploadcount ++;

          // save into database
          $extension = $file->getClientOriginalExtension();
          //$entry = new ExamEia();
          $questions = ExamIets::create($request->all());
          $questions->mime = $file->getClientMimeType();
          $questions->original_filename = $filename;
          $questions->filename = $file->getFilename().'.'.$extension;
         
          $questions->save();
      

        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                IetsOptions::create([
                    'question_id' => $questions->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        }
      }
  }

   elseif (is_array($files) || is_object($files) == null)
   {

        $questions= ExamIets::create($request->all());

        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                IetsOptions::create([
                    'question_id' => $questions->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }

        Session::flash('success', 'The question has been successfully added!');
        }
      
  }
  
    return redirect() -> route(('ietsquestion.show'),$request->module);
  
   }
   
   public function listDifficulty(){
       
       $examSetting = IetsExamSetting::all()->first();
       
       $listLevel = array();
       
       $level = new stdClass();
       $level->code = 'E';
       $level->name = 'Easy';
       $level->percentage = $examSetting->easy_percentage;
       $level->noOfQuestion = count($this->findExamQuestionByDifficultyLevel($level->code));
       $level->noOfRequiredQuestion = floor((($level->percentage/100) * $examSetting->no_of_question));
       
       $listLevel[] = $level;
       
       $level = new stdClass();
       $level->code = 'M';
       $level->name = 'Medium';
       $level->percentage = $examSetting->medium_percentage;
       $level->noOfQuestion = count($this->findExamQuestionByDifficultyLevel($level->code));
       $level->noOfRequiredQuestion = floor((($level->percentage/100) * $examSetting->no_of_question));
       
       $listLevel[] = $level;
       
       $level = new stdClass();
       $level->code = 'H';
       $level->name = 'Hard';
       $level->percentage = $examSetting->hard_percentage;
       $level->noOfQuestion = count($this->findExamQuestionByDifficultyLevel($level->code));
       $level->noOfRequiredQuestion = floor((($level->percentage/100) * $examSetting->no_of_question));
       
       $listLevel[] = $level;
       
       return $listLevel;
   }
   
   public function findExamQuestionByDifficultyLevel($level){
       $builderQuestion = ExamIets::with('quizModule');
       $builderQuestion->whereHas('quizModule', function($q){
           $q->where('type','=','exam');
       });
       $builderQuestion->where('difficulty_level','=',$level);
       return $builderQuestion->get();
   }
}
