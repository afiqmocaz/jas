<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apcsSectionA;
use App\apcsSectionF;
use App\Applicant;
use App\ApcsAppa;
use App\AppInfo;
use App\Country;
use Session;
use Image;
use DB;
use Auth;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use App\State;
use App\User;
class apcsSectionAController extends Controller
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
     $apcsSectionA = apcsSectionA::where('user_id',Auth::id())->get();
     $apcsApplicant = Applicant::where('user_id','=',Auth::id())->first();    
            if(apcsSectionA::where('user_id', '=',Auth::id())->exists() && apcsSectionF::where('user_id', '=',Auth::id())->exists()){
                if($apcsApplicant->status==="Declined")
                  {return view('apcsSectionA.show', compact('apcsSectionA','state','country'));}
                return view('apcsSectionF.finish', compact('apcsSectionA'));
            }
            
            else{
                 if(apcsSectionA::where('user_id', '=',Auth::id())->exists()){
                return view('apcsSectionA.show', compact('apcsSectionA','state','country'));
            }
                else
                     return view('apcsSectionA.create',compact('apcsSectionA','state','country'));
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
        $this->validate($request, array('featured_image' => 'required',
         'title' => 'required', 'address' => 'required', 
          'city' => 'required', 'postcode' => 'required', 
          'country_id' => 'required',
            'mailaddress' => 'required', 'mailpostcode' => 'required',
             'email' => 'required', 'bumiputerastatus' => 'required', 'phoneno' => 'required'));

        //store in database

        $apcsSectionA = new apcsSectionA;
        $apcsapplicant = new Applicant;
        $apcsappa = new ApcsAppa;
        $apcsappinfo = new AppInfo;
        // $ietsSectionA->name = $request->name;
        $apcsSectionA->title = $request->title;
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
        $apcsSectionA->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $apcsSectionA->image = $filename; //save file to which column


        }

        $apcsappa->title = $request->title;
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
        $apcsapplicant->user_id = Auth::id();
        $apcsappinfo->user_id = Auth::id();
        $apcsappa->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

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

        $apcsapplicant->save();

        $apcsappinfo->save();

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
        $state= State::all();
        $country= Country::all();
        $apcsSectionA = apcsSectionA::where('user_id',Auth::id())->get();
        
        
       
         return view('apcsSectionA.show', compact('apcsSectionA','state','country'));
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
        $state= State::all();
        $country= Country::all();
        $apcsSectionA = apcsSectionA::find($id);
        
       
        return view('apcsSectionA.edit', compact('apcsSectionA','state','country'));
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
         'title' => 'required', 'address' => 'required', 
          'city' => 'required', 'postcode' => 'required',
            'country_id' => 'required',
            'mailaddress' => 'required', 'mailpostcode' => 'required',
             'email' => 'required', 'bumiputerastatus' => 'required', 'phoneno' => 'required'));

        //store in database
         $id = Auth::user()->id;
        $apcsSectionA =apcsSectionA::where('user_id','=',$id)->first();
        $apcsapplicant = Applicant::where('user_id','=',$id)->first();
        $apcsappa =  ApcsAppa::where('user_id','=',$id)->first();
        $apcsappinfo =  AppInfo::where('user_id','=',$id)->first();
        
        if ($request->has('name')) {
            $user=User::where('id',Auth::user()->id)->first();
            $user->name=$request->name;
            $user->save();
        }
        // $ietsSectionA->name = $request->name;
        $apcsSectionA->title = $request->title;
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
        $apcsSectionA->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

        //save image
       
        
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $apcsSectionA->image = $filename; //save file to which column

        }

        $apcsappa->title = $request->title;
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
        $apcsapplicant->user_id = Auth::id();
       // $apcsappinfo->user_id = Auth::id();
     //   $apcsappa->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

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

        $apcsapplicant->save();

       // $apcsappinfo->save();

        Session::flash('success', 'The data has been updated');

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
