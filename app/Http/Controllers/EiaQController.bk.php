<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuizEia;
use App\EiaRelated;
use App\QuizOptions;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Session;

class EiaQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $questions = QuizEia::all();
       $options = QuizOptions::all();
       $eiarelates = EiaRelated::all();
    
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

        return view('eiaqs.show', compact('correct_options','questions','eiarelates','options'));
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
      

        $questions = QuizEia::create($request->all());
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
    public function show($id)
    {
       $questions = QuizEia::all();
       $options = QuizOptions::all();
       $eiarelates = EiaRelated::all();
       $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        return view('eiaqs.show', compact('correct_options','questions','eiarelates','options'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       /* $relations = [
            'topics' => \App\Topic::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $question = QuizEia::findOrFail($id);

        return view('questions_quiz.edit', compact('question') + $relations);*/

        /*$quiz = Quiz::find($id);
        $eiarelates = EiaRelated::all();
        $catrs = array();
        foreach ($eiarelates as $cat) {
            $catrs[$cat->id] = $cat->eiarelated;
        }
        $correct = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];
        //return the view and pass in the var we previously created
        return view('eiaquiz.edit')->withquiz($quiz)->witheiarelates($catrs)->withcorrect($correct);*/

        $question = QuizEia::find($id);
        

          $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        $eiarelates = EiaRelated::all();
        $catrs = array();
        foreach ($eiarelates as $cat) {
            $catrs[$cat->id] = $cat->eiarelated;
        }
         $correct = QuizOptions::find($id);
         
        return view('eiaqs.edit')->withquestion($question)->witheiarelates($catrs)->withcorrect($correct)->withcorrect_options($correct_options);
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
        $questions = QuizEia::findOrFail($id);
        $questions->update($request->all());
        Session::flash('success', 'The question has been updated!');
      return redirect() -> route(('eiaqs.index'));
        /*$question = QuizEia::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('questions_quiz.index');*/

       /* $questions = QuizEia::create($request->all());
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
        }*/
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = QuizEia::findOrFail($id);
        $question->delete();

      //  return redirect()->route('questions_quiz.index');*/
     //   $questions = QuizEia::find($id);

       // $questions->delete();

        Session::flash('success', 'The quiz has been deleted!');
        return redirect()->route('eiaqs.index');
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
        $questions = QuizEia::create($request->all());
          $questions->mime = $file->getClientMimeType();
          $questions->original_filename = $filename;
          $questions->filename = $file->getFilename().'.'.$extension;
          $questions->save();
      

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

        return redirect() -> route(('eiaqs.show'),$questions->id);
        }
      }
  }

        elseif (is_array($files) || is_object($files) == null)
        {

            $questions= QuizEia::create($request->all());

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

        Session::flash('success', 'The question has been successfully added!');
        }

      if($uploadcount == $file_count){
        Session::flash('success', 'The question has been successfully added!');
         return redirect()->route('eiaqs.index');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
         return redirect()->route('eiaqs.show')->withInput()->withErrors($validator);
      }
  }


}
}
