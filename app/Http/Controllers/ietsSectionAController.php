<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ietsSectionA;
use App\ietsSectionE;
use App\IetsApplicant;
use App\IetsAppa;
use App\IetsAppInfo;
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
class ietsSectionAController extends Controller
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
        $count=0;
        // return view('ietsSectionA.create')->withCountries($countries);
        $state= State::all();
        $country= Country::all();
            $ietsSectionA = ietsSectionA::where('user_id',Auth::id())->get();
        $ietsApplicant = IetsApplicant::where('user_id','=',Auth::id())->first(); 
            if(ietsSectionA::where('user_id', '=',Auth::id())->exists() && ietsSectionE::where('user_id', '=',Auth::id())->exists()){
                if($ietsApplicant->status==="Declined")
                   
                {   $count=$this->Editable();
                    return view('ietsSectionA.show', compact('ietsSectionA','count'));}
                elseif($ietsApplicant->status==="ReRegister"){$count='1'; return view('ietsSectionA.show', compact('ietsSectionA','count'));}
                return view('ietsSectionE.finish', compact('ietsSectionA'));
            }
            
            else{$count=1;
                 if(ietsSectionA::where('user_id', '=',Auth::id())->exists()){
                return view('ietsSectionA.show', compact('ietsSectionA','state','country','count'));
            }
                else
                     return view('ietsSectionA.create',compact('ietsSectionA','state','country','count'));
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

        $ietsSectionA = new ietsSectionA;
        $ietsapplicant = new IetsApplicant;
        $ietsappa = new IetsAppa;
        $ietsappinfo = new IetsAppInfo;
        // $ietsSectionA->name = $request->name;
        $ietsSectionA->title = $request->title;
        $ietsSectionA->address = $request->address;
        $ietsSectionA->city = $request->city;
        $ietsSectionA->postcode = $request->postcode;
        $ietsSectionA->state = $request->state;
        $ietsSectionA->country_id = $request->country_id;
        $ietsSectionA->mailaddress = $request->mailaddress;
        $ietsSectionA->mailpostcode = $request->mailpostcode;
        $ietsSectionA->email = $request->email;
        $ietsSectionA->bumiputerastatus = $request->bumiputerastatus;
        $ietsSectionA->phoneno = $request->phoneno;
        $ietsSectionA->faxno = $request->faxno;
        $ietsSectionA->placeofissue = $request->placeofissue;
        $ietsSectionA->dateofissue = $request->dateofissue;
        $ietsSectionA->user_id = Auth::id();
        $ietsSectionA->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $ietsSectionA->image = $filename; //save file to which column


        }

        $ietsappa->title = $request->title;
        $ietsappa->address = $request->address;
        $ietsappa->city = $request->city;
        $ietsappa->postcode = $request->postcode;
        $ietsappa->state = $request->state;
        $ietsappa->country_id = $request->country_id;
        $ietsappa->mailaddress = $request->mailaddress;
        $ietsappa->mailpostcode = $request->mailpostcode;
        $ietsappa->email = $request->email;
        $ietsappa->bumiputerastatus = $request->bumiputerastatus;
        $ietsappa->phoneno = $request->phoneno;
        $ietsappa->faxno = $request->faxno;
        $ietsappa->placeofissue = $request->placeofissue;
        $ietsappa->dateofissue = $request->dateofissue;
        $ietsappa->user_id = Auth::id();
        $ietsapplicant->user_id = Auth::id();
        $ietsappinfo->user_id = Auth::id();
        $ietsappa->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $ietsappa->image = $filename; //save file to which column


        }

        $ietsSectionA->save();

        $ietsappa->save();

        $ietsapplicant->save();

        $ietsappinfo->save();

        Session::flash('success', 'The post sucessfull');

        //redirect to another page

        return redirect()->route('ietsSectionA.show', $ietsSectionA->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $count=0;
        $ietsApplicant = IetsApplicant::where('user_id','=',Auth::id())->first(); 
        $ietsSectionA = ietsSectionA::where('user_id',Auth::id())->get();
        if($ietsApplicant->status==="Declined"){
            $count=$this->Editable();
        }
        else{$count=1;}
         return view('ietsSectionA.show', compact('ietsSectionA','count'));
        }
        
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $country= Country::all();
        $state=State::all();
        // find the post in the database and save as a var
        $ietsSectionA = ietsSectionA::find($id);
        
       
        return view('ietsSectionA.edit', compact('ietsSectionA','state','country'));
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
        $ietsSectionA =ietsSectionA::where('user_id','=',$id)->first();
        $ietsapplicant = IetsApplicant::where('user_id','=',$id)->first();
        $ietsappa =  IetsAppa::where('user_id','=',$id)->first();
        $ietsappinfo =  IetsAppInfo::where('user_id','=',$id)->first();
        
        
        // $ietsSectionA->name = $request->name;
        $ietsSectionA->title = $request->title;
        $ietsSectionA->address = $request->address;
        $ietsSectionA->city = $request->city;
        $ietsSectionA->postcode = $request->postcode;
        $ietsSectionA->state = $request->state;
        $ietsSectionA->country_id = $request->country_id;
        $ietsSectionA->mailaddress = $request->mailaddress;
        $ietsSectionA->mailpostcode = $request->mailpostcode;
        $ietsSectionA->email = $request->email;
        $ietsSectionA->bumiputerastatus = $request->bumiputerastatus;
        $ietsSectionA->phoneno = $request->phoneno;
        $ietsSectionA->faxno = $request->faxno;
        $ietsSectionA->placeofissue = $request->placeofissue;
        $ietsSectionA->dateofissue = $request->dateofissue;
        $ietsSectionA->user_id = Auth::id();
        $ietsSectionA->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

        //save image
       
        
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $ietsSectionA->image = $filename; //save file to which column

        }

        $ietsappa->title = $request->title;
        $ietsappa->address = $request->address;
        $ietsappa->city = $request->city;
        $ietsappa->postcode = $request->postcode;
        $ietsappa->state = $request->state;
        $ietsappa->country_id = $request->country_id;
        $ietsappa->mailaddress = $request->mailaddress;
        $ietsappa->mailpostcode = $request->mailpostcode;
        $ietsappa->email = $request->email;
        $ietsappa->bumiputerastatus = $request->bumiputerastatus;
        $ietsappa->phoneno = $request->phoneno;
        $ietsappa->faxno = $request->faxno;
        $ietsappa->placeofissue = $request->placeofissue;
        $ietsappa->dateofissue = $request->dateofissue;
        $ietsappa->user_id = Auth::id();
        $ietsapplicant->user_id = Auth::id();
        $ietsappinfo->user_id = Auth::id();
        $ietsappa->applicant_id = $request->applicant_id;
        // (int)$request->get('width')

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //save image as .png @ etc
            $location = public_path('image/' . $filename); //path image to save
            Image::make($image)->resize(800, 400)->save($location);

            $ietsappa->image = $filename; //save file to which column


        }
        if ($request->has('name')) {
            $user=User::where('id',Auth::user()->id)->first();
            $user->name=$request->name;
            $user->save();
        }

        $ietsSectionA->save();

        $ietsappa->save();

        $ietsapplicant->save();

        $ietsappinfo->save();

        Session::flash('success', 'The data has been updated');

        //redirect to another page

        return redirect()->route('ietsSectionA.show', $ietsSectionA->id);
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
    public function Editable()
    {       
        $ietsApplicant = IetsApplicant::where('user_id','=',Auth::id())->where('section','like','%A%')->count(); 
        return $ietsApplicant;
    }
}
