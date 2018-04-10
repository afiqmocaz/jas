<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apcsSectionA;
use App\apcsSectionF;
use App\Applicant;
use App\ApcsAppa;
use App\Country;
use Session;
use Image;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use DB;
use Auth;
use App\mainReg;
use App\AppInfo;

class apcsSectionAController extends Controller
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
       // $countries = Country::all();
       //  return view('apcsSectionA.create')->withCountries($countries);
     $apcsSectionA = apcsSectionA::where('user_id',Auth::id())->get();
        
            if(apcsSectionA::where('user_id', '=',Auth::id())->exists() && apcsSectionF::where('user_id', '=',Auth::id())->exists()){
                return view('apcsSectionF.finish', compact('apcsSectionA'));
            }
            
            else{
                 if(apcsSectionA::where('user_id', '=',Auth::id())->exists()){
                return view('apcsSectionA.show', compact('apcsSectionA'));
            }
                else
                     return view('apcsSectionA.create');
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array('title' => 'required', 'address' => 'required',
          'city' => 'required', 'postcode' => 'required',
           'state' => 'required', 'country_id' => 'required',
            'mailaddress' => 'required', 'mailpostcode' => 'required',
             'email' => 'required', 'bumiputerastatus' => 'required', 'phoneno' => 'required'));

            // 'name' => 'required',

                //store in database
        $applicant = new Applicant;
        $apcsappa = new ApcsAppa;
        $apcsSectionA = new apcsSectionA;
        $appinfo = new AppInfo;
        // $apcsSectionA->name = $request->name;
        $apcsSectionA->title = $request->title;
        $apcsappa->title = $request->title;

        $apcsSectionA->address = $request->address;
        $apcsSectionA->city = $request->city;
        $apcsSectionA->postcode = $request->postcode;
        $apcsSectionA->state = $request->state;
        $apcsSectionA->country_id = $request->country_id;
        $apcsSectionA->mailaddress = $request->mailaddress;
        $apcsSectionA->mailpostcode = $request->mailpostcode;
        $apcsSectionA->email = $request->email;
        $apcsSectionA->bumiputerastatus = $request->bumiputerastatus;
        $apcsSectionA->phoneno = $request->phoneno;
        $apcsSectionA->faxno = $request->faxno;
        $apcsSectionA->placeofissue = $request->placeofissue;
        $apcsSectionA->dateofissue = $request->dateofissue;
        $apcsSectionA->user_id = Auth::id();
        $applicant->user_id = Auth::id();
        $appinfo->user_id = Auth::id();
        $apcsSectionA->applicant_id = $request->applicant_id;

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $apcsSectionA->image = $filename; //save file to which column
        }

        $apcsappa->address = $request->address;
        $apcsappa->city = $request->city;
        $apcsappa->postcode = $request->postcode;
        $apcsappa->state = $request->state;
        $apcsappa->country_id = $request->country_id;
        $apcsappa->mailaddress = $request->mailaddress;
        $apcsappa->mailpostcode = $request->mailpostcode;
        $apcsappa->email = $request->email;
        $apcsappa->bumiputerastatus = $request->bumiputerastatus;
        $apcsappa->phoneno = $request->phoneno;
        $apcsappa->faxno = $request->faxno;
        $apcsappa->placeofissue = $request->placeofissue;
        $apcsappa->dateofissue = $request->dateofissue;
        $apcsappa->user_id = Auth::id();
        $apcsappa->applicant_id = $request->applicant_id;

        $appinfo->email = $request->email;

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $apcsappa->image = $filename; //save file to which column
        }


        $apcsSectionA->save();

        $apcsappa->save();

        $applicant->save();

        $appinfo->save();

        // $mainReg = new mainReg;
        //  $mainReg->status_id = $request->status_id;

        // $mainReg->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('apcsSectionA.show', $apcsSectionA->id);
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
         $apcsSectionA = apcsSectionA::where('user_id',Auth::id())->get();
        //from session
         return view('apcsSectionA.show', compact('apcsSectionA'));
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
         $apcsSectionA = apcsSectionA::find($id);

        //return the view and pass in the var we previously created
        return view('apcsSectionA.edit', compact('apcsSectionA'));
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
        $this->validate($request, array('title' => 'required', 'address' => 'required',
          'city' => 'required', 'postcode' => 'required',
           'state' => 'required', 'country_id' => 'required',
            'mailaddress' => 'required', 'mailpostcode' => 'required',
             'email' => 'required', 'bumiputerastatus' => 'required', 'phoneno' => 'required'));

            // 'name' => 'required',

                //store in database
        $applicant = Applicant::find($id);
        $apcsappa =  ApcsAppa::find($id);
        $apcsSectionA =  apcsSectionA::find($id);
        $appinfo =  AppInfo::find($id);
        // $apcsSectionA->name = $request->name;
        $apcsSectionA->title = $request->title;
        $apcsappa->title = $request->title;

        $apcsSectionA->address = $request->address;
        $apcsSectionA->city = $request->city;
        $apcsSectionA->postcode = $request->postcode;
        $apcsSectionA->state = $request->state;
        $apcsSectionA->country_id = $request->country_id;
        $apcsSectionA->mailaddress = $request->mailaddress;
        $apcsSectionA->mailpostcode = $request->mailpostcode;
        $apcsSectionA->email = $request->email;
        $apcsSectionA->bumiputerastatus = $request->bumiputerastatus;
        $apcsSectionA->phoneno = $request->phoneno;
        $apcsSectionA->faxno = $request->faxno;
        $apcsSectionA->placeofissue = $request->placeofissue;
        $apcsSectionA->dateofissue = $request->dateofissue;
        $apcsSectionA->user_id = Auth::id();
        $applicant->user_id = Auth::id();
        $appinfo->user_id = Auth::id();
        $apcsSectionA->applicant_id = $request->applicant_id;

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $apcsSectionA->image = $filename; //save file to which column
        }

        $apcsappa->address = $request->address;
        $apcsappa->city = $request->city;
        $apcsappa->postcode = $request->postcode;
        $apcsappa->state = $request->state;
        $apcsappa->country_id = $request->country_id;
        $apcsappa->mailaddress = $request->mailaddress;
        $apcsappa->mailpostcode = $request->mailpostcode;
        $apcsappa->email = $request->email;
        $apcsappa->bumiputerastatus = $request->bumiputerastatus;
        $apcsappa->phoneno = $request->phoneno;
        $apcsappa->faxno = $request->faxno;
        $apcsappa->placeofissue = $request->placeofissue;
        $apcsappa->dateofissue = $request->dateofissue;
        $apcsappa->user_id = Auth::id();
        $apcsappa->applicant_id = $request->applicant_id;

        $appinfo->email = $request->email;

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $apcsappa->image = $filename; //save file to which column
        }


        $apcsSectionA->save();

        $apcsappa->save();

        $applicant->save();

        $appinfo->save();

        // $mainReg = new mainReg;
        //  $mainReg->status_id = $request->status_id;

        // $mainReg->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('apcsSectionA.show', $apcsSectionA->id);
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
