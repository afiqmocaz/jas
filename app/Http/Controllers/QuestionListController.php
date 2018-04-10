<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionList;
use App\EiaRelated;
use App\QuizOptions;;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Session;
use App\QuizModul;
use App\ExamSetting;
use stdClass;
use App\Http\Controllers\MasterLayoutController;
use App\Related;
use App\Specialized;
use App\apcsSectionB;use Auth;
class QuestionListController extends Controller
{
    
    public function index()
    {
       $quizModule = QuizModul::all();
       $questions = QuestionList::with("quizModule")->get();
       $options = QuizOptions::all();
       $eiarelates = EiaRelated::all();
    
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

        return view('eiaqs.show', compact('correct_options','questions','eiarelates','options','quizModule'));
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
        
        // return $request->all();
       
        $questions = QuestionList::create($request->all());
        //QuizOptions::create($request->all());

        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                QuizOptions::create([
                    'question_id' => $questions->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

         Session::flash('success', 'The question has been added!');

        return redirect() -> route(('eiaqs.show'),$questions->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($moduleId,Request $request)
    {
     
       
       $quizModule = QuizModul::all();
       $quiz =  QuizModul::find($moduleId);
       
       $master = (new MasterLayoutController)->getSec($quiz->category);
           
       $title = $quiz->name;
       $type = $quiz->type;
      
       $questionsBuilder = QuestionList::with(["quizModule",'quizOptions','correctOption','specialized','related']);
       $questionsBuilder->where('module', '=', $moduleId);
       
        if(!empty($request['Diff'])){
                $questionsBuilder->where('difficulty_level', '=', $request['Diff']);
        }
        if(!empty($request['Quest'])){
                $questionsBuilder->where('question', 'LIKE', '%'.$request['Quest'].'%');
        }

       $questions = $questionsBuilder->paginate(10);
       
       $related = Related::where('category','=',$quiz->category)->pluck('related', 'id');
       $specialized  = Specialized::all()->pluck('specialized', 'id');
       
       $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        //Mohamad Nadiy bin Md Nazir
        //nadiyxshinku89@gmail.com
        $difficulty_level = $this->listDifficulty($quiz->category);
        $category = $quiz->category;
       
        return view('quizModul.viewModulQuestionList', 
                compact(
                        'moduleId',
                        'category',
                        'title',
                        'correct_options',
                        'questions',
                        'related',
                        'quizModule',
                        'type',
                        'difficulty_level',
                        'specialized',
                        'master'
                        ))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
             $quiz =  QuizModul::all();
        $question = QuestionList::with("quizModule")->find($id);

        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        
        $related = Related::where('category','=',$question->quizModule->category)->pluck('related', 'id');
         $specialized  = Specialized::all()->pluck('specialized', 'id');
      
        $correct =QuizOptions::where('question_id','=',$id)->get();
        foreach ($correct as $key => $value) {
          if($value->correct===1){
            $dropdown=$key;
          }
        }
        // return $correct;
  $type = $question->quizModule->type; 
         
        $category =  $question->quizModule->category; 
        $difficulty_level = $this->listDifficulty( $question->quizModule->category);
      
        $master = (new MasterLayoutController)->getSec($question->quizModule->category);  
       
        return view('quizModul.editQuestion',
                compact('master','category','question','correct_options','related','correct','specialized','difficulty_level','type','dropdown'));
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
      
        $listOption = QuizOptions::where('question_id','=',$id)->get();
// return $listOption;
         $status = filter_var($request->input('correct'), FILTER_SANITIZE_NUMBER_INT)-1; ;
         // $str = 'In My Cart : 11 12 items';
         // return $status;
        foreach ($listOption as $key => $value) {
            if($key === 0){
                   QuizOptions::find($value->id)->update(['option' => $request->option1]);
                   if($key===$status){
                      QuizOptions::find($value->id)->update(['correct' => '1']);
                   }
                   else{
                    QuizOptions::find($value->id)->update(['correct' => '0']);
                   }
            }
            if($key === 1){
                   QuizOptions::find($value->id)->update(['option' => $request->option2]);
                      if($key===$status){
                      QuizOptions::find($value->id)->update(['correct' => '1']);
                   }
                   else{
                    QuizOptions::find($value->id)->update(['correct' => '0']);
                   }

            }
            if($key === 2){
                   QuizOptions::find($value->id)->update(['option' => $request->option3]);
                      if($key===$status){
                      QuizOptions::find($value->id)->update(['correct' => '1']);
                   }
                   else{
                    QuizOptions::find($value->id)->update(['correct' => '0']);
                   }

            }
            if($key === 3){
                   QuizOptions::find($value->id)->update(['option' => $request->option4]);
                      if($key===$status){
                      QuizOptions::find($value->id)->update(['correct' => '1']);
                   }
                   else{
                    QuizOptions::find($value->id)->update(['correct' => '0']);
                   }

            }
         
        }

        $questions = QuestionList::find($id);
                $questions->update($request->all());
        if ($request->hasFile('fileToUpload')){
           $questionX = QuestionList::with("quizModule")->find($id);
            $questionX->limg = $request->input('fileToUpload');
            //$apcsappd->supportdoc = $request->input('supportdoc');
            $file = $request->file('fileToUpload');
            $file2 = $file->getClientOriginalName();
            $filename = $file2;
             //save image as .png @ etc
            $questionX->original_filename = $filename; //save file to which column
            // $apcsappd->supportdoc = $filename;
            $request->file('fileToUpload')->move(base_path().'/public/uploads/',$filename);
            $questionX->save();
        }
        Session::flash('success', 'The question has been updated!');
       
        return  redirect('eiaqs/'.$questions->module);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        $question = QuestionList::findOrFail($id);
        
        $moduleId = $question->module;
        
        $question->delete();

      //  return redirect()->route('questions_quiz.index');*/
     //   $questions = QuestionList::find($id);

       // $questions->delete();

        Session::flash('success', 'The quiz has been deleted!');
        return redirect() -> route(('eiaqs.show'),$moduleId);
    }

    public function massDestroy(Request $request)
    {
        /*if ($request->input('ids')) {
            $entries = QuestionList::whereIn('id', $request->input('ids'))->get();

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
          $questions = QuestionList::create($request->all());
          $questions->mime = $file->getClientMimeType();
          $questions->original_filename = $filename;
          $questions->filename = $file->getFilename().'.'.$extension;
         
          $questions->save();
      
          foreach ($request->input() as $key => $value) {
                if(strpos($key, 'option') !== false && $value != '') {
                    $status = $request->input('correct') == $key ? 1 : 0;
                    
                    QuizOptions::create([
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

        $questions= QuestionList::create($request->all());

        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                QuizOptions::create([
                    'question_id' => $questions->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }

        Session::flash('success', 'The question has been successfully added!');
        }
      
   }
  
    return redirect() -> route(('eiaqs.show'),$request->module);
  
   }
   
   public function listDifficulty($category){
       
       $examSetting = ExamSetting::where('category','=',$category)->first();
       
       $listLevel = array();
       
       $level = new stdClass();
       $level->code = 'E';
       $level->name = 'Easy';
       $level->percentage = $examSetting->easy_percentage;
       $level->noOfQuestion = count($this->findExamQuestionByDifficultyLevel($category,$level->code));
       $level->noOfRequiredQuestion = floor((($level->percentage/100) * $examSetting->no_of_question));
       
       $listLevel[] = $level;
       
       $level = new stdClass();
       $level->code = 'M';
       $level->name = 'Medium';
       $level->percentage = $examSetting->medium_percentage;
       $level->noOfQuestion = count($this->findExamQuestionByDifficultyLevel($category,$level->code));
       $level->noOfRequiredQuestion = floor((($level->percentage/100) * $examSetting->no_of_question));
       
       $listLevel[] = $level;
       
       $level = new stdClass();
       $level->code = 'H';
       $level->name = 'Hard';
       $level->percentage = $examSetting->hard_percentage;
       $level->noOfQuestion = count($this->findExamQuestionByDifficultyLevel($category,$level->code));
       $level->noOfRequiredQuestion = floor((($level->percentage/100) * $examSetting->no_of_question));
       
       $listLevel[] = $level;
       
       return $listLevel;
   }
   
   public function findExamQuestionByDifficultyLevel($category,$level){
       $builderQuestion = QuestionList::with('quizModule');
       $builderQuestion->whereHas('quizModule', function($q) use ($category){
           $q->where('category','=',$category);
           $q->where('type','=','exam');
       });
       $builderQuestion->where('difficulty_level','=',$level);
       return $builderQuestion->get();
   }
}
