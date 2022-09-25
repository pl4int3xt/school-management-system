<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes([
    'resgister' => false
]);

//Admin routes
Route::get('/admin_index',[App\Http\Controllers\UserController::class, 'index'])->name('admin.index');
Route::post('/admin_store',[App\Http\Controllers\UserController::class, 'store'])->name('admin.store');
Route::get('/admin_destroy/{id}',[App\Http\Controllers\UserController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin_edit/{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('admin.edit');
Route::put('/admin_update/{id}',[App\Http\Controllers\UserController::class, 'update'])->name('admin.update');
Route::get('/admin_search',[App\Http\Controllers\UserController::class, 'search'])->name('admin.search');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//students routes
Route::get('/students_index', 'App\Http\Controllers\StudentController@index')->name('students.index');
Route::post('/students_store', 'App\Http\Controllers\StudentController@store')->name('students.store');
Route::get('/students_destroy/{id}', 'App\Http\Controllers\StudentController@destroy')->name('students.destroy');
Route::get('/students_edit/{id}', 'App\Http\Controllers\StudentController@edit')->name('students.edit');
Route::put('/students_update/{id}', 'App\Http\Controllers\StudentController@update')->name('students.update');
Route::get('/students_search', 'App\Http\Controllers\StudentController@search')->name('students.search');

//teachers routes
Route::get('/teachers_index', 'App\Http\Controllers\TeacherController@index')->name('teachers.index');
Route::post('/teachers_store', 'App\Http\Controllers\TeacherController@store')->name('teachers.store');
Route::get('/teachers_destroy/{id}', 'App\Http\Controllers\TeacherController@destroy')->name('teachers.destroy');
Route::get('/teachers_edit/{id}', 'App\Http\Controllers\TeacherController@edit')->name('teachers.edit');
Route::put('/teachers_update/{id}', 'App\Http\Controllers\TeacherController@update')->name('teachers.update');
Route::get('/teachers_search', 'App\Http\Controllers\TeacherController@search')->name('teachers.search');

//guardians routes
Route::get('/guardians_index', 'App\Http\Controllers\GuardianController@index')->name('guardians.index');
Route::post('/guardians_store', 'App\Http\Controllers\GuardianController@store')->name('guardians.store');
Route::get('/guardians_destroy/{id}', 'App\Http\Controllers\GuardianController@destroy')->name('guardians.destroy');
Route::get('/guardians_edit/{id}', 'App\Http\Controllers\GuardianController@edit')->name('guardians.edit');
Route::put('/guardians_update/{id}', 'App\Http\Controllers\GuardianController@update')->name('guardians.update');
Route::get('/guardians_search', 'App\Http\Controllers\GuardianController@search')->name('guardians.search');

//results routes
Route::get('/results_index', 'App\Http\Controllers\ResultController@index')->name('results.index');
Route::post('/results_store', 'App\Http\Controllers\ResultController@store')->name('results.store');
Route::get('/results_destroy/{id}', 'App\Http\Controllers\ResultController@destroy')->name('results.destroy');
Route::get('/results_edit/{id}', 'App\Http\Controllers\ResultController@edit')->name('results.edit');
Route::put('/results_update/{id}', 'App\Http\Controllers\ResultController@update')->name('results.update');
Route::get('/results_search', 'App\Http\Controllers\ResultController@search')->name('results.search');

//all_results routes
Route::get('/all_results_index', 'App\Http\Controllers\AllResultController@index')->name('all_results.index');
Route::post('/all_results_store', 'App\Http\Controllers\AllResultController@store')->name('all_results.store');
Route::get('/all_results_destroy/{id}', 'App\Http\Controllers\AllResultController@destroy')->name('all_results.destroy');
Route::get('/all_results_edit/{id}', 'App\Http\Controllers\AllResultController@edit')->name('all_results.edit');
Route::put('/all_results_update/{id}', 'App\Http\Controllers\AllResultController@update')->name('all_results.update');
Route::get('/all_results_search', 'App\Http\Controllers\AllResultController@search')->name('all_results.search');

//fees routes
Route::get('/fees_index', 'App\Http\Controllers\FeeController@index')->name('fees.index');
Route::post('/fees_store', 'App\Http\Controllers\FeeController@store')->name('fees.store');
Route::get('/fees_search', 'App\Http\Controllers\FeeController@search')->name('fees.search');

//all_fees routes
Route::get('/all_fees_index', 'App\Http\Controllers\AllFeeController@index')->name('all_fees.index');
Route::get('/all_fees_destroy/{id}', 'App\Http\Controllers\AllFeeController@destroy')->name('all_fees.destroy');
Route::get('/all_fees_search', 'App\Http\Controllers\AllFeeController@search')->name('all_fees.search');

//workers routes
Route::get('/workers_index', 'App\Http\Controllers\WorkerController@index')->name('workers.index');
Route::post('/workers_store', 'App\Http\Controllers\WorkerController@store')->name('workers.store');
Route::get('/workers_destroy/{id}', 'App\Http\Controllers\WorkerController@destroy')->name('workers.destroy');
Route::get('/workers_edit/{id}', 'App\Http\Controllers\WorkerController@edit')->name('workers.edit');
Route::put('/workers_update/{id}', 'App\Http\Controllers\WorkerController@update')->name('workers.update');
Route::get('/workers_search', 'App\Http\Controllers\WorkerController@search')->name('workers.search');

//Announcements routes
Route::get('/announcements_index', 'App\Http\Controllers\AnnouncementController@index')->name('announcements.index');
Route::post('/announcements_store', 'App\Http\Controllers\AnnouncementController@store')->name('announcements.store');
Route::get('/announcements_destroy/{id}', 'App\Http\Controllers\AnnouncementController@destroy')->name('announcements.destroy');
Route::get('/announcements_edit/{id}', 'App\Http\Controllers\AnnouncementController@edit')->name('announcements.edit');
Route::put('/announcements_update/{id}', 'App\Http\Controllers\AnnouncementController@update')->name('announcements.update');
Route::get('/announcements_search', 'App\Http\Controllers\AnnouncementController@search')->name('announcements.search');

//Projects routes
Route::get('/projects_index', 'App\Http\Controllers\ProjectController@index')->name('projects.index');
Route::post('/projects_store', 'App\Http\Controllers\ProjectController@store')->name('projects.store');
Route::get('/projects_destroy/{id}', 'App\Http\Controllers\ProjectController@destroy')->name('projects.destroy');
Route::get('/projects_edit/{id}', 'App\Http\Controllers\ProjectController@edit')->name('projects.edit');
Route::put('/projects_update/{id}', 'App\Http\Controllers\ProjectController@update')->name('projects.update');
Route::get('/projects_search', 'App\Http\Controllers\ProjectController@search')->name('projects.search');

//attendances routes
Route::get('/attendances_index', 'App\Http\Controllers\AttendanceController@index')->name('attendances.index');
Route::post('/attendances_store', 'App\Http\Controllers\AttendanceController@store')->name('attendances.store');

//all attendances routes
Route::get('/all_attendances_index', 'App\Http\Controllers\AllAttendanceController@index')->name('all_attendances.index');
Route::get('/all_attendances_destroy/{id}', 'App\Http\Controllers\AllAttendanceController@destroy')->name('all_attendances.destroy');
Route::get('/all_attendances_edit/{id}', 'App\Http\Controllers\AllAttendanceController@edit')->name('all_attendances.edit');
Route::put('/all_attendances_update/{id}', 'App\Http\Controllers\AllAttendanceController@update')->name('all_attendances.update');
Route::get('/all_attendances_search', 'App\Http\Controllers\AllAttendanceController@search')->name('all_attendances.search');

//subjects routes
Route::get('/subjects_index', 'App\Http\Controllers\SubjectController@index')->name('subjects.index');
Route::post('/subjects_store', 'App\Http\Controllers\SubjectController@store')->name('subjects.store');
Route::get('/subjects_destroy/{id}', 'App\Http\Controllers\SubjectController@destroy')->name('subjects.destroy');
Route::get('/subjects_edit/{id}', 'App\Http\Controllers\SubjectController@edit')->name('subjects.edit');
Route::put('/subjects_update/{id}', 'App\Http\Controllers\SubjectController@update')->name('subjects.update');
Route::get('/subjects_search', 'App\Http\Controllers\SubjectController@search')->name('subjects.search');

//teachers_timetables routes
Route::get('/teachers_timetables_index', 'App\Http\Controllers\TeacherTimeTableController@index')->name('teachers_timetables.index');
Route::post('/teachers_timetables_store', 'App\Http\Controllers\TeacherTimeTableController@store')->name('teachers_timetables.store');
Route::get('/teachers_timetables_destroy/{id}', 'App\Http\Controllers\TeacherTimeTableController@destroy')->name('teachers_timetables.destroy');
Route::get('/teachers_timetables_edit/{id}', 'App\Http\Controllers\TeacherTimeTableController@edit')->name('teachers_timetables.edit');
Route::put('/teachers_timetables_update/{id}', 'App\Http\Controllers\TeacherTimeTableController@update')->name('teachers_timetables.update');
Route::get('/teachers_timetables_search', 'App\Http\Controllers\TeacherTimeTableController@search')->name('teachers_timetables.search');

//books routes
Route::get('/books_index', 'App\Http\Controllers\BookController@index')->name('books.index');
Route::post('/books_store', 'App\Http\Controllers\BookController@store')->name('books.store');
Route::get('/books_search', 'App\Http\Controllers\BookController@search')->name('books.search');

//all_books routes
Route::get('/all_books_index', 'App\Http\Controllers\AllBookController@index')->name('all_books.index');
Route::get('/all_books_destroy/{id}', 'App\Http\Controllers\AllBookController@destroy')->name('all_books.destroy');
Route::get('/all_books_edit/{id}', 'App\Http\Controllers\AllBookController@edit')->name('all_books.edit');
Route::get('/all_books_search', 'App\Http\Controllers\AllBookController@search')->name('all_books.search');

//clases routes
Route::get('/clases_index', 'App\Http\Controllers\ClasController@index')->name('clases.index');
Route::post('/clases_store', 'App\Http\Controllers\ClasController@store')->name('clases.store');
Route::get('/clases_destroy/{id}', 'App\Http\Controllers\ClasController@destroy')->name('clases.destroy');
Route::get('/clases_edit/{id}', 'App\Http\Controllers\ClasController@edit')->name('clases.edit');
Route::put('/clases_update/{id}', 'App\Http\Controllers\ClasController@update')->name('clases.update');
Route::get('/clases_search', 'App\Http\Controllers\ClasController@search')->name('clases.search');

//guardians_results routes
Route::get('/guardians_results_index', 'App\Http\Controllers\GuardianResultController@index')->name('guardians_results.index');
Route::get('/guardians_results_search', 'App\Http\Controllers\GuardianResultController@search')->name('guardians_results.search');


//guardians_fees routes
Route::get('/guardians_fees_index', 'App\Http\Controllers\GuardianFeeController@index')->name('guardians_fees.index');
Route::get('/guardians_fees_search', 'App\Http\Controllers\GuardianFeeController@search')->name('guardians_fees.search');

//guardians_announcements routes
Route::get('/guardians_announcements_index', 'App\Http\Controllers\GuardianAnnouncementController@index')->name('guardians_announcements.index');
Route::get('/guardians_announcements_search', 'App\Http\Controllers\GuardianAnnouncementController@search')->name('guardians_announcements.search');

//finances_announcements routes
Route::get('/finances_announcements_index', 'App\Http\Controllers\FinanceAnnouncementController@index')->name('finances_announcements.index');
Route::get('/finances_announcements_search', 'App\Http\Controllers\FinanceAnnouncementController@search')->name('finances_announcements.search');

//teachers_announcements routes
Route::get('/teachers_announcements_index', 'App\Http\Controllers\TeacherAnnouncementController@index')->name('teachers_announcements.index');
Route::get('/teachers_announcements_search', 'App\Http\Controllers\TeacherAnnouncementController@search')->name('teachers_announcements.search');

//libraries_announcements routes
Route::get('/libraries_announcements_index', 'App\Http\Controllers\LibraryAnnouncementController@index')->name('libraries_announcements.index');
Route::get('/libraries_announcements_search', 'App\Http\Controllers\LibraryAnnouncementController@search')->name('libraries_announcements.search');

//guardians_scores routes
Route::get('/guardians_scores_index', 'App\Http\Controllers\GuardianScoreController@index')->name('guardians_scores.index');

//guardians_attendances routes
Route::get('/guardians_attendances_index', 'App\Http\Controllers\GuardianAttendanceController@index')->name('guardians_attendances.index');

//results_reports routes
Route::get('/results_reports_index/{id}', 'App\Http\Controllers\ResultReportController@index')->name('results_reports.index');
Route::get('/results_reports_pdf/{id}', 'App\Http\Controllers\ResultReportController@generatepdf')->name('results_reports.generatepdf');

//fees_reports routes
Route::get('/fees_reports_index/{id}', 'App\Http\Controllers\FeeReportController@index')->name('fees_reports.index');
Route::get('/fees_reports_pdf/{id}', 'App\Http\Controllers\FeeReportController@generatepdf')->name('fees_reports.generatepdf');