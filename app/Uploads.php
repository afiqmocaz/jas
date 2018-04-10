<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Rubric;
use Illuminate\Support\Facades\DB;
use App\ExamCandidate;
class Uploads extends Model {
    // upload model
   protected $table = 'upload';
	//protected $fillable = ['filename', 'mime', 'original_filename', 'created_at', 'updated_at','user_nric'];
	protected $fillable = ['user_id', 'filename', 'mime', 'original_filename','category','question'];
		protected $dates = ['created_at'];
	public function user()
        {
            return $this->belongsTo(User::class, 'user_id');

        }
        
        public function examCandidate()
        {
            return $this->belongsTo(ExamCandidate::class, 'exam_candidate_id');

        }
        
        //aisyah@grtech.com.my
    //added assigned panel user table relationship
        public function panel()
        {
            return $this->belongsTo(User::class, 'assign_panel','id');

        }
        
        public function rubrics(){
            return $this->hasMany('App\Rubric', 'upload_id', 'id');
        }
        
         public function percentage(){
            return $this->rubrics()->sum('percentage');
        }
	
        
        public function file(){
            return $this->hasMany('App\Uploads', 'exam_candidate_id', 'exam_candidate_id');
        }
        
        public function additionalFile(){
            return $this->file()->where('upload_type','=','additional_upload');
        }
        public function addspecFile(){
            return $this->file()->where('upload_type','=','addspec_upload');
        }
}
