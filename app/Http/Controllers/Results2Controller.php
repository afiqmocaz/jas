<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Test;
use App\Topic;
use App\SelfLearning;
use App\QuizEia;
use App\TestAnswer;
use App\Http\Requests\StoreResultsRequest;
use App\Http\Requests\UpdateResultsRequest;

class Results2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }

    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selflearnings = SelfLearning::where('module', 'Module 2')->get();
        $module = SelfLearning::where('module', 'Module 2')->value('module');
        $title = SelfLearning::where('module', 'Module 2')->value('mtitle');


        $count = QuestionQuiz::where('topic_id', '=', 1)->count();
        $count2 = QuestionQuiz::where('topic_id', '=', 2)->count();
        $count3 = QuestionQuiz::where('topic_id', '=', 3)->count();
        $count4 = QuestionQuiz::where('topic_id', '=', 4)->count();
        $count5 = QuestionQuiz::where('topic_id', '=', 5)->count();

        $total = $count + $count2 + $count3 + $count4 + $count5; 

        $modules = Topic::all();
        $results = Test::all()->load('user');

        if (!Auth::user()->isAdmin()) {
            $results = $results->where('user_id', '=', Auth::id());

        }

        $sum = $results->where('user_id', '=', Auth::id())->sum();

        return view('results2.index', compact('count','count2','count3','count4','count5','modules', 'results','sum','total','selflearnings','module','title'));
    }

    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
 
        $count2 = QuizEia::where('module', '=', 'Module 2')->count();
        $selflearnings = SelfLearning::where('module', 'Module 2')->get();
        $module = SelfLearning::where('module', 'Module 2')->value('module');
        $title = SelfLearning::where('module', 'Module 2')->value('mtitle');

        $test = Test::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
        }

        return view('results2.show', compact('test', 'results','count2','module','selflearnings','title'));


    }
}
