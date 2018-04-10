<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamIets;
use App\IetsOptions;
use App\IetsRelated;

class IetsExamOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $questions = ExamIets::all();
    $options = IetsOptions::all();
       $eiarelates = IetsRelated::all();
      
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
         $questions_option = IetsOptions::all();

        return view('ietsexamoption.index', compact('questions_option','correct_options','questions','eiarelates','options'));
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
        $questions = ExamIets::all();
    $options = IetsOptions::all();
       $eiarelates = IetsRelated::all();
      
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

        $relations = [
            'questions' => \App\ExamIets::get()->pluck('question', 'id')->prepend('Please select', ''),
        ];

        $questions_option = IetsOptions::all();

        return view('ietsexamoption.show', compact('questions_option','correct_options','questions','eiarelates','options') + $relations);
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
        $relations = [
            'questions' => \App\ExamIets::get()->pluck('question', 'id')->prepend('Please select', ''),
        ];
        $questions_option = IetsOptions::findOrFail($id);

        return view('ietsexamoption.edit', compact('questions_option')+ $relations);
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
          $questionsoption = IetsOptions::findOrFail($id);
        $questionsoption->update($request->all());

        return redirect()->route('ietsquestion.index');
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
          $ietsquestion = IetsOptions::find($id);

        $ietsquestion->delete();

        Session::flash('success', 'The question has been deleted!');
        return redirect()->route('ietsquestion.index');
    }
}
