<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class StudInsertController extends Controller
{
 public function insertform(){
 	$startexam=1;//ambik dari session
return view('cookie.stud_create',['startexam'=>$startexam]);
    }
	
public function insert(Request $request){
$name = $request->input('stud_name');
DB::insert('insert into student (name) values(?)',[$name]);
echo "Record inserted successfully.<br/>";
echo '<a href="/insert">Click Here</a> to go back.';
}

public function setCookie(Request $request){
	$minutes = 1;
$response = new Response();
$response->withCookie(cookie()->forever('cname', '1'));
return $response;
}
public function getCookie(Request $request){
$value = $request->cookie('cname');
echo $value;
}


}
