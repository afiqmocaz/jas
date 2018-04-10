<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsQuestion;
use App\Test;
use App\TestAnswer;

class IetsResultController extends Controller
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
        

        $count = IetsQuestion::count();
        

       

      
        //$results = Test::all()->load('user');
        $results = Test::where('user_id','=',Auth::id())->get();
        //$score = Test::all();

        /*if (!Auth::user()->isAdmin()) {
            $results = $results->where('user_id', '=', Auth::id());

        }*/

        $sum = $results->where('user_id', '=', Auth::id())->sum('result');

        return view('iets_result.index', compact('count','count2','count3','count4','count5','modules', 'results','sum','total','selflearnings','module','title'));
    }

    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {

        $count = IetsQuestion::count();
     

        $test = Test::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
        }

        return view('iets_result.show', compact('test', 'results', 'count','modules','module','selflearnings','title'));


    }


}

