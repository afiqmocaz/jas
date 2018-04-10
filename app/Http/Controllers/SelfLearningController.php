<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\SelfLearning;
use Session; 
use storage;
use Validator;
use Response;
use Redirect;
use App\Uploads;
use Image;
use DB;
use Auth;
use App\QuizModul;
use App\Http\Controllers\MasterLayoutController;

class SelfLearningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selflearning = SelfLearning::all();
        return view('selflearning.show', compact('selflearning'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('selflearning.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(

            'title' => 'required|max:255',
            'mtitle' => 'required|max:255',
            'fileToUpload' => 'required'

            ));

        //store in the database
        $selflearning = new SelfLearning;

        $selflearning->module = $request->module;
        $selflearning->mtitle = $request->mtitle;
        $selflearning->submodule = $request->submodule;
        $selflearning->title = $request->title;
        $selflearning->fileToUpload = $request->fileToUpload;

        $selflearning -> save();

        Session::flash('success', 'The self learning module has been added!');

        return redirect() -> route(('selflearning.selfLearningList'),$selflearning->module);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $selflearning = SelfLearning::all();
        return view('selflearning.show', compact('selflearning'));
    }
    
    public function viewByQuizModul($moduleId){
       
        $selflearningBuilder = SelfLearning::with('quizModul');
        $selflearning = $selflearningBuilder->where('module','=',$moduleId)->get();
        //dd($selflearning);

        // azhari mustapa, azhari@nafa.my : begin
        $quizModul = QuizModul::where('id','=',$moduleId)->get()->first();
        //dd($quizModul->category);

        $masterCtrl = new MasterLayoutController();
        // $category = $selflearning;
        // dd($category);
        $master = $masterCtrl->getSec($quizModul->category);
        $type = $quizModul->type;
        $category = $quizModul->category;
        // azhari mustapa, azhari@nafa.my : end
     
        return view('selflearning.selfLearningList', compact('master','selflearning','moduleId','type','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    $modules =QuizModul::where('category','eia')->where('type','quiz')->get() ;
        $selflearning = SelfLearning::find($id);

        $masterCtrl = new MasterLayoutController();
        // $category = $selflearning;
        //dd($modules[0]->category);
        $master = $masterCtrl->getSec($modules[0]->category);
        $type = $modules[0]->type;
        $category = $modules[0]->category;

        return view('selflearning.edit',compact('modules','master','type','category'))->withselflearning($selflearning);
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
        $this->validate($request, array(

            'title' => 'required|max:255',
            'mtitle' => 'required|max:255',
            'original_filename' => 'required'

            ));

        $selflearning = SelfLearning::find($id);
        $selflearning->module = $request->input('module');
        $selflearning->mtitle = $request->input('mtitle');
        $selflearning->submodule = $request->input('submodule');
        $selflearning->title = $request->input('title');
        $selflearning->original_filename = $request->input('original_filename');
        $selflearning->user_id=Auth::user()->id;
// return $selflearning->module;
        $selflearning -> save();

        Session::flash('success', 'The self learning module has been updated!');

       return  redirect('quizModul/selflearning/'.$request->input('module'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selflearning = SelfLearning::find($id);
        
        $module = $selflearning->module;

        $selflearning->delete();

        Session::flash('success', 'The self learning module has been deleted!');
        return  redirect('quizModul/selflearning/'.$module);
    }

    public function multiple_upload(Request $request) {
      // getting all of the post data
      $files = Input::file('fileToUpload');
      // Making counting of uploaded images
      $file_count = count($files);
      // start count how many uploaded
      $uploadcount = 0;

      foreach ($files as $file) {
        $rules = array('file' => 'required|mimes:pdf,doc,docx,txt|max:10240'); //'required|mimes:pdf'
        $validator = Validator::make(array('file'=> $file), $rules);
        if($validator->passes()){
          $destinationPath = 'uploads'; // upload folder in public directory
          $filename = $file->getClientOriginalName();
          $upload_success = $file->move($destinationPath, $filename);
          $uploadcount ++;

          // save into database
          $extension = $file->getClientOriginalExtension();
          $entry = new SelfLearning();
          $entry->module = $request->module;
          $entry->mtitle = $request->mtitle;
          $entry->submodule = $request->submodule;
          $entry->title = $request->title;
          $entry->mime = $file->getClientMimeType();
          $entry->original_filename = $filename;
          $entry->filename = $file->getFilename().'.'.$extension;
          $entry->save();
        }
      }
       return  redirect('quizModul/selflearning/'.$request->module);
    }
}
