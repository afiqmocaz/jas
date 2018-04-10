<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MasterLayoutController;
use Illuminate\Http\Request;
use App\Cert;
use Auth;
use PDF;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\JasvSystem;
use App\User;
class CertController extends Controller
{
    
    public function show($category)
    {
        $data = array();
        $data['category'] = $category;
        $data['master'] = (new MasterLayoutController)->getSec($category);
        $data['expiredDate'] = date('Y-m-d', strtotime('+3 years'));
        
        $data['countApplied'] = count(Cert::where('renewal_status','=','applied')->get());
        $data['countSp'] = count(Cert::where('renewal_status','=','payment_submitted')->get());
        
        return view('secretariat.view_cert')->with($data);
    }
    
    public function renewalStatus($category,$renewal_status)
    {
        $title = "";
      
        if($renewal_status === 'applied'){ 
            $title = 'Applied Certificate Renewal';
            
            $listActionStatus = [
                'approve' => 'Approve', 
                'reject' => 'Reject', 
            ];
            
        }
        if($renewal_status === 'payment_submitted'){ 
            $title = 'Grant Certificate Renewal';
            
            $listActionStatus = [
                'granted' => 'Granted', 
                'not_granted' => 'not_granted', 
            ];
        }
        
        $data = array();
        $data['category'] = $category;
        $data['master'] = (new MasterLayoutController)->getSec($category);
        $data['expiredDate'] = date('Y-m-d', strtotime('+3 years'));
         
        $data['renewal_status'] = $renewal_status;
        $data['title'] = $title;
        $data['listActionStatus'] = $listActionStatus;
   
        return view('secretariat.view_cert_renewal')->with($data);
    }
    
    public function find(Request $req) {

        $join = array();
        
        $join[] = 'statusBy';
        $join[] = 'endorsementBy';
        
        $join[] = 'user.certEiaSectionA';
        $join[] = 'user.certEiaSectionE';
        
        $join[] = 'user.certIetsSectionA';
        $join[] = 'user.certIetsSectionE';
        
        $join[] = 'user.certApcsSectionA';
        $join[] = 'user.certApcsSectionE';
       
        $builder = Cert::with($join);
        if(!empty($req->category)){
            $builder->where('category','=', $req->category);
        }
        
         if(!empty($req->renewal_status)){
            $builder->where('renewal_status','=', $req->renewal_status);
        }

        $res = new \stdClass();
        $res->data = $builder->orderBy('updated_at','DESC')->get();;
        return json_encode($res);
    }
    
    public function certificateApproval(Request $req){
        
      
        $ob = Cert::find($req->id);
        $ob->endorse = $req->endorse;
        $ob->expired = $req->expired;
        $ob->remark = $req->remark;
        $ob->status = $req->status;
        $ob->endorsement_by = Auth::user()->id;
        $ob->status_by = Auth::user()->id;
        $ob->update();
        
        $textList[] = "Please be informed";
       
        
        $user = User::find($ob->user_id);
        $data = array();
        $data['name'] = $user->name;
        
        if($ob->status === "certified"){
            $textList[] = "Your certificate for ".strtoupper($req->category)." consultant have been approved, please Log In to view";
        }else{
            $textList[] = "Your certificate for ".strtoupper($req->category)." consultant is not certified, please contact admin for detail";
        }
       
        
        $data['textList'] = $textList;
        
        Mail::to($user)->send(new JasvSystem($data));
       
        return redirect('/cert/'.$ob->category);
        
    }
    
    public function template($id){
        $join = array();
        
        $join[] = 'user.certEiaSectionA';
        $join[] = 'user.certEiaSectionE';
        
        $join[] = 'user.certIetsSectionA';
        $join[] = 'user.certIetsSectionE';
        
        $join[] = 'user.certApcsSectionA';
        $join[] = 'user.certApcsSectionE';
        
        $data = Cert::with($join)->find($id);
        
        if($data->status === "certified"){
                 $pdf = PDF::loadView('certificate.certificate_template', compact('data'))->setPaper([0, 0, 576, 753], 'portrait');
            return $pdf->stream('certificate.pdf');
        }else return "Not authoriz";
    
       
       
    }
    
    
    public function certificateStatus(Request $req){
       
        $ob = Cert::find($req->id);
        $ob->renewal_status = $req->renewal_status;
        
        if($req->renewal_status === "granted"){
            $ob->expired = $req->expired;
        }
        
        $ob->update();
        
        
        $textList[] = "Please informed";
        if($req->renewal_status === "granted"){
            $textList[] = "Your certificate has been renewed, please log in to system to view new expired date";
        }
         if($req->renewal_status === "not_granted"){
            $textList[] = "Your certificate is not granted for renewal, Please contact secretariat ".  strtoupper($ob->category)." for futher detail";
        }
        
        if($req->renewal_status === "approve"){
            $textList[] = "Your certificate has been approved for renewal, Please pay RM 300 for renewal fee";
            $textList[] = "Please log in to ".  strtoupper($ob->category)." Consultant to make payment";
        }
        
        if($req->renewal_status === "reject"){
            $textList[] = "Your certificate has been rejected approved for renewal.";
            $textList[] = "Please contact secretariat ".  strtoupper($ob->category).' for futher detail';
        }
        
        $user = User::find($ob->user_id);
        $data = array();
        $data['name'] = $user->name;
        $data['textList'] = $textList;
        
        Mail::to($user)->send(new JasvSystem($data));
        
       
        Session::flash('message', 'Status successfully updated'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('cert_renewal/'.$ob->category.'/'.$req->page_renewal_status);
        
    }
    
    public function applyRenewal(Request $req){
        
        $ob = Cert::find($req->id);
        $ob->renewal_status = 'applied';
        $ob->update();
       
        Session::flash('message', 'Successfully Applied Renewal'); 
        Session::flash('alert-class', 'alert-success'); 
        
        return redirect('consultant_cert/'.$ob->category);
        
    }
    
    //certificate payment
    //table - payments
    //col
    //type = renewal_cert
    //payment_for = certificate id
    
    
}
