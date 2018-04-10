<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Session;

class BankController extends Controller
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
        return view('bank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank = new Bank;

        $bank->fileToUpload = $request->fileToUpload;
        $bank->specialized = $request->specialized;
        $bank->question = $request->question;
        $bank->i = $request->i;
        $bank->ii = $request->ii;
        $bank->iii = $request->iii;
        $bank->iv = $request->iv;
        $bank->a = $request->a;
        $bank->b = $request->b;
        $bank->c = $request->c;
        $bank->d = $request->d;
        $bank->correct = $request->correct;
        $bank->related = $request->related;
        $bank->level = $request->level;

        $bank -> save();

        Session::flash('success', 'The question has been added to the question bank!');

        return redirect() -> route(('bank.show'),$bank->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = Bank::all();
        return view('bank.show', compact('bank'));
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
