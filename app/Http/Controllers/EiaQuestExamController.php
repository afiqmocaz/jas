<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\EiaQuestion;
use App\EiaRelated;
use App\ExamEia;
use App\EiaOptions;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;

class EiaQuestExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
         $eiaquestion = ExamEia::all();
    $options = EiaOptions::all();

        $eiarelates = EiaRelated::all();
    //$eiaquestion->limg = $request->limg;
        //$questions->type = $request->type;
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

        return view('eiaquestion.show', compact('correct_options','eiaquestion','eiarelates','options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $eiaquestion = ExamEia::create($request->all());
        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                EiaOptions::create([
                    'question_id' => $eiaquestion->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

         Session::flash('success', 'The question has been added!');

        return redirect() -> route(('eiaquestion.show'),$eiaquestion->id);
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
        $eiaquestion = ExamEia::create($request->all());
          $eiaquestion->mime = $file->getClientMimeType();
          $eiaquestion->original_filename = $filename;
          $eiaquestion->filename = $file->getFilename().'.'.$extension;
          $eiaquestion->save();
      

        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                EiaOptions::create([
                    'question_id' => $eiaquestion->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        return redirect() -> route(('eiaquestion.show'),$eiaquestion->id);
        }
      }
  }

        elseif (is_array($files) || is_object($files) == null)
        {

            $eiaquestion= ExamEia::create($request->all());

        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                EiaOptions::create([
                    'question_id' => $eiaquestion->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }

        Session::flash('success', 'The question has been successfully added!');
        }

      if($uploadcount == $file_count){
        Session::flash('success', 'The question has been successfully added!');
         return redirect()->route('eiaquestion.index');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
         return redirect()->route('eiaquestion.show')->withInput()->withErrors($validator);
      }
  }

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $eiaquestion = ExamEia::all();
    $options = EiaOptions::all();

        $eiarelates = EiaRelated::all();
    //$eiaquestion->limg = $request->limg;
        //$questions->type = $request->type;
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

        return view('eiaquestion.show', compact('correct_options','eiaquestion','eiarelates','options'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

         $question = ExamEia::find($id);
        

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
         $correct = EiaOptions::find($id);
         
        return view('eiaquestion.edit')->withquestion($question)->witheiarelates($catrs)->withcorrect($correct)->withcorrect_options($correct_options);
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
        //
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
        $eiaquestion = ExamEia::find($id);

        $eiaquestion->delete();

        Session::flash('success', 'The question has been deleted!');
        return redirect()->route('eiaquestion.index');
    }
}
