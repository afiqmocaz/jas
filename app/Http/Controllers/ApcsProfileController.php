<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\apcsSectionA;
use App\Cert;
use App\User;
use Illuminate\Support\Facades\Session;

class ApcsProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*  $profiles=IetsCert::where('user_id',Auth::id())->get();
        $profiles=IetsCert::where('user_id',Auth::id())->get();
        $user = User::all();
        $eiaSectionA=ietsSectionA::where('user_id',Auth::id())->get();
        // $eiaappe = eiaSectionE::where('user_id',Auth::id())->get();
        return view('ietsprofiles.create', compact('profiles','user','eiaSectionA','eiaappe'));*/

       // return view('ietsprofiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = 'apcs';
        $sectionA=apcsSectionA::where('user_id',Auth::id())->first();
        $cert = Cert::where('user_id',Auth::id())->where('category','=',$category)->first();
        return view('apcsprofiles.create', compact('cert','sectionA','category'));
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
        $category = 'apcs';
        $sectionA=apcsSectionA::where('user_id',Auth::id())->first();
        $cert = Cert::where('user_id',Auth::id())->where('category','=',$category)->first();
        
     
        return view('apcsprofiles.edit',compact('category','sectionA','cert'));
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

            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'state' => 'required',
            'email' => 'required',
            'phoneno' => 'required',
            'country_id' => 'required'

            ));
        
        $iets = apcsSectionA::find($id);

        $iets->address = $request->input('address');
        $iets->city = $request->input('city');
        $iets->postcode = $request->input('postcode');
        $iets->state = $request->input('state');
        $iets->email = $request->input('email');
        $iets->phoneno = $request->input('phoneno');
        $iets->country_id = $request->input('country_id');
        $iets->update();

        Session::flash('success', 'The personal profile has been updated!');

        return redirect('apcsprofiles/create');
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
