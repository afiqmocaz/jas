<?php

namespace App\Libs;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Http\Request;
use Datatables;

/**
 * Class Info
 * @package App\Models
 * @version October 13, 2016, 6:18 am UTC
 */
class Upload 
{
  public static $instance;
  public static $flag = false;

  public static function getInstance() {
    if(!isset(Upload::$instance))
      Upload::$instance = new Upload();

      return Upload::$instance;
  }

  private function __construct() {
    Upload::$flag = true;
  }

  // public $url = "/document/index";
  public $url = "/document/index";
  // public $type = "main_upload";

  public function get($view = "index"){

      $maxUpload = 100;
      $docType = "PDF";

      $docType = preg_replace("/jpe\\?g/","jpeg",$docType);
    return view('libs.upload.'.$view)->with(compact(['maxUpload','docType']));
  }

  public function script() {

    if(!empty($this->id))
      $id = $this->id;
    else
      $id = $this->exam_candidate_id;

    $url = url($this->url);
    $type = $this->type;
    $category = $this->category;
    $maxNumberOfFiles = $this->maxNumberOfFiles;
    $maxUpload = 100;
    $maxUpload = $maxUpload * 1048576;
    $docType = "pdf";


    return view('libs.upload.script')->with(compact(['url','type', 'id','maxUpload', 'docType','category','maxNumberOfFiles']))->render();
  }

  public function css() {
    return view('libs.upload.css');
  }

  public  function __call($name, $arg){
    $this->$name = $arg[0];
    return $this;
  }

}
