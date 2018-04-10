<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rubric;
use App\User;
use Session;
use App\Http\Controllers\MasterLayoutController;
use App\Uploads;
use App\ExamCandidate;
use App\EiaAssignment;
use App\IetsAssignment;
use  App\Assignment;
use Auth;
class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rubric.create');
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
        // find the post in the database and save as a var
        $user = User::find($id);
        //return the view and pass in the var we previously created
        return view('rubric.edit')->withuser($user);
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
        $rubric = Rubric::find($id);

        $rubric->criteria = $request->criteria;
        $rubric->percentage = $request->percentage;
        $rubric->user_id = Auth::id();

        $rubric -> save();

        Session::flash('success', 'The comment has been added!');

        return redirect() -> route(('rubric.edit'),$rubric->id);
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
    
    
    public function view($id)
    {
        $uploadB = Uploads::with(['user','additionalFile']);
        
        $upload = $uploadB->find($id);
        
        $examCandidate = ExamCandidate::find($upload->exam_candidate_id);
       
        
        $eiaAssigment = array();
        $apcsAssigment = array();
        $ietsAssigment = array();
        $category = $upload->category;
        $isUserSme = User::whereHas('roles', function($q){
                 $q->whereIn('role_id',[12,13,14]);
         })->where('id', '=', Auth::user()->id)->get()->count();
        
        if($category === 'eia'){
           $eiaAssigment = EiaAssignment::find($examCandidate->question_id); 
        }else if($category === 'apcs'){
           $apcsAssigment = Assignment::find($examCandidate->question_id);  
        }else if($category === 'iets'){
           $ietsAssigment = IetsAssignment::find($examCandidate->question_id);  
        }
      
        $data = array();
        //$data['master'] = 'layouts.app5';
        $data['master'] = 'layouts.eiamaster';
        $data['id'] = $id;
        $data['category'] = $upload->category;
        $data['upload'] = $upload;
        $data['apcsAssigment'] = $apcsAssigment;
        $data['eiaAssigment'] = $eiaAssigment;
        $data['ietsAssigment'] = $ietsAssigment;
        $data['isUserSme']=$isUserSme;
     
        return view('rubric.rubric_view_v2')->with($data);
    }
    
    public function save(Request $request){
        
        
        Rubric::where('upload_id','=',$request->id)->delete();
        
        $rubricList = json_decode($request->rubricList);
        
        foreach ($rubricList as $rubric) {
            
            $ob = new Rubric();
            $ob->upload_id = $request->id;
            $ob->criteria = $rubric->criteria;
            $ob->percentage=$rubric->percentage;
            $ob->level = $rubric->level;
            $ob->desc1=$rubric->desc1;
            $ob->desc2=$rubric->desc2;
            $ob->desc3=$rubric->desc3;
            $ob->desc4=$rubric->desc4;
            $ob->save();
           
            
        }
      if($request->flag==='1')
      {
         $upload=Uploads::find($request->id);
        $upload->status='Submitted';
        $upload->save();
      }
        return redirect('rubric_view/'.$request->id);
    }
    
    public function find(Request $req){
        $builder = Rubric::with('upload');
        
        if(!empty($req['upload_id'])){
            $builder->where('upload_id','=', $req['upload_id']);
        }
        
        $res = new \stdClass();
        $res->data = $builder->get();
        return json_encode($res);
    }

    public function send(Request $request){
        
        
        $upload=Uploads::find($request->idx);
        // $upload->status=$request->status;
        $upload->save();
         
        return redirect('rubric_view/'.$request->idx);
    }
}
