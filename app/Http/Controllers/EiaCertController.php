<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EiaCert;
use App\User;
use App\EiaAppe;
use Session;

class EiaCertController extends Controller
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
        $eiacert = EiaCert::all();
        
        $builder = User::whereHas('specialized', function($q) {
                $q->whereNotNull('user_id');
           });
        $user = $builder->get();
        $eiaappe = EiaAppe::whereHas('user', function($q) {
                $q->whereNotNull('user_id');
           });
        $eiaappe = $builder->get();
        return view('eiacert.create', compact('eiacert', 'user', 'eiaappe'));
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

        $eiacert = new EiaCert;

        $eiacert->title = $request->title;
        $eiacert->endorse = $request->endorse;
        $eiacert->expired = $request->expired;
        $eiacert->remark = $request->remark;
        $eiacert->status = $request->status;
        $eiacert->by = $request->by;
        $eiacert->certno= str_rand(6);
        $eiacert -> save();

        Session::flash('success', 'The certificate endorsement was successfully saved!');

        return redirect() -> route(('eiacert.create'),$eiacert->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eiacert = EiaCert::all();
        return view('eiacert.show', compact('eiacert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $eiacert = EiaCert::where('user_id','=',$user_id)->first();
        $user = User::find($user_id);
        $eiaappe = eiaAppe::where('user_id','=',$user_id)->first();
        $array = array_merge($user->toArray(), $eiacert->toArray(), $eiaappe->toArray());
        return view('eiacert.edit')->witheiacert($eiacert)->withuser($user)->witheiaappe($eiaappe)->witharray($array);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $eiacert = EiaCert::find($user_id);

        $eiacert->endorse = $request->endorse;
        $eiacert->expired = $request->expired;
        $eiacert->remark = $request->remark;
        $eiacert->status = $request->status;
        $eiacert->by = $request->by;

        $eiacert -> save();

        Session::flash('success', 'The certificate endorsement was successfully saved!');

        return redirect() -> route(('eiacert.create'),$eiacert->id);
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


    public function getClientNumber(){
         do{
             $rand = $this->generateRandomString(6);
          }while(!empty(EiaCert::where('certno',$rand)->first()));
           return $rand;
        }



    public function generateRandomString($length) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
     }
}
