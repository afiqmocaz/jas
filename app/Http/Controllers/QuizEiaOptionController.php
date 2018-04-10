<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionList;
use App\QuizOptions;
use App\EiaRelated;

class QuestionListOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $questions = QuestionList::all();
    $options = QuizOptions::all();
       $eiarelates = EiaRelated::all();
      
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
         $questions_option = QuizOptions::all();

        return view('eia_option.index', compact('questions_option','correct_options','questions','eiarelates','options'));
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
         $questions = QuestionList::all();
    $options = QuizOptions::all();
       $eiarelates = EiaRelated::all();
      
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

        $relations = [
            'questions' => \App\QuestionList::get()->pluck('question', 'id')->prepend('Please select', ''),
        ];

        $questions_option = QuizOptions::all();

        return view('eia_option.show', compact('questions_option','correct_options','questions','eiarelates','options') + $relations);
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
            'questions' => \App\QuestionList::get()->pluck('question', 'id')->prepend('Please select', ''),
        ];
        $questions_option = QuizOptions::findOrFail($id);

        return view('eia_option.edit', compact('questions_option')+ $relations);
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
        $questionsoption = QuizOptions::findOrFail($id);
        $questionsoption->update($request->all());

        return redirect()->route('eiaqs.index');
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

           $ietsquestion = QuestionList::find($id);

        $ietsquestion->delete();

        Session::flash('success', 'The question option has been deleted!');
        return redirect()->route('eiaqs.index');
    }

}
