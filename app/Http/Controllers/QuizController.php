<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Quiz;
use App\EiaRelated;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Quiz::all();
        $eiarelates = EiaRelated::all();
        $correct = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];
        return view('eiaquiz.show', compact('quiz', 'eiarelates', 'correct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eiaquiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(

            'module' => 'required',
            'question' => 'required|max:255',
            
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'correct' => 'required'

            ));

        //store in the database
        $quiz = new Quiz;

        if ($request->hasFile('fileToUpload')){
            $quiz->fileToUpload = $request->fileToUpload;
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $quiz->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

        $quiz->limg = $request->limg;
        $quiz->module = $request->module;
        $quiz->question = $request->question;
        
        $quiz->a = $request->a;
        $quiz->b = $request->b;
        $quiz->c = $request->c;
        $quiz->d = $request->d;
        $quiz->correct = $request->correct;
        $quiz->eiarelated_id = $request->eiarelated_id;

        $correct = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];

        $quiz -> save();

        Session::flash('success', 'The quiz has been added!');

        return redirect() -> route(('eiaquiz.show'),$quiz->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::all();
        $eiarelates = EiaRelated::all();
        $correct = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];
        return view('eiaquiz.show', compact('quiz', 'eiarelates', 'correct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as a var
        $quiz = Quiz::find($id);
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
        return view('eiaquiz.edit')->withquiz($quiz)->witheiarelates($catrs)->withcorrect($correct);
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
        $this->validate($request, array(

            'module' => 'required',
            'question' => 'required|max:255',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'correct' => 'required'

            ));

        //store in the database
        $quiz = Quiz::find($id);

        if ($request->hasFile('original_filename')){
            $quiz->original_filename = $request->input('original_filename');
            $file = $request->file('original_filename');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $quiz->original_filename = $filename; //save file to which column
            $request->file('original_filename')->move(base_path().'/public/uploads/',$filename);
        }

        $quiz->limg = $request->input('limg');
        $quiz->module = $request->input('module');
        $quiz->question = $request->input('question');
        $quiz->i = $request->input('i');
        $quiz->ii = $request->input('ii');
        $quiz->iii = $request->input('iii');
        $quiz->iv = $request->input('iv');
        $quiz->a = $request->input('a');
        $quiz->b = $request->input('b');
        $quiz->c = $request->input('c');
        $quiz->d = $request->input('d');
        $quiz->correct = $request->input('correct');
        $quiz->eiarelated_id = $request->input('eiarelated_id');

        $correct = [
            '' => '--Please Select--',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D'
        ];

        $quiz -> save();

        Session::flash('success', 'The quiz has been updated!');

        return redirect() -> route(('eiaquiz.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);

        $quiz->delete();

        Session::flash('success', 'The quiz has been deleted!');
        return redirect()->route('eiaquiz.index');
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
          $entry = new Quiz();

          $entry->mime = $file->getClientMimeType();
          $entry->original_filename = $filename;
          $entry->filename = $file->getFilename().'.'.$extension;


          $entry->limg = $request->limg;
          $entry->module = $request->module;
          $entry->question = $request->question;
          $entry->i = $request->i;
          $entry->ii = $request->ii;
          $entry->iii = $request->iii;
          $entry->iv = $request->iv;
          $entry->a = $request->a;
          $entry->b = $request->b;
          $entry->c = $request->c;
          $entry->d = $request->d;
          $entry->correct = $request->correct;
          $entry->eiarelated_id = $request->eiarelated_id;
          $entry->save();
        }
      }
  }

        elseif (is_array($files) || is_object($files) == null)
        {

            $quiz = new Quiz;

        $quiz->limg = $request->limg;
        $quiz->module = $request->module;
        $quiz->question = $request->question;
        $quiz->i = $request->i;
        $quiz->ii = $request->ii;
        $quiz->iii = $request->iii;
        $quiz->iv = $request->iv;
        $quiz->a = $request->a;
        $quiz->b = $request->b;
        $quiz->c = $request->c;
        $quiz->d = $request->d;
        $quiz->correct = $request->correct;
        $quiz->eiarelated_id = $request->eiarelated_id;

        $quiz -> save();

        Session::flash('success', 'The question has been successfully added!');

        return redirect() -> route(('eiaquiz.show'),$quiz->id);
        }

      if($uploadcount == $file_count){
        Session::flash('success', 'The question has been successfully added!');
        return Redirect::to('eiaquiz/show');
      } else {
          Session::flash('success', 'The file upload is neither pdf, .doc, .docx nor .txt file');
        return Redirect::to('eiaquiz/show')->withInput()->withErrors($validator);
      }
    }
}
