<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class StudUpdateController extends Controller
{
 public function index(){
$users = DB::select('select * from student');
return view('cookie.stud_edit_view',['users'=>$users]);
}
public function show($id)
 {
 	$startexam=1;
 $users = DB::select('select * from student where id = ?',[$id]);
return view('cookie.stud_update',['users'=>$users,'startexam'=>$startexam]);
 }
public function edit(Request $request,$id)
 {
 	//startexam+1->session punyer no
$name = $request->input('stud_name');
DB::update('update student set name = ? where id = ?',[$name,$id]);
echo "Record updated successfully.<br/>";
echo '<a href="/edit-records">Click Here</a> to go back.';
 }
}