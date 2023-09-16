<?php

use App\Http\Controllers\admin\BatchesController;
use App\Http\Controllers\admin\ClassController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\DemoController;
use App\Http\Controllers\admin\LearningsContentsController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\OnlineTestController;
use App\Http\Controllers\admin\PaymentsController;
use App\Http\Controllers\admin\QuestionBankController;
use App\Http\Controllers\admin\SubjectController;
use App\Http\Controllers\admin\TopicController;
use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JitsiController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\student\DashboardController;
use App\Http\Controllers\tutor\TutorDashboardController;
use App\Http\Controllers\tutor\TutorProfileController;
use App\Http\Controllers\student\DemoListController;
use App\Http\Controllers\student\MyLearningController;
use App\Http\Controllers\student\StudentProfileController;
use App\Http\Controllers\student\SubjectsController;
use App\Http\Controllers\student\TutorSearchController;
use App\Http\Controllers\tutor\ClassScheduleController;
use App\Http\Controllers\TutorreviewsController;
use App\Http\Controllers\ZoomClassesController;
use App\Models\classes;
use App\Models\tutorreviews;
// use App\Http\Controllers\StudentregistrationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Common Activity
Route::get('/', [HomeController::class, 'index'])->name('home');
// Changed to new UI for Students
Route::get('/student/register', [HomeController::class, 'std_registration'])->name('std_registration');
Route::post('/student/register',[HomeController::class,'student_registration_form'])->name('student_registration_form');
Route::get('/student/login', [HomeController::class, 'std_login'])->name('studentlogin');
Route::get('/student/mobile-verify',[HomeController::class,'student_mobile_verify'])->name('student_mobile_verify');
Route::post('/student/mobile-verify',[HomeController::class,'verify_student_mobile'])->name('verify_student_mobile');
Route::get('/student-login',[HomeController::class, 'student_login'])->name('student_login');

// Changed to new UI for Tutors
Route::get('/tutor/register', [HomeController::class, 'ttr_registration'])->name('ttr_registration');
Route::post('/tutor/register',[HomeController::class,'tutor_registration_form'])->name('tutor_registration_form');
Route::get('/tutor/login', [HomeController::class, 'ttr_login'])->name('tutorlogin');
Route::get('/tutor/mobile-verify',[HomeController::class,'tutor_mobile_verify'])->name('tutor_mobile_verify');
Route::post('/tutor/mobile-verify',[HomeController::class,'verify_tutor_mobile'])->name('verify_tutor_mobile');
Route::get('/tutor-login',[HomeController::class, 'tutor_login'])->name('tutor_login');



Route::get("logout", [HomeController::class, "logout"])->name("logout");

// Route::get('/tutor/login', [HomeController::class, 'ttr_login'])->name('tutorlogin');

// Newly Added Login Pages




Route::post('fetchsubjects', [CommonController::class, 'fetchsubjects'])->name('fetchsubjects');
Route::post('fetchtopics', [CommonController::class, 'fetchtopics'])->name('fetchtopics');
Route::post('studentsbyclass', [CommonController::class, 'studentsbyclass'])->name('studentsbyclass');
Route::post('batchbysubject', [CommonController::class, 'batchbysubject'])->name('batchbysubject');
Route::post('studentsbybatch', [CommonController::class, 'studentsbybatch'])->name('studentsbybatch');

