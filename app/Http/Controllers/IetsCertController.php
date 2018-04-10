<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IetsCert;
use App\User;
use App\IetsAppe;
use Session;

class IetsCertController extends Controller
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
        $ietscert = IetsCert::all();
        $user = User::all();
        $ietsappe = IetsAppe::all();
        return view('ietscert.create', compact('ietscert', 'user', 'ietsappe'));
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

            'remark' => 'required|max:255',
            'endorse' => 'required',
            'cert' => 'required'

            ));

        $ietscert = new IetsCert;

        $ietscert->name = $request->name;
        $ietscert->nric = $request->nric;
        $ietscert->title = $request->title;
        $ietscert->specialized = $request->specialized;
        $ietscert->endorse = $request->endorse;
        $ietscert->cert = $request->cert;
        $ietscert->remark = $request->remark;
        $ietscert->by = $request->by;

        $ietscert -> save();

        Session::flash('success', 'The certificate endorsement was successfully saved!');

        return redirect() -> route(('ietscert.show'),$ietscert->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ietscert = IetsCert::all();
        return view('ietscert.show', compact('ietscert'));
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
