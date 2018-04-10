<?php

namespace App\Http\Controllers;

use Auth;
use App\Test;
use App\Topic;
use App\SelfLearning;
use App\QuestionList;
use App\TestAnswer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResultsRequest;
use App\Http\Requests\UpdateResultsRequest;

class ResultsController extends Controller
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
        $selflearnings = SelfLearning::where('module', 'Module 1')->get();
        $module = SelfLearning::where('module', 'Module 1')->value('module');
        $title = SelfLearning::where('module', 'Module 1')->value('mtitle');

        $count = QuestionList::where('module', '=', 'Module 1')->count();
        $count2 = QuizEia::where('module', '=', 'Module 2')->count();
        $count3 = QuizEia::where('module', '=', 'Module 3')->count();
        $count4 = QuizEia::where('module', '=', 'Module 4')->count();
        $count5 = QuizEia::where('module', '=', 'Module 5')->count();

        $total = $count + $count2 + $count3 + $count4 + $count5; 

        $modules = Topic::all();
        //$results = Test::all()->load('user');
        $results = Test::where('user_id','=',Auth::id())->get();
        //$score = Test::all();

        /*if (!Auth::user()->isAdmin()) {
            $results = $results->where('user_id', '=', Auth::id());

        }*/

        $sum = $results->where('user_id', '=', Auth::id())->sum('result');

        return view('results.index', compact('count','count2','count3','count4','count5','modules', 'results','sum','total','selflearnings','module','title'));
    }

    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {

        $count = QuizEia::where('module', '=', 'Module 1')->count();
        
        $modules = Topic::all();
         $selflearnings = SelfLearning::where('module', 'Module 1')->get();
        $module = SelfLearning::where('module', 'Module 1')->value('module');
        $title = SelfLearning::where('module', 'Module 1')->value('mtitle');

        $test = Test::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
        }

        return view('results.show', compact('test', 'results', 'count','modules','module','selflearnings','title'));


    }


}

