<?php

namespace App\Http\Controllers;

use App\IetsQuestion;
use App\IetsOptions;
use Illuminate\Http\Request;
use App\Test;
use Auth;

class IETSQuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
$useresult=Test::all();
         $questions1 = IetsQuestion::where('level','=','low')->limit(3)->get();
        $questions2 = IetsQuestion::where('level','=','medium')->limit(3)->get();
        $questions3 = IetsQuestion::where('level','=','high')->limit(4)-> get();
        $iets_question= $questions2->merge ($questions1);
        $iets_question= $iets_question->merge ($questions3);
        $iets_question = IetsQuestion::inRandomOrder()->paginate(1);
         $options = IetsOptions::all();
         //$iets_question = iets_question::inRandomOrder()->get();
         //$iets_question = iets_question::paginate(2);
         $rank = $iets_question->firstItem();
         
         if ($request->ajax()){
            foreach ($iets_question as &$question) {
            $question->options = IetsOptions::where('question_id', $question->id)->inRandomOrder()->get();
        }
        }
        return view('iets_examquestion.create',['iets_question' => $iets_question, 'rank'=>$rank,'useresult'=>$useresult]);
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

       /* $selflearnings = SelfLearning::where('module', 'Module 1')->get();
        $module = SelfLearning::where('module', 'Module 1')->value('module');
        $title = SelfLearning::where('module', 'Module 1')->value('mtitle');*/

    
            $questions = IetsQuestion::all();
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
          
                //$nextPage = $request->input('page') + 1;
                $status = 1;
                $result++;
                  if($request->session() ->has(' status'))
            echo $request->session() ->get(' status');
            else
                $request->session() ->put(' status',$status);
            echo "Data has been added to session";
                //Session::put('result', $result);
            }
            TestAnswer::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),

                'correct'     => $status,
            ]);


 if ($request->ajax()) {

           TestAnswer::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),

                'correct'     => $status,
            ]);
        }

           /* if ($request) {
        return response()->json([
            'status'     => 'success',
           'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),

                'correct'     => $status]);
    } else {
        return response()->json([
            'status' => 'error']);
    }*/
           
        }

       
        
        return redirect()->route('iets_result.show', [$test->id]);
       // return redirect()->route('tests.create');
        /*return view('tests.create',[$questions->id],compact('questions','selflearnings','module','title'));*/
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\iets_question  $iets_question
     * @return \Illuminate\Http\Response
     */
    public function show(iets_question $iets_question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\iets_question  $iets_question
     * @return \Illuminate\Http\Response
     */
    public function edit(iets_question $iets_question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\iets_question  $iets_question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, iets_question $iets_question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\iets_question  $iets_question
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
	public function iets_examquestion(Request $request){

        
	}
}
