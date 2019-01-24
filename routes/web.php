<?php

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
//default
 Route::get('/', function(){
    return view('teachers.addDetails');
 } );
 //dashboard
 Route::get('/admin/dashboard','schoolController@AdminDash');

 //student 
 Route::get('/student/add','schoolController@StudentAdd');
 Route::post('/student/add','schoolController@StudentAd');
 Route::get('/student/view','schoolController@StudentView');
 Route::post('/student/view','schoolController@StudentSpecView');
 Route::post('/student/delete','schoolController@StudentDelete');
 Route::get('/student/{id}/more','schoolController@StudentMore');
 Route::get('/student/users/export', 'ExportController@export');

 //teacher 
 Route::get('/teacher/add','schoolController@teacherAdd');
 Route::post('/teacher/add','schoolController@teacherAd');
 Route::get('/teacher/view','schoolController@teacherView');

//Timetable
 Route::get('/timetable/create', 'schoolController@TimeCreate');
 Route::post('/timetable/create', 'schoolController@TimeAddition');
 Route::patch('/timetable/Update','schoolController@TimeEdit');
 Route::post('/timetable/delete','schoolController@TimeDelete');
 Route::get('/timetable/view','schoolController@TimeViewPage');
 Route::post('/timetable/view','schoolController@TimeVIEW');
 
 //subject
 Route::get('/subject','schoolController@subjectView');
 Route::post('/subject','schoolController@subjectAdd');
 Route::patch('/subject/edit','schoolController@subjectEdit');
 Route::post('/subject/delete','schoolController@subjectDelete');
 
 //Announcement
 Route::get('/announcement','schoolController@announceView');
 Route::post('/announcement','schoolController@announceAdd');
 Route::patch('/announcement/edit','schoolController@announceEdit');
 Route::post('/announcement/delete','schoolController@announceDelete');
 //messages
 Route::get('/message/send','schoolController@messageCreate');
 Route::post('/message/send','schoolController@messageSen');

 //teachersRoute
 Route::post('/teacher/addDetails','schoolController@addTeacherDetails');

 Route::get('create-chart/{type}','chartController@makeChart');
 

 //All route for class
 Route::group(['prefix'=>'class'],function(){
    Route::get('/view','classController@AddClassPage')->name('class.view');
    Route::post('/view','classController@AddClass')->name('class.add');
    Route::patch('/edit','classController@EditClass')->name('class.edit');
    Route::post('/delete','classController@DeleteClass')->name('class.delete');
 });
 
