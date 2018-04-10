<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eiaSectionA;
use App\eiaSectionF;
use App\EiaApplicant;
use App\EiaAppa;
use App\EiaAppInfo;
use App\Country;
use Session;
use Image;
use DB;
use Auth;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use App\User;
use App\State;
class eiaSectionAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //from session
        // return view('ietsSectionA.show', compact('ietsSectionA'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $countries = Country::all();
        // return view('ietsSectionA.create')->withCountries($countries);
        $state= State::all();
        $country= Country::all();
     $eiaSectionA = eiaSectionA::where('user_id',Auth::id())->get();
     $eiaApplicant = EiaApplicant::where('user_id','=',Auth::id())->first(); 
        
            if(eiaSectionA::where('user_id', '=',Auth::id())->exists() && eiaSectionF::where('user_id', '=',Auth::id())->exists()){
                  if($eiaApplicant->status==="Declined")
                  {
                     return view('eiaSectionA.show', compact('eiaSectionA','user'));
                  }
                    else{
                            return view('eiaSectionF.finish', compact('eiaSectionA','user'));
                        }
            }
            
            else{
                 if(eiaSectionA::where('user_id', '=',Auth::id())->exists()){
                return view('eiaSectionA.show', compact('eiaSectionA','user'));
            }
                else
                     return view('eiaSectionA.create',compact('eiaSectionA','state','country'));
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
        $this->validate($request, array('featured_image' => 'required|mimes:png,jpeg,jpg|max:10240',
         'title' => 'required', 'address' => 'required', 
          'city' => 'required', 'postcode' => 'required', 'country_id' => 'required',
            'mailaddress' => 'required', 'mailpostcode' => 'required',
             'email' => 'required', 'bumiputerastatus' => 'required', 'phoneno' => 'required'));

        //store in database

        $eiaSectionA = new eiaSectionA;
        $eiaapplicant = new EiaApplicant;
        $eiaappa = new EiaAppa;
        $eiaappinfo = new EiaAppInfo;
        // $ietsSectionA->name = $request->name;
        $eiaSectionA->title = $request->title;
        $eiaSectionA->address = $request->address;
        $eiaSectionA->city = $request->city;
        $eiaSectionA->postcode = $request->postcode;
        $eiaSectionA->state = $request->state;
        $eiaSectionA->country_id = $request->country_id;
        $eiaSectionA->mailaddress = $request->mailaddress;
        $eiaSectionA->mailpostcode = $request->mailpostcode;
        $eiaSectionA->email = $request->email;
        $eiaSectionA->bumiputerastatus = $request->bumiputerastatus;
        $eiaSectionA->phoneno = $request->phoneno;
        $eiaSectionA->faxno = $request->faxno;
        $eiaSectionA->regNo = $request->regNo;
        $eiaSectionA->placeofissue = $request->placeofissue;
        $eiaSectionA->dateofissue = $request->dateofissue;
        $eiaSectionA->user_id = Auth::id();
        $eiaSectionA->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $eiaSectionA->image = $filename; //save file to which column


        }

        $eiaappa->title = $request->title;
        $eiaappa->address = $request->address;
        $eiaappa->city = $request->city;
        $eiaappa->postcode = $request->postcode;
        $eiaappa->state = $request->state;
        $eiaappa->country_id = $request->country_id;
        $eiaappa->mailaddress = $request->mailaddress;
        $eiaappa->mailpostcode = $request->mailpostcode;
        $eiaappa->email = $request->email;
        $eiaappa->bumiputerastatus = $request->bumiputerastatus;
        $eiaappa->phoneno = $request->phoneno;
        $eiaappa->regNo = $request->regNo;
        $eiaappa->faxno = $request->faxno;
        $eiaappa->placeofissue = $request->placeofissue;
        $eiaappa->dateofissue = $request->dateofissue;
        $eiaappa->user_id = Auth::id();
        $eiaapplicant->user_id = Auth::id();
        $eiaappinfo->user_id = Auth::id();
        $eiaappa->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $eiaappa->image = $filename; //save file to which column


        }

        $eiaSectionA->save();

        $eiaappa->save();

        $eiaapplicant->save();

        $eiaappinfo->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('eiaSectionA.show', $eiaSectionA->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state= State::all();
        $eiaSectionA = eiaSectionA::where('user_id',Auth::id())->get();
        
        
       
         return view('eiaSectionA.show', compact('eiaSectionA','state'));
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
        // find the post in the database and save as a var
        $eiaSectionA = eiaSectionA::find($id);
         $state= State::all();
        $country= Country::all();
       
        return view('eiaSectionA.edit', compact('eiaSectionA','state','country'));
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
            'featured_image' =>'mimes:png,jpeg,jpg|max:10240',
         'title' => 'required', 'address' => 'required', 
          'city' => 'required', 'postcode' => 'required',
            'country_id' => 'required',
            'mailaddress' => 'required', 'mailpostcode' => 'required',
             'email' => 'required', 'bumiputerastatus' => 'required', 'phoneno' => 'required'));

        //store in database
        $id = Auth::user()->id;
        $eiaSectionA =eiaSectionA::where('user_id','=',$id)->first();
        $eiaapplicant = EiaApplicant::where('user_id','=',$id)->first();
        $eiaappa =  EiaAppa::where('user_id','=',$id)->first();
        $eiaappinfo =  EiaAppInfo::where('user_id','=',$id)->first();
        
        
        // $ietsSectionA->name = $request->name;
        $eiaSectionA->title = $request->title;
        $eiaSectionA->address = $request->address;
        $eiaSectionA->city = $request->city;
        $eiaSectionA->postcode = $request->postcode;
        $eiaSectionA->state = $request->state;
        $eiaSectionA->country_id = $request->country_id;
        $eiaSectionA->mailaddress = $request->mailaddress;
        $eiaSectionA->mailpostcode = $request->mailpostcode;
        $eiaSectionA->email = $request->email;
        $eiaSectionA->bumiputerastatus = $request->bumiputerastatus;
        $eiaSectionA->phoneno = $request->phoneno;
        $eiaSectionA->regNo = $request->regNo;
        $eiaSectionA->faxno = $request->faxno;
        $eiaSectionA->placeofissue = $request->placeofissue;
        $eiaSectionA->dateofissue = $request->dateofissue;
        $eiaSectionA->user_id = Auth::id();
        $eiaSectionA->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

        //save image
       
        
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $eiaSectionA->image = $filename; //save file to which column

        }

        $eiaappa->title = $request->title;
        $eiaappa->address = $request->address;
        $eiaappa->city = $request->city;
        $eiaappa->postcode = $request->postcode;
        $eiaappa->state = $request->state;
        $eiaappa->country_id = $request->country_id;
        $eiaappa->mailaddress = $request->mailaddress;
        $eiaappa->mailpostcode = $request->mailpostcode;
        $eiaappa->email = $request->email;
        $eiaappa->bumiputerastatus = $request->bumiputerastatus;
        $eiaappa->phoneno = $request->phoneno;
        $eiaappa->regNo = $request->regNo;
        $eiaappa->faxno = $request->faxno;
        $eiaappa->placeofissue = $request->placeofissue;
        $eiaappa->dateofissue = $request->dateofissue;
        $eiaappa->user_id = Auth::id();
        $eiaapplicant->user_id = Auth::id();
        $eiaappinfo->user_id = Auth::id();
        $eiaappa->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $eiaappa->image = $filename; //save file to which column


        }

        $eiaSectionA->save();

        $eiaappa->save();

        $eiaapplicant->save();

        $eiaappinfo->save();

        Session::flash('success', 'The data has been updated');

        //redirect to another page

        return redirect()->route('eiaSectionA.show', $eiaSectionA->id);
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
    // public function rules()
    // {
    //     return [
    //         'featured_image' => 'required | mimes:jpeg,jpg,png | max:1000',

    //     ];
    // }

    // public function rules()
    // {
    // return [
    //     'width' => 'required|integer|between:1,5'
    // ];
    // }   
}
