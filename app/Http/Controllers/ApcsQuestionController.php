<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApcsQuestion;
use App\ApcsOption;
use App\Related;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;

class ApcsQuestionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ietsquestion = ApcsQuestion::all();
        $ietsrelates = Related::all();
        $options = ApcsOption::all();
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        return view('ietsquestion.show', compact('ietsquestion', 'ietsrelates', 'correct_options','options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ietsquestion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $ietsquestion = ApcsQuestion::create($request->all());
        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                ApcsOption::create([
                    'question_id' => $ietsquestion->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        Session::flash('success', 'The question has been added!');

        return redirect() -> route(('apcsquestion.show'),$ietsquestion->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $ietsquestion = ApcsQuestion::all();
        $ietsrelates = Related::all();
        $options = ApcsOption::all();
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        return view('apcsquestion.show', compact('ietsquestion', 'ietsrelates', 'correct_options','options'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = ApcsQuestion::find($id);
        

          $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
        $ietsrelates = Related::all();
        $catrs = array();
        foreach ($ietsrelates as $cat) {
            $catrs[$cat->id] = $cat->ietsrelated;
        }
         $correct = ApcsOption::find($id);
         
        return view('apcsquestion.edit')->withquestion($question)->witheiarelates($catrs)->withcorrect($correct)->withcorrect_options($correct_options);
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
        $questions = ApcsQuestion::findOrFail($id);
        $questions->update($request->all());
      ;
        Session::flash('success', 'The question has been updated!');

        return redirect() -> route(('apcsquestion.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        //
        $ietsquestion = ApcsQuestion::find($id);

        $ietsquestion->delete();

        Session::flash('success', 'The question has been deleted!');
        return redirect()->route('ietsquestion.index');
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
        $ietsquestion = ApcsQuestion::create($request->all());
          $ietsquestion->mime = $file->getClientMimeType();
          $ietsquestion->original_filename = $filename;
          $ietsquestion->filename = $file->getFilename().'.'.$extension;
          $ietsquestion->save();
      

        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                ApcsQuestion::create([
                    'question_id' => $ietsquestion->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        return redirect() -> route(('apcsquestion.show'),$ietsquestion->id);
        }
      }
  }

        elseif (is_array($files) || is_object($files) == null)
        {

            $ietsquestion= ApcsQuestion::create($request->all());

        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                ::create([
                    'question_id' => $ietsquestion->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }

        Session::flash('success', 'The question has been successfully added!');
        }

      if($uploadcount == $file_count){
        Session::flash('success', 'The question has been successfully added!');
         return redirect()->route('ietsquestion.index');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
         return redirect()->route('ietsquestion.show')->withInput()->withErrors($validator);
      }
  }
    }
}
