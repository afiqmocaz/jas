<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or conquiz/takeQuiztroller method. Build something great!
|
*/
//iuuihihuuhiheia_sme
use App\QuizModul;
use App\QuestionList;
use App\UserQuizSession;
use App\QuizSession;
use App\QuizOptions;
use App\IetsSession;
use App\IetsModul;
use App\IetsOptions;
use App\IetsExamSetting;
use Illuminate\Support\Facades\Aeiaqsuth;
use App\Http\Controllers\QuestionListController;
use App\ExamSetting;
use App\EiaAnnounce;
use App\Announce;
use App\IetsAnnounce;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MasterLayoutController;
use App\Schedule;
use App\Http\Controllers\CertController;
use App\Cert;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\ExamController;
use App\ExamCandidate;
use App\Payment;
use Carbon\Carbon;
use App\Specialized;
use App\Eia_Guideline;
use App\Iets_Guideline;
use App\Apcs_Guideline;
Route::get('/', function () {
        if(!empty(Auth::user())){
           return redirect("/home");
        }
	$announce=EiaAnnounce::all();
	$announce2=Announce::all();
	$announce3=IetsAnnounce::all();
	$guideline=Eia_Guideline::all();
	$guideline2=Iets_Guideline::all();
	$guideline3=Apcs_Guideline::all();



        return view('homepage', compact('announce', 'announce2','announce3','guideline','guideline2','guideline3'));
    
});
Route::get('/info', function () {
        if(!empty(Auth::user())){
           return redirect("/home");
        }
	$announce=EiaAnnounce::all();
	$announce2=Announce::all();
	$announce3=IetsAnnounce::all();

        return view('info', compact('announce', 'announce2','announce3'));
    
});
Route::get('/tests/{id}', ['uses' => 'TestsController@getId','as' =>'tests.create']);

Route::post('/login', 'LoginController@login');   

