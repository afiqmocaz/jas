<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class EiaOptionExamController extends Controller
{
     public function index()
    {
        $question = ExamEia::all();
    $options = EiaOptions::all();
       $eiarelates = EiaRelated::all();
      
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];
         $questions_option = EiaOptions::all();

        return view('eiaexamoption.index', compact('questions_option','correct_options','question','eiarelates','options'));
       // return view('questions_options.index', compact('questions_options'));
    }

    /**
     * Show the form for creating new QuestionsOption.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* $relations = [
            'questions' => \App\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        return view('questions_options.create', $relations);*/
    }

    /**
     * Store a newly created QuestionsOption in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsOptionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsOptionsRequest $request)
    {
       // QuestionsOption::create($request->all());

       // return redirect()->route('questions_options.index');
    }


    /**
     * Show the form for editing QuestionsOption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'questions' => \App\ExamEia::get()->pluck('question', 'id')->prepend('Please select', ''),
        ];

        $questions_option = EiaOptions::findOrFail($id);

        return view('eiaexamoption.edit', compact('questions_option') + $relations);
    }

    /**
     * Update QuestionsOption in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsOptionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $questionsoption = EiaOptions::findOrFail($id);
        $questionsoption->update($request->all());

        return redirect()->route('eiaquestion.index');
    }


    /**
     * Display QuestionsOption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  $questions = ExamEia::all();
    $options = EiaOptions::all();
       $eiarelates = EiaRelated::all();
      
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4'
            
        ];

        $relations = [
            'questions' => \App\ExamEia::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $questions_option = EiaOptions::all();

        return view('eiaexamoption.show', compact('questions_option','correct_options','questions','eiarelates','options') + $relations);
    }


    /**
     * Remove QuestionsOption from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionsoption = EiaOptions::findOrFail($id);
        $questionsoption->delete();

        return redirect()->route('eiaexamoption.index');
    }

    /**
     * Delete all selected QuestionsOption at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = EiaOptions::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
