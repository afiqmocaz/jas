<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eiaSectionB;
use App\EiaAppb;
use Validator;
use Response;
use Redirect;
use Session;
use App\Uploads;
use DB;
use Auth;

class eiaSectionBController extends Controller
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
       $eiaSectionB = eiaSectionB::where('user_id',Auth::id())->get();
        
            if(eiaSectionB::where('user_id', '=',Auth::id())->exists()){
                return view('eiaSectionB.show', compact('eiaSectionB'));
            }

        return view('eiaSectionB.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
             $this->validate($request, array(
            'coursetitle' => 'required',
            'major' => 'required',
            'universityname' => 'required', 
            'from' => 'required|before:to',
            'to' => 'required|after:from',
            'cert_file' => 'required|mimes:pdf|max:10240'
             ));

        $eiaSectionB = new eiaSectionB;
        $eiaappb = new EiaAppb;

        $eiaSectionB->coursetitle = $request->coursetitle;
        $eiaSectionB->major = $request->major;
        $eiaSectionB->universityname = $request->universityname;
        $eiaSectionB->from = $request->from;
        $eiaSectionB->to = $request->to;
        $eiaSectionB->user_id = Auth::id();
        $eiaSectionB->applicant_id = $request->applicant_id;

        $eiaappb->coursetitle = $request->coursetitle;
        $eiaappb->major = $request->major;
        $eiaappb->universityname = $request->universityname;
        $eiaappb->from = $request->from;
        $eiaappb->to = $request->to;
        $eiaappb->user_id = Auth::id();
        $eiaappb->applicant_id = $request->applicant_id;
        

        //save file
        if ($request->hasFile('cert_file')){
            $file = $request->file('cert_file');
            $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            $request->file('cert_file')->move(base_path() . '/public/uploads/',$filename); //path file to save

            $eiaSectionB->cert = $filename; //save file to which column
            $eiaappb->cert = $filename;
        }

        $eiaSectionB->save();

        $eiaappb->save();

        Session::flash('success', 'The data has been added!');

        //redirect to another page

        return redirect()->route('eiaSectionB.show', $eiaSectionB->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $eiaSectionB = eiaSectionB::where('user_id',Auth::id())->get();
        //from session
        return view('eiaSectionB.show', compact('eiaSectionB'));
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
        $eiaSectionB = eiaSectionB::find($id);

        //return the view and pass in the var we previously created
        return view('eiaSectionB.edit', compact('eiaSectionB'));
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
        //validate the data
        $this->validate($request, array(
            'coursetitle' => 'required',
            'major' => 'required',
            'universityname' => 'required', 
            'from' => 'required|before:to',
            'to' => 'required|after:from'
            

            ));
$id = Auth::user()->id;
      
       $eiaSectionB = eiaSectionB::where('user_id','=',$id)->first();
        $eiaSectionB->coursetitle = $request->coursetitle;
        $eiaSectionB->major = $request->major;
        $eiaSectionB->universityname = $request->universityname;
        $eiaSectionB->from = $request->from;
        $eiaSectionB->to = $request->to;


        $eiaappb = EiaAppb::where('user_id','=',$id)->first();
        $eiaappb->coursetitle = $request->coursetitle;
        $eiaappb->major = $request->major;
        $eiaappb->universityname = $request->universityname;
        $eiaappb->from = $request->from;
        $eiaappb->to = $request->to;
 
        //save file
        if ($request->hasFile('cert_file')){
            $file = $request->file('cert_file');
           $file2 = $file->getClientOriginalName();
            $filename = $file2;//save image as .png @ etc
            $request->file('cert_file')->move(base_path() . '/public/uploads/',$filename); //path file to save

            $eiaSectionB->cert = $filename; //save file to which column
            $eiaappb->cert = $filename;
        }
    

        $eiaappb->save();

        $eiaSectionB->save();

        Session::flash('success', 'The data has been updated.');

        //redirect to another page

        return redirect()->route('eiaSectionB.show', $eiaSectionB->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Auth::user()->id;

        $eiaSectionB = eiaSectionB::where('user_id','=',$id)->first();
        $eiaappb = EiaAppb::where('user_id','=',$id)->first();
        $eiaappb->delete();
        $eiaSectionB->delete();
        Session::flash('success', 'The data was successfully deleted!');        
        return redirect()->route('eiaSectionB.show', $eiaSectionB->id);
    }

    
}
