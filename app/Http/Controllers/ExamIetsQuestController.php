<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ExamIets;
use App\IetsOptions;
use App\IetsRelated;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;

class ExamIetsQuestController extends Controller
{
   
    public function index()
    {
        //
        $ietsquestion = ExamIets::all();
        $options = IetsOptions::all();
        $ietsrelates = IetsRelated::all();

        $correct_options = [

            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'

        ];

        return view('ietsexamqs.show', compact('correct_options','ietsquestion','ietsrelates','options'));
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
        $ietsquestion = ExamIets::create($request->all());

        foreach ($request->input() as $key => $value){
           if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                IetsOptions::create([
                    'question_id' => $ietsquestion->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

         Session::flash('success', 'The question has been added!');

        return redirect() -> route(('ietsexamqs.show'),$ietsquestion->id);
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
        $ietsquestion = ExamIets::create($request->all());
          $ietsquestion->mime = $file->getClientMimeType();
          $ietsquestion->original_filename = $filename;
          $ietsquestion->filename = $file->getFilename().'.'.$extension;
          $ietsquestion->save();
      

        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                IetsOptions::create([
                    'question_id' => $ietsquestion->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        return redirect() -> route(('ietsexamqs.show'),$ietsquestion->id);
        }
      }
  }

        elseif (is_array($files) || is_object($files) == null)
        {

            $ietsquestion= ExamIets::create($request->all());

        //QuizOptions::create($request->all());


        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                IetsOptions::create([
                    'question_id' => $ietsquestion->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }

        Session::flash('success', 'The question has been successfully added!');
        }

      if($uploadcount == $file_count){
        Session::flash('success', 'The question has been successfully added!');
         return redirect()->route('ietsexamqs.index');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
         return redirect()->route('ietsexamqs.show')->withInput()->withErrors($validator);
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
         $ietsquestion = ExamIets::all();
        $options = IetsOptions::all();
        $ietsrelates = IetsRelated::all();

        $correct_options = [

            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'

        ];

        return view('ietsexamqs.show', compact('correct_options','ietsquestion','ietsrelates','options'));
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
    }
}
