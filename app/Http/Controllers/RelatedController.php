<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Related;

class RelatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relates = Related::all();

        return view('related.index')->withrelates($relates);
    }
    
    public function category($category){
        
        $relates = Related::where('category','=',$category)->get();
        
        return view('related.index')->with(compact('category','relates'));
    }

    public function store(Request $request)
    {
        $relates = new Related;
        $relates->category = $request->category;
        $relates->related = $request->related;
        $relates->save();

        return back();
    }

   
    public function destroy($id)
    {
        $relates = Related::find($id);

        $relates->delete();

        return back();
    }
}
