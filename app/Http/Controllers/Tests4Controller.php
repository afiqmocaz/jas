<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Auth;
use App\Test;
use App\TestAnswer;
use App\Topic;
use App\SelfLearning;
use App\QuizEia;
use App\QuizOptions;
use App\Http\Requests\StoreTestRequest;

class Tests4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selflearnings = SelfLearning::where('module', 'Module 4')->get();
        $module = SelfLearning::where('module', 'Module 4')->value('module');
        $title = SelfLearning::where('module', 'Module 4')->value('mtitle');

        $questions = QuizEia::where('module', '=', 'Module 4')->paginate(1);
        foreach ($questions as &$question) {
            $question->options = QuizOptions::where('question_id', $question->id)->get();
        }

        return view('tests4.create', compact('questions','selflearnings','module','title'));
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
        $result = 0;

        $test = Test::create([
            'user_id' => Auth::id(),
            'result'  => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.'.$question) != null
                && QuizOptions::find($request->input('answers.'.$question))->correct
            ) {

                $status = 1;
                $result++;
            }
            TestAnswer::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),

                'correct'     => $status,
            ]);
           
        }

        $test->update(['result' => $result]);

        return redirect()->route('results4.show', [$test->id]);
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
