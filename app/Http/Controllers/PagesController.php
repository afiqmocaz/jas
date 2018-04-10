<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller {

	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		# process variable data or params
		# talk to the model
		# receive from the model
		# compile or process data from the model if needed
		# pass that data to the correct view

		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout() {
		$first = 'Alex';
		$last = 'Curtis';

		$fullname = $first . " " . $last;
		$email = 'alex@gmail.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);

	}

	public function getContact() {

		return view('pages.contact');

	}

	public function getSelflearning() {

		return view('pages.selflearning');

	}

	public function getExam() {

		return view('pages.exam');

	}

	public function getAssignment() {

		return view('pages.assignment');

	}

	public function getInterview() {

		return view('pages.interview');

	}

	public function getSelflearningModule1() {

		return view('pages.selflearning(module1)');

	}

	public function getQuizModul1() {

		return view('pages.quizmodul1');

	}

	public function getModul2() {

		return view('pages.modul2');

	}


	public function getModul3() {

		return view('pages.modul3');

	}

public function getModul4() {

		return view('pages.modul4');

	}


public function getModul5() {

		return view('pages.modul5');

	}

	public function getModulSummary() {

		return view('pages.modulsummary');

	}

	public function getQuizScore() {

		return view('pages.quizscore');

	}

	public function getBeforeExam() {

		return view('pages.beforeexam');

	}

	public function getExamQuestion() {

		return view('pages.examquestion');

	}

	public function getLastQuestion() {

		return view('pages.lastquestion');

	}

	public function getExamResult() {

		return view('pages.examresult');

	}

	public function getSpecificQuestion() {

		return view('pages.specificequestion');

	}

	public function getAssignmentSubmission() {

		return view('pages.assignmentsubmission');

	}

	public function getConfirmationInterview() {

		return view('pages.confirmationinterview');

	}

	public function getInterviewStatus() {

		return view('pages.interviewstatus');

	}

	public function getInterviewStatus2() {

		return view('pages.interviewstatus2');

	}

	public function getCertificate() {

		return view('pages.certificate');

	}

	public function getCertificateStatus() {

		return view('pages.certificatestatus');

	}

	public function getProfile() {

		return view('pages.profile');

	}	

	public function getUpdateProfile() {

		return view('pages.updateprofile');

	}

	public function getCPD() {

		return view('pages.cpd');

	}	

	public function getCertificateRenewal() {

		return view('pages.certificaterenewal');

	}

	public function getTemplate() {

		return view('pages.template');

	}

	public function getAssignmentStatus() {

		return view('pages.assignmentstatus');

	}

	public function getAssignmentResult() {

		return view('pages.assignmentresult');

	}

	public function getConfirmationExam() {

		return view('pages.confirmationexam');

	}

	public function getUploadFile2() {

		return view('pages.uploadfile2');

	}	

	public function getExamResultFail() {

		return view('pages.examresultfail');

	}

	public function getBeforeInterview() {

		return view('pages.beforeinterview');

	}

	public function getCertificateRenewalStatus() {

		return view('pages.certificaterenewalstatus');

	}

	public function getCertificateRenewalApproved() {

		return view('pages.certificaterenewalapproved');

	}

	public function getNewCertificate() {

		return view('pages.newcertificate');

	}

	public function getUploadFile() {

		return view('pages.uploadfile');

	}

	public function getModul5Quiz1() {

		return view('pages.modul5quiz1');

	}

	public function getModul5Quiz2() {

		return view('pages.modul5quiz2');

	}

	public function getModul5QuizScore() {

		return view('pages.modul5quizscore');

	}

	public function getCertificateRenewal2() {

		return view('pages.certificaterenewal2');

	}

	public function getAssignmentSubmission2() {

		return view('pages.assignmentsubmission2');

	}

	public function getApp() {

		return view('pages.app');

	}

	public function getNav() {

		return view('pages.nav');

	}
	public function getStartAssignment() {

		return view('pages.startassignment');

	}



		}