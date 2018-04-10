<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ietsSectionC;
use App\IetsAppc;
use Validator;
use Response;
use Redirect;
use Session;
use App\Uploads;
use DB;
use App\User;
use Auth;
use Storage;
use App\IetsApplicant;
class ietsSectionCController extends Controller
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
    {    $count=0;   $ietsApplicant = IetsApplicant::where('user_id','=',Auth::id())->first(); 
         $ietsSectionC = ietsSectionC::where('user_id',Auth::id())->get();
            if(ietsSectionC::where('user_id', '=',Auth::id())->exists()){
                 
          $firtProject = ietsSectionC::where('user_id',Auth::id())->min('projectStart');
          $lastProject = ietsSectionC::where('user_id',Auth::id())->max('projectComplete');
         
          $ts1 = strtotime($firtProject);
          $ts2 = strtotime($lastProject);

         
            $ietsSectionC2 = ((date('Y', $ts2) - date('Y', $ts1)) * 12) + (date('m', $ts2) - date('m', $ts1))-$this->gap();
                if($ietsApplicant->status==="Declined")
                $count=$this->Editable();
                else{$count="1";}
                return view('ietsSectionC.show', compact('ietsSectionC','ietsSectionC2','count'));
            }

        return view('ietsSectionC.create');
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
            'projectStart' => 'required|before:projectComplete', 
            'projectComplete' => 'required|before:tomorrow',
            'proposaltitle' => 'required', 
            'clientname' => 'required', 
            'clientaddress' => 'required',
            'supportdoc' => 'required|mimes:pdf|max:14240'
            ));                                                                                    
        $ietsSectionC = new ietsSectionC;
      

        $ietsSectionC->projectStart = $request->projectStart;
        $ietsSectionC->projectComplete = $request->projectComplete;
        $ietsSectionC->numdays = $request->numdays;
        $ietsSectionC->numMonths = $request->numMonths;
        $ietsSectionC->proposaltitle = $request->proposaltitle;
        $ietsSectionC->clientname = $request->clientname;
        $ietsSectionC->clientaddress = $request->clientaddress;
        $ietsSectionC->user_id = Auth::id();
        $ietsSectionC->applicant_id = $request->applicant_id;

       $ietsappc = new IetsAppc;
       $ietsappc->projectStart = $request->projectStart;
       $ietsappc->projectComplete = $request->projectComplete;
       $ietsappc->numdays = $request->numdays;
       $ietsappc->numMonths = $request->numMonths;
       $ietsappc->proposaltitle = $request->proposaltitle;
       $ietsappc->clientname = $request->clientname;
       $ietsappc->clientaddress = $request->clientaddress;
       $ietsappc->user_id = Auth::id();
       $ietsappc->applicant_id = $request->applicant_id;
    
         //return $request->input('supportdoc');
        
        if ($request->hasFile('supportdoc')){
            $ietsSectionC->supportdoc = $request->input('supportdoc');
            $ietsappc->supportdoc = $request->input('supportdoc');
            $file = $request->file('supportdoc');
            $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            
           
            $ietsSectionC->supportdoc = $filename; //save file to which column
            $ietsappc->supportdoc = $filename;
            $request->file('supportdoc')->move(base_path().'/public/uploads/',$filename);
        }

        $ietsappc->save();

        $ietsSectionC->save();
       

        Session::flash('success', 'The data sucessfully saved');

        //redirect to another page

        return redirect()->route('ietsSectionC.show', $ietsSectionC->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
         public function show($id)
    {     $count=0; $ietsApplicant = IetsApplicant::where('user_id','=',Auth::id())->first();  
          $ietsSectionC = ietsSectionC::where('user_id',Auth::id())->get();
        //from session
        $date=ietsSectionC::where('user_id',Auth::id())->orderBy('projectStart', 'ASC')->get();
     
       
      // $flag=$this->Flag();
       
          $firtProject = ietsSectionC::where('user_id',Auth::id())->min('projectStart');
          $lastProject = ietsSectionC::where('user_id',Auth::id())->max('projectComplete');
         
          $ts1 = strtotime($firtProject);
          $ts2 = strtotime($lastProject);
     
          $ietsSectionC2 = ((date('Y', $ts2) - date('Y', $ts1)) * 12) + (date('m', $ts2) - date('m', $ts1))-$this->gap();
           if($ietsApplicant->status==="Declined")
                $count=$this->Editable();
                else{$count="1";}
        return view('ietsSectionC.show', compact('ietsSectionC','ietsSectionC2','count'));
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
        $ietsSectionC = ietsSectionC::find($id);

        //return the view and pass in the var we previously created
        return view('ietsSectionC.edit', compact('ietsSectionC'));
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
        $this->validate($request, array(
            'projectStart' => 'required|before:projectComplete', 
            'projectComplete' => 'required|before:tomorrow',
            'proposaltitle' => 'required', 
            'clientname' => 'required',
             'clientaddress' => 'required',
             'supportdoc' => 'mimes:pdf|max:10240'
              ));

        $ietsSectionC = ietsSectionC::find($id);
         $ietsSectionC->projectStart = $request->projectStart;
        $ietsSectionC->projectComplete = $request->projectComplete;
        $ietsSectionC->numdays = $request->numdays;
        $ietsSectionC->numMonths = $request->numMonths;
        $ietsSectionC->proposaltitle = $request->proposaltitle;
        $ietsSectionC->clientname = $request->clientname;
        $ietsSectionC->clientaddress = $request->clientaddress;

        $ietsappc = IetsAppc::where('user_id',Auth::user()->id)->first();
         $ietsappc->projectStart = $request->projectStart;
        $ietsappc->projectComplete = $request->projectComplete;
        $ietsappc->numdays = $request->numdays;
        $ietsappc->numMonths = $request->numMonths;
        $ietsappc->proposaltitle = $request->proposaltitle;
        $ietsappc->clientname = $request->clientname;
        $ietsappc->clientaddress = $request->clientaddress;

        if ($request->hasFile('supportdoc')){
            $ietsSectionC->supportdoc = $request->input('supportdoc');
            $ietsappc->supportdoc = $request->input('supportdoc');
            $file = $request->file('supportdoc');
             $file2 = $file->getClientOriginalName();
            $filename = $file2; //save image as .png @ etc
            $ietsSectionC->supportdoc = $filename; //save file to which column
             $ietsappc->supportdoc = $filename;
            $request->file('supportdoc')->move(base_path().'/public/uploads/',$filename);
            $oldFilename=$ietsSectionC->supportdoc;
            Storage::delete($oldFilename);

        }


        $ietsappc->save();

        $ietsSectionC->save();

        Session::flash('success', 'The data sucessfull updated.');

        //redirect to another page

        return redirect()->route('ietsSectionC.show', $ietsSectionC->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ietsSectionC = ietsSectionC::find($id);
        $ietsSectionC-> delete();
        $ietsappc = IetsAppc::where('user_id',$id);
        $ietsappc->delete();
        $ietsSectionC-> delete();
        Session::flash('success', 'The announcement was successfully deleted!');        
        return redirect()->route('ietsSectionC.show', $ietsSectionC->id);
    }
//     public function Flag()
//     {
//         if(IetsApplicant::where('section','like','%C%')->where('user_id','=',Auth::id())->exists()){
//                         $flag="X";
//                        return $flag;
//                     }
//                     else
//                         $flag="0";
//                     return $flag;
//     }
// }
    public function gap()
    {
        $date=ietsSectionC::where('user_id',Auth::id())->orderBy('projectStart', 'ASC')->get();
           $num=0;
        for( $i = 0; $i<count($date)-1; $i++ ) {
           if($date[$i]->projectComplete<$date[$i+1]->projectStart)
            {
                $firstProject = $date[$i]->projectComplete;
                $lastsProject = $date[$i+1]->projectStart;
                $tsx = strtotime($firstProject);
                $tsy = strtotime($lastsProject);
                $num=$num +((date('Y', $tsy) - date('Y', $tsx)) * 12) + (date('m', $tsy) - date('m', $tsx));
            }
         }
         return $num;
    }
    public function Editable()
    {
       $ietsApplicant = IetsApplicant::where('user_id','=',Auth::id())->where('section','like','%C%')->count(); 
        return $ietsApplicant;

}
}