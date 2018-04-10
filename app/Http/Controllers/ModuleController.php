<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SelfLearning;
use App\Http\Requests\StoreTestRequest;


class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $selflearnings = SelfLearning::where('module', 'Module 1')->get();
        $module = SelfLearning::where('module', 'Module 1')->value('module');
        $title = SelfLearning::where('module', 'Module 1')->value('mtitle');

        if ($request->ajax()) {
            return view('modules.load', ['selflearnings' => $selflearnings, 'module' => $module, 'title' => $title])->render();  
        }

        
        
        

             


            /*if ($module1 == "Module 1") {
                $module = "Module 1";
                $title = SelfLearning::where('module', 'Module 1')->value('mtitle');
            }

                elseif ($selflearnings->module == "Module 2") {
                    $module = SelfLearning::where('module', 'Module 2')->value('module');
                    $title = SelfLearning::where('module', 'Module 2')->value('mtitle');
                }

                elseif ($selflearnings->module == "Module 3") {
                    $module = SelfLearning::where('module', 'Module 3')->value('module');
                    $title = SelfLearning::where('module', 'Module 3')->value('mtitle');
                }

                elseif ($selflearnings->module == "Module 4") {
                    $module = SelfLearning::where('module', 'Module 4')->value('module');
                    $title = SelfLearning::where('module', 'Module 4')->value('mtitle');
                }

                elseif ($selflearnings->module == "Module 5") {
                    $module = SelfLearning::where('module', 'Module 5')->value('module');
                    $title = SelfLearning::where('module', 'Module 5')->value('mtitle');
                }

                else {

                    $module = $selflearnings->value('module');
                    $title = $selflearnings->value('mtitle');

                }*/
            
            //return view('modules.load', ['selflearnings' => $selflearnings, 'module1' => $module1, 'title' => $title])->render();  

            //return view('modules.load', ['selflearnings' => $selflearnings, 'module1' => $module1, 'title1' => $title1])->render();  
        
    

        return view('modules.index', compact('selflearnings','module','title'));
        //return view('tests.create', compact('selflearnings','module','title'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
