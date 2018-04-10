<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\ApcsOption;
use App\Specialized;
use App\Related;

class ApcsExamOptionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $questions = Question::all();
    $options = ApcsOption::all();
     $specializes = Specialized::all();
       $eiarelates = Related::all();
      
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
         $questions_option = ApcsOption::all();

        return view('apcsexamoption.index', compact('questions_option','correct_options','questions','eiarelates','options','specializes'));
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
        $questions = Question::all();
    $options = ApcsOption::all();
       $eiarelates = Related::all();
       $specializes = Specialized::all();
      
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

        $relations = [
            'questions' => \App\Question::get()->pluck('question', 'id')->prepend('Please select', ''),
        ];

        $questions_option = ApcsOption::all();

        return view('apcsexamoption.show', compact('questions_option','correct_options','questions','eiarelates','options','specializes') + $relations);
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
            'questions' => \App\Question::get()->pluck('question', 'id')->prepend('Please select', ''),
        ];
        $questions_option = ApcsOption::findOrFail($id);

        return view('apcsexamoption.edit', compact('questions_option')+ $relations);
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
          $questionsoption = ApcsOption::findOrFail($id);
        $questionsoption->update($request->all());

        return redirect()->route('apcsquestion.index');
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
          $ietsquestion = ApcsOption::find($id);

        $ietsquestion->delete();

        Session::flash('success', 'The question has been deleted!');
        return redirect()->route('apcsquestion.index');
    }
}
