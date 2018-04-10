<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaAssignment;
use App\eiaSectionE;
use Auth;
use DB;
use App\AssignmentQuestions;
use Session;
use App\EIAUpload;


class EiaAssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question=AssignmentQuestions::all();
        $upload=EIAUpload::all();

        /*if($question->user_id == Auth::id()->exists()){
            $eiaassignment=AssignmentQuestions::where('user_id',Auth::id())->get();
            $sassignment=A
        }*/


        $eiaassignment = EiaAssignment::where('type','General Question')->inRandomOrder()->take(1)->get();

        $sassignment = EiaAssignment::where('type','Specific Question')->inRandomOrder(1)->get();

        $special=eiaSectionE::all();

          if (AssignmentQuestions::where('user_id', '=', Auth::id())->exists()){
       // if(AssignmentQuestions::where('user_id','=',Auth::id()->exists())){
           return view('pages.upload.index',['upload'=>$upload]);
        }


        //SELECT jasv56.eia_assignments.question, jasv56.eia_assignments.specialized, jasv56.eia_section_es.user_id, jasv56.eia_section_es.first_specialize FROM jasv56.eia_assignments, jasv56.eia_section_es ,jasv56.users where jasv56.eia_assignments.specialized=jasv56.eia_section_es.first_specialize AND jasv56.eia_section_es.user_id=jasv56.users.id;
       /*if(eiaSectionE::where('user_id','=', Auth::id())->exists()){
        $result=DB::select(DB::raw("SELECT eia_assignments.question, eia_assignments.specialized, eia_section_es.id, eia_section_es.first_specialize FROM eia_assignments, eia_section_es where eia_assignments.specialized=eia_section_es.first_specialize"))->get(array('eia_assignments.question','eia_section_es.first_specialize'));
          }*/
        //SELECT jasv56.eia_assignments.question, jasv56.eia_assignments.specialized, jasv56.eia_section_es.id, jasv56.eia_section_es.first_specialize FROM jasv56.eia_assignments, jasv56.eia_section_es where jasv56.eia_assignments.specialized=jasv56.eia_section_es.first_specialize ;

        

        /*    $assignment_question = DB::table('eia_assignments')
        ->join('eia_section_es', 'eia_section_es.first_specialize', '=', 'eia_assignments.specialized')
        
        
        ->get(array('eia_assignments.question','eia_section_es.first_specialize'));*/
        /*$assignment_question=DB::table('eia_assignments')->select('eia_assignments.question')
        ->where('eia_assignments.specialized','=','eia_section_es.first_specialize')->get();*/
        
        //SELECT * FROM jasv56.eia_assignments WHERE exists(select * from jasv56.eia_section_es WHERE jasv56.eia_section_es.first_specialize = jasv56.eia_assignments.specialized);
        if(eiaSectionE::where('user_id','=', Auth::id())){
        $assignment_question=DB::table('eia_assignments')->select('question')
        ->whereExists(function ($query){
            $query->select(DB::raw('question'))
                  ->from('eia_section_es')
                  ->whereRaw('eia_assignments.specialized = eia_section_es.first_specialize');
        })->value('question');
    }
    else{
        $assignment_question="no data";
    }
         //$i=$assignment_question->question;

        //$i=$sassignment->specialized;
        //$sassignment=EiaAssignment::all();

       /* $users = DB::table('eia_section_es')
        ->join('eia_assignments', 'eia_section_es.first_specialize', 'like', 'Air Pollution Control - Pollution Control Technology%')
        ->where('eia_section_es.user_id',Auth::id())
        ->select('eia_assignments.question', 'eia_section_es.first_specialize')
        ->get();*/

               /* $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();*/


        //$first = EiaAssignment::where('specialized','Water Pollution Control - Pollution Control Technology')->take(1)->get();
        //$second = EiaAssignment::where('specialized','Air Pollution Control - Impact Assessment')->take(1)->get();

        

        return view('assignments.index', compact('eiaassignment','sassignment','special','assignment_question','result','question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $question=AssignmentQuestions::where('user_id',Auth::id())->get();

        return view('assignments.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$result = 0;

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

        return redirect()->route('results5.show', [$test->id]);*/

       

        /*$test = AssignmentQuestions::create([
            'user_id' => Auth::id(),
            'general_assignment_id'  => $request->input('general_assignment_id',[]),
            'specific_assignment_id'  => $request->input('specific_assignment_id',[]),
        ]);*/

        //store in the database
$upload=EIAUpload::all();
        
        if (AssignmentQuestions::where('user_id', '=', Auth::id())->exists()){
       // if(AssignmentQuestions::where('user_id','=',Auth::id()->exists())){
           return view('pages.upload.index',['upload'=>$upload]);
        }

        else{
        $eiaassignment = new AssignmentQuestions;

        $eiaassignment->user_id = Auth::id();
        $eiaassignment->general_assignment_id = $request->input('general_assignment_id');
        $eiaassignment->specific_assignment_id = $request->input('specific_assignment_id');
        

        $eiaassignment -> save();

        Session::flash('success', 'The assignment has been added!');

        return redirect() -> route(('assignments.index'),[$eiaassignment->id]);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$question=AssignmentQuestions::where('user_id',Auth::id())->get();

        return view('assignments.show', compact('question'));*/
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
