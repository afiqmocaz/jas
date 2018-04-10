<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Question;
use App\Specialized;
use App\Related;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use App\ApcsOption;
use App\ApcsModul;
use stdClass;
use App\ApcsExamSetting;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizModule=ApcsModul::all();
        $question = Question::all();
        $specializes = Specialized::all();
        $relates = Related::all();
       $options = ApcsOption::all();
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

        return view('apcsquestion.show', compact('question', 'specializes', 'relates', 'correct_options','options','quizModule'));
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
    public function store(Request $request)
    {
        $question = Question::create($request->all());
        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                ApcsOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        Session::flash('success', 'The question has been added!');

        return redirect() -> route(('apcsquestion.show'),$question->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($moduleId)
    {

      $quizModule = ApcsModul::all();
      $quiz =  ApcsModul::find($moduleId);

      $title = $quiz->name;
      $type = $quiz->type;

       $questionsBuilder = Question::with(["quizModule",'quizOptions','correctOption']);
       $questionsBuilder->where('module', '=', $moduleId);
       $questions = $questionsBuilder->get();

        $specializes = Specialized::all();
        $relates = Related::all();
        //$options = ApcsOption::all();
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

          $difficulty_level = $this->listDifficulty();

        return view('apcsquestion.viewModulQuestionList', compact('moduleId','questions', 'specializes',  'quizModule','relates', 'correct_options','options','difficulty_level','type','title'));
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
        $question = Question::create($request->all());
          $question->mime = $file->getClientMimeType();
          $question->original_filename = $filename;
          $question->filename = $file->getFilename().'.'.$extension;
          $question->save();
      

        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                ApcsOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        return redirect() -> route(('apcsquestion.show'),$question->id);
        }
      }
  }

        elseif (is_array($files) || is_object($files) == null)
        {

            $question= Question::create($request->all());

        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                ApcsOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }

        Session::flash('success', 'The question has been successfully added!');
        }

      if($uploadcount == $file_count){
        Session::flash('success', 'The question has been successfully added!');
         return redirect()->route('apcsquestion.index');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
         return redirect()->route('apcsquestion.show')->withInput()->withErrors($validator);
      }
  }

    }

    public function edit($id)
    {
        // find the post in the database and save as a var
        $question = Question::find($id);
        $specializes = Specialized::all();
        $cats = array();
        foreach ($specializes as $cat) {
            $cats[$cat->id] = $cat->specialized;
        }
        $relates = Related::all();
        $catrs = array();
        foreach ($relates as $cat) {
            $catrs[$cat->id] = $cat->related;
        }
        $correct = ApcsOption::find($id);
        $quizModule = ApcsModul::all();
        $correct_options = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];
        //return the view and pass in the var we previously created
        return view('apcsquestion.edit')->with(['quizModule'=>$quizModule])->withquestion($question)->withspecializes($cats)->withrelates($catrs)->withcorrect($correct)->withcorrect_options($correct_options);
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
         $listOption = ApcsOption::where('question_id','=',$id)->get();
        foreach ($listOption as $key => $value) {
            if($key === 0){
                   ApcsOption::find($value->id)->update(['option' => $request->option1]);
            }
            if($key === 1){
                   ApcsOption::find($value->id)->update(['option' => $request->option2]);
            }
            if($key === 2){
                   ApcsOption::find($value->id)->update(['option' => $request->option3]);
            }
            if($key === 3){
                   ApcsOption::find($value->id)->update(['option' => $request->option4]);
            }
         
        }




        $questions = Question::findOrFail($id);
        $questions->update($request->all());
      ;
        Session::flash('success', 'The question has been updated!');

       // return redirect() -> route(('apcsquestion.index'));
        return redirect('apcsquestion/'.$questions->module);


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        
        $moduleId = $question->module;
        
        $question->delete();

      //  return redirect()->route('questions_quiz.index');*/
     //   $questions = QuestionList::find($id);

       // $questions->delete();

        Session::flash('success', 'The quiz has been deleted!');
        return redirect() -> route(('apcsquestion.show'),$moduleId);
    }


    public function listDifficulty(){
       
       $examSetting = ApcsExamSetting::all()->first();
       
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
       $builderQuestion = Question::with('quizModule');
       $builderQuestion->whereHas('quizModule', function($q){
           $q->where('type','=','exam');
       });
       $builderQuestion->where('difficulty_level','=',$level);
       return $builderQuestion->get();
   }

   
}