// Student Activity
Route::group(['prefix' => 'student', 'middleware' => ['StudentAuthenticate']], function () {
    // student dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('student.dashboard');
    // student profile
    Route::get('profile', [StudentProfileController::class, 'index'])->name('student.profile');
    Route::get('profileupdate/{id}', [StudentProfileController::class, 'edit'])->name('student.profileupdate');
    Route::post('updateprofiledata', [StudentProfileController::class, 'updateprofiledata'])->name('student.updateprofiledata');
    Route::post('updateprofilepic', [StudentProfileController::class, 'profilepicupdate'])->name('student.profilepicupdate');
    Route::post('studentacadd', [StudentProfileController::class, 'studentacadd'])->name('student.studentacadd');
    Route::get('studentacdel/{id}', [StudentProfileController::class, 'studentacdel'])->name('student.studentacdel');
    // tutor search
    Route::get('yourtutor', [TutorSearchController::class, 'yourtutor'])->name('student.yourtutor');
    Route::get('tutorprofile/{id}', [TutorSearchController::class, 'tutorprofile'])->name('student.tutorprofile');
    Route::get('searchtutor', [TutorSearchController::class, 'index'])->name('student.searchtutor');
    Route::post('tutoradvs', [TutorSearchController::class, 'tutoradvs'])->name('student.tutoradvs');
    // student demo
    Route::get('demolist', [DemoListController::class, 'index'])->name('student.demolist');
    Route::post('bookdemo', [DemoListController::class, 'bookdemo'])->name('student.bookdemo');
    Route::get('democancel/{id}', [DemoListController::class, 'democancel'])->name('student.democancel');
    Route::post('demolist-search', [DemoListController::class, 'demolistSearch'])->name('student.demolist-search');
    // Purchase Class
    Route::post('purchaseclass', [TutorSearchController::class, 'purchaseclass'])->name('student.purchaseclass');
    // Subjects
    Route::get('subjects', [SubjectsController::class, 'index'])->name('student.subjects');
    // Syllabus
    Route::get('subjects/syllabus/{id}', [SubjectsController::class, 'getsyllabus'])->name('student.subjects.syllabus');
    // My Learning
    Route::any('mylearnings', [MyLearningController::class, 'index'])->name('student.mylearnings');
    // Route::post('mylearnings-search', [MyLearningController::class, 'learningSearch'])->name('student.mylearnings-search');
    // Classes
    Route::get('classes', [ClassController::class, 'studentclass'])->name('student.classes');
    Route::post('classes-search', [ClassController::class, 'studentclassSearch'])->name('student.classes-search');
    // completed classes
    Route::get('completed-classes', [ClassController::class, 'studentCompletedclass'])->name('student.completed-classes');

    // Feedback by Student
    Route::post('feedback/submit',[TutorreviewsController::class,'feedbacksubmitstudent'])->name('student.feedback.submit');
    // Feedback by tutor
    Route::get('myfeedback', [TutorreviewsController::class, 'studentfeedbacklist'])->name('student.myfeedback');
    // Message By Student
    Route::get('messages', [MessagesController::class, 'messagesbystudent'])->name('student.messages');
    Route::get('adminmessages', [MessagesController::class, 'messagesbystudentadmins'])->name('student.messages.admins');
    Route::get('adminmessages/{id}', [MessagesController::class, 'messagesbystudentadminmessages'])->name('student.messages.adminmessages');
    Route::get('tutormessages', [MessagesController::class, 'messagesbystudenttutor'])->name('student.messages.tutor');
    Route::get('tutormessages/{id}', [MessagesController::class, 'messagesbystudenttutormessages'])->name('student.messages.tutormessages');
    Route::post('sendmessage', [MessagesController::class, 'messagesentbystudent'])->name('student.messages.send');
    // Assignments
    Route::get('assignments',[AssignmentsController::class,'studentassignmentslist'])->name('student.assignments.list');
    Route::post('assignments/upload',[AssignmentsController::class,'studentassignmentsupload'])->name('student.assignments.upload');
    Route::post('assignments-search',[AssignmentsController::class,'studentassignmentsSearch'])->name('student.assignments.search');
    // Student Fees/Payments
    Route::get('studentpayments', [PaymentsController::class, 'studentpayments'])->name('student.studentpayments');
    Route::post('studentpayments-search', [PaymentsController::class, 'studentpaymentsSearch'])->name('student.payments-search');
    // Online tests/exams
    Route::get('exams', [OnlineTestController::class, 'studentexams'])->name('student.exams');
    Route::post('exams-search', [OnlineTestController::class, 'studentexamsSearch'])->name('student.exams-search');
    Route::get('taketest/{id}', [OnlineTestController::class, 'taketest'])->name('student.taketest');
    Route::get('exam/report/{id}', [OnlineTestController::class, 'testreport'])->name('student.test.report');
    Route::post('/save-responses', [OnlineTestController::class, 'saveResponses'])->name('student.save.responses');
    // Route::post('/save-responses', 'OnlineTestController@saveResponses')->name('student.save.responses');

});

