<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaQuiz;
use Session;
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;

class EiaQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = EiaQuiz::all();
        return view('quiz.show', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz.create');
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
            'i' => 'required',
            'ii' => 'required',
            'iii' => 'required',
            'iv' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'correct' => 'required'

            ));

        //store in the database
        $quiz = new EiaQuiz;

        if ($request->hasFile('fileToUpload')){
            $quiz->fileToUpload = $request->fileToUpload;
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $quiz->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

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
        $quiz->related = $request->related;

        $quiz -> save();

        Session::flash('success', 'The quiz has been added!');

        return redirect() -> route(('quiz.show'),$quiz->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = EiaQuiz::all();
        return view('quiz.show', compact('quiz'));
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
        $quiz = EiaQuiz::find($id);
        //return the view and pass in the var we previously created
        return view('quiz.edit')->withquiz($quiz);
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
            'i' => 'required',
            'ii' => 'required',
            'iii' => 'required',
            'iv' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'correct' => 'required'

            ));

        //store in the database
        $quiz = EiaQuiz::find($id);

        if ($request->hasFile('fileToUpload')){
            $quiz->fileToUpload = $request->input('fileToUpload');
            $file = $request->file('fileToUpload');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $quiz->fileToUpload = $filename; //save file to which column
            $request->file('fileToUpload')->move(base_path().'/public/images/',$filename);
        }

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
        $quiz->related = $request->related;

        $quiz -> save();

        Session::flash('success', 'The quiz has been updated!');

        return redirect() -> route(('quiz.show'),$quiz->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = EiaQuiz::find($id);

        $quiz->delete();

        Session::flash('success', 'The quiz has been deleted!');
        return redirect()->route('quiz.index');
    }
}