$router->group(['middleware' => ['web']], function () {

//------------------------------EIA------------------------------
Route::resource('eiaindex', 'EiaIndexController');            //|
Route::resource('assignment_results', 'AssignmentResultController');            //|
Route::resource('startassignments', 'StartAssignmentController');            //|
Route::resource('eiaannounce', 'EiaAnnounceController');      //|
Route::resource('eiaapplicant', 'EiaApplicantController');    //|
Route::resource('eiaappinfo', 'EiaAppInfoController'); 	      //|
Route::resource('eiapayment', 'EiaPaymentController'); 	      //|
Route::resource('eiapayinfo', 'EiaPayInfoController'); 	      //|
Route::resource('eiaschedule', 'EiaScheduleController');      //|
Route::resource('eiaexam', 'EiaExamController');   		      //|
Route::resource('eiaquestion', 'EiaQuestExamController');  	  //|
Route::resource('eiabank', 'EiaBankController');   	  		  //|
Route::resource('eiaassignment', 'EiaAssignmentController');  //|
Route::resource('eiarubric', 'EiaRubricController');  		  //|
Route::resource('eiaassignapp', 'EiaAssignAppController');    //|
Route::resource('eiaassignpanel', 'EiaAssignPanelController');//|
Route::resource('eiaproiv', 'EiaProIvController');			  //|
Route::resource('eiaivschedule', 'EiaIvScheduleController');  //|
Route::resource('eiacert', 'EiaCertController');  			  //|
Route::resource('eiaendorse', 'EiaEndorseController');  	  //|
Route::resource('eiacpd', 'EiaCpdController');  	  		  //|
Route::resource('qp', 'EiaQpController');  	  		  		  //|
Route::resource('selflearning', 'SelfLearningController');    //|
Route::resource('eiaquiz', 'QuizController');    			  //|
Route::resource('eiaqs', 'QuestionListController');    			  //|
Route::resource('quizresult', 'QuizResultController');    	  //|
Route::resource('eiaapp', 'EiaAppController');		    	  //|
//______________________________________________________________|

//------------------------------IETS--------------------------------
Route::resource('ietsindex', 'IetsIndexController');    	     //|
Route::resource('ietsannounce', 'IetsAnnounceController');       //|
Route::resource('ietsapplicant', 'IetsApplicantController');     //|
Route::resource('ietsappinfo', 'IetsAppInfoController');   	     //|
Route::resource('ietspayment', 'IetsPaymentController');   	     //|
Route::resource('ietspayinfo', 'IetsPayInfoController');   	     //|
Route::resource('ietssyllabus', 'IetsSyllabusController');       //|
Route::resource('ietsrefference', 'IetsRefferenceController');   //|
Route::resource('ietsschedule', 'IetsScheduleController'); 	     //|
Route::resource('ietsexam', 'IetsExamController'); 	   		     //|
Route::resource('ietsquestion', 'IetsQuestionController'); 	     //|
Route::resource('ietsbank', 'IetsBankController'); 	   		     //|
Route::resource('ietsassignment', '	');   //|
Route::resource('ietsrubric', 'IetsRubricController'); 		     //|
Route::resource('ietsassignapp', 'IetsAssignAppController');     //|
Route::resource('ietsassignpanel', 'IetsAssignPanelController'); //|
Route::resource('ietsproiv', 'IetsProIvController'); 			 //|
Route::resource('ietsivschedule', 'IetsIvScheduleController');   //|
Route::resource('ietscert', 'IetsCertController');   			 //|
Route::resource('ietsendorse', 'IetsEndorseController');   		 //|
Route::resource('ietscpd', 'IetsCpdController');   		 		 //|
Route::resource('ietscp', 'IetsCpController');   		 		 //|
Route::resource('ietsapp', 'IetsAppController');   		 		 //|


//_________________________________________________________________|

//----------------------------APCS----------------------------
Route::resource('announce', 'AnnounceController');         //|
Route::resource('syllabus', 'SyllabusController');         //|
Route::resource('refference', 'RefferenceController');     //|
Route::resource('schedule', 'ScheduleController');         //|
Route::resource('apcsquestion', 'QuestionController');     //|
Route::resource('ivschedule', 'IvScheduleController');     //|
Route::resource('index', 'IndexController');               //|
Route::resource('applicant', 'ApplicantController');       //|
Route::resource('appinfo', 'AppInfoController');           //|
Route::resource('payment', 'PaymentController');           //|
Route::resource('assignapp', 'AssignAppController');       //|
Route::resource('assignpanel', 'AssignPanelController');   //|
Route::resource('proiv', 'ProIvController');               //|
Route::resource('rubric', 'RubricController');             //|
Route::resource('bank', 'BankController');                 //|
Route::resource('cert', 'CertController');                 //|
Route::resource('endorse', 'EndorseController');           //|
Route::resource('cpd', 'CpdController');                   //|
Route::resource('cp', 'CpController');                     //|
Route::resource('exam', 'ExamController');                 //|
Route::resource('assignment', 'AssignmentController');     //|
Route::resource('payinfo', 'PayInfoController');     	   //|
Route::resource('apcsapp', 'ApcsAppController');     	   //|
//___________________________________________________________|

Route::post('/sendmail', function (\Illuminate\Http\Request $request,
	\Illuminate\Mail\Mailer $mailer ) {
	$mailer->to($request->input('email'))->send(new \App\Mail\AppApprove($request));
	return redirect()->back();
})->name('sendmail');

Route::get('email', 'AppInfoController@email')->name('sendEmail');

//----------------------------------------Upload------------------------------------------
																				       //|
//-----------------------------------------EIA-------------------------------------------|
Route::post('eiaannounce/uploadFiles', 'EiaAnnounceController@multiple_upload'); 	   //|

Route::post('eiaqs/uploadFiles', 'QuestionListController@multiple_upload'); 	               //|
	                                                                                   //|		
	                                                                                   //|
Route::post('selflearning/uploadFiles', 'SelfLearningController@multiple_upload');     //|
																					   //|
Route::post('eiaquiz/uploadFiles', 'QuizController@multiple_upload');    			   //|
																					   //|
Route::post('eiaquestion/uploadFiles', 'EiaQuestExamController@multiple_upload');      //|


//----------------------------------------IETS-------------------------------------------|
Route::post('ietsannounce/uploadFiles', 'IetsAnnounceController@multiple_upload');	   //|
																					   //|
Route::post('ietssyllabus/uploadFiles', 'IetsSyllabusController@multiple_upload');	   //| 																					  					   //|
Route::post('ietsrefference/uploadFiles', 'IetsRefferenceController@multiple_upload'); //|
																					   //|
Route::post('ietsquestion/uploadFiles', 'IetsQuestionController@multiple_upload');     //|
																					   //|
Route::post('ietsassignment/uploadFiles', 'IetsAssignmentController@multiple_upload'); //|


//----------------------------------------APCS-------------------------------------------|
Route::post('announce/uploadFiles', 'AnnounceController@multiple_upload');		       //|
																				       //|
Route::post('syllabus/uploadFiles', 'SyllabusController@multiple_upload');		       //|
																				       //|
Route::post('refference/uploadFiles', 'RefferenceController@multiple_upload');         //|
																				       //|
Route::post('assignment/uploadFiles', 'AssignmentController@multiple_upload');         //|
																				       //|
Route::post('apcsquestion/uploadFiles', 'QuestionController@multiple_upload');         //|
//_______________________________________________________________________________________|

Route::resource('examtitle', 'ExamTitleController', ['except' => ['create']]);

Route::resource('venue', 'VenueController', ['except' => ['create']]);

Route::resource('specialized', 'SpecializedController', ['except' => ['create']]);

Route::resource('related', 'RelatedController', ['except' => ['create']]);

Route::resource('eiarelated', 'EiaRelatedController', ['except' => ['create']]);

Route::resource('eiaexamtitle', 'EiaExamTitleController', ['except' => ['create']]);

Route::resource('eiavenue', 'EiaVenueController', ['except' => ['create']]);

Route::resource('ietsexamtitle', 'IetsExamTitleController', ['except' => ['create']]);

Route::resource('ietsvenue', 'IetsVenueController', ['except' => ['create']]);

Route::resource('ietsrelated', 'IetsRelatedController', ['except' => ['create']]);

Route::get('/ietsapprove', 'IetsAppInfoController@ietsapprove')->name('ietsapprove');

Route::get('/ietsdecline', 'IetsAppInfoController@ietsdecline')->name('ietsdecline');

Route::get('/payapprove', 'IetsPayInfoController@payapprove')->name('payapprove');

Route::get('/paydecline', 'IetsPayInfoController@paydecline')->name('paydecline');

Route::get('/apcsapprove', 'AppInfoController@apcsapprove')->name('apcsapprove');

Route::get('/apcsdecline', 'AppInfoController@apcsdecline')->name('apcsdecline');

Route::get('/payapprove', 'PayInfoController@payapprove')->name('payapprove');

Route::get('/paydecline', 'PayInfoController@paydecline')->name('paydecline');

Route::get('/approve', 'EiaAppInfoController@approve')->name('approve');

Route::get('/decline', 'EiaAppInfoController@decline')->name('decline');

Route::get('/payapprove', 'EiaPayInfoController@payapprove')->name('payapprove');

Route::get('/paydecline', 'EiaPayInfoController@paydecline')->name('paydecline');

});



