<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Hash;
use Adldap\Laravel\Facades\Adldap;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('users.create',compact('roles'));
    }
  public function summary()
  {
              $qzB = QuizSession::query();
        $qzB->where('user_id', '=', Auth::user()->id)->first();
        $qzB->where('type', '=', 'exam');
        $qzB->where('exam_schedule', '=', $scheduleId);
        $qz = $qzB->first();

        foreach (json_decode($qz->question_data) as $questionId) {
            $questionData = QuestionList::with('quizModule','correctOption')->find($questionId);
            $questionList[] = $questionData;
        }
$master = (new MasterLayoutController())->getSec('iets');
              return view('tests.summary', compact('questionList','master'));
  }
    // test get data user from LDAP server
    // add by azhari, azhari@nafa.my
    public function ldapF(Request $request)
    {
        //dd("TEST");
    
           if(!empty($request['emailx'])){
                $email= $request['emailx'];
                 $getuser = Adldap::search()->users()->find($email);
        }
        else{
            $getuser = Adldap::search()->users()->find('temp@doe.gov.my');
        }

        $cn = $getuser->cn; // nama pengguna        
        $title = $getuser->title; // jawatan pengguna
        $branch = $getuser->physicaldeliveryofficename;
        $email=$getuser->userprincipalname;
        $roles = Role::pluck('display_name','id');
        //$passData = array('cn'=>$cn, 'title'=>$title, 'branch'=>$branch);
        //return $getuser->cn;
        return view('users.ldap', compact('cn','title','branch','roles','email'));
        //return view('users.ldap')->with($passData);
    }

    // add by azhari, azhari@nafa.my
    public function ldapF2(Request $req)
    {
 if (!empty($req['email'])) {
           
             $getuser = Adldap::search()->users()->find($req['email']);
        }
       
        $cn1 = $getuser->cn; // nama pengguna        
        //$title = $getuser->title; // jawatan pengguna
        //$branch = $getuser->physicaldeliveryofficename;

        $roles = Role::pluck('display_name','id');
        //$passData = array('cn'=>$cn, 'title'=>$title, 'branch'=>$branch);
        //return $getuser->cn;
        return $getuser;
        //return view('users.ldap')->with($passData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'nric' => 'required|max:12|unique:users',
            'email' => 'required|email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('display_name','id');
       $userRole = $user->roles->pluck('id','id')->toArray();

        return view('users.edit',compact('user','roles','userRole'));
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
        

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = User::findOrFail($id);
       $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();

        
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}

