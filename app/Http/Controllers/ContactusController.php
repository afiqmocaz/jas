<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eia_Guideline;
use App\Contactus;
use Session;
use Image;
use DB;
use Auth;
use Validator;
use Response;
use Redirect;
class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guideline=Eia_Guideline::all();
        $contactus=Contactus::all();
         return view('contactus.index',compact('guideline','contactus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $master = (new MasterLayoutController())->getSec('eia');
        return view('contactus.create',  compact('master'));
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
          $this->validate($request, array(
                    'department' => 'required|max:100', 
                    'address' => 'required',
                    'telno' => 'required|max:100'));

        $contactus = new Contactus;
        $contactus->department = $request->department;
        $contactus->address = $request->address;
        $contactus->telno = $request->telno;
        $contactus->faxno = $request->faxno;
        
       

        $contactus->save();

        

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('contactus.show', $contactus->id);

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
        $contactus=Contactus::all();
        return view('contactus.show',  compact('contactus'));

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

        $contactus = Contactus::find($id);
        return view('contactus.edit', compact('contactus'));

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
         $this->validate($request, array(
                    'department' => 'required|max:100', 
                    'address' => 'required',
                    'telno' => 'required|max:100'));

        $contactus = Contactus::find($id);
        $contactus->department = $request->department;
        $contactus->address = $request->address;
        $contactus->telno = $request->telno;
        $contactus->faxno = $request->faxno;
        
       

        $contactus->save();

        

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('contactus.show', $contactus->id);
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
          $contactus = Contactus::find($id);

        $contactus->delete();

        Session::flash('success', 'The contact details was successfully deleted!');
        
       return redirect() -> route(('contactus.show'),$contactus->id);
    }
}
