<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;





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


Route::view('/','home')->name('home');


 /* Course Routes  */



 Route::view('/about','about')->name('about');

 Route::get('/courses','CourseController@index')->name('courses.index');

 Route::get('/courses/create', 'CourseController@create')->name('courses.create');

 Route::get('/courses/{courses}/editar', 'CourseController@edit')->name('courses.edit');

 Route::patch('/courses/{courses}/editar', 'CourseController@update')->name('courses.update');

 Route::delete('/courses/{courses}', 'CourseController@destroy')->name('courses.destroy');

 Route::post('/courses','CourseController@store')->name('courses.store');

 Route::get('/courses/{id}','CourseController@show')->name('courses.show');

 Route::view('/contact','contact')->name('contact');

 Route::post('contact', 'MessageController@store');

 Route::get('/course/export','CourseController@exportExcel')->name('courses.exportcourses');

 Route::post('/course/import','CourseController@importExcel')->name('courses.importcourses');





 /* Student Routes  */

 Route::get('/students','StudentsController@index')->name('students.index');

 Route::get('/students/create', 'StudentsController@create')->name('students.create');

 Route::get('/students/{students}/editar', 'StudentsController@edit')->name('students.edit');

 Route::patch('/students/{students}/editar', 'StudentsController@update')->name('students.update');

 Route::delete('/students/{students}', 'StudentsController@destroy')->name('students.destroy');

 Route::post('/students','StudentsController@store')->name('students.store');

 Route::get('/students/{id}','StudentsController@show')->name('students.show');

 Route::get('students-list-xlsx', 'StudentController@exportExcel')-> name('Students.ExportExcel');



 /* certificate Routes  */

 Route::get('/certificate','certificateController@index')->name('certificate.index');

 Route::get('/certificate/create', 'certificateController@create')->name('certificate.create');

 Route::get('/certificate/{certificate}/editar', 'certificateController@edit')->name('certificate.edit');

 Route::patch('/certificate/{certificate}/editar', 'certificateController@update')->name('certificate.update');

 Route::delete('/certificate/{certificate}', 'certificateController@destroy')->name('certificate.destroy');

 Route::post('/certificate','certificateController@store')->name('certificate.store');

 Route::get('/certificate/{id}','certificateController@downloadPDF')->name('certificate.show');

 Route::get('certificate-list-xlsx', 'certificateController@exportExcel')-> name('certificate.ExportExcel');



 Route::get('/busqueda','SearchController@index')->name('front.search');

     /* pdf Routes  */


     Auth::routes();

     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
