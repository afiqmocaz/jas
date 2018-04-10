<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Image;
use App\Profile;
use App\User;

class ProfileController extends Controller
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
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'picture' => 'required',
            'name' => 'required',
            'ic' => 'required',
            'dob' => 'required',
            'qp_no' => 'required',
            'specialized_area_1' => 'required',
            'specialized_area_2' => 'required',
            'citizenship' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'qp_status' => 'required',
            'certificate' => 'required',
            'cert_exp_date' => 'required',

            ));
        //store in the database

        $profile = new Profile;

        $profile->name = $request->name;
        $profile->ic = $request->ic;
        $profile->dob = $request->dob;
        $profile->qp_no = $request->qp_no;
        $profile->specialized_area_1 = $request->specialized_area_1;
        $profile->specialized_area_2 = $request->specialized_area_2;
        $profile->citizenship = $request->citizenship;
        $profile->gender = $request->gender;
        $profile->address = $request->address;
        $profile->email = $request->email;
        $profile->phone_no = $request->phone_no;
        $profile->qp_status = $request->qp_status;
        $profile->cert_exp_date = $request->cert_exp_date;

        //save our file
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($picture)->resize(800, 400)->save($location);

            $profile->picture = $filename;
        }

        if ($request->hasFile('certificate')) {
            $file = $request->file('certificate');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $request->file('certificate')->move(base_path() . '/public/images/',$filename); //path file to save

            $profile->certificate = $filename; //save file to which column
        }


        $profile->save();

        Session::flash('success', 'The blog post was successfully save!');

        //redirect to another page
        return redirect()->route('profiles.show', $profile->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        return view('profiles.show')->withProfile($profile);
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
