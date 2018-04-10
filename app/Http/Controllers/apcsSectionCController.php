<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apcsSectionC;
use App\ApcsAppc;
use Validator;
use Response;
use Redirect;
use Session;
use App\Uploads;
use DB;
use App\User;
use Auth;


class apcsSectionCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('apcsSectionC.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apcsSectionC = apcsSectionC::where('user_id',Auth::id())->get();
        
            if(apcsSectionC::where('user_id', '=',Auth::id())->exists()){
                return view('apcsSectionC.show', compact('apcsSectionC'));
            }

        return view('apcsSectionC.create');
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
        
        $apcsappc = new ApcsAppc;

        $apcsSectionC = new apcsSectionC;
        $apcsSectionC->coursetitle = $request->coursetitle;
        $apcsSectionC->major = $request->major;
        $apcsSectionC->universityname = $request->universityname;
        $apcsSectionC->from = $request->from;
        $apcsSectionC->to = $request->to;
        $apcsSectionC->user_id = Auth::id();
        $apcsSectionC->applicant_id = $request->applicant_id;
        // $apcsSectionC->name = $request->name;

        $apcsappc->coursetitle = $request->coursetitle;
        $apcsappc->major = $request->major;
        $apcsappc->universityname = $request->universityname;
        $apcsappc->from = $request->from;
        $apcsappc->to = $request->to;
        $apcsappc->user_id = Auth::id();
        $apcsappc->applicant_id = $request->applicant_id;
        // $apcsappc->name = $request->name;


        //save file
        if ($request->hasFile('cert_file')){
            $file = $request->file('cert_file');
            $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            $request->file('cert_file')->move(base_path() . '/public/uploads/',$filename); //path file to save

            $apcsSectionC->cert = $filename; //save file to which column
            $apcsappc->cert = $filename; //save file to which column
        }

        
        

        $apcsSectionC->save();
        $apcsappc->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('apcsSectionC.show', $apcsSectionC->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $apcsSectionC = ApcsSectionC::all();
    //     //from session
    //      return view('apcsSectionC.show', compact('apcsSectionC'));
    // }

    public function show($id)
    {
        $apcsSectionC = apcsSectionC::where('user_id',Auth::id())->get();
        //from session
         


         //hazirah
         /*foreach ($apcsSectionC  as &$apcsSectionCs) {
            $apcsSectionCs->coursetitle = User::where('id', $apcsSectionCs->user_id)->get();
        }*/
    //return view('upload.index',['upload' => $upload]);
        return view('apcsSectionC.show', compact('apcsSectionC'));
    
    //return view('showupload.index',['upload' => $upload]);
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
        $apcsSectionC = apcsSectionC::find($id);

        //return the view and pass in the var we previously created
        return view('apcsSectionC.edit', compact('apcsSectionC'));
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
       $apcsSectionC = apcsSectionC::find($id);
       $apcsappc = ApcsAppc::find($id);

        $apcsSectionC->coursetitle = $request->coursetitle;
        $apcsSectionC->major = $request->major;
        $apcsSectionC->universityname = $request->universityname;
        $apcsSectionC->from = $request->from;
        $apcsSectionC->to = $request->to;
        $apcsSectionC->user_id = Auth::id();
        $apcsSectionC->applicant_id = $request->applicant_id;
        // $apcsSectionC->name = $request->name;

        $apcsappc->coursetitle = $request->coursetitle;
        $apcsappc->major = $request->major;
        $apcsappc->universityname = $request->universityname;
        $apcsappc->from = $request->from;
        $apcsappc->to = $request->to;
        $apcsappc->user_id = Auth::id();
        $apcsappc->applicant_id = $request->applicant_id;
        // $apcsappc->name = $request->name;
        
        //save file
        if ($request->hasFile('cert_file')){
            $file = $request->file('cert_file');
            $file2 = $file->getClientOriginalName();
            $filename = $file2;
             //save image as .png @ etc
            $request->file('cert_file')->move(base_path() . '/public/uploads/',$filename); //path file to save

            $apcsSectionC->cert = $filename; //save file to which column
            $apcsappc->cert = $filename;
        }
    

        $apcsappc->save();

        $apcsSectionC->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('apcsSectionC.show', $apcsSectionC->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apcsSectionC = apcsSectionC::find($id);
        $apcsappc = ApcsAppc::find($id);
        $apcsappc->delete();
        $apcsSectionC->delete();
        Session::flash('success', 'The announcement was successfully deleted!');        
        return redirect()->route('apcsSectionC.show', $apcsSectionC->id);
    }

}