Route::get('selflearning', ['uses' => 'PagesController@getSelflearning', 'as' => 'selflearning']);
Route::get('selflearning(module1)', 'PagesController@getSelflearningModule1');
Route::get('exam', ['uses' => 'PagesController@getExam', 'as' => 'exam']);
Route::get('assignment', 'PagesController@getAssignment');
Route::get('interview', 'PagesController@getInterview');
Route::get('quizmodul1', 'PagesController@getQuizModul1');
Route::get('modul2', 'PagesController@getModul2');
Route::get('modul3', 'PagesController@getModul3');
Route::get('modul4', 'PagesController@getModul4');
Route::get('modul5', 'PagesController@getModul5');
Route::get('modulsummary', 'PagesController@getModulSummary');
Route::get('quizscore', 'PagesController@getQuizScore');
Route::get('beforeexam', 'PagesController@getBeforeExam');
Route::get('examquestion', 'ExamController@examquestion');
//Route::get('questions.show', 'QuestionController@examquestion');
//Route::get('examcreate', 'ExamController@create');
Route::get('lastquestion', 'PagesController@getLastQuestion');
Route::get('examresult', 'PagesController@getExamResult');
Route::get('specificquestion', 'PagesController@getSpecificQuestion');
Route::get('assignmentsubmission', 'PagesController@getAssignmentSubmission');
Route::get('confirmationinterview', 'PagesController@getConfirmationInterview');
Route::get('interviewstatus', 'PagesController@getInterviewStatus');
Route::get('interviewstatus2', 'PagesController@getInterviewStatus2');
Route::get('certificate', 'PagesController@getCertificate');
Route::get('certificatestatus', 'PagesController@getCertificateStatus');
Route::get('profile', 'PagesController@getProfile');
Route::get('updateprofile', 'PagesController@getUpdateProfile');
Route::get('cpd', 'PagesController@getCPD');
Route::get('certificaterenewal', 'PagesController@getCertificateRenewal');
Route::get('template', 'PagesController@getTemplate');
Route::get('assignmentstatus', 'PagesController@getAssignmentStatus');
Route::get('assignmentresult', 'PagesController@getAssignmentResult');
Route::get('confirmationexam', 'PagesController@getConfirmationExam');
Route::get('examresultfail', 'PagesController@getExamResultFail');
Route::get('beforeinterview', 'PagesController@getBeforeInterview');
Route::get('certificaterenewalstatus', 'PagesController@getCertificateRenewalStatus');
Route::get('certificaterenewalapproved', 'PagesController@getCertificateRenewalApproved');
Route::get('newcertificate', 'PagesController@getNewCertificate');
Route::get('uploadfile', 'PagesController@getUploadFile');
Route::get('modul5quiz1', 'PagesController@getModul5Quiz1');
Route::get('modul5quiz2', 'PagesController@getModul5Quiz2');
Route::get('modul5quizscore', 'PagesController@getModul5QuizScore');
Route::get('certificaterenewal2', 'PagesController@getCertificateRenewal2');
Route::get('uploadfile2', 'PagesController@getUploadFile2');
Route::get('assignmentsubmission2', 'PagesController@getAssignmentSubmission2');
Route::get('startassignment', 'PagesController@getStartAssignment');

//utk upload assignment
Route::resource('eiaupload', 'EIAUploadAssignmentController'); 
/*Route::get('eiaupload', 'EIAUploadController@index');
Route::get('/eiaupload/{name}',function($name){
	$user=User::where('name',$name)->firstOrFail();
	return view::make('eiaupload')->with('user',$user);
});*/
Route::post('eiaupload/uploadFiles', 'EIAUploadController@multiple_upload');
//Route::get('delete/{original_filename}','EIAUploadController@delete');

Route::get('delete/{original_filename}','UploadsController@delete');
//Route::delete('delete/{original_filename}',array('uses' => 'EIAUploadController@delete','as' => 'My.route'));

//utk upload assignment2
/*Route::get('eiaupload2', 'EIAUpload2Controller@index');
Route::get('/eiaupload2/{name}',function($name){
	$user=User::where('name',$name)->firstOrFail();
	return view::make('eiaupload2')->with('user',$user);
});
Route::post('eiaupload2/uploadFiles', 'EIAUpload2Controller@multiple_upload');*/

Route::get('app', 'PagesController@getApp');

Route::get('nav', 'PagesController@getNav');

/*Route::get('uploads', 'UploadController@index');
Route::post('uploads/uploadFiles', 'UploadController@multiple_upload');
Route::get('show', 'UploadController@show');*/

