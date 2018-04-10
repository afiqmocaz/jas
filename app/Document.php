<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Document
 * @package App\Models
 * @version October 17, 2016, 12:07 pm UTC
 */
class Document extends Model
{
    // use SoftDeletes;

    public $table = 'upload';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'filename',
        'sizefile',
        'mime',
        'original_filename',
        'user_id',
        'category',
        'question',
        'assing_panel',
        'status',
        'exam_candidate_id',
        'date_hardcopy',
        'upload_type',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'filename' => 'string',
        'mime' => 'string',
        'original_filename' => 'string',
        'user_id' => 'string',
        'category' => 'string',
        'question' => 'string',
        'assing_panel' => 'integer',
        'status' => 'string',
        'exam_candidate_id' => 'integer',
        'date_hardcopy' => 'string',
        'upload_type' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'filename' => 'required',
        'mime' => 'required',
        'original_filename' => 'required',
        'user_id' => 'required',
        'category' => 'required',
        'question' => 'required',
        'exam_candidate_id' => 'required'
    ];

    public function type()
    {
        return $this->morphTo('documents','exam_candidate_id','question');
    }

    public function getExtension(){
      return substr($this->attributes['filename'],strrpos($this->attributes['filename'],'.'));
    }

    function get_image_type( $filename ) {
        $img = getimagesize( $filename );
        if ( !empty( $img[2] ) )
            return image_type_to_mime_type( $img[2] );
        return false;
    }

    public function isImage(){
        $file_parts = pathinfo($this->attributes['filename']);
        return ($file_parts['extension'] == "jpg"
            ||$file_parts['extension'] == "png"
            ||$file_parts['extension'] == "jpeg"
        )  ;
//      return (is_numeric(exif_imagetype("file://" . public_path() . "/documents/" . $this->attributes['name'])));
    }

    public function urlFile(){
      return url("/documents/" . $this->attributes['filename']);
    }


    // public function users(){
    //     return $this->belongsTo('App\kpi_strategies_report','report_id_user','id');
    // }
    
}
