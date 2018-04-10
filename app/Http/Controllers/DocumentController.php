<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Document;
use Flash;
use Intervention\Image\Facades\Image as Image;
use Response;
use Auth;

/**
 * Class DocumentController
 * @package App\Http\Controllers
 */
class DocumentController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->model = new Document();
        $this->rootPath= public_path();
        $this->deleteAnonymous();
    }

    public function deleteAnonymous(){
        $files=Document::where('upload_type','App\Models\Anonymous')
            ->where('created_at','<',\Carbon\Carbon::now()->subMinutes(1)->toDateTimeString())->get();
        foreach($files as $file){
            $this->delete($file->id);
        }
    }

    /**
     * @var string
     */
    public $subPath="uploads";

    /**
     * @var string
     */
    public $delete="delete";

    /**
     * @param $image
     */
    private function imageAuth($image){
        /* $image->product()->where('company_id',user()->company_exporter_id)->firstOrFail(); */
    }

    /**
     * @param string $name
     * @return string
     */
    public function path($name= ""){
        return "file://" . $this->rootPath . "/" . $this->subPath . "/" . $name;
    }

    /**
     * @param $file
     */
    private function fileType(&$file){

        $url = url($this->subPath."/");
        $file_parts = pathinfo($file['filename']);

        switch($file_parts['extension'])
        {
            case "jpg": case "png":

                $path= $this->path($file['filename']);
                $data = getimagesize($path);

                $file["dimensions"] = "$data[0] * $data[1]";
                $file["thumbnailUrl"] = $url."/thumbnailUrl/".$file['filename'];

                break;

            case "doc": case "dot": case "wbk": case "docx": case "docm": case "dotx": case "dotm": case "docb":

                $file["thumbnailUrl"] = $url."/icons/doc.png";
                break;

            // case "xlsx":
            // case "xlsm":
            // case "xltm":

            //     $file["thumbnailUrl"] = $url."/icons/xls.png";
            //     break;

            case "pdf": case "PDF":

                $file["thumbnailUrl"] = $url."/icons/pdf.png";
                break;

        }
    }


    /**
     * @param $file
     * @return mixed
     */
    private function fileJson($file)
    {

        $file= $file->toArray();

        $path = $this->path($file['filename']);

        /* if(! file_exists($path)) return false; */

        $this->fileType($file);

        $url = url("/".$this->subPath."/");

        $file["size"] = filesize($path);

        $file["url"] = $url."/".$file['filename'];

        $file["deleteUrl"] = "/document/delete/" . $file['id'];

        $file["deleteType"] = 'POST';

        return $file;
    }

    /**
     * @param $type
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function find($type,$id){
        return $this->model->where('upload_type',$type)->where('exam_candidate_id',$id)->get();
    }

    /**
     * @param $type
     * @param $id
     * @return string
     */
    public function get($type,$id)
    {
        $model =$this->find($type,$id);
        $files=[];
        foreach ($model as $index=>$file) {
            if($pass=$this->filejson($file)) $files[$index]=$pass;
        }

        return $this->jsonencode($files);
    }

    /**
     * @param $type
     * @param $id
     * @param Request $request
     * @return string
     */
    public function post($type,$id,$category, request $request)
    {
        ini_set('memory_limit', '-1');
        ini_set('gd.jpeg_ignore_warning', true);

        $input = $request->except('files');

        if ($request->hasfile('files')) {

            $file = $request->file('files')[0];

            $time = time()-rand(1,10);
            $original_name = $file->getclientoriginalname();
            // $name = $time .'.'. array_last(explode(".",$file->getclientoriginalname()));
            // $name = $original_name;
            $extension = $file->getClientOriginalExtension();
            $name = $category.'_'.Auth::user()->id.'_'.date('Y').date('m').date('d').'_'.date('h').'_'.date('m').'_'.date('s').'.'.$extension;
            
            $this->genrateThumbanil($name, $file);
            $file->move($this->path() ,$name);

            $input['exam_candidate_id'] = $id;
            $input['category'] = $category;
            $input['path']=$this->rootPath . "/" . $this->subPath;
            $input['original_filename'] = $original_name;
            $input['filename'] = $name;
            // $input['upload_type'] = 'App\Models\\' . ucfirst($type);
            $input['upload_type'] = $type;
            $input['sizefile'] = filesize($this->path());
            $input['mime'] = $file->getClientMimeType();
            $input['user_id'] = Auth::user()->id;


            $model = $this->model->create($input);

            $files = $this->filejson($model);

        }

        return $this->jsonencode($files,true);
    }

    /**
     * @param $name
     * @param $file
     */
    public function genrateThumbanil($name, $file){


        $file_parts = pathinfo($name);
        if(!($file_parts['extension']=="jpg"||$file_parts['extension']=="png")) return ;

        $img = Image::make($file->getRealPath());

        $img->resize(100, 100, function($constraint) {$constraint->aspectRatio();} )->save($this->path("thumbnailUrl/$name"));

    }

    /**
     * @param $files
     * @param bool $flag
     * @return string
     */
    public function jsonencode($files, $flag=false){


        return ($flag)?'{"files":[' . json_encode($files) . ']}':
            '{"files":' . json_encode($files) . '}';

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {

        $model =$this->model->find($id);

        //auth
        /* $this->imageauth($image); */

        $path= $this->path($model->name);

        \File::delete($path);

        $model->destroy($id);

        return response()->json(array('files' => array("sucessful")), 200);
    }


    /**
     * @param $width
     * @param $height
     * @param $x
     * @param $y
     * @param $name
     * @return string
     */
    public function crop($width, $height, $x, $y, $name)
    {
        $width = (int)$width;
        $height = (int)$height;
        $x = (int)$x;
        $y = (int)$y;
        ini_set('memory_limit', '-1');

        //auth
        $image = product_image::where('name',$name)->first();
        $this->imageauth($image);


        image::make("img/products/$name")->crop($width, $height, $x, $y)->save(public_path() . '/img/products/' . $name, 60);

        return '400';
    }

}
