<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\User;
use Session;
use App\Cert;
class PaymentController extends Controller
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
    
    public function paymentfor($paymentfor){
        
        $category = $paymentfor;
        $title = "Pre-Qualification Payment of Applicant";
        
        $cert = Cert::find($paymentfor);
        
        if(!empty($cert)){
            $category = $cert->category;
            
            $title = "Certificate Renewal payment";
        }
          
        $payments = Payment::with('user')
                ->where('payment_for','=',$paymentfor)
                ->orderBy('id','desc')->get();
                   
        $masterCtrl = new MasterLayoutController;
        $master = $masterCtrl->getSec($category);
        
        return view('payment.create', compact('category','payments','user','paymentfor','master','title','cert'));
    }
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $payments = Payment::with('user')->get();
        //$user = User::all();
      
       return view('payment.create', compact('payments','user'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment;
        $payment->by = $request->by;
        $payment->status = $request->status;

        $payment -> save();

        Session::flash('success', 'The payment information has been added!');

        return redirect() -> route(('payment.show'),$payment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::all();
        $user = User::all();
        
        return view('payment.show', compact('payment', 'user'));
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
    
    
    public function find(Request $req){
        
        $payments = Payment::with('user')
                ->where('payment_for','=',$req->category)
                ->orderBy('created_at','desc')->get();
       
        $res = new \stdClass();
        $res->data = $payments;
        return json_encode($res);
    }
    
}