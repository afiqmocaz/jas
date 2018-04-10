<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use Session;
use App\ExamCandidate;
use App\Payment;
use Auth;

class ExamController extends Controller
{
    public function getExamCandidate($paymentId){
       
        $examCandidate = ExamCandidate::with(['ivSchedule','examSchedules'])->where('payment_id','=',$paymentId)->orderBy('id', 'desc')->first();
       
       return $examCandidate;
    }
}
