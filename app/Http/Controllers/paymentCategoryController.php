<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\paymentCategory;
use App\PayInfo;
use App\Payment;
use App\EiaPayInfo;
use App\EiaPayment;
use App\IetsPayInfo;
use App\IetsPayment;
use App\AssignApp;
use App\EiaAssignApp;
use App\IetsAssignApp;
use App\Rubric;
use App\EiaRubric;
use App\IetsRubric;
use App\ProIv;
use App\EiaProIv;
use App\IetsProIv;
use App\IvSchedule;
use App\EiaIvSchedule;
use App\IetsIvSchedule;
use Validator;
use Response;
use Redirect;
use Session;
use App\Uploads;
use DB;
use Auth;
use Mail;
use App\Cert;

class paymentCategoryController extends Controller
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
        return view('paymentCategory.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $file = $request->file('receipt');
     
        
        
        $paymentfor = $request->paymentfor;

        $this->validate($request, array('type' => 'required', 'paymentType' => 'required', 'amount' => 'required',
            'date' => 'required|before:tomorrow', 'referenceNo' => 'required'));
       

        $payment = new Payment();

        $payment->type = $request->type;
        $payment->paymentType = $request->paymentType;
        $payment->user_id = Auth::user()->id;
        $payment->payment_for = $paymentfor;
        $payment->save();
      
        
        $payinfo = new PayInfo;
        $payinfo->payment_id = $payment->id;
        $payinfo->amount = $request->amount;
        $payinfo->date = $request->date;
        $payinfo->referenceNo = $request->referenceNo;
        $payinfo->user_id = Auth::id();
        $payinfo->applicant_id = $request->applicant_id;
        
        if ($request->hasFile('receipt')) {
            $file = $request->file('receipt');
            $filename = time() . '.' . $file->getClientOriginalExtension(); //save image as .png @ etc
            $request->file('receipt')->move(base_path() . '/public/backend/uploads/', $filename); //path file to save
            $payinfo->slip = $filename;
        }

        if ($request->paymentType === 'fpx') {
            $payinfo->slip = 'fpx_dummy';
        }

        $payinfo->save();
        
        if ($request->type === 'renewal_cert') {
            $cert = Cert::where('category',$paymentfor)->where('user_id',Auth::id())->first();
            $cert->renewal_status = "payment_submitted";
            $cert->update();
        }
        

        $request->session()->flash('success', 'The post sucessfull');
        return back()->with('message','Success');
    }

   
}
