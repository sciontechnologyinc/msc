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
        // RFID
        Route::prefix('rfids')->group(function(){
            Route::get          ('/',                           'RfidController@index'                    )->name('rfid');
            Route::post         ('/get/{id}',                   'RfidController@get'                      )->name('rfid_get');
            Route::post         ('/save',                       'RfidController@store'                    )->name('rfid_save');
            Route::post         ('/update/{fetcher}',           'RfidController@update'                   )->name('rfid_update');
            Route::post         ('/update/{id}/save',           'RfidController@update_save'              )->name('rfid_update_save');
            Route::get          ('/delete/{id}',                'RfidController@delete'                   )->name('rfid_delete');
            Route::get          ('/get/{id}',                   'RfidController@logtrail'                 )->name('rfid_getlogtrail');
            Route::post         ('/save/logtrail',              'RfidController@insertlogtrail'           )->name('rfid_getlogtrail');
            Route::post         ('/students/{id}',              'RfidController@students'                 )->name('rfid_student');
            Route::post         ('/update/status/{id}',         'RfidController@status'                   )->name('rfid_status');
        });

        //Teacher
        Route::prefix('teacher')->group(function(){
            Route::get          ('/',                            'TeacherController@index'                )->name('teacher');
            Route::get          ('/add',                         'TeacherController@create'               )->name('teacher_add');
            Route::post         ('/save',                        'TeacherController@save'                 )->name('teacher_save');
            Route::get          ('/update/{id}',                 'TeacherController@edit'                 )->name('teacher_edit');
            Route::post         ('/update/{id}/save',            'TeacherController@update'               )->name('teacher_update');
            Route::post         ('/delete/{id}',                 'TeacherController@destroy'              )->name('teacher_destroy');
        });

         //Fetcher
         Route::prefix('fetcher')->group(function(){
            Route::get          ('/',                            'FetcherController@index'                )->name('fetcher');
            Route::get          ('/add',                         'FetcherController@create'               )->name('fetcher_add');
            Route::post         ('/save',                        'FetcherController@store'                )->name('fetcher_save');
            Route::get          ('/update/{id}',                 'FetcherController@edit'                 )->name('fetcher_edit');
            Route::post         ('/update/{id}/save',            'FetcherController@update'               )->name('fetcher_update');
            Route::post         ('/delete/{id}',                 'FetcherController@destroy'              )->name('fetcher_destroy');
        });

        //Student
        Route::prefix('student')->group(function(){
            Route::get          ('/',                            'StudentController@index'                )->name('student');
            Route::get          ('/add',                         'StudentController@create'               )->name('student_add');
            Route::post         ('/save',                        'StudentController@store'                )->name('student_save');
            Route::get          ('/update/{id}',                 'StudentController@edit'                 )->name('student_edit');
            Route::post         ('/update/{id}/save',            'StudentController@update'               )->name('student_update');
            Route::post         ('/delete/{id}',                 'StudentController@destroy'              )->name('student_destroy');
        });
        Route::resource('sectionTrash','SectionTrashController');

        //Department
        Route::prefix('department')->group(function(){
            Route::get          ('/',                            'DepartmentController@index'             )->name('department');
            Route::get          ('/add',                         'DepartmentController@create'            )->name('department_add');
            Route::post         ('/save',                        'DepartmentController@store'             )->name('department_save');
            Route::get          ('/update/{id}',                 'DepartmentController@edit'              )->name('department_edit');
            Route::post         ('/update/{id}/save',            'DepartmentController@update'            )->name('department_update');
            Route::post         ('/delete/{id}',                 'DepartmentController@destroy'           )->name('department_destroy');

        });

        //Grade
        Route::prefix('grade')->group(function(){
            Route::get          ('/',                            'GradeController@index'                  )->name('grade');
            Route::get          ('/add',                         'GradeController@create'                 )->name('grade_add');
            Route::post         ('/save',                        'GradeController@store'                  )->name('grade_save');
            Route::get          ('/update/{id}',                 'GradeController@edit'                   )->name('grade_edit');
            Route::post         ('/update/{id}/save',            'GradeController@update'                 )->name('grade_update');
            Route::post         ('/delete/{id}',                 'GradeController@destroy'                )->name('grade_destroy');
        });

        //Section
        Route::prefix('section')->group(function(){
            Route::get          ('/',                            'SectionController@index'               )->name('section');
            Route::get          ('/add',                         'SectionController@create'              )->name('section_add');
            Route::get          ('teachers/create',              'SectionController@sectioncheckbox');
            Route::post         ('/save',                        'SectionController@store'               )->name('section_save');
            Route::get          ('/update/{id}',                 'SectionController@edit'                )->name('section_edit');
            Route::post         ('/update/{id}/save',            'SectionController@update'              )->name('section_update');
            Route::post         ('/delete/{id}',                 'SectionController@destroy'             )->name('section_destroy');
        });

        //Dashboard
        Route::prefix('dashboard')->group(function(){
            Route::get          ('/',                            'DashboardController@index'              )->name('dashboard');
            Route::get          ('/add',                         'SectionController@create'               )->name('dashboard_add');
            Route::post         ('/save',                        'SectionController@store'                )->name('dashboard_save');
            Route::get          ('/update/{id}',                 'SectionController@edit'                 )->name('dashboard_edit');
            Route::post         ('/update/{id}/save',            'SectionController@update'               )->name('dashboard_update');
            Route::post         ('/delete/{id}',                 'SectionController@destroy'              )->name('dashboard_destroy');
        });


//Trash
Route::resource('teacherTrash','TeacherTrashController');
Route::resource('fetcherTrash','FetcherTrashController');
Route::resource('studentTrash','StudentTrashController');
Route::resource('departmentTrash','DepartmentTrashController');
Route::resource('gradeTrash','GradeTrashController');

//default
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('dashboard','DashboardController');

Route::post('rfids', [
    'uses' => 'LoginController@login',
    'as'   => 'monitoring.index'
]);

Route::group(['middleware' => ['web', 'auth']],function (){
    Route::get('monitoring.index', function (){
        return view('monitoring.index');
    })->name('monitoring');
});

Route::get('dashboard.index', function (){
    if (Auth::user()->admin == 0){
        return view('monitoring.index');
    }else{
        $users['users'] = \App\User::all();
        return view('dashboard.index', $users);
    }
});