// Admin Routes
Route::get('admin/signin', [LoginController::class, 'index'])->name('signin');
Route::get('admin/login', [LoginController::class, 'login'])->name('admin.login');

// admin activity
Route::group(['prefix' => 'admin', 'middleware' => ['AdminAuthenticate']], function () {
    // Admin dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // Classes
    Route::get('class', [ClassController::class, 'index'])->name('admin.class');
    Route::post('class', [ClassController::class, 'store'])->name('admin.class.create');
    Route::get('class/status', [ClassController::class, 'status'])->name('admin.class.status');
    // Subjects
    Route::get('subject', [SubjectController::class, 'index'])->name('admin.subject');
    Route::post('subject', [SubjectController::class, 'store'])->name('admin.subject.create');
    Route::get('subject/status', [SubjectController::class, 'status'])->name('admin.subject.status');
    // Topics
    Route::get('topic', [TopicController::class, 'index'])->name('admin.topic');
    Route::post('topic', [TopicController::class, 'store'])->name('admin.topic.create');
    Route::get('topic/status', [TopicController::class, 'status'])->name('admin.topic.status');
    Route::post('topic-search', [TopicController::class, 'topicSearch'])->name('admin.topic-search');
    // Batch
    Route::get('batch', [BatchesController::class, 'index'])->name('admin.batch');
    Route::post('batch', [BatchesController::class, 'store'])->name('admin.batch.create');
    Route::get('batch/status', [BatchesController::class, 'status'])->name('admin.batch.status');
    Route::post('batchmapping/create', [BatchesController::class, 'mapping'])->name('admin.batchmapping.create');
    Route::get('viewbatchdata/{id}', [BatchesController::class, 'viewrecord'])->name('admin.viewbatchdata');
    Route::post('batches-search', [BatchesController::class, 'batchSearch'])->name('admin.batches-search');
    // Demo List
    Route::get('demolist', [DemoController::class, 'index'])->name('admin.demolist');
    Route::post('bookdemo', [DemoController::class, 'bookdemo'])->name('admin.bookdemo');
    Route::get('democancel/{id}', [DemoController::class, 'democancel'])->name('admin.democancel');
    Route::get('demodetails/{id}', [DemoController::class, 'demodetails'])->name('admin.demodetails');
    Route::post('demo/confirm', [DemoController::class, 'democonfirm'])->name('admin.demo.confirm');
    Route::post('demo/update', [DemoController::class, 'demoupdate'])->name('admin.demo.update');
    Route::post('demolist-search', [DemoController::class, 'demolistsearch'])->name('admin.demolist-search');
    // student profile from admin side
    Route::get('studentprofile/{id}', [StudentProfileController::class, 'studentprofile'])->name('admin.studentprofile');
    Route::get('students', [StudentProfileController::class, 'studentslist'])->name('admin.students');
    Route::get('students/status', [StudentProfileController::class, 'status'])->name('admin.students.status');
    Route::post('students-search', [StudentProfileController::class, 'studentslistsearch'])->name('admin.students-search');
    // tutor profile view by admin
    Route::get('tutorprofile/{id}', [TutorSearchController::class, 'tutorprofile'])->name('admin.tutorprofile');
    Route::get('tutors', [TutorSearchController::class, 'tutorslist'])->name('admin.tutors');
    Route::get('tutors/status', [TutorSearchController::class, 'status'])->name('admin.tutors.status');
    Route::post('tutors-search', [TutorSearchController::class, 'tutorslistsearch'])->name('admin.tutors-search');
    // Admin Commission
    Route::get('commission/update',[TutorSearchController::class,'commissionupdate'])->name('admin.commission.update');
    // Payment details
    Route::get('payments', [PaymentsController::class, 'index'])->name('admin.payments');
    Route::get('student-payments-report', [PaymentsController::class, 'studentpaymentsreport'])->name('admin.reports.student-payments');
    Route::get('tutor-payments-report', [PaymentsController::class, 'tutorpaymentsreport'])->name('admin.reports.tutor-payments');
    Route::any('paymentsearch', [PaymentsController::class, 'paymentSearch'])->name('admin.paymentsearch');
    Route::any('tutorpaymentsearch', [PaymentsController::class, 'tutorPaymentSearch'])->name('admin.tutor-paymentsearch');
    Route::get('tutorpayments', [PaymentsController::class, 'tutorpayments'])->name('admin.tutorpayments');
    Route::get('tutorpaymentslist', [PaymentsController::class, 'tutorpaymentslist'])->name('admin.tutorpaymentslist');
    Route::post('payments', [PaymentsController::class, 'update'])->name('admin.payments.update');
    // Learning contents
    Route::get('learningcontents', [LearningsContentsController::class, 'index'])->name('admin.learningcontents');
    Route::get('addlearningcontents', [LearningsContentsController::class, 'add'])->name('admin.addlearningcontents');
    Route::post('learningcontents/create', [LearningsContentsController::class, 'store'])->name('admin.learningcontents.create');
    Route::get('learningcontents/status', [LearningsContentsController::class, 'status'])->name('admin.learningcontents.status');
    Route::get('learningcontents/{id}', [LearningsContentsController::class, 'edit'])->name('admin.learningcontents.edit');
    Route::post('learningcontents-search', [LearningsContentsController::class, 'search'])->name('admin.learningcontents-search');
    // Assignments
    Route::get('assignments', [AssignmentsController::class, 'adminindex'])->name('admin.assignments');
    Route::get('assignments/status', [AssignmentsController::class, 'status'])->name('admin.assignments.status');
    Route::get('assignments/{id}', [AssignmentsController::class, 'view'])->name('admin.assignments.view');
    Route::post('assignments-search', [AssignmentsController::class, 'assignmentsSearch'])->name('admin.assignments-search');
    // Question Bank
    Route::get('questionbank', [QuestionBankController::class, 'index'])->name('admin.questionbank');
    Route::get('questionbank/create', [QuestionBankController::class, 'create'])->name('admin.questionbank.create');
    Route::post('questionbank/store', [QuestionBankController::class, 'store'])->name('admin.questionbank.store');
    Route::get('question/status', [QuestionBankController::class, 'status'])->name('admin.question.status');
    Route::get('questionupdate/{id}', [QuestionBankController::class, 'view'])->name('admin.questionupdate.view');
    Route::post('questionbank-search', [QuestionBankController::class, 'questionbankSearch'])->name('admin.questionbank-search');
    // Online tests
    Route::get('onlinetestlist', [OnlineTestController::class, 'index'])->name('admin.onlinetests');
    Route::get('onlinetests', [OnlineTestController::class, 'create'])->name('admin.onlinetests.create');
    Route::post('onlinetests', [OnlineTestController::class, 'store'])->name('admin.onlinetests.store');
    Route::get('onlinetests/{id}', [OnlineTestController::class, 'edit'])->name('admin.onlinetests.edit');
    Route::get('onlinetestquestions/{id}', [OnlineTestController::class, 'viewquestions'])->name('admin.onlinetestquestions.viewquestions');
    Route::post('onlinetestlist-search', [OnlineTestController::class, 'onlinetestSearch'])->name('admin.onlinetests-search');
    // Get questions by Topic
    Route::post('fetchquestions', [OnlineTestController::class, 'fetchquestions'])->name('fetchquestions');
    // Message By Student
    Route::get('messages', [MessagesController::class, 'messagesbyadmin'])->name('admin.messages');
    Route::get('studentmessages', [MessagesController::class, 'messagesbyadminstudents'])->name('admin.messages.students');
    Route::get('studentmessages/{id}', [MessagesController::class, 'messagesbyadminstudentmessages'])->name('admin.messages.studentmessages');
    Route::get('adminclearsstudentmessages/{id}', [MessagesController::class, 'chatClearAdminstudent'])->name('admin.messages.clearstudentmessages');
    Route::get('tutormessages', [MessagesController::class, 'messagesbyadmintutor'])->name('admin.messages.tutors');
    Route::get('tutormessages/{id}', [MessagesController::class, 'messagesbyadmintutormessages'])->name('admin.messages.tutormessages');
    Route::get('chatClearAdmintutor/{id}', [MessagesController::class, 'chatClearAdmintutor'])->name('admin.messages.cleartutormessages');
    Route::post('sendmessage', [MessagesController::class, 'messagesentbyadmin'])->name('admin.messages.send');
    // Admin Reports
    Route::get('classes-report',[ReportController::class, 'admin_class_report'])->name('admin.reports.class-list');
});


