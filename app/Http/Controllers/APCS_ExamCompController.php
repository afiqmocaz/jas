<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\QuestionsOption;

class APCS_ExamCompController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $questions1 = Question::where('level','=','low')->limit(3)->get();
        $questions2 = Question::where('level','=','medium')->limit(3)->get();
        $questions3 = Question::where('level','=','high')->limit(4)-> get();
        $questions4= $questions2->merge ($questions1);
        $questions4= $questions4->merge ($questions3);
        $questions4 = Question::inRandomOrder()->paginate(1);
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

    public function apcs_examquestion(Request $request){
         $questions1 = Question::where('level','=','low')->limit(3)->get();
        $questions2 = Question::where('level','=','medium')->limit(3)->get();
        $questions3 = Question::where('level','=','high')->limit(4)-> get();
        $iets_question= $questions2->merge ($questions1);
        $iets_question= $iets_question->merge ($questions3);
        $iets_question = Question::inRandomOrder()->paginate(1);
         $options = QuestionsOption::all();
         //$iets_question = iets_question::inRandomOrder()->get();
         //$iets_question = iets_question::paginate(2);
         $rank = $iets_question->firstItem();
         
         if ($request->ajax()){
            foreach ($iets_question as &$question) {
            $question->options = QuestionsOption::where('question_id', $question->id)->inRandomOrder()->get();
        }
        }
        return view('apcs.apcs_examquestion',['iets_question' => $iets_question, 'rank'=>$rank]);
    }
}