Route::group(['middleware' => ['web']], function () {
	
	//Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
	//Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
	Route::get('contact','PagesController@getContact');
	Route::get('about', 'PagesController@getAbout');
	//Route::get('/', 'PagesController@getIndex');
	Route::resource('posts', 'PostController');
	Route::resource('exams', 'ExamController');
	//Route::resource('questions', 'QuestionController');
	Route::resource('quizzes', 'QuizController');

	Route::resource('profiles', 'ProfileController');

	Route::resource('modules', 'ModuleController');
	
	Route::resource('modules2', 'Module2Controller');
	Route::resource('modules3', 'Module3Controller');
	Route::resource('modules4', 'Module4Controller');
	Route::resource('modules5', 'Module5Controller');
	Route::resource('topics', 'TopicsController');

	Route::post('topics_mass_destroy', ['uses' => 'TopicsController@massDestroy', 'as' => 'topics.mass_destroy']);
    Route::resource('questions_quiz', 'QuestionQuizController');
    Route::post('questions_mass_destroy', ['uses' => 'QuestionQuizController@massDestroy', 'as' => 'questions.mass_destroy']);
    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    Route::resource('results', 'ResultsController');
    Route::resource('results2', 'Results2Controller');
    Route::resource('results3', 'Results3Controller');
    Route::resource('results4', 'Results4Controller');
    Route::resource('results5', 'Results5Controller');
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);

    //TestsController
    Route::resource('tests', 'TestsController');
   // Route::post('tests','TestsController@nextstore');
    Route::get('tests/{id}','TestsController@nextstore');
    Route::get('session/get','TestsController@accessSessionData');
    
    Route::get('insert','StudInsertController@insertform');
    Route::post('create','StudInsertController@insert');
    Route::get('view-records','StudViewController@index');
    Route::get('edit-records','StudUpdateController@index');
    Route::get('edit/{id}','StudUpdateController@show');
    Route::post('edit/eiaqs/show{id}','StudUpdateController@edit');



    //Tests2Controller
    Route::resource('tests2', 'Tests2Controller');

    //Tests3Controller
    Route::resource('tests3', 'Tests3Controller');
    //Tests4Controller
    Route::resource('tests4', 'Tests4Controller');
    //Tests5Controller
    Route::resource('tests5', 'Tests5Controller');
    Route::resource('examschedules', 'ExamsScheduleController');
    Route::resource('iets_schedules', 'IETS_ExamScheduleController');
   //Categories
    Route::resource('categories', 'CategoryController', ['except' => ['create']]);

	
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
//utk upload pcer
Route::get('upload', 'UploadsController@index');
Route::post('upload/uploadFiles', 'UploadsController@multiple_upload');
Route::get('show', 'UploadsController@show');

Auth::routes();

Route::get('register/verify/{token}', 'Auth\RegisterController@verify')->name('verify');
//utk iets
//Route::get('/home', 'HomeController@index');


Route::get('iets_syllabus', 'HomeController@iets_syllabus');
//Route::get('iets_exam', 'IETS_ExamScheduleController@iets_exam');
Route::get('iets_pcer', 'HomeController@iets_pcer');
Route::get('iets_iv', 'IETS_InterviewController@iets_iv');
Route::get('iets_certificate', 'HomeController@iets_certificate');
Route::get('iets_renewcert', 'HomeController@iets_renewcert');
Route::get('iets_applyrenew', 'HomeController@iets_applyrenew');
Route::get('iets_preapproved', 'HomeController@iets_preapproved');
Route::get('iets_reference/{examCandidateId}', 'HomeController@iets_reference');
Route::get('iets_cert', 'HomeController@iets_cert');
Route::get('eia_cert', 'HomeController@eia_cert');
Route::get('templatecert', 'HomeController@templatecert');
Route::get('templatecertapcs', 'HomeController@templatecertapcs');
Route::get('templatecerteia', 'HomeController@templatecerteia');
Route::get('iets_profile', 'HomeController@iets_profile');
Route::resource('iets_examquestion', 'IETSQuestController');
Route::get('iets_cpd', 'HomeController@iets_cpd');
Route::get('iets_examresult', 'HomeController@iets_examresult');
Route::get('iets_examfail', 'HomeController@iets_examfail');
Route::get('iets_ivstatus2', 'HomeController@iets_ivstatus2');
Route::get('iets_ivstatus', 'HomeController@iets_ivstatus');
Route::post('store','IETS_ExamScheduleController@store');

//utk apcs
Route::get('apcs_examquestion', 'APCS_ExamQuestController@apcs_examquestion');
Route::get('apcs_cpd', 'HomeController@apcs_cpd');
Route::get('apcs_cert', 'HomeController@apcs_cert');
Route::get('apcs_home', 'HomeController@apcs_home');
Route::get('apcs_iv', 'APCS_InterviewController@apcs_iv');
Route::get('apcs_renewcert', 'HomeController@apcs_renewcert');
Route::get('apcs_certificate', 'HomeController@apcs_certificate');
Route::get('apcs_syllabus/{payment_id}', 'HomeController@apcs_syllabus');
Route::get('apcs_reference/{payment_id}', 'HomeController@apcs_reference');
//Route::get('apcs_exam', 'APCS_ExamScheduleController@apcs_exam');
Route::get('apcs_profile', 'HomeController@apcs_profile');
Route::get('apcs_pcer', 'HomeController@apcs_pcer');
Route::get('apcsupload', 'APCSUploadController@apcsindex');
Route::post('apcsupload/uploadFiles', 'APCSUploadController@multiple_upload');
Route::get('delete/{original_filename}','APCSUploadController@delete');
//Route::get('update','RegisterController@update');
Route::get('store','IETSQuestController@store');
//Route::get('update','RegisterController@update');
Route::get('confirm','APCS_ExamScheduleController@confirm');
Route::get('confirm','IETS_ExamScheduleController@confirm');
Route::post('apcs_examconfirm','APCS_ExamScheduleController@apcs_exam');
Route::get('iv_confirm','IETS_InterviewController@iv_confirm');
//Route::resource('iets_exam', 'IETS_ExamScheduleController');
//Route::resource('apcs_exam', 'APCS_ExamScheduleController');
 Route::resource('apcs_schedules', 'APCS_ExamScheduleController');
Route::post('iets_examconfirm','IETS_ExamScheduleController@iets_exam');
//sme
Route::get('sme/{category}', 'SMEController@index');
Route::get('pcersme', 'HomeController@pcersme');
Route::get('general', 'HomeController@general');
Route::get('specific', 'HomeController@specific');
Route::get('apcsme', 'HomeController@apcsme');
Route::get('apcspcersme', 'HomeController@apcspcersme');
Route::get('eia_sme', 'HomeController@eia_sme');
Route::get('eia_assign_sme', 'HomeController@eia_assign_sme');
Route::resource('reqaddinfo', 'SMEaddinfoController');
Route::resource('apcs_reqaddinfo', 'APCSSME_addinfoController'); 
Route::resource('homepage', 'homepageController');



Route::resource('eiaSectionA', 'eiaSectionAController');
Route::resource('eiaSectionB', 'eiaSectionBController');
Route::resource('eiaSectionC', 'eiaSectionCController');
Route::resource('eiaSectionD', 'eiaSectionDController');
Route::resource('eiaSectionE', 'eiaSectionEController');
Route::resource('eiaSectionF', 'eiaSectionFController');

Route::resource('apcsSectionA', 'apcsSectionAController');
Route::resource('apcsSectionB', 'apcsSectionBController');
Route::resource('apcsSectionC', 'apcsSectionCController');
Route::resource('apcsSectionD', 'apcsSectionDController');
Route::resource('apcsSectionE', 'apcsSectionEController');
Route::resource('apcsSectionF', 'apcsSectionFController');

Route::resource('regCategory', 'regCategoryController');
Route::resource('signup', 'signupController');


Route::resource('countries', 'CountryController', ['except'=>['create']]);
Route::resource('ietsSectionE', 'ietsSectionEController');
Route::resource('ietsSectionD', 'ietsSectionDController');
Route::resource('ietsSectionC', 'ietsSectionCController');
Route::resource('ietsSectionB', 'ietsSectionBController');
Route::resource('ietsSectionA', 'ietsSectionAController');


Route::resource('paymentCategory', 'paymentCategoryController');


//additional info iets pcer
Route::get('addupload', 'AddUploadsController@addinfo');
Route::post('addupload/uploadFiles', 'AddUploadsController@multiple_upload');
Route::get('delete/{original_filename}','AddUploadsController@delete');

//additional info apcs pcer
Route::get('apcsaddupload', 'ApcsAddUploadController@apcsaddinfo');
Route::post('apcsaddupload/uploadFiles', 'ApcsAddUploadController@multiple_upload');
Route::delete('delete/{original_filename}',array('uses' => 'ApcsAddUploadController@delete','as' => 'deleteapcsfile'));

Route::post('reqaddinfo/up', 'SMEaddinfoController@sendEmailReminder');
Route::resource('user_actions', 'UserActionsController');

//Route::get('/cookie/set','StudInsertController@setCookie');
//Route::get('/cookie/get','StudInsertController@getCookie');
Route::resource('assignments','EiaAssignmentsController');

Route::resource('eia_option', 'QuestionListOptionController'); 
Route::resource('eiaexamoption', 'EiaOptionExamController'); 
Route::resource('ietsexamoption', 'IetsExamOptionController');
Route::resource('apcsexamoption', 'ApcsExamOptionController');
Route::resource('eiacertrenew','EiaCertRenewController');
Route::resource('ietscertrenew','IetsCertRenewController');
Route::resource('apcscertrenew','ApcsCertRenewController');
Route::resource('iets_repeatexam', 'RepeatExamController');
Route::resource('startpcer', 'StartPcerController'); 
Route::resource('iets_result', 'IetsResultController');
Route::resource('iets_cpd','IetsCpdsController');
Route::resource('ietsprofiles','IetsProfileController');
Route::resource('eiaprofiles','EiaProfileController');
Route::resource('apcsprofiles','ApcsProfileController');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::get('/home', 'HomeController@redirectRole');

Route::get('makePayment/{paymentfor}',function($paymentfor){
    
    $cert = Cert::where('category','=',$paymentfor)->where('user_id',Auth::id())->first();
    $category = $paymentfor;
    if(!empty($cert)){
        $category = $cert->category.' RENEWAL ';
    }
  
    $data = array();
    $data['category'] = $category;
    $data['paymentfor'] = $paymentfor;
    $data['cert'] = $cert;
    
    $data['priceReseat'] = 200;
    $data['pricePrequalification'] = 3500;
    $data['priceRenewal'] = 300;
    $data['user']=Auth::user()->where('id','=',Auth::user()->id)->first();
    $preQualificationReg = Payment::where('payment_for','=',$paymentfor)
                      ->where('user_id','=',Auth::user()->id)
                      ->where('type','=','PRE-QUALIFICATION REGISTRATION')
                      ->where('status','=','Approved')
                      ->get();
   
    $data['preQualificationReg'] = count($preQualificationReg);
    
    return view('paymentCategory.makePayment')->with($data);
});

Route::get('/paymentview/{paymentfor}', 'PaymentController@paymentfor');

//Mohamad Nadiy bin Md Nazir
//nadiyxshinku89@gmail.com

Route::post('tests/findQuestions','TestsController@findQuestions');
Route::post('tests/findQuestionsExcludeAnswer','TestsController@findQuestionsExcludeAnswer');
Route::post('tests/calculateAnswerResult','TestsController@calculateAnswerResult');

Route::get('quizModul/view/{type}/{category}', 'QuizModulController@view');
Route::post('quizModul/findById', 'QuizModulController@findById');
Route::post('quizModul/find', 'QuizModulController@find');
Route::post('quizModul/save', 'QuizModulController@save');
Route::post('quizModul/remove', 'QuizModulController@remove');

Route::get('quizModul/listQuestionView/{id}', 'QuizModulController@listQuestionView');
Route::get('quizModul/saveQuestion', 'QuizModulController@saveQuestion');

Route::get('test/result_summary/{session}/{category}/{schedule}', function($session, $category, $schedule) {

    $modulListQuery = QuizModul::query();
    $modulListQuery->where('type', '=', $session);
    $modulList = $modulListQuery->get();

    $answerList = array();
    $quizSessB = QuizSession::query();
    $quizSessB->where('user_id', '=', Auth::user()->id)->first();
    $quizSessB->where('type', '=', $session);
    $quizSessB->where('category', '=', $category);
    
    if($session === 'exam'){//else no schedule
         $quizSessB->where('exam_schedule', '=', $schedule);
    }

    $quizSess = $quizSessB->first();
    
    if (!empty($quizSess)) {
        $answerList = json_decode($quizSess->answer_data);
        $cAnswerList = json_decode($quizSess->correct_answer);
    }
 
    $summarryList = array();
    $counter = 0;
    $correctAnswer = 0;
    foreach ($answerList as $answerId) {
            
            if ((int) $answerId === (int) $cAnswerList[$counter]) {
                $correctAnswer = $correctAnswer + 1;
            }
            
            $counter++;
    }
    

    $totalPercentage = number_format((float) ($correctAnswer / count($answerList) * 100), 2, '.', '');
    
    $extendLayout = (new MasterLayoutController)->getLayoutConsultant($category);
    $useresult = array(); 

    return view('tests.quizResultSummary', compact('extendLayout','$useresult','session', 'answerList', 'modulList', 'summarryList', 'totalPercentage'));
});

Route::get('quizModul/selflearning/{modulId}', 'SelfLearningController@viewByQuizModul');
Route::post('tests/storeQuizSession', 'TestsController@storeQuizSession');
Route::post('tests/quizSession', 'TestsController@quizSession');
Route::post('tests/checkAnswer', 'TestsController@checkAnswer');
Route::post('tests/updateExamCandidateStatus', 'TestsController@updateExamCandidateStatus');
Route::get('take_exam/{scheduleId}',function($scheduleId){
   
  
             $schedule =  Schedule::find($scheduleId);
             $time = strtotime($schedule->date.' '.$schedule->end);
             $finishExamTime = date('m/d/Y h:i A',$time);
            
             //Control timer for exam
             //Prevent exam from start before time
             $examDateS = strtotime($schedule->date);
             $examDate = date("Y-m-d",$examDateS);
      
             $startTime = preg_replace("/[^0-9]/","",$schedule->start);
             $endTime = preg_replace("/[^0-9]/","",$schedule->end);
           
             $dateExam = preg_replace("/[^0-9]/","",$examDate);
             $dateToday = preg_replace("/[^0-9]/","",date('Y-m-d'));
             
             $results = DB::select(DB::raw('SELECT CURTIME() AS end_time'));
             $currentTimeTemp = $results[0]->end_time;
             $currentTime =  preg_replace("/[^0-9]/","",substr($currentTimeTemp, 0, 5));
             
             if($dateExam != $dateToday){
                return redirect('/examschedules/'.$schedule->category);
             }
             if($currentTime < $startTime){
                return redirect('/examschedules/'.$schedule->category);
             }
             //end
        
        $extendLayout = (new MasterLayoutController)->getApplicant($schedule->category);
        $useresult = array(); 
        // $time=Carbon::now('Asia/Kuala_Lumpur')->toDateTimeString();
        $category = $schedule->category;
   
        $examCandidate = ExamCandidate::where('schedule_id','=',$schedule->id)->where('user_id','=',Auth::id())->first();
        $payment = Payment::find($examCandidate->payment_id);
        
        return view('tests.takeExam',compact('payment','examCandidate','finishExamTime','extendLayout','useresult','schedule','category'));
        
});

Route::get('take_quiz/{payment_id}', function($payment_id) {
    
    $payment = Payment::find($payment_id);
    $category = $payment->payment_for;
    
    $extendLayout = (new MasterLayoutController)->getApplicant($category);
    $useresult = array();
    
    $qzB = QuizSession::query();
    $qzB->where('user_id', '=', Auth::user()->id);
    $qzB->where('type', '=', 'quiz');
    $qzB->where('category', '=', $category);
    $qz = $qzB->first();

    if(empty($qz)){
         $qn = new QuizSession();
         $qn->user_id = Auth::user()->id;
         $qn->type = 'quiz';
         $qn->category = $category;
         
         $qn->exam_schedule = (int)('9999'.''.date('Y').''.date('m').''.date('d').''.Auth::user()->id);
         $qn->question_data = json_encode(array());
         $qn->correct_answer = json_encode(array());
         $qn->answer_data = json_encode(array());

         $qn->save();
    }
        
    $qzB = QuizSession::query();
    $qzB->where('user_id', '=', Auth::user()->id);
    $qzB->where('type', '=', 'quiz');
    $qzB->where('category', '=', $category);
    $qz = $qzB->first();
    
    $currQuestionIndex =  count(json_decode($qz->question_data));
    
    $question_data = $qz->question_data;
    $answer_data = $qz->answer_data;

    return view('tests.takeQuiz', compact('payment','currQuestionIndex','question_data','answer_data','category', 'extendLayout', 'useresult'));
});

Route::get('take_quiz_consultant/{category}', function($category) {

    $extendLayout = 'layouts.master_consultant';
    $useresult = array();
    
    $qzB = QuizSession::query();
    $qzB->where('user_id', '=', Auth::user()->id);
    $qzB->where('type', '=', 'quiz');
    $qzB->where('category', '=', $category);
    $qz = $qzB->first();

    if(empty($qz)){
         $qn = new QuizSession();
         $qn->user_id = Auth::user()->id;
         $qn->type = 'quiz';
         $qn->category = $category;
         
         $qn->exam_schedule = (int)('9999'.''.date('Y').''.date('m').''.date('d').''.Auth::user()->id);
         $qn->question_data = json_encode(array());
         $qn->correct_answer = json_encode(array());
         $qn->answer_data = json_encode(array());

         $qn->save();
    }
        
    $qzB = QuizSession::query();
    $qzB->where('user_id', '=', Auth::user()->id);
    $qzB->where('type', '=', 'quiz');
    $qzB->where('category', '=', $category);
    $qz = $qzB->first();
    
    $currQuestionIndex =  count(json_decode($qz->question_data));
    
    $question_data = $qz->question_data;
    $answer_data = $qz->answer_data;

    return view('tests.takeQuiz', compact('currQuestionIndex','question_data','answer_data','category', 'extendLayout', 'useresult'));
});

Route::post('quizModul/saveExamSetting', 'QuizModulController@saveExamSetting');
Route::resource('roles','RoleController');
Route::resource('users','UserAdminController');
Route::get('ldapuser','UserAdminController@ldapF');
Route::post('ldapuser2','UserAdminController@ldapF2');
Route::post('tests/generateExamQuestion','TestsController@generateExamQuestion');
Route::post('tests/getTime','TestsController@getTime');
Route::post('tests/updateExamSession','TestsController@updateExamSession');
Route::post('tests/findQuizQuestion','TestsController@findQuizQuestion');
Route::post('tests/updateQuizSession','TestsController@updateQuizSession');
//test 3//Nadiy test
Route::get('summary/{scheduleId}/{user_id}','TestsController@summary');
Route::get('UserQuiz','TestsController@UserQuiz');
Route::post('findUserQuiz','TestsController@findUserQuiz');
Route::post('find/summary','TestsController@findSummary');
Route::get('quizSummary/{user_id}','TestsController@quizSummary');
//applicant assgiment
//nadiyxshinku89@gmail.com

//category - EIA,IETS,APCS

//Upload main popup.
// faridi2u [at] gmail.com
Route::get('upload_main_files/{exam_candidate_id?}/{category}', function($exam_candidate_id, $category) {

   // Jquery Uploader initiation
   $uploadPlugin = \App\Libs\Upload::getInstance();
   $uploadPlugin->exam_candidate_id = $exam_candidate_id;
   $uploadPlugin->category = $category;
   $uploadPlugin->type = "main_upload";
   if($category==="eia")
   $uploadPlugin->maxNumberOfFiles = 2;
else
{
$uploadPlugin->maxNumberOfFiles = 1;
}

    return view('secretariat/main_upload_popup')->with('uploadPlugin', $uploadPlugin)->with('id', $exam_candidate_id)->with('category',$category);
});
//upload specialized popup
Route::get('upload_spec_files/{exam_candidate_id?}/{category}', function($exam_candidate_id, $category) {

   // Jquery Uploader initiation
   $uploadPlugin = \App\Libs\Upload::getInstance();
   $uploadPlugin->exam_candidate_id = $exam_candidate_id;
   $uploadPlugin->category = $category;
   $uploadPlugin->type = "spec_upload";
   if($category==="eia")
   $uploadPlugin->maxNumberOfFiles = 2;
else
{
$uploadPlugin->maxNumberOfFiles = 1;
}

    return view('secretariat/spec_upload_popup')->with('uploadPlugin', $uploadPlugin)->with('id', $exam_candidate_id)->with('category',$category);
});
//Upload main popup.
// faridi2u [at] gmail.com
Route::get('upload_additional_files/{exam_candidate_id?}/{category}', function($exam_candidate_id, $category) {

   // Jquery Uploader initiation
   $uploadPlugin = \App\Libs\Upload::getInstance();
   $uploadPlugin->exam_candidate_id = $exam_candidate_id;
   $uploadPlugin->category = $category;
   $uploadPlugin->type = "additional_upload";
   $uploadPlugin->maxNumberOfFiles = 1000;


    return view('secretariat/additional_upload_popup')->with('uploadPlugin', $uploadPlugin)->with('id', $exam_candidate_id)->with('category',$category);
});
Route::get('upload_addspec_files/{exam_candidate_id?}/{category}', function($exam_candidate_id, $category) {

   // Jquery Uploader initiation
   $uploadPlugin = \App\Libs\Upload::getInstance();
   $uploadPlugin->exam_candidate_id = $exam_candidate_id;
   $uploadPlugin->category = $category;
   $uploadPlugin->type = "addspec_upload";
   $uploadPlugin->maxNumberOfFiles = 1000;


    return view('secretariat/addspec_upload_popup')->with('uploadPlugin', $uploadPlugin)->with('id', $exam_candidate_id)->with('category',$category);
});

Route::get('secretariat_assigment/{category}', 'AssignAppController@view'); 
Route::get('rubric_view/{id}', 'RubricController@view'); 
Route::post('rubric_save', 'RubricController@save');
Route::post('rubric_find', 'RubricController@find');

Route::get('schedule_attendant/{scheduleId}', 'ScheduleController@viewAttendant');   
Route::post('schedule_attendant_find', 'ScheduleController@findAttendant');   
Route::post('schedule_attendant_set_status', 'ScheduleController@setExamCandidateStatus');

Route::get('applicant_assigment/{id}', 'ApplicantAssigmentController@view');
Route::post('applicant_assigment/uploadFile', 'ApplicantAssigmentController@upload');
Route::post('applicant_assigment/removeFile', 'ApplicantAssigmentController@remove');
Route::post('applicant_assigment/find', 'ApplicantAssigmentController@find');

Route::get('interview_applicant/{category}', 'InterviewController@viewApplicant');
Route::get('interview/{category}', 'InterviewController@view');
Route::post('interview_find', 'InterviewController@find');
Route::post('interview_assign', 'InterviewController@assign');
Route::post('interview_applicant_set_status', 'InterviewController@applicantSetStatus');
Route::post('interview_secretariat_set_status', 'InterviewController@secretariatSetStatus')->name('secretariatSetStatus'); 
//panel assignment
//aisyah@grtech.com.my
Route::post('secretariat_assigment/assign', 'AssignAppController@assign')->name('assignPanel'); 
Route::post('secretariat_assigment/assign', 'AssignAppController@assign')->name('assignPanel'); 
Route::post('secretariat_assigment/setStatus', 'AssignAppController@setStatus')->name('setStatus'); 

Route::post('cert_find', 'CertController@find');
Route::get('cert_findx','CertController@find');
Route::post('cert_approval', 'CertController@certificateApproval')->name('certificateApproval'); 
Route::get('cert_generate/{id}', 'CertController@template'); 
Route::get('cert_renewal/{category}/{renewal_status}', 'CertController@renewalStatus'); 

Route::post('cert_setStatus', 'CertController@certificateStatus')->name('certificateStatus'); 

Route::get('consultant/{category}', 'ConsultantController@index'); 
Route::get('consultant_profile/{category}', 'ConsultantController@consultantProfile'); 
Route::get('consultant_cpd/{category}', 'ConsultantController@consultantCpd');
Route::get('consultant_cert/{category}', 'ConsultantController@consultantCert');
Route::post('consultant_cert/applyRenewal', 'CertController@applyRenewal')->name('applyRenewal'); 

//panel assignment
//aisyah@grtech.com.my
Route::post('secretariat_assigment/assign', 'AssignAppController@assign')->name('assignPanel'); 
Route::post('secretariat_assigment/setStatus', 'AssignAppController@setStatus')->name('setStatus'); 
Route::post('secretariat_assigment/setHardCopyDate', 'AssignAppController@setHardCopyDate')->name('setHardCopyDate'); 
//add comment
//faridi@grtech.com.my
Route::post('secretariat_assigment/setSMEComment', 'AssignAppController@setSMEComment')->name('setSMEComment'); 
//assign assignment
Route::get('secretariat_assign_app/{category}', 'SecAssignAppController@view');
Route::post('secretariat_assign_app/find', 'SecAssignAppController@find');
Route::post('secretariat_assign_app/assign', 'SecAssignAppController@assign')->name('assignAssignment'); 
Route::post('secretariat_assign_app/setStatus', 'SecAssignAppController@setStatus')->name('setStatusAssignment'); 
Route::post('secretariat_assign_app/sendComment', 'SecAssignAppController@sendComment')->name('sendUploadComment'); 

Route::get('related_category/{category}', 'RelatedController@category');
Route::get('schedule_show/{category}/{time}', 'ScheduleController@showTime');
Route::patch('schedule_remind', 'ScheduleController@remind'); 

Route::get('iets_syllabus/{examCandidateId}', 'HomeController@aplicant_iets_syllabus');



// Documents/Uploads using the plugin
route::get('/document/index/{type}/{id}/{category}', 'DocumentController@get');
route::post('/document/index/{type}/{id}/{category}', 'DocumentController@post');
route::post('/document/delete/{id}', 'DocumentController@delete');
Route::get('iets_syllabus/{examCandidateId}', 'HomeController@aplicant_iets_syllabus');
Route::get('iets_syllabus/{examCandidateId}', 'HomeController@aplicant_iets_syllabus');
 
Route::post('applicant/findSection', 'ApplicantController@findSection');  
Route::post('applicant/find', 'ApplicantController@find');  
Route::post('payment/find', 'PaymentController@find');
Route::get('time', 'TestsController@getTime');
Route::get('ReRegister/{paymentId}','ExamsScheduleController@NewRegistration');
Route::post('/edit/{id}', function (Request $request,$id){
	
$specializes = Specialized::find($id);
// return $specializes;
        $specializes->specialized = $request->name;
        $specializes->save(); 
       return redirect()->route('specialized.index');
    
});
Route::get('criteria', 'RubricController@criteria');
Route::post('criteria_save', 'RubricController@criteria_save');
Route::post('criteria_find', 'RubricController@criteria_find');
Route::resource('contactus', 'ContactusController');
Route::resource('eiaguideline', 'EiaGuidelineController');
Route::resource('ietsguideline', 'IetsGuidelineController');
Route::resource('apcsguideline', 'ApcsGuidelineController');
Route::post('/checkemail',['uses'=>'Auth\RegisterController@checkEmail']);
Route::post('/checknric',['uses'=>'Auth\RegisterController@checkNric']);
Route::post('/specializedData/', function (Request $request){
	
     $specialize = Specialized::query();
       if(!empty($request['specialize_0'])){
                $sp0= $request['specialize_0'];
                 $specialize->where('specialized','!=',$sp0);
        }
        if(!empty($request['specialize_1'])){
                $sp1= $request['specialize_1'];
                 $specialize->where('specialized','!=',$sp1);
        }
        if(!empty($request['specialize_2'])){
                $sp2= $request['specialize_2'];
                 $specialize->where('specialized','!=',$sp2);
        }
        if(!empty($request['specialize_3'])){
                $sp3= $request['specialize_3'];
                 $specialize->where('specialized','!=',$sp3);
        }
        
        	$specializes=$specialize->get();
           $res=new stdClass();
           $res->data=$specializes;
    return json_encode($res);
});