// Tutor Activity
Route::group(['prefix' => 'tutor', 'middleware' => ['TutorAuthenticate']], function () {

    // Tutor Dashboard
    Route::get('dashboard', [TutorDashboardController::class, 'index'])->name('tutor.dashboard');
    // Tutor Profile
    Route::get('profile', [TutorProfileController::class, 'tutorprofile'])->name('tutor.profile');
    Route::get('profileupdate', [TutorProfileController::class, 'edit'])->name('tutor.profileupdate');
    Route::post('updateprofiledata', [TutorProfileController::class, 'updateprofiledata'])->name('tutor.updateprofiledata');
    // Tutor Achievement Mapping
    Route::post('tutoracadd', [TutorProfileController::class, 'tutoracadd'])->name('tutor.tutoracadd');
    Route::get('tutoracdel/{id}', [TutorProfileController::class, 'tutoracdel'])->name('tutor.tutoracdel');
    // Tutor Class Mapping
    Route::post('classmapping', [TutorProfileController::class, 'classmapping'])->name('tutor.classmapping');
    Route::get('classmappingdelete/{id}', [TutorProfileController::class, 'classmappingdelete'])->name('tutor.classmappingdelete');
    // Tutor Class Scheduling
    // Route::post('classschedule',[ClassScheduleController::class,'create'])->name('tutor.classschedule.create');

    // Demo List
    Route::get('demolist', [DemoController::class, 'tutordemolist'])->name('tutor.demolist');
    Route::post('demolist', [DemoController::class, 'tutordemoupdate'])->name('tutor.demo.update');
    // Tutor Batches
    Route::get('batches', [BatchesController::class, 'tutorbatches'])->name('tutor.batches');
    Route::get('batches/students/{id}', [BatchesController::class, 'tutorbatchesstudents'])->name('tutor.batches.students');
    // Tutor Classes
    Route::get('classes', [ClassController::class, 'tutorclasses'])->name('tutor.classes');
    // Tutor Assignments
    Route::get('assignments', [AssignmentsController::class, 'tutorassignments'])->name('tutor.assignments');
    Route::post('assignments', [AssignmentsController::class, 'tutorassignmentscreate'])->name('tutor.assignments.create');
    Route::get('assignments/{id}', [AssignmentsController::class, 'tutorview'])->name('tutor.assignments.view');
    // Live Classes(Zoom Meeting)
    Route::get('liveclass', [ZoomClassesController::class, 'index'])->name('tutor.liveclass');
    Route::get('liveclass/completed/{id}', [ZoomClassesController::class, 'completed'])->name('tutor.liveclass.completed');
    Route::get('liveclass/create', [ZoomClassesController::class, 'create'])->name('tutor.liveclass.create');
    Route::post('liveclass/store', [ZoomClassesController::class, 'store'])->name('tutor.liveclass.store');
    Route::get('getuser', [ZoomClassesController::class, 'getzoomuser'])->name('tutor.liveclass.getuser');
    Route::get('getclass', [ZoomClassesController::class, 'classlist'])->name('tutor.liveclass.classlist');
    Route::post('classschedule', [ZoomClassesController::class, 'scheduleclass'])->name('tutor.liveclass.scheduleclass');
    // Feedback by tutor
    Route::get('feedback', [FeedbackController::class, 'index'])->name('tutor.feedback.list');
    // Message By Tutor
    Route::get('messages', [MessagesController::class, 'messagesbytutor'])->name('tutor.messages');
    Route::get('adminmessages', [MessagesController::class, 'messagesbytutoradmins'])->name('tutor.messages.admins');
    Route::get('adminmessages/{id}', [MessagesController::class, 'messagesbytutoradminmessages'])->name('tutor.messages.adminmessages');
    Route::get('studentmessages', [MessagesController::class, 'messagesbytutorstudents'])->name('tutor.messages.students');
    Route::get('studentmessages/{id}', [MessagesController::class, 'messagesbytutorstudentmessages'])->name('tutor.messages.studentmessages');
    Route::post('sendmessage', [MessagesController::class, 'messagesentbytutor'])->name('tutor.messages.send');
});
// Create Jitsi Meeting
Route::get('/jitsi', [JitsiController::class, 'index']);
